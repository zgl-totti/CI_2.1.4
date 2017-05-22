<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>贷款业务</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<link rel="stylesheet" type="text/css" href="css/stylee.css">
	<style type="text/css">
	body{
		background: #ffffff;
		font-family: "微软雅黑"
	}
	.content_dk{
		margin: 0 auto;
		width: 94%;
	}
	.bannner_daikuan{
		margin-top: 10px;
	}
	.daikuan{
		width: 96%;
		margin:0 auto;
		line-height: 46px;
		height: 46px;
		border-radius: 5px;
		background: #f8f8f8;
		border: 1px solid #eeeeee;
		margin-top: 23px;
	}
	.daikuan .geren{
		float: left;
		display:inline-block;
		width: 28px;
		margin:0 10px;
		margin-top: 8px;
	}
	.daikuan .gongsi{
		float: left;
		display: inline-block;
		width: 30px;
		margin:0 10px;
		margin-top:10px;
	}
	.daikuan .gongwuyuan{
		float: left;
		display: inline-block;
		width: 32px;
		margin:0 10px;
		margin-top: 10px;
	}
	.daikuan_wenzi{
		display: inline-block;
		margin-left: 10px;
		font-size: 16px;
		color: #545454;
	}
	</style>
</head>
<body>
<div class="container">
	<!-- <div class="biaoti"><a href="<?php echo site_url('wxmain/index');?>"><img src="<?php echo base_url('statics/images/fanhui_03.png');?>" width="40%"></a><span>贷款业务</span>
	</div> -->
	<div class="content_dk">
		<!-- <div style="height: 50px;width: 100%;"></div> -->
		<div class="bannner_daikuan">
			<img src="<?php echo base_url('statics/images/gerendaikuan.jpg');?>" width="100%"/>
		</div>
		<div class="daikuan" style="margin-top:28px;">
			<span class="geren"><img src="<?php echo base_url('statics/images/tubiao_03.png');?>" width="100%"/></span> <p class="daikuan_wenzi">个人贷款</p>
		</div>
		<div class="daikuan">
			<span class="gongsi"><img src="<?php echo base_url('statics/images/tubiao_07.png');?>" width="100%"/></span><p class="daikuan_wenzi">公司贷款</p>
		</div>
		<div class="daikuan">
			<span class="gongwuyuan"><img src="<?php echo base_url('statics/images/tubiao_10.png');?>" width="100%"/></span><p class="daikuan_wenzi">公务员贷款</p>
		</div>
	</div>
	
</div>
<div class="foot_nav" style="width:100%;height:50px;position:fixed;background:#eee;bottom:0;left:0;border-top:1px solid #dddddd;font-size:14px;color:#545454">
	<ul>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/商圈首页.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('nearby/index')?>" style="margin-top:30px;display:inline-block;color: #545454;">商圈</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/矢量智能对象.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('cart/show')?>" style="margin-top:30px;display:inline-block;color: #545454;">购物车</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/分类-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/dingdan2')?>" style="margin-top:30px;display:inline-block;color: #545454;">订单</a></li>

	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/我-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/pos')?>" style="margin-top:30px;display:inline-block;color: #545454;">pos机</a></li>

	</ul>
</div>
</body>
</html>