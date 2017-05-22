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
	<body>
		<h2 class="title title-style-2"><?php echo $info['title']; ?></h2>
		<p class="subtitle"><?php echo $info['inputtime']; ?>  <?php echo $info['copyfrom']; ?></p>

		
		<div class="article">

			<hr class="dashed">
				<?php echo $info['content']; ?>
     		<hr class="dashed">

		</div>
	
		<script type="text/javascript">
			$(function(){
				$('.article img').css("width",'100%');
				$('.article img').removeAttr("width");
			});
		</script>
	</body>
</html>