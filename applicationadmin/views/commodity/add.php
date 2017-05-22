<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	

<div id="content">
	<div id="content-header">
		<h1>添加商品</h1>
		<?php $this->load->view('commodity/top_nav');?> 
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
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('commodity/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">选择店铺</label>
								<div class="controls">
							<!-- 	<?php $c=$dianmian['total']; ?> -->
							
							


									<select name='gid' id='gid'>
										<option value="0">请选择</option>
							
									<?php foreach ($dianmian['info'] as $key => $value) { ?>
											<option style="height:20px;" value="<?php echo $value['id']; ?>">
											 <?php echo $value['shopsname'];?>  
											</option>
									<?php } ?>
						
									</select>
								
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品品牌</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="brand" name="brand" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品名称</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="name" name="name" value="" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> 商品标题</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="title" name="title" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb0"  />
								</div>
							</div>


							<div class="control-group">
								<label class="control-label">商品图片1</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb1"  />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片2</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb2"  />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片3</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb3"  />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片4</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb4"  />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片5</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb5"  />
								</div>
							</div>












							<div class="control-group">
								<label class="control-label">商品关键字</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="keywords" name="keywords" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品原价</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="oldprice" name="oldprice" value=""/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">商品实际价格</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="newprice" name="newprice" value="" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">商品重量</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="height" name="height" value=""/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">积分</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="integral" name="integral" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品库存</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="stock" name="stock" value=""/>
								</div>
							</div>
						<!--	<div class="control-group">
								<label class="control-label">商品描述</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="stock" name="newdesc" value=""/>
								</div>
							</div>
-->






							<div class="control-group">
								<label class="control-label">详细介绍</label>
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
			"title":{
				required: true
			},
			name:{
				required: true
			},
			thumb:{
				required: true
			},
			newprice:{
				required: true
			},
		},
		messages: {
			"title":{
				required: "商品标题不能为空"
			},
			name:{
				required: "商品名称不能为空"
			},
			thumb:{
				required: "图片不能为空"
			},
			newprice:{
				required: "价格不能为空"
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
