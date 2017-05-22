
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />  
<meta name="apple-mobile-web-app-status-bar-style" content="black" />  
<meta name="format-detection" content="telephone=no,email=no" />
<meta name="apple-touch-fullscreen" content="yes" />
<meta name="HandheldFriendly" content="true"/>  
<link rel="stylesheet" href="<?php echo base_url('statics/swiper/style.css');?>">
<title>读片</title>
</head>
<body>
<!--slider-->
<div>
	<h4><?php echo $title; ?></h4>				
	<p><?php echo $presentation ?></p>
	
</div>


<div id="slider-box">
	<ul id="slider">
		<?php
			if($imgs){
				foreach($imgs as $k => $v){
		?>
		<li><img src="<?php echo $v;?>" alt="" /></li>
		<?php
				}
			}
		?>
		
	</ul>
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

<!--js-->
<script src="<?php echo base_url('statics/swiper/zepto.min.js');?>"></script>
<script src="<?php echo base_url('statics/swiper/zepto.touchSlider.min.js');?>"></script>
<script>
	$(function(){
		$('#slider-box').touchSlider({
			arrow: false,
			auto: false
		});
	});
</script>
</body>
</html>