<?php
/* Smarty version 3.1.45, created on 2024-02-05 02:44:41
  from '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/components/catalog/mainnew.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c021696d45e1_60961495',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a248a28b807a27dc61b847451197561571cd353' => 
    array (
      0 => '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/components/catalog/mainnew.acws',
      1 => 1707090279,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c021696d45e1_60961495 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['catalogArr']->value, 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
    <div class="col-lg-3 mb-4">
    <di class="card-wrapper d-flex align-items-center flex-column">
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
                <a class="card-button" href="#">Подробнее</a>
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
