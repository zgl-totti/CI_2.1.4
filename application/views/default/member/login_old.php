<?php 
templates('global','header');

$tempci	=	& get_instance(); 
?>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/registerform.css');?>" type="text/css"/>

<div class="bg-group">
	<img class="l-part" src="<?php echo base_url($tempci->MYSTATIC.'/img/bg_l.jpg');?>" />
	<img class="r-part" src="<?php echo base_url($tempci->MYSTATIC.'/img/bg_r.jpg');?>" />
</div>
<div class="login">
	<h1>糖尿病筛查数据登记系统</h1>
	<p>&nbsp;</p>
	<div class="form-panel">
		<form action="<?php echo site_url('login')?>" method="post" id='formID'>
			<input type="text" class="finput margin-auto btn-trans btn-large validate[required,minSize[3]]" placeholder="用户名" id="username" data-errormessage-value-missing="请输入用户名"  data-prompt-position="bottomRight:3,-20" name='username' autocomplete= "off" />
			
			<input type="password" class="finput margin-auto btn-trans btn-large validate[required,minSize[6]]" placeholder="密码" id="password" data-errormessage-value-missing="请输入密码" data-prompt-position="bottomRight:3,-20" name='password' autocomplete= "off" />
			
			<p class="t-center btn-group no-wrap">
				<input type="button" class="btn-trans btn-small" value="" />
				<input type="submit" class="btn-trans btn-small" value="登录" name='dosubmit'/>
			</p>
			
		</form>
	</div>
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
<?php 
templates('global','footer');
?>
