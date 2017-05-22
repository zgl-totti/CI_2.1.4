<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>兑换码</h1>
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
											<th style="width:200px!important;">兑换码号</th>
											<!-- <th>姓名</th>
											<th>订单内容</th> -->
											<!-- <th>金额</th> -->
											<!-- <th>订单生成时间</th> -->
											<th>兑换状态(用户)</th>
											<th>兑换状态(商铺)</th>

										</tr>
									</thead>
									<tbody>
									<?php
										foreach($info AS $v){
									?>
										<tr>
											<td>
											<input type="checkbox" name="userid[]" value="<?php echo $v['userid']?>" class="ui-wizard-content checkboxids" /></td>
											<td>
											<input type="text"value="<?php echo $v['ordernum']?>" readOnly="true"/>
											</td>
										<!--	<td><?php echo $v['nickname']?></td>-->
											<!-- <td><?php echo $v['serviceid'];?></td> -->
											<!-- <td></td> -->
										<!-- 	<td><?php echo date('Y-m-d',$v['add_time']);?></td> -->
											<td>
											<?php
											if($v['status_user'] == 0){
												echo '未付款';
											}elseif($v['status_user'] == 1) {
												echo '已付款';
											}elseif($v['status_user'] == 2) {
												echo '撤销订单';
											}elseif($v['status_user'] == 3) {
												echo '已消费';
											}
											?>
											</td>
											<td>
												<?php
											if($v['status_shop'] == 0){
												echo '未受理';
											}elseif($v['status_user'] == 1) {
												echo '操作中';
											}elseif($v['status_user'] == 2) {
												echo '已完成';
											}
											?>
											</td>
											
											
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
								<!-- <div class="form-actions">
									<input type="submit" value="删除" name="submit" class="btn" />
								</div> -->
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
