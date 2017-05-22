<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class New_store extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->language('wecome');
		$this->load->model(array('common/store_model', 'helper/information_model'));
		
		$this->document->addStyle('public/min?f='.(SUBPATH == '/' ? '' : SUBPATH).'public/resources/default/css/ystep/ystep.css');
		$this->document->addScript('public/min?f='.(SUBPATH == '/' ? '' : SUBPATH).'public/resources/default/js/ystep/ystep.js');
	}

	public function index()
	{
		$information_ifo=$this->information_model->get_information($this->config->get_config('sale_terms'));
		
		$this->document->setTitle('商家入驻-'.$information_ifo['title']);
		
		//提取关键词key
		$this->load->library('phpanalysis');
		$this->load->helper('string');
		$this->phpanalysis->SetSource (unserialize($this->config->get_config('site_name'))[$_SESSION['language_id']].$information_ifo['title'].$information_ifo['title'].utf8_substr(DeleteHtml($information_ifo['description']), 0, 200));
		$this->phpanalysis->StartAnalysis ( true );
			
		$tags = $this->phpanalysis->GetFinallyKeywords ( 20 ); // 获取文章中的五个关键字
		
		$this->document->setKeywords($tags);
		//提取关键词key
		
		$this->document->setDescription(utf8_substr(DeleteHtml($information_ifo['description']), 0, 200));
		
		$data['information']=$information_ifo;
		
		
		$data['header']					=$this->header->index();
		$data['top']					=$this->header->step_top();
		$data['footer']					=$this->footer->index();
		
		$this->load->view('theme/default/template/user/new_store_protocol',$data);
	}
	
	public function add(){
		$this->document->setTitle('商家入驻');
		
		if($this->user->getStore_id() != 0){
			redirect(site_url('user/new_store/right'), 'location', 301);
		}
		
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$data['description']=$this->input->post('description');
			
			$this->store_model->new_store($data);
			
			redirect(site_url('user/new_store/info'), 'location', 301);
		}
		
		$this->get_from();
	}
	
	public function right(){
		if($this->user->getStore_id() == 0){
			redirect(site_url('user/new_store'), 'location', 301);
		}
		
		$this->document->setTitle('重复申请');
		
		$data['position_top']=$this->position_top->index();
		$data['position_left']=$this->position_left->index();
		$data['position_right']=$this->position_right->index();
		$data['position_bottom']=$this->position_bottom->index();
		
		$data['header']					=$this->header->index();
		$data['top']					=$this->header->step_top();
		$data['footer']					=$this->footer->index();
		
		$this->load->view('theme/default/template/user/new_store_right',$data);
	}
	
	public function info(){
		if($this->user->getStore_id() == 0){
			redirect(site_url('user/new_store'), 'location', 301);
		}
		
		$this->document->setTitle('申请成功，待审核');
		
		$data['position_top']=$this->position_top->index();
		$data['position_left']=$this->position_left->index();
		$data['position_right']=$this->position_right->index();
		$data['position_bottom']=$this->position_bottom->index();
		
		$data['header']					=$this->header->index();
		$data['top']					=$this->header->step_top();
		$data['footer']					=$this->footer->index();
		
		$this->load->view('theme/default/template/user/new_store_info',$data);
	}
	
	public function get_from(){
		$data['languages']				=$this->language_model->get_languages();
		
		
		$data['placeholder_image']		='public/resources/default/image/no_image.jpg';
		$data['header']					=$this->header->index();
		$data['top']					=$this->header->step_top();
		$data['footer']					=$this->footer->index();
		
		$this->load->view('theme/default/template/user/new_store',$data);
	}
}
