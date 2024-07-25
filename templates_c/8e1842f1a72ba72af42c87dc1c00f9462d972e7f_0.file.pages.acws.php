<?php
/* Smarty version 3.1.45, created on 2024-06-04 16:28:22
  from '/home/worldbel/public_html/asted_themes/marketplace/pages.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_665f1676297699_83134246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8e1842f1a72ba72af42c87dc1c00f9462d972e7f' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/pages.acws',
      1 => 1717507700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.acws' => 1,
    'file:parts/view-product.acws' => 1,
    'file:footer.acws' => 1,
  ),
),false)) {
function content_665f1676297699_83134246 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['CONTENT']->value == null) {?>
    <?php if ($_smarty_tpl->tpl_vars['URL2']->value == null) {?>
                        <?php $_smarty_tpl->_assignInScope('filePath', ((string)$_smarty_tpl->tpl_vars['THEME']->value)."/parts/".((string)$_smarty_tpl->tpl_vars['URL']->value).".acws");?>
                        <?php if (file_exists($_smarty_tpl->tpl_vars['filePath']->value)) {?>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['filePath']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            <?php } else { ?>
                                <?php echo header("HTTP/1.0 404 Not Found");?>

                <div style="text-align: center;">ASTED CMS: Error 404, page <?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
 not found!</div>
            <?php }?>
    <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['URL']->value == 'view-product') {?>
            <?php $_smarty_tpl->_subTemplateRender("file:parts/view-product.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['URL']->value == 'katalog') {?>
            <?php echo smarty_function_catalog(array('type'=>"detail",'product'=>$_smarty_tpl->tpl_vars['URL2']->value,'style'=>"detalka"),$_smarty_tpl);?>

        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['URL']->value == 'news' && $_smarty_tpl->tpl_vars['URL2']->value != null) {?>
            <?php echo smarty_function_news(array('type'=>"detail",'product'=>$_smarty_tpl->tpl_vars['URL2']->value,'style'=>"xxxx"),$_smarty_tpl);?>

            <?php }?>
    <?php }
} else { ?>
    <div class="container p-3"><?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>
</div>
<?php }?>



<?php $_smarty_tpl->_subTemplateRender("file:footer.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
