<?php
function check_authorization(){
	$url = "http://api.cshenyun.com/1.txt";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);	
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$query_authorization = curl_exec($ch);
	curl_close($ch);
}

function check_install(){
	if(file_exists($_SERVER['DOCUMENT_ROOT']."/install/install.lock")==0){
		exit('
		<script>
		layui.use("layer", function(){
			var layer = layui.layer;
			
		layer.open({
			title: "提示"
			,content:"您还未安装程序，点击确定进行安装"
			
				,yes: function(index, layero){
				window.location.href="/install/index.php";
					layer.close(index);
					}
				
				,cancel: function(index, layero){ 
				window.location.href="/install/index.php";
					layer.close(index);
				}  
			
		});     
		
		}); 						
		</script>');
	}
	}
?>