<?php
/* Smarty version 3.1.45, created on 2024-07-08 11:44:26
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/user-orders.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_668ba6eaab2c35_89198343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb2742594f82e75d503e91b61d3f529c2004e664' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/user-orders.acws',
      1 => 1720427830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668ba6eaab2c35_89198343 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true) {?>
    
<section>

		<div class="container">
            <div class="user-orders">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userOrdersInfo']->value, 'userOrder');
$_smarty_tpl->tpl_vars['userOrder']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userOrder']->value) {
$_smarty_tpl->tpl_vars['userOrder']->do_else = false;
?>
                    <div class="user-order">
                        <h5 class="order-date">Заказ от <?php echo $_smarty_tpl->tpl_vars['userOrder']->value['order']['date'];?>
</h5>
                        <span class="order-status"> Номер заказа: <span class="order-value"><?php echo $_smarty_tpl->tpl_vars['userOrder']->value['order']['order_stamp'];?>
</span>
                        </span>
                        <span class="order-status"> Статус:<span class="order-value">
                        <?php if ($_smarty_tpl->tpl_vars['userOrder']->value['order']['status'] == "created") {?>
                            Ожидает оплаты
                            <?php } elseif ($_smarty_tpl->tpl_vars['userOrder']->value['order']['status'] == "Completed") {?>
                                Оплата завершена
                                <?php } elseif ($_smarty_tpl->tpl_vars['userOrder']->value['order']['status'] == "Authorized") {?>
                                    Ожидание перевода
                                    <?php } elseif ($_smarty_tpl->tpl_vars['userOrder']->value['order']['status'] == '') {?>
                                        Ошибка
                        <?php }?>
                        </span>
                        </span>
                        <span class="order-status"> Тип оплаты: <?php echo $_smarty_tpl->tpl_vars['userOrder']->value['order']['payment_method'];?>

                        </span>
                        <span class="order-status"> Тип доставки: <?php echo $_smarty_tpl->tpl_vars['userOrder']->value['order']['delivery_method'];?>

                        </span>
                        <?php if ($_smarty_tpl->tpl_vars['userOrder']->value['order']['adress'] != null) {?>
                            <span class="order-status"> Адрес доставки: <?php echo $_smarty_tpl->tpl_vars['userOrder']->value['order']['adress'];?>

                        </span>
                            <?php }?>
                        <h5 class="products-header">Товары:</h5>
                        <div class="products row catalog-box gap-vertical">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userOrder']->value['products'], 'catalog');
$_smarty_tpl->tpl_vars['catalog']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['catalog']->value) {
$_smarty_tpl->tpl_vars['catalog']->do_else = false;
?>
                                <div class="col-lg-4 catalog-item-shop">
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
                                                                                    </div>
                                    </div>
                                </div>
                                </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
		</div>

	</section>
    <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/user-detail.js" type="module"><?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/provider-detail.js" type="module"><?php echo '</script'; ?>
>
    <?php }?>
    <?php } else { ?>
        <h1>Вы не вошли</h1>
    <?php }
}
}
