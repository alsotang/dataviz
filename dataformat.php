<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>数据处理</title>
<link rel="stylesheet" href="http://a.tbcdn.cn/p/global/1.0/global-min.css" />
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
<style type="text/css">
	textarea{
		width: 600px;
		height: 280px;
		border:2px solid #ccc;
	}

</style>
<body>
	<h1>在线数据转换器</h1>
<textarea id="J_Input">
	浏览PV	浏览UV
16日	874881	631957
17日	774063	557791
18日	724666	546890
19日	924298	675481
20日	843496	635298
21日	862436	653583
22日	981748	701272
</textarea>
<textarea id="J_Output">
	

</textarea>
<script>

KISSY.use("js/dataformat/");
</script>
</body>
</html>