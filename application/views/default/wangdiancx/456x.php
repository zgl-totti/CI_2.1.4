<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
	body, html,#allmap {width: 100%;height: 100%;overflow: hidden;margin:0;font-family:"微软雅黑";}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=G8KDQ6lOP54PpydUFYLCcdUsFY9oQyPZ"></script>

	
	<title>地图展示</title>
</head>
<body>
	<div><a href="http://map.baidu.com/">百度地图定位搜索</a></div>
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(113.1919789001,34.7065460366), 13);  // 初始化地图,设置中心点坐标和地图级别
	
	map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
	map.setCurrentCity("郑州市");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放


//1
	var new_point = new BMap.Point(112.9741259363,34.7539112112);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);


	var new_point = new BMap.Point(112.9741259363,34.7539112112);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);



	var new_point = new BMap.Point(112.9170346643,34.6612953984);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);


    var new_point = new BMap.Point(112.870893,34.685105);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(112.9887749239,34.74876709);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(112.870892,34.685964);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(112.997806,34.755363);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(112.997805,34.755362);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(112.9887749239,34.7487670939);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(113.001036,34.755406);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
//11
	var new_point = new BMap.Point(113.245183,34.731872);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(113.242935,34.753568);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(113.244451,34.736275);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(113.25639,34.757808);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	var new_point = new BMap.Point(113.204848,34.701345);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
//14

    var new_point = new BMap.Point(113.217581,34.694623);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	
	var new_point = new BMap.Point(113.173595,34.708475);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.1502,34.712777);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.175495,34.710671);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.106393,34.719335);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.106159,34.717688);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.130122,34.827961);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.026382,34.810847);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.996001,34.794085);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.058381,34.824805);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.959578,34.772435);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.953664,34.746627);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.961834,34.789876);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.924644,34.803252);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.880702,34.800488);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.827789,34.788579);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
//30//////////////////////////////////////////////////////////////////////////
	var new_point = new BMap.Point(112.990351,34.757712);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.003845,34.771783);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.986684,34.756007);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.987217,34.766609);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.982175,34.766594);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.99685,34.745218);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.005188,34.745834);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.004104,34.712224);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.006045,34.734614);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.004961,34.70994);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.968121,34.651331);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.968824,34.64978);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.952795,34.702465);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.987022,34.693963);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.970387,34.708697);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.878825,34.624542);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.911218,34.624943);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.068053,34.619537);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.032901,34.626161);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	
	var new_point = new BMap.Point(112.970387,34.708697);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);


	var new_point = new BMap.Point(112.907853,34.687997);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.112426,34.6045);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);                //52
	
	
	var new_point = new BMap.Point(112.870892,34.685964);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	
	var new_point = new BMap.Point(113.068587,34.795553);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.052073,34.782998);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.989843,34.755881);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.000129,34.745767);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(113.025583,34.754739);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.990053,34.745426);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.98332,34.759291);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.9975,34.76116);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.995277,34.765571);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);
	
	var new_point = new BMap.Point(112.978613,34.748429);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

</script>
