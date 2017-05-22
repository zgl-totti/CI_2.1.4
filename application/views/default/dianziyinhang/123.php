<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>ATM</title>
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
			font-size: 0.26rem;
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
		.chaxun_gongneng,.cunqu,.qukuan{
			margin: 0.3rem 0 0.12rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
		}
		.paragraph_other{
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
		<img src="<?php echo base_url('statics/images1/dianziyinhang.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/123 (2).jpg');?>" width="100%" class="icon" style="margin-top: 0.42rem;"/>
		<img src="<?php echo base_url('statics/images1/123 (1).jpg');?>" alt="" class="chaxun_gongneng" width="100%"/>
		<p class="paragraph">业务种类： 银行卡业务  存折业务  无卡业务  口头挂失</p>
		<p class="paragraph">银行卡业务：  IC卡业务  基本业务  电子现金</p>
		<p class="paragraph">基本业务：查询业务  转账业务  修改密码 特色业务</p>
		<p class="paragraph">查询业务：余额查询  账户信息查询  历史明细查询</p>
		<p class="paragraph">转账业务：行内转账  活期转定期  活期转通知 </p>
		<p class="paragraph_other">活期转定期选择日期：三个月  六个月  一年  两年  三年  五年</p>
		<p class="paragraph_other">活期转通知：一天通知  七天通知（通知起存金额为5万元）</p>
		<p class="paragraph">IC卡业务：查询业务  转账业务  修改密码  特色业务  </p>
		<p class="paragraph">电子现金：电子现金信息  电子现金圈提  卡片参数维护 补登充值 绑定账户充值      补登查询  非绑定账户充值  充值明细查询</p>
		<p class="paragraph">特色业务：贷款查询  大额取现预约</p>
		<p class="paragraph">贷款查询：贷款额度查询  贷款信息查询</p>
		<p class="paragraph">大额取现预约：提示预约金额在5万到20万元之间</p>
		<p class="paragraph">无卡业务：无卡转账（需要输入预约号，去柜台上生成一个预约号）</p>
		<img src="<?php echo base_url('statics/images1/123 (4).jpg');?>" width="100%" style="margin-top: 0.3rem;"/>
		<img src="<?php echo base_url('statics/images1/ATM_10.jpg');?>" width="100%" class="qukuan"/>
		
		<p class="paragraph">无卡业务： 口头挂失  无卡存款  无卡取款 （需要输入预约号，去柜台上生成一个预约号）、 无卡转账（需要输入预约号，去柜台上生成一个预约号）。</p>
		<p class="paragraph">有卡业务：查询 转账 存款 取款 改密 特色服务 电子现金</p>
		<p class="paragraph">特色服务：贷款业务（额度查询  贷款查询）、  大额取现预约（提示预约金额在5万到20万元之间）</p>
		<p class="paragraph">转账 ：   行内转账  跨行转账  卡转定期（三个月  六个月  一年  两年  三年  五年）</p>
		<p class="paragraph_other">通知存款（一天通知  七天通知  提示：通知起存金额为5万元）</p>
		<p class="paragraph">电子现金：查询（余额查询、明细查询） 圈提、卡片参数修改（电子现金余额上限、单笔消费限额）、电子现金充值（绑定账户充值、非绑定账户充值）、现金充值、补登圈存。</p>
		<p class="paragraph">限额：    存款单笔最多一万元、日累无限。取款每次最多五千元，日累计最高2万元。</p>
		<img src="<?php echo base_url('statics/images1/123 (6).jpg');?>" width="100%" style="margin-top: 0.3rem;"/>
		<img src="<?php echo base_url('statics/images1/123 (3).jpg');?>" width="100%" class="cunqu"/>
		<p class="paragraph">无卡业务：口头挂失  无卡取款 （需要输入预约号，去柜台上生成一个预约号）、 无卡转账（需要输入预约号，去柜台上生成一个预约号）。</p>
		<p class="paragraph">有卡业务：查询 转账 取款 改密 特色服务 电子现金</p>
		<p class="paragraph_other">特色服务：贷款业务   大额取现预约</p>
		<p class="paragraph">特色服务：贷款业务（额度查询  贷款查询）、  大额取现预约（提示预约金额在5万到20万元之间）</p>
		<p class="paragraph">转账 ： 行内转账  跨行转账  卡转定期（三个月  六个月  一年  两年  三年  五年）</p>
		<p class="paragraph_other">通知存款（一天通知  七天通知  提示：通知起存金额为5万元）</p>
		<p class="paragraph">电子现金：查询（余额查询、明细查询） 圈提、卡片参数修改（电子现金余额上限、单笔消费限额）、电子现金充值（绑定账户充值、非绑定账户充值）、现金充值。</p>
		<p class="paragraph">限额：取款每次最多五千元，日累计最高2万元</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>