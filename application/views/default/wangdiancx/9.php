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
	<div id="allmap"></div>
</body>
</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("allmap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(113.1919789001,34.7065460366), 15);  // 初始化地图,设置中心点坐标和地图级别
	
	map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
	map.setCurrentCity("郑州市");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放



	var new_point = new BMap.Point(113.001036,34.755406);
	var marker = new BMap.Marker(new_point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.panTo(new_point);

	


</script>
