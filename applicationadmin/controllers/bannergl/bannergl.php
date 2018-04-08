<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bannergl extends CI_Controller {
    public function __construct(){
		parent::__construct();

		$this->load->model('Signup_model');
		$this->load->library('pagination');
	}


    public function bannerguanli(){
		$data['info']	=	$this->Signup_model->bannerlist();
		//print_r($data['aa']);die;
		templates('banner','index',$data);
	}

    public function tianjia(){
        if ( isset($_POST['submit']) && $_POST['submit'] ) {
            $post	=	$this->input->post(NULL,TRUE);

            $info	=	array();
            $info['title'] = $post['title'];

            if (isset($_FILES['thumb']) && $_FILES['thumb']['name']) {
                //	详情图片修改处理
                $this->load->library('attachmentclass');
                $this->attachmentclass->upload_dir	=	'shops';
                $thumb	=	$this->attachmentclass->upload('thumb');
                $info['thumb']	=	$thumb ? $thumb['filepath'] : '';
            }
            $insertid	=	$this->Signup_model->addbanner($info);

            redirect(site_aurl('bannergl/bannergl/bannerguanli'));
        }else{
            templates('banner','add',$data);
        }
    }

	/*public function add(){
        templates('banner','add');
	}*/

	public function delete($id){
		$insertid	=	$this->Signup_model->deletebanner($id);

		redirect(site_url('bannergl/bannergl/bannerguanli'));

		//$data['aa']	=	$this->commodity_model->lists();
		//templates('wxmain','index',$data);
	}
}