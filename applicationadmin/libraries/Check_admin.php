<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 验证管理员登录，权限等相关操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Check_admin {
	public $CI;
	public $urlArr;
	public function __construct(){
		$this->CI	=	&get_instance();
		$this->urlArr	=	get_segment_arr();
		
		//	检测用户是否已经登录
		$check	=	$this->check_admin();
		
		//	检测用户权限
		$check_priv	=	$this->check_priv();

	}

	/**
	* 验证是否登录
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	final public function check_admin(){
		//	不需要验证权限的模块直接跳过验证
		if (isset($this->urlArr[1]) && in_array($this->urlArr[1],array('login','notice')) ) {
			Return TRUE;
		}

		$userid	=	'';
		//	session 保存的用户id信息
		$userid	=	$this->CI->session->userdata('userid');
		$userid	=	$userid ? $userid : '';

		//	cookie 保存的用户id
		$cookieuid	=	$this->CI->input->cookie('auserid');
		$cookieuid	=	$cookieuid ? aesDecode($cookieuid) : '';

		if ( !$userid || !$cookieuid ||  $userid != $cookieuid ) {
			redirect(site_aurl('login'));
			exit;
		}

		Return TRUE;
	}

	/**
	* 检测权限信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	final public function check_priv(){
		$urlArr	=	$this->urlArr;
		$roleid	=	$this->CI->session->userdata('roleid');

		$m		=	isset($urlArr['1']) ? $urlArr['1'] : '';
		$c		=	isset($urlArr['2']) ? $urlArr['2'] : '';
		$a		=	isset($urlArr['3']) ? $urlArr['3'] : 'index';
		
		//	如果匹配到 a 方法为 public_ 开头的情况下，跳过权限验证
		if ( isset($a) && preg_match('/^public_/',$a) ) {
			Return TRUE;
		}

		//	不需要验证权限的模块直接跳过验证
		if ( isset($m) && in_array($m,array('login','notice')) ) {
			
			Return TRUE;
		}

		//	后台默认首页全部都有访问权限
		if ( isset($m) && $m == 'admin' && isset($c) && $c == 'main' && ( !$a || $a == 'index' )) {
			Return TRUE;
		}

		//	如果是超级管理员，不需要进行验证
		if ( $roleid == 1) {
			Return TRUE;
		}

		if ( !$m || !$c ) {
			redirect(site_aurl('notice/nopriv'));
			exit;
		}

		if( $m == 'admin' && $c == 'main' && $a == 'index'){
			Return TRUE;
		}
		


		$roleid	=	$this->CI->session->userdata('roleid');
		if ( !$roleid ) {
			redirect(site_aurl('notice/nopriv'));
			exit;
		}
		
		
		//	权限数据model
		$this->CI->load->model('Role_priv_model');

		$r	=	$this->CI->Role_priv_model->get_rolepriv_one( array('m'=>$m,'c'=>$c,
					'a'=>$a,'roleid'=>$roleid) );
		if ( !$r ) {
			redirect(site_aurl('notice/nopriv'));
			exit;
		}
		
		Return TRUE;
	}

}
