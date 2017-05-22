<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>添加管理员</h1>
		<?php $this->load->view('manage_user/top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
			<?php
				if(isset($userinfo) && $userinfo) {
			?>
				
			
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">修改</a></li>
						</ul>
					</div>
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('seeting/manage_user/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" >
							<input type='hidden' name='userid' id='userid' value='<?php echo $userinfo["userid"]?>' />
							<div class="control-group">
								<label class="control-label">用户名</label>
								<div class="controls">
									<?php echo $userinfo["username"];?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">密码</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="password" name="password" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">确认密码</label>
								<div class="controls">
									<input type="password" class="input-xlarge" id="pwdconfirm" name="pwdconfirm" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">E-mail</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="email" name="email" value='<?php echo $userinfo["email"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="realname" name="realname" value='<?php echo $userinfo["realname"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">所属角色</label>
								<div class="controls">
									<select name='roleid' id='roleid'>
										<?php
											if( isset($role) && $role ){
												foreach($role AS $rv) {
										?>
										<option value="<?php echo $rv['roleid'];?>" <?php if($userinfo['roleid'] == $rv['roleid']) {echo "selected";} ?>>
											<?php echo $rv['rolename'];?>
										</option>
										<?php
												}
											}
										?>
									</select>
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
				未查找到角色信息！
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
			password:{
				minlength:6,
				maxlength:20
			},
			pwdconfirm:{
				minlength:6,
				maxlength:20,
				equalTo:"#password"
			},
			email:{
				required:true,
				email: true
			}
		},
		messages: {
			password:{
				required: "请输入密码",
				minlength: jQuery.format("密码不能小于{0}个字符")
			},
			pwdconfirm:{
				required: "请输入确认密码",
				minlength: "确认密码不能小于{0}个字符",
				equalTo: "两次输入密码不一致不一致"
			},
			email:{
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
		onfocusout: function(element) { $(element).valid(); }
	});
})
</script>
<?php $this->load->view('common/footer');?>
