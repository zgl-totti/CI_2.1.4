<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>电子银行</title>
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
	<?php foreach($about as $v){ ?>
<!-- 
	<p><?php echo $v['auth'];?>
</p>
 -->
	<p><!-- <?php echo $v['auth'];?> --><a style="width:50px;height:40px;display:inline-block;position:absolute;right:20px"href="<?php echo site_url('cart/show');?>"><img width="40%" src="<?php echo base_url('statics/default/img/111.png');?>"></a></p>

	<?php } ?>
	</div>
	<div class="guanyu" style="margin-top: 0;">
	<div class="guanyu_img"><img src="<?php echo base_url('statics/default/img/images/yinhang.png'); ?>" width="100%"></div>
	<?php foreach($about as $v) { ?>
	<p><?php { echo htmlspecialchars_decode($v['contents']); }?></p>
	<?php } ?>
	</div>
	
	
</div>

</body>
</html>