<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>POS机申请</title>
	<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
	<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
	<script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script>
		!(function(doc, win) {
		    var docEle = doc.documentElement,
		        evt = "onorientationchange" in window ? "orientationchange" : "resize",
		        fn = function() {
		            var width = docEle.clientWidth;
		            width && (docEle.style.fontSize = 100 * (width / 640) + "px");
		        };
		     
		    win.addEventListener(evt, fn, false);
		    doc.addEventListener("DOMContentLoaded", fn, false);
		 
		}(document, window));
	</script>
	<style type="text/css">
		*{
			
			outline: none;
		}
		body{
			margin: 0;
			font-family: "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑";
			background: #fff;
		}
		p{
			margin: 0;
			font-size: 0.22rem;
			color: #535354;
			line-height: 0.34rem;
		}
		ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}
		ol{
			margin-left: -0.2rem;
		}
		.clearfix:after{
			content:"";
			display: block;
			height: 0;
			clear: both;
			visibility: hidden;
		}
		.clearfix{
			zoom:1;
		}
		.banner{
			width: 100%;
			margin:0 auto;
			height: 3.5rem;
			overflow: hidden;
			margin-bottom: 0.1rem;
		}
		.all{
			width: 94%;
			margin: 0 auto;
			font-size:0;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images/icon.png') ?>")no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.28rem;
			margin-left: 0.7rem;
			
		}
		.bot{
			height: 0.68rem;
			width: 100%;
		}
		.bot img{
			display: block;
			float: left;
		}
		.biaodan{
			padding-top:0.5rem;
			padding-bottom:0.5rem;
			width: 100%;
			background: #fff4f3;
			box-sizing: border-box;
			padding-top: 0.43rem;
			margin-bottom: 0.77rem;
		}
		.biaodan p{
			padding-left: 0.32rem;
			margin-bottom: 0.24rem;
			position: relative;
			height: 0.5rem;;

		}
		.biaodan p .bianqian{
			display:inline-block;
			font-size: 0.24rem;
			color: #545454;
			width: 1.8rem;
			height: 0.35rem;
			line-height: 0.35rem;
			text-align: right;
			box-sizing: border-box;
		}
		.biaodan p input{
			display:inline-block;
			width: 3.09rem;
			height: 0.35rem;
			border: 1px solid #cfc9c8;
			line-height: 0.35rem;
			font-size: 0.22rem;
			padding-left: 0.05rem;
		}
		.biaodan p select{
			display:inline-block;
			width: 3.09rem;
			height: 0.4rem;
			border: 1px solid #cfc9c8;
			line-height: 0.35rem;
			font-size: 0.22rem;
		}
		.biaodan p .tijiao{
			display:inline-block;
			width: 1.65rem;
			height:0.45rem;
			font-size: 0.3rem;
			line-height: 0.45rem;
			color: #FFF;
			background: #f18c3c;
			border-radius: 6px;
			border: none;
		}
		.tishi{
			color: #e53936;
			text-align: center;
			width: 100%;
			box-sizing: border-box;
			padding:0 5px;
			line-height: 0.3rem;
		}
		.erweima{
			margin-bottom: 0.5rem;
		}

		.biaodan p label {
			font-size: 4px;
			color: red;
			height: 20px;
			display: block;
			position: absolute;
			top: 0.38rem;
			left: 40%;
			text-align: center;
		}

	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images4/POSshenqing_02.jpg'); ?>" width="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images4/shenqing_03.png'); ?>" alt="" width="100%"/>
		<div class="biaodan">
			
			<form  id="form1"     action="<?php echo site_url('wxmain/posapply')?> "method="post">
				
			
					
				<p><span class="bianqian" for="" style="padding: 0;">个人/企业名称：</span><input type="text"  name="name" id="name" 
