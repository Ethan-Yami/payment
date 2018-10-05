<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Sigin() {

    	$account = $this->input->get_post('account', TRUE);
    	$password = $this->input->get_post('password', TRUE);        

        $mail = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        $phone ='/^(1(([123456789][0-9])|(47)|[8][0126789]))\d{8}$/';
        $flag = false;   
        $type = 'username';

        if(preg_match($mail,$account)){
            $type = 'email';                      
        }else if(preg_match($phone,$account)){
            $type = 'phone';           
        } 


        $this->load->model('member_model');                 
        if($type=='email'){
            $user = $this->member_model->getone(["*"],'users',array("email"=>$account));
        }elseif ($type=='phone') {
            $user = $this->member_model->getone(["*"],'users',array("cellphone"=>$account));             
        }elseif ($type=='username') {
            $user = $this->member_model->getone(["*"],'users',array("username"=>$account));             
        }                  
        $rest = array("status"=>0);
        if(!empty($user)){
         
           
            $salt = sha1($user['id']+time().$flag);
            $this->member_model->save(['salt'=>$salt],'users',['id'=>$user['id']]);
            $user['salt'] = $salt;
            $user['token'] = $salt;
            $rest['status'] = 200;
            $rest["result"] = $user;
            $rest["message"] = "登录成功!";
         
        }else{
            $rest["message"] = "用户名或密码错误!";
            $rest["result"] = array('user' => $account,'password'=>$password,'resut'=>$_REQUEST );
        }
    
        echo json_encode($rest);
    }

    function SignIn(){

        $result = [
            'avatar'=>"https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif",
            'introduction'=>'我是超级管理员',
            'name'=>'Super Admin',
            'roles'=>["admin"],
            'token'=>'admin'
            ];

        echo json_encode($result);


    }

    
}
