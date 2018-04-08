<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include(APPPATH.'libraries/alidayu/TopSdk.php');
/**
* 后台用户管理，管理前台用户信息
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Main extends CI_Controller {
	public $before_filter	=	'admin';
	public $_userid;
	//队列
	public $queue;

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
		
		$this->load->model('Member_model');
		$this->_userid	=	$this->session->userdata('userid');
	}

	/**
	* 添加用户
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function add(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$info	=	array();
			$info['group']		=	$post['group'] ? intval($post['group']) : '0';
			$info['desc']		=	strip_tags($post['desc']);
			$info['add_time']	=	time();
			$where = array();
			$where['group'] = $info['group'];
			$data = $this->Member_model->listsArr($where);
			
			//短信群发
			ignore_user_abort();
			set_time_limit(0);
			$c = new TopClient;
			$c->appkey = '23336138';
			$c->secretKey = 'feb18f626a92a6cece592fa69f834bbd';
			$req = new AlibabaAliqinFcSmsNumSendRequest;
			$req->setExtend("123456");
			$req->setSmsType("normal");
			$req->setSmsFreeSignName("大鱼测试");
			$req->setSmsTemplateCode("SMS_7305274");
			
			foreach ($data['info'] as $key => $value) {
				$res = isset($value['nickname']) ?  $value['nickname'] : '' ;
				echo $res;
				$req->setSmsParam("{'name':$res}");
				$req->setRecNum($value['phone']);
				$resp = $c->execute($req);
			}

			if ( $resp ) {
				//记录后台操作日志
				manage_log('message','main','add','/message/main/add','短信群发',array('group'=>$info['group'],'desc'=>$info['desc']));
			}
			// redirect(site_aurl('message/main/add'));
			// exit;
		}else{
			$data	=	array();
			//	查询用户组信息
			$this->load->model('Member_group_model');
			$ginfo			=	$this->Member_group_model->lists('',1,1000);
			$data['group']	=	$ginfo && $ginfo['info'] ? $ginfo['info'] : array();
			$this->load->view('message/add',$data);
		}
	}
}

