<?php 
include_once("../include/backstage/header.php"); 
?>
<fieldset class="layui-elem-field">
  <legend>登录账户</legend>
	<div class="layui-field-box">
		
	        <form class="layui-form layui-form-pane" action="?action=login" method="POST">
						
	  <div class="layui-form-item">
	    <label class="layui-form-label">账号</label>
	    <div class="layui-input-block">
	      <input lay-verify="required" name="login_username" class="layui-input" type="text" placeholder="请输入账号" autocomplete="off">
	    </div>
	  </div>
	  
		  <div class="layui-form-item">
		  	<label class="layui-form-label">密码</label>
		  	<div class="layui-input-block">
		  		<input name="login_password" class="layui-input" type="password" placeholder="请输入密码" autocomplete="off" lay-verify="required">
		  	</div>
		  </div>
	
		
	    <div class="layui-form-item">
	    <div class="layui-input-block">
	      <button class="layui-btn" lay-filter="next" lay-submit="login">登录</button>
	      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
	    </div>
	  </div>

		
	</from>
	
  </div>
</fieldset>
		
<?php
$action=$_GET['action'];
if($action=="login"){
	
$login_username=$_POST['login_username'];
$login_password=$_POST['login_password'];
if($login_username=="" or $login_password==""){
}
else{
$row=$DB->get_row("select*from list_admin where username='".$login_username."' limit 1");
$login_password_s=$row['password'];
if($login_password!=$login_password_s  or $login_password_s==""){
$_SESSION['admin_login']="false";
echo'
<script>
		layui.use("layer", function(){
		  var layer = layui.layer;
		  
		 layer.open({
		  title: "提示"
		  ,content:"账号或密码错误"
			
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
		</script>';
}
else{
	$_SESSION['admin_login']="true";
	$_SESSION['admin_username']=$login_username;
	$_SESSION['admin_password']=$login_password;
	echo'
	<script>
			layui.use("layer", function(){
			  var layer = layui.layer;
			  
			 layer.open({
			  title: "提示"
			  ,content:"登录成功"
				
					,yes: function(index, layero){
					window.location.href="/admin/index.php";
						layer.close(index);
						 }
					
					,cancel: function(index, layero){ 
					window.location.href="/admin/index.php";
						layer.close(index);
					}  
				
			});     
			 
			}); 						
			</script>';
}
	
	
}

}//判断类型
?>
<?php include_once("../include/backstage/footer.php"); ?>