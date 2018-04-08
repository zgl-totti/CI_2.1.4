<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 订单管理
 * @author    wangyangyang
 * @copyright    wangyang8839@163.com
 * @version    1.0
 * @param
 */
class Main extends CI_Controller
{
    public $before_filter = 'admin';
    public $_userid;

    /**
     *
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Member_model');
        $this->load->model('Order_model');
        $this->load->model('Shops_service_model');
        $this->load->model('Admin_model');
        $this->_userid = $this->session->userdata('userid');
    }

    /**
     * 前台用户列表信息
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    public function index($page = '')
    {
        $oinfo = $this->Order_model->lists('', $page, $pagesize = 10);
        $pages = pages($oinfo['total'], $pagesize, 4, '/order/main/index/');
        $oinfo['pages'] = $pages;

        templates('order', 'index', $oinfo);
        exit;
    }


    /**
     * 删除用户信息
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function deletes()
    {
        if (isset($_POST['submit']) && $_POST['submit']) {
            $post = $this->input->post(NULL, TRUE);
            $idArr = $post['userid'] ? $post['userid'] : '';

            if (!$idArr) {
                redirect(site_url('order/main'));
                exit;
            }

            $deletes = $this->Order_model->deletes($idArr);
            if ($deletes) {
                //	记录后台操作日志
                manage_log('order', 'main', 'deletes', '/order/main/deletes', '删除信息', json_encode($idArr));
            }
            redirect(site_url('order/main'));
            exit;
        }
    }

    /**
     * 订单搜索
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function search()
    {
        //echo 22;die;
        //	修改url可读取方式
        $this->config->set_item('enable_query_strings', TRUE);

        if ($_GET['start']) {
            $start = str_format_time($_GET['start']);
        }
        if ($_GET['end']) {
            $end = str_format_time($_GET['end']);
        }

        if ($start && $end) {
            $where = "a.add_time  between  $start and $end";
        } elseif ($start) {
            $where['a.add_time >'] = $start;
        } elseif ($end ) {
            $where['a.add_time <'] = $end;
        }

        $keywords =trim( $this->input->get('q', TRUE));
        $page = $this->input->get('per_page', TRUE);

        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 10;

        $info = $this->Order_model->search($keywords, $page, $pagesize, $where);
        //print_r($info);die;
        $url = '/order/main/search?q=' . $keywords.'&start='.$_GET['start'].'&end='.$_GET['end'];
        $pages = pagesadmin($info['total'], $pagesize, '', $url);

        $this->config->set_item('enable_query_strings', false);
        $info['keywords'] = $keywords;
        $info['pages'] = $pages;

        templates('order', 'index', $info);
        exit;
    }
}

