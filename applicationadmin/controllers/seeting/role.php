<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台管理员组信息
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Role extends CI_Controller {
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
		$this->load->model('Role_model');
	}

	/**
	* 管理用户组列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		$data['info']	=	$this->Role_model->get_role();
		$this->load->view('role/index',$data);
	}

	/**
	* 添加管理员用户组
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
			$info['rolename']	=	$post['rolename'];
			$info['description']=	$post['description'];
			$info['disabled']	=	$post['disabled'] ? 1 : 0;
			$info['listorder']	=	$post['listorder'] ? intval($post['listorder']) : 0;
			
			$insert	=	$this->Role_model->add($info);
			$result	=	array();

			if ( $insert ) {
				//	记录后台操作日志
				manage_log('seeting','role','add','/seeting/role/add','添加管理员角色组',array('roleid'=>$insert));
			}

			$result['message']	=	$insert ? '添加成功' : '';
			$this->load->view('role/add_action',$result);
		}else{
			$this->load->view('role/add');
		}
	}

	/**
	* 编辑管理员用户组信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function edit(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			$id		=	$post['roleid'] ? intval($post['roleid']) : '';

			if (!$id) {
				redirect(site_aurl('seeting/role'));
				exit;
			}

			$info	=	array();
			$info['rolename']	=	$post['rolename'];
			$info['description']=	$post['description'];
			$info['disabled']	=	$post['disabled'] ? 1 : 0;
			$info['listorder']	=	$post['listorder'] ? intval($post['listorder']) : 0;

			$update	=	$this->Role_model->update($info,$id);
			if ( $update ) {
				//	记录后台操作日志
				manage_log('seeting','role','edit','/seeting/role/edit','修改管理员角色组信息',array('roleid'=>$id));
			}

			$result	=	array();
			$result['message']	=	$update ? '修改成功' : '';
			$this->load->view('role/edit_action',$result);
		}else{
			//	获取用户组详细信息
			$urlArr	=	get_segment_arr();
			$id		=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
			//	如果获取不到id值，直接跳转到所有列表页面
			if ( !$id ) {
				redirect(site_aurl('seeting/role'));
				exit;
			}
			$where	=	array('roleid'=>$id);
			$data['info']	=	$this->Role_model->get_role_one($where);
			$this->load->view('role/edit',$data);
		}
	}
	
	/**
	* 删除管理员用户组操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes(){
		$urlArr		=	get_segment_arr();
		$id	=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
		$info		=	'';

		$result		=	array();
		if ( $id ) {
			//	角色组信息
			$where		=	array('roleid'=>$id);
			$roleInfo	=	$this->Role_model->get_role_one($where);

			//	该字段信息
			$info	=	$this->Role_model->deletes($id);
		}

		if ( $info && $roleInfo ) {
			//	记录后台操作日志
			manage_log('seeting','role','deletes','/seeting/role/deletes','删除管理员角色组信息',array('roleid'=>$id,'rolename'=>$roleInfo['rolename']));
		}

		$result['message']	=	$info ? '删除成功' : '';
		$this->load->view('role/delete_action',$result);
	}

	/**
	* 排序
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function listorder(){
		if(isset($_POST['submit']) && $_POST['submit']) {
			$listorders	=	$this->input->post('listorders',TRUE);
			//	更新排序
			$listorder	=	$this->Role_model->listorder($listorders);
			$data['message']	=	$listorder  ? 1 : 0;
			if ( $listorder  ) {
				//	记录后台操作日志
				manage_log('seeting','role','listorder','/seeting/role/listorder','排序管理员角色组信息');
			}
			$this->load->view('role/listorder',$data);
		}else{
			redirect(site_aurl('seeting/role'));
		}
	}


	/**
	* 用户组权限管理
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function priv(){
		//	菜单操作model
		$this->load->model('Menu_model');
		//	权限数据model
		$this->load->model('Role_priv_model');
		if(isset($_POST['submit']) && $_POST['submit']) {
			$post	=	$this->input->post(NULL,TRUE);
			if ( !isset($post['menuid']) ) {
				$post['menuid']	=	'';
			}
			if (!$post['roleid']) {
				redirect(site_aurl('seeting/role/index'));
				exit;
			}
			//	如果有选择数据，则进行权限的重新添加
			if ( is_array($post['menuid']) && count($post['menuid']) > 0 ) {
				//	先删除该用户组的所有权限信息
				$this->Role_priv_model->deletes($post['roleid']);
				$menu	=	$this->Menu_model->lists();
				$menuInfo	=	$menu['info'];
				foreach ($menuInfo as $_v) {
					unset($_v['name'],$_v['parentid'],$_v['listorder']);
					$menu_info[$_v['id']] = $_v;
				}
				//	批量添加到权限控制表中
				foreach($post['menuid'] as $menuid){
					$info = array();
					$info = $this->Role_priv_model->get_menuinfo(intval($menuid),$menu_info);
					$info['roleid'] = $post['roleid'];
					$this->Role_priv_model->add($info);
				}
			}else{
				//	否则就删除掉所有已存在的权限
				$this->Role_priv_model->deletes($post['roleid']);
			}
			//	记录后台操作日志
			manage_log('seeting','role','priv','/seeting/role/priv','用户组权限修改',
				array('roleid'=>$post['roleid']));
			$data['message']	=	'修改完成';
			$this->load->view('role/priv_action',$data);
		}else{
			//	菜单语言包
			$this->lang->load('system_menu','zh_cn');
			$this->load->helper('language');
			$urlArr		=	get_segment_arr();
			$roleid		=	isset($urlArr['4']) ? intval($urlArr['4']) : '';

			if ( !$roleid ) {
				redirect(site_aurl('seeting/role/index'));
				exit;
			}
			//	角色组信息
			$where		=	array('roleid'=>$roleid);
			$data['roleInfo']	=	$this->Role_model->get_role_one($where);
			if (!$data['roleInfo']) {
				redirect(site_url('seeting/role/index'));
				exit;
			}
			$menu	=	$this->Menu_model->lists();
			$result	=	$menu['info'];
			//	生成树型结构
			$array = array();
			$this->load->library('tree');
			$this->tree->icon = array('│ ','├─ ','└─ ');
			$this->tree->nbsp = '&nbsp;&nbsp;&nbsp;';

			// 获取权限数据表
			$privdata	=	$this->Role_priv_model->get_rolepriv(array('roleid'=>$roleid));
			
			//	构造树状结构，展示在页面上
			foreach($result as $n => $r) {
				$result[$n]['cname'] = lang($r['name']);
				$result[$n]['checked'] = ($this->Role_priv_model->is_checked($r,$roleid, $privdata))? ' checked' : '';
				$result[$n]['level'] = $this->Role_priv_model->get_level($r['id'],$result);
				$result[$n]['parentid_node'] = ($r['parentid'])? ' class="child-of-node-'.$r['parentid'].'"' : '';
			}
			$str  = "<tr id='node-\$id' \$parentid_node>
							<td style='padding-left:30px;'>\$spacer<input type='checkbox' name='menuid[]' value='\$id' level='\$level' \$checked onclick='javascript:checknode(this);' class='tabcheckbox'> \$cname</td>
						</tr>";
			$this->tree->init($result);
			$data['categorys']	=	$this->tree->get_tree(0, $str);
			$data['roleid']		=	$roleid;
			$this->load->view('role/priv',$data);
		}
	}
}