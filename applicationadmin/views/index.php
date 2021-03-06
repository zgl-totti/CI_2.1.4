<?php $this->load->view('common/header');?>
 
<!-- 左侧菜单 -->
<?php $this->load->view('common/main_left_nav');?>
 
		<div id="content">
			<div id="content-header">
				<h1>后台首页</h1>
			</div>
			
			<!-- <div class="container-fluid">
				<div class="row-fluid" style="padding-top:25px;">
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/11.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('order/main/index');  ?>'><img src="<?php echo base_url('statics/admin/img/index/110.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><a href='<?php echo site_aurl('admin/main');  ?>'><img src="<?php echo base_url('statics/admin/img/index/5.png');  ?>" alt="" width='120'></a></div>
					<div><a href='<?php echo site_aurl('member/main/add');  ?>'><img src="<?php echo base_url('statics/admin/img/index/50.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/2.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/6.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/3.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/7.png');  ?>" alt="" width='100'></a></div>
					</div>
					<div class="span2" style="text-align:center;">
					<div><img src="<?php echo base_url('statics/admin/img/index/4.png');  ?>" alt="" width='120'></div>
					<div><a href='javascript:;'><img src="<?php echo base_url('statics/admin/img/index/8.png');  ?>" alt="" width='100'></a></div>
					</div>

				
			</div>	
		</div> -->
		<div class='row-fluid' style='padding-top:30px;'>
				<div class='span12'>
				<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('member/main/search');?>">
							<input id="appendedInputButtons" name='q' type="text" placeholder="姓名、手机号、会员卡号"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
						
					</div>
					<div class="input-append btn-group">
						<form class="form-inline" method='get' action="<?php echo site_url('member/main/search_group');?>">
							<input id="appendedInputButtons" name='key' type="text" placeholder="按组查询分类"/>
							<button class="btn" type="submit" style='padding:4px 12px;'>搜索</button>
						</form>
						
					</div>
					<div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('member/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="card_id !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>已开通</button>
						</form>
					</div>
					<div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('member/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="activation !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>已激活</button>
						</form>
					</div>
					<div class="input-append btn-group">
							<form class="form-inline" method='get' action="<?php echo site_url('member/main/submitsearch');?>">
							<input id="appendedInputButtons" name='q' type="hidden" value="phone !="/>
							<button class="btn" type="submit" style='padding:4px 12px;'>手机号</button>
						</form>
					</div>
					<div class="input-append btn-group">
							<input type="button" value="订单列表" name="button" class="btn" onclick="window.location.href='<?php echo site_url("order/main/index")?>'" />
					</div>
					<?php
						if( isset($info) && $info ){
					?>
				
					<div class="widget-box">
						<div class="widget-content nopadding">
							<form method="post" class="form-horizontal ui-formwizard" id="form-wizard" novalidate="novalidate" onsubmit="return CheckPost();" action="<?php echo site_url('member/main/deletes')?>" >
								<table class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width='20'>
												<input type="checkbox" name="title-checkbox" id="title-checkbox">
											</th>
											<th>会员卡号</th>
											<th>姓名</th>
											<th>手机</th>
											<th>车牌号</th>
											<th>开通会员卡</th>
											<th>激活</th>
											<th>管理操作</th>
										</tr>
									</thead>
									<tbody>
									<?php
										foreach($info AS $v){
									?>
										<tr>
											<td>
											<input type="checkbox" name="userid[]" value="<?php echo $v['userid']?>" class="ui-wizard-content checkboxids" /></td>
											
											<?php if($v['usernumber']){?>
											<td><?php echo $v['usernumber'];?></td>
											<?php }else{?>
											<td>无</td>
											<?php }?>
											<td><?php echo $v['nickname']?></td>
											<td><?php echo $v['phone'];?></td>
											<td><?php echo $v['plate'];?></td>
											<td>
												<?php if(!empty($v['card_id'])){ ?>
												<a href='<?php echo site_aurl('card/main/edit/'.$v['card_id']);?>'>[已开通]</a>
												<?php }else{ ?>
												<a href='<?php echo site_aurl('card/main/add/'.$v['userid']);?>'>[开通会员]</a>
												<?php } ?>
											</td>
											<td>
												<?php if(!empty($v['activation'])){ ?>
												[已激活]：<?php echo date('Y-m-d',$v['activation']);?>
												<?php }else{ ?>
												<a href='<?php echo site_aurl('card/main/activation/'.$v['userid']);?>'>[激活会员卡]</a>
												<?php } ?>
											</td>
											
											<td>
												<a href='<?php echo site_aurl('member/main/edit/'.$v['userid']);?>'>[修改]</a>
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
						当天暂无相关用户！
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
  
<?php $this->load->view('common/footer');?>
