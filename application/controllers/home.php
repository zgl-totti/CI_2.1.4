<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
* 登录后首页
* @author		
* @copyright	
* @version	1.0
* @param
* @return
*/
class Home extends CI_Controller {
	
	//	权限验证
	//public $before_filter	=	'checkuser';

	//	用户id
	public $userid;

	public $userinfo;

	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function __construct(){
		parent::__construct();

		$userid	=	$this->input->cookie('user',true);
		$this->userid	=	$userid ? aesDecode($userid) : '';
        $this->load->model('Assess_model');
		$this->load->model('Patients_model');
		$this->load->model('Member_model');
		$this->userinfo = $this->Member_model->userinfo($this->userid);
	}

	/**
	* 病例库列表
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function index( $page = '' ){
		seo('信息管理');
		//	条件
		$where	=	array();
		//	筛查中心账户
		if ( $this->userinfo['group'] == 3 ) {
			$where['result']	=	$this->userinfo['result'];
		}elseif( $this->userinfo['group'] == 1){
			
		}elseif( $this->userinfo['group'] == 2){
			
		}elseif( $this->userinfo['group'] == 6){
			$where['result']	=	$this->userinfo['result'];
		}else{
			$where['userid']	=	$this->userid;
		}
		$where['status']	=	99;

		$page		=	isset($page) && $page ? intval($page) : 1;
		$pagesize	=	10;
		
		//	获取数据
		$data	=	$this->Patients_model->lists($where,$page,$pagesize,'update_time DESC');
		$total	=	isset($data['total']) && $data['total'] ? $data['total'] : '';
		//	分页
		$pages		=	'';
		if ( $total ) {
			$pages	=	pages($total ,$pagesize,'3','/home/index/');
		}
		$data['pages']	=	$pages ? $pages : '';
		$data['total']	=	$total ? $total : 0;
		$data['group']	=	$this->userinfo['group'];

		$this->config->load('patients', TRUE);
        $configs	=	$this->config->item('patients');
		$hos		=	array();
		$hos		=	array_merge($hos,$configs['result1'],$configs['result2'],
			$configs['result3'],$configs['result4'],$configs['result5'],
			$configs['result6'],$configs['result7'],$configs['result8'],
			$configs['result9'],$configs['result10'],$configs['result11'],
			$configs['result12']);
		$data['hospital']	=	$hos;
		$this->load->vars($data);
		templates('home','index');
	}

	/**
	* 添加患者
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function add(){
		//	项目办，数据录入员有新建权限
		if ( !in_array($this->userinfo['group'],array(1,4)) ) {
			redirect('home');
			exit;
		}
		if ( isset($_POST['dosubmit']) && $_POST['dosubmit'] ) {
			$data	=	$this->input->post(NULL,TRUE);
			$info	=	array();
			$info	=	$this->postdata($data);
			//	基本信息
			$info['status']		=	99;
			$info['add_time']	=	time();
			$info['update_time']=	time();
			$info['userid']		=	$this->userid;
            $userinfo = $this->userinfo;

			//	数据保存
			$insert_id	=	$this->Patients_model->add($info);
			
			if ( $info['result'] ) {
				$cookies = array(
					'name'   => 'hospitalnum',
					'value'  => $info['result'],
					'expire' => '1209600'
				);
				$this->input->set_cookie($cookies); 
			}

			if ( $info['results'] ) {
				$cookies = array(
					'name'   => 'hospitalnums',
					'value'  => $info['results'],
					'expire' => '1209600'
				);
				$this->input->set_cookie($cookies); 
			}

			$result		=	array();
			if ( $insert_id ) {
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('home/edit/'.$insert_id);
				$result['message']	=	'添加成功';
				templates('global','message',$result);
				exit;
			}else{
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('home/add');
				$result['message']	=	'添加失败，请重新添加';
				templates('global','message',$result);
				exit;
			}

		}else{
			//	数据模型配置信息
			$this->config->load('patients', TRUE);
			$configs	=	$this->config->item('patients');

			$this->load->vars($configs);

			$hospitalnum	=	$this->input->cookie('hospitalnum',true);
			$hospitalnums	=	$this->input->cookie('hospitalnums',true);

			$data	=	array();
			$data['hospitalnum']	=	$hospitalnum;
			$data['hospitalnums']	=	$hospitalnums;
			$this->load->vars($data);

			seo('添加基本信息');
			templates('home','add_patients');
		}
	}

	/**
	* 编辑患者基本信息
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function edit($id = ''){
		if ( isset($_POST['dosubmit']) && $_POST['dosubmit'] ) {
			//	项目办，数据录入员有新建权限
			if ( !in_array($this->userinfo['group'],array(1,4,5)) ) {
				redirect('home');
				exit;
			}

			$data	=	$this->input->post(NULL,TRUE);
			//	患者id
			$pid	=	$this->session->userdata('patentis');
			if ( !$pid ) {
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('home');
				$result['message']	=	'请确认您的操作';
				templates('global','message',$result);
				exit;
			}
			$info	=	array();
			$info	=	$this->postdata($data);
			$info['update_time']	=	time();
			$where		=	array();
			//	基本信息
			$where['id']		=	$pid;
			$where['userid']	=	$this->userid;
			
			//	数据保存
			$uprows		=	$this->Patients_model->update($info,$where);

			$result		=	array();
			if ( $uprows ) {
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('home/edit/'.$pid);
				$result['message']	=	'修改成功';
				templates('global','message',$result);
				exit;
			}else{
				$result['ms']		=	3000;
				$result['backurl']	=	site_url('home/edit/'.$pid);
				$result['message']	=	'修改失败,或者您未修改任何数据';
				templates('global','message',$result);
				exit;
			}
		}else{
			if ( !$id ) {
				redirect('home');
				exit;
			}
			//	判断是否为当前登录医生的患者
			$where	=	array();
			$where['id']	=	$id;

			//	筛查中心账户
			if ( $this->userinfo['group'] == 3 ) {
				$where['result']	=	$this->userinfo['result'];
			}elseif( $this->userinfo['group'] == 1){
				
			}elseif( $this->userinfo['group'] == 2){
				
			}elseif( $this->userinfo['group'] == 6){
				
			}else{
				$where['userid']	=	$this->userid;
			}

			$where['status']=	99;
			$info	=	$this->Patients_model->get_one($where);

		      //	如果未查找到数据，则直接跳转到home页
			if ( !$info ) {
				$message			=	array();
				$message['ms']		=	3000;
				$message['backurl']	=	site_url('home');
				$message['message']	=	'未查找到相关数据';
				templates('global','message',$message);
				exit;
			}
			//	存储患者id到session
			$this->session->set_userdata('patentis', $id);

			$info['symptoms']	=	$info['symptoms'] ? explode(',',$info['symptoms']) : 
				array();
			$info['distr']		=	$info['distr'] ? explode(',',$info['distr']) : 
				array();

			$data			=	array();
			$data['info']	=	$info;
			$data['usergroup']	=	$this->userinfo['group'];
			$this->load->vars($data);
                        //	数据模型配置信息
                        $this->config->load('patients', TRUE);
                        $configs	=	$this->config->item('patients');

                        $this->load->vars($configs);
			seo('编辑基本信息');
			templates('home','edit_patients');
		}
	}


	/**
	* 前台提交数据处理
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	private function postdata($data){
		$info	=	array();
		//	医院编号
		$info['result']	=	isset($data['result']) && $data['result'] ? 
			$data['result'] : '';

		if ($info['result']) {
			$num	=	$info['result'];
			$info['results']	=	isset($data['result'.$num]) && $data['result'.$num] ? 
			$data['result'.$num] : '';
		}else{
			$info['results']	=	'';
		}
        //	门诊号
		$info['hnumber']	=	isset($data['hnumber']) && $data['hnumber'] ? 
			$data['hnumber'] : '';
		//	住院号
		$info['ad']	=	isset($data['ad']) && $data['ad'] ? 
			$data['ad'] : '';
		//	姓名
		$info['names']	=	isset($data['names']) && $data['names'] ? 
			$data['names'] : '';
		//	性别
		$info['sex']		=	isset($data['sex']) && $data['sex'] ? 
			intval($data['sex']) : '0';
		if ($info['sex'] && $info['sex'] > 2 ) {
			$info['sex']	=	'0';
		}
		//	年龄
		$info['age']=	isset($data['age']) && $data['age'] ? intval($data['age']) : '0';
		//	糖尿病
		$info['mellitus']		=	isset($data['mellitus']) && $data['mellitus'] ? 
			intval($data['mellitus']) : '0';
                if ($info['mellitus'] && $info['mellitus'] > 2 ) {
			$info['mellitus']	=	'0';
		}
                
		//	主要症状
		$info['symptoms']		=	isset($data['symptoms']) && $data['symptoms'] ? 
			implode(',',$data['symptoms']) : '';
		
		//	主要症状其他
		$info['symptomsother']	=	isset($data['symptomsother']) && $data['symptomsother'] ? 
			$data['symptomsother'] : '';
        //	分布方式
		$info['distr']		=	isset($data['distr']) && $data['distr'] ? 
			implode(',',$data['distr']) : '';
        //	判断神经病变症状
		$info['changes']	=	isset($data['changes']) && $data['changes'] ? 
			intval($data['changes']) : '0';
        //	骨科相关病史
		$info['bone']		=	isset($data['bone']) && $data['bone'] ? 
			intval($data['bone']) : '0';
		if ($info['changes'] && $info['changes'] > 2 ) {
			$info['bone']	=	'0';
		}
		// 骨科相关病史其他
		$info['boneother']	=	isset($data['boneother']) && $data['boneother'] ? 
			$data['boneother'] : '';

        //	神经内科相关病史
		$info['nerve']		=	isset($data['nerve']) && $data['nerve'] ? 
			intval($data['nerve']) : '0';
		if ($info['changes'] && $info['changes'] > 2 ) {
			$info['nerve']	=	'0';
		}
		// 神经内科相关病史其他
		$info['nerveother']	=	isset($data['nerveother']) && $data['nerveother'] ? 
			$data['nerveother'] : '';

                //	其他相关病史
		$info['other']		=	isset($data['other']) && $data['other'] ? 
			intval($data['other']) : '0';
		if ($info['changes'] && $info['changes'] > 2 ) {
			$info['other']	=	'0';
		}
		// 其他相关病史其他
		$info['otherother']	=	isset($data['otherother']) && $data['otherother'] ? 
			$data['otherother'] : '';
                //	踝反射(左侧)
		$info['anklel']		=	isset($data['anklel']) && $data['anklel'] ? 
			intval($data['anklel']) : '0';
		if ($info['anklel'] && $info['anklel'] > 2 ) {
			$info['anklel']	=	'0';
		}
                //	踝反射(右侧)
		$info['ankler']		=	isset($data['ankler']) && $data['ankler'] ? 
			intval($data['ankler']) : '0';
		if ($info['ankler'] && $info['ankler'] > 2 ) {
			$info['ankler']	=	'0';
		}
                //	判断(踝反射)
		$info['ajudge']		=	isset($data['ajudge']) && $data['ajudge'] ? 
			intval($data['ajudge']) : '0';
		if ($info['ajudge'] && $info['ajudge'] > 2 ) {
			$info['ajudge']	=	'0';
		}
                //	针刺痛觉(左侧)
		$info['painl']		=	isset($data['painl']) && $data['painl'] ? 
			intval($data['painl']) : '0';
		if ($info['painl'] && $info['painl'] > 2 ) {
			$info['painl']	=	'0';
		}
                //	针刺痛觉(右侧)
		$info['painr']		=	isset($data['painr']) && $data['painr'] ? 
			intval($data['painr']) : '0';
		if ($info['painr'] && $info['painr'] > 2 ) {
			$info['painr']	=	'0';
		}
                //	判断(针刺痛觉)
		$info['pjudge']		=	isset($data['pjudge']) && $data['pjudge'] ? 
			intval($data['pjudge']) : '0';
		if ($info['pjudge'] && $info['pjudge'] > 2 ) {
			$info['pjudge']	=	'0';
		}
                //	温度觉(左侧)
		$info['temperaturel']		=	isset($data['temperaturel']) && $data['temperaturel'] ? 
			intval($data['temperaturel']) : '0';
		if ($info['temperaturel'] && $info['temperaturel'] > 2 ) {
			$info['temperaturel']	=	'0';
		}
                //	温度觉(右侧)
		$info['temperaturer']		=	isset($data['temperaturer']) && $data['temperaturer'] ? 
			intval($data['temperaturer']) : '0';
		if ($info['temperaturer'] && $info['temperaturer'] > 2 ) {
			$info['temperaturer']	=	'0';
		}
                //	判断(温度觉)
		$info['tjudge']		=	isset($data['tjudge']) && $data['tjudge'] ? 
			intval($data['tjudge']) : '0';
		if ($info['tjudge'] && $info['tjudge'] > 2 ) {
			$info['tjudge']	=	'0';
		}
                //	振动觉（左侧）
		$info['vibrationl']		=	isset($data['vibrationl']) && $data['vibrationl'] ? 
			intval($data['vibrationl']) : '0';
		if ($info['vibrationl'] && $info['vibrationl'] > 2 ) {
			$info['vibrationl']	=	'0';
		}
                //	振动觉（右侧）
		$info['vibrationr']		=	isset($data['vibrationr']) && $data['vibrationr'] ? 
			intval($data['vibrationr']) : '0';
		if ($info['vibrationr'] && $info['vibrationr'] > 2 ) {
			$info['vibrationr']	=	'0';
		}
                //	判断(振动觉)
		$info['vjudge']		=	isset($data['vjudge']) && $data['vjudge'] ? 
			intval($data['vjudge']) : '0';
		if ($info['vjudge'] && $info['vjudge'] > 2 ) {
			$info['vjudge']	=	'0';
		}
                //	压力觉（左侧）
		$info['pressurel']		=	isset($data['pressurel']) && $data['pressurel'] ? 
			intval($data['pressurel']) : '0';
		if ($info['pressurel'] && $info['pressurel'] > 2 ) {
			$info['pressurel']	=	'0';
		}
                //	压力觉（右侧）
		$info['pressurer']		=	isset($data['pressurer']) && $data['pressurer'] ? 
			intval($data['pressurer']) : '0';
		if ($info['pressurer'] && $info['pressurer'] > 2 ) {
			$info['pressurer']	=	'0';
		}
                //	判断(压力觉)
		$info['ejudge']		=	isset($data['ejudge']) && $data['ejudge'] ? 
			intval($data['ejudge']) : '0';
		if ($info['ejudge'] && $info['ejudge'] > 2 ) {
			$info['ejudge']	=	'0';
		}
                //	初步诊断
		$info['diagnosis']		=	isset($data['diagnosis']) && $data['diagnosis'] ? 
			intval($data['diagnosis']) : '0';
		if ($info['diagnosis'] && $info['diagnosis'] > 2 ) {
			$info['diagnosis']	=	'0';
		}

		//	其他
		$info['othermessage']	=	isset($data['othermessage']) && $data['othermessage'] ? 
			$data['othermessage'] : '';

                //	完成时间
		$info['ftime']	=	isset($data['ftime']) && $data['ftime'] ? 
			strtotime($data['ftime']) : '0';

		//	医生签名
		$info['docname']	=	isset($data['docname']) && $data['docname'] ? 
			$data['docname'] : '';
		//	医生签名时间
		$info['dtime']	=	isset($data['dtime']) && $data['dtime'] ? 
			strtotime($data['dtime']) : '0';

		//身高
		$info['height']	=	isset($data['height']) && $data['height'] ? 
			$data['height'] : '';
		//体重
		$info['weight']	=	isset($data['weight']) && $data['weight'] ? 
			$data['weight'] : '';
		//联系方式
		$info['contact']	=	isset($data['contact']) && $data['contact'] ? 
			$data['contact'] : '';
		//诊断糖尿病时间
		$info['diabetest']	=	isset($data['diabetest']) && $data['diabetest'] ? 
			strtotime($data['diabetest']) : '0';
		//吸烟
		$info['smoking']		=	isset($data['smoking']) && $data['smoking'] ? 
			intval($data['smoking']) : '0';
		if ($info['smoking'] && $info['smoking'] > 2 ) {
			$info['smoking']	=	'0';
		}
		//胰岛素使用
		$info['insulin']	=	isset($data['insulin']) && $data['insulin'] ? 
			$data['insulin'] : '';
		//空腹血糖
		$info['fasting']	=	isset($data['fasting']) && $data['fasting'] ? 
			$data['fasting'] : '';
		//餐后2h血糖
		$info['afterdinner']	=	isset($data['afterdinner']) && $data['afterdinner'] ? 
			$data['afterdinner'] : '';
		//糖化血红蛋白
		$info['hemoglobin']	=	isset($data['hemoglobin']) && $data['hemoglobin'] ? 
			$data['hemoglobin'] : '';
		//糖尿病视网膜病变
		$info['retina']		=	isset($data['retina']) && $data['retina'] ? 
			intval($data['retina']) : '0';
		if ($info['retina'] && $info['retina'] > 2 ) {
			$info['retina']	=	'0';
		}
		//血压
		$info['pressure']	=	isset($data['pressure']) && $data['pressure'] ? 
			$data['pressure'] : '';
		//血脂
		$info['lipid']	=	isset($data['lipid']) && $data['lipid'] ? 
			$data['lipid'] : '';
		//糖尿病肾病
		$info['nephropathy']		=	isset($data['nephropathy']) && $data['nephropathy'] ? 
			intval($data['nephropathy']) : '0';
		if ($info['nephropathy'] && $info['nephropathy'] > 2 ) {
			$info['nephropathy']	=	'0';
		}
		//口服降糖药物使用
		$info['hypoglycemic']	=	isset($data['hypoglycemic']) && $data['hypoglycemic'] ? 
			$data['hypoglycemic'] : '';
		//N电图
		$info['electrocardiogram']	=	isset($data['electrocardiogram']) && $data['electrocardiogram'] ? 
			$data['electrocardiogram'] : '';
		//N传导
		$info['conduction']	=	isset($data['conduction']) && $data['conduction'] ? 
			$data['conduction'] : '';
		//高血压病史
		$info['hypertension']	=	isset($data['hypertension']) && $data['hypertension'] ? 
			$data['hypertension'] : '';
		//BMI
		$info['bmi']	=	isset($data['bmi']) && $data['bmi'] ? 
			$data['bmi'] : '';
		Return $info;
	}


	/**
	* 删除操作
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		$id 需要删除的用户id
	* @return		
	*/
	public function deletes(){
		$id	=	$this->input->post('id',TRUE) ? $this->input->post('id',TRUE) : '';
		$id	=	$id ? intval($id) : '';

		if (!$id) {
			exit('-1');
		}
		
		//	判断是否为当前登录医生的患者
		$where	=	array();
		$where['id']	=	$id;
		
		if ( $this->userinfo['group'] != 1 ) {
			exit('-3');
		}

		$where['status']=	99;
		$check	=	$this->Patients_model->get_one($where);
		
		//	如果为查找到数据，则直接跳转到home页
		if ( !$check ) {
			exit('-2');
		}

		$info	=	array();
		$info['status']	=	0;
		$info['update_time']	=	time();

		$where		=	array();
		//	基本信息
		$where['id']		=	$id;
		$where['userid']	=	$this->userid;
		
		//	数据保存
		$uprows		=	$this->Patients_model->update($info,$where);

		if ( !$uprows ) {
			exit('-3');
		}
		exit('1');
	}

