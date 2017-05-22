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
				<form action="<?php echo site_url('reactions/appear')?>" method="post" id='formID'>
					
					<table class='table-cont' width="100%">
						<tr>
							<th rowspan='2'>不良事件名称</th>
							<th rowspan='2'>不良事件过程描述<br/>（包括症状、体征）</th>
							<th rowspan='2'>开始时间<br/>（精确至分钟）</th>
							<th rowspan='2'>转归时间<br/>（精确至分钟）</th>
							<th colspan='2'>处理措施</th>
							<th rowspan='2'>不良事件的转归</th>
							
							<th rowspan='2'></th>
						</tr>
						<tr>
							<th>一般处理</th>
							<th>治疗措施</th>
						</tr>
						
						
						<?php
							if(isset($info) && $info){
								foreach($info AS $k=> $v){
						?>
						
						<tr class='moretr'>
							<td><input type='text' name='name[]' size='10' value='<?php echo $v['name'];?>'/></td>
							<td><input type='text' name='des[]' size='10' value='<?php echo $v['des'];?>'/></td>
							<td>
								<input type='text' name='btime[]' size='10' class='dates' value='<?php echo $v['btime'];?>'/>
							</td>
							<td>
								<input type='text' name='otime[]' size='10' class='dates' value='<?php echo $v['otime'];?>'/>
							</td>
							<td><input type='text' name='general[]' size='10' value='<?php echo $v['general'];?>'/></td>
							
							<td><input type='text' name='measures[]' size='10' value='<?php echo $v['measures'];?>'/></td>
							<td>
								<input type='text' name='outcome[]' size='10' value='<?php echo $v['outcome'];?>'/>
							</td>
							
							<td>
								<input type='hidden' name='checks[]' value='<?php echo $v['id'];?>'/>
								
								
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
							<td><input type='text' name='name[]' size='10' /></td>
							<td><input type='text' name='des[]' size='10' /></td>
							<td>
								<input type='text' name='btime[]' size='10' class='dates' onclick="laydate({istime: true,format: 'YYYY-MM-DD hh:mm:ss'})"/>
							</td>
							<td>
								<input type='text' name='otime[]' size='10' class='dates' onclick="laydate({istime: true,format: 'YYYY-MM-DD hh:mm:ss'})"/>
							</td>
							<td><input type='text' name='general[]' size='10' /></td>
							
							<td><input type='text' name='measures[]' size='10' /></td>
							<td>
								<input type='text' name='outcome[]' size='10' />
							</td>
							
							<td>
								<input type='hidden' name='checks[]' />
								<a href='javascript:;' class='addmore'>+</a>
							</td>
						</tr>
						<?php
							}
						?>
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
	
	
	
	//	添加更多
	$('.addmore').click(function(){
		var htmls	=	new Array();
		htmls.push("<tr class='moretr'>");
		htmls.push("<td><input type='text' name='name[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='des[]' size='10' /></td>");
		htmls.push("<td>");
		htmls.push("<input type='text' name='btime[]' size='10' class='dates' />");
		htmls.push("</td>");
		htmls.push("<td>");
		htmls.push("<input type='text' name='otime[]' size='10' class='dates' />");
		htmls.push("</td>");
		htmls.push("<td><input type='text' name='general[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='measures[]' size='10' /></td>");
		htmls.push("<td><input type='text' name='outcome[]' size='10' /></td>");
		htmls.push("<td><input type='hidden' name='checks[]' /><a href='javascript:;' onclick='removes(this)'>-</a></td>");
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
