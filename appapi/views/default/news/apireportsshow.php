<!DOCTYPE html>
<html>
<head>
<title>裕医</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
<meta name="format-detection" content="telephone=no" />    
<meta name="keywords" content="裕医" />
<meta name="description" content="裕医" />
<link rel="stylesheet" href="<?php echo base_url('statics/newwap/style.css');?>" />
</head>
<body>

<div class="share article">
    <div class="inner">
		
		<div class="content">
			<div style="margin:0;overflow:hidden;">
				<h1 style="font-size:24px;line-height:1.8;color:#333333;word-wrap:break-word;"><?php echo $info['title']; ?></h1>
				<h2 style="font-size:16px;color:#999999;word-wrap:break-word;">
				<em style="font-style:normal;margin-right:10px;color:#7f7f7f;display:inline-block;"><?php echo $info['inputtime']; ?></em>
				<em style="font-style:normal;margin-right:10px;color:#7f7f7f;display:inline-block;"><?php echo $info['copyfrom']; ?> </em>
				</h2>
			</div>
			<div class="inner-content">
				<?php echo $info['content']; ?>
			</div>
		</div>
    </div>
</div>

</body>
</html>