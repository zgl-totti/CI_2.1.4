<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 用户登录
 * @author
 * @copyright
 * @version    1.0
 * @param
 * @return
 *
 *
 *
 */
class Wxmain extends CI_Controller{
    /**
     *
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    private $app_id = 'wx669eb16a613703ae';
    private $app_secret = 'f0d01a8b6b07420b95001a0f55acb27a';
    public function __construct(){
        parent::__construct();
        $this->load->model('Driving_model');
        $this->load->model('Signup_model');
        $this->load->model('Member_model');
        $this->load->model('commodity_model');
        $this->load->model('Admin_model');
        $this->load->model('Shops_service_model');
        $this->load->model('Order_model');
        $this->load->model('Order_model');
        $this->load->model('Loan_model');
        $this->load->model('Cardtype_model');
        $this->load->model('Yuyue_model');
        $this->load->model('posapply_model');
        $this->load->library('pagination');
    }

    /**
     * 登录动作处理
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function index($offset = ''){
        $data['aa'] = $this->commodity_model->lists();
        templates('wxmain', 'index', $data);
    }

    public function search1(){
        //	修改url可读取方式
        $this->config->set_item('enable_query_strings', TRUE);
        $keywords = $this->input->get('q', TRUE);
        $page = $this->input->get('per_page', TRUE);
        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 20;
        $info = $this->commodity_model->search($keywords, $page, $pagesize);
        $url = '/wxmain/search?q=' . $keywords;
        $pages = pages($info['total'], $pagesize, '', $url);
        $this->config->set_item('enable_query_strings', false);
        $info['keywords'] = $keywords;
        $info['pages'] = $pages;
        //print_r($info);die;
        templates('wxmain', 'search', $info);
        exit;
    }

    public function jinyanka(){
        $this->load->model('About_model');
        $data['about'] = $this->About_model->getone();
        //echo "<pre>";
        //print_r($data['about']);
        //die;
        $this->load->view('default/wxmain/jinyanka', $data);
    }

    public function pos()
    {
        $this->load->model('About_model');
        $data['about'] = $this->About_model->getone1();
        $this->load->view('default/wxmain/pos', $data);
    }

    public function shoujiyinhang()
    {
        $this->load->model('About_model');
        $data['about'] = $this->About_model->getone2();
        $this->load->view('default/wxmain/shoujiyinhang', $data);
    }

    public function yewujieshao()
    {
        $this->load->model('About_model');
        $data['about'] = $this->About_model->getone3();
        $this->load->view('default/wxmain/yewujieshao', $data);
    }

    public function yuyue()
    {
        seo('预约服务');
        $data['seo_title'] = '预约服务';
        $this->load->vars($data);
        templates('wxmain', 'yuyue');
    }

    public function chaxun()
    {
        //  $this->commodity_model->search($keyword,$page,$pagesize=10,);
        $this->config->set_item('enable_query_strings', TRUE);
        $keywords = $this->input->get('q', TRUE);
        $page = $this->input->get('per_page', TRUE);
        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 8;
        $data = $this->commodity_model->search($keywords, $page, $pagesize,'id,name,newprice,oldprice,thumb0');
        // echo '<pre>';print_r($data);
        $url = '/wxmain/chaxun?q=' . $keywords;
        $pages = pages($data['total'], $pagesize, '', $url);
        $this->config->set_item('enable_query_strings', false);
        $data['keywords'] = $keywords;
        $data['pages'] = $pages;
        //  $data['aa'] = $this->commodity_model->lists();
        // print_r($data);die;
        $data['pnum']=ceil($data['total']/$pagesize);
        // $arr=json_encode($data);
        // $this->load->vars($arr);
        $this->load->view('default/wxmain/chaxun', $data);
    }

    public function jspage(){
        $page=$_POST['num'];
        $keywords=$_POST['q'];
        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 10;
        $data = $this->commodity_model->search1($keywords, $page, $pagesize,'id,name,newprice,oldprice,thumb0');
        // $date=$data['info'];
        //unset($data['total']);
        echo json_encode($data);
        //print_r(json_encode($date));
    }

    public function dingdan()
    {
        seo('订单');
        $data['seo_title'] = '订单';
        $this->load->vars($data);
        templates('wxmain', 'dingdan');
    }

    public function xiangqingye($id)
    {
        $id = $this->uri->segment(3);
        $where = $id;
        seo('');
        $this->load->model('commodity_model');
        $this->load->model('shops_model');
        // $data['a']   =   $this->shops_model->lb()
        $data['aa'] = $this->commodity_model->newsinfo($where);
        // $data['data'] = $data;
        //echo '<pre>';print_r($data['aa']);die;
        $this->load->vars($data);
        templates('wxmain', 'xiangqingye');
    }

    public function tijiaodingdan($id)
    {
        $id = $this->uri->segment(3);
        $where = $id;
        $this->load->model('commodity_model');
        $data['aa'] = $this->commodity_model->newsinfo($where);
        //echo'<pre>';print_r($data);die;
        // $data['data'] = $data;
        $this->load->vars($data);
        templates('wxmain', 'tijiaodingdan', $data);
    }

    public function hongbaohuodong()
    {
        $this->load->vars();
        templates('wxmain', 'hongbaohuodong');
    }

    public function gerenxiangqing()
    {
        header("Content-type: text/html; charset=utf-8");
        $openid = $this->session->userdata('openid');
        $data['phone'] = $this->input->post('phone');
        $data['realname'] = $this->input->post('realname');
        $data['birthday'] = $this->input->post('birthday');
        $data['address'] = $this->input->post('address');
        $data['origin'] = $this->input->post('origin');
        $data['number'] = $this->input->post('number');
        $data['sex'] = $this->input->post('sex');
        $insert_id = $this->Member_model->add($data);
        $this->load->vars($data);
        templates('wxmain', 'gerenxiangqing');
    }

    public function perfect()
    {
        header("Content-type: text/html; charset=utf-8");
        $openid = $this->session->userdata('openid');
        $data['telephone'] = $this->input->post('telephone');
        $data['price'] = $this->input->post('price');
        $insert_id = $this->Yuyue_model->add($data);
        //print_r($data);die;
        // if ($insert_id) {
        // 	templates('global','messagesucced');
        // 	exit;
        // }else{
        // 	templates('global','messgaedefeat');
        // 	exit;
        // }

        // if ( isset($_POST['realname']) && $_POST['realname'] ) {
        // 	$post	=	$this->input->post(NULL,TRUE);
        // 	$realname		=	$post['realname'] ? intval($post['realname']) : '';
        // 	$telephone		=	$post['telephone'] ? intval($post['telephone']) : '';
        // 	$price		=	$post['price'] ? intval($post['price']) : '';
        // 	if (!$realname && !$telephone && !$price) {
        // 		redirect(site_url('wxmain/index'));
        // 		exit;
        // 	}
        // 	$info		=	array();
        // 	$info['realname']	=	$post['realname'];
        // 	$info['telephone']		=	$post['telephone'] ? $post['telephone'] : '';
        // 	$price		=	isset($post['price']) &&
        // 		$post['price'] ? $post['price'] : '';
        // 	// if ( $price ) {
        // 	// 	$info['price']	=	implode(",", $price);
        // 	// }else{
        // 	// 	$info['price']	=	'';
        // 	// }
        // 	$info['add_time']	=	time();
        // 	$rows	=	$this->Yuyue_model->updates($info,$openid);
        // 	if ( $rows ) {
        // 		templates('global','message');
        // 		exit;
        // 	}else{
        // 		templates('global','messgaesucced');
        // 		exit;
        // 	}
        // }else{
        // 	$member	=	$this->Yuyue_model->useropenid($openid);
        // 	if($member){
        // 		$return['member'] = $member;
        // 	}
        // 	seo('完善信息');
        // 	$data['seo_title'] = '完善信息';
        // $this->load->vars($data);
        templates('wxmain', 'yuyue');
    }

    public function admin()
    {
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        seo('首页');
        $openid = $this->session->userdata('openid');
        $data['seo_title'] = '首页';
        templates('wxmain', 'usercard');
    }

    public function information($userid = '')
    {
        header("Content-type: text/html; charset=utf-8");
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        if (isset($_POST['submit']) && $_POST['submit']) {
            $post = $this->input->post(NULL, TRUE);
            $usersid = $post['userid'] ? $post['userid'] : '';
            if (!$usersid) {
                redirect(site_url('wxmain/index'));
                exit;
            }
            $info = array();
            $info['realname'] = $post['realname'];
            $info['nickname'] = $post['nickname'];
            $info['email'] = $post['email'] ? $post['email'] : '';
            $info['phone'] = $post['phone'] ? $post['phone'] : '';
            $info['sex'] = $post['sex'] ? intval($post['sex']) : '0';
            $info['birthday'] = $post['birthday'] ? $post['birthday'] : '';
            $info['number'] = $post['number'] ? $post['number'] : '';
            $info['wechat'] = $post['wechat'] ? $post['wechat'] : '';
            $info['origin'] = $post['origin'] ? $post['origin'] : '';
            $info['address'] = $post['address'] ? $post['address'] : '';
            $info['license'] = $post['license'] ? $post['license'] : '';
            $info['type'] = $post['type'] ? $post['type'] : '';
            $info['limited'] = $post['limited'] ? $post['limited'] : '';
            $info['renewal'] = $post['renewal'] ? $post['renewal'] : '';
            $info['price'] = $post['price'] ? $post['price'] : '';
            $info['update_time'] = time();
            $rows = $this->Member_model->updatesid($info, $usersid);
            if ($rows) {
                templates('global', 'messagesuccedss');
                exit;
            } else {
                templates('global', 'messagedefeatss');
                exit;
            }
        } else {
            if (!$userid) {
                redirect(site_url('wxmain/lordlist'));
                exit;
            }
            $member = $this->Member_model->userinfo($userid);
            if ($member) {
                $data['member'] = $member;
            }
            seo('完善信息');
            $data['seo_title'] = '完善信息';
            $this->load->vars($data);
            templates('wxmain', 'information');
        }
    }

    public function lordlist($page = '')
    {
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        seo('车主列表');
        //	条件
        $where = array();
        $page = isset($page) && $page ? intval($page) : 1;
        $pagesize = 10;
        //	获取数据
        $data = $this->Member_model->lists($where, $page, $pagesize, 'update_time DESC');

        $total = isset($data['total']) && $data['total'] ? $data['total'] : '';
        //	分页
        $pages = '';
        if ($total) {
            $pages = pages($total, $pagesize, '3', '/wxmain/lordlist/');
        }
        $data['pages'] = $pages ? $pages : '';
        $data['total'] = $total ? $total : 0;
        $data['seo_title'] = '车主列表';
        $this->load->vars($data);
        templates('wxmain', 'lordlist');
    }

    public function lordsearch($page = '')
    {
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        seo('车主列表');
        //	条件
        $where = array();
        $page = isset($page) && $page ? intval($page) : 1;
        $pagesize = 10;
        //	获取数据
        $data = $this->Member_model->lists($where, $page, $pagesize, 'update_time DESC');
        $total = isset($data['total']) && $data['total'] ? $data['total'] : '';
        //	分页
        $pages = '';
        if ($total) {
            $pages = pages($total, $pagesize, '3', '/wxmain/lordsearch/');
        }
        $data['pages'] = $pages ? $pages : '';
        $data['total'] = $total ? $total : 0;
        $data['seo_title'] = '车主列表';
        $this->load->vars($data);
        templates('wxmain', 'lordsearch');
    }


    public function lordsever($id = '')
    {
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        if (isset($_POST['submit']) && $_POST['submit']) {
            $post = $this->input->post(NULL, TRUE);

            $service = isset($post['service']) && $post['service'] ? $post['service'] : '';
            if ($service) {
                $services = implode(",", $service);
            } else {
                $services = '';
            }

            if (!$services) {
                redirect(site_url('wxmain/lordsever/' . $id));
                exit;
            }
            $data['userid'] = $post['userid'] ? intval($post['userid']) : '';
            $data['serviceid'] = $services;
            $data['total'] = 0;
            $data['status_shop'] = 2;
            $data['status_user'] = 1;
            $data['ordernum'] = date('Ymd') . substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);;
            $data['add_time'] = time();
            $data['administrators'] = $member['admin'];
            $orderid = $this->Order_model->insert($data);

            if ($orderid) {
                templates('global', 'messagesucceds');
                exit;
            } else {
                templates('global', 'messagedefeats');
                exit;
            }
        } else {
            seo('车主服务信息');
            //	条件
            $id = $id ? intval($id) : '';
            $data['userinfo'] = $this->Member_model->userinfo($id);
            $data['userinfo']['plate'] = str_replace(',', '', $data['userinfo']['plate']);
            $service = $this->Shops_service_model->lists();
            foreach ($service['info'] as $keys => $values) {
                $data['service'][$values['id']] = $values;
            }
            $data['seo_title'] = '车主服务信息';
            $this->load->vars($data);
            templates('wxmain', 'lordsever');
        }
    }

    public function orderlist($page = '')
    {
        seo('订单列表');
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        $page = isset($page) && $page ? intval($page) : 1;
        $pagesize = 10;
        //	获取数据
        $wheres = array();
        $wheres['administrators'] = $member['admin'];
        $data = $this->Order_model->lists($wheres, $page, $pagesize);
        foreach ($data['info'] as $key => $value) {
            $nickname = $this->Member_model->userinfo($value['userid']);
            if ($nickname) {
                $data['info'][$key]['nickname'] = $nickname['nickname'];
                $data['info'][$key]['phone'] = $nickname['phone'];
                $data['info'][$key]['realname'] = $nickname['realname'];
                $data['info'][$key]['plate'] = str_replace(',', '', $nickname['plate']);
            }
        }
        // foreach ($info['info'] as $keys => $values) {
        // 	if ( $info['info'] && $info['info'][$keys]['serviceid']) {
        // 		$info['info'][$keys]['serviceid']	=	explode(',',$values['serviceid']);
        // 	}
        // 	foreach ($info['info'][$keys]['serviceid'] as $k => $v) {
        // 		$service	=	$this->Shops_service_model->get($v);
        // 		$info['info'][$keys]['serviceid'][$k] =$service['name'];
        // 	}
        // 		if ( $info['info'][$keys]['serviceid'] ) {
        // 			$info['info'][$keys]['serviceid']	=	implode(",", $info['info'][$keys]['serviceid']);
        // 		}else{
        // 			$info['info'][$keys]['serviceid']	=	'';
        // 		}
        // }
        $total = isset($data['total']) && $data['total'] ? $data['total'] : '';

        //	分页
        $pages = '';
        if ($total) {
            $pages = pages($total, $pagesize, '3', '/wxmain/orderlist/');
        }
        $data['pages'] = $pages ? $pages : '';
        $data['total'] = $total ? $total : 0;
        $data['seo_title'] = '订单列表';
        $this->load->vars($data);
        templates('wxmain', 'orderlist');
    }

    public function activation($userid = '')
    {
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        $userid = $userid ? intval($userid) : '';
        //	如果获取不到id值，直接跳转到所有列表页面
        if (!$userid) {
            redirect(site_url('wxmain/lordsearch'));
            exit;
        }
        $where = array('user_id' => $userid);
        $info = array();
        $info['activation'] = time();
        $rows = $this->Card_model->update($info, $where);
        if ($rows) {
            $update = $this->Member_model->updatesid($info, $userid);
            if ($update) {
                templates('global', 'messagesucceds');
                exit;
            } else {
                templates('global', 'messagedefeats');
                exit;
            }
        } else {
            templates('global', 'messagedefeats');
            exit;
        }
        exit;
    }


    public function cardadd($userid = '')
    {
        header("Content-type: text/html; charset=utf-8");
        $openid = $this->session->userdata('openid');
        $member = $this->Member_model->useropenid($openid);
        $admin = $this->Admin_model->manage_user_lists(1, 1000);
        $adminid = array();
        foreach ($admin['info'] as $key => $value) {
            $adminid[] = $value['userid'];
        }
        if (!in_array($member['admin'], $adminid)) {
            redirect(site_url('wxmain/index'));
            exit;
        }
        if (isset($_POST['usernumber']) && $_POST['usernumber']) {
            $post = $this->input->post(NULL, TRUE);

            $usernumber = $post['usernumber'] ? intval($post['usernumber']) : '';
            $cardlife = $post['cardlife'] ? intval($post['cardlife']) : '';
            $apply_time = $post['apply_time'] ? intval($post['apply_time']) : '';
            if (!$usernumber && !$phone && !$plate) {
                redirect(site_url('wxmain/index'));
                exit;
            }
            $info = array();
            $info['usernumber'] = $usernumber;
            $info['cardlife'] = $cardlife;
            $info['apply_time'] = $apply_time;
            $info['cardtype'] = $post['cardtype'] ? intval($post['cardtype']) : 0;
            $plate = isset($post['plate']) && $post['plate'] ? $post['plate'] : '';
            if ($plate) {
                $data['plate'] = implode(",", $plate);
            } else {
                $data['plate'] = '';
            }
            $info['update_time'] = time();
            $info['add_time'] = time();
            $info['update_time'] = time();
            $info['user_id'] = $userid;
            $info['administrators'] = $member['admin'];
            $insertid = $this->Card_model->insert($info);
            if ($insertid) {
                $data['card_id'] = $insertid;
                $data['usernumber'] = $usernumber;
                $update = $this->Member_model->updatesid($data, $userid);
                if ($update) {
                    templates('global', 'messagesucceds');
                    exit;
                } else {
                    templates('global', 'messagedefeats');
                    exit;
                }
            } else {
                templates('global', 'messagedefeats');
                exit;
            }
        } else {
            $userid = $userid ? intval($userid) : '';
            if (!$userid) {
                redirect(site_url('wxmain/lordsearch'));
                exit;
            }
            $main = $this->Cardtype_model->lists();
            $data['userid'] = $userid;
            $data['cardtype'] = $main['info'];
            seo('开通会员');
            $data['seo_title'] = '开通会员';
            $this->load->vars($data);
            templates('wxmain', 'cardadd');
        }
    }


    /**
     * 用户搜索
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function lordseversearch()
    {
        //	修改url可读取方式
        $this->config->set_item('enable_query_strings', TRUE);
        $keywords = $this->input->get('q', TRUE);
        $page = $this->input->get('per_page', TRUE);

        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 10;

        $info = $this->Member_model->search($keywords, $page, $pagesize);

        $url = '/wxmain/lordseversearch?q=' . $keywords;
        $pages = pages($info['total'], $pagesize, '', $url);

        $this->config->set_item('enable_query_strings', false);
        $info['keywords'] = $keywords;
        $info['pages'] = $pages;


        $this->load->vars($info);
        templates('wxmain', 'lordseversearch');
    }

    /**
     * 用户搜索
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function lordlistsearch()
    {
        //	修改url可读取方式
        $this->config->set_item('enable_query_strings', TRUE);
        $keywords = $this->input->get('q', TRUE);
        $page = $this->input->get('per_page', TRUE);

        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 10;

        $info = $this->Member_model->search($keywords, $page, $pagesize);

        $url = '/wxmain/lordlistsearch?q=' . $keywords;
        $pages = pages($info['total'], $pagesize, '', $url);

        $this->config->set_item('enable_query_strings', false);
        $info['keywords'] = $keywords;
        $info['pages'] = $pages;


        $this->load->vars($info);
        templates('wxmain', 'lordlist');
    }


    /**
     * 订单搜索
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function orderlistsearch()
    {
        //	修改url可读取方式
        $this->config->set_item('enable_query_strings', TRUE);
        $keywords = $this->input->get('q', TRUE);
        $page = $this->input->get('per_page', TRUE);

        $page = isset($page) ? intval($page) : 1;
        $page = max(1, $page);
        $pagesize = 10;
        $info = $this->Order_model->search($keywords, $page, $pagesize);
        if (empty($order['info'])) {
            $member = $this->Member_model->search($keywords, $page, $pagesize);

            if ($member) {
                foreach ($member['info'] as $key => $value) {
                    $keywords = $value['userid'];
                    $order = $this->Order_model->search($keywords, $page, $pagesize);
                    foreach ($order['info'] as $k => $v) {
                        $info['info'][] = $v;
                    }
                }

            }
        }

        foreach ($info['info'] as $keys => $values) {
            $nickname = $this->Member_model->userinfo($values['userid']);
            if ($nickname) {
                $info['info'][$keys]['nickname'] = $nickname['nickname'];
                $info['info'][$keys]['phone'] = $nickname['phone'];
                $info['info'][$keys]['realname'] = $nickname['realname'];
                $info['info'][$keys]['plate'] = str_replace(',', '', $nickname['plate']);
            }

        }


        $url = '/wxmain/lordseversearch?q=' . $keywords;
        $pages = pages($info['total'], $pagesize, '', $url);

        $this->config->set_item('enable_query_strings', false);
        $info['keywords'] = $keywords;
        $info['pages'] = $pages;


        $this->load->vars($info);
        templates('wxmain', 'orderlistsearch');
    }

    public function dingdan2()
    {
        /*
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $thumb = $this->input->post('thumb');
        $title = $this->input->post('title');
        $newprice = $this->input->post('newprice');*/
        // $data['zongjia'] = $this->input->post('zongjia');
        /*$shuju = $this->input->post('shuju');
        $data['id']=$id;
        $data['name']=$name;
        $data['thumb']=$thumb;
        $data['title']=$title;
        $data['newprice']=$newprice;*/
        $explode = explode('*', $_SESSION['id']);

