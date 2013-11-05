<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>数据小报生成器KCharts</title>
<link rel="stylesheet" href="http://a.tbcdn.cn/p/global/1.0/global-min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script> 
<script src="http://g.tbcdn.cn/??kissy/k/1.3.1/kissy-min.js"></script>
</head>
<body>
	<div class="navbar navbar-static-top">
	  <div class="navbar-inner">
	    <a class="brand" href="#">KCharts</a>
	    <ul class="nav">
	      <li class="active"><a href="#">我创建的页面</a></li>
	      <li><a href="#">所有页面</a></li>
	    </ul>
	    {if $user && $user.nick}
	    <p class="navbar-text pull-right">欢迎: <a href="#" class="navbar-link">{$user.nick}</a> | 
		    <a href="service/logout.php" class="navbar-link">注销</a>
		<span>上一次登录时间：{$user.last_login_time}</span>
		</p>
	    {/if}
	  </div>
	</div>
	<ul class="breadcrumb">
	  <li><a href="#">首页</a> <span class="divider">/</span></li>
	  <li class="active">我创建的页面</li>
	</ul>