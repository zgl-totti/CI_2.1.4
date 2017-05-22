<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	

<div id="content">
	<div id="content-header">
		<h1>添加自驾游报名</h1>
		<?php $this->load->view('signup/top_nav');?> 
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
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('signup/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">自驾游活动</label>
								<div class="controls">
									<select name='did' id='did' style="width:350px;">
										<option value="0">请选择报名活动</option>
									<?php foreach ($shops as $key => $value) { ?>
										<option value="<?php echo $value['id']?>"><?php echo $value['title'];?></option>
									<?php }?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">称呼</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="name" name="name" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">联系方式</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="phone" name="phone" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">邮箱</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="mailbox" name="mailbox" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">备注</label>
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
				required: "商品标题不能为空"
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
