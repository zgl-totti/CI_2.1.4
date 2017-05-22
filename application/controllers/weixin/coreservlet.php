<?php 
$access_token = "5ic8RoqZd7IBUtE0aGXUhcdKBnrwlO1iqtvyJJUgIcDcopJIH7x90QH4yiK_z08fqp4WOD7kfKPDtET29BRYNZO-sSIITaxIj4u72LYAYcFH6t1fiSVzjUuqYWOtHiw0LGDorxx5Qj6SN0Z7GtYGTA";

$openid="o7Lp5t6n59DeX3U0C7Kric9qEx-Q";
$url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
$output = https_request($url);
var_dump($output);