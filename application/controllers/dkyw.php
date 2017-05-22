<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dkyw extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
        $data['name']  = $this->input->post('name');
        $data['phone']  = $this->input->post('phone');
        $data['dkje']  = $this->input->post('dkje');
        $data['dkyt']  = $this->input->post('dkyt');
        $data['szdz']  = $this->input->post('szdz');
	    print_r($data);die;
        $rc=$this->db->insert('emr_wdaikuan', $data);
		if ($rc) {
            echo '添加成功';
            //redirect('cart/show');
		} else {
			echo '添加错误';
		}
		templates('wxmain','index',$data);
	}
}