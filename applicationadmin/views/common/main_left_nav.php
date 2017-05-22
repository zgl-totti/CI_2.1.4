<?php
	$main_left_nav_uri	=	get_segment_arr();
	
	$manageMenulists	=	getManageMenu();
	
	$manageMenuParentid	=	isset($manageMenulists['manageMenuParentid']) ? $manageMenulists['manageMenuParentid'] : 
		array();
	
	$manageMenuChild	=	isset($manageMenulists['manageMenuChild']) ? $manageMenulists['manageMenuChild'] : array();
	
	$main_left_seg_m	=	isset($main_left_nav_uri[1]) ? $main_left_nav_uri[1] : '';
	$main_left_seg_c	=	isset($main_left_nav_uri[2]) ? $main_left_nav_uri[2] : '';
	$main_left_seg_a	=	isset($main_left_nav_uri[3]) ? $main_left_nav_uri[3] : '';
?>

<div id="sidebar">
	<a href="<?php echo site_aurl('admin/main')?>" class="visible-phone">
		<i class="icon icon-home"></i> 后台首页
	</a>
	
	<ul>
		
		<?php
			$classmenu	=	'';
			$classactive	=	'';
			if($manageMenuParentid ){
			foreach($manageMenuParentid AS $manageMenuParentidKey => $manageMenuParentidVal){
				if(isset($manageMenuChild[$manageMenuParentidVal['id']])){
					$classmenu	=	' submenu ';
				}else{
					$classmenu	=	'';
				}
				
				if( $main_left_seg_m && $main_left_seg_m == $manageMenuParentidVal['m'] ){ 
					$classactive	=	"active open";
				}else{
					$classactive	=	'';
				}
				
		?>
		
			<li class="<?php echo $classmenu.' '.$classactive; ?>" >
				<a href="<?php echo site_aurl($manageMenuParentidVal['m'].'/'.$manageMenuParentidVal['c'].'/'.$manageMenuParentidVal['a']);?>">
				<i class="icon icon-th-list"></i>
					<span><?php echo $manageMenuParentidVal['cname'];?></span>
					<?php
						if( isset($manageMenuChild[$manageMenuParentidVal['id']]) && 
							$manageMenuChild[$manageMenuParentidVal['id']] ){
							
							echo "<span class='label'>".count($manageMenuChild[$manageMenuParentidVal['id']])."</span>";
						}
					?>
				</a>
				
				<?php
					if( isset($manageMenuChild[$manageMenuParentidVal['id']]) && 
						$manageMenuChild[$manageMenuParentidVal['id']] ){
				?>
				<ul <?php if( $main_left_seg_m == $manageMenuParentidVal['m'] && $main_left_seg_c == $manageMenuParentidVal['c']){ ?> style='display:block;' <?php }?>>
				
				<?php
					foreach($manageMenuChild[$manageMenuParentidVal['id']] AS $manageMenuChildKey => 
							$manageMenuChildVal){
						
						if( $main_left_seg_a && $main_left_seg_a == $manageMenuChildVal['a'] && $main_left_seg_c == $manageMenuChildVal['c']){
							$childmenuclass	=	'active';
						}else{
							$childmenuclass	=	'';
						}
				?>
					<li class="<?php echo $childmenuclass;?>" >
						<a href="<?php echo site_aurl($manageMenuChildVal['m'].'/'.$manageMenuChildVal['c'].'/'.$manageMenuChildVal['a'])?>">
							<?php 
								echo $manageMenuChildVal['cname'];
							?>
						</a>
					</li>
				<?php
					}
				?>
				</ul>
				<?php
					}
				?>
			</li>
		
		<?php
				}
			}
		?>
	</ul>
</div>







