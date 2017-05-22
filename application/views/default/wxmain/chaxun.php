<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>搜索</title>
    <meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/global.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('statics/default/css/stylee.css'); ?>">
   <!--  <script language='JavaScript' src="/gyns/statics/default/js/jquery-3.0.0.min.js"></script> -->
    <!--自动加载cs-->

    <style type="text/css">
        .containerr{
            padding-left:0;
            padding-right:0;
        }
        body {
            background: #ebebeb;
            font-family: "微软雅黑";
        }

        #quanbufenlei {
            display: block;
        }

        #renqi {
            display: block;
        }

        #jiage {
            display: block;
        }

        .liebiao {
            float: left;
            width: 100%;
            margin:1px 0;
            padding:5px 2%;
            box-sizing: border-box;
            background: #ffffff;
            height:87px;
            overflow: hidden;
        }

        .store-main1 img {
            width: 100%;
        }

        .store-main1 h3 {
            padding: 10px 0px;
            font-size: 16px;
            margin-left: 20px;
            font-weight: 500;
        }

        .store-main1 ul li {
            margin: 2% 4%;
            text-align: left;
        }
        .store-main ul li {
            font-size: 16px;
            height: 30px;
            margin: 8px 0px;
            float: left;
            background: #ffffff;
            border-right: 1px solid #d5d4d4;
            line-height: 30px;
            /*margin-left: 10px;*/
            padding: 0px 30px;
        }

        .store-main1 img
        .store-main1 ul li p {
            font-size: 14px;
            color: #545454;
        }

        .store-main1 ul li span {
            color: #d22222;
            font-size: 14px;
        }

        .containerr {
            padding-left: 3%;
            padding-right: 3%;
        }

        /*.wash-header span{
            display: inline-block;
            width: 50px;
            height: 40px;
        }*/
        .wash-header img {
            width: 25px;
            margin-top: 0px;
            margin-right: 0px;
            float: left;
            padding-top: 10px;
        }

        .store-banner {
            height: 229px;
            overflow: hidden;
        }
        .store-main ul li a{
            height: 30px;
            width: 100%
            float: left;

        }
        .store-main ul li:nth-of-type(2){
            background: none;
        }

        .leader img{
            width:25%;
        }
        .liebiao{
            border-bottom:1px solid #eee;
            height:auto;
        }
        #loading{
            width: 100%;
            height: 40px;
            line-height:40px;
            text-align: center;
            font-size: 16px;
            color: #999;
            /*background: "http://aczm.medtu.com/statics/default/img/load.gif" no-repeat center center;*/
            background-size: 20px 20px;
            display: none;
        }

    </style>
    <!--<script>
        $(document).ready(function () {
            $("#n1").on("click", function () {
                $("#quanbufenlei").css("display", "block").siblings("#renqi,#jiage").css("display", "none");
                $("#n1").addClass("active").siblings().removeClass("active");
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#n2").on("click", function () {
                $("#renqi").css("display", "block").siblings("#quanbufenlei,#jiage").css("display", "none");
                $("#n2").addClass("active").siblings().removeClass("active");
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            $("#n3").on("click", function () {
                $("#jiage").css("display", "block").siblings("#quanbufenlei,#renqi").css("display", "none");
                $("#n3").addClass("active").siblings().removeClass("active");
            })
        })
    </script>
    -->
<!--自动加载js-->
    <script type="text/javascript">
        window.onload=function(){
            var oUl=document.getElementById('ul');
            var lod=document.getElementById('loading');
            var oList=document.getElementById('liebiao');
            var page=0;
            var timer=setInterval(function(){
                    oHeight=document.body.scrollHeight;

                    oTop=document.body.scrollTop;

                    oClh=document.documentElement.clientHeight;
                    oSum=oTop+oClh;
                    if (oSum>=oHeight) {
                        lod.style.display='block';
                        var t=setTimeout(function(){
                                page=page+1;
                                lod.style.display='none';
                                //alert(page);
                                /*for (var i = 0; i < 6; i++) {
                                    var oLi=document.createElement('li');
                                    oLi.innerHTML='哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈';
                                    oUl.appendChild(oLi);
                                    console.log(a);
                                }*/
                                var xhr=new XMLHttpRequest;
                                 xhr.open('post','<?php echo site_url('wxmain/jspage')?>',true);
                                 //post方式,数据放在send()里面作为参数传递
                                 xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
                                 xhr.send('page='+page+'&q='+'<?php echo $keywords?>');
                                 xhr.onreadystatechange=function(){
                                     if(xhr.readyState==4){
                                             if(xhr.status==200){
                                              //console.log(xhr.responseText);
                                                var json=JSON.parse(xhr.responseText);
                                                for(var i in json){
                                               	//console.log(json[i].name)
                                                
                                               
                                                var oLi=document.createElement('li');
                                                 if(json[i].newprice){
                                                       
                                                      oLi.innerHTML=' <li class="liebiao" ><a href="http://aczm.medtu.com/index.php/wxmain/xiangqingye/'+json[i].id+'"><div style="width: 30%;height: 87px;overflow: hidden;float: left;"><img src="http://aczm.medtu.com/'+json[i].thumb0+'" width="100%"/></div><p style="padding:5px 0;float: left;margin-left: 5%;width: 60%;font-size:16px;font-style: normal;color:#545454">'+json[i].name+'<span style="float: right">查看详情</span></p><span style="float: left;margin-left: 5%;width: 40%;color: #d22222">现价￥:'+json[i].newprice+'元</span><span style="float: left;margin-left: 5%;width: 65%;color:#999;font-size: 14px"><i>原价￥:'+json[i].oldprice+'元</s></span></a></li>'
                                                    }
                                                    else{
                                                       oLi.innerHTML=' <li class="liebiao" ><a href="http://aczm.medtu.com/index.php/wxmain/xiangqingye/'+json[i].id+'"><div style="width: 30%;height: 87px;overflow: hidden;float: left;"><img src="http://aczm.medtu.com/'+json[i].thumb0+'" width="100%"/></div><p style="padding:5px 0;float: left;margin-left: 5%;width: 60%;font-size:16px;font-style: normal;color:#545454">'+json[i].name+'<span style="float: right">查看详情</span></p><span style="float: left;margin-left: 5%;width: 65%;color: #d22222">******线下优惠******</span></a></li>'
                                                    }
                                                    oUl.appendChild(oLi);
                                                }
                                             	
                                             }else{
                                                 alert("err:"+xhr.status);
                                                }
                                     }
                                 }
                        },500)

                    }

                    
            },1000)

        }
    </script>

</head>
<body>
<div class="container">
    <div class="biaoti">
        <form class="form-inline" method='get' style="margin-bottom: 0;" action="<?php echo site_url('wxmain/chaxun'); ?>">

            <input class="suosuo" type="text" name="q" value="<?php echo $keywords; ?>" placeholder="商品名">
            <input class="tijiao" type="submit" name=""  value="" style="cursor: pointer;">
<!--            <input class="btn" type="submit" style='padding:4px 4px;border: none;font-size: 16px;background: none;color: #FFFFFF;'/>-->
        </form>

    </div>
  <p style="height: 50px;width: 100%;"></p>
    <div id="quanbufenlei">
        <ul id="ul">
        <?php
       if( isset($info) && $info ){
        foreach ($info as $v) {?>




                        <li class="liebiao" >
                        <a href="<?php echo site_url('wxmain/xiangqingye/' . $v['id']) ?>">
                            <div style="width: 30%;height: 87px;overflow: hidden;float: left;"><img src="<?php echo base_url() . $v['thumb0']; ?>" width="100%"/></div>
                            <p style="padding:5px 0;float: left;margin-left: 5%;width: 60%;font-size:16px;font-style: normal;color:#545454"><?php echo $v['name']; ?> <span style="float: right">查看详情</span></p>
                            <?php if($v['newprice']){?>
                            <span style="float: left;margin-left: 5%;width: 40%;color: #d22222">现价￥:<?php echo $v['newprice']; ?>元</span>
                            <span style="float: left;margin-left: 5%;width: 65%;color:#999;font-size: 14px"><i>原价￥:<s><?php echo $v['oldprice']; ?>元</s></span>
                        <?php }else{?>

                            <span style="float: left;margin-left: 5%;width: 65%;color: #d22222">******线下优惠******</span>


                        <?php }?>
                        </a>
                        </li>


<?php  }}else{?>

          <center style="width: 200px;line-height: 30px;color:grey;margin:100px auto">
        <img src="<?php echo base_url('statics/default/img/zhanwushoucang .png');?>" width="100px">
        <p>对不起，暂无此商品!</p></center>
     <?php  } ?>
        </ul>
<div id="loading">刷新中</div>

    </div>


</body>
</html>