<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 常用信息展示
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Notice extends CI_Controller {
	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();
		
	}

	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		echo '<pre>';
		print_r('test');
		exit;
		
	}

	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function nopriv(){
		$data	=	array();

		$data['message']	=	'您无权限进行该操作';

		$this->load->view('notice/index',$data);
	}

	
}

/* End of file notice.php */
/* Location: ./application/controllers/notice.php */