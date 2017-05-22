<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 附件操作
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Attachment extends CI_Controller {
	public $_userid;
	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();
		
		$this->_userid	=	$this->session->userdata('userid');
	}

	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		$this->config->set_item('enable_query_strings',TRUE);

		$this->load->library('attachmentclass');
		
		$this->attachmentclass->set_userid($this->_userid);
		$data	=	$this->attachmentclass->upload('upload');
		
		$fn		=	isset($_GET['CKEditorFuncNum']) ? intval($_GET['CKEditorFuncNum']) : '1';
		
		$this->config->set_item('enable_query_strings',false);
		if ( $data && isset($data['real']) ) {
			$filepath	=	$data['real'];
			$str='<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$fn.', \''.$filepath.'\');</script>';
			exit($str);
		}
	}
	
	
}
