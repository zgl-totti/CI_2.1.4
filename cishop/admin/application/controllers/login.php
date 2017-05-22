<?php
/**
 * 登陆
 *
 *
 */
class Login extends Controller
{
	/**
	 * 构造函数
	 *
	 * 
	 */	
	function __construct()
    {
        parent::Controller();                
    }
    
	// --------------------------------------------------------------------

    /**
	 * 登陆界面
	 *
	 *
	 */	
    function index()
    {
				
		$data = array();

        $this->load->view('_login',$data);
    }
    
    // --------------------------------------------------------------------

    /**
	 * 登陆检验
	 *
	 *
	 */	
	function signin()
	{
        if($this->input->post('act')=='signin'){

			//接受客户端数据
			$name = $this->input->post('name');         //把密码和账号都赋值给model 里面的$name,$password
			$password = $this->input->post('password'); //把密码和账号都赋值给model 里面的$name,$password
                                                        //把密码和账号都赋值给model 里面的$name,$password
			// 把数据提交给模型
	   $this->load->model('admin_user_model');          //把密码和账号都赋值给model 里面的$name,$password
	   $this->admin_user_model->name = $name;           //把密码和账号都赋值给model 里面的$name,$password
	   $this->admin_user_model->password = $password;	//把密码和账号都赋值给model 里面的$name,$password

			if ($user = $this->admin_user_model->signin()){ //调用signin()方法;

               // session记录登陆者信息
               $users = array(                             //把当前用户的信息放到sessio里面
                   'name'  => $user['name'],               //把当前用户的信息放到sessio里面
				   'id'  => $user['id'],                   //把当前用户的信息放到sessio里面
				   'role_id'  => $user['role_id'],         //把当前用户的信息放到sessio里面
				   'action_list'  => $user['action_list'], //把当前用户的信息放到sessio里面
                   'logged_in' => TRUE                     //把当前用户的信息放到sessio里面
               );                                          //把当前用户的信息放到sessio里面
               $this->session->set_userdata($users);       //把当前用户的信息放到sessio里面

			   echo 1;
			   //redirect('frameset');

			// 用户名称和密码不匹配
			}else{
				echo 2;
				//show_message2('用户名称或者密码错误!', 'login');
			}
        
		//非法登陆
		}else{
			redirect('login');
		}
	}

}
