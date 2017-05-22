<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
#owl-demo{position:relative;width:640px;height:390px;margin:20px auto 0 auto;}
#owl-demo .item{ position:relative;display:block;}
#owl-demo img{display:block;width:640px;height:390px;}
#owl-demo b{position:absolute;left:0;bottom:0;width:100%;height:78px;background-color:#000;opacity:.5;filter:alpha(opacity=50);}
#owl-demo span{position:absolute;left:0;bottom:37px;width:100%;font:18px/32px "微软雅黑","黑体";color:#fff;text-align:center;}

.owl-pagination{position:absolute;left:0;bottom:10px;width:100%;height:22px;text-align:center;}
.owl-page{display:inline-block;width:10px;height:10px;margin:0 5px;background-image:url(<?php echo base_url('/statics/appapi/img/bg15.png');?>);*display:inline;*zoom:1;}
.owl-pagination .active{width:25px;background-image:url(<?php echo base_url('/statics/appapi/img/bg16.png');?>);}
.owl-buttons{display:none;}
.owl-buttons div{position:absolute;top:50%;width:40px;height:80px;margin-top:-40px;text-indent:-9999px;}
.owl-prev{left:0;background-image:url(<?php echo base_url('/statics/appapi/img/bg17.png');?>);}
.owl-next{right:0;background-image:url(<?php echo base_url('/statics/appapi/img/bg18.png');?>);}
.owl-prev:hover{background-image:url(<?php echo base_url('/statics/appapi/img/bg19.png');?>);}
.owl-next:hover{background-image:url(<?php echo base_url('/statics/appapi/img/bg20.png');?>);}
</style>

<link rel="stylesheet" href="<?php echo base_url('/statics/appapi/css/owl.carousel.css');?>" />

<script type="text/javascript" src="<?php echo base_url('/statics/appapi/js/jquery-1.8.3.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('/statics/appapi/js/owl.carousel.js');?>"></script>
<script type="text/javascript">
$(function(){
	$('#owl-demo').owlCarousel({
		items: 1,
		navigation: true,
		navigationText: ["上一个","下一个"],
		autoPlay: true,
		stopOnHover: true
	}).hover(function(){
		$('.owl-buttons').show();
	}, function(){
		$('.owl-buttons').hide();
	});
});
</script>

</head>

<body style="width:610px;">
	       <div class="item-list managepa">
				   
				<?php
					if($imgs){
				?>
				<div id="owl-demo" class="owl-carousel">
					<?php
						foreach($imgs as $k => $v){
					?>
					<a class="item" href="<?php echo $v;?>" data-lightbox="example-set" ><img  class="example-image" src="<?php echo $v;?>" alt="" ></a> 
					<?php
						}
					?>
				</div>
				<?php
					}
				?>	
				<div >
	    	<h2 class="title title-style-2" style="text-align:center;"><?php echo $title; ?></h2>
		<p class="subtitle" style="text-align:center;"><?php echo $presentation ?>  </p>
              
		
		<div class="article">

				      
				</div>			
				<div style="text-align:center;">
			
				<p><?php if(!empty($comment)){echo $comment['content'];} ?></p>
     	

		</div>
		
		
		
		

		<script type="text/javascript">
			$(function(){
				$('.article img').css("width",'100%');
				$('.article img').removeAttr("width");
			});
		</script>
	</body>
</html>