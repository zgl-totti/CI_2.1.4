<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* 后台系统管理，修改信息等相关model操作
* @author		wangyangyang
* @copyright	wangyang8839@163.com
* @version		1.0
* @param
*/
class Guide_model extends CI_Model{
	public $table_name	=	'';
	public function __construct(){
  		parent::__construct();
		$this->table_name	=	$this->db->dbprefix.'guide';
	}
	
	/**
	* 菜单列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function lists( $where = array() ){
		$data		=	array();
		
		//	列表信息
		$this->db->select('id,name,parentid,listorder,display,content');
		if ( $where ) {
			$this->db->where($where);
		}
		
		$this->db->order_by('listorder ASC,id DESC');
		$query		=	$this->db->get($this->table_name);

		$result		=	$query->result_array();
		
		//	记录条数
		$this->db->select('count(1) AS num');
		$this->db->where($where);
		$query		=	$this->db->limit(1)->get($this->table_name);
		$totalnum	=	$query->row_array();



		$data['info']	=	$result;
		$data['total']	=	$totalnum ? $totalnum['num'] : 0;
		Return $data;

	}

	/**
	* 获取一条记录信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 字段ID
	* @return		
	*/
	public function get($id){
		
		if ( !$id ) Return false;
		
		$result		=	array();
		$this->db->select('id,name,parentid,listorder,display,content');
		$this->db->where(array('id'=>$id));
		$this->db->order_by('listorder ASC,id DESC');
		$this->db->limit(1);
		$query		=	$this->db->get($this->table_name);
		
		$result		=	$query->row_array();
		
		Return $result;
	}
	/**
	* 根据pid获取记录信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 字段ID
	* @return		
	*/
	public function getsub($pid){
		$result		=	array();
		$this->db->select('id,name,parentid,listorder,display,content');
		$this->db->where(array('parentid'=>$pid));
		$this->db->order_by('listorder ASC,id DESC');
		$query		=	$this->db->get($this->table_name);
		$result		=	$query->row_array();
		$data['info']	=	$result;
		Return $data;
	}

	/**
	* 根据pid记录数
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 字段ID
	* @return		
	*/
	public function checkpid($pid){
		$result		=	array();
		$this->db->where(array('parentid'=>$pid));
		$num	=	$this->db->count_all_results($this->table_name);
		Return $num;
	}
	/**
	* 排序操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data	排序操作
	* @return		返回mysql操作影响行数
	*/
	public function listorder( $data ){
		if ( !$data ) {
			Return false;
		}
		$affected_rows	=	0;

		$sql	=	'';
		$ids	=	implode(',',array_keys($data));
		$sql	=	'UPDATE '.$this->table_name .' SET listorder = CASE id ';
		foreach($data AS $key => $val){
			$sql	.=	' WHEN '.$key .' THEN '.intval($val);
		}
		$sql	.=	' END WHERE id in('.$ids.') ';
		
		
		$this->db->query($sql);

		$affected_rows	=	$this->db->affected_rows();

		Return $affected_rows;
	}

	/**
	* 添加菜单操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 添加数据	
	* @return		返回插入数据的ID
	*/
	public function add( $data ){
		if ( !$data ) Return false;

		$insertid	=	0;
		$this->db->insert($this->table_name, $data); 
		$insertid	=	$this->db->insert_id();
		Return $insertid;
	}

	/**
	* 更新操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$data 更新数据 $id 字段标识
	* @return			
	*/
	public function update($data,$id){
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
	* 删除操作
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$id 字段标识	
	* @return		返回mysql 操作影响行数
	*/
	public function deletes($id){
		if ( !$id ) {
			Return false;
		}
	
		$affected_rows	=	0;
		$this->db->where('id', $id);
		$this->db->delete($this->table_name); 

		$affected_rows	=	$this->db->affected_rows();
		Return $affected_rows;
	}

}