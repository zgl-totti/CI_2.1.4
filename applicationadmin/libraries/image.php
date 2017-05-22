<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Image {
	
	public $ci;
	public $source;
	public $new_image;
	public $valignment;
	public $halignment;
	public $w_minwidth = 300;
	public $w_minheight = 300;

	function __construct(){
		$this->ci	=	& get_instance();
		$this->ci->load->library('image_lib');   
	}

	/**
	* 设置基本信息
	* @author		wangyangyang
	* @copyright	wangyang8839@163.com
	* @version		1.0
	* @param		
	* @return		
	*/
	public function setconfig($source = '',$new_image = '',$valignment = '',$halignment = ''){
		$this->source	=	$source;
		$this->new_image=	$new_image ? $new_image : $this->source;
		$this->valignment	=	$valignment ? $valignment : 'bottom';
		$this->halignment	=	$halignment ? $halignment : 'right';
	}

	/**
	* 文字水印
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param	$source		图片地址（相对或绝对路径） 
	* @param	$new_image	新图片地址（相对或绝对路径） 
	* @param	$text		水印文字内容
	* @param	$size		文字大小
	* @param	$valignment 竖轴位置（top, middle, bottom）
	* @param	$halignment 横轴位置（left, center, right）
	* @return		
	*/
    function watermark($text = '',$size = ''){
		if ( !$this->source ) {
			Return false;
		}

		$source_info = getimagesize($this->source);
		$source_w    = $source_info[0];
		$source_h    = $source_info[1];		
		if($source_w < $this->w_minwidth || $source_h < $this->w_minheight) return false;

		if ( !$text ) {
			$text	=	base_url();
		}

		$size	=	$size ? $size : 16;

		//(必须)设置图像库
        $config['image_library']	= 'gd2';
		
		//(必须)设置原图像的名字和路径. 路径必须是相对或绝对路径，但不能是URL.
        $config['source_image']		= $this->source;

		//TRUE 动态的存在(直接向浏览器中以输出图像),FALSE 写入硬盘
        $config['dynamic_output']	= FALSE;
		
		//设置图像的品质。品质越高，图像文件越大
        $config['quality']		= '90%';
		
		//设置图像的目标名/路径。
        $config['new_image']	= $this->new_image;
		
		//(必须)设置想要使用的水印处理类型(text, overlay)
        $config['wm_type']		= 'overlay';

		//图像相对位置(单位像素)
        $config['wm_padding']	= '5';

		//竖轴位置 top, middle, bottom
        $config['wm_vrt_alignment'] = $this->valignment;

		//横轴位置 left, center, right
        $config['wm_hor_alignment'] = $this->halignment;

		//指定一个垂直偏移量（以像素为单位）
        $config['wm_vrt_offset'] = '0';

		//指定一个横向偏移量（以像素为单位）
        $config['wm_hor_offset'] = '0';

        /* 文字水印参数设置 */
        $config['wm_text']				=	$text;//(必须)水印的文字内容
        $config['wm_font_path']			=	FCPATH.'system/fonts/texb.ttf';//字体名字和路径
        $config['wm_font_size']			=	$size;//(必须)文字大小
        $config['wm_font_color']		=	'FF0000';//(必须)文字颜色，十六进制数
        $config['wm_shadow_color']		=	'FF0000';//投影颜色，十六进制数
        $config['wm_shadow_distance']	=	'3';//字体和投影距离（单位像素）。
        $this->ci->image_lib->initialize($config);
		
		$result	=	$this->ci->image_lib->watermark();
		Return $result ? $this->new_image : false;
    }


    /**
	* 图像水印
	* @author	wangyangyang
	* @copyright	wangyang8839@163.com
	* @version	1.0
	* @param	$source		图片地址（相对或绝对路径） 
	* @param	$new_image	新图片地址（相对或绝对路径） 
	* @param	$overlay	水印图片地址（相对或绝对路径） 
	* @param	$valignment 竖轴位置（top, middle, bottom）
	* @param	$halignment 横轴位置（left, center, right）
	* @return		
	*/
    function watermark2($overlay = ''){
		if ( !$this->source ) {
			Return false;
		}
		
		$source_info = getimagesize($this->source);
		$source_w    = $source_info[0];
		$source_h    = $source_info[1];		
		if($source_w < $this->w_minwidth || $source_h < $this->w_minheight) return false;

		if (!$overlay) {
			$overlay	=	FCPATH.'statics/global/img/overlay.png';
		}

		//(必须)设置图像库
        $config['image_library']	= 'gd2';

		//(必须)设置原图像的名字和路径. 路径必须是相对或绝对路径，但不能是URL.
        $config['source_image']		= $this->source;
		
		//TRUE 动态的存在(直接向浏览器中以输出图像),FALSE 写入硬盘
        $config['dynamic_output']	= FALSE;
        
		//设置图像的品质。品质越高，图像文件越大
		$config['quality']	= '90%';

		//设置图像的目标名/路径。
        $config['new_image']		= $this->new_image;

        $config['wm_type']			= 'overlay';//(必须)设置想要使用的水印处理类型(text, overlay)
        $config['wm_padding']		= '5';//图像相对位置(单位像素)

		//竖轴位置 top, middle, bottom
        $config['wm_vrt_alignment'] = $this->valignment;

		//横轴位置 left, center, right
        $config['wm_hor_alignment'] = $this->halignment;
        
		
		$config['wm_vrt_offset']	= '20';//指定一个垂直偏移量（以像素为单位）
        $config['wm_hor_offset']	= '20';//指定一个横向偏移量（以像素为单位）


        /* 图像水印参数设置 */
        $config['wm_overlay_path'] = $overlay;//水印图像的名字和路径
        $config['wm_opacity'] = '50';//水印图像的透明度
        $config['wm_x_transp'] = '4';//水印图像通道
        $config['wm_y_transp'] = '4';//水印图像通道

        $this->ci->image_lib->initialize($config);
       
		$result	=	$this->ci->image_lib->watermark();
		
		Return $result ? $this->new_image : false;
		
    }
}
?> 