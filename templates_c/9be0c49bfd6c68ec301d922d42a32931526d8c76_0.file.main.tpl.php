<?php
/* Smarty version 3.1.45, created on 2024-07-19 14:41:45
  from '/home/worldbel/public_html/asted_themes/marketplace/components/sliders/main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_669a50f941e1a0_49092500',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9be0c49bfd6c68ec301d922d42a32931526d8c76' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/sliders/main.tpl',
      1 => 1721389304,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_669a50f941e1a0_49092500 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="main-slider" data-autoplay="<?php echo $_smarty_tpl->tpl_vars['slider']->value['timer'];?>
" class="slider-bg2 owl-carousel owl-theme product-review slider-cat" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['BLOCKPizo1']->value;?>
')">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['slider']->value['slides'], 'slide');
$_smarty_tpl->tpl_vars['slide']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->do_else = false;
?>
    <div class="item d-flex slider-bg align-items-center">
        <div class="container-fluid">
            <div class="row justify-content-end">
                <div class="slider-text flex-block order-2 order-sm-1 col-sm-6 col-xl-4 col-md-6 center-block-main">
                    <h6 class="sub-title"><?php echo $_smarty_tpl->tpl_vars['slide']->value['1']['value'];?>
</h6>
                    <h1 class="slider-title">
                        <strong class="highlights-text"><?php echo $_smarty_tpl->tpl_vars['slide']->value['2']['value'];?>
</strong>
                    </h1>

                    <a href="<?php echo $_smarty_tpl->tpl_vars['slide']->value['3']['value'];?>
" class="btn btn-primary wd-shop-btn slider-btn">
                    <?php echo $_smarty_tpl->tpl_vars['slide']->value['3']['text'];?>
<i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="col-sm-6 col-md-6 order-1 order-sm-2 col-xl-6 slider-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['slide']->value['4']['value'];?>
" alt="" />
                </div>
            </div>
        </div>
    </div>
    
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
<?php }
}
