<?php
 define('TOKEN','aczmwxtoken');
class Main extends CI_Controller{
   public function index(){
      $this->valid();
   }

   public function valid(){
      $echoStr = isset($_GET["echostr"]) ? $_GET["echostr"] : '';
      //valid signature , option
      if($echoStr){
         echo $echoStr;
         exit;
      }
   }

   private function checkSignature(){
      $signature = isset($_GET["signature"]) ? $_GET["signature"] : '';
      $timestamp = isset($_GET["timestamp"]) ? $_GET["timestamp"] : '';
      $nonce = isset($_GET["nonce"]) ? $_GET["nonce"] : '';
      $token = TOKEN;
      $tmpArr = array($token, $timestamp, $nonce);
      sort($tmpArr);
      $tmpStr = implode( $tmpArr );
      $tmpStr = sha1( $tmpStr );
      if( $tmpStr == $signature ){
         return true;
      }else{
         return false;
      }
   }
}