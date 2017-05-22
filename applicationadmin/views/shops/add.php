<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	

<div id="content">
	<div id="content-header">
		<h1>添加店面</h1>
		<?php $this->load->view('shops/top_nav');?> 
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
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('shops/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
							<div class="control-group">
								<label class="control-label">店面组</label>
								<div class="controls">
									<select name='parentid' id='parentid'>
										<option value="0">请选择</option>
										<?php
											if( isset($shopgroup) && $shopgroup ){
												echo $shopgroup;
											}
										?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">地区</label>
								<div class="controls">
									<select name='regionid' id='regionid'>
										<option value="0">请选择</option>
										<?php
											if( isset($select_categorys) && $select_categorys ){
												echo $select_categorys;
											}
										?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">店面名称</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="shopsname" name="shopsname" value=""/>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label">宣传语</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="shopsname" name="slogan" value=""/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">账号名</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="" name="account_name" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">对公账号</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="" name="account_num" value=""/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">开户行</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="" name="account_address" value=""/>
								</div>
							</div>










							<div class="control-group">
								<label class="control-label">图片</label>
								<div class="controls">
									<input type="file" class="input-xxlarge" id="thumb" name="thumb" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">店面地址</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="shopaddress" name="shopaddress" value=""/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">店面规模</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="shopsize" name="shopsize" value=""/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">职员人数</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="officeworker" name="officeworker" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">坐标</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="coordinate" name="coordinate" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">负责人</label>
								<div class="controls">
									<select name='auserid' id='auserid'>
										<option value="0">请选择</option>
									<?php foreach ($store_account as $key => $value) { ?>
										<option value="<?php echo $value['userid']?>"><?php echo $value['realname'];?></option>
									<?php }?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="phone" name="phone" value=""/>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label">手机号</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="phone" name="sphone" value=""  placeholder="请输入11位手机号便于短信通知"  required />
								</div>
							</div>



							<?php 
								if(isset($shops_service) && $shops_service){
							?>
							<div class="control-group">
								<label class="control-label">店面服务</label>
								<div class="controls">
								<?php
									foreach($shops_service as $k => $v){
								?>
									<label class="radio inline">
		<input type="checkbox" name="service[]" value="<?php echo $v['id'];?>" /><?php echo $v['name'];?>
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
								<label class="control-label">详细介绍</label>
								<div class="controls" >
									<textarea rows="3" id="contents" name="contents" ></textarea>
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
	CKEDITOR.replace( 'contents',{
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
				required: "项目名称不能为空"
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
