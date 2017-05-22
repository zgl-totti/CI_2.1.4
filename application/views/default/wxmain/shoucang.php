<?php

?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商家收藏</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	</style>
</head>
<body>
<div class="container" style="margin-top: 10px;">
	<!--  <div class="biaoti"><a href="<?php echo site_url('wxmain/dingdan');?>"><img src="<?php echo base_url('statics/default/img/images/fanhui_03.png');?>" width="40%"></a><span>商家收藏</span>
	</div>  -->
	<!--  <div style="float:left;width: 100%;height: 50px;"></div> -->
<?php
if(isset($sinfo) && $sinfo){
foreach( $sinfo as $v){?>
	<div class="contentt beijing" style="width: 92%;margin-bottom: 0;border-bottom: 1px solid #e5e5e5;">
		<a href="<?php echo site_url('nearby/dianpu').'/'.$v['shopid']?>">
		<div class="img" style="width: 25%;">

		<img src="<?php echo base_url($v['thumb']);?>" width="100%">
		</div>

		<div class="xinxi">
			<div style="float:left; width:100%;">
			<p style="color: #000000;font-size: 1.0em;margin-left: 10px;"><?php echo $v['shopsname']?></p>
			<p class=""  style=" margin-left: 15px; line-height: 50px; font-size: 10px;color: #999">地址：<?php echo  str_cut($v['shopaddress'] ,30) ;?></p>
			</div>
		</div>
		</a>
	</div>
	<?php }}else{?>

	<center style="width: 200px;line-height: 30px;color:grey;margin:200px auto">
		<img src="<?php echo base_url('statics/default/img/zhanwushoucang .png');?>" width="100px">
		<p>对不起，您暂无收藏的店铺!</p></center>
	<?php }?>

		

	
</div>
</body>
</html>