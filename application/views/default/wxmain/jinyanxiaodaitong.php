<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>金燕消贷通</title>
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
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.34rem;text-align:justify; text-justify:distribute-all-lines;
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
			background: url(<?php echo base_url('statics/images6')?>/icon.png) no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.37rem;
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
			
			font-size: 0.27rem;
			line-height: 0.37rem;
			color: #545454;text-align:justify; text-justify:distribute-all-lines;
			
			
		}
		p img{
			margin: 0.23rem 0;
		}
		.xiaobiaoti{
			
			display: block;
			float: left;
			color:#e53936;
			height: 0.28rem;
			width: 100%;
			font-size: 0.27rem;
			line-height: 0.37rem;
			margin-bottom: 0.1rem;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images6')?>/jinyanxiaodaitong_02.png" width="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images6')?>/jinyanxiaodaitong_05.png" alt="" width="100%" style="margin-top: 0.24rem;margin-bottom: 0.22rem;"/>
		<div class="xiaobiaoti">【产品介绍】</div>
		<div class="wenben">
			金燕消贷通是巩义农商银行向辖内居民发放，用于个人及其家庭消费支出的贷款。
		</div>
		<div class="xiaobiaoti">【适用对象】</div>
		<div class="wenben">
			适合有住房装修、购车、购买耐用消费品、旅游、婚嫁、教育等
		</div>
		<div class="xiaobiaoti">【办理条件】</div>
		<div class="wenben">
			1.在本辖区有常住户口和自有房产，年龄在18周岁（含）至60周岁（含）之间，具有完全民事行为能力的自然人。<br>
2.遵纪守法，个人品行良好，无不良嗜好。<br>
3.有合法、稳定的收入来源。<br>
4.有真实合法的消费证明。<br>
5.本人及配偶无不良信用记录。<br>
6.巩义农商银行要求的其他条件。<br>
		</div>
		<img src="<?php echo base_url('statics/images6')?>/jinyanxiaodaitong_08.png" alt="" width="100%" style="margin-top: 0.24rem;margin-bottom: 0.22rem;"/>
		<div class="xiaobiaoti">【贷款资料】</div>
		<div class="wenben">
			1.借款人、担保人本人及关系人有效身份证、结婚证明。<br>
2.相关消费证明。<br>
3.借款人、担保人近3个月银行账户流水。<br>
4.家庭资产证明相关资料。<br>
5.采取抵质押担保方式的，提供抵质押权利证书。<br>
6.巩义农商银行要求的其他资料。<br>
		</div>
		<img src="<?php echo base_url('statics/images6')?>/jinyanxiaodaitong_10.png" alt="" width="100%" style="margin-top: 0.24rem;margin-bottom: 0.22rem;"/>
		<div class="xiaobiaoti">【贷款额度、期限】</div>
		<div class="wenben">
			贷款额度最高可至50万元<br>
授信最长期限为3年，期限内单笔贷款最长期限不超过1年。<br>

		</div>
		
		<img src="<?php echo base_url('statics/images6')?>/grcb.jpg" alt="" width="100%" class="erweima"/>
	</div>
	
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images6')?>/bot.png" alt="" width="100%"/></div>
</body>
</html>
