<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>

<div class="main-board">
			
	<?php
		templates('home','left');
	?>
	
	<div class="dataview-board inline-box">
		<div class="inner">
			<div class="overview" style='position:relative;'>
				<p class="inline-block btn-border"><a href="<?php echo site_url('clinical/one_add')?>">新建病例</a> </p>
			</div>
			
			<div class="item-list">
			<?php
				if(isset($info) && $info){
			?>
				<table class="table-cont" width="100%">
					<tbody>
						<tr>
							<th width='40'>选择</th>
							<th>病历号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>医院编号</th>
							<th>操作</th>
						</tr>
					<?php
						foreach($info as $v){
					?>	
						<tr>
							<td style="text-align:center;">
								<input type='checkbox' name='lists[]' value='<?php echo $v['id'];?>' />
							</td>
							<td style="text-align:center;"><?php echo $v['cnumber'];?></td>
							<td style="text-align:center;"><?php echo $v['name'];?></td>
							<td style="text-align:center;">
								<?php
									if($v['sex'] == 1){
										echo '男';
									}elseif($v['sex'] == 2){
										echo '女';
									}
								?>
							</td>
							<td style="text-align:center;"><?php echo $v['hunmber'];?></td>
							
							<td style="text-align:center;"><a href="<?php echo site_url('clinical/one_edit/'.$v['id']);?>">查看</a></td>
						</tr>
					<?php
						}
					?>	
						
					</tbody>
				</table>
				
			<?php
				}
			?>
				
			</div><!-- list end -->
		</div><!-- inner end -->	
		<?php
			if(isset($pages) && $pages){
				echo $pages;
			}
		?>
		
	</div><!-- dataview end -->
	
</div>

<?php 
templates('global','footer');
?>