        $arr1 = array_unique($explode);

        $c = $arr1;

        $data['aa'] = $this->commodity_model->getshops($c);


        //print_r($data);die;


        templates('wxmain', 'dingdan2', $data);

    }


    public function wsyh()
    {

        $this->load->model('About_model');
        $data['about'] = $this->About_model->getone11();


        templates('wxmain', 'wsyh', $data);

    }

    public function gzsj()
    {


        templates('wxmain', 'guanzhushangjia');

    }

    public function daikuangyewu()
    {

        templates('wxmain', 'daikuan');


    }


    public function dianziyinhang01()
    {
        templates('wxmain', 'bank01');
    }

    public function jinyanka01()
    {
        templates('wxmain', 'bank_jinyanka01');
    }


    public function daikuan01()
    {
        templates('daikuan', 'anjie');
    }


    public function daikuan02()
    {
        templates('daikuan', 'anjiedaikuan');
    }

    public function daikuan03()
    {
        templates('daikuan', 'business');
    }

    public function daikuan04()
    {
        templates('daikuan', 'consumption');
    }

    public function daikuan05()
    {
        templates('daikuan', 'fangchandai');
    }

    public function daikuan06()
    {
        templates('daikuan', 'geren-anjie');
    }

/////111111
    public function daikuan07()
    {
        templates('daikuan', 'loanTransaction');
    }

    public function daikuan08()
    {
        templates('daikuan', 'nongdaitong');
    }

    public function daikuan09()
    {
        templates('daikuan', 'qiche');
    }

    public function daikuan10()
    {
        templates('daikuan', 'shangdaitong');
    }

    public function daikuan11()
    {
        templates('daikuan', 'zhidaitong');
    }

    public function daikuan12()
    {
        templates('daikuan', 'baohan');
    }

    public function xinyidai()
    {

        templates('daikuan', 'xinyidai');
    }

    public function daikuan13()
    {
        templates('daikuan', 'baoli');
    }

    public function daikuan14()
    {
        templates('daikuan', 'baozhengdaikuan');
    }

    public function daikuan15()
    {
        templates('daikuan', 'chuantongrongzi');
    }

    public function daikuan16()
    {
        templates('daikuan', 'diyadaikuan');
    }

    public function daikuan17()
    {
        templates('daikuan', 'gongyinglian');
    }

    public function daikuan18()
    {
        templates('daikuan', 'mingdanneishang');
    }

    public function daikuan19()
    {
        templates('daikuan', 'piaojuyewu');
    }

    public function daikuan20()
    {
        templates('daikuan', 'piaojubao');
    }

    public function daikuan21()
    {
        templates('daikuan', 'qianfayinhang');
    }

    public function daikuan22()
    {
        templates('daikuan', 'shanghuanyin');
    }

    public function daikuan23()
    {
        templates('daikuan', 'shangyechengdui');
    }

    public function daikuan24()
    {
        templates('daikuan', 'toubiaobaozhengjindaikuan');
    }

    public function daikuan25()
    {
        templates('daikuan', 'weituodaikuan');
    }

    public function daikuan26()
    {
        templates('daikuan', 'yinhangchengdui');
    }

    public function daikuan27()
    {
        templates('daikuan', 'yinshoudaikuan');
    }

    public function daikuan28()
    {
        templates('daikuan', 'zhiyadaikuan');
    }

    public function daikuan29()
    {
        templates('daikuan', 'zhunqiane');
    }

    public function daikuan30()
    {
        templates('daikuan', 'zhiyadaikuan');
    }

    public function daikuannew01()
    {

        templates('daikuan', 'yinhangchengdui');
    }

    public function daikuan31()
    {
        templates('daikuan', 'shangyechengdui');
    }

