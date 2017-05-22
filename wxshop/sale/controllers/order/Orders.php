<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends MY_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->language('wecome');
		if(!$this->user->hasPermission('access', 'sale/order/orders')){
			$this->session->set_flashdata('fali', '你没有访问商家后台的权限！');
			redirect(base_url(), 'location', 301);
			exit;
		}
		$this->load->library(array('currency'));
		$this->load->model(array('order/order_model'));
	}

	public function index()
	{
		$this->document->setTitle('订单管理');
		
		if ($this->input->get ( 'page' ) != NULL) {
			$data ['page'] = $this->input->get ( 'page' );
		} else {
			$data ['page'] = '0';
		}
		
		if ($this->input->get ( 'order_status' ) != NULL) {
			$data ['order_status'] = $this->input->get ( 'order_status' );
		} else {
			$data ['order_status'] = FALSE;
		}
		
		$orders=$this->order_model->get_orders($data);
		//var_dump($orders['order']);
		
		if ($orders) {
			$data['orders']=$orders['order'];
			$data ['count'] = $orders['count'];
		}
		
		// 分页
		$config ['base_url'] = site_url ('user/orders').(($this->input->get('order_status') != NULL) ? '?order_status='.$this->input->get('order_status') : '');
		$config ['num_links'] = 2;
		$config ['page_query_string'] = TRUE;
		$config ['query_string_segment'] = 'page';
		$config ['full_tag_open'] = '<div class="text-left" style="float: left;line-hight: 34px;padding: 6px 12px">共'.@(floor($orders['count'] / $this->config->get_config ( 'config_limit_admin' )) + 1) .'页/第'.@(floor($data['page'] / $this->config->get_config ( 'config_limit_admin' )) + 1) .'页</div><nav class="text-right"><ul class="pagination" style="margin: 0 0 10px 0">';
		$config ['full_tag_close'] = '</ul>';
		$config ['first_tag_open'] = '<li>';
		$config ['first_tag_close'] = '</li>';
		$config ['last_tag_open'] = '<li>';
		$config ['last_tag_close'] = '</li>';
		$config ['next_tag_open'] = '<li>';
		$config ['next_tag_close'] = '</li>';
		$config ['prev_tag_open'] = '<li>';
		$config ['prev_tag_close'] = '</li>';
		$config ['cur_tag_open'] = '<li class="active"><a>';
		$config ['cur_tag_close'] = '</a></li>';
		$config ['num_tag_open'] = '<li>';
		$config ['num_tag_close'] = '</li>';
		$config ['first_link'] = '<<';
		$config ['last_link'] = '>>';
		$config ['total_rows'] = $orders['count'];
		$config ['per_page'] = $this->config->get_config ( 'config_limit_admin' );
		
		$this->pagination->initialize ( $config );

		$data['pagination'] = $this->pagination->create_links();
		
		$data['position_top']=$this->position_top->index();
		$data['position_left']=$this->position_left->index();
		$data['position_right']=$this->position_right->index();
		$data['position_bottom']=$this->position_bottom->index();
		
		$data['header']=$this->header->index();
		$data['top']=$this->header->top();
		$data['footer']=$this->footer->index();
		$this->load->view('theme/default/template/order/orders',$data);
	}
	
	public function add_callout(){
		if (!$this->user->hasPermission('modify', 'sale/order/orders')) {
			$data['error'] = '没有权限修改';
		}
		
		if($this->input->post('order_id') == NULL || $this->input->post('callout_type') == NULL || $this->input->post('callout_content') == NULL){
			$data['error']='标注失败';
		}
		
		if(!isset($data)){
			$callout=$this->input->post();
			$callout['callout_user']='sale';
			$resule=$this->order_model->add_callout($callout);
			if($resule){
				$data['success']='标注成功！';
			}else{
				$data['error']='标注失败';
			}
		}
		
		$this->output
		    ->set_content_type('application/json')
		    ->set_output(json_encode($data));
	}
}
