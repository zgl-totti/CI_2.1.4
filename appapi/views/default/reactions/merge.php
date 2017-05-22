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
				<form action="<?php echo site_url('reactions/merge')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td width='200'>是否有合并其他用药</td>
							<td>
								<label><input type='radio' name='ismerge' class='ismerge' value='1' <?php if(isset($data) && $data['ismerge'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='ismerge' class='ismerge' value='2' <?php if(isset($data) && $data['ismerge'] == 2){echo 'checked';}?>/> 是  </label>
							</td>
							
						</tr>
						<tr>
							<td>是否合并其他注射液</td>
							<td>
								<label>
									<input type='radio' name='isinjection' class='isinjection' value='1' <?php if(isset($data) && $data['isinjection'] == 1){echo 'checked';}?>/> 否  
								</label>
								<label>
									<input type='radio' name='isinjection' class='isinjection' value='2' <?php if(isset($data) && $data['isinjection'] == 2){echo 'checked';}?>/> 是  
								</label>
							</td>
						</tr>
						
						<tr>
							<td>是否合并其他中药注射液</td>
							<td>
								<label><input type='radio' name='cmedicine' class='cmedicine' value='1' <?php if(isset($data) && $data['cmedicine'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='cmedicine' class='cmedicine' value='2' <?php if(isset($data) && $data['cmedicine'] == 2){echo 'checked';}?>/> 是  </label>
							
								<div class='cmedicinediv' <?php if( !(isset($data['cmedicine']) && $data['cmedicine'] == '2') || !$data ){?>style='display:none;margin-left:10px;'<?php } ?>>
									<label>
										<input type='radio' name='medtype' class='medtype' value='红花类' <?php if(isset($data) && $data['medtype'] == '红花类'){echo 'checked';}?>/> 红花类  
									</label>
									<label>
										<input type='radio' name='medtype' class='medtype' value='丹参类' <?php if(isset($data) && $data['medtype'] == '丹参类'){echo 'checked';}?>/> 丹参类  
									</label>
									<label>
										<input type='radio' name='medtype' class='medtype' value='三七类' <?php if(isset($data) && $data['medtype'] == '三七类'){echo 'checked';}?>/> 三七类  
									</label>
									<label>
										<input type='radio' name='medtype' class='medtype' value='银杏类' <?php if(isset($data) && $data['medtype'] == '银杏类'){echo 'checked';}?>/> 银杏类  
									</label>
									<label>
										<input type='radio' name='medtype' class='medtype' value='其他' <?php if(isset($data) && $data['medtype'] == '其他'){echo 'checked';}?>/> 其他  
									</label>
									
									<div class='medtypediv' <?php if( !(isset($data['medtype']) && $data['medtype'] == '其他') || !$data ){?>style='display:none;'<?php } ?>>
										药品名称、用法用量：<input type='text' name='medtypeuse' id='medtypeuse' value='<?php if(isset($data['medtypeuse'])){echo $data['medtypeuse'];}?>'/>
									</div>
								</div>
							</td>
						</tr>
						
						<tr>
							<td>是否合并抗血小板药</td>
							<td>
								<label><input type='radio' name='platelet' class='platelet' value='1' <?php if(isset($data) && $data['platelet'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='platelet' class='platelet' value='2' <?php if(isset($data) && $data['platelet'] == 2){echo 'checked';}?>/> 是  </label>
							
								<div class='plateletdiv' <?php if( !(isset($data['platelet']) && $data['platelet'] == '2') || !$data ){?>style='display:none;margin-left:10px;'<?php } ?>>
									<label>
										<input type='radio' name='platelettype' class='platelettype' value='阿司匹林'  <?php if(isset($data) && $data['platelettype'] == '阿司匹林'){echo 'checked';}?>/> 阿司匹林  
									</label>
									<label>
										<input type='radio' name='platelettype' class='platelettype' value='氯吡格雷'  <?php if(isset($data) && $data['platelettype'] == '氯吡格雷'){echo 'checked';}?>/> 氯吡格雷  
									</label>
									<label>
										<input type='radio' name='platelettype' class='platelettype' value='奥扎格雷'  <?php if(isset($data) && $data['platelettype'] == '奥扎格雷'){echo 'checked';}?>/> 奥扎格雷   
									</label>
									
									<label>
										<input type='radio' name='platelettype' class='platelettype' value='其他'  <?php if(isset($data) && $data['platelettype'] == '其他'){echo 'checked';}?>/> 其他  
									</label>
									<div class='platelettypediv' <?php if( !(isset($data['platelettype']) && $data['platelettype'] == '其他') || !$data ){?>style='display:none;'<?php } ?>>
										药品名称、用法用量：<input type='text' name='plateletuse' id='plateletuse' value='<?php if(isset($data['plateletuse'])){echo $data['plateletuse'];}?>'/>
									</div>
									
								</div>
							</td>
						</tr>
						
						
						<tr>
							<td>是否合并抗凝药</td>
							<td>
								<label><input type='radio' name='anticoagulant' class='anticoagulant' value='1' <?php if(isset($data) && $data['anticoagulant'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='anticoagulant' class='anticoagulant' value='2' <?php if(isset($data) && $data['anticoagulant'] == 2){echo 'checked';}?>/> 是  </label>
							
								<div class='anticoagulantdiv' <?php if( !(isset($data['anticoagulant']) && $data['anticoagulant'] == '2') || !$data ){?>style='display:none;margin-left:10px;'<?php } ?>>
									<label>
										<input type='radio' name='antitype' class='antitype' value='肝素/依诺肝素' <?php if(isset($data) && $data['antitype'] == '肝素/依诺肝素'){echo 'checked';}?>/> 肝素/依诺肝素  
									</label>
									
									<label>
										<input type='radio' name='antitype' class='antitype' value='华法林' <?php if(isset($data) && $data['antitype'] == '华法林'){echo 'checked';}?>/> 华法林  
									</label>
									
									<label>
										<input type='radio' name='antitype' class='antitype' value='阿加曲班' <?php if(isset($data) && $data['antitype'] == '华法林'){echo 'checked';}?>/> 阿加曲班  
									</label>
									
									<label>
										<input type='radio' name='antitype' class='antitype' value='其他' <?php if(isset($data) && $data['antitype'] == '其他'){echo 'checked';}?>/> 其他  
									</label>
									<div class='antitypediv' <?php if( !(isset($data['antitype']) && $data['antitype'] == '其他') || !$data ){?>style='display:none;'<?php } ?>>
										药品名称、用法用量：<input type='text' name='antitypeuse' id='antitypeuse' value='<?php if(isset($data['antitypeuse'])){echo $data['antitypeuse'];}?>'/>
									</div>
									
								</div>
							</td>
						</tr>
						<tr>
							<td>是否合并头孢类抗菌药</td>
							<td>
								<label><input type='radio' name='cepha' class='cepha' value='1' <?php if(isset($data) && $data['cepha'] == 1){echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='cepha' class='cepha' value='2' <?php if(isset($data) && $data['cepha'] == 2){echo 'checked';}?>/> 是  </label>
							
								<div class='cephadiv' <?php if( !(isset($data['cepha']) && $data['cepha'] == '2') || !$data ){?>style='display:none;margin-left:10px;'<?php } ?>>
									<label>
										<input type='radio' name='cephatype' class='cephatype' value='头孢拉定' <?php if(isset($data) && $data['cephatype'] == '头孢拉定'){echo 'checked';}?>/> 头孢拉定  
									</label>
									<label>
										<input type='radio' name='cephatype' class='cephatype' value='头孢呋辛' <?php if(isset($data) && $data['cephatype'] == '头孢呋辛'){echo 'checked';}?>/> 头孢呋辛  
									</label>
									<label>
										<input type='radio' name='cephatype' class='cephatype' value='头孢噻肟' <?php if(isset($data) && $data['cephatype'] == '头孢噻肟'){echo 'checked';}?>/> 头孢噻肟  
									</label>
									<label>
										<input type='radio' name='cephatype' class='cephatype' value='头孢克肟' <?php if(isset($data) && $data['cephatype'] == '头孢克肟'){echo 'checked';}?>/> 头孢克肟  
									</label>
									<label>
										<input type='radio' name='cephatype' class='cephatype' value='其他' <?php if(isset($data) && $data['cephatype'] == '其他'){echo 'checked';}?>/> 其他  
									</label>
									
									<div class='cephatypediv' <?php if( !(isset($data['cephatype']) && $data['cephatype'] == '其他') || !$data ){?>style='display:none;'<?php } ?>>
										药品名称、用法用量：<input type='text' name='cephause' id='cephause' value='<?php if(isset($data['cephause'])){echo $data['cephause'];}?>'/>
									</div>
								</div>
							</td>
						</tr>
						
					</table>
					
					
					<table class='table-cont' width="100%">
						<tr>
							<th>开始日期</th>
							<th>药品或治疗措施</th>
							<th>用法用量</th>
							<th>结束日期</th>
							<th>使用原因</th>
							<th></th>
						</tr>
						
						<?php
							if(isset($data) && $data['content_date'] && is_array($data['content_date'])){
								foreach($data['content_date'] AS $k => $v){
						?>
						<tr class='moretr'>
							<td>
								<input type='text' name='content_date[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})" value='<?php echo $v;?>'/>
							</td>
							
							<td>
								<input type='text' name='content_measures[]' size='15' value='<?php if(isset($data['content_measures'][$k]) && $data['content_measures'][$k]){echo $data['content_measures'][$k];}?>'/>
							</td>
							<td>
								<input type='text' name='content_use[]' size='10' value='<?php if(isset($data['content_use'][$k]) && $data['content_use'][$k]){echo $data['content_use'][$k];}?>'/>
							</td>
							<td>
								<input type='text' name='content_etime[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})" value='<?php if(isset($data['content_etime'][$k]) && $data['content_etime'][$k]){echo $data['content_etime'][$k];}?>'/>
							</td>
							<td>
								<input type='text' name='content_reasion[]' size='10' value='<?php if(isset($data['content_reasion'][$k]) && $data['content_reasion'][$k]){echo $data['content_reasion'][$k];}?>'/>
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
						</tr>
						<?php
								}
							}else{
						?>
						
						<tr class='moretr'>
							<td><input type='text' name='content_date[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})"/></td>
							<td><input type='text' name='content_measures[]' size='15' /></td>
							<td><input type='text' name='content_use[]' size='10' /></td>
							<td><input type='text' name='content_etime[]' size='10' class='dates' onclick="laydate({format: 'YYYY-MM-DD'})"/></td>
							<td><input type='text' name='content_reasion[]' size='10' /></td>
							<td><a href='javascript:;' class='addmore'>+</a></td>
						</tr>
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
	
	
	//	是否合并其他中药注射液
	$('.cmedicine').click(function(){
		var smval	=	$('.cmedicine:checked').val();
		if(smval == 1){
			$('.cmedicinediv').hide();
		}else{
			$('.cmedicinediv').css('display','inline-block');
		}
	})
	//	是否合并其他中药注射液 其他
	$('.medtype').click(function(){
		var smval	=	$('.medtype:checked').val();
		if(smval == '其他'){
			$('.medtypediv').css('display','inline-block');
		}else{
			$('.medtypediv').hide();
		}
	})
	
	//	
	$('.platelet').click(function(){
		var smval	=	$('.platelet:checked').val();
		if(smval == 1){
			$('.plateletdiv').hide();
		}else{
			$('.plateletdiv').css('display','inline-block');
		}
	})
	//	 其他
	$('.platelettype').click(function(){
		var smval	=	$('.platelettype:checked').val();
		if(smval == '其他'){
			$('.platelettypediv').css('display','inline-block');
		}else{
			$('.platelettypediv').hide();
		}
	})
	
	//	
	$('.anticoagulant').click(function(){
		var smval	=	$('.anticoagulant:checked').val();
		if(smval == 1){
			$('.anticoagulantdiv').hide();
		}else{
			$('.anticoagulantdiv').css('display','inline-block');
		}
	})
	//	 其他
	$('.antitype').click(function(){
		var smval	=	$('.antitype:checked').val();
		if(smval == '其他'){
			$('.antitypediv').css('display','inline-block');
		}else{
			$('.antitypediv').hide();
		}
	})
	
	//	
	$('.cepha').click(function(){
		var smval	=	$('.cepha:checked').val();
		if(smval == 1){
			$('.cephadiv').hide();
		}else{
			$('.cephadiv').css('display','inline-block');
		}
	})
	//	 其他
	$('.cephatype').click(function(){
		var smval	=	$('.cephatype:checked').val();
		if(smval == '其他'){
			$('.cephatypediv').css('display','inline-block');
		}else{
			$('.cephatypediv').hide();
		}
	})
	
	
	
	//	添加更多
	$('.addmore').click(function(){
		var htmls	=	new Array();
		htmls.push("<tr class='moretr'>");
		htmls.push("<td><input type='text' name='content_date[]' size='10' class='dates' onclick=\"laydate({format: 'YYYY-MM-DD'})\"/></td>");
		htmls.push("<td><input type='text' name='content_measures[]' size='15' /></td>");
		htmls.push("<td><input type='text' name='content_use[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='content_etime[]' size='10' class='dates' onclick=\"laydate({format: 'YYYY-MM-DD'})\"/></td>");
		htmls.push("<td><input type='text' name='content_reasion[]' size='10' /></td>");
		htmls.push("<td><a href='javascript:;' onclick='removes(this)'>-</a></td>");
		htmls.push("</tr>");
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
