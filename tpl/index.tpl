	<div  class="well well-small">
		<!-- <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
		    请选择
		    <span class="caret"></span>
		  </a>
		  <ul class="dropdown-menu">
		   	<li>日期</li>
		   	<li>日期</li>
		  </ul>
		</div> -->
		<button type="button" class="btn btn-danger" onclick="javascript:location.href='edit.php'">创建画报</button>
	</div>
	<table class="table well well-small">
		<tr>
			<th>标题</th>
			<th>上传者</th>
			<th>标题</th>
			<th>标题</th>
			<th>创建日期</th>
			<th>最近更新</th>
			<th>操作</th>
		</tr>
	{section name=item loop=$list}
		<tr>
			<td>{$list[item].title}</td>
			<td>{$list[item].nick}</td>
			<td>test</td>
			<td>test</td>
			<td>{$list[item].create_time}</td>
			<td>{$list[item].last_modify_time}</td>
				<td>
				<button type="button" class="btn btn-default">查看</button>
				<button type="button" class="btn btn-default">编辑</button>
				<button type="button" class="btn btn-danger">删除</button>
			</td>
		</tr>
	{/section}
	</table>
<div class="pagination well well-small">
  <ul>
    <li><a href="#">上一页</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><a href="#">下一页</a></li>
  </ul>
</div>