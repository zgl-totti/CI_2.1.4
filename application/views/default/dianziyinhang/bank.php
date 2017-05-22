<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>电子银行</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #fff;
		font-family: "微软雅黑"
	}
	.content_dk{
		margin: 0 auto;
		width: 94%;
	}
	/*.bannner_daikuan{
		
		padding-bottom: 13px;
		background: #ebebeb;
	}*/
	.business{
		width: 100%;
		height: 50px;
		line-height: 50px;
		border-bottom: 1px solid #ebebeb;
	}
	.jinyanka{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 30px;
		height:30px;
		overflow: hidden;
	}
	.wenzi{
		display: inline-block;
		height: 50px;
		line-height: 50px;
		float: left;
		color: #545454;
		font-size: 18px;
	}
	.posyewu{
		display: inline-block;
		float: left;
		margin-top: 3px;
		margin-right: 20px;
		width: 35px;
		height:35px;
		overflow: hidden;
	}
	.shouji{
		display: inline-block;
		float: left;
		margin-top: 8px;
		margin-right: 20px;
		width: 22px;
		height:35px;
		overflow: hidden;
	}
	.wangshang{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 26px;
		height:33px;
		overflow: hidden;
	}
	.atm{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 25px;
		height:30px;
		overflow: hidden;
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
			/*margin-top: 5px;*/
			margin-right: 20px;
		}
	</style>
</head>
<body>
<div class="imgBox">
	<div class="banner1">
		  <div class="swiper-container">
	        <div class="swiper-wrapper">
	            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/dianzi (2).jpg');?>" width="100%" ></div>
	            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/dianzi (3).jpg');?>" width="100%" ></div>
	            <div class="swiper-slide"><img src="<?php echo base_url('statics/images3/dianzi (1).jpg');?>" width="100%" ></div> 
	        </div>
		        <div class="swiper-pagination"></div>
			</div>
	</div>
</div>
<div class="content_dk">
		<a href="<?php echo site_url('wxmain/dzyh02');?>" class="clearfix">

			<div class="business" style="margin-top: 25.2px;">
				<span class="jinyanka"><img src="<?php echo base_url('statics/images3/yewutubiao_03.png');?>" width="100%"/></span><div class="wenzi">金燕卡</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>	
		</a>
		<a href="<?php echo site_url('wxmain/dzyh06');?>" class="clearfix">
			<div class="business">
				<span class="posyewu"><img src="<?php echo base_url('statics/images3/yewutubiao_07.png');?>" width="100%"/></span><div class="wenzi" style="margin-left: -5px;">POS机业务</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
		<a href="<?php echo site_url('wxmain/dzyh09');?>" class="clearfix">
			<div class="business">
				<span class="jinyanka"><img src="<?php echo base_url('statics/images3/yewutubiao_11.png');?>" width="100%"/></span><div class="wenzi">金燕自助通</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>

			</div>
		</a>
			<a href="<?php echo site_url('wxmain/dzyh12');?>" class="clearfix">
			<div class="business">
				<span class="wangshang"><img src="<?php echo base_url('statics/images3/yewutubiao_14.png');?>" width="100%"/></span><div class="wenzi">网上银行</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
			<a href="<?php echo site_url('wxmain/ssjjh');?>" class="clearfix">
			<div class="business">
				<span class="shouji"><img src="<?php echo base_url('statics/images3/yewutubiao_18.png');?>" width="100%"/></span><div class="wenzi">手机银行</div>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</a>
			<a href="<?php echo site_url('wxmain/atmlby');?>" class="clearfix">
			<div class="business">
				<span class="atm"><img src="<?php echo base_url('statics/images3/yewutubiao_22.png');?>" width="100%"/></span><div class="wenzi">ATM</div>
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