<!DOCTYPE html>
<html>
	<head>
<?php 
	$tempci	=	& get_instance();
	$defseo	=	$tempci->config->item('base_seo');
?>
		<meta charset="utf-8">
		<?php
			if(isset($seo_title)){
		?>
		<title><?php echo $seo_title;?></title>
		<?php
			}else{
		?>
		<title><?php echo $defseo;?></title>
		<?php
			}
		?>
		
		<?php
			if(isset($seo_description)){
		?>
		<meta name="description" content="<?php echo $seo_description;?>" />
		<?php
			}else{
		?>
		<meta name="description" content="<?php echo $defseo;?>" />
		<?php
			}
		?>
		
		<?php
			if(isset($seo_keywords)){
		?>
		<meta name="keywords" content="<?php echo $seo_keywords;?>" />
		<?php
			}else{
		?>
		<meta name="keywords" content="<?php echo $defseo;?>" />
		<?php
			}
		?>
		<meta charset="utf-8" />        
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="<?php echo base_url('statics/default/css/login.css');?>" type="text/css"/>
		<link rel="stylesheet" href="<?php echo base_url('statics/global/style/registerform.css');?>" type="text/css"/>

		<script src="<?php echo base_url('statics/global/js/jquery-1.8.2.min.js');?>" type="text/javascript"></script>
	</head>
	<body>
		

	<style>
            

        </style> 
<div class="main">
	<form action="<?php echo site_aurl('login/loginin');?>" method="post" id='formID'>
		<dl>
			<dt>账号：</dt>
			<dd>
				<input type="text" class="finput margin-auto btn-trans btn-large validate[required,minSize[3]]" placeholder="用户名" id="username" data-errormessage-value-missing="请输入用户名"  data-prompt-position="bottomLeft:3" name='username' autocomplete= "off" />
			</dd>
		</dl>
		<dl>
			<dt>密码：</dt>
			<dd>
				<input type="password" class="finput margin-auto btn-trans btn-large validate[required,minSize[6]]" placeholder="密码" id="password" data-errormessage-value-missing="请输入密码" data-prompt-position="bottomLeft:3" name='password' autocomplete= "off" />
			</dd>
		</dl>
		<dl>
			<dt></dt>
            <input type='hidden' name='csrftoken' value='<?php echo $csrftoken?>'/>
			<dd><input type="submit" class="btn-small" value="登录" name='submit'/></dd>
		</dl>
	</form>
</div>




<script src="<?php echo base_url('statics/global/js/jquery.validationEngine-zh_CN.js');?>" type="text/javascript" charset="utf-8">
</script>
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine.js');?>" type="text/javascript" charset="utf-8">
</script>
<script>
jQuery(document).ready(function(){
	jQuery('#formID').validationEngine({
		autoHidePrompt: true,
		autoHideDelay:'3000'
	});
});
</script>