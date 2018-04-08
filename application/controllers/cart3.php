<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//购物车控制器
class Cart extends CI_Controller{
	public function __construct(){
		parent::__construct();

        $this->load->database();
	}

	#显示购物车页面
	public function show(){
		#获取购物车数据
		$query = $this->db->query('SELECT * FROM emr_mycart');
		$data['carts'] = $query->result();
		templates('wxmain','gouwuche',$data);
        //$this->load->view('wxmain/gouwuche',$data);
	}

	public function add(){
		//#获取表单数据
		$_SESSION['user_id']=1;
		$data=$_POST;
		$data['user_id']=$_SESSION['user_id'];
		$data['input_time']=date();
	    $data['thumb'] = $this->input->post('thumb');
		$data['phone'] = $this->input->post('phone');
        //print_r($_SESSION);die;
		//echo "<pre/>";
        //print_r($data['thumb']);die;
		$rc=$this->db->insert('mycart', $data);
		if ($rc) {
			redirect('cart/show');
		} else {
			echo '添加错误';
		}
	}
	
	public function Order_add(){
		//var_dump($_POST);exit;
		$number=$_POST['number'];
		$price=$_POST['price'];
		//var_dump($_POST['pid']);exit;
		foreach($_POST['pid'] as $key=>$value){
			$pid.=",".$value;
			$amout+=$price[$key]*$number[$key];
		}
		$datap['ordernum']=time();
		$datap['serviceid']=$pid;
		$datap['add_time']=time();
		$datap['total']=$amout;
		$datap['userid']=$_SESSION["id"];
		$rc=$this->db->insert('order', $datap);
		$orderid=$this->db->insert_id();
		foreach($_POST['pid'] as $key=>$value){
			$op['orderid']=$orderid;
			$op['pid']=$value;
			$op['number']=$number[$key];
			$rc=$this->db->insert('order_pro', $op);
		}
        //echo "<pre/>";
        //print_r($rc);die;
		templates('wxmain','dingdan2',$datap);
		// redirect('cart/ordershow');
	}

	public function ordershow(){
		header("Content-type: text/html; charset=utf-8");
		$query = $this->db->query('SELECT * FROM emr_order');
		$data['aa']= $query->result();
		// echo "订单数组";
		// var_dump($data);
		templates('wxmain','dingdan2',$data);
	}

	#删除购物车信息
	public function delete($id){
        $this->db->where(id,$id);
        $this->db->delete('emr_mycart');
        redirect('cart/show');
	}
}
