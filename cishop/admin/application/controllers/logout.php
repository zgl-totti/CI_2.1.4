<?php
/**
 * 注销
 *
 *
 */
class Logout extends Controller
{
	function __construct()
    {
        parent::Controller();                 //  调用此函数就能清除 session  且跳转到登录页面
		$this->session->sess_destroy();
		redirect('login');
    }
   
}
?>