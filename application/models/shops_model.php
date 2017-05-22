<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 患者管理
*
*/
class Shops_model extends CI_Model {
	public $CI;
	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();

		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'shops';
    }


	/**
	* 添加患者数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 数据
	* @return		false 或者保存 id
	*/
	public function add( $data = array() ){
		if ( !$data ) {
			Return false;
		}
//		$data	=	xss_clean($data);
		
		$this->db->insert($this->table_name,$data);
 
		$insert_id	=	$this->db->insert_id();
                
		Return $insert_id ? $insert_id : false;
	}

	public function lb($where){

         $this->db->select('*'); 
		// $this->CI->db->from('shops a');
		// $this->CI->db->join('commodity', 'commodity.id = a.id');
		// $query = $this->db->get();
		 //$sql = 'select a.* b.id from emr_commodity a left join emr_shops b on a.gid = b.id';
		// $query	= $this->db->query($sql)->result_array();
// print_r($query);die;
// 
 
    
//echo $where;die;
        $this->db->where($where);  
        $info	=	$this->db->get('emr_commodity')->result_array();
  
//echo $this->db->last_query();die;

 //print_r($info);die;
 return $info;

	}

public function getalls($pid){

//echo $pid;die;
// 

//	 		$this->db->select('*');
//
//	  		$this->db->where(parentid,$where);
$query = $this->db->get_where('emr_shops_group', array('parentid' => $pid));
//echo $this->db->last_query();die;
$result		=	$query->result_array();
// print_r($result);die;


        	// print_r($info);die;
        	return $result;
}


	 //获取一条
	 public function newsinfo($where){

		$this->db->where("id",$where);
        $info	=	$this->db->get_where($this->table_name)->result_array();
        Return $info ? $info : false;

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
			$this->db->where($where);
		}

		$page		=	max(1,$page);
		$curpage	=	( $page - 1 ) * $pagesize;

		if ( $order ) {
			$this->db->order_by($order);
		}else{
			$this->db->order_by('id','DESC');
		}
		

		$this->db->limit($pagesize,$curpage);
		
		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();
//echo 	$this->db->last_query();die;
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
	* 获取指定一条记录详情
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function get_one($where = ''){
		if ( !$where ) {
			Return false;
		}
		$where	=	xss_clean($where);
		$this->db->limit(1);
		$info	=	$this->db->get_where($this->table_name,$where)->row_array();

		Return $info ? $info : false;
	}

	/**
	* 更新数据
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function update($info,$where){
		if (!$info || !$where ) {
			Return false;
		}
//		$info	=	xss_clean($info);
		$where	=	xss_clean($where);

		$this->db->where($where);
		$this->db->update($this->table_name,$info);
		$rows	=	$this->db->affected_rows();

		Return $rows ? $rows : false;
	}

	/**
	* 分析数据
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getnumlists( $userid ){
		$userid	=	$userid ? intval($userid) : '';

		//	计算总数
		$sql	=	'select FROM_UNIXTIME(add_time,"%Y-%m-%d") AS times,count(id) as total from emr_patients where status = 99 GROUP BY FROM_UNIXTIME(add_time,"%Y-%m-%d")';
		
		$query	= $this->db->query($sql);
		$info	=	$query->result_array();

		$pinfo	=	array();
		if ( $userid ) {
			//	计算当前登录医生
			$sql	=	'select FROM_UNIXTIME(add_time,"%Y-%m-%d") AS times,count(id) as total from emr_patients WHERE userid = '.$userid.' AND status = 99 GROUP BY FROM_UNIXTIME(add_time,"%Y-%m-%d")';

			$query	=	$this->db->query($sql);
			$pinfo	=	$query->result_array();
		}
		
		$result	=	array();
		$result['info']	=	$info ? $info : array();
		$result['pinfo']=	$pinfo ? $pinfo : array();
		
		Return $result;
	}

	/**
	* 搜索
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function search( $where = '',$q= '', $page = '1' , $pagesize = '10' ){
		
		if ( $where ) {
			$where	=	xss_clean($where);
			$this->db->where($where);
		}
		if ( $q ) {
			$this->db->where('concat_ws(results,hnumber,ad,names) like "%'.$q.'%"');
		}
		

		$page		=	max(1,$page);
		$curpage	=	( $page - 1 ) * $pagesize;

		$this->db->order_by('id','DESC');
		
		$this->db->limit($pagesize,$curpage);
		
		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();

		if ($where) {
			$this->db->where($where);
		}
		if ( $q ) {
			$this->db->where('concat_ws(results,hnumber,ad,names) like "%'.$q.'%"');
		}
		
		$this->db->limit(1);
		$total	=	$this->db->count_all_results( $this->table_name );
		
		$result['info']		=	$lists ? $lists : array();
		$result['total']	=	$total ? $total : '';
		
		Return $result ? $result : array();
	}
}