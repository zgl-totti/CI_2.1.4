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
				<p class="inline-block btn-border">我的患者 <span class="red">100</span> 人</p>
				<p class="inline-block btn-border"><a href="<?php echo site_url('home/add')?>">新建患者</a> </p>
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
							<th>出生日期</th>
							<th>医院</th>
							<th>操作</th>
						</tr>
					<?php
						foreach($info as $v){
					?>	
						<tr>
							<td>
								<input type='checkbox' name='lists[]' value='<?php echo $v['id'];?>' />
							</td>
							<td><?php echo $v['hnumber'];?></td>
							<td><?php echo $v['name'];?></td>
							<td>
								<?php
									if($v['sex'] == 1){
										echo '男';
									}elseif($v['sex'] == 2){
										echo '女';
									}
								?>
							</td>
							<td>
								<?php
									if($v['birthday'] ){
										echo date('Y-m-d',$v['birthday']);
									}else{
										echo '-';
									}
								?>
							</td>
							<td><?php echo $v['hospital'];?></td>
							
							<td><a href="<?php echo site_url('home/edit/'.$v['id']);?>">查看</a></td>
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
