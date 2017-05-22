

<?php
	$cleft_tci	=	& get_instance();
	
	$cleft_pid	=	$cleft_tci->session->userdata('patentis');
	
	
	$navdestory	=	$cleft_tci->router->fetch_directory();
	$navclasses	=	$cleft_tci->router->fetch_class();
	$navaction	=	$cleft_tci->router->fetch_method();
	
	
	$userinfo	=	getmemberinfo();
?>



<div class="sidebar sidebar-style-blue inline-box overflow">
	<ul class="sidebar-nav">
		<li>
			<a href="<?php echo site_url('home')?>" alt="notice" class="<?php if($navclasses == 'home' && ( $navaction == 'index' || $navaction == 'search' ) ){ echo 'active'; }?>"><i></i>筛查记录表</a>
		</li>
		
		<?php 
			if($userinfo && in_array($userinfo['group'],array(1,4))){
		?>
		<li>
			<a href="<?php echo site_url('home/add')?>" alt="notice" class="<?php if($navclasses == 'home' && $navaction == 'add'){ echo 'active'; }?>"><i></i>新建筛查表</a>
		</li>
		<?php
			}
		?>
		
		<?php 
			if($userinfo && in_array($userinfo['group'],array(1,2))){
		?>
		<li>
			<a href="<?php echo site_url('home/export')?>" alt="notice" class="<?php if($navclasses == 'home' && $navaction == 'export'){ echo 'active'; }?>"><i></i>筛查表导出</a>
		</li>
		<?php
			}
		?>
		<?php 
			if($userinfo && in_array($userinfo['group'],array(1,2,4))){
		?>
		<li <?php if($navclasses == 'bjscreening' || $navclasses == 'bjcase' || $navclasses == 'cardiac'){?>class="open"<?php } ?>>
			
			<a href="javascript:;" role="button"  alt="research" <?php if($navclasses == 'bjscreening' || $navclasses == 'bjcase' || $navclasses == 'cardiac'){?>class="active"<?php } ?>><i></i>北京地区病历库</a>
			
			<ul>
				<li>
					<a href="<?php echo site_url('bjcase/index')?>" alt="research" <?php if($navclasses == 'bjcase' && $navaction == 'index'){?>class="active"<?php } ?>>糖尿病神经病变调查表</a>
				</li>
				<li>
					<a href="<?php echo site_url('bjcase/add')?>" alt="research" <?php if($navclasses == 'bjcase' && $navaction == 'add'){?>class="active"<?php } ?>>新建糖尿病调查表</a>
				</li>
				
			</ul>
		</li>
		<?php
			}
		?>
		
		<?php 
			if($userinfo && in_array($userinfo['group'],array(1,2,4))){
		?>
		<li <?php if($navclasses == 'analysis'){?>class="open"<?php } ?>>
			
			<a href="javascript:;" role="button"  alt="research" <?php if($navclasses == 'analysis'){?>class="active"<?php } ?>><i></i>分析库</a>
			
			<ul>
				<li>
					<a href="<?php echo site_url('analysis/index')?>" alt="research" <?php if($navclasses == 'analysis' && $navaction == 'index'){?>class="active"<?php } ?>> 录入数量</a>
				</li>
				
			</ul>
		</li>
		<?php
			}
		?>
		
		<?php 
			if($userinfo && $userinfo['group'] == 1){
		?>
		<li>
			<a href="<?php echo site_url('manage')?>" alt="notice" class="<?php if($navclasses == 'manage'){ echo 'active'; }?>"><i></i>用户管理</a>
		</li>
		
		<?php
			}
		?>
		
		<li>
			<a href="<?php echo site_url('feedback');?>" alt="research" class="<?php if($navclasses == 'feedback'){ echo 'active'; }?>"><i></i>意见反馈</a>
		</li>
		
		<?php 
			if($userinfo && $userinfo['group'] == 1){
		?>
		<li>
			<a href="<?php echo site_url('member/updates');?>" alt="research" class="<?php if($navclasses == 'member'){ echo 'active'; }?>"><i></i>修改密码</a>
		</li>
		<?php
			}
		?>
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

