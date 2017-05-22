<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>pos资费情况</title
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
			font-size: 0;
		}
		p{
			margin: 0;
			font-size: 0.27rem;
			color: #535354;
			line-height: 0.37rem;
			text-align:justify; 
			text-justify:distribute-all-lines;

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
		}
		.all{
			width: 94%;
			margin: 0 auto;
		}
		.ziyou_feilv{
			margin: 0.42rem 0 0.09rem;
		}
		.biaodan{
			margin-top: 0.29rem;
		}
		.guize{
			margin: 0.42rem 0 0.11rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
		}
		.phone{
			width: 100%;
			height: 0.32rem;
			background: url("<?php echo base_url('statics/images3/dianhuatubiao_03.png');?>") no-repeat 0 center;
			background-size: 0.32rem 0.32rem;
			margin-bottom: 0.27rem;
		}
		.phone p{
			font-size: 0.28rem;
			color: #d83834;
			line-height: 0.28rem;
			margin-left: 0.45rem;
		}
		.bot{
			height: 0.68rem;
			width: 100%;
		}
		.bot img{
			display: block;
			float: left;
		}
	</style>
</head>
<body>
	<div class="banner">
		<img src="<?php echo base_url('statics/images1/pos_zixun.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/pos_zixun-icon.jpg');?>" alt="" class="ziyou_feilv" width="100%"/>
		<p class="paragraph">借记卡0.45%18元封顶（根据商户存款贡献度浮动费率，最低为0），贷记卡0.503%</p>
		<img src="<?php echo base_url('statics/images1/sssssssss.png');?>" alt="" class="biaodan" width="100%"/>
		<img src="<?php echo base_url('statics/images1/pos_zixun-icon1.jpg');?>" width="100%" class="guize"/>
		<p style="color:#e53936;">(一)<span style="margin-left: 0.23rem;">标准</span></p>
		<p>1.标准价格特约商户（除优惠类和减免类商户之外的商户）</p>
		<p class="paragraph"><span style="display: inline-block;width: 0.12rem;height: 0.12rem;background-color:#e53936;border-radius: 50%;margin-right: 0.09rem;"></span>借记卡</p>
		<P>上浮档次计费标准：日均存款＜5万元。<br />
		标准档次计费标准：5万元≤日均存款＜10万元。<br />
		下浮档次计费标准：10万元≤日均存款＜50万元。<br />
		免费档次计费标准：日均存款≥50万元。</P>
		<p class="paragraph"><span style="display: inline-block;width: 0.12rem;height: 0.12rem;background-color:#e53936;border-radius: 50%;margin-right: 0.09rem;"></span>贷记卡</p>
		<p>POS特约商户各档次计费标准均为0.503%;</p>
		<p>2.非标准价格特约商户<br/>（优惠类和减免类商户）</p>
		<p style="text-indent:0.4rem;"><span style="display: inline-block;fopnt-size:0.27rem;color:#d22222;margin-right: 0.09rem;">(1)</span>优惠类（大型超市门店数量达到20家（含）以上；公共缴费主要指水务、供电、燃气、供暖、废弃物处理等公共服务；加油类；交通运输类。）</p>
		
		<p>借记卡<br />
		日均存款低于50万元的借记卡刷卡费率按0.3%封顶15元计收手续费；日均存款高于50万元（含）的借记卡刷卡费率免收手续费。<br />
		贷记卡<br />
		POS特约商户各档次计费标准均为0.503%</p>
		<p class="paragraph"><span style="display: inline-block;fopnt-size:0.27rem;color:#d22222;margin-right: 0.09rem;">(2)</span> 减免类：（非营利医疗机构；非营利教育机构；慈善机构。）不计收手续费。</p>
		<p style="color:#e53936;">(二)<span style="margin-left: 0.23rem;">规则</span></p>
		<p class="paragraph">1.存量特约客户日均存款按当年第二季度计息额倒推当季日均存款进行靠档调整，每年7月份进行，重新签订受理协议。</p>
		<p class="paragraph">2.新增特约商户费率按照商户类别对应上浮档次确定。</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>