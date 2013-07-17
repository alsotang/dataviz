<?php 
/*头部模版*/
$tpl_header = <<<HTML
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class='ie ie6'><![endif]-->
<!--[if IE 7 ]><html class='ie ie7'><![endif]-->
<!--[if IE 8 ]><html class='ie ie8'><![endif]-->
<!--[if IE 9 ]><html class='ie ie9'><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
<head>
<meta charset='utf-8'/>
<meta http-equiv='X-UA-Compatible' content='IE=Edge'>
<title>KCharts</title>
<link rel='stylesheet' href='http://a.tbcdn.cn/p/global/1.0/global-min.css' />
<link rel="stylesheet" href="../css/tpl-dpl.css" />
<script src='http://a.tbcdn.cn/??s/kissy/1.3.0/kissy-min.js'></script>
<script>
	KISSY.Config.debug = true;
	KISSY.config({
	packages:[
		{
			name:"gallery",
			path:"../../",
			tag:"20130516"
		}
	]
});
</script>
</head>
<body>
<div class="kc-gen-container">
HTML;

/*尾部模版*/
$tpl_footer = <<<HTML
</div>
</body>
</html>
HTML;
?>