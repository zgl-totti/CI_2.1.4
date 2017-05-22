<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>pos收单业务</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
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
		.yewu_jianjie{
			margin: 0.42rem 0 0.09rem;
		}
		.shouli_kazhong{
			margin: 0.42rem 0 0.1rem;
		}
		.yewu_gongneng{
			margin: 0.42rem 0 0.09rem;
		}
		.shenban_cailiao{
			margin: 0.42rem 0 0.23rem;
		}
		.zhuyi_shixiang,.shenpi_liucheng{
			margin: 0.42rem 0 0.23rem;
		}
		.grcb{
			margin: 0.47rem 0 0.4rem;
		}
		.paragraph{
			text-indent: 0.44rem;
		}
		li{
			font-size: 0.22rem;
			color: #e53936;
			line-height: 0.28rem;
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
		<img src="<?php echo base_url('statics/images1/pos_shoudan.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon.jpg');?>" alt="" class="yewu_jianjie" width="100%"/>
		<p class="paragraph">银行卡收单业务是指签约银行向商户提供的本外币资金结算服务，最终持卡人在银行签约商户那里刷卡消费，银行结算。收单银行结算的过程就是从商户那边得到交易单据和交易数据，扣除按费率计算出的费用后打款给商户。</p>
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon2.jpg');?>" width="100%" class="shouli_kazhong"/>
		<p class="paragraph">带有银联标识的信用卡以及借记卡</p>
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon3.jpg');?>" width="100%" class="yewu_gongneng"/>
		<p style="color:#e53936;">1.消费交易</p>
		<p class="paragraph">消费是指特约商户在出售商品或提供服务时，通过POS 终端渠道完成消费者用卡付款的过程。</p>
		<p style="color:#e53936;margin-top: 0.28rem;">2.预授权交易</p>
		<p class="paragraph">预授权是指特约商户通过POS 终端渠道，就持卡人预计支付金额向发卡机构索取付款承诺的过程。预授权交易将对卡片的部分金额预先冻结而并未实现资金的清算，实际的资金结算发生在预授权完成交易环节。</p>
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon4.jpg');?>" width="100%" class="shenban_cailiao"/>
		<p class="paragraph"><span style="color:#e53936;">1.</span>工商营业执照原件（事业法人证书、医疗机构执业许可证等）及其复印件；</p>
		<p class="paragraph"><span style="color:#e53936;">2.</span>负责人身份证件原件及其复印件；</p>
		<p class="paragraph"><span style="color:#e53936;">3.</span>税务登记证原件及其复印件，不能提供税务登记证的，可以交税凭证或免税证明代替。</p>
		<p class="paragraph"><span style="color:#e53936;">4.</span>用于结算的账户，须在河南省农村信用社开立单位银行结算账户或个人银行卡结算账户，个人银行卡结算账户只适用于个体工商户。</p>
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon5.jpg');?>" width="100%" class="zhuyi_shixiang"/>
		<p class="paragraph"><span style="color:#e53936;">1.</span>工商营业执照原件（事业法人证书、医疗机构执业许可证等）及其复印件；</p>
		<p class="paragraph"><span style="color:#e53936;">2.</span>负责人身份证件原件及其复印件；</p>
		<p class="paragraph"><span style="color:#e53936;">3.</span>税务登记证原件及其复印件，不能提供税务登记证的，可以交税凭证或免税证明代替。</p>
		<p class="paragraph"><span style="color:#e53936;">4.</span>用于结算的账户，须在河南省农村信用社开立单位银行结算账户或个人银行卡结算账户，个人银行卡结算账户只适用于个体工商户。</p>
		<img src="<?php echo base_url('statics/images1/pos_shoudan_icon6.jpg');?>" width="100%" class="shenpi_liucheng"/>
		<p class="paragraph">商户提出申请>商户提供资料>进行入网审批>开通>商户现场装机</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>