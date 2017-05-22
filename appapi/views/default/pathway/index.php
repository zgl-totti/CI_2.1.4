
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<title>个人中心</title>
<link rel="stylesheet" href="<?php echo base_url('statics/api/css/custom.css');?>" />
</head>
<body class="white">
	
	<section class="main">
		
		<ul class="list">
		<?php
			if( isset($info) && $info ){
				foreach($info as $v){
		?>
			<a href="<?php echo $v['url'];?>"><li><?php echo str_cut($v['name'],50);?></li></a>
		 <?php
				}
			}else{
		?>
			<li><a href="javascript:;">暂无相关菜单信息！</a></li>
		<?php 
			}
		?>
		</ul>
		
		  
	</section>
	
		
	</body>
</html>

