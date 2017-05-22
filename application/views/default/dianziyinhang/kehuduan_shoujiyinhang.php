<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>客户端手机银行</title>
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
			margin: 0.3rem 0 0.09rem;
		}
		.zhuyao_gongneng,.shiyong_duixiang,.banli_licheng,.tese_youshi,.xiazai_famgshi{
			margin: 0.3rem 0 0.12rem;
		}
		.xiazai_saoma{
			width: 2.21rem;
			height: 2.21rem;
			margin: 0.39rem auto;
		}
		.weixin_tishi{
			margin: 0.37rem 0 0.12rem;
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
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon.jpg');?>" alt="" class="yewu_jianjie" width="100%"/>
		<p class="paragraph">客户端手机银行（即APP应用）,是指客户通过注册签约，安装手机银行软件包至智能手机终端，利用手机办理自助金融服务，是一种结合货币电子化与移动通信的一项崭新服务。</p>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon1.jpg');?>" width="100%" class="zhuyao_gongneng"/>
		<p class="paragraph">1.账户查询：账户余额查询、子账户查询、交易明细查询。</p>
		<p class="paragraph">2.账户管理：账户添加/删除/挂失。</p>
		<p class="paragraph">3.自助转账：行内转账、跨行转账、手机号码转账、下挂账户间转账。</p>
		<p class="paragraph">4.手机充值。</p>
		<p class="paragraph">5.理财业务：活期转定期账户；定期转活期账户。</p>
		<p class="paragraph">6.电影票：扣扣电影票。</p>
		<p class="paragraph">7.转账查询。</p>
		<p class="paragraph">8.用户设置：密码修改、昵称设置。</p>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon2.jpg');?>" width="100%" class="shiyong_duixiang"/>
		<p class="paragraph">智能手机客户群体；日常中小额度转账需求客户（单笔交易限额为5万元、日累计不超过5万元）。</p>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon3.jpg');?>" width="100%" class="banli_licheng"/>
		<p class="paragraph" style="text-align:justify; text-justify:distribute-all-lines;">个人客户本人持身份证、银行卡到营业网点填写《河南省农商银行电子银行服务申请表》，申请开通客户端手机银行。</p>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon4.jpg');?>" width="100%" class="tese_youshi"/>
		<p class="paragraph"  style="text-align:justify; text-justify:distribute-all-lines;">1.客户端手机银行具有门槛低、覆盖广、渠道延伸、服务扩展等优势。</p>
		<p class="paragraph" style="text-align:justify; text-justify:distribute-all-lines;">2.客户端操作界面较为直观，能够为客户提供个性化设置和多元化金融服务功能。</p>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon5.jpg');?>" width="100%" class="xiazai_famgshi"/>
		<p class="paragraph">苹果系统：<a href="#" style="font-size: 0.22rem;">苹果商店à”河南农信V2.0”</a></p>
		<div class="xiazai_saoma"><img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon7.png');?>" alt=""  width="100%"/></div>
		<p class="paragraph">安卓系统：<a href="http://mobile.nongxinyin.com/4900/newwap/systemandroid.html" style="font-size: 0.22rem;">http://mobile.nongxinyin.com/4900/newwap/</a>


		</p>

		<div class="xiazai_saoma"><img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon8.png');?>" alt=""  width="100%"/></div>
		<img src="<?php echo base_url('statics/images1/kehuduan_shouji-icon6.jpg');?>" width="100%" class="weixin_tishi"/>
		<p class="paragraph" style="text-align:justify; text-justify:distribute-all-lines;">1.在开通手机银行时，请务必使用您本人的手机号码。切勿轻信以低息贷款、合作投资等为借口，使用他人手机号码开通手机银行，以防资金损失。</p>
		<p class="paragraph"  style="text-align:justify; text-justify:distribute-all-lines;">2.为提高安全级别，防止不法分子破译，建议您将手机银行登录密码和交易密码设置成不同的密码，也不要设置成与绑定银行卡的密码相同，并保管好手机银行登录密码和交易密码等信息，不要将其告知他人。</p>
		<p class="paragraph"  style="text-align:justify; text-justify:distribute-all-lines;">3.我行客户端手机银行可支持多个账户，您可同时开通多个账户，也可在手机银行里自助追加。您通过手机银行自助追加的账户，其功能服务仅限于业务查询。</p>
		<p class="paragraph"  style="text-align:justify; text-justify:distribute-all-lines;">4.使用手机银行会产生上网流量，该费用由通信运营商收取，建议您在使用之前开通手机上网包月服务。</p>
		<p class="paragraph"  style="text-align:justify; text-justify:distribute-all-lines;">5.如果您的手机丢失或手机号码更换，请及时注销手机银行业务或变更手机号码。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>