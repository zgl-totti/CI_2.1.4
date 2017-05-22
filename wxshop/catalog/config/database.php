<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => '202.85.212.235',//一般改成localhost
	'username' => 'uptosci_db',//数据库用户名
	'password' => 'uptosci!.com',//数据库密码
	'database' => 'openant',//数据库名
	'dbdriver' => 'mysql',//mysql驱动，一般改成  mysqli
	'dbprefix' => '',//表前缀，目录只能改为空
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
