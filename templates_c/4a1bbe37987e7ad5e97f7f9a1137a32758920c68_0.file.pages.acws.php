<?php
/* Smarty version 3.1.45, created on 2024-02-05 12:15:27
  from '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/pages.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c0a72fa58ab0_17450260',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a1bbe37987e7ad5e97f7f9a1137a32758920c68' => 
    array (
      0 => '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/pages.acws',
      1 => 1707124462,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.acws' => 1,
    'file:footer.acws' => 1,
  ),
),false)) {
function content_65c0a72fa58ab0_17450260 (Smarty_Internal_Template $_smarty_tpl) {
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
        <?php if ($_smarty_tpl->tpl_vars['URL']->value == 'katalog') {?>
            <?php echo smarty_function_catalog(array('type'=>"detail",'product'=>$_smarty_tpl->tpl_vars['URL2']->value,'style'=>"detalka"),$_smarty_tpl);?>

        <?php }?>
    <?php }
} else { ?>
    <?php echo $_smarty_tpl->tpl_vars['CONTENT']->value;?>

<?php }?>



<?php $_smarty_tpl->_subTemplateRender("file:footer.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
