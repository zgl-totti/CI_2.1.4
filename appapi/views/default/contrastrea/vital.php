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
				<p class="inline-block btn-border"><a href="<?php echo site_url('contrastlab/addvital')?>">新建</a> </p>
				
			</div>
			
			
			<div class="item-list managepa">
					<table class='table-cont' width="100%">
						<tr>
							<th>检查日期</th>
							<th>体温</th>
							<th>脉搏（次/分）</th>
							<th>呼吸（次/分）</th>
							<th>收缩压/舒张压（mmHg） </th>
							<th>发生ADR/ADE时</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
						
						<?php
							foreach($info AS $k => $v){
						?>
						<tr>
							<td><?php echo $v['ctime'];?></td>
							<td><?php echo $v['temperature'];?></td>
							<td><?php echo $v['pulse'];?></td>
							<td><?php echo $v['sreathing'];?></td>
							<td><?php echo $v['systolic'];?></td>
							<td><?php echo $v['adr'];?></td>
							<td><?php echo date('Y-m-d',$v['update_time']);?></td>
							<td>
								<a href="<?php echo site_url('contrastlab/editvital/'.$v['id']);?>">查看</a>
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
