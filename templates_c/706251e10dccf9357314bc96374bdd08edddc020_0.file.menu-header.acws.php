<?php
/* Smarty version 3.1.45, created on 2024-05-23 15:58:17
  from '/home/worldbel/public_html/asted_themes/marketplace/components/menu/menu-header.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_664f3d696edb03_67538810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '706251e10dccf9357314bc96374bdd08edddc020' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/menu/menu-header.acws',
      1 => 1716469050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664f3d696edb03_67538810 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="menu">
    <ul class="wd-megamenu-ul">
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
    </ul>
</div><?php }
}
