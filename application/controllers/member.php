<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 用户中心
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Member extends CI_Controller {

	//	用户id
	public $userid;
	private $app_id = 'wxdce3470f9e79fc9a';
    private $app_secret = '825561daf1ab5b621674925d49ffd16f';
	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();
		
		$this->load->model('Member_model');
		
	}

	/**
	* 申请会员卡
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function updates(){
		$access_token	=	$this->session->userdata('access_token');
		$openid		    =	$this->session->userdata('openid');
		if ( isset($_POST['dosubmit']) && $_POST['dosubmit'] ) {
			$data	=	$this->input->post(NULL,TRUE);
			
			$pwdconfirm	=	$this->input->post('pwdconfirm',TRUE);
			$password	=	$this->input->post('password',TRUE);
			if($pwdconfirm != $password){
				$data['backurl']	=	site_url('member/index');
				$data['message']	=	'密码不一致';
				templates('global','message',$data);
				exit;
			}
			$encrypt	=	create_randomstr();
			$newpass	=	password($password,$encrypt);
			
			$info		=	array();
			$card		=	array();
			$info['password']	=	$newpass;
			$info['encrypt']	=	$encrypt;
			$info['usernumber'] =   $this->input->post('usernumber',TRUE);
			$info['update_time']	=	time();
			$card['cardtype']   =   $this->input->post('cardtype',TRUE);
			$card['cardlife']   =   $this->input->post('cardlife',TRUE);
			$rows	=	$this->Member_model->updates($info,$openid);

			if ( $rows ) {
				$data['backurl']	=	site_url('member/archives');
				$data['message']	=	'修改成功！请完善基本信息！';
				templates('global','message',$data);
				exit;
			}else{
				$data['backurl']	=	site_url('member/updates');
				$data['message']	=	'修改失败！';
				templates('global','message',$data);
				exit;
			}

		}else{
			$member	=	$this->Member_model->useropenid($openid);
			
			if(!$member['usernumber']){
				//	获取数据
				$data	=	$this->Member_model->getone();
				$arr=range(0,9);
				shuffle($arr);
				for ($i=0; $i < 5; $i++) { 
					$random.= $arr[$i];
				}
				$num = $data['info']['userid']+1;
				$usernumber = $num.'001'.$random;

				$info	=	$this->Member_model->checkuserbyco($usernumber);
				
				$return['usernumber'] = $usernumber;
			}else{
				$data['backurl']	=	site_url('member/archives');
				$data['message']	=	'已注册过卡号，请完善基本信息！';
				templates('global','message',$data);
				exit;
			}
			$return['seo_title'] = '会员申请';
			$this->load->vars($return);
			seo('会员申请');

			templates('member','vipapply');
		}
	}

	public function archives(){
		header("Content-type: text/html; charset=utf-8"); 
		
		$access_token	=	$this->session->userdata('access_token');
		$openid		    =	$this->session->userdata('openid');
		if ( isset($_POST['dosubmit']) && $_POST['dosubmit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			
			$id		=	$post['userid'] ? intval($post['userid']) : '';

			if (!$id) {
				redirect(site_url('member/main'));
				exit;
			}
			
			$info		=	array();
			$info['username']	=	$post['username'];
			$info['email']		=	$post['email'] ? $post['email'] : '';
			$info['phone']		=	$post['phone'] ? $post['phone'] : '';
			$info['sex']		=	$post['sex'] ? intval($post['sex']) : '0';
			$info['birthday']		=	$post['birthday'] ? $post['birthday'] : '';
			$info['telephone']		=	$post['telephone'] ? $post['telephone'] : '';
			$info['number']		=	$post['number'] ? $post['number'] : '';
			$info['wechat']		=	$post['wechat'] ? $post['wechat'] : '';
			$info['qq']		=	$post['qq'] ? $post['qq'] : '';
			$info['origin']		=	$post['origin'] ? $post['origin'] : '';
			$info['address']		=	$post['address'] ? $post['address'] : '';
			$info['marital']		=	$post['marital'] ? $post['marital'] : '';
			$info['work']		=	$post['work'] ? $post['work'] : '';
			$info['post']		=	$post['post'] ? $post['post'] : '';
			$info['hobby']		=	$post['hobby'] ? $post['hobby'] : '';
			$info['license']		=	$post['license'] ? $post['license'] : '';
			$info['type']		=	$post['type'] ? $post['type'] : '';
			$info['limited']		=	$post['limited'] ? $post['limited'] : '';
			$info['renewal']		=	$post['renewal'] ? $post['renewal'] : '';
			$info['update_time']	=	time();
			$rows	=	$this->Member_model->updates($info,$openid);

			if ( $rows ) {
				$data['backurl']	=	site_url('member/archives');
				$data['message']	=	'完善信息成功！';
				templates('global','message',$data);
				exit;
			}else{
				$data['backurl']	=	site_url('member/archives');
				$data['message']	=	'完善信息失败！';
				templates('global','message',$data);
				exit;
			}

		}else{
			$member	=	$this->Member_model->useropenid($openid);
			if($member){
				$return['member'] = $member;
			}
			$return['seo_title'] = '会员档案';
			$this->load->vars($return);
			seo('会员档案');
			templates('member','archives');
		}
	}

}

