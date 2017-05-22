<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
		<div id="content">
			<div id="content-header">
				<h1>修改密码</h1>
			</div>
			<div class="container-fluid">
				<?php
					if(isset($changepwdmessage) && $changepwdmessage){
				?>
				<div class="row-fluid">
					<div class="span12">
						<?php
							if( isset($changepwdstatus) && $changepwdstatus == 3){
						?>
					
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close">×</button>
							<?php echo $changepwdmessage;?>
						</div>
						<?php
							}
							if( isset($changepwdstatus) && ($changepwdstatus == 1 ||  $changepwdstatus == 2)){
						?>
						
						<div class="alert alert-error">
							<button data-dismiss="alert" class="close">×</button>
							<?php echo $changepwdmessage;?>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<?php
					}
				?>
				
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="icon-align-justify"></i>									
								</span>
								<h5></h5>
							</div>
							
							<div class="widget-content nopadding myadminform">
								<form class="form-horizontal" method="post" action="<?php echo site_aurl('admin/admin_manage/editpwd')?>" name="password_validate" id="password_validate" novalidate="novalidate" />
								
									<div class="control-group">
										<label class="control-label">用户名</label>
										<div class="controls">
											<?php echo $username;?>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">邮箱</label>
										<div class="controls">
											<?php echo $email;?>
										</div>
									</div>
								
									<div class="control-group">
										<label class="control-label">原密码</label>
										<div class="controls">
											<input type="password" name="oldpwd" id="oldpwd" />
										</div>
									</div>
								
									<div class="control-group">
										<label class="control-label">新密码</label>
										<div class="controls">
											<input type="password" name="pwd" id="pwd" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">确认密码</label>
										<div class="controls">
											<input type="password" name="pwd2" id="pwd2" />
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="保存" name='submit' class="btn btn-primary" />
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
	$("#password_validate").validate({
		rules:{
			oldpwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			pwd2:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#pwd"
			}
		},
		messages: {
			oldpwd: {
				required: "请输入旧密码",
				minlength: jQuery.format("密码不能小于{0}个字 符")
			},
			pwd: {
				required: "请输入新密码",
				minlength: jQuery.format("密码不能小于{0}个字 符")
			},
			pwd2: {
				required: "请输入确认密码",
				minlength: "确认密码不能小于{0}个字符",
				equalTo: "两次输入密码不一致不一致"
			}
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
		onfocusout: function(element) { 
			  $(element).valid(); 
		}
	});
})
</script>
<?php $this->load->view('common/footer');?>
