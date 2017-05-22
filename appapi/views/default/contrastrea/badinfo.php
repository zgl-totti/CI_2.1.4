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
				<form action="<?php echo site_url('contrastrea/badinfo')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td colspan='4' style='background:#64acd6;'>基本信息</td>
						</tr>
						
						<tr>
							<td>姓名</td>
							<td>
								<input type='text' name='pname' id='pname' value='<?php echo $info['pname'];?>' class="validate[required]" placeholder="姓名" data-errormessage-value-missing="姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>性别</td>
							<td>
								<label><input type='radio' name='sex' value='1' <?php if(isset($data['sex']) && $data['sex'] == 1){ echo 'checked';}?>/> 男 </label>
								<label><input type='radio' name='sex' value='2' <?php if(isset($data['sex']) && $data['sex'] == 2){ echo 'checked';}?>/> 女 </label>
							</td>
						</tr>
						
						<tr>
							<td>出生日期</td>
							<td>
								<input type='text' name='birthday' id='birthday' value='<?php if(isset($data['birthday']) && $data['birthday'] ){ echo date('Y-m-d',$data['birthday']);}?>' data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>民族</td>
							<td>
								<label><input type='radio' name='nation' value='汉族' <?php if(isset($data['nation']) && $data['nation'] == '汉族'){ echo 'checked';}?>/> 汉族 </label>
								<label><input type='radio' name='nation' value='其他' <?php if(isset($data['nation']) && $data['nation'] == '其他'){ echo 'checked';}?>/> 其他 </label>
							</td>
						</tr>
						
						<tr>
							<td>婚姻</td>
							<td colspan='3'>
								<label><input type='radio' name='marriage' value='未' <?php if(isset($data['marriage']) && $data['marriage'] == '未'){ echo 'checked';}?>/> 未  </label>
								<label><input type='radio' name='marriage' value='已' <?php if(isset($data['marriage']) && $data['marriage'] == '已'){ echo 'checked';}?>/> 已 </label>
								<label><input type='radio' name='marriage' value='离' <?php if(isset($data['marriage']) && $data['marriage'] == '离'){ echo 'checked';}?>/> 离 </label>
								<label><input type='radio' name='marriage' value='丧' <?php if(isset($data['marriage']) && $data['marriage'] == '丧'){ echo 'checked';}?>/> 丧 </label>
								<label><input type='radio' name='marriage' value='其他' <?php if(isset($data['marriage']) && $data['marriage'] == '其他'){ echo 'checked';}?>/> 其他 </label>
							</td>
						</tr>
						
						<tr>
							<td>职业</td>
							<td>
								<input type='text' name='job' id='job' value='<?php if(isset($data['job']) && $data['job']){echo $data['job'];}?>' placeholder="职业" data-errormessage-value-missing="职业"  data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							
							<td colspan='2'>
								电话：<input type='text' name='tel' id='tel' value='<?php if(isset($data['tel']) && $data['tel']){echo $data['tel'];}?>' placeholder="电话" data-errormessage-value-missing="电话"  data-prompt-position="bottomLeft:3" autocomplete= "off"/>
								手机：<input type='text' name='mobile' id='mobile' value='<?php if(isset($data['mobile']) && $data['mobile']){echo $data['mobile'];}?>' placeholder="手机" data-errormessage-value-missing="手机"  data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
						<tr>
							<td>教育程度</td>
							<td>
								<input type='text' name='edu' id='edu' value='<?php if(isset($data['edu']) && $data['edu']){echo $data['edu'];}?>' placeholder="教育程度" data-errormessage-value-missing="教育程度"  data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							
							<td colspan='2'>
								身高：<input type='text' name='height' id='height' value='<?php if(isset($data['height']) && $data['height']){echo $data['height'];}?>' placeholder="身高" data-errormessage-value-missing="身高"  data-prompt-position="bottomLeft:3" autocomplete= "off"/> cm
								体重：<input type='text' name='weight' id='weight' value='<?php if(isset($data['weight']) && $data['weight']){echo $data['weight'];}?>' placeholder="体重" data-errormessage-value-missing="体重"  data-prompt-position="bottomLeft:3" autocomplete= "off"/> Kg
							</td>
						</tr>
						<tr>
							<td>医疗费用方式</td>
							<td colspan='3'>
								<label><input type='radio' name='cost' value='公费' <?php if(isset($data['cost']) && $data['cost'] == '公费'){ echo 'checked';}?>/> 公费  </label>
								<label><input type='radio' name='cost' value='医保' <?php if(isset($data['cost']) && $data['cost'] == '医保'){ echo 'checked';}?>/> 医保  </label>
								<label><input type='radio' name='cost' value='自费' <?php if(isset($data['cost']) && $data['cost'] == '自费'){ echo 'checked';}?>/> 自费  </label>
								<label><input type='radio' name='cost' value='其他' <?php if(isset($data['cost']) && $data['cost'] == '其他'){ echo 'checked';}?>/> 其他  </label>
							</td>
						</tr>
						
						
						<tr>
							<td colspan='4' style='background:#64acd6;'>即往史</td>
						</tr>
						
						<tr>
							<td>传染病、外伤、手术史 </td>
							<td colspan='3'>
								<label>
									<input type='radio' name='itshistory' class='itshistory' value='1' <?php if(isset($data['itshistory']) && $data['itshistory'] == '1'){ echo 'checked';}?>/> 否  
								</label>
								<label>
									<input type='radio' name='itshistory' class='itshistory' value='2' <?php if(isset($data['itshistory']) && $data['itshistory'] == '2'){ echo 'checked';}?>/> 是  
								</label>
								
								<div class='itshistorydiv' <?php if( !(isset($data['itshistory']) && $data['itshistory'] == '2') || !$data ){?>style='display:none;'<?php } ?>>
									<input type='text' name='itshistoryother' id='itshistoryother' value='<?php if(isset($data['itshistoryother']) && $data['itshistoryother']){echo $data['itshistoryother'];}?>'/>
								</div>
							</td>
						</tr>
						
						<tr>
							<td>食品药品过敏史 </td>
							<td colspan='3'>
								<label><input type='radio' name='fdhistory' class='fdhistory' value='1' <?php if(isset($data['fdhistory']) && $data['fdhistory'] == '1'){ echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='fdhistory' class='fdhistory' value='2' <?php if(isset($data['fdhistory']) && $data['fdhistory'] == '2'){ echo 'checked';}?>/> 是  </label>
								
								<div class='fdhistorydiv' <?php if( !(isset($data['fdhistory']) && $data['fdhistory'] == '2') || !$data ){?>style='display:none;'<?php } ?>>
									过敏原：<input type='text' name='allergen' id='allergen'  value='<?php if(isset($data['allergen']) && $data['allergen']){echo $data['allergen'];}?>'/>
									临床表现：<input type='text' name='clinical' id='clinical' value='<?php if(isset($data['clinical']) && $data['clinical']){echo $data['clinical'];}?>'/>
								</div>
							</td>
						</tr>
						
						<tr>
							<td>过敏性疾病史  </td>
							<td colspan='3'>
								<label>
									<input type='radio' name='hadiseases' class='hadiseases' value='1' <?php if(isset($data['hadiseases']) && $data['hadiseases'] == '1'){ echo 'checked';}?>/> 否  
								</label>
								<label>
									<input type='radio' name='hadiseases' class='hadiseases' value='2' <?php if(isset($data['hadiseases']) && $data['hadiseases'] == '2'){ echo 'checked';}?>/> 是  
								</label>
								
								
								<div class='hadiseasesdiv' <?php if( !(isset($data['hadiseases']) && $data['hadiseases'] == '2') || !$data ){?>style='display:none;'<?php } ?> >
									<label>
										<input type='radio' name='hadiseasesyes' class='hadiseasesyes' value='过敏性鼻炎' <?php if(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '过敏性鼻炎'){ echo 'checked';}?>/> 过敏性鼻炎  
									</label>
									
									<label>
										<input type='radio' name='hadiseasesyes' class='hadiseasesyes' value='过敏性哮喘' <?php if(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '过敏性哮喘'){ echo 'checked';}?>/> 过敏性哮喘  
									</label>
									<label>
										<input type='radio' name='hadiseasesyes' class='hadiseasesyes' value='湿疹' <?php if(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '湿疹'){ echo 'checked';}?> /> 湿疹  
									</label>
									<label>
										<input type='radio' name='hadiseasesyes' class='hadiseasesyes' value='不明原因皮肤风团' <?php if(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '不明原因皮肤风团'){ echo 'checked';}?>/> 不明原因皮肤风团  
									</label>
									<label>
										<input type='radio' name='hadiseasesyes' class='hadiseasesyes' value='其他' <?php if(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '其他'){ echo 'checked';}?>/> 其他  
									</label>
									
									<div class='hadiseasesyesdiv' <?php if( !(isset($data['hadiseasesyes']) && $data['hadiseasesyes'] == '其他') || !$data ){?>style='display:none;'<?php } ?>  >
										<input type='text' name='hadiseasesyo' id='hadiseasesyo' value='<?php if(isset($data['hadiseasesyo']) && $data['hadiseasesyo']){echo $data['hadiseasesyo'];}?>'/>
									</div>
								</div>
							</td>
						</tr>
						
						
						<tr>
							<td>其他疾病 </td>
							<td colspan='3'>
								<label><input type='radio' name='otherdiseases' class='otherdiseases' value='1' <?php if(isset($data['otherdiseases']) && $data['otherdiseases'] == '1'){ echo 'checked';}?>/> 否  </label>
								<label><input type='radio' name='otherdiseases' class='otherdiseases' value='2' <?php if(isset($data['otherdiseases']) && $data['otherdiseases'] == '2'){ echo 'checked';}?>/> 是  </label>
							
							
								<div class='otherdiseasesdiv' <?php if( !(isset($data['hadiseases']) && $data['hadiseases'] == '2') || !$data ){?>style='display:none;margin-left:30px;'<?php } ?>>
									<?php
										if($data && $data['otherdisshow'] && is_array($data['otherdisshow'])){
											
											foreach($data['otherdisshow'] AS $o => $ov){
									?>
									<div class='otherdiseasescon' >
										
										疾病名称:<input type='text' name='otherdisshow[]' class='otherdisshowname' value='<?php echo $ov;?>'/>
										
										用药:<input type='text' name='otherdisdrug[]' class='otherdisdrug' value='<?php echo isset($data['otherdisdrug'][$o]) ? $data['otherdisdrug'][$o] : '';?>'/>
										
										<?php if($o == 0){?>
										<a href='javascript:;' id='otherdisshowmore'>+</a>
										<?php } ?>
									</div>
									<?php
											}
										}else{
									?>
									<div class='otherdiseasescon' >
										疾病名称:<input type='text' name='otherdisshow[]' class='otherdisshowname' value=''/>
										
										用药:<input type='text' name='otherdisdrug[]' class='otherdisdrug' value=''/>
									</div>
									<?php
										}
									?>
								</div>
							</td>
						</tr>
						
						
						<tr>
							<td colspan='4' style='background:#64acd6;'>个人史</td>
						</tr>
						
						<tr>
							<td>是否吸烟  </td>
							<td colspan='3'>
								<label><input type='radio' name='smoking' class='smoking' value='1' <?php if(isset($data['smoking']) && $data['smoking'] == '1'){ echo 'checked';}?>/> 否 </label>
								<label><input type='radio' name='smoking' class='smoking' value='2' <?php if(isset($data['smoking']) && $data['smoking'] == '2'){ echo 'checked';}?>/> 是 </label>
								
								<div class='smokingdiv' <?php if( !(isset($data['smoking']) && $data['smoking'] == '2') || !$data ){?>style='display:none;'<?php } ?>>
									<label>
										<input type='radio' name='smokingyes' class='smokingyes' value='偶尔' <?php if(isset($data['smokingyes']) && $data['smokingyes'] == '偶尔'){ echo 'checked';}?>/> 偶尔  
									</label>
									<label>
										<input type='radio' name='smokingyes' class='smokingyes' value='经常' <?php if(isset($data['smokingyes']) && $data['smokingyes'] == '经常'){ echo 'checked';}?>/> 经常  ,约 <input type='text' name='smokingyear' class='smokingyear' size='5' value='<?php echo isset($data['smokingyear']) ? $data['smokingyear'] : '';?>'/> 年，平均每日 <input type='text' name='smokingnum' class='smokingnum' size='5' value='<?php echo isset($data['smokingnum']) ? $data['smokingyear'] : '';?>'/> 支
									</label>
									
									<label>
										<input type='radio' name='smokingyes' class='smokingyes' value='未戒烟' <?php if(isset($data['smokingyes']) && $data['smokingyes'] == '未戒烟'){ echo 'checked';}?>/> 未戒烟  
									</label>
									
									<label>
										<input type='radio' name='smokingyes' class='smokingyes' value='已戒' <?php if(isset($data['smokingyes']) && $data['smokingyes'] == '已戒'){ echo 'checked';}?>/> 已戒  ,约 <input type='text' name='nosmoking' class='nosmoking' size='5' value='<?php echo isset($data['nosmoking']) ? $data['nosmoking'] : '';?>'/> 年
									</label>
								</div>
							</td>
						</tr>
						
						<tr>
							<td>是否喝酒</td>
							<td colspan='3'>
								<label><input type='radio' name='drink' class='drink' value='1' <?php if(isset($data['drink']) && $data['drink'] == '1'){ echo 'checked';}?>/> 否 </label>
								<label><input type='radio' name='drink' class='drink' value='2' <?php if(isset($data['drink']) && $data['drink'] == '2'){ echo 'checked';}?>/> 是 </label>
							
							
								<div class='drinkdiv' <?php if( !(isset($data['drink']) && $data['drink'] == '2') || !$data ){?>style='display:none;'<?php } ?>>
									<label>
										<input type='radio' name='drinkyes' class='drinkyes' value='偶尔' <?php if(isset($data['drinkyes']) && $data['drinkyes'] == '偶尔'){ echo 'checked';}?>/> 偶尔  
									</label>
									<label>
										<input type='radio' name='drinkyes' class='drinkyes' value='经常' <?php if(isset($data['drinkyes']) && $data['drinkyes'] == '经常'){ echo 'checked';}?>/> 经常 
									</label>
									
									<label>
										<input type='radio' name='drinkyes' class='drinkyes' value='已戒' <?php if(isset($data['drinkyes']) && $data['drinkyes'] == '已戒'){ echo 'checked';}?>/> 已戒
									</label>
								</div>
							</td>
						</tr>
						
						<tr>
							<td>是否体育锻炼</td>
							<td colspan='3'>
								<label><input type='radio' name='exercise' class='exercise' value='否' <?php if(isset($data['exercise']) && $data['exercise'] == '否'){ echo 'checked';}?>/> 否 </label>
								<label><input type='radio' name='exercise' class='exercise' value='偶尔' <?php if(isset($data['exercise']) && $data['exercise'] == '偶尔'){ echo 'checked';}?>/> 偶尔 </label>
								<label><input type='radio' name='exercise' class='exercise' value='经常' <?php if(isset($data['exercise']) && $data['exercise'] == '经常'){ echo 'checked';}?>/> 经常：
								</label>
							
								<input type='text' name='exerciseshow' class='exerciseshow' size='5' value='<?php echo isset($data['exerciseshow']) ? $data['exerciseshow'] : '';?>'/> 次/周
							</td>
						</tr>
						
						
						<tr>
							<td colspan='2'>
								入院时间：<input type='text' name='itime' id='itime' value='<?php echo isset($data['itime']) && $data['itime'] ? date('Y-m-d H:i:s',$data['itime']) : '';?>'/><br/>
								入院诊断：<input type='text' name='icdiseases' placeholder="中医" data-errormessage-value-missing="中医" value='<?php echo isset($data['icdiseases']) && $data['icdiseases'] ? $data['icdiseases'] : '';?>'/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='iediseases'placeholder="西医" data-errormessage-value-missing="西医" value='<?php echo isset($data['iediseases']) && $data['iediseases'] ? $data['iediseases'] : '';?>'/><br/>
							</td>
							<td colspan='2'>
								出院时间：<input type='text' name='otime' id='otime' value='<?php echo isset($data['otime']) && $data['otime'] ? date('Y-m-d H:i:s',$data['otime']) : '';?>'/><br/>
								出院诊断：<input type='text' name='ocdiseases' placeholder="中医" data-errormessage-value-missing="中医" value='<?php echo isset($data['ocdiseases']) && $data['ocdiseases'] ? $data['ocdiseases'] : '';?>'/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type='text' name='oediseases' placeholder="西医" data-errormessage-value-missing="西医" value='<?php echo isset($data['oediseases']) && $data['oediseases'] ? $data['oediseases'] : '';?>'/><br/>
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
	
	//	传染病、外伤、手术史
	$('.itshistory').click(function(){
		var smval	=	$('.itshistory:checked').val();
		if(smval == 1){
			$('.itshistorydiv').hide();
			$('#itshistoryother').val('');
		}else{
			$('.itshistorydiv').css('display','inline-block');
		}
	})
	//	食品药品过敏史
	$('.fdhistory').click(function(){
		var smval	=	$('.fdhistory:checked').val();
		if(smval == 1){
			$('.fdhistorydiv').hide();
			$('#allergen').val('');
			$('#clinical').val('');
		}else{
			$('.fdhistorydiv').css('display','inline-block');
		}
	})
	//	过敏性疾病史
	$('.hadiseases').click(function(){
		var smval	=	$('.hadiseases:checked').val();
		if(smval == 1){
			$('.hadiseasesdiv').hide();
			$('.hadiseasesyes').attr('checked',false);
		}else{
			$('.hadiseasesdiv').css('display','inline-block');
		}
	})
	$('.hadiseasesyes').click(function(){
		var smval	=	$('.hadiseasesyes:checked').val();
		if(smval == '其他'){
			$('.hadiseasesyesdiv').css('display','inline-block');
		}else{
			$('#hadiseasesyo').val('');
			$('.hadiseasesyesdiv').hide();
		}
	})
	
	//	其他疾病
	$('.otherdiseases').click(function(){
		var smval	=	$('.otherdiseases:checked').val();
		if(smval == 1){
			$('.otherdiseasesdiv').hide();
		}else{
			$('.otherdiseasesdiv').css('display','inline-block');
		}
	})
	
	$('#otherdisshowmore').click(function(){
		var othername	=	$('.otherdisshowname:last').val();
		if( !othername ){
			return false;
		}
		
		var htmls	=	new Array();
			
		htmls.push("<div class='otherdiseasescon' style=''>");
		htmls.push("疾病名称:<input type='text' name='otherdisshow[]' class='otherdisshowname' />");
		htmls.push("用药:<input type='text' name='otherdisdrug[]' class='otherdisdrug' />");
		htmls.push("</div>");
		
		$('.otherdiseasescon:last').after(htmls.join(' '));
	})
	
	//	是否吸烟
	$('.smoking').click(function(){
		var smval	=	$('.smoking:checked').val();
		if(smval == 1){
			$('.smokingdiv').hide();
		}else{
			$('.smokingdiv').css('display','block');
		}
	})
	
	//	是否喝酒
	$('.drink').click(function(){
		var smval	=	$('.drink:checked').val();
		if(smval == 1){
			$('.drinkdiv').hide();
		}else{
			$('.drinkdiv').css('display','block');
		}
	})
	
	//	是否体育锻炼
	
	//	日期格式
	var birthday = {
	    elem: '#birthday',
	    format: 'YYYY-MM-DD',
		max: '2099-06-16 23:59:59'
	};
	laydate(birthday);
	
	var itime = {
	    elem: '#itime',
	    format: 'YYYY-MM-DD  hh:mm:ss',
		max: '2099-06-16 23:59:59',
	    istime: true,
	    istoday: false,
	    choose: function(datas){
	      //  start.max = datas; //结束日选好后，重置开始日的最大日期
	    }
	};
	laydate(itime);
	
	var otime = {
	    elem: '#otime',
	    format: 'YYYY-MM-DD  hh:mm:ss',
		max: '2099-06-16 23:59:59',
	    istime: true,
	    istoday: false,
	    choose: function(datas){
	      //  start.max = datas; //结束日选好后，重置开始日的最大日期
	    }
	};
	laydate(otime);
});
</script>


<?php 
templates('global','footer');
?>
