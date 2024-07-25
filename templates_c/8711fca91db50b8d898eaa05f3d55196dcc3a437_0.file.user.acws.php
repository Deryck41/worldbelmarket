<?php
/* Smarty version 3.1.45, created on 2024-07-08 15:14:35
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/user.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_668bd82bdaca06_93315611',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8711fca91db50b8d898eaa05f3d55196dcc3a437' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/user.acws',
      1 => 1720440874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_668bd82bdaca06_93315611 (Smarty_Internal_Template $_smarty_tpl) {
?><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<?php if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true) {?>

    <section>

        <div class="container">
            <h1 class="profile-title mt-5 mb-2">Профиль</h1>
            <?php echo smarty_function_menu(array('style'=>"user-menu"),$_smarty_tpl);?>

            <div class="row mt-3 mb-3 gap-vertical-card">
                <div class="col-lg-4">
                    <div class="user-card-item">
                        <a href="/user-detail">
                            <div class="user-card-elements">

                                <div class="user-card-icon">
                                    <p><?php echo $_smarty_tpl->tpl_vars['avatarString']->value;?>
</p>
                                </div>
                                <div>
                                    <ul class="user-nte">

                                        <li><?php echo $_smarty_tpl->tpl_vars['uName']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['uSurName']->value;?>
</li>
                                        <li><?php if ($_smarty_tpl->tpl_vars['uPhone']->value == null) {?>Телефон не указан<?php } else {
echo $_smarty_tpl->tpl_vars['uPhone']->value;
}?></li>
                                        <li><?php echo $_smarty_tpl->tpl_vars['uEmail']->value;?>
</li>
                                    </ul>
                                </div>
                                <div class="bell-icon">

                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                        <path
                                            d="M224 0c-17.7 0-32 14.3-32 32V49.9C119.5 61.4 64 124.2 64 200v33.4c0 45.4-15.5 89.5-43.8 124.9L5.3 377c-5.8 7.2-6.9 17.1-2.9 25.4S14.8 416 24 416H424c9.2 0 17.6-5.3 21.6-13.6s2.9-18.2-2.9-25.4l-14.9-18.6C399.5 322.9 384 278.8 384 233.4V200c0-75.8-55.5-138.6-128-150.1V32c0-17.7-14.3-32-32-32zm0 96h8c57.4 0 104 46.6 104 104v33.4c0 47.9 13.9 94.6 39.7 134.6H72.3C98.1 328 112 281.3 112 233.4V200c0-57.4 46.6-104 104-104h8zm64 352H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7s18.7-28.3 18.7-45.3z" />
                                    </svg>

                                </div>
                            </div>
                        </a>
                        <div class="exit-user-button"><a href="/logout.php">Выйти</a></div>
                    </div>
                </div>
                                <?php if ($_smarty_tpl->tpl_vars['uType']->value == 'user') {?>
                <div class="col-lg-4">
                    <a href="/user-orders">
                        <div class="user-card-item promotion-card">
                            <div class="user-card-elements-column">
                                <div>
                                    <ul class="user-promotion">
                                        <li>Заказы <span class="user-orders-count"><?php echo $_smarty_tpl->tpl_vars['uItemsCount']->value;?>
</span></li>
                                                                            </ul>
                                </div>
                                <div class="user-promotion-text">
                                    <ul class="user-promotion-text-list">
                                        <li>Ваши заказы</li>

                                        <li>
                                                                                                                                </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['uType']->value == 'provider') {?>
                    <div class="col-lg-4">
                        <a href="/provider-statistics">
                            <div class="user-card-item promotion-card">
                                <div class="user-card-elements-column">
                                    <div>
                                        <ul class="user-promotion">
                                            <li class="detail-card-header">Статистика товаров <i class="fa-solid fa-chart-simple"></i></li>
                                                                                    </ul>
                                    </div>
                                    <div class="user-promotion-text">
                                        <ul class="user-promotion-text-list">
                                            <li></li>
    
                                            <li>
                                                                                                                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['uType']->value == 'provider') {?>
                    <div class="col-lg-4">
                        <div class="user-card-item">
                            <a href="/provider-products">
                                <div class="user-gifts-wrapper">
                                    <p class="detail-card-header">Товары <i class="fa-solid fa-shop"></i></p>
                                    <div class="gifts-wrapper">
                                        <p>Перейти к товарам</p>
                                        
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['uType']->value == 'user') {?>
                    <div class="col-lg-4">
                        <div class="user-card-item">
                            <a href="/cart">
                                <div class="user-gifts-wrapper">
                                    <p>Корзина</p>
                                    <div class="gifts-wrapper">
                                        <p>Доступно к покупке <span class="cartCount"></span></p>
                                                                            </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </section>

    <?php echo '<script'; ?>
>
        document.body.onload = () => {
            document.querySelector('.cartCount').innerText = document.querySelector('.asted-cart__cart-info').innerText;
        }
    <?php echo '</script'; ?>
>


<?php } else { ?>
    <h1>Вы не вошли</h1>
<?php }
}
}
