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
		$this->load->model('Order_model');

		ini_set('memory_limit', '128M');
		set_time_limit(0);
	}
/*****************************搜索导出************************************/
	public function index(){
		//	姓名、病历号、身份证、手机号
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('q',TRUE);
		///时间条件
		if ($_GET['start']) {
			$start = str_format_time($_GET['start']);
		}

		if ($_GET['end']) {
			$end = str_format_time($_GET['end']);
		}

		if ($start && $end) {
			$where = "add_time  between  $start and $end";
		} elseif ($start) {
			$where['add_time >'] = $start;
		} elseif ($end ) {
			$where['add_time <'] = $end;
		}

		//	获取数据
		$data =	$this->Order_model->excels_search($where,$keywords);
		$data['total']	=	$data['total'] ? $data['total'] : 0;

		$this->config->set_item('enable_query_strings',FALSE);
		$user = $data['uid'];
		//echo '<pre>';	print_r($user);die;
		$this->export($user);
	}


	/**********************************************/
	public function export($ids = ''){
		//print_r($ids) ;die;

		//引入PHPExcel库文件（路径根据自己情况）
		include './statics/phpexcel/Classes/PHPExcel.php';
		//创建对象
		$this->excel = new PHPExcel();
		$this->one($ids);

		//延迟
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
	 * 处理基本信息
	 * @author	laifei
	 * @copyright	lf@uptosci.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function one($ids){
		$one  =	$this->Order_model->one($ids);
		//添加时间
		for ($b=0;$b<count($one);$b++) {
            //添加时间
			if($one[$b]['add_time'] != '0') {
				$one[$b]['add_time']=date('Y-m-d H:i:s',$one[$b]['add_time']);
			} else if($one[$b]['add_time'] == '0') {
				$one[$b]['add_time'] = '-';
			}

            //付款时间
			if($one[$b]['update_time'] != '0') {
				$one[$b]['update_time']=date('Y-m-d H:i:s',$one[$b]['update_time']);
			} else if($one[$b]['update_time'] == '0') {
				$one[$b]['update_time'] = '-';
			}

            //兑换时间
			if($one[$b]['exchange_time'] != '0') {
			    $one[$b]['exchange_time']=date('Y-m-d H:i:s',$one[$b]['exchange_time']);
			} else if($one[$b]['exchange_time'] == '0') {
				$one[$b]['exchange_time'] = '-';
			}

            //账号
			if($one[$b]['account_num'] != 0) {
				$one[$b]['account_num']=     " ".$one[$b]['account_num']." " ;
			}

			if($one[$b]['status_user'] == 0) {
			    $one[$b]['status_user']='未付款';
			}elseif($one[$b]['status_user'] == 1){
				$one[$b]['status_user']='已付款';
			}elseif($one[$b]['status_user'] == 2){
				$one[$b]['status_user']='订单撤销';
			}elseif($one[$b]['status_user'] == 3){
				$one[$b]['status_user']='已兑换';
			}

			/*if(isset($one[$b]['idcard']) && $one[$b]['idcard'] != '')
			{
			id,ordernum,phone,status_user,update_time
				$one[$b]['idcard'] = intval($one[$b]['idcard']);
			}*/
		}

		//表格宽度
		$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);
		$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(25);
		$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
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
		$this->excel->getActiveSheet()->setTitle('订单信息');
		$letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		//表头数组a.id ,a.ordernum,a.phone,b.nickname, a.gname,a.number,a.total,a.status_user,a.update_time,c.shopsname,c.account_num,c.account_name

		$tableheader = array('编号','订单号','电话','姓名', '商品名称','商品数量','总价','状态','下单时间','付款时间','兑换时间','商铺名称','商铺账号','商铺开户行','开户人名字');

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

