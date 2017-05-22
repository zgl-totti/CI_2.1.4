<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
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
	<?php foreach ($date as $v ) {
		
	  ?>
	<div class="contentt beijing">
		<div class="img">
		<img src="<?php echo base_url().$v['thumb']; ?>" width="100%">
		</div>
		<div class="xinxi">
			<p style="color: #000000;font-size: 1.0em;"><a href="<?php echo site_url('wxmain/newsinfo/'.$value['id'])?>"><?php echo $v['name']; ?></a></p>
			<p style="color: #9a9a9a;margin-top:15px;width: 78%;font-size:0.8em;display:inline-block;line-height: 2.0em;"><?php echo $v['title']; ?></p>
			<p style="color: #000000;font-size: 1.0em;"><span class="red">￥：<?php echo $v['newprice']; ?></span></span>
		</div>
	</div>
	
<?php } ?>
	</div>
</div>

</body>
</html>