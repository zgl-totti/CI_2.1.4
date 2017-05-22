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
				<p class="inline-block btn-border">我的患者 <span class="red"><?php echo $total;?></span> 人</p>
				<p class="inline-block btn-border"><a href="<?php echo site_url('reactions/add')?>">新建患者</a> </p>
			</div>
			
			<div class="item-list">
			<?php
				if(isset($info) && $info){
			?>
				<table class="table-cont" width="100%">
					<tbody>
						<tr>
							<th>患者姓名</th>
							<th>科室</th>
							<th>住院号</th>
							<th>筛选卡编号</th>
							<th>添加时间</th>
							<th>操作</th>
						</tr>
					<?php
						foreach($info as $v){
					?>	
						<tr>
							<td><?php echo $v['pname'];?></td>
							<td><?php echo $v['subject'];?></td>
							<td>
								<?php echo $v['hnumber'];?>
							</td>
							<td>
								<?php echo $v['snumber'];?>
							</td>
							<td><?php echo date('Y-m-d',$v['add_time']);?></td>
							
							<td><a href="<?php echo site_url('reactions/edit/'.$v['id']);?>">查看</a></td>
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
