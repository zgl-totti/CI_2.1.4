<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


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
* 加密算法处理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function aesencode($str,$key=''){
	if (!$str) Return false;

	$CI = & get_instance();
	$CI->load->library('encrypt');
	$result = $CI->encrypt->encode($str,$key);
	Return $result;
}

/**
* 解密算法处理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function aesDecode($str,$key = ''){
	if (!$str) Return false;

	$CI = & get_instance();
	$CI->load->library('encrypt');
	$result = $CI->encrypt->decode($str,$key);
	Return $result;
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
* 分页使用方法
* @author	
* @copyright	
* @version	1.0
* @param
*/
function pages($total = 100,$per_page = 10,$segment = '3',$base_url=''){
	$CI = & get_instance();
	$CI->load->library('pagination');
	
	$pages	=	'';
	$config['base_url']		=	site_url().$base_url;
	$config['total_rows']	=	$total;
	$config['per_page']		=	$per_page; 
	$config['num_links']	=	1;
	$config['uri_segment']	=	$segment;  
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open']	= '<ul class="t-right pager">';
	$config['full_tag_close']	= '</ul>';
	
	$config['prev_tag_open']	= '<li>';	//“上一页”链接的打开标签 。
	$config['prev_tag_close']	= '</li>';	//“上一页”链接的关闭标签 。
	
	$config['next_tag_open']	= '<li>';	//“下一页”链接的打开标签 。
	$config['next_tag_close']	= '</li>';	//“下一页”链接的关闭标签 

	$config['first_tag_open']	= '<li class="fe">';	//第一页”链接的打开标签
	$config['first_tag_close']	= '</li>';	//第一页”链接的关闭标签。
	$config['last_tag_open']	= '<li class="fe">';	//第一页”链接的打开标签
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
 * 商城分页使用方法
 * @author
 * @copyright
 * @version	1.0
 * @param
 */
function page_shop($total = 100,$per_page = 10,$segment = '3',$base_url=''){
	$CI = & get_instance();
	$CI->load->library('pagination');

	$pages	=	'';
	$config['base_url']		=	site_url().$base_url;
	$config['total_rows']	=	$total;
	$config['per_page']		=	$per_page;
	$config['num_links']	=	10;
	$config['uri_segment']	=	$segment;
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open']	= '<div class="ipage">';
	$config['full_tag_close']	= '</div>';

	

	//	当前页
	$config['cur_tag_open']		= '<a href="javascript:void(0)" class="on">';
	$config['cur_tag_close']	= '</a>';

	$config['first_link']		= '首页';
	$config['last_link']		= '尾页';

	$CI->pagination->initialize($config);
	$pages	=	$CI->pagination->create_links();
	Return $pages;
}

/**
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
function safe_replace($string) {
	$string = str_replace('%20','',$string);
	$string = str_replace('%27','',$string);
	$string = str_replace('%2527','',$string);
	$string = str_replace('*','',$string);
	$string = str_replace('"','&quot;',$string);
	$string = str_replace("'",'',$string);
	$string = str_replace('"','',$string);
	$string = str_replace(';','',$string);
	$string = str_replace('<','&lt;',$string);
	$string = str_replace('>','&gt;',$string);
	$string = str_replace("{",'',$string);
	$string = str_replace('}','',$string);
	$string = str_replace('\\','',$string);
	return $string;
}


/**
 * 检查用户名是否符合规定
 *
 * @param STRING $username 要检查的用户名
 * @return 	TRUE or FALSE
 */
function is_username($username) {
	$strlen = strlen($username);
	if(!preg_match("/^[a-zA-Z0-9_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]+$/", $username)){
		return false;
	} elseif ( 20 < $strlen || $strlen < 2 ) {
		return false;
	}
	return true;
}

/**
 * 判断email格式是否正确
 * @param $email
 */
function is_email($email) {
	return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
}

/**
* 手机号码验证
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
function is_mobile($mobilephone){
	$mobilephone=trim($mobilephone);   
	if(preg_match("/^13[0-9]{1}[0-9]{8}$|14[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}|17[0-9]{1}[0-9]{8}$|18[0236789]{1}[0-9]{8}$/",$mobilephone)){   
		Return true;
	}else{   
		Return false;
	} 
}

/**
 * 字符截取 支持UTF8/GBK
 * @param $string
 * @param $length
 * @param $dot
 */
function str_cut($string, $length, $dot = '...',$charst = 'utf-8') {
	$strlen = strlen($string);
	if($strlen <= $length) return $string;
	$string = str_replace(array(' ','&nbsp;', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), array('∵',' ', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), $string);
	$strcut = '';
	if(strtolower($charst) == 'utf-8') {
		$length = intval($length-strlen($dot)-$length/3);
		$n = $tn = $noc = 0;
		while($n < strlen($string)) {
			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t <= 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}
			if($noc >= $length) {
				break;
			}
		}
		if($noc > $length) {
			$n -= $tn;
		}
		$strcut = substr($string, 0, $n);
		$strcut = str_replace(array('∵', '&', '"', "'", '“', '”', '—', '<', '>', '·', '…'), array(' ', '&amp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;'), $strcut);
	} else {
		$dotlen = strlen($dot);
		$maxi = $length - $dotlen - 1;
		$current_str = '';
		$search_arr = array('&',' ', '"', "'", '“', '”', '—', '<', '>', '·', '…','∵');
		$replace_arr = array('&amp;','&nbsp;', '&quot;', '&#039;', '&ldquo;', '&rdquo;', '&mdash;', '&lt;', '&gt;', '&middot;', '&hellip;',' ');
		$search_flip = array_flip($search_arr);
		for ($i = 0; $i < $maxi; $i++) {
			$current_str = ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
			if (in_array($current_str, $search_arr)) {
				$key = $search_flip[$current_str];
				$current_str = str_replace($search_arr[$key], $replace_arr[$key], $current_str);
			}
			$strcut .= $current_str;
		}
	}
	return $strcut.$dot;
}


