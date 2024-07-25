<?php
/* Smarty version 3.1.45, created on 2024-07-12 19:55:52
  from '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/mainnew.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_669160184782b3_61628772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2fc9cc2e2d5a296064bfb4935273ba5d9a6dcc3e' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/mainnew.acws',
      1 => 1720803349,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669160184782b3_61628772 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogArr']->value, 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
    <div class="col-lg-3 mb-4">
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
                <a class="card-button  ml-2 btn-add">В корзину</a>
            </div>
        </div>
    </div>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
