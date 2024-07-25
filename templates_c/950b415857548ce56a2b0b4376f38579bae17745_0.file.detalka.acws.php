<?php
/* Smarty version 3.1.45, created on 2024-06-06 13:08:56
  from '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/detalka.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_66618ab8c58cb8_02633707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '950b415857548ce56a2b0b4376f38579bae17745' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/catalog/detalka.acws',
      1 => 1717668533,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66618ab8c58cb8_02633707 (Smarty_Internal_Template $_smarty_tpl) {
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
                                        <img class="figure-img img-fluid" src="<?php if ($_smarty_tpl->tpl_vars['value']->value == null) {?>/asted/uploads/20240406030217_no.jpg<?php } else {
echo $_smarty_tpl->tpl_vars['value']->value;
}?>" data-fancybox="gallery"
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
								<?php if ($_smarty_tpl->tpl_vars['catalogArr']->value['harka'] != null) {?>
								<li class="nav-item col-6 col-md">
									<a class="nav-link" id="full-specifiction-tab" data-toggle="pill" href="#full-specifiction" role="tab"
										aria-controls="full-specifiction" aria-expanded="false">Характеристики</a>
								</li>
								<?php }?>
							</ul>
							<div class="tab-content" id="pills-tabContent">
								<div class="tab-pane fade active show " id="description-section" role="tabpanel"
									aria-labelledby="description-tab" aria-expanded="true">
									<div class="product-tab-content">
									<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['content'];?>

									</div>

								
								</div>
								<div class="tab-pane fade" id="full-specifiction">
									<?php echo $_smarty_tpl->tpl_vars['catalogArr']->value['harka'];?>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		</div>
	</section><?php }
}
