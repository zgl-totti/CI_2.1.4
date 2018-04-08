<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 会议管理
* @author	zhaojinchao
* @copyright	angkee@qq.com
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
		
		$this->load->model('About_model');
		$this->_userid	=	$this->session->userdata('userid');

	}


	/**
	* 关于我们
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	 public function index(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,true);
			$id		=	$post['id'] ? intval($post['id']) : '';
			if (!$id) {
				redirect(site_url('about/main/index'));
				exit;
			}

			$info	=	array();
			$info['auth']	=	$post['auth'];
			
			$contents	=	$this->input->post('contents');
			$contents	=	$contents ? htmlspecialchars($contents) : '';

			$info['contents']	=	$contents;
			$info['dates']	=	date('Y-m-d');

			$update	=	$this->About_model->update($info,array('id'=>$id));
			if ( $update ) {
				//	记录后台操作日志
				manage_log('about','main','index','/about/main/index','修改关于我们',array('id'=>$id));
			}

			redirect(site_aurl('about/main/index/'));
			exit;
		}else{
			$info	=	$this->About_model->getone(array('id'=>1));
			$data = array();
			$data['info'] = $info;
			templates('about','edit',$data);
			exit;
		}

    }

	/**
	* 联系我们
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	 public function contact(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,true);
			$id		=	$post['id'] ? intval($post['id']) : '';
			if (!$id) {
				redirect(site_url('about/main/contact'));
				exit;
			}

			$info	=	array();
			$info['auth']	=	$post['auth'];
			
			$contents	=	$this->input->post('contents');
			$contents	=	$contents ? htmlspecialchars($contents) : '';

			$info['contents']	=	$contents;
			$info['dates']	=	date('Y-m-d');

			$update	=	$this->About_model->update($info,array('id'=>$id));

			if ( $update ) {
				//	记录后台操作日志
				manage_log('about','main','contact','/about/main/contact','修改联系我们',array('id'=>$id));
			}

			redirect(site_aurl('about/main/contact/'));
			exit;
		}else{
			$info	=	$this->About_model->getone(array('id'=>2));
			$data = array();
			$data['info'] = $info;
			templates('about','contact',$data);
			exit;
		}

    }

	/**
	* 版权声明
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	 public function statement(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,true);
			$id		=	$post['id'] ? intval($post['id']) : '';
			if (!$id) {
				redirect(site_url('about/main/statement'));
				exit;
			}

			$info	=	array();
			$info['auth']	=	$post['auth'];
			
			$contents	=	$this->input->post('contents');
			$contents	=	$contents ? htmlspecialchars($contents) : '';

			$info['contents']	=	$contents;
			$info['dates']	=	date('Y-m-d');

			$update	=	$this->About_model->update($info,array('id'=>$id));

			if ( $update ) {
				//	记录后台操作日志
				manage_log('about','main','statement','/about/main/statement','修改版权声明',array('id'=>$id));
			}

			redirect(site_aurl('about/main/statement/'));
			exit;
		}else{
			$info	=	$this->About_model->getone(array('id'=>3));
			$data = array();
			$data['info'] = $info;
			templates('about','statement',$data);
			exit;
		}

    }


	/**
	* 首页介绍
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	 public function banerders(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,true);
			$id		=	$post['id'] ? intval($post['id']) : '';
			if (!$id) {
				redirect(site_url('about/main/banerders'));
				exit;
			}

			$info	=	array();
			$info['auth']	=	$post['auth'];
			
			$contents	=	$this->input->post('contents');
			$contents	=	$contents ? htmlspecialchars($contents) : '';

			$info['contents']	=	$contents;
			$info['dates']	=	date('Y-m-d');

			$update	=	$this->About_model->update($info,array('id'=>$id));
			if ( $update ) {
				//	记录后台操作日志
				manage_log('about','main','banerders','/about/main/banerders','修改金燕卡业务介绍',array('id'=>$id));
			}

			redirect(site_aurl('about/main/banerders/'));
			exit;
		}else{
			$info	=	$this->About_model->getone(array('id'=>4));
			$data = array();
			$data['info'] = $info;
			templates('about','banerders',$data);
			exit;
		}

    }

}