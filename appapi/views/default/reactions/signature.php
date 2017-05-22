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
				<form action="<?php echo site_url('reactions/signature')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						
						<tr>
							<td>填表人签名</td>
							<td width='250'>
								<input type='text' name='aname' id='aname' value='<?php if(isset($data['aname'])){ echo $data['aname'];}?>' class="validate[required]" placeholder="填表人签名" data-errormessage-value-missing="填表人签名" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>日期</td>
							<td>
								<input type='text' name='atime' id='atime' value='<?php if(isset($data['atime']) && $data['atime'] ){ echo $data['atime'];}?>' data-prompt-position="bottomLeft:3" autocomplete= "off"  onclick="laydate({format: 'YYYY-MM-DD'})"/>
							</td>
						</tr>
						
						<tr>
							<td>复核员签名</td>
							<td>
								<input type='text' name='fname' id='fname' value='<?php if(isset($data['fname'])){ echo $data['fname'];}?>' class="validate[required]" placeholder="复核员签名" data-errormessage-value-missing="复核员签名" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>日期</td>
							<td>
								<input type='text' name='ftime' id='ftime' value='<?php if(isset($data['ftime']) && $data['ftime'] ){ echo $data['ftime'];}?>' data-prompt-position="bottomLeft:3" autocomplete= "off" onclick="laydate({format: 'YYYY-MM-DD'})"/>
							</td>
						</tr>
						
						
						<tr>
							<td>质控人签名</td>
							<td>
								<input type='text' name='zname' id='zname' value='<?php if(isset($data['zname'])){ echo $data['zname'];}?>' class="validate[required]" placeholder="质控人签名" data-errormessage-value-missing="质控人签名" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>日期</td>
							<td>
								<input type='text' name='ztime' id='ztime' value='<?php if(isset($data['ztime']) && $data['ztime'] ){ echo $data['ztime'];}?>' data-prompt-position="bottomLeft:3" autocomplete= "off" onclick="laydate({format: 'YYYY-MM-DD'})" />
							</td>
						</tr>
						
					</table>
				
					<input type="submit" class="" value="<?php echo isset($data) && $data ? '修改' : '添加';?>" name='dosubmit' />
					
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
