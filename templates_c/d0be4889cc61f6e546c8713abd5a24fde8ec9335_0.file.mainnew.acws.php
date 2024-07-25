<?php
/* Smarty version 3.1.45, created on 2024-03-19 08:23:45
  from '/sites/worldbelmarket.by/asted_themes/marketplace/components/catalog/mainnew.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65f94b9158fc40_45141680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd0be4889cc61f6e546c8713abd5a24fde8ec9335' => 
    array (
      0 => '/sites/worldbelmarket.by/asted_themes/marketplace/components/catalog/mainnew.acws',
      1 => 1710836376,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f94b9158fc40_45141680 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogArr']->value, 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
    <div class="col-lg-3 mb-4">
    <di class="card-wrapper d-flex align-items-center flex-column" data-item-id="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['id'];?>
">
        <div class="img-card-wrapper">
            <img class="img-card-item img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['catalog']->value['image_images'];?>
">
            <a class="img-link" href="#">Просмотр</a>
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
    </di>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
