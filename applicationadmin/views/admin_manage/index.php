<?php $this->load->view('common/header');?>

<?php $this->load->view('common/main_left_nav');?> 
<div id="content">
	<div id="content-header">
		<h1>个人信息</h1>
	</div>
	<div class="container-fluid">
		<?php
			if(isset($changepwdmessage) && $changepwdmessage){
		?>
		<div class="row-fluid">
			<div class="span12">
				<?php
					if( isset($changepwdstatus) && $changepwdstatus == 3){
				?>
			
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">×</button>
					<?php echo $changepwdmessage;?>
				</div>
				<?php
					}
					if( isset($changepwdstatus) && ($changepwdstatus == 1 ||  $changepwdstatus == 2)){
				?>
				
				<div class="alert alert-error">
					<button data-dismiss="alert" class="close">×</button>
					<?php echo $changepwdmessage;?>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<?php
			}
		?>
		
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title">
						<span class="icon">
							<i class="icon-align-justify"></i>									
						</span>
						<h5></h5>
					</div>
					
					<div class="widget-content nopadding myadminform form-horizontal">
					
							<div class="control-group">
								<label class="control-label">用户名</label>
								<div class="controls controlsinfo">
									<?php echo $username;?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">邮箱</label>
								<div class="controls controlsinfo">
									<?php echo $email;?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">真实姓名</label>
								<div class="controls controlsinfo">
									<?php 
										if($realname){
											echo $realname;
										}else{
											echo '-';
										}
									?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">最后登录IP</label>
								<div class="controls controlsinfo">
									<?php 
										if($lastloginip){
											echo $lastloginip;
										}else{
											echo '-';
										}
									?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">最后登录时间</label>
								<div class="controls controlsinfo">
									<?php 
										if($lastlogintime){
											echo date('Y-m-d H:i:s',$lastlogintime);
										}else{
											echo '-';
										}
									?>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label">用户组</label>
								<div class="controls controlsinfo">
									<?php 
										if( isset($roleInfo) && $roleInfo ){
											echo $roleInfo['rolename'];
										}else{
											echo '-';
										}
									?>
								</div>
							</div>
					</div>
				</div>
			</div>			
			
		</div>
	</div>
	
</div>
		

<?php $this->load->view('common/footer');?>
