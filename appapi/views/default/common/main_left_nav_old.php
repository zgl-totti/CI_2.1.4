<?php
	$main_left_nav_uri	=	get_segment_arr();
	
	$main_left_seg_1	=	isset($main_left_nav_uri[1]) ? $main_left_nav_uri[1] : '';
	$main_left_seg_2	=	isset($main_left_nav_uri[2]) ? $main_left_nav_uri[2] : '';
	$main_left_seg_3	=	isset($main_left_nav_uri[3]) ? $main_left_nav_uri[3] : '';
?>

<div id="sidebar">
	<a href="<?php echo site_aurl('admin/main')?>" class="visible-phone">
		<i class="icon icon-home"></i> 后台首页
	</a>
	
	<ul>
		<li <?php if($main_left_seg_1 && $main_left_seg_1 == 'main'){ ?>class="active"<?php }?>>
			<a href="<?php echo site_aurl('admin/main')?>"><i class="icon icon-home"></i> <span>后台首页</span></a>
		</li>
		
		<li class="submenu <?php if($main_left_seg_1 && $main_left_seg_1 == 'admin_manage'){ ?> active open <?php }?>">
			<a href="javascript:;">
				<i class="icon icon-th-list"></i> 
				<span>个人中心</span> 
				<span class="label">2</span>
			</a>
			
			<ul <?php if($main_left_seg_1 == 'admin_manage'){ ?> style='display:block;' <?php }?>>
				<li <?php if($main_left_seg_1 == 'admin_manage' && $main_left_seg_2 == 'index'){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('admin/admin_manage/editpwd')?>">修改密码</a>
				</li>
				
				<li <?php if($main_left_seg_2 && $main_left_seg_2 == 'editinfo'){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('admin/admin_manage/editinfo')?>">个人资料</a>
				</li>
				
			</ul>
		</li>
		
		
		<li class="submenu <?php if($main_left_seg_1 && $main_left_seg_1 == 'sitemodel'){ ?> active open <?php }?>">
			<a href="javascript:;">
				<i class="icon icon-th-list"></i> 
				<span>内容管理</span> 
				<span class="label">1</span>
			</a>
			
			<ul <?php if($main_left_seg_1 == 'sitemodel'){ ?> style='display:block;' <?php }?>>
				<li <?php if($main_left_seg_1 == 'sitemodel' && ($main_left_seg_2 == 'index' || $main_left_seg_2 == 'edit') ){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('content/sitemodel')?>">模型管理</a>
				</li>
				
			</ul>
		</li>
		
		
		<li class="submenu <?php if($main_left_seg_1 && $main_left_seg_1 == 'menu'){ ?> active open<?php }?>">
			<a href="javascript:;">
				<i class="icon icon-th-list"></i> 
				<span>系统管理</span> 
				<span class="label">1</span>
			</a>
			
			<ul <?php if($main_left_seg_1 == 'menu'){ ?> style='display:block;' <?php }?>>
				<li <?php if($main_left_seg_1 == 'menu' && ($main_left_seg_2 == 'index' || $main_left_seg_2 == 'add' || $main_left_seg_2 == 'edit') ){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('system/menu')?>">菜单管理</a>
				</li>
			</ul>
		</li>
		
		
		<li class="submenu <?php if($main_left_seg_1 == 'manage_user' || $main_left_seg_1 == 'role'){ ?> active open<?php }?>">
			<a href="javascript:;">
				<i class="icon icon-th-list"></i> 
				<span>管理员设置</span> 
				<span class="label">2</span>
			</a>
			
			<ul <?php if($main_left_seg_1 == 'manage_user' ||  $main_left_seg_1 == 'role'){ ?> style='display:block;' <?php }?>>
				<li <?php if($main_left_seg_1 == 'manage_user'){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('admin/manage_user')?>">管理员管理</a>
				</li>
				
				<li <?php if( $main_left_seg_1 == 'role'){ ?> class="active" <?php }?>>
					<a href="<?php echo site_aurl('seeting/role')?>">角色管理</a>
				</li>
				
			</ul>
		</li>

	</ul>
</div>
