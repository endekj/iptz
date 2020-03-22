<?php
include_once($_SERVER['DOCUMENT_ROOT']."/include/smtp.class.php");

function send_mail($email,$email_msg){
	global $DB;
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
	
	$smtp = new Smtp($website_smtp_server,$website_smtp_server_port,true,$website_smtp_user,$website_smtp_user_password);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    $smtp->debug = false;//是否显示发送的调试信息
    $state = $smtp->sendmail($email, $website_smtp_user_mail,'信息探针邮件通知', $email_msg, "HTML");
}
?>