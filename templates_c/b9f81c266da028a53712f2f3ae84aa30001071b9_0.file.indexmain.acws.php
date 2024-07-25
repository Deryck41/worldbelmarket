<?php
/* Smarty version 3.1.45, created on 2024-02-06 11:32:53
  from '/sites/worldbelmarket.by/asted_themes/marketplace/components/news/indexmain.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c218e508b295_23770830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9f81c266da028a53712f2f3ae84aa30001071b9' => 
    array (
      0 => '/sites/worldbelmarket.by/asted_themes/marketplace/components/news/indexmain.acws',
      1 => 1707137428,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c218e508b295_23770830 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['newsArr']->value, 'news');
$_smarty_tpl->tpl_vars['news']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->do_else = false;
?>
    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="300ms">
    <div class="wd-news-box">
        <figure class="figure">
            <figcaption></figcaption>
            <div class="news-img-wrapper">
                <img src="<?php echo $_smarty_tpl->tpl_vars['news']->value['images'];?>
" class="figure-img img-fluid rounded" alt="news-img" />
            </div>
            <div class="wd-news-info">
                <div class="figure-caption">
                    <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['pageurl'];?>
/"><?php echo $_smarty_tpl->tpl_vars['news']->value['title'];?>
</a>
                </div>
                <div class="news-wrapper">
                    <p class="wd-news-content">
                    <?php echo $_smarty_tpl->tpl_vars['news']->value['content'];?>

                    </p>
                </div>
                <a href="/news/<?php echo $_smarty_tpl->tpl_vars['news']->value['pageurl'];?>
/" class="badge badge-light wd-news-more-btn">Читать больше
                    <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <span class="angle-right-to-left"></span>
        </figure>
    </div>
</div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
