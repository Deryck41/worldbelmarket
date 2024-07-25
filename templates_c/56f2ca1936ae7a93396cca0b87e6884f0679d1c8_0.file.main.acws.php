<?php
/* Smarty version 3.1.45, created on 2024-02-05 02:44:04
  from '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/main.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c02144e8a497_81141091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '56f2ca1936ae7a93396cca0b87e6884f0679d1c8' => 
    array (
      0 => '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/main.acws',
      1 => 1707090243,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.acws' => 1,
    'file:footer.acws' => 1,
  ),
),false)) {
function content_65c02144e8a497_81141091 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
	<!-- =========================
        Slider Section
    ============================== -->
	<section id="main-slider-section">
		<div id="main-slider" class="slider-bg2 owl-carousel owl-theme product-review slider-cat">
			<div class="item d-flex slider-bg align-items-center">
				<div class="container-fluid">
					<div class="row justify-content-end">
						<div class="slider-text flex-block order-2 order-sm-1 col-sm-6 col-xl-4 col-md-6">
							<h6 class="sub-title">Широкий выбор товаров</h6>
							<h1 class="slider-title">
								<strong class="highlights-text">Беларусский Маркетплейс</strong>
							</h1>

							<a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
								Перейти к покупкам<i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-6 col-md-6 order-1 order-sm-2 col-xl-6 slider-img">
							<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/bg/slide1.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
			<div class="item d-flex slider-bg align-items-center">
				<div class="container-fluid">
					<div class="row justify-content-end">
						<div class="slider-text flex-block order-2 order-sm-1 col-sm-6 col-xl-4 col-md-6">
							<h6 class="sub-title">Широкий выбор товаров</h6>
							<h1 class="slider-title">
								<strong class="highlights-text">Беларусский Маркетплейс</strong>
							</h1>

							<a href="shop-left-sidebar.html" class="btn btn-primary wd-shop-btn slider-btn">
								Перейти к покупкам<i class="fa fa-arrow-right" aria-hidden="true"></i>
							</a>
						</div>
						<div class="col-sm-6 col-md-6 order-1 order-sm-2 col-xl-6 slider-img">
							<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/bg/slide2.jpg" alt="" />
						</div>
					</div>
				</div>
			</div>
		</div>
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
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/ico/1.png" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1">
									Доставка в любую точку Беларуси
								</h5>
								<p>Заказывайте товары прямо к себе домой</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-4 col-xl-4 wow fadeIn animated" data-wow-delay="0.4s">
					<ul class="list-unstyled">
						<li class="media">
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/ico/22.png" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1">Оплата частями</h5>
								<p>Покупайте больше сейчас – платите частями</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-12 col-lg-4 col-xl-4 wow fadeIn animated" data-wow-delay="0.6s">
					<ul class="list-unstyled">
						<li class="media">
							<img class="d-flex mr-3 icon-small" src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/ico/3.png" alt="compare-icon" />
							<div class="media-body">
								<h5 class="wd-service-title mt-0 mb-1">
									Подарочные сертификаты
								</h5>
								<p>Подарите сертификаты вашим близким</p>
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
        <div class="row">
            <div class="col-12 col-md-12 col-lg-4 wow fadeInLeft animated" data-wow-delay="300ms">
                <div class="message-box">
                    <div class="message-title">
                        Подключайтесь в нашу партнерскую сеть
                        <strong>Маркетплейса</strong>
                    </div>
                    <div class="message-content">
                        Продавайте свои товары на нашем маркетплейсе на выгодных для вас
                        условиях!
                    </div>
                </div>
                <div class="message-bar-chart">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/33.jpg" class="img-fluid" alt="message-bar-chart" />
                </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-12 col-md-12 col-lg-7 wow fadeInRight animated" data-wow-delay="300ms">
                <div class="big-message-img">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/44.jpg" class="img-fluid" alt="" />
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
					<h2 class="news-title">Новости</h2>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="300ms">
					<div class="wd-news-box">
						<figure class="figure">
							<figcaption></figcaption>
							<div class="news-img-wrapper">
								<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/blog/1.jpg" class="figure-img img-fluid rounded" alt="news-img" />
							</div>
							<div class="wd-news-info">
								<div class="figure-caption">
									<a href="single-blog-with.html">Открытие первого Белорусского MarketPlace</a>
								</div>
								<div class="news-wrapper">
									<p class="wd-news-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
										Perspiciatis esse eligendi consectetur dicta minus placeat
										natus tempora dignissim
									</p>
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Читать больше
									<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</div>
							<span class="angle-right-to-left"></span>
						</figure>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="600ms">
					<div class="wd-news-box">
						<figure class="figure">
							<figcaption></figcaption>
							<div class="news-img-wrapper">
								<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/blog/2.png" class="figure-img img-fluid rounded" alt="news-img" />
							</div>
							<div class="wd-news-info">
								<div class="figure-caption">
									<a href="single-blog-with.html">Открытие первого Белорусского MarketPlace</a>
								</div>
								<div class="news-wrapper">
									<p class="wd-news-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
										Perspiciatis esse eligendi consectetur dicta minus placeat
										natus tempora dignissim
									</p>
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Читать больше
									<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</div>
							<span class="angle-left-to-right"></span>
						</figure>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="300ms">
					<div class="wd-news-box">
						<figure class="figure">
							<figcaption></figcaption>
							<div class="news-img-wrapper">
								<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/blog/4.jpg" class="figure-img img-fluid rounded" alt="news-img" />
							</div>
							<div class="wd-news-info">
								<div class="figure-caption">
									<a href="single-blog-with.html">Открытие первого Белорусского MarketPlace</a>
								</div>
								<div class="news-wrapper">
									<p class="wd-news-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
										Perspiciatis esse eligendi consectetur dicta minus placeat
										natus tempora dignissim
									</p>
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Читать больше
									<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</div>
							<span class="angle-right-to-left"></span>
						</figure>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-3 wow fadeIn animated" data-wow-delay="600ms">
					<div class="wd-news-box">
						<figure class="figure">
							<figcaption></figcaption>
							<div class="news-img-wrapper">
								<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/blog/5.jpg" class="figure-img img-fluid rounded" alt="news-img" />
							</div>
							<div class="wd-news-info">
								<div class="figure-caption">
									<a href="single-blog-with.html">Открытие первого Белорусского MarketPlace</a>
								</div>
								<div class="news-wrapper">
									<p class="wd-news-content">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit.
										Perspiciatis esse eligendi consectetur dicta minus placeat
										natus tempora dignissim
									</p>
								</div>
								<a href="single-blog-with.html" class="badge badge-light wd-news-more-btn">Читать больше
									<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
							</div>
							<span class="angle-left-to-right"></span>
						</figure>
					</div>
				</div>
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
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/samsung.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="300ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/apple.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="600ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/xiaomi.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="900ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/philips.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="1200ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/huawei.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
				<div class="col-6 col-md-6 col-lg-4 col-xl-2 wow fadeIn animated partner-wrapper" data-wow-delay="1400ms">
					<img src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
img/partner/sony.png" class="figure-img img-fluid" alt="partner-img" />
				</div>
			</div>
		</div>
	</section>
<?php $_smarty_tpl->_subTemplateRender("file:footer.acws", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
