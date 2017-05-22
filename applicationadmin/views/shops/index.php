<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
	<div id="content">
		<div id="content-header">
			<h1>店面管理</h1>
			<?php $this->load->view('shops/top_nav');?> 
		</div>
		<div class="container-fluid">
			
			
			<div class='row-fluid'>
				
			
				<div class='span12'>
					<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('member/main/search');?>">
							<input id="appendedInputButtons" name='q' type="text" placeholder="用户名、手机号、邮箱、微信名"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
						
					</div>
					<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('member/main/search_group');?>">
							<input id="appendedInputButtons" name='key' type="text" placeholder="按组查询分类"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
						
					</div>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
						<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('shops/main/deletes')?>" >
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th width='20'>
											<input type="checkbox" name="title-checkbox" id="title-checkbox">
										</th>
										<th>店面名称</th>
										<th>店面规模</th>
										<th>职员人数</th>
										<th>坐标</th>
										<th>首页展示</th>
										<th>添加时间</th>
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
										<td style="text-align:center"><?php echo $v['shopsname'];?></td>
										<td style="text-align:center"><?php echo $v['shopsize'];?></td>
										<td style="text-align:center"><?php echo $v['officeworker'];?></td>
										<td style="text-align:center"><?php echo $v['coordinate'];?></td>
										<td style="text-align:center">

											<a    class="leader"  href="javascript:;"><input class="leaderend" type="hidden" value="<?php echo $v['id'] ;?>"/><span id="<?php echo $v['id'] ;?>"   ><?php echo $v['isshow']==1?'取消':'展示';?></span></a>









										</td>
										<td style="text-align:center"><?php echo date('Y-m-d',$v['addtime']);?></td>
										
										<td style="text-align:center">
											<a href='<?php echo site_aurl('shops/main/edit/'.$v['id']);?>'>[修改]</a>
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
	//推荐动作
	$('.leader').click(function(){
		//var url='';
		var input = $(this).find('input.leaderend').val();

		//var uid=$('input[name="uid"]').val(); //获取被选中Radio的Value值
//alert(input)

		$.ajax({
			type: "POST",
			url: "<?php echo site_url('shops/main/setshow') ?>",
			dataType:'json',
			data: {  id:input},
			success: function(data){
				//alert(data)
				if(data.status==1){
					//alert(data.msg)
					//location.reload(true);
					$('#'+input).text('取消');
				}

				if(data.status==-1){
					//alert(data.msg)
					$('#'+input).text('展示');
					//$('#message_modify').html(data.msg); }
				}
			}
		});
	});




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
			url		: "<?php echo site_url('shops/main/recommend');?>"+'/'+id+'/'+types,
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
