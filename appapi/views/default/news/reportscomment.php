<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
		<meta name="description" content="裕医" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="keywords" content="裕医" />

		<title>裕医</title>
		
		<link rel="stylesheet" href="<?php echo base_url('statics/wap/css/bootstrap.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('statics/wap/css/bootstrap-responsive.css');?>" />
		
		<link rel="stylesheet" href="<?php echo base_url('statics/wap/css/styles.css');?>" />
	
		<script src="<?php echo base_url('statics/wap/js/jquery-1.7.2.min.js');?>"></script>
		<script src="<?php echo base_url('statics/wap/js/bootstrap.js');?>"></script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
<body>

	<style>
	.maincontent{margin-top:50px;}
	#in-sub-nav{display:none;}
	</style>

	<div class='maincontent'>
		<div class="page">
			<div class="page-container">
				<div class="container faq">
					<div class="row showcontent">
						<div class="span12 showdetail">
							<h4 class="header"><a href='javascript:;'><?php echo $info['title']; ?></a></h4>
							
							
							<div class="qa">
								<?php
									if(isset($cinfo) && $cinfo){
										
										foreach($cinfo AS $c){
								?>
									<h3 class="title title-style-2">用户评论</h3>
									<p ><?php echo $c['username']; ?> : <?php echo $c['content']; ?></p>
								<?php
										}
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
		
	</body>

</html>