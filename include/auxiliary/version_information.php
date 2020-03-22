<?php
function now_version_number(){
	$now_version_number=1.7;
	return $now_version_number;
}

function latest_version_number(){
$url = "http://api.cshenyun.com/1.txt";
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  $latest_version_number = curl_exec($ch);
	  curl_close($ch);
	  return $latest_version_number;
}

function latest_version_number_help(){
$url = "http://api.cshenyun.com/1.txt";
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  $latest_version_number_help = curl_exec($ch);
	  curl_close($ch);
	  return $latest_version_number_help;
}
?>