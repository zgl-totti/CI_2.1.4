<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 患者管理
*
*/
class Shops_service_model extends CI_Model {

	private $db;
	public $table_name;
    public function __construct()
    {
        parent::__construct();
		$this->db 	=	$this->load->database('default',TRUE);

		$this->table_name	=	'shops_service';
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

	/**
	* 列表页面
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param
	* @return
	*/
	public function lists( $where = ''){

		if ( $where ) {
			$where	=	xss_clean($where);
			$this->db->where($where);
		}

		$this->db->order_by('listorder ASC,id DESC');

		//	列表
		$lists	=	$this->db->get($this->table_name)->result_array();

		if ($where) {
			$this->db->where($where);
		}


		$result['info']		=	$lists ? $lists : array();

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


    //添加收藏
    public function addshoucang( $data = array() ){
        if ( !$data ) {
            Return false;
        }
//		$data	=	xss_clean($data);

        $this->db->insert('emr_shoucang',$data);

        $insert_id	=	$this->db->insert_id();

        Return $insert_id ? $insert_id : false;
    }

    //获取用户所有收藏
    public function getshoucang($id){

        $where['a.userid']="$id";
        $this->db->select('a.shopid,b.shopsname,b.thumb,b.shopaddress');

        $this->db->from('shoucang as a');
        $this->db->join('shops  as b', 'a.shopid=b.id');
        $this->db->where($where);
        $res=$this->db->get()->result_array();
//echo $this->db->last_query();die;
//$res=$this->db->
//echo '<pre>';print_r($res);die;
        return $res;
    }
    //取消收藏
    public function delshoucang($idArr = array() ){


        $affected_rows	=	0;

        // $this->db->where_in('id', $idArr);
        $this->db->where( $idArr);
        $this->db->delete('shoucang');

        $affected_rows	=	$this->db->affected_rows();
        Return $affected_rows;
    }
    //获取一条收藏
    public function getoneshoucang($where = ''){
        if ( !$where ) {
            Return false;
        }

        $this->db->where($where);
        $res=$this->db->get('shoucang')->row_array();

        Return $res ? $res : false;
    }






}