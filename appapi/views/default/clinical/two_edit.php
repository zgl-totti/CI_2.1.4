<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>

<link rel="stylesheet" href="<?php echo base_url('statics/global/style/patients.css');?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>
<div class="main-board">
	<?php
		templates('home','left');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			<div class="item-list managepa">
				<form action="<?php echo site_url('clinical/two_edit')?>" method="post" id='formID'>
				<input type='hidden' name='clinicalid' value='<?php echo $info['id'];?>' />                       
					<table class='table-cont' width="100%">
                        <tr>
                                                    <td style="font-size:18px; background:#64acd6;" colspan='4'><b>基本信息</b></td>
						</tr>
                        <tr>
							<td width = '250'>医院号</td>
							<td width = '300' >
							<input type='text' name='hunmber' id='hunmber' value='<?php echo $info['hunmber'];?>' class="validate[required]" placeholder="医院号" data-errormessage-value-missing="请输入医院号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td width = '250'>病例号</td>
							<td width = '300'>
							<input type='text' name='cnumber' id='cnumber' value='<?php echo $info['cnumber'];?>' class="validate[required]" placeholder="病例号" data-errormessage-value-missing="请输入病例号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>                       
						</tr>
						<tr>
							<td>患者名</td>
							<td>
							<input type='text' name='name' id='name' value='<?php echo $info['name'];?>' class="validate[required]" placeholder="姓名" data-errormessage-value-missing="请输入姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>科室号</td>
							<td>
							<input type='text' name='subject' id='subject' value='<?php echo $info['subject'];?>' class="validate[required]" placeholder="科室号" data-errormessage-value-missing="请输入科室号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>   
						</tr>
						<tr>
							<td>住院号</td>
							<td>
							<input type='text' name='inumber' id='inumber' value='<?php echo $info['inumber'];?>' class="validate[required]" placeholder="住院号" data-errormessage-value-missing="请输入住院号" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>性别</td>
							<td>
								<input type='radio' name='sex' value="1" id="sex_1" class='sex validate[required]' <?php if($info['sex'] == 1){echo 'checked';}?> />
								<label for="sex_1">男</label>
								
								<input type='radio' name='sex' value="2" id="sex_2" class='sex validate[required]' <?php if($info['sex'] == 2){echo 'checked';}?>/>
								<label for="sex_2">女</label>
							</td>
						</tr>
						<tr>
							<td>患者年龄</td>
							<td colspan='3'>
							<input type='text' name='age' id='age' value='<?php echo $info['age'];?>' class="validate[required]" placeholder="年龄" data-errormessage-value-missing="请输入年龄" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
													<td style="font-size:18px; background:#64acd6;" colspan='4'><b>第一部分：</b> 病史</td>
						</tr>
						<tr>
							<td>发病时间</td>
							<td>
							<input type='text' name='ftime' id='ftime' value='<?php echo date('Y-m-d',$info['ftime']);?>' class="validate[required]" placeholder="发病时间" data-errormessage-value-missing="请输入发病时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>起始治疗时间</td>
							<td>
							<input type='text' name='btime' id='btime' value='<?php echo date('Y-m-d',$info['btime']);?>' class="validate[required]"  placeholder="起始治疗时间" data-errormessage-value-missing="请输入起始治疗时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>

                        <tr>
							<td>主诉</td>
							<td colspan='3'>
							<input type='text' name='mainsuit' id='mainsuit' value='<?php echo $info['mainsuit'];?>' class="validate[required]" placeholder="主诉" style="width:550px;" data-errormessage-value-missing="请输入主诉" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>        
						</tr>
						<tr>
							<td>西医诊断</td>
							<td colspan='3'>
							<textarea name="wmedicine" rows="5" cols="76"><?php echo $info['wmedicine'];?></textarea>
							</td>        
						</tr>
						<tr>
							<td>中医诊断</td>
							<td colspan='3'>
							<textarea name="cmedicine" rows="5" cols="76"><?php echo $info['cmedicine'];?></textarea>
							</td>        
						</tr>
						<tr>
										<td>判断过敏史</td>
                                        <td colspan='3'>									
											<select  tabindex="1" name="allergy" id="allergy">
											
												<option value="0" <?php if($info['allergy'] == 0){echo "selected = 'selected'";} ?>>未知</option>

												<option value="1" <?php if($info['allergy'] == 1){echo "selected = 'selected'";} ?>>有</option>
												
												<option value="2" <?php if($info['allergy'] == 2){echo "selected = 'selected'";} ?>>无</option>
										
											</select>
										</td>
						</tr>

                        <tbody id = "gdrug" <?php if( !( isset($info['allergy']) && $info['allergy'] == 1) ) {?>style='display:none;'<?php } ?>>
												<?php
                                                    if($info['gdrugname']){
                                                        foreach ($info['gdrugname'] AS $ck => $cv){
                                                ?>
												<tr class='othergdrugtd'>
													<td colspan='4'>
														<input type='text' name='gdrugname[]' class="gdrugname" placeholder="怀疑过敏药品名称" style="width:500px;" value='<?php echo $info['gdrugname'][$ck];?>' autocomplete= "off"  />
																<?php
                                                                    if($ck == 0){
                                                                ?>
																<img src="/statics/default/img/plus.png" class='othergdrug' title='添加' />
                                                                <?php
                                                                    }  else {
                                                                ?>
                                                                <span>
                                                                <img src='/statics/default/img/delete.png' class='imgdels' title='删除' onclick='fungdrug(this)'/>
                                                                </span>
                                                                <?php
                                                                    }
                                                                ?>
                                                        </td>
													</tr>
													
												<?php
                                                        }
                                                    }else{ 
                                                ?>
													<tr class='othergdrugtd'>
														<td colspan='3'>怀疑过敏药品名称：<br>
														
															<input type='text' name='gdrugname[]' class="gdrugname" placeholder="怀疑过敏药品名称" style="width:500px;" autocomplete= "off"  />
															
															<img src="/statics/default/img/plus.png" class='othergdrug' title='添加' />
														</td>
													</tr>
                                                <?php
                                                    }
                                                ?>
							
						</tbody>                      
                        <tr>
													<td style="font-size:18px; background:#64acd6;" colspan='4'><b> 第二部分 </b>用药前凝血四项</td>  
						</tr>
						<tr>
							<td>凝血酶时间</td>
							<td>
							<input type='text' name='thrombin' id='thrombin' value='<?php echo $info['thrombin'];?>' class="validate[required]" placeholder="凝血酶时间" data-errormessage-value-missing="请输入凝血酶时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td> 
							<td>凝血酶原时间</td>
							<td>
							<input type='text' name='prothrombin' id='prothrombin' value='<?php echo $info['prothrombin'];?>' class="validate[required]" placeholder="凝血酶原时间" data-errormessage-value-missing="请输入凝血酶原时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td> 
						</tr>
						<tr>
							<td>部分凝血活酶时间</td>
							<td>
							<input type='text' name='ptime' id='ptime' value='<?php echo $info['ptime'];?>' class="validate[required]" placeholder="部分凝血活酶时间" data-errormessage-value-missing="请输入部分凝血活酶时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td> 
							<td>纤维蛋白原量</td>
							<td>
							<input type='text' name='prothrombin' id='prothrombin' value='<?php echo $info['fibrinogen'];?>' class="validate[required]" placeholder="纤维蛋白原量" data-errormessage-value-missing="请输入纤维蛋白原量" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						<tr>
													<td style="font-size:18px; background:#64acd6;" colspan='4'><b> 第三部分 </b>治疗方案</td>
						</tr>
							
                        <tr>
							<td>注射液溶剂</td>
							<td>
								<input type='radio' name='treatmentplan' value="1" id="treatmentplan_1" class='sex validate[required]' <?php if($info['treatmentplan'] == 1){echo 'checked';}?> />
								<label for="treatmentplan_1">250ml葡萄糖</label>
								
								<input type='radio' name='treatmentplan' value="2" id="treatmentplan_2" class='sex validate[required]' <?php if($info['treatmentplan'] == 2){echo 'checked';}?>/>
								<label for="treatmentplan_2">250ml生理盐水</label>
							</td>
							<td>是否每天使用一次</td>
							<td>
								<input type='radio' name='onceday' value="1" id="onceday_1" class='sex validate[required]' <?php if($info['onceday'] == 1){echo 'checked';}?> />
								<label for="onceday_1">是</label>
								
								<input type='radio' name='onceday' value="2" id="onceday_2" class='sex validate[required]' <?php if($info['onceday'] == 2){echo 'checked';}?>/>
								<label for="onceday_2">否</label>
							</td>
						</tr>
							
                        <tr>
							<td>每次使用支数</td>
							<td>
							<input type='text' name='eachcount' id='eachcount' value='<?php echo $info['eachcount'];?>' class="validate[required]" placeholder="每次使用支数" data-errormessage-value-missing="请输入每次使用支数" data-prompt-position="bottomLeft:3" autocomplete= "off"/>支
							</td>
							<td>使用天数</td>
							<td>
							<input type='text' name='usedays' id='usedays' value='<?php echo $info['usedays'];?>' class="validate[required]" placeholder="使用天数" data-errormessage-value-missing="请输入使用天数" data-prompt-position="bottomLeft:3" autocomplete= "off"/>天
							</td>
                        </tr>
						<tr>
										<td>合并用药</td>
                                        <td colspan='3'>									
											<select  tabindex="1" name="otherdrug" id="otherdrug">
											
												<option value="0" <?php if($info['otherdrug'] == 0){echo "selected = 'selected'";} ?>>未知</option>

												<option value="1" <?php if($info['otherdrug'] == 1){echo "selected = 'selected'";} ?>>有</option>
												
												<option value="2" <?php if($info['otherdrug'] == 2){echo "selected = 'selected'";} ?>>无</option>
										
											</select>
											（是否使用银杏内酯注射液的同时使用的其他药品）
										</td>
						</tr>
						 <tbody id = "drugdata" <?php if( !( isset($info['otherdrug']) && $info['otherdrug'] == 1) ) {?>style='display:none;'<?php } ?>>
							 <tr>
								<th>开始时间</th>
								<th>医嘱</th>
								<th>结束时间</th>
								<th>添加多个</th>
							 </tr>
												<?php
                                                    if($info['otherdrugdata']){
                                                        foreach ($info['otherdrugdata'] AS $ck => $cv){
															$other = $cv;
														}
															foreach ($other AS $k => $v){			
                                                ?>
												<tr class='otherdoctortr'>
													<td  style="text-align:center;">
														<input type='text' name='otherfotime[]' id='' class="" placeholder="开始时间"  autocomplete= "off" value="<?php echo $info['otherdrugdata'][$ck][$k];?>"/>
													</td>
													<td  style="text-align:center;">
														<input type='text' name='otherdoctor[]' id='' class='doctor' value='<?php echo $info['otherdrugdata'][$ck][$k];?>'  placeholder="医嘱"  />
													</td>
													<td  style="text-align:center;">
														<input type='text' name='otherbotime[]' id='' class="" placeholder="结束时间"  autocomplete= "off" value="<?php echo $info['otherdrugdata'][$ck][$k];?>"/>
																<?php
                                                                    if($k == 0){
                                                                ?>
																<td  style="text-align:center;">
																<img src="/statics/default/img/plus.png" class='otherdoctor' title='添加' />
																</td>
                                                                <?php
                                                                    }  else {
                                                                ?>
																<td  style="text-align:center;">
                                                                <span>
                                                                <img src='/statics/default/img/delete.png' class='imgdels' title='删除' onclick='fundoctor(this)'/>
                                                                </span>
																</td>
                                                                <?php
                                                                    }
                                                                ?>
                                                       </td>
												     </tr>
												<?php
														
                                                        }
                                                    }else{ 
                                                ?>
												<tr class='otherdoctortr'>
													<td  style="text-align:center;">
														<input type='text' name='otherfotime[]' id='' class="" placeholder="开始时间"  autocomplete= "off" value=""/>
													</td>
													<td  style="text-align:center;">
														<input type='text' name='otherdoctor[]' id='' class='doctor' value=''  placeholder="医嘱"  />
													</td>
													<td  style="text-align:center;">
														<input type='text' name='otherbotime[]' id='' class="" placeholder="结束时间"  autocomplete= "off" value=""/>
													</td>
													<td  style="text-align:center;">
														<img src="/statics/default/img/plus.png" class='otherdoctor' title='添加' />
													</td>
												 </tr>
                                                <?php
                                                    }
                                                ?>
						 </tbody>
						<tr>
													<td style="font-size:18px;" colspan='4'><b> 第四部分 </b>疗效评估</td>  
						</tr>
						 <tr>
								<td colspan='4'>
								<input type='radio' name='evaluation' value="1" id="" class='evaluation' <?php if($info['evaluation'] == 1){echo 'checked';}?>/><label>痊愈：患者症状完全改善，愈后良好</label>&nbsp;&nbsp;&nbsp;
								<input type='radio' name='evaluation' value="2" id="" class='evaluation' <?php if($info['evaluation'] == 2){echo 'checked';}?> /><label>显效：患者大部分症状得到改善</label>&nbsp;&nbsp;&nbsp;
								<input type='radio' name='evaluation' value="3" id="" class='evaluation' <?php if($info['evaluation'] == 3){echo 'checked';}?> /><label>有效：患者部分症状得到改善</label>&nbsp;&nbsp;&nbsp;
								<input type='radio' name='evaluation' value="4" id="" class='evaluation' <?php if($info['evaluation'] == 4){echo 'checked';}?> /><label>无效：患者症状无改善，或加重</label>&nbsp;&nbsp;&nbsp;
								</td>
							 </tr>
						 <tr>
										<td>治疗过程中是否发生不良事件</td>
                                        <td colspan='3'>									
											<select  tabindex="1" name="isbad" id="isbad">
											
												<option value="0" <?php if($info['otherdrug'] == 0){echo "selected = 'selected'";} ?>>未知</option>

												<option value="1" <?php if($info['otherdrug'] == 1){echo "selected = 'selected'";} ?>>是</option>
												
												<option value="2" <?php if($info['otherdrug'] == 2){echo "selected = 'selected'";} ?>>否</option>
										
											</select>
										</td>
						</tr>
						  <tbody id = "badshow" <?php if( !( isset($info['isbad']) && $info['isbad'] == 1) ) {?>style='display:none;'<?php } ?>>
							 
							 <tr>
								<td colspan='4'>
								
								<input type='checkbox' name='badshow[]' value="1" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(1,$info['badshow'])){echo 'checked';}?> /><label>皮肤潮红</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="2" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(2,$info['badshow'])){echo 'checked';}?> /><label>头晕</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="3" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(3,$info['badshow'])){echo 'checked';}?> /><label>皮疹</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="4" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(4,$info['badshow'])){echo 'checked';}?> /><label>胸闷</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="5" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(5,$info['badshow'])){echo 'checked';}?> /><label>静脉炎</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="6" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(6,$info['badshow'])){echo 'checked';}?> /><label>恶心呕吐</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="7" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(7,$info['badshow'])){echo 'checked';}?> /><label>寒战</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="8" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(8,$info['badshow'])){echo 'checked';}?> /><label>发热</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="9" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(9,$info['badshow'])){echo 'checked';}?> /><label>出血</label>&nbsp;&nbsp;
								<input type='checkbox' name='badshow[]' value="10" id="" class='badshow' <?php if(is_array($info['badshow']) && $info['badshow'] && in_array(10,$info['badshow'])){echo 'checked';}?> /><label>其他</label>
								<span id="badshowother"  <?php if( !( isset($info['badshowother']) && $info['badshowother']) ) {?>style='display:none;'<?php } ?>>
                                      <input type='text' name='badshowother' value="<?php echo $info['badshowother'];?>" class='badshowother'/>
                                </span>
								</td>
							 </tr>
						 </tbody>


                        <tr>
							<td>填表人</td>
							<td>
							<input type='text' name='adduser' id='adduser' value='<?php echo $info['adduser'];?>' class="validate[required]" placeholder="填表人" data-errormessage-value-missing="请输入填表人" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							<td>填表时间</td>
							<td>
							<input type='text' name='addusertime' id='addusertime' value="<?php echo date('Y-m-d',$info['addusertime']);?>" class="validate[required]" placeholder="填表时间" data-errormessage-value-missing="请输入填表时间" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>                   
					</table>
					<input type="submit" class="" value="修改" name='dosubmit'/>
					
					<input type="button" name="Submit" onclick="javascript:history.back(-1);" value="返回">
				</form>
			</div><!-- list end -->
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>

