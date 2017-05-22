<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class About_model extends CI_Model {

	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'about';
    }

	//新闻前台显示
//  public function lists(){
//
//
//      $this->db->limit(4);
//      $info	=	$this->db->get_where($this->table_name)->result_array();
//
//      Return $info ? $info : false;
//
//  }
	//显示新闻列表

//  public function newslist($where = '',$page = '1',$pagesize = '10')
//  {
//      $data = array();
//      $curpage = 0;
//      $curpage = ($page - 1) * $pagesize;
//
//      $this->db->select('*');
//      if ($where) {
//          $this->CI->db->where($where);
//      }
//      $this->db->order_by('id ASC');
//      $query = $this->db->limit($pagesize, $curpage)->get($this->table_name);
//      $data['info'] = $query->result_array();
//
//
//      //获得信息总量
//      $this->db->from($this->table_name);
//      $data['total'] = $this->db->count_all_results();
//      Return $data;
//  }
	//获取一条
//	 public function newsinfo($where){
//
//		$this->db->where("id",$where);
//      $info	=	$this->db->get_where($this->table_name)->result_array();
//      Return $info ? $info : false;
//
//  }

	function getone(){

		$id = '4';
		$info	=	$this->db->get_where($this->table_name,array('id'=>$id))->result_array();
		Return $info ? $info : false;
	}


	function getone11(){

		$id = '5';
		$info	=	$this->db->get_where($this->table_name,array('id'=>$id))->result_array();
		Return $info ? $info : false;
	}




function getone1(){

		$id = '3';
		$info	=	$this->db->get_where($this->table_name,array('id'=>$id))->result_array();
		Return $info ? $info : false;
	}
	function getone2(){

		$id = '2';
		$info	=	$this->db->get_where($this->table_name,array('id'=>$id))->result_array();
		Return $info ? $info : false;
	}
	function getone3(){

		$id = '1';
		$info	=	$this->db->get_where($this->table_name,array('id'=>$id))->result_array();
		Return $info ? $info : false;
	}
//	function get_all(){
//      
//   
//                  $this->db->select('*');
//                  $this->db->order_by('id DESC');
//      $info   =   $this->db->limit(4)->get('content')->result_array();
//
////echo  $this->db->last_query();
// // print_r($info);die;
//      Return $info ? $info : false;
//  }



public function get_all($table)
 
    {
        $this->load->database();
		$this->load->database();
        $this->db->select('*');
 
        $query = $this->db->get($table);
 
        $query = $query->result_array();
 
        return $query;
 
    }



}