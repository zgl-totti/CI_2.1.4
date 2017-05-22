<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
?>



<div class="sidebar sidebar-style-blue inline-box overflow">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo site_url('home/edit/'.$cleft_pid)?>" alt="research" <?php if($navclasses == 'home'){?>class="active"<?php } ?>> <i></i> 基本信息</a>
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

