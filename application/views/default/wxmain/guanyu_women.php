<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>关于我们</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<script src="js/jquery-1.9.1.min.js"></script>
	
	<script>
		!(function(doc, win) {
		    var docEle = doc.documentElement,
		        evt = "onorientationchange" in window ? "orientationchange" : "resize",
		        fn = function() {
		            var width = docEle.clientWidth;
		            width && (docEle.style.fontSize = 100 * (width / 640) + "px");
		        };
		     
		    win.addEventListener(evt, fn, false);
		    doc.addEventListener("DOMContentLoaded", fn, false);
		}(document, window));
	</script>
	<style>
		*{
			box-sizing: border-box;
			outline: none;
		}
		body{
			margin: 0;
			font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑";
			background: #fff;
		}
		p{
			margin: 0;
			font-size: 0.3rem;
			color: #545454;
			line-height: 0.98rem;
			float: left;
		}
		a{
			text-decoration: none;
		}
		.clearfix:after{
			content:"";
			display: block;
			height: 0;
			clear: both;
			visibility: hidden;
		}
		.clearfix{
			zoom:1;
		}
		.banner{
			width: 100%;
			height:4.6rem;
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
		.option{
			display: block;
			width: 90%;
			margin: 0 auto;
			height: 0.98rem;
			border: 0.01rem solid #d4d4d4;
			background-color: #f8f9f9;
			border-radius: 0.1rem;
			margin-bottom: 0.42rem;
			margin-top: 0.32rem;
		}
		.icon,.iconTwo,.iconThree{
			width: 1.04rem;
			height: 0.98rem;
			background: url("<?php echo base_url('statics/images4/icon.png'); ?>") no-repeat 0.26rem center;
			background-size: 0.29rem 0.31rem;
			float: left;
		}
		.iconTwo{
			background: url("<?php echo base_url('statics/images4/icon1.png'); ?>") no-repeat 0.28rem center;
			background-size: 0.29rem 0.29rem;
		}
		.iconThree{
			background: url("<?php echo base_url('statics/images4/icon3.png'); ?>") no-repeat 0.28rem center;
			background-size: 0.3rem 0.3rem;
		}
		.jiantou{
			
			float: right;
			width:0.2rem;
			margin-top: 0.1rem;
			margin-right: 0.2rem;
		}
	</style>
</head>
<body>
	<div class="banner">
		<div class="swiper-container">
		    <div class="swiper-wrapper">
		       	<div class="swiper-slide"><img src="<?php echo base_url('statics/images4/guanyuwomen (1).jpg'); ?>" width="100%"></div>
		        <div class="swiper-slide"><img src="<?php echo base_url('statics/images4/guanyuwomen (1).png'); ?>" width="100%" ></div>
		        <div class="swiper-slide"><img src="<?php echo base_url('statics/images4/guanyuwomen (2).jpg'); ?>" width="100%" ></div> 
		    </div>
	   </div>
	</div>
	<a href="<?php echo site_url('wxmain/dzyh21');?>" class="option clearfix">
		<div class="icon"></div>
		<p>我行简介</p>
		<p class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></p>
	</a>
	<a href="<?php echo site_url('wxmain/spjs');?>" class="option clearfix">
		<div class="iconTwo"></div>
		<p>企业理念</p>
		<p class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></p>
	</a>
	<a href="<?php echo site_url('wxmain/wdcx');?>" class="option clearfix">
		<div class="iconThree"></div>
		<p>网点查询</p>
		<p class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></p>
	</a>
	
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