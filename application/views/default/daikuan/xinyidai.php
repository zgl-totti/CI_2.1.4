<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>信易贷</title>
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
			margin: 0 auto;
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
			margin: 0.42rem 0 0.33rem 0;
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
		<img src="<?php echo base_url('statics/images/xyd_banner_02.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images/chanpinjianjie.jpg');?>" alt="" width="100%"/>
		<ul class="synopsis">
			<li>【产品介绍】</li><p>“信易贷”是指巩义农商银行在核定额度和授信期内向公职人员发放的信用贷款。</p>
			<li>【适用对象】
				<ol>
					<li>巩义辖区公务员及比照公务员管理的其他事业单位、人民团体等从事公共事务管理部门的正式在编工作人员；</li>
					<li>金融、电力、烟草、电信等机构工作人员；</li>
					<li>具有注册执业资格的高端收入人群。</li>
				</ol>
			</li>
			<li>【贷款条件】
				<ol>
					<li>有固定的职业和稳定的收入来源，且工资发放正常；</li>
					<li>借款人在单位表现良好，无违规、违纪行为；</li>
					<li>信用观念强，资信状况良好；</li>
					<li>巩义农商银行规定的其他条件。</li>
					
				</ol>
			</li>
		</ul>
		<img src="<?php echo base_url('statics/images/banlizhinan.jpg');?>" alt="" width="100%" class="banli"/>
		<ul class="synopsis">
			<li>【贷款资料】
				<ol>
					<li>借款人及关系人有效身份证、婚姻关系证明；</li>
					<li>固定住所证明资料；</li>
					<li>借款人的工资证明资料；</li>
					<li>巩义农商银行要求的其他资料。</li>
				</ol>
			</li>
		</ul>
		<img src="<?php echo base_url('statics/images/xiangguanzifei.jpg');?>" alt="" width="100%" class="zifei"/>
		<ul class="synopsis">
			<li>【贷款额度、期限】</li><p>贷款额度最高30万元，贷款期限最长5年。</p>
		</ul>
	</div>
	<img src="<?php echo base_url('statics/images/grcb.jpg');?>" alt="" width="100%" class="erweima"/>
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>