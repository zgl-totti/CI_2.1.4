


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商圈首页</title>
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/swiper.min.css');?>">
	<script src="<?php echo base_url('statics/default/js/jquery-3.0.0.min.js');?>"></script>

	<style type="text/css">
	body{
		background: #ebebeb;
		font-family: "微软雅黑"
	}
	.foot_nav ul li a{
		color: #545454;
	}

.search_box{
	background: -webkit-linear-gradient(bottom, rgba(235,235,235,0.2), rgba(235,235,235,0.8));
	background: -o-linear-gradient(top, rgba(235,235,235,0.2), rgba(235,235,235,0.8));
	background: linear-gradient(to top, rgba(235,235,235,0.2), rgba(235,235,235,0.8));
	position: relative;
	width: 100%;
	height: 50px;
	z-index: 2;
}

.search{
	width: 94%;
	left: 3%;
	top:10px;
	position: absolute;
	z-index: 10;
	background: #ffffff;
	background: rgba(255,255,255,0.7);
	/*border-radius: 15px;*/
	padding-left: 15px;
	padding-right: 10px;
	box-sizing: border-box;
}
.search input[type=search]{
		width: 85%;
		height: 30px;
		float: left;
		border: none;
		background: none;
		outline: none;
		background: rgb(255,255,255,0);

	}
.search input[type=submit]{
		width: 15%;
		height: 30px;
		float: left;
		border: none;
		background:url("<?php echo base_url('statics/images6/searchtubiao_04.png')?>") no-repeat 80% center;
		background-size:18px 18px ;
		outline: none;

	}
	.swiper-container {
		width: 100%;
		height: 100%;

	}
	.swiper-slide {
		text-align: center;
		/*  font-size: 18px;*/


		/* Center slide text vertically */
		display: -webkit-box;
		display: -ms-flexbox;
		display: -webkit-flex;
		display: flex;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		-webkit-justify-content: center;
		justify-content: center;
		-webkit-box-align: center;
		-ms-flex-align: center;
		-webkit-align-items: center;
		align-items: center;
	}

.swiper-pagination {
    position: absolute;
    text-align: center;
    -webkit-transition: .3s;
    -moz-transition: .3s;
    -o-transition: .3s;
    transition: .3s;
    bottom: 20px;
    left: 50%;
    margin-left: -20px;
    z-index: 100;
    
}
.swiper-pagination-bullet {
    width: 8px;
    height: 8px;
    display: inline-block;
    border-radius: 100%;
    background: #000;
    opacity: .5;
    margin-right: 5px;
}
.swiper-pagination-bullet-active {
    opacity:0.9;
    background: #fff;
   
}
.banner1 {
    
    margin-bottom: 0;
}
.shenqing{
			   margin: 0 auto;
			    width: 60%;
			    height: 40px;
			    background: #d22222;
			    font-size: 18px;
			    color: #fff;
			    text-align: center;
			    line-height:40px;
}

	</style>


</head>
<body>







<div class="container">


	<div class="banner1">
		<div class="swiper-container">
			<div class="swiper-wrapper">

				

				<div class="swiper-slide"><a href="<?php echo base_url('nearby/dianpu/49')?>"><img src="<?php echo base_url('statics/default/img/images/sqsylb2.jpg');?>" width="100%" ></a>
				</div>

				<div class="swiper-slide"><a href="<?php echo base_url('nearby/dianpu/45')?>"><img src="<?php echo base_url('statics/default/img/images/sqsytu (1).jpg');?>" width="100%" /></a>
				</div>

				<!-- <div class="swiper-slide"><a href="<?php echo base_url('nearby/dianpu/66')?>"><img src="<?php echo base_url('statics/default/img/images/sqsytu (2).jpg');?>" width="100%" ></a>
				</div> -->

			</div>
			<div class="swiper-pagination swiper-pagination-clickable">
				<span class="swiper-pagination-bullet"></span>
				<span class="swiper-pagination-bullet"></span>
				<!-- <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span> -->
				<span class="swiper-pagination-bullet"></span>
			</div>

			<!-- <div class="swiper-pagination"></div> -->
			<!-- Add Arrows -->
			<!--<div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>-->
		</div>
	</div>

	<form class="form-inline" method='get' style="margin-bottom: 0;" action="<?php echo site_url('wxmain/chaxun');?>">
<div class="search_box">

        <div class="search">

			 <input id="se"  type="search" name="q" value="<?php echo isset($keywords) ? $keywords :'';?>" placeholder="请输入商品名点击搜索"/>

			<input   id="sb" class="btn" type="submit" value="" />

		</div>

</div>
	</form>
	<div class="gongneng1 clearfix">


<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/8">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/dingdan_03.png" width="35%">
		<p>美食订餐</p>

		</div>
		</a>



