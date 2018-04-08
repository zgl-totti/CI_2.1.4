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

		$this->load->model('Card_model');
		$this->load->model('Cardtype_model');
		$this->load->model('Member_model');
		$this->load->model('Admin_model');
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
		
		$info	=	$this->Card_model->lists('',$page,$pagesize);

		$pages	=	pages($info['total'],$pagesize,4,'/card/main/index');
		
		$info['pages']	=	$pages;
		templates('card','index',$info);
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
	public function edit( $cid = '' ){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$cid		=	$post['id'] ? intval($post['id']) : '';

			if (!$sid) {
				redirect(site_url('card/main'));
				exit;
			}
			$info	=	array();
			$info['usernumber']	=	$post['usernumber'];
			$info['cardlife']	=	$post['cardlife'];
			//会员卡类别ID
			$info['cardtype']	=	$post['cardtype'] ? intval($post['cardtype']) : 0;
			$info['apply_time']	=	$post['apply_time'];
			$info['update_time']		=	time();

			$rows	=	$this->Card_model->update($info,array('id'=>$sid));

			if ( $rows ) {
				//	记录后台操作日志
				manage_log('card','main','edit','/card/main/edit','修改项目信息',array('id'=>$sid));
			}
			redirect(site_aurl('card/main'));
			exit;
		}else{
			$cid		=	$cid ? intval($cid) : '';
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$cid ) {
				redirect(site_aurl('member/main'));
				exit;
			}
			$where	=	array('id'=>$cid);
			$data['info']	=	$this->Card_model->getone($where);
			$main	=	$this->Cardtype_model->lists();
			$data['cardtype'] = $main['info'];

			//	获取用户组详细信息
			templates('card','edit',$data);
		}
	}



    public function add( $userid = '' ){
        if ( isset($_POST['submit']) && $_POST['submit'] ) {
            $post	=	$this->input->post(NULL,TRUE);

            //$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);

            $info	=	array();
            $info['usernumber']	=	$post['usernumber'];
            $info['cardlife']	=	$post['cardlife'];
            //会员卡类别ID
            $info['cardtype']	=	$post['cardtype'] ? intval($post['cardtype']) : 0;
            $info['apply_time']	=	$post['apply_time'];
            $info['add_time']	=	time();
            $info['update_time']	=	time();
            $info['user_id']		=	$post['userid'];
            $info['administrators']		=	$userInfo['userid'];
            $insertid	=	$this->Card_model->insert($info);
            if( $insertid ){
                $data['card_id']	=	$insertid ;
                $data['usernumber']	=	$post['usernumber'];
                $update	=	$this->Member_model->updates($data,$post['userid']);
            }
            if ( $insertid ) {
                //	记录后台操作日志
                manage_log('card','main','add','/card/main/add','添加项目',array('id'=>$insertid));
            }

            redirect(site_aurl('member/main/edit/'.$post['userid']));
            exit;
        }else{
            // $userid		=	$userid ? intval($userid) : '';
            // if(!$userid){
            // 	redirect(site_aurl('member/main'));
            // 	exit;
            // }

            // $main	=	$this->Cardtype_model->lists();
            // $data['userid'] = $userid;
            // $data['cardtype'] = $main['info'];
            templates('card','add');
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
	// public function add( $userid = '' ){
	// 	if ( isset($_POST['submit']) && $_POST['submit'] ) {
	// 		$post	=	$this->input->post(NULL,TRUE);
	// 		$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);
	// 		$info	=	array();
	// 		$info['usernumber']	=	$post['usernumber'];
	// 		$info['cardlife']	=	$post['cardlife'];
	// 		//会员卡类别ID
	// 		$info['cardtype']	=	$post['cardtype'] ? intval($post['cardtype']) : 0;
	// 		$info['apply_time']	=	$post['apply_time'];
	// 		$info['add_time']	=	time();
	// 		$info['update_time']	=	time();
	// 		$info['user_id']		=	$post['userid'];
	// 		$info['administrators']		=	$userInfo['userid'];
	// 		$insertid	=	$this->Card_model->insert($info);
	// 		if( $insertid ){
	// 			$data['card_id']	=	$insertid ;
	// 			$data['usernumber']	=	$post['usernumber'];
	// 			$update	=	$this->Member_model->updates($data,$post['userid']);
	// 		}
	// 		if ( $insertid ) {
	// 			//	记录后台操作日志
	// 			manage_log('card','main','add','/card/main/add','添加项目',array('id'=>$insertid));
	// 		}

	// 		redirect(site_aurl('member/main/edit/'.$post['userid']));
	// 		exit;
	// 	}else{
	// 		$userid		=	$userid ? intval($userid) : '';
	// 		if(!$userid){
	// 			redirect(site_aurl('member/main'));
	// 			exit;
	// 		}
	// 		$main	=	$this->Cardtype_model->lists();
	// 		$data['userid'] = $userid;
	// 		$data['cardtype'] = $main['info'];
	// 		templates('card','add',$data);
	// 	}
	// }


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
                redirect(site_url('card/main/index'));
                exit;
            }
            $deletes	=	$this->Card_model->deletes($idArr);
            if ( $deletes ) {
                //	记录后台操作日志
                manage_log('card','main','deletes','/card/main/deletes','删除项目',json_encode($idArr));
            }
            redirect(site_url('card/main/index'));
            exit;
        }
	}

	public function activation($userid = ''){
        $userid		=	$userid ? intval($userid) : '';
        //	如果获取不到id值，直接跳转到所有列表页面
        if ( !$userid ) {
            redirect(site_aurl('member/main'));
            exit;
        }
        $where	=	array('user_id'=>$userid);

        $info	=	array();
        $info['activation']		=	time();
        $rows	=	$this->Card_model->update($info,$where);

        if($rows){
            $update	=	$this->Member_model->updates($info,$userid);
            if ($update) {
                //	记录后台操作日志
                manage_log('card','main','activation','/card/main/activation','激活会员卡',json_encode($userid));
            }
        }
        $data['message']	=	$rows  ? 1 : 0;
        $this->load->view('card/activation',$data);
        exit;
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

		$info	=	$this->Card_model->search($keywords,$page,$pagesize);
		
		$url	= '/card/main/search?q='.$keywords;
		$pages	=	pagesadmin($info['total'],$pagesize,'',$url);
		
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		templates('card','search',$info);
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
		
		$update	=	$this->Card_model->update($info,array('id'=>$id));
		if ( $update ) {
			//	记录后台操作日志
			manage_log('card','main','recommend','/card/main/recommend','推荐项目',array('id'=>$id));
			exit('1');
		}
		exit('0');
	}
}

