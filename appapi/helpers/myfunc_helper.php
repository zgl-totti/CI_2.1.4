<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
* 加载模版方法(default 为默认目录 )
* eg:模版存储位置 application/views/default/
*    如果是在 default根目录下存储，则content 可设置为空，否则content为二级目录名
*    $view 加载的文件名，不包含后缀
*	 $data 需要在模版上展示的数据
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		$model 模块名 $content 
* @return		
*/
function templates( $content = '',$view = '',$data = ''){
	if ( !$view ) {
		show_error('Template does not exist.');
	}

	$ci =& get_instance();
	$mytemplate	=	isset($ci->MYTEMPLATE) && $ci->MYTEMPLATE ? $ci->MYTEMPLATE : '';
	//	获取 model，后台最初来之后需要补全上去
	if ( $mytemplate ) {
		$model	=	$mytemplate.'/';
	}else{
		$model		=	'default/';
	}
	
	$content	=	$content ? $content.'/' : '';
	$view		=	$view ? $view.'.php' : '';
	$template	=	$model.$content.$view;

	if ( ! file_exists(APPPATH.'views/'.$template)){
		show_error('Template does not exist.');
	}
	ob_start();
	$ci->load->view($template,$data);
	ob_end_flush();
}


/**
 * 生成SEO
 * @param $title        标题
 * @param $description  描述
 * @param $keyword      关键词
 */
function seo( $title = '', $description = '', $keyword = '') {
	if ( !empty($title) )		$title = strip_tags($title);
	if ( !empty($description) ) $description = strip_tags($description);
	if ( !empty($keyword) )		$keyword = str_replace(' ', ',', strip_tags($keyword));

	
	$seo['seo_title']		= $title ? $title.' '.SITENAME : SITENAME;
	$seo['seo_keywords']	= !empty($keyword) ? $keyword.' '.SITENAME : SITENAME;
	$seo['seo_description'] = !empty($description) ? $description.' '.SITENAME : SITENAME;

	foreach ($seo as $k => $v) {
		$seo[$k] = str_replace(array("\n","\r"),'', $v);
	}
	
	//	加载到页面变量中
	$ci		=	& get_instance();
	$ci->load->vars($seo);

	return $seo;
}


/**
* 获取用户信息
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param		
* @return		
*/
function getmemberinfo( $userid = '',$field = ''){
	$ci =& get_instance();
	
	if ( !$userid ) {
		$userid	=	$ci->input->cookie('user',true);
		$userid	=	$userid ? aesDecode($userid) : '';
	}
	
	if(!is_numeric($userid)) {
		return false;
	} else {
		static $memberinfo;
		if (!isset($memberinfo[$userid])) {
			$db		=	$ci->load->database('default',TRUE);
			$where	=	array('userid'=>$userid);
			$memberinfo[$userid]	=	$db->limit(1)->get_where('member',$where)->row_array();
		}
	
		if (!$memberinfo) {
			Return false;
		}

		if(!empty($field) && !empty($memberinfo[$userid][$field])) {
			return $memberinfo[$userid][$field];
		} else {
			return $memberinfo[$userid];
		}
	}
}



/**
* 调用博文网第三方接口
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param		
* @return		
*/
function clientAPI(){
	

	$ci =& get_instance();
	//	载入获取到的client信息
	$ci->config->load('uptosci', TRUE);
	$clientconfig	=	$ci->config->item('uptosci');
	
	$ci->load->model('Uptosci_token_model');

	$code	=	$ci->Uptosci_token_model->get();
	
	//	判断是否过期 
	if ( !$code ) {
		Return false;
	}

	if ( $code['expirestime'] < time() ) {
		Return false;
	}

	$token	=	$code['token'];
	$client	=	new uptosciClient( $clientconfig['uptosci_appid'] , 
		$clientconfig['uptosci_secret'] , $token);
	Return $client;
}


/**
* 
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param		
* @return		
*/
function gettoken(){
	

	$ci =& get_instance();
	//	载入获取到的client信息
	$ci->config->load('uptosci', TRUE);
	$clientconfig	=	$ci->config->item('uptosci');
	
	$oauth2			=	new UptosciOAuth2($clientconfig['uptosci_appid'],
		$clientconfig['uptosci_secret']);

	$callbackurl	=	$clientconfig['callback'];

	$url		=	$oauth2->getAuthorizeURL( $callbackurl );

	$code		=	curlget($url);
	$code		=	$code ? json_decode($code,true) : '';


	if (!$code) {
		usleep(100000);
		gettoken();
		
	}else{
		$ci->load->model('Uptosci_token_model');
		$data	=	array();
		$data['token']	=	$code['access_token'];
		$data['addtime']	=	time();
		$data['expirestime']=	time() + $code['expires_in'];

		$ci->Uptosci_token_model->add($data);

		clientAPI();
	}
}

/**
* 简单curl获取信息(get)
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param		
* @return		
*/
function curlget($url){
	if (!$url) {
		Return false;
	}
	$ch  = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);//抓取指定网页
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; 
	curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ; 
	$data = curl_exec($ch);
	
	Return $data;
}