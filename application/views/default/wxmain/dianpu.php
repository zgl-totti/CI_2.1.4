<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>店铺</title>
	
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/xiuxianyangsheng.css');?>">
		
	<!-- 	 <script src="js/jquery-3.0.0.min.js"></script> --> 
	<script src="<?php echo base_url('statics/js/jquery-1.7.2.min.js');?>"></script>
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
	
	<script>
		$(document).ready(function(){
			$(".biaoqian_box li").on("click",function(){
				$(this).addClass("active").siblings().removeClass("active");
			});
		})
			
	</script>
	</head>
	
	<body>	
		<ul class="biaoqian_box">
			<div class="containerr clearfix" >
				<li class="active">测试</li>
				<li>美容</li>
				<li>健身</li>
				<li>SPA</li>
				<li>洗浴</li>
				<li>足疗</li>
				<li>酒吧</li>
				<li>KTV</li>
				<li>电影</li>
			</div>
		</ul>	

		
		<section>
			<div class="contentt_box clearfix">


<?php foreach ($sh as $v) {
	# code...
?>				<a href="<?=site_url('nearby/jtdianming/'.$v['id']);?>">
				<div class="libiao"><!--分类循环内容-->
					<div class="containerr">
						<div class="img_box">
							<img src="<?php echo base_url().$v['thumb'];?>" width="100%"/>
						</div>
						<div class="intro">
							<div class="title">

							<?php echo $v['name'];?>
					
							
							</div>
							<div class="shangpin_intro">
								<?php echo $v['content'];?>
							</div>
							<div class="shijian">
								2016.03.15
							</div>
						</div>
					</div>
				</div>
				</a>
	<?php } ?>	



			</div>
		</section>
	</body>
</html>
