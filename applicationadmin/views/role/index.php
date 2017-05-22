<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>管理员角色管理</h1>
			<?php $this->load->view('role/top_nav');?>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form class="form-horizontal" method="post" action="<?php echo site_aurl('seeting/role/listorder');?>" name="sitemodelfomr" id="sitemodelfomr" novalidate="novalidate" >
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width='80'>排序</th>
											<th>ID</th>
											<th>角色名称</th>
											<th>角色描述</th>
											<th>状态</th>
											<th>管理操作</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($info AS $v){
									?>
										<tr>
											
											<td>
												<input name="listorders[<?php echo $v['roleid'];?>]" type="text" value="<?php echo $v['listorder'];?>" class="input-mini" />
											
											</td>
											<td><?php echo $v['roleid'];?></td>
											<td><?php echo $v['rolename'];?></td>
											<td><?php echo $v['description'];?></td>
											<td>
												<?php 
													if($v['disabled']){
														echo '<i class="icon-remove"></i>';
													}else{
														echo '<i class="icon-ok"></i>';
													}
												?>
											</td>
											<td>
												<?php
													if($v['roleid'] == 1){
												?>
												<a href='javascript:;' class='muted'>修改</a> | 
												<a href='javascript:;' class='muted'>删除</a>
												<?php
													}else{
												?>
												<a href='<?php echo site_aurl("seeting/role/priv/".$v['roleid']);?>'>权限设置</a> | 
												<a href='<?php echo site_aurl("seeting/role/edit/".$v['roleid']);?>'>修改</a> | 
												<a href='javascript:confirmurl("<?php echo site_aurl("seeting/role/deletes/".$v['roleid']);?>","确认删除吗？")'>删除</a>
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
								<div class="form-actions">
									<input type="submit" value="排序" name="submit" class="btn btn-primary" />
								</div>
							</form>
						</div>
					</div>
					<?php
						}else{
					?>
					<div class="alert alert-error">
						<button data-dismiss="alert" class="close">×</button>
						暂无相关模型信息！
					</div>
					
					
					<?php 
						}
					
						if(isset($pages) && $pages && isset($info) && $info) {
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

		
<script src="<?php echo base_url('statics/admin/js/jquery.ui.custom.js');?>"></script>
<script src="<?php echo base_url('statics/admin/js/jquery.uniform.js');?>"></script>
<script src="<?php echo base_url('statics/admin/js/select2.min.js');?>"></script>	
<script src="<?php echo base_url('statics/admin/js/jquery.dataTables.min.js');?>"></script>
		
<script src="<?php echo base_url('statics/admin/js/unicorn.tables.js');?>"></script>	

<?php $this->load->view('common/footer');?>
