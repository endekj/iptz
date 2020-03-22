<?php
function statistics_website_visit_add(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_website_visit_function' limit 1");
	$statistics_website_visit_function=$row['option_value'];
	if($statistics_website_visit_function!="0"){
		$row=$DB->get_row("SELECT * FROM list_statistics WHERE type='statistics_website_visit_number' limit 1");
		$statistics_website_visit_number=$row['number']+1;
		
		$DB->query("update `list_statistics` set `number` ='".$statistics_website_visit_number."' where `type`='statistics_website_visit_number'");
	}
}

function statistics_probe_add_add(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_probe_add_function' limit 1");
	$statistics_probe_add_function=$row['option_value'];
	if($statistics_probe_add_function!="0"){
		$row=$DB->get_row("SELECT * FROM list_statistics WHERE type='statistics_probe_add_number' limit 1");
		$statistics_probe_add_number=$row['number']+1;
		
		$DB->query("update `list_statistics` set `number` ='".$statistics_probe_add_number."' where `type`='statistics_probe_add_number'");
	}
}

function statistics_probe_query_add(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_probe_query_function' limit 1");
	$statistics_probe_query_function=$row['option_value'];
	if($statistics_probe_query_function!="0"){
		$row=$DB->get_row("SELECT * FROM list_statistics WHERE type='statistics_probe_query_number' limit 1");
		$statistics_probe_query_number=$row['number']+1;
		
		$DB->query("update `list_statistics` set `number` ='".$statistics_probe_query_number."' where `type`='statistics_probe_query_number'");
	}
}

function statistics_use_api_add(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_use_api_function' limit 1");
	$statistics_use_api_function=$row['option_value'];
	if($statistics_use_api_function!="0"){
		$row=$DB->get_row("SELECT * FROM list_statistics WHERE type='statistics_use_api_number' limit 1");
		$statistics_use_api_number=$row['number']+1;
		
		$DB->query("update `list_statistics` set `number` ='".$statistics_use_api_number."' where `type`='statistics_use_api_number'");
	}
}

function statistics_email_notification_add(){
	global $DB;
	$row=$DB->get_row("SELECT * FROM list_function WHERE option_name='statistics_email_notification_function' limit 1");
	$statistics_email_notification_function=$row['option_value'];
	if($statistics_email_notification_function!="0"){
		$row=$DB->get_row("SELECT * FROM list_statistics WHERE type='statistics_email_notification_number' limit 1");
		$statistics_email_notification_number=$row['number']+1;
		
		$DB->query("update `list_statistics` set `number` ='".$statistics_email_notification_number."' where `type`='statistics_email_notification_number'");
	}
}

function statistics_probe_number(){
	global $DB;
	$statistics_probe_number=0;
	$sql_statement="select*from list_probe";
	$row=$DB->query($sql_statement);
	 while($rows = $DB->fetch($row))
	 {$statistics_probe_number=$statistics_probe_number+1;}
	 return $statistics_probe_number;
}

function statistics_ip_number(){
	global $DB;
	$statistics_ip_number=0;
	$sql_statement="select*from list_ip";
	 $row=$DB->query($sql_statement);
	  while($rows = $DB->fetch($row))
	  {$statistics_ip_number=$statistics_ip_number+1;
	  }
	    return $statistics_ip_number;
}

function statistics_website_visit_number(){
	global $DB;
	$statistics_website_visit_number=0;
$sql_statement="select*from list_statistics where type='statistics_website_visit_number' limit 1";
	  $row=$DB->get_row($sql_statement);
	  $statistics_website_visit_number=$row['number'];
	  return $statistics_website_visit_number;
}

function statistics_probe_add_number(){
	global $DB;
	$statistics_probe_add_number=0;
$sql_statement="select*from list_statistics where type='statistics_probe_add_number' limit 1";
	  $row=$DB->get_row($sql_statement);
	  $statistics_probe_add_number=$row['number'];
	  return $statistics_probe_add_number;
}

function statistics_probe_query_number(){
	global $DB;
	$statistics_probe_query_number=0;
$sql_statement="select*from list_statistics where type='statistics_probe_query_number' limit 1";
	  $row=$DB->get_row($sql_statement);
	  $statistics_probe_query_number=$row['number'];
	  return $statistics_probe_query_number;
}

function statistics_use_api_number(){
	global $DB;
	$statistics_use_api_number=0;
$sql_statement="select*from list_statistics where type='statistics_use_api_number' limit 1";
	  $row=$DB->get_row($sql_statement);
	  $statistics_use_api_number=$row['number'];
	  return $statistics_use_api_number;
}

function statistics_email_notification_number(){
	global $DB;
	$statistics_email_notification_number=0;
 $sql_statement="select*from list_statistics where type='statistics_email_notification_number' limit 1";
	  $row=$DB->get_row($sql_statement);
	  $statistics_email_notification_number=$row['number'];
	  return $statistics_email_notification_number;
}
?>