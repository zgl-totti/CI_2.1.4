<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <title>商品兑换</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script>
        !(function (doc, win) {
            var docEle = doc.documentElement,
                evt = "onorientationchange" in window ? "orientationchange" : "resize",
                fn = function () {
                    var width = docEle.clientWidth;
                    width && (docEle.style.fontSize = 100 * (width / 640) + "px");
                };

            win.addEventListener(evt, fn, false);
            doc.addEventListener("DOMContentLoaded", fn, false);

        }(document, window));
    </script>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "微软雅黑";
            background: #f5f4f9;
            margin: 0;
            padding: 0;
            color: #545454;
            font-size: 0.21rem;
        }

        .containerr {
            width: 100%;
            padding-left: 0.56rem;
            padding-right: 0.56rem;
            box-sizing: border-box;
        }

        .duihuan_box {
            margin-top: 0.18rem;
            padding-top: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            height: 1.69rem;
            background: #FFFFFF;
            float: left;
        }

        .containerr input[type="text"] {
            width: 3.9rem;
            height: 0.73rem;
            float: left;
            border: 1px solid #9a9a9a;
            border-radius: 0.06rem;
            font-size: 0.31rem;
            color: #545454;
            outline: none;
        }

        .button {
            width: 1.20rem;
            height: 0.75rem;
            border: 1px solid #9a9a9a;
            float: left;
            border-radius: 0.06rem;
            margin-left: 0.12rem;
            background: #d22222;
            font-size: 0.31rem;
            color: #FFFFFF;
        }

        .title1 {
            width: 100%;
            float: left;
            height: 0.62rem;
            line-height: 0.62rem;
            font-size: 0.24rem;
            box-sizing: border-box;
            padding-left: 0.41rem;
            background: url(<?php echo base_url('statics/images/anjie-banner.jpg')?>) no-repeat left center;
            background-size: 0.26rem 0.26rem;

        }

        .beijing {
            width: 100%;
            float: left;
            background: #FFFFFF;
        }

        .beijing .liebiao {
            height: 1.69rem;
            border-bottom: 1px solid #e8e8e8;
            float: left;
            width: 100%;
            list-style: none;
            box-sizing: border-box;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
        }

        .beijing .liebiao a {
            display: block;
            color: #545454;
            text-decoration: none;
            float: left;
        }

        .beijing .liebiao .title {
            font-size: 0.25rem;
            float: left;
            width: 3.97rem;
            color: #999999;
            margin-left: 0.1rem;
        }

        .beijing .liebiao .imgBox {
            width: 1.2rem;
            height: 1.2rem;
            float: left;
        }

        .beijing .liebiao .duihuan {
            width: 3.97rem;
            font-size: 0.2rem;
            margin-left: 0.1rem;
            float: left;
            color: #545454;
            line-height: 0.5rem;
        }

        .cgbz {
            width: 3.97rem;
            font-size: 0.2rem;
            margin-left: 0.1rem;
            float: left;
            height: 0.2rem;
            /*margin-top: 0.1rem;*/

        }

        .cgbz .chenggong {
            float: left;
            width: 0.9rem;
            color: #52d137;
        }

        .cgbz .shijian {
            float: left;
            width: 3.1rem;
            /*margin-left: 0.05rem;*/
            color: #6d6d6d;
        }

        .cgbz .shijian span {
            float: right;
        }
    </style>
    <!--<script type="text/javascript" src="<?php /*echo base_url('statics/')*/ ?>/js/jquery.js"></script>-->
</head>
<body>
<div class="duihuan_box">
    <div class="containerr">
        <form>
            <input type="hidden" name="shop_id" value="<?=$shop_id;?>" />
            <input type="text" name="num" id="num" value="" placeholder="请输入兑换码"/>
            <input type="submit" class="button" onclick="set()" value="兑换"/>
        </form>

    </div>
</div>
<div class="containerr">
    <div class="title1">
        未兑换的订单
    </div>
</div>
<section>


    <ul class="beijing">
        <?php


        foreach ($exchange['info'] as $v) {
            ?>
            <li class="liebiao">
                <a href="#" class="containerr">
                    <div class="imgBox">
                        <img src="<?php echo base_url(trim($v['thumb'])) ?>" width="100%"/>
                    </div>
                    <p class="title"><?php echo $v['gname'] ?></p>



                 <input type="hidden" value="<?php echo $v['cdkey'] ?>"/>




                    <div class="cgbz">
                        <div class="chenggong">    <?php echo $v['status_user'] == 0 ? '未兑换' : '' ?></div>
                        <div class="shijian">交易时间：<span><?php echo date('Y-m-d H:i:s', $v['update_time']) ?></span></div>
                    </div>
                </a>
            </li>
        <?php } ?>
    </ul>


</section>

</body>
<script>


</script>
</html>