//////////////////////////////////////////////////////
    public function dzyh01()
    {
        templates('dianziyinhang', 'bank');
    }

    public function dzyh02()
    {
        templates('dianziyinhang', 'bank_jinyanka');
    }

    public function dzyh03()
    {
        templates('dianziyinhang', 'jinyanka_jianjie');
    }

    public function dzyh04()
    {
        templates('dianziyinhang', 'jinyanka_fenlei');
    }

    public function dzyh05()
    {
        templates('dianziyinhang', 'jinyanka_zifeiqingkuang');
    }

    public function dzyh06()
    {
        templates('dianziyinhang', 'pos_yewu');
    }

    public function dzyh07()
    {
        templates('dianziyinhang', 'pos_shoudan');
    }

    public function dzyh08()
    {
        templates('dianziyinhang', 'pos_zixun');
    }

    public function dzyh09()
    {
        templates('dianziyinhang', 'jinyanzizhutong');
    }

    public function dzyh10()
    {
        templates('dianziyinhang', 'jinyanzizhutonggongneng');
    }

    public function dzyh11()
    {
        templates('dianziyinhang', 'jinyanzifeitongzifeiqiangkuang');
    }

    public function dzyh12()
    {
        templates('dianziyinhang', 'wangshangyinhangg');
    }

    public function dzyh13()
    {
        templates('dianziyinhang', 'gerenwangyin');
    }

    public function dzyh14()
    {
        templates('dianziyinhang', 'qiyewangyin');
    }

    public function dzyh15()
    {
        templates('dianziyinhang', 'wentiyufrngxian');
    }

    public function dzyh16()
    {
        templates('dianziyinhang', 'zifei_3');
    }

    public function dzyh17()
    {
        templates('dianziyinhang', 'zifeiqingkuang');
    }

    public function dzyh18()
    {
        templates('dianziyinhang', 'kehuduan_shoujiyinhang');
    }

    public function dzyh19()
    {
        templates('dianziyinhang', 'tiepianka_shoujiyinhang');
    }

    public function zifeiqingkuang()
    {
        templates('dianziyinhang', 'zifeiqingkuang');
    }

    public function dzyh20()
    {
        templates('dianziyinhang', '123');
    }

    public function dzyh21()
    {
        templates('dianziyinhang', 'guanyuwomen');
    }

    public function dzyh22()
    {
        templates('dianziyinhang', 'business');
    }

    public function dzyh23()
    {
        templates('daikuan', 'jinyan_weidaitong');
    }

    //public function dzyh24(){
    //	templates('daikuan','jinyan_weidaitong');
    //}

    public function dzyh25()
    {
        templates('daikuan', 'cheweidai');
    }

    public function wdcx()
    {
        templates('wangdiancx', 'wangdianchaxun');
    }

    public function wdfb()
    {
        templates('wangdiancx', 'wangdian_fenbu');
    }

    public function cjyh()
    {
        templates('dianziyinhang', 'chaojiyinhang');
    }



    public function zzfbz90()
    {
        templates('dianziyinhang', 'zifei_3');
    }

    public function zhifubao()
    {
        templates('dianziyinhang', 'zhifubao');
    }

    public function ATMzfbz()
    {
        templates('dianziyinhang', 'ATM_zifeibiaozhun');
    }

    public function atmlby()
    {
        templates('dianziyinhang', 'ATM_liebiaoye');
    }

    public function ssjjh()
    {
        templates('dianziyinhang', 'shoujiyinhang11');
    }


    public function dzyh110()
    {
        templates('dianziyinhang', 'zifei_3');
    }


    public function ceshiditu()
    {
        templates('wangdiancx', '456');
    }


    public function shoujiyhzfqk2()
    {
        templates('dianziyinhang', 'zifeiqingkuang');
    }


    public function dingwei1()
    {
        templates('wangdiancx', '1');
    }


    public function dingwei2()
    {
        templates('wangdiancx', '2');
    }

    public function dingwei3()
    {
        templates('wangdiancx', '3');
    }

    public function dingwei4()
    {
        templates('wangdiancx', '4');
    }

    public function dingwei5()
    {
        templates('wangdiancx', '5');
    }

    public function dingwei6()
    {
        templates('wangdiancx', '6');
    }

    public function dingwei7()
    {
        templates('wangdiancx', '7');
    }

    public function dingwei8()
    {
        templates('wangdiancx', '8');
    }

    public function dingwei9()
    {
        templates('wangdiancx', '9');
    }

    public function dingwei10()
    {
        templates('wangdiancx', '10');
    }

    public function dingwei11()
    {
        templates('wangdiancx', '11');
    }

    public function dingwei12()
    {
        templates('wangdiancx', '12');
    }

    public function dingwei13()
    {
        templates('wangdiancx', '13');
    }

    public function dingwei14()
    {
        templates('wangdiancx', '14');
    }

    public function dingwei15()
    {
        templates('wangdiancx', '15');
    }

    public function dingwei16()
    {
        templates('wangdiancx', '16');
    }

    public function dingwei17()
    {
        templates('wangdiancx', '17');
    }

    public function dingwei18()
    {
        templates('wangdiancx', '18');
    }

    public function dingwei19()
    {
        templates('wangdiancx', '19');
    }

    public function dingwei20()
    {
        templates('wangdiancx', '20');
    }

    public function dingwei21()
    {
        templates('wangdiancx', '21');
    }

    public function dingwei22()
    {
        templates('wangdiancx', '22');
    }

    public function dingwei23()
    {
        templates('wangdiancx', '23');
    }

    public function dingwei24()
    {
        templates('wangdiancx', '24');
    }

    public function dingwei25()
    {
        templates('wangdiancx', '25');
    }

    public function dingwei26()
    {
        templates('wangdiancx', '26');
    }

    public function dingwei27()
    {
        templates('wangdiancx', '27');
    }

    public function dingwei28()
    {
        templates('wangdiancx', '28');
    }


    public function grqtl()
    {
        templates('wxmain', 'user_other');
        //templates('wxmain','gerenqitalei');
    }

    public function user_form()
    {
        templates('wxmain', 'user_form');
        //templates('wxmain','gerenqitalei');
    }

    public function user_forest()
    {

        templates('wxmain', 'user_forest');
        //templates('wxmain','gerenqitalei');
    }


    public function shoucang()
    {

        templates('wxmain', 'shoucang');
    }

    public function dingwei29()
    {

        templates('wangdiancx', '29');
    }

    public function dingwei30()
    {

        templates('wangdiancx', '30');
    }


    public function dingwei31()
    {

        templates('wangdiancx', '31');
    }

    public function dingwei32()
    {

        templates('wangdiancx', '32');
    }

    public function dingwei33()
    {

        templates('wangdiancx', '33');
    }

    public function dingwei34()
    {

        templates('wangdiancx', '34');
    }


    public function dingwei35()
    {

        templates('wangdiancx', '35');
    }

    public function dingwei36()
    {

        templates('wangdiancx', '36');
    }

    public function dingwei37()
    {

        templates('wangdiancx', '37');
    }

    public function dingwei38()
    {

        templates('wangdiancx', '38');
    }

    public function dingwei39()
    {

        templates('wangdiancx', '39');
    }

    public function dingwei40()
    {

        templates('wangdiancx', '40');
    }

    public function dingwei41()
    {

        templates('wangdiancx', '41');
    }

    public function dingwei42()
    {

        templates('wangdiancx', '42');
    }

    public function dingwei43()
    {

        templates('wangdiancx', '43');
    }

    public function dingwei44()
    {

        templates('wangdiancx', '44');
    }

    public function dingwei45()
    {

        templates('wangdiancx', '45');
    }

    public function dingwei46()
    {

        templates('wangdiancx', '46');
    }

    public function dingwei47()
    {

        templates('wangdiancx', '47');
    }

    public function dingwei48()
    {

        templates('wangdiancx', '48');
    }

    public function dingwei49()
    {

        templates('wangdiancx', '49');
    }

    public function dingwei50()
    {

        templates('wangdiancx', '50');
    }

    public function dingwei51()
    {

        templates('wangdiancx', '51');
    }

    public function dingwei52()
    {

        templates('wangdiancx', '52');
    }

    public function dingwei53()
    {

        templates('wangdiancx', '53');
    }

    public function dingwei54()
    {

        templates('wangdiancx', '54');
    }

    public function dingwei55()
    {

        templates('wangdiancx', '55');
    }

    public function dingwei56()
    {

        templates('wangdiancx', '56');
    }

    public function dingwei57()
    {

        templates('wangdiancx', '57');
    }

    public function dingwei58()
    {

        templates('wangdiancx', '58');
    }

    public function dingwei59()
    {

        templates('wangdiancx', '59');
    }

    public function dingwei60()
    {

        templates('wangdiancx', '60');
    }

    public function dingwei61()
    {

        templates('wangdiancx', '61');
    }

    public function dingwei62()
    {

        templates('wangdiancx', '62');
    }

    public function dingwei63()
    {

        templates('wangdiancx', '63');
    }
