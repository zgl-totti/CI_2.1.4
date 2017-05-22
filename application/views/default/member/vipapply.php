<?php 
templates('global','header');
?>
<div class="main-box">

<div class="focus-img"><img src="<?php echo base_url('statics/default/img/butai.png');?>" width="1080" height="405"></div>
<br>
<br>
<center>
<div class="shenqing">

<form action="<?php echo site_url('member/updates')?>" method="post" name="manageuserform" id='manageuserform'>
  <div class="kalei"><span class="text">* </span> 卡 类 别 ： 
    <select class="kakuang" name="cardtype">
      <option value="1">白金卡</option>
      <option value="2">金卡</option>
      <option value="3">银卡</option>
      <option value="4">体验卡</option>
    </select>
  </div>
  <div class="kalei"><span class="text">* </span>卡 年 限 ： 
    <select name="cardlife" select class="kakuang">
      <option value="1">一年卡</option>
    </select>
  </div>
  <div class="huiyuan"><span class="text">* </span>会员卡号：
    <input type="text" class="kakuang" value="<?php echo $usernumber?>" name='usernumber' readonly>
  </div>
  <div class="huiyuan"> <span class="text">* </span>输入密码：
    <input  type="password" name="password" id="password" class="kakuang">
  </div>
  <div class="huiyuan"> <span class="text">* </span>确认密码：
    <input  type="password" name="pwdconfirm" id="pwdconfirm" class="kakuang">
  </div>
  <div class="huiyuan0">　
    <input name="dosubmit" type="submit" class="kakuang1" value="提　交" >
  </div>
  </form>
  </div>
</center>

<script src="<?php echo base_url('statics/admin/js/jquery.validate.js');?>"></script> 
<script src="<?php echo base_url('statics/global/js/jquery-1.8.2.min.js');?>" type="text/javascript"></script>
<script>
$(function(){
  
  $("#pwdconfirm").blur(function(){
    var password = $('#password').val();
    var pwdconfirm = $('#pwdconfirm').val();
    if(password != pwdconfirm){
      alert('密码不一致');
    }
    });
})
</script>
<?php 
templates('global','footer');
?>