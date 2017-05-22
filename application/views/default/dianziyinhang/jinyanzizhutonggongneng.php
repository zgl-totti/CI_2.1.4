<!doctype html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8" />
	<title>金燕自助通功能</title>
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
		.jianjie{
			margin: 0.42rem 0 0.09rem;
		}
		.gongneng_jianjie{
			margin: 0.42rem 0 0.11rem;
		}
		.youshi_tedian{
			margin: 0.42rem 0 0.09rem;
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
		<img src="<?php echo base_url('statics/images2/jinyanzizhutonggongneng.jpg');?>" width="100%" height="100%"/>
	</div>
	<div class="all">
		<img src="<?php echo base_url('statics/images2/pos_shoudan_icon.jpg');?>" alt="" class="jianjie" width="100%"/>
		<p class="paragraph">金燕自助通业务是指农信社为商户布放的用来刷卡消费或转账汇款，并为商户进行资金结算的业务。</p>
		<img src="<?php echo base_url('statics/images2/jinyanzizhutonggongneng-icon.jpg');?>" width="100%" class="gongneng_jianjie"/>
		<p class="paragraph">自助通终端可实现消费（收款）、汇款、查询打印、代发工资等功能，可利用存储的常用客户信息，同时向多达200个客户批量汇款。</p>
		<p class="paragraph">1.消费功能：与传统POS功能相同，可实现持卡人与商户之间的商品交易。</p>
		<p class="paragraph">2.汇款功能：商户足不出户，就可以实现网银、柜面完成的业务，加快了商户资金周转速度，降低商户资金周转成本。跨行汇款时，每笔最高额为5万元；农信系统内汇款时，每笔最高额为20万元。</p>
		<p class="paragraph">3.查询打印功能。商户无须到农信社网点即可查询打印商户收付款的总金额和总笔数，交易明细，提高了商户对账效率。</p>
		<p class="paragraph">4.信息储存功能。商户可以把常用的客户信息保存至终端上，发生业务时，直接调用，提高了汇款效率。</p>
		<p class="paragraph">5.代发工资功能。中小商户可将员工信息录入终端，利用终端代发工资功能将员工工资打到银行卡上。</p>
		<img src="<?php echo base_url('statics/images2/jinyanzizhutonggongneng-icon1.jpg');?>" width="100%" class="youshi_tedian"/>
		<p class="paragraph">1.农信社系统内刷卡或转账汇款不收手续费。</p>
		<p class="paragraph">2.资金实时到账。</p>
		<p class="paragraph">3.可在终端上打印当天交易明细。</p>
		<img src="<?php echo base_url('statics/images2/jinyanzizhutonggongneng-icon2.jpg');?>" width="100%" class="youshi_tedian"/>
		<p class="paragraph">1.工商营业执照原件（事业法人证书、医疗机构执业许可证等）及其复印件；</p>
		<p class="paragraph">2.负责人身份证件原件及其复印件；</p>
		<p class="paragraph">3.税务登记证原件及其复印件，不能提供税务登记证的，可以交税凭证或免税证明代替。</p>
		<p class="paragraph">4.在农信社开立对公账户或金燕卡。</p>
		<img src="<?php echo base_url('statics/images2/jinyanzizhutonggongneng-icon3.jpg');?>" width="100%" class="youshi_tedian"/>
		<p class="paragraph">1.金燕IC卡消费</p>
		<p>单笔限额20万，日累100万</p>
		<p class="paragraph">2.转账</p>
		<p>行内单笔限额20万，日累100万<br />跨行单笔5万，日累20万</p>
		<img src="<?php echo base_url('statics/images3/jinyanka_jianjie_16.jpg');?>" width="100%" class="grcb"/>
		<div class="phone"><p>0371-69530036</p></div>
	</div>
	<div class="bot clearfix"><img src="<?php echo base_url('statics/images3/bot.png');?>" alt="" width="100%"/></div>
</body>
</html>