<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//购物车控制器
class Duihuan extends CI_Controller{

	public function __construct(){
		parent::__construct();
	$this->load->database();
	}

	#显示购物车页面
	public function index(){
		#获取购物车数据
		// $query = $this->db->query('SELECT * FROM emr_mycart');
		// $data['carts'] = $query->result();
		templates('wxmain','duihuan');
        //$this->load->view('wxmain/gouwuche',$data);
	}
}
