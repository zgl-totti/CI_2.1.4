<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台日志操作信息
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Log_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public $_userid;
	public $_username;
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	$this->CI->db->dbprefix.'log';

		$this->_userid	=	$this->CI->session->userdata('userid');

		$this->_username=	$this->CI->session->userdata('username');

		//	如果说没有获取到 用户信息的话，直接返回 false
		if ( !$this->_userid ) {
			Return false;
		}
	}
	
	/**
	* 添加日志信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$m 模型 $c 控制器(文件) $a 事件 $querystring 操作详情 $data 操作数据 
					$message 简单的功能介绍
	* @return		返回插入数据ID
	*/
	public function add($m = '',$c = '',$a = '',$querystring = '',$message = '',$data = ''){
		$info	=	array();
		$info['module']	=	$m;
		$info['file']	=	$c;
		$info['action']	=	$a;
		$info['querystring']	=	$querystring ? $querystring : '';
		$info['data']	=	( $data && is_array($data) ) ? json_encode($data) : $data;
		$info['message']=	$message ? $message : '';
		
		$info['userid']	=	$this->_userid;

		$info['username']	=	$this->_username;
		$info['ip']			=	$this->input->ip_address();
		$info['time']		=	date("Y-m-d H:i:s",time());

		$insertid	=	0;
		$this->CI->db->insert($this->table_name, $info); 
		$insertid	=	$this->CI->db->insert_id();
		Return $insertid;
	}

	/**
	* 日志列表信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function lists(){
	

	}

	
}