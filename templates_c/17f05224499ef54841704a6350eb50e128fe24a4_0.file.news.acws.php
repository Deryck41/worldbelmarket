<?php
/* Smarty version 3.1.45, created on 2024-02-10 16:04:24
  from '/sites/worldbelmarket.by/asted_themes/marketplace/parts/news.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c79e88aa3359_86791755',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17f05224499ef54841704a6350eb50e128fe24a4' => 
    array (
      0 => '/sites/worldbelmarket.by/asted_themes/marketplace/parts/news.acws',
      1 => 1707137882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c79e88aa3359_86791755 (Smarty_Internal_Template $_smarty_tpl) {
?><section id="wd-news">
<div class="container-fluid custom-width">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="news-title">Новости</h2>
        </div>
        <?php echo smarty_function_news(array('forsection'=>"8",'style'=>"indexmain"),$_smarty_tpl);?>

        <?php echo smarty_function_catalog(array('forcatalog'=>"7",'style'=>"catalog"),$_smarty_tpl);?>
 
    </div>
</div>
</section><?php }
}
