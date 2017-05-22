<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>搜索</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<script language='JavaScript'  src="/gyns/statics/default/js/jquery-3.0.0.min.js"></script>
	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑";
	}
	#quanbufenlei{
		display:block;
	}
	#renqi{
		display: block;
	}
	#jiage{
		display: block;
	}
	</style>
	<script>
	$(document).ready(function(){
		$("#n1").on("click",function(){
			$("#quanbufenlei").css("display","block").siblings("#renqi,#jiage").css("display","none");
			$("#n1").addClass("active").siblings().removeClass("active");
		})
	})
	</script>
	<script>
	$(document).ready(function(){
		$("#n2").on("click",function(){
			$("#renqi").css("display","block").siblings("#quanbufenlei,#jiage").css("display","none");
			$("#n2").addClass("active").siblings().removeClass("active");
		})
	})
	</script>
	<script>
	$(document).ready(function(){
		$("#n3").on("click",function(){
			$("#jiage").css("display","block").siblings("#quanbufenlei,#renqi").css("display","none");
			$("#n3").addClass("active").siblings().removeClass("active");
		})
	})
	</script>
</head>
<body>
<div class="container">
	<div class="biaoti">
	<form  class="form-inline" method='get' style="margin-bottom: 0;" action="<?php echo site_url('wxmain/search1');?>" >
	<input class="suosuo" type="text" name="q" value="<?php echo $keywords;?>" placeholder="搜索">
	
	</form>
	</div>
	<!-- <p style="height: 50px;width: 100%;"></p> -->
	<div id="fenlei_box" style="margin-bottom: 15px;">
		<div class="fenlei">
			<!-- <div class="quanbu active" id="n1">全部分类</div>
			<div class="renqi" id="n2">人气</div>
			<div class="jiage" id="n3">价格</div> -->
		</div>
	</div>
	
	
	<?php foreach ($info as $v ) {
		
	  ?>
	  <a href="<?php echo site_url('wxmain/xiangqingye/'.$v['id'])?>">
	<div class="contentt beijing">
		<div class="img">
		<img src="<?php echo base_url().$v['thumb0']; ?>" width="100%">
		</div>
		<div class="xinxi">
			<p style="color: #000000;font-size: 1.0em;"><?php echo $v['name']; ?></p>
			<p style="color: #9a9a9a;margin-top:10px;width: 100%;font-size:0.8em;display:inline-block;line-height:1.2em;"><?php echo $v['title']; ?></p>
			<p style="color: #000000;font-size: 1.0em;"><span class="red">￥：<?php echo $v['newprice']; ?></span></span>
		</div>
	</div>
	</a>
	
<?php } ?>
</div>

</body>
</html>