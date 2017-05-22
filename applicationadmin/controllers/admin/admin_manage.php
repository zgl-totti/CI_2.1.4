<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台管理员修改密码，个人信息操作
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Admin_manage extends CI_Controller {
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

		$this->load->model('Admin_model');
	}

	/**
	* 修改密码操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($message = '' ){
		//	获取管理员信息
		$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);

		$urlArr	=	get_segment_arr();
		
		if ( isset($message) && $message) {
			$data	=	array();
			switch($message){
				case 1:
					$data['changepwdmessage']	=	'旧密码不正确，修改失败！';
					$data['changepwdstatus']	=	1;
					break;
				case '2':
					$data['changepwdmessage']	=	'新密码两次输入不一致！';
					$data['changepwdstatus']	=	2;
					break;
				case '3':
					$data['changepwdmessage']	=	'修改成功！';
					$data['changepwdstatus']	=	3;
					break;
			}
			$this->load->vars($data);
		}
		
		//	查看用户角色信息
		if ( $userInfo['roleid'] ) {
			$this->load->model('Role_model');
			$where		=	array('roleid'=>$userInfo['roleid']);
			$role['roleInfo']	=	$this->Role_model->get_role_one($where);
			$this->load->vars($role);
		}
		
		//	加载变量
		$this->load->vars($userInfo);
		$this->load->view('admin_manage/index');
	}

	/**
	* 修改密码
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function editpwd(){
		if(isset($_POST['submit']) && $_POST['submit']) {
			$pwdencrypt	=	$this->Admin_model->get_pwdencrypt($this->_userid);

			$password	=	$this->input->post('oldpwd',TRUE);
			//	旧密码不正确
			if(md5(md5($password).$pwdencrypt['encrypt']) !== $pwdencrypt['password']  ){
				redirect(site_aurl('admin/admin_manage/index/1'));
				exit;
			}

			$newpwd		=	$this->input->post('pwd',TRUE);
			$newpwd2	=	$this->input->post('pwd2',TRUE);
			
			//	新密码两次输入不一致
			if ($newpwd !== $newpwd2 ) {
				redirect(site_aurl('admin/admin_manage/index/2'));
				exit;
			}

			//	更新密码
			$update	=	$this->Admin_model->edit_password($this->_userid,$newpwd);
			if ( $update ) {
				//	管理员后台操作日志记录
				manage_log('admin','admin_manage','editpwd','/admin/admin_manage/editpwd','修改管理员密码');

				redirect(site_aurl('admin/admin_manage/index/3'));
				exit;
			}

			redirect(site_aurl('admin/admin_manage/index/1'));
			exit;
		}else{
			//	获取管理员信息
			$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);

			//	加载变量
			$this->load->vars($userInfo);
			$this->load->view('admin_manage/editpwd');
		}
		
	}

	/**
	* 修改基本信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function editinfo(){
		if(isset($_POST['submit']) && $_POST['submit']) {
			$info	=	array();
			$info['realname']	=	$this->input->post('realname',TRUE);
			$info['email']		=	$this->input->post('email',TRUE);
			
			$update	=	$this->Admin_model->update_info($this->_userid,$info);
			
			if ( $update ) {
				//	管理员后台操作日志记录
				manage_log('admin','admin_manage','editinfo','/admin/admin_manage/editinfo','修改管理员信息');

				redirect(site_aurl('admin/admin_manage/editinfo/2'));
				exit;
			}
			redirect(site_aurl('admin/admin_manage/editinfo/1'));
			exit;
			
		} else {
			//	获取管理员信息
			$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);

			$urlArr	=	get_segment_arr();
			if ( isset($urlArr[4]) && $urlArr[4]) {
				$data	=	array();
				switch($urlArr[4]){
					case 1:
						$data['changepwdmessage']	=	'修改失败！';
						$data['changepwdstatus']	=	1;
						break;
					case '2':
						$data['changepwdmessage']	=	'修改成功！';
						$data['changepwdstatus']	=	2;
						break;
				}
				$this->load->vars($data);
			}

			//	加载变量
			$this->load->vars($userInfo);
			$this->load->view('admin_manage/editinfo');
		}
	}
	
	
}

/* End of file admin_manage.php */
/* Location: ./application/controllers/admin/admin_manage.php */