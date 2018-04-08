<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
/**
* 用户登录
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Weekly extends CI_Controller {
	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();

		$this->load->model('Weekly_model');
	}

	public function index(){
		seo('车友周刊');
		//	条件
		$where	=	array();
		$page		=	isset($page) && $page ? intval($page) : 1;
		$pagesize	=	10;
		
		//	获取数据
		$data	=	$this->Weekly_model->lists($where,$page,$pagesize,'updatetime DESC');
		$total	=	isset($data['total']) && $data['total'] ? $data['total'] : '';
		
		//	分页
		$pages		=	'';
		if ( $total ) {
			$pages	=	pages($total ,$pagesize,'3','/weekly/index/');
		}
		$data['pages']	=	$pages ? $pages : '';
		
		$data['total']	=	$total ? $total : 0;
		$data['seo_title'] = '车友周刊';
		$this->load->vars($data);
		templates('wxmain','weekly');
	}
}

