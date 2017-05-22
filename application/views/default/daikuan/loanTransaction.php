<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>贷款业务</title>
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
			background: #fff;
			font-size: 0;
		}
		p{
			margin: 0;
			font-size: 0.3rem;
			color: #545454;
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
			height: 3.28rem;
		}
		.loanClassification{
			height:0.83rem;
			background-color: #ebebeb;
			font-size: 0.3rem;
			color: #545454;
			line-height: 0.83rem;
			padding-left: 0.21rem;
		}
		.onr-man{
			width: 100%;
		}
		.iption,.iptionTwo,.iptionThree,.iptionFour,.iptionFive,.iptionSix,.iptionSeven{
			height: 0.88rem;
			width: 95%;
			margin: 0 auto;
			border-bottom: 1px solid #ebebeb;
		}
		.icon{
			width: 1.06rem;
			height: 0.88rem;
			background: url("<?php echo base_url('statics/images/daikuan-icon.png') ?>")no-repeat 0.14rem center;
			background-size: 0.45rem 0.42rem;
			float: left;
		}
		.itenName{
			line-height: 0.88rem;
		}
		.xiaofei{
			background: url("<?php echo base_url('statics/images/daikuan-icon1.png') ?>") no-repeat 0.18rem center;
			background-size: 0.43rem 0.37rem;
		}
		.qita{
			background: url("<?php echo base_url('statics/default/img/qitalei.png') ?>") no-repeat 0.18rem center;
			background-size: 0.43rem 0.37rem;
		}
		.chuan-rongzi{
			background: url("<?php echo base_url('statics/images/daikuan-icon2.png') ?>")no-repeat 0.14rem center;
			background-size: 0.45rem 0.42rem;
		}
		.gong-rongzi{
			background: url("<?php echo base_url('statics/images/daikuan-icon3.png') ?>")no-repeat 0.18rem center;
			background-size: 0.43rem 0.37rem;
		}
		.piaoju{
			background: url("<?php echo base_url('statics/images/daikuan-icon4.png') ?>")no-repeat 0.14rem center;
			background-size: 0.45rem 0.42rem;
		}
		.shengqing{
			background: url("<?php echo base_url('statics/images/shenqingxx.png') ?>")no-repeat 0.14rem center;
			background-size: 0.45rem 0.42rem;
		}
		.iptionTwo{
			/*border-bottom: none;*/
		}
		.bot{
			width: 100%;
			height: 0.56rem;
			background-color: #ebebeb;
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
			width:0.2rem;
			margin-top: 0.25rem;
			margin-right: 0.2rem;
		}
	</style>
</head>
<body>
	
	<div class="imgBox">
				<div class="banner1">
	  <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/daikuanyewu (1).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/daikuanyewu (2).jpg');?>" width="100%" height="100%"/></div>
            <div class="swiper-slide"><img src="<?php echo base_url('statics/images/daikuanyewu (3).jpg');?>" width="100%" height="100%"/></div> 
        </div>
	        <div class="swiper-pagination"></div>
		</div>
</div>
			</div>
	<div class="loanClassification" style="height: 0.9rem;line-height: 0.9rem;">
		贷款申请
	</div>
	<a href="<?php echo site_url('wxmain/ddk');?>">
		<div class="onr-man">
			<div class="iptionSix clearfix">
				<div class="icon shengqing"></div>
				<p class="itenName">在线申请</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	
	<div class="loanClassification">
		个人贷款
	</div>
	<a href="<?php echo site_url('wxmain/daikuan03');?>">
		<div class="onr-man">
			<div class="iption clearfix">
				<div class="icon"></div>
				<p class="itenName">个人经营类</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan04');?>">
		<div class="onr-man">
			<div class="iptionTwo clearfix">
				<div class="icon xiaofei"></div>
				<p class="itenName">个人消费类</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/grqtl');?>">
		<div class="onr-man">
			<div class="iptionSeven clearfix">
				<div class="icon qita"></div>
				<p class="itenName">个人其他类</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	<div class="loanClassification" style="height: 0.9rem;line-height: 0.9rem;">
		公司贷款
	</div>
	<a href="<?php echo site_url('wxmain/daikuan19');?>">
		<div class="onr-man">
			<div class="iptionThree clearfix">
				<div class="icon chuan-rongzi"></div>
				<p class="itenName">票据业务</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan17');?>">
		<div class="onr-man">
			<div class="iptionFour clearfix">
				<div class="icon gong-rongzi"></div>
				<p class="itenName">供应链融资</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	<a href="<?php echo site_url('wxmain/daikuan15');?>">
		<div class="onr-man">
			<div class="iptionFive clearfix">
				<div class="icon piaoju"></div>
				<p class="itenName">传统融资</p>
				<div class="jiantou"><img src="<?php echo base_url('statics/images3/jiantouee.png');?>" width="100%"/></div>
			</div>
		</div>
	</a>
	
	
	
	<div class="bot"></div>
	
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