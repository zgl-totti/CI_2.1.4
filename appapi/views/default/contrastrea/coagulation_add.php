<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');
?>


<div class="main-board">
	<?php
		templates('contrastrea','cleft');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			<div class="item-list managepa">
				<form action="<?php echo site_url('contrastlab/addcoagulation')?>" method="post" id='formID'>
					
					<table class='table-cont' width="100%">
						<tr>
							<td width='200'>检查日期</td>
							<td>
								<input type='text' name='ctime' class='dates' onclick="laydate({istime: true,format: 'YYYY-MM-DD hh:mm:ss'})" placeholder="检查日期" data-errormessage-value-missing="检查日期" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
						<tr>
							<td>凝血酶原时间</td>
							<td>
								<input type='text' name='zymogen' placeholder="凝血酶原时间" data-errormessage-value-missing="凝血酶原时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
							<td>部分凝血活酶时间</td>
							<td>
								<input type='text' name='part' placeholder="部分凝血活酶时间" data-errormessage-value-missing="部分凝血活酶时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
							<td>纤维蛋白原</td>
							<td>
								<input type='text' name='fibrin' placeholder="纤维蛋白原" data-errormessage-value-missing="纤维蛋白原" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
							<td>凝血酶时间</td>
							<td>
								<input type='text' name='thrombin' placeholder="凝血酶时间" data-errormessage-value-missing="凝血酶时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
							<td>发生ADR/ADE时</td>
							<td>
								<input type='text' name='adr' placeholder="发生ADR/ADE时" data-errormessage-value-missing="发生ADR/ADE时" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
					</table>
					
					<input type="submit" class="" value="添加" name='dosubmit' />
				</form>
			</div><!-- list end -->
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>

<script src="<?php echo base_url('statics/global/js/jquery.validationEngine-zh_CN.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine.js');?>" type="text/javascript" charset="utf-8"></script>

<script src="<?php echo base_url('statics/global/laydate/laydate.js');?>"></script>


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
