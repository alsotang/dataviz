<?php
$id = $_POST['id'];
$cfg = $_POST['cfg'];
$chart_type = $_POST['ctype']; 
session_start();
//当前编辑的容器id
$current_edit_id = $_SESSION['current_edit_id'];
$width = $_SESSION['width'];
$height = $_SESSION['height'];

function gen_chart($id,$current_edit_id,$chart_type,$width,$height,$cfg){
	$html = "<div style='width:".$width."px;height:".$height."px' id=".$id.">";
	$html .="</div>";

	$script ="KISSY.use('gallery/kcharts/1.2/".$chart_type."/index',function(S,Chart){new Chart(".$cfg.");})";

	$json = array();
	$json['html'] = $html;
	$json['script'] = $script;
	$json['ctnid'] = $current_edit_id;
	return json_encode($json);
}

echo gen_chart($id,$current_edit_id,$chart_type,$width,$height,$cfg);

?>