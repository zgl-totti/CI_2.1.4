<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台管理员用户管理，角色管理
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Manage_user extends CI_Controller {
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
	* 管理员用户列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		$urlArr	=	get_segment_arr();
		$pagesize	=	10;
		$page	=	isset($urlArr['4']) ? intval($urlArr['4']) : 1;
		$data	=	$this->Admin_model->manage_user_lists($page,$pagesize);
		
		$data['pages']	=	pages($data['total'],$pagesize,4,'/admin/manage_user/index');
		
		$hidArr	=	array();
		if ($data && $data['info']) {
			$this->load->model('Role_model');
			$roleidArr	=	extractArray($data['info'],'roleid');
			
			$insql		=	implode('","',$roleidArr);
			$roleInfo	=	$this->Role_model->get_role('roleid in("'.$insql.'")');

			$data['roleInfo']=	$roleInfo ? handleArrayKey($roleInfo,'roleid') : array();
		}

		$this->load->view('manage_user/index',$data);
	}

	/**
	* 添加管理员
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function add(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$data	=	array('message'=>0);
			$post	=	$this->input->post(NULL,TRUE);
			
			//	两次输入密码不一致
			if ($post['password'] !== $post['pwdconfirm'] ) {
				$data['message']	=	'两次输入密码不一致';
				ob_start();
				$this->load->view('manage_user/add_action',$data);
				ob_end_flush();
				exit;
			}
			//	程序再次判断下输入的用户名信息
			$checkuserinfo	=	$this->Admin_model->get_info_by_username($post['username']);
			if ( $checkuserinfo ) {
				$data['message']	=	'用户名已经存在';
				ob_start();
				$this->load->view('manage_user/add_action',$data);
				ob_end_flush();
				exit;
			}

			$passwordInfo	=	password($post['password']);
			$info	=	array();
			$info['username']	=	$post['username'];
			$info['password']	=	$passwordInfo['password'];
			$info['encrypt']	=	$passwordInfo['encrypt'];

			$info['email']		=	$post['email'];
			$info['realname']	=	$post['realname'] ? $post['realname'] : '';
			$info['roleid']		=	intval($post['roleid']);
			
			$insertid	=	$this->Admin_model->add_manageuser($info);
			
			if ( $insertid ) {
				$data['message']	=	'添加成功';

				//	管理员后台操作日志记录
				manage_log('admin','manage_user','add','/admin/manage_user/add','添加管理员',array('userid'=>$insertid,'username'=>$info['username']));

				ob_start();
				$this->load->view('manage_user/add_action',$data);
				ob_end_flush();
				exit;
			}

			$data['message']	=	'添加失败';
			$this->load->view('manage_user/add_action',$data);
		}else{
			$this->load->model('Role_model');
			//	查看角色组未被禁用的数据
			$where	=	array('disabled'=>0);
			$data['role']	=	$this->Role_model->get_role($where);

			$this->load->view('manage_user/add',$data);
		}
	}

	/**
	* 管理员相关信息修改
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function edit($id = ''){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$data	=	array('message'=>0);
			
			$post	=	$this->input->post(NULL,TRUE);
			$data['userid']	=	$post['userid'];

			//	两次输入密码不一致
			if ($post['password'] && $post['pwdconfirm'] &&  $post['password'] !== $post['pwdconfirm'] ) {
				$data['message']	=	'两次输入密码不一致';
				ob_start();
				$this->load->view('manage_user/add_action',$data);
				ob_end_flush();
				exit;
			}

			$info	=	array();
			if ( $post['password'] ) {
				$passwordInfo	=	password($post['password']);
				$info['password']	=	$passwordInfo['password'];
				$info['encrypt']	=	$passwordInfo['encrypt'];
			}
			$info['email']		=	$post['email'];
			$info['realname']	=	$post['realname'] ? $post['realname'] : '';
			$info['roleid']		=	intval($post['roleid']);
			
			$insertid	=	$this->Admin_model->update_info($post['userid'],$info);
			
			if ( $insertid ) {
				//	管理员后台操作日志记录
				manage_log('admin','manage_user','edit','/admin/manage_user/edit','修改管理员信息',array('userid'=>$post['userid']));
				
				$data['message']	=	'修改成功';
				ob_start();
				$this->load->view('manage_user/edit_action',$data);
				ob_end_flush();
				exit;
			}

			$data['message']	=	'修改失败,或者您未修改任何数据';
			$this->load->view('manage_user/edit_action',$data);

		}else{
			$this->load->model('Role_model');
			
			//	查看角色组未被禁用的数据
			$where	=	array('disabled'=>0);
			$data['role']	=	$this->Role_model->get_role($where);
			
			if ( !$id ) {
				redirect(site_aurl('admin/manage_user'));
				exit;
			}

			//	获取管理员信息
			$data['userinfo']	=	$this->Admin_model->get_info_by_userid($id);
			
			$this->load->view('manage_user/edit',$data);
		}
	}
	
	/**
	* 删除管理员操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		$urlArr		=	get_segment_arr();
		$userid		=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
		$info		=	'';
		
		$result		=	array();
		if ( $userid ) {
			//	查看信息
			$userInfo	=	$this->Admin_model->get_info_by_userid($userid);

			//	删除
			$info	=	$this->Admin_model->deletes($userid);
		}

		if ($info && $userInfo ) {
			//	管理员后台操作日志记录
			manage_log('admin','manage_user','edit','/admin/manage_user/edit','删除管理员',array('userid'=>$userInfo['userid'],'username'=>$userInfo['username'],
				'email'=>$userInfo['email']));
		}

		$result['message']	=	$info ? '删除成功' : 0;
		$this->load->view('manage_user/delete_action',$result);
	}


	/**
	* ajax 验证用户名是否已经存在
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function public_checkname_ajax(){
		$username	=	$this->input->post('username',TRUE);
		if ( !$username ) {
			exit("false");
		}
		$this->load->model('Admin_model');
		$userinfo	=	$this->Admin_model->get_info_by_username($username);
		if ( !$userinfo ) {
			exit("true");
		}
		exit("false");
	}
	
}

/* End of file manage_user.php */
/* Location: ./application/controllers/admin/manage_user.php */