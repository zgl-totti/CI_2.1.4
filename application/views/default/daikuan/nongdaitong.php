<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>金燕农贷通</title>
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
			line-height: 0.37rem;text-align:justify; text-justify:distribute-all-lines;
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
			margin-left: -0.11rem;
			line-height: 0.37rem;
		}
		.banli{
			margin: 0.37rem 0 0.33rem 0;
		}
		.zifei{
			margin: 0.37rem 0 0.33rem 0;
		}
		.erweima{
			margin: 0.37rem 0 0.31rem 0;
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
			line-height: 0.28rem;
			margin-left: 0.7rem;
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
		<img src="<?php echo base_url('statics/images/jinyannongdaitong.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images/chanpinjianjie.jpg');?>" alt="" width="100%"/>
		<ul class="synopsis">
			<li>【产品介绍】</li><p>巩义农商银行为辖区内农户开发的一款紧贴农业生产特点的产品。客户在授信期限和额度内，随用随贷，周转使用。</p>
			<li>【适用对象】</li><p>本辖区内从事农业生产经营的客户。</P>
			<li>【办理条件】
				<ol>
					<li>有固定住所，身体健康，年龄在55周岁以下。</li>
					<li>无不良信用记录。</li>
					<li>有稳定的经营项目及按期偿还本息的能力，并有较强的抗风险能力。</li>
					<li>借款用途真实、明确、合法。</li>
					<li>遵纪守法，诚实可靠，无不良嗜好。</li>
					<li>巩义农商银行要求的其他条件。</li>
				</ol>
			</li>
		</ul>
		<img src="<?php echo base_url('statics/images/banlizhinan.jpg');?>" alt="" width="100%" class="banli"/>
		<ul class="synopsis">
			<li>【贷款资料】
				<ol>
					<li>借款人、担保人本人及关系人有效身份证、结婚证明。</li>
					<li>生产、经营相关资料。</li>
					<li>借款人、担保人近3个月银行账户流水。</li>
					<li>家庭资产证明相关资料。</li>
					<li>巩义农商银行要求的其他资料。</li>
				</ol>
			</li>
			<li>【基本流程】</li><p>客户申请→客户经理入户调查→资信评定→发放福农卡→客户用信</p>
		</ul>
		<img src="<?php echo base_url('statics/images/xiangguanzifei.jpg');?>" alt="" width="100%" class="zifei"/>
		<ul class="synopsis">
			<li>【贷款额度、期限】</li><p>贷款额度最高可至50万元<br />授信最长期限为3年，期限内单笔贷款最长期限不超过1年。</p>
		</ul>
	</div>
	<img src="<?php echo base_url('statics/images/grcb.jpg');?>" alt="" width="100%" class="erweima"/>
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>
