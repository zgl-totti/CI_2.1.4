<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 管理员菜单显示公用类
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Menu_admin {
	public $CI;
	public function __construct(){
		$this->CI	=& get_instance();
	}

	/**
	* 菜单展示信息获取列表
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function admin_menu( $roleid = '' ){
		//	如果不传递 用户组ID 的话，则查看session 中是否有存在
		if ( !$roleid ) {
			$roleid	=	$this->CI->session->userdata('roleid');
		}
		if ( !$roleid ) {
			Return FALSE;
		}

		//	加载菜单 menu 模块
		$this->CI->load->model('Menu_model');
		//	获取所有的菜单列表
		$allMenuArr	=	$this->CI->Menu_model->lists(array('display'=>1));
		
		$allMenuInfo=	( isset($allMenuArr) && $allMenuArr['info'] ) ? $allMenuArr['info'] : '';

		if ( !$allMenuInfo ) {
			Return FALSE;
		}
		
		//	菜单语言包
		$this->CI->lang->load('system_menu','zh_cn');
		$this->CI->load->helper('language');

		//	根据用户组判定权限信息
		if ( $roleid == 1 ) {
			foreach($allMenuInfo AS $key => $val){
				$allMenuInfo[$key]['cname']	=	lang($val['name']);
			}
			Return $allMenuInfo;
		}
		
		//	权限数据model
		$this->CI->load->model('Role_priv_model');
		$array	=	array();
		foreach($allMenuInfo as $v) {
			$action		=	$v['a'];
			$v['cname']	=	lang($v['name']);
			if(preg_match('/^public_/',$action)) {
				$array[]	=	$v;
			} else {
				if(preg_match('/^ajax_([a-z]+)_/',$action,$_match)) {
					$action	=	$_match[1];
				}

				$r	=	$this->CI->Role_priv_model->get_rolepriv_one( array('m'=>$v['m'],'c'=>$v['c'],
					'a'=>$action,'roleid'=>$roleid) );
				if ($r) {
					$array[]	=	$v;
				}
			}
		}
	
		Return $array;
	}
}
