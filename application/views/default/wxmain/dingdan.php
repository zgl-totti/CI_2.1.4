<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商圈首页</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<script src="<?php echo base_url('statics/default/js/jquery-3.0.0.min.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<script type="text/javascript">
		$('.leader').click(function(){
		//var url='';
		var input = $(this).find('input.leaderend').val();

		//var uid=$('input[name="uid"]').val(); //获取被选中Radio的Value值


		$.ajax({
			type: "POST",
			url: "<?=site_url('main/set_leader');?>",
			dataType:'json',
			data: {  id:input},
			success: function(data){
				//alert(data)
				if(data.status==1){
					//alert(data.msg)
					//location.reload(true);
					$('#'+input).text('取消');
				}
				if(data.status==0){
					alert(data.msg)
				}
				if(data.status==-1){
					//alert(data.msg)
					$('#'+input).text('推荐');
					//$('#message_modify').html(data.msg); }
				}
			}
		});
	});

	</script>
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
<!-- <a href="http://aczm.medtu.com/index.php/weixin/wechat2/get_user_info">个人中心</a> -->

<div class="container">

	<!-- 
	<div class="biaoti"><a href="<?php echo site_url('wxmain/index');?>"><img src="<?php echo base_url('statics/default/img/images/fanhui_03.png');?>" width="40%"></a><span>商圈首页</span></div>
 -->
<!-- 	<div style="width: 100% ;height:50px;"></div> -->
	<div class="banner1"><img src="<?php echo base_url('statics/default/img/images/农村信用社_03.png');?>" width="100%"></div>
	<div class="gongneng1 clearfix">

	

	<?php foreach ($abb as $v) { ?>
		<a style="color:#545454;" href="<?php echo base_url('nearby/shanji');?>/<?php echo $v['id'];?>">
		<div class="dingdan">
		

		<img src="<?php echo base_url().$v['image'];?>" width="35%">
		<p><?php echo $v['name'];?></p>
		
		</div>
		</a>
		
<?php  } ?>
	
	<!--查询-->
		<!--<div class="dingdan" >
		<a style="color:#545454;" href="<?php echo site_url('wxmain/chaxun');?>">

		<img src="<?php echo base_url('statics/default/img/images/dingdan_18.png');?>" width="35%">

		

		<p><a style="color:#545454;" href="<?php echo site_url('wxmain/chaxun');?>">查 询</a></p>
		</div>-->
	<!--查询end -->
	<!--</div>-->
	
	
	<p style="height: 20px;width: 100%;"></p>
	
	
  
       
           <?php
        if(isset($info) && $info){
  ?>

          <?php
            foreach($info as $v){
          ?>  
          <a style="color:#545454;float:left;" href="<?php echo site_url('nearby/dianpu/'.$v['id'])?>">
          <div class="contentt beijing" >
		<div class="img">
		<img src="<?php echo base_url().$v['thumb'];?>" width="100%" >
		</div>
		<div class="xinxi">
		
		


			<p style="color: #000000;font-size: 1.0em;"><?php echo $v['shopsname'];?>   <span style="float: right">优惠详情</span>      </p>

			<p style="color: #9a9a9a;margin-top:15px;width: 78%;font-size:0.8em;display:inline-block;line-height: 2.0em;"> 宣传语：<?php echo  $v['slogan']  ? $v['slogan']:'暂无宣传语' ;?></p>
			<!--<span style="color: #9a9a9a;font-size: 0.5em;width: 15%;display:inline-block;"><?php echo $v['addtime'];?></span>-->
		</div>
	</div>
	</a>
	
	
	 <?php
            }
          ?>  

      <?php
        }
      ?>
	<!-- <div class="contentt beijing">
		<div class="img">
		<img src="<?php echo base_url('statics/default/img/images/农村信用社_07.jpg');?>" width="100%" >
		</div>
		<div class="xinxi">
			<p style="color: #000000;font-size: 1.0em;">高收益&nbsp;&nbsp;&nbsp;&nbsp;低风险</p>
			<p style="color: #9a9a9a;margin-top:15px;width: 78%;font-size:0.8em;display:inline-block;line-height: 2.0em;">让闲置资金得到丰厚回报,赚钱全归你，亏钱我买单。</p>
			<span style="color: #9a9a9a;font-size: 0.5em;width: 15%;display:inline-block;">2016.03.15</span>
		</div>
	</div> -->
</div>
<div style="width: 100%;height: 50px;float: left;"></div>
<div class="foot_nav" style="width:100%;height:50px;position:fixed;background:#eee;bottom:0;left:0;border-top:1px solid #dddddd;font-size:14px;color:#545454">
	<ul>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/商圈首页.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('nearby/index')?>" style="margin-top:30px;display:inline-block;">商圈</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/矢量智能对象.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('cart/show')?>" style="margin-top:30px;display:inline-block;">购物车</a></li>
	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/分类-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/dingdan2')?>" style="margin-top:30px;display:inline-block;">订单</a></li>

	<li style="width:25%;float:left;text-align:center;height:50px;background:url('<?php echo base_url()?>statics/default/img/我-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('weixin/wechat/get_user_info')?>" style="margin-top:30px;display:inline-block;">我的</a></li>

	</ul>
</div>

</body>
</html>