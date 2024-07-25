<?php
/* Smarty version 3.1.45, created on 2024-04-04 12:51:16
  from '/home/worldbel/public_html/asted_themes/marketplace/components/menu/footer.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_660e781431bed9_02162063',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30742fe765c6f70f8ff9d2dc497b08d5083cdeee' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/menu/footer.acws',
      1 => 1709760464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_660e781431bed9_02162063 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuArr']->value, 'menu');
$_smarty_tpl->tpl_vars['menu']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->do_else = false;
?>
    <li>
	    <a href="/<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
/"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
    </li>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
