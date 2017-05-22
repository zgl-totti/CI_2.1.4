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
				<form action="<?php echo site_url('reactions/usage')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td width='350'>是否首次使用银杏内酯注射液</td>
							<td>
								<label><input type='radio' name='isfirst' class='isfirst' value='1' <?php if(isset($data) && $data['isfirst'] && $data['isfirst'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='isfirst' class='isfirst' value='2' <?php if(isset($data) && $data['isfirst'] && $data['isfirst'] == 2){echo 'checked';}?>/> 是  </label>
							</td>
							
						</tr>
						<tr>
							<td>本次使用银杏内酯注射液的适应症</td>
							<td>
								<input type='text' name='indication' id='indication' value='<?php if(isset($data) && $data['indication']){ echo $data['indication'];}?>' class="" placeholder="" data-errormessage-value-missing="" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							
						</tr>
						
						<tr>
							<td>是否与其他药物（除溶媒外）在同一容器内混合使用</td>
							<td>
								<label><input type='radio' name='mixeduse' class='mixeduse' value='1' <?php if(isset($data) && $data['mixeduse'] && $data['mixeduse'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='mixeduse' class='mixeduse' value='2' <?php if(isset($data) && $data['mixeduse'] && $data['mixeduse'] == 2){echo 'checked';}?>/> 是  </label>
							
								<div class='mixedusediv' <?php if( !(isset($data['mixeduse']) && $data['mixeduse'] == '2') || !$data ){?>style='display:none;margin-left:10px;'<?php } ?>>
									药物名称、剂量：<input type='text' name='mixeduseshow' id='mixeduseshow' value='<?php if(isset($data) && $data['mixeduseshow']){ echo $data['mixeduseshow'];}?>'/>
								</div>
							</td>
						</tr>
					</table>
					
					<table class='table-cont' width="100%">
						<tr>
							<th>开始用药日期</th>
							<th>溶媒种类</th>
							<th>单次溶媒剂量（ml）</th>
							<th>单次用药量（支）</th>
							<th>静滴速度(滴/分钟)</th>
							<th>停止用药日期</th>
							<th>批号</th>
							<th></th>
						</tr>
						<?php
							if(isset($data) && $data['content_date'] && is_array($data['content_date'])){
								foreach($data['content_date'] AS $k => $v){
						?>
						
						<tr class='moretr'>
							<td><input type='text' name='content_date[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})" value='<?php echo $v;?>'/></td>
							<td>
								<select name='content_type[]'>
									<option value='0'>请选择</option>
									<option value='1' <?php if(isset($data['content_type'][$k]) && $data['content_type'][$k] == 1){echo 'selected';}?>>0.9%氯化钠注射液</option>
									<option value='2' <?php if(isset($data['content_type'][$k]) && $data['content_type'][$k] == 2){echo 'selected';}?>>5%葡萄糖注射液</option>
									<option value='3' <?php if(isset($data['content_type'][$k]) && $data['content_type'][$k] == 3){echo 'selected';}?>>葡萄糖氯化钠注射液</option>
								</select>
							</td>
							<td><input type='text' name='content_ml[]' size='10' value='<?php if(isset($data['content_ml'][$k]) && $data['content_ml'][$k]){echo $data['content_ml'][$k];}?>'/></td>
							<td><input type='text' name='content_num[]' size='10' value='<?php if(isset($data['content_num'][$k]) && $data['content_num'][$k]){echo $data['content_num'][$k];}?>'/></td>
							<td><input type='text' name='content_speed[]' size='10' value='<?php if(isset($data['content_speed'][$k]) && $data['content_speed'][$k]){echo $data['content_speed'][$k];}?>'/></td>
							<td><input type='text' name='content_etime[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})" value='<?php if(isset($data['content_etime'][$k]) && $data['content_etime'][$k]){echo $data['content_etime'][$k];}?>'/></td>
							<td>
								<input type='text' name='content_batch[]' size='10' value='<?php if(isset($data['content_batch'][$k]) && $data['content_batch'][$k]){echo $data['content_batch'][$k];}?>'/>
							
							</td>
							<td>
								<?php 
									if($k == 0){
								?>
								<a href='javascript:;' class='addmore'>+</a>
								<?php
									}else{
								?>
								<a href='javascript:;' onclick='removes(this)'>-</a>
								<?php
									}
								?>
							</td>
						<tr>
						<?php
								}
							}else{
						?>
						<tr class='moretr'>
							<td><input type='text' name='content_date[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})"/></td>
							<td>
								<select name='content_type[]'>
									<option value='0'>请选择</option>
									<option value='1'>0.9%氯化钠注射液</option>
									<option value='2'>5%葡萄糖注射液</option>
									<option value='3'>葡萄糖氯化钠注射液</option>
								</select>
							</td>
							<td><input type='text' name='content_ml[]' size='10' /></td>
							<td><input type='text' name='content_num[]' size='10' /></td>
							<td><input type='text' name='content_speed[]' size='10' /></td>
							<td><input type='text' name='content_etime[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})"/></td>
							<td>
								<input type='text' name='content_batch[]' size='10' />
							
							</td>
							<td>
								<a href='javascript:;' class='addmore'>+</a>
							</td>
						<tr>
						<?php
							}
						?>
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
	
	
	//	是否与其他药物（除溶媒外）在同一容器内混合使用
	$('.mixeduse').click(function(){
		var smval	=	$('.mixeduse:checked').val();
		if(smval == 1){
			$('.mixedusediv').hide();
		}else{
			$('.mixedusediv').css('display','inline-block');
		}
	})
	
	//	添加更多
	$('.addmore').click(function(){
		var htmls	=	new Array();
		htmls.push("<tr class='moretr'>");
		htmls.push("<td><input type='text' name='content_date[]' size='10' class='dates' onclick=\"laydate({format: 'YYYY-MM-DD'})\"/></td>");
		htmls.push("<td><select name='content_type[]'>");
		htmls.push("<option value='0'>请选择</option><option value='1'>0.9%氯化钠注射液</option>");
		htmls.push("<option value='2'>5%葡萄糖注射液</option><option value='3'>葡萄糖氯化钠注射液</option>");
		htmls.push("</select></td>");
		htmls.push("<td><input type='text' name='content_ml[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='content_num[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='content_speed[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='content_etime[]' size='10' class='dates' onclick=\"laydate({format: 'YYYY-MM-DD'})\"/></td>");
		htmls.push("<td><input type='text' name='content_batch[]' size='10' /></td>");
		htmls.push("<td><a href='javascript:;' onclick='removes(this)'>-</a></td>");
		htmls.push("<tr>");
		
		$('.moretr:last').after(htmls.join(' '));
		
	})
	
});

//	移除
function removes(obj){
	$(obj).parent('td').parent('tr').remove();
}
</script>


<?php 
templates('global','footer');
?>
