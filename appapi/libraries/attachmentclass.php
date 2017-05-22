<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class attachmentclass {
	public $ci;
	public $attachments;
	public $field;
	public $imageexts = array('gif', 'jpg', 'jpeg', 'png', 'bmp');
	public $uploadedfiles = array();
	public $downloadedfiles = array();
	public $error;
	public $upload_root;
	public $siteid;
	public $userid	=	0;
	public $site	=	array();
	
	public $directory	=	'uploads/';

	function __construct($upload_dir = '') {
		$this->ci	=	& get_instance();
		$this->ci->load->helper('dir');
		
		$this->upload_root = FCPATH.'uploads/';
		$this->upload_func = 'copy';
		$this->upload_dir = $upload_dir;
	}

	/**
	* 
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	function upload($field, $alowexts = '', $maxsize = 0,  $watermark = '') {
		
		$dir		= $this->upload_dir ? $this->upload_dir.'/'.date('Y/md/') : date('Y/md/');
		
		$upload_url = base_url().$this->directory;
		$uploadpath = $upload_url.$dir;
		$uploaddir	= $this->upload_root.$dir;

		dir_create($uploaddir);
		
		$config['upload_path']		=	$uploaddir;
		$config['allowed_types']	=	$alowexts ? $alowexts : 'gif|jpg|jpeg|bmp|png';
		$config['encrypt_name']		=	true;

		if ($maxsize) {
			$config['max_size']		=	$maxsize;
		}

		$this->ci->load->library('upload',$config);

		if ( ! $this->ci->upload->do_upload($field)){
			$error = array('error' => $this->ci->upload->display_errors());

			Return $error;
		}else{
			$data = array('upload_data' => $this->ci->upload->data());
			$result	=	array();
			$temp	=	$data['upload_data'];
			$result['real']	=	$uploadpath.$temp['file_name'];
			$result['name']	=	$temp['file_name'];
			$result['size']	=	$temp['file_size'];
			if($watermark){
				$this->ci->load->library('image');
				$this->ci->image->setconfig($temp['file_path'].$temp['file_name']);
				$this->ci->image->watermark2();
			}

			$filepath	=	str_replace(base_url(),'',$result['real']);
			$downloadedfile = array('filename'=>$temp['file_name'],
				'filepath'=>$filepath,'filesize'=>$temp['file_size'],
				'fileext'=>$temp['image_type']);
			$aid = $this->add($downloadedfile);
			$result['aid']		=	$aid;
			$result['filepath']	=	$filepath;
			
			Return $result;
		}

		Return false;
	}

	

	/**
	* 一次上传多张图片
	*	上传input名称为类似这样： test[]
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param		
	* @return		
	*/
	function uploads($field, $alowexts = '', $maxsize = 0,  $watermark = '') {
		$dir		= $this->upload_dir ? $this->upload_dir.'/'.date('Y/md/') : date('Y/md/');
		
		$upload_url = base_url().$this->directory;
		$uploadpath = $upload_url.$dir;
		$uploaddir	= $this->upload_root.$dir;

		dir_create($uploaddir);
		
		$config['upload_path']		=	$uploaddir;
		$config['allowed_types']	=	$alowexts ? $alowexts : 'gif|jpg|jpeg|bmp|png';
		$config['encrypt_name']		=	true;

		if ($maxsize) {
			$config['max_size']		=	$maxsize;
		}

		$this->ci->load->library('upload');

		$result	=	array();
		
		

		$files = array();
		$all_files = $_FILES[$field]['name'];
		$i	=	0;
		foreach ($all_files as $filename) {
			$files[++$i]['name'] = $filename;
			$files[$i]['type'] = current($_FILES[$field]['type']);
			next($_FILES[$field]['type']);
			$files[$i]['tmp_name'] = current($_FILES[$field]['tmp_name']);
			next($_FILES[$field]['tmp_name']);
			$files[$i]['error'] = current($_FILES[$field]['error']);
			next($_FILES[$field]['error']);
			$files[$i]['size'] = current($_FILES[$field]['size']);
			next($_FILES[$field]['size']);
		}
		$_FILES = $files;

		$k	=	0;
		foreach ($_FILES as $file => $file_data){
			$this->ci->upload->initialize($config);
			
			if ( ! $this->ci->upload->do_upload($file)){
				$error = array('error' => $this->ci->upload->display_errors());

				Return $error;
			}

			$data = $this->ci->upload->data();
			
			$result[$k]['real']	=	$uploadpath.$data['file_name'];
			$result[$k]['name']	=	$data['file_name'];
			$result[$k]['size']	=	$data['file_size'];
			if($watermark){
				$this->ci->load->library('image');
				$this->ci->image->setconfig($data['file_path'].$data['file_name']);
				$this->ci->image->watermark2();
			}

			$filepath	=	str_replace(base_url(),'',$result[$k]['real']);
			$downloadedfile = array('filename'=>$data['file_name'],
				'filepath'=>$filepath,'filesize'=>$data['file_size'],
				'fileext'=>$data['image_type']);
			$aid = $this->add($downloadedfile);
			$result[$k]['aid']		=	$aid;
			$result[$k]['filepath']	=	$filepath;
		
			$k ++;
		}

		Return $result;
	}


	
	/**
	 * 附件下载(直接下载url内容)
	 * Enter description here ...
	 * @param $value 传入下载内容
	 * @param $watermark 是否加入水印
	 * @param $ext 下载扩展名
	 * @param $absurl 绝对路径
	 * @param $basehref 
	 */
	function downloadurl($value,$watermark = '0',$ext = 'gif|jpg|jpeg|bmp|png', $absurl = '', $basehref = '')
	{
		$upload_url = base_url().$this->directory;
		$dir		= $this->upload_dir ? $this->upload_dir.'/'.date('Y/md/') : date('Y/md/');
		$uploadpath = $upload_url.$dir;
		$uploaddir	= $this->upload_root.$dir;
		$string		= new_stripslashes($value);

		//	验证文件类型有效性
		$fileext	= fileext($value);
		if( !preg_match("/^(".$ext.")$/", $fileext) ) {
			return false;
		}

		$remotefileurls = array();
		dir_create($uploaddir);
		$remotefileurls[$string] = $this->fillurl($value, $absurl, $basehref);
		unset($string);

		$remotefileurls = array_unique($remotefileurls);

		$oldpath = $newpath = array();
		foreach($remotefileurls as $k=>$file) {
			if(strpos($file, '://') === false || strpos($file, $upload_url) !== false) continue;
			$filename = fileext($file);
			$file_name = basename($file);
			$filename = $this->getname($filename);

			$newfile = $uploaddir.$filename;
			$upload_func = $this->upload_func;
			if(@$upload_func($file, $newfile)) {
				$oldpath[] = $k;
				$newpath[] = $uploadpath.$filename;
				@chmod($newfile, 0777);

				if($watermark){
					$this->ci->load->library('image');
					$this->ci->image->setconfig($newfile);
					$this->ci->image->watermark2();
				}

				$fileext = fileext($filename);
				$filepath = $this->directory.$dir.$filename;
				
				$downloadedfile = array('filename'=>$filename, 'filepath'=>$filepath, 'filesize'=>filesize($newfile), 'fileext'=>$fileext);
				$aid = $this->add($downloadedfile);
			}
		}
		return str_replace($oldpath, $newpath, $value);
	}


	/**
	 * 附件下载(直接下载url内容)
	 * Enter description here ...
	 * @param $value 传入下载内容
	 * @param $watermark 是否加入水印
	 * @param $ext 下载扩展名
	 * @param $absurl 绝对路径
	 * @param $basehref 
	 */
	function download($value,$watermark = '0',$ext = 'gif|jpg|jpeg|bmp|png', $absurl = '', $basehref = '')
	{
		$upload_url = base_url().$this->directory;
		$dir		= $this->upload_dir ? $this->upload_dir.'/'.date('Y/md/') : date('Y/md/');
		$uploadpath = $upload_url.$dir;
		$uploaddir	= $this->upload_root.$dir;
		$string		= new_stripslashes($value);

		if(!preg_match_all("/(href|src)=([\"|']?)([^ \"'>]+\.($ext))\\2/i", $string, $matches)) return $value;
		$remotefileurls = array();
		foreach($matches[3] as $matche)
		{
			if(strpos($matche, '://') === false) continue;
			dir_create($uploaddir);
			$remotefileurls[$matche] = $this->fillurl($matche, $absurl, $basehref);
		}
		unset($matches, $string);
		$remotefileurls = array_unique($remotefileurls);

		$oldpath = $newpath = array();
		foreach($remotefileurls as $k=>$file) {
			if(strpos($file, '://') === false || strpos($file, $upload_url) !== false) continue;
			$filename = fileext($file);
			$file_name = basename($file);
			$filename = $this->getname($filename);

			$newfile = $uploaddir.$filename;
			$upload_func = $this->upload_func;
			if(@$upload_func($file, $newfile)) {
				$oldpath[] = $k;
				$newpath[] = $uploadpath.$filename;
				@chmod($newfile, 0777);

				if($watermark){
					$this->ci->load->library('image');
					$this->ci->image->setconfig($newfile);
					$this->ci->image->watermark2();
				}

				$fileext = fileext($filename);
				$filepath = $this->directory.$dir.$filename;
				
				$downloadedfile = array('filename'=>$filename, 'filepath'=>$filepath, 'filesize'=>filesize($newfile), 'fileext'=>$fileext);
				$aid = $this->add($downloadedfile);
			}
		}
		return str_replace($oldpath, $newpath, $value);
	}


	/**
	 * 附件添加如数据库
	 * @param $uploadedfile 附件信息
	 */
	function add($uploadedfile) {
		
		$uploadedfile['userid']		=	$this->userid ? $this->userid : 0;
		$uploadedfile['uploadtime'] =	time();
		$uploadedfile['uploadip']	=	$this->ci->input->ip_address();
		$uploadedfile['authcode']	=	md5($uploadedfile['filepath']);
		$uploadedfile['filename']	=	$uploadedfile['filename'];
		$uploadedfile['filepath']	=	$uploadedfile['filepath'];
		$uploadedfile['filesize']	=	$uploadedfile['filesize'];
		$uploadedfile['fileext']	=	$uploadedfile['fileext'];
		$uploadedfile['types']		=	1;
		
		$this->ci->db->insert('attachment',$uploadedfile);
		$insertid	=	$this->ci->db->insert_id();
		return $insertid;
	}
	
	function set_userid($userid) {
		$this->userid = $userid;
	}
	/**
	 * 获取缩略图地址..
	 * @param $image 图片路径
	 */
	function get_thumb($image){
		return str_replace('.', '_thumb.', $image);
	}


	/**
	 * 获取附件名称
	 * @param $fileext 附件扩展名
	 */
	function getname($fileext){
		return date('Ymdhis').rand(100, 999).'.'.$fileext;
	}

	/**
	 * 返回附件大小
	 * @param $filesize 图片大小
	 */
	
	function size($filesize) {
		if($filesize >= 1073741824) {
			$filesize = round($filesize / 1073741824 * 100) / 100 . ' GB';
		} elseif($filesize >= 1048576) {
			$filesize = round($filesize / 1048576 * 100) / 100 . ' MB';
		} elseif($filesize >= 1024) {
			$filesize = round($filesize / 1024 * 100) / 100 . ' KB';
		} else {
			$filesize = $filesize . ' Bytes';
		}
		return $filesize;
	}
	/**
	* 判断文件是否是通过 HTTP POST 上传的
	*
	* @param	string	$file	文件地址
	* @return	bool	所给出的文件是通过 HTTP POST 上传的则返回 TRUE
	*/
	function isuploadedfile($file) {
		return is_uploaded_file($file) || is_uploaded_file(str_replace('\\\\', '\\', $file));
	}
	
	/**
	* 补全网址
	*
	* @param	string	$surl		源地址
	* @param	string	$absurl		相对地址
	* @param	string	$basehref	网址
	* @return	string	网址
	*/
	function fillurl($surl, $absurl, $basehref = '') {
		if($basehref != '') {
			$preurl = strtolower(substr($surl,0,6));
			if($preurl=='http://' || $preurl=='ftp://' ||$preurl=='mms://' || $preurl=='rtsp://' || $preurl=='thunde' || $preurl=='emule://'|| $preurl=='ed2k://')
			return  $surl;
			else
			return $basehref.'/'.$surl;
		}
		$i = 0;
		$dstr = '';
		$pstr = '';
		$okurl = '';
		$pathStep = 0;
		$surl = trim($surl);
		if($surl=='') return '';
		$urls = @parse_url(SITE_URL);
		$HomeUrl = isset($urls['host']) ? $urls['host'] : '';
		$BaseUrlPath = $HomeUrl.$urls['path'];
		$BaseUrlPath = preg_replace("/\/([^\/]*)\.(.*)$/",'/',$BaseUrlPath);
		$BaseUrlPath = preg_replace("/\/$/",'',$BaseUrlPath);
		$pos = strpos($surl,'#');
		if($pos>0) $surl = substr($surl,0,$pos);
		if($surl[0]=='/') {
			$okurl = 'http://'.$HomeUrl.'/'.$surl;
		} elseif($surl[0] == '.') {
			if(strlen($surl)<=2) return '';
			elseif($surl[0]=='/') {
				$okurl = 'http://'.$BaseUrlPath.'/'.substr($surl,2,strlen($surl)-2);
			} else {
				$urls = explode('/',$surl);
				foreach($urls as $u) {
					if($u=="..") $pathStep++;
					else if($i<count($urls)-1) $dstr .= $urls[$i].'/';
					else $dstr .= $urls[$i];
					$i++;
				}
				$urls = explode('/', $BaseUrlPath);
				if(count($urls) <= $pathStep)
				return '';
				else {
					$pstr = 'http://';
					for($i=0;$i<count($urls)-$pathStep;$i++) {
						$pstr .= $urls[$i].'/';
					}
					$okurl = $pstr.$dstr;
				}
			}
		} else {
			$preurl = strtolower(substr($surl,0,6));
			if(strlen($surl)<7)
			$okurl = 'http://'.$BaseUrlPath.'/'.$surl;
			elseif($preurl=="http:/"||$preurl=='ftp://' ||$preurl=='mms://' || $preurl=="rtsp://" || $preurl=='thunde' || $preurl=='emule:'|| $preurl=='ed2k:/')
			$okurl = $surl;
			else
			$okurl = 'http://'.$BaseUrlPath.'/'.$surl;
		}
		$preurl = strtolower(substr($okurl,0,6));
		if($preurl=='ftp://' || $preurl=='mms://' || $preurl=='rtsp://' || $preurl=='thunde' || $preurl=='emule:'|| $preurl=='ed2k:/') {
			return $okurl;
		} else {
			$okurl = preg_replace('/^(http:\/\/)/i','',$okurl);
			$okurl = preg_replace('/\/{1,}/i','/',$okurl);
			return 'http://'.$okurl;
		}
	}
}