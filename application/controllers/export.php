<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 导出
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Export extends CI_Controller {
	//	权限验证
	public $before_filter	=	'checkuser';
	//	用户id
	public $userid;
	//	excel
	public $objPHPExcel;
	//	默认Tsheet
	public $tsheet	=	array('A','B','C','D','E','F','G','H','I','J','K','L','M',
		'N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL');
	public $activeSheet	=	0;

	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();

		$userid	=	$this->input->cookie('user',true);
		$this->userid	=	$userid ? aesDecode($userid) : '';
		$this->load->model('Patients_model');
		$this->load->model('Export_model');
	}

	/**
	* 导出
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		set_time_limit(0);
		//	姓名、病历号、身份证、手机号
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('search',TRUE);
		$data		=	array();
		$keywords	=	$keywords ? trim($keywords) : '';
		$where		=	array();
		$where['userid']	=	$this->userid;
		$where['status']	=	99;
		$btimes	=	$this->input->get('btimes',TRUE);
		$etimes	=	$this->input->get('etimes',TRUE);
		$sqlresult	=	$this->input->get('result',TRUE) ? $this->input->get('result',TRUE) : '';
		$sqlresult	=	$sqlresult ? intval($sqlresult) : '';
		//	如果有传递 $btimes 和 $etimes 判断下大小
		$where_start_time	=	strtotime($btimes) ? strtotime($btimes) : 0;
		$where_end_time		=	strtotime($etimes) ? strtotime($etimes) : 0;
		if( $where_start_time > $where_end_time ) {
			$tmp	=	$btimes;
			$btimes	=	$etimes;
			$etimes	=	$tmp;
			unset($tmp);
		}
		$btimes		=	$btimes ? strtotime($btimes.' 00:00:00') : '';
		$etimes		=	$etimes ? strtotime($etimes.' 00:00:00') : '';
		if ( $btimes ) {
			$where['add_time >= ']	=	$btimes;
		}
		if ( $etimes ) {
			$where['add_time < ']	=	$etimes;
		}
		if ($sqlresult) {
			$where['result']	=	$sqlresult;
		}
		//	获取数据
		$this->Export_model->set_table('patients');
		$data		=	$this->Export_model->search($where,$keywords);
		$this->config->set_item('enable_query_strings',FALSE);
		//	如果未查找到数据，则跳转会首页
		if ( !$data ) {
			redirect('home');
			exit;
		}
		$this->load->library('PHPExcel'); 
		$this->load->library('PHPExcel/IOFactory'); 
		$this->objPHPExcel = new PHPExcel();
		$this->setpatients($data);
		$this->objPHPExcel->setActiveSheetIndex(0); 
		$objWriter = IOFactory::createWriter($this->objPHPExcel, 'Excel5'); 
		//发送标题强制用户下载文件 
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="lists_'.date('dMy').'.xls"'); 
		header('Cache-Control: max-age=0'); 
		$objWriter->save('php://output'); 
	}

	/**
	* 设置患者基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	private function setpatients($data){
		$this->config->load('patients', TRUE);
		$configs	=	$this->config->item('patients');
		$this->objPHPExcel->setActiveSheetIndex($this->activeSheet);
		$objActSheet = $this->objPHPExcel->getActiveSheet(); 
		$objActSheet->setTitle('信息');
		//	设置标题
		$this->objPHPExcel->getActiveSheet()->mergeCells('A1:J2');
		$objActSheet->setCellValue('A1', '基本信息');
		$objActSheet->setCellValue('A3', '医院编号');
		$objActSheet->getColumnDimension('A')->setWidth(15);
		$objActSheet->getStyle('A')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('B3', '医院大区');
		$objActSheet->setCellValue('C3', '医院名称');
		$objActSheet->setCellValue('D3', '录入时间');
		$objActSheet->setCellValue('E3', '门诊号');
		$objActSheet->setCellValue('F3', '住院号');
		$objActSheet->setCellValue('G3', '患者姓名');
		$objActSheet->getColumnDimension('G')->setWidth(15);
		$objActSheet->getStyle('G')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('H3', '性别');
		$objActSheet->setCellValue('I3', '年龄');
		$objActSheet->setCellValue('J3', '糖尿病');
		$this->objPHPExcel->getActiveSheet()->mergeCells('K1:M2');
		$objActSheet->setCellValue('K1', '第一部分 神经病变症状（远端、对称性）');
		$objActSheet->setCellValue('K3', '主要症状');
		$objActSheet->getColumnDimension('K')->setWidth(15);
		$objActSheet->getStyle('K')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('L3', '分布方式');
		$objActSheet->getColumnDimension('L')->setWidth(15);
		$objActSheet->getStyle('L')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('M3', '判断神经病变症状（远端、对称性）');
		$objActSheet->getColumnDimension('M')->setWidth(30);
		$objActSheet->getStyle('M')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$this->objPHPExcel->getActiveSheet()->mergeCells('N1:P2');
		$objActSheet->setCellValue('N1', '第二部分 须鉴别诊断既往病史 ( 帮助鉴别有无其他类似临床症状和体征的病变 )');
		$objActSheet->setCellValue('N3', '骨科相关病史');
		$objActSheet->getColumnDimension('N')->setWidth(25);
		$objActSheet->getStyle('N')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('O3', '神经内科相关病史');
		$objActSheet->getColumnDimension('O')->setWidth(25);
		$objActSheet->getStyle('O')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('P3', '其他相关病史');
		$objActSheet->getColumnDimension('P')->setWidth(25);
		$objActSheet->getStyle('P')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$this->objPHPExcel->getActiveSheet()->mergeCells('Q1:AI1');
		$objActSheet->setCellValue('Q1', '第三部分 DSPN 筛查');
		$this->objPHPExcel->getActiveSheet()->mergeCells('Q2:S2');
		$objActSheet->setCellValue('Q2', '踝反射5');
		$objActSheet->setCellValue('Q3', '左侧');
		$objActSheet->setCellValue('R3', '右侧');
		$objActSheet->setCellValue('S3', '判断');
		$this->objPHPExcel->getActiveSheet()->mergeCells('T2:V2');
		$objActSheet->setCellValue('T2', '针刺痛觉6');
		$objActSheet->getColumnDimension('T')->setWidth(15);
		$objActSheet->getStyle('T')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('T3', '左侧');
		$objActSheet->setCellValue('U3', '右侧');
		$objActSheet->setCellValue('V3', '判断');
		$this->objPHPExcel->getActiveSheet()->mergeCells('W2:Y2');
		$objActSheet->setCellValue('W2', '温度觉7');
		$objActSheet->getColumnDimension('W')->setWidth(15);
		$objActSheet->getStyle('W')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('W3', '左侧');
		$objActSheet->setCellValue('X3', '右侧');
		$objActSheet->setCellValue('Y3', '判断');
		$this->objPHPExcel->getActiveSheet()->mergeCells('Z2:AB2');
		$objActSheet->setCellValue('Z2', '振动觉8(128Hz 音叉)');
		$objActSheet->getColumnDimension('Z')->setWidth(15);
		$objActSheet->getStyle('Z')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('Z3', '左侧');
		$objActSheet->setCellValue('AA3', '右侧');
		$objActSheet->setCellValue('AB3', '判断');
		$this->objPHPExcel->getActiveSheet()->mergeCells('AC2:AE2');
		$objActSheet->setCellValue('AC2', '压力觉9(10g 单丝)');
		$objActSheet->getColumnDimension('AC')->setWidth(15);
		$objActSheet->getStyle('AC')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('AC3', '左侧');
		$objActSheet->setCellValue('AD3', '右侧');
		$objActSheet->setCellValue('AE3', '判断');
		$objActSheet->setCellValue('AF2', '完成检查');
		$objActSheet->getColumnDimension('AF')->setWidth(15);
		$objActSheet->getStyle('AF')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('AG2', '初步诊断10');
		$objActSheet->getColumnDimension('AG')->setWidth(15);
		$objActSheet->getStyle('AG')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('AH2', '医生签名');
		$objActSheet->getColumnDimension('AH')->setWidth(15);
		$objActSheet->getStyle('AH')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		$objActSheet->setCellValue('AI2', '医生签名日期');
		$objActSheet->getColumnDimension('AI')->setWidth(15);
		$objActSheet->getStyle('AI')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
		//	医院配置信息
		$this->config->load('patients', TRUE);
        $configs	=	$this->config->item('patients');
		$hos		=	array();
		$hos		=	array_merge($hos,$configs['result1'],$configs['result2'],
			$configs['result3'],$configs['result4'],$configs['result5'],
			$configs['result6'],$configs['result7'],$configs['result8'],
			$configs['result9'],$configs['result10'],$configs['result11'],
			$configs['result12']);
		$i	=	4;
		$t	=	0;
		foreach($data AS $key => $val){
			//	医院编号
			$tname	=	$this->tsheet[$t];
			$t++;
			
			$objActSheet->setCellValue($tname.$i, $val['results']);
			
			//	医院大区
			$tname	=	$this->tsheet[$t];
			$t++;
			$daqu	=	'';
			if ($val['result'] && isset($configs['result'][$val['result']])) {
				$daqu	=	$configs['result'][$val['result']];
			}
			$objActSheet->setCellValue($tname.$i, $daqu);
			//	医院名称
			$tname	=	$this->tsheet[$t];
			$t++;
			$hname	=	'';
			if ( $val['results'] && isset($hos[$val['results']]) ) {
				$hname	=	$hos[$val['results']];
			}
			$objActSheet->setCellValue($tname.$i, $hname);
			//	录入时间
			$tname	=	$this->tsheet[$t];
			$t++;
			$add_time	=	'';
			if ( $val['add_time']  ) {
				$add_time	=	date('Y-m-d',$val['add_time']);
			}
			$objActSheet->setCellValue($tname.$i, $add_time);

			//	门诊号
			$tname	=	$this->tsheet[$t];
			$t++;
			$objActSheet->setCellValue($tname.$i, $val['hnumber']);

			//	住院号
			$tname	=	$this->tsheet[$t];
			$t++;
			$objActSheet->setCellValue($tname.$i, $val['ad']);

			//	姓名
			$tname	=	$this->tsheet[$t];
			$t++;
			$objActSheet->setCellValueExplicit($tname.$i, $val['names']);

			//	性别 1:男 2:女
			$tname	=	$this->tsheet[$t];
			$t++;
			$sex	=	'';
			if ($val['sex'] && $val['sex'] == 1) {
				$sex	=	'男';
			}
			if ($val['sex'] && $val['sex'] == 2) {
				$sex	=	'女';
			}
			$objActSheet->setCellValue($tname.$i, $sex);

			//	年龄
			$tname	=	$this->tsheet[$t];
			$t++;
			$age	=	$val['age'] ? $val['age'] : '';
			$objActSheet->setCellValue($tname.$i, $age);

			//	糖尿病  1:1型 2:2型
			$tname	=	$this->tsheet[$t];
			$t++;
			$mellitus	=	'';
			if ($val['mellitus'] && $val['mellitus'] == 1) {
				$mellitus	=	'1型';
			}
			if ($val['mellitus'] && $val['mellitus'] == 2) {
				$mellitus	=	'2型';
			}
			$objActSheet->setCellValue($tname.$i, $mellitus);


			//	主要症状 ( 1:麻木2:疼痛 3:感觉异常 4:针刺感 5:其他 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$symptoms	=	'';
			$val['symptoms']	=	$val['symptoms'] ? explode(',',$val['symptoms']) : array();
			$sarr	=	array('1'=>'麻木','2'=>'疼痛','3'=>'感觉异常','4'=>'针刺感','5'=>'其他-');
			if ($val['symptoms']) {
				foreach($val['symptoms'] AS $key => $val){
					if ($val == 5) {
						$symptoms	.=	$sarr[$val].'-'.$val['symptomsother'];
					}else{
						$symptoms	.=	$sarr[$val];
					}
					
				}
			}
			$objActSheet->setCellValueExplicit($tname.$i, $symptoms);

			//	分布方式 ( 1是近端 2是远端 3是 对称 4是不对称 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$distr	=	'';
			$val['distr']	=	$val['distr'] ? explode(',',$val['distr']) : array();
			$distrs	=	array('1'=>'近端','2'=>'远端','3'=>'对称','4'=>'不对称');
			if ($val['symptoms']) {
				foreach($val['symptoms'] AS $key => $val){
					$distr	.=	$distrs[$val];
				}
			}
			$objActSheet->setCellValue($tname.$i, $distr);

			//	判断神经病变症状 ( 0：未知 1:有 2：无 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$changes	=	'';
			switch($val['changes']){
				case '0':
					$changes	=	'未知';
					break;
				case '1':
					$changes	=	'有';
					break;
				case '2':
					$changes	=	'无';
					break;
				default :
					$changes	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $changes);


			//	骨科相关病史 ( 1:脊柱退行性疾病 2:骨关节 3:其它 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$bone	=	'';
			switch($val['bone']){
				case '1':
					$bone	=	'脊柱退行性疾病';
					break;
				case '2':
					$bone	=	'骨关节';
					break;
				case '3':
					$bone	=	'其他-'.$val['boneother'];
					break;
				default :
					$bone	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $bone);

			//	神经内科相关病史 ( 1:中枢神经病变 2:明确的周围神经病变 3:其它 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$nerve	=	'';
			switch($val['nerve']){
				case '1':
					$nerve	=	'中枢神经病变';
					break;
				case '2':
					$nerve	=	'明确的周围神经病变';
					break;
				case '3':
					$nerve	=	'其他-'.$val['nerveother'];
					break;
				default :
					$nerve	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $nerve);

			//	其他相关病史 ( 1:尿毒症 2:甲状腺功能亢进 3:结核用药史 4:肿瘤化疗用药史  5:长期大量饮酒史 6:遗传病史 7:其他 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$other	=	'';
			switch($val['other']){
				case '1':
					$other	=	'尿毒症';
					break;
				case '2':
					$other	=	'甲状腺功能亢进';
					break;
				case '3':
					$other	=	'结核用药史';
					break;
				case '4':
					$other	=	'肿瘤化疗用药史';
					break;
				case '5':
					$other	=	'长期大量饮酒史';
					break;
				case '6':
					$other	=	'遗传病史';
					break;
				case '7':
					$other	=	'其他-'.$val['otherother'];
					break;
				default :
					$other	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $other);

			//	踝反射(左侧) ( 1: 缺失 2：减弱 3：正常 4：亢奋 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$anklel	=	'';
			switch($val['anklel']){
				case '1':
					$anklel	=	'缺失';
					break;
				case '2':
					$anklel	=	'减弱';
					break;
				case '3':
					$anklel	=	'正常';
					break;
				case '4':
					$anklel	=	'亢奋';
					break;
				default :
					$anklel	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $anklel);

			//	踝反射(右侧) ( 1: 缺失 2：减弱 3：正常 4：亢奋 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$ankler	=	'';
			switch($val['ankler']){
				case '1':
					$ankler	=	'缺失';
					break;
				case '2':
					$ankler	=	'减弱';
					break;
				case '3':
					$ankler	=	'正常';
					break;
				case '4':
					$ankler	=	'亢奋';
					break;
				default :
					$ankler	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $ankler);

			//	判断(踝反射) (  1:阴性 2:阳性 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$ajudge	=	'';
			switch($val['ajudge']){
				case '1':
					$ajudge	=	'阴性';
					break;
				case '2':
					$ajudge	=	'阳性';
					break;
				default :
					$ajudge	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $ajudge);

			//	针刺痛觉(左侧) ( 1：缺失 2：存在 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$painl	=	'';
			switch($val['painl']){
				case '1':
					$painl	=	'缺失';
					break;
				case '2':
					$painl	=	'存在';
					break;
				default :
					$painl	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $painl);
			//	针刺痛觉(右侧) ( 1：缺失 2：存在 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$painr	=	'';
			switch($val['painr']){
				case '1':
					$painr	=	'缺失';
					break;
				case '2':
					$painr	=	'存在';
					break;
				default :
					$painr	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $painr);
			//	判断(针刺痛觉) (  1:阴性 2:阳性 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$pjudge	=	'';
			switch($val['pjudge']){
				case '1':
					$pjudge	=	'阴性';
					break;
				case '2':
					$pjudge	=	'阳性';
					break;
				default :
					$pjudge	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $pjudge);

			//	温度觉(左侧) ( 1：正常 2：异常 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$temperaturel	=	'';
			switch($val['temperaturel']){
				case '1':
					$temperaturel	=	'正常';
					break;
				case '2':
					$temperaturel	=	'异常';
					break;
				default :
					$temperaturel	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $temperaturel);
			
			//	温度觉(右侧) ( 1：正常 2：异常 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$temperaturer	=	'';
			switch($val['temperaturer']){
				case '1':
					$temperaturer	=	'正常';
					break;
				case '2':
					$temperaturer	=	'异常';
					break;
				default :
					$temperaturer	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $temperaturer);

			//	判断(温度觉) (  1:阴性 2:阳性 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$tjudge	=	'';
			switch($val['tjudge']){
				case '1':
					$tjudge	=	'阴性';
					break;
				case '2':
					$tjudge	=	'阳性';
					break;
				default :
					$tjudge	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $tjudge);


			//	振动觉（左侧） (1:存在 2：缺失)
			$tname	=	$this->tsheet[$t];
			$t++;
			$vibrationl	=	'';
			switch($val['vibrationl']){
				case '1':
					$vibrationl	=	'存在';
					break;
				case '2':
					$vibrationl	=	'缺失';
					break;
				default :
					$vibrationl	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $vibrationl);
			
			//	振动觉（右侧） (1:存在 2：缺失)
			$tname	=	$this->tsheet[$t];
			$t++;
			$vibrationr	=	'';
			switch($val['vibrationr']){
				case '1':
					$vibrationr	=	'存在';
					break;
				case '2':
					$vibrationr	=	'缺失';
					break;
				default :
					$vibrationr	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $vibrationr);

			//	判断(振动觉) (  1:阴性 2:阳性 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$vjudge	=	'';
			switch($val['vjudge']){
				case '1':
					$vjudge	=	'阴性';
					break;
				case '2':
					$vjudge	=	'阳性';
					break;
				default :
					$vjudge	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $vjudge);

			//	压力觉（左侧） ( 1：存在 2：缺失 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$pressurel	=	'';
			switch($val['pressurel']){
				case '1':
					$pressurel	=	'存在';
					break;
				case '2':
					$pressurel	=	'缺失';
					break;
				default :
					$pressurel	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $pressurel);

			//	压力觉（右侧） ( 存在 2：缺失 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$pressurer	=	'';
			switch($val['pressurer']){
				case '1':
					$pressurer	=	'存在';
					break;
				case '2':
					$pressurer	=	'缺失';
					break;
				default :
					$pressurer	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $pressurer);

			//	判断(压力觉) (  1:阴性 2:阳性 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$ejudge	=	'';
			switch($val['ejudge']){
				case '1':
					$ejudge	=	'阴性';
					break;
				case '2':
					$ejudge	=	'阳性';
					break;
				default :
					$ejudge	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $ejudge);

			//	完成时间
			$tname	=	$this->tsheet[$t];
			$t++;
			$ftime	=	'';
			if ($val['ftime']) {
				$ftime	=	date('Y-m-d',$val['ftime']);
			}
			$objActSheet->setCellValue($tname.$i, $ftime);
			
			//	初步诊断(DSPN) ( 1:临床诊断 2:疑似 3:无 )
			$tname	=	$this->tsheet[$t];
			$t++;
			$diagnosis	=	'';
			switch($val['diagnosis']){
				case '1':
					$diagnosis	=	'临床诊断';
					break;
				case '2':
					$diagnosis	=	'疑似';
					break;
				case '3':
					$diagnosis	=	'无';
					break;
					
				default :
					$diagnosis	=	'';
			}
			$objActSheet->setCellValue($tname.$i, $diagnosis);

			//	医生签名
			$tname	=	$this->tsheet[$t];
			$t++;
			$objActSheet->setCellValue($tname.$i, $val['docname']);

			//	医生签名时间
			$tname	=	$this->tsheet[$t];
			$t++;
			$dtime	=	'';
			if ($val['dtime']) {
				$dtime	=	date('Y-m-d',$val['dtime']);
			}
			$objActSheet->setCellValue($tname.$i, $dtime);

			$i++;
			$t	=	0;
		}
	}
}