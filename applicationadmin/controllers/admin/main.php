<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台首页相关操作
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Main extends CI_Controller {
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
		
		$this->_userid	=	$this->session->userdata('userid');
	}

	/**
	* 后台管理登录页面
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		//	获取当前管理员信息
		$this->load->model('Admin_model');
		$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);
		
		//	获取管理员组信息
		$roleinfo	=	array();
		if ( $userInfo && $userInfo['roleid'] ) {
			$this->load->model('Role_model');
			$roleinfo	=	$this->Role_model->get_role_one(
				array('roleid'=>$userInfo['roleid']));
		}

		if ( $roleinfo ) {
			$userInfo['rolename']	=	$roleinfo['rolename'];
		}

		$this->load->vars($userInfo);
		$this->load->view('index');
	}
	
	/**
	* 退出
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function logout(){
		$this->load->model('Adminusers_model');
		$this->Adminusers_model->logout();
		redirect(site_aurl('login'));
	}

	
}

/* End of file main.php */
/* Location: ./application/controllers/admin/main.php */