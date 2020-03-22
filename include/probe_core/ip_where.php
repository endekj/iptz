<?php
$json1 = file_get_contents("http://api.map.baidu.com/location/ip?ip=$ip&ak=dzb4HRothBrzG3HlIgtoNFyNFxPQM9cV&coor=bd09ll");
$info1 = json_decode($json1,true);
if($info1['status'] == '0')
{
$ip_lonlat = '经度:'.$info1['content']['point']['x'].'/纬度:'.$info1['content']['point']['y'];//获取经纬网
}
else
{
$ip_lonlat = '获取失败';
}

$json2 = file_get_contents("http://api.map.baidu.com/geocoder/v2/?callback=renderReverse&location=".$info1['content']['point']['y'].",".$info1['content']['point']['x']."&output=json&pois=1&ak=dzb4HRothBrzG3HlIgtoNFyNFxPQM9cV");
$json2=str_replace("renderReverse&&renderReverse(","",$json2);
$json2=str_replace(")","",$json2);
$info2 = json_decode($json2,true);
if($info2['status'] == '0')
{
$ip_location = $info2["result"]["formatted_address"];//获取经纬网
}
else
{
$ip_location = '获取失败';
}
?>
