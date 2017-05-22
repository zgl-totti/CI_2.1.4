<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 会议管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class About_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	$this->CI->db->dbprefix.'about';
	}
	

	//获取一条记录
	public function getone($where){
		$this->CI->db->where($where);
		$this->CI->db->select('*');
		
		$query	=	$this->CI->db->get($this->table_name);
		$info	=	$query->row_array();
	
		Return $info;
	}
	/**
	 * 列表
	 * @author	wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function lists($where = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;
	
		$this->CI->db->select('*');
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
	
	//修改
	public function update($data,$where){
		if (!$data || !$where ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->CI->db->where($where);
		$this->CI->db->update($this->table_name, $data); 

		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}
}