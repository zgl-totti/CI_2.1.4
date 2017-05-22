<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>个人经营类</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
		
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
	<style type="text/css">
		*{
			box-sizing: border-box;
			outline: none;
		}
		body{
			margin: 0;
			font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑";
			
			background-color: #f8f9f9;
			font-size: 0;
		}
		p{
			margin: 0;
			font-size: 0.3rem;
			color: #545454;
			line-height: 1rem;
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
			width: 90%;
			height: 3.35rem;
			margin: 0.21rem auto;
			margin-bottom: 0.97rem;
		}
		.option{
			width: 90%;
			margin: 0 auto;
			height: 1rem;
			border: 0.01rem solid #d4d4d4;
			background-color: #FFFFFF;
			border-radius: 0.1rem;
			margin-top: 0.42rem;
			background: #fff;
		}
		.icon,.iconTwo,.iconThree{
			width: 1.04rem;
			height: 1rem;
/*			background: url(.../images/gerenjingying-icon.png) no-repeat 0.26rem center;*/
			background: url("<?php echo base_url('statics/images/gerenjingying-icon.png') ?>") no-repeat 0.26rem center;
			background-size: 0.51rem 0.51rem;
			float: left;
		}
		.iconTwo{
			background: url("<?php echo base_url('statics/images/gerenjingying-icon1.png') ?>") no-repeat 0.28rem center;
			background-size: 0.47rem 0.44rem;
		}
		.iconThree{
			background: url("<?php echo base_url('statics/images/gerenjingying-icon2.png') ?>") no-repeat 0.28rem center;
			background-size: 0.44rem 0.46rem;
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
			width:0.2rem;
			margin-top: 0.27rem;
			margin-right: 0.2rem;
		}
	</style>
</head>
<body>
	<div class="imgBox">
				<div class="banner1">
	  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenjingyinlei (1).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenjingyinlei (2).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenjingyinlei (3).jpg');?>" width="100%" height="100%"/></div> 
        </div>
	        <div class="swiper-pagination"></div>
		</div>
</div>
			</div>
	
	
	<a href="<?php echo site_url('wxmain/daikuan08');?>">
		<div class="option clearfix">
			<div class="icon"></div>
			<p>金燕农贷通</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan10');?>">
		<div class="option clearfix">
			<div class="iconTwo"></div>
			<p>金燕商贷通</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan05');?>">
		<div class="option clearfix">
			<div class="iconThree"></div>
			<p>个人房产抵押循环贷</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
		<a href="<?php echo site_url('wxmain/dzyh23');?>">
		<div class="option clearfix">
			<div class="iconThree"></div>
			<p>金燕微贷通</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
		
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