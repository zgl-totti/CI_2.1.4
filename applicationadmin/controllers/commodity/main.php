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
		$this->load->model('Commodity_group_model');
		$this->load->model('Commodity_model');
		$this->load->model('Shops_model');
	
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
		
		$info	=	$this->Commodity_model->lists('',$page,$pagesize);
		$pages	=	pages($info['total'],$pagesize,4,'/commodity/main/index');
		$info['pages']	=	$pages;

		templates('commodity','index',$info);
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
				redirect(site_url('commodity/main'));
				exit;
			}
			$info	=	array();
			$info['brand']	=	$post['brand'];
			$info['name']	=	$post['name'];
			$info['title']		=	$post['title'];
			$info['keywords']	=	$post['keywords'];
			$info['oldprice']	=	$post['oldprice'];
			$info['newprice']	=	$post['newprice'];
			$info['height']	=	$post['height'];
			$info['integral']	=	$post['integral'];
			$info['stock']	=	$post['stock'];
			//商铺关联ID
			//$info['gid']	=	$post['gid'] ? intval($post['gid']) : 0;
			//	详细介绍
			$info['newdesc']		=	htmlspecialchars($_POST['desc']);
			//$info['newdesc']		=	htmlspecialchars($post['newdesc']);
			$info['updatetime']		=	time();

			if ( isset($_FILES) && $_FILES) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'commodity';
				//echo '<pre>';print_r($_FILES);//die;
				/*上传多张图片*/
				foreach($_FILES  as $k=> $v) {
					if (!empty($v['name'])) {
						$thumb[$k] = $this->attachmentclass->upload($k);
					}
				}
				if($thumb){
					foreach($thumb as $k=>$v){
						$info[$k]=$v['filepath'];
					}
				}
			}

			$rows	=	$this->Commodity_model->update($info,array('id'=>$sid));
			if ( $rows>0 ) {
				//	记录后台操作日志
				manage_log('commodity','main','edit','/commodity/main/edit','修改项目信息',array('id'=>$sid));
			}
			redirect(site_aurl('commodity/main'));
			exit;
		}else{
			$sid		=	$sid ? intval($sid) : '';
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$sid ) {
				redirect(site_aurl('commodity/main'));
				exit;
			}
			$where	=	array('id'=>$sid);
			$data['info']	=	$this->Commodity_model->getone($where);
			//$main	=	$this->Commodity_group_model->lists();
            //	$data['shops'] = $main['info'];
			//	获取用户组详细信息
			templates('commodity','edit',$data);
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
			$info['brand']	=	$post['brand'];
			$info['name']	=	$post['name'];
			$info['title']		=	$post['title'];
			$info['keywords']	=	$post['keywords'];
			$info['oldprice']	=	$post['oldprice'];
			$info['newprice']	=	$post['newprice'];
			$info['height']	=	$post['height'];
			$info['integral']	=	$post['integral'];
			$info['stock']	=	$post['stock'];
			//商铺关联ID
			$info['gid']	=	$post['gid'] ? intval($post['gid']) : 0;

			//	详细介绍
			$info['newdesc']		=	htmlspecialchars($_POST['desc']);
			//$info['newdesc']		=	htmlspecialchars($post['newdesc']);
			$info['add_time']	=	time();
			$info['updatetime']	=	time();
			$info['userid']		=	$this->_userid;

			if ( isset($_FILES) && $_FILES) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'commodity';
				echo '<pre>';print_r($_FILES);//die;
				/*上传多张图片*/
				foreach($_FILES  as $k=> $v) {
					if (!empty($v['name'])) {
						$thumb[$k] = $this->attachmentclass->upload($k);
					}
				}
				if($thumb){
					foreach($thumb as $k=>$v){
						$info[$k]=$v['filepath'];
					}
				}
			}
			$insertid	=	$this->Commodity_model->insert($info);
			if ( $insertid ) {
				//	记录后台操作日志
				manage_log('commodity','main','add','/commodity/main/add','添加项目',array('id'=>$insertid));
				redirect(site_aurl('commodity/main'));
			}
			exit;
		}else{
			$data['dianmian']	=	$this->Shops_model->lists();
			$main	=	$this->Commodity_group_model->lists();
			$data['shops'] = $main['info'];
			templates('commodity','add',$data);
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
                redirect(site_url('commodity/main/index'));
                exit;
            }

            $deletes	=	$this->Commodity_model->deletes($idArr);
            if ( $deletes ) {
                //	记录后台操作日志
                manage_log('commodity','main','deletes','/commodity/main/deletes','删除项目',json_encode($idArr));
            }
            redirect(site_url('commodity/main/index'));
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

		$info	=	$this->Commodity_model->search($keywords,$page,$pagesize);
		
		$url	= '/commodity/main/search?q='.$keywords;
		$pages	=	pagesadmin($info['total'],$pagesize,'',$url);
		
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		templates('commodity','search',$info);
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
		
		$update	=	$this->Commodity_model->update($info,array('id'=>$id));
		if ( $update ) {
			//	记录后台操作日志
			manage_log('commodity','main','recommend','/commodity/main/recommend','推荐项目',array('id'=>$id));
			exit('1');
		}
		exit('0');
	}
}

