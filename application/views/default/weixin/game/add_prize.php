<?php
header('Content-type:text/html;charset=utf-8');
?>
<div>
<?php if($info){?>
<form method="post" action="<?php site_url("weixin/game/add_game");?>" >
<table>
   <tr>
           <td>游戏名称</td>
           <td>           
               <select name="gid">
                      <?php foreach($info as $v):?>
                      <option value="<?php echo $v['id']?>"><?php echo $v['gamename']?></option>
                      <?php endforeach;?>
               </select>
           </td>
   </tr>
   <tr>
         <td> 奖品名称</td>
         <td><input type="text" name="name"/></td>
   </tr>
   <tr>
         <td> 奖品价值</td>
         <td><input type="text" name="price"/></td>
   </tr>
   <tr>
         <td> 奖品数量</td>
         <td><input type="text" name="num"/></td>
   </tr>
</table>
<input type="submit" name="submit" value="添加"/>
</form>
<?php }?>
</div>