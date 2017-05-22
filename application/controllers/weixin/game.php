<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 介绍
* @author		wangteng
* @copyright	wangtengwtq163.com
* @version	1.0
* @param
* @return
*/
class Game extends CI_Controller {
	//	用户id
	public $userid;
	//游戏id
	public $playid;
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
		$this->load->model('Prize_model');
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
		templates('weixin/game','index');
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
		//	分页
		if ( !$total ) {
			   $result['status']=0;
				exit(json_encode($result));
		}else{
			$result['status']=1;
			$result['info']=$data['info'];
			exit(json_encode($result));
		}
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
			$info['gamename']=isset($_POST['gamename']) && $data['gamename'] ? $data['gamename'] :'';
			//游戏截止时间
			$info['end_time']=isset($_POST['end_time']) && $data['end_time'] ? $data['end_time'] :'';
			$rst=$this->Game_model->add($info);
			$result=array();
			if($rst){
				$result['status']=1;
				exit(json_encode($result));
			}else{
				$result['status']=0;
				exit(json_encode($result));
			}
		}
        templates('weixin/game','add_game');
	}
	/**
	 * 添加游戏奖品
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function add_prize(){
		if ( isset($_POST['submit']) && $_POST['submit'] ) {
			$data	=	$this->input->post(NULL,TRUE);
			$info=array();
			//奖品名称
			$info['name']=isset($_POST['name']) && $data['name'] ? $data['name'] :'';
			//奖品价值
			$info['price']=isset($_POST['price']) && $data['price'] ? $data['price'] :'';
			//奖品数量
			$info['num']=isset($_POST['num']) && $data['num'] ? $data['num'] :'';
		    //游戏id
			$info['gid']=isset($_POST['gid']) && $data['gid'] ? $data['gid'] :'';
			$rst=$this->Prize_model->add($info);
			$result=array();
			if($rst){
				$result['status']=1;
				$result['insert_id']=$rst;
				exit(json_encode($result));
			}else{
				$result['status']=0;
				exit(json_encode($result));
			}
		}
		$data=$this->Game_model->lists();
		templates('weixin/game','add_prize',$data);
	}
	/**
	 * 游戏奖品列表页
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function prize_lists(){
		$result=array();
		$prize=$this->Prize_model->lists();
		if(!$prize){
			$result['status']=-1;
			exit(json_encode($result));
		}else{
			$result['status']=1;
			$result['prize']=$prize['info'];
			exit(json_encode($result));
		}
	}
	
	/**
	 * 游戏奖品删除页
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function del_prize($id=''){
		$result=array();
	       if(!isset($id)){
				$result['status']=0;
				exit(json_encode($result));
			}
        $res  =  $this->db->delete('prize',array('id' => $id));
        if($res){
        	$result['status']=1;
        	exit(json_encode($result));
        }else{
        	$result['status']=-1;
        	exit(json_encode($result));
        }
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
		$result=array();
		if(!isset($id)){
			$result['status']=0;
			exit(json_encode($result));
		}
		$cookies = array(
					'name'   => 'playid',
					'value'  => aesencode($id),
					'expire' => '1209600'
				);
		$this->input->set_cookie($cookies); 
		$this->playid=$id;	
		//	获取当前游戏id的详情
		$where	=	array();
		$where['id']	=	$id;
		$info	=	$this->Game_model->get_one($where);
		//获取当前游戏奖品的信息
		$where=array();
		$where['gid']=$this->playid;
		$prize=$this->Prize_model->lists($where);
		$result=array();
		//	如果为查找到数据，则直接跳转到home页
		if ( !$info ) {
			$result['status']=-1;
			exit(json_encode($result));
		}
		$result['status']=1;
		$data			=	array();
		$data['info']	=	$info;
		$data['info']['prize']=$prize;
		$this->load->vars($data);
		templates('weixin/game','show');

	}
	
	/**
	 *进行游戏
	 * @author		wangteng
	 * @copyright	wangtengwtq@163.com
	 * @version		1.0
	 * @param
	 * @return
	 */
	public function play(){
		if ( isset($_POST['val']) && $_POST['val'] ) {
		$this->db->select('game_id');
		$ids=$this->db->get_where('game');
		$playid	=	$this->input->cookie('playid',true);
	    $playid = aesDecode($playid);
            if($data['id']){
                //	条件
                $where=array();
                $where['userid']=$this->userid;
                //	获取数据
                $data	=	$this->Record_model->get_one($where);
                $where=array();
                $where['id']=$playid;
                $info = $this->Game_model->get_one($where);
                $info['prize']=unserialize($info['prize']);
                $info['prize']['name']==$data['prize']['name'];
                $info['prize']['name']==33;
                //var_dump($info);die;
                $info['prize']['num']--;
                $info['update_time']=time();
                $where=array();
                $where['id']=$playid;
                $rst=$this->Game_model->updates($data,$where);
                $result=array();
                $result['status']=0;
                if ( $rst ) {
                    $data['update_time']=time();
                    $where=array();
                    $where['id']=$this->userid;
                    $data['prizeinfo']=serialize($info);
                    $rst=$this->Record_model->updates($data,$where);
                    if ( $rst ) {
                        $result['status']=1;
                    }else{
                        exit($result['status']);
                    }
                }else{
                    exit($result['status']);
                }
            }else{
                //	条件
                $where=array();
                $where['id']=$this->userid;
                //	获取数据
                $data	=	$this->Weixininfo_model->get_one($where);
                $this->load->vars($data);
                templates('weixin/game','paly');
            }
		}
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
		//条件
		$where	=	array();
		$userid=$this->userid;
		$where['id']=$userid;
		$where['status']=1;
		//获取数据
		$data=$this->Record_model->lists($where);
	}
}