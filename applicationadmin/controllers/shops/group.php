<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 商铺组管理
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
		
		$this->load->model('Shops_group_model');

		$this->_userid	=	$this->session->userdata('userid');

	}

	/**
	* 模型列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index($parentid = '0'){
		
		$where['parentid'] = intval($parentid);
		$main	=	$this->Shops_group_model->lists($where);
		
		$arr	=	array();
		$data	=	array();
		$data['categorys']	=	'';
		if ( $main ) {
			//	生成树型结构
			$array = array();
			$this->load->library('tree');
			foreach($main['info'] as $r) {
				$r['cname'] = $r['name'];
				$r['str_manage'] = '<a href="'.site_aurl('shops/group/add/'.$r['id']).'">添加子菜单路径</a> | <a href="'.site_aurl('shops/group/edit/'.$r['id']).'">修改</a> | <a href="javascript:confirmurl(\''.site_aurl('shops/group/deletes/'.$r['id']).'\',\'确认要删除吗？\')">删除</a> ';
				$array[] = $r;
			}
			$str  = "<tr>
						<td style='text-align:center;'><input name='listorders[\$id]' type='text' value='\$listorder' class='input-mini'></td>
						<td style='text-align:center;'>\$id</td>
						<td ><a href='".site_url('shops/group/index')."/\$id'>\$spacer\$cname</a></td>
						<td style='text-align:center;'>\$str_manage</td>
					</tr>";
			$this->tree->icon = array('&nbsp;&nbsp;&nbsp;│ ','&nbsp;&nbsp;&nbsp;├─ ',
				'&nbsp;&nbsp;&nbsp;└─ ');
			$this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';

			$this->tree->init($array);
			$data['categorys'] = $this->tree->get_tree($parentid, $str);
			
		}
		
		
		$this->load->view('shops/group/index',$data);
	}
	
	/**
	* 排序
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function listorder(){
		if(isset($_POST['submit']) && $_POST['submit']) {
			$model_field_sort	=	$this->input->post('listorders',TRUE);

			//	更新排序
			$listorder	=	$this->Shops_group_model->listorder($model_field_sort);
			
			if ( $listorder ) {
				//	管理员后台操作日志记录
				manage_log('shops','group','listorder','/shops/group/listorder','商铺组管理排序');
			}

			$data['message']	=	$listorder  ? 1 : 0;
			
			$this->load->view('shops/group/listorder',$data);
		}else{
			redirect(site_aurl('shops/group'));
		}
	}

	/**
	* 添加菜单操作
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
			$info['display']	=	$post['display'] ? '1' : '0';//如果等与1 显示菜单
			$info['content']		=	htmlspecialchars($post['contents']);
			$info['parentid']	=	$post['parentid'] ? intval($post['parentid']) : 0;
			$insert	=	$this->Shops_group_model->add($info);
			$result	=	array();
			$result['message']	=	$insert ? 1 : 0;
			if ( $insert ) {
				//	管理员后台操作日志记录
				manage_log('shops','group','add','/shops/group/add','商铺组管理添加新商铺组',array('id'=>$insert));
			}

			$this->load->view('shops/group/add_action',$result);
		}else{
			$urlArr	=	get_segment_arr();
			$parentid	=	isset($urlArr['4']) ? intval($urlArr['4']) : '';

			$this->load->library('tree');
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
			$data['select_categorys'] = $this->tree->get_tree(0, $str);
			

			$this->load->view('shops/group/add',$data);
		}
	}


	/**
	* 编辑菜单操作
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function edit(){
		if ( isset($_POST['submit']) && $_POST['submit'] && $this->input->post('tableid')) {
			$post	=	$this->input->post(NULL,TRUE);

			$info			=	array();
			$info['name']	=	$post['name'];
			$info['display']	=	$post['display'] ? '1' : '0';
			$info['content']		=	htmlspecialchars($post['contents']);
			//	更新情况下时，需要判断下父菜单的情况
			$old_info	=	$this->Shops_group_model->get($post['tableid']);
			
			if ( $post['parentid'] && $post['tableid'] && $post['parentid'] != $post['tableid'] ) {
				$info['parentid']	=	$post['parentid'] ? intval($post['parentid']) : 0;
			}

			$updates	=	$this->Shops_group_model->update($info,$post['tableid']);
			$result		=	array();
			$result['message']	=	( $updates || $editlang ) ? 1 : 0;
			
			if ( $updates || $editlang) {
				//	管理员后台操作日志记录
				manage_log('shops','group','edit','/shops/group/edit','商铺组管理修改商铺组',array('id'=>$post['tableid']));
			}

			$this->load->view('shops/group/edit_action',$result);
		}else{
			$urlArr	=	get_segment_arr();
			$id		=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
			
			$this->load->library('tree');
			
			//	该字段信息
			$info	=	$this->Shops_group_model->get($id);
			if ( !$info ) {
				redirect(site_aurl('shops/group'));
			}
			$data	=	array();
			$data['info']	=	$info;
			//	获取所有信息，生成下拉框树选择
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
			$data['select_categorys'] = $this->tree->get_tree(0, $str);
			
			$this->load->view('shops/group/edit',$data);
		}
	}

	/**
	* 删除操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		$urlArr		=	get_segment_arr();
		$id			=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
		$info		=	'';

		$result		=	array();
		if ( $id ) {
			//	查看该菜单信息，做日志记录使用
			$mainInfo	=	$this->Shops_group_model->get($id);
			//	该字段信息
			$info	=	$this->Shops_group_model->deletes($id);
		}
		if ( $info && $mainInfo ) {
			//	管理员后台操作日志记录
			manage_log('shops','group','deletes','/shops/group/deletes','商铺组管理删除商铺组',array('id'=>$id,'name'=>$mainInfo['name'],'cname'=>$mainInfo['name']));
		}

		$result['message']	=	$info ? 1 : 0;
		$this->load->view('shops/group/delete_action',$result);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/admin/system/main.php */