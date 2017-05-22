<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 用户模型管理，修改信息等相关model操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Wechat_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		//$this->CI =& get_instance();

		$this->table_name	=	'wechat';
	}
	
	/**
	* 用户列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$page 当前页 $pagesize 每页显示条数
	* @return		
	*/
	public function lists($where = '',$page = '1',$pagesize = '10' ,$order = ''){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->db->select('*');
		if ( $where ) {
			$this->db->where($where);
		};
		if ( $order ) {
			$this->db->order_by($order);
		}else{
			$this->db->order_by('id DESC');
		}
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);
//echo  $this->db->last_query();die;
		$data['info']	= $query->result_array();

		//获得信息总量
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();

		Return $data;

	}
	/**
	* 获取用户
	* @author		laifei
	* @copyright	
	* @version		
	* @param		$where 
	* @return		$data
	*/

	public function listsArr($where = array()){
		$data		=	array();
		
		$this->db->select('phone');
		if ( $where ) {
			$this->db->where($where);
		}
		
		$query		=	$this->db->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		$this->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;
	}



	/**
	* 
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get( $where = array() ){
		if ( !$where || !is_array($where) ) Return false;
		
		$this->db->select('*');
		$this->db->where($where);
		
		$query	=	$this->db->get($this->table_name);
		$info	=	$query->row_array();
	
		Return $info;
		
	}
	public function getidArr($idArr = array()){
		if ( !$idArr || !is_array($idArr) ) {
			Return false;
		}

		$this->db->select('*');

		$this->db->where_in('userid', $idArr);
		$query	=	$this->db->get($this->table_name);

		$data['info']	= $query->result_array();

		Return $data;
	}


	public function getnickname( $where = array() ){
		if ( !$where || !is_array($where) ) Return false;
		
		$this->db->select('nickname');
		$this->db->where($where);
		
		$query	=	$this->db->get($this->table_name);
		$info	=	$query->row_array();
	
		Return $info;
		
	}

	/**
	* 更新模型信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function updates($data,$id){
		if (!$data || !$id ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->db->where('id', $id);
		$this->db->update($this->table_name, $data); 

		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}



	/**
	* 根据 username 获取管理员信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_info_by_username( $username = '' ){
		if ( !$username ) Return false;
		$userInfo	=	array();

		$where		=	"username ='".$username."' OR phone ='".$username."'";
		$userInfo	=	$this->db->select('card_id,userid,username,avatar,nickname,email,phone,add_time,activation,plate,usernumber,realname')->get_where($this->table_name,$where)->row_array();

		Return $userInfo;
	}

	/**
	* 根据 email 获取管理员信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_info_by_email( $email = '' ){
		if ( !$email ) Return false;
		$userInfo	=	array();

		$userInfo	=	$this->db->select('card_id,userid,username,avatar,nickname,email,phone,add_time,activation,plate,usernumber,realname')->get_where($this->table_name,array('email'=>$email))->row_array();

		Return $userInfo;
	}

	
	/**
	* 根据 email 获取管理员信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_info_by_phone( $phone = '' ){
		if ( !$phone ) Return false;
		$userInfo	=	array();

		$where		=	"username ='".$phone."' OR phone ='".$phone."'";
		$userInfo	=	$this->db->select('card_id,userid,username,avatar,nickname,phone,phone,add_time,activation,plate,usernumber,realname')->get_where($this->table_name,$where)->row_array();

		Return $userInfo;
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

	/**
	* 删除数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes($idArr = array() ,$hosid = ''){
		if ( !$idArr || !is_array($idArr) ) {
			Return false;
		}

		$affected_rows	=	0;
		if ( $hosid ) {
			$this->db->where('hospitalid', $hosid);
		}
		$this->db->where_in('id', $idArr);
		$this->db->delete($this->table_name); 
		//echo $this->db->last_query();die;
		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
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
	
		$this->db->select('*');
		if ( $keywords ) {
			$this->db->or_like(array('nickname'=>$keywords,'city'=>$keywords,'id'=>$keywords));
		}
		$this->db->order_by('id DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);
		//echo 	$this->db->last_query();die;
		$data['info']	= $query->result_array();
	
		//获得信息总量
		if ( $keywords ) {
			$this->db->or_like(array('nickname'=>$keywords,'city'=>$keywords,'id'=>$keywords));}
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();
	
		Return $data;
	}


	/**
	 * 搜索
	 * @author	wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function submitsearch($where = '',$page = '1',$pagesize = '10' ,$order = ''){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->db->select('card_id,userid,username,email,add_time,nickname,phone,last_login_time,last_login_ip,group,activation,plate,usernumber,realname');
		if ( $where ) {
			$this->db->where($where);
		}
		if ( $order ) {
			$this->db->order_by($order);
		}else{
			$this->db->order_by('userid DESC');
		}
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);
		$data['info']	= $query->result_array();
		if ( $where ) {
			$this->db->where($where);
		}
		//获得信息总量
		$this->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;
	}
	
	
	/**
	 * 用户组搜索
	 * @author	laifei
	 * @copyright	
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function search_group($keywords = '',$page = '1',$pagesize = '10'){
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;
	
		$keywords	=	$keywords ? $keywords : '';
		
		$this->db->select('card_id,userid,username,email,add_time,nickname,phone,last_login_time,last_login_ip,group,activation,plate,usernumber,realname');
		if ( $keywords ) {
			$this->db->or_like(array('group'=>$keywords));
		}
		$this->db->order_by('userid DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);
	
		$data['info']	= $query->result_array();
	
		//获得信息总量
		if ( $keywords ) {
			$this->db->or_like(array('group'=>$keywords));
		}
		$this->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();
	
		Return $data;
	}
}