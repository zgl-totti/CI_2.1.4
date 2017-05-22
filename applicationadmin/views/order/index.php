<?php $this->load->view('common/header');?>



<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>订单管理</h1>
			<?php $this->load->view('order/top_nav');?>
		</div>
		
			<!-- <div class="container-fluid">
				<div class="row-fluid" style="padding-top:25px;">
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/11.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('order/main/index');  ?>'><img src="<?php echo base_url('statics/admin/img/index/110.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/5.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('member/main/add');  ?>'><img src="<?php echo base_url('statics/admin/img/index/50.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
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
					</div>

				
			</div>	
		</div> -->


		<div class="container-fluid">

			<div class='row-fluid'>

				<div class='span12'>
					<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('order/main/search');?>">


							<input        id="start"     name='start' type="text"     value="<?php echo $_GET['start']?>"  size="10"            placeholder="开始时间"/>


							<input         id="end"      name='end' type="text" value="<?php echo $_GET['end'] ?>"  size="10"     placeholder="结束时间"/>



							<input id="appendedInputButtons" name='q' type="text" value="<?php echo isset($keywords)?$keywords:'' ?>" placeholder="订单号、电话"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>

					</div>




					<div class="input-append btn-group">
						<input type="button" value="导出" name="button" class="btn" onclick="window.location.href='<?php echo site_url("order/excels/index?q=").$_GET['q'].'&start='.$_GET['start'].'&end='.$_GET['end']?>'" />
					</div>








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
											<th style="width:150px!important;">订单号</th>
										    <th>姓名</th>
										    <th>电话</th>
											<th>商品名称</th>
										    <th>金额</th>
											<th>订单生成时间</th>
											<th>订单状态(用户)</th>
											<th>订单状态(商铺)</th>

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
										<td><?php echo $v['nickname']?></td>
										<td><?php echo $v['phone']?></td>
											<td><?php echo $v['gname'];?></td>
											<td><?php echo $v['total'];?></td>

											<td><?php echo date('Y-m-d H:i:s',$v['add_time']);?></td>
											<td>
											<?php
											if($v['status_user'] == 0){
												echo '未付款';
											}elseif($v['status_user'] == 1) {
												echo '已付款';
											}elseif($v['status_user'] == 2) {
												echo '撤销订单';
											}elseif($v['status_user'] == 3) {
												echo '已兑换';
											}
											?>
											</td>
											<td>
												<?php
											if($v['status_shop'] == 0){
												echo '未处理';
											}elseif($v['status_shop'] == 1) {
												echo '处理中';
											}elseif($v['status_shop'] == 2) {
												echo '已处理';
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
<!-- 引入时间插件 -->
<link href="<?php echo base_url('statics')?>/datetimepicker/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics/default/')?>/js/jquery-3.0.0.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics')?>/datetimepicker/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo base_url('statics')?>/datetimepicker/datepicker-zh_cn.js"></script>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('statics')?>/datetimepicker/time/jquery-ui-timepicker-addon.min.css" />
<script type="text/javascript" src="<?php echo base_url('statics')?>/datetimepicker/time/jquery-ui-timepicker-addon.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('statics')?>/datetimepicker/time/i18n/jquery-ui-timepicker-addon-i18n.min.js"></script>

<script>
function CheckPost(){
	var len = $(".checkboxids:checked").length; 
	if(len == 0){
		alert('请选择要删除的记录');
		return false;
	}
	return true;
}

// 添加时间插件
$.timepicker.setDefaults($.timepicker.regional['zh-CN']);  // 设置使用中文

$("#start").datetimepicker({         //语言选择中文
	dateFormat:"yy-mm-dd",      //格式化日期
	timepicker:false,//关闭时间选项
	todayButton:false

});
$("#end").datetimepicker({            //语言选择中文
	format:"Y-m-d",                    //格式化日期
	timepicker:false,
	todayButton:false
});

</script>

<?php $this->load->view('common/footer'); die;?>
