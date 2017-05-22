<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>生活11缴费</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script>
		!(function(doc, win) {
		    var docEle = doc.documentElement,
		        evt = "onorientationchange" in window ? "orientationchange" : "resize",
		        fn = function() {
		            var width = docEle.clientWidth;
		            width && (docEle.style.fontSize = 100 * (width / 1080) + "px");
		        };
		     
			    win.addEventListener(evt, fn, false);
			    doc.addEventListener("DOMContentLoaded", fn, false);
			}(document, window));
		</script>
	</head>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		body{
			font-family: "微软雅黑";
			background: #efeef3;
		}
		.liebiao{
			width: 100%;
			float: left;
			margin-top: 0.3rem;
		}
		.liebiao li a{
			text-decoration: none;
			color: #545454;
		}
		.liebiao li{
			height: 1.66rem;
			width: 100%;
			
			border-top: 1px solid #e2e2e2;
			border-bottom: 1px solid #e2e2e2;
			float: left;
			font-size: 0.5rem;
			line-height: 1.66rem;
			box-sizing: border-box;
			padding-left: 1.3rem;
		}
		.tu1{
			background:#FFFFFF url("<?php echo base_url('statics/images5/shuifei.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu2{
			background:#FFFFFF url("<?php echo base_url('statics/images5/dianfei.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu3{
			background:#FFFFFF url("<?php echo base_url('statics/images5/meiqifei.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu4{
			background:#FFFFFF url("<?php echo base_url('statics/images5/guhuafei.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu5{
			background:#FFFFFF url("<?php echo base_url('statics/images5/kuandaifei.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu6{
			background:#FFFFFF url("<?php echo base_url('statics/images5/youxiandianshi.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu7{
			background:#FFFFFF url("<?php echo base_url('statics/images5/jiaotongweizhang.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
	</style>
	<body>
		<ul class="liebiao">
			<a href="#"><li class="tu1">水费</li></a>
			<li class="tu2"><a href="#">电费</a></li>
			<li class="tu3"><a href="#">燃气费</a> </li>
			<li class="tu4"><a href="#">电话费</a></li>
			<li class="tu5"><a href="#">宽带费</a></li>
			<li class="tu6"><a href="#">有线电视费</a></li>
			<li class="tu7"><a href="#">交通违章</a></li>
		</ul>
	</body>
</html>
