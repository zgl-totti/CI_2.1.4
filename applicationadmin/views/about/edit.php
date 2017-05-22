<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?>
<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js');?>"></script>	
<script src="<?php echo base_url('statics/global/js/jquery.autocomplete.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/jquery.autocomplete.css');?>" />


<div id="content">
    <div id="content-header">
        <h1>关于我们</h1>
        <?php $this->load->view('about/top_nav');?>
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

                            <form class="form-horizontal" method="post" action="<?php echo site_aurl('about/main/index');?>" name="manageuserform" id="manageuserform" novalidate="novalidate"  enctype="multipart/form-data">
                                <input type='hidden' name='id' id='id' value='<?php echo $info["id"]?>' />
                                <div class="control-group">
                                    <label class="control-label">中文标题</label>
                                    <div class="controls">
                                        <input class="input-xxlarge" type="text" name='auth' id='auth' placeholder="标题" value='<?php echo $info["auth"];?>'>
                                    </div>
                                </div>

                                <div class="control-group">
								<label class="control-label">中文描述</label>
								<div class="controls">
									<textarea rows="8" id="contents" name="contents" style='width:50%;' ><?php echo $info['contents'];?></textarea>
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
                        暂无相关公告！
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
        CKEDITOR.replace( 'contentse',{
		filebrowserUploadUrl	:	'<?php echo site_url('admin/attachment/index');?>',
		height : 300,
		width : '95%'
	});
        
        $("#manageuserform").validate({
            rules:{
                auth:{
                    required:true
                }
            },
            messages: {
                auth:{
                    required: "标题不能为空"
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

        $(".experts").autocomplete('<?php echo site_aurl("video/main/relationexpert")?>', {
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
            htmls.push("<input type='hidden' name='expert[]' value='"+item.to+"'/>");
            htmls.push("<a href='javascript:;' onclick='removevideo(this)'><i class='icon-remove'> </i></a>");
            htmls.push("</p>");
            $('.expertsdiv').append(htmls.join(' '));
            $('.experts').val('');
        });
    })
</script>
<?php $this->load->view('common/footer');?>
