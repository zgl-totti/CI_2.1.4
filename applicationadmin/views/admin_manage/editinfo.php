<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
		<div id="content">
			<div id="content-header">
				<h1>个人资料</h1>
			</div>
			<div class="container-fluid">
				<?php
					if(isset($changepwdmessage) && $changepwdmessage){
				?>
				<div class="row-fluid">
					<div class="span12">
						<?php
							if( isset($changepwdstatus) && $changepwdstatus == 2){
						?>
					
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close">×</button>
							<?php echo $changepwdmessage;?>
						</div>
						<?php
							}
							if( isset($changepwdstatus) && $changepwdstatus == 1 ){
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
							
							
							
							<div class="widget-content nopadding myadminform ">
								<form class="form-horizontal" method="post" action="" name="password_validate" id="password_validate" novalidate="novalidate" />
								
									<div class="control-group">
										<label class="control-label">用户名</label>
										<div class="controls">
											<?php echo $username;?>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">最后登录时间</label>
										<div class="controls">
											<?php echo date('Y-m-d H:i:s',$lastlogintime);?>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">最后登录IP</label>
										<div class="controls">
											<?php echo $lastloginip;?>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">邮箱</label>
										<div class="controls">
											 <input type="text" name="email" id="email" value='<?php echo $email;?>'>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label">真实姓名</label>
										<div class="controls">
											<input type="text" name="realname" id="realname" value='<?php echo $realname;?>'/>
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
			email:{
				required:true,
				email: true
			}
		},
		messages: {
			email: {
				required: "请输入Email地址",
				email: "请输入正确的email地址"
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
