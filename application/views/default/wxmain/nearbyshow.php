

<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0 , maximum-scale=1.0, user-scalable=0" name="viewport">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="<?php echo base_url('statics/default/css/global.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('statics/default/css/mobile.css'); ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('statics/default/js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('statics/default/js/MobileSlide.js'); ?>"></script>
<style type="text/css">
    .liebiao {
        float: left;
        width: 100%;
        margin: 2% 4%;
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
   }
</style>

<title><?php echo $ay[0]['shopsname']?></title>
<body style="background: #e5e5e5;">


<?php  //echo '<pre>'; print_r( strip_tags(htmlspecialchars_decode($ay[0]['content']))) ;die;
foreach ($ay as $v) {
    ?>
    <div class="main-box">

    </div>


    <div class="store-banner">

        <img src="<?php echo base_url() . $v['thumb']; ?>" width="100%"/>
    </div>


    <div class="store-main">
        <ul>
              <li style="font-size: 14px;margin-left: 10px" onclick="window.location.href='tel:<?php echo  $v['phone']; ?>'">
                  <a href="tel:<?php echo $v['phone'];?>"><?php echo  $v['phone']; ?>

                  </a>
              </li>
             <li id="shoucang"  style="font-size: 14px;">


                <a style="font-size: 14px" class="leader" href="javascript:;">

                    <input class="leaderend" type="hidden" value="<?php echo $v['id']; ?>"/>
                    <span id="cbtn">
                        <?php  if($status){ ?>
                            取消　<img id="img1" alt="11" src="<?php echo   base_url('statics/global/img/2.png') ?>"/>
                          <?php }else{ ?>
                            收藏　<img alt="22" id="img2"   src="<?php  echo  base_url('statics/global/img/1.png') ?>"/>
                        <?php } ?>
                    </span>
                </a>




            </li>
        </ul>

    </div>

    <div class="store-main1" style="height: 40px;padding: 0;line-height: 40px;font-size: 14px;padding-left: 10px;">

        地址：
        <span><?php echo $v['shopaddress']; ?></span>


    </div>


<?php } ?>

<div      style="width: 100%;box-sizing: border-box;padding-left: 3%;padding-right:3%;background: #ffffff;margin-bottom: 10px;padding-top:10px;padding-bottom:10px;font-size: 14px;">
介绍：
<!--<span style="width:100%;font-size:14px;"><?php /*echo  strip_tags(htmlspecialchars_decode($ay[0]['content'])) ; */?></span>-->
<span     style="width:100%;font-size:14px;"><?php echo  htmlspecialchars_decode($ay[0]['content']) ; ?></span>
</div>




<div class="store-main1">
    <h3>店面商品</h3>


    <?php foreach ($dpsp as $v) { ?>
        <div class="containerr">
            <ul>

                <a href="<?php echo site_url('wxmain/xiangqingye/' . $v['id']) ?>">
                    <li class="liebiao" >
                        <div style="width: 30%;height: 87px;overflow: hidden;float: left;"><img src="<?php echo base_url() . $v['thumb0']; ?>" width="100%"/></div>
                        <p style="padding:5px 0;float: left;margin-left: 5%;width: 60%;font-size:16px;font-style: normal;#545454"><?php echo $v['name']; ?> <span style="float: right">查看详情</span></p>
                        <?php if($v['newprice']){?>
                        <span style="float: left;margin-left: 5%;width: 40%">现价￥:<?php echo $v['newprice']; ?>元</span>
                      <span style="float: left;margin-left: 5%;width: 65%;color:#999;font-size: 14px"><i>原价￥:<s><?php echo $v['oldprice']; ?>元</s></span></li>
<?php }else{?>

     <span style="float: left;margin-left: 5%;width: 65%">******线下优惠******</span>


<?php }?>
                    </li>
                </a>
            </ul>

        </div>
    <?php } ?>




    <!-- 弹窗代码 -->
    <div id="mask"></div>
    <div id="img">    <!-- 弹出框信息 -->
        <img src="<?php echo base_url('statics/default/img/img/paymoney.jpg'); ?>" alt="" style="width:100%">
        <button id="paymoney" name="paymoney">立即支付</button>
    </div>
    </div>
<!-- <div style="height: 50px;width: 100%;float: left;"></div> -->
<!-- <div class="foot_nav" style="width:100%;height:50px;position:fixed;background:#eee;bottom:0;left:0;border-top:1px solid #dddddd;font-size:14px;color:#545454">
    <ul>
        <li style="width:25%;float:left;margin-left: 0;margin-right:0;margin-top:0;text-align:center;height:50px;background:url('<?php echo base_url() ?>statics/default/img/商圈首页.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('nearby/index') ?>" style="margin-top:30px;display:inline-block;">商圈</a></li>
        <li style="width:25%;float:left;margin-left: 0;margin-right:0;margin-top:0;text-align:center;height:50px;background:url('<?php echo base_url() ?>statics/default/img/矢量智能对象.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('cart/show') ?>" style="margin-top:30px;display:inline-block;">购物车</a></li>
        <li style="width:25%;float:left;margin-left: 0;margin-right:0;margin-top:0;text-align:center;height:50px;background:url('<?php echo base_url() ?>statics/default/img/分类-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('nearby/dingdans') ?>" style="margin-top:30px;display:inline-block;">订单</a></li>

        <li style="width:25%;float:left;margin-left: 0;margin-right:0;margin-top:0;text-align:center;height:50px;background:url('<?php echo base_url() ?>statics/default/img/我-1.png') no-repeat center 5px;background-size:20px;"><a href="<?php echo site_url('wxmain/gerenxiangqing') ?>" style="margin-top:30px;display:inline-block;">我的</a></li>

    </ul>
</div> -->
    <!-- 弹窗代码 -->
    <script type="text/javascript">


        //alert(111)
        $('.leader').click(function () {
            //var url='';
            var input = $(this).find('input.leaderend').val();

            //var uid=$('input[name="uid"]').val(); //获取被选中Radio的Value值


            $.ajax({
                type: "POST",
                url: "<?=site_url('nearby/collect');?>",
                dataType: 'json',
                data: {id: input},
                success: function (data) {
                    //alert(data)
                    if (data.status == 1) {
                        //alert(data.msg)
                        //location.reload(true);
                      // $('#cbtn').text('取消收藏');
                       $('#cbtn').html('取消　<img src="<?php  echo  base_url('statics/global/img/2.png') ?>">');
                       // $("#img1").attr('src',"<?php  echo  base_url('statics/global/img/1.png') ?>");
                    }

                    if (data.status == -1) {
                        alert(data.msg)
                        //$('#'+input).text('推荐');
                        //$('#message_modify').html(data.msg); }
                    }


                    if (data.status == -2) {
                        //alert(data.msg)
                        //$('#'+input).text('推荐');
                        $('#cbtn').html('收藏　<img src="<?php  echo  base_url('statics/global/img/1.png') ?>">');
                       // $("#img2").attr('src',"<?php  echo  base_url('statics/global/img/2.png') ?>");
                    }
                }
            });
        });

    </script>


</body>

<?php
templates('global', 'footer');
?>
