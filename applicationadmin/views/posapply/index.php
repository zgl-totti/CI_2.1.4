<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>POS机管理</h1>
			<?php //$this->load->view('loan/top_nav');?>
		</div>
		<div class="container-fluid">
				
			<div class="container-fluid">
				<div class="row-fluid" style="padding-top:25px;">


				
			</div>	
		</div>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
				<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('posapply/main/search');?>">
							<input id="appendedInputButtons" name='q' type="text" value="<?php echo isset($keywords)?$keywords:'' ?>" placeholder="个人/企业名称"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>

					</div>

					<div class="input-append btn-group">
						<input type="button" value="导出" name="button" class="btn" onclick="window.location.href='<?php echo site_url("posapply/excels/index?q=").$_GET['q']?>'" />
					</div>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('posapply/main/del')?>" >
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width='20'>
												<input type="checkbox" name="title-checkbox" id="title-checkbox">
											</th>

											<th>ID</th>
											<th>个人/企业名称</th>
											<th>营业执照号</th>
											<th>联系电话</th>
											<th>地址</th>
											<th>所在乡镇</th>
											<th>申请时间</th>
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
											<input type="checkbox" name="id[]" value="<?php echo $v['id']?>" class="ui-wizard-content checkboxids" /></td>

											<td><?php echo $v['id'];?></td>
											<td><?php echo $v['username']?></td>
											<td><?php echo $v['businessLicense']?></td>
										    <td><?php echo $v['phone'];?></td>
										    <td><?php echo $v['address'];?></td>
										    <td><?php echo $v['szdz'];?></td>
											<td>
												<?php echo date('Y-m-d  H:i:s', $v['time']);?>
											</td>

											<td><?php echo $v['status']==1?'未处理':'已处理';?></td>
											<td>
												<a href="<?php echo site_url('posapply/main/edit/'.$v['id']);?>">[修改]</a>
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
						当天暂无相关用户！
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
<link rel="stylesheet" href="<?php echo base_url('statics/admin/css/uniform.css');?>" />
<script src="<?php echo base_url('statics/admin/js/jquery.ui.custom.js');?>"></script>
<script src="<?php echo base_url('statics/admin/js/jquery.uniform.js');?>"></script>
<script src="<?php echo base_url('statics/admin/js/select2.min.js');?>"></script>	
<script src="<?php echo base_url('statics/admin/js/jquery.dataTables.min.js');?>"></script>
		
<script src="<?php echo base_url('statics/admin/js/unicorn.tables.js');?>"></script>	

<script>
function CheckPost(){
	var len = $(".checkboxids:checked").length; 
	if(len == 0){
		alert('请选择要删除的记录');
		return false;
	}
	return true;
}
</script>

<?php $this->load->view('common/footer');?>
