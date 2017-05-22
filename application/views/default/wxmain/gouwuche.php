<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>购物车</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css/stylee.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css/global.css');?>">
	                                                                

	
	<script src="<?php echo base_url('statics/js/jquery-1.7.2.min.js');?>"></script>
			<script>
			$(function(){
				$("#submit").click(function(){
					
					$("#form").submit();
				})
			})
				
			</script>
	<script src="<?php echo base_url('statics/js/gouwuche.js');?>" rel="text/javascript"></script>
	<style type="text/css">
	body{
		background: #E8E8E8;
		font-family: "微软雅黑"
	}
	
	</style>
</head>
<body>
<div class="biaoti"><a href="<?php echo site_url('nearby/index');?>"><img src="<?php echo base_url('statics/images/fanhui_03.png');?>" width="40%"></a><span>购物车</span></div>
<div style="width: 100%;height: 50px;"></div>
<div class="container">
	<div class="e-cart-chose">
	
	<form id="form" method="post" action="<?php echo site_url('cart/ordershow');?>" >
		
	<?php
	$i=0 ;
	  foreach ($carts as $cart){
	  	
	  	?>
		
		<div class="box" id="box">
			<input type="checkbox" name="pid[<?php echo $i; ?>]" value="<?php   echo  $cart->id; ?>" class="check"/>
			
			
			<img src="<?php echo base_url();?><?php echo ltrim($cart->thumb);?>"/>
			<div class="miaoshu">
				<p class="itemName"><?php echo $cart->brand; ?></p>

				
				<div style="width:150px;margin-top:20px;" class="e-cart-control">
					<span class="reduce">-</span>
					<input class="count" type="text" name="number[]" value="<?php echo $cart->number; ?>"  style="display: inline-block;width: 20px;height: 20px;border: 1px solid #E8E8E8;text-align: center;"/>
					<span class="add">+</span>
				</div>
			</div>
			<div style="height: 100px;width: 50px;display: inline-block;" class="subprice">

				<div class="delete e-delete">

<a href="<?php echo site_url('cart/delete');?>/<?php echo $cart->id ;?>">&nbsp;&nbsp;&nbsp;&nbsp;</a>

				</div>
				<div class="danjia_box">
					¥:<span class="price"><?php echo $cart->price; ?></:span>
				</div>
			</div><input type="hidden" name="price[]" value="<?php echo $cart->price; ?>" />
		</div>
		
		
		<?php 
		$i++;
		 } ?>
		
		</form>
		
	</div>
	<div style="width: 100%;height: 50px;float: left;"></div>
	<div class="foot" id="foot" style="position:fixed;bottom:0;left:0;">
		<input type="checkbox"  id="checkAll"/ style="margin-top: 10px;display: inline-block;margin-right: 5px;"><span style="margin-top: 10px;display: inline-block;">全选</span>
		<div class="right closing" id="submit" >结 算</div>

    	<div class="right total">合计: 

    	<span style="color:#333;display:inline-block;">￥</span>
    	<span id="priceTotal" style="margin-right:10px;display:inline-block;">0.00</span>

    	</div>
	</div>
</div>




	
</body>
</html>
