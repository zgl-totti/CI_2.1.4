<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 医院通知模型
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Hospital_notice_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	$this->CI->db->dbprefix.'hospital_notice';
	}
	
	/**
	* 列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$page 当前页 $pagesize 每页显示条数
	* @return		
	*/
	public function lists($where = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->CI->db->select('id,title,description,add_time,views,thumb,hospitalid');
		if ( $where ) {
			$this->CI->db->where($where);
		}
		$this->CI->db->order_by('id DESC');
		$query		=	$this->CI->db->limit($pagesize,$curpage)->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		$this->CI->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;

	}

	/**
	* 更新通知信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function update($data,$id){
		if (!$data || !$id ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->CI->db->where('id', $id);
		$this->CI->db->update($this->table_name, $data); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 添加通知信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function add($data){
		if ( !$data ) {
			Return false;
		}
		$insert_id	=	0;
		
		$this->CI->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->CI->db->insert_id();
		Return $insert_id;
	}

	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$where 获取筛选条件
	* @return		返回管理组相关信息
	*/
	public function get( $where = array() ){
		if ( !$where || !is_array($where) ) Return false;
		
		$this->CI->db->select('*');
		$this->CI->db->where($where);
		
		$query	=	$this->CI->db->get($this->table_name);
		$info	=	$query->row_array();
	
		Return $info;
	}

	/**
	* 删除数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$hosid 医院id
	* @return		
	*/
	public function deletes($idArr = array() , $hosid = ''){
		if (!$idArr || !is_array($idArr)) {
			Return false;
		}
		
		if ( $hosid ) {
			$this->CI->db->where_in('hospitalid', $hosid);
		}

		$affected_rows	=	0;
		$this->CI->db->where_in('id', $idArr);
		$this->CI->db->delete($this->table_name); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}
}