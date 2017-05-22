<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>用户管理</h1>
		<?php $this->load->view('member/top_nav');?> 
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('member/main/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='userid' id='userid' value='<?php echo $info["userid"]?>' />
							<div class="control-group">
								<label class="control-label">姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="nickname" name="nickname" value='<?php echo $info["nickname"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">性别</label>
								<div class="controls">
									<label class="radio inline">
										<input type="radio" name="sex" value="1" <?php if($info['sex'] && $info['sex'] == 1){echo 'checked';}?>/>男
									</label>
									<label class="radio inline">
										<input type="radio" name="sex" value="2" <?php if($info['sex'] && $info['sex'] == 2){echo 'checked';}?>/>女
									</label>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">出生年月</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="birthday" name="birthday" value='<?php echo $info["birthday"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="telephone" name="telephone" value='<?php echo $info["telephone"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">E-mail</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="email" name="email" value='<?php echo $info["email"];?>'/>
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label">手机号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="phone" name="phone" value='<?php echo $info["phone"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">身份证号码</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="number" name="number" value='<?php echo $info["number"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">微信号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="wechat" name="wechat" value='<?php echo $info["wechat"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">QQ</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="qq" name="qq" value='<?php echo $info["qq"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">籍贯</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="origin" name="origin" value='<?php echo $info["origin"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">家庭住址</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="address" name="address" value='<?php echo $info["address"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">婚姻状况</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="marital" name="marital" value='<?php echo $info["marital"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">工作单位</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="work" name="work" value='<?php echo $info["work"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">职务</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="post" name="post" value='<?php echo $info["post"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">兴趣爱好</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="hobby" name="hobby" value='<?php echo $info["hobby"];?>'/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">车牌号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="plate" name="plate" value='<?php echo $info["plate"];?>'/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">驾驶证号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="license" name="license" value='<?php echo $info["license"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">准驾车型</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="type" name="type" value='<?php echo $info["type"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">驾照年审日期</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="limited" name="limited" value='<?php echo $info["limited"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">驾照换证日期</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="renewal" name="renewal" value='<?php echo $info["renewal"];?>'/>
								</div>
							</div>
							
							<?php 
								if(isset($group) && $group){
							?>
							<div class="control-group">
								<label class="control-label">角色</label>
								<div class="controls">
								<?php
									foreach($group as $k => $v){
								?>
									<label class="radio inline">
										<input type="radio" name="group" value="<?php echo $v['id'];?>" <?php if($info['group'] && $info['group'] == $v['id']){echo 'checked';}?>/><?php echo $v['title'];?>
									</label>
								<?php
									}
								?>
								</div>
							</div>
							<?php
								}
							?>
									
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
			pwdconfirm:{
				equalTo:"#password"
			},
			email:{
				required:true,
				email: true
			},
			phone:{
				required:true,
				phone: true
			}
		},
		messages: {
			pwdconfirm:{
				equalTo: "两次输入密码不一致不一致"
			},
			email:{
				required: "请输入Email地址",
				email: "请输入正确的email地址"
			},
			phone:{
				required: "请输入手机号地址",
				phone: "请输入正确的手机号"
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
