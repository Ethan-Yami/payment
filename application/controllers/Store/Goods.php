<?php 

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Goods extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create() {
        $data = [];
        $this->load->library('twig');	
		$this->twig->display('stores/goods/create.php', $data);
    }

    public function index(){
    	$data = [];
    	$this->load->library('twig');	
		$this->twig->display('stores/index.php', $data);
    }
}
