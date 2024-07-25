<?php
/* Smarty version 3.1.45, created on 2024-07-12 18:30:54
  from '/home/worldbel/public_html/asted_themes/marketplace/components/product-list/provider_list.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_66914c2eb17ec9_66783409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e050fb4cf5494178d52acaa513824c5cb533f88f' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/product-list/provider_list.acws',
      1 => 1720798253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66914c2eb17ec9_66783409 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
     <tr>
        <td class="text-center">
            <div class="img-wishlist-wrapper">
                <?php echo $_smarty_tpl->tpl_vars['product']->value['title'];?>

            </div>
        </td>
        <td class="text-center" style="height: 40%";>
            <div class="vertical-center" style="height: 100%">
            <?php $_smarty_tpl->_assignInScope('mainPhoto', explode(";",$_smarty_tpl->tpl_vars['product']->value['photo']));?>
<img src="<?php if ($_smarty_tpl->tpl_vars['product']->value['photo'] == null) {
echo $_smarty_tpl->tpl_vars['BLOCKPizobrazheniepriotsutsviifoto']->value;
} else {
echo $_smarty_tpl->tpl_vars['mainPhoto']->value[0];
}?>" alt="" style="height: 100%">
            </div>
        </td>
        <td class="text-center">
            <div class="vertical-center">
                <div class="wishlist-price">
                    <p><?php echo $_smarty_tpl->tpl_vars['product']->value['price'];?>
 BYN</p>
                </div>
            </div>
        </td>
        <td class="text-center">
            <div class="vertical-center">
               
                    
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == "moderation") {?>
                <div class="grey-color">
                <i class="fa-solid fa-clock"></i> На модерации
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == "active") {?>
                <div class="green-color">
                <i class="fa-solid fa-cart-shopping"></i> На маркетплейсе
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == "rejected") {?>
                <div class="red-color">
                <i class="fa-solid fa-times"></i> Отклонено
                </div>
            <?php }?>
                
            </div>
        </td>
        <td class="text-center">
            <div class="vertical-center">
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == "moderation") {?>
                <a href="/view-product?id=<?php echo $_smarty_tpl->tpl_vars['product']->value['id'];?>
" class="btn btn-primary select-market-btn">
                    Перейти
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['status'] == "active") {?>
                <a href="/katalog/<?php echo $_smarty_tpl->tpl_vars['product']->value['origin_pageurl'];?>
" class="btn btn-primary select-market-btn">
                    Перейти
                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                </a>
            <?php }?>
            </div>
        </td>
    </tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
