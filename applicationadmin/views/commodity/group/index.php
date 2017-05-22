<?php $this->load->view('common/header');?>


<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>商品类型管理</h1>
		<?php $this->load->view('commodity/group/menu_top_nav');?> 
	</div>
	<div class='clearfix'></div>
	
	<div class="container-fluid">
		
		<div class='row-fluid'>
			<div class='span12'>
			
				<?php
					if( isset($categorys) && $categorys ){
				?>
			
				<div class="widget-box">
					<div class="widget-content nopadding">
						<form class="form-horizontal" method="post" action="<?php echo site_aurl('commodity/group/listorder');?>" name="sitemodelfomr" id="sitemodelfomr" novalidate="novalidate" >
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width='80'>排序</th>
										<th>ID</th>
										<th>商品类型名称</th>
										<th>管理</th>
									</tr>
								</thead>
								<tbody>
								<?php
									echo $categorys;
								?>
								</tbody>
							</table>
							<div class="form-actions">
								<input type="submit" value="排序" name="submit" class="btn btn-primary" />
							</div>
						</form>
					</div>
				</div>
				<?php
					}else{
				?>
				<div class="alert alert-error">
					<button data-dismiss="alert" class="close">×</button>
					暂无相关菜单信息！
				</div>
				
				<?php 
					}
				?>
			</div>
		
		</div>
		
	</div>
</div>


<?php $this->load->view('common/footer');?>
