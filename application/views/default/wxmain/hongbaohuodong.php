
<!DOCTYPE HTML>
<html >
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="Cache-Control" content="no-transform " />
	<meta http-equiv="Cache-Control" content="no-transform " />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>NBA</title>
	<link rel="stylesheet" href="<?php echo base_url('statics')?>/css/layout.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('statics')?>/css/style.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url('statics')?>/css/rotate.css" type="text/css">
	<script type="text/javascript" src="<?php echo base_url('statics')?>/js/jquery.js"></script><!--ajx的引用文件-->

	<script type="text/javascript" src="<?php echo base_url('statics')?>/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url('statics')?>/js/main.js"></script>
	<script src="<?php echo base_url('statics')?>/js/jquery.rotate.js"></script>
	<script src="<?php echo base_url('statics')?>/js/jquery.easing.min.js"></script>
	<script>
		//获奖名单滚动效果
		function txt_effect(){
			$('.e-txt-effect li').eq(0).slideUp('100',function(){
				$(this).remove();
			});
		}
		setInterval('txt_effect()',1000);

		$(function(){
			var rotateFunc = function(awards,angle,text){  //awards:奖项，angle:奖项对应的角度
				$('#lotteryBtn').stopRotate();
				$("#lotteryBtn").rotate({
					angle:0,
					duration: 5000,
					animateTo: angle+1440, //angle是图片上各奖项对应的角度，1440是我要让指针旋转4圈。所以最后的结束的角度就是这样子^^
					callback:function(){
						if(awards == 1 || awards == 2 || awards == 3 || awards == 4 || awards == 5 || awards == 6  ){
							var oPrizeWin = $('.e-prize-win')
							var bodyHeight = $('body').height();// 获取当前窗口高度
							oPrizeWin.find('.e-pop-bg').css('height', bodyHeight);
							$('.e-prize-title').text(text);
							oPrizeWin.show();
						}
						if(awards == 0){
							var oPrizeLose = $('.e-prize-lose')
							var bodyHeight = $('body').height();// 获取当前窗口高度
							oPrizeLose.find('.e-pop-bg').css('height', bodyHeight);
							oPrizeLose.show();
						}
					}
				});
			};

			$("#lotteryBtn").rotate({
				bind:
				{
					click: function(){



						$.ajax({
							type: "POST",
							url: "<?php echo site_url('wxmain/rotate')?>",
							dataType:'json',
							data: {pass:111},
							success: function(data){
//alert(data)
							//	var data = [1,2,3,4,5,6,0]; //返回的数组
							//	data = data[Math.floor(Math.random()*data.length)];
								if(data==1){
									rotateFunc(1,200,'恭喜您获得一等奖')
								}
								if(data==2){
									rotateFunc(2,280,'恭喜您获得二等奖')
								}
								if(data==3){
									rotateFunc(3,320,'恭喜您获得三等奖')
								}
								if(data==4){
									rotateFunc(4,40,'恭喜您获得四等奖')
								}
								if(data==15555){
									rotateFunc(5,120,'恭喜您获得五等奖')
								}
								if(data==5){
									var angle = [0,80,160,240];
									angle = angle[Math.floor(Math.random()*angle.length)]
									rotateFunc(0,angle,'再接再厉')
								}

								if(data==88){
									alert('对不起！您今天的抽奖次数用完了');
									return false;
								}










							}
						});
















					}
				}

			});

		});
		window.onload=function(){

			//点击关闭按钮隐藏弹出层
			$('.e-prize-close').click(function(){
				$('.e-prize-win').hide();
			});
			$('.e-prize-close').click(function(){
				$('.e-prize-lose').hide();
			});

			//首页遮罩效果
			function sharePop(){
				var	bodyHeight = $('body').height();//获取当前窗口高度
				var prizePop = $('.e-prize-popup');
				prizePop.find('.e-pop-bg').css('height',bodyHeight);
				$('.e-prize-win').hide();
				$('.e-prize-lose').hide();
				prizePop.show();
				prizePop.click(function(){
					$(this).hide();
				})
			};
			$('.e-prize-share').click(function(){
				sharePop();
			})


		};
	</script>
