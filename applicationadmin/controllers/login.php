<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 管理员用户登录动作处理
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Login extends CI_Controller {
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
		if ( $this->_userid ) {
			redirect(site_aurl('admin/main'));
			exit;
		}
	}

	/**
	* 后台管理登录页面
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($message = '' ){
		$data	=	array();
		
		//	防止跨站脚本提交数据
		$data['csrftoken']	=	md5(uniqid(rand(), TRUE));
		$this->input->set_cookie('csrftoken',$data['csrftoken'],3600); 

		$data['message']=	'';
		
		if ( isset($message) && $message) {
			switch($message){
				case 1:
					$data['message']=	'请重新登录！';
					break;
				case '2':
				case '3':
					$data['message']=	'请确认输入的用户名密码！';
					break;
				case '4':
					$data['message']=	'用户名或密码错误！';
					break;
			}
		}
		$this->load->view('login',$data);
	}

	/**
	* 管理员登录动作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function loginin(){
		$data	=	$this->input->post(NULL,TRUE);
	
		//	登录判断token 防止跨站提交
		if ( !isset($data['csrftoken']) || !$data['csrftoken'] ) {
			redirect(site_aurl('login/index/1'));
		}
		$csrf	=	$this->input->cookie('csrftoken');
		if ( $csrf != $data['csrftoken'] ) {
			redirect(site_aurl('login/index/1'));
		}

		//	用户名为空
		if ( !isset($data['username']) || !$data['username'] ) {
			redirect(site_aurl('login/index/2'));
		}
		//	密码为空
		if ( !isset($data['password']) || !$data['password'] ) {
			redirect(site_aurl('login/index/3'));
		}
		$userinfo	=	array();
		if ( isset($data['submit']) && $data['submit'] ) {

			//	严重管理员登录是否正确
			$this->load->model('adminusers_model');
			$userinfo	=	$this->adminusers_model->login($data['username'],$data['password']);
			
			//	删除掉csrftoken
			$this->input->set_cookie('csrftoken','');
			
			$uid	=	trim(aesencode($userinfo['userid']));
			
			//	设置管理用户登录cookie
			$this->input->set_cookie('auserid',$uid,time()+86400*30); 
		}

		if ($userinfo) {
			//	记录后台操作日志
			manage_log('login','loginin','','/login/loginin','管理员登录');

			redirect(site_aurl('admin/main'));
			exit;
		}

		redirect(site_aurl('login/index/1'));
		exit;
	}
}

/* End of file login.php */
/* Location: ./application/controllers/admin/login.php */