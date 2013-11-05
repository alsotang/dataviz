<?php /* Smarty version Smarty-3.1.14, created on 2013-11-05 10:56:44
         compiled from "tpl/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6455589985278c0dcd50078-76199725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33239c84de49b23b7fa2dd5fded24dcd2c7ab90c' => 
    array (
      0 => 'tpl/index.tpl',
      1 => 1383638598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6455589985278c0dcd50078-76199725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 1,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5278c0dcd6bb50_94186879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5278c0dcd6bb50_94186879')) {function content_5278c0dcd6bb50_94186879($_smarty_tpl) {?>	<div  class="well well-small">
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
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['item'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['item']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['name'] = 'item';
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['item']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['item']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['item']['total']);
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['item']['index']]['title'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['item']['index']]['nick'];?>
</td>
			<td>test</td>
			<td>test</td>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['item']['index']]['create_time'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['item']['index']]['last_modify_time'];?>
</td>
				<td>
				<button type="button" class="btn btn-default">查看</button>
				<button type="button" class="btn btn-default">编辑</button>
				<button type="button" class="btn btn-danger">删除</button>
			</td>
		</tr>
	<?php endfor; endif; ?>
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
</div><?php }} ?>