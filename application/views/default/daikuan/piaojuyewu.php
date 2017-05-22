<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>">
		<title>票据业务</title>
	<style type="text/css">
	body{
		font-family: "微软雅黑";
		background: #f8f9f9;
	}
		.container_ct{
			width: 90%;
			margin:0 auto;
		}
		.imgBox{
			width: 100%;
			
		}
		.daikuan{
			width:100%;
			height:50px;
			background: #FFFFFF;
			border-radius: 5px;
			border: 1px solid #d4d4d4;
			margin-bottom: 25.2px;
		}
		.daikuan span{
			width: 20px;
			height: 30px;
			overflow: hidden;
			display: block;
			float: left;
			margin-top: 13px;
			margin-left: 15px;
			margin-right: 10px;
		}
		.weizi1{
			float: left;
			height: 49px;
			line-height: 49px;
			font-size: 18px;
			color: #545454;
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
			/*height: 200px;
			overflow: hidden;*/
		}
		.jiantou{
			float: right;
			width:10px;
			margin-top: 10px;
			margin-right: 20px;
		}
	</style>
	</head>
	<body>
		
		<div class="imgBox">
				<div class="banner1">
	  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images1/piaojuyewu (1).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images1/piaojuyewu (2).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images1/piaojuyewu (3).jpg');?>" width="100%" height="100%"/></div> 
        </div>
	        <div class="swiper-pagination"></div>
		</div>
</div>
			</div>
		<div class="container_ct">
			
			<a href="<?php echo site_url('wxmain/daikuan20');?>">
				<div class="daikuan" style="margin-top:25.2px;">
					<span style="margin-top: 15px;"><img src="<?php echo base_url('statics/images1/piaojuyewu_03.png');?>" width="100%"></span><div class="weizi1">票据宝</div>
					<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
				</div>
			</a>
			<a href="<?php echo site_url('wxmain/daikuan21');?>">
				<div class="daikuan">
					<span style="width: 25px;margin-top: 15px;"><img src="<?php echo base_url('statics/images1/piaojuyewu_10.png');?>" width="100%"></span><div class="weizi1">签发银行承兑汇票</div>
					<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
				</div>
			</a>
			<a href="<?php echo site_url('wxmain/daikuan29');?>">
				<div class="daikuan">
					<span><img src="<?php echo base_url('statics/images1/piaojuyewu_14.png');?>" width="100%"></span><div class="weizi1">准全额银行承兑汇票</div>
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
