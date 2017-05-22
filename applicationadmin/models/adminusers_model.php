<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台用户登录，修改信息等相关model操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Adminusers_model extends CI_Model{
	public $CI;
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();
	}
	
	/**
	* 管理员登录动作
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function login($username,$password){
		$table_name	=	$this->CI->db->dbprefix.'admin';
		
		$userInfo	=	$this->CI->db->select('userid,username,password,encrypt,roleid,realname,hospitalid')->get_where($table_name,array('username'=>$username))->row_array();
		
		//	判断密码是否正确
		if ($userInfo['password'] == md5(md5($password).$userInfo['encrypt'])) {
			$data	=	array();
			$data['lastloginip']	=	$this->input->ip_address();
			$data['lastlogintime']	=	time();
			$this->CI->db->where(array('username'=>$username))->update($table_name,$data);

			$this->setLogin($userInfo);
			unset($userInfo['password'],$userInfo['encrypt']);
			Return $userInfo;
		}
		Return false;
	}

	/**
	* 设置session，登录
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	private function setLogin($user){
		if ( !$user ) {
			Return false;
		}
		$newdata = array(
				'userid'	=> $user['userid'],
				'username'	=> $user['username'],
				'realname'	=> $user['realname'],
				'roleid'	=> $user['roleid'],
				'hospitalid'=> $user['hospitalid']
		);
		$this->CI->session->set_userdata($newdata);
	}
	
	/**
	* 退出
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	function logout(){
		$userdata = array(
				'userid' => '',
				'username' => '',
				'realname' => '',
				'roleid' => '',
				'hospitalid' => ''
		);
		$this->CI->session->unset_userdata($userdata);
	}
	
}