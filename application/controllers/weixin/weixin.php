
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

define('TOKEN', 'yishengjulebu'); 

class Main extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// CI 2.0 以前需要这句话才可以获取 GET 参数，
		// 2.0 及新版则不需要，这里和微信公众平台无关
		parse_str($_SERVER['QUERY_STRING'], $_GET);
	}

	public function checkSignature(){
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ){
			templates('weixin/main','checkSignature');
		}else{
			echo 1;
		}
	}

	// 在微信平台上设置的对外 URL
	public function message(){
		if ($this->_valid()) {
			// 判读是不是只是验证
			$echostr = $this->input->get('echostr');
			if (!empty($echostr)) {
				$this->load->view('valid_view', array('output' => $echostr));
			}else{
				// 实际处理用户消息
				$this->_responseMsg();
			}
		}else{
			$this->load->view('valid_view', array('output' => 'Error!'));
		}
	}

	// 用于接入验证
	private function _valid(){
		$token = TOKEN;
		$signature = $this->input->get('signature');
		$timestamp = $this->input->get('timestamp');
		$nonce = $this->input->get('nonce');
		$tmp_arr = array($token, $timestamp, $nonce);
		sort($tmp_arr);
		$tmp_str = implode($tmp_arr);
		$tmp_str = sha1($tmp_str);
		return ($tmp_str == $signature);
	}

	// 这里是处理消息的地方，在这里拿到用户发送的字符串
	private function _responseMsg(){
		$post_str = file_get_contents('php://input');
		if (!empty($post_str)) {
			// 解析微信传过来的 XML 内容
			$post_obj = simplexml_load_string($post_str, 'SimpleXMLElement', LIBXML_NOCDATA);
			$from_username = $post_obj->FromUserName;
			$to_username = $post_obj->ToUserName;
			// $keyword 就是用户输入的内容
			$keyword = trim($post_obj->Content);
			if (!empty($keyword)) {
				// 文本类型的消息，本示例只支持文本类型的消息
				$type = "text";
				$content = $this->_parseMessage($keyword);
				$data = array(
					'to' => $from_username,
					'from' => $to_username,
					'type' => $type,
					'content' => $content,
				);
				$this->load->view('response_view', $data);
			}else{
				$type = "text";
				$content = "说点什么吧～呵呵～";
				$data = array(
					'to' => $from_username,
					'from' => $to_username,
					'type' => $type,
					'content' => $content,
				);
				$this->load->view('response_view', $data);
			}
		}else{
			$this->load->view('valid_view', array('output' => 'Error!'));
		}
	}

	// 解析用户输入的字符串
	private function _parseMessage($message){
		log_message('debug', $message);
		// TODO: 在这里做一些字符串解析，比如分析某关键字，返回什么信息等等
		return '解析后的结果，会直接回复给用户';
	}
}


/* End of file weixin.php */
/* Location: ./application/controllers/weixin.php */
