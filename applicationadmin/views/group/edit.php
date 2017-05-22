<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>用户组管理</h1>
		<?php $this->load->view('group/top_nav');?> 
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('member/group/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='groupid' id='groupid' value='<?php echo $info["id"]?>' />
							<div class="control-group">
								<label class="control-label">组名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="title" name="title" value='<?php echo $info['title'];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls">
									<textarea rows="5" class='input-xxlarge' name='description' id='description'><?php echo $info['description'];?></textarea>
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
			title:{
				required: true
			}
		},
		messages: {
			title: {
				required: "请输入用户组名"
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
