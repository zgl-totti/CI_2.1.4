<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>
<div id="content">
	<div id="content-header">
		<h1>办理会员卡业务</h1>
		<?php $this->load->view('card/top_nav');?> 
	</div>
	
			<div class="container-fluid">
				<div class="row-fluid" style="padding-top:25px;">
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/11.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('order/main/index');  ?>'><img src="<?php echo base_url('statics/admin/img/index/110.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/5.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('member/main/add');  ?>'><img src="<?php echo base_url('statics/admin/img/index/50.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/2.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/6.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/3.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/7.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/4.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/8.png');  ?>" alt="" width='100'></a></div>
					</div>

				
			</div>	
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
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('card/main/add');?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
						<input type='hidden' name='userid' id='userid' value='<?php echo $userid?>' />
							<div class="control-group">
								<label class="control-label">会员卡类别</label>
								<div class="controls">
									<select name='cardtype' id='cardtype' style="width:350px;">
										<option value="0">请选类别</option>
									<?php foreach ($cardtype as $key => $value) { ?>
										<option value="<?php echo $value['id']?>"><?php echo $value['title'];?></option>
									<?php }?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">会员卡号</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="usernumber" name="usernumber" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">会员卡期限</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="cardlife" name="cardlife" value=""/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">起始时间</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="apply_time" name="apply_time" value="<?php echo date('Y-m-d',time()); ?>"/>
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
	
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine-zh_CN.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/jquery.validationEngine.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.js');?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo base_url('statics/admin/js/jquery.validate.js');?>"></script>	
<script>
$(function(){
	$("#manageuserform").validate({
		rules:{
			usernumber:{
				required: true,

			},
			cardlife:{
				required: true,

			}
		},
		messages: {
			usernumber: {
				required: "请输入会员卡号",
			},
			cardlife:{
				required: "请输入会员卡期限",
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
