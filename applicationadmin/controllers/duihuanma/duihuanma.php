<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台首页相关操作
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Duihuanma extends CI_Controller {
			



	public function __construct(){
		parent::__construct();
		
		
	}

	


	public function index(){

		// echo  rand(100,999);die;
		// echo  rand(a,f);die;

		
		//echo chr(rand(97, 122));die;

		$this->load->model('Order_model');
		$info = $this->Order_model->lists01();
//print_r($info);die;

		$data = array();
		foreach ($info as $key => $value) {

			
			dump($value['ordernum']);die;
		
			 // $data[] = $key['ordernum'].rand(1000,9999);
			
			

		}
//echo "<pre>";
// print_r($info[$value]);die;

		
		// $this->Order_model->xxx();

templates('order','duihuanma',$info);
		
	}
	
	
	
}

/* End of file main.php */
/* Location: ./application/controllers/admin/main.php */