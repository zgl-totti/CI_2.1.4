<!DOCTYPE html>
<html>
	<head>
<?php 
	$tempci	=	& get_instance();
?>
		<meta charset="utf-8">
		<?php
			if(isset($seo_title)){
		?>
		<title><?php echo $seo_title;?></title>
		<?php
			}else{
		?>
		<title><?php echo SITENAME;?></title>
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
		<meta name="description" content="<?php echo SITENAME;?>" />
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
		<meta name="keywords" content="<?php echo SITENAME;?>" />
		<?php
			}
		?>
		
		<link rel="stylesheet" href="<?php echo base_url($tempci->MYSTATIC.'/css/custom.css');?>" />
		
		<link rel="stylesheet" href="<?php echo base_url($tempci->MYSTATIC.'/css/style.css');?>" />
		
		<link rel="stylesheet" href="<?php echo base_url('statics/global/style/patients.css');?>" type="text/css"/>

		<!--[if lt IE 9]>
			<style>
				.box-shadow{
					border: 1px solid #c5c3c5;
				}
			</style>
		<![endif]-->
		
		<script src="<?php echo base_url('statics/global/js/jquery-1.8.2.min.js');?>" type="text/javascript"></script>
	</head>
	<body>
		
