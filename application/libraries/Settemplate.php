<?php
if (!defined('BASEPATH')) exit('No direct script access allowed'); 

/**
* 获取模版目录,已经在autoload中自动调用，请勿重新调用
* 
*	扩展皮肤方法
*		1: application/views 下建立新的模版目录文件
*		2: statics 下建立自己的 css、js、img 等文件
*       3：公用 js、css、img 文件为 statics/global/ 下目录（例如公用的jquery.js 等）
*
*	注意：
*		皮肤之间如果跨域调用，请合理使用 init 方法，否则容易造成混乱
*
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Settemplate
{
    public function __construct() {
	
		$this->init();
    }

	/**
	* 定义皮肤
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function init( ){
		$ci =	& get_instance();
		
		$template	=	'default';
		
		//	定义皮肤
		$ci->MYTEMPLATE	=	$template;
		
		//	定义css、js、img地址，默认为根目录下的 statics 下
		$ci->MYSTATIC	=	'statics/'.$template;
		
		if (!defined('MYGLOBALST')) {
			//	定义公共的 css、js、img文件目录
			define('MYGLOBALST','global');
		}

	}
}
