<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>路路通汽车消费贷款</title>
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
		p{
			margin: 0;
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.37rem;
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
			margin:0 auto;
			margin-bottom: 0.42rem;
		}
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.all img{
			float: left;
			margin-bottom: 0.35rem;
		}
		.synopsis{
			display: block;
		}
		.synopsis li{
			font-size: 0.27rem;
			color: #535354;
			/*margin-left: -0.11rem;*/
			line-height: 0.37rem;
		}
		.banli{
			margin: 0.35rem 0 0.33rem 0;
		}
		.zifei{
			margin: 0.42rem 0 0.3rem 0;
		}
		.erweima{
			margin: 0.42rem 0 0.31rem 0;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images/icon.png') ?>")no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.32rem;
			margin-left:0.7rem;
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
		<img src="<?php echo base_url('statics/images/lulutong.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images/chanpinjianjie.jpg');?>" alt="" width="100%"/>
		<ul class="synopsis">
			<li>【产品介绍】</li><p>个人汽车消费贷款是指巩义农商银行向申请购买汽车的借款人发放的人民币贷款业务。</p>
			<li>【适用对象】<p>巩义市辖区内有固定住所的公民，购买有巩义农商银行确定的经销商销售的各类汽车，支付不低于所购汽车全部价款的30%作为购车的首期付款，并且需要具备以下基本条件：</p>
				<ol>
					<li>具有完全民事行为能力。</li>
					<li>具有稳定的职业和偿还贷款本息的能力，信用良好。</li>
					<li>能够提供有效的抵押物或质物，或有足够代偿能力的个人或单位作为保证人。</li>
					<li>能够支付30%首期付款。</li>
					<li>借款人年龄应在18-55岁之间。</li>
					<li>巩义农商银行规定的其他条件。</li>
				</ol>
			</li>
		</ul>
		<img src="<?php echo base_url('statics/images/xiangguanzifei.jpg');?>" alt="" width="100%" class="zifei"/>
		<ul class="synopsis">
			<li>【贷款额度、期限】</li><p>贷款额度最高为所购汽车全部价款的70%。</p>
		</ul>
	</div>
	<img src="<?php echo base_url('statics/images/grcb.jpg');?>" alt="" width="100%" class="erweima"/>
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>