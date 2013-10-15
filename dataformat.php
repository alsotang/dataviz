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
.ctn{
	width: 1000px;
	margin:0px auto;
	text-align: center;
}
	textarea{
		width: 960px;
		height: 280px;
		border:2px solid #ccc;
		margin:10px 0px;
	}
	h1{
		font-size: 28px;
		padding: 20px;
	}
	h3{
		font-size: 16px;
		text-align: left;
	}
	h3 span{
		font-size: 12px;
		color:#f60;
	}
</style>
<body>
	<div class="ctn">
	<h1>在线数据转换工具 <span style="color:#f60;font-size:16px;">Beta</span></h1>
<div>
<h3>Input <span>(粘贴代码至此)</span></h3>
<textarea id="J_Input">
	浏览PV	浏览UVw
16日	874881	631957
17日	774063	557791
18日	724666	546890
19日	924298	675481
20日	843496	635298
21日	862436	653583
22日	981748	701272
</textarea>
<div>
<h3>Output <span>(粘贴以下代码至画报生成器)</span></h3>
<textarea id="J_Output">
	

</textarea>
</div>
<script>

KISSY.use("js/dataformat/");
</script>
</body>
</html>