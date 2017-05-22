<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>修改POS机申请</h1>
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('posapply/main/edit').'/'.$info['id'];?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">



							<div class="control-group">
								<label class="control-label">个人/企业名称</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="nickname" name="username" value='<?php echo $info["username"];?>'/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">营业执照号</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="origin" name="businessLicense" value='<?php echo $info["businessLicense"];?>'/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<input type="text" name="phone" id="phone" value="<?php echo $info['phone']?>" />
								</div>
							</div>
							<!-- <div class="control-group">
								<label class="control-label">联系电话</label>
								<div class="controls">
									<label class="radio inline">
										<input type="text" name="phone" value="<?php echo $info['phone']?>" />
									</label>
							
								</div>
							</div> -->
							


							<div class="control-group">
								<label class="control-label">地址</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="address" name="address" value='<?php echo $info["address"];?>'/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">所在乡镇</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="szxz" name="szdz" value='<?php echo $info["szdz"];?>'/>
								</div>
							</div>


							<!-- <div class="control-group">
								<label class="control-label">用途</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="post" name="use" value='<?php echo $info["use"];?>'/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">住址</label>
								<div class="controls">
									<input type="text" class="input-xlarge" id="post" name="address" value='<?php echo $info["address"];?>'/>
								</div>
							</div> -->

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
			orgin:{
				required: true,

			},
			address:{
				required: true,
			},
			phone:{
				required:true,
				phone: false,
			},
			szxz:{
				required: true,
			}
			post:{
				required: true,
			}
		},
		messages: {
			nickname: {
				required: "请输入个人或企业名称",
			},
			orgin:{
				required: "请输入企业营业执照号",
			},
			address:{
				required: "请输入地址",
			},
			szxz:{
				required: "请输入所在乡镇",
			},

			phone:{
				required: "请输入手机号",
			}
			post:{
				required: "请选择状态",
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
