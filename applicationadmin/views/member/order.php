<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">

	<div class="container-fluid">
		<?php

			if( $message == 0 ){	
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-error">
					<button data-dismiss="alert" class="close">×</button>
					请确认您的操作！
				</div>
				<a href='<?php echo site_aurl("member/main");?>'>返回用户列表管理 </a>
			</div>
		</div>
		<?php

			}elseif ($message == 1){
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">×</button>
					生成成功
				</div>
				<a href='<?php echo site_aurl("member/main");?>'>返回用户列表管理 </a>
			</div>
		</div>
		
		<?php
			}elseif ($message == 2) {
		?>
		<div class="row-fluid">
			<div class="span12">
				<div class="alert alert-error">
					<button data-dismiss="alert" class="close">×</button>
					请先激活会员卡再生成订单！
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
