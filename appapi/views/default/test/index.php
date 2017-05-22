<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('statics/appapi/css/unicorn.main.css');?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		
		
		<script src="<?php echo base_url('statics/admin/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/bootstrap-carousel.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/bootstrap.min.js');?>"></script>
	<body>
	
	<div id="content" style='margin-left:0;'>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="title-bar">
						<h4>读片</h4>				
					</div>
					<div class="text-box flex-left  wrapping">
						<p>读片描述描述描述</p>
					</div>	
				</div>
			
				<div class='span12'>
				  <div id="myCarousel" class="carousel slide" >
					
					<div class="carousel-inner">
					  <div class="item active">
						<img src="/statics/appapi/assets/img/bootstrap-mdo-sfmoma-01.jpg" alt="">
						
					  </div>
					  <div class="item">
						<img src="/statics/appapi/assets/img/bootstrap-mdo-sfmoma-02.jpg" alt="">
						
					  </div>
					  <div class="item">
						<img src="/statics/appapi/assets/img/bootstrap-mdo-sfmoma-03.jpg" alt="">
					  </div>
					  <div class="item">
						<img src="/statics/appapi/assets/img/7351582_093639685198_2.jpg" alt="">
					  </div>
					</div>
				  </div>
				</div>
			</div>
			
			
			<div class="row-fluid">
				<div class="span12">
					<div class="title-bar">
						<h4>评论</h4>				
					</div>
					<div class="text-box flex-left  wrapping">
						<p>张三：评论显示很好！</p>
					</div>	
				</div>
				
			</div>
		</div>
	</div>
			
	<script>
		$(function(){
			$('#myCarousel').carousel();
		})
	</script>
	</body>
</html>

