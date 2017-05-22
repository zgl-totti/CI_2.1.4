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
					激活失败请先确定您是否开通会员卡！
				</div>
				<a href='<?php echo site_aurl("member/main");?>'>返回用户列表管理 </a>
			</div>
		</div>
		<?php

			}else{
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">×</button>
					激活成功
				</div>
				<a href='<?php echo site_aurl("member/main");?>'>返回用户列表管理 </a>
			</div>
		</div>
		
		<?php
			}
		?>
	</div>
	
</div>

<?php  $this->load->view('common/footer');die;?>
