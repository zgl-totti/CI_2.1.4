<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>项目搜索</h1>
			<?php $this->load->view('driving/top_nav');?>
			
		</div>
		<div class="container-fluid">
			<div class='row-fluid'>
				<div class='span12'>
					<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('driving/main/search');?>">
							<input id="appendedInputButtons" name='q' type="text" placeholder="项目名称"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
					</div>
				</div>
			</div>
			
			<div class='row-fluid'>
				
			
				<div class='span12'>
				
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
						<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('driving/main/deletes')?>" >
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width='20'>
											<input type="checkbox" name="title-checkbox" id="title-checkbox">
										</th>
										<th>活动标题</th>
										<th>组织方</th>
										<th>时间</th>
										<th>地点</th>
										<th>联系电话</th>
										<th>添加时间</th>
										<th>管理操作</th>
									</tr>
								</thead>
								<tbody>
								<?php
									foreach($info AS $v){
								?>
									<tr>
										<td>
											<input type="checkbox" name="id[]" value="<?php echo $v['id']?>" class="ui-wizard-content checkboxids" />
										</td>
										<td style="text-align:center"><?php echo $v['title'];?></td>
										<td style="text-align:center"><?php echo $v['organization'];?></td>
										<td style="text-align:center"><?php echo $v['atime'];?></td>
										<td style="text-align:center"><?php echo $v['place'];?></td>
										<td style="text-align:center"><?php echo $v['phone'];?></td>
										<td style="text-align:center"><?php echo date('Y-m-d',$v['add_time']);?></td>
										<td>
											<a href='javascript:;' class='status' ref='<?php echo $v['id'];?>' data='<?php echo $v['status'];?>'>
												<?php 
													if($v['status']){ 
														echo '已推荐';
													}else{ 
														echo '<font color="red">未推荐</font>';
													}
												?>
											</a> 
										</td>
										
										<td>
											<a href='<?php echo site_aurl('driving/main/edit/'.$v['id']);?>'>[修改]</a>
										</td>
									</tr>
								<?php
									}
								?>
								</tbody>
							</table>
							<div class="form-actions">
									<input type="submit" value="删除" name="submit" class="btn" />
								</div>
							</form>
						</div>
					</div>
					<?php
						}else{
					?>
					<div class="alert alert-error">
						<button data-dismiss="alert" class="close">×</button>
						暂无相关项目信息！
					</div>
					
					<?php 
						}
					
						if(isset($pages) && $pages ) {
					?>
					<div class='pagination'>
						<?php echo $pages;?>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	
	
<?php $this->load->view('common/footer');?>
