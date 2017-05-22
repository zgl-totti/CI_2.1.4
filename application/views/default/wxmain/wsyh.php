<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>网上银行</title>
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
	<div class="biaoti">
	<p>网上银行</p>
	</div>
	<div class="guanyu">
	<div class="guanyu_img"><img src="<?php echo base_url('statics/default/img/images/农村信用社_08.jpg'); ?>" width="100%"></div>
	<?php foreach ($about as $v){?>
	<p><?php echo $v['contents'];?></p>
	<?php  } ?>
	</div>
	
	
</div>

</body>
</html>