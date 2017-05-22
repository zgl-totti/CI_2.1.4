<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
*
*/
class Uptosci_token_model extends CI_Model {

	public $table_name;
    public function __construct()
    {
        parent::__construct();
        $this->db 	=	$this->load->database('default',TRUE);
		$this->table_name	=	'uptosci_token';
    }

	/**
	* 添加
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
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
	public function get(){
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$info	=	$this->db->get($this->table_name)->row_array();

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

	
}