<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<script src="<?php echo base_url('statics/global/js/jquery.autocomplete.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/jquery.autocomplete.css');?>" />
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>

<div id="content">
	<div id="content-header">
		<h1>会员卡类别管理</h1>
		<?php $this->load->view('card/top_nav');?> 
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('card/main/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='id' id='id' value='<?php echo $info["id"]?>' />	
							<div class="control-group">
								<label class="control-label">会员卡类别</label>
								<div class="controls">
									<select name='cardtype' id='cardtype'>
										<option value="0">请选择</option>
									<?php foreach ($cardtype as $key => $value) { ?>
										<option value="<?php echo $value['id']?>" <?php if($info["cardtype"] == $value['id']){ echo "selected = 'selected'";}?>><?php echo $value['title'];?></option>
									<?php }?>
									</select>
									<span class="help-inline"></span>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">会员卡号</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="usernumber" name="usernumber" value="<?php echo $info['usernumber'];?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">会员卡期限</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="cardlife" name="cardlife" value="<?php echo $info['cardlife'];?>"/>
								</div>
							</div>
							<div class="control-group">
									<label class="control-label">起始时间</label>
									<div class="controls">
										<input type="text" class="input-xxlarge" id="apply_time" name="apply_time" value="<?php echo date('Y-m-d',time($info['apply_time'])); ?>"/>
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
				未查找到项目信息！
			</div>
			<?php
				}
			?>
			</div>
		
		</div>
		
	</div>
</div>
	
<script src="<?php echo base_url('statics/admin/js/jquery.validate.js');?>"></script>	
<script src="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.js');?>" type="text/javascript" charset="utf-8"></script>
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
