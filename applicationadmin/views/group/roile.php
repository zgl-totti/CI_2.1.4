<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>用户组权限管理</h1>
			<?php $this->load->view('group/top_nav');?>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
				
				<?php
					if( isset($info) && $info ){
				?>
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form class="form-horizontal" method="post" action="<?php echo site_url('member/group/roile');?>" name="sitemodelfomr" id="sitemodelfomr" novalidate="novalidate">
							
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th >角色名</th>
											<th >读</th>
											<th >增(改)</th>
											<th >删</th>
											<th >搜索</th>
											<th >导出</th>
											<th >分享</th>
											<th >创建帐号</th>
											<th >组间病历（读）</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($info AS $v){
									?>
										<tr>
											<td>
												<?php echo $v['title'];?>
											</td>
											<td>
												<input type='checkbox' name='addroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['read'] ){ echo 'checked';} ?> />
											</td>
											<td>
												<input type='checkbox' name='updateroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['changes'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='deletesroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['del'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='searchroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['search'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='exportroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['export'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='shareroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['share'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='createroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['adduser'] ){ echo 'checked';} ?>/>
											</td>
											<td>
												<input type='checkbox' name='betweenroile[<?php echo $v['id'];?>]' value="1" <?php if(isset($roile[$v['id']]) && $roile[$v['id']] && $roile[$v['id']]['groups'] ){ echo 'checked';} ?>/>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							
								<div class="form-actions">
									<input type="submit" value="修改权限" name="submit" class="btn btn-primary">
								</div>
							</form>
						</div>
					</div>
				<?php
					}
				?>	
				</div>
			</div>
		</div>
	</div>
		
<?php $this->load->view('common/footer');?>