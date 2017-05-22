<?php $this->load->view('common/header');?>
<style type="text/css">
	.form-horizontal .control-label {
     padding-top: 0;
    width:120px;
    text-align: left;
}
</style>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<link rel="stylesheet" href="<?php echo base_url('statics/global/js/manhuaDate/manhuaDate.1.0.css');?>" type="text/css"/>
<div id="content">
	
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
	<form class="form-horizontal" method="post" action="<?php echo site_url('bannergl/bannergl/tianjia');?>" name="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
						
					<div class="control-group">
					<div class="controls">
						<label class="control-label">banner图片</label>
						<input type="file" class="input-xxlarge" id="cardlife" name="thumb" value=""/><br/>
						<label class="control-label">名称</label>
						<input type="text" class="input-xxlarge"  name="title" value=""/>

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
	



<?php $this->load->view('common/footer');?>
