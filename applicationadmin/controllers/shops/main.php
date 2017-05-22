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
		$this->load->model('Shops_group_model');
		$this->load->model('Region_model');
		$this->load->model('Admin_model');
		$this->load->model('Shops_service_model');
		
	
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
		
		$info	=	$this->Shops_model->lists('',$page,$pagesize,true);

		$pages	=	pages($info['total'],$pagesize,4,'/shops/main/index');
		
		$info['pages']	=	$pages;
		templates('shops','index',$info);
		exit;
	}
	/*设置是否展示*/
	public function setshow()
	{
		$where['id'] = $_POST['id'];
		//$where['team_id']=$this->session->userdata('team_id');
		$info = $this->Shops_model->getone($where);
		//print_r($info);die;
		if ($info['isshow'] == 1) {


			$date['isshow'] = 2;
			$res1 = $this->Shops_model->update($date, $where);
			if ($res1 > 0) {
				$data['status'] = -1;
				$data['msg'] = "已取消!";
			}


			exit(json_encode($data));
		}else{


			$date['isshow'] = 1;
			$res = $this->Shops_model->update($date, $where);
			if ($res > 0) {
				$data['status'] = 1;
				$data['msg'] = "已取消!";
			}
			exit(json_encode($data));

		}
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
				redirect(site_url('shops/main'));
				exit;
			}
			$info	=	array();

			//商铺名称
			$info['shopsname']	=	$post['shopsname'];
			//商铺地址
			$info['shopaddress']	=	$post['shopaddress'];
			//商铺规模
			$info['shopsize']		=	$post['shopsize'];
			//职员人数
			$info['officeworker']	=	$post['officeworker'];
			//坐标
			$info['coordinate']	=	$post['coordinate'];
			//手机号
			$info['phone']		=	$post['phone'] ? $post['phone'] : '';
			//手机号
			$info['sphone']		=	$post['sphone'] ? $post['sphone'] : '';






			//商铺组关联ID
			$info['parentid']	=	$post['parentid'] ? intval($post['parentid']) : 0;
			$info['regionid']	=	$post['regionid'] ? intval($post['regionid']) : 0;
			$info['auserid']	=	$post['auserid'] ? intval($post['auserid']) : 0;
			//宣传语
			$info['slogan']		=	$post['slogan'] ? $post['slogan'] : '';
            //账号名   对公账号  开户行
			$info['account_name']		=	$post['account_name'] ? $post['account_name'] : '';
			$info['account_num']		=	$post['account_num'] ? $post['account_num'] : '';
			$info['account_address']		=	$post['account_address'] ? $post['account_address'] : '';





			//	详细介绍
			$info['content']		=	htmlspecialchars($_POST['contents']);
			$info['updatetime']		=	time();

			$service		=	isset($post['service']) && 
				$post['service'] ? $post['service'] : '';
			if ( $service ) {
				$info['service']	=	implode(",", $service);
			}else{
				$info['service']	=	'';
			}



			if (isset($_FILES['thumb']) && $_FILES['thumb']['name']) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'shops';
				$thumb	=	$this->attachmentclass->upload('thumb');
				$info['thumb']	=	$thumb ? $thumb['filepath'] : '';
			}


			

			$info['userid']		=	$this->_userid;
			$rows	=	$this->Shops_model->update($info,array('id'=>$sid));

			if ( $rows ) {
				//	记录后台操作日志
				manage_log('shops','main','edit','/shops/main/edit','修改项目信息',array('id'=>$sid));
			}

			redirect(site_aurl('shops/main'));
			exit;
		}else{
			$sid		=	$sid ? intval($sid) : '';
			
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$sid ) {
				redirect(site_aurl('shops/main'));
				exit;
			}
			$where	=	array('id'=>$sid);
			
			$data['info']	=	$this->Shops_model->getone($where);	
			$id = $data['info']['parentid'];
			$rid = $data['info']['regionid'];
			$auid = $data['info']['auserid'];

			if ( $data['info'] && $data['info']['service']) {
				$data['info']['service']	=	explode(',',$data['info']['service']);
			}

			$this->load->library('tree');
			//	获取所有信息，生成下拉框树选择

			//店面分类
			$main	=	$this->Shops_group_model->lists();
			//	上级菜单下拉选择
			$array = array();
			foreach($main['info'] as $r) {
				$r['cname'] = $r['name'];
				$r['selected'] = $r['id'] == $id ? 'selected' : '';
				$array[] = $r;
			}
			$str  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->tree->init($array);
			$data['shopgroup'] = $this->tree->get_tree(0, $str);
			
			//	获取用户组详细信息
			//地区管理
			$regionmain	=	$this->Region_model->lists();

			if ( !$regionmain || !$regionmain['info'] ) {
			//redirect(site_aurl('admin/main'));
			}
			//	获取所有信息，生成下拉框树选择
			//	上级菜单下拉选择
			$regionarray = array();
			foreach($regionmain['info'] as $r) {
				$r['cname'] = $r['name'];
				$r['selected'] = $r['id'] == $rid ? 'selected' : '';
				$regionarray[] = $r;
			}
			$regionstr  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->tree->init($regionarray);
			$data['select_categorys'] = $this->tree->get_tree(0, $regionstr);
			

			//店面负责人账号
			$adminusermain	=	$this->Admin_model->lists();
			$data['store_account'] = $adminusermain['info'];

			//店面服务项
			$shops_service	=	$this->Shops_service_model->lists();

			$data['shops_service'] = $shops_service['info'];
			
			templates('shops','edit',$data);
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
			//商铺名称
			$info['shopsname']	=	$post['shopsname'];
			//商铺地址
			$info['shopaddress']	=	$post['shopaddress'];
			//商铺规模
			$info['shopsize']		=	$post['shopsize'];
			//职员人数
			$info['officeworker']	=	$post['officeworker'];
			//坐标
			$info['coordinate']	=	$post['coordinate'];
			//负责人
			$info['charge']	=	$post['charge'];
			//电话号
			$info['phone']		=	$post['phone'] ? $post['phone'] : '';

			//手机号
			$info['sphone']		=	$post['sphone'] ? $post['sphone'] : '';

			//宣传语
			$info['slogan']		=	$post['slogan'] ? $post['slogan'] : '';

			//账号名   对公账号  开户行
			$info['account_name']		=	$post['account_name'] ? $post['account_name'] : '';
			$info['account_num']		=	$post['account_num'] ? $post['account_num'] : '';
			$info['account_address']		=	$post['account_address'] ? $post['account_address'] : '';




			//$info['wifi']		=	$post['service'] ? implode(',',$post['service']) : '';
			// print_r($info['wifi']);die;


			//商铺组关联ID
			$info['parentid']	=	$post['parentid'] ? intval($post['parentid']) : 0;
			$info['regionid']	=	$post['regionid'] ? intval($post['regionid']) : 0;
			$info['auserid']	=	$post['auserid'] ? intval($post['auserid']) : 0;
			//	详细介绍
			$info['content']		=	htmlspecialchars($_POST['contents']);
			$info['addtime']	=	time();
			$info['updatetime']	=	time();
			$info['userid']		=	$this->_userid;

			$service		=	isset($post['service']) &&
			$post['service'] ? $post['service'] : '';
			if ( $service ) {
				$info['service']	=	implode(",", $service);
			}else{
				$info['service']	=	'';
			}

			if (isset($_FILES['thumb']) && $_FILES['thumb']['name']) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'shops';
				$thumb	=	$this->attachmentclass->upload('thumb');
				$info['thumb']	=	$thumb ? $thumb['filepath'] : '';
			}
			//print_r($info);die;
			$insertid	=	$this->Shops_model->insert($info);

			if ( $insertid ) {
				//	记录后台操作日志
				manage_log('shops','main','add','/shops/main/add','添加项目',array('id'=>$insertid));
			}

			redirect(site_aurl('shops/main'));
			exit;
		}else{
			$urlArr	=	get_segment_arr();
			$parentid	=	isset($urlArr['4']) ? intval($urlArr['4']) : '';

			$this->load->library('tree');
			//店面分类
			$main	=	$this->Shops_group_model->lists();

			if ( !$main || !$main['info'] ) {
				//				redirect(site_aurl('admin/main'));
			}
			
			//	上级菜单下拉选择
			$array = array();
			foreach($main['info'] as $r) {
				$r['cname'] = $r['name'];
				$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
				$array[] = $r;
			}
			$str  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->tree->init($array);
			$data['shopgroup'] = $this->tree->get_tree(0, $str);

			//地区管理
			$regionmain	=	$this->Region_model->lists();

			if ( !$regionmain || !$regionmain['info'] ) {
//				redirect(site_aurl('admin/main'));
			}
			
			//	上级菜单下拉选择
			$regionarray = array();
			foreach($regionmain['info'] as $r) {
				$r['cname'] = $r['name'];
				$r['selected'] = $r['id'] == $parentid ? 'selected' : '';
				$regionarray[] = $r;
			}
			$regionstr  = "<option value='\$id' \$selected>\$spacer \$cname</option>";
			$this->tree->init($regionarray);
			$data['select_categorys'] = $this->tree->get_tree(0, $regionstr);

			//店面负责人账号
			$adminusermain	=	$this->Admin_model->lists();
			$data['store_account'] = $adminusermain['info'];

			//店面服务项
			$shops_service	=	$this->Shops_service_model->lists();
			$data['shops_service'] = $shops_service['info'];

			templates('shops','add',$data);
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
					redirect(site_url('shops/main/index'));
					exit;
				}
				
				$deletes	=	$this->Shops_model->deletes($idArr);
				if ( $deletes ) {
					//	记录后台操作日志
					manage_log('shops','main','deletes','/shops/main/deletes','删除项目',json_encode($idArr));
				}
				redirect(site_url('shops/main/index'));
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

		$info	=	$this->Shops_model->search($keywords,$page,$pagesize);
		
		$url	= '/shops/main/search?q='.$keywords;
		$pages	=	pagesadmin($info['total'],$pagesize,'',$url);
		
		$this->config->set_item('enable_query_strings',false);
		$info['keywords']	=	$keywords;
		$info['pages']		=	$pages;
		templates('shops','search',$info);
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
		
		$update	=	$this->Shops_model->update($info,array('id'=>$id));

		if ( $update ) {
			//	记录后台操作日志
			manage_log('shops','main','recommend','/shops/main/recommend','推荐项目',array('id'=>$id));
			exit('1');
		}

		exit('0');
		
	}
}

