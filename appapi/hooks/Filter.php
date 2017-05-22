<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 钩子
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Filter {
	public $CI,$destory,$classes,$action;

	public function __construct(){
		$this->CI	=	& get_instance();
		$this->destory	=	$this->CI->router->fetch_directory();
		$this->classes	=	$this->CI->router->fetch_class();
		$this->action	=	$this->CI->router->fetch_method();
	}

	/**
	* before_filter
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function before_filter(){
		if( isset($this->CI->before_filter) && !empty($this->CI->before_filter) ){
			$this->auth($this->CI->before_filter);
		}
	}

	/**
	* after_filter
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function after_filter(){
		if( isset($this->CI->after_filter) && !empty($this->CI->after_filter) ){
			$this->auth($this->CI->after_filter);
		}
	}

	/**
	* auth
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function auth($before_filter	= '' ){
		//	后台用户登录判断
		if ( is_string($before_filter) && $before_filter == 'checkuser' ) {
			
			//	cookie 保存的用户id
			$cookieuid	=	$this->CI->input->cookie('user');
			$cookieuid	=	$cookieuid ? aesDecode($cookieuid) : '';

			if ( !$cookieuid || !is_numeric($cookieuid)) {
				redirect(site_url('login'));
				exit;
			}

			//	权限查看
			$m		=	$this->destory ? substr($this->destory,0,-1) : '';
			$c		=	$this->classes;
			$a		=	$this->action ? $this->action : 'index';
			
			//	如果匹配到 a 方法为 public_ 开头的情况下，跳过权限验证
			if ( isset($a) && (preg_match('/^public_/',$a) || $a == 'logout' )) {
				Return TRUE;
			}

		}
		
		
		
	}

	
}
