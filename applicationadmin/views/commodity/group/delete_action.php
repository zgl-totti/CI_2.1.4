<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
		<div id="content">
			
			
			<div class="container-fluid">
				<?php
					if( !$message ){
				?>
				<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-error">
							<button data-dismiss="alert" class="close">×</button>
							请确认您的操作！
						</div>
						<a href='<?php echo site_aurl("commodity/group")?>'>返回商品分类管理 </a>
					</div>
				</div>
				<?php
					}else{
				?>
				<div class="row-fluid">
					<div class="span12">
						<div class="alert alert-success">
							<button data-dismiss="alert" class="close">×</button>
							删除成功
						</div>
						<a href='<?php echo site_aurl("commodity/group/")?>'>返回商品分类管理 </a>
					</div>
				</div>
				
				<?php
					}
				?>
			</div>
			
		</div>
		
	

<?php $this->load->view('common/footer');?>