<?php
	//连接数据库
	$con = mysql_connect("localhost:3306","root","Taobao1234");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	 }
	//选择当前数据库
	mysql_select_db("kcharts", $con);
	header("content-type:text/html; charset=utf-8");
	mysql_query("set names utf8");
?>