<?php 
$tempci	=	& get_instance(); 


$navdestory	=	$tempci->router->fetch_directory();
$navclasses	=	$tempci->router->fetch_class();
$navaction	=	$tempci->router->fetch_method();

?>

<?php 
	if ( $navclasses == 'keywords' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">文献阅读</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'keywords' && $navaction == 'search' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">关键词订阅</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'keywords' && $navaction == 'manage' ) {
?>
<div class="address-bar">
	<p>
		<a href="<?php echo site_url('home');?>">首页</a> > 
		<a href="<?php echo site_url('keywords');?>">文献阅读</a> > 
		
		<b><a href="javascript:;">订阅关键词管理</a></b>
		</p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'report' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <a href="<?php echo site_url('report/search');?>">文献阅读</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'cases' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'disease' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'library' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'news' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <a href="<?php echo site_url('news/search');?>">文献阅读</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'prename' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'pubmed' && $navaction == 'showliter' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">文献详情</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'pubmed' && $navaction == 'search' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">文献搜索</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'sci' && $navaction == 'index' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">SCI论文润色</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'card' && $navaction == 'index' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">学术名片</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'notice' && $navaction == 'lists' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <b><a href="javascript:;">医院通知</a></b></p>
</div>
<?php 
	}
?>

<?php 
	if ( $navclasses == 'notice' && $navaction == 'show' ) {
?>
<div class="address-bar">
	<p><a href="<?php echo site_url('home');?>">首页</a> > <a href="<?php echo site_url('notice/lists');?>">医院通知</a> > <b><a href="javascript:;">正文</a></b></p>
</div>
<?php 
	}
?>