<script src="<?php echo base_url('statics/global/js/jquery.validationEngine-zh_CN.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.js');?>" type="text/javascript" charset="utf-8"></script>
<script>
jQuery(document).ready(function(){
	jQuery('#formID').validationEngine({
		autoHidePrompt: true,
		autoHideDelay:'3000'
	});
	var nowDate	=	new Date();
	var nyear	=	nowDate.getFullYear();
	$("#ftime,#btime,#addusertime").manhuaDate({                        
		Event 	: "click",//可选                     
		Left 	: 0,//弹出时间停靠的左边位置
		Top 	: -16,//弹出时间停靠的顶部边位置
		fuhao 	: "-",//日期连接符默认为-
		isTime 	: false,//是否开启时间值默认为false
		beginY 	: 2000,//年份的开始默认为1949
		endY 	: nyear//年份的结束默认为2049
	});
	//过敏史
	$('#allergy').change(function(){
		if($(this).val() == 1){
			$("#gdrug").show();
		}else{
			$("#gdrug").hide();
		};
	});
	//合并用药
	$('#otherdrug').change(function(){
		if($(this).val() == 1){
			$("#drugdata").show();
		}else{
			$("#drugdata").hide();
		};
	});
	//不良反应
	$('#isbad').change(function(){
		if($(this).val() == 1){
			$("#badshow").show();
		}else{
			$("#badshow").hide();
		};
	});

		 //	添加过敏药
		$('.othergdrug').click(function(){
			var othername	=	$('.gdrugname:last').val();
			if( !othername ){
				return false;
			}
			
			var htmls	=	new Array();
			
			htmls.push("<tr class='othergdrugtd'>");
			htmls.push("<td colspan='4'>");
			htmls.push("<input type='text' name='gdrugname[]' class='gdrugname' placeholder='怀疑过敏药品名称' style='width:500px;' autocomplete= 'off'/>");
			htmls.push("<span>");
			htmls.push("<img src='/statics/default/img/delete.png' class='imgdels' title='删除' onclick='fungdrug(this)'/>");
			htmls.push("</span>");
			htmls.push("</td>");
			htmls.push("</tr>");
			$('.othergdrugtd:last').after(htmls.join(' '));
		});
		
		 //	添加合并用药
		$('.otherdoctor').click(function(){
			
			var othername	=	$('.doctor:last').val();
			if( !othername ){
				
				return false;
			}
			
			var htmls	=	new Array();
			
			htmls.push("<tr class='otherdoctortr'>");
			htmls.push("<td  style='text-align:center;'>");
			htmls.push("<input type='text' name='otherfotime[]' id='' class='' placeholder='开始时间' autocomplete= 'off' value=''/>");
			htmls.push("</td>");
			htmls.push("<td  style='text-align:center;'>");
			htmls.push("<input type='text' name='otherdoctor[]' id='' class='doctor' value=''  placeholder='医嘱'  />");
			htmls.push("</td>");
			htmls.push("<td  style='text-align:center;'>");
			htmls.push("<input type='text' name='otherbotime[]' id='' class='' placeholder='结束时间' autocomplete= 'off' value=''/>");
			htmls.push("</td>");
			htmls.push("<td  style='text-align:center;'>");
			htmls.push("<span>");
			htmls.push("<img src='/statics/default/img/delete.png' class='imgdels' title='删除' onclick='fundoctor(this)'/>");
			htmls.push("</span>");
			htmls.push("</td>");
			htmls.push("</tr>");		 
			$('.otherdoctortr:last').after(htmls.join(' '));
		});

		//其他不良症状
		$('.badshow').click(function(){
                     
		var length	=	$('.badshow:checked').length;
		
		if( !length ){
           	$('#badshowother').hide();
			$('.badshowother').removeAttr('checked');
		}else{
           var check4	=	$('.badshow[value="10"]').is(":checked");
            if(check4){
				$('#badshowother').show();
			}else{
				$('#badshowother').hide();
				$('.badshowother').removeAttr('checked');
			}
                        
			
		}
	});
		

});
//	删除过敏药
                function fungdrug(obj){
                        var confirm	=	window.confirm('确认删除吗？');
                        if(confirm){
                                $(obj).parent('span').parent('td').parent('tr').remove();
                                return true;
                        }
                        return true;

                }
//	删除合并用药
                function fundoctor(obj){
                        var confirm	=	window.confirm('确认删除吗？');
                        if(confirm){
                                $(obj).parent('span').parent('td').parent('tr').remove();
                                return true;
                        }
                        return true;

                }

</script>
<?php 
templates('global','footer');
?>
