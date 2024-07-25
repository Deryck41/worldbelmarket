<?php
/* Smarty version 3.1.45, created on 2024-05-23 16:02:28
  from '/home/worldbel/public_html/asted_themes/marketplace/components/menu/main-footer.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_664f3e64e84bd1_86084689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c04908976bc3be494f9746212048e7315bd8f6a' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/menu/main-footer.acws',
      1 => 1716469274,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664f3e64e84bd1_86084689 (Smarty_Internal_Template $_smarty_tpl) {
?><ul>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuArr']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
?>
	<li>
		<a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
" class="main-menu-list"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
	</li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul><?php }
}
