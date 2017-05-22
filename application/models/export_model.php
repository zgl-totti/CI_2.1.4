<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 导出模型
*
*
*/
class Export_model extends CI_Model {

	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);
    }

	/**
	* 设置表名
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function set_table($table){
		$this->table_name	=	$table;
	}

	/**
	* 搜索患者信息表
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function search( $where = '',$q= '' ){
		$q	=	$q ? xss_clean($q) : '';

		if ( $where ) {
			$where	=	xss_clean($where);
			$this->db->where($where);
		}
		$this->db->where('concat_ws(results,hnumber,ad,names) like "%'.$q.'%"');

		$this->db->order_by('update_time','DESC');
		
		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();

		$info		=	$lists ? $lists : array();
		
		Return $info ? $info : array();
	}

}