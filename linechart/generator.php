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
				<td><label class="lbl-range" for="J_PointRadius">点半径</label></td>
				<td><input class="ipt-range" min="0" max="5" step="0.02" type="range" id="J_PointRadius"></td>
				<td><label class="lbl-range" for="J_LineWidth">线宽</label></td>
				<td><input class="ipt-range" min="0.1" max="5" step="0.1" type="range" id="J_LineWidth"></td>
			</tr>
			<tr>
				<td><label class="lbl-range" for="J_PointStrokeWidth">轮廓线粗细</label></td>
				<td><input class="ipt-range" min="0.1" max="5" step="0.1" type="range" id="J_PointStrokeWidth"></td>
				<td>主标题</td>
				<td><input class="ipt-txt" type="text" id="J_Title"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
			<tr>
				<td>类型</td>
				<td>
					<label><input class="ipt-radio point-type" value="实心" name="pointtype" type="radio" checked="checked">实心</label>
					<label><input class="ipt-radio point-type" value="空心" name="pointtype" type="radio">空心</label>
				</td>
				<td>子标题</td>
				<td><input class="ipt-txt" type="text" id="J_SubTitle"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
			<tr>
				<td>形状</td>
				<td>
					<label><input class="ipt-radio point-style" name="pointstyle" type="radio" value="auto" checked="checked">auto</label>
					<label><input class="ipt-radio point-style" name="pointstyle" type="radio" value="circle">圆形</label>
					<label><input class="ipt-radio point-style" name="pointstyle" type="radio" value="triangle">三角形</label>
					<label><input class="ipt-radio point-style" name="pointstyle" type="radio" value="square">正方形</label>
					<label><input class="ipt-radio point-style" name="pointstyle" type="radio" value="rhomb">菱形</label>
					
				</td>
				<td>y轴刻度数</td>
				<td><input class="ipt-range" type="range" id="J_CoordNum" min="2" max="10" step="1"></td>
			</tr>
			<tr>
				<td>单位</td>
				<td><input class="ipt-txt" type="text" id="J_Unit" value="℃"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
				<td>y轴最小值</td>
				<td><input class="ipt-txt" type="text" id="J_Min"><a href='#' class="kc-gen-btn-default btn-apply">应用</a></td>
			</tr>
		</table>
		<a href="#" class="btn-gen-chart" id="J_Gen">保存图表</a>
	</div>
</div>
</div>
<script>
KISSY.use("js/mods/linechart/generator",function(S,Generator){
	var gen = new Generator();
});
</script>
<?php 
	include_once('../common/footer.php');
?>