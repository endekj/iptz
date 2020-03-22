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
				window.location.href="/admin/login.php";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="/admin/login.php";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>');
}
?>
<?php
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='title' limit 1");
$website_title=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='subtitle' limit 1");
$website_subtitle=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='keywords' limit 1");
$website_keywords=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='description' limit 1");
$website_description=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='code_bottom' limit 1");
$website_code_bottom=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='code_probe_add_top' limit 1");
$website_code_probe_add_top=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='code_probe_query_top' limit 1");
$website_code_probe_query_top=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='background_img' limit 1");
$website_background_img=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='background_music' limit 1");
$website_background_music=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='smtp_server' limit 1");
$website_smtp_server=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='smtp_server_port' limit 1");
$website_smtp_server_port=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='smtp_user' limit 1");
$website_smtp_user=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='smtp_user_mail' limit 1");
$website_smtp_user_mail=$row['option_value'];
$row=$DB->get_row("SELECT * FROM config_website WHERE option_name='smtp_user_password' limit 1");
$website_smtp_user_password=$row['option_value'];

$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='api_function' limit 1");
$api_function=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_website_visit_function' limit 1");
$statistics_website_visit_function=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_probe_add_function' limit 1");
$statistics_probe_add_function=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_probe_query_function' limit 1");
$statistics_probe_query_function=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_use_api_function' limit 1");
$statistics_use_api_function=$row['option_value'];
$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_email_notification_function' limit 1");
$statistics_email_notification_function=$row['option_value'];
if($api_function!="0"){
	$api_function="checked=\"\"";
}
else{
	$api_function="";
}
if($statistics_website_visit_function!="0"){
	$statistics_website_visit_function="checked=\"\"";
}
else{
	$statistics_website_visit_function="";
}
if($statistics_probe_add_function!="0"){
	$statistics_probe_add_function="checked=\"\"";
}
else{
	$statistics_probe_add_function="";
}
if($statistics_probe_query_function!="0"){
	$statistics_probe_query_function="checked=\"\"";
}
else{
	$statistics_probe_query_function="";
}
if($statistics_use_api_function!="0"){
	$statistics_use_api_function="checked=\"\"";
}
else{
	$statistics_use_api_function="";
}
if($statistics_email_notification_function!="0"){
	$statistics_email_notification_function="checked=\"\"";
}
else{
	$statistics_email_notification_function="";
}
?>
<fieldset class="layui-elem-field">
  <legend>设置网站</legend>
	<div class="layui-field-box">

