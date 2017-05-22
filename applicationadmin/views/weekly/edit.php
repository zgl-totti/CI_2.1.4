<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<script src="<?php echo base_url('statics/global/js/jquery.autocomplete.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/jquery.autocomplete.css');?>" />


<div id="content">
	<div id="content-header">
		<h1>周刊管理</h1>
		<?php $this->load->view('weekly/top_nav');?> 
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('weekly/main/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='bookid' id='bookid' value='<?php echo $info["id"]?>' />	
							<div class="control-group">
								<label class="control-label"> 周刊标题</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="title" name="title" value="<?php echo $info["title"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片</label>
								<div class="controls">
									<?php
										if($info['thumb'] && file_exists($info['thumb'])){
									?>
									<img src='<?php echo base_url($info['thumb']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php
										}
									?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">周刊期数</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="periods" name="periods" value="<?php echo $info["periods"]?>"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">周刊发布时间</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="release" name="release" value="<?php echo $info["release"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">详细介绍</label>
								<div class="controls" >
									<textarea rows="3" id="desc" name="desc" ><?php echo $info["desc"]?></textarea>
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
<script>

$(function(){
	CKEDITOR.replace( 'desc',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});
	CKEDITOR.replace( 'econtents',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});

	$("#manageuserform").validate({
		rules:{
			"title":{
				required: true
			},
			"url":{
				url:true
			}
		},
		messages: {
			"title":{
				required: "标题不能为空"
			},
			"url":{
				url:"url地址错误"
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
	
	
	function format(data) {
		return data.to ;
	}
	$(".videos").autocomplete('<?php echo site_aurl("book/main/relationvideo")?>', {
		multiple: true,
		parse: function(data) {
			return $.map(eval(data), function(row) {
				return {
					data: row,
					
					result: row.name
				}
			});
		},
		formatItem: function(item) {
			return item.name;
		}
	}).result(function(e, item) {
		var htmls	=	new Array();
		htmls.push("<p class='text-info'>");
		htmls.push(item.name);
		htmls.push("<input type='hidden' name='video[]' value='"+item.to+"'/>");
		htmls.push("<a href='javascript:;' onclick='removevideo(this)'><i class='icon-remove'> </i></a>");
		htmls.push("</p>");
		$('.videosdiv').append(htmls.join(' '));
		$('.videos').val('');
	});
})


function removevideo(obj){
	$(obj).parent('p').remove();
}
</script>
<?php $this->load->view('common/footer');?>
