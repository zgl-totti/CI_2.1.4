<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 用户管理
*
*/
class Yuyue_model extends CI_Model {

	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'member';
    }

	/**
	* 获取用户基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function userinfo($userid = ''){

		if ( !$userid ) {
			Return false;;
		}
		$userid		=	intval($userid);
		$where		=	array('userid'=>$userid);

		$this->db->select('*');
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	
	/**
	* 检测用户是否存在
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function checkuser($userid = ''){
		if ( !$userid ) {
			Return false;;
		}
		$userid		=	intval($userid);
		$where		=	array('userid'=>$userid);
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 检测用户是否存在
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function checkusername($username = ''){
		if ( !$username ) {
			Return false;;
		}
		$username	=	safe_replace($username);
		$where		=	"username ='".$username."' OR phone ='".$username."'";
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 检测用户邮箱是否存在
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function checkemail($email = ''){
		if ( !$email ) {
			Return false;;
		}
		$where		=	array('email'=>$email);
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 检测用户手机号是否存在
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function checkphone($phone = ''){
		if ( !$phone ) {
			Return false;;
		}
		//	用户名就是手机号，手机号就是用户名
		$where		=	"username ='".$phone."' OR phone ='".$phone."'";
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 检测用户是否存在
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function checkuserbyco($usernumber = ''){
		if ( !$usernumber ) {
			Return false;;
		}

		$where		=	array('usernumber'=>$usernumber);
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 获取用户密码信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function userpass($userid = ''){
		if ( !$userid ) {
			Return false;;
		}
		$userid		=	intval($userid);
		$where		=	array('userid'=>$userid);
		$this->db->select('userid,password,encrypt');
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	* 更新模型信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function updates($data,$openid){

		if (!$data || !$openid ) {
			Return false;
		}
		
		$affected_rows	=	0;
		$this->db->where('openid', $openid);
		$this->db->update($this->table_name, $data); 
		
		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}

	public function updatesid($data,$userid){

		if (!$data || !$userid ) {
			Return false;
		}
		
		$affected_rows	=	0;
		$this->db->where('userid', $userid);
		$this->db->update($this->table_name, $data); 
		
		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 用户列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$page 当前页 $pagesize 每页显示条数
	* @return		
	*/
	public function lists($where = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->db->select('*');
		if ( $where ) {
			$this->db->where($where);
		}
		$this->db->order_by('userid DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();

		Return $data;

	}

	/**
	* 添加
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据
	* @return		返回ID值
	*/
	public function add( $data = array() ){
		if ( !$data ) Return false;

		$insert_id	=	0;
		
		$this->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->db->insert_id();
		Return $insert_id;
	}
	
////////////////////////////////////////////////////
public function addrowid( $data = array() ){
		if ( !$data ) Return false;

//		$insert_id	=	0;
		
		$a = $this->db->insert($this->table_name, $data); 
		
//		$insert_id	=	$this->db->insert_id();
//		Return $insert_id;
	}
////////////////////////////////////////////////////
	public function getone(){
		$data		=	array();

		$this->db->select('*');

		$this->db->order_by('userid DESC');
		$query		=	$this->db->limit(1)->get($this->table_name);

		$info	= $query->result_array();
		$data['info'] = $info['0'];
		Return $data;

	}

	/**
	* 获取用户基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function useropenid($openid = ''){
		if ( !$openid ) {
			Return false;;
		}

		$where		=	array('openid'=>$openid);
		$this->db->select('*');
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
	}

	/**
	 * 搜索
	 * @author	wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function search($keywords = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;
	
		$keywords	=	$keywords ? $keywords : '';
	
		$this->db->select('card_id,userid,username,email,add_time,nickname,phone,last_login_time,last_login_ip,group,activation,plate,usernumber,realname');
		if ( $keywords ) {
			$this->db->or_like(array('username'=>$keywords,'nickname'=>$keywords,'phone'=>$keywords,'plate'=>$keywords,'realname'=>$keywords));
		}
		$this->db->order_by('userid DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);
		
		$data['info']	= $query->result_array();
	
		//获得信息总量
		if ( $keywords ) {
			$this->db->or_like(array('username'=>$keywords,'nickname'=>$keywords,'phone'=>$keywords,'plate'=>$keywords,'realname'=>$keywords));
		}
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();
	
		Return $data;
	}
}