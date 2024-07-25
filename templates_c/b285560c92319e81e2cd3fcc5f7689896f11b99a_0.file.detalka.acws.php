<?php
/* Smarty version 3.1.45, created on 2024-02-05 12:48:05
  from '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/components/catalog/detalka.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_65c0aed52742e0_10287261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b285560c92319e81e2cd3fcc5f7689896f11b99a' => 
    array (
      0 => '/Users/arturstrazhevich/Sites/marketplace.asted/asted_themes/marketplace/components/catalog/detalka.acws',
      1 => 1707126481,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c0aed52742e0_10287261 (Smarty_Internal_Template $_smarty_tpl) {
?>	<!-- =========================
        Product Details Section
    ============================== -->
	<section class="product-details">
		<div class="container">
			<div class="row">
				<div class="col-12 p0">
					<div class="page-location">
						<ul>
							<li><a href="#">
									Главная / Шины <span class="divider">/</span>
								</a></li>
							<li><a class="page-location-active" href="#">
							<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['title'];?>

									<span class="divider">/</span>
								</a></li>
						</ul>
					</div>
				</div>

				<style>
.lightSlider li img {
    object-fit: contain;
}
				</style>
				<div class="col-12 product-details-section">
					<!-- ====================================
				        Product Details Gallery Section
				    ========================================= -->
					<div class="row" data-item-id="<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['id'];?>
">
						<div class="product-gallery col-12 col-md-12 col-lg-6">
							<!-- ====================================
						        Single Product Gallery Section
						    ========================================= -->
							<div class="row">
								<div class="col-md-12 product-slier-details">
									<ul id="lightSlider">
									<?php $_smarty_tpl->_assignInScope('galery', explode(';',$_smarty_tpl->tpl_vars['catalogArr']->value['gallery_images']));?>
										<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['galery']->value, 'value', false, 'key');
$_smarty_tpl->tpl_vars['value']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->do_else = false;
?>
											<li data-thumb="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
">
											<img class="figure-img img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" data-fancybox="gallery"
												data-caption="Caption #1" alt="product-img" />
											</li>
										<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-6 col-12 col-md-12 col-lg-6">
							<div class="product-details-gallery">
								<div class="list-group">
									<h4 class="list-group-item-heading product-title">
									<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['title'];?>

									</h4>
								
								</div>
							
							</div>
							<div class="product-store row">
								<div class="col-12 product-store-box">
									<div class="row">
										
										<div class="col-8 store-border-price text-center">
											<div class="price">
												<p><span class="asted-price"><?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['price'];?>
</span> BYN</p>
											</div>
										</div>
										<div class="col-4 store-border-button">
											<a target="_blank" class="btn btn-primary btn-add wd-shop-btn pull-right">
												Купить сейчас
											</a>
										</div>
									</div>
								</div>
							
						
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="wd-tab-section">
						<div class="bd-example bd-example-tabs">
							<ul class="nav nav-pills mb-3 wd-tab-menu" id="pills-tab" role="tablist">
								<li class="nav-item col-6 col-md">
									<a class="nav-link active" id="description-tab" data-toggle="pill" href="#description-section"
										role="tab" aria-controls="description-section" aria-expanded="true">Описание</a>
								</li>
								<li class="nav-item col-6 col-md">
									<a class="nav-link" id="full-specifiction-tab" data-toggle="pill" href="#full-specifiction" role="tab"
										aria-controls="full-specifiction" aria-expanded="false">Полная спецификация</a>
								</li>
								<li class="nav-item col-6 col-md">
									<a class="nav-link" id="reviews-tab" data-toggle="pill" href="#reviews" role="tab"
										aria-controls="reviews" aria-expanded="false">Отзывы</a>
								</li>
								<li class="nav-item col-6 col-md">
									<a class="nav-link" id="price-history-tab" data-toggle="pill" href="#price-history" role="tab"
										aria-controls="price-history" aria-expanded="false">История цен</a>
								</li>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade active show " id="description-section" role="tabpanel"
									aria-labelledby="description-tab" aria-expanded="true">
									<div class="product-tab-content">
									<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['content'];?>

									</div>

								
								</div>
								<div class="tab-pane fade" id="full-specifiction">
									<h6>Full Specifiction</h6>
									<p class="wd-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores id
										assumenda, ex ab voluptatem doloremque soluta magnam eum nihil iusto maiores! Libero nisi maior</p>

									<ul class="list-group wd-info-section">
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Brand Name : Asus</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>Release Date : 2018</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Google Play: Yes</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>Unlock Phones: Yes</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Talk Time: 4-6h</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>Battery Type: Not Detachable</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Size: 154.6x75.2x8.35mm</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>Display Resolution: 1920x1080</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Feature: Gravity Response,MP3 Playback,Touchscreen,GPS</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>Battery Capacity(mAh): 4000mAh</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Feature: Gravity Response,MP3 Playback,Touchscreen,GPS</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>CPU Manufacturer: Qualcomm</p>
											</div>
											<div class="col-1"></div>
										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>Feature: Gravity Response,MP3 Playback,Touchscreen,GPS</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>CPU: Octa Core</p>
											</div>
											<div class="col-1"></div>

										</li>
										<li class="list-group-item d-flex justify-content-between align-items-center p0">
											<div class="col-12 col-md-6 info-section">
												<p>ROM: 16G</p>
											</div>
											<div class="col-12 col-md-5 info-section">
												<p>SlotsDesign: Bar</p>
											</div>
											<div class="col-1"></div>
										</li>
									</ul>
								</div>
								<div class="tab-pane fadereviews-section" id="reviews">
									<div class="row">
										<div class="col-12">
											<p class="wd-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores id
												assumenda, ex ab voluptatem doloremque soluta magnam eum nihil iusto maiores! Libero nisi maior
											</p>

											<h6 class="review-rating-title">Average Ratings and Reviews</h6>
											<div class="row tab-rating-bar-section">
												<div class="col-8 col-md-4 col-lg-4">
													<img src="img/review-bg.png" alt="review-bg">
													<div class="review-rating text-center">
														<h1 class="rating">4.5</h1>
														<p>4 Ratings &amp;
															0 Reviews</p>
													</div>
												</div>
												<div class="col-12 col-md-3 rating-bar-section">
													<div class="media rating-star-area">
														<p>5 <i class="fa fa-star" aria-hidden="true"></i></p>
														<div class="media-body rating-bar">
															<div class="progress wd-progress">
																<div class="progress-bar wd-bg-green" role="progressbar" style="width: 100%"
																	aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
													<div class="media rating-star-area">
														<p>4 <i class="fa fa-star" aria-hidden="true"></i></p>
														<div class="media-body rating-bar">
															<div class="progress wd-progress">
																<div class="progress-bar wd-bg-green" role="progressbar" style="width: 75%"
																	aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
													<div class="media rating-star-area">
														<p>3 <i class="fa fa-star" aria-hidden="true"></i></p>
														<div class="media-body rating-bar">
															<div class="progress wd-progress">
																<div class="progress-bar wd-bg-green" role="progressbar" style="width: 50%"
																	aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
													<div class="media rating-star-area">
														<p>2 <i class="fa fa-star" aria-hidden="true"></i></p>
														<div class="media-body rating-bar">
															<div class="progress wd-progress">
																<div class="progress-bar wd-bg-yellow" role="progressbar" style="width: 35%"
																	aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
													<div class="media rating-star-area">
														<p>1 <i class="fa fa-star" aria-hidden="true"></i></p>
														<div class="media-body rating-bar">
															<div class="progress wd-progress">
																<div class="progress-bar wd-bg-red" role="progressbar" style="width: 25%"
																	aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<hr>

											<div class="reviews-market">
												<div class="reviews-title text-center">
													<h3>Ratings and Reviews From Market</h3>
													<hr>
												</div>
												<!-- 
												=================================
												Review Our Market
												=================================
											-->
												<div class="star-view-market">
													<div class="row">
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-yellow-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-yellow-4"></div><span class="rating-number">4</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-yellow-3"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-yellow-2"></div><span class="rating-number">2</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-yellow-1"></div><span class="rating-number">2</span>
																</div>
															</div>
														</div>
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">5.0</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-blue-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-blue-4"></div><span class="rating-number">4</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-blue-3"></div><span class="rating-number">2</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-blue-2"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-blue-1"></div><span class="rating-number">4</span>
																</div>
															</div>
														</div>
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-red-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-red-4"></div><span class="rating-number">2</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-red-3"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-red-2"></div><span class="rating-number">4</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-red-1"></div><span class="rating-number">5</span>
																</div>
															</div>
														</div>
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-green-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-green-4"></div><span class="rating-number">1</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-green-3"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-green-2"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-green-1"></div><span class="rating-number">2</span>
																</div>
															</div>
														</div>
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-dark-yellow-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-dark-yellow-4"></div><span class="rating-number">4</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-dark-yellow-3"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-dark-yellow-2"></div><span class="rating-number">2</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-dark-yellow-1"></div><span class="rating-number">3</span>
																</div>
															</div>
														</div>
														<div class="col-6 col-md-3 col-lg-2">
															<img src="img/client/reviews-star-img1.png" alt="client-img">
															<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5</span>
															<div class="rating-market-section">
																<div class="rating-star">
																	<div class="review-rating-light-yellow-5"></div><span class="rating-number">5</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-light-yellow-4"></div><span class="rating-number">4</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-light-yellow-3"></div><span class="rating-number">3</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-light-yellow-2"></div><span class="rating-number">2</span>
																</div>
																<div class="rating-star">
																	<div class="review-rating-light-yellow-1"></div><span class="rating-number">3</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<!-- 
												=================================
												Review Our Product
												=================================
											-->
												<div class="review-our-product text-left row">
													<div class="col-12 col-lg-6 reviews-title">
														<h3>Review to our Blurb</h3>
													</div>

													<div class="col-12 col-lg-6 text-right display-none-md">
														<div class="filter">
															<div class="btn-group" role="group">
																<div class="d-flex">
																	<p>View as:</p>
																	<button id="btnGroupDropwdreview" type="button"
																		class="btn btn-secondary dropdown-toggle filter-btn" data-toggle="dropdown"
																		aria-haspopup="true" aria-expanded="false">
																		New
																	</button>
																	<div class="dropdown-menu" aria-labelledby="btnGroupDropwdreview"
																		style="position: absolute; transform: translate3d(50px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
																		<a class="dropdown-item" href="#">Camara</a>
																		<a class="dropdown-item" href="#">Joystick</a>
																	</div>
																</div>
															</div>
															<button type="button" class="btn btn-primary btn-sm add-review-btn">Add your
																review</button>
														</div>
													</div>

													<!-- =================================
													Review Client Section
													================================= -->

													<div class="col-12 review-our-product-area">
														<div class="row">
															<div class="col-12 col-md-6">
																<div class="row">
																	<div class="col-12">
																		<div class="media">
																			<div class="media-left media-middle">
																				<a href="#">
																					<img class="media-object" src="img/client/client-img-1.png" alt="client-img">
																				</a>
																			</div>
																			<div class="media-body">
																				<h4 class="media-heading client-title">Robert Strud</h4>
																				<div class="client-subtitle">Affiliate at <a href="#">Market 1</a></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-12 col-md-6 review-date-time">
																<p class="review-date">November 17, 2016</p>
																<p class="review-time">at 11:52 pm</p>
															</div>
														</div>
														<div class="row">
															<div class="col-12"></div>
															<div class="col-6 col-md-4">
																<div class="rating-market-section">
																	<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5 <i
																			class="fa fa-star-o" aria-hidden="true"></i></span>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-5"></div><span class="rating-number">5</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-4"></div><span class="rating-number">4</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-3"></div><span class="rating-number">3</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-2"></div><span class="rating-number">2</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-1"></div><span class="rating-number">3</span>
																	</div>
																</div>
															</div>
															<div class="col-6 col-md-4">
																<div class="client-review-list">
																	<div class="media">
																		<div class="media-left media-middle">
																			<a href="#">
																				<img class="media-object" src="img/client/client-list-icon-1.png"
																					alt="client-img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h6 class="media-heading">Prons</h6>
																		</div>
																	</div>
																	<ul class="check-list">
																		<li><i class="fa fa-check" aria-hidden="true"></i> All</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Design</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Developing</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Metalic</li>
																	</ul>
																</div>
															</div>
															<div class="col-6 col-md-4">
																<div class="client-review-list">
																	<div class="media">
																		<div class="media-left media-middle">
																			<a href="#">
																				<img class="media-object" src="img/client/client-list-icon-2.png"
																					alt="client-img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h6 class="media-heading">Prons</h6>
																		</div>
																	</div>
																	<ul class="check-list icon-red">
																		<li><i class="fa fa-check" aria-hidden="true"></i> All</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Design</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Developing</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Metalic</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 review-our-product-area">
														<div class="row">
															<div class="col-12 col-md-6">
																<div class="row">
																	<div class="col-12">
																		<div class="media">
																			<div class="media-left media-middle">
																				<a href="#">
																					<img class="media-object" src="img/client/client-img-1.png" alt="client-img">
																				</a>
																			</div>
																			<div class="media-body">
																				<h4 class="media-heading client-title">Faisal Kanon</h4>
																				<div class="client-subtitle">Affiliate at <a href="#">Market 2</a></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col-12 col-md-6 review-date-time">
																<p class="review-date">November 17, 2016</p>
																<p class="review-time">at 11:52 pm</p>
															</div>
														</div>
														<div class="row">
															<div class="col-12"></div>
															<div class="col-6 col-md-4">
																<div class="rating-market-section">
																	<span class="badge badge-secondary wd-star-market-badge text-uppercase">4.5 <i
																			class="fa fa-star-o" aria-hidden="true"></i></span>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-5"></div><span class="rating-number">5</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-4"></div><span class="rating-number">4</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-3"></div><span class="rating-number">3</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-2"></div><span class="rating-number">2</span>
																	</div>
																	<div class="rating-star">
																		<div class="review-rating-light-yellow-1"></div><span class="rating-number">3</span>
																	</div>
																</div>
															</div>
															<div class="col-6 col-md-4">
																<div class="client-review-list">
																	<div class="media">
																		<div class="media-left media-middle">
																			<a href="#">
																				<img class="media-object" src="img/client/client-list-icon-1.png"
																					alt="client-img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h6 class="media-heading">Prons</h6>
																		</div>
																	</div>
																	<ul class="check-list">
																		<li><i class="fa fa-check" aria-hidden="true"></i> All</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Design</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Developing</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Metalic</li>
																	</ul>
																</div>
															</div>
															<div class="col-6 col-md-4">
																<div class="client-review-list">
																	<div class="media">
																		<div class="media-left media-middle">
																			<a href="#">
																				<img class="media-object" src="img/client/client-list-icon-2.png"
																					alt="client-img">
																			</a>
																		</div>
																		<div class="media-body">
																			<h6 class="media-heading">Prons</h6>
																		</div>
																	</div>
																	<ul class="check-list icon-red">
																		<li><i class="fa fa-check" aria-hidden="true"></i> All</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Design</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Developing</li>
																		<li><i class="fa fa-check" aria-hidden="true"></i> Metalic</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>

												<!-- 
												=================================
												Review Comment Section
												=================================
											-->
												<div class="review-comment-section">
													<div class="row">
														<div class="col-12 col-md-12 col-lg-12 col-xl-8">
															<div class="reviews-title leave-opinion">
																<h3>Leave your Opinion here</h3>
															</div>
															<form>
																<div class="row">
																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="first" class="color-black">Name *</label>
																			<input type="text" class="form-control" placeholder="" id="first">
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="last" class="color-black">Email *</label>
																			<input type="email" class="form-control" placeholder="" id="last">
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="last" class="color-green">Prons</label>
																			<textarea class="form-control col-md-12" id="exampleFormControlTextarea1"
																				placeholder="Write your Opinion here ... "></textarea>
																		</div>
																	</div>

																	<div class="col-md-6">
																		<div class="form-group">
																			<label for="exampleFormControlTextarea2" class="color-red">Cons</label>
																			<textarea class="form-control col-12" id="exampleFormControlTextarea2"
																				placeholder="Write your Opinion here ... "></textarea>
																		</div>
																	</div>

																	<div class="col-12 col-md-12 product-rating-area">
																		<div class="product-rating-ph">
																			<div class="rating-area">
																				<div class="d-flex justify-content-between">
																					<p>Camera</p>
																					<div class="rating">
																						<a href="#"><i class="fa fa-star cat-1" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-2" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-3" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-4" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-5" aria-hidden="true"></i></a>
																					</div>
																				</div>
																				<div class="rating-slider-1"></div>
																			</div>
																			<div class="rating-area">
																				<div class="d-flex justify-content-between">
																					<p>Video Quality</p>
																					<div class="rating">
																						<a href="#"><i class="fa fa-star cat-2-1" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-2-2" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-2-3" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-2-4" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-2-5" aria-hidden="true"></i></a>
																					</div>
																				</div>
																				<div class="rating-slider-2"></div>
																			</div>
																			<div class="rating-area">
																				<div class="d-flex justify-content-between">
																					<p>Box Quality</p>
																					<div class="rating">
																						<a href="#"><i class="fa fa-star cat-3-1" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-3-2" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-3-3" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-3-4" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-3-5" aria-hidden="true"></i></a>
																					</div>
																				</div>
																				<div class="rating-slider-3"></div>
																			</div>
																			<div class="rating-area">
																				<div class="d-flex justify-content-between">
																					<p>Video Quality</p>
																					<div class="rating">
																						<a href="#"><i class="fa fa-star cat-4-1" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-4-2" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-4-3" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-4-4" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-4-5" aria-hidden="true"></i></a>
																					</div>
																				</div>
																				<div class="rating-slider-4"></div>
																			</div>
																			<div class="rating-area">
																				<div class="d-flex justify-content-between">
																					<p>Box Quality</p>
																					<div class="rating">
																						<a href="#"><i class="fa fa-star cat-5-1" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-5-2" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-5-3" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-5-4" aria-hidden="true"></i></a>
																						<a href="#"><i class="fa fa-star cat-5-5" aria-hidden="true"></i></a>
																					</div>
																				</div>
																				<div class="rating-slider-5"></div>
																			</div>
																		</div>
																	</div>

																	<div class="col-md-12">
																		<button type="submit" class="btn btn-primary review-comment"><i class="fa fa-check"
																				aria-hidden="true"></i> Post Comment</button>
																	</div>
																</div>
															</form>
														</div>

														<div class="col-12 col-md-12 col-lg-12 col-xl-4 product-rating-area">
															<div class="product-rating-list product-rating-desktop">
																<div class="rating-area">
																	<div class="d-flex justify-content-between">
																		<p>Camera</p>
																		<div class="rating">
																			<a href="#"><i class="fa fa-star cat-1" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-2" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-3" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-4" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-5" aria-hidden="true"></i></a>
																		</div>
																	</div>
																	<div class="rating-slider-1"></div>
																</div>
																<div class="rating-area">
																	<div class="d-flex justify-content-between">
																		<p>Video Quality</p>
																		<div class="rating">
																			<a href="#"><i class="fa fa-star cat-2-1" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-2-2" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-2-3" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-2-4" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-2-5" aria-hidden="true"></i></a>
																		</div>
																	</div>
																	<div class="rating-slider-2"></div>
																</div>
																<div class="rating-area">
																	<div class="d-flex justify-content-between">
																		<p>Box Quality</p>
																		<div class="rating">
																			<a href="#"><i class="fa fa-star cat-3-1" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-3-2" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-3-3" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-3-4" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-3-5" aria-hidden="true"></i></a>
																		</div>
																	</div>
																	<div class="rating-slider-3"></div>
																</div>
																<div class="rating-area">
																	<div class="d-flex justify-content-between">
																		<p>Video Quality</p>
																		<div class="rating">
																			<a href="#"><i class="fa fa-star cat-4-1" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-4-2" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-4-3" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-4-4" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-4-5" aria-hidden="true"></i></a>
																		</div>
																	</div>
																	<div class="rating-slider-4"></div>
																</div>
																<div class="rating-area">
																	<div class="d-flex justify-content-between">
																		<p>Box Quality</p>
																		<div class="rating">
																			<a href="#"><i class="fa fa-star cat-5-1" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-5-2" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-5-3" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-5-4" aria-hidden="true"></i></a>
																			<a href="#"><i class="fa fa-star cat-5-5" aria-hidden="true"></i></a>
																		</div>
																	</div>
																	<div class="rating-slider-5"></div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade specifiction-section" id="price-history">
									<div class="row">
										<div class="col-12 col-md-5">
											<h2 class="specifiction-title">Specifiction</h2>
											<ul class="list-group specifiction-list">
												<li class="list-group-item">Brand Name : <span>Asus</span></li>
												<li class="list-group-item">Google Play: <span>Yes</span></li>
												<li class="list-group-item">Talk Time: <span>4-6h</span></li>
												<li class="list-group-item">Size: <span>154.6x75.2x8.35mm</span></li>
												<li class="list-group-item">Feature: <span>Gravity Response,MP3 Playback,Touchscreen,GPS</span>
												</li>
												<li class="list-group-item">CPU: <span>Octa Core</span></li>
												<li class="list-group-item">ROM: <span>16G</span></li>
												<li class="list-group-item">Release Date : <span>2018</span></li>
												<li class="list-group-item">Unlock Phones: <span>Yes</span></li>
												<li class="list-group-item">Battery Type: <span>Not Detachable</span></li>
												<li class="list-group-item">Display Resolution: <span>1920x1080</span></li>
												<li class="list-group-item">Battery Capacity(mAh): <span>4000mAh</span></li>
												<li class="list-group-item">CPU Manufacturer: <span>Qualcomm</span></li>
												<li class="list-group-item">SlotsDesign: <span>Bar</span></li>
											</ul>
										</div>
										<div class="col-12 col-md-7 price-history-section">
											<h2 class="price-history-title">Price History</h2>
											<p class="price-history-subtitle">Percent Change In Price</p>
											<div class="col-12">
												<div class="row">
													<div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
														<div class="row price-box">
															<div class="col-5 col-lg-2 col-xl-5 p0">
																<div class="wd-since-month"><strong class="total-price">52%</strong></div>
															</div>
															<div class="col-7 col-lg-6 col-lg-7 p0">
																<div class="main-price">
																	<strong>52.06%</strong>
																	<p class="since-price">Since Last Month</p>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
														<div class="row price-box">
															<div class="col-5 col-lg-2 col-xl-5 p0">
																<div class="wd-since-day"><strong class="total-price">10%</strong></div>
															</div>
															<div class="col-7 col-lg-6 col-lg-7 p0">
																<div class="main-price">
																	<strong>20.31%</strong>
																	<p class="since-price">Last 10 Days</p>
																</div>
															</div>
														</div>
													</div>
													<div class="col-12 col-md-12 col-lg-12 col-xl-4 price-history-box">
														<div class="row price-box">
															<div class="col-5 col-lg-2 col-xl-5 p0">
																<div class="wd-since-year"><strong class="total-price">25%</strong></div>
															</div>
															<div class="col-7 col-lg-6 col-lg-7 p0">
																<div class="main-price">
																	<strong>25.26%</strong>
																	<p class="since-price">Since Last Month</p>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<div class="col-12 tab-chart-bord">
												<h2 class="tab-chart-bord-title">Price Change In Chart</h2>
												<ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
													<li class="nav-item">
														<a class="active" id="pills-amazon-tab" data-toggle="pill" href="#pills-amazon" role="tab"
															aria-controls="pills-amazon" aria-expanded="true">
															<i class="fa fa-circle" aria-hidden="true"></i><img src="img/client/tab-img-1.png" alt="">
														</a>
													</li>
													<li class="nav-item">
														<a id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
															aria-controls="pills-profile" aria-expanded="true">
															<i class="fa fa-circle" aria-hidden="true"></i><img src="img/client/tab-img-2.png" alt="">
														</a>
													</li>
													<li class="nav-item">
														<a id="pills-snapdeal-tab" data-toggle="pill" href="#pills-snapdeal" role="tab"
															aria-controls="pills-snapdeal" aria-expanded="true">
															<i class="fa fa-circle" aria-hidden="true"></i><img src="img/client/tab-img-3.png" alt="">
														</a>
													</li>
													<li class="nav-item">
														<a id="pills-ebay-tab" data-toggle="pill" href="#pills-ebay" role="tab"
															aria-controls="pills-ebay" aria-expanded="true">
															<i class="fa fa-circle" aria-hidden="true"></i><img src="img/client/tab-img-4.png" alt="">
														</a>
													</li>
												</ul>
												<div class="tab-content" id="pills-tabContent2">
													<div class="tab-pane fade show active" id="pills-amazon" role="tabpanel"
														aria-labelledby="pills-amazon-tab">
														<img class="img-fluid" src="img/client/chart-bord-1.png" alt="chart-bord">
													</div>
													<div class="tab-pane fade" id="pills-profile" role="tabpanel"
														aria-labelledby="pills-profile-tab">
														<img class="img-fluid" src="img/client/chart-bord-2.png" alt="chart-bord">
													</div>
													<div class="tab-pane fade" id="pills-snapdeal" role="tabpanel"
														aria-labelledby="pills-snapdeal-tab">
														<img class="img-fluid" src="img/client/chart-bord-3.png" alt="chart-bord">
													</div>
													<div class="tab-pane fade" id="pills-ebay" role="tabpanel" aria-labelledby="pills-ebay-tab">
														<img class="img-fluid" src="img/client/chart-bord-4.png" alt="chart-bord">
													</div>
												</div>
											</div>
										</div>
										<div class="col-12 related-articles">
											<h2 class="related-articles-title">Related Articles About this Product</h2>
											<div class="row">
												<div class="col-12 col-md-6">
													<ul class="list-unstyled">
														<li class="media">
															<img class="d-flex mr-3" src="img/articles/articles-img-1.png" alt="articles-img">
															<div class="media-body">
																<h5 class="mt-0 mb-1 articles-title">Steel device for DJ and radio</h5>
																<p class="articles-content col-8 p0">Comparison shopping engines collect product
																	information, including </p>
															</div>
														</li>
														<li class="media my-4">
															<img class="d-flex mr-3" src="img/articles/articles-img-2.png" alt="articles-img">
															<div class="media-body">
																<h5 class="mt-0 mb-1 articles-title">Steel device for DJ and radio</h5>
																<p class="articles-content col-8 p0">Comparison shopping engines collect product
																	information, including </p>
															</div>
														</li>
													</ul>
												</div>
												<div class="col-12 col-md-6">
													<ul class="list-unstyled">
														<li class="media">
															<img class="d-flex mr-3" src="img/articles/articles-img-3.png" alt="articles-img">
															<div class="media-body">
																<h5 class="mt-0 mb-1 articles-title">Steel device for DJ and radio</h5>
																<p class="articles-content col-8 p0">Comparison shopping engines collect product
																	information, including </p>
															</div>
														</li>
														<li class="media my-4">
															<img class="d-flex mr-3" src="img/articles/articles-img-4.png" alt="articles-img">
															<div class="media-body">
																<h5 class="mt-0 mb-1 articles-title">Steel device for DJ and radio</h5>
																<p class="articles-content col-8 p0">Comparison shopping engines collect product
																	information, including </p>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>
	</section><?php }
}
