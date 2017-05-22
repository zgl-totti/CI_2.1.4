<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台模型管理，修改信息等相关model操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Model_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	$this->CI->db->dbprefix.'model';
	}
	
	/**
	* 模型列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$page 当前页 $pagesize 每页显示条数
	* @return		
	*/
	public function lists($page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->CI->db->select('modelid,siteid,name,description,tablename,disabled');
		$this->CI->db->where(array('type'=>0));
		$this->CI->db->order_by('modelid ASC');
		$query		=	$this->CI->db->limit($pagesize,$curpage)->get($this->table_name);

		$result		=	$query->result_array();

		$this->CI->db->select('count(1) AS num');
		$this->CI->db->where(array('type'=>0));
		$query		=	$this->CI->db->limit(1)->get($this->table_name);
		$totalnum	=	$query->row_array();

		$data['info']	=	$result;
		$data['total']	=	$totalnum['num'];
		Return $data;

	}

	/**
	* 模型列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$modelid 获取某个模型的详细信息
	* @return		
	*/
	public function get( $modelid = ''){
		if ( !$modelid ) {
			Return false;
		}
		
		$result		=	array();
		$query		=	$this->CI->db->limit(1)->get_where($this->table_name,
			array('modelid'=>$modelid));
		$result		=	$query->row_array();
		Return $result;
	}

	/**
	* 更新模型信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		$data 更新数据，为数组格式且与数据库键值对应 $modelid 模型标识ID
	* @return		返回影响行数
	*/
	public function updates($data,$modelid = ''){
		if ( !$data || !$modelid ) {
			Return false;
		}
		//	更新模型信息
		$where	=	array( 'modelid'=>intval($modelid) );
		
		$this->CI->db->update($this->table_name,$data,$where);
		Return $this->CI->db->affected_rows();
	}
}