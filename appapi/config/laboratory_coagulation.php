<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 凝血

//	
$config['labory']	=	array(
	'1'=>array(
		'cname'=>'凝血酶原时间',
		'ename' =>'PT',
		'resources' => '10-14',
		'unit'	=> '秒',
		'min'	=>	'10',
		'max'	=>	'14'
	),

	'2'=>array(
		'cname'=>'凝血酶原时间INR',
		'ename' =>'INR',
		'resources' => '',
		'unit'	=> '',
		'min'	=>	'',
		'max'	=>	''
	),
	'3'=>array(
		'cname'=>'凝血酶原时间活动度',
		'ename' =>'PTA',
		'resources' => '70-130',
		'unit'	=> '%',
		'min'	=>	'70',
		'max'	=>	'130'
	),
	'4'=>array(
		'cname'=>'活化部分凝血活酶时间',
		'ename' =>'APTT',
		'resources' => '20-35',
		'unit'	=> '秒',
		'min'	=>	'20',
		'max'	=>	'35'
	),
	'5'=>array(
		'cname'=>'纤维蛋白原定量',
		'ename' =>'Fib',
		'resources' => '2-4',
		'unit'	=> 'g/l',
		'min'	=>	'2',
		'max'	=>	'4'
	),
	'6'=>array(
		'cname'=>'凝血酶凝结时间',
		'ename' =>'TT',
		'resources' => '14-21',
		'unit'	=> '秒',
		'min'	=>	'14',
		'max'	=>	'21'
	),
);

