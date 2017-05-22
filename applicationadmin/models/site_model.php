<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 基本信息管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Site_model extends CI_Model{
	public $CI;
	public $table_name;
	public function __construct(){
		parent::__construct();
		$this->CI	=	&get_instance();
		$this->table_name	=	$this->CI->db->dbprefix.'site';

	}

	/**
	* 获取站点基本信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get( $where ){
		$result		=	array();
		if ($where) {
			$this->CI->db->where($where);
		}
		$query		=	$this->CI->db->limit(1)->get($this->table_name);
		$result		=	$query->row_array();
		Return $result;
	}


	/**
	* 获取站点基本信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 更新数据 $siteid 标识
	* @return		返回mysql影响函数
	*/
	public function update( $data , $siteid ){
		if ( !$data || !$siteid ) {
			Return false;
		}
		
		$affected_rows	=	0;
		//	更新模型信息
		$where	=	array( 'siteid'=>intval($siteid) );
		
		$this->CI->db->update($this->table_name,$data,$where);
		Return $this->CI->db->affected_rows();
	}
}
