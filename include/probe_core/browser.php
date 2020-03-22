<?php
    $agent=$_SERVER["HTTP_USER_AGENT"];
    if(strpos($agent,'MSIE')!==false || strpos($agent,'rv:11.0')) //ie11判断
    $browser= "IE";
    else if(strpos($agent,'Firefox')!==false)
    $browser= "Firefox";
    else if(strpos($agent,'Chrome')!==false)
    $browser= "Chrome";
    else if(strpos($agent,'Opera')!==false)
    $browser= 'Opera';
    else if((strpos($agent,'Chrome')==false)&&strpos($agent,'Safari')!==false)
    $browser= 'Safari';
		else if(strpos($agent,'Edge')!==false)
		$browser= 'Edge';
    else 
    return 'Unknown';
?>