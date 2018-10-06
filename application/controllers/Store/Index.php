<?php 

 if (!defined('BASEPATH')) exit('No direct script access allowed');
 
 class Index extends CI_Controller {
 
     function __construct() {
        parent::__construct();
      	$this->load->library('session');
		$organization = [
			'salt'				=> $this->session->userdata('salt'),
			'username'			=> $this->session->userdata('username'),
			'id'				=> $this->session->userdata('id'),
			'accesskey'			=> $this->session->userdata('accesskey'),
            'store_id'			=> $this->session->userdata('store_id'),
		];

		if(empty($organization['id']) || empty($organization['salt']) || empty($organization['username']))
			redirect('/','refresh');

		$this->_organization = $organization;
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

		
			/*$this->redirect('/hotspot/base?accesskey='.$accesskey);*/
			$this->load->library('twig');	
			$this->twig->display('stores/index.php', $data);
	}
 }
