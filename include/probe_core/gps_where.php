<?php
error_reporting(0);

if($_POST['s']=="true"){
	echo'<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<script type="text/javascript">
			var ip_id ='.$_POST['ip_id'].';
			var xmlhttp = new XMLHttpRequest;
			if(navigator.geolocation){
	        //判断是否有这个对象
	            navigator.geolocation.getCurrentPosition(function(pos){
	            	var lon = pos.coords.longitude;
	            	var lat = pos.coords.latitude;
	                xmlhttp.open("POST",window.location.protocol+"//"+window.location.hostname+"/include/probe_core/gps_where.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("s=false&ip_id="+ip_id+"&lon="+lon+"&lat="+lat);
	            })
	        }
			else{	
			xmlhttp.open("POST",window.location.protocol+"//"+window.location.hostname+"/include/probe_core/gps_where.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("s=false&ip_id="+ip_id+"&lon=获取失败&lat=获取失败");
			}
		</script>
</body>
</html>';
}
else{
	define('IN_CRONLITE', true);
	include_once("../config.php");
	include_once("../db.class.php");
	$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	
	
	$ip_id=$_POST['ip_id'];
	$lon=$_POST['lon'];
	$lat=$_POST['lat'];
	$gps_lonlat="经度:".$lon."/维度:".$lat;
	
	$json2 = file_get_contents("http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=".$lat.",".$lon."&output=json&pois=1&ak=dzb4HRothBrzG3HlIgtoNFyNFxPQM9cV");
	$json2=str_replace("renderReverse&&renderReverse(","",$json2);
	$json2=str_replace(")","",$json2);
	$info2 = json_decode($json2,true);
	if($info2['status'] == '0')
	{
	$gps_location = $info2["result"]["formatted_address"];//获取经纬网
	}
	else
	{
	$gps_location = '获取失败';
	}
	
	$DB->query("update `list_ip` set `gps_lonlat` ='{$gps_lonlat}' , `gps_location` ='{$gps_location}'
	where `id`='{$ip_id}'");
}
?>