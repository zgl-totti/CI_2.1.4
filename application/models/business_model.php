<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header('Content-type:text/html;charset=utf-8');

/**
 * 专家管理
 * @author        wangyangyang
 * @copyright    wangyang8839@163.com
 * @version        1.0
 * @param
 */
class Business_model extends CI_Model
{
	private $db;
	public $table_name;

	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('default', TRUE);

		$this->table_name = 'business';
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
		//
		$insert_id = $this->db->insert_id();
		Return $insert_id;
	}



	final public function get_one( $openid = '' ){

		if ( !$openid ) Return false;

		$userInfo['info']	=	$this->db->select('*')
			->get_where($this->table_name,array('openid'=>$openid))
			->row_array();
	//	echo $this->db->last_query();die;
		Return $userInfo ? $userInfo :0;
	}






}