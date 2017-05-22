<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 介绍
* @author		wangteng
* @copyright	wangtengwtq163.com
* @version	1.0
* @param
* @return
*/
class Record extends CI_Controller {
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
		$this->userid=1;
		$unionid='1';
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
	 *
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function index(){
		templates('weixin/record','index');
    }
	/**
	 * 
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function play(){
		//if ( isset($_POST['val']) && $_POST['val'] ) {
		//	条件
		$where=array();
		$where['userid']=$this->userid;
		//	获取数据
		$data	=	$this->Record_model->get_one($where);
		$data['update_time']=time();
		$where=array();
		$where['id']=$this->userid;
		$rst=$this->Record_model->updates($data,$where);
		if ( $rst ) {
			echo '1';
			exit;
		}else{
			echo '0';
			exit;
		}
        //else{
			//条件
			$where=array();
			$where['id']=$this->userid;
			//获取数据
			$data	=	$this->Weixininfo_model->get_one($where);
			$this->load->vars($data);
			templates('weixin/weixininfo','signin');
        //}
	}
	
	/**
	* 游戏列表页
	* @author		wangteng
	* @copyright	wangtengwtq@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function lists(){
		//	条件
		$where	=	array();
		//	获取数据
		$data	=	$this->Game_model->lists($where,'update_time DESC');
		$total	=	isset($data['total']) && $data['total'] ? $data['total'] : '';
		$result=array();
		$result['status']=0;
		//	分页
		if ( !$total ) {
			templates('weixin/game','index',$result);
			exit;
		}		
		foreach ($data['info'] as $k=>$v){
			$data['info'][$k]=unserialize($v['prize']);
		}
		$this->load->vars($data);
		templates('weixin/game','lists',$data);
	}
	/**
	 * 添加游戏
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function add_game(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$data	=	$this->input->post(NULL,TRUE);
			$info=array();
			//	基本信息
			$info['add_time']	=	time();
			//游戏名
			$info['gamename']=isset($_POST['game']) && $data['game'] ? $data['game'] :'';
			//游戏奖品信息
			$info['prize']=serialize(isset($_POST['prize']) && $data['prize'] ? $data['prize'] :'');
			//游戏截止时间
			$info['end_time']=isset($_POST['end_time']) && $data['end_time'] ? $data['end_time'] :'';
			$rst=$this->Game_model->add($info);
			if($rst){
				echo 1;exit;
			}else{
				echo 0;exit;
			}
		}
        templates('weixin/game','add_game');
	}
	/**
	 * 中奖记录
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function prize(){
		//	条件
		$where	=	array();
		//	获取数据
		$data	=	$this->Game_model->lists($where);
	}

	/**
	* 游戏详情页
	* @author		wangteng
	* @copyright	wangtengwtq@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function show($id = ''){
        if ( !$id ) {
            redirect(site_url('weixin/game/lists'));
            exit;
        }
        //	获取当前游戏id的详情
        $where	=	array();
        $where['id']	=	$id;
        $info	=	$this->Game_model->get_one($where);
        $result=array();
        $result['status']=2;
        //	如果为查找到数据，则直接跳转到home页
        if ( !$info ) {
            templates('weixin/game','show',$result);
            exit;
        }
        $info['prize']=unserialize($info['prize']);
        $data			=	array();
        $data['info']	=	$info;
        $this->load->vars($data);
        templates('weixin/game','show');
	}
}