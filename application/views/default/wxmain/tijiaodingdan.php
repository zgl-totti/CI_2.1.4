<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交订单</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<script  src="<?php echo base_url('statics/default/js/jquery-3.0.0.min.js');?>"></script>
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	</style>
	<script>
	$(document).ready(function(){
		
			var a=parseFloat($(".xianshi").attr("value"));
			
			var c=a;
			$(".xianshi").attr("value",c);
			var d=parseFloat($("#d_jia").text());
			var z=parseFloat($("#z_jia").text());
			var zz=d*c;
			$("#z_jia").text(zz);
			$("#spsl").value=c;	
			
		
		$(".jiahao").on("click",function(){

			var a=parseFloat($(".xianshi").attr("value"));
			var b=1;
			c=a+b;
			$(".xianshi").attr("value",c);
			var d=parseFloat($("#d_jia").text());
			var z=parseFloat($("#z_jia").text());
			var zz=d*c;
			$("#z_jia").text(zz);
			$("#spsl").value=c;	
			
			 
		});
		$(".jianhao").on("click",function(){

			var a=parseFloat($(".xianshi").attr("value"));
			var b=1;
			var c;
			if (a<=1) {
				
				$(".xianshi").attr("value",1);
			}
			else{
				var	c=a-b;
				$(".xianshi").attr("value",c);
				var d=parseFloat($("#d_jia").text());
				var z=parseFloat($("#z_jia").text());
				var zz=d*c;
				$("#z_jia").text(zz);
				$("#spsl").value=c;	
			}		 
		});
		$('.tijiaodingdan').click(function(){
			$('form').submit();
		})

		
	});
	</script>

</head>
<body>
<div class="container">
	<div class="biaoti">

	<p><?php echo $aa[0]['brand'];?></p> 
		

  
  
	</div>
	
	
		<form action="<?php echo site_url('cart/add');?>" method="post">
  <input type="hidden" name="pro_id" value="<?php echo $aa[0]['id'];?>" /><!--商品ID-->
  <input type="hidden" name="price" value="<?php echo $aa[0]['newprice'];?>" /><!--商品单价-->
  <input type="hidden" name="brand" value="<?php echo $aa[0]['name'];?>" /><!--商品名称-->
  <input type="hidden" name="thumb" value=" <?php echo $aa[0]['thumb0'];?>" />
  <input type="hidden" name="gid" value=" <?php echo $aa[0]['gid'];?>" />

  <input type="hidden" name="spmc" value=" <?php echo $aa[0]['desc'];?>" />
   
   <input type="hidden" name="number" id="spsl" />
   
  
	<div class="tijiaobox">
	    <div class="neirongg">
			<p class="danjia">商品名称&nbsp;&nbsp;：<?php echo $aa[0]['name'];?></p>
		</div>
		<div class="neirongg">
			<p class="danjia">单价&nbsp;&nbsp;：</p>
			<p class="yuan">元</p>
			<p class="danjia1" >¥ <span id="d_jia"><?php echo $aa[0]['newprice'];?></span> </p>
		</div>
		<div class="neirongg">
			<p class="danjia">数量&nbsp;&nbsp;：</p>
			<span style="text-align: center;" class="jiahao">+</span>
			<input style="height: 1.7em;" class="xianshi" type="" name="number" value="1"  readonly>
			<span style="text-align: center;" class="jianhao">-</span>
		</div>
		<div class="neirongg">
			<p class="danjia">总价&nbsp;&nbsp;</p>
			<p class="yuan">元</p>
			<p class="danjia1" >¥ <span id="z_jia"></span></p>
		</div>
		<div class="neirongg">
			<p class="danjia">联系电话&nbsp;&nbsp;:</p>
			<input class="dianhua" type="tel" name="phone" required>
		</div>
		<div class="tijiaodingdan" ><input style="border: none;background: none;color: #FFFFFF;" type="submit" name="" id="" value="提交订单" /></div>
	</form>
	</div>
	
</div>

</body>
</html>
