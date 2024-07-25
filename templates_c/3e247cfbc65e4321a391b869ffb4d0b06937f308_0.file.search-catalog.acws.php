<?php
/* Smarty version 4.1.1, created on 2024-06-12 13:47:07
  from '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/search-catalog.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_66697cab3eea14_45624131',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e247cfbc65e4321a391b869ffb4d0b06937f308' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/search-catalog.acws',
      1 => 1718189214,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66697cab3eea14_45624131 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogArr']->value, 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
    <div class="col-lg-4">
    <div class="card-wrapper d-flex align-items-center flex-column" data-item-id="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
">
        <div class="img-card-wrapper">
            <img class="img-card-item img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['image_images'];?>
">
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
