<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>个人网银</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
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
			background: #fff;
			font-size: 0;
		}
		a{
			text-decoration: none;
			color: #1000aa;
		}
		p{
			margin: 0;
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.37rem;
			text-align:justify; text-justify:distribute-all-lines;


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
			height: 4.42rem;
		}
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.jianjie{
			margin: 0.42rem 0 0.09rem;
		}
		.kaiban_liucheng{
			margin: 0.42rem 0 0.11rem;
		}
		.zhuanzhang_xiange{
			margin: 0.42rem 0 0.09rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images3/dianhuatubiao_03.png');?>") no-repeat 0 center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.28rem;
			margin-left: 0.45rem;
		}
		.bot{
			height: 0.68rem;
			width: 100%;
		}
		.bot img{
			display: block;
			float: left;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images1/gerenwangyin.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/gerenwangyin-icon.jpg');?>" alt="" class="jianjie" width="100%"/>
		<p class="paragraph">个人网上银行主要包括账户查询、交易明细查询、行内转账、跨行转账、定活互转、通知存款与活期存款互转、支付宝卡通签约等业务。</p>
		<img src="<?php echo base_url('statics/images1/gerenwangyin-icon1.jpg');?>" width="100%" class="kaiban_liucheng"/>
		<p class="paragraph">1.开立金燕卡账户。客户在营业网点柜台申请开通金燕卡账户。</p>
		<p class="paragraph">2.填写网银服务申请表。客户在营业网点柜台填写个人网上银行服务申请表，申请开户。</p>
		<p class="paragraph">3.录入客户信息。柜员在系统中录入客户信息并设置网银登陆密码。</p>
		<p class="paragraph">4.下载证书。柜员领取USBkey并在系统中帮助客户下载USBkey证书。</p>
		<p class="paragraph">5.登陆网银。客户在互联网上登陆个人网上银行。网址为<a href="https://ebank.hnnx.com">https://ebank.hnnx.com/</a></p>
		<img src="<?php echo base_url('statics/images1/gerenwangyin-icon2.jpg');?>" width="100%" class="zhuanzhang_xiange"/>
		<p class="paragraph">个人转账单笔限额为300万元，日累计不超过2000万元。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>