<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<script src="<?php echo base_url('statics/global/js/jquery.autocomplete.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/jquery.autocomplete.css');?>" />


<div id="content">
	<div id="content-header">
		<h1>商品管理</h1>
		<?php $this->load->view('commodity/top_nav');?> 
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
					
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('commodity/main/edit');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
							<input type='hidden' name='bookid' id='bookid' value='<?php echo $info["id"]?>' />	
							<div class="control-group">
								<!--<label class="control-label">商品分类</label>
								<div class="controls">
									<select name='gid' id='gid'>
										<option value="0">请选择</option>
									<?php foreach ($shops as $key => $value) { ?>
										<option value="<?php echo $value['id']?>" <?php if($info["gid"] == $value['id']){ echo "selected = 'selected'";}?>><?php echo $value['name'];?></option>
									<?php }?>
									</select>
									<span class="help-inline"></span>
								</div>-->
							</div>
							<div class="control-group">
								<label class="control-label">商品品牌</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="brand" name="brand" value="<?php echo $info["brand"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品名称</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="name" name="name" value="<?php echo $info["name"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"> 商品标题</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="title" name="title" value="<?php echo $info["title"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片0</label>
								<div class="controls">
									<?php if( !empty($info['thumb0'])){?>
									<img src='<?php echo base_url($info['thumb0']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb0" value="<?php echo $info['thumb0']?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片1</label>
								<div class="controls">
									<?php if( !empty($info['thumb1'])){?>
									<img src='<?php echo base_url($info['thumb1']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb1" value="<?php echo $info['thumb1']?>" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片2</label>
								<div class="controls">
									<?php if( !empty($info['thumb2'])){?>
									<img src='<?php echo base_url($info['thumb2']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb2" value="<?php echo $info['thumb2']?>" />
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">商品图片3</label>
								<div class="controls">
									<?php if( !empty($info['thumb3'])){?>
									<img src='<?php echo base_url($info['thumb3']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb3" value="<?php echo $info['thumb3']?>"  />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品图片4</label>
								<div class="controls">
									<?php if( !empty($info['thumb4'])){?>
									<img src='<?php echo base_url($info['thumb4']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb4" value="<?php echo $info['thumb4']?>" />
								</div>
							</div>


							<div class="control-group">
								<label class="control-label">商品图片5</label>
								<div class="controls">
									<?php if( !empty($info['thumb5'])){?>
									<img src='<?php echo base_url($info['thumb5']);?>' class='img-rounded' style='width: 160px; height: 120px;'>
									<?php }?>
									<input type="file" class="input-xxlarge" id="thumb" name="thumb5" value="<?php echo $info['thumb5']?>" />
								</div>
							</div>










							<div class="control-group">
								<label class="control-label">商品关键字</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="keywords" name="keywords" value="<?php echo $info["keywords"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品原价</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="oldprice" name="oldprice" value="<?php echo $info["oldprice"]?>"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">商品实际价格</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="newprice" name="newprice" value="<?php echo $info["newprice"]?>"/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label">商品重量</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="height" name="height" value="<?php echo $info["height"]?>"/>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">积分</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="integral" name="integral" value="<?php echo $info["integral"]?>"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">商品库存</label>
								<div class="controls">
									<input type="text" class="input-xxlarge" id="stock" name="stock" value="<?php echo $info["stock"]?>"/>
								</div>
							</div>

						<!--	<div class="control-group">
								<label class="control-label">商品描述</label>
								<div class="controls">


									<textarea rows="3" name="newdesc" ><?php /*echo $info["newdesc"]*/?></textarea>
								</div>
							</div>-->
							<div class="control-group">
								<label class="control-label">详细介绍</label>

								<div class="controls" >
									<textarea rows="3" id="desc" name="desc" ><?php echo $info["newdesc"]?></textarea>
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
				required: "商品标题不能为空"
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