</head>
<body>






<div class="bz-all-con">
	<div class="e-content">

		<section class="bz-rotate-section">
			<div class="bz-rotate">
				<div class="bz-rotate-top"></div>
				<div class="bz-rotate-content">
					<div class="ly-plate">
						<div class="rotate-bg"></div>
						<div class="lottery-star"><img src="<?php echo base_url('statics/')?>/images1/rotate-static.png" id="lotteryBtn"></div>
					</div>
					<!--<div class="bz-gift-center">
                        <ul class="clearfix">
                            <li><img src="images/img-lottery-logo.png" /></li>
                               <li>
                               <div class="e-txt-effect bz-txt-effect">
                                  <ul>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                     <li>恭喜 XX 获得一等奖</li>
                                  </ul>
                               </div>
                            </li>
                            <li><a href="#"><img src="images/wx-gift-img.png" height="100" width="104"></a></li>
                        </ul>
                       </div>-->
					<div class="bz-rotate-rules">
						<ul>
							<li><h3>【活动规则】</h3></li>
							<li>1、 购买义卖商品后，可参加一次抽奖；</li>
							<li>2、 获奖用户可在领奖中心领取相应奖品；</li>
							<li><h4>【奖品说明】</h4></li>
							<li>一等奖：NBA正版球衣一件，球衣球队、尺寸随机赠送；</li>
							<li>二等奖：NBA水壶一个，款式随机赠送；</li>
							<li>三等奖：NBA限量球星卡一包，随机发放；</li>
							<li>四等奖：NBA全明星鼠标垫一个，款式随机赠送；</li>
							<li>五等奖：5元现金券一张，NBASTORE官方微商城全场通用</li>
						</ul>
					</div>
				</div>

			</div>
		</section>
		<footer class="bz-footer">
			<p>版权归NBA官方商城所有</p>
		</footer>
	</div>
	<!------浮动导航区域------->

	<!------浮动导航区域 end------->
</div>
<div class="ui-pop e-prize-win" style="display:none;">>
	<div class="ui-pop-con ui-box ui-border-normal" style="padding:0; top:50%;">
		<div class="bz-shirt-pop-title">
			<p>抽奖结果</p>
			<img class="e-prize-close" src="<?php echo base_url('statics')?>/images1/img-btn-close.jpg" width="19" name="" alt=""/>
		</div>
		<div class="bz-shirt-pop-con">
			<br>
			<h3 class="bz-prize-title e-prize-title"></h3>
			<br>
			<div class="row am-sec-pop">
				<div class="col-xs-6 pad-right-5"><button class="btn btn-yellow e-prize-share">分享朋友圈攒RP
					</button></div>
				<div class="col-xs-6 pad-left-5"><button onclick="window.location.href='game-lottery-account.html'" class="btn btn-red">领取奖品</button></div>
			</div>
			<br><br>
		</div>
	</div>
	<div class="ui-pop-bg e-pop-bg"></div>
</div>

<div class="ui-pop e-prize-lose" style="display:none;">
	<div class="ui-pop-con ui-box ui-border-normal" style="padding:0;top:50%;">
		<div class="bz-shirt-pop-title">
			<p>抽奖结果</p>
			<img class="e-prize-close" src="<?php echo base_url('statics')?>/images1/img-btn-close.jpg" width="19" name="" alt="888888888888888"/>
		</div>
		<div class="bz-shirt-pop-con">
			<br>
			<h3>再接再厉</h3>
			<p>（不要灰心，分享后明日获奖机会更大喔）</p><br>
			<input class="btn btn-yellow e-prize-share" type="button" name="" value="分享朋友圈，积攒RP">
			<br><br>
		</div>
	</div>
	<div class="ui-pop-bg e-pop-bg"></div>
</div>
<!------POPUP弹出框区域----->
<div class="bz-popup e-prize-popup" style="display:none;">
	<div class="bz-pop-con"><img src="images/img-prize-share.png" width="100%" style="margin-top:0;"/></div>
	<div class="bz-pop-bg e-pop-bg"></div>
</div>


</body>
</html>
<script>


</script>