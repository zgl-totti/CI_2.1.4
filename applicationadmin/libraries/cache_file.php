<?php

class cache_file {
	
	/*缓存默认配置*/
	protected $_setting = array(
								'suf' => '.cache.php',	/*缓存文件后缀*/
								'type' => 'array',		/*缓存格式：array数组，serialize序列化，null字符串*/
							);
	
	/*缓存路径*/
	protected $filepath = APPPATH;

	/**
	* 构造函数
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		array	$setting	缓存配置
	* @return		
	*/
	public function __construct($setting = '') {
		$this->get_setting($setting);
		//	默认路径为application 下的cache 目录
		$fileapppath=	str_replace('/',DIRECTORY_SEPARATOR,$this->filepath);
		$this->filepath	=	$fileapppath.'cache'.DIRECTORY_SEPARATOR;
	}

	/**
	* 设置根目录下的缓存路径
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$setfilepath 缓存路径地址
	* @return		
	*/
	public function set_rootpath($setfilepath = ''){
		if ( $setfilepath ) {
			$cache	=	FCPATH.'data'.DIRECTORY_SEPARATOR.'cache'.DIRECTORY_SEPARATOR;
			$this->filepath	=	$cache;
		}
	}
	
	/**
	* 写入缓存
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$name 缓存名称 ，$data 缓存数据 ，$sort 所属文件，$setting	缓存配置
	* @return		
	*/
	public function set($name, $data, $sort ,$setting = '') {
		$this->get_setting($setting);
		$filepath	=	$this->filepath.'cache_'.$sort.DIRECTORY_SEPARATOR;
		$filename	=	$name.$this->_setting['suf'];
	    if(!is_dir($filepath)) {
			mkdir($filepath, 0777, true);
	    }
	    
	    if($this->_setting['type'] == 'array') {
	    	$data = "<?php\nreturn ".var_export($data, true).";\n?>";
	    } elseif($this->_setting['type'] == 'serialize') {
	    	$data = serialize($data);
	    }
	    
		//	是否开启锁处理
		if( isset( $this->_setting['lock_ex'] ) && $this->_setting['lock_ex']) {
			$file_size = file_put_contents($filepath.$filename, $data, LOCK_EX);
		} else {
			$file_size = file_put_contents($filepath.$filename, $data);
		}
		
	    
		$file_size = file_put_contents($filepath.$filename, $data);
	    return $file_size ? $file_size : 'false';
	}
	
	/**
	* 获取缓存
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$name 缓存名称 ，$data 缓存数据 ，$sort 所属模型，$setting	缓存配置
	* @return		
	*/
	public function get($name, $sort , $setting = ''  ) {
		$this->get_setting($setting);
		$filepath = $this->filepath.'cache_'.$sort.DIRECTORY_SEPARATOR;
		$filename = $name.$this->_setting['suf'];
		if (!file_exists($filepath.$filename)) {
			return false;
		} else {
		    if($this->_setting['type'] == 'array') {
		    	$data = @require($filepath.$filename);
		    } elseif($this->_setting['type'] == 'serialize') {
		    	$data = unserialize(file_get_contents($filepath.$filename));
		    }
		    
			//	修改判断有没过期时间
			if (isset($data['time']) && isset($data['expension'])) {
				if (time() >  $data['time'] + $data['expension']){
					$this->delete($name,$sort);
					return FALSE;
				}
			}

		    return $data;
		}
	}
	
	/**
	* 删除缓存
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$name 缓存名称 ，$data 缓存数据 ，$sort 所属模型，$setting	缓存配置
	* @return		
	*/
	public function delete($name , $sort , $setting = '' ) {
		$this->get_setting($setting);
		$filepath	=	$this->filepath.'cache_'.$sort.DIRECTORY_SEPARATOR;
		$filename	=	$name.$this->_setting['suf'];
		if(file_exists($filepath.$filename)) {
			return @unlink($filepath.$filename) ? true : false;
		} else {
			return false;
		}
	}
	
	/**
	* 和系统缓存配置对比获取自定义缓存配置
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$setting	自定义缓存配置
	* @return		
	*/
	public function get_setting($setting = '') {
		if($setting) {
			$this->_setting = array_merge($this->_setting, $setting);
		}
	}
	

	/**
	* 缓存信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		$name 缓存名称 ，$sort 所属模型，$setting	缓存配置
	* @return		
	*/
	public function cacheinfo($name, $sort, $setting = '' ) {
		$this->get_setting($setting);
		if(empty($type)) $type = 'data';
		$filepath	=	$this->filepath.'cache_'.$sort.DIRECTORY_SEPARATOR;
		$filename	=	$filepath.$name.$this->_setting['suf'];
		
		if(file_exists($filename)) {
			$res['filename'] = $name.$this->_setting['suf'];
			$res['filepath'] = $filepath;
			$res['filectime'] = filectime($filename);
			$res['filemtime'] = filemtime($filename);
			$res['filesize'] = filesize($filename);
			return $res;
		} else {
			return false;
		}
	}

}
