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
	
	$content	=	$content ? $content.'/' : '';
	$view		=	$view ? $view.'.php' : '';
	$template	=	$content.$view;

	if ( ! file_exists(APPPATH.'views/'.$template)){
		show_error('Template does not exist.');
	}
	ob_start();
	$ci->load->view($template,$data);
	ob_end_flush();
}

/**
* 管理网站网址（针对后台）
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		
* @return		
*/
function site_aurl($uri = ''){
	$CI =& get_instance();
	$config = $CI->config->config;
	return $CI->config->site_url($config['admin_folder'].'/'.$uri);
}

/**
* 解析url参数
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		
* @return		
*/
function get_segment_arr(){
	$CI		=	& get_instance();
	$data	=	$CI->uri->segment_array();
	Return $data;
}

/**
* php AES加密算法处理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function aesencode($str,$key=''){
	if (!$str) Return false;

	if (!$key) $key	=	'FTGHJNtfuhGHJBNKRTY';
	
	$iv		=	mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_ECB),
		MCRYPT_RAND);
	$result	=	mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB, $iv);
	
	Return bin2hex($result);
}

/**
* php AES解密算法处理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function aesDecode($str,$key = ''){
	if (!$str) Return false;

	if (!$key) $key	=	'FTGHJNtfuhGHJBNKRTY';

	$str	=	pack("H*",$str);
	
	$iv		=	mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128,MCRYPT_MODE_ECB),
		MCRYPT_RAND);  
    $result	=	mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $str, MCRYPT_MODE_ECB, $iv); 
	Return trim($result);
}

/**
* 对用户的密码进行加密
* @param $password
* @param $encrypt //传入加密串，在修改密码时做认证
* @return array/password
*/
function password($password, $encrypt='') {
	$pwd = array();
	$pwd['encrypt'] =  $encrypt ? $encrypt : create_randomstr();
	$pwd['password'] = md5(md5(trim($password)).$pwd['encrypt']);
	return $encrypt ? $pwd['password'] : $pwd;
}

/**
* 生成随机字符串
* @param string $lenth 长度
* @return string 字符串
*/
function create_randomstr($lenth = 6) {
	return random($lenth, '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ');
}


/**
* 产生随机字符串
*
* @param    int        $length  输出长度
* @param    string     $chars   可选的 ，默认为 0123456789
* @return   string     字符串
*/
function random($length, $chars = '0123456789') {
	$hash = '';
	$max = strlen($chars) - 1;
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}

/**
* 获取管理员用户信息
*
* @param    int        $length  输出长度
* @param    string     $chars   可选的 ，默认为 0123456789
* @return   string     字符串
*/
function getAdminuserinfo($userid = '') {
	$CI =& get_instance();
	if ( !$userid ) {
		$userid	=	$CI->session->userdata('userid');
	}
	
	$CI->load->model('Admin_model');

	$userinfo	=	$CI->Admin_model->get_info_by_userid($userid);
	Return $userinfo;
}


/**
* 分页使用方法
* @author	
* @copyright	
* @version	1.0
* @param	$total 总数 $per_page 每页显示数  $segment 当前页在url中位置 $base_url 当前url
*/
function pages($total = 100,$per_page = 10,$segment = '3',$base_url=''){
	$CI =& get_instance();
	$CI->load->library('pagination');

	$pages	=	'';
	$config['base_url']		=	site_url().$base_url;
	$config['total_rows']	=	$total;
	$config['per_page']		=	$per_page; 
	$config['num_links']	=	10;
	$config['uri_segment']	=	$segment;  
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open']	= '<ul>';
	$config['full_tag_close']	= '</ul>';
	
	$config['prev_tag_open']	= '<li>';	//“上一页”链接的打开标签 。
	$config['prev_tag_close']	= '</li>';	//“上一页”链接的关闭标签 。
	
	$config['next_tag_open']	= '<li>';	//“下一页”链接的打开标签 。
	$config['next_tag_close']	= '</li>';	//“下一页”链接的关闭标签 

	$config['first_tag_open']	= '<li>';	//第一页”链接的打开标签
	$config['first_tag_close']	= '</li>';	//第一页”链接的关闭标签。
	$config['last_tag_open']	= '<li>';	//第一页”链接的打开标签
	$config['last_tag_close']	= '</li>';	//第一页”链接的关闭标签。
	$config['num_tag_open']		= '<li>';	//“数字”链接的打开标签。
	$config['num_tag_close']	= '</li>';	//“数字”链接的关闭标签。

	//	当前页
	$config['cur_tag_open']		= '<li class="active"><a href="javascript:void(0)">';
	$config['cur_tag_close']	= '</a></li>';
	
	$config['first_link']		= '首页';
	$config['last_link']		= '尾页';

	$CI->pagination->initialize($config); 
	$pages	=	$CI->pagination->create_links();
	Return $pages;
}




/**
 * 分页使用方法
 * @author
 * @copyright
 * @version	1.0
 * @param	$total 总数 $per_page 每页显示数  $segment 当前页在url中位置 $base_url 当前url
 */