	public function search(){
		//	姓名、病历号、身份证、手机号
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('search',TRUE);
		$page		=	$this->input->get('per_page',TRUE) ? 
			$this->input->get('per_page',TRUE) : 1;

		$sqlresult	=	$this->input->get('result',TRUE) ? 
			$this->input->get('result',TRUE) : '';
		$sqlresult	=	$sqlresult ? intval($sqlresult) : '';

		$limit		=	10;
		$data		=	array();

		$btimes	=	$this->input->get('btimes',TRUE);
		$etimes	=	$this->input->get('etimes',TRUE);

		//	如果有传递 $btimes 和 $etimes 判断下大小
		$where_start_time	=	strtotime($btimes) ? strtotime($btimes) : 0;
		$where_end_time		=	strtotime($etimes) ? strtotime($etimes) : 0;
		if( $where_start_time > $where_end_time ) {
			$tmp	=	$btimes;
			$btimes	=	$etimes;
			$etimes	=	$tmp;
			unset($tmp);
		}
		
		$btimes		=	$btimes ? strtotime($btimes.' 00:00:00') : '';
		$etimes		=	$etimes ? strtotime($etimes.' 00:00:00') : '';
		

		$page		=	max(1,intval($page));
		$pagesize	=	10;

		$keywords	=	$keywords ? trim($keywords) : '';
		
		
		$where	=	array();
		//	筛查中心账户
		if ( $this->userinfo['group'] == 3 ) {
			$where['result']	=	$this->userinfo['result'];
		}elseif( $this->userinfo['group'] == 1){
			
		}elseif( $this->userinfo['group'] == 2){
			
		}elseif( $this->userinfo['group'] == 6){
			$where['results']	=	$this->userinfo['results'];
		}else{
			$where['userid']	=	$this->userid;
		}

		$where['status']	=	99;

		if ( $btimes ) {
			$where['add_time >= ']	=	$btimes;
		}
		if ( $etimes ) {
			$where['add_time < ']	=	$etimes;
		}

		if ($sqlresult) {
			$where['result']	=	$sqlresult;
		}

		//	获取数据
		$data		=	$this->Patients_model->search($where,$keywords,$page,$pagesize,
			'update_time DESC');

		$url			= '/home/search?search='.$keywords;
		
		$data['pages']	=	pages($data['total'],$pagesize,'',$url);
		$data['total']	=	$data['total'] ? $data['total'] : 0;
		$this->config->load('patients', TRUE);

		//	医院编号信息
        $configs	=	$this->config->item('patients');
		$hos		=	array();
		$hos		=	array_merge($hos,$configs['result1'],$configs['result2'],
			$configs['result3'],$configs['result4'],$configs['result5'],
			$configs['result6'],$configs['result7'],$configs['result8'],
			$configs['result9'],$configs['result10'],$configs['result11'],
			$configs['result12']);
		$data['hospital']	=	$hos;
		$data['result']		=	$configs['result'];
		$this->config->set_item('enable_query_strings',FALSE);

		$data['keywords']	=	$keywords;

		$data['btimes']	=	$btimes ? date('Y-m-d',$btimes) : '';
		$data['etimes']	=	$etimes ? date('Y-m-d',$etimes) : '';

		$data['sqlresult']	=	$sqlresult ? $sqlresult : '';

		$this->load->vars($data);
		seo('搜索');
		templates('home','search_index');
	}

	
	/**
	* 导出
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	public function export(){
		//	姓名、病历号、身份证、手机号
		//	修改url可读取方式
		$this->config->set_item('enable_query_strings',TRUE);
		$keywords	=	$this->input->get('search',TRUE);
		$page		=	$this->input->get('per_page',TRUE) ? 
			$this->input->get('per_page',TRUE) : 1;

		$btimes	=	$this->input->get('btimes',TRUE);
		$etimes	=	$this->input->get('etimes',TRUE);
		
		$sqlresult	=	$this->input->get('result',TRUE) ? 
			$this->input->get('result',TRUE) : '';
		$sqlresult	=	$sqlresult ? intval($sqlresult) : '';

		//	如果有传递 $btimes 和 $etimes 判断下大小
		$where_start_time	=	strtotime($btimes) ? strtotime($btimes) : 0;
		$where_end_time		=	strtotime($etimes) ? strtotime($etimes) : 0;
		if( $where_start_time > $where_end_time ) {
			$tmp	=	$btimes;
			$btimes	=	$etimes;
			$etimes	=	$tmp;
			unset($tmp);
		}
		
		$btimes		=	$btimes ? strtotime($btimes.' 00:00:00') : '';
		$etimes		=	$etimes ? strtotime($etimes.' 00:00:00') : '';
		
	
		$limit		=	10;
		$data		=	array();

		$page		=	max(1,intval($page));
		$pagesize	=	10;

		$keywords	=	$keywords ? trim($keywords) : '';
		
		
		$where	=	array();
		//	筛查中心账户
		if ( $this->userinfo['group'] == 3 ) {
			$where['result']	=	$this->userinfo['result'];
		}elseif( $this->userinfo['group'] == 1){
			
		}elseif( $this->userinfo['group'] == 2){
			
		}else{
			$where['userid']	=	$this->userid;
		}

		$where['status']	=	99;

		if ( $btimes ) {
			$where['add_time >= ']	=	$btimes;
		}
		if ( $etimes ) {
			$where['add_time < ']	=	$etimes;
		}

		if ($sqlresult) {
			$where['result']	=	$sqlresult;
		}


		//	获取数据
		$data		=	$this->Patients_model->search($where,$keywords,$page,$pagesize,
			'update_time DESC');

		$url			= '/home/search?search='.$keywords;
		
		$pages			=	'';
		if (isset($data['total']) && $data['total']) {
			$pages	=	pages($data['total'],$pagesize,'',$url);
		}
		$data['pages']	=	$pages;
		$data['total']	=	isset($data['total']) ? $data['total'] : 0;
		$this->config->load('patients', TRUE);

		//	医院编号信息
        $configs	=	$this->config->item('patients');
		$hos		=	array();
		$hos		=	array_merge($hos,$configs['result1'],$configs['result2'],
			$configs['result3'],$configs['result4'],$configs['result5'],
			$configs['result6'],$configs['result7'],$configs['result8'],
			$configs['result9'],$configs['result10'],$configs['result11'],
			$configs['result12']);
		$data['hospital']	=	$hos;
		$data['result']		=	$configs['result'];

		$data['searchkey']	=	$keywords;
		$data['btimes']		=	$btimes ? date('Y-m-d',$btimes) : '';
		$data['etimes']		=	$etimes ? date('Y-m-d',$etimes) : '';

		$eurl	=	'';
		if ( $keywords ) {
			$eurl	.=	'?search='.$keywords;
		}
		if ( $btimes ) {
			$eurl	.=	$eurl ? '&btimes='.$data['btimes'] : '?btimes='.$data['btimes'];
		}
		if ($etimes) {
			$eurl	.=	$eurl ? '&etimes='.$data['etimes'] :'?etimes='.$data['etimes']  ;
		}
		if ($sqlresult) {
			$eurl	.=	$eurl ? '&result='.$sqlresult :'?result='.$sqlresult  ;
		}
		$data['eurl']	=	$eurl;

		$data['sqlresult']	=	$sqlresult ? $sqlresult : '';

		$this->load->vars($data);
		seo('导出');

		$this->config->set_item('enable_query_strings',FALSE);
		templates('home','export');
	}
}