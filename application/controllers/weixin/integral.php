<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 积分接口
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Integral extends CI_Controller {
    private $uid;

    /**
     *
     * @author
     * @copyright
     * @version	1.0
     * @param
     */
    public function __construct(){
        parent::__construct();

        $result =   array();
        $this->load->model('Wechat_model');
    }

    /**
     * 用户详情
     * @author	wangteng
     * @copyright	wangtengwtq@163.com
     * @version	1.0
     * @param
     * @return
     */
    public function show(){
        $result =   array();
        $result['status']   =   -2;
        $id	=	$this->input->post('id',true);
        $id	=	$id ? intval($id) : '';
        if ( !$id ) {
            exit(json_encode($result));
        }
        //	查询用户详情
        $where	=	array();
        $where['id']	=	$id;
        //$where['id']=	$this->uid;
        $data	=	$this->Wechat_model->get_one($where);
        $result =   array();
        $result['status']   =   -1;
        if ( !$data ) {
            exit(json_encode($result));
        }
        $data['status']	=	1;
        exit(json_encode($data));
    }

    public function action(){
        $result =   array();
        $result['status']   =   -2;
        $id	=	$this->input->post('id',true);
        $integral=$this->input->post('integral',true);
        $id	=	$id ? intval($id) : '';
        if ( !$id || !$integral) {
            exit(json_encode($result));
        }
        //	查询用户详情
        $where	=	array();
        $where['id']	=	$id;
        //$where['id']=	$this->uid;
        $data	=	$this->Wechat_model->get_one($where);
        $result =   array();
        $result['status']   =   -1;
        if ( !$data ) {
            exit(json_encode($result));
        }
        $data['integral']=$data['integral']+$integral;
        $where	=	array();
        $where['id']	=	$id;
        $data = $this->Wechat_model->update($data,$where);
        $result =   array();
        $result['status']   =   -3;
        if ( !$data ) {
            exit(json_encode($result));
        }
        $result['status']   =   1;
        if ( $data ) {
            exit(json_encode($result));
        }
    }
}