<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/4">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_05.png" width="35%">
		<p>酒店住宿</p>

		</div>
		</a>

		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/5">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_07.png" width="35%">
		<p>休闲养生</p>

		</div>
		</a>
		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/6">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_09.png" width="35%">
		<p>生活服务</p>

		</div>
		</a>

		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/7">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_15.png" width="35%">
		<p>旅游户外</p>

		</div>
		</a>

		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/10">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_18.png" width="35%">
		<p>教育培训</p>

		</div>
		</a>



		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/17">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_17.png" width="35%">
		<p>家电装饰</p>

		</div>
		</a>

		<a style="color:#545454;" href="http://weixin.hngynsyh.com/index.php/nearby/shanji/18">
		<div class="dingdan">


		<img src="http://weixin.hngynsyh.com/uploads/shops/2016/tubiaobiao_16.png" width="35%">
		<p>农资供应</p>

		</div>
		</a>






          <?php
            foreach($abb as $v){
          ?>
          <a style="color:#545454;" href="http://weixin.hngynsyh.com/nearby/dianpu/<?php echo $v['id']?>">
          <div class="contentt beijing" >
			<div class="img" style="height: 80px;overflow: hidden;">
			<img src="<?php echo $v['thumb'] ? base_url().$v['thumb']:'http://www.hngynsyh.com/statics/banner/金燕卡.jpg';?>" width="100%" >
			</div>
		<div class="xinxi" style="position: relative">

			<p style="color: #000000;font-size: 1.0em;margin: 0"><?php echo $v['shopsname'];?> <span style="color: #d22222;right: 0;top: 20px;position: absolute">优惠详情</span>
			</p>



			<p style="color: #9a9a9a;margin-top:10px;width: 66%;font-size:0.8em;display:inline-block;line-height: 1.2em;margin-bottom: 0;height:3.6em;overflow:hidden"><?php echo $v['slogan'] ?$v['slogan']:'暂无宣传语';?></p>
			<!--<span style="color: #9a9a9a;font-size: 0.5em;width: 15%;display:inline-block;"><?php echo $v['addtime'];?></span>-->
		</div>
	</div>
	</a>


	 <?php
            }
          ?>



</div>

<div style="width: 100%;height: 64px;float:left;"></div>
		<div style="position: fixed;bottom: 0;left:0;width: 100%;height:64px;background: #ffffff">
			<a href="<?php echo base_url('nearby/apply');?>" style="text-decoration:none;"><div class="shenqing" style="margin-top: 12px;border-radius: 5px">申请入驻</div></a>
		</div>
</body>
</html>
	<script type="text/javascript">
	//alert(111)
		$('.leader').click(function(){
		//var url='';
		var input = $(this).find('input.leaderend').val();

		//var uid=$('input[name="uid"]').val(); //获取被选中Radio的Value值


		$.ajax({
			type: "POST",
			url: "http://weixin.hngynsyh.com/index.php/nearby/collect",
			dataType:'json',
			data: {  id:input},
			success: function(data){
				//alert(data)
				if(data.status==1){
					alert(data.msg)
					//location.reload(true);
					//$('#'+input).text('取消');
				}

				if(data.status==-1){
					alert(data.msg)
					//$('#'+input).text('推荐');
					//$('#message_modify').html(data.msg); }
				}
			}
		});
	});

	</script>
 <script  src="<?php echo base_url('statics/default/js/swiper.3.2.0.min.js');?>"></script>

 <script>
	 var swiper = new Swiper('.swiper-container', {
		 pagination: '.swiper-pagination',
		 nextButton: '.swiper-button-next',
		 prevButton: '.swiper-button-prev',
		 paginationClickable: true,
		 spaceBetween: 30,
		 centeredSlides: true,
		 autoplay: 3000,
		 autoplayDisableOnInteraction: false
	 });


	 $("#sb").click(function(){
		 var res=$('#se').val();
		 if(res=='' || res==undefined || res==null){
			 alert('请输入搜索条件')
			 return false;
		 }
		 //window.location.reload()
		 //location.reload();

	 });



 </script>
<!--  <script>
 	window.onload=function(){
 		pushHistory();  
setTimeout(function () {  
  window.addEventListener("popstate", function(e) {  
    showBox("再按一次退出程序", 2000, function() {          
      pushHistory();  
    });  
  }, false);  
}, 300);  
  
function pushHistory() {  
  var state = {  
    title: "title",  
    url: "#"  
  };  
  window.history.pushState(state, "title", "#");  
}  
  
function showBox(msg, timeOut, onTimeOut) {  
  if (typeof alertBoxDiv === "undefined") {  
    alertBoxDiv = $("<div/>").addClass("alert-box hide").append( $("<div/>").addClass("label label-primary")).appendTo($("body"));  
  }  
  alertBoxDiv.children(".label").html(msg);  
  alertBoxDiv.removeClass("hide");  
  if (typeof timeOut === "undefined") timeOut = 2000;  
  setTimeout(function() {  
    alertBoxDiv.addClass("hide");  
    if (typeof onTimeOut !== "undefined") onTimeOut();  
  }, timeOut);  
}  

 	}
 </script> -->