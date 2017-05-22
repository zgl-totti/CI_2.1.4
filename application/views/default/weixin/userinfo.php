<?php 
$tempci	=	& get_instance(); 
templates('weixin','header');
?>

<section class="main">
	
	<?php
		if(isset($userinfo) && $userinfo ){
	?>
	<div class="doctor-baseinfo">
    	<img src="<?php echo $userinfo['headimgurl'];?>" alt="<?php echo $userinfo['headimgurl'];?>" />
      	<h2><?php echo $userinfo['nickname'];?></h2>
		<p>&nbsp;</p>
		
	</div><!--doctor-baseinfo end-->
	<div class="doctor-others">
		<p class="normal"><span>性<em>&nbsp;&nbsp;</em>别：</span><?php if($userinfo['sex'] == 1){ echo '男';}elseif($userinfo['sex'] == 2){ echo '女';}else{ echo '未知';}?></p>
        <p class="normal"><span>国<em>&nbsp;&nbsp;</em>家：</span><?php echo $userinfo['country'];?></p>
        <p class="normal"><span>省<em>&nbsp;&nbsp;</em>份：</span><?php echo $userinfo['province'];?></p>
		<p class="normal"><span>城<em>&nbsp;&nbsp;</em>市：</span><?php echo $userinfo['city'];?></p>
		<p class="normal"><span>积<em>&nbsp;&nbsp;</em>分：</span><span id='integral'><?php echo $userinfo['integral'];?></span></p>      
		
    </div><!--doctor-others end-->
	
	<div class="confirmbox">
		<p class="btn">
			<a href="javascript:;" onclick="signin()" class="btn-blue" id='signin'>
				<?php if($userinfo['issign']){echo '已签到';}else{echo "签到";}?>
			</a>
		</p>
	</div>
	
	
    <?php
		}else{
	?>
	<h2>获取失败！</h2>
	<?php
		}
	?>
	
	
</section>


<div class="after-nav"></div>

<script>
	function signin(){
		$.ajax({
			type: "POST",
			url	: "/index.php/weixin/wechat/signin",
			dataType : 'json',
			success: function(msg){
				if(msg.status == 1){
					$('#signin').html('已签到');
				}else{
					$('#signin').html('签到失败');
				}
			}
		});
	}
</script>

</body>
</html>
