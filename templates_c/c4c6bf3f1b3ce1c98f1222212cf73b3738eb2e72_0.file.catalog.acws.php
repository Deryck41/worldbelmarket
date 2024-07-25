<?php
/* Smarty version 4.1.1, created on 2024-07-14 17:33:09
  from '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/catalog.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_6693e1a554e509_73256831',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4c6bf3f1b3ce1c98f1222212cf73b3738eb2e72' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/catalog.acws',
      1 => 1720805455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6693e1a554e509_73256831 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogArr']->value, 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
<div class="col-lg-4 catalog-item-shop">
<div class="card-wrapper d-flex align-items-center flex-column" data-item-id="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
">
    <div class="img-card-wrapper">
    <?php $_smarty_tpl->_assignInScope('mainPhoto', explode(";",$_smarty_tpl->tpl_vars['catalog']->value['image_images']));?>
        <img class="img-card-item img-fluid" src="<?php if ($_smarty_tpl->tpl_vars['catalog']->value['image_images'] == null) {
echo $_smarty_tpl->tpl_vars['BLOCKPizobrazheniepriotsutsviifoto']->value;
} else {
echo $_smarty_tpl->tpl_vars['mainPhoto']->value[0];
}?>">
        <a class="img-link" href="/katalog/<?php echo $_smarty_tpl->tpl_vars['catalog']->value['pageurl'];?>
/">Просмотр</a>
    </div>
    <div class="card-text-content d-flex align-items-center flex-column">
            <a class="product-title"><?php echo $_smarty_tpl->tpl_vars['catalog']->value['title'];?>
</a>
            <p class="price"><span class="asted-price"><?php echo $_smarty_tpl->tpl_vars['catalog']->value['price'];?>
</span> BYN</p>
        <div class="row">
            <a class="card-button" href="/katalog/<?php echo $_smarty_tpl->tpl_vars['catalog']->value['pageurl'];?>
/">Подробнее</a>
            <a class="card-button btn-add">В корзину</a>
        </div>
    </div>
</div>
</div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
