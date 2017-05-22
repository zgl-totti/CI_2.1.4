<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>订单管理</h1>
			<?php $this->load->view('order/top_nav');?>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('order/main/deletes')?>" >
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width='20'>
												<input type="checkbox" name="title-checkbox" id="title-checkbox">
											</th>
											<th>用户ID</th>
											<th>姓名</th>
											<th>邮箱</th>
											<th>手机</th>
											<th>角色</th>
											<th>开通会员卡</th>
											
											<th>管理操作</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($info AS $v){
									?>
										<tr>
											<td>
											<input type="checkbox" name="userid[]" value="<?php echo $v['userid']?>" class="ui-wizard-content checkboxids" /></td>
											<td><?php echo $v['userid'];?></td>
											<td><?php echo $v['nickname']?></td>
											<td><?php echo $v['email'];?></td>
											<td><?php echo $v['phone'];?></td>
											<td>
												<?php if(!empty($v['card_id'])){ ?>
												<a href='<?php echo site_aurl('card/main/edit/'.$v['card_id']);?>'>[已开通]</a>
												<?php }else{ ?>
												<a href='<?php echo site_aurl('card/main/add/'.$v['userid']);?>'>[开通会员]</a>
												<?php } ?>
											</td>
											
											<td>
												<a href='<?php echo site_aurl('order/main/edit/'.$v['userid']);?>'>[修改]</a>
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
