<?php
header('Content-type:text/html;charset=utf-8');
echo '<h1>签到</h1>';
?>
<?php 
 if($update_time==0 ||  time()-$update_time>86400){
                   $update_time='签到';
            }else{ 
                   $update_time= '已签到';
            }?>
<div>您已连续签到<?php echo $continuous?>天</div>
<div>

<input type="button" id="signin" class='s' onclick="signin()" name="val" value="<?php echo $update_time;?>" <?php if($update_time=='已签到'){echo 'disabled="true"';}?>/>
</div>

<script  src=<?php echo base_url('statics/global/js/jquery-1.8.2.min.js'); ?>></script>
<script type="text/javascript" >

$("#signin").click(function(){
	var val=$("#signin").val();	
	$.post("<?php echo site_url("weixin/weixininfo/signin" );?>",{vals:val},function(r){alert(r);
       if(r==1){
        alert('签到成功');
           }else{
         alert('签到失败 ');
           }
		})
})


</script>