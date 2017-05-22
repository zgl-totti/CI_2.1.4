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
				<table class='table-cont' width="100%">
					<tr>
						<td width='150'>标题</td>
						<td><?php echo $title;?></td>
						<td width='150'>介绍</td>
						<td><?php echo $presentation;?></td>
					</tr>
					<tr>
					     <td width="150">添加附件</td>
					     <td><input type="file" name="attachmends[]"/><br/><input type="file" name="attrchmends[]"/></td>
					</tr>
				</table>
				
				<?php
					if($imgs){
				?>
				<div class="image-set">
					<?php
						foreach($imgs as $k => $v){
					?>
					<a class="example-image-link" href="<?php echo $v;?>" data-lightbox="example-set" ><img class="example-image" src="<?php echo $v;?>" alt="" style='width:120px;height:90px;'></a> 
					<?php
						}
					?>
				</div>
				<?php
					}
				?>

				<a href='<?php echo site_url('filmreading/down/'.$id);?>'>下载图片</a>
			</div><!-- list end -->
		</div><!-- inner end -->	
	</div><!-- dataview end -->
</div>

<link rel="stylesheet" href="<?php echo base_url('statics/global/lightbox/css/lightbox.css');?>">
<script src="<?php echo base_url('statics/global/lightbox/js/lightbox.js');?>"></script>

<?php 
templates('global','footer');
?>
