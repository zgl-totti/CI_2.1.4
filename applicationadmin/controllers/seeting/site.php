<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台站点信息
* @author	wangyangyang
* @copyright	wangyang8839@163.com
* @version	1.0
* @param
*/
class Site extends CI_Controller {
	public $before_filter	=	'admin';
	public $_userid;
	public $_siteid;

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

		$this->load->model('Site_model');
		$this->_userid	=	$this->session->userdata('userid');
		$urlArr	=	get_segment_arr();
		$this->_siteid		=	isset($urlArr['4']) ? intval($urlArr['4']) : '1';
	}

	/**
	* 站点基本信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index(){
		$info	=	$this->Site_model->get(array('siteid'=>$this->_siteid));
        //$this->load->library('cache_file');
        //$this->cache_file->set_rootpath(TRUE);
        //$test	=	$this->cache_file->cacheinfo('siteinfo','siteinfo');
		$this->load->view('site/index',$info);
	}

	
	/**
	* 编辑站点基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function edit(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$post	=	$this->input->post(NULL,TRUE);
			
			$siteid	=	$post['siteid'] ? $post['siteid'] : '';
			if ( !$siteid ) {
				redirect(site_aurl('seeting/site'));
				exit;
			}

			$info	=	array();
			$info['name']	=	$post['name'] ?	$post['name'] : '';
			$info['site_title']	=	$post['site_title'] ?	$post['site_title'] : '';
			$info['keywords']	=	$post['keywords'] ?	$post['keywords'] : '';
			$info['description']=	$post['description'] ?	$post['description'] : '';

			$update	=	$this->Site_model->update($info,$siteid);
			$result		=	array();
			$result['message']	=	$update ? '修改成功' : '';
			if ( $update ) {
				//	管理员后台操作日志记录
				manage_log( 'seeting','site','edit','/seeting/site/edit','修改站点基本信息',array('siteid'=>$siteid) );
				//	站点基本信息写入到文件缓存中
                //$this->load->library('cache_file');
                //$this->cache_file->set_rootpath(TRUE);
                //$info['siteid']	=	$siteid;
                //$this->cache_file->set('siteinfo',$info,'siteinfo');
			}
			$this->load->view('site/edit_action',$result);
		}else{
			$urlArr	=	get_segment_arr();
			$id		=	isset($urlArr['4']) ? intval($urlArr['4']) : '';
			$info	=	$this->Site_model->get(array('siteid'=>$id));
			$this->load->view('site/edit',$info);
		}
	}
}

/* End of file site.php */
/* Location: ./application/controllers/seeting/site.php */