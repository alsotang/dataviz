<?php 
include 'header.php';
include 'service/pageservice.php';
$smarty->assign("list",$demolist,true);
$smarty->display('tpl/index.tpl');
include 'footer.php';
?>