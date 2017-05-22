<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的订单</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css/stylee.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css/global.css');?>">
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	</style>
</head>
<body>

	<!--<div class="biaoti"><a href="<?php echo site_url('cart/show');?>"><img src="<?php echo base_url()?>statics/images/fanhui_03.png" width="40%"></a><span>我的订单</span>
	</div>-->
	<!-- <div class="geren_xx" style="width:90%; ">
		<div class="touxiang" style="width: 100%;border:none;">
			<p>张三</p>
			<a href="">&gt;</a>
			<div class="img"><img src="<?php echo base_url()?>statics/images/农村信用社1_03.jpg" width="100%"></div>
		</div>
	</div>  -->

	
			<!--<p style="float:left;text-align:center;width:100%;height:50px;">我的订单</p>-->
	
	

	<!--<div style="height: 50px;width: 100%;float: left;">
		
	</div>-->


	


		<div class="box">
<?php foreach($carts as $k=>$v){

?>
				<img src="<?php echo base_url($v[0]['thumb']);?>" width="100%"/>
			
				<?php }?>
			<div class="miaoshu">
				<p style="float: left;" class="itemName"><?php echo $_SESSION['data']['goods_name']; ?></p>
				<p style="float: left;color: #D22222;" >价格：<?php echo $_SESSION['data']['price'];?></p>

				<p style="float: left;" >状态：<?php
					switch ($aa['status_user'])
					{case 0: echo '未支付';  break;
						case 1: echo '已支付';  break;  }

					?></p>
			</div>
		</div>


	


	
<center><a  href="http://weixin.hngynsyh.com/wxpay/example/jsapi.php">微信支付</a></center>

		


</body>
</html>