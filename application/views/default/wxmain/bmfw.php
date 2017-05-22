<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>生活缴费</title>
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
		.liebiao a{
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
		.tu8{
			background:#FFFFFF url("<?php echo base_url('statics/images5/tianqi.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu9{
			background:#FFFFFF url("<?php echo base_url('statics/images5/chepiao.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
		.tu10{
			background:#FFFFFF url("<?php echo base_url('statics/images5/feiji.png');?>") no-repeat 0.46rem center;
			background-size: 0.55rem;
		}
	</style>
	<body>
		<ul class="liebiao">
			<!--<a href="https://payapp.weixin.qq.com/life/index?showwxpaytitle=1&exportkey=ARFNR3EuaQo0MbIS9O2d3Js%3D&clientversion=26031b31&devicetype=android-23&pass_ticket=w6T3%2B1UlWuJXH8FWL24XhlfMvwBmGag%2B7SsVlHwfpghTdeaueHxUUyh79NLO%2Fqj7#/agency/1/city/49"><li class="tu1">水费</li></a>-->
			<!--<a href="https://payapp.weixin.qq.com/life/index?showwxpaytitle=1&exportkey=AXUtMDurOQAOe7EfBds4wkY%3D&clientversion=26031b31&devicetype=android-23&pass_ticket=w6T3%2B1UlWuJXH8FWL24XhlfMvwBmGag%2B7SsVlHwfpghTdeaueHxUUyh79NLO%2Fqj7#/agency/2/city/49"><li class="tu2">电费</li></a>-->

			<!-- <a href="http://weixin.uxinxin.com/bind.jsp?openid=otySWt2rkzg2R8VPbYPfo6yMT3ZA&showwxpaytitle=1&uuid=c702b2c9-2d3e-4223-9bc9-8ef195c03586"><li class="tu3">巩义燃气费</li></a> -->
			<a href="http://weixin.uxinxin.com/bind.jsp"><li class="tu3">巩义燃气费</li></a>
			<!--<a hhttp://weixin.uxinxin.com/bind.jsp?openid=otySWt6yrN9dAykdVpZBqZEbnBhE&showwxpaytitle=1&uuid=21825694-924d-4301-a5c1-46243cbc00b4ref="https://payapp.weixin.qq.com/life/index?showwxpaytitle=1&exportkey=AXUtMDurOQAOe7EfBds4wkY%3D&clientversion=26031b31&devicetype=android-23&pass_ticket=w6T3%2B1UlWuJXH8FWL24XhlfMvwBmGag%2B7SsVlHwfpghTdeaueHxUUyh79NLO%2Fqj7#/agency/5/city/49"><li class="tu4">电话费</li></a>-->
			<!--<a href="https://payapp.weixin.qq.com/life/index?showwxpaytitle=1&exportkey=AXUtMDurOQAOe7EfBds4wkY%3D&clientversion=26031b31&devicetype=android-23&pass_ticket=w6T3%2B1UlWuJXH8FWL24XhlfMvwBmGag%2B7SsVlHwfpghTdeaueHxUUyh79NLO%2Fqj7#/agency/4/city/49"><li class="tu5">宽带费</li></a>-->
			<!--<a href="https://payapp.weixin.qq.com/life/index?showwxpaytitle  =1&exportkey=AXUtMDurOQAOe7EfBds4wkY%3D&clientversion=26031b31&devicetype=android-23&pass_ticket=w6T3%2B1UlWuJXH8FWL24XhlfMvwBmGag%2B7SsVlHwfpghTdeaueHxUUyh79NLO%2Fqj7#/result/nosupport"><li class="tu6">有线电视费</li></a>-->
			<a href="http://www.cheguchina.com:8086/weixin/viocaradd.html"><li class="tu7">交通违章</li></a>
			<a href="http://wx.weather.com.cn/mweather/101180102.shtml#1"><li class="tu8">天气预报</li></a>
			<a href="http://www.12306.cn/mormhweb/"><li class="tu9">火车票</li></a>
			<a href="http://flights.ctrip.com/?errorCode=Error_7"><li class="tu10">机票</li></a>
			
		</ul>
	</body>
</html>
