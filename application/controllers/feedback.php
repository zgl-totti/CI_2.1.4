<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 意见反馈
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Feedback extends CI_Controller {
	
	//	权限验证
	public $before_filter	=	'checkuser';

	//	用户id
	public $userid;

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

		$userid	=	$this->input->cookie('user',true);
		$this->userid	=	$userid ? aesDecode($userid) : '';
		$this->load->model('Feedback_model');
	}

	/**
	* 意见反馈
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function index( $page = '' ){
		seo('意见反馈');
		//	条件
		$where	=	array();
		$where['userid']	=	$this->userid;
		$page		=	isset($page) && $page ? intval($page) : 1;
		$pagesize	=	10;
		//	获取数据
		$data	=	$this->Feedback_model->lists($where,$page,$pagesize,'addtime DESC');
		$total	=	isset($data['total']) && $data['total'] ? $data['total'] : '';
		if (!$total ) {
			$this->add();
			exit;
		}
		//	分页
		$pages		=	'';
		if ( $total ) {
			$pages	=	pages($total ,$pagesize,'3','/feedback/index');
		}
		$data['pages']	=	$pages ? $pages : '';
		$data['total']	=	$total ? $total : 0;
		$this->load->vars($data);
		templates('feedback','index');
	}
	
	/**
	* 意见反馈
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function add(){
		if ( isset($_POST['dosubmit']) && $_POST['dosubmit'] ) {
			$data	=	$this->input->post(NULL,TRUE);
			$info	=	array();
			//	email
			$info['email']	=	isset($data['email']) && $data['email'] ? 
				$data['email'] : '';
			//	手机
			$info['phone']		=	isset($data['phone']) && $data['phone'] ? 
				$data['phone'] : '';
			//	内容
			$info['content']		=	isset($data['content']) && $data['content'] ? 
				$data['content'] : '';
			$info['onlykey']	=	$this->session->userdata('onlykey');
			//	基本信息
			$info['addtime']	=	time();
			$info['userid']		=	$this->userid;
			//	数据保存
			$insert_id	=	$this->Feedback_model->add($info);
			$result		=	array();
			if ( $insert_id ) {
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('feedback/index');
				$result['message']	=	'添加成功';
				templates('global','message',$result);
				exit;
			}else{
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('feedback/add');
				$result['message']	=	'添加失败，请重新添加';
				templates('global','message',$result);
				exit;
			}
		}else{
			seo('添加意见反馈');
			templates('feedback','add');
		}
	}
}