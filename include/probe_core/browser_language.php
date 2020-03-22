<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 4); //只取前4位，这样只判断最优先的语言。如果取前5位，可能出现en,zh的情况，影响判断。  
if (preg_match("/zh-c/i", $lang))  
$browser_language= "简体中文";  
else if (preg_match("/zh/i", $lang))  
$browser_language= "繁體中文";  
else if (preg_match("/en/i", $lang))  
$browser_language= "English";  
else if (preg_match("/fr/i", $lang))  
$browser_language= "French";  
else if (preg_match("/de/i", $lang))  
$browser_language= "German";  
else if (preg_match("/jp/i", $lang))  
$browser_language= "Japanese";  
else if (preg_match("/ko/i", $lang))  
$browser_language= "Korean";  
else if (preg_match("/es/i", $lang))  
$browser_language= "Spanish";  
else if (preg_match("/sv/i", $lang))  
$browser_language= "Swedish";  
else $browser_language= "Unknown";  
?>