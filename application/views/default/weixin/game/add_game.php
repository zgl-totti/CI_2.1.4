<?php
header('Content-type:text/html;charset=utf-8');
?>
<div>
<form method="post" action="<?php site_url("weixin/game/add_game");?>" >
<table>
   <tr>
           <td>游戏名称</td>
           <td><input type="text" name="gamename" value="" /></td>
   </tr>
    <tr>
           <td>截止时间</td>
           <td>
                  <select name="end_time">
                     <option value="1" selected="selected">一天</option>
                     <option value="2">一周</option>
                     <option value="3">十五天</option>
                     <option value="4">一个月</option>
                     <option value="5">三个月</option>
                     <option value="6">半年</option>
                     <option value="7">一年</option>
                     <option value="8">三年</option>
                     <option value="0">永久</option>
                  </select>
           </td>
   </tr>
   
</table>
<input type="submit" name="submit" value="添加"/>
</form>
</div>