
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>巩义农商</title>
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
<body>


<div class="container">
	<div class="banner1"><img src="<?php echo base_url('statics/default/img/images/datu_03.png');?>" width="100%" > </div>
	
	<div class="gongneng clearfix">
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("wxmain/gerenxiangqing")?>'">
		<img src="<?php echo base_url('statics/default/img/images/xiaozhu_03.png'); ?>" width="40%">
		<p>业务介绍</p>
		</div>
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("wxmain/jinyanka")?>'"> 
		<img src="<?php echo base_url('statics/default/img/images/jinyanka_03.png'); ?>" width="35%">
		<p style="margin-top: 15px;">金燕卡</p>
		</div>
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("wxmain/pos")?>'">
		<img src="<?php echo base_url('statics/default/img/images/pos_03.png'); ?>" width="50%">
		<p>POS机业务</p>
		</div>
		
		<div class="jieshao" style="margin-right: 0;width: 24.6%">
		<li onclick="window.location.href='<?php echo site_url("wxmain/shoujiyinhang")?>'">
		<img src="<?php echo base_url('statics/default/img/images/shouji.png'); ?>" width="20%">
		<p>手机银行</p>
		</div>
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("nearby/index")?>'">
		<img src="<?php echo base_url('statics/default/img/images/shangquan.png'); ?>" width="35%">
		<p>商圈</p>
		</div>
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("wxmain/hongbaohuodong")?>'">
		<img src="<?php echo base_url('statics/default/img/images/huodong.png'); ?>" width="30%">
		<p style="margin-top: 10px;">活动</p>
		</div>
		<div class="jieshao">
		<li onclick="window.location.href='<?php echo site_url("wxmain/yuyue")?>'">
		<img src="<?php echo base_url('statics/default/img/images/yuyuefuwu.png'); ?>" width="33%">
		<p style="margin-top:10px;">预约服务</p>
		</div>
		<div class="jieshao" style="margin-right: 0;width: 24.6%">
		<li onclick="window.location.href='<?php echo site_url("wxmain/chaxun")?>'">
		<img src="<?php echo base_url('statics/default/img/images/cahxun.png'); ?>" width="26%">
		<p>查 询</p>
		</div>
	</div>
	<div class="contentt">
	<p style="color:#010000;font-size: 1.0em;padding:5px 0;">推荐</p>
	</div>
	<?php foreach ($aa as $v ) {
		
	  ?>
	<div class="contentt beijing">
		<div class="img">
		<img src="<?php echo base_url().$v['thumb']; ?>" width="100%">
		</div>
		<div class="xinxi">
			<p style="color: #000000;font-size: 1.0em;"><a href="<?php echo site_url('wxmain/xiangqingye/'.$v['id'])?>"><?php echo $v['name']; ?></a></p>
			<p style="color: #9a9a9a;margin-top:15px;width: 78%;font-size:0.8em;display:inline-block;line-height: 2.0em;"><?php echo $v['title']; ?></p>
			<p style="color: #000000;font-size: 1.0em;"><span class="red">￥：<?php echo $v['newprice']; ?></span></span>
		</div>
	</div>
	
<?php } ?>
</div>	
</body>
</html>
