<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 
/**
* 用户登录
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Shops extends CI_Controller {
	
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

		$this->load->model('Shops_model');
		$this->load->model('Commodity_model');
	}

	public function freexiche(){
		seo('洗车');
		//	条件
		$where	=	array();
		$where['parentid']	=	4;
		$page		=	isset($page) && $page ? intval($page) : 1;
		$pagesize	=	10;

		//	获取数据
		$data	=	$this->Shops_model->lists($where,$page,$pagesize,'updatetime DESC');
		$total	=	isset($data['total']) && $data['total'] ? $data['total'] : '';

		//	分页
		$pages		=	'';
		if ( $total ) {
			$pages	=	pages($total ,$pagesize,'4','/wxmains/shops/freexiche/');
		}
		$data['pages']	=	$pages ? $pages : '';
		$data['total']	=	$total ? $total : 0;
		$this->load->vars($data);
		templates('wxmain','freexiche');
	}

	public function freehuan(){
		seo('换机油');
		templates('wxmain','freehuan');
	}

	public function freexiyu(){
		seo('洗浴');
		templates('wxmain','freexiyu');
	}

	public function frees(){
		seo('4S店');
		templates('wxmain','frees');
	}

	public function freelian(){
		seo('联盟商家');
		templates('wxmain','freelian');
	}

	public function sever(){
		seo('服务介绍');
		templates('wxmain','sever');
	}

	public function freechongqi(){
		seo('补胎充气');
		templates('wxmain','freechongqi');
	}
	public function shop(){
		seo('补胎充气');
		templates('wxmain','freechongqi');
	}
	public function yiche(){
		seo('一键移车');
		templates('wxmain','yiche');
	}
}

