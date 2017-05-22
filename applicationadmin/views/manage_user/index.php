<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>管理员列表</h1>
			<?php $this->load->view('manage_user/top_nav');?>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>序号</th>
										<th>用户名</th>
										<th>所属角色</th>
										<th>最后登录IP</th>
										<th>最后登录时间</th>
										<th>E-mail</th>
										<th>真实姓名</th>
										<th>管理操作</th>
									</tr>
								</thead>
								<tbody>
								<?php
									foreach($info AS $v){
								?>
									<tr>
										
										<td><?php echo $v['userid'];?></td>
										<td><?php echo $v['username'];?></td>
										<td>
											<?php 
												if( $v['roleid'] && isset($roleInfo) && 
													array_key_exists($v['roleid'],$roleInfo) ){
													echo $roleInfo[$v['roleid']]['rolename'];
												}else{
													echo '-';
												}
											?>
										</td>
										<td>
											<?php 
												if($v['lastloginip']){
													echo $v['lastloginip'];
												}else{
													echo '-';
												}
											?>
										</td>
										<td>
											<?php 
												if( $v['lastlogintime']) {
													echo date('Y-m-d H:i:s',$v['lastlogintime']);
												}else{
													echo '-';
												}
											?>
										</td>
										<td><?php echo $v['email'];?></td>
										<td><?php echo $v['realname'];?></td>
										
										<td>
											<a href='<?php echo site_aurl('seeting/manage_user/edit/'.$v['userid']);?>'>修改</a> | 
											<?php
												if($v['userid'] == 1){
											?>
											<a href='javascript:;' class='muted'>删除</a>
											<?php
												}else{
											?>
											<a href='javascript:confirmurl("<?php echo site_aurl('seeting/manage_user/deletes/'.$v['userid']);?>","确认删除吗？")' >删除</a>
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
