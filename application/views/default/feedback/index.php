<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/patients.css');?>" type="text/css"/>
<div class="main-board">
	<?php
		templates('home','left');
	?>
	<div class="dataview-board inline-box addpatients">
		<div class="inner">
			
			
			<div class="item-list managepa">
				<div class="inline-block pathtimes">
					<a href="<?php echo site_url('feedback/add');?>" class="btn-border linkptime">添加反馈</a>
				</div>
				<?php
					if(isset($info) && $info){
				?>
				<table class='table-cont' width="100%">
					<tr>
						<td width='100'>手机号</td>
						<td width='100'>邮箱</td>
						<td>反馈内容</td>
						
					</tr>
					<?php
						foreach($info as $v){
						
					?>
					<tr>
						<td><?php echo $v['phone'] ? $v['phone'] : '-';?></td>
						<td><?php echo $v['email'] ? $v['email'] : '-';?></td>
						<td><?php echo $v['content'] ? $v['content'] : '-';?></td>
					</tr>
					<?php
						}
					?>
				</table>
				
				<?php
					}
				?>
				
			</div><!-- list end -->
			<?php
				if(isset($pages) && $pages){
					echo $pages;
				}
			?>
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>

<?php 
templates('global','footer');
?>
