<?php
/* Smarty version 3.1.45, created on 2024-07-23 16:37:40
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-new-product.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_669fb22445b850_64358286',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '476bd852453dd886ccf891037830496727977a3b' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/provider-new-product.acws',
      1 => 1721741859,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669fb22445b850_64358286 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true && $_smarty_tpl->tpl_vars['uType']->value == 'provider') {?>
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
<link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
  <?php echo '<script'; ?>
 src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
/css/create-product-page.css">
<section class="product-details">
    <div class="container" style="padding: 50px 0">
        <div class="row">

            <div class="col-12 product-details-section">
                <!-- ====================================
				        Product Details Gallery Section
				    ========================================= -->
                <div class="row new-product-form">
                    <div class="product-gallery col-12 col-md-12 col-lg-6 center-flex">
                        <!-- ====================================
						        Single Product Gallery Section
						    ========================================= -->
                                                <img src="" alt=" " class="preview-image">
                        <div class="additional-imgs">
                            <img src="" alt=" ">
                            <img src="" alt=" ">
                            <img src="" alt=" ">
                            <img src="" alt=" ">
                        </div>
                        <label class="btn btn-primary wd-shop-btn upload-image-button" for="product-new-image">Загрузите
                            изображение</label>
                        <input type="file" id="product-new-image" multiple="multiple" class="upload-image-input" accept="image/*" />
                                                                    </div>
                    <div class="col-6 col-12 col-md-12 col-lg-6">
                        <div class="product-details-gallery">
                            <div class="list-group">
                                <h4 class="list-group-item-heading product-title title-warnParent">
                                    <div class="row price-row">
                                        <input type="text" class="product-title" placeholder="Название товара">
                                        
                                    </div>
                                    <?php echo smarty_function_stores(array('style'=>"stores"),$_smarty_tpl);?>

                                </h4>
                                
                              <span class="weight">
                                <div class="mdc-slider">
                                <input class="mdc-slider__input" type="range" min="1" max="1000" value="1" name="volume" aria-label="Continuous slider demo">
                                <div class="mdc-slider__track">
                                    <div class="mdc-slider__track--inactive"></div>
                                    <div class="mdc-slider__track--active">
                                    <div class="mdc-slider__track--active_fill"></div>
                                    </div>
                                </div>
                                <div class="mdc-slider__thumb">
                                    <div class="mdc-slider__thumb-knob"></div>
                                </div>
                                </div>
                                
                                <input type="number" class="weight-value" />
                                 Кг
                              </span>
                              
                              
                                <div class="media">

                                    <div class="media-body flex-col price-warnParent">
                                        <p>
                                        <div class="row price-row"><input type="text" placeholder="Цена"
                                                class="product-price"> BYN</div>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="product-store row">
                            <div class="input-group flex-col">
                                <textarea class="description-product" name="" id=""></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary wd-shop-btn new-product-button">Подтвердить</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php echo '<script'; ?>
 type="module" src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/create-product.js"><?php echo '</script'; ?>
>
<?php } else { ?>
    <h1>Доступ запрещён</h1>
<?php }
}
}
