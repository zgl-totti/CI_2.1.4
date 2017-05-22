<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户设置</title>
<link href="<?php echo base_url('statics/default/css/global.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('statics/default/css/mobile.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
<div class="main-box">
<div class="header">
  <div class="active_left"><img src="<?php echo base_url('statics/default/img/jiantou_2.png');?>" width="10" height="12"> <a href="<?php echo site_url('wxmain/index')?>">返回</a></div>
  <div class="active_mi">用户设置</div>
  <div class="active_right"><img src="<?php echo base_url('statics/default/img/search.png');?>" width="14" height="14"> </div>
</div>
<div class="focus-img"><img src="<?php echo base_url('statics/default/img/butai.png');?>" width="1080" height="405"></div>
<br>
<br>
<center>
<div class="shenqing">

<form action="<?php echo site_url('member/index')?>" method="post" name="manageuserform" id='manageuserform'>
  <div class="huiyuan"><span class="text">* </span>用户昵称：
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