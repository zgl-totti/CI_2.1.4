<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
		<title>我的订单</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/initialization.css');?>"/>
		<script src="<?php echo base_url('statics/default/js/jquery-3.0.0.min.js');?>"></script>
		<script>
		!(function(doc, win) {
			    var docEle = doc.documentElement,
			        evt = "onorientationchange" in window ? "orientationchange" : "resize",
			        fn = function() {
			            var width = docEle.clientWidth;
			            width && (docEle.style.fontSize = 100 * (width / 640) + "px");
			        };
			     
			    win.addEventListener(evt, fn, false);
			    doc.addEventListener("DOMContentLoaded", fn, false);
			 
			}(document, window));
		</script>
		<style type="text/css">
			body{
				font-family: "微软雅黑";
				background: #F5F4F9;
			}
			.statusBox{
				width: 5.67rem;
				height: 2.79rem;
				margin: 0 auto;
				background: #fff;
				text-align: center;
				margin-top: 0.72rem;
				border-radius: 0.08rem;
			}
			.statusBox img{
				width: 1.52rem;
				height: 1.52rem;
				margin-top: 0.19rem;
				margin-bottom: 0.2rem;
			}
			.statusBox .tishi{
				width: 100%;
				text-align: center;
				font-size: 0.3rem;
				color: #545454;
			}
			.shopBox{
				width: 5.67rem;
				height: 2.0rem;
				margin: 0.1rem auto;
				padding: 0.4rem 0.6rem;
				box-sizing: border-box;
				background: #FFFFFF;
				border-radius: 0.08rem;
			}
			.shopBox img{
				float: left;
				width: 1.2rem;
				height: 1.2rem;
			}
			.shopBox .name{
				font-size: 0.2rem;
				color: #6d6d6d;
				float: right;
				margin-left: 0.22rem;
				width: 3.0rem;
				margin-bottom: 0.4rem;
			}
			.shopBox .num{
				font-size: 0.2rem;
				color: #6d6d6d;
				float: right;
				
				
			}
			.shopBox .total{
				font-size: 0.2rem;
				color: #6d6d6d;
				float: right;
				margin-left: 0.79rem;
			}
			.time{
				width: 5.67rem;
				height: 1.08rem;
				margin: 0 auto;
				background: #fff;
				box-sizing: border-box;
				padding-left: 0.6rem;
				line-height: 1.08rem;
				font-size: 0.2rem;
				color: #6d6d6d;
			}
		</style>
</head>
<body>
    <?php
    	if($status==1){
    		?>
    			<div class="statusBox">
					<img src="<?=base_url('statics/default/img/status_success.png');?>"/>
					<p class="tishi">兑换成功</p>
				</div>
				<div class="shopBox">
					<img src="<?php echo base_url().trim($thumb);?>"/>
					<div class="shop">
						<p class="name"><?=$gname;?></p>
						<p class="total">共付金额：￥<span><?=$total;?></span></p><p class="num">数量：<span><?=$number;?></span></p>
					</div>
				</div>
				<div class="time">兑换时间：<span><?=date('Y-m-d H:i:s',$exchange_time);?></span></div>
    		<?php
    	}else{
    		?>
    			<div class="statusBox">
					<img src="<?=base_url('statics/default/img/status_error.jpg');?>"/>
					<p class="tishi">兑换失败</p>
					<p class="tishi"><?=$message;?></p>
				</div>
    		<?php
    	}
    ?>
</body>
</html>