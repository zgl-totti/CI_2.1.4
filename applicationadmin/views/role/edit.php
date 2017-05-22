<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>修改角色</h1>
		<?php $this->load->view('role/top_nav');?> 
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
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('seeting/role/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" >
							<input type='hidden' name='roleid' value='<?php echo $info["roleid"];?>' />
							<div class="control-group">
								<label class="control-label">角色名称</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="rolename" name="rolename" value="<?php echo $info['rolename'];?>"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">角色描述</label>
								<div class="controls">
									<textarea rows="3" id="description" name="description" style='width:50%'><?php echo $info['description'];?></textarea>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">是否启用</label>
								<div class="controls">
									<label class="radio inline">
										<input type="radio" id="disabled1" name="disabled" value="0" <?php if(!$info['disabled']) { echo "checked";} ?> /> 是
									</label>
									
									<label class="radio inline">
										<input type="radio" id="disabled2" name="disabled" value="1" <?php if($info['disabled']) { echo "checked";}?>> 否
									</label>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">排序</label>
								<div class="controls">
									<input type="text" class="input-mini" id="listorder" name="listorder" value="<?php echo $info['listorder'];?>" />
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
			"rolename":{
				required: true
			}
		},
		messages: {
			"rolename":{
				required: "请输入角色名称"
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
