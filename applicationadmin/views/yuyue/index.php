<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>会员管理</h1>
			<?php $this->load->view('yuyue/top_nav');?>
		</div>
		<div class="container-fluid">
				
			<div class="container-fluid">
				<div class="row-fluid" style="padding-top:25px;">
					<!-- <div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/11.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('order/main/index');  ?>'><img src="<?php echo base_url('statics/admin/img/index/110.png');  ?>" alt="" width='100'></a></div>
					</div> -->
					<!-- <div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/5.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('member/main/add');  ?>'><img src="<?php echo base_url('statics/admin/img/index/50.png');  ?>" alt="" width='100'></a></div>
					</div> -->
					<!-- <div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/2.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/6.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/3.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/7.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/4.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/8.png');  ?>" alt="" width='100'></a></div>
					</div> -->

				
			</div>	
		</div>
		</div>
		<div class="container-fluid">
			
			<div class='row-fluid'>
				<div class='span12'>
				<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('yuyue/main/search');?>">
							<input id="appendedInputButtons" name='q' type="text" placeholder="手机号">
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
						
					</div>
					
					<!-- <div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('member/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="card_id !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>已开通</button>
						</form>
					</div> -->
					<!-- <div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('member/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="activation !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>已激活</button>
						</form>
					</div> -->
					<div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('yuyue/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="phone !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>手机号</button>
						</form>
					</div>
					<div class="input-append btn-group">
							<input type="button" value="订单列表" name="button" class="btn" onclick="window.location.href='<?php echo site_url("order/main/index")?>'" />
					</div>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('yuyue/main/deletes')?>" >
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width='20'>
												<input type="checkbox" name="title-checkbox" id="title-checkbox">
											</th>
											
									
											<th>手机</th>
											<th>预约金额</th>
											
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
											
											
											
											<td><?php echo $v['telephone'];?></td>
											<td><?php echo $v['price'];?></td>
											
											
											
											<td>
												<a href='<?php echo site_aurl('yuyue/main/edit/'.$v['userid']);?>'>[修改]</a>
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