///////////////////////////////

///////////////////////////////


    public function nguanyuwomen()
    {

        templates('wxmain', 'nguanyuwomen');
    }

    public function cunkuanlilv()
    {
        templates('wxmain', 'cunkuanlilv');
    }


    public function ddk()
    {

        templates('wxmain', 'nguanyuwomen');

    }


    public function gywm01()
    {

        templates('wxmain', 'guanyu_women');
    }

    public function jrbld()
    {

        templates('wxmain', 'jinrong_bianlidian');
    }


    public function spjs()
    {
        templates('wxmain', 'spjs');
    }

    public function x99991()
    {

        templates('wxmain', '9999999');
    }

    public function tiaozhuan()
    {

//	redirect('wxmain/tiaozhuan');

        templates('wxmain', 'shenqingchenggong');

//	redirect('wxmain/tiaozhuan');
    }

    public function daikuanchuli()
    {


        if ($this->input->post('dosubmit', TRUE)) {


            $data['name'] = $this->input->post('name');
            $data['phone'] = $this->input->post('phone');
            $data['idcard'] = $this->input->post('sfz');//身份证号
            $data['money'] = $this->input->post('dkje');//金额
            $data['use'] = $this->input->post('dkyt');//用途
            $data['address'] = $this->input->post('szdz');//地址
            $data['addtime'] = time();

            //print_r($data);die;
            //提交之后发送短信
            //13526432619
            Phone_Msg(13526432619, $data['phone'] . '用户申请了贷款业务，请及时处理。');
            $res = $this->Loan_model->insert($data);
        }


        if ($res) {

            $result['backurl'] = site_url('wxmain/tiaozhuan');
            $result['message'] = '申请成功';
            $result['ms'] = 5;
            templates('global', 'message', $result);
            exit;
        } else {
            $result['backurl'] = site_url('wxmain/ddk');
            $result['message'] = '申请失败';
            $result['ms'] = 5;
            templates('global', 'message', $result);
        }

    }


    function sendcodes($phone)
    {


        //	判断手机号是否存在
        if (!preg_match("/^13[0-9]{1}[0-9]{8}$|14[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|17[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/", $phone)) {
            $result['status'] = '-1';//手机号格式不对
            exit(json_encode($result));
        }

        Phone_Msg(18236918637, $phone . '用户申请了贷款业务:');

    }


    public function daikuan37()
    {


        templates('wxmain', 'jinyanxiaodaitong');


    }

    public function xdd()
    {


        templates('wxmain', 'xiangdangdang');


    }


    public function bmfw_new()
    {

        templates('wxmain', 'bmfw');
    }

    public function cklc()
    {

        templates('wxmain', 'cklc');
    }

    public function redirec()
    {
        echo "正在加载个人信息";
        templates('wxmain', 'dingdans', $data);
    }

    /*中奖概率*/

    public function rotate()
    {
        /*判断点击次数*/

        $where['openid'] = $_SESSION['openid'];
        $where['addtime <'] = strtotime(date('Ymd')) + 86400;
        $where['addtime >'] = strtotime(date('Ymd'));
        $clicks = $this->commodity_model->get_user_win($where);
        if ($clicks >= 2) {
            exit(json_encode(88)); //次数用完了
        }

        $prize_arr = $this->commodity_model->get_pond();

        /*	$prize_arr = array(
                '0' => array('id'=>1,'prize'=>'1','v'=>1),
                '1' => array('id'=>2,'prize'=>'2','v'=>5),
                '2' => array('id'=>3,'prize'=>'3','v'=>10),
                '3' => array('id'=>4,'prize'=>'4','v'=>34),
                '4' => array('id'=>5,'prize'=>'5','v'=>50),
            );*/

        $actor = 100;

        foreach ($prize_arr as $v) {
            $arr[$v['id']] = $v['v'];
        }
        foreach ($arr as &$v) {
            $v = $v * $actor;
        }
        asort($arr);
        $sum = array_sum($arr);   //总概率
        $rand = mt_rand(1, $sum);
        $result = '';    //中奖产品id
        foreach ($arr as $k => $x) {
            if ($rand <= $x) {
                $result = $k;
                break;
            } else {
                $rand -= $x;
            }
        }
        $res = $prize_arr[$result - 1]['prize']; //中奖项


        $wininfo = $this->commodity_model->get_win($res);

        //echo $num;die;
        if ($wininfo['num'] > 0) {
            $windata['num'] = $wininfo['num'] - 1;
            $this->commodity_model->upd_win($windata, $res);
        } elseif ($wininfo['num'] == 0) {

            $this->commodity_model->del_pond($res);

            $this->rotate();

        }
        /**存进用户中奖表*/
        $uwin['openid'] = $_SESSION['openid'];
        $uwin['gradeid'] = $res;
        $uwin['money'] = $wininfo['money'];
        $uwin['addtime'] = time();
        $this->commodity_model->ins_user_win($uwin);
        exit(json_encode($res));

        //$info['status']=666;


    }

    //POS机申请
    public function posapply(){
    	if($this->input->post('dosubmit',true)){
            $username=$this->input->post('name',true);
            $businessLicense=$this->input->post('businessLicense',true);
            $phone=$this->input->post('phone',true);
            $address=$this->input->post('address',true);
            $szdz=$this->input->post('szdz',true);

            if($username && $businessLicense && $phone && $address && $szdz){
             
                if(preg_match("/^1[34578]{1}\d{9}$/",$phone)){  
                    $data['username']=$username;
                    $data['businessLicense']=$businessLicense;
                    $data['phone']=$phone;
                    $data['address']=$address;
                    $data['szdz']=$szdz;

                    /*$info=$this->posapply_model->getone($data);
                    $info=$this->db->select('*')->from('emr_posapply')->where($data)->get()->row_array();
                    print_r($info);die;*/
                    
                    $query1="select * from emr_posapply where phone=$phone";
                    $result=mysql_query($query1);
                    $info=mysql_fetch_assoc($result);

                    if($info && $info['status']==1){
                        $res['backurl'] = site_url('wxmain/posapply');
                        $res['message'] = '你已经申请过了,请耐心等候';
                        $res['ms'] = 50;
                        templates('global', 'message', $res);
                    }else{
                        $data['time']=time();
                        $data['status']=1;

                        //$row=$this->posapply_model->insert($data);
                        //$row=$this->db->insert('emr_posapply',$data);
                        
                        $keys=join(',',array_keys($data));
						$values='"'.join('","',array_values($data)).'"';
						$sql="insert into emr_posapply ({$keys}) values($values)";
						if(mysql_query($sql)){
						    $row=mysql_insert_id();
						}
                        if($row){
                            Phone_Msg(13937157098, $data['phone'] . '用户申请了POS机业务，请及时处理。');
                            $res['backurl'] = site_url('wxmain/dzyh01');
                            $res['message'] = '申请成功';
                            $res['ms'] = 50;
                            templates('global', 'message', $res);
                        }else{
                            $res['backurl'] = site_url('wxmain/posapply');
                            $res['message'] = '申请失败';
                            $res['ms'] = 50;
                            templates('global', 'message', $res);
                        }
                    }
                }else{
                    $res['backurl'] = site_url('wxmain/posapply');
                    $res['message'] = '请输入正确的手机号';
                    $res['ms'] = 50;
                    templates('global', 'message', $res);
                }
            }else{
                $res['backurl'] = site_url('wxmain/posapply');
                $res['message'] = '必填项不能为空';
                $res['ms'] = 50;
                templates('global', 'message', $res);
            }
        }else{
        	templates('wxmain', 'posapply');
        }
    }


}

