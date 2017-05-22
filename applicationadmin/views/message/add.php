<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<div id="content">
	<div id="content-header">
		<h1>短信群发</h1>
		<?php $this->load->view('member/top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
			
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">短信群发</a></li>
						</ul>
					</div>
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('message/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							
							<?php 
								if(isset($group) && $group){
							?>
							<div class="control-group">
								<label class="control-label">发送群组</label>
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

							<div class="control-group">
								<label class="control-label">短信内容</label>
								<div class="controls" >
									<textarea rows="3" id="desc" name="desc" ></textarea>
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
	CKEDITOR.replace( 'desc',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});
	$("#manageuserform").validate({
		rules:{
			"desc":{
				required: true
			}
		},
		messages: {
			"desc":{
				required: "短信内容不能为空"
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
