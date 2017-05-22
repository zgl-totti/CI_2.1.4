<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>
<?php echo $title['name']?>
		</title>
	
	
		
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
				//$(this).addClass("active").siblings().removeClass("active");
			});
		})
			
	</script>
	<style>
		.biaoqian_box a li {
		    border: 1px solid #e8e8e8;
		}
		.shenqing{
			   margin: 0 auto;
			    width: 60%;
			    height: 0.6rem;
			    background: #d22222;
			    font-size: 0.28rem;
			    color: #fff;
			    text-align: center;
			    line-height: 0.6rem;
		}
	</style>

	</head>
	
	<body>	
		<ul class="biaoqian_box">
			<div class="containerr clearfix" >
			<a href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx669eb16a613703ae&redirect_uri=http://weixin.hngynsyh.com/index.php/weixin/wechat/get_access_tokens&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"><li style="background:#d22222;color:#fff; border: 1px solid #d22222;">首页</li></a>
				<a href="<?php echo site_url('nearby/jtdianming/52');?>"><li  class="<?php echo ($this->uri->segment(3)==52) || ($this->uri->segment(2)=='shanji')?'active':''?>">全部</li></a>




<?php for ( $i=0 ;$i<count($sh);$i++) {
	if($sh[$i]['id']==$this->uri->segment(3)){
		$style='class="active"';
	}else{
		$style='';
	}
?>		
				<a href="<?php echo site_url('nearby/jtdianming/'.$sh[$i]['id']);?>"><li  <?php echo $style ?> ><?php echo $sh[$i]['name'];?></li></a>

<?php } ?>		
			</div>
		</ul>	

		
		<section>
			<div class="contentt_box clearfix">


<?php foreach ($abb as $v) {
	# code...
?>				<a href="<?=site_url('nearby/dianpu/'.$v['id']);?>">
				<div class="libiao"><!--分类循环内容-->
					<div class="containerr">
						<div class="img_box">
							<img src="<?php echo base_url().$v['thumb'];?>" width="100%"/>
						</div>
						<div class="intro" style="position: relative">
							<div class="title">

							<?php echo str_cut($v['shopsname'],35);?>
					
							<span style="color: #d22222;right: 0;top: 25px;position: absolute" > 优惠详情</span>
							</div>
							<div class="shangpin_intro" style="white-space:nowrap;text-overflow:ellipsis; font-style: normal;width:62%">
								<?php echo htmlspecialchars_decode($v['shopsaddress']);?>
							<!--	--><?php /*echo strip_tags(htmlspecialchars_decode(str_cut($v['content'],80)));*/?>
								<?php echo $v['slogan'] ? $v['slogan']:'暂无宣传语';?>
							</div>
							<div class="shijian">
								<?php echo $v['phone']?>
							</div>
						</div>
					</div>
				</div>
				</a>
	<?php } ?>	



			</div>
		</section>
		<div style="width: 100%;height: 1.0rem;float:left;"></div>
		<div style="position: fixed;bottom: 0;left:0;width: 100%;height: 1.0rem;background: #ffffff">
			<a href="<?php echo base_url('nearby/apply');?>" style="text-decoration:none;"><div class="shenqing" style="margin-top: 0.2rem;border-radius: 0.05rem">申请入驻</div></a>
		</div>

	</body>
</html>
