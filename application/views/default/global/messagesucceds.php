<?php 
templates('global','header');
?>
<style>
   body{background:#ffffff;}
    .contant {width:100%;text-align: center;line-height: 50px;font-size: 16px;}
   .contant .imgg-box{width:25%;margin:0 auto;margin-top: 160px;}
   .contant p span{color:#2ab9c9;}
</style>
<body>
<div class="contant">
  <div class="imgg-box"><img src="<?php echo base_url('statics/default/img/img/suced.jpg');?>" alt=""></div>
  <p>如果您的页面没有自动跳转，请<a href="<?php echo site_url("wxmain/lordsearch")?>"><span>点击这里</span></a></p>
</div>


</body>
<?php 
templates('global','footer');
?>