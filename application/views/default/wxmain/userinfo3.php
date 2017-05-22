
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>个人信息</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
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
				background: #ffffff;
				font-family: "微软雅黑"
			}
			body a{
				color: #545454;
				width: 100%;
				float: left;
			}
			.imgBox{
				width: 100%;
				height: 3.0rem;
				background:url("<?php echo base_url('statics/images6/aczm_02.png');?>") no-repeat center top;
				background-size: 100%;
				padding-top:0.97rem;
				box-sizing: border-box;
			}
			.imgBox img{
				display: block;
				height: 1.0rem;
				width: 1.0rem;
				border:3px solid #ffffff;
				border-radius: 50%;
				margin: 0 auto;
			}
			.li1{
				width: 96%;
				padding-left: 2%;
				padding-right: 2%;
				border-bottom: 1px solid #e8e8e8;
				height:0.82rem;
				line-height:0.82rem;
				vertical-align: middle;
				font-size: 0.28rem;
				font-size: #000;
				
			}
			.li1 img{
				vertical-align: middle;
				width: 0.27rem;
			}
			.li1 .p1{
				margin-left: 0.1rem;
				display: inline-block;

			}
		</style>
	</head>
 <body>
			<div class="imgBox">
				<img src="<?php echo $_SESSION['uinfo']['pic'];?>" width="100%">
				<p class="p1" style="font-size: 0.30rem;color: #fff;width: 100%;text-align: center;margin-top: 0.1rem; "><?php echo  $_SESSION['uinfo']['name'];?>(ID:<?=$id;?>)</p>
			</div>
			<ul>
			<!-- <li class="li1">
				<img src="<?php echo base_url('statics/images6/aa_03.png');?>">
				
			</li> -->
			 <a href="<?php echo base_url('nearby/dingdans');?>"><li class="li1">
				<img src="<?php echo base_url('statics/images6/aa_.png');?>">
				<p class="p1">我的订单</p>
			</li></a> 
			<a href="<?php echo base_url('nearby/scsj');?>">
				<li class="li1">
					<img src="<?php echo base_url('statics/images6/aa_0.png');?>">
					<p class="p1">商家收藏</p>
				</li>
			</a>
				<a href="<?php echo base_url('nearby/apply');?>">
					<li class="li1">
						<img src="<?php echo base_url('statics/images/申请入驻.png');?>">
						<p class="p1">申请入驻</p>
					</li>
				</a>
				<?php if(!empty($shopid)){?>
						 	<a href="<?php echo base_url('nearby/duihuanjilu');?>">
				<li class="li1">
					<img src="<?php echo base_url('statics/images6/duihuanjilu.png');?>">
					<p class="p1">兑换记录</p>
				</li>
							</a> 
							<a href="<?php echo base_url('nearby/duihuan');?>">
				<li class="li1">
					<img src="<?php echo base_url('statics/images6/shangpinduihuan.png');?>">
					<p class="p1">商品兑换</p>
				</li>
							</a>
				<?php }?>
				
			</ul>
	</body>
</html>
