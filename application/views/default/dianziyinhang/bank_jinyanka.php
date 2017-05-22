<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>金燕卡</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #f8f9f9;
		font-family: "微软雅黑"
	}
	.content_dk{
		margin: 0 auto;
		width: 94%;
	}
	.daikuan{
		width: 96%;
		margin:0 auto;
		line-height: 46px;
		height: 49px;
		border-radius: 5px;
		background: #FFFFFF;
		border: 1px solid #d4d4d4;
		margin-top: 25.2px;
	}
	
	.daikuan span{
		display: block;
		float: left;
		margin-top: 10px;
		width: 22px;
		height: 30px;
		overflow: hidden;
		margin-right: 15px;
		margin-left: 15px;
	}
	.daikuan .daikuan_wenzi{
		float: left;
		color: #545454;
		font-size: 18px;
		height: 50px;
		line-height: 50px;
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
     .imgBox{
			width: 100%;
			
		}
		.jiantou{
			
			float: right;
			width:10px;
			margin-top: 5px;
			margin-right: 20px;
		}
	</style>

</head>
<body>
<div class="imgBox">
	<div class="banner1">
	  <div class="swiper-container">
	    <div class="swiper-wrapper">
	        <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/jinyanka (1).jpg');?>" width="100%" ></div>
	        <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/jinyanka (2).jpg');?>" width="100%" ></div>
	        <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/jinyanka (3).jpg');?>" width="100%" ></div> 
	    </div>
	        <div class="swiper-pagination"></div>
		</div>
	</div>
</div>
<!--<div class="bannner_daikuan">
	<img src="<?php echo base_url('statics/images3/dianziyinhang.jpg');?>" width="100%"/>
</div>-->
<div class="container">
	<div class="content_dk">
		<a href="<?php echo site_url('wxmain/dzyh03');?>">
			<div class="daikuan" style="margin-top:28px;">
				<span><img src="<?php echo base_url('statics/images3/jinyanka_icon_01.png');?>" width="100%"/></span><div class="daikuan_wenzi">金燕卡简介</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
		<a href="<?php echo site_url('wxmain/dzyh04');?>">
			<div class="daikuan">
				<span><img src="<?php echo base_url('statics/images3/jinyanka_icon_06.png');?>" width="100%"/></span><div class="daikuan_wenzi">金燕卡卡样分类</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
		<a href="<?php echo site_url('wxmain/dzyh05');?>">
			<div class="daikuan">
				<span><img src="<?php echo base_url('statics/images3/jinyanka_icon_03.png');?>" width="100%"/></span><div class="daikuan_wenzi">金燕卡资费标准</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
	</div>
	
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