<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>金燕卡</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #fff;
		font-family: "微软雅黑"
	}
	</style>
</head>
<body>
<div class="container">
	<!-- <div class="biaoti"> -->
	<?php foreach ($about as $v){?>		
<!-- 	<?php echo $v['auth'];?> -->



	
<!-- 	</div> -->
	<div class="guanyu" style="margin-top: 0;">
	<div class="guanyu_img"><img src="<?php echo base_url('statics/default/img/金燕卡.png'); ?>" width="100%"></div>
	<p><?php { echo htmlspecialchars_decode($v['contents']); }?></p>
	<?php } ?>
	

	</div>
</div>

</body>
</html>