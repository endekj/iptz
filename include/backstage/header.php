<?php
error_reporting(0);

include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/check_program.php");
check_authorization();
if (function_exists('check_authorization()')) {
exit();
 }

define('IN_CRONLITE', true);
include_once($_SERVER['DOCUMENT_ROOT']."/include/config.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/db.class.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/version_information.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/statistics_website.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/website_information.php");
session_start();
$admin_login=$_SESSION['admin_login'];
$admin_username=$_SESSION['admin_username'];
$admin_pwd=$_SESSION['admin_pwd'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>管理后台 - <?php echo website_title(); ?></title>
  <meta name="keywords" content="<?php echo website_keywords(); ?>">
  <meta name="description" content="<?php echo website_description(); ?>">
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
<?php check_install();?>
<!---导航栏部分--->
<ul class="layui-nav">
	<li class="layui-nav-item"><a href="/index.php">网站首页</a></li>
  <li class="layui-nav-item"><a href="/admin/index.php">管理中心</a></li>
  <li class="layui-nav-item"><a href="/admin/probe_manage.php">探针管理</a></li>
<li class="layui-nav-item"><a href="/admin/set_website.php">设置网站</a></li>
  <li class="layui-nav-item"><a href="?action=log_out">退出登录</a></li>
</ul>
 <script>
 layui.use('element', function(){
   var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
   
   //监听导航点击
   element.on('nav(demo)', function(elem){
     //console.log(elem)
     layer.msg(elem.text());
   });
 });
 </script>
<!---导航栏部分--->
<?php
$action=$_GET['action'];
if($action=="log_out"){
	session_destroy();
	echo'
	<script>
			layui.use("layer", function(){
				var layer = layui.layer;
				
			layer.open({
				title: "提示"
				,content:"退出成功"
				
					,yes: function(index, layero){
					window.location.href="/index.php";
						layer.close(index);
						}
					
					,cancel: function(index, layero){ 
					window.location.href="/index.php";
						layer.close(index);
					}  
				
			});     
			
			}); 						
			</script>';
}
?>