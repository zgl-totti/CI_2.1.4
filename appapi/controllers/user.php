<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH.'libraries/uptoscioauth.class.php');

//友盟
include(APPPATH.'libraries/php/TopSdk.php');
/**
* api接口用户相关处理
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class User extends CI_Controller {

	private $_client;		//	实例化接口

	/**
	* 
	* @author	
	* @copyright	
	* @version	1.0
	* @param
	*/
	public function __construct(){
		parent::__construct();
		//	uri类
		$this->_baseurl		=	base_url();
		$this->_client		=	clientAPI();
	
		if ( !$this->_client ) {
			$this->_client	=	gettoken();
		}

		$this->load->model('Member_model');
		$this->load->model('Token_model');
		
	}
	
	/**
     * 获取医生用户基本信息
     *  需要传递参数 医生id
     *  
     * @author 
     * @return json格式数据
     * @version V1.0.0
     */
    function index(){
        $token     =   isset($_POST['token']) ? $_POST['token'] : '';

        $result =   array();
        $result['status']   =   0;
        
        //  检测token
        $uid    =   $this->checkToken($token);
        if ( !$uid ) {
            exit(json_encode($result));
        }

       
        // 判断该id是否存在记录
        $info  =   $this->Member_model->userinfo('userid = '.$uid);
		
        if(!$info){
            $result['status'] = '-1';
            exit(json_encode($result));
        }

        $url    =   isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $url    =   $url ? 'http://'.$url : 'http://local.baiyu.com';
       
        $result['status']   =   1;

		$data	=	array();
		$data['token']	=	$token;
		$data['nickname']	=	$info['nickname'] ? $info['nickname'] : '';
		$data['mobile']	=	$info['phone'] ? $info['phone'] : '';
		$data['email']	=	$info['email'] ? $info['email'] : '';
		$data['sex']		=	$info['sex'] ? $info['sex'] : '';
		$data['birthday']	=	$info['birthday'] ? $info['birthday'] : '';
		$data['avatar']		=   $info['avatar'] ? $url.'/'.$info['avatar'] : ''; 
    $data['group']      =   $info['group'] ? $info['group'] : '';
		$result['info']     =   $data;


        exit(json_encode($result));
    }
	
	
	/**
     * 医生登录
     *  需要传递的参数：手机号( phone )、密码( password )
     *  传递格式 POST
     * 
     * @author  wangyangyang
     * @return  json格式数据
     * @version V1.0.0
     */
	function login(){
        $result     =   array();
        $result['status']   =   0;

        $phone     =   isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
        // 判断手机号是否正确
        if(!preg_match("/^13[0-9]{1}[0-9]{8}$|14[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$||18[0-9]{1}[0-9]{8}$/",$phone)){   
            $result['status'] = '-1';

            exit(json_encode($result));
        } 

        //  密码
        $password   =   isset($_POST['password']) ? trim($_POST['password']) : '';
        if( !$password ){
            $result['status'] = '-2';
            exit(json_encode($result));
        }

        // 验证当前手机号是否已经被注册
		$check  =   $this->Member_model->userinfo('phone = "'.$phone.'"');


        if(!$check){
            $result['status'] = '-3';
            exit(json_encode($result));
        }

        //  验证密码是否正确
        
        $mdpass =   md5(md5(trim($password)).$check['encrypt']);
	
        if( $check['password'] != $mdpass){
            $result['status'] = '-4';
            exit(json_encode($result));
        }

        // 设置加密串，客户端通过该字符串进行数据获取
        
        $data           =   array();
        $data['token']  =   $this->setToken();
        $data['userid'] =   $check['userid'];
        $data['addtime']=   time();
        $data['types']  =   1;
        
		    $token  =   $this->Token_model->addToken($data);
	
        if ( !$token ) {
            $result['status'] = '-5';
            exit(json_encode($result));
        }


        $info       =   array();
        $info['token']      =   $data['token'];
        $info['nickname']   =   $check['nickname'];
        $info['email']      =   $check['email'] ? $check['email'] : '';
    		$info['mobile']		=   $check['phone'];
    		$info['sex']		=   $check['sex'];
    		$info['birthday']	=   $check['birthday'];


        $url    =   isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $url    =   $url ? 'http://'.$url : 'http://aczm.maitr.net/';
        $info['avatar']     =   $check['avatar'] ? $url.'/'.$check['avatar'] : '';
        $info['group']      =   $check['group'] ? $check['group'] : '';
       
        $result['status']   =   1;
        $result['into']     =   $info;
        
        exit(json_encode($result));
    }

	 /**
     * 医生注册接口
     *  需要传递的参数有：手机号( phone )、密码( password )
     *  传递方式 POST
     * 
     * @author wangyang
     * @version V1.0.0
     * @return 返回json类型数据
     */
    public function register(){
        $result     =   array();
        $result['status']   =   0;

        $phone     =   isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
        // 判断手机号是否正确
        if(!preg_match("/^13[0-9]{1}[0-9]{8}$|14[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$phone)){   
            $result['status'] = '-1';

            exit(json_encode($result));
        }
		

        //  密码
        $password   =   isset($_POST['password']) ? trim($_POST['password']) : '';
        if( !$password ){
            $result['status'] = '-2';
            exit(json_encode($result));
        }

        $group   =   isset($_POST['group']) ? trim($_POST['group']) : '';
        if( !$group ){
            $group      =   2;
        }

        // 验证当前手机号是否已经被注册
		$check  =   $this->Member_model->userinfo('phone = "'.$phone.'"');
        if($check){
            $result['status'] = '-3';
            exit(json_encode($result));
        }

        $data   =   array();
        $data['phone'] =   $phone;
        $data['username'] =   $phone;
		$data['encrypt']	=	create_randomstr();
		$data['password']	=	password($password,$data['encrypt']);
        $data['add_time']	=	time();
		$data['group']		=	$group;
		
        //插入 医生信息
        $dcotor_id = $this->Member_model->add($data);

        //  注册失败
        if( !$dcotor_id ){
            $result['status'] = '-4';
            exit(json_encode($result));
        }
    		// //对应友盟注册
      //       date_default_timezone_set('Asia/Shanghai');
            
      //       $httpdns = new HttpdnsGetRequest;
      //       $client = new ClusterTopClient("23315658","4f732b5b22e6c45b69e48b8911c5612f");
            
      //       $client->gatewayUrl = "https://eco.taobao.com/router/rest";
            
      //       $c = new TopClient;
      //       $c->appkey = '23315658';
      //       $c->secretKey = '4f732b5b22e6c45b69e48b8911c5612f';
      //       $req = new OpenimUsersAddRequest;
      //       $req->setUserinfos(' {"userid":"'.substr(md5($data["phone"]), 0, 20).'" ,"password": "'.substr(md5($data["phone"]), 5,20).'" } ');
      //       $resp = $c->execute($req);

        $result['status']   =   1;
        exit(json_encode($result));
    }
    /**
     * 友盟测试控制器
     *  
     *  
     *
     * @author laifei
     * @return  json格式数据
     * @version V1.0.0
     */
    public function test(){
    	/* $a = substr(md5('13466587938'), 0, 20);
    	$b = substr(md5('13466587938'), 5,20);
    	echo $a.'<br>'.$b;die; */
    	
    	//服务器端更新用户友盟帐号
    	/* $info = $this->Member_model->users();
    	 foreach ($info AS $v){
    	$req->setUserinfos(' {"userid":"'.substr(md5($v['username']), 0, 20).'" ,"password": "'.$v['password'].'"} ');
    	$resp = $c->execute($req);
    	print_r($resp);
    	} */    	
    	date_default_timezone_set('Asia/Shanghai');
    	
    	$httpdns = new HttpdnsGetRequest;
    	$client = new ClusterTopClient("wx669eb16a613703ae","f0d01a8b6b07420b95001a0f55acb27a");
    	
    	$client->gatewayUrl = "https://eco.taobao.com/router/rest";
    	
    	$c = new TopClient;
    	$c->appkey = 'wx669eb16a613703ae';
    	$c->secretKey = 'f0d01a8b6b07420b95001a0f55acb27a';
    	$req = new OpenimUsersAddRequest;
    	$req->setUserinfos(' {"userid":"'.substr(md5('13466587938'), 0, 20).'" ,"password": "'.substr(md5('13466587938'), 5,20).'" } ');
    	$resp = $c->execute($req);
    	
    }

	/**
     * 更新用户基本信息
     *  传递参数：昵称（nickname）
     *  传递格式 POST
     * 
     * @author 
     * @version 1.0.0
     * @return json格式数据
     */
    function update(){
        $token     =   isset($_POST['token']) ? $_POST['token'] : '';
        $result =   array();
        $result['status'] = 0;
        
        //  检测token
        $uid    =   $this->checkToken($token);
        if ( !$uid ) {
            exit(json_encode($result));
        }

        $nickname   =   isset($_POST['nickname']) ? trim($_POST['nickname']) : '';
        $email      =   isset($_POST['email']) ? trim($_POST['email']) : '';
		$sex		=   isset($_POST['sex']) ? intval($_POST['sex']) : '';
		$birthday	=   isset($_POST['birthday']) ? trim($_POST['birthday']) : '';
        
        //  如果 $email 有值，检测email
        if ( $email ) {
            $checkemail     =   is_email($email);

            if (!$checkemail) {
                $result['status'] = '-2';
                exit(json_encode($result));
            }

            // 判断该id是否存在记录
            $check  =   $this->Member_model->userinfo('email = "'.$email.'"');
            if ( $check && $check['userid'] != $uid) {
                $result['status'] = '-2';
                exit(json_encode($result));   
            }
        }



        //  
        $data   =   array();
		$data['nickname']   =   $nickname ? $nickname : '';
		
		$data['email']		=   $email ? $email : '';
		
		$data['sex']		=   $sex ? $sex : 0;

		$data['birthday']	=   $birthday ? $birthday : '';

        $updates    =    $this->Member_model->updates($data,$uid);

        if(!$updates){
            $result['status'] = '-1';
            exit(json_encode($result));
        }
		
        $result['status'] = 1;
		
        exit(json_encode($result));
    }


	/**
     * 更新用户密码
     *  需要传递参数 ：医生id 、老密码（oldpassword）、新密码（password）
     *  传递格式 POST
     * 
     * @author 
     * @version 1.0.0
     * @return json格式数据
     */
    function updatePass(){
        $token     =   isset($_POST['token']) ? $_POST['token'] : '';
        $result =   array();
        $result['status'] = 0;
        //  检测token
        $id    =   $this->checkToken($token);
        if ( !$id ) {
            exit(json_encode($result));
        }

        // 判断新旧密码
        $password   =   isset($_POST['password']) ? trim($_POST['password']) : '';
        $oldpassword=   isset($_POST['oldpassword']) ? trim($_POST['oldpassword']) : '';
        if ( !$password || !$oldpassword || $password == $oldpassword ) {
            $result['status'] = '-1';
            exit(json_encode($result));
        }


        //  判断老密码是否正确
        $check  =   $this->Member_model->userinfo('userid = '.$id);
        if(!$check){
            $result['status'] = '-2';
            exit(json_encode($result));
        }

		$mdpass     =   md5(md5(trim($oldpassword)).$check['encrypt']);
        //  旧密码不正确
        if( $check['password'] != $mdpass){
            $result['status'] = '-3';
            exit(json_encode($result));
        }

        // 生成新的密码
        $data   =   array();
        $data['encrypt']	=	create_randomstr();
		$data['password']	=	password($password,$data['encrypt']);

        $updates    =    $this->Member_model->updates($data,$id);

        if(!$updates){
            $result['status'] = '-4';
            exit(json_encode($result));
        }

        $result['status'] = 1;
        exit(json_encode($result));
    }

	/**
     * 上传用户头像
     *   需要传递file对象进行处理
     * 
     * @author  wangyangyang
     * @return  json格式数据
     * @version V1.0.0
     */
    function avatar(){
        $token     =   isset($_POST['token']) ? $_POST['token'] : '';
        $result =   array();
        $result['status'] = 0;

        //  检测token
        $id    =   $this->checkToken($token);
        if ( !$id ) {
            exit(json_encode($result));
        }
		
        if (isset($_FILES['avatar']) && $_FILES['avatar']['name']) {
				//	详情图片修改处理
				$this->load->library('attachmentclass');
				$this->attachmentclass->upload_dir	=	'uptosci';
                               
				$avatar	=	$this->attachmentclass->upload('avatar');
                               
				$fileurl	=	$avatar ? $avatar['filepath'] : '';
				
		}else{
            $result['status']   =   '-1';
            exit(json_encode($result));
        }
        //  更新数据库字段的图片地址
        $data   =   array();
        $data['avatar']   =   $fileurl;
        $updates    =    $this->Member_model->updates($data,$id);

        if(!$updates){
            $result['status'] = '-1';
            exit(json_encode($result));
        }

        $url    =   isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $url    =   $url ? 'http://'.$url : 'http://aczm.maitr.net/';

        $result['status']   =   1;
        $result['avatar']   =   $url.'/'.$fileurl;
        exit(json_encode($result));   

    }

	/**
     * 返回加密串
     */
    private function setToken(){
        return md5(base64_encode(pack('N6', mt_rand(), mt_rand(), mt_rand(), mt_rand(), mt_rand(), uniqid())));
    }


	/**
     * 检测token
     * @param  string $token token
     * @return bool  
     */
    private function checkToken( $token ){
        if (!$token ) {
            return false;
        }

 
            $where           =  array();
            $where['token']  =  $token;

            $uinfo  =   $this->Token_model->getInfo($token);
            
            $uid    =   $uinfo ? $uinfo['userid'] : '';
     
        return $uid;
    }

    public function aaddd(){
        templates('news','index');
    }
    
    
    
	
}

