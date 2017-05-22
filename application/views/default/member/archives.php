<?php 
templates('global','header');
?>
<div class="main-box" id='archives' >

<div class="focus-img"><img src="<?php echo base_url('statics/default/img/butai.png');?>" width="1080" height="405"></div>
<center>
<form action="<?php echo site_url('member/archives')?>" method="post" name="manageuserform" id='manageuserform'>
 <div class="shenqing">
 <input type='hidden' name='userid' id='userid' value='<?php echo $member["userid"]?>' />
  <div class="huiyuan"> 　　<span class="text">* </span>姓名：
    <input type="text" class="kakuang" id="nickname" name="nickname" value='<?php echo $member["nickname"];?>'/>
  </div>
  <div class="huiyuan"> 　　<span class="text">* </span>性别：
    <label class="radio inline">
      <input type="radio" name="sex" value="1" <?php if($member['sex'] && $member['sex'] == 1){echo 'checked';}?>/>男
    </label>
    <label class="radio inline">
      <input type="radio" name="sex" value="2" <?php if($member['sex'] && $member['sex'] == 2){echo 'checked';}?>/>女
    </label>
  </div>
  <div class="huiyuan"> 　　<span class="text3">* </span>籍贯：
    <input type="text" class="kakuang" id="origin" name="origin" value='<?php echo $member["origin"];?>'/>
  </div>
  <div class="huiyuan"> 　　<span class="text3">* </span>微信：
    <input type="text" class="kakuang" id="wechat" name="wechat" value='<?php echo $member["wechat"];?>'/>
  </div>
   <div class="huiyuan"> 　　<span class="text3">* </span>Q Q：
    <input type="text" class="kakuang" id="qq" name="qq" value='<?php echo $member["qq"];?>'/>
  </div>
   <div class="huiyuan"> 　　<span class="text3">* </span>邮箱：
    <input type="text" class="kakuang" id="email" name="email" value='<?php echo $member["email"];?>'/>
  </div>
   <div class="huiyuan"> <span class="text">* </span>出生年月：
    <input type="text" class="kakuang" id="birthday" name="birthday" value='<?php echo $member["birthday"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>家庭住址：
    <input type="text" class="kakuang" id="address" name="address" value='<?php echo $member["address"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>工作单位：
    <input type="text" class="kakuang" id="work" name="work" value='<?php echo $member["work"];?>'/>
  </div>
  <div class="huiyuan"> 　　<span class="text3">* </span>职务：
    <input type="text" class="kakuang" id="post" name="post" value='<?php echo $member["post"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>婚姻状况：
    <input type="text" class="kakuang" id="marital" name="marital" value='<?php echo $member["marital"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>兴趣爱好：
    <input type="text" class="kakuang" id="hobby" name="hobby" value='<?php echo $member["hobby"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text">* </span>身份证号：
    <input type="text" class="kakuang" id="number" name="number" value='<?php echo $member["number"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text">* </span>联系电话：
    <input type="text" class="kakuang" id="telephone" name="telephone" value='<?php echo $member["telephone"];?>'/>
  </div>
  <div class="huiyuan"> 　　<span class="text">* </span>手机：
    <input type="text" class="kakuang" id="phone" name="phone" value='<?php echo $member["phone"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text">* </span>驾驶证号：
    <input type="text" class="kakuang" id="license" name="license" value='<?php echo $member["license"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>准驾车型：
    <input type="text" class="kakuang" id="type" name="type" value='<?php echo $member["type"];?>'/>
  </div>
  <div class="huiyuan"> <span class="text3">* </span>年审日期：
    <input type="text" class="kakuang" id="limited" name="limited" value='<?php echo $member["limited"];?>'/>
  </div>
    <div class="huiyuan"> <span class="text3">* </span>换证日期：
    <input type="text" class="kakuang" id="renewal" name="renewal" value='<?php echo $member["renewal"];?>'/>
  </div>
  <div class="huiyuan0">　
    <input name="dosubmit" type="submit" class="kakuang1" value="提　交" >
  </div>
  </div>
  </form>
</center>
<?php 
templates('global','footer');
?>