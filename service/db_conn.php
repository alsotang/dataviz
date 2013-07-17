<?php
	//连接数据库
	// $con = mysql_connect("localhost:3306","root","insigma");
$con = mysql_connect("localhost:3306","root","taobao1234");
	// $con = mysql_connect("localhost:3306","root","discuaxiaoxu");
	if (!$con){
	  die('Could not connect: ' . mysql_error());
	 }
	//选择当前数据库
	mysql_select_db("kcharts", $con);

?>