<?php
/* Smarty version 3.1.45, created on 2024-04-07 06:14:31
  from '/home/worldbel/public_html/asted_themes/marketplace/components/news/xxxx.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_66120f9738db84_29968939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef478cb6e0a3fa74d9479a70e8cebe2830b3d3a5' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/news/xxxx.acws',
      1 => 1707137589,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66120f9738db84_29968939 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="post-item-description">
                                <h2 class="text-center"><?php echo $_smarty_tpl->tpl_vars['newsArr']->value['title'];?>
</h2>
                                <?php echo $_smarty_tpl->tpl_vars['newsArr']->value['content'];?>

                            </div>
                            <div class="blog-wrapper col-lg-12 d-flex flex-wrap">
                                <?php $_smarty_tpl->_assignInScope('galery', explode(';',$_smarty_tpl->tpl_vars['newsArr']->value['galery']));?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['galery']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
                                <div class="col-lg-3 blog-img-wrapper">
                                    <img alt="" src="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" data-fancybox="gallery" data-caption="<?php echo $_smarty_tpl->tpl_vars['newsArr']->value['title'];?>
">
                                </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div><?php }
}
