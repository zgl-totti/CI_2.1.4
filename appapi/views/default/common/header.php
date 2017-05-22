<!DOCTYPE html>
<html lang="en">
	<head>
		<title>后台管理系统</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/bootstrap.min.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/bootstrap-responsive.min.css');?>" />
	
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/unicorn.main.css');?>" />
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/unicorn.my.css');?>" class="skin-color" />
		
		<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/myadmin.css');?>" class="skin-color" />
		
		<script src="<?php echo base_url('statics/admin/js/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/jquery.ui.custom.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/unicorn.js');?>"></script>
		<script src="<?php echo base_url('statics/admin/js/common.js');?>"></script>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<body>
		
		<div id="header">
			<h1><a href="<?php echo site_aurl('admin/main');?>"><img src='<?php echo base_url('statics/admin/img/logo.png')?>' />	</a></h1>
		</div>
		
		<div style="position: absolute;top: 20px;left: 100px;color: white;">
			<h2>裕医</h2>
		</div>
		
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-primary ">
					<a title="" href="#"><i class="icon icon-user"></i> 
						<span class="text">
						
						<?php
							$userinfo	=	getAdminuserinfo();
							if( isset($userinfo) && $userinfo['realname'] ){
								echo $userinfo['realname'];
							}elseif( isset($userinfo) && $userinfo['username'] ) {
								echo $userinfo['username'];
							}
						?>
						</span>
					</a>
				</li>
                <li class="btn btn-primary">
					<a title="" href="<?php echo site_aurl('admin/admin_manage');?>">
						<i class="icon icon-cog"></i> 
						<span class="text">设置</span>
					</a>
				</li>
                <li class="btn btn-primary">
					<a title="" href="<?php echo site_aurl('admin/main/logout')?>">
						<i class="icon icon-share-alt"></i> 
						<span class="text">退出</span>
					</a>
				</li>
            </ul>
        </div>
            
		