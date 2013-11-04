<?php 
include 'service/loginFilter.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>数据小报生成器KCharts</title>
<link rel="stylesheet" href="http://a.tbcdn.cn/p/global/1.0/global-min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script src="http://a.tbcdn.cn/??s/kissy/1.3.1/kissy.js"></script>
</head>
<body style="padding:5px;">
<div>
	<div class="navbar">
	  <div class="navbar-inner">
	    <a class="brand" href="#">KCharts</a>
	    <ul class="nav">
	      <li class="active"><a href="#">我创建的页面</a></li>
	      <li><a href="#">所有页面</a></li>
	    </ul>
	  </div>
	</div>
	<ul class="breadcrumb">
  <li><a href="#">首页</a> <span class="divider">/</span></li>
  <li class="active">我创建的页面</li>
</ul>
	<div  class="well well-small">
		<div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
		    请选择
		    <span class="caret"></span>
		  </a>
		  <ul class="dropdown-menu">
		   	<li>日期</li>
		   	<li>日期</li>
		  </ul>
		</div>
	</div>
	<table class="table well well-small">
		<tr>
			<th>标题</th>
			<th>标题</th>
			<th>标题</th>
			<th>标题</th>
			<th>日期</th>
			<th>操作</th>
		</tr>
		<tr>
			<td>这个是demo</td>
			<td>test</td>
			<td>test</td>
			<td>test</td>
			<td>2013-01-01 10:00:11</td>
			<td>
				<button type="button" class="btn btn-default">查看</button>
				<button type="button" class="btn btn-default">编辑</button>
				<button type="button" class="btn btn-danger">删除</button>
			</td>
		</tr>
		
		

	</table>

<div class="pagination well well-small">
  <ul>
    <li><a href="#">Prev</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">Next</a></li>
  </ul>
</div>
</div>	
</body>
</html>