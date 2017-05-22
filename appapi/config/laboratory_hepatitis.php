<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 乙肝

//	
$config['labory']	=	array(
	'1'=>array(
		'cname'=>'乙型肝炎表面抗原测定（化学发光）',
		'ename' =>'HBsAg',
		'types' => '1',
		'resources' => '(C)<0.05',
		'resval'	=> '0.05',
		'compare'	=> '<'
	),

	'2'=>array(
		'cname'=>'乙型肝炎表面抗体测定（化学发光）',
		'ename' =>'HBsAb',
		'types' => '1',
		'resources' => '(C)0-10',
		'resval'	=> '10',
		'compare'	=> '<'
	),

	'3'=>array(
		'cname'=>'乙型肝炎e抗原测定（化学发光）',
		'ename' =>'HBeAg',
		'types' => '1',
		'resources' => '(C)<1.000',
		'resval'	=> '1.000',
		'compare'	=> '<'
	),
	
	'4'=>array(
		'cname'=>'乙型肝炎e抗体测定（化学发光）',
		'ename' =>'HBeAb',
		'types' => '1',
		'resources' => '(D)>1.001',
		'resval'	=> '1.001',
		'compare'	=> '>'
	),

	'5'=>array(
		'cname'=>'乙型肝炎核心总抗体测定（化学发光）',
		'ename' =>'Anti-HBCⅡ',
		'types' => '1',
		'resources' => '(C)<1.000',
		'resval'	=> '1.000',
		'compare'	=> '<'
	),

	'6'=>array(
		'cname'=>'丙型肝炎抗体测定（化学发光）',
		'ename' =>'Anti-HCV',
		'types' => '1',
		'resources' => '(C)<1.000',
		'resval'	=> '1.000',
		'compare'	=> '<'
	),

	'7'=>array(
		'cname'=>'梅毒螺旋体抗体（化学发光）',
		'ename' =>'Syphils',
		'types' => '1',
		'resources' => '(C)<1.000',
		'resval'	=> '1.000',
		'compare'	=> '<'
	),

	'8'=>array(
		'cname'=>'艾滋病毒抗体检测（酶免法）',
		'ename' =>'HIV',
		'types' => '2',
		'result'=>array(
			'1'=>'阴性','2'=>'阳性'
		),
		'resources'=>'阴性'
	)

);

