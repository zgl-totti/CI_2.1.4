<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
		<title>个人信息</title>
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css1/global.css');?>">
		<style type="text/css">
			body{
				background: #ffffff;
				font-family: "微软雅黑"
			}
			.content{
				width: 90%;
				height: 35px;
				margin:30px auto;
			}
			.duihuanma{
				width: 70%;
				padding-left: 3%;
				height: 33px;
				border:1px solid #9a9a9a;
				box-shadow: 0 1px 5px #9a9a9a;
				border-radius: 3px;
			}
			.duihaun_btn{
				width: 20%;
				height: 33px;
				border:1px solid #9a9a9a;
				margin-left:3%;
				border-radius: 3px;
				box-shadow: 0 1px 5px #9a9a9a;
				background: #d22222;
				color: #ffffff;
			}
			.container{
				width: 90%;
				padding:0 5%;
				border-bottom: 1px solid #e8e8e8;
				padding-bottom: 9px;
				padding-top: 9px;
			}
			.biaoti_tu{
				display: inline-block;
				width: 24px;
				float: left;
				/*height: 24px;
				line-height: 24px;
				vertical-align: middle;*/
			}
			/*.biaoti_tu img{
				vertical-align: middle;
			}*/
			.biaoti{
				margin-left: 10px;
				
				height:24px;
				line-height: 24px;
				font-size:16px;
				display: inline-block;
				float: left;
			}
			.imgBox{
				display: inline-block;
				width: 100px;
				height:100px;
				float: left;
			}
			.duihuanjilu{
				width: 90%;
				padding:15px 5%;
				border-bottom: 1px solid #e8e8e8;
				height: 100px;
			}
			.xinxi{
				width: 70%;
				height: 100px;
				float: left;
				font-size: 16px;
			}
			.xinxi .chanpin{
				
				margin-left: 10px;
				height: 20px;
			}
			.xinxi .chanpin small{
				margin-left: 10px;
			}
			.duihuan_show{
				display: inline-block;
				color: #d22222;
				font-size: 14px;
				height: 14px;
				margin-top: 60px;
				margin-left: 10px;
			}
			.time{
				margin-top: 60px;
				font-size: 14px;
				display: inline-block;
				margin-left:10px;
			}
			.biaoti1{
								position: fixed;
				    top: 0;
				    left: 0;
				    width: 100%;
				    height: 50px;
				    line-height: 50px;
				    background: #d22222;
				    text-align: center;
				    font-size: 1.2em;
				    color: #fff;
				    z-index: 99;
				    font-size: 16px;
					}
			.biaoti1 a {
			    display: block;
			    float: left;
			    width: 60px;
			    height: 40px;
			    /* border-right: 2px solid #ac1c1c; */
			    margin-top: 5px;
			}
			
		</style>
</head>
<body>

<div class="biaoti1"><a href="<?php echo site_url('wxmain/index');?>"><img src="<?php echo base_url('statics/default/img/images/fanhui_03.png');?>" width="40%"></a><span>兑换页面</span></div>

	<div style="width: 100% ;height:50px;"></div>

<div class="content">
	<form action="">
		<input class="duihuanma" type="text" name="">
		<input class="duihaun_btn" type="submit" name="" value="兑换">
	</form>
</div>
<div class="container" style="height: 24px;line-height: 24px;">
	<span class="biaoti_tu"><img src="<?php echo base_url('statics/default/img1/duihaunjilu_07.png');?>" width="100%"></span><p class="biaoti">兑换记录</p>
</div>
<div class="duihuanjilu">
	<div class="imgBox">
		<img src="<?php echo base_url('statics/default/img1/兑换_03.jpg');?>" width="100%">
	</div>
	<div class="xinxi">
		<p class="chanpin">KTV<small>八折打折卡</small></p>
		<p class="duihuan_show">兑换成功</p><p class="time">兑换时间：<span>2016.07.29</span></p>
	</div>

</div>

<div class="duihuanjilu">
	<div class="imgBox">
		<img src="<?php echo base_url('statics/default/img1/兑换_03.jpg');?>" width="100%">
	</div>
	<div class="xinxi">
		<p class="chanpin">KTV<small>八折打折卡</small></p>
		<p class="duihuan_show">兑换成功</p><p class="time">兑换时间：<span>2016.07.29</span></p>
	</div>

</div>
</body>
</html>