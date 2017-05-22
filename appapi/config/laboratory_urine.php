<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 尿常规

//	
$config['labory']	=	array(
	'1'=>array(
		'cname'	=> '白细胞(UF)',
		'ename' => 'WBC(UF)',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '0-30',
		'min'	=> '0',
		'max'	=> '30'
	),
	
	'2'=>array(
		'cname'	=> '红细胞',
		'ename' => 'RBC',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '0-25',
		'min'	=> '0',
		'max'	=> '25'
	),

	'3'=>array(
		'cname'	=> '上皮细胞',
		'ename' => 'EC',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '0-15',
		'min'	=> '0',
		'max'	=> '5'
	),
	
	'4'=>array(
		'cname'	=> '管型',
		'ename' => 'CAST',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '0-1.3',
		'min'	=> '0',
		'max'	=> '1.3'
	),

	'5'=>array(
		'cname'	=> '细菌',
		'ename' => 'BACT',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '0-130',
		'min'	=> '0',
		'max'	=> '130'
	),

	'6'=>array(
		'cname'	=> '病理管型',
		'ename' => 'P.CAST',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'7'=>array(
		'cname'	=> '小圆上皮细胞数量',
		'ename' => 'SRC',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'8'=>array(
		'cname'	=> '类酵母细胞数量',
		'ename' => 'YLC',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'9'=>array(
		'cname'	=> '完整红细胞百分比',
		'ename' => 'Non-Lysed-RBC%',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'10'=>array(
		'cname'	=> '完整红细胞绝对值',
		'ename' => 'Non-Lysed-RBC#',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'11'=>array(
		'cname'	=> '红细胞信息',
		'ename' => 'RBC-Info',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'12'=>array(
		'cname'	=> '70%红细胞平均体积',
		'ename' => 'RBC-P70Fsc',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'13'=>array(
		'cname'	=> '结晶数量',
		'ename' => 'XTAL',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'14'=>array(
		'cname'	=> '粘液丝数量',
		'ename' => 'MUCUS',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'15'=>array(
		'cname'	=> '电导率',
		'ename' => 'Cond.',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'16'=>array(
		'cname'	=> '总数',
		'ename' => 'TOTAL',
		'types' => '1',
		'unit'	=> '/ul',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'17'=>array(
		'cname'	=> '比重',
		'ename' => 'SG',
		'types' => '1',
		'unit'	=> '',
		'reference' => '1.003-1.030',
		'min'	=> '1.003',
		'max'	=> '1.030'
	),

	'18'=>array(
		'cname'	=> 'PH',
		'ename' => 'PH',
		'types' => '1',
		'unit'	=> '',
		'reference' => '4.6-8.0',
		'min'	=> '4.6',
		'max'	=> '8.0'
	),

	'19'=>array(
		'cname'	=> '白细胞',
		'ename' => 'LEU',
		'types' => '2',
		'unit'	=> '/ul',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'20'=>array(
		'cname'	=> '亚硝盐酸',
		'ename' => 'NIT',
		'types' => '2',
		'unit'	=> '',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'21'=>array(
		'cname'	=> '蛋白质',
		'ename' => 'PRO',
		'types' => '2',
		'unit'	=> 'g/l',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'22'=>array(
		'cname'	=> '葡萄糖',
		'ename' => 'GLU',
		'types' => '2',
		'unit'	=> 'mmol/l',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'23'=>array(
		'cname'	=> '酮体',
		'ename' => 'KET',
		'types' => '2',
		'unit'	=> 'mmol/L',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'24'=>array(
		'cname'	=> '尿胆原',
		'ename' => 'UBG',
		'types' => '2',
		'unit'	=> 'umol/l',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'25'=>array(
		'cname'	=> '胆红素',
		'ename' => 'BIL',
		'types' => '2',
		'unit'	=> 'umol/l',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'26'=>array(
		'cname'	=> '红细胞',
		'ename' => 'ERY',
		'types' => '2',
		'unit'	=> '/ul',
		'result' => array('1'=>'阴性','2'=>'阳性'),
		'reference'=> '阴性'
	),

	'27'=>array(
		'cname'	=> '颜色',
		'ename' => '颜色',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'28'=>array(
		'cname'	=> '浊度',
		'ename' => '浊度',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),

	'29'=>array(
		'cname'	=> '白细胞(高倍视野)',
		'ename' => 'WBC(JJ)',
		'types' => '1',
		'unit'	=> '/HP',
		'reference' => '<3/HP',
		'min'	=> '',
		'max'	=> '3'
	),

	'30'=>array(
		'cname'	=> '红细胞(高倍视野)',
		'ename' => 'RBC(JJ)',
		'types' => '1',
		'unit'	=> '/HP',
		'reference' => '未见',
		'min'	=> '',
		'max'	=> ''
	),

	'31'=>array(
		'cname'	=> '管型(低倍视野)',
		'ename' => 'CAST(JJ)',
		'types' => '1',
		'unit'	=> '/LP',
		'reference' => '未见',
		'min'	=> '',
		'max'	=> ''
	),

	'32'=>array(
		'cname'	=> '其他',
		'ename' => 'OTHER(JJ)',
		'types' => '1',
		'unit'	=> '',
		'reference' => '',
		'min'	=> '',
		'max'	=> ''
	),
);

