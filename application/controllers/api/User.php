<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Sigin() {

    	$account = $this->input->get_post('account', TRUE);
    	$password = $this->input->get_post('password', TRUE);
        
        $data = ['account'=>$account,'password'=>$password];
        $rest = ['status'=>200,'data'=>$data];
        echo json_encode($rest);
    }

    
}
