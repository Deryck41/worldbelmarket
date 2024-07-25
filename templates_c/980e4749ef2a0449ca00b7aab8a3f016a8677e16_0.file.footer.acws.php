<?php
/* Smarty version 3.1.45, created on 2024-03-19 08:23:40
  from '/sites/worldbelmarket.by/asted_themes/marketplace/components/menu/footer.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65f94b8c3338a7_52683817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '980e4749ef2a0449ca00b7aab8a3f016a8677e16' => 
    array (
      0 => '/sites/worldbelmarket.by/asted_themes/marketplace/components/menu/footer.acws',
      1 => 1709760464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f94b8c3338a7_52683817 (Smarty_Internal_Template $_smarty_tpl) {
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
