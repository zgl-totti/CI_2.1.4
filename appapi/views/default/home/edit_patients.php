<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/patients.css');?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>
<div class="main-board">
	<?php
		templates('home','cleft');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			<div class="item-list managepa">
				<form action="<?php echo site_url('home/edit')?>" method="post" id='formID'>
					<input type='hidden' name='patientsid' value='<?php echo $info['id'];?>' />
					<table class='table-cont' width="100%">
						<tr>
							<td>病历号</td>
							<td>
								<input type='text' name='hnumber' id='hnumber' class="validate[required]" placeholder="病历号" data-errormessage-value-missing="请输入病历号" data-prompt-position="bottomLeft:3" autocomplete= "off" value="<?php echo $info['hnumber'];?>"/>
							</td>
							<td>医院</td>
							<td>
								<input type='text' name='hospital' id='hospital' class="validate[required]" placeholder="医院" data-errormessage-value-missing="请输入医院" data-prompt-position="bottomLeft:3" autocomplete= "off" value="<?php echo $info['hospital'];?>"/>
							
							</td>
						</tr>
						
						<tr>
							<td>姓名</td>
							<td><input type='text' name='name' id='name' value='<?php echo $info['name'];?>' class="validate[required]" placeholder="姓名" data-errormessage-value-missing="请输入姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							<td>出生日期</td>
							<td>
								<input type='text' name='birthday' id='birthday' value='<?php if($info['birthday']){echo date('Y-m-d',$info['birthday']);}else{echo date('Y-m-d');}?>' />
							</td>
						</tr>
						
						<tr>
							<td>性别</td>
							<td colspan='3'>
								<input type='radio' name='sex' value="1" id="sex_1" class='sex validate[required]' <?php if($info['sex'] == 1){echo 'checked';}?> />
								<label for="sex_1">男</label>
								
								<input type='radio' name='sex' value="2" id="sex_2" class='sex validate[required]' <?php if($info['sex'] == 2){echo 'checked';}?>/>
								<label for="sex_2">女</label>
							</td>
						</tr>
						
						<tr>
							<td>联系方式</td>
							<td colspan='3'>
								<input type='text' name='phone' id='phone' value="<?php echo $info['phone'];?>"  class="validate[required,custom[tel]]" placeholder="输入手机号" data-errormessage-value-missing="请输入联系方式" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
						</tr>
						
						<tr>
							<td>国籍</td>
							<td><input type='text' name='nationality' id='nationality' value="<?php echo $info['nationality'];?>"  class="validate[required]" placeholder="国籍" data-errormessage-value-missing="请输入国籍" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							<td>籍贯</td>
							<td><input type='text' name='nativeplace' id='nativeplace' value="<?php echo $info['nativeplace'];?>" class="validate[required]" placeholder="籍贯" data-errormessage-value-missing="请输入籍贯" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>出生地</td>
							<td><input type='text' name='address' id='address' value="<?php echo $info['address'];?>"  class="validate[required]" placeholder="出生地" data-errormessage-value-missing="请输入出生地" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							<td>民族</td>
							<td><input type='text' name='nation' id='nation' value="<?php echo $info['nation'];?>"  class="validate[required]" placeholder="民族" data-errormessage-value-missing="请输入民族" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>家庭住址</td>
							<td colspan='3'><input type='text' name='haddress' id='haddress' value="<?php echo $info['haddress'];?>"  class="validate[required]" placeholder="家庭住址" data-errormessage-value-missing="请输入家庭住址" data-prompt-position="bottomLeft:3" autocomplete= "off"  style='width:70%;'/></td>
							
						</tr>
						
						<tr>
							<td>亲属姓名</td>
							<td><input type='text' name='contacename' id='contacename' value="<?php echo $info['contacename'];?>"  class="validate[required]" placeholder="亲属姓名" data-errormessage-value-missing="请输入亲属姓名" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
							<td>亲属联系方式</td>
							<td><input type='text' name='contacephone' id='contacephone' value="<?php echo $info['contacephone'];?>"  class="validate[required,custom[tel]]" placeholder="亲属联系方式" data-errormessage-value-missing="请输亲属联系方式" data-prompt-position="bottomLeft:3" autocomplete= "off"/></td>
						</tr>
						
						<tr>
							<td>与患者关系</td>
							<td colspan='3'>
								<input type='text' name='relation' id='relation' value="<?php echo $info['relation'];?>"  class="validate[required]" placeholder="与患者关系" data-errormessage-value-missing="请输入与患者关系" data-prompt-position="bottomLeft:3" autocomplete= "off"/>
							</td>
							
						</tr>
						<tr>
							<td>既往病史</td>
							<td><input type='text' name='history' id='history' value="<?php echo $info['history'];?>" class="validate[required]" placeholder="既往病史" data-errormessage-value-missing="请输入既往病史" data-prompt-position="bottomLeft:3"/></td>
							
							<td>合并史</td>
							<td><input type='text' name='merger' id='merger' value="<?php echo $info['merger'];?>" class="validate[required]" placeholder="合并史" data-errormessage-value-missing="请输入合并史" data-prompt-position="bottomLeft:3"/></td>
						</tr>
					</table>
				
					<input type="submit" class="" value="修改" name='dosubmit'/>
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
	
});
</script>

<script>
	$(function(){
		//	吸烟史
		$('.smoke').click(function(){
			var smval	=	$('.smoke:checked').val();
			if(smval == 1){
				$(this).parent('td').parent('tr').next('tr').hide();
				$('.smokeday').val('');
				$('.smokeyear').val('');
			}else{
				$(this).parent('td').parent('tr').next('tr').show();
				
			}
		})
		//	家族肿瘤史显示描述
		$('.tumor').click(function(){
			var hval	=	$('.tumor:checked').val();
			if(hval == 1){
				$(this).parent('td').parent('tr').next('tr').hide();
			}else{
				$(this).parent('td').parent('tr').next('tr').show();
			}
		})
		
		$('#smokeday,#smokeyear').change(function(){
			var smokeday	=	$('#smokeday').val();
			var smokeyear	=	$('#smokeyear').val();
			 
			if( !smokeday || !smokeyear ){
				$('#smoking').val('0');
				$('.smokingspan').html('0');
				return true;
			}
			smokeday	=	parseInt(smokeday);
			smokeyear	=	parseInt(smokeyear);
			
			var smoking	=	0;
			smoking		=	smokeday * smokeyear;
			
			$('#smoking').val(smoking);
			$('.smokingspan').html(smoking);
			return true;
		});
		
		var nowDate	=	new Date();
		var nyear	=	nowDate.getFullYear();
		$("#admissiondate").manhuaDate({                        
			Event 	: "click",//可选                     
			Left 	: 0,//弹出时间停靠的左边位置
			Top 	: -16,//弹出时间停靠的顶部边位置
			fuhao 	: "-",//日期连接符默认为-
			isTime 	: false,//是否开启时间值默认为false
			beginY 	: 2000,//年份的开始默认为1949
			endY 	: nyear//年份的结束默认为2049
		});
	})
</script>


<?php 
templates('global','footer');
?>
