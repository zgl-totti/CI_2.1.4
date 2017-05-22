<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>企业理念</title>
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
			font-size: 0.22rem;
			color: #535354;
			line-height: 0.28rem;
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
			height: 4.39rem;
			overflow: hidden;
			margin-bottom: 0.1rem;
		}
		
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.kong{
		width: 100%;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images4/dianhuatubiao_03.png');?>") no-repeat 0 center;
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
		<img src="<?php echo base_url('statics/images4/qiyelinian.jpg');?>" width="100%"/>
	</div>
	
	<div class="all">
		<div class="kong">
			<video loop="loop" width="100%" height="200" controls poster="<?php echo base_url('statics/images4/shipin.jpg');?>">
	<source src="<?php echo base_url();?>/777.mp4" type="video/mp4" />
	  <source src="777.ogg" type="video/ogg" />
	  <source src="777.webm" type="video/webm" />
	  <object data="<?php echo base_url();?>/777.mp4" width="100" height="100">
	    <embed src="<?php echo base_url();?>/777.mp4" width="100" height="100" />
	  </object>
	</video>
		</div>
		<img src="<?php echo base_url('statics/images4/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>