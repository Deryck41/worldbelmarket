<?php
/* Smarty version 3.1.45, created on 2024-05-23 16:18:23
  from '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/select-category.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_664f421f1cfa42_38581571',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f3a1dc9b221369c20e65a70b633ee9aff793ae4' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/select-category.acws',
      1 => 1716470301,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664f421f1cfa42_38581571 (Smarty_Internal_Template $_smarty_tpl) {
?><select class="search-select" name="" id="">
    <option value="Null">Не выбрано</option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryArr']->value, 'categoryItem');
$_smarty_tpl->tpl_vars['categoryItem']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoryItem']->value) {
$_smarty_tpl->tpl_vars['categoryItem']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['URL2']->value != $_smarty_tpl->tpl_vars['categoryItem']->value['pageurl']) {?>
        <option class="search-option" value="<?php echo $_smarty_tpl->tpl_vars['categoryItem']->value['pageurl'];?>
"><?php echo $_smarty_tpl->tpl_vars['categoryItem']->value['name'];?>
</option>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
</select><?php }
}
