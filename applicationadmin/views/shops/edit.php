<?php $this->load->view('common/header'); ?>

<?php $this->load->view('common/main_left_nav'); ?>

<script src="<?php echo base_url('statics/global/ckeditor/ckeditor.js'); ?>"></script>
<script src="<?php echo base_url('statics/global/js/jquery.autocomplete.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('statics/global/style/jquery.autocomplete.css'); ?>"/>


<div id="content">
    <div id="content-header">
        <h1>店面管理</h1>
        <?php $this->load->view('shops/top_nav'); ?>
    </div>
    <div class="container-fluid">

        <div class='row-fluid'>
            <div class='span12'>
                <?php
                if (isset($info) && $info) {
                    ?>
                    <div class="widget-box">
                        <div class="widget-title">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab1">修改</a></li>
                            </ul>
                        </div>
                        <div class="widget-content nopadding">

                            <form class="form-horizontal" method="post" action="<?php echo site_aurl('shops/main/edit'); ?>" name="manageuserform" id="manageuserform" novalidate="novalidate" enctype="multipart/form-data">
                                <input type='hidden' name='bookid' id='bookid' value='<?php echo $info["id"] ?>'/>
                                <div class="control-group">
                                    <label class="control-label">店面组</label>
                                    <div class="controls">
                                        <select name='parentid' id='parentid'>
                                            <option value="0">请选择</option>
                                            <?php echo $shopgroup; ?>
                                        </select>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">地区</label>
                                    <div class="controls">
                                        <select name='regionid' id='regionid'>
                                            <option value="0">请选择</option>
                                            <?php echo $select_categorys; ?>
                                        </select>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">店面名称</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsname" name="shopsname" value="<?php echo $info['shopsname']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">宣传语</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsname" name="slogan" value="<?php echo $info['slogan']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">账号名</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsname" name="account_name" value="<?php echo $info['account_name']; ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">对公账号</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsname" name="account_num" value="<?php echo $info['account_num']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">开户行</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsname" name="account_address" value="<?php echo $info['account_address']; ?>"/>
                                    </div>
                                </div>




















                                <div class="control-group">
                                    <label class="control-label">图片</label>
                                    <div class="controls">
                                        <?php
                                        if ($info['thumb'] && file_exists($info['thumb'])) {
                                            ?>
                                            <img src='<?php echo base_url($info['thumb']); ?>' class='img-rounded' style='width: 160px; height: 120px;'>
                                            <?php
                                        }
                                        ?>
                                        <input type="file" class="input-xxlarge" id="thumb" name="thumb"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">店面地址</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopaddress" name="shopaddress" value="<?php echo $info['shopaddress']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">店面规模</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="shopsize" name="shopsize" value="<?php echo $info['shopsize']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">职员人数</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="officeworker" name="officeworker" value="<?php echo $info['officeworker']; ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">坐标</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="coordinate" name="coordinate" value="<?php echo $info['coordinate']; ?>"/>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">负责人</label>
                                    <div class="controls">
                                        <select name='auserid' id='auserid'>
                                            <option value="0">请选择</option>
                                            <?php foreach ($store_account as $key => $value) { ?>
                                                <option value="<?php echo $value['userid'] ?>" <?php if ($info["auserid"] == $value['userid']) {
                                                    echo "selected = 'selected'";
                                                } ?>><?php echo $value['realname']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span class="help-inline"></span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">联系电话</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="phone" name="phone" value="<?php echo $info['phone']; ?>"/>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">手机号</label>
                                    <div class="controls">
                                        <input type="text" class="input-xxlarge" id="phone" name="sphone" value="<?php echo $info['sphone']; ?>"  placeholder="请输入11位手机号便于短信通知" required/>
                                    </div>
                                </div>








                                <?php
                                if (isset($shops_service) && $shops_service) {
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label">店面服务</label>
                                        <div class="controls">
                                            <?php
                                            foreach ($shops_service as $k => $v) {
                                                ?>
                                                <label class="radio inline">

                                                    <input type="checkbox" name="service[]" value="<?php echo $v['id']; ?>" <?php



                                                    if ($info['service'] && in_array($v['id'],$info['service']))
                                                    {
                                                        echo 'checked';
                                                    } ?>/><?php echo $v['name']; ?>
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
                                    <div class="controls">
                                        <textarea rows="3" id="contents" name="contents"><?php echo $info['content']; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <input type="submit" value="确定" name="submit" class="btn btn-primary"/>
                                </div>
                            </form>


                        </div>
                    </div>
                    <?php
                } else {
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

<script src="<?php echo base_url('statics/admin/js/jquery.validate.js'); ?>"></script>
<script>

    $(function () {
        CKEDITOR.replace('contents', {
            filebrowserUploadUrl: '<?php echo site_url('admin/attachment/index');?>',
            height: 300,
            width: '95%'
        });
        CKEDITOR.replace('econtents', {
            filebrowserUploadUrl: '<?php echo site_url('admin/attachment/index');?>',
            height: 300,
            width: '95%'
        });

        $("#manageuserform").validate({
            rules: {
                "title": {
                    required: true
                },
                "url": {
                    url: true
                }
            },
            messages: {
                "title": {
                    required: "书名不能为空"
                },
                "url": {
                    url: "url地址错误"
                }
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('success');
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').removeClass('success');
            },
            onfocusout: function (element) {
                $(element).valid();
            }
        });


        function format(data) {
            return data.to;
        }

        $(".videos").autocomplete('<?php echo site_aurl("book/main/relationvideo")?>', {
            multiple: true,
            parse: function (data) {
                return $.map(eval(data), function (row) {
                    return {
                        data: row,

                        result: row.name
                    }
                });
            },
            formatItem: function (item) {
                return item.name;
            }
        }).result(function (e, item) {
            var htmls = new Array();
            htmls.push("<p class='text-info'>");
            htmls.push(item.name);
            htmls.push("<input type='hidden' name='video[]' value='" + item.to + "'/>");
            htmls.push("<a href='javascript:;' onclick='removevideo(this)'><i class='icon-remove'> </i></a>");
            htmls.push("</p>");
            $('.videosdiv').append(htmls.join(' '));
            $('.videos').val('');
        });
    })


    function removevideo(obj) {
        $(obj).parent('p').remove();
    }
</script>
<?php $this->load->view('common/footer'); ?>
