<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 加密数据
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Aescode extends CI_Controller {
	
	//	权限验证
	public $before_filter	=	'checkuser';

	//	用户id
	public $userid;
	//	患者id
	public $pid;

	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();

		$userid	=	$this->input->cookie('user',true);
		$this->userid	=	$userid ? aesDecode($userid) : '';
		//	患者基本信息model
		$this->load->model('Treatment_other_model');
	}

	/**
	* 分析库
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$pid 患者表(patients)id   
	* @return		
	*/
	public function index( ){
		$data	=	$this->Treatment_other_model->lists('',1,2000);
        //$this->load->library('cache_file');
		$info	=	$data['info'];
		$result	=	array();
		foreach($info AS $key => $val){
			$update	=	array();
			$update['pname']	=	aesencode($val['pname']);
            //$update['name']		=	aesencode($val['name']);
            //$update['idcard']	=	aesencode($val['idcard']);
            //$update['phone1']	=	aesencode($val['phone1']);
            //$update['phone2']	=	aesencode($val['phone2']);
            //$update['phone3']	=	aesencode($val['phone3']);
            //$update['report_address']	=	aesencode($val['report_address']);

			$this->Treatment_other_model->update($update,array('id'=>$val['id']));
            //$result[$val['id']]	=	$val['record'].' '.$val['name'].' '.$val['idcard'].' '.$val['contacts'].' '.$val['phone1'].' '.$val['phone2'].' '.$val['phone3'].' '.$val['report_address'];
			usleep(100000);
		}
        //$this->cache_file->set('patients',$result,'patients');
	}
}