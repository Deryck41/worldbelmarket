<?php
/* Smarty version 3.1.45, created on 2024-04-30 15:34:11
  from '/home/worldbel/public_html/asted_themes/marketplace/components/menu/user-menu.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_6630e543792546_51924306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8a1e890494226deb3897906843be03c0ee36bd52' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/components/menu/user-menu.acws',
      1 => 1714480449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6630e543792546_51924306 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row mt-3">
				<div class="col-lg-12 p-0">
					<ul class="user-menu-list">
                        <li><a href="/user" class="<?php if ($_smarty_tpl->tpl_vars['URL']->value == "user") {?>active-list-item<?php }?>">Главная</a></li>
												<li><a href="/user-detail" class="<?php if ($_smarty_tpl->tpl_vars['URL']->value == "user-detail") {?>active-list-item<?php }?>">Личные данные</a></li>
					</ul>
				</div>
			</div><?php }
}