<form class="layui-form layui-form-pane" action="?action=set_website" method="POST">
				<br>
					<div class="layui-form-item">
					<label class="layui-form-label">网站标题</label>
					<div class="layui-input-block">
						<input lay-verify="required" name="website_title" class="layui-input" type="text" placeholder="请输入网站标题" autocomplete="off" value="<?php echo $website_title; ?>">
					</div>
					</div>
							
			<div class="layui-form-item">
			<label class="layui-form-label">网站副标题</label>
			<div class="layui-input-block">
				<input lay-verify="required" name="website_subtitle" class="layui-input" type="text" placeholder="请输入网站副标题" autocomplete="off" value="<?php echo $website_subtitle; ?>">
			</div>
			</div>
			
				<div class="layui-form-item">
				<label class="layui-form-label">网站关键词</label>
				<div class="layui-input-block">
					<input name="website_keywords" class="layui-input" type="text" placeholder="请输入网站关键词" autocomplete="off" lay-verify="required" value="<?php echo $website_keywords; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站描述</label>
				<div class="layui-input-block">
				<input name="website_description" class="layui-input" type="text" placeholder="请输入网站描述" autocomplete="off" lay-verify="required" value="<?php echo $website_description; ?>">
				</div>
				</div>

							<div class="layui-form-item layui-form-text">
			  <label class="layui-form-label">网站底部代码</label>
			  <div class="layui-input-block">
			    <textarea class="layui-textarea" placeholder="请输入网站底部代码" name="website_code_bottom"><?php echo $website_code_bottom; ?></textarea>
			  </div>
			</div>	
			
			<div class="layui-form-item layui-form-text">
			  <label class="layui-form-label">网站探针添加顶部代码</label>
			  <div class="layui-input-block">
			    <textarea class="layui-textarea" placeholder="请输入网站探针添加顶部代码" name="website_code_probe_add_top"><?php echo $website_code_probe_add_top; ?></textarea>
			  </div>
			</div>	
			
			<div class="layui-form-item layui-form-text">
			  <label class="layui-form-label">网站探针查询顶部代码</label>
			  <div class="layui-input-block">
			    <textarea class="layui-textarea" placeholder="请输入网站探针查询顶部代码" name="website_code_probe_query_top"><?php echo $website_code_probe_query_top; ?></textarea>
			  </div>
			</div>	
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站背景图片</label>
				<div class="layui-input-block">
				<input name="website_background_img" class="layui-input" type="text" placeholder="请输入网站背景图片" autocomplete="off" lay-verify="required" value="<?php echo $website_background_img; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站背景音乐</label>
				<div class="layui-input-block">
				<input name="website_background_music" class="layui-input" type="text" placeholder="请输入网站背景音乐" autocomplete="off" lay-verify="required" value="<?php echo $website_background_music; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站发信服务器地址</label>
				<div class="layui-input-block">
				<input name="website_smtp_server" class="layui-input" type="text" placeholder="请输入网站网站发信服务器地址" autocomplete="off" lay-verify="required" value="<?php echo $website_smtp_server; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站发信服务器端口</label>
				<div class="layui-input-block">
				<input name="website_smtp_server_port" class="layui-input" type="text" placeholder="请输入网站发信服务器端口" autocomplete="off" lay-verify="required" value="<?php echo $website_smtp_server_port; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站发信服务器用户账号</label>
				<div class="layui-input-block">
				<input name="website_smtp_user" class="layui-input" type="text" placeholder="请输入网站发信服务器用户账号" autocomplete="off" lay-verify="required" value="<?php echo $website_smtp_user; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站发信服务器用户邮箱</label>
				<div class="layui-input-block">
				<input name="website_smtp_user_mail" class="layui-input" type="text" placeholder="请输入网站发信服务器用户邮箱" autocomplete="off" lay-verify="required" value="<?php echo $website_smtp_user_mail; ?>">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">网站发信服务器用户密码</label>
				<div class="layui-input-block">
				<input name="website_smtp_user_password" class="layui-input" type="text" placeholder="请输入网站发信服务器用户密码" autocomplete="off" lay-verify="required" value="<?php echo $website_smtp_user_password; ?>">
				</div>
				</div>			
				
					  <div class="layui-form-item">
						  
    <label class="layui-form-label">功能</label>
	
    <div class="layui-input-block">
	  <input name="api_function" title="API" type="checkbox" <?php echo $api_function;?>>
	
	  <input name="statistics_website_visit_function" title="网站访问统计" type="checkbox" <?php echo $statistics_website_visit_function;?>>
	
	  <input name="statistics_probe_add_function" title="探针添加统计" type="checkbox" <?php echo $statistics_probe_add_function;?>>
	
	  <input name="statistics_probe_query_function" title="探针查询统计" type="checkbox" <?php echo $statistics_probe_query_function;?>>
	
	  <input name="statistics_use_api_function" title="API使用统计" type="checkbox" <?php echo $statistics_use_api_function;?>>
	  
	  <input name="statistics_email_notification_function" title="邮件通知统计" type="checkbox" <?php echo $statistics_email_notification_function;?>>
	
  </div>
  <br>
				
				
			<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-filter="next" lay-submit="set_website">修改</button>
				<button class="layui-btn layui-btn-primary" type="reset">重置</button>
			</div>
			</div>
		
		</from>
		
		 </div>
		</fieldset>
