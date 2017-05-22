<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 专家管理
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Card_model extends CI_Model{
	private $db;
	public $table_name;
	public function __construct(){
  		parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'card';
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
		$this->db->select('*');
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
	public function update($data,$where){
		if (!$data || !$where ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->db->where($where);
		$this->db->update($this->table_name, $data); 
		
		$affected_rows	=	$this->db->affected_rows();
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
		
		$this->db->insert($this->table_name, $data); 
		
		$insert_id	=	$this->db->insert_id();
		Return $insert_id;
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
		$data		=	array();
		$curpage	=	($page - 1) * $pagesize ;

		$this->db->select('*');
		if ( $where ) {
			$this->db->where($where);
		}
		$this->db->order_by('id DESC');
		$query		=	$this->db->limit($pagesize,$curpage)->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();

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
		
		$this->db->select($select);
		
		$this->db->where_in('id',$where);
		
		$info	=	$this->db->get($this->table_name)->result_array();

		Return $info;

	}
	public function getshops($where = '',$select = '*'){
		if (!$where) {
			Return false;
		}
		$data		=	array();
		
		$this->db->select($select);
		
		$this->db->where_in('user_id',$where);
		
		$info	=	$this->db->get('emr_mycart')->result_array();

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
		
		$this->db->where_in('id', $idArr);
		$this->db->delete($this->table_name); 
		
		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}
	public function deletes2($idArr = array() ){
		if ( !$idArr || !is_array($idArr) ) {
			Return false;
		}

		$affected_rows	=	0;
		
		$this->db->where_in('id', $idArr);
		$this->db->delete('emr_mycart'); 
		
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

		$keywords	=	$keywords ? xss_clean($keywords) : '';

		$this->db->select('*');
		if ( $keywords ) {
			$this->db->or_like(array('title'=>$keywords,'hospital'=>$keywords));
		}
		$this->db->order_by('id DESC');
		$query		=	$this->db->limit($pagesize,$curpage)
			->get($this->table_name);

		$data['info']	= $query->result_array();

		//获得信息总量
		if ( $keywords ) {
			$this->db->or_like(array('title'=>$keywords,'hospital'=>$keywords));
		}
		$this->db->from($this->table_name);
		$data['total']	= $this->db->count_all_results();

		Return $data;
	}

	public function get_usernumber( $usernumber = '' ){
		if ( !$usernumber ) Return false;
		$userInfo	=	array();

		$userInfo	=	$this->db->select('card_id,userid')->get_where($this->table_name,array('usernumber'=>$usernumber))->row_array();

		Return $userInfo;
	}
}