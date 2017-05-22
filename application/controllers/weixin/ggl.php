<?php
 
// https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3f340e4d81d90617&redirect_uri=http://baiyang.keyanzu.com/index.php/weixin/ggl/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect

/**
 * 微信授权游戏刮刮乐
 * 
 */
class Ggl extends CI_Controller{
    //高级功能-》开发者模式-》获取
    private $app_id = 'wx3f340e4d81d90617';
    private $app_secret = 'a9d1f6c3920c74caccf94519f8552bb3';
	public function __construct(){
		parent::__construct();
	}

    /**
     * 获取微信授权链接
     * 
     * @param string $redirect_uri 跳转地址
     * @param mixed $state 参数
     */
    public function get_authorize_url($redirect_uri = '', $state = ''){
        $redirect_uri = urlencode($redirect_uri);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?appid={$this->app_id}&redirect_uri={$redirect_uri}&response_type=code&scope=snsapi_userinfo&state={$state}#wechat_redirect";
    }
    
    /**
     * 获取授权token
     * 
     * @param string $code 通过get_authorize_url获取到的code
     */
    public function get_access_token(){
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
			$access_token	=	$data['access_token'];
			$openid			=	$data['openid'];
		}
		$this->get_user_info($access_token,$openid);
        return FALSE;
    }
    
    /**
     * 获取授权后的微信用户信息
     * 
     * @param string $access_token
     * @param string $open_id
     */
    public function get_user_info($access_token = '', $open_id = ''){
		$userinfo	=	array();
		if($access_token && $open_id) {
            $info_url = "https://api.weixin.qq.com/sns/userinfo?access_token={$access_token}&openid={$open_id}&lang=zh_CN";
            $info_data = $this->http($info_url,'POST');
            if($info_data[0] == 200) {
                $userinfo	=	 json_decode($info_data[1], TRUE);
            }
        }
		$data	=	array();
		//信息入库
		if ( $userinfo ) {
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
		}
		$data['userinfo']	=	$userinfo;
		$this->load->vars($data);
		templates('weixin/ggl','index');
    }
	
    //	/**
    //	 * 刮刮乐
    //	 * @author	wangteng
    //	 * @copyright	wangtengwtq@163.com
    //	 * @version	1.0
    //	 * @param
    //	 * @return
    //	 */
    //    public function ggl(){
    //    	//$openid		=	$this->session->userdata('openid');
    //    	$openid =  'olp6Kt2vHufwBkkGGR5gbbxlQ7sw';
    //    	$result		=	array();
    //    	if ( !$openid ) {
    //    		$result['status']	=	0;
    //    		exit(json_encode($result));
    //    	}
    //    	$this->load->model('Wechat_model');
    //    	$info	=	$this->Wechat_model->get_one(array('openid'=>$openid));
    //    	$this->mac=$info['id'];
    //    	$this->load->vars($info);
    //    	templates('weixin/ggl','index');
    //    }

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