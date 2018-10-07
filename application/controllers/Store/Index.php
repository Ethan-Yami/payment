<?php 

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 class Index extends CI_Controller {
 	public $_config=[];
    public function __construct() {
        parent::__construct();
      	$this->load->library('session');
		$config = [
			'salt'				=> $this->session->userdata('salt'),
			'username'			=> $this->session->userdata('username'),
			'id'				=> $this->session->userdata('id'),
			'accesskey'			=> $this->session->userdata('accesskey'),
            'store_id'			=> $this->session->userdata('store_id'),
		];

		if(empty($config['id']) || empty($config['salt']) || empty($config['username']))
			redirect('/','refresh');

		$this->_config = $config;
     }
 
	public function index(){
	     
	    	$accesskey = $this->input->get('accesskey');
			if(!$accesskey || empty($accesskey)) return false;

	    	$this->load->model('Portal_model');
	    	$bech = $this->Portal_model->branch(array('salt'=>$accesskey));	   
	    	
	    	
	    	$data = array(
               'accesskey'  => 	$accesskey,
               'store_id'  =>  $bech['id'],              
           	);
           	//创建session	
			$this->session->set_userdata($data);	   

           $lang = $this->input->get('lang', TRUE);
            $this->load->library('Lang', array('lang'=>$lang), 'Switch');
            $data['menu'] = $this->Switch->init('menu');    
            $data['dic'] = $this->Switch->init('hinit'); 	



	        $userId = $this->_config['id'];
	        $storeId = $bech['id'];

	        $where = array('user_id'=>$userId,'store_id'=>$storeId);
	        $config_p = array('url'=>site_url('store/goods/index'),'table'=>'goods','per_page'=>8,'uri_segment'=>4);
	        $this->load->model('Goods_model');
	        $offset = $this->uri->segment(4) ? $this->uri->segment(4) : 0;

	        $data['page'] = $this->Goods_model->feiyeconfig($config_p,$where);
	        $where['goods.user_id'] = $where['user_id'];
	        $where['goods.store_id'] = $where['store_id'];
	        unset($where['store_id']);
	        unset($where['user_id']);
	        $query = $this->Goods_model->goodsall(
	            'goods',
	            ['goods.id,goods.name,goods.sn,goods.thumb,goods.quantity,goods.retail_price,category.name as category_name'],
	            $where,
	            ['table'=>'category','on'=>'goods.cate_id = category.id','way'=>'left'],
	            $config_p['per_page'],
	            $offset,
	            array('goods.id'=>'DESC')
	           
	        );


	        $results = $query->result_array();
	        //echo $this->db->last_query();

	        $data['result'] = $results;
		
			/*$this->redirect('/hotspot/base?accesskey='.$accesskey);*/
			$this->load->library('twig');	
			$this->twig->display('stores/index.php', $data);
	}
 }
