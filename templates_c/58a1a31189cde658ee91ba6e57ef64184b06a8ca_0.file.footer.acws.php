<?php
/* Smarty version 3.1.45, created on 2024-06-28 16:49:43
  from '/home/worldbel/public_html/asted_themes/marketplace/footer.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_667ebf77efcee2_39314193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58a1a31189cde658ee91ba6e57ef64184b06a8ca' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/footer.acws',
      1 => 1719582576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667ebf77efcee2_39314193 (Smarty_Internal_Template $_smarty_tpl) {
?>
	<!-- =========================
        Footer Section
    ============================== -->
	<footer class="footer wow fadeInUp animated" data-wow-delay="900ms">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-md-12 col-lg-3 mobile-80">
					<!-- ===========================
    						Footer About
    					 =========================== -->
					<div class="footer-about">
						<a href="/" class="footer-about-logo">
							<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKPlogotippodval']->value;?>
" style="
							max-width: 200px;
						" alt="Logo" />
						</a>
						<div class="footer-description">
							<!-- <p>Можете найти нас</p> -->
						</div>
						<div class="wb-social-media">
							<a href="#"><i class="fa fa-brands fa-vk"></i></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['BLOCKPssylkanainstagramm']->value;?>
"><i class="fa fa-brands fa-instagram"></i></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['BLOCKPssylkanafeysbuk']->value;?>
"><i class="fa fa-brands fa-facebook"></i></a>
							<a href="<?php echo $_smarty_tpl->tpl_vars['BLOCKPtg']->value;?>
"><i class="fa fa-brands fa-telegram"></i></a>
							<a href="#"><i class="fa fa-brands fa-youtube"></i></a>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-2 col-lg-2 footer-nav">
					<!-- ===========================
    						Festival Deals
    					 =========================== -->
					<h6 class="footer-subtitle">Меню</h6>
					<?php echo smarty_function_menu(array('forsection'=>"2",'style'=>"main-footer"),$_smarty_tpl);?>

				</div>
				<div class="col-6 col-md-2 col-lg-2 footer-nav">
					<!-- ===========================
    						Top Stores
    					 =========================== -->
					<div class="stores-list">
						<h6 class="footer-subtitle">Навигация</h6>
						<ul>
						<?php echo smarty_function_menu(array('forsection'=>'9','style'=>"footer"),$_smarty_tpl);?>

						</ul>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2">
					<div class="app-wrapper footer-col">
                    <?php echo $_smarty_tpl->tpl_vars['BLOCKPfuter']->value;?>

						
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-2">
					<div class="app-wrapper footer-col">
						<div class="qr-icon">
							<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/qr.png" />
						</div>
						<p>Наведите камеру и скачайте приложение</p>
						<div class="app-icons">
							<div class="app-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/apple.png" /></div>
							<div class="app-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/play.png" /></div>
							<div class="app-icon"><img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/huawei.png" /></div>
						</div>
					</div>
				</div>
			</div>
			<p style="width: 100%; text-align: center; color: white; padding: 40px 0;"><?php echo $_smarty_tpl->tpl_vars['BLOCKPkontakty']->value;?>
</p>
			<div class="mt-2 d-flex justify-content-center">
			
			<img class="w-50 mt-2 d-flex justify-content-center" src="/asted/uploads/eripwbm.png">
			</div>
		</div>
	</footer>

	
	<!-- =========================
    	Main Loding JS Script
    ============================== -->      
    <?php if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true) {
echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/userModal.js"><?php echo '</script'; ?>
><?php }?>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/search.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery-ui.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/popper.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.counterup.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.nav.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/custom.js"><?php echo '</script'; ?>
>
	<!-- <?php echo '<script'; ?>
 src="js/jquery.nicescroll.js"><?php echo '</script'; ?>
> -->
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.rateyo.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.scrollUp.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/jquery.sticky.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/mobile.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/lightslider.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/owl.carousel.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/circle-progress.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/waypoints.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/simplePlayer.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/main.js?v2"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/languages.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://translate.google.com/translate_a/element.js?cb=TranslateInit"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 async src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/signInDialog.js" type="module"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/asted-cart/asted-cart.js" type="module"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/asted-cart/asted-cart-page.js" type="module"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/asted-cart/asted-shop.js" type="module"><?php echo '</script'; ?>
>
</body>

</html><?php }
}
