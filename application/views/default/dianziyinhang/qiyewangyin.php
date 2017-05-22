<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>企业网银</title>
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
		/*.jianjie{
			margin: 0.66rem 0 0.09rem;
		}
		*/
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
	<div class="all">
		<img src="<?php echo base_url('statics/images1/xinqiyewangyti.png');?>" alt="" class="jianjie" width="100%"/>
		<p class="paragraph" style="margin-top:0.3rem;">企业网上银行主要包括账户查询、交易明细查询、行内转账、跨行转账、集团理财、代发工资等业务。集团理财是指经过授权后，集团客户总公司可以直接动用分公司/子公司银行的账户，将集团各分公司/子公司的资金统一上划或者下拨，集中处理运用集团资金的一种理财方式。代发工资业务是指客户可以通过网上银行菜单，上传工资表，自主进行代发工资业务。</p>
		<img src="<?php echo base_url('statics/images1/gerenwangyin-icon1.jpg');?>" width="100%" class="kaiban_liucheng"/>
		<p class="paragraph">1.开立河南省农商银行结算账户。</p>
		<p class="paragraph">客户在开户营业网点柜台申请开通河南省农商银行结算账户。</p>
		<p class="paragraph">2.填写网银服务申请表。</p>
		<p class="paragraph">客户在营业网点柜台填写企业网上银行服务申请表-l和企业网上银行服务申请表-2，申请企业网上银行开户。</p>
		<p class="paragraph">3.录入客户信息。</p>
		<p class="paragraph">柜员在系统中录入企业客户信息、授权信息、企业用户信息并设置网银登录密码。</p>
		<p class="paragraph">4.下载证书。</p>
		<p class="paragraph">柜员在系统中帮助企业用户下载USBkey证书。</p>
		<p class="paragraph">5.登录网银。</p>
		<p class="paragraph">客户在互联网上登录企业网上银行。网址为https：//ebank.hnnx.com/。客户必须在电脑中插入USBkey才能正确访问企业网上银行登录页面。</p>
		<img src="<?php echo base_url('statics/images1/gerenwangyin-icon2.jpg');?>" width="100%" class="zhuanzhang_xiange"/>
		<p class="paragraph">使用我行网上银行转账时，行内转账实时到账；跨行转账，工作时间选择加急通道实时到账，且无任何转账手续费！企业用户单笔转账限额500万，日累计限额5000万。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>