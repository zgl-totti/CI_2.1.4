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
		$this->load->model('Wechat_model');
		$this->load->model('Shops_model');
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
		

		$data	=	$this->Wechat_model->lists($where,$page,$pagesize);
		//echo '<pre>';print_r($data);die;
	/*	foreach ($data['info'] as $key => $value) {
			$info	=	$this->Card_model->getbyid($value['card_id']);
			$data['info'][$key]['usernumber'] = $info['0']['usernumber'];
		}*/
		$data['pages']	=	pages($data['total'],$pagesize,4,'/member/main/index');
		
		//	查询用户组信息
		/*$this->load->model('Member_group_model');
		$ginfo			=	$this->Member_group_model->lists('',1,1000);
		$data['group']	=	$ginfo && $ginfo['info'] ? handleArrayKey($ginfo['info'],'id') : array();*/
		
		$this->load->view('member/index',$data);
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

			if (!$id) {
				redirect(site_url('member/main'));
				exit;
			}

			$info	=	array();

			$info['shop_id']	=	$post['shop_id'];

			$update	=	$this->Wechat_model->updates($info,$id);

			if ( $update ) {
				//	记录后台操作日志
				manage_log('member','main','edit','/member/main/edit','修改用户基本信息',array('userid'=>$id));
			}

			redirect(site_aurl('member/main'));
			exit;
		}else{
			//	获取用户组详细信息
			$id		=	$id ? intval($id) : '';
			
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$id ) {
				redirect(site_aurl('member/main'));
				exit;
			}

			$where	=	array('id'=>$id);
			
			
			$data['info']	=	$this->Wechat_model->get($where);
			//下拉列表


			$shops=$this->Shops_model->lists('','','','','id,shopsname');
			$data['shops']=$shops['info'];


