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
				<form action="<?php echo site_url('laboratory/editbiochemical')?>" method="post" id='formID'>
					<input type='hidden' name='id' value='<?php echo $data['id']?>' />
					<table class='table-cont' width="100%">
						<tr>
							<td width='200'>检查日期</td>
							<td>
								<input type='text' name='ctime' class='dates' onclick="laydate({istime: true,format: 'YYYY-MM-DD hh:mm:ss'})" placeholder="检查日期" data-errormessage-value-missing="检查日期" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['ctime'];?>'/>
							</td>
						</tr>
						
						<tr>
							<td>钠（mmol/L）</td>
							<td>
								<input type='text' name='na' placeholder="钠（mmol/L）" data-errormessage-value-missing="钠（mmol/L）" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['na'];?>'/>
							</td>
						</tr>
						<tr>
							<td>钾（mmol/L）</td>
							<td>
								<input type='text' name='k' placeholder="钾（mmol/L）" data-errormessage-value-missing="钾（mmol/L）" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['k'];?>'/>
							</td>
						</tr>
						<tr>
							<td>钙（mmol/L）</td>
							<td>
								<input type='text' name='ga' placeholder="钙（mmol/L）" data-errormessage-value-missing="钙（mmol/L）" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['ga'];?>'/>
							</td>
						</tr>
						<tr>
							<td>谷丙转氨酶ALT(U/L)</td>
							<td>
								<input type='text' name='alt' placeholder="谷丙转氨酶ALT(U/L)" data-errormessage-value-missing="谷丙转氨酶ALT(U/L)" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['alt'];?>'/>
							</td>
						</tr>
						
						<tr>
							<td>谷草转氨酶AST(U/L)</td>
							<td>
								<input type='text' name='ast' placeholder="谷草转氨酶AST(U/L)" data-errormessage-value-missing="谷草转氨酶AST(U/L)" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['ast'];?>'/>
							</td>
						</tr>
						
						<tr>
							<td>尿素氮BUN(mmol/L)</td>
							<td>
								<input type='text' name='bun' placeholder="尿素氮BUN(mmol/L)" data-errormessage-value-missing="尿素氮BUN(mmol/L)" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['bun'];?>'/>
							</td>
						</tr>
						
						<tr>
							<td>肌酐CR(μmol/L)</td>
							<td>
								<input type='text' name='cr' placeholder="肌酐CR(μmol/L)" data-errormessage-value-missing="肌酐CR(μmol/L)" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['cr'];?>'/>
							</td>
						</tr>
						
						<tr>
							<td>发生ADR/ADE时</td>
							<td>
								<input type='text' name='adr' placeholder="发生ADR/ADE时" data-errormessage-value-missing="发生ADR/ADE时" data-prompt-position="bottomLeft:3" autocomplete= "off" value='<?php echo $data['adr'];?>'/>
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
