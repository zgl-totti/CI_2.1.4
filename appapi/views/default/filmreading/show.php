<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('statics/appapi/css/unicorn.main.css');?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		
		<link rel="stylesheet" href="<?php echo base_url('statics/swiper/css/swiper.min.css');?>">
		
		<script src="<?php echo base_url('statics/admin/js/jquery.min.js');?>"></script>
		
		<script src="<?php echo base_url('statics/swiper/js/swiper.min.js');?>"></script>
	<body>
	
	<div id="content" style='margin-left:0;'>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="title-bar">
						<h4><?php echo $title; ?></h4>				
					</div>
					<div class="text-box flex-left  wrapping">
						<p><?php echo $presentation ?></p>
					</div>	
				</div>
			
				<div class='span12'>
				
					 <div class="swiper-container">
						<div class="swiper-wrapper">
							<?php
								if($imgs){
									foreach($imgs as $k => $v){
							?>
							<div class="swiper-slide"><img src="<?php echo $v;?>" alt="" style='width:100%;'></div>
							<?php
									}
								}
							?>
							
						</div>
						
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
			
			
			<?php 
				if($comment){	
			?>
			<div class="row-fluid">
				<div class="span12">
					<div class="title-bar">
						<h4>相关评论</h4>				
					</div>
					<div class="text-box flex-left  wrapping">

						<?php
							foreach($comment AS $v){
						?>
						<p>
							<?php foreach($userinfo as $kk=>$vv) { ?>
							<?php if( $vv['userid'] == $v['userid'] ) { ?>
								<?php if( isset($vv['avatar']) && $vv['avatar'] ){ ?>
                                   <img src="<?php echo $vv['avatar'];  ?>">
								<? } else {?>
									<img src="<?php echo base_url('statics/default/img/bg_l.jpg');?>" style="width:25px;height:25px;"/>
								<? } ?>
						<? } }?>
						   <?php echo $v['username']; ?><br>
						   评论时间：<?php echo date("Y-m-d H:i:s",$v['add_time']);?><br>
						   评论内容：<?php echo $v['content']; ?>
						</p><hr>
						<?php
							}
						?>
					</div>	
				</div>
				
			</div>
			<?php
				}
			?>
		</div>
	</div> 
			
	<script>
		$(function(){
			var swiper = new Swiper('.swiper-container', {
				pagination: '.swiper-pagination',
				paginationClickable: true,
				observer:true,//修改swiper自己或子元素时，自动初始化swiper
				observeParents:true//修改swiper的父元素时，自动初始化swiper
			});
		})
	</script>
	</body>
</html>