//echo '<pre>';print_r($shops);die;
			$this->load->view('member/edit',$data);
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
			$nickname=$this->input->post('nickname',true);
			$sex=$this->input->post('sex',true);
			$shop_id=$this->input->post('shop_id',true);
			$city=$this->input->post('city',true);
			if($shop_id>0 && $nickname && $sex && $city){

				$userinfo=$this->db->select('*')->where(array('nickname'=>$nickname))->get()->row_array();
				$data=$this->db->select('*')->where(array('shop_id'=>$shop_id))->get()->row_array();
				if($userinfo){
					if($userinfo['shop_id'] && $userinfo['shop_id']>0){
						echo "<script>alert('微信号已经绑定');</script>";
						redirect(site_aurl('member/main'));
					}else{
						if($data){
							echo "<script>alert('商铺已经绑定');</script>";
							redirect(site_aurl('member/main'));
						}else{
							$info['shop_id']=$shop_id;
							$userid=$this->Wechat_model->updates($info,$userinfo['id']);
							if($userid){
								echo "<script>alert('添加成功!');</script>";
							}else{
								echo "<script>alert('添加失败!')</script>";
							}
							redirect(site_aurl('member/main'));
						}
					}
				}else{
					if($data){
						echo "<script>alert('商铺已经绑定');</script>";
						redirect(site_aurl('member/main'));
					}else{
						$info['nickname']=$nickname;
						$info['sex']=$sex;
						$info['shop_id']=$shop_id;
						$info['city']=$city;
						$info['addtime']=time();

						$userid=$this->Wechat_model->add($info);
						if($userid){
							//记录后台操作日志
							manage_log('member','main','add','/member/main/add','添加用户',array('userid'=>$userid));
						}
						redirect(site_aurl('member/main'));
						exit;
					}
				}
			}else{
				redirect(site_aurl('member/main'));
			}
		}else{
			$data	=	array();
			//	查询用户组信息
			$this->load->model('Member_group_model');
			$ginfo			=	$this->Member_group_model->lists('',1,1000);
			$data['group']	=	$ginfo && $ginfo['info'] ? $ginfo['info'] : array();
			// 绑定店铺权限
			$ainfo			=	$this->Admin_model->manage_user_lists(1,1000);
			$data['admin']	=	$ainfo && $ainfo['info'] ? $ainfo['info'] : array();
					
			$data['userid'] =   $this->_userid;
			$shops=$this->Shops_model->lists('','','','','id,shopsname');
			$this->load->vars('shops',$shops['info']);

			$this->load->view('member/add',$data);
		}
	}


	/*public function add(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$info	=	array();
			$info['realname']	=	$post['realname'];
			$info['nickname']	=	$post['nickname'];
			$info['email']		=	$post['email'] ? $post['email'] : '';
			$info['phone']		=	$post['phone'] ? $post['phone'] : '';
			$info['group']		=	$post['group'] ? intval($post['group']) : '0';
			$info['admin']		=	$post['admin'] ? intval($post['admin']) : '0';
			$info['sex']		=	$post['sex'] ? intval($post['sex']) : '0';
			$info['birthday']		=	$post['birthday'] ? $post['birthday'] : '';
			$info['telephone']		=	$post['telephone'] ? $post['telephone'] : '';
			$info['number']		=	$post['number'] ? $post['number'] : '';
			$info['wechat']		=	$post['wechat'] ? $post['wechat'] : '';
			$info['qq']		=	$post['qq'] ? $post['qq'] : '';
			$info['origin']		=	$post['origin'] ? $post['origin'] : '';
			$info['address']		=	$post['address'] ? $post['address'] : '';
			$info['marital']		=	$post['marital'] ? $post['marital'] : '';
			$info['work']		=	$post['work'] ? $post['work'] : '';
			$info['post']		=	$post['post'] ? $post['post'] : '';
			$info['hobby']		=	$post['hobby'] ? $post['hobby'] : '';
			$info['license']		=	$post['license'] ? $post['license'] : '';
			$info['type']		=	$post['type'] ? $post['type'] : '';
			$info['limited']		=	$post['limited'] ? $post['limited'] : '';
			$info['renewal']		=	$post['renewal'] ? $post['renewal'] : '';
			$info['plate']		=	$post['plate'] ? $post['plate'] : '';
			$info['add_time']	=	time();

			$nickname=$this->input->post('nickname',true);
			$sex=$this->input->post('sex',true);
			$shop_id=$this->input->post('shop_id',true);
			$city=$this->input->post('city',true);
			if($shop_id>0 && $nickname && $sex && $city){

				$info['nickname']=$nickname;
				$info['sex']=$sex;
				$info['shop_id']=$shop_id;
				$info['city']=$city;
				$info['addtime']=time();

				$userid=$this->Wechat_model->add($info);
				if($userid){
					//记录后台操作日志
					manage_log('member','main','add','/member/main/add','添加用户',array('userid'=>$userid));
				}
				redirect(site_aurl('member/main'));
				exit;
			}else{
				redirect(site_aurl('member/main'));
			}
		}else{
			$data	=	array();
			
			//	查询用户组信息
			$this->load->model('Member_group_model');
			$ginfo			=	$this->Member_group_model->lists('',1,1000);
			$data['group']	=	$ginfo && $ginfo['info'] ? $ginfo['info'] : array();

			// 绑定店铺权限
			$ainfo			=	$this->Admin_model->manage_user_lists(1,1000);
			$data['admin']	=	$ainfo && $ainfo['info'] ? $ainfo['info'] : array();
			
			$data['userid'] =   $this->_userid;
			$shops=$this->Shops_model->lists('','','','','id,shopsname');
			$this->load->vars('shops',$shops['info']);

			$this->load->view('member/add',$data);
		}
	}*/

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
		$this->load->model('Wechat_model');
		$userinfo	=	$this->Wechat_model->get_info_by_username($username);
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
		$this->load->model('Wechat_model');
		$userinfo	=	$this->Wechat_model->get_info_by_email($email);
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
		$this->load->model('Wechat_model');
		$userinfo	=	$this->Wechat_model->get_info_by_phone($phone);
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
			$idArr	=	$post['id'] ? $post['id'] : '';

			if ( !$idArr ) {
				redirect(site_url('member/main'));
				exit;
			}
			
			$deletes	=	$this->Wechat_model->deletes($idArr);
			
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
			$info	=	$this->Wechat_model->getidArr($idArr);
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

		//echo $keywords;die;
		$page		=	$this->input->get('per_page',TRUE);
	
		$page		=	isset($page) ? intval($page) : 1;
		$page		=	max(1,$page);
		$pagesize	=	10;
	
		$info	=	$this->Wechat_model->search($keywords,$page,$pagesize);
	
		$url	= '/member/main/search?q='.$keywords;
		$pages	=	pages($info['total'],$pagesize,'',$url);
	
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		//print_r($info);die;
		// 生成订单所需的服务
	/*	$shops_service	=	$this->Shops_service_model->lists();
		$info['shops_service'] = $shops_service['info'];*/
//echo '<pre>';print_r($info);die;
		templates('member','index',$info);
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
		$info	=	$this->Wechat_model->submitsearch($where,$page,$pagesize);
	
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
		

		$info	=	$this->Wechat_model->search_group($groupid,$page,$pagesize);
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

