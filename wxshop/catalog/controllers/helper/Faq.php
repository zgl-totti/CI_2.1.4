<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model(array('helper/information_model'));
	}

	public function index()
	{
		$this->lang->load('helper/faq', $_SESSION['language_name']);
		
		$information_ifo=$this->information_model->get_information(($this->input->get('inforation_id') != NULL) ? $this->input->get('inforation_id') : $this->config->get_config('registration_terms'));
		
		if($information_ifo == FALSE){
			redirect(site_url('errors/page_missing'), 'location', 301);
		}
		
		$categorys=$this->information_model->get_information_categorys();
		
		foreach($categorys as $k=>$v){
			if(!$categorys[$k]['childs']){
				$categorys[$k]['titles']=$this->information_model->get_informations_to_category_id($categorys[$k]['information_category_id']);
			}else{
				foreach($categorys[$k]['childs'] as $key=>$value){
					$categorys[$k]['titles']=$this->information_model->get_informations_to_category_id($categorys[$k]['information_category_id']);
					$categorys[$k]['childs'][$key]['titles']=$this->information_model->get_informations_to_category_id($categorys[$k]['childs'][$key]['information_category_id']);
				}
			}
		}
		
		$data['categorys']=$categorys;
		
		$this->document->setTitle($information_ifo['title']);
		
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
		
		$data['position_top']=$this->position_top->index();
		$data['position_left']=$this->position_left->index();
		$data['position_right']=$this->position_right->index();
		$data['position_bottom']=$this->position_bottom->index();
		
		$data['header']=$this->header->index();
		$data['top']=$this->header->faq_top();
		$data['footer']=$this->footer->index();
		
		$this->load->view('theme/default/template/helper/faq',$data);
	}
}
