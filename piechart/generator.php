<?php 
	include_once('../common/header.php');
?>
<link rel="stylesheet" href="../css/piechart.css">
	<div class="kc-gen-pop-switch-item">
		<div class="kc-gen-linechart-canvas" id="J_Preview"></div>
		<table class="kc-gen-tbl-config">
			<tr>
				<td colspan="4" class="tbl-title">详细配置</td>
			</tr>
			
		</table>
		<a href="#" class="btn-gen-chart" id="J_Gen">保存图表</a>
	</div>
</div>
</div>
<script>
KISSY.use("js/mods/piechart/generator",function(S,Generator){
	var gen = new Generator();
});
</script>
<?php 
	include_once('../common/footer.php');
?>