<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 文章管理
* @author	 wangteng
* @copyright	 wangtengwtq@163.com
* @version	1.0
* @param
*/
class Article extends CI_Controller {
	public $before_filter	=	'admin';
	public $_userid;

	/**
	* 
	* @author		wangteng
	* @copyright	wangtengwtq@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();
		$this->load->model('About_model');
		$this->_userid	=	$this->session->userdata('userid');
	}
	/**
	 * 文章列表
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function index(){
        $info=$this->About_model->lists();
        $data = array();
        $data['info'] = $info;
        templates('article','index',$data['info']);
        exit;
    }

    /**
     * 修改文章
     * @author		wangteng
     * @copyright	wangtengwtq@163.com
     * @version		1.0
     * @param
     * @return
     */
    public function edit($id){
        if ( isset($_POST['submit']) && $_POST['submit'] ) {
            $post	=	$this->input->post(NULL,true);
            $id		=	$post['id'] ? intval($post['id']) : '';
            if (!$id) {
                redirect(site_url('about/article/index'));
                exit;
            }
            $info	=	array();
            $info['auth']	=	$post['auth'];
            $contents	=	$this->input->post('contents');
            $contents	=	$contents ? htmlspecialchars($contents) : '';
            $info['contents']	=	$contents;
            $info['dates']	=	date('Y-m-d');
            $update	=	$this->About_model->update($info,array('id'=>$id));
            if ( $update ) {
                //	记录后台操作日志
                manage_log('about','article','index','/about/article/index','修改文章',array('id'=>$id));
            }
            redirect(site_aurl('about/article/index/'));
            exit;
        }else{
            $id = $id ? intval($id) : '' ;
            $info	=	$this->About_model->getone(array('id'=>$id));
            $data = array();
            $data['info'] = $info;
            templates('article','edit',$data);
            exit;
        }
    }
}