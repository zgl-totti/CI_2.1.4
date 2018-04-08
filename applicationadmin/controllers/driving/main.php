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
		$this->load->model('Shops_model');
		$this->load->model('Driving_model');
	
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
		$info	=	$this->Driving_model->lists('',$page,$pagesize);
		$pages	=	pages($info['total'],$pagesize,4,'/driving/main/index');
		$info['pages']	=	$pages;
		templates('driving','index',$info);
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
				redirect(site_url('driving/main'));
				exit;
			}
			$info	=	array();
			$info['atime']	=	$post['atime'];
			$info['place']	=	$post['place'];
			$info['title']		=	$post['title'];
			$info['route']	=	$post['route'];
			$info['organization']	=	$post['organization'];
			$info['responsible']	=	$post['responsible'];
			$info['phone']	=	$post['phone'];
			$info['deadline']	=	$post['deadline'];
			//	详细介绍
			$info['details']		=	htmlspecialchars($_POST['details']);
			$info['update_time']		=	time();
			if (isset($_FILES['thumb']) && $_FILES['thumb']['name']) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'driving';
				$thumb	=	$this->attachmentclass->upload('thumb');
				$info['thumb']	=	$thumb ? $thumb['filepath'] : '';
			}
			$rows	=	$this->Driving_model->update($info,array('id'=>$sid));
			if ( $rows ) {
				//	记录后台操作日志
				manage_log('driving','main','edit','/driving/main/edit','修改项目信息',array('id'=>$sid));
			}
			redirect(site_aurl('driving/main'));
			exit;
		}else{
			$sid		=	$sid ? intval($sid) : '';
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$sid ) {
				redirect(site_aurl('driving/main'));
				exit;
			}
			$where	=	array('id'=>$sid);
			$data['info']	=	$this->Driving_model->getone($where);
			$main	=	$this->Shops_model->lists();
			$data['shops'] = $main['info'];
			//	获取用户组详细信息
			templates('driving','edit',$data);
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
			$info['atime']	=	$post['atime'];
			$info['place']	=	$post['place'];
			$info['title']		=	$post['title'];
			$info['route']	=	$post['route'];
			$info['organization']	=	$post['organization'];
			$info['responsible']	=	$post['responsible'];
			$info['phone']	=	$post['phone'];
			$info['deadline']	=	$post['deadline'];
			
			//	详细介绍
			$info['details']		=	htmlspecialchars($_POST['details']);
			$info['add_time']	=	time();
			$info['update_time']	=	time();
			$info['userid']		=	$this->_userid;
			if (isset($_FILES['thumb']) && $_FILES['thumb']['name']) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'driving';
				$thumb	=	$this->attachmentclass->upload('thumb');
				$info['thumb']	=	$thumb ? $thumb['filepath'] : '';
			}
			$insertid	=	$this->Driving_model->insert($info);
			if ( $insertid ) {
				//	记录后台操作日志
				manage_log('driving','main','add','/driving/main/add','添加项目',array('id'=>$insertid));
			}
			redirect(site_aurl('driving/main'));
			exit;
		}else{
			$main	=	$this->Shops_model->lists();
			$data['shops'] = $main['info'];
			templates('driving','add',$data);
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
                redirect(site_url('driving/main/index'));
                exit;
            }

            $deletes	=	$this->Driving_model->deletes($idArr);
            if ( $deletes ) {
                //	记录后台操作日志
                manage_log('driving','main','deletes','/driving/main/deletes','删除项目',json_encode($idArr));
            }
            redirect(site_url('driving/main/index'));
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

		$info	=	$this->Driving_model->search($keywords,$page,$pagesize);
		
		$url	= '/driving/main/search?q='.$keywords;
		$pages	=	pagesadmin($info['total'],$pagesize,'',$url);
		
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		templates('driving','search',$info);
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
		
		$update	=	$this->Driving_model->update($info,array('id'=>$id));
		if ( $update ) {
			//	记录后台操作日志
			manage_log('driving','main','recommend','/driving/main/recommend','推荐项目',array('id'=>$id));
			exit('1');
		}
		exit('0');
	}
}

