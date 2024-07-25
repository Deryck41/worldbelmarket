<?php
/* Smarty version 3.1.45, created on 2024-07-11 17:57:30
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-products.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_668ff2dac8cc30_53440416',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dedf7988b1e7a3baae821e141a563645f0f51919' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-products.acws',
      1 => 1720709848,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668ff2dac8cc30_53440416 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true && $_smarty_tpl->tpl_vars['uType']->value == 'provider') {?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<section class="product-details wishlist-table">
      <div class="container">
        <div class="row compare-products">
          <div class="col-12 p0">
            <div id="no-more-tables" style="height: 70vh;overflow-y: scroll;">
              <table class="col-md-12 p0 table table-responsive">
                <thead>
                  <tr class="wishlist-table-title">
                    <th class="text-center">Название</th>
                    <th class="text-center">Изображение</th>
                    <th class="text-center">Цена</th>
                    <th class="text-center">Статус</th>
                    <th class="text-center">Подробности</th>
                  </tr>
                </thead>
                <tbody>
                  <?php echo smarty_function_providerlist(array('style'=>"provider_list"),$_smarty_tpl);?>

                </tbody>
              </table>
            </div>
            
          </div>
          
        </div>
        <div class="container center-flex section-add-product">
        <a href="/provider-new-product"><button class="btn btn-primary wd-shop-btn">Добавить товар</button></a>
        </div>
      </div>
      
    </section>
    <?php } else { ?>
        <h1>Доступ запрещён</h1>
    <?php }
}
}
