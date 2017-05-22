<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 

<div id="content">
	<div class="container-fluid">
		
		<div class="row-fluid">
			
			<div class="span12">
				<?php
					if( isset($message) && $message ){
				?>
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">×</button>
					<?php echo $message;?>
				</div>
				<?php
					}
				?>
				
				<?php
					if(isset($backurl) && $backurl){
				?>
				<p class="text-info">
					<a href="<?php echo $backurl;?>" >如果您的浏览器没有自动跳转，请点击这里</a>
				</p>
				<script language="javascript">setTimeout("redirect('<?php echo $backurl;?>');",<?php echo isset($ms) ? $ms : 3000;?>);</script> 
				<?php
					}
				?>
				<p class="text-info">
				<a href="<?php echo site_aurl("admin/main")?>">返回首页</a>
				</p>
			</div>
			
		</div>
		
	</div>
	
</div>
		
<script>
function redirect(url) {
	location.href = url;
}
</script>	

<?php $this->load->view('common/footer');?>