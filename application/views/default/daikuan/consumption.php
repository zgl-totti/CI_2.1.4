<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>个人消费类</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
			
			font-size: 0;
			background-color: #f8f9f9;
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
			margin-bottom: 0.38rem;
		}
		.option{
			width: 90%;
			margin: 0 auto;
			height: 1rem;
			border: 0.01rem solid #d4d4d4;
			background: #fff;
			border-radius: 0.1rem;
			margin-top: 0.42rem;
		}
		.iconone,.icon,.iconTwo,.iconThree,.iconFour,.iconFive,.iconSix,.iconSeven{
			width: 1.04rem;
			height: 1rem;
		/*	background: url(../images/gerenxiaofei-icon.png) no-repeat 0.43rem center;*/
			background: url("<?php echo base_url('statics/images/gerenxiaofei-icon.png') ?>")no-repeat 0.43rem center;
			background-size: 0.2rem 0.42rem;
			float: left;
		}
		.iconone{
			background: url("<?php echo base_url('statics/images3/xinyidai.png') ?>")no-repeat 0.3rem center;
			background-size: 0.40rem;
		}
		.iconTwo{
			background: url("<?php echo base_url('statics/images/gerenxiaofei-icon1.png') ?>")no-repeat 0.3rem center;
			background-size: 0.46rem 0.38rem;
		}
		.iconThree{
			background: url("<?php echo base_url('statics/images/gerenxiaofei-icon2.png') ?>")no-repeat 0.33rem center;
			background-size: 0.4rem 0.33rem;
		}
		.iconFour{
			background: url("<?php echo base_url('statics/images/gerenxiaofei-icon3.png') ?>")no-repeat 0.33rem center;
			background-size: 0.42rem 0.46rem;
		}
		.iconFive{
			background: url("<?php echo base_url('statics/images3/dasd22.png') ?>") no-repeat 0.33rem center;
			background-size: 0.41rem 0.45rem;
		}
		.iconSix{
			background: url("<?php echo base_url('statics/images3/cheweidaixx.png') ?>") no-repeat 0.33rem center;
			background-size: 0.41rem 0.45rem;
		}
		.iconSeven{
			background: url("<?php echo base_url('statics/images3/jinyanxiaodaitongg.png') ?>") no-repeat 0.33rem center;
			background-size: 0.41rem 0.45rem;
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
			margin-top: 0.3rem;
			margin-right: 0.2rem;
		}
	</style>
</head>
<body>
	
	<div class="imgBox">
				<div class="banner1">
	  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenxiaofeilei (1).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenxiaofeilei (2).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/gerenxiaofeilei (3).jpg');?>" width="100%" height="100%"/></div> 
        </div>
	        <div class="swiper-pagination"></div>
		</div>
</div>
			</div>
	<a href="<?php echo site_url('wxmain/xinyidai');?>">
		<div class="option clearfix">
			<div class="iconone"></div>
			<p>信易贷</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	
	<a href="<?php echo site_url('wxmain/daikuan11');?>">
		<div class="option clearfix">
			<div class="icon"></div>
			<p>金燕职贷通</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan02');?>">
		<div class="option clearfix">
			<div class="iconTwo"></div>
			<p>个人住房按揭贷款</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan09');?>">
		<div class="option clearfix">
			<div class="iconThree"></div>
			<p>路路通汽车消费贷款</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan01');?>">
		<div class="option clearfix">
			<div class="iconFour"></div>
			<p>个人商用房按揭贷款</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	
	
	
	
	<a href="<?php echo site_url('wxmain/daikuan06');?>">
		<div class="option clearfix">
			<div class="iconFive"></div>
			<p>个人新农村房产分期贷款</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>

	<a href="<?php echo site_url('wxmain/dzyh25');?>">
		<div class="option clearfix">
			<div class="iconSix"></div>
			<p>车位贷</p>
			<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan37');?>">
		<div class="option clearfix">
			<div class="iconSeven"></div>
			<p>金燕消贷通</p>
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
