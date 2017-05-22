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
<!-- <div><a href="http://aczm.medtu.com/index.php">首页</a></div> -->


<div class="container">
	<!--<div class="biaoti"><a href="#"><img src="<?php echo base_url('statics/default/images/fanhui_03.png');?>" width="40%"></a><span>个人详情</span>
	</div>-->
	<div class="geren_xx">
		<div class="touxiang">
			<p><?php echo $userinfo['nickname'];?></p>
			
			<div class="img" style="width:100px;height:100px;overflow:hidden;"><img width="100%" src="<?php echo $userinfo['headimgurl'];?>" alt="<?php echo $userinfo['headimgurl'];?>" /></div>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">性别</p>
			
			<p style="float: right;margin-top: 2%;"><?php if($userinfo['sex'] == 1){ echo '男';}elseif($userinfo['sex'] == 2){ echo '女';}else{ echo '未知';}?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">国家</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo['country'];?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">省份</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo['province'];?></p>
		</div>
		<div class="touxiang">
			<p style="margin-top: 2%;">城市</p>
			
			<p style="float: right;margin-top: 2%;"><?php echo $userinfo['city'];?></p>
		</div>

	</div>











	 
</div>
</body>

</html>