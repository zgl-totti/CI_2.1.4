<?php $bz= $this->uri->segment(3);?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
		<title>我的订单</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css/global.css');?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<script src="<?php echo base_url('statics/default/js/jquery-3.0.0.min.js');?>"></script>
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
				margin: 0;
				padding: 0;
			}
			body{
				font-family: "微软雅黑";
				background: #f5f4f9;
				margin: 0;
				padding: 0;
				color: #545454;
				font-size: 0.21rem;
			}
			.containerr{
				width: 100%;
				padding-left:0.3rem ;
				padding-right:0.3rem ;
				box-sizing: border-box;
			}
			.containerr a{
				display: block;
				color: #545454;
				text-decoration: none;
				float: left;
			}
			
			.tab_box{
				height: 1.0rem;
				width: 100%;
				padding-top: 0.25rem;
				padding-bottom: 0.25rem;
				box-sizing: border-box;
				
			}
			.tab_box .tab{
				width: 2.2rem;
				height: 0.5rem;
				border: 0.04rem solid #d22222;
				border-radius:0.09rem ;
				margin: 0 auto;
			}
			.tab li{
				list-style: none;
				float: left;
				width: 50%;
				text-align: center;
				height: 0.5rem;
				line-height:0.5rem;
				color: #D22222;
				font-size: 0.24rem;
				
			}
			.tab li.active{
				background: #D22222;
				color: #fff;
			}
			.shop_box{
				height: 2.4rem;
				width: 100%;
				float: left;
				background: #FFFFFF;
				margin-bottom: 0.24rem;
			}
			.shop{
				height: 0.6rem;
				width: 100%;
				line-height: 0.6rem;
			}
			.shop_img img{
				display: block;
				float: left;
				width: 0.27rem;
				height: 0.24rem;
				margin-top: 0.17rem;
			}
			.shop_name{
				display: block;
				font-size: 0.24rem;
				float: left;
				margin-left: 0.13rem;
				line-height: 0.6rem;
				color: #000000; 
			}
			.shangpin{
				height: 1.68rem;
				width: 100%;
				background: #f5f5f5;
				float: left;
				padding-top: 0.24rem;
				padding-bottom: 0.24rem;
				box-sizing: border-box;
			}
			.shangpin img{
				width: 1.2rem;
				height: 1.2rem;
				float: left;
			}
			.shangpin_xx{
				margin-left: 0.36rem;
				width: 4.2rem;
				float: left;
			}
			.shangpin_name{
				float: left;
			}
			.jiage{
				float: right;
			}
			.nub{
				float: right;
				width: 100%;
				text-align: right;
				margin-top: 0.24rem;
			}
			.tal{
				height: 0.6rem;
				width: 100%;
				line-height: 0.6rem;
				font-size: 0.24rem;	
				text-align: right;
				float: left;
			}
			.lijizhifu{
				height: 0.5rem;
				width: 100%;
				float: left;
				padding-top: 0.6rem;
				box-sizing: border-box;
			}
			.lijizhifu .btn{
				width: 1.50rem;
				height: 0.54rem;
				line-height: 0.54rem;
				text-align: center;
				float: right;
				background: #D22222;
				color: #FFFFFF;
				font-size: 0.24rem;
				border-radius: 0.04rem;
				border: none;

			}
			
		</style>
		<script>
			$(document).ready(function(){
				$(".tab li").click(function(){
					$(this).addClass("active").siblings().removeClass("active");
					if($(this).hasClass("active")){
						var index=$(this).index();
						$(".fukuan_box").eq(index).css("display","block").siblings().css("display","none");
					}
				})
			})
		</script>
</head>

<body>

	<section>
		<div class="tab_box">
			<ul class="tab">
				<li <?php echo !empty($bz)? '':' class="active" '?>    >未付款</li>
				<li  <?php echo !empty($bz)? 'class="active"':'  '?>    class="">已付款</li>

				
			</ul>
		</div>
	</section>
	<section>
		
		<div class="fukuan_box" style="display:   <?php echo !empty($bz)?'none':'block'?>    ">  <!--未付款内容-->
			<!--需要循环的内容-->

