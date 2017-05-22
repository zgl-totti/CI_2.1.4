<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 用户登录
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Login extends CI_Controller {
	
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
	* 登录动作处理
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function index(){
		$this->config->set_item('enable_query_strings',FALSE);
		
		$cookieuserid	=	$this->input->cookie('user',true);
		$cookieuserid	=	aesDecode($cookieuserid);

		if ( $cookieuserid && is_numeric($cookieuserid) ) {
			redirect('/home');
			exit;
		}

		if ( $this->input->post('dosubmit',TRUE) ) {
			$username	=	$this->input->post('username',TRUE);
			$password	=	$this->input->post('password',TRUE);
			
			$data		=	array();
			$data['backurl']	=	site_url('login');
			$data['ms']			=	3000;

			if ( !$username ) {
				$data['message']	=	'用户名不能为空';
				templates('global','message',$data);
				exit;
			}

			if ( !$password ) {
				$data['message']	=	'密码不能为空';
				templates('global','message',$data);
				exit;
			}
			
			if ( is_email($username) ) {
				$userinfo		=	$this->Member_model->checkemail($username);
			}elseif( is_mobile($username) ){
				$userinfo		=	$this->Member_model->checkphone($username);
			}else{
				$userinfo		=	$this->Member_model->checkusername($username);
			}
			
			if ( !$userinfo ) {
				$data['message']	=	'用户不存在！';
				templates('global','message',$data);
				exit;
			}

			$confirm	=	password($password,$userinfo['encrypt']);
			if ( $confirm != $userinfo['password'] ) {
				$data['message']	=	'密码错误！';
				templates('global','message',$data);
				exit;
			}

			//	判断该用户类别，如果为筛查中心用户确认其有效时间
			if ( $userinfo['group'] == 3 ) {
				$days	=	round( ( time() - $userinfo['add_time'] )/86400 );
				$this->config->load('uservalid', TRUE);
				$valid	=	$this->config->item('uservalid');
				
				if ($days >= $valid['valid']) {
					$data['message']	=	'用户已过期';
					templates('global','message',$data);
					exit;
				}
			}
			
			
			$cookies = array(
					'name'   => 'user',
					'value'  => aesencode($userinfo['userid']),
					'expire' => '1209600'
				);
			$this->input->set_cookie($cookies); 
			
			$data['backurl']	=	site_url('home');
			$data['message']	=	'登录成功';
			templates('global','message',$data);
			exit;
		}


		seo('登录');
		templates('member','login');

	}

	/**
	* 退出
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function loginout(){
		$cookies = array(
                    'name'   => 'user',
                    'value'  => '',
                    'expire' => ''
                );
	
		$this->input->set_cookie($cookies); 

		redirect('/login');
	}






	public function sendcodes111(){
		$mobile	=	$this->input->post('mobile',TRUE);


		$result	=	array('status'=>'0');
		/*print_r($mobile);echo '--';
        print_r(is_mobile($mobile) );die;*/
		if ( !$mobile || !is_mobile($mobile) ) {
			exit(json_encode($result));
		}

		//	获取发送时间
		$sendtimes	=	$this->session->userdata('sendtimes');
		$ctimes		=	$sendtimes ? time() - $sendtimes : 0;
		//var_dump($sendtimes,$ctimes);
		if ($ctimes && $ctimes < 60 ) {
			$result['status'] = -1;
			exit(json_encode($result));
		}

		//	发送短信
		$message	=	'手机号为：'.$mobile.'，用户申请了贷款业务。（巩义农商银行）【UPTOSCI】';
		Phone_Msg('18236918637',$message);//15938955271

		$result['status']	=	1;
		exit(json_encode($result));
	}
}

