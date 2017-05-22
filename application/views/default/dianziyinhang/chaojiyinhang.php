<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>超级网银</title>
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
		<img src="<?php echo base_url('statics/images3/chanjibanner_02.png');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images3/chaojiwangyin_08.png');?>" alt="" class="jianjie" width="100%"/>
		<p class="paragraph">人民银行超级网银支付清算系统</p>
		<p class="paragraph">俗称“超级网银”</p>
		<p class="paragraph">它能为个人和单位用户提供跨行实时的资金汇划</p>
		<p class="paragraph">跨行账户和账务查询 、跨行收款！</p>
		<img src="<?php echo base_url('statics/images3/chaojiwangyin_06.png');?>" width="100%" class="tedian"/>
		<p class="paragraph">【跨行转账、支付业务实时到账】</p>
		<p class="paragraph">用河南农信超级网银跨行转账，不仅免费</p>
		<p class="paragraph">还不需要收款银行开户行名称（总行清算）</p>
		<p class="paragraph">最大的特点是5万以内（含5万）</p>
		<p class="paragraph">跨行转账实时到账</p>
		<p class="paragraph">您只需要登录河南农信网上银行</p>
		<p class="paragraph">客户点击“转账汇款”——选择“跨行快汇”即可</p>
		<p class="paragraph">因为超级网银7×24小时连续运行的的模式</p>
		<p class="paragraph">节假日照样实时到账！</p>
		<p class="paragraph">【实现一站式财富管理】</p>
		<p class="paragraph">使用传统网银</p>
		<p class="paragraph">想知道自己在各家银行账户情况如何</p>
		<p class="paragraph">需进行多次登陆、查询操作</p>
		<p class="paragraph">超级网银能够帮您实现一站式查询</p>
		<p class="paragraph">您只需要登陆咱河南农信的网上银行界面</p>
		<p class="paragraph">就可以查询本人名下其他银行签约网银账户的余额、明细</p>
		<p class="paragraph">【强大的资金归集功能】</p>
		<p class="paragraph">开通河南农信网上银行</p>
		<p class="paragraph">客户就可以通过跨行收款</p>
		<p class="paragraph">归集本人名下其他银行签约网银帐户的资金</p>
		<img src="<?php echo base_url('statics/images3/chaojiwangyin_03.png');?>" width="100%" class="IC_jianjie"/>
		<p class="paragraph">简单来说</p>
		<p class="paragraph">不管谁给你哪个行汇了款</p>
		<p class="paragraph">你都不必操心</p>
		<p class="paragraph">只要您做了跨行收款的签约</p>
		<p class="paragraph">资金就能转入到河南农信的账户！</p>
		<p class="paragraph">注意：目前，河南农信超级网银只在网上银行渠道上线</p>
		<p class="paragraph">手机银行超级网银即将上线</p>
		<p class="paragraph">届时将为您创造更为便捷的服务！</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="tel">
				<span><img src="<?php echo base_url('statics/images1/dianhuatubiao_03.png');?>" width="100%"/></span><p>0371-69530036</p>
		</div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>