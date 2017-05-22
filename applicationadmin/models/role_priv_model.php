<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 后台管理员权限数据信息
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Role_priv_model extends CI_Model{
	public $CI;
	public $table_name;
	public function __construct(){
		parent::__construct();
		$this->CI	=	&get_instance();
		$this->table_name	=	$this->CI->db->dbprefix.'admin_role_priv';

	}

	/**
	* 获取后台管理员权限信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$where 获取筛选条件
	* @return		返回管理组相关信息
	*/
	public function get_rolepriv( $where = array() ){
		$roleInfo	=	array();

		$this->CI->db->select('roleid,m,c,a');
		if ( $where ) {
			$this->CI->db->where($where);
		}
		$query		=	$this->CI->db->get($this->table_name);
		$roleInfo	=	$query->result_array();
	
		Return $roleInfo;
	}

	/**
	* 获取后台管理员权限信息,至获取一条
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$where 获取筛选条件
	* @return		返回管理组相关信息
	*/
	public function get_rolepriv_one( $where = array() ){
		$roleInfo	=	array();
		
		if ( !$where ) {
			Return false;
		}

		$this->CI->db->select('roleid,m,c,a');
		
		$this->CI->db->where($where);
		
		$query		=	$this->CI->db->get($this->table_name);
		$roleInfo	=	$query->row_array();
	
		Return $roleInfo;
	}

	/**
	* 删除权限表数据信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$roleid 需要删除的用户组权限，注意：该点删除的是直接按照用户组就删除了
	* @return		
	*/
	public function deletes( $roleid ){
		if ( !$roleid  || $roleid == 1 ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->CI->db->where('roleid', $roleid);
		$this->CI->db->delete($this->table_name); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 添加权限数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加的数据信息
	* @return		
	*/
	public function add( $data ){
		if ( !$data ) Return false;

		$insertid	=	0;
		$this->CI->db->insert($this->table_name, $data); 
		$insertid	=	$this->CI->db->insert_id();
		Return $insertid;
	}


	/**
	* 检测其在树中出现的等级
	* @param array $data menu表中数组
	* @param int $roleid 需要检查的角色ID
	*/
	public function get_level($id,$array=array(),$i=0) {
		foreach($array as $n=>$value){
			if($value['id'] == $id)
			{
				if($value['parentid']== '0') return $i;
				$i++;
				return $this->get_level($value['parentid'],$array,$i);
			}
		}
	}

	/**
	* 检查指定菜单是否有权限
	* @param array $data menu表中数组
	* @param int $roleid 需要检查的角色ID
	*/
	public function is_checked($data,$roleid,$priv_data) {
		$priv_arr = array('m','c','a','data');
		if($data['m'] == '') return false;
		foreach($data as $key=>$value){
			if(!in_array($key,$priv_arr)) unset($data[$key]);
		}
		$data['roleid'] = $roleid;
		$info = in_array($data, $priv_data);
		if($info){
			return true;
		} else {
			return false;
		}
	}

	/**
	* 获取菜单表信息
	* @param int $menuid 菜单ID
	* @param int $menu_info 菜单数据
	*/
	public function get_menuinfo($menuid,$menu_info) {
		$menuid = intval($menuid);
		unset($menu_info[$menuid]['id'],$menu_info[$menuid]['display']);
		return $menu_info[$menuid];
	}

}
