<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台项目管理
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

		$this->load->model('Driving_model');
		$this->load->model('Signup_model');
		$this->_userid	=	$this->session->userdata('userid');
	}

	/**
	* 列表管理操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($page = ''){
		$page	=	isset($page) ? intval($page) : 1;
		$page	=	max(1,$page);
		$pagesize	=	20;
		$info	=	$this->Signup_model->lists('',$page,$pagesize);
		$pages	=	pages($info['total'],$pagesize,4,'/signup/main/index');
		$info['pages']	=	$pages;
		templates('signup','index',$info);
		exit;
	}

	/**
	* 编辑项目管理
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function edit( $sid = '' ){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$sid		=	$post['bookid'] ? intval($post['bookid']) : '';

			if (!$sid) {
				redirect(site_url('signup/main'));
				exit;
			}
			$info	=	array();
			$info['name']	=	$post['name'];
			$info['phone']	=	$post['phone'];
			$info['mailbox']	=	$post['mailbox'];
			//商铺关联ID
			$info['did']	=	$post['did'] ? intval($post['did']) : 0;
			//	详细介绍
			$info['details']		=	htmlspecialchars($post['details']);
			$info['update_time']		=	time();

			$rows	=	$this->Signup_model->update($info,array('id'=>$sid));

			if ( $rows ) {
				//	记录后台操作日志
				manage_log('signup','main','edit','/signup/main/edit','修改项目信息',array('id'=>$sid));
			}

			redirect(site_aurl('signup/main'));
			exit;
		}else{
			$sid		=	$sid ? intval($sid) : '';
			
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$sid ) {
				redirect(site_aurl('signup/main'));
				exit;
			}
			$where	=	array('id'=>$sid);
			
			$data['info']	=	$this->Signup_model->getone($where);	

			$main	=	$this->Driving_model->lists();

			$data['shops'] = $main['info'];
			//	获取用户组详细信息
			
			templates('signup','edit',$data);
		}
	}


	/**
	* 添加项目管理
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function add(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			
			$info	=	array();
			$info['name']	=	$post['name'];
			$info['phone']	=	$post['phone'];
			$info['mailbox']	=	$post['mailbox'];
			//商铺关联ID
			$info['did']	=	$post['did'] ? intval($post['did']) : 0;
			//	详细介绍
			$info['details']		=	htmlspecialchars($post['details']);
			$info['add_time']	=	time();
			$info['update_time']	=	time();
			$info['userid']		=	$this->_userid;
			$insertid	=	$this->Signup_model->insert($info);

			if ( $insertid ) {
				//	记录后台操作日志
				manage_log('signup','main','add','/signup/main/add','添加项目',array('id'=>$insertid));
			}
			redirect(site_aurl('signup/main'));
			exit;
		}else{
			$main	=	$this->Driving_model->lists();

			$data['shops'] = $main['info'];
			templates('signup','add',$data);
		}
	}
	/**
	* 删除
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
            $post	=	$this->input->post(NULL,TRUE);
            $idArr	=	$post['id'] ? $post['id'] : '';
            if ( !$idArr ) {
                redirect(site_url('signup/main/index'));
                exit;
            }

            $deletes	=	$this->Signup_model->deletes($idArr);
            if ( $deletes ) {
                //	记录后台操作日志
                manage_log('signup','main','deletes','/signup/main/deletes','删除项目',json_encode($idArr));
            }
            redirect(site_url('signup/main/index'));
            exit;
		}
	}


	/**
	* 项目搜索
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function search(){
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('q',TRUE);
		$page		=	$this->input->get('per_page',TRUE);
		
		$page		=	isset($page) ? intval($page) : 1;
		$page		=	max(1,$page);
		$pagesize	=	20;

		$info	=	$this->Signup_model->search($keywords,$page,$pagesize);
		
		$url	= '/signup/main/search?q='.$keywords;
		$pages	=	pagesadmin($info['total'],$pagesize,'',$url);
		
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		templates('signup','search',$info);
		exit;
	}


	/**
	* 项目推荐前台显示
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 项目  $type 判断是删除推荐还是添加推荐
	* @return		
	*/
	public function recommend($id = '',$type = ''){
		if (!$id) {
			exit('0');
		}
		$id		=	intval($id);

		$info	=	array();
		$type	=	$type ? intval($type) : 0;
		$info['status']		=	99;
		if ( $type ) {
			$info['status']	=	0;
		}
		
		$update	=	$this->Signup_model->update($info,array('id'=>$id));
		if ( $update ) {
			//	记录后台操作日志
			manage_log('signup','main','recommend','/signup/main/recommend','推荐项目',array('id'=>$id));
			exit('1');
		}
		exit('0');
	}
}

