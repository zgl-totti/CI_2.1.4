<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 专家管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Cardtype_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	'cardtype';
	}
	
	/**
	* 获取一条数据信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getone($where){
		if (!$where) {
			Return false;
		}
		$this->CI->db->select('*');
		$this->CI->db->where($where);
		
		$query	=	$this->CI->db->get($this->table_name);
		$info	=	$query->row_array();
	
		Return $info;
	}


	/**
	* 更新模型信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
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

	/**
	* 添加
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据
	* @return		返回ID值
	*/
	public function insert( $data = array() ){
		if ( !$data ) Return false;

		$insert_id	=	0;
		
		$this->CI->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->CI->db->insert_id();
		Return $insert_id;
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

	/**
	* 通过id获取数据
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getbyid($where = '',$select = '*'){
		if (!$where) {
			Return false;
		}
		$data		=	array();
		
		$this->CI->db->select($select);
		
		$this->CI->db->where_in('id',$where);
		
		$info	=	$this->CI->db->get($this->table_name)->result_array();

		Return $info;

	}
	/**
	* 删除数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes($idArr = array() ){
		if ( !$idArr || !is_array($idArr) ) {
			Return false;
		}

		$affected_rows	=	0;
		
		$this->CI->db->where_in('id', $idArr);
		$this->CI->db->delete($this->table_name); 
		
		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}


	/**
	* 搜索
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function search($keywords = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$keywords	=	$keywords ? xss_clean($keywords) : '';

		$this->CI->db->select('*');
		if ( $keywords ) {
			$this->CI->db->or_like(array('title'=>$keywords,'hospital'=>$keywords));
		}
		$this->CI->db->order_by('id DESC');
		$query		=	$this->CI->db->limit($pagesize,$curpage)
			->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		if ( $keywords ) {
			$this->CI->db->or_like(array('title'=>$keywords,'hospital'=>$keywords));
		}
		$this->CI->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;
	}
}