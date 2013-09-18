<?php 
	include_once('../common/header.php');
?>
<link rel="stylesheet" href="../css/linechart.css">
<div class="kc-gen-pop-switch-item">
	<textarea id="J_Data">
	Tokyo 7.0 6.9 9.5 14.5 18.2 21.5 25.2 26.5 23.3 18.3 13.9 9.6
	NewYork -0.2 0.8 5.7 11.3 17.0 22.0 24.8 24.1 20.1 14.1 8.6 2.5
			Jan Feb Mar Apr May Jun Jul Aug Sep Oct Nov Dec
	</textarea>
	<div id="J_Tbl" class="table-container">
	</div>
	<div>
	<a href="generator.php" class="btn-gen-chart" id="J_CreateChart">生成图表</a>
	</div>
	</div>
<script type="text/javascript">
KISSY.use("js/mods/barchart/dataformat",function(S,DataFormat){
	DataFormat.init();
});
</script>
<?php 
	include_once('../common/footer.php');
?>