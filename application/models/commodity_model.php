<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 专家管理
 * @author        wangyangyang
 * @copyright    wangyang8839@163.com
 * @version        1.0
 * @param
 */
class Commodity_model extends CI_Model
{
    private $db;
    public $table_name;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);

        $this->table_name = 'commodity';
    }

    /**
     * 获取一条数据信息
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function getone1($where)
    {
        //echo 33;die;
        if (!$where) {
            Return false;
        }
        $this->db->select('*');

        $this->db->where($where);

        $query = $this->db->get('commodity');
        //echo $this->db->last_query();die;
        $info = $query->row_array();

        Return $info;
    }

    /**
     * 更新模型信息
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function update($data, $where)
    {
        if (!$data || !$where) {
            Return false;
        }

        $affected_rows = 0;
        $this->CI->db->where($where);
        $this->CI->db->update($this->table_name, $data);

        $affected_rows = $this->CI->db->affected_rows();
        Return $affected_rows;
    }

    /**
     * 添加
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param        $data 添加数据
     * @return        返回ID值
     */
    public function insert($data = array())
    {
        if (!$data) Return false;

        $insert_id = 0;
        // print_r($data);die;

        $this->CI->db->insert($this->table_name, $data);

        $insert_id = $this->CI->db->insert_id();
        Return $insert_id;
    }


    /**
     *
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function get($where = array())
    {
        if (!$where || !is_array($where)) Return false;

        $this->db->select('*');
        $this->db->where($where);

        $query = $this->db->get($this->table_name);
        $info = $query->row_array();

        Return $info;


    }

    /**
     * 列表信息
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function lists()
    {

        $query = $this->db->get('emr_commodity');
        $info = $query->result_array();
        Return $info;

    }

    public function lists1($limit, $offset)
    {


        $query = $this->db->limit($limit, $offset)->get('emr_commodity');
        $info = $query->result_array();

        Return $info;

    }

    /////////////////////////////////////////总数
    public function lists2()
    {


        Return $this->db->count_all('emr_commodity');

    }

    /**
     * 列表信息
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function getshops($c)
    {


        $this->db->where_in("id", $c);
        $query2 = $this->db->get('commodity');
        $info = $query2->result_array();

        // print_r($info);die;

        //获得信息总量
        // $this->CI->db->from($this->table_name);
        // $data['total']	= $this->CI->db->count_all_results();

        Return $info;

    }


    //获取一条
    public function newsinfo($where)
    {

        $this->db->where("id", $where);
        $info = $this->db->get_where($this->table_name)->result_array();
        Return $info ? $info : false;

    }

    /**
     * 通过id获取数据
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function getbyid($where = '', $select = '*')
    {
        if (!$where) {
            Return false;
        }
        $data = array();

        $this->CI->db->select($select);

        $this->CI->db->where_in('id', $where);

        $info = $this->CI->db->get($this->table_name)->result_array();

        Return $info;

    }

    /**
     * 删除数据
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function deletes($idArr = array())
    {
        if (!$idArr || !is_array($idArr)) {
            Return false;
        }

        $affected_rows = 0;

        $this->CI->db->where_in('id', $idArr);
        $this->CI->db->delete($this->table_name);

        $affected_rows = $this->CI->db->affected_rows();
        Return $affected_rows;
    }


    /**
     * 搜索
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function search($keywords = '',$page = '1',$pagesize = '10',$select='*'){
        $data		=	array();
        $curpage	=	($page - 1) * $pagesize ;

        $keywords	=	$keywords ? xss_clean($keywords) : '';

        $this->db->select($select);
        if ( $keywords ) {
            $this->db->or_like(array('name'=>$keywords));
        }
        $this->db->order_by('id DESC');
        $query		=	$this->db->limit($pagesize,$curpage)
                        ->get($this->table_name);
       // echo $this->db->last_query();die;
        $data['info']	= $query->result_array();

        //获得信息总量
        if ( $keywords ) {
            $this->db->or_like(array('name'=>$keywords));
        }
        $this->db->from($this->table_name);
        $data['total']	= $this->db->count_all_results();

        Return $data;
    }

    /*更新中奖表*/
    public function get_pond()
    {


        $this->db->select('*');


        $query = $this->db->get('pond');


        $info = $query->result_array();

        Return $info;


    }

    public function del_pond($id)
    {


        $this->db->where('id', $id);
        $this->db->delete('pond');
        //echo $this->db->last_query();die;
        $affected_rows = $this->db->affected_rows();
        Return $affected_rows;
    }

    public function get_win($where)
    {
        if (!$where) Return false;

        $this->db->select('*');
        $this->db->where('grade', $where);

        $query = $this->db->get('win');

        //

        $info = $query->row_array();

        Return $info;


    }

    public function upd_win($data, $where)
    {
        if (!$data || !$where) {
            Return false;
        }

        $affected_rows = 0;
        $this->db->where('grade', $where);
        $this->db->update('win', $data);
        //echo $this->db->last_query();die;
        $affected_rows = $this->db->affected_rows();
        Return $affected_rows;
    }

    public function ins_user_win($data = array())
    {
        if (!$data) Return false;

        $insert_id = 0;
        // print_r($data);die;

        $this->db->insert('user_win', $data);

        $insert_id = $this->db->insert_id();
        Return $insert_id;
    }

    public function get_user_win($where = array())
    {
        $this->db->select('count(id) ids ');
        $this->db->where($where);
        $click = $this->db->get('user_win')->row_array();
        //print_r($click) ;die;
        //echo $this->db->last_query();die;
        return $click['ids'];


    }

    public function search1($keywords = '',$page = '1',$pagesize = '10',$select='*'){
        $data       =   array();
        $curpage    =   ($page - 1) * $pagesize ;
        $keywords   =   $keywords ? xss_clean($keywords) : '';
        $this->db->select($select);
        if ( $keywords ) {
            $this->db->or_like(array('name'=>$keywords));
        }
        $this->db->order_by('id DESC');
        $query      =   $this->db->limit($pagesize,$curpage)
                        ->get($this->table_name);
        $data= $query->result_array();
        Return $data;
    }
}