<?php
/* Smarty version 3.1.45, created on 2024-07-18 18:56:53
  from '/home/worldbel/public_html/asted_themes/marketplace/main.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_66993b45349587_62913254',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1fadf206d736998834a7ad4716f62410417818f' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/main.acws',
      1 => 1721318212,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.acws' => 1,
    'file:footer.acws' => 1,
  ),
),false)) {
function content_66993b45349587_62913254 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<!-- =========================
        Slider Section
    ============================== -->
	<section id="main-slider-section">
    <?php echo smarty_function_slider(array('id'=>"18",'style'=>"main"),$_smarty_tpl);?>

	</section>

	<!-- =========================
        Service Section
    ============================== -->
	<section class="wd-service">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-md-12 col-lg-4 col-xl-4 wow fadeIn animated" data-wow-delay="0.2s">
					<ul class="list-unstyled">
						<li class="media">
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok1izobrazhenie']->value;?>
" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1">
								<?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok1']->value;?>
 
								</h5>
								<p><?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok1tekst']->value;?>
 </p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-4 col-xl-4 wow fadeIn animated" data-wow-delay="0.4s">
					<ul class="list-unstyled">
						<li class="media">
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok2izobrazhenie']->value;?>
" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1"><?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok2zagolovok']->value;?>
 </h5>
								<p><?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok2tekst']->value;?>
 </p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-4 col-xl-4 wow fadeIn animated" data-wow-delay="0.6s">
					<ul class="list-unstyled">
						<li class="media">
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok3izobrazhenie']->value;?>
" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1">
								<?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok3zagolovok']->value;?>
 
								</h5>
								<p><?php echo $_smarty_tpl->tpl_vars['BLOCKP1prodayuschiyblok3tekst']->value;?>
 </p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</section>



	
	<!-- =========================
        Recent-Product Section
    ============================== -->
	<section id="recent-product" class="recent-pro-2">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="recent-product-title">Последние товары</h2>
				</div>
                <?php echo smarty_function_catalog(array('type'=>"new",'style'=>"mainnew"),$_smarty_tpl);?>
 
			</div>
		</div>
	</section>


    <!-- =========================
        Big Message Section
    ============================== -->
	<section id="big-message">
    <div class="container-fluid custom-width">
        <div class="row row-space">
            <div class="col-12 col-md-12 col-lg-4 wow fadeInLeft animated" data-wow-delay="300ms">
                <div class="message-box">
                    <h2 class="message-title"><?php echo $_smarty_tpl->tpl_vars['BLOCKP1partnerskiyblokzagolovok']->value;?>
</h2>
                    <div class="big-section-image-container">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1partnerskiybloklevoeizobrazhenie']->value;?>
" class="img-fluid same-size-image" alt="message-bar-chart" />
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7 wow fadeInRight animated" data-wow-delay="300ms">
                <div class="message-box">
                    <p class="message-title"><?php echo $_smarty_tpl->tpl_vars['BLOCKP1partnerskiybloktekst']->value;?>
</p>
                    <div class="big-section-image-container">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1partnerskiyblokpravoeizobrazhenie']->value;?>
" class="img-fluid same-size-image" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



	<!-- =========================
        Blog Section
    ============================== -->
	<section id="wd-news">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-md-12 text-center">
				<a href="/news/">	<h2 class="news-title">Новости</h2> </a>
				</div>
				<?php echo smarty_function_news(array('forsection'=>"8",'style'=>"indexmain"),$_smarty_tpl);?>

			</div>
		</div>
	</section>

	<!-- =========================
        Call To Action Section
    ============================== -->
	<section id="call-to-action" class="wow fadeInUp animated" data-wow-delay="0ms">
		<div class="container-fluid custom-width">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-6">
					<h2 class="call-to-action-message">Наши партнеры</h2>
				</div>
			</div>
		</div>
	</section>

	<!-- =========================
       Partner Section
    ============================== -->
	<section id="partner" class="text-center">
		<div class="container-fluid custom-width bg-white">
			<div class="row d-flex justify-content-between">
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="0ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo1']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="300ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo2']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="600ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo3']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="900ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo4']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="1200ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo5']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="1400ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['BLOCKP1izo6']->value;?>
" class="figure-img img-fluid" alt="partner-img" />
				</div>
			</div>
		</div>
	</section>
<?php $_smarty_tpl->_subTemplateRender("file:footer.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
