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
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	.dpjs{
		width: 100%;
	}
	.dizi{
		width: 100%;
	}
	.dizi .dianhua{
		margin-left: 0;
	}
	.shangpin_img{
			width:100%;
		float: left;
			margin-top:20px;
		}
	.shangpin_img img{
		display: inline-block;
		float: left;
	}
	</style>
</head>
<body>
<?php// echo '<pre>';print_r($aa);die;?>

<div class="container">
	<div class="fudong"></div>
		<div class="xq_banner">

		<img src="<?php echo base_url().$aa[0]['thumb0'];?>" width="100%">
		</div>
	</div>
	<div class="shangpin_xx">
		<p class="shangpin_mc">商品名字：<?php echo $aa[0]['name'];?></p>
<?php if($aa[0]['newprice']){?>



		<p class="jiage" style="color:red ;line-height: 50px"; >折后价：￥<?php echo $aa[0]['newprice'];?>　元</p>

		<?php }else{?>



	<p class="jiage" style="color:red ;line-height: 50px"; >******线下优惠*****</p>

		<?php }?>

	</div>
	<div class="shangpin_xx" style="height: auto;">
		描述:<p style="width:100%;height: auto;display: inline-block; word-wrap:break-word
"><?php echo htmlspecialchars_decode($aa[0]['newdesc']);?></p>
	</div>
	<div class="shangjia_xx" style="margin-top: 0;">
		<p class="dianming"><img src="<?php echo base_url('statics/default/img/images/dianpu_03.png');?>" width="8%"><span>品牌：<?php echo $aa[0]['brand'];?></span></p>


	<!--	<p class="dpjs">标题：<?php /*echo $aa[0]['title'];*/?></p>-->
		<div class="dizi">

		</div>
	</div>
	<div class="goumaii">
	<input type="hidden" name="thumb" value="<?php echo base_url().$aa[0]['thumb0'];?>">
	<input type="hidden" name="desc" value="<?php echo base_url().$aa[0]['desc'];?>">
	<input type="hidden" name="gid" value="<?php echo base_url().$aa[0]['gid'];?>">

	



<?php if($aa[0]['newprice']){?>
			<div style="position: fixed;bottom: 0;left:0;width: 100%;height: 4em;background: #ffffff">
				<a href="<?php echo site_url('wxmain/tijiaodingdan/'.$this->uri->segment(3));?>" style="color:#fff;">


					

						<div class="goumai" style="margin-top: 0.6em;border-radius: 5px">
							立即购买
						</div>
					
				</a>
			</div>
<?php }?>


	
<div class="shangpin_img" style="padding-bottom:4em;">

	<?php if($aa[0]['thumb1'] ){?> <img src="<?php echo base_url($aa[0]['thumb1'])?>" width="100%"/>
	<?php }else{   ?>
		<center>暂无详情</center>
	<?php } ?>
	<?php if($aa[0]['thumb2'] ){?> <img src="<?php echo base_url($aa[0]['thumb2'])?>" width="100%"/><?php }?>
	<?php if($aa[0]['thumb3'] ){?> <img src="<?php echo base_url($aa[0]['thumb3'])?>" width="100%"/><?php }?>
	<?php if($aa[0]['thumb4'] ){?> <img src="<?php echo base_url($aa[0]['thumb4'])?>" width="100%"/><?php }?>
	<?php if($aa[0]['thumb5'] ){?> <img src="<?php echo base_url($aa[0]['thumb5'])?>" width="100%"/><?php }?>



</div>

</body>
</html>