<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 游戏接口
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Prize extends CI_Controller {
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
        $this->load->model('Prize_model');
        $this->load->model('Recordinfo_model');
    }

    /**
     * 游戏进行时
     * @author	wangteng
     * @copyright	wangtengwtq@163.com
     * @version	1.0
     * @param
     * @return
     */
    public function playing($userid='',$phone=''){
        $result =   array();
        $result['status']   =   -2;
        $userid	=	$userid ? intval($userid) : '';
        $phone	=	$phone ? intval($phone) : '';
        if ( !$userid && !$phone) {
            exit(json_encode($result));
        }
        //	查询用户详情
        $where	=	array();
        $where['openid']	=	$userid;
        $data	=	$this->Wechat_model->get_one($where);
        $result =   array();
        $result['status']   =   -1;
        if ( !$data ) {
            exit(json_encode($result));
        }
        $gid = rand(0,3);
        if($gid !=0){
            $where = array();
            $where['id'] =$gid;
            $prize = $this->Prize_model->get_one($where);
        }elseif($gid == 0){
            $data['status'] = 1;
            $data['rank'] = '谢谢参与';
            exit(json_encode($data));
        }

        if(!$prize){
            $data['status']	=	-3;
            exit(json_encode($data));
        }
        $data['id'] = $prize['id'];
        if($prize['rank'] == 1 ){
            $data['rank'] = '一等奖';
        }elseif($prize['rank'] ==2){
            $data['rank'] = '二等级';
        }elseif($prize['rank'] ==3){
            $data['rank'] =  '三等奖';
        }
        $data['prize'] = $prize['name'];
        $info['prizeinfo'] = serialize($prize) ;
        $info['phone'] = $phone;
        $info['add_time'] =  time();
        $insert_id = $this->Recordinfo_model->add($info);
        if(!$insert_id){
            $data['status']	=	-4;
            exit(json_encode($data));
        }
        $data['status']	=	1;
        exit(json_encode($data));
    }
    /**
     * 领奖
     * @author	wangteng
     * @copyright	wangtengwtq@163.com
     * @version	1.0
     * @param
     * @return
     */
    public function accept(){
        if ( isset($_POST['submit']) && $_POST['submit'] ) {
            $data	=	$this->input->post(NULL,TRUE);
            $result = array();
            $result['status'] = -2;
            $phone	=	$data['phone'] ? intval($data['phone']) : '';
            $phone = '1352251985';
            if(!$phone){
                exit(json_encode($result));
            }
            $where = array();
            $where['phone'] = $phone;
            $where['status'] = 0;
            $info = $this->Recordinfo_model->get_one($where);
            $result['status'] = -1;
            if(!$info){
                exit(json_encode($result));
            }
            $data = $info;
            $data['update_time'] = time();
            $where = array();
            $where['id'] = $data['id'];
            $row = $this->Recordinfo_model->updates($where,$data);
            $result['status'] = 1;
            exit(json_encode($result));
        }else{
            templates('weixin/ggl','accept');
        }
    }
}