/**
* 发送手机短信接口
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
function Phone_Msg($mobile,$message){
	$password  	= '9c24_-46'; //密码
    $userName  	= 'SDK-BBX-010-21147';//序列号
    $flag 		= 0;
    $params 	= '';
    $content 	= iconv( "UTF-8", "gb2312//IGNORE" ,$message.'【白果】');
    $argv = array(
        'sn' =>$userName,
        'pwd'=>strtoupper(md5($userName.$password)), //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
        'mobile'=>$mobile,
        'content'=>$content,
        'ext'=>'',
        'stime'=>'',
        'rrid'=>''
    );
    foreach ($argv as $key=>$value) {
        if ($flag!=0) {
            $params .= "&";
            $flag = 1;
        }
        $params.= $key."="; $params.= urlencode($value);
        $flag = 1;
    }

    $length = strlen($params);
    $fp = fsockopen("sdk2.entinfo.cn",8060,$errno,$errstr,10) or exit($errstr."--->".$errno);
    $header = "POST /webservice.asmx/mt HTTP/1.1\r\n";
    $header .= "Host:sdk2.entinfo.cn\r\n";
    $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $header .= "Content-Length: ".$length."\r\n";
    $header .= "Connection: Close\r\n\r\n";
    $header .= $params."\r\n";
    fputs($fp,$header);
    $inheader = 1;
    while (!feof($fp)) {
        $line = fgets($fp,1024); //去除请求包的头只显示页面的返回数据
        if ($inheader && ($line == "\n" || $line == "\r\n")) {
            $inheader = 0;
        }
        if ($inheader == 0) {
        }
    }
    $line=str_replace("<string xmlns=\"http://tempuri.org/\">","",$line);
    $line=str_replace("</string>","",$line);
    $result=explode("-",$line);
    if(count($result)<0){
        //$data = array('code'=>$line,'status'=>'0');
        return 0;
    }else{
        //$data = array('code'=>$line,'status'=>'1');
        return 1;
    } 
}




/**
 * 文件下载
 * @param $filepath 文件路径
 * @param $filename 文件名称
 */

function file_down($filepath, $filename = '') {
	if(!$filename) $filename = basename($filepath);
	if(is_ie()) $filename = rawurlencode($filename);
	$filetype = fileext($filename);
	$filesize = sprintf("%u", filesize($filepath));
	if(ob_get_length() !== false) @ob_end_clean();
	header('Pragma: public');
	header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: pre-check=0, post-check=0, max-age=0');
	header('Content-Transfer-Encoding: binary');
	header('Content-Encoding: none');
	header('Content-type: '.$filetype);
	header('Content-Disposition: attachment; filename="'.$filename.'"');
	header('Content-length: '.$filesize);
	readfile($filepath);
	exit;
}

/**
 * IE浏览器判断
 */
function is_ie() {
	$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
	if((strpos($useragent, 'opera') !== false) || (strpos($useragent, 'konqueror') !== false)) return false;
	if(strpos($useragent, 'msie ') !== false) return true;
	return false;
}