<?php
/* Smarty version 3.1.45, created on 2024-02-05 09:58:11
  from '/sites/worldbelmarket.by/asted_themes/marketplace/parts/katalog-odezhdy-i-obuvi.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c0b133c25aa2_88100461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f5274419f3fba2e42e02344159e355770bf7c5a2' => 
    array (
      0 => '/sites/worldbelmarket.by/asted_themes/marketplace/parts/katalog-odezhdy-i-obuvi.acws',
      1 => 1707126706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c0b133c25aa2_88100461 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div class="col-12 col-md-8 col-lg-9 product-grid">
            <div class="row">

                <div class="tab-content col-12">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row gap-vertical">

                        <?php echo smarty_function_catalog(array('forcatalog'=>"3",'style'=>"catalog"),$_smarty_tpl);?>
 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3">
            <!-- =========================
Search Option
============================== -->
            <div class="sidebar-search">
                <div class="input-group wd-btn-group col-12 p0">
                    <input type="text" class="form-control" placeholder="Искать ..." aria-label="Search for..." />
                    <span class="input-group-btn">
                        <button class="btn btn-secondary wd-btn-search" type="button">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </span>
                </div>
            </div>

            <!-- =========================
                Category Option
                ============================== -->
            <div class="side-bar category category-md">
                <h5 class="title">Фильтрация (в разработке)</h5>
                <ul class="dropdown-list-menu">



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
    </div>
</div>
</section><?php }
}