<?php  if(  isset( $oinfo['info']  )  && $oinfo['info']    ){    foreach($oinfo['info'] as $v){  ?>
			<div class="shop_box">

				<div class="shangpin">
					<div class="containerr">
						<span> <img src="<?php echo base_url( trim($v['thumb']))?>"/></span>
						<div class="shangpin_xx">
							<div class="shangpin_name"><?php echo $v['gname'].'　x　'.$v['number']?></div>

							<div class="jiage" style="width: 100%;color: #d22222">￥：<span><?php echo $v['total']?></span> </div>
							<div style="width: 100%;float: left;height: 15px;margin-top: 0.2rem">下单时间　：<?php echo date('Y-m-d H:i:s',$v['add_time'])?></div>
						</div>
					</div>
					<div class="lijizhifu" style="padding-top:0.3rem;">
						<!-- <a class="btn" href="http://aczm.medtu.com/wxpay/example/jsapi.php">立即支付(微信)</a> -->
							<a class="btn" style="margin-right: 0.2rem" href="<?php  echo site_url('nearby/w_pay').'/'.$v['id']?>">微信支付</a>
							 <a class="btn" style="margin-right: 0.2rem;border:1px solid #eee;color: #666;background: none" href="<?php echo site_url('nearby/del_order').'/'.$v['id']?>">取消订单</a>　　　　　
							<!-- <span>电话:<?php echo $v['phone'] ?></span> -->
					</div>
				</div>
			</div>
<?php }  }else{?>


	<center style="width: 200px;line-height: 30px;color:grey;margin:200px auto">
		<img src="<?php echo base_url('statics/default/img/zhanwushoucang .png');?>" width="100px">
		<p>对不起，您暂无未付款订单!</p>
	</center>


<?php } ?>
			</div>
		</div>
			<!--需要循环的内容-->







		<div class="fukuan_box" style="display:<?php echo !empty($bz) ? 'block':'none'?>;" ><!--已付款内容-->
			<!--需要循环的内容-->
			<?php  if(  isset( $noinfo['info']  )  && $noinfo['info']    ){      foreach($noinfo['info'] as $v){  ?>
			<div class="shop_box">
				<!--<div class="containerr">
					<a href="#">
						<div class="shop">
							<span class="shop_img"> <img src="<?php echo base_url( trim($v['thumb']))?>" width="100%"/> </span><span class="shop_name"></span>
						</div>
					</a>

				</div>-->
				<div class="shangpin">
					<div class="containerr">
						<span> <img src="<?php echo base_url( trim($v['thumb']))?>"/></span>
						<div class="shangpin_xx">
							<div class="shangpin_name"><?php echo $v['gname'].'　x　'.$v['number']?></div>
							<div class="jiage">￥：<span><?php echo $v['total']?></span> </div>

							<div class="lijizhifu">
								<a>付款时间 　　：<?php echo date('Y-m-d H:i:s',$v['update_time'])?></a>
							</div>


						</div>
					</div>
				</div>
				<div class="jiage" style="float: left ;line-height:0.8rem;margin-left:4%;"  >兑换码：<span><?php echo $v['cdkey']?></span> </div><span  style="float: right;color: #d22222;line-height:0.8rem;margin-right:5%"><?php switch($v['status_user']){
						case 3;echo '已兑换';break;
						case 1;echo '未兑换';break;
					}?></span>
			</div>


			<?php }} else{ ?>


				<center style="width: 200px;line-height: 30px;color:grey;margin:200px auto">
					<img src="<?php echo base_url('statics/default/img/zhanwushoucang .png');?>" width="100px">
					<p>对不起，您暂无未付款订单!</p>
				</center>


			<?php } ?>
		</div>
			<!--需要循环的内容-->
		</div>




		
	</section>

	
</body>
</html>