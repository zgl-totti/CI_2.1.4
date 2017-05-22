<?php
 
// https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx3f340e4d81d90617&redirect_uri=http://baiyang.keyanzu.com/index.php/weixin/wechat/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect

/**
 * 微信授权相关接口
 * 
 */
 
class Test extends CI_Controller{
    //高级功能-》开发者模式-》获取
    private $app_id = 'wx669eb16a613703ae';
    private $app_secret = 'f0d01a8b6b07420b95001a0f55acb27a';
	public function __construct(){
		parent::__construct();
	}
    // https://api.weixin.qq.com/sns/userinfo?access_token=OezXcEiiBSKSxW0eoylIeAsR0GmYd1awCffdHgb4fhS_KKf2CotGj2cBNUKQQvj-G0ZWEE5-uBjBz941EOPqDQy5sS_GCs2z40dnvU99Y5AI1bw2uqN--2jXoBLIM5d6L9RImvm8Vg8cBAiLpWA8Vw&openid=oLVPpjqs9BhvzwPj5A-vTYAX3GLc

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
    function wx_get_token() {
        $token = $this->session->userdata('access_token');
        if (!$token) {
            $res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx669eb16a613703ae&secret=f0d01a8b6b07420b95001a0f55acb27a');
            $res = json_decode($res, true);
            $token = $res['access_token'];
            https://api.weixin.qq.com/sns/userinfo?access_token=goGjVu5nGHY0ep8XH8E4STgag9DZlFbf87wCqA6R-mp7p30sb8wC84ake97XbNSB_jLd9ca9Lzmc-MalcLmYepCLyY-t5bIzmXF9rdecb1g&openid=oaZm1uEZdjfzexRBxR8rr9jiVQsI
            // 注意：这里需要将获取到的token缓存起来（或写到数 据库中）
            // 不能频繁的访问https://api.weixin.qq.com/cgi-bin/token，每日有次数限制
            // 通过此接口返回的token的有效期目前为2小时。令牌失效后，JS-SDK也就不能用了。
            // 因此，这里将token值缓存1小时，比2小时小。缓存失效后，再从接口获取新的token，这样
            // 就可以避免token失效。
            // S()是ThinkPhp的缓存函数，如果使用的是不ThinkPhp框架，可以使用你的缓存函数，或使用数据库来保存。
            $this->session->set_userdata('access_token', $token);
        }
        return $token;
    }


    function wx_get_jsapi_ticket(){
        $ticket = "";
        do{
            $ticket = $this->session->userdata('wx_ticket');
            if (!empty($ticket)) {
                break;
            }
            $token = $this->session->userdata('access_token');
            if (empty($token)){
                $this->wx_get_token();
            }
            $token = $this->session->userdata('access_token');
            if (empty($token)) {
                logErr("get access token error.");
                break;
            }
            $url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",$token);
            $res = file_get_contents($url2);
            $res = json_decode($res, true);
            $ticket = $res['ticket'];
            $this->session->set_userdata('wx_ticket', $ticket);
            // 注意：这里需要将获取到的ticket缓存起来（或写到数据库中）
            // ticket和token一样，不能频繁的访问接口来获取，在每次获取后，我们把它保存起来。
        }while(0);
        return $ticket;
    }

    public function see_index(){
        $timestamp = time();
        $wxnonceStr = "SIFJASF";
        //$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = $_POST['url'];
        $wxticket = $this->wx_get_jsapi_ticket();
        $wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",$wxticket, $wxnonceStr, $timestamp,$url);
        $wxSha1 = sha1($wxOri);
        $data = array();
        $data['time'] =  $timestamp;
        $data['str'] =  $wxnonceStr;
        $data['sign'] =  $wxSha1;
        $data['test'] = $wxticket;
        exit(json_encode($data));
    }

    public function main(){
        templates('wxmain','index');
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
		var_dump($userinfo);
		//	信息入库
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
			$this->load->model('Signlog_model');
			$check =	$this->Signlog_model->get_one(array('openid'=>$open_id,
				'addtime'=>date('Y-m-d')));
			if ($check) {
				$userinfo['issign']	=	1;
			}else{
				$userinfo['issign']	=	0;
			}
		}
		$data['userinfo']	=	$userinfo;
		$this->load->vars($data);
		templates('weixin','userinfo');
    }

	/**
	* 签到
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function signin(){
		$openid		=	$this->session->userdata('openid');
		$result		=	array();
		if ( !$openid ) {
			$result['status']	=	0;
			exit(json_encode($result));
		}
		$this->load->model('Signlog_model');
		$check =	$this->Signlog_model->get_one(
			array('openid'=>$openid,'addtime'=>date('Y-m-d')));
		if ( $check ) {
			$result['status']	=	1;
			exit(json_encode($result));
		}
		$data	=	array();
		$data['openid']		=	$openid;
		$data['addtime']	=	date('Y-m-d');
		$data['integral']	=	2;
		$data['type']		=	1;
		$id	=	$this->Signlog_model->add($data);
		if (!$id) {
			$result['status']	=	0;
			exit(json_encode($result));
		}
		$this->load->model('Wechat_model');
		$info	=	$this->Wechat_model->get_one(array('openid'=>$openid));
		$this->Wechat_model->update(array('integral'=>$info['integral'] + 2 ),
			array('openid'=>$openid));
		$result['status']	=	1;
		exit(json_encode($result));
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