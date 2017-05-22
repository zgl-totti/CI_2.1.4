<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 乙肝

//	
$config['labory']	=	array(
	'1'=>array(
		'cname'=>'ABO血型正定型(AB抗原)(国产试剂)',
		'ename' =>'BG',
		'types' => '1',
		'result' => array('1'=>'A型','2'=>'B型','3'=>'AB型','4'=>'O型'),
		'resources' => '',
		'unit'	=> '',
	),

	'2'=>array(
		'cname'=>'白细胞计数',
		'ename' =>'WBC',
		'types' => '2',
		'resources' => '4.0-10.0',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'4.0',
		'max'	=>	'10.0'
	),
	
	'3'=>array(
		'cname'=>'红细胞计数',
		'ename' =>'RBC',
		'types' => '2',
		'resources' => '3.5-5.5',
		'unit'	=> '10<sup>12</sup>/L',
		'min'	=>	'3.5',
		'max'	=>	'5.5'
	),

	'4'=>array(
		'cname'=>'血红蛋白测定',
		'ename' =>'HGB',
		'types' => '2',
		'resources' => '110-160',
		'unit'	=> 'g/L',
		'min'	=>	'110',
		'max'	=>	'160'
	),


	'5'=>array(
		'cname'=>'红细胞压积',
		'ename' =>'HCT',
		'types' => '2',
		'resources' => '35-50',
		'unit'	=> '%',
		'min'	=>	'35',
		'max'	=>	'50'
	),

	'6'=>array(
		'cname'=>'平均红细胞体积',
		'ename' =>'MCV',
		'types' => '2',
		'resources' => '80-95',
		'unit'	=> 'fl',
		'min'	=>	'80',
		'max'	=>	'95'
	),

	'7'=>array(
		'cname'=>'平均红细胞血红蛋白含量',
		'ename' =>'MCH',
		'types' => '2',
		'resources' => '27-31',
		'unit'	=> 'pg',
		'min'	=>	'27',
		'max'	=>	'31'
	),

	'8'=>array(
		'cname'=>'平均红细胞血红蛋白浓度',
		'ename' =>'MCHC',
		'types' => '2',
		'resources' => '320-360',
		'unit'	=> 'g/L',
		'min'	=>	'320',
		'max'	=>	'360'
	),

	'9'=>array(
		'cname'=>'血小板计数',
		'ename' =>'PLT',
		'types' => '2',
		'resources' => '100-300',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'100',
		'max'	=>	'300'
	),
	
	'10'=>array(
		'cname'=>'淋巴细胞百分比',
		'ename' =>'LYM%',
		'types' => '2',
		'resources' => '20-40',
		'unit'	=> '%',
		'min'	=>	'20',
		'max'	=>	'40'
	),

	'11'=>array(
		'cname'=>'单核细胞百分比',
		'ename' =>'MONO%',
		'types' => '2',
		'resources' => '3-8',
		'unit'	=> '%',
		'min'	=>	'3',
		'max'	=>	'8'
	),

	'12'=>array(
		'cname'=>'单核细胞绝对值',
		'ename' =>'MONO#',
		'types' => '2',
		'resources' => '0.12-0.8',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'0.12',
		'max'	=>	'0.8'
	),

	'13'=>array(
		'cname'=>'嗜碱性粒细胞百分比',
		'ename' =>'BASO%',
		'types' => '2',
		'resources' => '0-1',
		'unit'	=> '%',
		'min'	=>	'0',
		'max'	=>	'1'
	),

	'14'=>array(
		'cname'=>'嗜碱性粒细胞绝对值',
		'ename' =>'BASO#',
		'types' => '2',
		'resources' => '0-0.1',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'0',
		'max'	=>	'0.1'
	),

	'15'=>array(
		'cname'=>'嗜酸性粒细胞百分比',
		'ename' =>'EO%',
		'types' => '2',
		'resources' => '0.5-5',
		'unit'	=> '%',
		'min'	=>	'0.5',
		'max'	=>	'5'
	),

	'16'=>array(
		'cname'=>'嗜酸性粒细胞绝对值',
		'ename' =>'EO#',
		'types' => '2',
		'resources' => '0.02-0.5',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'0.02',
		'max'	=>	'0.5'
	),

	'17'=>array(
		'cname'=>'中性粒细胞百分比',
		'ename' =>'NEUT%',
		'types' => '2',
		'resources' => '50-70',
		'unit'	=> '%',
		'min'	=>	'50',
		'max'	=>	'70'
	),

	'18'=>array(
		'cname'=>'淋巴细胞绝对值',
		'ename' =>'LYM#',
		'types' => '2',
		'resources' => '0.8-4',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'0.8',
		'max'	=>	'4'
	),

	'19'=>array(
		'cname'=>'中性粒细胞绝对值',
		'ename' =>'MEUT#',
		'types' => '2',
		'resources' => '2-7',
		'unit'	=> '10<sup>9</sup>/L',
		'min'	=>	'2',
		'max'	=>	'7'
	),

	'20'=>array(
		'cname'=>'红细胞分布宽度',
		'ename' =>'RDW-SD',
		'types' => '2',
		'resources' => '37-51',
		'unit'	=> 'fL',
		'min'	=>	'37',
		'max'	=>	'51'
	),

	'21'=>array(
		'cname'=>'红细胞分布宽度变异系数',
		'ename' =>'RDW-CV',
		'types' => '2',
		'resources' => '0-15',
		'unit'	=> '%',
		'min'	=>	'0',
		'max'	=>	'15'
	),

	'22'=>array(
		'cname'=>'血小板分布宽度',
		'ename' =>'PDW',
		'types' => '2',
		'resources' => '9-13',
		'unit'	=> 'fl',
		'min'	=>	'9',
		'max'	=>	'13'
	),

	'23'=>array(
		'cname'=>'血小板平均体积',
		'ename' =>'MPV',
		'types' => '2',
		'resources' => '9-17',
		'unit'	=> 'fl',
		'min'	=>	'9',
		'max'	=>	'17'
	),

	'24'=>array(
		'cname'=>'大型血小板比率',
		'ename' =>'P-LCR',
		'types' => '2',
		'resources' => '0.13-0.43',
		'unit'	=> '',
		'min'	=>	'0.13',
		'max'	=>	'0.43'
	),

	'25'=>array(
		'cname'=>'血小板压积',
		'ename' =>'PCT',
		'types' => '2',
		'resources' => '0.1-0.3',
		'unit'	=> '%',
		'min'	=>	'0.1',
		'max'	=>	'0.3'
	),
);

