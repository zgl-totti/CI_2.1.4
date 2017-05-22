<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>关于我们管理</h1>
			<?php $this->load->view('about/top_nav');?> 
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
				
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
						<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('about/main/deletes')?>" >
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width='20'>
												<input type="checkbox" name="title-checkbox" id="title-checkbox">
										</th>
										<th>ID</th>
										<th>标题</th>
										<th>访问量</th>
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
										<td><?php echo $v['id'];?></td>
										<td><?php echo $v['auth'];?></td>							
										<td><?php echo $v['counts'];?></td>
										<td><?php echo $v['dates'];?></td>
										
										<td>
											<a href='<?php echo site_aurl('about/main/edit/'.$v['id']);?>'>[修改]</a>
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
						暂无相关专家信息！
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
