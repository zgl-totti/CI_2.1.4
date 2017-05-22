<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
		<title>网点查询</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=G8KDQ6lOP54PpydUFYLCcdUsFY9oQyPZ"></script>

	</head>
	<style>

#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	
	body{
		font-family: "微软雅黑";
		background: #ecebea;
	}
		.chaxun_banner{
			width: 100%;
		}
		.chaxun_bg{
			margin-top: 41px;
			background: #fff;
			
		}
		.wangdian{
			height: 44px;
			width: 94%;
			margin:0 auto ;
			border-bottom:1px solid #ecebea ;
		}
		.wangdian span{
			display: block;
			float: left;
			width: 25px;
			height: 25px;
			overflow: hidden;
			margin-top: 10px;
			margin-right:25px;
		}
		.wangdian p{
			float: left;
			height: 44px;
			line-height: 44px;
			color: #535354;
			font-size: 16px;
		}
	</style>
	<body>
		<div class="chaxun_banner">
			<img src="<?php echo base_url('statics/images3/wangdianchaxun_03.png');?>" width="100%"/>
		</div>
		<div class="chaxun_bg">
			<a href="<?php echo site_url('wxmain/ceshiditu');?>">
				<div class="wangdian">
					<span><img src="<?php echo base_url('statics/images3/wangdianchaxun_07.png');?>" width="100%"/></span><p>网点分布导航</p>
				</div>
			</a>
			<a href="<?php echo site_url('wxmain/wdfb');?>">
				<div class="wangdian">
					<span style="width: 22px;"><img src="<?php echo base_url('statics/images3/wangdianchaxun_10.png');?>" width="100%"/></span><p>网点列表</p>
				</div>
			</a>
			
			<a href="<?php echo site_url('wxmain/jrbld');?>">
				<div class="wangdian" style="border-bottom: none;">
					<span style="width: 22px;"><img src="<?php echo base_url('statics/images3/bianlidianxx.png');?>" width="100%"/></span><p>金融便民店</p>
				</div>
			</a>
			
			
			<!--<a href="<?php echo site_url('wxmain/dzyh21');?>">
				<div class="wangdian" style="border-bottom: none;">
					<span style="width: 22px;"><img src="<?php echo base_url('statics/images3/wangdianchaxun_10.png');?>" width="100%"/></span><p>关于我们</p>
				</div>
			</a>-->
			
			
		</div>

<!--百度地图-->





<!--百度地图end-->
	</body>
</html>
