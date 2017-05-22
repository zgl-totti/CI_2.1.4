<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
	
	
	$topbar	=	array('url'=>'','name'=>'');
	if( $navclasses == 'reactions' || $navclasses == 'laboratory' ){
		$topbar['url']	=	site_url('reactions');
		$topbar['name']	=	'不良反应（病例组）';
	}elseif( $navclasses == 'contrastrea' || $navclasses == 'contrastlab' ){
		$topbar['url']	=	site_url('reactions');
		$topbar['name']	=	'不良反应（对照组）';
	}elseif( $navclasses == 'clinical' ){
		$topbar['url']	=	site_url('clinical/one_index');
		$topbar['name']	=	'临床病例';
	}
	

if( $topbar['url'] && $topbar['name'] )	{
?>

<div class="address-bar">
	<p><a href="<?php echo base_url();?>">首页</a> &gt; 
		<a href="<?php echo $topbar['url'];?>"><?php echo $topbar['name'];?></a>
	</p>
</div>
<?php
}
?>