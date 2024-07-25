<?php
/* Smarty version 3.1.45, created on 2024-06-12 21:12:47
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/katalog-proizvodstvenogo-oborudovaniya.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_6669e51fe46f29_34084194',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6ba2331e43fce83f882ef6e164ec366e4cdb894' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/katalog-proizvodstvenogo-oborudovaniya.acws',
      1 => 1718188233,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6669e51fe46f29_34084194 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="product-amazon" class="product-shop-page product-shop-full-grid">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/han.png" alt="" />
                </div>
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/pirl.png" alt="" />
                </div>
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/good.png" alt="" />
                </div>
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/mich.png" alt="" />
                </div>
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/cooper.png" alt="" />
                </div>
                <div class="col-4 col-md-2 client-img">
                    <img class="figure-img img-fluid" src="img/partner/shina/bel.png" alt="" />
                </div>
            </div>
        </div>
        <div class="col-12 p0">
            <div class="page-location">
                <ul>
                    <li>
                        <a href="#"> Главная <span class="divider">/</span> </a>
                    </li>
                    <li>
                        <a class="page-location-active" href="#">
                            <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>

                            <span class="divider">/</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <div class="col-12 col-md-4 col-lg-3 katalog-view">
            <!-- =========================
Search Option
============================== -->
             

            <!-- =========================
                Category Option
                ============================== -->
                <div class="side-bar category category-md">
                <h5 class="title">Фильтры</h5>
                <div class="side-bar tags-box">
                <h5 class="title">Категория</h5>
                <?php echo smarty_function_category(array('style'=>"select-category",'type'=>"category",'forcatalog'=>"4"),$_smarty_tpl);?>

            </div>



            <!-- =========================
                Tags Box Option
                ============================== -->
            <!-- <div class="side-bar tags-box">
                <h5 class="title">Tags</h5>
                <ul>
                    <li><a href="#">Comerce </a></li>
                    <li><a href="#">Trending</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">market</a></li>
                    <li><a href="#">mobile</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Comerce </a></li>
                    <li><a href="#">Trending</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">market</a></li>
                    <li><a href="#">mobile</a></li>
                    <li><a href="#">Business</a></li>
                </ul>
            </div> -->

            <!-- =========================
                Color Box Option
                ============================== -->
       
        </div>
        <div class="col-12 col-md-8 col-lg-9 product-grid">
            <div class="row">

                <div class="tab-content col-12">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="row gap-vertical catalog-box" data-id="4">

                        <?php echo smarty_function_catalog(array('forcatalog'=>"4",'style'=>"catalog"),$_smarty_tpl);?>
 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</section>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/select-category.js"><?php echo '</script'; ?>
><?php }
}
