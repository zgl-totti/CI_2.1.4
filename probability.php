<?php
//header("Content-type: text/html; charset=utf-8");
$prize_arr = array(
    '0' => array('id'=>1,'prize'=>'1','v'=>1),
    '1' => array('id'=>2,'prize'=>'2','v'=>5),
    '2' => array('id'=>3,'prize'=>'3','v'=>10),
    '3' => array('id'=>4,'prize'=>'4','v'=>34),
    '4' => array('id'=>5,'prize'=>'0','v'=>50),
);

$actor = 100;

foreach ($prize_arr as $v) {
    $arr[$v['id']] = $v['v'];
}
foreach ($arr as &$v) {
    $v = $v*$actor;
}
asort($arr);
$sum = array_sum($arr);   //总概率

$rand = mt_rand(1,$sum);

$result = '';    //中奖产品id

foreach ($arr as $k => $x)
{
    if($rand <= $x)
    {
        $result = $k;
        break;
    }
    else
    {
        $rand -= $x;
    }
}
$res['yes'] = $prize_arr[$result-1]['prize']; //中奖项
//print_r($res);
?>