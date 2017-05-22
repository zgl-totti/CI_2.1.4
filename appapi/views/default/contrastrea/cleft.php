<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('bad_patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
?>



<div class="sidebar sidebar-style-blue inline-box overflow">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo site_url('contrastrea/edit/'.$cleft_pid)?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'edit' ){?>class="active"<?php } ?>> <i></i> 基本信息</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/badinfo')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'badinfo'){?>class="active"<?php } ?>> <i></i> 患者基本信息</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/usage')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'usage'){?>class="active"<?php } ?>> <i></i>银杏内酯注射液使用情况</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/merge')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'merge'){?>class="active"<?php } ?>> <i></i>合并用药及治疗措施</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/appear')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'appear'){?>class="active"<?php } ?>> <i></i>不良事件出现情况</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/evaluation')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'evaluation'){?>class="active"<?php } ?>> <i></i>不良反应/事件评价</a>
		</li>
		
		<li <?php if($navclasses == 'contrastlab' && !in_array($navaction,array('vital','addvital','editvital')) ){?>class="open"<?php } ?>>
			<a href="javascript:;" role="button"  alt="research" <?php if($navclasses == 'contrastlab' && !in_array($navaction,array('vital','addvital','editvital'))){?>class="active"<?php } ?>> <i></i>实验室检查</a>
			<ul>
				<li>
					<a href="<?php echo site_url('contrastlab/index')?>" alt="research" <?php if($navclasses == 'contrastlab' && ($navaction == 'index' || $navaction == 'addblood'  || $navaction == 'editblood' )){?>class="active"<?php } ?>> 血常规</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('contrastlab/coagulation')?>" alt="research" <?php if($navclasses == 'contrastlab' && ( $navaction == 'coagulation' || $navaction == 'addcoagulation'  || $navaction == 'editcoagulation'  )){?>class="active"<?php } ?>> 凝血功能</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('contrastlab/biochemical')?>" alt="research" <?php if($navclasses == 'contrastlab' && ( $navaction == 'biochemical' || $navaction == 'addbiochemical' || $navaction == 'editbiochemical')){?>class="active"<?php } ?>> 生化功能</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('contrastlab/cardiogram')?>" alt="research" <?php if($navclasses == 'contrastlab' && ( $navaction == 'cardiogram' || $navaction == 'addcardiogram' || $navaction == 'editcardiogram' )){?>class="active"<?php } ?>> 心电图</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('contrastlab/other')?>" alt="research" <?php if($navclasses == 'contrastlab' && ( $navaction == 'other' || $navaction == 'addother' || $navaction == 'editother' )){?>class="active"<?php } ?>> 其他重要辅助检查</a>
				</li>
				
				
			</ul>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastlab/vital')?>" alt="research" <?php if($navclasses == 'contrastlab' && ( $navaction == 'vital' || $navaction == 'addvital' || $navaction == 'editvital' )){?>class="active"<?php } ?>> <i></i>生命体征</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('contrastrea/signature')?>" alt="research" <?php if($navclasses == 'contrastrea' && $navaction == 'signature' ){?>class="active"<?php } ?>> <i></i>签名</a>
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

