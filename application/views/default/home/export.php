<?php 
$tempci	=	& get_instance(); 
templates('global','header');
templates('global','top');

?>
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>
<div class="main-board">
			
	<?php
		templates('home','left');
	?>
	
	<div class="dataview-board inline-box">
		<div class="inner">
			<div class="overview" style='position:relative;'>
				<p class="inline-block btn-border">搜索条数 <span class="red"><?php echo $total;?></span> 人</p>
				
				<?php 
					if(isset($info) && $info){
						
				?>
				<p class="inline-block btn-border">
					<a href="<?php echo site_url('export/index/'.$eurl);?>">导出</a> 
				</p>
				<?php 
					} 
				?>
				
				<br/></br/>
				<div class=" " >
					<form class="form-search" method='get' action="<?php echo site_url('home/export')?>">
						<input type="text" placeholder="医院编号、门诊号、住院号、患者姓名" name='search' class='homesearch' value='<?php echo $searchkey;?>'/>
						
						<select name='result' id='result'  class='searchselect'>
							<option value ="0">请选择</option>
							<?php
								foreach($result AS $k=>$v){
							?>
							<option value="<?php echo $k;?>" <?php if($sqlresult == $k){ echo 'selected';}?>><?php echo $v;?></option>
							<?php
								}
							?>
						</select>
						
						
						<?php
							$btime	=	date('Y-m-01', strtotime(date("Y-m-d")));
							$etime	=	date('Y-m-d', mktime(23,59,59,date('m'),date('t'),date('Y')));
						?>
						<input type="text" name='btimes' class='homesearchdate' value='<?php echo $btimes ? $btimes : $btime ;?>'/> - 
						<input type="text" name='etimes' class='homesearchdate' value='<?php echo $etimes ? $etimes : $etime;?>' />
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
							</td>
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
<script src="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.js');?>" type="text/javascript" charset="utf-8"></script>

<script>
$(function(){
	var nowDate	=	new Date();
	var nyear	=	nowDate.getFullYear();
	$(".homesearchdate").manhuaDate({                        
		Event 	: "click",//可选                     
		Left 	: 0,//弹出时间停靠的左边位置
		Top 	: -16,//弹出时间停靠的顶部边位置
		fuhao 	: "-",//日期连接符默认为-
		isTime 	: false,//是否开启时间值默认为false
		beginY 	: 2000,//年份的开始默认为1949
		endY 	: nyear//年份的结束默认为2049
	});
	
})
</script>

<?php 
templates('global','footer');
?>
