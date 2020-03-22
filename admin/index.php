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
<div class="layui-tab">
	
  <ul class="layui-tab-title">
    <li class="layui-this">数据中心</li>
    <li>修改账户</li>
  </ul>
  
  <div class="layui-tab-content">
 

	  <!---用户中心--->	
    <div class="layui-tab-item layui-show">
	<div style="padding: 10px; background-color: #F2F2F2;">
	
	<div class="layui-row layui-col-space15">
	
	<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">探针数量</div>
	    <div class="layui-card-body">
	      <?php echo statistics_probe_number(); ?>
	    </div>
	  </div>
	</div>
	
	<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">IP数量</div>
	    <div class="layui-card-body">
	      <?php echo statistics_ip_number(); ?>
	    </div>
	  </div>
	</div>
	
		<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">网站访问次数</div>
	    <div class="layui-card-body">
	      <?php echo statistics_website_visit_number(); ?>
	    </div>
	  </div>
	</div>
	
		<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">探针添加次数</div>
	    <div class="layui-card-body">
	      <?php echo statistics_probe_add_number(); ?>
	    </div>
	  </div>
	</div>
	
		<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">探针查询次数</div>
	    <div class="layui-card-body">
	      <?php echo statistics_probe_query_number(); ?>
	    </div>
	  </div>
	</div>
	
		<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">API使用次数</div>
	    <div class="layui-card-body">
	      <?php echo statistics_use_api_number(); ?>
	    </div>
	  </div>
	</div>
	
			<div class="layui-col-md3">
	  <div class="layui-card">
	    <div class="layui-card-header">邮件通知次数</div>
	    <div class="layui-card-body">
	      <?php echo statistics_email_notification_number(); ?>
	    </div>
	  </div>
	</div>
	  </div>
	</div>
	
	 </div>
	 
	 </div>
	
    </div>
	<!---用户中心--->	
		
    <div class="layui-tab-item">
		
		<form class="layui-form" action="?action=modify_account" method="POST">
				<!---
					<div class="layui-form-item">
					<label class="layui-form-label">原始账号</label>
					<div class="layui-input-block">
						<input lay-verify="required" name="original_username" class="layui-input" type="text" placeholder="请输入原始用户名" value="<?php echo $admin_username;?>"  autocomplete="off" disabled="">
					</div>
					</div>--->
							
			<div class="layui-form-item">
			<label class="layui-form-label">原始密码</label>
			<div class="layui-input-block">
				<input lay-verify="required" name="original_password" class="layui-input" type="password" placeholder="请输入原始密码" autocomplete="off">
			</div>
			</div>
			
				<div class="layui-form-item">
				<label class="layui-form-label">新密码</label>
				<div class="layui-input-block">
					<input name="new_password" class="layui-input" type="password" placeholder="请输入新密码" autocomplete="off" lay-verify="required">
				</div>
				</div>
				
				<div class="layui-form-item">
				<label class="layui-form-label">确认新密码</label>
				<div class="layui-input-block">
				<input name="new_password_confirm" class="layui-input" type="password" placeholder="请输入确认新密码" autocomplete="off" lay-verify="required">
				</div>
				</div>
				
			<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-filter="next" lay-submit="modify_account">修改</button>
				<button class="layui-btn layui-btn-primary" type="reset">重置</button>
			</div>
			</div>
		
		</from>
		<?php
		$action=$_GET['action'];
		if($action=="modify_account"){
			$original_username=$admin_username;
			$original_password=$_POST['original_password'];
			$new_password=$_POST['new_password'];
			$new_password_confirm=$_POST['new_password_confirm'];
			if($original_username=="" or $original_password=="" or $new_password=="" or $new_password_confirm==""){
			}
			else{
			if($new_password!=$new_password_confirm){
				echo'
				<script>
						layui.use("layer", function(){
							var layer = layui.layer;
							
						layer.open({
							title: "提示"
							,content:"二次输入新密码不一样"
							
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
			else{
				$row=$DB->get_row("select*from list_admin where username='".$original_username."' limit 1");
				$original_password_s=$row['password'];
				if($original_password!=$original_password_s  or $original_password_s==""){
				echo'
				<script>
						layui.use("layer", function(){
						var layer = layui.layer;
						
						layer.open({
						title: "提示"
						,content:"原始密码错误"
							
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
				else{
				$DB->query("update `list_admin` set `password` ='{$new_password}' where `username`='{$original_username}'");
					echo'
					<script>
							layui.use("layer", function(){
							var layer = layui.layer;
							
							layer.open({
							title: "提示"
							,content:"修改成功"
								
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
			
			}	
		}
		?>
	</div><!---管理账户--->
	
  </div>
  
</div>
<?php include_once("../include/backstage/footer.php"); ?>