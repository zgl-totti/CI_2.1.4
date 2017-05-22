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
				<form action="<?php echo site_url('contrastrea/evaluation')?>" method="post" id='formID'>
					<table class='table-cont' width="100%">
						<tr>
							<td width='200'>不良反应/事件状态</td>
							<td>
								<label>
									<input type='radio' name='types' class='types' value='一般的' <?php if(isset($data['types']) && $data['types'] == '一般的'){ echo 'checked';}?>/> 一般的  
								</label>
								<label>
									<input type='radio' name='types' class='types' value='新的一般' <?php if(isset($data['types']) && $data['types'] == '新的一般'){ echo 'checked';}?>/> 新的一般  
								</label>
								<label>
									<input type='radio' name='types' class='types' value='严重的' <?php if(isset($data['types']) && $data['types'] == '严重的'){ echo 'checked';}?>/> 严重的  
								</label>
								<label>
									<input type='radio' name='types' class='types' value='新的严重' <?php if(isset($data['types']) && $data['types'] == '新的严重'){ echo 'checked';}?>/> 新的严重  
								</label>
							</td>
							
						</tr>
						<tr>
							<td>是否出现严重不良事件</td>
							<td>
								<label>
									<input type='radio' name='show' class='show' value='否' <?php if(isset($data['show']) && $data['show'] == '否'){ echo 'checked';}?>/> 否  
								</label>
								<label>
									<input type='radio' name='show' class='show' value='是' <?php if(isset($data['show']) && $data['show'] == '是'){ echo 'checked';}?>/> 是  
								</label>
							</td>
						</tr>
						
						<tr>
							<td>不良反应/事件对原患疾病影响</td>
							<td>
								<label>
									<input type='radio' name='influence' class='influence' value='不明显' <?php if(isset($data['influence']) && $data['influence'] == '不明显'){ echo 'checked';}?>/> 不明显 
								</label>
								<label>
									<input type='radio' name='influence' class='influence' value='病情加重' <?php if(isset($data['influence']) && $data['influence'] == '病情加重'){ echo 'checked';}?>/> 病情加重  
								</label>
								<label>
									<input type='radio' name='influence' class='influence' value='病程延长' <?php if(isset($data['influence']) && $data['influence'] == '病程延长'){ echo 'checked';}?>/> 病程延长
								</label>
								<label>
									<input type='radio' name='influence' class='influence' value='导致死亡' <?php if(isset($data['influence']) && $data['influence'] == '导致死亡'){ echo 'checked';}?>/> 导致死亡  
								</label>
								<label>
									<input type='radio' name='influence' class='influence' value='导致后遗症' <?php if(isset($data['influence']) && $data['influence'] == '导致后遗症'){ echo 'checked';}?>/> 导致后遗症  
								</label>
							</td>
						</tr>
						
						<tr>
							<td>关联性评价</td>
							<td>
								<label>
									<input type='radio' name='evaluation' class='evaluation' value='无关' <?php if(isset($data['evaluation']) && $data['evaluation'] == '无关'){ echo 'checked';}?>/> 无关  
								</label>
								
								<label>
									<input type='radio' name='evaluation' class='evaluation' value='可能有关' <?php if(isset($data['evaluation']) && $data['evaluation'] == '可能有关'){ echo 'checked';}?>/> 可能有关  
								</label>
								
								<label>
									<input type='radio' name='evaluation' class='evaluation' value='很可能有关' <?php if(isset($data['evaluation']) && $data['evaluation'] == '很可能有关'){ echo 'checked';}?>/> 很可能有关  
								</label>
								
								<label>
									<input type='radio' name='evaluation' class='evaluation' value='肯定有关' <?php if(isset($data['evaluation']) && $data['evaluation'] == '肯定有关'){ echo 'checked';}?>/> 肯定有关  
								</label>
								
								<label>
									<input type='radio' name='evaluation' class='evaluation' value='无法评价' <?php if(isset($data['evaluation']) && $data['evaluation'] == '无法评价'){ echo 'checked';}?>/> 无法评价  
								</label>
								
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
