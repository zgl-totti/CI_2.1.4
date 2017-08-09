<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH.'libraries/uptoscioauth.class.php');

/**
* api接口文献相关处理
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Pubmed extends CI_Controller {

	private $_client;		//	实例化接口

	/**
	* 
	* @author	
	* @copyright	
	* @version	1.0
	* @param
	*/
	public function __construct(){
		parent::__construct();
		//	uri类
		$this->_baseurl		=	base_url();
		$this->_client		=	clientAPI();
		$this->load->model('Comment_model');
		$this->load->model('Token_model');
		$this->load->model('Member_model');
		
	
		if ( !$this->_client ) {
			$this->_client	=	gettoken();
		}
	}
	
	/**
	* 业内新闻
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function index( ){
		$page   =   isset($_POST['page']) ? intval($_POST['page']) : 1;
		
		$data	=	$this->_client->news($page);
		
		$result	=	array();
		$result['status']	=	'-1';
		if (!$data) {
			exit(json_encode($result));
		}
		
		 //  处理 $data 中的时间
        foreach ($data['info'] as $key => $value) {
            $data['info'][$key]['inputtime']    =   $value['inputtime'] ? 
				date('Y.m.d',$value['inputtime']) : date('Y.m.d');
        }

		$result['status'] = 1;
        $result['info'] = $data;
		
		exit(json_encode($result));
	}
	

	/**
	* 业内新闻详情
	* @author	
	* @copyright	
	* @version	1.0
	* @param
	*/
	public function newsshow( ){
		$id   =   isset($_POST['id']) ? intval($_POST['id']) : '';

		$result	=	array();
		$result['status']	=	'-1';
		if ( !$id ) {
			exit(json_encode($result));
		}

		$data	=	$this->_client->newsshow($id);
		
		if (!$data) {
			exit(json_encode($result));
		}
		
		$data['inputtime']  =   isset($data['inputtime']) ? date('Y.m.d',$data['inputtime']) 
			: date('Y.m.d');

        $result['status']   =   1;
        $result['info']     =   $data;
		exit(json_encode($result));
	}
	
	/**
     * 最新咨询
     *  
     * @author 
     * @copyright 2f89a118018706390b4fc4bb351394db
     * @version 
     * @return json格式数据
     * @version 
     */
    function reports(){
        $office     =   isset($_POST['office'])  ? trim($_POST['office']) : '';

        if ( !$office || is_numeric($office) ) {
            $office    =   'neurology';
        }
        
        $page   =   isset($_POST['page']) ? intval($_POST['page']) : 1;

        $data   =   $this->_client->reprots_list($office,$page);
           
        $result     =   array();
        $result['status'] = '-1';
        if( !$data ){
            exit(json_encode($result));
        }

        foreach ($data['info'] as $key => $value) {
            $data['info'][$key]['inputtime']    =   $value['inputtime'] ? date('Y.m.d',$value['inputtime']) : date('Y.m.d');
        }

        $result['status']   =   1;
        $result['info']     =   $data;
        exit(json_encode($result));
    }

	/**
     * 最新咨询详情
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function reportsshow(){
        $id   =   isset($_POST['id']) ? intval($_POST['id']) : '';

        $result     =   array();
        $result['status']   =   '-1';
        if ( !$id ) {
            exit(json_encode($result));
        }

        $data   =   $this->_client->reprots_show($id);
         
        if ( !$data ) {
            exit(json_encode($result));
        }

        $data['inputtime']  =   $data['inputtime'] ? date('Y.m.d',$data['inputtime']) : date('Y.m.d');
        $result['status']   =   1;
        $result['info']     =   $data;
		
        exit(json_encode($result));
    }

	/**
     * 最新咨询学科分类
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function departments(){
        $result     =   array();
 
        $data[0] = array('all' => '全部');
        //内科
        $data[1] = array('hematology' => '血液科' , 'neurology' => '神经科' , 'eye' => '眼科' , 'gynecology' => '妇产科', 
        'cardiovascular' => '心血管内科', 'spirit' => '精神心理科', 'oncology'=>'肿瘤科','gastroenterology'=> '消化内科',
        'gastroenterology'=> '消化内科' , 'dermatology' => '皮肤科', 'pathology' => '病理科', 'infectious' => '感染科', 
        'breathing' => '呼吸科','oral' => '口腔科','orthopedics' => '骨科', 'endocrine'  => '内分泌科',
        'nephrology' => '肾内科','comprehensive'=> '内科综合',
        );
        //外科
        $data[2] = array('ent'=>'耳鼻喉科','urology' => '泌尿外科','vascular' => '血管外科','rheumatology' => '风湿科',
        'general' => '普外科','cardiothoracic' => '心胸外科','neurosurgery' => '神经外科',
        'cardiac' => '心脏外科','hepatobiliary'=> '肝胆外科', 'venereology'=> '性病科',
        'gastrointestinal' => '胃肠外科','surgical' => '外科','minimally' => '微创外科',
        );
        //临床专科
        $data[3] = array('pediatrics' => '儿科','emergency' => '急诊科','anesthesiology' => '麻醉科','radiology' => '影像科',
        'nursing' => '护理科','ultrasound' => '超声科','radiologists' => '放射科','plastic' => '整形科',
        'reproductive' => '生殖医学', 'geriatrics' => '老年病科','intensive' => '重症监护', 'pain' => '疼痛科',
        'blood' => '输血科','burn' => '烧伤科','andrology' => '男科','nutrition' => '营养科','rehabilitation'=> '康复科',
        'laboratory'=> '检验科', 'traditional' => '中医科','pharmacy'=> '药剂科',
        );
		$result['status'] =   1;
        $result['info'] =   $data;
		
        exit(json_encode($result));
    }


	/**
     * 期刊科室列表
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function medical(){
        $data   =   array();
       
        $data   =   $this->_client->medical();
            
        $result             =   array();
        $result['status']   =   1;
        $result['info']     =   $data;
		
        exit(json_encode($result));
    }


	 /**
     * 科室对应的期刊信息
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function journallist(){
        $office_id  =   isset($_POST['id']) ? trim($_POST['id']) : '';
        
        $result     =   array();
        $result['status']   =   '-1';

        if ( !$office_id ) {
            exit(json_encode($result));
        }

        $data   =   $this->_client->journallist($office_id);;
           
        if( !$data ){
            exit(json_encode($result));
        }

        $result['status']   =   1;
        $result['info']     =   $data;
		
        exit(json_encode($result));
    }

	/**
     * 期刊下的文献信息
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function periodicalShow(){
        $id  =   isset($_POST['id']) ? trim($_POST['id']) : '';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$id ) {
            exit(json_encode($result));
        }

        $page   =   isset($_POST['page']) ? intval($_POST['page']) : 1;

        $data   =   array();
       
        $data   =   $this->_client->periodicalshow($id,$page);

        if( !$data ){
            exit(json_encode($result));
        }

        $result['status']   =   1;
        $result['info']     =   $data;
		
        exit(json_encode($result));
    }

	/**
     * 文献详情
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function showliter(){
        $id  =   isset($_POST['id']) ? trim($_POST['id']) : '';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$id ) {
            exit(json_encode($result));
        }

        $data   =   array();
       
        $data   =   $this->_client->showdetail($id);
           
        if( !$data ){
            exit(json_encode($result));
        }
        $result['status']   =   1;
        $result['info']     =   $data;
		
        exit(json_encode($result));
    }


	/**
     * 文献详情
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function apishowliters( $id ){
      
        $result     =   array();
       
        $data   =   array();
       
        $data   =   $this->_client->showdetail($id);
           
		
		$this->load->vars($data);
		templates('pubmed','apishowliters');
    }

	/**
     * 文献详情评论
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function showliterscomment( $id ){
        $result     =   array();
       
        $data   =   array();
       
		$data   =   $this->_client->comment($id,1);
		
		$this->load->vars($data);
		templates('pubmed','showliterscomment');
    }

	/**
     * 文献搜索
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function search(){
        $keywords   =   isset($_POST['q']) ? trim($_POST['q']) : '';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$keywords ) {
            exit(json_encode($result));
        }

        $page   =   isset($_POST['page']) ? intval($_POST['page']) : 1;

        $data = $this->_client->search($keywords,$page);

        //此处多此一举是为了屏蔽掉接口方中文跟英文返回数据不一样的BUG 
        if(isset($data["info"]) && !isset($data["infos"])){
            $data["infos"] = $data["info"];
            unset($data['info']);
        }

        if( !$data ){
            exit(json_encode($result));
        }

        if ( isset($data['infos']) && $data['infos'] ) {
            $data['infos']  =   array_values($data['infos']);
        }
        


        $result['status']   =   1;
        $result['info']     =   $data;
        exit(json_encode($result));
    }


	/**
     * 疾病，药物搜索
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    function searchdo(){
        $keywords   =   isset($_POST['q']) ? trim($_POST['q']) : '';
		$type		=   isset($_POST['type']) ? intval($_POST['type']) : '';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$keywords ) {
            exit(json_encode($result));
        }

        $page   =   isset($_POST['page']) ? intval($_POST['page']) : 1;

        $data = $this->_client->searchdrugs($keywords,$page,$type);

        if( !$data ){
            exit(json_encode($result));
        }

        $result['status']   =   1;
        $result['info']     =   $data;
        exit(json_encode($result));
    }


	/**
     * 获取评论列表信息
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    public function comment(){
        // 文献pmid 、 报道id 、业内新闻id
        $id     =   isset($_POST['id']) ? trim($_POST['id']) : '';

        // 评论分类 1：文献 2：报道 3：业内新闻
        $type   =   isset($_POST['type']) ? intval($_POST['type']) : '1';

        // 分页
        $page   =   isset($_POST['page']) ? intval($_POST['page']) : '1';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$type || !in_array($type,array(1,2,3))) {
            exit(json_encode($result));
        }
        
        if ( !$id || !is_numeric($id)) {
            exit(json_encode($result));
        }

        $page   =   max($page,1);

        $data   =   array();

        $data   =   $this->_client->comment($id,$type,$page);
        
        if( !$data ){
            $result['status']   =   -2;
            exit(json_encode($result));
        }
        if (isset($data['data']) && $data['data']) {
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]['content']  =   htmlspecialchars_decode(str_replace('&nbsp;',' ',$value['content']));           
            }
        }

        $result['status']   =   1;
        $result['info']     =   $data;
        exit(json_encode($result));
    }


	/**
	* 药物详情
	* @author	
	* @copyright	
	* @version	1.0
	* @param
	*/
	public function drugsshow( ){
		$id   =   isset($_POST['id']) ? intval($_POST['id']) : '';

		$result	=	array();
		$result['status']	=	'-1';
		if ( !$id ) {
			exit(json_encode($result));
		}

		$data	=	$this->_client->drugsshow($id);
		
		if (!$data) {
			exit(json_encode($result));
		}
		
        $result['status']   =   1;
        $result['info']     =   $data;
		exit(json_encode($result));
	}

	/**
	* 疾病详情
	* @author	
	* @copyright	
	* @version	1.0
	* @param
	*/
	public function diseaseshow( ){
		$id   =   isset($_POST['id']) ? intval($_POST['id']) : '';

		$result	=	array();
		$result['status']	=	'-1';
		if ( !$id ) {
			exit(json_encode($result));
		}

		$data	=	$this->_client->diseaseshow($id);
		
		if (!$data) {
			exit(json_encode($result));
		}
		
        $result['status']   =   1;
        $result['info']     =   $data;
		exit(json_encode($result));
	}


	/**
     * 添加评论信息
     * 
     * @author 
     * @copyright 
     * @version 
     * @return json格式数据
     */
    public function addcomment(){
        // 文献pmid 、 报道id 、业内新闻id
        $id     =   isset($_POST['id']) ? trim($_POST['id']) : '';

        // 评论分类 1：文献 2：报道 3：业内新闻
        $type   =   isset($_POST['type']) ? intval($_POST['type']) : '1';

        // 评论内容
        $content   =   isset($_POST['content']) ? trim($_POST['content']) : '';

        $result     =   array();
        $result['status']   =   '-1';

        if ( !$type || !in_array($type,array(1,2,3))) {
            exit(json_encode($result));
        }
        
        if ( !$id || !is_numeric($id)) {
            exit(json_encode($result));
        }

        if ( !$content ) {
            exit(json_encode($result));
        }
		
		$token     =   isset($_POST['token']) ? $_POST['token'] : '';

		//  检测token
        $uid    =   $this->checkToken($token);
        

        $data   =   array();
        
        $data   =   $this->_client->addcomment($id,$content,$type);

        if( !$data ){
            $result['status']   =   -2;
            exit(json_encode($result));
        }

        if (isset($data['data']) && $data['data']) {
            foreach ($data['data'] as $key => $value) {
                $data['data'][$key]['content']  =   htmlspecialchars_decode(str_replace('&nbsp;',' ',$value['content']));           
            }
        }
//如果登录存储的本地数据库
		
		// 判断该id是否存在记录
        $userid  =   $this->Member_model->userinfo('userid = '.$uid);
		
        if($userid){
			//	基本信息
			$info['userid']		=	$uid;
			$info['add_time']	=	time();
			$info['type']		=	$type;
			$info['linkid']		=	$id;
			$info['content']	=   $content;
			$info['title']		=	$data['title'];
			//	数据保存
			$insert_id	=	$this->Comment_model->add($info);
        }
        
        $result['status']   =   1;
        $result['info']     =   $data;
        exit(json_encode($result));
    }
    /**
     * 获取我的评论列表信息
     *
     * @author
     * @copyright
     * @version
     * @return json格式数据
     */
    public function mycomment(){

    
    	// 分页
    	$page   =   isset($_POST['page']) ? intval($_POST['page']) : '1';
    	$token     =   isset($_POST['token']) ? $_POST['token'] : '';
    	
    	//  检测token
    	$uid    =   $this->checkToken($token);

    	$result     =   array();
    	$result['status']   =   '-1';

    	if ( !$token || !isset($token)) {
    		exit(json_encode($result));
    	} 
    
    	$page   =   max($page,1);
    
    	$data   =   array();
    	$where['userid']=$uid;
    	//$data   =   $this->_client->comment($id,$type,$page);
    	$data   =	   $this->Comment_model->lists($where);
    	
    	if( !$data ){
    		$result['status']   =   -2;
    		exit(json_encode($result));
    	}

		$info	=	$data['info'];
		$total	=	$data['total'];
		foreach($info AS $key => $val){
			unset($info[$key]['userid']);
			$info[$key]['add_time']	=	date('Y.m.d',$val['add_time']);
		}
		
    	
    	$result['status']   =   1;
    	$result['info']     =   $info;
		$result['total']	=	$total;
	
    	exit(json_encode($result));
    }

   
    
	/**
     * 检测token
     * @param  string $token token
     * @return bool  
     */
    private function checkToken( $token ){
        if (!$token ) {
            return false;
        }

			
            $where           =  array();
            $where['token']  =  $token;

            $uinfo  =   $this->Token_model->getInfo($token);
            
            $uid    =   $uinfo ? $uinfo['userid'] : '';
     
        return $uid;
    }




	/**
	* 我的文献求助
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function helplist(){
		$token	=   isset($_POST['token']) ? $_POST['token'] : '';
		
		$page	=	isset($_POST['page']) ? intval($_POST['page']) : 1;
		$result	=   array();
        $result['status']   =   '-1';
		if ( !$token ) {
			exit(json_encode($result));
		}
	
		//  检测token
        $uid    =   $this->checkToken($token);
        
		if ( !$uid ) {
			exit(json_encode($result));
		}

		$this->load->model('Help_model');
		$where['userid']	=	$uid;
		$info	=	$this->Help_model->lists($where,$page);
		
		if (!$info) {
			$result['status']	=	0;
			exit(json_encode($result));
		}

		//	获取求助状态
		$pmids	=	extractArray( $info['info'], 'pmid' );
		$impmid	=	implode(',',$pmids);
		$pinfo	=	$this->_client->gethelps($impmid);
		
		if ($pinfo) {
			$pinfo	=	isset($pinfo['info']) ? $pinfo['info'] : array();
		}
		if ($pinfo) {
			$pinfo	=	handleArrayKey( $pinfo , 'pmid' );
		}
		foreach($info['info'] AS $key => $val){
			if (isset($pinfo[$val['pmid']])) {
				$info['info'][$key]['status']	=	$pinfo[$val['pmid']]['helpersatus'];
			}else{
				$info['info'][$key]['status']	=	0;
			}
		}

		$info['status']	=	1;
		exit(json_encode($info));
	}

	/**
	* 添加求助
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function helpadd(){
		$token	=   isset($_POST['token']) ? $_POST['token'] : '';
		$pmid	=	isset($_POST['pmid']) ? $_POST['pmid'] : '';

		$result     =   array();
        $result['status']   =   '-1';
		if ( !$token || !$pmid ) {
			exit(json_encode($result));
		}
	
		//  检测token
        $uid    =   $this->checkToken($token);

		if (!$uid) {
			exit(json_encode($result));
		}
		$this->load->model('Member_model');
		$info  =   $this->Member_model->userinfo('userid = '.$uid);

		if ( !$info ) {
			exit(json_encode($result));
		}

		$mobile	=	$this->input->post('mobile') ? $this->input->post('mobile') : '';
		
		$mobile	=	$mobile ? $mobile : $info['mobile'];

		if (!$mobile || !is_mobile($mobile)) {
			exit(json_encode($result));
		}

		$data   =   $this->_client->reghelp($pmid,$mobile);

		if ( isset($data['error']) ) {
			$result['status']	=	'-2';
			$result['error']	=	$data['error'];
			exit(json_encode($result));
		}
		
		$pinfo   =   $this->_client->showdetail($pmid);

		$this->load->model('Help_model');
		$in	=	array();
		$in['userid']	=	$uid;
		$in['pmid']		=	$pmid;
		$in['title']	=	$pinfo['title'];
		$in['addtime']	=	time();
		$this->Help_model->add($in);

		$result['status']	=	1;
		exit(json_encode($result));
	}

	/**
	* 取消求助
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function helpcancel(){
		$token	=   isset($_POST['token']) ? $_POST['token'] : '';
		$pmid	=	isset($_POST['pmid']) ? $_POST['pmid'] : '';

		$result     =   array();
        $result['status']   =   '-1';
		if ( !$token || !$pmid ) {
			exit(json_encode($result));
		}
	
		//  检测token
        $uid    =   $this->checkToken($token);

		if (!$uid) {
			exit(json_encode($result));
		}
		$this->load->model('Member_model');
		$info  =   $this->Member_model->userinfo('userid = '.$uid);

		if ( !$info ) {
			exit(json_encode($result));
		}

		$data   =   $this->_client->cancelhelp($pmid);

		if ( isset($data['error']) ) {
			$result['status']	=	'-2';
			$result['error']	=	$data['error'];
			exit(json_encode($result));
		}
		
		$this->load->model('Help_model');
		$where	=	array();
		$where['pmid']	=	$pmid;
		$where['userid']=	$uid;
		$this->Help_model->deletes($where);

		$result['status']	=	1;
		exit(json_encode($result));
	}


	/**
	* 获取全文下载地址
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function getfull(){
		$pmid	=	isset($_POST['pmid']) ? $_POST['pmid'] : '';

		$result     =   array();
        $result['status']   =   '-1';
		if ( !$pmid ) {
			exit(json_encode($result));
		}
		
		$data   =   $this->_client->getfull( $pmid );

		if ( !isset($data['url'])) {
			exit(json_encode($result));
		}

		$result['status']	=	1;
		$result['url']		=	$data['url'];
		exit(json_encode($result));
	}
}

