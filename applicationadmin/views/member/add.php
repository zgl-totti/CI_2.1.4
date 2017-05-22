<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>添加用户</h1>
		<?php $this->load->view('member/top_nav');?> 
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
							
							<!-- <div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="realname" name="realname" value=''/>
								</div>
							</div> -->

							
							<div class="control-group">
								<label class="control-label">微信昵称</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="nickname" name="nickname" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">性别</label>
								<div class="controls">
									<label class="radio inline">
										<input type="radio" name="sex" value="1" checked />男
									</label>
									<label class="radio inline">
										<input type="radio" name="sex" value="2" />女
									</label>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商铺关联</label>
								<div class="controls">
									<select name="shop_id" class="input-xlarge">
										<option value="0">请选择</option>
											<?php foreach($shops as $v){
												if($info['shop_id'] == $v['id']){
													$selected='selected';
												}else{
													$selected='';
												}
											?>
										<option value="<?php echo $v['id']?>" <?php echo $selected;?>><?php echo $v['shopsname']?></option>
										<?php }?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">城市</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="origin" name="city" value=""/>
								</div>
							</div>
							
							
							<!-- <div class="control-group">
								<label class="control-label">出生年月</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="birthday" name="birthday" />
								</div>
							</div> -->
							
							<!-- <div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="telephone" name="telephone" />
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">E-mail</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="email" name="email" value=''/>
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label">手机号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="phone" name="phone" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">身份证号码</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="number" name="number" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">微信号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="wechat" name="wechat" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">QQ</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="qq" name="qq" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">籍贯</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="origin" name="origin" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">家庭住址</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="address" name="address" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">婚姻状况</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="marital" name="marital" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">工作单位</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="work" name="work" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">商铺id</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="post" name="post" value=''/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">兴趣爱好</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="hobby" name="hobby" value=''/>
								</div>
							</div> -->
							<!-- <div class="control-group">
								<label class="control-label">车牌号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="plate" name="plate" value=''/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">驾驶证号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="license" name="license" value=''/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">准驾车型</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="type" name="type" value=''/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">驾照年审日期</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="limited" name="limited" value=''/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">驾照换证日期</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="renewal" name="renewal" value=''/>
								</div>
							</div>
 -->

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
										<input type="radio" name="group" value="<?php echo $v['id'];?>" /><?php echo $v['title'];?>
									</label>
								<?php
									}
								?>
								</div>
							</div>
							<?php
								}
							?>


							<?php 
								if(isset($admin) && $admin && $userid == 1){
							?>
							<div class="control-group">
								<label class="control-label">绑定管理员权限</label>
								<div class="controls">
								<?php
									foreach($admin as $k => $v){
								?>
									<label class="radio inline">
										<input type="radio" name="admin" value="<?php echo $v['userid'];?>" /><?php echo $v['realname'];?>
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
