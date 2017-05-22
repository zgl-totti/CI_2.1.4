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
				<p class="inline-block btn-border">共计 <span class="red"><?php echo $total;?></span> 条记录</p>
				
				<p class="inline-block btn-border">
					<a href="<?php echo site_url('home/search');?>">高级搜索</a> 
				</p>
				
				<div class="absolute right" style='top:12px;'>
					<form class="form-search" method='get' action="<?php echo site_url('home/search')?>">
						<input class='homesearch' type="text" placeholder="医院编号、门诊号、住院号、患者姓名" name='search' />
						<input type="submit" name='submit' value='搜索'/>
					</form>
				</div>
				
			</div>
			
			<div class="item-list">
			<?php
				if(isset($info) && $info){
			?>
				<table class="table-cont" width="100%">
					<tbody>
						<tr>
							
							<th width='250'>医院编号</th>
							<th>门诊号</th>
							<th>姓名</th>
							<th>性别</th>
							<th>年龄</th>
							<th>DPN</th>
							<th>录入时间</th>
							<th width='80'>操作</th>
						</tr>
					<?php
						foreach($info as $v){
					?>	
						<tr>
							<td>
								<?php echo $v['results'];?>
								<?php if(isset($hospital) && $hospital && isset($hospital[$v['results']])){ echo '( '.$hospital[$v['results']].' )';}?>
							</td>
                            <td><?php echo $v['hnumber'];?></td>
							<td><?php echo $v['names'];?></td>
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
								<?php echo $v['age'];?>
							</td>
							<td>
								<?php
									if($v['mellitus'] == 1){
										echo '1型';
									}elseif($v['sex'] == 2){
										echo '2型';
									}
								?>
							</td>
							<td>
								<?php
									echo date('Y-m-d',$v['add_time']);
								?>
							</td>
							<td>
								<a href="<?php echo site_url('home/edit/'.$v['id']);?>">查看</a>
								<?php
									if($group == 1){
								?>
								|
								<a href="javascript:;" onclick='deletes(<?php echo $v['id'];?>,this)'>删除</a>
								<?php
									}
								?>
							</td>
						</tr>
					<?php
						}
					?>	
						
					</tbody>
				</table>
				
			<?php
				}else{
			?>
				<div class="title">
					<h2>暂无信息！</h2>
				</div>
			
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

<script>
	function deletes(id,obj){
		if(! id ){
			return false;
		}
		
		var confirm	=	window.confirm('确诊删除吗？');
		if( confirm ){
			$.ajax({
				type: "POST",
				url	: "<?php echo site_url('home/deletes');?>",
				data: { id: id },
				success: function(msg){
					if(msg && msg > 0){
						$(obj).parent('td').parent('tr').remove();
						return true;
					}
					alert('删除失败！');
				}
			});
		}
	}
</script>

<?php 
templates('global','footer');
?>
