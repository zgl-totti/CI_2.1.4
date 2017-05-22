<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JSSDK  extends CI_Controller {
    private $appId = "wx669eb16a613703ae";
    private $appSecret = "f0d01a8b6b07420b95001a0f55acb27a";
    private $WechatAuth="";//初始化WechatAuth类
    private $access_token="";//缓存token
    private $jsapi_ticket="";//缓存jsapi_ticket
    private $apiURL = 'https://api.weixin.qq.com/cgi-bin';

    public function __construct($appId, $appSecret) {
        parent::__construct();
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        if(!session('token')){
            $this->WechatAuth=new WechatAuth($this->appid,$this->appSecret);//初始化WechatAuth类
            $WechatAuth=$this->WechatAuth;
            $token=$WechatAuth->getAccessToken();
            session(array('expire'=>$token['expires_in']));//设置过期时间
            session('token',$token['access_token']);//缓存token
            $this->access_token=$token;
        }else {
            $token = session('token');
            $this->WechatAuth = new WechatAuth($this->appid, $this->appSecret, $token);//初始化WechatAuth类
            $this->access_token = $token;//缓存token
            if (!session('jsapi_ticket')) {
                $accessToken = $this->access_token;
                // 如果是企业号用以下 URL 获取 ticket
                // $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";
                $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
                $res = json_decode($this->httpGet($url));
                $this->jsapi_ticket = $res->ticket;
                session(array('expire' => 7000));//设置过期时间
                session('jsapi_ticket', $this->jsapi_ticket);
            } else {
                $this->jsapi_ticket = session('jsapi_ticket');
            }
        }
    }

    public function index(){
        $data=$this->getSignPackage();
        $this->assign('data',$data);
        $this->display();
    }

     public function getSignPackage() {
         $jsapiTicket = $this->jsapi_ticket;
         // 注意 URL 一定要动态获取，不能 hardcode.
         $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
         $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
         $timestamp = time();
         $nonceStr = $this->createNonceStr();
         // 这里参数的顺序要按照 key 值 ASCII 码升序排序
         $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
         $signature = sha1($string);
         $signPackage = array(
             "appId"     => $this->appid,
             "nonceStr"  => $nonceStr,
             "timestamp" => $timestamp,
             "url"       => $url,
             "signature" => $signature,
             "rawString" => $string
         );
         return $signPackage;
     }

    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        // 为保证第三方服务器与微信服务器之间数据传输的安全性，所有微信接口采用https方式调用，必须使用下面2行代码打开ssl安全校验。
        // 如果在部署过程中代码在此处验证失败，请到 http://curl.haxx.se/ca/cacert.pem 下载新的证书判别文件。
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
}

