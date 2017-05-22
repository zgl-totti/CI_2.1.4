<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Will_move_text_module extends CI_Extension {
	
	public function __construct() {
		parent::__construct();
		
		$this->document->addScript('public/min?b='.(SUBPATH == '/' ? '' : SUBPATH).'public/module/will_move_text&f=jquery.lettering.js,jquery.textillate.js');
		//$this->document->addScript('public/min?f=public/module/will_move_text/jquery.textillate.js');
		$this->document->addStyle('public/min?f='.(SUBPATH == '/' ? '' : SUBPATH).'public/module/will_move_text/animate.css');
		
	}

	public function index($setting=FALSE)
	{
		if($setting){
			
			$setting['content']=explode(';', $setting['content'][$_SESSION['language_id']]);
			$data['setting']=$setting;
			return $this->load->view('theme/default/template/extension/module/will_move_text_module', $data, TRUE);
		}else{
			return FALSE;
		}
		
	}
}