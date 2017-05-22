<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

header('Content-type:text/html;charset=utf-8');

/**
 * 用户登录
 * @author
 * @copyright
 * @version    1.0
 * @param
 * @return
 */
class Nearby extends CI_Controller
{

    /**
     *
     * @author    wangyangyang
     * @copyright    wangyang8839@163.com
     * @version    1.0
     * @param
     * @return
     */
    private $app_id = 'wxdce3470f9e79fc9a';
    private $app_secret = '825561daf1ab5b621674925d49ffd16f';

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Shops_model');
        $this->load->model('Order_model');
        $this->load->model('Shops_service_model');
        $this->load->model('Shops_group_model');
        $this->load->model('Card_model');
        $this->load->model('Wechat_model');
        $this->load->model('Business_model');

    }


    /**
     *
     * @author        wangyangyang
     * @copyright    wangyang8839@163.com
     * @version        1.0
     * @param
     * @return
     */
    public function index($sid = '')
    {


        //	条件
        $where = array();
        //$service	=	$this->Shops_service_model->lists();

        $where['isshow'] = 1;
        $page = isset($page) && $page ? intval($page) : 1;
        $pagesize = 10;

        //	获取数据
        $shops = $this->Shops_model->lists($where, $page, $pagesize, 'updatetime DESC');


        foreach ($shops['info'] as $key => $value) {
            if ($value && $value['service']) {
                $shops['info'][$key]['service'] = explode(',', $value['service']);
            }
        }
        if ($sid) {
            foreach ($shops['info'] as $k => $v) {
                if (in_array($sid, $v['service'])) {
                    $data['info'][] = $v;
                }
            }
        } else {
            $data['info'] = $shops['info'];
        }

        $total = isset($shops['total']) && $shops['total'] ? $shops['total'] : '';
        //	分页
        $pages = '';
        if ($total) {
            $pages = pages($total, $pagesize, '3', '/nearby/index/');
        }
        $data['pages'] = $pages ? $pages : '';
        $data['total'] = $total ? $total : 0;

        $data['abb'] = $this->Shops_group_model->lists123();

        $this->load->vars($data);

        templates('wxmain', 'dingdan', $data);
    }


    public function dianpu($id)
    {


        $this->load->model('Shops_model');
        $where['gid'] = $this->uri->segment(3);

        $data['dpsp'] = $this->Shops_model->lb($where);//echo "string";

        $data['ay'] = $this->Shops_model->newsinfo($id);

        /*获取店铺收藏转态*/
        $res = $this->Shops_service_model->getoneshoucang(array(
            'userid' => $_SESSION['openid'],
            'shopid' => $id
        ));

        $data['status'] = $res;

//店面服务项

        $shops_service = $this->Shops_service_model->lists();

        $data['shops_service'] = $shops_service['info'];
        // echo '<pre>'; print_r($data['shops_service']);die;
        templates('wxmain', 'nearbyshow', $data);
    }

    public function nearbyshow($sid = '')
    {

        seo('店面详情');
        //	条件
        $sid = $sid ? intval($sid) : '';

        $where = array('id' => $sid);
        $data = $this->Shops_model->get_one($where);
        //print_r($data);die;
        // if ( $data && $data['service']) {
        // 		$data['service']	=	explode(',',$data['service']);
        // 	}
        // $service	=	$this->Shops_service_model->lists();

        // foreach ($service['info'] as $keys => $values) {
        // 	foreach ($data['service'] as $key => $value) {
        // 		if($values['id'] == $value){
        // 			$data['serviceh']["$value"] = $values['name'];
        // 		}
        // 	}
        // }
        // $data['seo_title'] = '店面详情';

        $this->load->vars($data);
        templates('wxmain', 'dingdan');
    }

    public function nearbyshow1()
    {

        templates('wxmain', 'nearbyshow');

    }

    public function dingdans($number = '')
    {


        if ($number) {
            //修改订单状态    $_SESSION['data']['ordernum'];
            $data['update_time'] = time();//已付款
            $data['status_user'] = 1;//已付款
            $where['ordernum'] = $number;
            $row = $this->Order_model->update($data, $where);
            /**********获取商户电话*************/


            $res = $this->Order_model->get_shop_phone($number);

//echo '<pre>';print_r($res);die;

            Phone_Msg($res['sphone'], '手机号为' . $res['phone'] . '用户购买了你的' . $res['gname'] . '商品，请及时处理。');


            if ($row > 0) {
                echo '<script>alert("请尽快来取货，感谢您的购买")</script>';
            } else {
                echo '<script>alert("系统错误")</script>';
            }

        }

        $data['noinfo'] = $this->Order_model->lists(array(
            'openid' => $_SESSION['openid'],),'','',array('1','3'));







        //$data6s['sp']   =   $this->Card_model->getshops($where);
        $data['oinfo'] = $this->Order_model->lists(array(
            'openid' => $_SESSION['openid'],
            'status_user' => 0   //未付款60323273

        ));


       // echo '<pre>';print_r($data['noinfo']);die;

        templates('wxmain', 'grzxdingdan', $data);
    }


    public function scsj()
    {

        $this->load->model('Shops_service_model');
        $datas['sinfo'] = $this->Shops_service_model->getshoucang($_SESSION['openid']);
        // echo '<pre>';print_r($datas['sinfo']);
        templates('wxmain', 'shoucang', $datas);
    }


    public function collect()
    {


        /*if(!$_SESSION['openid']){
            $date['msg'] = '操作失败请重新登陆';
            $date['status'] = -1;
            exit(json_encode($date));
        }*/

        $data['shopid'] = $_POST['id'];
        $data['userid'] = $_SESSION['openid'];

        $res = $this->Shops_service_model->getoneshoucang($data);
        if ($res) {
            $this->Shops_service_model->delshoucang($data);


            $date['msg'] = '取消成功';
            $date['status'] = -2;
            exit(json_encode($date));
        }


//print_r($_SESSION);die;

        $insert = $this->Shops_service_model->addshoucang($data);

        if ($insert) {
            $date['msg'] = '收藏店铺成功';
            $date['status'] = 1;
            exit(json_encode($date));
        } else {
            $date['msg'] = '操作失败';
            $date['status'] = -1;
            exit(json_encode($date));
        }
    }

    /*public function duihuan()
    {
        $num = $_GET['num'];
        // echo $num;die;
        if ($num) {
            $data['status_user'] = 3;//已兑换
            $data['exchange_time'] = time();//
            $where['cdkey'] = $num;//
            //$where['openid'] = $_SESSION['openid'];//
            $res = $this->Order_model->update($data, $where);
            if ($res > 0) {
                echo '<script> alert("兑换成功")
                    setTimeout(function(){
                           window.location.href=\'http://weixin.hngynsyh.com/index.php/nearby/duihuan\';
                    },3000)
                </script>';
                //header("location: http://aczm.medtu.com/index.php/nearby/duihuan");
            } else {
                echo '<script> alert("兑换码错误")
                    setTimeout(function(){
                           window.location.href=\'http://weixin.hngynsyh.com/index.php/nearby/duihuan\';
                    },3000)
                </script>';
            }
        }
        //获取用户商铺id信息
        $userinfo = $this->Wechat_model->get_one(array('openid' => $_SESSION['openid']));
        //print_r($userinfo);die;
        if ($userinfo) {
            $data['exchange'] = $this->Order_model->lists(
                array(
                    'status_user' => 1,
                    'shopid' => $userinfo['shop_id']
                ), $page = 1);
        }
        //print_r($data);
        //echo '<pre>';print_r(	$_SESSION['openid']);
        //echo '<pre>';	print_r($data['exchange']);die;
        templates('wxmain', 'dingdan5', $data);
    }*/

    public function duihuanjilu()
    {
        $info = $this->Wechat_model->get_ones($_SESSION['openid'], 'shop_id');
        $data['exchange'] = $this->Order_model->lists(array('shopid' => $info[0]['shop_id'], 'status_user' => 3
        ), $page = 1);
        //print_r($info);
        templates('wxmain', 'dingdan6', $data);

    }

    public function duihuan()
    {
        $num = $_GET['num'];
        $shop_id=$_GET['shop_id'];
        if ($num) {
            $data['status_user'] = 3;//已兑换
            $data['exchange_time'] = time();//
            $where['cdkey'] = $num;//
            $res = $this->Order_model->update($data, $where);
            if ($res > 0) {
                /*$data['exchange'] = $this->Order_model->lists(
                    array('cdkey' => $num,'shopid' => $shop_id), $page = 1);*/
                $info=$this->Order_model->getone(array('cdkey' => $num,'shopid' => $shop_id));
                if($info){
                    $info['status']=1;
                    templates('wxmain', 'changeState',$info);
                }else{
                    $info['status']=3;
                    $info['message']='兑换码和商铺信息不符';
                    templates('wxmain', 'changeState',$info);
                }
                //redirect('nearby/convertsuccess');
            } else {
                $info['status']=2;
                $info['message']='兑换码错误';
                templates('wxmain', 'changeState',$info);
                //redirect('nearby/converterror');
            }
        }else{
            $userinfo = $this->Wechat_model->get_one(array('openid' => $_SESSION['openid']));
            if ($userinfo) {
                $data['exchange'] = $this->Order_model->lists(
                    array('status_user' => 1,'shopid' => $userinfo['shop_id']), $page = 1);
                $data['shop_id']=$userinfo['shop_id'];
                templates('wxmain', 'dingdan5',$data);
            }else{
                redirect('weixin/wechat/userinfo');
            }
        }
    }

    /*//兑换成功
    public function convertsuccess(){
        //获取用户商铺id信息
        $userinfo = $this->Wechat_model->get_one(array('openid' => $_SESSION['openid']));
        if ($userinfo) {
            $data['exchange'] = $this->Order_model->lists(
                array('status_user' => 1,'shopid' => $userinfo['shop_id']), $page = 1);
            if($data['exchange']){
                $data['status']=1;
                templates('wxmain', 'changeState',$data);
            }else{
                redirect('weixin/wechat/userinfo');
            }
        }else{
            redirect('weixin/wechat/userinfo');
        }
    }
    //兑换失败
    public function converterror(){
        $data['status']=2;
        templates('wxmain', 'changeState',$data);
    }*/


    public function jtdianming($id)
    {

        $data['sh'] = $this->Shops_model->getalls($_SESSION['pid']);
        foreach ($data['sh'] as $v) {
            $s_ids[] = $v['id'];
        }
        $data['abb'] = $this->Shops_group_model->lists111($id, $s_ids);

        templates('wxmain', 'xiuxianyangshengxx', $data);
    }

    public function shanji($pid)
    {
        // echo $pid;die;

        $_SESSION['pid'] = $pid;

        $data['sh'] = $this->Shops_model->getalls($pid);
        // echo '<pre>'; print_r($data['sh']);die;
        if (!empty($data['sh'])) {
            foreach ($data['sh'] as $v) {
                $s_ids[] = $v['id'];
            }
        }

        /*echo "<pre/>";
         print_r($s_ids);die;*/

        // $a=array("美食订餐","酒店住宿","休闲养生","生活服务","旅游户外","教育培训","家电装饰","农资供应");
        // $data['ccc']    =   $a;

// print_r($data['ccc']);die;
//var_dump($s_ids);die;

        $data['abb'] = $this->Shops_group_model->lists111(52, $s_ids);
        $data['title'] = $this->Shops_group_model->get($pid);

// print_r($data['title']);die;
//print_r($data['abb']);die;
        templates('wxmain', 'xiuxianyangshengxx', $data);
    }


    public function w_pay($orderid)
    {
        $where['id'] = $orderid;
        $res = $this->Order_model->getone($where);
        $_SESSION['data']['price'] = $res['total'];
        $_SESSION['data']['ordernum'] = $res['ordernum'];//订单号
        $_SESSION['data']['number'] = $res['number'];
        $_SESSION['data']['goods_name'] = $res['gname'];

        if (!$_SESSION['openid']) {
            header('location:http://weixin.hngynsyh.com/nearby/dingdans');
        }
        
        //echo '<pre>';print_r($_SESSION);die;
        header('location:http://weixin.hngynsyh.com/wxpay/example/jsapi.php');
        
    }

    public function del_order($orderid)
    {
        $where['openid'] = $_SESSION['openid'];
        $where['id'] = $orderid;
        $data['status_user'] = 2;    //取消订单
        $this->Order_model->update($data, $where);

        redirect(site_url('nearby/dingdans'));


    }
    public function apply(){

        if($_POST){
            $info['name']=$_POST['name'];
            $info['openid']=$_SESSION['openid'];
            $info['phone']=$_POST['phone'];
            $info['updatetime']=$info['addtime']=time();
            $info['pattern']=$_POST['pattern'];
            $insertid=$this->Business_model->insert($info);
            if($insertid){
                Phone_Msg(15537198938, $info['phone'] . '用户申请了商圈入驻，请及时处理。');
                $result['status']=1;
                $result['info']=$info;
                exit(json_encode($result));

       /*
              $url=  $_SESSION['before_url'] ;


echo "<script>setTimeout(function(){window.location.href='<?php echo $url ;?>';
 },4000)</script>";

                redirect($_SESSION['before_url']);*/



            }else{
                $result['status']=-1;
                exit(json_encode($result));
            }
        }else{

            $res=$this->Business_model->get_one($_SESSION['openid']);


        }



        templates('wxmain', 'apply', $res);
    }
}