function pagesadmin($total = 100,$per_page = 10,$segment = '3',$base_url=''){
	$CI =& get_instance();
	$CI->load->library('pagination');

	$pages	=	'';
	$config['base_url']		=	site_url().$base_url;
	$config['total_rows']	=	$total;
	$config['per_page']		=	$per_page;
	$config['num_links']	=	10;
	$config['uri_segment']	=	$segment;
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open']	= '<ul>';
	$config['full_tag_close']	= '</ul>';

	$config['prev_tag_open']	= '<li>';	//“上一页”链接的打开标签 。
	$config['prev_tag_close']	= '</li>';	//“上一页”链接的关闭标签 。

	$config['next_tag_open']	= '<li>';	//“下一页”链接的打开标签 。
	$config['next_tag_close']	= '</li>';	//“下一页”链接的关闭标签

	$config['first_tag_open']	= '<li>';	//第一页”链接的打开标签
	$config['first_tag_close']	= '</li>';	//第一页”链接的关闭标签。
	$config['last_tag_open']	= '<li>';	//第一页”链接的打开标签
	$config['last_tag_close']	= '</li>';	//第一页”链接的关闭标签。
	$config['num_tag_open']		= '<li>';	//“数字”链接的打开标签。
	$config['num_tag_close']	= '</li>';	//“数字”链接的关闭标签。

	//	当前页
	$config['cur_tag_open']		= '<li class="active"><a href="javascript:void(0)">';
	$config['cur_tag_close']	= '</a></li>';

	$config['first_link']		= '首页';
	$config['last_link']		= '尾页';

	$CI->pagination->initialize($config);
	$pages	=	$CI->pagination->create_links();
	Return $pages;
}




















/**
* 保存操作日志信息
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		$m 模型 $c 控制器(文件) $a 事件 $querystring 操作详情 $data 操作数据 
				$message 简单的功能介绍
* @return		
*/
function manage_log($m = '',$c = '',$a = '',$querystring = '',$message = '',$data = '') {
	$CI =& get_instance();
	
	$CI->load->model('Log_model');

	$logid	=	$CI->Log_model->add($m,$c,$a,$querystring,$message,$data);
	Return $logid;
}

/**
* 提取数组中的某一项值
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function extractArray( $data, $type ){
	if ( !$data || !$type || !is_array($data) )  Return false;
	$result	=	array();
	foreach($data AS $key => $val){
		if ( array_key_exists($type,$val)  ) {
			$result[]	=	$val[$type];
		}
	}
	Return $result;
}

/**
* 处理二维数组，生成以某个值为键值的数组
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function handleArrayKey( $data , $type ){
	if ( !$data || !$type || !is_array($data) )  Return false;

	$result	=	array();
	foreach($data AS $key => $val){
		if ( array_key_exists($type,$val)  ) {
			$result[$val[$type]]	=	$val;
		}
	}
	Return $result;
}


/**
* 获取后台管理员管理菜单展示信息
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		
* @return		
*/
function getManageMenu(){
	$CI =& get_instance();
	
	$CI->load->library('menu_admin');
	
	$menu	=	$CI->menu_admin->admin_menu();

	$data	=	array();
	$data['manageMenuParentid']	=	array();
	$data['manageMenuChild']	=	array();
	//	如果没有获取到菜单信息，则直接认为是没有权限操作
	if ( !$menu ) {
		Return $data;
	}
	
	
	$data	=	array();
	foreach($menu AS $key => $val){
		if ($val['parentid'] == 0) {
			$data['manageMenuParentid'][]	=	$val;
		}else{
			$data['manageMenuChild'][$val['parentid']][]	=	$val;
		}
	}

	
	Return $data;
}



/**
* 获取属性类型信息
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param		
* @return		
*/
function get_attribute_type($type=''){
    $_type = array(
        'num'       =>  array('数字','int(10) UNSIGNED NOT NULL'),
        'string'    =>  array('字符串','varchar(255) NOT NULL'),
        'textarea'  =>  array('文本框','text NOT NULL'),
        'datetime'  =>  array('时间','int(10) NOT NULL'),
        'bool'      =>  array('布尔','tinyint(2) NOT NULL'),
        'select'    =>  array('枚举','char(50) NOT NULL'),
    	'radio'		=>	array('单选','char(10) NOT NULL'),
    	'checkbox'	=>	array('多选','varchar(100) NOT NULL'),
    	'editor'    =>  array('编辑器','text NOT NULL'),
    	'picture'   =>  array('上传图片','varchar(100) UNSIGNED NOT NULL'),
    	'file'    	=>  array('上传附件','varchar(100) UNSIGNED NOT NULL'),
    );
    return $type?$_type[$type][0]:$_type;
}

/**
 * 返回经addslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_addslashes($string){
	if(!is_array($string)) return addslashes($string);
	foreach($string as $key => $val) $string[$key] = new_addslashes($val);
	return $string;
}
/**
 * 返回经stripslashes处理过的字符串或数组
 * @param $string 需要处理的字符串或数组
 * @return mixed
 */
function new_stripslashes($string) {
	if(!is_array($string)) return stripslashes($string);
	foreach($string as $key => $val) $string[$key] = new_stripslashes($val);
	return $string;
}

/**
 * 取得文件扩展
 *
 * @param $filename 文件名
 * @return 扩展名
 */
function fileext($filename) {
	return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}

/**
 * 日期格式转换时间戳
 *
 * @param $filename 文件名
 * @return 扩展名
 */

function str_format_time($timestamp = '')

{
	$year=((int)substr($timestamp,0,4));//取得年份

	$month=((int)substr($timestamp,5,2));//取得月份

	$day=((int)substr($timestamp,8,2));//取得几号

	$hour=((int)substr($timestamp,11,2));//取得时

	$minute=((int)substr($timestamp,14,2));//取分钟

	$second=((int)substr($timestamp,17,2));//取秒

	return mktime($hour,$minute,$second,$month,$day,$year);

}