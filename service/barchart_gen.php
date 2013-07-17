<?php
$kcharts_version = "1.1";
$gallery_dir = "gallery/".$kcharts_version."/";

$id = $_POST['id'];
$cfg = $_POST['cfg'];
session_start();
//当前编辑的容器id
$current_edit_id = $_SESSION['current_edit_id'];
$width = $_SESSION['width'];
$height = $_SESSION['height'];

function genBarchart($id,$current_edit_id,$width,$height,$cfg){
	$html = "<div style='width:".$width."px;height:".$height."px' id=".$id.">";
	$html .="</div>";

	$script ="KISSY.use('gallery/kcharts/1.1/barchart/index',function(S,BarChart){new BarChart(".$cfg.");})";

	$json = array();
	$json['html'] = $html;
	$json['script'] = $script;
	$json['ctnid'] = $current_edit_id;
	return json_encode($json);
}

echo genBarchart($id,$current_edit_id,$width,$height,$cfg);

?>