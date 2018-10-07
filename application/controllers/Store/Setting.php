<?php 


 if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 class Setting extends CI_Controller {
 
     function __construct() {
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
 
    public function index() {
        
        $storeId = $this->_config['store_id'];
      	$accesskey = $this->input->get('accesskey');
		// if(!$accesskey || empty($accesskey)) return false;

      	$this->load->library('Lang', array(), 'Switch');
   		$data['lang'] = $this->Switch->init('createsite');
    	$this->load->model('Portal_model');
    	//$bech = $this->Portal_model->branch(array('salt'=>$accesskey));	   
    	$bech = $this->Portal_model->branch(array('id'=>$storeId));	       	
        $data['store'] = $bech;
        //var_dump($data);
		/*$this->redirect('/hotspot/base?accesskey='.$accesskey);*/
		$this->load->library('twig');	
		$this->twig->display('stores/setting/index.php', $data);
    }



 }
