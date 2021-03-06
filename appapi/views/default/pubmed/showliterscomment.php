<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<!-- for 360 -->
        <meta name="renderer" content="webkit"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<title></title>
		<link rel="stylesheet" type="text/css" href="/statics/appapi/css/doctor.css">
		<link rel="stylesheet" type="text/css" href="/statics/appapi/css/doctor_style.css">
		
		<script src="/statics/global/js/jquery-1.8.2.min.js"></script>
	</head>
	<style>
	.article img{width:100%;}
	</style>
		<?php if (empty($title)): ?>
					<div class="article">
						暂无内容
					</div>
		<?php else: ?>
			<h2 class="title title-style-2"><?php echo $title; ?></h2>
			
		<?php endif ?>
		<hr>
		
		<?php
			if(isset($data) && $data){
				
				foreach($data AS $c){
		?>
			<h2 class="title title-style-2">用户评论</h2>
			<p class="subtitle"><?php echo $c['username']; ?> : <?php echo $c['content']; ?></p>
		<?php
				}
			}
		?>
		
		<div style='min-height:50px;'></div>
		
		<script type="text/javascript">
			$(function(){
				$('.article img').css("width",'100%');
				$('.article img').removeAttr("width");
			});
		</script>
		
	</body>
</html>