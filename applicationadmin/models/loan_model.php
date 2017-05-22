<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 专家管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Loan_model extends CI_Model{
	public $CI;
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
  		$this->CI =& get_instance();

		$this->table_name	=	'loan';
	}
	
	/**
	* 获取一条数据信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getone($where){
		if (!$where) {
			Return false;
		}
		$this->CI->db->select('*');
		$this->CI->db->where($where);
		
		$query	=	$this->CI->db->get($this->table_name);
		//echo $this->CI->db->last_query();die;
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
	public function update($data,$where){
		if (!$data || !$where ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->CI->db->where($where);
		$this->CI->db->update($this->table_name, $data); 
		//echo  	$this->CI->db->last_query();die;
		$affected_rows	=	$this->CI->db->affected_rows();
		Return $affected_rows;
	}

	/**
	* 添加
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据
	* @return		返回ID值
	*/
	public function insert( $data = array() ){
		if ( !$data ) Return false;

		$insert_id	=	0;
		
		$this->CI->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->CI->db->insert_id();
		Return $insert_id;
	}

	public function insertimage( $data = array() ){
		
		//print_r($data);die;
		$this->CI->db->insert($this->table_name, $data); 
		
		
	}




	/**
	* 列表
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function lists($where = '',$page = '1',$pagesize = '10'){

		//echo 44;die;
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->CI->db->select('*');
		if ( $where ) {
			$this->CI->db->where($where);
		}
		$this->CI->db->order_by('id DESC');
		$query		=	$this->CI->db->limit($pagesize,$curpage)->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		$this->CI->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;

	}

	/**
	* 通过id获取数据
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getbyid($where = '',$select = '*'){
		if (!$where) {
			Return false;
		}
		$data		=	array();
		
		$this->CI->db->select($select);
		
		$this->CI->db->where_in('id',$where);
		
		$info	=	$this->CI->db->get($this->table_name)->result_array();

		Return $info;

	}
	/**
	* 删除数据
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function deletes($idArr = array() ){
		if ( !$idArr || !is_array($idArr) ) {
			Return false;
		}

		$affected_rows	=	0;
		
		$this->CI->db->where_in('id', $idArr);
		$this->CI->db->delete($this->table_name); 
		
		$affected_rows	=	$this->CI->db->affected_rows();
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

		//$keywords	=	$keywords ? xss_clean($keywords) : '';
		//echo $keywords;die;
		$this->CI->db->select('*');
		if ( $keywords ) {
			$this->CI->db->or_like(array('name'=>$keywords,'phone'=>$keywords));
		}


		$this->CI->db->order_by('id DESC');
		$query		=	$this->CI->db->limit($pagesize,$curpage)
			->get($this->table_name);
//echo $this->CI->db->last_query();die;
		$data['info']	= $query->result_array();

		//获得信息总量
		if ( $keywords ) {
			$this->CI->db->or_like(array('name'=>$keywords,'phone'=>$keywords));
		}
		$this->CI->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;
	}
	/**
	 * 导出时搜索
	 * @author	wangyangyang
	 * @copyright	wangyang8839@163.com
	 * @version	1.0
	 * @param
	 * @return
	 */
	public function excels_search( $where ,$keywords = '' ){




		//$keywords	=	$keywords ? xss_clean($keywords) : '';
		//echo $keywords;die;


		$this->CI->db->select('id');


		if($where){
			$this->CI->db->where($where);
		}


		if ( $keywords ) {
			$this->CI->db->or_like(array('name'=>$keywords,'phone'=>$keywords));
		}


		$this->CI->db->order_by('id DESC');
		$query		=	$this->CI->db
			->get($this->table_name);
//echo $this->CI->db->last_query();die;
		$data['info']	= $query->result_array();

		foreach($data['info']  as  $k=>$v){
			$data['uid'][]=$v['id'];


		}


		//获得信息总量

		if($where){
			$this->CI->db->where($where);
		}
		if ( $keywords ) {
			$this->CI->db->or_like(array('name'=>$keywords,'phone'=>$keywords));
		}
		$this->CI->db->from($this->table_name);
		$data['total']	= $this->CI->db->count_all_results();

		Return $data;
	}











	public function get_usernumber( $usernumber = '' ){
		if ( !$usernumber ) Return false;
		$userInfo	=	array();

		$userInfo	=	$this->CI->db->select('card_id,userid')->get_where($this->table_name,array('usernumber'=>$usernumber))->row_array();

		Return $userInfo;
	}

	/* 基本信息  */
	public function one($id = '')
	{
		if( $id == '' ){
			$one = $this->db->select( 'id,phone,name,idcard,money,use,address,addtime,status' )->order_by('id DESC')->get('loan')->result_array();
		}else{
			$one = $this->db->where_in('id',$id)->select('id,phone,name,idcard,money,use,address,addtime,status')->order_by('id DESC')->get('loan')->result_array();
		}

		return $one ? $one : '';
	}




}