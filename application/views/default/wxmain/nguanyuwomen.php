<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>在线申请</title>
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
			padding-left: 0.5rem;
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
		<img src="<?php echo base_url('statics/images4/shenqing_03.jpg'); ?>" width="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics/images4/shenqing_03.png'); ?>" alt="" width="100%"/>
		<div class="biaodan">
			
			<form  id="form1"     action="<?php echo site_url('wxmain/daikuanchuli')?> "method="post">
				
			
					
				<p><span class="bianqian" for="" style="padding: 0;">个人/企业名称：</span><input type="text" required name="name" id="" value=""
/></p>
				<p><sapn class="bianqian" for="">联系电话：</sapn><input type="text" required   id="phone"   name="phone" id="phone" value="" /></p>
				<p><sapn class="bianqian" for="">身份证号：</sapn><input type="text" required name="sfz" id="" value="" /></p>
				<p><sapn class="bianqian" for="">贷款金额：</sapn><input type="text" required name="dkje" value="" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" />万元</p>
				<p><sapn class="bianqian" for="">贷款用途：</sapn><input type="text" required name="dkyt" id="" value="" /></p>
				<p><sapn class="bianqian" for="">所在乡镇：</sapn>
													<select name="szdz" value="">
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

			/*validata */

			$().ready(function() {
// 在键盘按下并释放及提交后验证提交表单
				$("#form1").validate({
					rules: {

						name: {
							required: true,
							minlength: 2
						},


						phone:{
							required: true,
							istel:true,
						},
						sfz:{
							required: true,
							iscard:true,
						},


					},
					messages: {

						name: {
							required: "请输入用户名",
							minlength: "用户名必需由两个字母组成"
						},




					}
				});




				jQuery.validator.addMethod("istel", function(value, element) {
					var tel = /^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
					return this.optional(element) || (tel.test(value));
				}, "请正确填写您的手机号");



				jQuery.validator.addMethod("iscard", function(value, element) {
					var card =/^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
					return this.optional(element) || (card.test(value));
				}, "请正确填写您的身份证号");




			});
















			</script>
			
			
			
		</div>
		
		<img src="<?php echo base_url('statics/images4/grcb.jpg'); ?>" alt="" width="100%" class="erweima"/>
	</div>
	
	<div class="phone"><p>0371-69530017</p></div>
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

