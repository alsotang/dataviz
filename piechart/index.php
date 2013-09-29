<?php 
	include_once('../common/header.php');
	session_start();
	$_SESSION['current_edit_id'] = $_GET['id'];
	$_SESSION['width'] = $_GET['width'];
	$_SESSION['height'] = $_GET['height'];
?>
<link rel="stylesheet" href="../css/piechart.css">
<div class="kc-gen-pop-switch-item">
	<div id="J_Preview" style="width: 700px;height: 260px;display: block;margin: 10px auto;">

	</div>
<textarea id="J_Data">
Chrome 1 
FireFox 2 
IE 3 
Opera 4
Safari 5
</textarea>
	<div id="J_Tbl" class="table-container">
	</div>
	<div>
	<a href="generator.php" class="btn-gen-chart" id="J_CreateChart">下一步</a>
	</div>
	</div>
<script type="text/javascript">
KISSY.use("js/mods/piechart/dataformat",function(S,DataFormat){
	DataFormat.init();
});
</script>
<?php 
	include_once('../common/footer.php');
?>