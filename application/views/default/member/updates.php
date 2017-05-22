<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/patients.css');?>" type="text/css"/>

<div class="main-board">
	<?php
		templates('home','left');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			<div class="item-list managepa">
				
				<form action="<?php echo site_url('member/updates')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						
						<tr>
							<td width='100'>旧密码</td>
							<td><input type='password' name='oldpassword' id='oldpassword' value='' class="validate[required,minSize[6]]" placeholder="旧密码" data-errormessage-value-missing="请输入旧密码" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							
						</tr>
						
						<tr>
							<td>新密码</td>
							<td><input type='password' name='password' id='password' value='' class="validate[required,minSize[6]]" placeholder="新密码" data-errormessage-value-missing="请输入新密码" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>确认密码</td>
							<td><input type='password' name='passwordagain' id='passwordagain' value='' class="validate[required,minSize[6],equals[password]]" placeholder="确认密码" data-errormessage-value-missing="请输入确认密码" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						
						
					</table>
				
					<input type="submit" class="" value="修改" name='dosubmit'/>
				</form>
			</div><!-- list end -->
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>

<script src="<?php echo base_url('statics/global/js/jquery.validationEngine-zh_CN.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine.js');?>" type="text/javascript" charset="utf-8"></script>

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
