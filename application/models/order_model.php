<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Content-type:text/html;charset=utf-8');

/**
 * 专家管理
 * @author        wangyangyang
 * @copyright    wangyang8839@163.com
 * @version        1.0
 * @param
 */
class Order_model extends CI_Model
{
    private $db;
    public $table_name;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);

        $this->table_name = 'order';
    }

    /**
     * 获取一条数据信息
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function getone($where, $select = '*')
    {
        if (!$where) {
            Return false;
        }
        $this->db->select($select);
        $this->db->where($where);

        $query = $this->db->get($this->table_name);
        //echo $this->db->last_query();die;
        $info = $query->row_array();

        Return $info;
    }


    public function get_order_by_openid($where = '', $select = '*')
    {
        if (!$where) {
            Return false;
        }
        $data = array();

        $this->db->select($select);

        $this->db->where( $where);

        $info = $this->db->get($this->table_name)->result_array();

        Return $info;

    }




    /*获取兑换列表*/
    public function get_cdkey($where)
    {
        if (!$where) {
            Return false;
        }
        $res = $this->get_order_by_openid($where);

        foreach ($res as $k1 => $v1) {
            $gids = array_filter(explode(',', $v1['serviceid']));
            $this->db->select('name');
            $this->db->where_in('id', $gids);
            $query[] = $this->db->get('commodity')->result_array();
        }
        foreach ($query as $k2 => $v2) {
            foreach ($v2 as $k3 => $v3) {
                $temp[$k2][] = $v3['name'];
            }
        }
        foreach ($temp as $k4 => $v4) {
            $temp[$k4] = implode('/', $v4);
        }
       // echo '<pre>';print_r($temp);
       // echo '<pre>';print_r($res);die;
        foreach ($res as $k5 => $v5) {
            if (isset($temp[$k5])) {
                $res[$k5]['gname'] = $temp[$k5];

            }

        }
         //echo '<pre>';print_r($res);die;
        Return $res;
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
        $this->db->where($where);
        $this->db->update($this->table_name, $data);
//echo  $this->db->last_query();die;
        $affected_rows = $this->db->affected_rows();
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
        //echo 888;die;
        if (!$data) Return false;

        $insert_id = 0;

        $this->db->insert($this->table_name, $data);
      // echo $this->db->last_query();die;
        $insert_id = $this->db->insert_id();
        Return $insert_id;
    }

    /**
     * 列表
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */


    public function lists($where = '', $page = '1', $pagesize = '30',$status='')
    {
        $data = array();
        $curpage = ($page - 1) * $pagesize;

        $this->db->select('*');
        if ($where) {
            $this->db->where($where);
        }
if($status){
    $this->db->where_in('status_user',$status);

}






        $this->db->order_by('id DESC');
       // $query = $this->db->limit($pagesize, $curpage)->get($this->table_name);
        $query = $this->db->get($this->table_name);



//echo  $this->db->last_query();die;
        $data['info'] = $query->result_array();

        //获得信息总量
        $this->db->select('id');
        if ($where) {
            $this->db->where($where);
        }
        $res= $this->db->get($this->table_name)->result_array();
        $data['total'] = count($res);

        Return $data;

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

        $this->db->select($select);

        $this->db->where_in('id', $where);

        $info = $this->db->get($this->table_name)->result_array();

        Return $info;

    }

    public function getopenid($where = '', $select = '*')
    {
        if (!$where) {
            Return false;
        }
        $data = array();

        $this->db->select($select);

        $this->db->where_in('openid', $where);

        $info = $this->db->get($this->table_name)->result_array();

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

        $this->db->where_in('id', $idArr);
        $this->db->delete($this->table_name);

        $affected_rows = $this->db->affected_rows();
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
    public function search($keywords = '', $page = '1', $pagesize = '10')
    {
        $data = array();
        $curpage = ($page - 1) * $pagesize;

        $keywords = $keywords ? xss_clean($keywords) : '';

        $this->db->select('*');
        if ($keywords) {
            $this->db->or_like(array('ordernum' => $keywords, 'userid' => $keywords));
        }
        $this->db->order_by('id DESC');
        $query = $this->db->limit($pagesize, $curpage)
            ->get($this->table_name);

        $data['info'] = $query->result_array();

        //获得信息总量
        if ($keywords) {
            $this->db->or_like(array('ordernum' => $keywords, 'userid' => $keywords));
        }
        $this->db->from($this->table_name);
        $data['total'] = $this->db->count_all_results();

        Return $data;
    }

    public function get_usernumber($usernumber = '')
    {
        if (!$usernumber) Return false;
        $userInfo = array();

        $userInfo = $this->db->select('card_id,userid')->get_where($this->table_name, array('usernumber' => $usernumber))->row_array();

        Return $userInfo;
    }

    /*获取商户电话*/

    public function get_shop_phone($ordernumber = ''){
        if (!$ordernumber) Return false;
       $res= $this->db->select('a.phone,a.gname,b.sphone')
            ->from('order as a')
            ->join('shops as b','a.shopid=b.id')
            ->where('a.ordernum',$ordernumber)
            ->get()->row_array();

        return $res ? $res : array();

       // echo $this->db->last_query();die;

    }






}