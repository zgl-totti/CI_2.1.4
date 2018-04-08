<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台资讯管理
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Main extends CI_Controller {

	public $before_filter	=	'admin';
	public $_userid;

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
		
		$this->_userid	=	$this->session->userdata('userid');
	}

	/**
	* 新闻列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($page = ''){
		
	}

	/**
	* 编辑新闻资讯
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function edit( $id = '' ){
		
	}

	/**
	* 添加新闻
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function add(){
		
	}

	

	/**
	* 删除新闻
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function delnews(){
		
	}
}

