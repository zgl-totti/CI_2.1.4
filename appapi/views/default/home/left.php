<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
?>



<div class="sidebar sidebar-style-blue inline-box overflow">
	<ul class="sidebar-nav">
		
		
		<li <?php if($navclasses == 'clinical'){?>class="open"<?php } ?>>
			
			<a href="javascript:;" role="button"  alt="research" <?php if($navclasses == 'clinical'){?>class="active"<?php } ?>><i></i>临床病例</a>
			
			<ul>
				<li>
					<a href="<?php echo site_url('clinical/one_index')?>" alt="research" <?php if($navclasses == 'clinical' && $navaction == 'one_index' || $navaction == 'one_add' || $navaction == 'one_edit'){?>class="active"<?php } ?>> 临床病例收集表01</a>
				</li>
				<li>
					<a href="<?php echo site_url('clinical/two_index')?>" alt="research" <?php if($navclasses == 'clinical' && $navaction == 'two_index' || $navaction == 'two_add' || $navaction == 'two_edit'){?>class="active"<?php } ?>> 临床病例收集表02</a>
				</li>
				<li>
					<a href="<?php echo site_url('clinical/three_index')?>" alt="research" <?php if($navclasses == 'clinical' && $navaction == 'three_index' || $navaction == 'three_add' || $navaction == 'three_edit'){?>class="active"<?php } ?>> 临床病例收集表03</a>
				</li>
				
			</ul>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions')?>" alt="notice" class="<?php if($navclasses == 'reactions'){ echo 'active'; }?>"><i></i>不良反应（病例组）</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea')?>" alt="notice" class="<?php if($navclasses == 'contrastrea'){ echo 'active'; }?>"><i></i>不良反应（对照组）</a>
		</li>
	</ul>
</div>

<script type="text/javascript">

	$(".sidebar-nav").find("[role='button']").on("click",function(e){
	
		var li = $(this).parent();
		var minHeight = 40;

		if(li.is(".open"))
		{
			
			li.removeClass("open");
			li.outerHeight(minHeight);
		}
		else
		{
			li.addClass("open").height(minHeight + li.find("ul").outerHeight());   
			li.siblings(".open").removeClass("open").outerHeight(minHeight);
		}
		
	});

	$(".sidebar-nav").children().each(function(){

		var li = $(this);
		var minHeight = 40;

		if(li.is(".open"))
		{
			li.height(minHeight + li.find("ul").outerHeight());
		}
		else
		{
			li.outerHeight(minHeight);
		}
	});

</script>

