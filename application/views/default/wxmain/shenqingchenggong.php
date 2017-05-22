<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>申请成功</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<!--	<meta http-equiv="refresh" content="2";url="<?php echo base_url('wxmain/dzyh07');?>" >-->
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
		.imgBox{
			width: 1.5rem;
			height: 1.5rem;
			margin: 2.0rem auto 0.3rem;
		}
		.success{
			width: 100%;
			text-align: center;
			color: #6eb52c;
			font-size: 0.5rem;
			margin-top: 0.3rem;
			font-weight: bold;
		}
		.tishi{
			width: 80%;
			margin: 0 auto;
			font-size: 0.23rem;
			color: #f90046;
			
		}
	</style>
</head>
<body>
	<div class="imgBox">
		<img src="<?php echo base_url('statics/images4/xiaoliann.png'); ?>" width="100%"/>
	</div>
	
	<p class="success">提交成功</p>
	<p class="tishi">(申请成功后,我们的客户经理将在24小时内与你取得联系,请您耐心等待)</p>


<!--<script type="text/javascript">
 
　　setTimeout("window.location=('<?php echo base_url('wxmain/dzyh07');?>'",3000);
 
</script>-->

<?php Header("refresh:3;url='http://http://weixin.hngynsyh.com/index.php/wxmain/daikuan07'");?>

</body>
</html>