<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>金燕卡简介</title>
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
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.37rem;
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
		.tedian{
			margin: 0.42rem 0 0.11rem;
		}
		.IC_jianjie{
			margin: 0.42rem 0 0.09rem;
		}
		.tiaojian{
			margin: 0.42rem 0 0.23rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
			text-align:justify;
			text-justify:distribute-all-lines;
		}
		
		.bot{
			height: 0.68rem;
			width: 100%;
		}
		.bot img{
			display: block;
			float: left;
		}
		.tel{
			height: 30px;
			line-height: 30px;
			width: 100%;
			color: #e53936;
			font-size: 14px;
			padding-bottom: 10px;
			
		}
		.tel span{
			display: inline-block;
			float: left;
			
			width: 20px;
			height: 20px;
			overflow: hidden;
			margin-right: 10px;
		}
		.tel p{
			display: inline-block;
			float: left;
			color:#d22222;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_03.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_07.jpg');?>" alt="" class="jianjie" width="100%"/>
		<p class="paragraph">金燕 IC 卡是河南省农商银行发行的符合PBOC标准的金融IC借记卡，除具备存取现金、转账结算、刷卡消费、理财等传统银行卡功能外，还增加了电子现金和行业应用功能，具有使用安全、应用广泛、支付便捷等特点。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_10.jpg');?>" width="100%" class="tedian"/>
		<p class="paragraph">金燕 IC 卡采用先进的智能卡芯片技术，具有体积小、容量大、安全性高、可靠性强，能够有效防范卡内信息被复制、资金被盗取的风险，支持非接触使用、可脱机使用和可实现一卡多用等特点。不但有存取款、转账、消费等功能，还具有电子现金账户，可实现小额快速消费功能。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_12.jpg');?>" width="100%" class="IC_jianjie"/>
		<p class="paragraph">1.金燕IC卡电子现金是一种为方便持卡人小额快速消费而设计的金融应用，持卡人通过圈存将现金或账户存款转入电子现金账户，可进行电子现金闪付消费。电子现金闪付直接从电子现金账户支付，无需输入密码。</p>
		<p class="paragraph">2.IC卡电子现金闪付具备小额快速支付的特征。持卡人选购商品后，确认相应金额，用具备“闪付”功能的金融IC卡在支持银联“闪付”的终端上，轻松一挥便可快速完成支付。单笔金额不超过1000元，无需输入密码。“闪付”终端一般布放在超市、便利店、百货、药房、快餐连锁等零售场所和菜市场、停车场、加油站、旅游景点等公共服务领域。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_14.jpg');?>" width="100%" class="tiaojian"/>
		<p class="paragraph">只需携带有效身份证件到河南省农商银行任一营业网点即可申请办理。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="tel">
				<span><img src="<?php echo base_url('statics/images1/dianhuatubiao_03.png');?>" width="100%"/></span><p>0371-69530036</p>
		</div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>