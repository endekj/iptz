<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>安装程序 - 信息探针</title>
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="/layui/css/layui.css"  media="all">
	<script src="/layui/layui.js" charset="utf-8"></script>
	<script>//引用layui选择框
	layui.use(['form', 'layedit', 'laydate'], function(){
	  var form = layui.form
	  ,layer = layui.layer
	  ,layedit = layui.layedit
	  ,laydate = layui.laydate;
	  });
	</script>
</head>
<body>

<?php
error_reporting(0);

include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/check_program.php");
check_authorization();
if (function_exists('check_authorization()')) {
exit();
 }

define('IN_CRONLITE', true);
?>

	<?php
	if(file_exists("./install.lock")==1){
		exit('<script>
		layui.use("layer", function(){
		  var layer = layui.layer;
		  
		 layer.open({
		  title: "提示"
		  ,content:"您已经安装过，如需重新安装请删除<font color=red>install.lock</font>文件后再安装"
			
				,yes: function(index, layero){
				window.location.href="/";
					layer.close(index);
					 }
				
				,cancel: function(index, layero){ 
				window.location.href="/";
					layer.close(index);
				}  
			
		});     
		 
		}); 						
		</script>');
	}
	?>
	<?php
	$do=$_GET['do'];
	?>
	<?php
	if($do==""){
	echo '
<fieldset class="layui-elem-field">
  <legend>版本说明</legend>
	<div class="layui-field-box">';
	
	$version_help=file_get_contents("help.txt");
	$version_help=explode("\n",$version_help);
	
	foreach($version_help as $version_help){
	echo $version_help."<br>";
	}
		
  echo'
  </div>
</fieldset>
	
	    <div class="layui-form-item">
	    <div class="layui-input-block">
			<a href="/index.php" class="layui-btn">取消安装</a>
	<a href="?do=2" class="layui-btn">下一步</a>
	    </div>
	  </div>
	';
	
}
?>
<?php
if($do=="2"){

echo '
	
<fieldset class="layui-elem-field">
  <legend>数据库信息</legend>
	<div class="layui-field-box">
		
	        <form class="layui-form" action="?do=3" method="POST">
						
	  <div class="layui-form-item">
	    <label class="layui-form-label">数据库地址</label>
	    <div class="layui-input-block">
	      <input name="db_host" class="layui-input" type="text" placeholder="请输入数据库地址" autocomplete="off" lay-verify="required" value="localhost">
	    </div>
	  </div>
	  
		  <div class="layui-form-item">
		  	<label class="layui-form-label">数据库端口</label>
		  	<div class="layui-input-block">
		  		<input name="db_port" class="layui-input" type="text" placeholder="请输入数据库端口" autocomplete="off" lay-verify="required" value="3306">
		  	</div>
		  </div>
		
 <div class="layui-form-item">
		  	<label class="layui-form-label">数据库账号</label>
		  	<div class="layui-input-block">
		  		<input name="db_user" class="layui-input" type="text" placeholder="请输入数据库账号" autocomplete="off" lay-verify="required">
		  	</div>
		  </div>
		
	<div class="layui-form-item">
				<label class="layui-form-label">数据库密码</label>
				<div class="layui-input-block">
					<input name="db_pwd" class="layui-input" type="text" placeholder="请输入数据库密码" autocomplete="off" lay-verify="required">
				</div>
			</div>
			
			<div class="layui-form-item">
						<label class="layui-form-label">数据库库名</label>
						<div class="layui-input-block">
							<input name="db_name" class="layui-input" type="text" placeholder="请输入数据库库名" autocomplete="off" lay-verify="required">
						</div>
					</div>
		
	    <div class="layui-form-item">
	    <div class="layui-input-block">
			<a href="?do=" class="layui-btn">上一步</a>
	      <button class="layui-btn" lay-filter="next" lay-submit="do">下一步</button>
	      <button class="layui-btn layui-btn-primary" type="reset">重置</button>
	    </div>
	  </div>
		
	</from>

  </div>
</fieldset>';
	}
	?>
<?php
if($do=="3"){
	$db_host=$_POST['db_host'];
	$db_port=$_POST['db_port'];
	$db_user=$_POST['db_user'];
	$db_pwd=$_POST['db_pwd'];
	$db_name=$_POST['db_name'];
	if($db_host=="" or $db_port=="" or $db_user=="" or $db_pwd=="" or $db_name==""){
		exit('
		<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"请确保数据库信息不为空"
			
				,yes: function(index, layero){
				window.location.href="?do=2";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="?do=2";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>
		');
	}	//为空
	else{
		
			echo'
<fieldset class="layui-elem-field">
  <legend>写入数据库</legend>
	<div class="layui-field-box">
			';
			/*数据库配置*/
			
			$config="<?php
	/*数据库配置*/
	\$dbconfig=array(
		'host' => '{$db_host}', //数据库服务器
		'port' => '{$db_port}', //数据库端口
		'user' => '{$db_user}', //数据库用户名
		'pwd' => '{$db_pwd}', //数据库密码
		'dbname' => '{$db_name}' //数据库名
		);
		?>";
	file_put_contents("../include/config.php",$config);
	include_once("../include/config.php");
	include_once("db.class.php");
	DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	if(DB::connect_errno()==2002){
		exit('
		<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"连接数据库失败，数据库地址填写错误"
			
				,yes: function(index, layero){
				window.location.href="?do=2";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="?do=2";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>
		');
	}
	if(DB::connect_errno()==1045){
		exit('
		<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"连接数据库失败，数据库用户名或密码填写错误"
			
				,yes: function(index, layero){
				window.location.href="?do=2";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="?do=2";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>
		');
	}
	if(DB::connect_errno()==1049){
		exit('
		<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"连接数据库失败，数据库名不存在"
			
				,yes: function(index, layero){
				window.location.href="?do=2";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="?do=2";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>
		');
	}
	$sql=file_get_contents("install.sql");
	$sql=explode(';</explode>',$sql);
	$cn = DB::connect($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
	if (!$cn) die('error:'.DB::connect_error());
	DB::query("set sql_mode = ''");
	DB::query("set names utf8");
	$t=0; $e=0; $error='';
	for($i=0;$i<count($sql);$i++) {
		if ($sql[$i]=='')continue;
		if(DB::query($sql[$i])) {
			++$t;
		} else {
			++$e;
			$error.=DB::error().'<br/>';
		}
	}
	if($e==0) {
	file_put_contents("install.lock",'lock');
	echo '安装成功<br/>SQL成功'.$t.'句/失败'.$e.'句<br>管理员账号:admin<br>管理员密码:123456<br><a href="../">网站首页</a>｜<a href="../admin/">后台管理</a>';
} else {
	echo '<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"安装失败'.'<br>'.'SQL成功'.$t.'句/失败'.$e.'句'.'"'.
				',yes: function(index, layero){
				window.location.href="?do=2";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="?do=2";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>';
}
	
		echo'
  </div>
</fieldset>';
	}//不为空
}//do判断
?>