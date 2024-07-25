<?php
/* Smarty version 3.1.45, created on 2024-07-09 11:54:13
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-statistics.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_668cfab564c737_89256109',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '61e806a0161bbcb7be5baeedaeb15822b2fe5d3c' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-statistics.acws',
      1 => 1720515241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668cfab564c737_89256109 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true && $_smarty_tpl->tpl_vars['uType']->value == 'provider') {?>
    
    <section>
    
            <div class="container">
                <div class="user-orders">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['providerSales']->value, 'providerSale');
$_smarty_tpl->tpl_vars['providerSale']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['providerSale']->value) {
$_smarty_tpl->tpl_vars['providerSale']->do_else = false;
?>
                        <h5>Заказ от <?php echo $_smarty_tpl->tpl_vars['providerSale']->value['order']['date'];?>
</h5>
                        <span class="order-status"> Статус:<span class="order-value">
                        <?php if ($_smarty_tpl->tpl_vars['providerSale']->value['order']['status'] == "created") {?>
                            Ожидает оплаты
                            <?php } elseif ($_smarty_tpl->tpl_vars['providerSale']->value['order']['status'] == "Completed") {?>
                                Оплата завершена
                                <?php } elseif ($_smarty_tpl->tpl_vars['providerSale']->value['order']['status'] == "Authorized") {?>
                                    Ожидание перевода
                                    <?php } elseif ($_smarty_tpl->tpl_vars['providerSale']->value['order']['status'] == '') {?>
                                        Ошибка
                        <?php }?>
                        </span>
                        </span>
                        <span class="order-status"> Тип доставки: <?php echo $_smarty_tpl->tpl_vars['providerSale']->value['order']['delivery_method'];?>

                        </span>

                        <h5 class="products-header">Товары:</h5>
                        <div class="products-provider-statistics">
                            
                                
                                <div class="col-lg-4 catalog-item-shop">
                                <div class="card-wrapper d-flex align-items-center flex-column" data-item-id="<?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['id'];?>
">
                                    <div class="img-card-wrapper">
                                        <img class="img-card-item img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['image_images'];?>
">
                                        <a class="img-link" href="/katalog/<?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['pageurl'];?>
/">Просмотр</a>
                                    </div>
                                    <div class="card-text-content d-flex align-items-center flex-column">
                                            <a class="product-title"><?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['title'];?>
</a>
                                            <p class="price"><span class="asted-price">Продано за <?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['price'];?>
</span> BYN</p>
                                            
                                        <div class="row">
                                            <a class="card-button" href="/katalog/<?php echo $_smarty_tpl->tpl_vars['providerSale']->value['product']['pageurl'];?>
/">Просмотр</a>
                                                                                    </div>
                                    </div>
                                </div>
                                </div>

                                <div class="review">
                                    <h5>Отзыв</h5>
                                    <div class="review-grade">
                                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                                    </div>
                                    <div class="review-block">

                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium incidunt amet ratione architecto tempora nam aliquid doloribus non quia recusandae?
                                    </div>
                                </div>
                                
                                
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
            </div>
    
        </section>
        <?php } else { ?>
            <h1>Доступ запрещён</h1>
        <?php }
}
}
