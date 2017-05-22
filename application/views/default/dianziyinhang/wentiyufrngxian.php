<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>问题与风险</title>
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
		.changjian_wenti{
			margin: 0.42rem 0 0.09rem;
		}
		.frngxian_tishi{
			margin: 0.42rem 0 0.11rem;
		}
		.zhuanzhang_xiange{
			margin: 0.72rem 0 0.09rem;
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
		<img src="<?php echo base_url('statics/images1/wentiyufengxian.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/wentiyufengxian-icon.jpg');?>" alt="" class="changjian_wenti" width="100%"/>
		<p class="paragraph">1.如何开通企业网上银行代发业务服务功能？</p>
		<p class="paragraph">企业客户持有效证件、法人授权委托书(法定代表人亲自办理除外)及经办人、企业法人、企业用户身份证件，到河南省农商银行(商业银行)柜面填写企业网上银行服务申请表、签订企业网银代发服务协议，申请开通代发服务。</p>
		<p class="paragraph">2.企业网上银行客户证书有效期多久？</p>
		<p class="paragraph">企业网上银行用户使用的数字证书有效期为一年，请在证书到期前一个月内到柜面办理证书换发手续，以免影响您的使用。</p>
		<p class="paragraph">3.使用企业网上银行系统的企业用户数量要求？</p>
		<p class="paragraph">个体工商户开通企业网上银行至少设置一名企业用户；除个体工商户外，对公户开通企业网上银行至少设置两名企业用户，其中至少有一名企业用户进行授权操作。</p>
		<p class="paragraph">4.企业网上银行相关密码几次锁定或冻结？</p>
		<p class="paragraph">登录密码6次连续输入错误网银暂时冻结，第2天自动解冻；18次连续输入错误，网银永久冻结，需到柜面办理登录密码重置手续。USBkey口令连续6次输入错误锁定，需到柜面办理证书密码重置手续。</p>
		<p class="paragraph">5.企业用户转账显示签名失败如何处理？</p>
		<p class="paragraph">a．请在企业网上银行登录页面上重新下载“网银向导”，然后关掉浏览器并重新安装。</p>
		<p class="paragraph">b．请检查网银向导安装界面中6项内容都为绿色对号；</p>
		<p class="paragraph">c．请启动“开始”菜单中“河南省农商银行USBkey管理工具(握奇或者海泰)；</p>
		<p class="paragraph">d．启动后，电脑右下角有河南省农商银行行标，请双击查看是否装载数字证书；</p>
		<p class="paragraph">e．请重新启动IE浏览器；</p>
		<p class="paragraph">f．如果以上操作无效，请前往柜面做证书补发和证书下载操作。</p>
		<img src="<?php echo base_url('statics/images1/wentiyufengxian-icon1.jpg');?>" width="100%" class="frngxian_tishi"/>
		<p class="paragraph">客户在使用网上银行过程中应注意防范风险，安全措施包括但不限于以下方式：</p>
		<p class="paragraph">1.登录正确网址。</p>
		<p class="paragraph">河南省农商银行网上银行正确网址为https：//ebank.hnnx.com。</p>
		<p class="paragraph">2.保护好账户信息和密码。</p>
		<p class="paragraph">密码输入或设置都应该由单位指定经办人本人亲自操作，不应由他人代办；避免使用单位名称、电话号码、身份证号、银行账号、姓名拼音等与单位明显相关的信息作为密码；不要将密码透露给他人，包括自称银行工作人员在内的任何人。</p>
		<p class="paragraph">3.认真核对交易要素。</p>
		<p class="paragraph">处理网上银行转账业务时，请仔细核对收款人账号和户名等交易要素，核对正确后再提交交易指令。做好交易记录，定期与银行对账。</p>
		<p class="paragraph">4.确保计算机安全。</p>
		<p class="paragraph">下载并安装由我行提供的安全控件；安装并及时更新杀毒软件；不要开启不明来历的电子邮件。</p>
		<p class="paragraph">5.其他必要的保护措施。</p>
		<p class="paragraph">操作网上银行业务时请使用指定的计算机进行，避免与其他办公用途计算机混用；不要在公共场所（如网吧等）使用网上银行；在每次使用网上银行后，请点击页面右上角的“退出”按钮结束使用。</p>
		<p class="paragraph">6.谨防诈骗信息。</p>
		<p class="paragraph">河南省农商银行网上银行业务服务若有重大事项，将会通过网上银行登录页面提前公告客户。不要轻信任何套取网上银行用户名和密码的行为，例如通过电子邮件、信函、电话等方式索要卡号及密码等。若遇到非正常情况，应及时拨打客服电话96288（省外加拨0371）修改相关密码或办理账户挂失。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>