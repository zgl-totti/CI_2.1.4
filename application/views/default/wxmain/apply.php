<!Doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>申请入住</title>
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
			box-sizing: border-box;
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
			height: 4.42rem;
			
			margin-bottom: 0.66rem;
		}
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.all img{
			float: left;
			margin-bottom: 0.35rem;
		}
		.synopsis{
			display: block;
		}
		.synopsis li{
			font-size: 0.22rem;
			color: #535354;
			margin-left: -0.11rem;
			line-height: 0.34rem;
		}
		.banli{
			margin: 0.35rem 0 0.33rem 0;
		}
		.zifei{
			margin: 0.44rem 0 0.3rem 0;
		}
		.erweima{
			margin: 0.59rem 0 0.31rem 0;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url(<?php echo base_url('statics')?>/images/icon.png) no-repeat 0.18rem center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.32rem;
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
		#shenqing{
			width: 100%;
			font-size: 0.22rem;
		}
		#shenqing label{
			width: 1.2rem;
			float: left;
			margin-left: 0.65rem;
			font-size: 0.22rem;
			color:#545454;
		}
		#shenqing .name,#shenqing .xingshi,#shenqing .telphone{
			display: block;
			width: 3.08rem;
			height: 0.35rem;
			border:1px solid #cfcccc;
			
			color:#545454;
			float: left;
		}
		.input{
			width: 100%;
			float: left;
			margin-top: 0.24rem;
		}
		.input input[name=submit]{
			display: block;
			margin-left: 2.0rem;
			color: #fff;
			width: 1.65rem;
			height: 0.36rem;
			border-radius: 0.06rem;
			margin:0 auto;
			border:none;
			background: #f18c3c;

			
		}
	</style>
</head>
<body>
<?php //print_r($info['pattern']);die;?>
	<div class="banner">
		<img src="<?php echo base_url('statics')?>/images/shenqingruzhu.jpg" width="100%" height="100%"/>
	</div>
	<div class="all clearfix">
		<img src="<?php echo base_url('statics')?>/images/shenqing2_05.jpg" alt="" width="100%"/>
		<form id="shenqing" method="post"   action="<?php //site_url('nearby/apply')?>">
			<div class="input"><label for="user_name">商户名称：</label><input type="text" class="name" name="name" value="<?php echo $info['name'] ? $info['name']:'' ?>"></div>
			<div class="input"><label for="telphone">联系电话：</label><input type="tel" class="telphone" name="phone"  value="<?php echo  $info['phone'] ? $info['phone']:'' ?>"  ></div>
			<div class="input">
				<label for="xingshi">合作形式：</label>
				<select class="xingshi" name="pattern" value="">
					<option value='1'   <?php echo isset($info['pattern']) && $info['pattern']==1 ? 'selected':'' ?>       >线上</option>
					<option value='2'   <?php echo isset($info['pattern']) && $info['pattern']==2 ? 'selected':'' ?>       >线下</option>
				</select>
			</div>
			<div class="input">
				<input id="oSum" type="submit" name="submit" value="提交申请" >
			</div>
			<div class="input" style="color: #d22222;font-size: 0.16rem;text-align: center;">（申请成功后，我们将在24小时内与您取得联系，请您耐心等待）</div>

		</form>
	</div>
	<img src="<?php echo base_url('statics')?>/images/grcb.jpg" alt="2222222" width="100%" class="erweima"/>
	<div class="phone"><p>0371-69530036</p></div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics')?>/images/bot.png" alt="" width="100%"/></div>
	<script>

			window.onload=function(){
				
				oSum.onclick=function(){
						var oForm=document.getElementById('shenqing');
						var oSum=document.getElementById('oSum');
						if (oForm.name.value=='') {
					 	alert('请输入商户名称')
					  		return false;
					  	}else if (oForm.phone.value=='') {
					  		alert('请输入联系电话')
					  		return false;
					  	}else if(oForm.pattern.value==''){
					  		alert('请选择合作形式')
					  		return false;
					  	}else{
					  		var xhr=new XMLHttpRequest;
							/*xhr.open('post','http://www.hngynsyh.com/nearby/apply',true);*/
							xhr.open('post',"<?=site_url('nearby/apply');?>",true);
							//post方式,数据放在send()里面作为参数传递
							xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
							xhr.send('name='+oForm.name.value+'&phone='+oForm.phone.value+'&pattern='+oForm.pattern.value);
							xhr.onreadystatechange=function(){
								if(xhr.readyState==4){
								 	if(xhr.status==200){
								 		//alert(xhr.responseText);
								 		var json=JSON.parse(xhr.responseText);
								 		//alert(json.status)
								 		if (json.status==1) {
								 			alert('提交成功')
								 		}
								 		else{
								 			alert('提交失败')
								 		}
								 	}else{
									 	alert("err:"+xhr.status);
									 }
								}
							}
					  	}
					  	return false;

						
				}
				  /*oForm.onsubmit=function(){
					 if (this.name.value=='') {
					 	alert('请输入商户名称')
				  		return false;
				  	}else if (this.phone.value=='') {
				  		alert('请输入联系电话')
				  		return false;
				  	}else if(this.pattern.value==''){
				  		alert('请选择合作形式')
				  		return false;
				  	}
				  }*/
				 
			}
	</script>
</body>
</html>