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
			<div class="item-list">
			<?php
				if(isset($info) && $info){
			?>
				<table class="table-cont" width="100%">
					<tbody>
						<tr>
							<th>标题</th>
							<th>介绍</th>
							<th>附件</th>
							
						</tr>
					<?php
						foreach($info as $v){
					?>	
						<tr>
							<td style="text-align:center;"><?php echo $v['title'];?></td>
							<td style="text-align:center;"><?php echo $v['presentation'];?></td>
							<td style="text-align:center;"><?php echo $v['snum'];?></td>
							<td style="text-align:center;"><a href="<?php echo site_url('filmreading/show/'.$v['id']);?>">查看</a></td>
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
