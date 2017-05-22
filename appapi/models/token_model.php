<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 医生用户token模型
 */
class Token_model extends CI_Model {

	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->table_name	=	'clients';
    }
	
	/**
	 * 获取基本信息,通过token获取数据
	 * @param  string $token 条件
	 * @return array/null   
	 */
	public function getInfo($token){
		if ( !$token ) {
			Return false;
		}
		$where	=	array('token'=>$token);

		$info	=	$this->db->limit(1)->get_where($this->table_name,$where)->row_array();

		Return $info ? $info : false;
	}

	
	
	/*
	 * 增加医生用户
	 */

	public function addToken( $data = array() ){
		if ( !$data ) {
			Return false;
		}
		$data	=	xss_clean($data);
		
		$this->db->insert($this->table_name,$data);
		
		$insert_id	=	$this->db->insert_id();

		Return $insert_id ? $insert_id : false;
	}
}