<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_group extends MY_Controller {
	
	private $error = array();
	private $files=array();
	
	public function __construct() {
		parent::__construct();
		$this->load->language('wecome');
		if(!$this->user->hasPermission('access', 'admin/user/user_group')){
			$this->session->set_flashdata('fali', '你没有访问权限！');
			redirect(site_url());
			exit;
		}
		$this->load->library(array('form_validation'));
		$this->load->model(array('common/user_model','common/language_model'));
	}

	public function index()
	{
		$this->document->setTitle('权限组列表');
		
		$this->get_list();
	}
	
	public function add()
	{
		$this->document->setTitle('权限组添加');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->valid_user_group_name($this->input->post('description'))){
			
			$this->user_model->add_user_group($this->input->post());
			
			redirect(site_url('user/user_group'));
		}
		
		$this->get_from();
	}
	
	public function edit()
	{
		$this->document->setTitle('权限组修改');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->input->get('user_group_id') && $this->valid_user_group_name($this->input->post('description'))){
			//修改user_group表
			$user_groups				=$this->input->post('user_group');
			$user_groups['user_group_id']=$this->input->get('user_group_id');
			
			if(isset($user_groups['access'])){
				$permission['access']		=$user_groups['access'];
			}else{
				$permission['access']		=array();
			}
			if(isset($user_groups['modify'])){
				$permission['modify']		=$user_groups['modify'];
			}else{
				$permission['modify']		=array();
			}
			
			$user_groups['permission']	=serialize($permission);
			unset($user_groups['access']);
			unset($user_groups['modify']);
			$this->user_model->edit_user_group($user_groups);
			
			//修改描述表
			$description				=$this->input->post('description');
			foreach($description as $key=>$value){
				$description[$key]['user_group_id']=$this->input->get('user_group_id');
				$description[$key]['language_id']=$key;
			}
			
			$this->user_model->edit_user_group_description($this->input->get('user_group_id'), $description);
			
			redirect(site_url('user/user_group'));
		}
		
		$this->get_from();
	}
	
	public function delete (){
		$this->document->setTitle('删除权限组');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->valid_delete()){
			
			$this->user_model->delete($this->input->post('selected'));
			
			$this->session->set_flashdata('success', '成功：权限组删除成功！');
			redirect(site_url('user/user_group'));
		}
		
		$this->get_list();
	}
	
	public function get_list(){
		$data=array();
		
		if($this->input->get('page')){
			$data['page']				=$this->input->get('page');
		}else{
			$data['page']				='0';
		}
		
		$user_groups					=$this->user_model->get_user_groups($data);
		$data['user_groups']			=$user_groups['user_groups'];
		
		//分页
		$config['base_url'] 			= site_url('user/user_group');
		$config['num_links'] 			= 2;
		$config['page_query_string'] 	= TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] 		= '<div class="text-left pagination" style="float: left;padding: 6px 0px;margin: 5px 0">共'.@(floor($user_groups['count'] / $this->config->get_config ( 'config_limit_admin' )) + 1) .'页/第'.@(floor($data['page'] / $this->config->get_config ( 'config_limit_admin' )) + 1) .'页</div><ul class="pagination" style="float: right;margin: 5px 0">';
		$config['full_tag_close'] 		= '</ul>';
		$config['first_tag_open'] 		= '<li>';
		$config['first_tag_close'] 		= '</li>';
		$config['last_tag_open'] 		= '<li>';
		$config['last_tag_close'] 		= '</li>';
		$config['next_tag_open'] 		= '<li>';
		$config['next_tag_close'] 		= '</li>';
		$config['prev_tag_open'] 		= '<li>';
		$config['prev_tag_close'] 		= '</li>';
		$config['cur_tag_open'] 		= '<li class="active"><a>';
		$config['cur_tag_close'] 		= '</a></li>';
		$config['num_tag_open']			= '<li>';
		$config['num_tag_close']		= '</li>';
		$config['first_link'] 			= '<<';
		$config['last_link'] 			= '>>';
		$config['total_rows'] 			= $user_groups['count'];
		$config['per_page'] 			= $this->config->get_config('config_limit_admin');

		$this->pagination->initialize($config);

		$data['pagination'] 			= $this->pagination->create_links();
		
		$data['delete']					=site_url('user/user_group/delete');
		
		$data['header']=$this->header->index();
		$data['top']=$this->header->top();
		$data['footer']=$this->footer->index();
		
		$this->load->view('theme/default/template/user/user_group_list',$data);
	}
	
	public function get_from()
	{
		$data=array();
		
		if($this->input->get('user_group_id') != NULL){
			$user_group_info=$this->user_model->get_user_group_from($this->input->get('user_group_id'));
		}
		
		if($this->input->post('description')){
			$data['description']=$this->input->post('description');
		}elseif(isset($user_group_info)){
			$data['description']=$user_group_info['description'];
		}
		
		//反序列化权限
		if(isset($user_group_info['user_group']['permission'])){
			$permission=unserialize($user_group_info['user_group']['permission']);
		}
		
		
		if(isset($this->input->post('user_group')['access'])){
			$data['access']=$this->input->post('user_group')['access'];
		}elseif(isset($permission['access'])){
			$data['access']=$permission['access'];
		}
		if(isset($this->input->post('user_group')['modify'])){
			$data['modify']=$this->input->post('user_group')['modify'];
		}elseif(isset($permission['modify'])){
			$data['modify']=$permission['modify'];
		}
		
		if(isset($this->input->post('user_group')['sort_order'])){
			$data['sort_order']=$this->input->post('user_group')['sort_order'];
		}elseif(isset($user_group_info['user_group']['sort_order'])){
			$data['sort_order']=$user_group_info['user_group']['sort_order'];
		}
		
		$unset_maps=array('common/scheduling_module.php', 'common/language_module.php', 'common/language.php', 'common/position_top.php', 'common/position_right.php', 'common/position_left.php', 'errors/page_missing.php', 'common/currency_common.php', 'common/currency.php', 'common/footer.php', 'common/position_above.php', 'common/position_bottom.php', 'common/header.php', 'common/image_common.php');
		//遍历后台目录
		$admin_maps						=$this->file_list(FCPATH.'admin/controllers');
		$this->files=array();
		foreach($admin_maps as $key=>$value){
			if(isset($admin_maps[$key])){
				$admin_maps[$key] = str_replace(FCPATH.'admin/controllers/', '', $admin_maps[$key]);
				$admin_maps[$key] = str_replace('\\', '/', strtolower($admin_maps[$key]));
			}
			if(isset($admin_maps[$key]) && strstr($admin_maps[$key], 'extension/')){
				unset($admin_maps[$key]);
			}
			if(isset($admin_maps[$key]) && in_array($admin_maps[$key], $unset_maps)){
				unset($admin_maps[$key]);
			}
			if(isset($admin_maps[$key]) && !strpos($admin_maps[$key], '.php') !== false){
				//排除非php文件
				unset($admin_maps[$key]);
			}
			//去掉文件后缀
			if(isset($admin_maps[$key])){
				$admin_maps[$key]		='admin/'.str_replace('.php','',$admin_maps[$key]);
			}
		}
		$data['admin_maps']=$admin_maps;
		
		//遍历商家中心目录
		$sale_maps						=$this->file_list(FCPATH.'sale/controllers');
		$this->files=array();
		foreach($sale_maps as $key=>$value){
			if(isset($sale_maps[$key])){
				$sale_maps[$key] = str_replace(FCPATH.'sale/controllers/', '', $sale_maps[$key]);
				$sale_maps[$key] = str_replace('\\', '/', strtolower($sale_maps[$key]));
			}
			if(isset($sale_maps[$key]) && strstr($sale_maps[$key], 'extension/')){
				unset($sale_maps[$key]);
			}
			if(isset($sale_maps[$key]) && in_array($sale_maps[$key], $unset_maps)){
				unset($sale_maps[$key]);
			}
			if(isset($sale_maps[$key]) && !strpos($sale_maps[$key], '.php') !== false){
				//排除非php文件
				unset($sale_maps[$key]);
			}
			//去掉文件后缀
			if(isset($sale_maps[$key])){
				$sale_maps[$key]		='sale/'.str_replace('.php','',$sale_maps[$key]);
			}
		}
		$data['sale_maps']				=$sale_maps;
		
		
		$data['languages']				=$this->language_model->get_languages();
		
		$data['header']					=$this->header->index();
		$data['top']					=$this->header->top();
		$data['footer']					=$this->footer->index();
		
		$data['error']					=$this->error;
		
		if($this->input->get('user_group_id')){
			$data['action']=site_url('user/user_group/edit?user_group_id=').$this->input->get('user_group_id');
		}else{
			$data['action']=site_url('user/user_group/add');
		}
		
		$this->load->view('theme/default/template/user/user_group_from',$data);
	}
	
	private function file_list($path)
	{
		if ($handle = opendir($path))//打开路径成功
		{
			while (false !== ($file = readdir($handle)))//循环读取目录中的文件名并赋值给$file
			{
				if ($file != "." && $file != "..")//排除当前路径和前一路径
				{
					if (is_dir($path."/".$file))
					{
						$this->file_list($path."/".$file);
					}
					else
					{
						$this->files[] = $path."/".$file;
					}
				}
			}
		}
		return $this->files;
	}
	
	private function valid_user_group_name($user_group_description){
		if (!$this->user->hasPermission('modify', 'admin/user/user_group')) {
			$this->session->set_flashdata('danger', '你无权修改，请联系管理员！');
			$this->error['danger']='无权修改';
		}
		foreach($user_group_description as $key=>$value){
			if(!$this->form_validation->min_length($user_group_description[$key]['name'],'2') || !$this->form_validation->max_length($user_group_description[$key]['name'],'32')){
				$this->error[$key]['error_name']='名称长度2——32字符';
			}
			if(!isset($user_group_description[$key]['name']) || empty($user_group_description[$key]['name'])){
				$this->error[$key]['error_name']='名称不能为空';
			}
		}
		
		return !$this->error;
	}
	
	private function valid_delete()
	{
		if (!$this->user->hasPermission('modify', 'admin/user/user_group')) {
			$this->session->set_flashdata('danger', '你无权修改，请联系管理员！');
			$this->error['danger']='无权修改';
		}
		foreach($this->input->post('selected') as $value){
			if($this->user_model->check_delete($value) === FALSE){
				$this->session->set_flashdata('fali', '警告：你正在删除的权限组被使用，无法删除！');
				return FALSE;
			}
		}
		return TRUE;
	}
}
