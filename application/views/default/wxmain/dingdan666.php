<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商圈首页</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	.foot_nav ul li a{
		color: #545454;
	}

	</style>
</head>
<body>

	
	
   

          <?php
            foreach($sh as $v){
          ?>  
    
      <?php echo $v['id'];?>
      <?php echo $v['name'];?>
      <br/>
        <!-- <div class="contentt beijing" >
		<div class="img">
		<img src="<?php echo base_url().$v['thumb'];?>" width="100%" >
		</div>
		<div class="xinxi">

			<p style="color: #000000;font-size: 1.0em;"><a href="<?php echo site_url('nearby/dianpu/'.$v['id'])?>"><?php echo $v['shopsname'];?></a></p>

			<p style="color: #9a9a9a;margin-top:15px;width: 78%;font-size:0.8em;display:inline-block;line-height: 2.0em;"><?php echo $v['shopaddress'];?></p>
			<span style="color: #9a9a9a;font-size: 0.5em;width: 15%;display:inline-block;"><?php echo $v['addtime'];?></span>
		</div>
	</div>  -->
	 <?php
            }
          ?>  

    

<div class="foot_nav" style="width:100%;height:50px;position:fixed;background:#eee;bottom:0;left:0;border-top:1px solid #dddddd;font-size:14px;color:#545454">
	<ul>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/商圈首页.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('nearby/index')?>" style="margin-top:30px;display:inline-block;">商圈</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/矢量智能对象.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('cart/show')?>" style="margin-top:30px;display:inline-block;">购物车</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/分类-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/dingdan2')?>" style="margin-top:30px;display:inline-block;">订单</a></li>

	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/我-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/gerenxiangqing')?>" style="margin-top:30px;display:inline-block;">我的</a></li>

	</ul>
</div>

</body>
</html>