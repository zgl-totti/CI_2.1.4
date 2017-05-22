<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>支付宝业务</title>
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
		}
		p{
			margin: 0;
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.37rem;
			text-align:justify; text-justify:distribute-all-lines;

		}
		ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}
		ol{
			margin-left: -0.2rem;
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
			width:94%;
			margin: 0 auto;
		}
		.all img{
			display: block;
			float: left;
			margin-top: 0.42rem;
			margin-bottom: 0.15rem;
		}
		.duanluo{
			font-size: 0.27rem;
			line-height: 0.37rem;
			color: #545454;
			text-indent: 0.54rem;
			text-align:justify; 
			text-justify:distribute-all-lines;
		}
		
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url(<?php echo base_url('statics/images3/icon.png');?>) no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.28rem;
			margin-left: 0.6rem;
		}
		.bot{
			height: 0.68rem;
			width: 100%;
		}
		.erweima{
			display: block;
			margin-bottom: 0.47rem;
			margin-top: 0.3rem;
		}
		.bot img{
			display: block;
			float: left;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images3/sss.jpg');?>" width="100%" height="100%"/>
		
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images3/zhifubaoyewu_03.jpg');?>" alt="" width="100%"/>
			<p class="duanluo">支付宝快捷（含卡通）支付是我省农商银行通过“农商银共享式网上银行系统”平台，与中国第三方支付龙头企业-支付宝有限责任公司联合推出的无卡支付功能，即客户通过我省农商
				银行个人网上银行开通支付宝卡通或通过支付宝官网开通支付宝快捷产品功能，将支付宝账户与金燕卡绑定，只需登陆支付宝账户，凭支付宝支付密码即可使用绑定的金燕卡进行充值、转账、购物、提现等服务功能。
			</p>
			<p class="duanluo">
				2012年我省农商银行支付宝快捷（含卡通）支付功能正式开通，拥有金燕卡的广大客户通过签约支付宝快捷或卡通支付，就可进行淘宝购物、信用卡还款、水电煤气缴费、手机充值、爱心捐赠、收付款
				等电子商务。支付宝快捷（含卡通）上线，大大丰富了金燕卡服务功能，对提高金燕卡的市场竞争力起到积极作用，开辟了我省农商银行无卡支付的新时代，有助于我行打造“电子商务”品牌形象。
			</p>
		<img src="<?php echo base_url('statics/images3/zhifubao2_06.jpg');?>" alt="" width="100%" class="banli"/>
			<p class="duanluo">已签约网上银行的客户可使用“网上支付-支付宝卡通签约”菜单流程完成签约，如没有支付宝账户可填写手机号码作为支付宝账号；未签约网上
				银行的用户如需使用支付宝业务请到支付宝客户端签约支付宝快捷业务。
			</p>
		<img src="<?php echo base_url('statics/images3/zhifubao_11.jpg');?>" alt="" width="100%" class="zifei"/>
			<p class="duanluo">1.支付宝卡通（快捷）可签约几张金燕卡</p>
			<p class="duanluo">支付宝公司最多支持6张银行卡卡通及快捷的签约，用户最大可签约6张金燕卡-支付宝卡通（快捷）业务。此
				项业务最新规则请咨询支付宝官方客服服务热线0571-88156688 或 95188（已开通浙江、北京）7X24小时服务。
			</p>
			<p class="duanluo">2.支付宝卡通业务签约失败</p>
			<p class="duanluo">如支付宝卡通业务签约失败，请确认以下事项：网上银行安全认证介质为USBkey；卡通签约手机号码同柜面个人客户信息预留手机号码一致；
				限额设置在5000元以内；支付宝卡通和支付宝快捷签约只能选择一种方式，已签约支付宝快捷无法再签约卡通。
			</p>
			<p class="duanluo">3.个人网上银行USBkey用户证书有效期</p>
			<p class="duanluo">个人网上银行USBkey用户使用的数字证书有效期为三年，证书到期前一个月内需到柜面办理证书换发手续，以免影响使用。</p>
	</div>
	<img class="erweima" src="<?php echo base_url('statics/images3/grcb.jpg');?>" alt="" width="100%" />
	<div class="phone"><p>0371-69530036</p></div>
	<div class="bot"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>