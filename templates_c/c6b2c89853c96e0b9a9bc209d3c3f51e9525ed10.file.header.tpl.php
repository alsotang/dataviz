<?php /* Smarty version Smarty-3.1.14, created on 2013-11-05 11:16:16
         compiled from "tpl/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16622242835278c0dcd16e56-60475274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6b2c89853c96e0b9a9bc209d3c3f51e9525ed10' => 
    array (
      0 => 'tpl/header.tpl',
      1 => 1383646575,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16622242835278c0dcd16e56-60475274',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5278c0dcd42de6_41760429',
  'variables' => 
  array (
    'user' => 1,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5278c0dcd42de6_41760429')) {function content_5278c0dcd42de6_41760429($_smarty_tpl) {?><!DOCTYPE html>
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
	    <?php if ($_smarty_tpl->tpl_vars['user']->value&&$_smarty_tpl->tpl_vars['user']->value['nick']){?>
	    <p class="navbar-text pull-right">欢迎: <a href="#" class="navbar-link"><?php echo $_smarty_tpl->tpl_vars['user']->value['nick'];?>
</a> | 
		    <a href="service/logout.php" class="navbar-link">注销</a>
		<span>上一次登录时间：<?php echo $_smarty_tpl->tpl_vars['user']->value['last_login_time'];?>
</span>
		</p>
	    <?php }?>
	  </div>
	</div>
	<ul class="breadcrumb">
	  <li><a href="#">首页</a> <span class="divider">/</span></li>
	  <li class="active">我创建的页面</li>
	</ul><?php }} ?>