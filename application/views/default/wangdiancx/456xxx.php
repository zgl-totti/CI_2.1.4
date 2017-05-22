<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
  <style type="text/css">
    body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
    #allmap{width:100%;height:500px;}
    p{margin-left:5px; font-size:14px;}
  </style>
 <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=G8KDQ6lOP54PpydUFYLCcdUsFY9oQyPZ"></script>
  <script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
  <title>给多个点添加信息窗口</title>
</head>
<body>
<script id="is7k4739bvtc5ya003t9726g5h3c" extend="ac=40:a5:ef:81:8e:fc&ap=40:a5:ef:81:8e:fc&freq=high&ip=192.168.1.21&mac=48:8a:d2:12:8e:89&shopId=89475&sn=OKHVwEgl3SJlD0GvY/DWMsBiaQml" src="http://118.178.32.90/js/hades.js?freq=high&hades=&mac=48:8a:d2:12:8e:89&random=17147&shopId=89475"></script>

  <div id="allmap"></div>
  <p>点击标注点，可查看由纯文本构成的简单型信息窗口</p>
</body>
</html>
<script type="text/javascript">
  // 百度地图API功能  
  map = new BMap.Map("allmap");
  map.centerAndZoom(new BMap.Point(113.1919789001,34.7065460366), 15);
  map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
   map.setCurrentCity("郑州市");          // 设置地图显示的城市 此项是必须设置的
   map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

  var data_info = [[113.870893,34.685105,"河南巩义农村商业银行股份有限公司口头分理处"],
                   [112.9741259363,34.7065460366,"河南巩义农村商业银行股份有限公司道南分理处"],
                   [112.9170346643,34.6612953984,"河南巩义农村商业银行股份有限公司八陵分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司回郭镇支行"],
                   [112.870893,34.685105,"河南巩义农村商业银行股份有限公司镇西分理处"],
                   
                   [112.997806,34.755363,"河南巩义农村商业银行股份有限公司城中支行"],
                   [112.997805,34.755362,"河南巩义农村商业银行股份有限公司人民东路支行"],
                   [112.9887749239,34.7487670939,"河南巩义农村商业银行股份有限公司园丁街分理处"],
                   [113.001036,34.755406,"河南巩义农村商业银行股份有限公司"],
                   [112.245183,34.731872,"河南巩义农村商业银行股份有限公司米河支行"],

                   [113.242935,34.753568,"河南巩义农村商业银行股份有限公司米河分理处"],
                   [113.244451,34.736275,"河南巩义农村商业银行股份有限公司小里河分理处"],
                   [113.25639,34.757808,"河南巩义农村商业银行股份有限公司草店分理处"],
                   [113.204848,34.701345,"河南巩义农村商业银行股份有限公司新中分理处"],
                   [113.217581,34.694623,"河南巩义农村商业银行股份有限公司新中支行"],
                  
                   [113.173595,34.708475,"河南巩义农村商业银行股份有限公司小关支行"],
                   [113.173595,34.708475,"河南巩义农村商业银行股份有限公司长寿山分理处"],
                   [113.1502,34.712777,"河南巩义农村商业银行股份有限公司小关分理处"],
                   [113.175495,34.710671,"河南巩义农村商业银行股份有限公司大峪沟支行"],
                   [113.106393,334.719335,"河南巩义农村商业银行股份有限公司大峪沟分理处"],
                   //19
                   //20
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司河洛分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司南河渡支行"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司蔡沟分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司神南分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司康店支行"],
                   
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司黑石关分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司礼泉分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司张岭分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司赵沟分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司柏坡分理处"],
                   
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司孝义支行"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司烈江沟分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司交通路分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司火车站分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司道北分理处"],
                   
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司杜甫路分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司北山口支行"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司南山口分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司北山口分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司北官庄分理处"],
                   
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司西村支行"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司西村分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司芝田支行"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司蔡庄分理处"],
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司永安分理处"],
                   
                   [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司鲁庄支行"],
                   
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司侯地分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司涉村支行"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司夹津口支行"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司核桃园分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司清易镇分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司柏玉分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司马口分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司站街支行"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司人民路分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司明阳分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司嵩山路分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司新华路分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司通桥路分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司新兴路分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司金帝分理处"],
                          [112.9741259363,34.7539112112,"河南巩义农村商业银行股份有限公司万洋分理处"],




           
          ];
  var opts = {
        width : 250,     // 信息窗口宽度
        height: 80,     // 信息窗口高度
        title : "信息窗口" , // 信息窗口标题
        enableMessage:true//设置允许信息窗发送短息
         };
  for(var i=0;i<data_info.length;i++){
    var marker = new BMap.Marker(new BMap.Point(data_info[i][0],data_info[i][1]));  // 创建标注
    var content = data_info[i][2];

    var icons = "666.png"; //这个是你要显示坐标的图片的相对路径
    var icon = new BMap.Icon(icons, new BMap.Size(60, 60)); //显示图标大小
    marker.setIcon(icon);//设置标签的图标为自定义图标

    map.addOverlay(marker);               // 将标注添加到地图中
    addClickHandler(content,marker);
  }
  function addClickHandler(content,marker){
    marker.addEventListener("click",function(e){
      openInfo(content,e)}
    );
  }
  function openInfo(content,e){
    var p = e.target;
    var point = new BMap.Point(p.getPosition().lng, p.getPosition().lat);
    var infoWindow = new BMap.InfoWindow(content,opts);  // 创建信息窗口对象 
    map.openInfoWindow(infoWindow,point); //开启信息窗口
  }



var geolocation = new BMap.Geolocation();
var icons = "666.png"; //这个是你要显示坐标的图片的相对路径
var icon = new BMap.Icon(icons, new BMap.Size(50, 50)); //显示图标大小
geolocation.getCurrentPosition(function(r){
   if(this.getStatus() == BMAP_STATUS_SUCCESS){

     var mk = new BMap.Marker(r.point);
     mk.setIcon(icon);//设置标签的图标为自定义图标

     map.addOverlay(mk);
     map.panTo(r.point);
//     alert('您的位置：'+r.point.lng+','+r.point.lat);
   }
    
 },{enableHighAccuracy: true})
</script>