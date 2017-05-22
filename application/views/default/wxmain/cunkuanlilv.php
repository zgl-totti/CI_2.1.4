<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>存款利率</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2,">
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
		
		
		.all{
			width: 94%;
			margin: 0 auto;
			font-size:0;
		}
		
		
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url(<?php echo base_url('statics/images6/');?>/icon.png) no-repeat 0.18rem center;
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
<img src="<?php echo base_url('statics/images6/');?>/cunkuanlilv1.png" width="100%"/>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images6/');?>/cunkuanlilv_03.png" width="100%"/>
		<img src="<?php echo base_url('statics/images6/');?>/grcb.jpg" alt="" width="100%" class="erweima"/>
	</div>
	
	<div class="phone"><p>0371-69530017</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images6/');?>/bot.png" alt="" width="100%"/></div>
</body>
</html>
