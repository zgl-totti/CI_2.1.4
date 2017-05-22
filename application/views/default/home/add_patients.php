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
				<form action="<?php echo site_url('home/add')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr class='trheader'>
							<td style="font-size:18px;" colspan='4'><b>基本信息</b></td>
							
						</tr>
                        <tr>
							<td width='300'>医院编号</td>
							<td colspan='5'>
								<select name='result' id='result'>
									<option value ="">请选择</option>
									<?php
										foreach($result AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnum) && $hospitalnum && $hospitalnum == $k){echo 'selected';}?>><?php echo $v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result1' id='result1' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 1){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result1 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result2' id='result2' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 2){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result2 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result3' id='result3' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 3){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result3 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result4' id='result4' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 4){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result4 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result5' id='result5' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 5){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result5 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
								<select name='result6' id='result6' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 6){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result6 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result7' id='result7' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 7){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result7 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                                            
                               <select name='result8' id='result8' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 8){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result8 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                                            
                               <select name='result9' id='result9' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 9){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result9 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result10' id='result10' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 10){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result10 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result11' id='result11' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 11){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result11 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                <select name='result12' id='result12' <?php if( isset($hospitalnum) && $hospitalnum && $hospitalnum == 12){ }else{?>style='display:none;'<?php } ?> class='resultother'>
									<option value ="">请选择</option>
									<?php
										foreach($result12 AS $k=>$v){
									?>
									<option value="<?php echo $k;?>" <?php if(isset($hospitalnums) && $hospitalnums && $hospitalnums == $k){echo 'selected';}?>><?php echo '('.$k.')',$v;?></option>
									<?php
										}
									?>
								</select>
                                                            
							</td>
                                                        
						</tr>
						<tr>
                            <td  style="">门诊号</td>
							<td><input type='text' name='hnumber' id='hnumber' value=''  placeholder="门诊号"/></td>
							<td width='250'>住院号</td>
							<td><input type='text' name='ad' id='ad' value=''  placeholder="住院号" /></td>
						</tr>
						<tr>
							<td>姓名</td>
							<td><input type='text' name='names' id='names' value='' class="validate[required]" placeholder="姓名" data-errormessage-value-missing="请输入姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							<td>性别</td>
							<td>
								<input type='radio' name='sex' value="1" id="sex_1" class='' checked />
								<label for="sex_1">男</label>
								
								<input type='radio' name='sex' value="2" id="sex_2" class=''/>
								<label for="sex_2">女</label>
							</td>
						</tr>

						<tr>
                            <td>年龄</td>
							<td><input type='text' name='age' id='age' value=''  placeholder="年龄"  /></td>
							<td>糖尿病</td>
							<td>
								<input type='radio' name='mellitus' value="1" id="mellitus_1" class=''  />
								<label for="mellitus_1">1 型</label>
								
								<input type='radio' name='mellitus' value="2" id="mellitus_2" class=''/>
								<label for="mellitus_2">2 型</label>
							</td>
						</tr>
						<tr class='trheader' id = "situationtitle" style="display:none">
							<td style="font-size:18px;" colspan='4'>一般情况</td>
						</tr>
						<tr style="display:none" id='heightweight'>
                            <td  style="">身高</td>
							<td><input type='text' name='height' id='height' value=''  placeholder="身高"/>cm</td>
							<td width='250'>体重</td>
							<td><input type='text' name='weight' id='weight' value=''  placeholder="体重" />KG</td>
						</tr>
						<tbody id = "information" style="display:none">
						<tr>
                            <td  style="">联系方式</td>
							<td><input type='text' name='contact' id='contact' value=''  placeholder="联系方式"/></td>
							<td width='250'>诊断糖尿病时间</td>
							<td><input type='text' name='diabetest' id='diabetest' value='<?php echo date('Y-m-d');?>'  placeholder="诊断糖尿病时间" /></td>
						</tr>
						<tr>
                            <td>吸烟</td>
							<td>
								<input type='radio' name='smoking' value="1" id="smoking_1" class='' />
								<label for="smoking_1">是</label>
								
								<input type='radio' name='smoking' value="2" id="smoking_2" class=''/>
								<label for="smoking_2">否</label>
							</td>
							<td width='250'>胰岛素使用</td>
							<td><input type='text' name='insulin' id='insulin' value=''  placeholder="胰岛素使用" /></td>
						</tr>
						<tr>
                            <td  style="">空腹血糖</td>
							<td><input type='text' name='fasting' id='fasting' value=''  placeholder="空腹血糖"/>mmol/L</td>
							<td width='250'>餐后2h血糖</td>
							<td><input type='text' name='afterdinner' id='afterdinner' value=''  placeholder="餐后血糖" />mmol/L</td>
						</tr>
						<tr>
                            <td  style="">糖化血红蛋白</td>
							<td><input type='text' name='hemoglobin' id='hemoglobin' value=''  placeholder="糖化血红蛋白"/></td>
							<td>糖尿病视网膜病变</td>
							<td>
								<input type='radio' name='retina' value="1" id="retina_1" class='' />
								<label for="retina_1">是</label>
								
								<input type='radio' name='retina' value="2" id="retina_2" class=''  />
								<label for="retina_2">否</label>
							</td>
						</tr>
						<tr>
                            <td  style="">血压</td>
							<td><input type='text' name='pressure' id='pressure' value=''  placeholder="血压"/>mmhg</td>
							<td width='250'>血脂</td>
							<td><input type='text' name='lipid' id='lipid' value=''  placeholder="血脂" />mmol/L</td>
						</tr>
						<tr>
							<td>糖尿病肾病</td>
							<td>
								<input type='radio' name='nephropathy' value="1" id="nephropathy_1" class='' />
								<label for="nephropathy_1">是</label>
								
								<input type='radio' name='nephropathy' value="2" id="nephropathy_2" class='' />
								<label for="nephropathy_2">否</label>
							</td>
							<td width='250'>口服降糖药物使用</td>
							<td><input type='text' name='hypoglycemic' id='hypoglycemic' value=''  placeholder="口服降糖药物使用" /></td>
						</tr>
						</tbody>
						<tbody id = "situation" style="display:none">
						
						<tr>
                            <td  style="">N电图</td>
							<td><input type='text' name='electrocardiogram' id='electrocardiogram' value=''  placeholder="N电图"/></td>
							<td width='250'>N传导</td>
							<td><input type='text' name='conduction' id='conduction' value=''  placeholder="N传导" /></td>
						</tr>
						<tr>
							<td width='250'>高血压病史</td>
							<td><input type='text' name='hypertension' id='hypertension' value=''  placeholder="高血压病史" /></td>
						</tr>
						</tbody>
						<tr id = "bminone" style="display:none">
                            <td  style="">BMI</td>
							<td><input type='text' name='bmi' id='bmi' value=''  placeholder="BMI"/></td>
						</tr>
						<tr class='trheader'>
                            <td style="font-size:18px;" colspan='4'><b>第一部分</b> 神经病变症状（远端、对称性）</td>
						</tr>
						
						<tr>
							<td>主要症状</td>
							<td colspan='3'>
								<label><input type="checkbox" name="symptoms[]"  value="1" class='symptoms '>麻木&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="symptoms[]" value="2" class='symptoms '>疼痛&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="symptoms[]" value="3" class='symptoms '>感觉异常&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="symptoms[]" value="4" class='symptoms '>针刺感&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="symptoms[]" value="5" class='symptoms '>其他&nbsp;&nbsp;&nbsp;</label>
								<input type='text' name='symptomsother' class='symptomsother' style='display:none;' />
							</td>
						</tr>
                        <tr>
							<td>分布方式</td>
							<td colspan='3'>
								<label><input type="checkbox" name="distr[]" value="1" class='sex '>近端&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="distr[]" value="2" class='sex '>远端<sup>1</sup>&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="distr[]" value="3" class='sex '>对称&nbsp;&nbsp;&nbsp;</label>
								<label><input type="checkbox" name="distr[]" value="4" class='sex '>不对称<sup>2</sup>&nbsp;&nbsp;&nbsp;</label>
							</td>
						</tr>
						<tr>
							<td style="font-size:18px;">判断神经病变症状（远端、对称性）</td>
							<td colspan='3'>		
								<label>
								<input type="radio" name="changes" class='changes' value="1" >有<sup>3</sup>&nbsp;&nbsp;&nbsp;</label>
								<label>
								<input type="radio" name="changes" class='changes' value="2" >无<sup>4</sup>&nbsp;&nbsp;&nbsp;</label>
									
							</td>
						</tr>
                        <tbody id = "two" style="display:none">
							<tr class='trheader'>
								<td colspan='4' style="font-size:18px;">
									<b>第二部分</b> 须鉴别诊断既往病史 ( 帮助鉴别有无其他类似临床症状和体征的病变 )
								</td>
							</tr>
							<tr>
								<td>既往病史</td>
								<td colspan='3'>既往疾病（ 详见 DSPN 筛查手册 “四.鉴别诊断” ）</td>
							</tr>
						
							<tr>
							<td>骨科相关病史</td>
							<td colspan='3'>
								<label><input type="radio" name="bone" value="1" class=''>脊柱退行性疾病 &nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="bone" value="2" class=''>骨关节、肌腱病变&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="bone" value="3" class=''>其它</label>
								
								<input type='text' name='boneother' style='display:none;'/>
								
							</td>
						</tr>
                        <tr>
							<td>神经内科相关病史</td>
							<td colspan='3'>
								<label><input type="radio" name="nerve" value="1" class=''>中枢神经病变&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="nerve" value="2" class=''>明确的周围神经病变&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="nerve" value="3" class=''>其它</label>
								<input type='text' name='nerveother' style='display:none;'/>
							</td>
						</tr>
                                                <tr>
							<td>其他相关病史</td>
							<td colspan='3'>
								<label><input type="radio" name="other" value="1" class=''>尿毒症&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="other" value="2" class=''>甲状腺功能亢进／减退&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="other" value="3" class=''>结核用药史&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="other" value="4" class=''>肿瘤化疗用药史&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="other" value="5" class=''>长期大量饮酒史&nbsp;&nbsp;&nbsp;</label>
								<br/>
								<label><input type="radio" name="other" value="6" class=''>遗传病史&nbsp;&nbsp;&nbsp;</label>
								<label><input type="radio" name="other" value="7" class=''>其他</label>
								<input type='text' name='otherother' style='display:none;'/>
							</td>
						</tr>
                                                </tbody>
                                                
						<tr class='trheader'>
							<td style="font-size:18px;" colspan='4'><b> 第三部分 </b>DSPN 筛查</td>
						</tr>

						<tr>
							<td style="font-size:18px;">筛查项目</td>
							<td style="font-size:18px;">左侧</td>
							<td style="font-size:18px;" colspan='2'>右侧</td>
						</tr>
                        <tr>
							<td rowspan='2'>踝反射<sup>5</sup></td>
							<td>
								<input type='radio' name='anklel' value="1" id="anklel_1" class=' '  />
								<label for="anklel_1">缺失</label>
								<input type='radio' name='anklel' value="2" id="anklel_2" class=' '/>
								<label for="anklel_2">减弱</label>
								<input type='radio' name='anklel' value="3" id="anklel_3" class=' '/>
								<label for="anklel_3">正常</label>
								<input type='radio' name='anklel' value="4" id="anklel_4" class=' '/>
								<label for="anklel_4">亢奋</label>
							</td>
							<td colspan='2'>
								<input type='radio' name='ankler' value="1" id="ankler_1" class=' '  />
								<label for="ankler_1">缺失</label>
								<input type='radio' name='ankler' value="2" id="ankler_2" class=' '/>
								<label for="ankler_2">减弱</label>
								<input type='radio' name='ankler' value="3" id="ankler_3" class=' '/>
								<label for="ankler_3">正常</label>
								<input type='radio' name='ankler' value="4" id="ankler_4" class=' '/>
								<label for="ankler_4">亢奋</label>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<b>判断: </b>
								<input type='radio' name='ajudge' value="1" id="ajudge_1" class=''/>
								<label for="ajudge_1"><b>阴性</b></label>
								<input type='radio' name='ajudge' value="2" id="ajudge_2" class=''/>
								<label for="ajudge_2"><b>阳性</b></label>
							</td>
						</tr>
						
						
						<tr>
							<td rowspan='2'>针刺痛觉<sup>6</sup></td>
							<td>
								<input type='radio' name='painl' value="1" id="painl_1" class=''  />
								<label for="painl_1">缺失</label>
								<input type='radio' name='painl' value="2" id="painl_2" class=''/>
								<label for="painl_2">存在</label>
							</td>
							<td colspan='2'>
								<input type='radio' name='painr' value="1" id="painr_1" class=''  />
								<label for="painr_1">缺失</label>
								<input type='radio' name='painr' value="2" id="painr_2" class=''/>
								<label for="painr_2">存在</label>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<b>判断: </b>
								<input type='radio' name='pjudge' value="1" id="pjudge_1" class=''/>
								<label for="pjudge_1"><b>阴性</b></label>
								<input type='radio' name='pjudge' value="2" id="pjudge_2" class=''/>
								<label for="pjudge_2"><b>阳性</b></label>
							</td>
						</tr>
						
						
						<tr>
							<td rowspan='2'>温度觉<sup>7</sup></td>
							<td>
								<input type='radio' name='temperaturel' value="1" id="temperaturel_1" class=''  />
								<label for="temperaturel_1">正常</label>
								<input type='radio' name='temperaturel' value="2" id="temperaturel_2" class=''/>
								<label for="temperaturel_2">异常</label>
							</td>
							<td colspan='2'>
								<input type='radio' name='temperaturer' value="1" id="temperaturer_1" class=''  />
								<label for="temperaturer_1">正常</label>
								<input type='radio' name='temperaturer' value="2" id="temperaturer_2" class=''/>
								<label for="temperaturer_2">异常</label>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<b>判断: </b>
								<input type='radio' name='tjudge' value="1" id="tjudge_1" class=''/>
								<label for="tjudge_1"><b>阴性</b></label>
								<input type='radio' name='tjudge' value="2" id="tjudge_2" class=''/>
								<label for="tjudge_2"><b>阳性</b></label>
							</td>
						</tr>
						
						
						<tr>
							<td rowspan='2'>振动觉<sup>8</sup>(128Hz 音叉)</td>
							<td>
								<input type='radio' name='vibrationl' value="1" id="vibrationl_1" class=''  />
								<label for="vibrationl_1">存在</label>
								<input type='radio' name='vibrationl' value="2" id="vibrationl_2" class=''/>
								<label for="vibrationl_2">缺失</label>
							</td>
							<td colspan='3'>
								<input type='radio' name='vibrationr' value="1" id="vibrationr_1" class=''  />
								<label for="vibrationr_1">存在</label>
								<input type='radio' name='vibrationr' value="2" id="vibrationr_2" class=''/>
								<label for="vibrationr_2">缺失</label>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<b>判断: </b>
								<input type='radio' name='vjudge' value="1" id="vjudge_1" class=''/>
								<label for="vjudge_1"><b>阴性</b></label>
								<input type='radio' name='vjudge' value="2" id="vjudge_2" class=''/>
								<label for="vjudge_2"><b>阳性</b></label>
							</td>
						
						</tr>
						
						<tr>
							<td rowspan='2'>压力觉<sup>9</sup>(10g 单丝)</td>
							<td>
								<input type='radio' name='pressurel' value="1" id="pressurel_1" class=''  />
								<label for="pressurel_1">存在</label>
								<input type='radio' name='pressurel' value="2" id="pressurel_2" class=''/>
								<label for="pressurel_2">缺失</label>
								</td>
							<td colspan='2'>
								<input type='radio' name='pressurer' value="1" id="pressurer_1" class=''  />
								<label for="pressurer_1">存在</label>
								<input type='radio' name='pressurer' value="2" id="pressurer_2" class=''/>
								<label for="pressurer_2">缺失</label>
							</td>
						</tr>
						<tr>
							<td colspan='3'>
								<b>判断: </b>
								<input type='radio' name='ejudge' value="1" id="ejudge_1" class=''/>
								<label for="ejudge_1"><b>阴性</b></label>
								<input type='radio' name='ejudge' value="2" id="ejudge_2" class=''/>
								<label for="ejudge_2"><b>阳性</b></label>
							</td>
						</tr>
						
						<tr>
							<td>其他</td>
							<td colspan='3'>
								<textarea name='othermessage' id='othermessage' class='othertextarea'></textarea>
							</td>
						</tr>
						
						<tr>
							<td>完成检查</td>
							<td colspan='3'>
								<input type='text' name='ftime' id='ftime' class="" placeholder="" data-errormessage-value-missing="" data-prompt-position="bottomLeft:3" autocomplete= "off" value="<?php echo date('Y-m-d');?>"/>
							</td>
						</tr>
						
						<tr>
							<td >初步诊断<sup>10</sup></td>
							<td colspan='3'><b> DSPN： </b>
								<input type='radio' name='diagnosis' value="1" id="diagnosis_1" class=''/>
								<label for="diagnosis_1"><b>临床诊断</b></label>
								<input type='radio' name='diagnosis' value="2" id="diagnosis_2" class=''/>
								<label for="diagnosis_2"><b>疑似</b></label>
								<input type='radio' name='diagnosis' value="3" id="diagnosis_3" class=''/>
								<label for="diagnosis_3"><b>无</b></label>
							</td>
						</tr>
                            

						<tr>
							<td colspan='4'>医生签名：<input type='text' name='docname' id='docname' class=""  autocomplete= "off" /> <input type='text' name='dtime' id='dtime' class="" placeholder="" data-errormessage-value-missing="" data-prompt-position="bottomLeft:3" autocomplete= "off" value="<?php echo date('Y-m-d');?>"/>
							</td>
						</tr>
							
					</table>
				
					<input type="submit" class="" value="添加" name='dosubmit'/>
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
	$("#ftime,#dtime,#diabetest").manhuaDate({                        
		Event 	: "click",//可选                     
		Left 	: 0,//弹出时间停靠的左边位置
		Top 	: -16,//弹出时间停靠的顶部边位置
		fuhao 	: "-",//日期连接符默认为-
		isTime 	: false,//是否开启时间值默认为false
		beginY 	: 2000,//年份的开始默认为1949
		endY 	: nyear//年份的结束默认为2049
	});
	$('.changes').click(function(){
		if($(this).val() == 1){
			$("#two").show();
		}else{
			$("#two").hide();
		};
	});
	//	医院编号选择处理
	$('#result').change(function(){
		var val	=	$(this).val();
		$('.resultother').hide();
		$(".resultother option").removeAttr("selected");
		if(val){
							$('#result'+val).show();
					}
		if(val != 7 || val != 12){
			$("#situation").hide();
			$("#situationtitle").hide();
			$("#heightweight").hide();
			$("#bminone").hide();
			$("#information").hide();
		}
	});
		
		$('.symptoms').click(function(){
			var val	=	$(this).val();
			if(val == 5){
				$('.symptomsother').show();
				return true;
			}
			$('.symptomsother').val('').hide();
			return true;
		})
		
	$('input[name=bone]').click(function(){
			var val	=	$(this).val();
			if(val == 3){
				$('input[name=boneother]').show();
				return true;
			}
			$('input[name=boneother]').val('').hide();
			return true;
		})
	$('input[name=nerve]').click(function(){
		var val	=	$(this).val();
		if(val == 3){
			$('input[name=nerveother]').show();
			return true;
		}
		$('input[name=nerveother]').val('').hide();
		return true;
	})
	
	$('input[name=other]').click(function(){
		var val	=	$(this).val();
		if(val == 7){
			$('input[name=otherother]').show();
			return true;
		}
		$('input[name=otherother]').val('').hide();
		return true;
	})
	//哈尔滨
	$('#result7').change(function(){
		if($(this).val() == 'DB01'){
			$("#situation").show();
			$("#situationtitle").show();
			$("#heightweight").show();
			$("#bminone").show();
			
		}else{
			$("#situation").hide();
			$("#situationtitle").hide();
			$("#heightweight").hide();
			$("#bminone").hide();
		};
	});
	//四川
	$('#result12').change(function(){
		if($(this).val() == 'XN01'){
			$("#information").show();
			$("#heightweight").show();
			$("#bminone").show();
			
		}else{
			$("#information").hide();
			$("#heightweight").hide();
			$("#bminone").hide();
		};
	});
});
</script>


<?php 
templates('global','footer');
?>
