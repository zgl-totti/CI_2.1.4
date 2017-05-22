
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
		<p class="gray hospital-title"><span><?php echo $info['name'];?></span></p>
		<div class="hospital-info">
			
			<p class="summary"><?php echo htmlspecialchars_decode($info['content']);?></p>
		</div>
	   
	</section>
	
	</body>
</html>

