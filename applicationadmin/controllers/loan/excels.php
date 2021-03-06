<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
header("Content-Type:text/html;charset=utf-8");
/**
* 后台项目管理
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Excels extends CI_Controller {
	public $before_filter	=	'admin';
	public $_userid;

	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();

		ini_set('memory_limit', '128M');
		set_time_limit(0);
		$this->load->model('Loan_model');
	}

/*****************************导出************************************/
	public function index(){

		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('q',TRUE);

		//获取数据
		$data		=	$this->Loan_model->excels_search($where='',$keywords);
		$data['total']	=	$data['total'] ? $data['total'] : 0;
		$this->config->set_item('enable_query_strings',FALSE);
		$user = $data['uid'];
		$this->export($user);
	}



	/**********************************************/
	public function export($ids = ''){
		//引入PHPExcel库文件（路径根据自己情况）
		include './statics/phpexcel/Classes/PHPExcel.php';
		//创建对象
		$this->excel = new PHPExcel();
		$this->one($ids);

		//echo '<pre>';print_r($this->one($ids));die;

		usleep(100000);

		$write = new PHPExcel_Writer_Excel5($this->excel);
		//发送标题强制用户下载文件
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel;charset=UTF-8');
		header('Content-Disposition: attachment;filename="Products_'.date('dMy').'.xls"');
		header('Cache-Control: max-age=0');
		$write->save('php://output');
	}

	/**
	 * 基本信息
	 * @author	laifei
	 * @copyright	lf@uptosci.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function one($ids){
		$one  =	$this->Loan_model->one($ids);
		//添加时间
		for ($b=0;$b<count($one);$b++) {
			if($one[$b]['idcard'] != 0) {
				$one[$b]['idcard']=     " ".$one[$b]['idcard']." " ;
			}

			if($one[$b]['addtime'] != 0) {
				$one[$b]['addtime']=date('Y-m-d H:i:s',$one[$b]['addtime']);
			} else if($one[$b]['addtime'] == 0) {
				$one[$b]['addtime'] = '-';
			}

			if($one[$b]['status'] == 0) {
				$one[$b]['status']='未处理';
			}elseif($one[$b]['status'] == 1){
				$one[$b]['status']='已处理';
			}

			/*if(isset($one[$b]['idcard']) && $one[$b]['idcard'] != ''){
				$one[$b]['idcard'] = intval($one[$b]['idcard']);
			}*/
		}

		//表格宽度
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('W')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('X')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
		$this->excel->getActiveSheet()->getColumnDimension('Z')->setWidth(40);

		//文字左右居中
		$this->excel->getActiveSheet()->getStyle('A')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('C')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('D')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('E')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('F')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('G')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('H')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('I')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('J')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('K')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('L')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('M')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('N')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('O')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('P')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Q')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('R')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('S')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('U')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('V')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('W')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('X')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Y')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$this->excel->getActiveSheet()->getStyle('Z')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);


		//Excel表格式,这里简略写了8列
		$this->excel->getActiveSheet()->setTitle('贷款信息');
		//$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$letter = array('A','B','C','D','E','F','G','H','I');

		//表头数组
		$tableheader = array('编号','电话','姓名','身份证号','金额','用途','地区','申请时间','状态');

		//填充表头信息
		for($i = 0;$i < count($tableheader);$i++) {
			$this->excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
		}

		//填充表格信息
		for ($i = 2;$i <= count($one) + 1;$i++) {
			$j = 0;
			foreach ($one[$i - 2] as $key=>$value) {
				$this->excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
				$j++;
			}
		}
	}
}

