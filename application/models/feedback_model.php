<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 意见反馈
*
*/
class Feedback_model extends CI_Model {

	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);
		$this->table_name	=	'feedback';
    }

	/**
	* 添加记录
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 数据
	* @return		false 或者保存 id
	*/
	public function add( $data = array() ){
		if ( !$data ) {
			Return false;
		}
		$data	=	xss_clean($data);
		
		$this->db->insert($this->table_name,$data);
		
		$insert_id	=	$this->db->insert_id();
		
		Return $insert_id ? $insert_id : false;
	}

	/**
	* 获取指定一条记录详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_one($where = ''){
		if ( !$where ) {
			Return false;
		}
		$where	=	xss_clean($where);
		$this->db->limit(1);
		$info	=	$this->db->get_where($this->table_name,$where)->row_array();

		Return $info ? $info : false;
	}

	/**
	* 获取指定一条记录详情(通过排序获取)
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_one_byorder($where = ''){
		if ( !$where ) {
			Return false;
		}
		$where	=	xss_clean($where);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$info	=	$this->db->get_where($this->table_name,$where)->row_array();

		Return $info ? $info : false;
	}

	/**
	* 更新数据
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function update($info,$where){
		if (!$info || !$where ) {
			Return false;
		}
		$info	=	xss_clean($info);
		$where	=	xss_clean($where);

		$this->db->where($where);
		$this->db->update($this->table_name,$info);

		$rows	=	$this->db->affected_rows();
		
		Return $rows ? $rows : false;
	}
	

	/**
	* 列表页面
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function lists( $where = '', $page = '1' , $pagesize = '10' ,$order = ''){
		if ( $where ) {
			$where	=	xss_clean($where);
			$this->db->where($where);
		}

		$page		=	max(1,$page);
		$curpage	=	( $page - 1 ) * $pagesize;

		if ( $order ) {
			$this->db->order_by($order);
		}else{
			$this->db->order_by('id','DESC');
		}
		

		$this->db->limit($pagesize,$curpage);
		
		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();

		if ($where) {
			$this->db->where($where);
		}
		$this->db->limit(1);
		$total	=	$this->db->count_all_results( $this->table_name );
		
		$result['info']		=	$lists ? $lists : array();
		$result['total']	=	$total ? $total : '';
		
		Return $result ? $result : array();
	}

}