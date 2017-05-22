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
			<a href="<?php echo site_url('reactions/edit/'.$cleft_pid)?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'edit' ){?>class="active"<?php } ?>> <i></i> 基本信息</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/badinfo')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'badinfo'){?>class="active"<?php } ?>> <i></i> 患者基本信息</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/usage')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'usage'){?>class="active"<?php } ?>> <i></i>银杏内酯注射液使用情况</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/merge')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'merge'){?>class="active"<?php } ?>> <i></i>合并用药及治疗措施</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/appear')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'appear'){?>class="active"<?php } ?>> <i></i>不良事件出现情况</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/evaluation')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'evaluation'){?>class="active"<?php } ?>> <i></i>不良反应/事件评价</a>
		</li>
		
		<li <?php if($navclasses == 'laboratory' && !in_array($navaction,array('vital','addvital','editvital')) ){?>class="open"<?php } ?>>
			<a href="javascript:;" role="button"  alt="research" <?php if($navclasses == 'laboratory' && !in_array($navaction,array('vital','addvital','editvital'))){?>class="active"<?php } ?>> <i></i>实验室检查</a>
			<ul>
				<li>
					<a href="<?php echo site_url('laboratory/index')?>" alt="research" <?php if($navclasses == 'laboratory' && ($navaction == 'index' || $navaction == 'addblood'  || $navaction == 'editblood' )){?>class="active"<?php } ?>> 血常规</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('laboratory/coagulation')?>" alt="research" <?php if($navclasses == 'laboratory' && ( $navaction == 'coagulation' || $navaction == 'addcoagulation'  || $navaction == 'editcoagulation'  )){?>class="active"<?php } ?>> 凝血功能</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('laboratory/biochemical')?>" alt="research" <?php if($navclasses == 'laboratory' && ( $navaction == 'biochemical' || $navaction == 'addbiochemical' || $navaction == 'editbiochemical')){?>class="active"<?php } ?>> 生化功能</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('laboratory/cardiogram')?>" alt="research" <?php if($navclasses == 'laboratory' && ( $navaction == 'cardiogram' || $navaction == 'addcardiogram' || $navaction == 'editcardiogram' )){?>class="active"<?php } ?>> 心电图</a>
				</li>
				
				<li>
					<a href="<?php echo site_url('laboratory/other')?>" alt="research" <?php if($navclasses == 'laboratory' && ( $navaction == 'other' || $navaction == 'addother' || $navaction == 'editother' )){?>class="active"<?php } ?>> 其他重要辅助检查</a>
				</li>
				
				
			</ul>
		</li>
		
		<li>
			<a href="<?php echo site_url('laboratory/vital')?>" alt="research" <?php if($navclasses == 'laboratory' && ( $navaction == 'vital' || $navaction == 'addvital' || $navaction == 'editvital' )){?>class="active"<?php } ?>> <i></i>生命体征</a>
		</li>
		
		<li>
			<a href="<?php echo site_url('reactions/signature')?>" alt="research" <?php if($navclasses == 'reactions' && $navaction == 'signature' ){?>class="active"<?php } ?>> <i></i>签名</a>
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

