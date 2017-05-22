<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>会员卡管理</h1>
			<?php $this->load->view('card/top_nav');?> 
		</div>
		<div class="container-fluid">
			
			
			<div class='row-fluid'>
				
			
				<div class='span12'>
				
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
						<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('card/main/deletes')?>" >
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width='20'>
											<input type="checkbox" name="title-checkbox" id="title-checkbox">
										</th>
										<th>卡号</th>
										<th>会员卡类别</th>
										<th>会员卡期限</th>
										<th>会员卡号办理时间</th>
										<th>管理操作</th>
									</tr>
								</thead>
								<tbody>
								<?php
									foreach($info AS $v){
								?>
									<tr>
										<td style="text-align:center">
											<input type="checkbox" name="id[]" value="<?php echo $v['id']?>" class="ui-wizard-content checkboxids" />
										</td>
										<td style="text-align:center"><?php echo $v['usernumber'];?></td>
										<td style="text-align:center"><?php echo $v['cardtype'];?></td>
										<td style="text-align:center"><?php echo $v['cardlife'];?></td>
										<td style="text-align:center"><?php echo date('Y-m-d',$v['apply_time']);?></td>
										<td style="text-align:center">
											<a href='<?php echo site_aurl('card/main/edit/'.$v['id']);?>'>[修改]</a>
										</td>
									</tr>
								<?php
									}
								?>
								</tbody>
							</table>
							<div class="form-actions">
									<input type="submit" value="删除" name="submit" class="btn" />
								</div>
							</form>
						</div>
					</div>
					<?php
						}else{
					?>
					<div class="alert alert-error">
						<button data-dismiss="alert" class="close">×</button>
						暂无相关项目信息！
					</div>
					
					<?php 
						}
					
						if(isset($pages) && $pages ) {
					?>
					<div class='pagination'>
						<?php echo $pages;?>
					</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
	
	

<script>
$(function(){
	$('.status').click(function(){
		var id		=	$(this).attr('ref');
		var types	=	$(this).attr('data');
		
		types	=	types ? types : 0;
		
		if(!id){
			return false;
		}
		
		var obj	=	$(this);
		
		$.ajax({
			type	: "GET",
			url		: "<?php echo site_url('card/main/recommend');?>"+'/'+id+'/'+types,
			data	: "",
			success	: function(msg){
				if( msg == 1 ){
					if( types == 1){
						$(obj).html('推荐');
						$(obj).attr('data','0');
					}else{
						$(obj).html('已推荐');
						$(obj).attr('data','1');
					}
					
				}else{
					$(obj).html('推荐');
					$(obj).attr('data','0');
				}
			}
		});
	})
	
})
</script>	
	
<?php $this->load->view('common/footer');?>
