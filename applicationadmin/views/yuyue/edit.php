<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>用户管理</h1>
		<?php $this->load->view('yuyue/top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
				<?php
					if(isset($info) && $info){
				?>
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">修改</a></li>
						</ul>
					</div>
					<div class="widget-content nopadding">
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('yuyue/main/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='userid' id='userid' value='<?php echo $info["userid"]?>' />
							<div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="realname" name="realname" value='<?php echo $info["realname"];?>'/>
								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="telephone" name="telephone" value='<?php echo $info["telephone"];?>'/>
								</div>
							</div>
							
							
							
							

							<div class="control-group">
								<label class="control-label">预约金额</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="price" name="price" value='<?php echo $info["price"];?>'/>
								</div>
							</div>
							
							<div class="form-actions">
								<input type="submit" value="确定" name="submit" class="btn btn-primary" />
							</div>
						</form>
						
					
					</div>
				</div>
			<?php
				}else{
			?>
			<div class="alert alert-error">
				未查找到用户信息！
			</div>
			<?php
				}
			?>
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
				required: "请输入身份证",
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
