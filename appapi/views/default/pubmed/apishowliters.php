<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		
		<!-- for 360 -->
        <meta name="renderer" content="webkit"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

		<title></title>
		<link rel="stylesheet" type="text/css" href="/statics/appapi/css/doctor.css">
		<link rel="stylesheet" type="text/css" href="/statics/appapi/css/doctor_style.css">
		
		<script src="/statics/global/js/jquery-1.8.2.min.js"></script>
	</head>
	<style>
	.article img{width:100%;}
	</style>
		<?php if (!isset($pmid)): ?>
			<div class="article">
				暂无新闻内容
			</div>
		<?php else: ?>
			<h2 class="title title-style-2"><?php echo $title; ?></h2>
			<p class="subtitle">翻译：<?php echo $title_trans ? $title_trans : '-'; ?> </p>
			<p class="subtitle">pubdate：<?php echo $pubdate; ?> </p>
			<p class="subtitle">source：<?php echo $source; ?> </p>
			<p class="subtitle">authorstr：<?php echo $authorstr; ?> </p>
			<p class="subtitle">fulljournalname：<?php echo $fulljournalname; ?> </p>
			<p class="subtitle">pubdate：<?php echo $pubdate; ?> </p>

			
			<div class="article">
				<?php echo $content; ?>
			</div>
		<?php endif ?>
		
		
		<script type="text/javascript">
			$(function(){
				$('.article img').css("width",'100%');
				$('.article img').removeAttr("width");
			});
		
			function addBookmark(title,url) { 
				if (window.sidebar) {
					window.sidebar.addPanel(title, url,"");
				} else if( document.all) {
					window.external.AddFavorite(url, title);
				} else if( window.opera && window.print ){
					return true;
				}else{
					alert("对不起，您的浏览器不支持此操作!\n请您使用菜单栏或Ctrl+D收藏本页。");
				}
			}
		</script>
		
	</body>
</html>