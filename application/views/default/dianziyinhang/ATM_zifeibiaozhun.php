<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>ATM资费标准</title>
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
		}
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.all img{
			float: left;
			
			
		}
		.duanluo{
			font-size: 0.27rem;
			line-height: 0.37rem;
			color: #545454;
			text-indent: 0.54rem;
		}
		
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url(<?php echo base_url('statics/images3/icon.png');?>) no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.28rem;
			margin-left: 0.6rem;
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
		<img src="<?php echo base_url('statics/images3/ATM3.jpg');?>" width="100%" height="100%"/>
		
	</div>
	<div class="all">
		<img style="margin-top: 0.42rem;"  src="<?php echo base_url('statics/images3/ATm_03.jpg');?>" alt="" width="100%"/>
		<img style="margin-top: 0.15rem;" src="<?php echo base_url('statics/images3/ATm_06.jpg');?>" width="100%"/>
	</div>
	<img style="margin-top: 0.42rem;" src="<?php echo base_url('statics/images3/grcb.jpg');?>" alt="" width="100%" class="erweima"/>
	<div class="phone"><p>0371-69530036</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>