<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 求助表
*
*/
class Help_model extends CI_Model {

	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->table_name	=	'help';
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

		$this->db->select('id,pmid,title,addtime');
		if ( $where ) {
			$this->db->where($where);
		}
		$this->db->order_by('addtime DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		if ( $where ) {
			$this->db->where($where);
		}
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();

		Return $data;

	}

	/**
	* 添加
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据
	* @return		返回ID值
	*/
	public function add( $data = array() ){
		if ( !$data ) Return false;

		$insert_id	=	0;
		
		$this->db->insert($this->table_name, $data); 
		$insert_id	=	$this->db->insert_id();
		Return $insert_id;
	}
	

	/**
	* 删除数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes($where = array() ){
		if ( !$where || !is_array($where) ) {
			Return false;
		}

		$affected_rows	=	0;
		
		$this->db->where($where);
		$this->db->delete($this->table_name); 
		
		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}
}