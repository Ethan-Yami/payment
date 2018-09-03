<?php

/**
 * 配置文件
 */
$conf = array();
$conf['default'] = array(
    'hostname' => '#DB_HOST#',
    'username' => '#DB_USER#',
	'password' => '#DB_PWD#',
	'database' => '#DB_NAME#',
	'dbprefix' => '#DB_PREFIX#',
	// 'swap_pre' => '#DB_PREFIX#',
 	'port'	   => '#DB_PORT#',  
);
$conf['base_url'] = '#SERVER_URL#';
$conf['default']['dbdriver'] = 'mysqli';
$conf['default']['pconnect'] = TRUE;
$conf['default']['db_debug'] = TRUE;
$conf['default']['cache_on'] = FALSE;
$conf['default']['cachedir'] = '';
$conf['default']['char_set'] = 'utf8';
$conf['default']['dbcollat'] = 'utf8_general_ci';
$conf['default']['swap_pre'] = 'ros_';
$conf['default']['autoinit'] = TRUE;
$conf['default']['stricton'] = FALSE;
return $conf;
?>