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
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/statistics_website.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/website_information.php");

statistics_website_visit_add();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo website_title(); ?> - <?php echo website_subtitle(); ?></title>
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
<body background="<?php echo website_background_img(); ?>">
<?php check_install();?>
<audio autoplay="" loop=""><source src="<?php echo website_background_music(); ?>"></audio>
<!---导航栏部分--->
<ul class="layui-nav">
  <li class="layui-nav-item"><a href="/index.php">探针添加</a></li>
  <li class="layui-nav-item"><a href="/probe_query.php">探针查询</a></li>
	<li class="layui-nav-item"><a href="/use_help.php">使用帮助</a></li>
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