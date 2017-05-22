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
		background: #ffffff;
		font-family: "微软雅黑"
	}
	.content_dk{
		margin: 0 auto;
		width: 94%;
	}
	.bannner_daikuan{
		width: 100%;
		height: 160px;
		overflow: hidden;
		/*padding-bottom: 13px;*/
		
	}
	
	.business{
		width: 100%;
		padding-left: 20px;
		height: 50px;
		line-height: 50px;
		border-bottom: 1px solid #ebebeb;
	}
	.jinyanka{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 30px;
		height:30px;
		overflow: hidden;
	}
	.wenzi{
		display: inline-block;
		height: 50px;
		line-height: 50px;
		float: left;
		color: #545454;
		font-size: 14px;
	}
	.posyewu{
		display: inline-block;
		float: left;
		margin-top: 3px;
		margin-right: 20px;
		width: 35px;
		height:35px;
		overflow: hidden;
	}
	.shouji{
		display: inline-block;
		float: left;
		margin-top: 8px;
		margin-right: 20px;
		width: 22px;
		height:35px;
		overflow: hidden;
	}
	.wangshang{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 26px;
		height:33px;
		overflow: hidden;
	}
	.atm{
		display: inline-block;
		float: left;
		margin-top: 7px;
		margin-right: 20px;
		width: 25px;
		height:30px;
		overflow: hidden;
	}
	</style>
</head>
<body>
<!--<div class="container">
	<div class="biaoti"><a href="#"><img src="images/fanhui_03.png" width="40%"></a><span>电子银行</span>
	</div>
</div>-->
<!--<div style="height: 50px;width: 100%;"></div>-->
<div class="bannner_daikuan">
	<img src="<?php echo base_url('statics/images/dianziyinhang1_030021.jpg');?>" width="100%"/>
</div>
<div style="height:13px;width:100%;background: #ebebeb;" ></div>
<div class="content_dk">
		<a href="#">
			<div class="business">
				<span class="jinyanka"><img src="<?php echo base_url('statics/images/yewutubiao_03.png');?>" width="100%"/></span><p class="wenzi"><a href="<?=site_url('wxmain/jinyanka01');?>">金燕卡</a></p>
			</div>	
		</a>
		<a href="#">
			<div class="business">
				<span class="posyewu"><img src="<?php echo base_url('statics/images/yewutubiao_07.png');?>" width="100%"/></span><p class="wenzi" style="margin-left: -5px;">POS机业务</p>
			</div>
		</a>
		<a href="#">
			<div class="business">
				<span class="jinyanka"><img src="<?php echo base_url('statics/images/yewutubiao_11.png');?>" width="100%"/></span><p class="wenzi">金燕自助通</p>
			</div>
		</a>
		<a href="#">
			<div class="business">
				<span class="wangshang"><img src="<?php echo base_url('statics/images/yewutubiao_1000064.png');?>" width="100%"/></span><p class="wenzi">网上银行</p>
			</div>
		</a>
		<a href="#">
			<div class="business">
				<span class="shouji"><img src="<?php echo base_url('statics/images/yewutubiao_18.png');?>" width="100%"/></span><p class="wenzi">手机银行</p>
			</div>
		</a>
		<a href="#">
			<div class="business">
				<span class="atm"><img src="<?php echo base_url('statics/images/yewutubiao_2002.png');?>" width="100%"/></span><p class="wenzi">ATM</p>
			</div>
		</a>
</div>
</body>
</html>