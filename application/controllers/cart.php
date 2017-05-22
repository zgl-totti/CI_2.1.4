	<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//购物车控制器
class Cart extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Order_model');
	     //$this->load->database();
	}

	#显示购物车页面
	public function show(){
		#获取购物车数据                                                                                         //取出购物车里面所有的数据
		// print_r($_SESSION['openid']);die;
		//$query = $this->db->query("SELECT * FROM emr_mycart");
        $sql = "SELECT * FROM emr_mycart where user_id='{$_SESSION['openid']}'";
        // echo $sql;die;
        $query = $this->db->query($sql);
        //print_r($query);die;
        // $query = $this->db->query("SELECT * FROM emr_mycart where user_id='oaZm1uLFiWT4o0jRrmT4WxAweLK8' ");
        // oaZm1uLFiWT4o0jRrmT4WxAweLK8
        //取出当前用户的购物车里面的数据
        //$u = $_SESSION['openid'];
        //$data =
		$data['carts'] = $query->result();
		//print_r($data);die;
		templates('wxmain','gouwuche',$data);
        //$this->load->view('wxmain/gouwuche',$data);
	}

	public function add(){
		//#获取表单数据
		$data['openid']=$_SESSION['openid'];
		$data['update_time']=$data['add_time']=time();
		$data['ordernum']=makeorder();
		$data['cdkey']=getRandom();
	    //$data['thumb'] = $this->input->post('thumb');
		$data['phone'] = $_POST['phone'];
		$data['number'] = $_POST['number'];
		$data['gname'] = $_POST['brand'];//商品名称
		$data['thumb'] = $_POST['thumb'];//商品图片
		$data['shopid'] = $_POST['gid'];//商铺id
		$data['total'] = $_POST['price']*$_POST['number'];
		$data['serviceid'] =  $_POST['pro_id'];//商品ID
		$id=$_POST['pro_id'];
		//echo '<pre>'; print_r($_POST);die;
		//print_r($data);die;
		//
		if($data['openid'] && $data['phone']){
			if(preg_match("/^1[34578]{1}\d{9}$/",$data['phone'])){  
			    $rc=$this->Order_model->insert( $data);
				if ($rc) {
					redirect('nearby/dingdans');
				} else {
					redirect('wxmain/tijiaodingdan/'.$id);
				} 
			}else{  
			    echo "<script>alert('请输入正确的手机号!');location='".site_url('wxmain/tijiaodingdan/'.$id)."'</script>"; 
			}  
		}else{
			echo "<script>alert('请输入手机号!');location='".site_url('wxmain/tijiaodingdan/'.$id)."'</script>";
			//redirect('weixin/wechat/business_index');
		}
	}

	#删除购物车信息
	public function delete($id){
        $this->db->where(id,$id);
        $this->db->delete('emr_mycart');
        redirect('cart/show');
	}

	public function goumaishanchu(){
        //echo "<script> alert('添加店铺成功');</script>";
	}
}
