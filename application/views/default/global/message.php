<?php 
$tempci	=	& get_instance(); 
templates('global','header');

//templates('global','top');
?>
<div class="main-board padding-40">
	<dl class="float-box sci-wrap">
		<dd class="inline-box one-twice sci-item" style='width:98%'>
			<div class="inline-box wrapping">
				<h3><a href="javascript:;">提示信息</a></h3>
				<p><?php echo $message;?></p>
				<hr />
				<div class="links">
					<?php
						if(isset($backurl) && $backurl){
					?>
					<a href="<?php echo $backurl;?>" class="inline-block">如果您的浏览器没有自动跳转，请点击这里</a>
					
					<script language="javascript">setTimeout("redirect('<?php echo $backurl;?>');",<?php echo $ms;?>);</script> 
					<?php
						}
					?>
				</div>
			</div>
		</dd>
	</dl>
</div>

<script>
function redirect(url) {
	location.href = url;
}
</script>