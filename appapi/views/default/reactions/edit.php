<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');
?>


<div class="main-board">
	<?php
		templates('reactions','cleft');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			<div class="item-list managepa">
				<form action="<?php echo site_url('reactions/edit')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td>患者姓名</td>
							<td><input type='text' name='pname' id='pname' value='<?php echo $info['pname'];?>' class="validate[required]" placeholder="患者姓名" data-errormessage-value-missing="患者姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>科室</td>
							<td><input type='text' name='subject' id='subject' value='<?php echo $info['subject'];?>' class="" placeholder="科室" data-errormessage-value-missing="科室" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>住院号</td>
							<td>
								<input type='text' name='hnumber' id='hnumber' value='<?php echo $info['hnumber'];?>' class="" placeholder="住院号" data-errormessage-value-missing="住院号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
						<tr>
							<td>筛选卡编号</td>
							<td>
								<input type='text' name='snumber' id='snumber' value='<?php echo $info['snumber'];?>'  class="" placeholder="筛选卡编号" data-errormessage-value-missing="筛选卡编号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
					</table>
				
					<input type="submit" class="" value="修改" name='dosubmit' />
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
