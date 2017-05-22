<?php
header('Content-type:text/html;charset=utf-8');?>
欢迎来到<span style="font-size:18px; color:#d0e;" ><?php echo $info['gamename'];?></span>
<div>
<?php foreach ($info['prize']['info']  as  $v) :?>
       <?php echo $v['name'];?>
<?php endforeach;?>
</div>
