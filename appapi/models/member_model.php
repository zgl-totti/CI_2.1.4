<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 用户管理
*
*/
class Member_model extends CI_Model {

	public $table_name;
    public function __construct()
    {
        parent::__construct();
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
	public function userinfo($where){
		if ( !$where ) {
			Return false;;
		}
		$this->db->select('*');
		
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();
		Return $memberinfo ? $memberinfo : '';
	}
    

    //获取用户信息
	public function user($where){
		if ( !$where ) {
			Return false;;
		}
		$this->db->select('*');
		
		$memberinfo	=	$this->db->get_where('member',$where)->result_array();
		Return $memberinfo ? $memberinfo : '';
	}
	//测试
	//获取用户信息
	public function users(){
		
		$this->db->select('*');
	
		$memberinfo	=	$this->db->get_where('member')->result_array();
		Return $memberinfo ? $memberinfo : '';
	}

	/**
	 * 列表页面
	 * @author	wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function lists( $where = '', $page = '1' , $pagesize = '10' ,$order = ''){
		if ( $where ) {
			$where	=	xss_clean($where);
			$this->db->where($where);
		}
	
		$page		=	max(1,$page);
		$curpage	=	( $page - 1 ) * $pagesize;
	
		if ( $order ) {
			$this->db->order_by($order);
		}else{
			$this->db->order_by('userid','DESC');
		}
	
	
		$this->db->limit($pagesize,$curpage);
	
		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();
		
		if ($where) {
			$this->db->where($where);
		}
		$this->db->limit(1);
		$total	=	$this->db->count_all_results( $this->table_name );
	
		$result['info']		=	$lists ? $lists : array();
		$result['total']	=	$total ? $total : '';
	
		Return $result ? $result : array();
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
		$where		=	array('username'=>$username);
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
		$where		=	array('phone'=>$phone);
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
	public function checkuserbyco($connectid = ''){
		if ( !$connectid ) {
			Return false;;
		}
		$connectid		=	intval($connectid);
		$where		=	array('connectid'=>$connectid);
		$memberinfo	=	$this->db->limit(1)->get_where('member',$where)->row_array();

		Return $memberinfo ? $memberinfo : '';
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
	* 更新模型信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function updates($data,$userid){
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
	* 评论用户信息获取
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function commuser($uarr){
		if ( !$uarr || !is_array($uarr) ) {
			Return false;;
		}
		$this->db->select('username,nickname,userid,avatar');
		
		$this->db->where_in('userid',$uarr);
		$memberinfo	=	$this->db->get('member')->result_array();
		Return $memberinfo ? $memberinfo : '';
	}
}