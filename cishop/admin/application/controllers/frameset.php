<?php
/**
 * 框架
 *
 *
 */
class Frameset extends Controller
{
	/**
	 * 构造函数
	 *
	 * 登陆检验
	 */	
	function __construct()
    {
        parent::Controller();
		if (!$this->session->userdata('logged_in')){       //如果没有设置这个session就跳走     		
			redirect('login');                             //如果你访问的项不存在，userdata() 方法返回 NULL 。
			exit();
		}
    }

	// --------------------------------------------------------------------

    /**
     * 框架集
     *
     */
    function index()
    {
        $this->load->view('_frameset');
    }

    // --------------------------------------------------------------------
    
    /**
     * 顶部菜单
     *
     */
    function top()
    {
        $this->load->view('_top');
    }

    // --------------------------------------------------------------------
    
    /**
     * 左侧菜单
     *
     */
    function menu($type = 'dashboard')
    {
		switch($type){
            case 'dashboard' : $this->load->view('_dashboard_menu'); break;
			case 'sales' : $this->load->view('sales/menu'); break;
			case 'product' : $this->load->view('product/menu'); break;
			case 'customer' : $this->load->view('customer/menu'); break;
			case 'system' : $this->load->view('system/menu'); break;
		}
    }

}