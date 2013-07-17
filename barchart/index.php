<?php 
	include_once('../common/header.php');
	session_start();
	$_SESSION['current_edit_id'] = $_GET['id'];
	$_SESSION['width'] = $_GET['width'];
	$_SESSION['height'] = $_GET['height'];
?>
<link rel="stylesheet" href="../css/barchart.css">
<div class="kc-gen-pop-switch-item">
	<div id="J_Preview" style="width: 700px;height: 260px;display: block;margin: 10px auto;">

	</div>
<textarea id="J_Data">
 Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec
 Tokyo 7.0 6.9 9.5 14.5 18.2 21.5 25.2 26.5 23.3 18.3 13.9 9.6
 NewYork -0.2 0.8 5.7 11.3 17.0 22.0 24.8 24.1 20.1 14.1 8.6 2.5
 Berlin -0.9 0.6 3.5 8.4 13.5 17.0 18.6 17.9 14.3 9.0 3.9 1.0
 London 3.9 4.2 5.7 8.5 11.9 15.2 17.0 16.6 14.2 10.3 6.6 4.8
</textarea>
	<div id="J_Tbl" class="table-container">
	</div>
	<div>
	<a href="generator.php" class="btn-gen-chart" id="J_CreateChart">下一步</a>
	</div>
	</div>
<script type="text/javascript">
KISSY.use("generator/js/mods/barchart/dataformat",function(S,DataFormat){
	DataFormat.init();
});
</script>
<?php 
	include_once('../common/footer.php');
?>