<?php 
$tempci	=	& get_instance(); 


$userinfo	=	getmemberinfo();

$defseo	=	$tempci->config->item('base_seo');
?>

<div class="top-bar relative">
	<div class="inline-block logo">
		<img src='<?php echo base_url($tempci->MYSTATIC.'/img/logo.png');?>' style='width:120px;height:71px;'/>
	</div>
	
	<div class="inline-block title">
		
		<h1><b><?php echo $defseo;?></b></h1>
	</div>
	
	
	
	<?php
		if($userinfo){
	?>
	<div class="memberinfo">
		<div class="inline-block img-wrap">
			<a href="javascript:;">
				<?php
					if($userinfo['avatar']){
				?>
				<img src="<?php echo base_url().$userinfo['avatar'];?>">
				<?php
					}else{
				?>
				<img src="<?php echo base_url($tempci->MYSTATIC.'/img/nophoto.gif');?>">
				<?php
					}
				?>
			</a>
		</div>
		<div class="inline-block">
			<a href="javascript:;"><?php echo $userinfo['username'];?></a>
		</div>
		<div class="inline-block seperater">
			<img src="<?php echo base_url($tempci->MYSTATIC.'/img/seperater.png');?>">
		</div>
		<div class="inline-block">
			<a href="<?php echo site_url('login/loginout')?>">
				<img src="<?php echo base_url($tempci->MYSTATIC.'/img/power.png');?>" title='退出'/>
			</a>
		</div>
	</div>
	<?php
		}else{
	?>
	<div class="memberinfo" style='width:100px;'>
		<div class="inline-block seperater">
			
		</div>
		<div class="inline-block">
			<a href="<?php echo site_url('login')?>">
				<img src="<?php echo base_url($tempci->MYSTATIC.'/img/power.png');?>" title='登录'/>
			</a>
		</div>
	</div>
	
	<?php
		}
	?>
	
</div>

<?php
	templates('home','topbar');
?>