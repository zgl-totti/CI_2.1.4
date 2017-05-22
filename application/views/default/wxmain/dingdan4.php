<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的订单</title>
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
<body><?php print_r($datas);die;?>
<div class="container">
	<!-- <div class="biaoti"><a href="#"><img src="images/fanhui_03.png" width="40%"></a><span>个人详情</span>
	</div> -->
	<!-- <div class="geren_xx" style="width:90%; ">
		<div class="touxiang" style="width: 100%;border:none;">
			<p>张三</p>
			<a href="">&gt;</a>
			<div class="img"><img src="images/农村信用社1_03.jpg" width="100%"></div>
		</div>
	</div> -->
	<div class="xioabiaoti">
		<span></span>
		<p>我的订单</p>



	</div>



		





	</div>
	



		<!-- 
		<?php echo $v->id;?><br/>
		<?php echo $v->ordernum;?>
 -->

	

<?php foreach ($dd as $key => $v): ?>
	订单号<?php echo $v['ordernum'];?><br/><?php echo $v['addtime'];?>

	订单价格<?php echo $v['total'];?><br/>
	<hr>	
<?php endforeach ?>




<?php foreach ($sp as $key => $v): ?>
	


	<div class="contentt beijing" style="margin-top: 10px;width: 92%;">
		<div class="img">
		<img src="<?php echo base_url();?><?php echo trim($v['thumb']);?>" width="100%">
		</div>
		<div class="xinxi">
			<div style="float:left; width:100%;">
			<p style="color: #000000;font-size: 1.0em;float: left;width:100%;">商品名称:<?php echo $v['brand'];?></p>
			<p style="float:right;color: #000000;font-size: 0.8em;width:100%;text-align: right;">数量:&nbsp;x&nbsp;<?php echo $v['number'];?></p>
			<p style="float:right;color: #000000;font-size: 0.8em;width:100%;text-align: right;color: #d22222;">价格:¥<span><?php echo $v['price'];?></span></p>
			</div>
			<!-- <span style="color: #9a9a9a;font-size: 0.5em;width: 15%;display:block;float: right;margin-top:55px;margin-right:15px;">2016.03.15</span> -->
		</div>

	</div>
<?php endforeach ?>

	



	







</div>
</body>
</html>