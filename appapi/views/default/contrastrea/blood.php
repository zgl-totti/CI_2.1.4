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
				<p class="inline-block btn-border"><a href="<?php echo site_url('contrastlab/addblood')?>">新建</a> </p>
				
			</div>
			
			
			<div class="item-list managepa">
					<table class='table-cont' width="100%">
						<tr>
							<th>检查日期</th>
							<th>白细胞（×10<sup>9</sup>）</th>
							<th>红细胞（×10<sup>12</sup>）</th>
							<th>血小板（×10<sup>9</sup>）</th>
							<th>中性粒细胞 % </th>
							<th>嗜酸性粒细胞（%）</th>
							<th>发生ADR/ADE时</th>
							<th>更新时间</th>
							<th>操作</th>
						</tr>
						
						<?php
							foreach($info AS $k => $v){
						?>
						<tr>
							<td><?php echo $v['ctime'];?></td>
							<td><?php echo $v['bloodcorpuscle'];?></td>
							<td><?php echo $v['redcorpuscle'];?></td>
							<td><?php echo $v['platelet'];?></td>
							<td><?php echo $v['neutrophils'];?></td>
							<td><?php echo $v['granulocyte'];?></td>
							<td><?php echo $v['adr'];?></td>
							<td><?php echo date('Y-m-d',$v['update_time']);?></td>
							<td>
								<a href="<?php echo site_url('contrastlab/editblood/'.$v['id']);?>">查看</a>
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
