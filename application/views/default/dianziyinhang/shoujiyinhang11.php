<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
		<title>手机银行 </title>
	</head>
	<style type="text/css">
	body{
		font-family: "微软雅黑";
		background: #f8f9f9;
	}
		.container_pos{
			margin: 0 auto;
			width: 90%;
		}
		
		.gongneng{
			width: 100%;
			height: 50px;
			border-radius:5px;
			border:1px solid #d4d4d4;
			margin-top: 25.2px;
			background: #FFFFFF;
			
		}
		.gongneng span{
			display: block;
			float: left;
			margin-top: 15px;
			width: 23px;
			height: 23px;
			overflow: hidden;
			margin-right: 15px;
			margin-left: 15px;
		}
	.swiper-container {
        width: 100%;
        height: 100%;
        
    }
    .swiper-slide {
        text-align: center;
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }

		.banner1{
			width: 100%;
			margin-bottom: 1%;
		}
		.imgBox{
			width: 100%;
			
		}
		.jiantou{
			float: right;
			width:10px;
			margin-top: 12px;
			margin-right: 20px;
		}
	</style>
	<body>
		
		<div class="imgBox">
				<div class="banner1">
	  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/shoujiyinhang (1).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/shoujiyinhang (2).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/shoujiyinhang (3).jpg');?>" width="100%" height="100%"/></div> 
        </div>
	        <div class="swiper-pagination"></div>
		</div>
</div>
			</div>
		<div class="container_pos">
			
			<a href="<?php echo site_url('wxmain/dzyh18');?>">
				<div class="gongneng">
					<span style="height: 30px;width: 20px;"><img src="<?php echo base_url('statics/images3/shoujiyinhang11_03.png');?>" width="100%"/></span><div style="float: left;color: #545454;font-size: 18px;height: 50px;line-height: 50px;">客户端手机银行</div>
					<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
				</div>
			</a>
			<a href="<?php echo site_url('wxmain/dzyh19');?>">
				<div class="gongneng">
					<span><img src="<?php echo base_url('statics/images3/shoujiyinhang11_07.png');?>" width="100%"/></span><div style="float: left;color: #545454;font-size: 18px;height: 50px;line-height: 50px;">贴片卡手机银行</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
				</div>
			</a>
			<a href="<?php echo site_url('wxmain/shoujiyhzfqk2');?>">
				<div class="gongneng">
					<span><img src="<?php echo base_url('statics/images3/shoujiyinhang11_10.png');?>" width="100%"/></span><div style="float: left;color: #545454;font-size: 18px;height: 50px;line-height: 50px;">资费标准</div>
					<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
				</div>
			</a>
		</div>
		<script  src="<?php echo base_url('statics/default/js/swiper.3.2.0.min.js');?>"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 3000,
        autoplayDisableOnInteraction: false
    });
 </script>	
	</body>
</html>
