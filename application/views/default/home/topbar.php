<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
	
	$model = $this->uri->segment(3);
	$topbar	=	array('url'=>'','name'=>'');
	if($navclasses == 'home' && $navaction == 'edit'){
		$topbar['url']	=	site_url('home/edit/'.$cleft_pid);
		$topbar['name']	=	'基本信息';
	}
if( $topbar['url'] && $topbar['name'] )	{
?>

<div class="address-bar">
	<p><a href="<?php echo base_url();?>">首页</a> &gt; 
		<?php
			if( ! ( ($navclasses == 'home' && $navaction == 'add') ||  $navclasses == 'feedback')  ){
		?>
		
			<a href="<?php echo site_url('home/edit/'.$cleft_pid);?>">记录详情</a>
		
		 &gt; 
		<?php
			}
		?>
		
			<a href="<?php echo $topbar['url'];?>"><?php echo $topbar['name'];?></a>
		
	</p>
</div>
<?php
}
?>