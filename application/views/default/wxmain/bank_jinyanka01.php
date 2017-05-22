<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>金燕卡</title>
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
		height: 208px;
		overflow: hidden;
	}
	.daikuan{
		width: 96%;
		margin:0 auto;
		line-height: 49px;
		height: 49px;
		border-radius: 5px;
		background: #f8f9f9;
		border: 1px solid #eeeeee;
		margin-top: 23px;
	}
	
	.daikuan_wenzi{
		display: inline-block;
		float: left;
		/*text-align: center;*/
		
		font-size: 15px;
		color: #545454;
	}
	.daikuan span{
		display: block;
		float: left;
		margin-top: 10px;
		margin-left:20px;
		width: 23px;
		height: 30px;
		overflow: hidden;
		margin-right: 15px;
	}
	</style>
</head>
<body>
<div class="container">
	<!--<div class="biaoti"><a href="#"><img src="images/fanhui_03.png" width="40%"></a><span>金燕卡</span>
	</div>-->
	<div class="content_dk">
	<a href="#">
		<div class="bannner_daikuan">
			<img src="<?php echo base_url('statics/images/dianziyinhang001.jpg');?>" width="100%"/>
		</div>
	</a>
	<a href="#">
		<div class="daikuan" style="margin-top:28px;">
			<span><img src="<?php echo base_url('statics/images/tubiao2_03.png');?>" width="100%"/></span><p class="daikuan_wenzi">金燕卡简介</p>
		</div>
	</a>
	<a href="#">
		<div class="daikuan">
			<span style="margin-top: 5px;height: 35px"><img src="<?php echo base_url('statics/images/tubiao2_07.png');?>" width="100%"/></span><p class="daikuan_wenzi">金燕卡卡样分类</p>
		</div>
	</a>
	<a href="#">
		<div class="daikuan">
			<span style="margin-top:5px;height: 35px;"><img src="<?php echo base_url('statics/images/tubiao2_10.png');?>" width="100%"/></span><p class="daikuan_wenzi">金燕卡资费情况</p>
		</div>
	</a>
	</div>
	
</div>
</body>
</html>