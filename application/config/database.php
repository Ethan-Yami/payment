<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;
if(!file_exists(FCPATH.'data/config.php')){
    header("Location:/install/");
    exit();
}else{
    $db = require_once(FCPATH.'data/config.php');
    if(isset($db['base_url']))  unset($db['base_url']);
}

$db['default']['dbdriver'] = 'mysqli';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = 'ros_';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

