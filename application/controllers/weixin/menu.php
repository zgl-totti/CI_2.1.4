<?php
class Menu extends CI_Controller{
    private $app_id = 'wxdce3470f9e79fc9a';
    private $app_secret = '825561daf1ab5b621674925d49ffd16f';
	public function __construct(){
		parent::__construct();
	}

	/**
	 * 自定义菜单
	 *
	 * @param 
	 */
    public function menu_create(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->app_id."&secret=".$this->app_secret;
        $output = $this->https_request($url);
        $jsoninfo = json_decode($output, true);
        $access_token = $jsoninfo["access_token"];
        $jsonmenu = '{
             "button":[
              {
                    {
                       "type":"view",
                       "name":"首页",
                       "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->app_id.'&redirect_uri=http://aczm.medtu.com/index.php/wxmain/get_access_token&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"
                    },
                    {
                       "type":"view",
                       "name":"自驾游",
                       "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->app_id.'&redirect_uri=http://aczm.medtu.com/index.php/wxmain/get_access_token&response_type=code&scope=snsapi_userinfo&state=2#wechat_redirect"
                    },
                    {
                       "type":"view",
                       "name":"个人中心",
                       "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$this->app_id.'&redirect_uri=http://aczm.medtu.com/index.php/wxmain/get_access_token&response_type=code&scope=snsapi_userinfo&state=3#wechat_redirect"
                    }
               }]
         }';
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $result = $this->https_request($url, $jsonmenu);
        var_dump($result);die;
    }

    public function del(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$this->app_id."&secret=".$this->app_secret;
        $output = $this->https_request($url);
        $jsoninfo = json_decode($output, true);
        $access_token = $jsoninfo["access_token"];
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$access_token;
        $result = $this->https_request($url, $jsonmenu);
        var_dump($result);die;
    }

    function https_request($url,$data = null){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)){
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}