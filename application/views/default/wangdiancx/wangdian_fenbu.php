<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
		<!--<link rel="stylesheet" href="css/global.css" />-->
		<title>网点分布</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/css1/global.css');?>"/>
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
			background: #ff8300;
			font-size: 0;
			padding-top: 0.3rem;
			padding-left: 2%;
			padding-right:1%;
		}
		a{
			text-decoration: none;
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
		p{
			margin: 0;
			padding: 0;
			font-size:0.17rem;
			color: #545454;
			line-height: 0.26rem;
			position: relative;
		}
		.all{
			padding-top: 0.1rem;
			width: 94%;
			margin: 0 auto;
			
		}
		.div{
			display: block;
			width: 49%;
			height: 1.2rem;
			background-color: #fff;
			border-bottom: 0.01rem solid #f9f9f8;
			border-right: 0.01rem solid #f9f9f8;
			padding: 0.16rem 0 0 0.28rem;
			float: left;
			margin-right: 1%;
			margin-bottom: 0.04rem;
		}
		.jiantou2{
			margin-left: 0.8rem;
			margin-top: 0.1rem;
		}
		img{
			position: absolute;
			width: 0.15rem;
			right: 0.2rem;
			top: 0.3rem;
		}
	</style>
	</head>
	<body>
		<div class="all clearfix">
			<a href="<?php echo site_url('wxmain/dingwei1');?>" class="div">
				<p>巩义农商业银行口头分理处<br />地址: &nbsp;&nbsp;小关镇口头村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530062</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei2');?>" class="div">
				<p>巩义农商业银行道南分理处<br />地址: &nbsp;&nbsp;新市场西北边<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/> ( 建筑<br />公司楼下 ) <br />电话:0371-69530091</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei3');?>" class="div">
				<p>巩义农商业银行八陵分理处<br />地址: &nbsp;&nbsp;芝田镇八陵村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530129</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei4');?>" class="div">
				<p>巩义农商业银行回郭镇支行<br />地址: &nbsp;&nbsp;回郭镇车站<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530146</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei5');?>" class="div">
				<p>巩义农商业银行镇西分理处<br />地址: &nbsp;&nbsp;回郭镇北寺村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530153</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei6');?>" class="div">
				<p>巩义农商业银行城中支行<br />地址: &nbsp;&nbsp;人民路41号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530172</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei7');?>" class="div">
				<p>巩义农商业银行人民东路支行<br />地址: &nbsp;&nbsp;人民东路33号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530185</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei8');?>" class="div">
				<p>巩义农商业银行园丁街分理处<br />地址: &nbsp;&nbsp;园丁街口<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530186</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei9');?>" class="div">
				<p>巩义农商银行<br />地址: &nbsp;&nbsp;人民东路23号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530163</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei10');?>" class="div">
				<p>巩义农商业银行米河支行<br />地址: &nbsp;&nbsp;米河镇两河口<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530051</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei11');?>" class="div">
				<p>巩义农商业银行米河分理处<br />地址: &nbsp;&nbsp;米河镇米河老集<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530052</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei12');?>" class="div">
				<p>巩义农商业银行小里河分理处<br />地址: &nbsp;&nbsp;米河镇汇龙村农民公<br>寓一楼<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530053</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei13');?>" class="div">
				<p>巩义农商业银行草店分理处<br />地址: &nbsp;&nbsp;米河镇草店村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530055</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei14');?>" class="div">
				<p>巩义农商业银行新中分理处<br />地址: &nbsp;&nbsp;新中镇新中村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69630058</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei15');?>" class="div">
				<p>巩义农商业银行新中支行<br />地址: &nbsp;&nbsp;新中镇茶店村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530057</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei16');?>" class="div">
				<p>巩义农商业银行小关支行<br />地址: &nbsp;&nbsp;小关镇小关村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530061</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei17');?>" class="div">
				<p>巩义农商业银行长寿山分理处<br />地址: &nbsp;&nbsp;竹林镇镇东街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530063</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei18');?>" class="div">
				<p>巩义农商业银行小关分理处<br />地址: &nbsp;&nbsp;小关镇小关矿山门口<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530065</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei19');?>" class="div">
				<p>巩义农商业银行大峪沟支行<br />地址: &nbsp;&nbsp;大峪沟镇中心街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530068</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei20');?>" class="div">
				<p>巩义农商业银行大峪沟分理处<br />地址: &nbsp;&nbsp;大峪沟镇警民街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530069</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei21');?>" class="div" >
				<p>巩义农商业银行河洛分理处<br />地址: &nbsp;&nbsp;河洛镇河洛村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530071</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei22');?>" class="div">
				<p>巩义农商业银行南河渡支行<br />地址: &nbsp;&nbsp;南河渡镇石关集<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530072</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei23');?>" class="div">
				<p>巩义农商业银行蔡沟分理处<br />地址: &nbsp;&nbsp;南河渡镇蔡沟村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530073</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei24');?>" class="div">
				<p>巩义农商业银行神南分理处<br />地址: &nbsp;&nbsp;南河渡镇神南村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530076</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei25');?>" class="div">
				<p>巩义农商业银行康店支行<br />地址: &nbsp;&nbsp;康店镇桥头康北村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530077</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei26');?>" class="div">
				<p>巩义农商业银行黑石关分理处<br />地址: &nbsp;&nbsp;康店镇黑北村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530078</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei27');?>" class="div">
				<p>巩义农商业银行礼泉分理处<br />地址: &nbsp;&nbsp;康店镇礼泉村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530079</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei28');?>" class="div">
				<p>巩义农商业银行张岭分理处<br />地址: &nbsp;&nbsp;康店镇张岭村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530080</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei29');?>" class="div">
				<p>巩义农商业银行赵沟分理处<br />地址: &nbsp;&nbsp;康店镇赵沟村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530081</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei30');?>" class="div">
				<p>巩义农商业银行柏坡分理处<br />地址: &nbsp;&nbsp;康店镇徐柏坡村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530082</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei31');?>" class="div">
				<p>巩义农商业银行孝义支行<br />地址: &nbsp;&nbsp;新华路236号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530086</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei32');?>" class="div">
				<p>巩义农商业银行烈江沟分理处<br />地址: &nbsp;&nbsp;汽车北站东50米<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69520087</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei33');?>" class="div">
				<p>巩义农商业银行交通路分理处<br />地址: &nbsp;&nbsp;交通路2号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530089</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei34');?>" class="div">
				<p>巩义农商业银行火车站分理处<br />地址: &nbsp;&nbsp;巩义市火车站<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530090</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei35');?>" class="div">
				<p>巩义农商业银行道北分理处<br />地址: &nbsp;&nbsp;嵩洛路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530092</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei36');?>" class="div">
				<p>巩义农商业银行杜甫路分理处<br />地址: &nbsp;&nbsp;杜甫路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530095</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei37');?>" class="div">
				<p>巩义农商业银行北山口支行<br />地址: &nbsp;&nbsp;杜甫路58号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530098</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei38');?>" class="div">
				<p>巩义农商业银行南山口分理处<br />地址: &nbsp;&nbsp;北山口镇南山口车站<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530099</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei39');?>" class="div">
				<p>巩义农商业银行北山口分理处<br />地址: &nbsp;&nbsp;北山口汽车站<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530191</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei40');?>" class="div">
				<p>巩义农商业银行北官庄分理处<br />地址: &nbsp;&nbsp;北山口镇白河村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530192</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei41');?>" class="div">
				<p>巩义农商业银行西村支行<br />地址: &nbsp;&nbsp;西村汽车站<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530126</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei42');?>" class="div">
				<p>巩义农商业银行西村分理处<br />地址: &nbsp;&nbsp;西村镇人民东路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530125</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei43');?>" class="div">
				<p>巩义农商业银行芝田支行<br />地址: &nbsp;&nbsp;芝田镇<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530127</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei44');?>" class="div">
				<p>巩义农商业银行蔡庄分理处<br />地址: &nbsp;&nbsp;芝田镇蔡庄村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530128</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei45');?>" class="div">
				<p>巩义农商业银行永安分理处<br />地址: &nbsp;&nbsp;永安街道办后泉沟村<br>工业示范区永安路12号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530150</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei46');?>" class="div">
				<p>巩义农商业银行鲁庄支行<br />地址: &nbsp;&nbsp;鲁庄镇兴鲁北街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530132</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei47');?>" class="div">
				<p>巩义农商业银行侯地分理处<br />地址: &nbsp;&nbsp;鲁庄镇南侯村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530133</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei48');?>" class="div">
				<p>巩义农商业银行涉村支行<br />地址: &nbsp;&nbsp;涉村镇人民中路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530136</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei49');?>" class="div">
				<p>巩义农商业银行夹津口支行<br />地址: &nbsp;&nbsp;夹津口镇兴夹街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530140</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei50');?>" class="div">
				<p>巩义农商业银行核桃园分理处<br />地址: &nbsp;&nbsp;涉村镇桃园西街18号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530143</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei51');?>" class="div">
				<p>巩义农商业银行清易镇分理处<br />地址: &nbsp;&nbsp;回郭镇清易镇村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530148</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei52');?>" class="div">
				<p>巩义农商业银行柏玉分理处<br />地址: &nbsp;&nbsp;回郭镇柏玉村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530149</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei53');?>" class="div">
				<p>巩义农商业银行马口分理处<br />地址: &nbsp;&nbsp;回郭镇马口村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530152</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei54');?>" class="div">
				<p>巩义农商业银行站街支行<br />地址: &nbsp;&nbsp;站街镇县府街<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530159</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei55');?>" class="div">
				<p>巩义农商业银行新沟分理处<br />地址: &nbsp;&nbsp;站街镇新沟村<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530160</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei56');?>" class="div">
				<p>巩义农商业银行人民路分理处<br />地址: &nbsp;&nbsp;人民路106号付1号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530173</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei57');?>" class="div">
				<p>巩义农商业银行明阳分理处<br />地址: &nbsp;&nbsp;桐本路与杜甫路<br>交叉口<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530175</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei58');?>" class="div">
				<p>巩义农商业银行嵩山路分理处<br />地址: &nbsp;&nbsp;东区嵩山路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69532021</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei59');?>" class="div">
				<p>巩义农商业银行新华路分理处<br />地址: &nbsp;&nbsp;新华路1号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530177</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei60');?>" class="div">
				<p>巩义农商业银行通桥路分理处<br />地址: &nbsp;&nbsp;通桥路20号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530176</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei61');?>" class="div">
				<p>巩义农商业银行新兴路分理处<br />地址: &nbsp;&nbsp;新兴路<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530187</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei62');?>" class="div">
				<p>巩义农商业银行金帝分理处<br />地址: &nbsp;&nbsp;孝义镇孝北村金地花<br>园104号<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530196</p>
			</a>
			<a href="<?php echo site_url('wxmain/dingwei63');?>" class="div">
				<p>巩义农商业银行万洋分理处<br />地址: &nbsp;&nbsp;杜甫路街道办外沟村<br>万洋国际商贸城9栋一层<img src="<?php echo base_url('statics/images3/jiantou2.png');?>" width="6%" "/><br />电话:0371-69530186</p>
			</a>
			
		</div>
	</body>
</html>
