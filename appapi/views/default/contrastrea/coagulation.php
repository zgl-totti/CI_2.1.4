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
			<div class="overview" style='position:relative;'>
				<p class="inline-block btn-border"><a href="<?php echo site_url('contrastlab/addcoagulation')?>">新建</a> </p>
			</div>
			
			<div class="item-list managepa">
					<table class='table-cont' width="100%">
						<tr>
							<th>检查日期</th>
							<th>凝血酶原时间</th>
							<th>部分凝血活酶时间</th>
							<th>纤维蛋白原</th>
							<th>凝血酶时间 </th>
							<th>发生ADR/ADE时</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
						
						<?php
							foreach($info AS $k => $v){
						?>
						<tr>
							<td><?php echo $v['ctime'];?></td>
							<td><?php echo $v['zymogen'];?></td>
							<td><?php echo $v['part'];?></td>
							<td><?php echo $v['fibrin'];?></td>
							<td><?php echo $v['thrombin'];?></td>
							<td><?php echo $v['adr'];?></td>
							<td><?php echo date('Y-m-d',$v['update_time']);?></td>
							<td>
								<a href="<?php echo site_url('contrastlab/editcoagulation/'.$v['id']);?>">查看</a>
							</td>
						</tr>
						<?php
							}
						?>
					</table>
					
			</div><!-- list end -->
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>



<?php 
templates('global','footer');
?>
