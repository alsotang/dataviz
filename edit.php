<?php 
	// SSO登录
	include './ssoFilter.php';
	$user = $_SESSION['user'];
	print_r($user);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>数据小报生成器KCharts</title>
<link rel="stylesheet" href="http://a.tbcdn.cn/p/global/1.0/global-min.css" />
<link rel="stylesheet" href="css/edit.css" />
<script src="http://a.tbcdn.cn/??s/kissy/1.3.0/kissy.js"></script>
<script type="text/javascript">
KISSY.Config.debug = true;
KISSY.config({
	packages:[
		{
			name:"js",
			path:"./",
			tag:"20130516"
		}
	]
});</script>
</head>
<body>
<div class="kc-gen-container">
	<div class="kc-gen-graph" id="J_Paper1">
		<a href="#" class="kc-gen-to-add">点击添加图表</a>
	</div>
	<div class="kc-gen-graph" id="J_Paper2">
		<a href="#" class="kc-gen-to-add">点击添加图表</a>
	</div>
</div>
<form method="post" action="./service/savechart.php">
	<input type="hidden" value="" id="H_chart_doc" name="doc"/>
</form>
<script>

KISSY.use("js/main",function(S){
	new arguments[1]()
});
</script>
</body>
</html>