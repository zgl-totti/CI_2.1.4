<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>添加用户</h1>
		<?php $this->load->view('yuyue/top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
			
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">添加用户</a></li>
						</ul>
					</div>
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('member/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							
							<div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="realname" name="realname" value=''/>
								</div>
							</div>

							
							
							
							
							
							<div class="control-group">
								<label class="control-label">手机号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="telephone" name="telephone" value=''/>
								</div>
							</div>
							
							
							

							<div class="control-group">
								<label class="control-label">预约金额</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="price" name="price" value=''/>
								</div>
							</div>
							
							
							
							<div class="form-actions">
								<input type="submit" value="确定" name="submit" class="btn btn-primary" />
							</div>
						</form>
					</div>
				</div>
				
			</div>
		
		</div>
		
	</div>
</div>
	
<script src="<?php echo base_url('statics/admin/js/jquery.validate.js');?>"></script>	
<script>
$(function(){
	$("#manageuserform").validate({
		rules:{
			nickname:{
				required: true,

			},
			birthday:{
				required: true,

			},
			number:{
				required: true,
			},
			telephone:{
				required:true,
				telephone: true,
			},
			phone:{
				required:true,
				phone: true,
			},
			license:{
				required: true,
			},
			plate:{
				required: true,
			},
		},
		messages: {
			nickname: {
				required: "请输入姓名",
			},
			birthday:{
				required: "请输入出生年月",
			},
			number:{
				required: "请输入确认密码",
			},
			telephone:{
				required: "请输入联系电话",
			},
			phone:{
				required: "请输入手机号",
			},
			license:{
				required: "请输入驾驶证号",
			},
			plate:{
				required: "请输入车牌号",
			},
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('success');
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').removeClass('success');
		},
		onfocusout: function(element) { $(element).valid(); }
	});
})
</script>
<?php $this->load->view('common/footer');?>
