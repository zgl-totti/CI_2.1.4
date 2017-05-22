<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人详情</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
<!-- 微信JSDK的JS引用 -->
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	</style>
</head>
<body>
<div class="container">
	<div class="biaoti"><a href="<?php echo site_url('wxmain/index'); ?>"><img src="<?php echo base_url('statics/default/img/images/fanhui_03.png'); ?>" width="40%"></a><span>预约取款</span><a style="width:50px;height:40px;display:inline-block;position:absolute;right:20px"href="<?php echo site_url('cart/show');?>"><img width="40%" src="<?php echo base_url('statics/default/img/111.png');?>"></a>
	</div>
	<form action="<?php echo site_url('wxmain/perfect')?>" method="post" name="manageuserform" id='manageuserform'>
	

	<input class="yuyue-sj" type="text" name="telephone" id="telephone" placeholder="请输入预约人手机号" style="margin-top:100px;" value="" ;>

	<input class="yuyue-sj" type="text" name="price" id="price" placeholder="请输入取款金额" style="margin-top:30px;" value="";>
	
		<button class="tikuan"><input style="border: none;background: none;color: #fff" type="submit" value="立即取款"></button>
		

	</form>
</div>
</body>
</html>