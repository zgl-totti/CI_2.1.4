<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台用户组管理，管理前台用户所在组信息
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Group extends CI_Controller {
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
		
		$this->load->model('Member_group_model');

		$this->_userid	=	$this->session->userdata('userid');

	}

	/**
	* 前台用户列表信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($page = ''){
		$pagesize	=	10;
		$page		=	$page ? intval($page) : 1;
		
		$data	=	$this->Member_group_model->lists('',$page,$pagesize);
		
		
		$data['pages']	=	pages($data['total'],$pagesize,4,'/member/main/index');
		
		$this->load->view('group/index',$data);
	}

	/**
	* 编辑用户信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function edit( $id = '' ){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$id		=	$post['groupid'] ? intval($post['groupid']) : '';

			if (!$id) {
				redirect(site_url('member/group'));
				exit;
			}

			$info	=	array();
			$info['title']	=	$post['title'];
			$info['description']	=	$post['description'];
			$info['update_time']	=	time();

			$update	=	$this->Member_group_model->updates($info,$id);

			if ( $update ) {
				//	记录后台操作日志
				manage_log('member','group','edit','/member/group/edit','修改用户组信息',array('id'=>$id));
			}

			$data	=	array();
			$data['backurl']	=	site_aurl('member/group');
			$data['message']	=	'修改成功';
			
			$this->load->view('global/message',$data);
		}else{
			//	获取用户组详细信息
			$id		=	$id ? intval($id) : '';
			
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$id ) {
				redirect(site_aurl('member/group'));
				exit;
			}

			$where	=	array('id'=>$id);
			
			
			$data['info']	=	$this->Member_group_model->get($where);
			
			$this->load->view('group/edit',$data);
		}
	}

	/**
	* 添加用户
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function add(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			
			$info	=	array();
			$info['title']	=	$post['title'];
			$info['description']	=	$post['description'];
			$info['add_time']		=	time();
			$info['update_time']	=	time();

			$id	=	$this->Member_group_model->add($info);

			if ( $id ) {
				//	记录后台操作日志
				manage_log('member','group','add','/member/group/add','添加用户组',array('id'=>$id));
			}

			$data	=	array();
			$data['backurl']	=	site_aurl('member/group');
			$data['message']	=	'添加成功';
			
			$this->load->view('global/message',$data);
		}else{
			$data	=	array();
			
			$this->load->view('group/add',$data);
		}
	}

	

	
	/**
	* 删除用户组信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$idArr	=	$post['groupid'] ? $post['groupid'] : '';

			if ( !$idArr ) {
				redirect(site_url('member/group'));
				exit;
			}
			
			$deletes	=	$this->Member_group_model->deletes($idArr);
			
			if ( $deletes ) {
				//	记录后台操作日志
				manage_log('member','group','deletes','/member/group/deletes','删除用户组',json_encode($idArr));
			}
			redirect(site_url('member/group'));
			exit;
		}
	}
	
	

	/**
	* 用户权限管理
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function roile(){
		$this->load->model('Member_group_roile_model');

		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$data	=	$this->input->post(NULL,true);
			
			//	读权限
			$addroile	=	isset($data['addroile']) && $data['addroile'] ? $data['addroile'] 
				: '';
			//	增、改权限
			$updateroile	=	isset($data['updateroile']) && $data['updateroile'] ? 
				$data['updateroile'] : '';
			//	删除权限
			$deletesroile	=	isset($data['deletesroile']) && $data['deletesroile'] ? 
				$data['deletesroile'] : '';
			//	搜索权限
			$searchroile	=	isset($data['searchroile']) && $data['searchroile'] ? 
				$data['searchroile'] : '';
			//	导出权限
			$exportroile	=	isset($data['exportroile']) && $data['exportroile'] ? 
				$data['exportroile'] : '';
			//	分享权限
			$shareroile		=	isset($data['shareroile']) && $data['shareroile'] ? 
				$data['shareroile'] : '';
			//	创建用户权限
			$createroile	=	isset($data['createroile']) && $data['createroile'] ? 
				$data['createroile'] : '';
			//	组间病历读权限
			$betweenroile	=	isset($data['betweenroile']) && $data['betweenroile'] ? 
				$data['betweenroile'] : '';
			
			$group	=	$this->Member_group_model->lists('',1,1000);
			$info	=	isset($group['info']) && $group['info']  ? $group['info'] : array();

			if (!$info) {
				redirect(site_url('member/group/roile'));
				exit;
			}

			//	查询用户组id
			$groupid	=	extractArray( $info, 'id' );
			$insert	=	array();
			foreach($groupid AS $key => $val){
				
				$insert[$key]['groupid']	=	$val;
				$insert[$key]['read']		=	isset($addroile[$val]) && $addroile[$val]
					? 1 : 0;
				$insert[$key]['changes']	=	isset($updateroile[$val]) && $updateroile[$val] 
					? 1 : 0;
				$insert[$key]['del']		=	isset($deletesroile[$val]) && $deletesroile[$val] 
					? 1 : 0;
				$insert[$key]['search']	=	isset($searchroile[$val]) && $searchroile[$val] 
					? 1 : 0;
				$insert[$key]['export']	=	isset($exportroile[$val]) && $exportroile[$val] 
					? 1 : 0;
				$insert[$key]['share']	=	isset($shareroile[$val]) && $shareroile[$val] 
					? 1 : 0;
				$insert[$key]['adduser']	=	isset($createroile[$val]) && $createroile[$val]
					? 1 : 0;
				$insert[$key]['groups']	=	isset($betweenroile[$val]) && $betweenroile[$val] 
					? 1 : 0;
			}
			
			$rows	=	$this->Member_group_roile_model->insertall($insert);

			if ( $rows ) {
				//	记录后台操作日志
				manage_log('member','group','roile','/member/group/roile','修改用户组权限','');
			}
			
			redirect(site_url('member/group/roile'));
			exit;

		}else{
			//	读取用户组信息
			$data	=	$this->Member_group_model->lists('',1,1000);
			
			//	读取用户组权限信息
			$info	=	$this->Member_group_roile_model->getall();
			$info	=	$info ? handleArrayKey( $info, 'groupid' ) : '';

			$data['roile']	=	$info;
			

			$this->load->view('group/roile',$data);
		}
	}
}

