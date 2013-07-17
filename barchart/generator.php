<?php 
	include_once('../common/header.php');
?>
<link rel="stylesheet" href="../css/linechart.css">
	<div class="kc-gen-pop-switch-item">
		<div class="kc-gen-linechart-canvas" id="J_Preview"></div>
		<table class="kc-gen-tbl-config">
			<tr>
				<td colspan="4" class="tbl-title">详细配置</td>
			</tr>
			<tr>
				<td><label class="lbl-range" for="J_BarsRatio">柱形组宽度占空比</label></td>
				<td><input class="ipt-range" min="0.5" max="1" step="0.05" type="range" id="J_BarsRatio"></td>
				<td>主标题</td>
				<td><input class="ipt-txt" type="text" id="J_Title"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
			<tr>
				<td><label class="lbl-range" for="J_BarRatio">柱形宽度占空比</label></td>
				<td><input class="ipt-range" min="0.1" max="1" step="0.05" type="range" id="J_BarRatio"></td>
				<td>子标题</td>
				<td><input class="ipt-txt" type="text" id="J_SubTitle"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
			<tr>
				<td>y轴刻度数</td>
				<td><input class="ipt-range" type="range" id="J_CoordNum" min="2" max="10" step="1"></td>
				<td>堆叠</td>
				<td><input class="ipt-checkbox" type="checkbox" id="J_Stackable"></td>
			</tr>
			<tr>
				<td>单位</td>
				<td><input class="ipt-txt" type="text" id="J_Unit" value="℃"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
				<td>y轴最小值</td>
				<td><input class="ipt-txt" type="text" id="J_Min"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
			<tr>
				<td>是否翻转</td>
				<td><input type="checkbox" class="ipt-checkbox" id="J_ZoomType"></td>
			</tr>
		</table>
		<a href="#" class="btn-gen-chart" id="J_Gen">保存图表</a>
	</div>
</div>
</div>
<script>
KISSY.use("generator/js/mods/barchart/generator",function(S,Generator){
	var gen = new Generator();
});
</script>
<?php 
	include_once('../common/footer.php');
?>