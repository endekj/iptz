<?php
function qqshare($url,$title,$pics,$summary,$desc){
//你的分享url
//你的分享标题
//你的分享图片
//你的分享描述
//你的分享描述
$qqurl = "http://connect.qq.com/widget/shareqq/index.html?url=$url&sharesource=qzone&title=$title&pics=$pics&summary=$summary&desc=$desc";
return $qqurl;
}
?>