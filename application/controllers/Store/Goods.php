<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Goods extends CI_Controller {
    public $_config = [];
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $config = [
            'salt'              => $this->session->userdata('salt'),
            'username'          => $this->session->userdata('username'),
            'id'                => $this->session->userdata('id'),
            'accesskey'         => $this->session->userdata('accesskey'),
            'store_id'          => $this->session->userdata('store_id'),
        ];

        if(empty($config['id']) || empty($config['salt']) || empty($config['username']))
            redirect('/','refresh');

        $this->_config = $config;
    }

    public function create() {
        
        $userId = $this->_config['id'];
        $storeId = $this->_config['store_id'];
      	
        if($this->input->is_ajax_request()){
        	$goods = $this->input->get_post('goods', TRUE); 
            $this->load->model('Goods_model');
            $goods['user_id'] = $userId;
            $goods['store_id'] = $storeId;

            $id = $this->Goods_model->insert_data('goods',$goods,'id');
            $result['data']=['id'=>$id];            
            $result['status']='success';
            echo json_encode($result);
        	exit();
        }

        $this->load->model('Goods_model');
        $category = $this->Goods_model->get(
            'category',
            ['id','name'],
            ['store_id'=>$storeId,'user_id'=>$userId],
            null,
            ['index','id']
        );
        
        
        $this->load->library('twig');	
		$this->twig->display('stores/goods/create.php', ['cate'=>$category]);
    }

    public function edit(){

        $goodsId = $this->uri->segment(4);
        if(!is_numeric($goodsId)) return false;
        $userId = $this->_config['id'];
        $storeId = $this->_config['store_id'];
        
        if($this->input->is_ajax_request()){
            $goods = $this->input->get_post('goods', TRUE); 
            $this->load->model('Goods_model');
            
            $goodsId = $this->input->get_post('id', TRUE);

           $this->Goods_model->update($goods,'goods',['id'=>$goodsId,'store_id'=>$storeId,'user_id'=>$userId]);                 
            $result['status']='success';
            echo json_encode($result);
            exit();
        }

        $this->load->model('Goods_model');
        $category = $this->Goods_model->get(
            'category',
            ['id','name'],
            ['store_id'=>$storeId,'user_id'=>$userId],
            null,
            ['index','id']
        );

        $goods = $this->Goods_model->first('goods',["*"],['id'=>$goodsId,'store_id'=>$storeId,'user_id'=>$userId]);
        

        $this->load->library('twig');   
        $this->twig->display('stores/goods/edit.php', ['cate'=>$category,'goods'=>$goods]);

    }

    public function del(){

        if(!$this->input->is_ajax_request()) return false;
    
        $userId = $this->_config['id'];
        $storeId = $this->_config['store_id'];
        $result = ['status'=>'false'];
        $this->load->model('Goods_model');
        $goodsId = $this->input->get_post('id', TRUE);
      
        $where = ['user_id'=>$userId,'store_id'=>$storeId,'id'=>$goodsId];
        $this->Goods_model->delete($where,'goods');
        echo json_encode(['status'=>'success']);

    }

    public function index(){

        $userId = $this->_config['id'];
        $storeId = $this->_config['store_id'];

        $where = array('user_id'=>$userId,'store_id'=>$storeId);
        $config_p = array('url'=>site_url('store/goods/index'),'table'=>'goods','per_page'=>10,'uri_segment'=>4);
        $this->load->model('Goods_model');
        $offset = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

        $data['page'] = $this->Goods_model->feiyeconfig($config_p,$where);
        $query = $this->Goods_model->goodsall(
            'goods',
            ['goods.id,goods.name,goods.sn,goods.thumb,goods.quantity,goods.retail_price,category.name as category_name'],
            $where,
            ['table'=>'category','on'=>'goods.cate_id = category.id','way'=>'left'],
            $config_p['per_page'],
            $offset,
            array('goods.created_at'=>'DESC','goods.id'=>'ASC')
           
        );


        $results = $query->result_array();


        $data['result'] = $results;
    	
    	$this->load->library('twig');	
		$this->twig->display('stores/index.php', $data);
    }

    public function category(){


    }

    public function categoryApi(){

    	if(!$this->input->is_ajax_request()) return false;
        $do = $this->uri->segment(4);        
        if(!in_array($do, ['create','delete','edit'])) return false;
        $userId = $this->_config['id'];
        $storeId = $this->_config['store_id'];
        $result = ['status'=>'false'];
        switch ($do) {
            case 'create':                    
                $data = $this->input->get_post('data', TRUE);
                $this->load->model('Goods_model');
                $data['user_id'] = $userId;
                $data['store_id'] = $storeId;
                $id = $this->Goods_model->insert_data('category',$data,'id');
                $result['data']=['id'=>$id,'name'=>$data['name']];
                $result['status']='success';

                break;

            case 'delete':
                # code...
                break;

            case 'edit':
                # code...
                break;
            
            default:
                # code...
                break;
        }

        echo json_encode($result);



    }
}
