<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	

<div id="content">
	<div id="content-header">
		<h1>添加活动</h1>
		<?php $this->load->view('driving/top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
			
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">添加</a></li>
						</ul>
					</div>
					
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('driving/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">活动标题</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="title" name="title" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">组织方</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="organization" name="organization" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> 活动时间</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="atime" name="atime" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">活动路线</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="route" name="route" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">报名截止</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="deadline" name="deadline" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">活动地点（集合地点）</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="place" name="place" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">活动负责人</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="responsible" name="responsible" value=""/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">活动负责人电话</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="phone" name="phone" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">上传图片</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">活动详细介绍</label>
								<div class="controls" >
									<textarea rows="3" id="details" name="details" ></textarea>
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
	CKEDITOR.replace( 'details',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});
	$("#manageuserform").validate({
		rules:{
			"title":{
				required: true
			}
		},
		messages: {
			"title":{
				required: "活动名称不能为空"
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
