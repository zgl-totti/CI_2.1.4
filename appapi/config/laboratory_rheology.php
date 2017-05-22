<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 血流变

//	
$config['labory']	=	array(
	
	'1'=>array(
		'cname'=>'全血黏度切变率1',
		'ename' =>'mpas 1/s',
		'resources' => '17.63-21.35',
		'unit'	=> 'mpa.s',
		'min'	=>	'17.63',
		'max'	=>	'21.35'
	),
	
	'2'=>array(
		'cname'=>'全血黏度切变率5',
		'ename' =>'mpas 1/s',
		'resources' => '7.98-10.01',
		'unit'	=> 'mpa.s',
		'min'	=>	'7.98',
		'max'	=>	'10.01'
	),

	'3'=>array(
		'cname'=>'全血黏度切变率50',
		'ename' =>'mpas 1/s',
		'resources' => '4.53-5.61',
		'unit'	=> 'mpa.s',
		'min'	=>	'4.53',
		'max'	=>	'5.61'
	),

	'4'=>array(
		'cname'=>'全血黏度切变率100',
		'ename' =>'mpas 1/s',
		'resources' => '3.78-4.95',
		'unit'	=> 'mpa.s',
		'min'	=>	'3.78',
		'max'	=>	'4.95'
	),

	'5'=>array(
		'cname'=>'全血黏度切变率200',
		'ename' =>'mpas 1/s',
		'resources' => '3.53-4.65',
		'unit'	=> 'mpa.s',
		'min'	=>	'3.53',
		'max'	=>	'4.65'
	),

	'6'=>array(
		'cname'=>'血浆粘度',
		'ename' =>'XJND',
		'resources' => '1.26-1.66',
		'unit'	=> 'mpa.s',
		'min'	=>	'1.26',
		'max'	=>	'1.66'
	),

	'7'=>array(
		'cname'=>'血沉',
		'ename' =>'ESR',
		'resources' => '0-15',
		'unit'	=> 'mm/h',
		'min'	=>	'0',
		'max'	=>	'15'
	),

	'8'=>array(
		'cname'=>'压积',
		'ename' =>'YJ',
		'resources' => '0.40-0.49',
		'unit'	=> 'L/L',
		'min'	=>	'0.40',
		'max'	=>	'0.49'
	),

	'9'=>array(
		'cname'=>'全血高切相对指数',
		'ename' =>'GQ',
		'resources' => '2.13-3.69',
		'unit'	=> '',
		'min'	=>	'2.13',
		'max'	=>	'3.69'
	),

	'10'=>array(
		'cname'=>'全血低切相对指数',
		'ename' =>'QXDQ',
		'resources' => '10.62-16.94',
		'unit'	=> '',
		'min'	=>	'10.62',
		'max'	=>	'16.94'
	),

	'11'=>array(
		'cname'=>'血沉方程K值',
		'ename' =>'XCFC',
		'resources' => '0-73.76',
		'unit'	=> '',
		'min'	=>	'0',
		'max'	=>	'73.76'
	),

	'12'=>array(
		'cname'=>'红细胞聚焦指数',
		'ename' =>'HXBJJZS',
		'resources' => '3.79-6.05',
		'unit'	=> '',
		'min'	=>	'3.79',
		'max'	=>	'6.05'
	),

	'13'=>array(
		'cname'=>'全血低切还原粘度',
		'ename' =>'QXDQ',
		'resources' => '32.59-50.23',
		'unit'	=> 'mPa.s',
		'min'	=>	'32.59',
		'max'	=>	'50.23'
	),

	'14'=>array(
		'cname'=>'全血高切还原粘度',
		'ename' =>'QXGQ',
		'resources' => '3.82-8.48',
		'unit'	=> 'mPa.s',
		'min'	=>	'3.82',
		'max'	=>	'8.48'
	),

	'15'=>array(
		'cname'=>'红细胞刚性指数',
		'ename' =>'HXBGXZS',
		'resources' => '2.30-6.73',
		'unit'	=> '',
		'min'	=>	'2.30',
		'max'	=>	'6.73'
	),

	'16'=>array(
		'cname'=>'红细胞变形指数TK',
		'ename' =>'HXBBXZS',
		'resources' => '0.53-1.02',
		'unit'	=> '',
		'min'	=>	'0.53',
		'max'	=>	'1.02'
	),
);
