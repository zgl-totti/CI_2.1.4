<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>享档档</title>
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
			
			outline: none;
		}
		body{
			margin: 0;
			font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑";
			background: #fff;
		}
		p{
			margin: 0;
			font-size: 0.22rem;
			color: #535354;
			line-height: 0.34rem;
			text-align: justify;
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
			margin:0 auto;
			overflow: hidden;
			margin-bottom: 0.42rem;
		}
		.all{
			width: 94%;
			margin: 0 auto;
			font-size:0;
		}
		
		
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url(<?php echo base_url('statics/images4/icon.png');?>) no-repeat 0.18rem center;
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
	
		.erweima{
			margin-bottom: 0.5rem;
			margin-top: 0.42rem;
		}
		.wenben{
			text-indent: 0.44rem;
			font-size: 0.22rem;
			line-height: 0.28rem;
			color: #545454;
			margin-top: 0.2rem;
			margin-bottom: 0.3rem;
		}
		p img{
			margin: 0.23rem 0;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images4/xiangdangdang_03.jpg');?>" width="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images4/xiangdangdang_03.png');?>" alt="" width="100%"/>
		<div class="wenben">
			享档档是河南农信社（农商行）面向个人客户推出的一款储蓄存款产品，提前支取按定期存款靠档计息，满一年期自动约转，可多次部提，兼顾客户资金流动性与收益性。
		</div>
		<img src="<?php echo base_url('statics/images4/xiangdangdang_08.png');?>" alt="" width="100%"/>
		<div class="wenben">
			<p>１.“享档档”业务支持凭证介质为：河南农信金燕卡、普通储蓄存单。</p>
			<p>２.“享档档”产品为定期类产品，个人开户起存金额为壹万元整。</p>
			<p>３.“享档档”产品，存款期限为一年，到期自动约转，无需到营业网点再办理。</p>
			<p>４.存取灵活，支持多次支取。</p>
			<p>５.享活期便利，定期收益，按实际存期向下靠档计息。</p>
		</div>
		<img src="<?php echo base_url('statics/images4/xiangdangdang_06.png');?>" alt="" width="100%"/>
		<p><img src="<?php echo base_url('statics/images4/lilvtu_03.png');?>" width="100%"/></p>
		<p>
			例：王女士于2016年１月１日分别存入10万元“享档档”存款、10万元一年定期存款，2016年8月１日分别支取，存期７个月。

		</p>
		<p><img src="<?php echo base_url('statics/images4/lilv_03.png');?>" width="100%"/></p>
		<p>
			例：王女士于2016年１月１日分别存入10万元“享档档”存款、10万元两年定期存款，2017年8月１日分别支取，存期19个月。

		</p>
		<p><img src="<?php echo base_url('statics/images4/lilv_06.jpg');?>" width="100%"/></p>
		<p>　
			<span style="color: #e53936;">注：</span>活期利率指支取日河南农信 （农商行） 挂牌活期利率，３个月、６个月、１年定期利率指起息日河南农信 （农商行）挂牌相应档次定期利率。
		</p>
		<img src="<?php echo base_url('statics/images4/xiangdangdang_08.png');?>" alt="" width="100%" style="margin: 0.2rem 0;"/>
		<p><span style="color: #e53936;">（一）零风险 </span>储蓄存款产品，本息安全有保证</p>
		<p><span style="color: #e53936;">（二）收益高</span> 按实际存期向下靠档计息（满三个月不满六个月的整个存期按开户日三个月定期利率计息，满六个月不满一年的整个存期按开户日六个月定期利率计息）</p>
		<p><span style="color: #e53936;">（三）存取灵活 </span>随用随取，存款支取金额靠档计息</p>
		<p><span style="color: #e53936;">（四）办理方便</span> 携带本人有效身份证件在巩义农商银行任一网点即可办理</p>
		<p><span style="color: #e53936;">（五）准入门槛低</span> 起存金额1万元</p>
		<p><span style="color: #e53936;">（六）方便省心 </span>存期满一年按开户日一年定期利率计息，到期未支取连本带息转入下一存期。</p>
		<img src="<?php echo base_url('statics/images4/grcb.jpg');?>" alt="" width="100%" class="erweima"/>
	</div>
	
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images4/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>
