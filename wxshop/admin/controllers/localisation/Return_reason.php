<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Return_reason extends MY_Controller {
	private $error = array();
	
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('utf8'));
		$this->load->language('wecome');
		if(!$this->user->hasPermission('access', 'admin/localisation/return_reason')){
			$this->session->set_flashdata('fali', '你没有访问权限！');
			redirect(site_url());
			exit;
		}
		$this->load->library(array('form_validation'));
		$this->load->model(array('localisation/return_reason_model', 'common/language_model'));
	}

	public function index(){
		$this->document->setTitle('退换货原因设置');
		
		$this->get_list();
	}
	
	public function add()
	{
		$this->document->setTitle('添加退换货原因设置');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->validate_form()){
			$this->return_reason_model->add($this->input->post());
			
			redirect(site_url('localisation/return_reason'));
		}
		
		$this->get_form();
	}
	
	public function edit()
	{
		$this->document->setTitle('修改退换货原因设置');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->validate_form()){
			$this->return_reason_model->edit($this->input->post());
			
			redirect(site_url('localisation/return_reason'));
		}
		
		$this->get_form();
	}
	
	public function delete()
	{
		$this->document->setTitle('删除退换货原因参数');
		
		if($_SERVER['REQUEST_METHOD']=="POST" && $this->validate_delete()){
			$this->return_reason_model->delete($this->input->post('selected'));
			
			redirect(site_url('localisation/return_reason'));
		}
		
		$this->get_list();
	}
	
	public function get_form()
	{
		if($this->input->get('return_reason_id')){
			$return_reason_info					=$this->return_reason_model->get_return_reason_form($this->input->get('return_reason_id'));
		}
		
		if($this->input->post('description')){
			$data['description']			=$this->input->post('description');
		}elseif(isset($return_reason_info['description'])){
			$data['description']			=$return_reason_info['description'];
		}
		
		if($this->input->post('base')['sort_order']){
			$data['sort_order']			=$this->input->post('base')['sort_order'];
		}elseif(isset($return_reason_info['sort_order'])){
			$data['sort_order']			=$return_reason_info['sort_order'];
		}else{
			$data['sort_order']			='0';
		}
		
		if($this->input->get('return_reason_id')){
			$data['action']					=site_url('localisation/return_reason/edit?return_reason_id=').$this->input->get('return_reason_id');
		}else{
			$data['action']					=site_url('localisation/return_reason/add');
		}
		
		if(isset($this->error['error_description'])){
			$data['error_description']		=$this->error['error_description'];
		}
		
		$data['languages']				=$this->language_model->get_languages();
		
		$data['header']=$this->header->index();
		$data['top']=$this->header->top();
		$data['footer']=$this->footer->index();
		$this->load->view('theme/default/template/localisation/return_reason_form',$data);
	}

	public function get_list()
	{
		if($this->input->get('page')){
			$data['page']=$this->input->get('page');
		}else{
			$data['page']='0';
		}
		
		$return_reasons_info=$this->return_reason_model->get_return_reasons_for_langugae_id($data);
		if($return_reasons_info){
			$data['return_reasons']			=$return_reasons_info['return_reasons'];
			$data['count']					=$return_reasons_info['count'];
		}
		
		
		//分页
		$config['base_url'] 			= site_url('localisation/return_reason');
		$config['num_links'] 			= 2;
		$config['page_query_string'] 	= TRUE;
		$config['query_string_segment'] = 'page';
		$config['full_tag_open'] 		= '<nav class="text-left"><ul class="pagination">';
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
		$config['total_rows'] 			= $return_reasons_info['count'];
		$config['per_page'] 			= $this->config->get_config('config_limit_admin');

		$this->pagination->initialize($config);

		$data['pagination'] 			= $this->pagination->create_links();
		
		$data['delete']					=site_url('localisation/return_reason/delete');
		
		$data['header']=$this->header->index();
		$data['top']=$this->header->top();
		$data['footer']=$this->footer->index();
		$this->load->view('theme/default/template/localisation/return_reason_list',$data);
	}
	
	public function validate_delete(){
		if (!$this->user->hasPermission('modify', 'admin/localisation/return_reason')) {
			$this->session->set_flashdata('danger', '你无权修改，请联系管理员！');
			$this->error['warning'] = '没有权限修改';
		}
		
		if($this->return_reason_model->check_delete($this->input->post('selected'))){
			$this->error['wring_delete']='有一个删除的退换货原因设置正在被使用';
		}
		
		return !$this->error;
	}
	
	//验证表单
	public function validate_form(){
		if (!$this->user->hasPermission('modify', 'admin/localisation/return_reason')) {
			$this->session->set_flashdata('danger', '你无权修改，请联系管理员！');
			$this->error['warning'] = '没有权限修改';
		}
		
		$description=$this->input->post('description');
		foreach($description as $key=>$value){
			if((utf8_strlen($description[$key]['name']) < 2) || (utf8_strlen($description[$key]['name']) > 32)){
				$this->error['error_description'][$key]['error_name']='退换货原因名称2——32字符';
			}
		}
		
		return !$this->error;
	}
}
