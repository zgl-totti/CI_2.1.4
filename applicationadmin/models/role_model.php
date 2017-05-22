<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 后台管理员角色管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Role_model extends CI_Model{
	public $CI;
	public $table_name;
	public function __construct(){
		parent::__construct();
		$this->CI	=	&get_instance();
		$this->table_name	=	$this->CI->db->dbprefix.'admin_role';

	}

	/**
	* 获取后台管理员用户组信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$where 获取筛选条件
	* @return		返回管理组相关信息
	*/
	public function get_role( $where = array() ){
		$roleInfo	=	array();

		$this->CI->db->select('roleid,rolename,description,listorder,disabled');
		if ( $where ) {
			$this->CI->db->where($where);
		}
		$this->CI->db->order_by('listorder DESC,roleid DESC');
		$query		=	$this->CI->db->get($this->table_name);
		$roleInfo	=	$query->result_array();
	
		Return $roleInfo;
	}

	/**
	* 获取后台管理员用户组信息,针对单一的一个
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$where 获取筛选条件
	* @return		返回管理组相关信息
	*/
	public function get_role_one( $where = array() ){
		if ( !$where || !is_array($where) ) Return false;
		
		$this->CI->db->select('roleid,rolename,description,listorder,disabled');
		$this->CI->db->where($where);
		
		$query		=	$this->CI->db->get($this->table_name);
		$roleInfo	=	$query->row_array();
	
		Return $roleInfo;
	}

	/**
	* 添加管理员用户组
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$info 添加的数据
	* @return		返回保存数据的ID
	*/
	final public function add( $info ){
		if ( !$info ) Return false;

		$insertid	=	0;
		$this->CI->db->insert($this->table_name, $info); 
		$insertid	=	$this->CI->db->insert_id();
		Return $insertid;
	}

	/**
	* 更新用户组角色处理
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$info 更新的数据，$id 字段唯一标识
	* @return		返回mysql影响的行数
	*/
	final public function update($info,$id){
		if (!$info || !$id ) {
			Return false;
		}
	
		if ($id == 1) {
			Return false;
		}

		$affected_rows	=	0;
		$this->CI->db->where('roleid', $id);
		$this->CI->db->update($this->table_name, $info); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 删除操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 字段标识	
	* @return		返回mysql 操作影响行数
	*/
	public function deletes($id){
		if ( !$id || $id == 1) {
			Return false;
		}
		$id		=	intval($id);
		$affected_rows	=	0;
		$this->CI->db->where('roleid', $id);
		$this->CI->db->delete($this->table_name); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 排序操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data	排序操作
	* @return		返回mysql操作影响行数
	*/
	public function listorder( $data ){
		if ( !$data ) {
			Return false;
		}
		$affected_rows	=	0;

		$sql	=	'';
		$ids	=	implode(',',array_keys($data));
		$sql	=	'UPDATE '.$this->table_name .' SET listorder = CASE roleid ';
		foreach($data AS $key => $val){
			$sql	.=	' WHEN '.$key .' THEN '.intval($val);
		}
		$sql	.=	' END WHERE roleid in('.$ids.') ';
		
		$this->CI->db->query($sql);

		$affected_rows	=	$this->CI->db->affected_rows();

		Return $affected_rows;
	}
}
