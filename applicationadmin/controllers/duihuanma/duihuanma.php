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
		$this->load->model('Order_model');
		$info = $this->Order_model->lists01();

		$data = array();
		foreach ($info as $key => $value) {
			dump($value['ordernum']);die;
            // $data[] = $key['ordernum'].rand(1000,9999);
		}

		// $this->Order_model->xxx();
        templates('order','duihuanma',$info);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/admin/main.php */