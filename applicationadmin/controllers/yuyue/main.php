<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台用户管理，管理前台用户信息
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
		$this->_userid	=	$this->session->userdata('userid');
		$this->load->model('Yuyue_model');
		$this->load->model('Member_group_model');
		$this->load->model('Shops_service_model');
		$this->load->model('Order_model');
		$this->load->model('Admin_model');
		$this->load->model('Card_model');
		
		
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
		$userinfo	=	getAdminuserinfo();
		$pagesize	=	10;
		$page		=	$page ? intval($page) : 1;
		$where = '';
		if($userinfo['userid'] == 2){
			$where = "DATE_FORMAT(FROM_UNIXTIME(add_time),'%Y-%m-%d') = DATE_FORMAT(NOW(),'%Y-%m-%d')";
		}
		
    
    
		$data	=	$this->Yuyue_model->lists($where,$page,$pagesize);
//print_r($data);die;
		// foreach ($data['info'] as $key => $value) {
		// 	$info	=	$this->Card_model->getbyid($value['card_id']);
		// 	$data['info'][$key]['usernumber'] = $info['0']['usernumber'];
		// }
		$data['pages']	=	pages($data['total'],$pagesize,4,'/yuyue/main/index');
		
		//	查询用户组信息
		// $this->load->model('Member_group_model');
		// $ginfo			=	$this->Member_group_model->lists('',1,1000);
		// $data['group']	=	$ginfo && $ginfo['info'] ? handleArrayKey($ginfo['info'],'id') : array();
		
		templates('yuyue','index',$data);
		exit;
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
			$id		=	$post['userid'] ? intval($post['userid']) : '';

			if (!$id) {
				redirect(site_url('yuyue/main'));
				exit;
			}

			$info	=	array();
			$info['realname']	=	$post['realname'];
			$info['nickname']	=	$post['nickname'];
			
			$info['telephone']		=	$post['telephone'] ? $post['telephone'] : '';
			
			$info['price']		=	$post['price'] ? $post['price'] : '';
			

			$update	=	$this->Yuyue_model->updates($info,$id);

			if ( $update ) {
				//	记录后台操作日志
				manage_log('yuyue','main','edit','/yuyue/main/edit','修改用户基本信息',array('userid'=>$id));
			}

			redirect(site_aurl('yuyue/main'));
			exit;
		}else{
			//	获取用户组详细信息
			$id		=	$id ? intval($id) : '';
			
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$id ) {
				redirect(site_aurl('yuyue/main'));
				exit;
			}

			$where	=	array('userid'=>$id);
			
			
			$data['info']	=	$this->Yuyue_model->get($where);
			
			//	查询用户组信息
			// $this->load->model('Member_group_model');
			// $ginfo			=	$this->Member_group_model->lists('',1,1000);
			// $data['group']	=	$ginfo && $ginfo['info'] ? $ginfo['info'] : array();
			// // 绑定店铺权限
			// $ainfo			=	$this->Admin_model->manage_user_lists(1,1000);
			// $data['admin']	=	$ainfo && $ainfo['info'] ? $ainfo['info'] : array();

			$data['userid'] =   $this->_userid;

			$this->load->view('yuyue/edit',$data);
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
			$info['realname']	=	$post['realname'];
			$info['nickname']	=	$post['nickname'];
			
			$info['telephone']		=	$post['telephone'] ? $post['telephone'] : '';
			
			$info['price']		=	$post['price'] ? $post['price'] : '';
			$info['add_time']	=	time();

			$userid	=	$this->Yuyue_model->add($info);

			if ( $userid ) {
				//	记录后台操作日志
				manage_log('yuyue','main','add','/yuyue/main/add','添加用户',array('userid'=>$userid));
			}

			redirect(site_aurl('yuyue/main'));
			exit;
		}else{
			$data	=	array();
			
			//	查询用户组信息
			// $this->load->model('Member_group_model');
			// $ginfo			=	$this->Member_group_model->lists('',1,1000);
			// $data['group']	=	$ginfo && $ginfo['info'] ? $ginfo['info'] : array();

			// // 绑定店铺权限
			// $ainfo			=	$this->Admin_model->manage_user_lists(1,1000);
			// $data['admin']	=	$ainfo && $ainfo['info'] ? $ainfo['info'] : array();
			
			$data['userid'] =   $this->_userid;

			$this->load->view('yuyue/add',$data);
		}
	}

	/**
	* ajax 验证用户名是否已经存在
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function public_checkname_ajax(){
		$username	=	$this->input->post('username',TRUE);
		if ( !$username ) {
			exit("false");
		}
		$this->load->model('Yuyue_model');
		$userinfo	=	$this->Yuyue_model->get_info_by_username($username);
		if ( !$userinfo ) {
			exit("true");
		}
		exit("false");
	}

	/**
	* ajax 验证邮箱是否已经存在
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function public_checkemail_ajax(){
		$email	=	$this->input->post('email',TRUE);
		if ( !$email ) {
			exit("false");
		}
		$this->load->model('Yuyue_model');
		$userinfo	=	$this->Yuyue_model->get_info_by_email($email);
		if ( !$userinfo ) {
			exit("true");
		}
		exit("false");
	}

	/**
	* ajax 验证邮箱是否已经存在
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function public_checkphone_ajax(){
		$phone	=	$this->input->post('phone',TRUE);
		if ( !$phone ) {
			exit("false");
		}
		$this->load->model('Yuyue_model');
		$userinfo	=	$this->Yuyue_model->get_info_by_phone($phone);
		if ( !$userinfo ) {
			exit("true");
		}
		exit("false");
	}

	/**
	* 删除用户信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$idArr	=	$post['userid'] ? $post['userid'] : '';

			if ( !$idArr ) {
				redirect(site_url('member/main'));
				exit;
			}
			
			$deletes	=	$this->Yuyue_model->deletes($idArr);
			
			if ( $deletes ) {
				//	记录后台操作日志
				manage_log('member','main','deletes','/member/main/deletes','删除医院信息',json_encode($idArr));
			}
			redirect(site_url('member/main'));
			exit;
		}
	}

	/**
	* 生成订单
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function order(){

		if ( isset($_POST['submit']) && $_POST['submit'] ){
			$post	=	$this->input->post(NULL,TRUE);
			$idArr	=	$post['userid'] ? $post['userid'] : '';
			$service=	isset($post['service']) && $post['service'] ? $post['service'] : '';

			if ( !$idArr && !$service ) {
				redirect(site_url('member/main'));
				exit;
			}
			$info	=	$this->Yuyue_model->getidArr($idArr);
			foreach ($info['info'] as $key => $value) {
				if(!$value['activation']){
					$data['message']	=	2;
					$this->load->view('member/order',$data);
					exit;
				}
			}
			
			
			if ( $service ) {
				$services	=	implode(",", $service);
			}else{
				$services	=	'';
			}
			$userInfo	=	$this->Admin_model->get_info_by_userid($this->_userid);
			foreach ( $idArr as $k=>$v ){
       			$data['userid'] = $idArr[$k];
       			$data['serviceid'] = $services;
       			$data['total'] = 0;
       			$data['status_shop'] = 2;
       			$data['status_user'] = 1;
            	$data['ordernum'] = date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);;
       			$data['add_time'] = time();
       			$data['administrators'] = $userInfo['userid'];
       			$orderid = $this->Order_model->insert($data);
       		}
			
			if ( $orderid ) {
				//	记录后台操作日志
				manage_log('member','main','order','/member/main/order','生成订单',json_encode($idArr));
			}
			
			$data['message']	=	$orderid  ? 1 : 0;
			$this->load->view('member/order',$data);
		}
	}


	/**
	 * 用户搜索
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
		$pagesize	=	10;
	
		$info	=	$this->Yuyue_model->search($keywords,$page,$pagesize);
	
		$url	= '/yuyue/main/search?q='.$keywords;
		$pages	=	pages($info['total'],$pagesize,'',$url);
	
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		// 生成订单所需的服务
		$shops_service	=	$this->Shops_service_model->lists();
		$info['shops_service'] = $shops_service['info'];

		templates('yuyue','search',$info);
		exit;
	}

	/**
	 * 按钮搜索
	 * @author		wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function submitsearch(){
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('q',TRUE);
		$page		=	$this->input->get('per_page',TRUE);
	
		$page		=	isset($page) ? intval($page) : 1;
		$page		=	max(1,$page);
		$pagesize	=	10;
		$where = array();
		$where[$keywords] = '';
		$info	=	$this->Yuyue_model->submitsearch($where,$page,$pagesize);
	
		$url	= '/member/main/submitsearch?q='.$keywords;
		$pages	=	pages($info['total'],$pagesize,'',$url);
	
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		// 生成订单所需的服务
		$shops_service	=	$this->Shops_service_model->lists();
		$info['shops_service'] = $shops_service['info'];

		templates('member','search',$info);
		exit;
	}
	
	/**
	 * 用户组搜索
	 * @author		laifei
	 * @copyright	247348520@qq.com	
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function search_group(){
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('key',TRUE);		
		$page		=	$this->input->get('per_page',TRUE);
		
		$where		=	array();
		$where['title'] = $keywords;		
		
		$data		=	$this->Member_group_model->get($where);		
		//获取用户组id
		$groupid 	=	$data['id'];
			
		$page		=	isset($page) ? intval($page) : 1;
		$page		=	max(1,$page);
		$pagesize	=	10;
		$groupinfo = $this->getgroup();
		

		$info	=	$this->Yuyue_model->search_group($groupid,$page,$pagesize);
		$info['groupinfo'] = $groupinfo;
		$url	= '/member/main/search?q='.$keywords;
		$pages	=	pages($info['total'],$pagesize,'',$url);
	
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		
		templates('member','search',$info);
		exit;
	}
	
	/**
	* 获取用户组信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	private function getgroup(){
		//	获取用户组信息
		$this->load->model('Member_group_model');
		$groupinfo	=	$this->Member_group_model->lists('',1,1000);
		$groupinfo	=	isset($groupinfo['info']) && $groupinfo['info'] ? 
			$groupinfo['info'] : '';
		$ginfo		=	array();
		if ($groupinfo) {
			foreach($groupinfo AS $key => $val){
				$ginfo[$val['id']]	=	$val;
			}
		}

		Return $ginfo;
	}
	
	
}

