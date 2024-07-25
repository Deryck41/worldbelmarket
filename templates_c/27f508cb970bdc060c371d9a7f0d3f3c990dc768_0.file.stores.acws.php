<?php
/* Smarty version 3.1.45, created on 2024-06-04 12:56:18
  from '/home/worldbel/public_html/asted_themes/marketplace/components/stores/stores.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_665ee4c2850d94_44629551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27f508cb970bdc060c371d9a7f0d3f3c990dc768' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/stores/stores.acws',
      1 => 1717494941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_665ee4c2850d94_44629551 (Smarty_Internal_Template $_smarty_tpl) {
?><select class="select-category-new-product">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stores']->value, 'store');
$_smarty_tpl->tpl_vars['store']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['store']->value) {
$_smarty_tpl->tpl_vars['store']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['store']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['store']->value['namesection'];?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select><?php }
}
