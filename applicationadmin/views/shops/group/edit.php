<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<div id="content">
	<div id="content-header">
		<h1>店面组管理</h1>
		<?php $this->load->view('shops/group/menu_top_nav');?> 
	</div>
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
				<?php
					if( isset($info) && $info ){
				?>
				<div class="widget-box">
					<div class="widget-title">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#tab1">编辑</a></li>
						</ul>
					</div>
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('shops/group/edit');?>" name="menuform" id="menuform" novalidate="novalidate" >
							<input type='hidden' name='tableid' id='tableid' value='<?php echo $info["id"]?>' />
							<div class="control-group">
								<label class="control-label">上级路径</label>
								<div class="controls">
									<select name='parentid' id='parentid'>
										<option value="0">请选择</option>
										<?php echo $select_categorys;?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							
						
							<div class="control-group">
								<label class="control-label">栏目名称</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="name" name="name" value="<?php echo $info['name'];?>" />
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">描述</label>
								<div class="controls" >
									<textarea rows="3" id="contents" name="contents" ><?php echo $info['content'];?></textarea>
								</div>
							</div>
							
							
							<div class="control-group">
								<label class="control-label">是否显示</label>
								<div class="controls">
									
									<label class="radio inline">
										<input type="radio" id="display1" name='display' value="1" <?php if($info['display']){ ?>checked <?php } ?> /> 是
									</label>
									<label class="radio inline">
										<input type="radio" id="display2" name='display' value="0" <?php if(!$info['display']){ ?>checked <?php } ?> > 否
									</label>
									
									<span class="help-inline"></span>
								</div>
							</div>								
									
							<div class="form-actions">
								<input type="submit" value="确定" name="submit" class="btn btn-primary" />
							</div>
						</form>
					</div>
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
	CKEDITOR.replace( 'contents',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});
	$("#menuform").validate({
		rules:{
			
			name:{
				required: true
			}
		},
		messages: {
			name:{
				required: "请输入英文名称"
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
