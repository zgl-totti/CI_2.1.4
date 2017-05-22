<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>个人详情</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	</style>
</head>
<body>
<div class="container">
	<div class="biaoti"><a href="#"><img src="<?php echo base_url('statics/default/images/fanhui_03.png');?>" width="40%"></a><span>个人详情</span>
	</div>
	<div class="geren_xx">
		<div class="touxiang">
			<p><?php echo $userinfo[0]['nickname'];?></p>
			
			<div class="img" style="width:100px;height:100px;overflow:hidden;"><img width="100%" src="<?php echo $userinfo[0]['headimgurl'];?>" alt="<?php echo $userinfo['headimgurl'];?>" /></div>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">性别</p>
			
			<p style="float: right;margin-top: 2%;"><?php if($userinfo[0]['sex'] == 1){ echo '男';}elseif($userinfo[0]['sex'] == 2){ echo '女';}else{ echo '未知';}?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">国家</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo[0]['country'];?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">省份</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo[0]['province'];?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">城市</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo[0]['city'];?></p>
		</div>

	</div>
	<!-- <div class="tijiaodingdan" style="width:90%;margin-left: 5%;">绑定金燕卡</div>
	 -->
</div>
</body>
</html>