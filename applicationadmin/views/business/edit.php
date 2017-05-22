<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>修改商户入驻</h1>
		<?php //$this->load->view('member/top_nav');?>
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('business/main/edit').'/'.$info['id'];?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">



							<div class="control-group">
								<label class="control-label">姓名</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="nickname" name="name" value='<?php echo $info["name"];?>'/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">电话</label>
								<div class="controls">
									<label class="radio inline">
										<input type="text" name="phone" value="<?php echo $info['phone']?>" />
									</label>

								</div>
							</div>
							<div class="control-group">
								<label class="control-label">合作方式</label>
								<div class="controls">
									<input type="radio" class="input-xlarge" id="post" name="pattern" value='1'   <?php echo $info["pattern"]==1 ?'checked':'';?>/>　　线上


									　<input type="radio" class="input-xlarge" id="post" name="pattern" value='2'  <?php echo $info["pattern"]==2?'checked':'';?>   />　线下
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">状态</label>
								<div class="controls">
									<input type="radio" class="input-xlarge" id="post" name="status" value='1'   <?php echo $info["status"]==1 ?'checked':'';?>/>　未处理　


									　<input type="radio" class="input-xlarge" id="post" name="status" value='2'  <?php echo $info["status"]==2?'checked':'';?>   />　已处理
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
				phone: false,
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
				required: "请输入身份证",
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
