<?php
 
// https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3f340e4d81d90617&redirect_uri=http://baiyang.keyanzu.com/index.php/weixin/wechat/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect
// <a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx669eb16a613703ae&redirect_uri=http://aczm.medtu.com/oauth2.php&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect 
// ">点击这里绑定</a>
/**
 * 微信授权相关接口
 * 
 */
class Wechat extends CI_Controller{
    //高级功能-》开发者模式-》获取
    private $app_id = 'wx669eb16a613703ae';
    private $app_secret = 'f0d01a8b6b07420b95001a0f55acb27a';

	public function __construct(){
		parent::__construct();

		$this->load->model('Shops_model');
		$this->load->model('Shops_group_model');
		$this->load->model('Wechat_model');
	}

    /**
     * 获取微信授权链接
     * 
     * @param string $redirect_uri 跳转地址
     * @param mixed $state 参数
     */
    public function index( $state = '1',$enter='get_access_token'){
		$redirect_uri=site_url("weixin/wechat/$enter");//需要访问的方法名
        $redirect_uri = urlencode($redirect_uri);
        echo  "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->app_id}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_base&state={$state}#wechat_redirect";
    }

    /***********************************个人中心获取token ************/
    /**
    *  https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx669eb16a613703ae&redirect_uri=http://aczm.medtu.com/index.php/weixin/wechat/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect
     */
    public function get_access_token(){
		$access_token	=	'';
		$openid			=	'';
		$this->config->set_item('enable_query_strings',TRUE);
		$code	=	$this->input->get('code',TRUE);
		$token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->app_id}&secret={$this->app_secret}&code={$code}&grant_type=authorization_code";
		//echo $token_url;die;
		$token_data = $this->http($token_url,'POST');
		if($token_data[0] == 200) {
			$data	=	 json_decode($token_data[1], TRUE);
			$this->session->set_userdata('access_token', $data['access_token']);
			$this->session->set_userdata('openid', $data['openid']);
			$access_token	=	$data['access_token'];
			$openid			=	$data['openid'];
		}
		/*seo('个人吧 中心');
		templates('wxmain','mine');*/
		$this->get_user_info($access_token,$openid);
        //return FALSE;
    }

	public function get_user_info($access_token = '', $open_id = ''){
		$userinfo	=	array();
		if($access_token && $open_id) {
			$info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
			$info_data = $this->http($info_url,'POST');
			if($info_data[0] == 200) {
				$userinfo	=	 json_decode($info_data[1], TRUE);
			}
		}
		//var_dump($userinfo);die;
		//	信息入库
		if ( $userinfo ) {
			//print_r($userinfo);die;
			$check	=	$this->Wechat_model->get_one(array('openid'=>$open_id));
			if ( !$check ) {
				$m	=	array();
				$m['openid']	=	$userinfo['openid'];
				$m['nickname']	=	$userinfo['nickname'];
				$m['sex']		=	$userinfo['sex'] ? $userinfo['sex'] : 0;
				$m['language']	=	$userinfo['language'];
				$m['city']		=	$userinfo['city'];
				$m['province']	=	$userinfo['province'];
				$m['country']	=	$userinfo['country'];
				$m['headimgurl']	=	$userinfo['headimgurl'];
				$m['addtime']	=	time();
				$this->Wechat_model->add($m);
				$userinfo['integral']	=	0;
			}else{
				$userinfo['integral']	=	$check['integral'];
			}
			// $this->load->model('Signlog_model');
			// $check =	$this->Signlog_model->get_one(array('openid'=>$open_id,
			// 	'addtime'=>date('Y-m-d')));
			// if ($check) {
			// 	$userinfo['issign']	=	1;
			// }else{
			// 	$userinfo['issign']	=	0;
			// }
		}
		$_SESSION['uinfo']['name']	=	$userinfo['nickname'];
		$_SESSION['uinfo']['pic']	=	$userinfo['headimgurl'];
		if(!$open_id){
			redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx669eb16a613703ae&redirect_uri=http://aczm.medtu.com/index.php/weixin/wechat/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
		}
		$this->config->set_item('enable_query_strings',false);
		redirect(site_url('weixin/wechat/userinfo'));
		//echo 444;die;
		// $this->load->helper('url');
		// redirect('wxmain/index', 'refresh');
	}

	public function userinfo(){
		$res	=	$this->Wechat_model->get_one(array('openid'=>$_SESSION['openid']));
		//echo '<pre>';print_r($res);die;
		$data['shopid']	=	$res['shop_id'];
		$data['id']=$res['id'];
		templates('wxmain','userinfo3',$data);
	}

    /**************************商圈首页进入获取token**************/
    public function get_access_tokens(){
		$access_token	=	'';
		$openid			=	'';
		$this->config->set_item('enable_query_strings',TRUE);
		$code	=	$this->input->get('code',TRUE);
		$token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->app_id}&secret={$this->app_secret}&code={$code}&grant_type=authorization_code";
		$token_data = $this->http($token_url,'POST');
		if($token_data[0] == 200) {
			$data	=	 json_decode($token_data[1], TRUE);
			$this->session->set_userdata('access_token', $data['access_token']);
			$this->session->set_userdata('openid', $data['openid']);
			//echo '<pre>';	print_r($_SESSION);die;
			if(!isset($_SESSION['openid'])){
				redirect('https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx669eb16a613703ae&redirect_uri=http://aczm.medtu.com/index.php/weixin/wechat/get_access_tokens&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect');
			}
			$access_token	=	$data['access_token'];
			$openid			=	$data['openid'];
		}
		/*seo('个人吧 中心');
		templates('wxmain','mine');*/
		$this->get_user_infos($access_token,$openid);
        //return FALSE;
    }

    public function get_user_infos($access_token = '', $open_id = ''){
		$userinfo	=	array();
		if($access_token && $open_id) {
            $info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
            $info_data = $this->http($info_url,'POST');
            if($info_data[0] == 200) {
                $userinfo	=	 json_decode($info_data[1], TRUE);
            }
        }
		$data	=	array();
		//var_dump($userinfo);die;
		//	信息入库
		if ( $userinfo ) {
            ini_set('session.gc_maxlifetime', "9999999999"); // 秒
            ini_set("session.cookie_lifetime","9999999999"); // 秒
            $userinfo['openid'] = $_SESSION['openid'];
            // print_r($_SESSION);die;
            $this->load->model('Wechat_model');

            $check	=	$this->Wechat_model->get_one(array('openid'=>$open_id));
            if ( !$check ) {
                $m	=	array();
                $m['openid']	=	$userinfo['openid'];
                $m['nickname']	=	$userinfo['nickname'];
                $m['sex']		=	$userinfo['sex'] ? $userinfo['sex'] : 0;
                $m['language']	=	$userinfo['language'];
                $m['city']		=	$userinfo['city'];
                $m['province']	=	$userinfo['province'];
                $m['country']	=	$userinfo['country'];
                $m['headimgurl']	=	$userinfo['headimgurl'];
                $m['addtime']	=	time();
                $this->Wechat_model->add($m);
                $userinfo['integral']	=	0;
            }else{
                $userinfo['integral']	=	$check['integral'];
            }
            // $this->load->model('Signlog_model');
            // $check =	$this->Signlog_model->get_one(array('openid'=>$open_id,
            // 	'addtime'=>date('Y-m-d')));
            // if ($check) {
            // 	$userinfo['issign']	=	1;
            // }else{
            // 	$userinfo['issign']	=	0;
            // }
        }
		$this->config->set_item('enable_query_strings',FALSE);
		//	条件
		$where	=	array();
		$page		=	isset($page) && $page ? intval($page) : 1;
		$pagesize	=	10;
		//	获取数据
		$where['isshow']=1;
		//	获取数据
		$shops = $this->Shops_model->lists($where, $page, $pagesize, 'updatetime DESC');
        foreach ($shops['info'] as $key => $value) {
            if ( $value && $value['service']) {
                $shops['info'][$key]['service']	=	explode(',',$value['service']);
            }
        }
        $data['userinfo']	=	$userinfo;
        redirect(site_url('weixin/wechat/business_index'));
        //echo '<pre>';	print_r($shops);die;
    }

	public function business_index(){
		/*十家店铺展示*/
		$where['isshow']=1;
		$shops = $this->Shops_model->lists($where, $page=1, $pagesize=10, 'updatetime DESC');
		$data['abb']=$shops['info'];
		templates('wxmain','dingdans',$data);
	}

	/**************************个人中心游戏互动进入获取token**************/
	public function get_access_token2(){
		$this->config->set_item('enable_query_strings',TRUE);
		$code	=	$this->input->get('code',TRUE);
		$token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid={$this->app_id}&secret={$this->app_secret}&code={$code}&grant_type=authorization_code";
		$token_data = $this->http($token_url,'POST');
		if($token_data[0] == 200) {
			$data	=	 json_decode($token_data[1], TRUE);
			$this->config->set_item('enable_query_strings',FALSE);
			$this->session->set_userdata('access_token', $data['access_token']);
			$this->session->set_userdata('openid', $data['openid']);
			redirect(site_url('wxmain/hongbaohuodong'));
			//echo '<pre>';	print_r($_SESSION);die;
			//templates('wxmain','hongbaohuodong');
		}
	}

    public function http($url, $method, $postfields = null, $headers = array(), $debug = false){
        $ci = curl_init();
        /* Curl settings */
        curl_setopt($ci, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ci, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ci, CURLOPT_TIMEOUT, 30);
        curl_setopt($ci, CURLOPT_RETURNTRANSFER, true);
        switch ($method) {
            case 'POST':
                curl_setopt($ci, CURLOPT_POST, true);
                if (!empty($postfields)) {
                    curl_setopt($ci, CURLOPT_POSTFIELDS, $postfields);
                    $this->postdata = $postfields;
                }
                break;
        }
        curl_setopt($ci, CURLOPT_URL, $url);
        curl_setopt($ci, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ci, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($ci);
        $http_code = curl_getinfo($ci, CURLINFO_HTTP_CODE);
        if ($debug) {
            echo "=====post data======\r\n";
            var_dump($postfields);
            echo '=====info=====' . "\r\n";
            print_r(curl_getinfo($ci));
            echo '=====$response=====' . "\r\n";
            print_r($response);
        }
        curl_close($ci);
        return array($http_code, $response);
    }
}