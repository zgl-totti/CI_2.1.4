<?php
require './php/top/TopClient.php';
require './php/top/request/OpenimUsersAddRequest.php';

$c = new TopClient;
$c->appkey = 'wx669eb16a613703ae';
$c->secretKey = 'f0d01a8b6b07420b95001a0f55acb27a';
$req = new OpenimUsersAddRequest;
$req->setUserinfos('{"userid": "test0","password": "123456", "nick": "书通", "mobile": "18958090000", "email": "hehe@taobao.com","icon_url": "http://xxx.com/xxx"}');
$resp = $c->execute($req);