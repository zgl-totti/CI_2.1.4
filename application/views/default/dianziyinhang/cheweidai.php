<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>车位贷</title>
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
		p{
			margin: 0;
			font-size: 0.22rem;
			color: #535354;
			line-height: 0.28rem;
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
		.yewu_jianjie{
			margin: 0.66rem 0 0.09rem;
		}
		.shouli_kazhong{
			margin: 0.65rem 0 0.1rem;
		}
		.yewu_gongneng{
			margin: 0.68rem 0 0.09rem;
		}
		.shenban_cailiao{
			margin: 0.69rem 0 0.23rem;
		}
		.zhuyi_shixiang,.shenpi_liucheng{
			margin: 0.69rem 0 0.23rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
		}
		li{
			font-size: 0.22rem;
			color: #e53936;
			line-height: 0.28rem;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images/icon.png') ?>") no-repeat 0 center;
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
		<img src="<?php echo base_url('statics/images3/cheweidai.png');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images3/chanpinjianjie.jpg');?>" alt="" class="yewu_jianjie" width="100%"/>
		<p style="color:#e53936";>【产品介11绍】</p>
		<p>车位贷款是指巩义农商银行向已批准同意按揭合作的房地产开发公司的业主提供的一手车位（含车库）贷款。</p>
		<p style="color:#e53936";>【适用对象】</p>
		<p>巩义农商银行批准的按揭贷款准入的社区业主</p>
		<p style="color:#e53936";>【办理条件】</p>
		<p>车位贷款的借款人是具有完全民事行为能力的自然人，且同时具备以下条件： </p>
		<p>1.具有稳定的职业和经济收入，有偿还能力；</p>
		<p>2.具有购买同一小区住房的合同或协议； </p>
		<p>3.已签署购买车位的合同或协议；</p>
		<p>4.能够支付最低不低于车位全部价款30％的首付款；</p>
		<p>5.个人信用良好，无恶意欠款记录；</p>
		<p>6.巩义农商银行要求的其他条件。</p>
		<img src="<?php echo base_url('statics/images3/cheweidai-icon.png');?>" width="100%" class="shouli_kazhong"/>
		<p style="color:#e53936";>（一）&nbsp;&nbsp;贷款资料</p>
		<p class="paragraph">1.借款人及配偶的有效身份证件及结婚证、户口簿；</p>
		<p class="paragraph">2.借款人及配偶的经济收入证明和有关资产证明；</p>
		<p class="paragraph">3.购房合同、购房发票及购买车位的合同、协议；</p>
		<p class="paragraph">4.已付车位首付款的发票或收据；</p>
		<p class="paragraph">5.担保方式采取抵质押方式的，提供抵质押权利证书；</p>
		<p class="paragraph">6.巩义农商银行要求的其他资料。</p>
		<img src="<?php echo base_url('statics/images3/xiangguanzifei.jpg');?>" width="100%" class="yewu_gongneng"/>
		<p style="color:#e53936";>（一）&nbsp;&nbsp;贷款额度、期限</p>
		<p class="paragraph">贷款额度最多不超过其所购车位价格的70%。单个车位的贷款额度最多不超过10万元（含）且单个借款人贷款最高额度不超过20万元（含）。</p>
		<img src="<?php echo base_url('statics/images3/grcb.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>