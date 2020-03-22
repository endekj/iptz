<?php 
/*
404页面
*/
echo '
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"><title>百度一下，你就知道</title><style type="text/css">.top{
    width:100%;
    height:64px;}
.top>.title{
    height:64px;
    float:right;}
.top>.title>span{
    line-height:64px;
    float:right;}
.top>.title>span>a{
    font-size:13px;
    font-family:"宋体";
    text-decoration:underline;
    color:#333}
.top>.title>span>.bold{
    font-weight:bold;}
.list{
    border:0;
    height:25px;
    width:60px;
    background:#36F;
    color:#fff;}
    .pic{
    text-align:center;
    margin-bottom:30px;}
.logo{
    height:130px;
    width:270px;}
.search{
    text-align:center;}
.input{
    width:540px;
    height:36px;}
.btn{
    border:0;
    width:100px;
    height:40px;
    background:#36F;
    font-size:15px;
    color:#fff;}
    .foot{width:100%;
    position:absolute;
    bottom:100px;}
.foot>.link{
    text-align:center;
    margin-bottom:10px;}
.foot>.link>a{
    font-size:12px;
    font-family:"宋体";
    text-decoration:underline;}
.copyright{
    text-align:center;}
p,p>a{
    font-size:12px;
    font-family:"宋体";
    color:#666;}
 </style>
</head>
<body>
<div class="top">
      <div class="title">
         <span>
              <a class="bold" href="#">新闻</a>&nbsp;
              <a class="bold" href="#">hao123</a>&nbsp;
              <a class="bold" href="#">地图</a>&nbsp;
              <a class="bold" href="#">视频</a>&nbsp;
              <a class="bold" href="#">贴吧</a>&nbsp;
              <a href="#">登陆</a>&nbsp;
             <a href="#">设置</a>&nbsp;
             <input class="list" type="submit" value="更多产品" name="submit" />&nbsp;
         </span>
     </div>
 </div>
 <div class="body">
    <div class="pic">
        <img class="logo" src="https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_86d58ae1.png" />
    </div>
    <div class="search">
        <form>
            <label for="search"></label>
            <input class="input" type="text" name="search" id="search" value="" /><input class="btn" type="submit" value="百度一下" name="submit" />
        </form>
    </div>
</div>
<div class="foot">
    <div class="link">
        <a href="#">把百度设为主页</a>&nbsp;
        <a href="#">关于百度</a>&nbsp;
        <a href="#">About Baidu</a>
    </div>
    <div class="copyright">
        <p>
            ©2019 Baidu <a href="#">使用百度前必读</a> <a href="#">意见反馈</a> 京ICP证030173号 
        </p>
    </div>
</div>
</body>
</html>
';
?>