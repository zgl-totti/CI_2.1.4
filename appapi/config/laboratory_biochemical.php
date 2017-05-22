<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//	实验室检查 血生化

//	
$config['labory']	=	array(
	

	'1'=>array(
		'cname'=>'丙氨酸氨基转移酶',
		'ename' =>'ALT',
		'resources' => '0.00-40.00',
		'unit'	=> 'U/L',
		'min'	=>	'0.00',
		'max'	=>	'40.00'
	),

	'2'=>array(
		'cname'=>'天冬氨酸氨基转移酶',
		'ename' =>'AST',
		'resources' => '0.00-40.00',
		'unit'	=> 'U/L',
		'min'	=>	'0.00',
		'max'	=>	'40.00'
	),

	'3'=>array(
		'cname'=>'总蛋白定量',
		'ename' =>'TP',
		'resources' => '62.00-85.00',
		'unit'	=> 'g/L',
		'min'	=>	'62.00',
		'max'	=>	'85.00'
	),

	'4'=>array(
		'cname'=>'白蛋白定量',
		'ename' =>'ALB',
		'resources' => '35.00-53.00',
		'unit'	=> 'g/L',
		'min'	=>	'35.00',
		'max'	=>	'53.00'
	),

	'5'=>array(
		'cname'=>'球蛋白',
		'ename' =>'GLO',
		'resources' => '20-35',
		'unit'	=> 'g/L',
		'min'	=>	'20',
		'max'	=>	'35'
	),

	'6'=>array(
		'cname'=>'白球比',
		'ename' =>'A/G',
		'resources' => '1.1-2.5',
		'unit'	=> 'g/L',
		'min'	=>	'1.1',
		'max'	=>	'2.5'
	),

	'7'=>array(
		'cname'=>'γ - 谷氨酰转肽酶',
		'ename' =>'GGT',
		'resources' => '0.00-50.00',
		'unit'	=> 'U/L',
		'min'	=>	'0.00',
		'max'	=>	'50.00'
	),

	'8'=>array(
		'cname'=>'碱性磷酸酶',
		'ename' =>'ALP',
		'resources' => '20.00-132.00',
		'unit'	=> 'U/L',
		'min'	=>	'20.00',
		'max'	=>	'132.00'
	),

	'9'=>array(
		'cname'=>'总胆红素(化学法)',
		'ename' =>'TBil',
		'resources' => '3.40-20.00',
		'unit'	=> 'umol/L',
		'min'	=>	'3.40',
		'max'	=>	'20.00'
	),

	'10'=>array(
		'cname'=>'直接胆红素',
		'ename' =>'DBil',
		'resources' => '0.00-7.10',
		'unit'	=> 'umol/L',
		'min'	=>	'0.00',
		'max'	=>	'7.10'
	),

	'11'=>array(
		'cname'=>'血清总胆汁酸(循环酶法)',
		'ename' =>'TBA',
		'resources' => '0.00-10.00',
		'unit'	=> 'umol/L',
		'min'	=>	'0.00',
		'max'	=>	'10.00'
	),

	'12'=>array(
		'cname'=>'乳酸脱氢酶',
		'ename' =>'LDH',
		'resources' => '109.00-245.00',
		'unit'	=> 'U/L',
		'min'	=>	'109.00',
		'max'	=>	'245.00'
	),

	'13'=>array(
		'cname'=>'α-羟丁酸脱氢酶',
		'ename' =>'HBDH',
		'resources' => '60.00-182.00',
		'unit'	=> 'IU/L',
		'min'	=>	'60.00',
		'max'	=>	'182.00'
	),

	'14'=>array(
		'cname'=>'钾(血，尿或体液)',
		'ename' =>'K',
		'resources' => '3.5-5.5',
		'unit'	=> 'mmol/L',
		'min'	=>	'3.5',
		'max'	=>	'5.5'
	),

	'15'=>array(
		'cname'=>'钠(血，尿或体液)',
		'ename' =>'Na',
		'resources' => '135-145',
		'unit'	=> 'mmol/L',
		'min'	=>	'135',
		'max'	=>	'145'
	),

	'16'=>array(
		'cname'=>'氯(血，尿或体液)',
		'ename' =>'Cl',
		'resources' => '96-108',
		'unit'	=> 'mmol/L',
		'min'	=>	'96',
		'max'	=>	'108'
	),

	'17'=>array(
		'cname'=>'肌酸激酶',
		'ename' =>'CK',
		'resources' => '24.00-195.00',
		'unit'	=> 'U/L',
		'min'	=>	'24.00',
		'max'	=>	'195.00'
	),

	'18'=>array(
		'cname'=>'肌酸激酶同功酶MB',
		'ename' =>'CK-MB',
		'resources' => '0.00-24.00',
		'unit'	=> 'U/L',
		'min'	=>	'0.00',
		'max'	=>	'24.00'
	),

	'19'=>array(
		'cname'=>'肌酐(酶法)',
		'ename' =>'CRE',
		'resources' => '59-104',
		'unit'	=> 'umol/L',
		'min'	=>	'59',
		'max'	=>	'104'
	),

	'20'=>array(
		'cname'=>'尿素氮(酶法)',
		'ename' =>'BUN',
		'resources' => '2.80-8.19',
		'unit'	=> 'mmol/L',
		'min'	=>	'2.80',
		'max'	=>	'8.19'
	),

	'21'=>array(
		'cname'=>'尿酸',
		'ename' =>'UA',
		'resources' => '90.00-430.00',
		'unit'	=> 'umol/L',
		'min'	=>	'90.00',
		'max'	=>	'430.00'
	),

	'22'=>array(
		'cname'=>'β 2微球蛋白(国产试剂)',
		'ename' =>'BMG',
		'resources' => '90.00-430.00',
		'unit'	=> 'mg/L',
		'min'	=>	'1.00',
		'max'	=>	'3.00'
	),

	'23'=>array(
		'cname'=>'血糖(空腹)',
		'ename' =>'GLU',
		'resources' => '3.90-6.10',
		'unit'	=> 'mmol/L',
		'min'	=>	'3.90',
		'max'	=>	'6.10'
	),

	'24'=>array(
		'cname'=>'高密度脂蛋白胆固醇(一步法)',
		'ename' =>'HDL',
		'resources' => '0.91-2.27',
		'unit'	=> 'mmol/L',
		'min'	=>	'0.91',
		'max'	=>	'2.27'
	),

	'25'=>array(
		'cname'=>'总胆固醇',
		'ename' =>'CHO',
		'resources' => '3.10-5.70',
		'unit'	=> 'mmol/L',
		'min'	=>	'3.10',
		'max'	=>	'5.70'
	),

	'26'=>array(
		'cname'=>'甘油三酯',
		'ename' =>'TG',
		'resources' => '0.00-2.29',
		'unit'	=> 'mmol/L',
		'min'	=>	'0.00',
		'max'	=>	'2.29'
	),

	'27'=>array(
		'cname'=>'载脂蛋白-A1(进口试剂)',
		'ename' =>'apoAl',
		'resources' => '1.00-1.76',
		'unit'	=> 'g/L',
		'min'	=>	'1.00',
		'max'	=>	'1.76'
	),

	'28'=>array(
		'cname'=>'载脂蛋白-B(进口试剂)',
		'ename' =>'apoB',
		'resources' => '0.60-1.2',
		'unit'	=> 'g/L',
		'min'	=>	'0.60',
		'max'	=>	'1.2'
	),

	'29'=>array(
		'cname'=>'无机磷',
		'ename' =>'IP',
		'resources' => '0.80-1.60',
		'unit'	=> 'mmol/L',
		'min'	=>	'0.80',
		'max'	=>	'1.60'
	),

	'30'=>array(
		'cname'=>'C-反应蛋白(进口试剂快速法)',
		'ename' =>'CRP',
		'resources' => '0-6',
		'unit'	=> 'mg/L',
		'min'	=>	'0',
		'max'	=>	'6'
	),

	'31'=>array(
		'cname'=>'二氧化碳(结合力)(电极法)',
		'ename' =>'CO2CP',
		'resources' => '20-29',
		'unit'	=> 'mmol/L',
		'min'	=>	'20',
		'max'	=>	'29'
	),

	'32'=>array(
		'cname'=>'抗链球菌溶血素"0"试验(进口试剂)',
		'ename' =>'ASO',
		'resources' => '0.00-200.00',
		'unit'	=> 'IU/ml',
		'min'	=>	'0.00',
		'max'	=>	'200.00'
	),

	'33'=>array(
		'cname'=>'类风湿因子',
		'ename' =>'RF',
		'resources' => '0.00-30.00',
		'unit'	=> 'IU/ml',
		'min'	=>	'0.00',
		'max'	=>	'30.00'
	),

	'34'=>array(
		'cname'=>'CA(总钙)',
		'ename' =>'CA',
		'resources' => '2.1-2.7',
		'unit'	=> 'mmol/L',
		'min'	=>	'2.1',
		'max'	=>	'2.7'
	),

	'35'=>array(
		'cname'=>'低密度脂蛋白胆固醇(一步法)',
		'ename' =>'LDL',
		'resources' => '正常人群 < 3.90;<br/>高危人群 < 2.59;<br/>极高危人群 < 2.0;',
		'unit'	=> 'mmol/L',
		'min'	=>	'',
		'max'	=>	''
	),
);

