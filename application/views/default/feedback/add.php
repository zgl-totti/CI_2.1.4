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
				<form action="<?php echo site_url('feedback/add')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td>手机</td>
							<td><input type='text' name='phone' id='phone' value=''  class="validate[custom[tel]]" placeholder="手机" data-errormessage-value-missing="请输手机" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						<tr>
							<td>邮箱</td>
							<td><input type='text' name='email' id='email' value='' class="validate[custom[email]]" placeholder="邮箱" data-errormessage-value-missing="请输入邮箱" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>反馈内容</td>
							<td><textarea name='content' id='content' placeholder="反馈内容" data-errormessage-value-missing="请输入反馈内容" data-prompt-position="bottomLeft:3" style="width:60%;height:100px;" class='validate[required]'></textarea></td>
						</tr>
						
					</table>
				
					<input type="submit" class="" value="添加" name='dosubmit'/>
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
