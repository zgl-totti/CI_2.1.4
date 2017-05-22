<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 管理员相关操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Admin_model extends CI_Model{
	private $db;
	public $table_name;
	public function __construct(){

		parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'admin';

	}

	/**
	* 根据userid获取管理员信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	final public function get_info_by_userid( $userid = '' ){
		if ( !$userid ) Return false;
		$userInfo	=	array();
		$userid		=	intval($userid);
		$userInfo	=	$this->db->select('userid,username,roleid,realname,lastloginip,
		lastlogintime,email,hospitalid')->get_where($this->table_name,array('userid'=>$userid))->row_array();

		Return $userInfo;
	}

	/**
	* 根据 username 获取管理员信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	final public function get_info_by_username( $username = '' ){
		if ( !$username ) Return false;
		$userInfo	=	array();

		$userInfo	=	$this->db->select('userid,username,roleid,realname,lastloginip,
		lastlogintime,email,hospitalid')->get_where($this->table_name,array('username'=>$username))->row_array();

		Return $userInfo;
	}

	
	/**
	* 获取用户密码操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	final public function get_pwdencrypt( $userid = '' ){
		if ( !$userid ) Return false;
		$userInfo	=	array();

		$userInfo	=	$this->db->select('password,encrypt')->
			get_where($this->table_name,array('userid'=>$userid))->row_array();

		Return $userInfo;
	}

	/**
	* 修改管理员密码
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	final public function edit_password($userid = '',$password = ''){
		if ( !$userid || !$password ) {
			Return false;
		}
		$passwordinfo = password($password);
		
		$where	=	array('userid'=>$userid);
		$this->db->update($this->table_name,$passwordinfo,$where);

		Return $this->db->affected_rows();
	}
	
	/**
	* 修改管理基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	final public function update_info($userid = '',$data = array()){
		if ( !$userid || !$data ) {
			Return false;
		}
		
		$where	=	array('userid'=>$userid);
		$this->db->update($this->table_name,$data,$where);

		Return $this->db->affected_rows();
	}


	/**
	* 后台管理员用户列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		返回管理员相关信息
	*/
	final public function manage_user_lists($page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->db->select('userid,username,roleid,lastloginip,lastlogintime,email,realname,hospitalid');
		$this->db->order_by('userid ASC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);

		$result		=	$query->result_array();
		$totalnum	=	$this->db->count_all($this->table_name);

		$data['info']	=	$result;
		$data['total']	=	$totalnum;
		Return $data;
	}

	final public function lists(){
		$data		=	array();

		$this->db->select('userid,username,realname');
		$this->db->order_by('userid ASC');
		$query		=	$this->db->get($this->table_name);

		$result		=	$query->result_array();
		$totalnum	=	$this->db->count_all($this->table_name);

		$data['info']	=	$result;
		$data['total']	=	$totalnum;
		Return $data;
	}


	/**
	* 添加管理员操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据
	* @return		返回ID值
	*/
	final public function add_manageuser( $data = array() ){
		if ( !$data ) Return false;

		$insert_id	=	0;
		
		$this->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->db->insert_id();
		Return $insert_id;
	}
	/**
	* 删除管理员操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$userid 管理员用户ID
	* @return		返回mysql影响行数
	*/
	final public function deletes( $userid ){
		if ( !$userid ) {
			Return false;
		}
		$userid		=	intval($userid);
		$affected_rows	=	0;
		
		//	保留最初的管理员角色不能删除
		if ($userid == 1) {
			Return false;
		}

		$this->db->where('userid', $userid);
		$this->db->delete($this->table_name); 

		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}
}