/></p>
				<p><sapn class="bianqian" for="">营业执照号：</sapn><input type="text"    id="businessLicense"   name="businessLicense"/></p>
				<p><sapn class="bianqian" for="">联系电话：</sapn><input type="text"  name="phone" id="phone"/></p>
				<p><sapn class="bianqian" for="">地址：</sapn><input type="text" name="address" id="address" /></p>
				<p><sapn class="bianqian" for="">所在乡镇：</sapn>
													<select name="szdz">
													<option name = "szdz" value="巩义市区">巩义市区</option>
					
													<option name = "szdz" value="回郭镇">回郭镇</option>
													<option name = "szdz" value="站街镇">站街镇</option>
													<option name = "szdz" value="涉村镇">涉村镇</option>
													<option name = "szdz" value="米河镇">米河镇</option>
													<option  name = "szdz" value="小关镇">小关镇</option>
													<option  name = "szdz" value="鲁庄镇">鲁庄镇</option>
													<option  name = "szdz" value="大峪沟镇">大峪沟镇</option>
													<option  name = "szdz" value="西村镇">西村镇</option>
													<option  name = "szdz" value="芝田镇">芝田镇</option>
													<option  name = "szdz" value="北山口镇">北山口镇</option>
													<option  name = "szdz" value="新中镇">新中镇</option>
													<option  name = "szdz" value="夹津口镇">夹津口镇</option>
													<option  name = "szdz" value="康店镇">康店镇</option>
													<option  name = "szdz" value="竹林镇">竹林镇</option>
													<option  name = "szdz" value="河洛镇">河洛镇</option>
												</select>
				</p>
				<p><span class="bianqian" for=""></span>

			<!--	<input type="button" id='verify'  value="发送申请" style="width:110px;"></a>-->

				<input type="submit" class="tijiao" id='verify'  name="dosubmit"   value="提交申请" />



				</p>
				<div class="tishi" style="font-size: 0.16rem;">(申请成功后，我们的客户经理将在24小时内与你取得联系，请您耐心等待)</div>
			</form>
			
		<script type="text/javascript">
			$(function(){
				var flag_name;
				var flag_businessLicense;
				/*$('#name').on('blur',function(){
					if ($(this).val()=='') {
						alert('请输入名称')
						flag_name=false;
					}
				})
				$('#businessLicense').on('blur',function(){
					if ($(this).val()=='') {
						alert('请输入营业执照');
						flag_businessLicense=false;
					}
				})*/
				$("#form1").submit( function () {
					//alert(0)
					//console.log(flag_name)
					if ($('#name').val()=='') {
						alert('请输入名称')
						return false;
					}

					if($('#businessLicense').val()==''){
						alert('请输入营业执照号')
						return false;
					}

					if($('#phone').val()==''){
						alert('请输入手机号')
						return false;
					}else{
						var reg=/^1[34578]\d{9}$/;
						if (!(reg.test($('#phone').val()))) {
							alert('请输入正确手机号')
							return false;
						}
					}

					if($('#address').val()==''){
						alert('请输入地址')
						return false;
					}
					
				});

			})

			</script>
			
			
			
		</div>
		
		<img src="<?php echo base_url('statics/images4/grcb.jpg'); ?>" alt="" width="100%" class="erweima"/>
	</div>
	
	<div class="phone"><p>0371-69530036</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images4/bot.png'); ?>" alt="" width="100%"/></div>
</body>
</html>
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery('#formID').validationEngine({
			autoHidePrompt: true,
			autoHideDelay:'3000'
		});

	});
	function form_submit(){
		 $.ajax({
	                type: "POST",
	                dataType: "text",
	                url: "<?php echo site_url('login/resetPw')?>",
	                data: $('#formID').serialize(),
	                success: function (msg) {
	                    alert(msg);
	                    if (msg == '重置成功，请查收短信获取最新密码！') {
	                    	window.location.href = '<?php echo site_url("login/index"); ?>';
	                    };
	                },
	            });
		
	}
	var timerc = 60;
    function add(){
        if(timerc > 0){
            --timerc;
            $("#verify").val(timerc+'s'+"重新获取");
            setTimeout("add()", 1000);
        }else{
            $("#verify").val("重新获取");
        }
    };
    
    $("#verify").on("click", function(){
        var phoneNum = $("#phone").val();

        if(phoneNum == ''){
            alert("请输入手机号码");
            return;
        }
        if($("#verify").val() == "发送申请" || $("#verify").val() == "重新获取"){
            $.ajax({
                type: "post",
                url: "<?php echo site_url('login/sendcodes')?>",
                dataType: "json",
                data: {mobile:phoneNum,register:true},
                success: function(data){
                	var msg = eval(data);
                    if (msg.status == 1) {
                    	alert('您的申请已发送成功');
                    	timerc = 60;
                    	add();
                    }else if(msg.status == -1){
                    	alert('获取短信验证码过于频繁，请稍后再试');
                    }
                },
                
            });
            
            
        }
    });
</script>