<?php
$action=$_GET['action'];
if($action=="set_website" and $admin_login=="true"){
$website_title=$_POST['website_title'];
$website_subtitle=$_POST['website_subtitle'];
$website_keywords=$_POST['website_keywords'];
$website_description=$_POST['website_description'];
$website_code_bottom=$_POST['website_code_bottom'];
$website_code_probe_add_top=$_POST['website_code_probe_add_top'];
$website_code_probe_query_top=$_POST['website_code_probe_query_top'];
$website_background_img=$_POST['website_background_img'];
$website_background_music=$_POST['website_background_music'];
$website_smtp_server=$_POST['website_smtp_server'];
$website_smtp_server_port=$_POST['website_smtp_server_port'];
$website_smtp_user=$_POST['website_smtp_user'];
$website_smtp_user_mail=$_POST['website_smtp_user_mail'];
$website_smtp_user_password=$_POST['website_smtp_user_password'];
$api_function=$_POST['api_function'];
$statistics_website_visit_function=$_POST['statistics_website_visit_function'];
$statistics_probe_add_function=$_POST['statistics_probe_add_function'];
$statistics_probe_query_function=$_POST['statistics_probe_query_function'];
$statistics_use_api_function=$_POST['statistics_use_api_function'];
$statistics_email_notification_function=$_POST['statistics_email_notification_function'];
if($api_function=="on"){
	$api_function="1";
}
else{
	$api_function="0";
}
if($statistics_website_visit_function=="on"){
	$statistics_website_visit_function="1";
}
else{
	$statistics_website_visit_function="0";
}
if($statistics_probe_add_function=="on"){
	$statistics_probe_add_function="1";
}
else{
	$statistics_probe_add_function="0";
}
if($statistics_probe_query_function=="on"){
	$statistics_probe_query_function="1";
}
else{
	$statistics_probe_query_function="0";
}
if($statistics_use_api_function=="on"){
	$statistics_use_api_function="1";
}
else{
	$statistics_use_api_function="0";
}
if($statistics_email_notification_function=="on"){
	$statistics_email_notification_function="1";
}
else{
	$statistics_email_notification_function="0";
}
$DB->query("update `config_website` set `option_value` ='{$website_title}' where `option_name`='title'");
$DB->query("update `config_website` set `option_value` ='{$website_subtitle}' where `option_name`='subtitle'");
$DB->query("update `config_website` set `option_value` ='{$website_keywords}' where `option_name`='keywords'");
$DB->query("update `config_website` set `option_value` ='{$website_description}' where `option_name`='description'");
$DB->query("update `config_website` set `option_value` ='{$website_code_bottom}' where `option_name`='code_bottom'");
$DB->query("update `list_function` set `option_value` ='{$website_code_probe_add_top}' where `option_name`='code_probe_add_top'");
$DB->query("update `list_function` set `option_value` ='{$website_code_probe_query_top}' where `option_name`='code_probe_query_top'");
$DB->query("update `config_website` set `option_value` ='{$website_background_img}' where `option_name`='background_img'");
$DB->query("update `config_website` set `option_value` ='{$website_background_music}' where `option_name`='background_music'");
$DB->query("update `config_website` set `option_value` ='{$website_smtp_server}' where `option_name`='smtp_server'");
$DB->query("update `config_website` set `option_value` ='{$website_smtp_server_port}' where `option_name`='smtp_server_port'");
$DB->query("update `config_website` set `option_value` ='{$website_smtp_user}' where `option_name`='smtp_user'");
$DB->query("update `config_website` set `option_value` ='{$website_smtp_user_mail}' where `option_name`='smtp_user_mail'");
$DB->query("update `config_website` set `option_value` ='{$website_smtp_user_password}' where `option_name`='smtp_user_password'");

$DB->query("update `list_function` set `option_value` ='{$api_function_function}' where `option_name`='api_function_function'");
$DB->query("update `list_function` set `option_value` ='{$statistics_website_visit_function}' where `option_name`='statistics_website_visit_function'");
$DB->query("update `list_function` set `option_value` ='{$statistics_probe_add_function}' where `option_name`='statistics_probe_add_function'");
$DB->query("update `list_function` set `option_value` ='{$statistics_probe_query_function}' where `option_name`='statistics_probe_query_function'");
$DB->query("update `list_function` set `option_value` ='{$statistics_use_api_function}' where `option_name`='statistics_use_api_function'");
$DB->query("update `list_function` set `option_value` ='{$statistics_email_notification_function}' where `option_name`='statistics_email_notification_function'");
echo'
<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"修改成功"
			
				,yes: function(index, layero){
				window.location.href="/admin/set_website.php";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="/admin/set_website.php";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>
';
	
	
}
?>
<?php include_once("../include/backstage/footer.php"); ?>