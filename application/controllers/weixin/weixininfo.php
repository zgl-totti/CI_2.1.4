<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 介绍
* @author		wangteng
* @copyright	wangtengwtq163.com
* @version	1.0
* @param
* @return
*/
class Weixininfo extends CI_Controller {
	//	用户id
	public $userid;
	/**
	* 
	* @author		wangteng
	* @copyright	wangtengwtq@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();
		$userid	=	$this->input->cookie('user',true);
        //$this->userid	=	$userid ? aesDecode($userid) : '1';
		$this->load->model('Weixininfo_model');
		$this->load->model('Game_model');
		$this->load->model('Record_model');
		$this->userid=3;
		$unionid='3';
		$this->db->select('unionid');
		$unionids=$this->db->get_where('weixininfo')->row_array();
		if(!$unionid && !in_array($unionid,$unionids)){
			//exit(json_encode($result));
			echo '请登录';
		}else{
            //redirect(site_url('weixin/weixininfo/signin'));
		}
	}
	
	/**
	 * 签到
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public  function signin(){
		if ( isset($_POST['vals']) && $_POST['vals'] ) {
            //	条件
            $where=array();
            $where['id']=$this->userid;
            //	获取数据
             $data	=	$this->Weixininfo_model->get_one($where);
            if(!isset($data['update_time'])||$data['update_time']==0){
                //没有签过到的用户
                $data['update_time']=time();
                $data['integral']+=1;
                $data['continuous']=1;
                $data['add_time']=time();
            }elseif(!time()-$data['update_time']<=86400*2 && isset($data['update_time'])){
                //签过到 但是 距上次签到时间超过两天的用户
                $data['integral']+=1;
                $data['continuous']=0;
            }elseif(time()-$data['update_time']<=86400*2 && $data['continuous']<7){
                //签过到 且连续签到天数小于七天的用户
                $data['integral']=$data['integral']+$data['continuous'];
                $data['continuous']++;
            }elseif(time()-$data['update_time']<=86400*2 && $data['continuous']>=7){
                //签过到 且连续签到天数大于等于七天的用户
                $data['integral']+=7;
                $data['continuous']++;
            }
            $data['update_time']=time();
            $where=array();
            $where['id']=$this->userid;
            $rst=$this->Weixininfo_model->updates($data,$where);
            if ( $rst ) {
                echo 1;
                exit;
            }else{
                echo 0;
                exit;
            }
		}else{
			//	条件
			$where=array();
			$where['id']=$this->userid;
			//	获取数据
			$data	=	$this->Weixininfo_model->get_one($where);
			$this->load->vars($data);
			templates('weixin/weixininfo','signin');
		}
	}
}