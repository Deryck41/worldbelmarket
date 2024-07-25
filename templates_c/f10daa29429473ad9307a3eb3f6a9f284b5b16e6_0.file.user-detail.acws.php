<?php
/* Smarty version 3.1.45, created on 2024-06-27 14:26:17
  from '/home/worldbel/public_html/asted_themes/marketplace/parts/user-detail.acws' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.45',
  'unifunc' => 'content_667d4c59186a14_97328497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f10daa29429473ad9307a3eb3f6a9f284b5b16e6' => 
    array (
      0 => '/home/worldbel/public_html/asted_themes/marketplace/parts/user-detail.acws',
      1 => 1719487575,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_667d4c59186a14_97328497 (Smarty_Internal_Template $_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['isAuthUser']->value == true) {?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
css/checkbox.css" />
<section>

		<div class="container">
			<h1 class="profile-title mt-5 mb-2">Профиль</h1>
			<?php echo smarty_function_menu(array('style'=>"user-menu"),$_smarty_tpl);?>

			<div class="row mt-5 mb-3">
				<ul class="user-detail-tabs">
					<li><a class="active-detail-tab">Личные данные</a></li>
									</ul>
			</div>
			<div class="row mb-5 user-data-block">
				<div class="col-lg-8 p-0">
					<div class="user-profile-data user-detail-edit">
						<div class="ns-inputs">
							<div>
                            <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
								<p>Имя</p>
                                <?php } else { ?>
                                    <p>Название компании</p>
                            <?php }?>
                            
                        <input type="text" name="<?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>firstName<?php } else { ?>company<?php }?>" value="<?php echo $_smarty_tpl->tpl_vars['uName']->value;?>
">
							</div>
							
                            <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
                                <div>
								<p>Фамилия</p>
								<input type="text" name="surName" value="<?php echo $_smarty_tpl->tpl_vars['uSurName']->value;?>
">
							</div>
                            <?php } else { ?>
                                <div>
								<p>УНП</p>
								<input type="text" name="INT" value="<?php echo $_smarty_tpl->tpl_vars['uUNP']->value;?>
">
							</div>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
							
                            <label class="a8z-toggle-switch" data-style="rounded" data-color="orange" data-label="left">
							
                            <input checked type="checkbox" id="legal" data-value="<?php echo $_smarty_tpl->tpl_vars['legalType']->value;?>
">
							
                            <span class="toggle">
                              <span class="switch"></span>
                            </span>
							<span class="label">Я </span>
                          </label>
                                <?php }?>

                            
						</div>
                        <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
                            <div class="ns-inputs">
                                <div>
                                    <p>Отчество</p>
                                    <input type="text" name="lastName" value="<?php echo $_smarty_tpl->tpl_vars['uLastname']->value;?>
">
                                </div>
                            </div>
                            
                            <?php } else { ?>
                                <div class="ns-inputs">
                                    <div>
                                        <p>Платёжные реквезиты</p>
                                        <input type="text" name="requisites" value="<?php echo $_smarty_tpl->tpl_vars['requisites']->value;?>
">
                                    </div>
                                </div>
                                <?php }?>
						<?php if ($_smarty_tpl->tpl_vars['uType']->value == "user" && $_smarty_tpl->tpl_vars['legalType']->value == 0) {?>
							<div class="ns-inputs">
                                    <div>
                                        <p>Реквезиты</p>
                                        <input type="text" name="uRequisites" class="uRequisites" value="<?php echo $_smarty_tpl->tpl_vars['uRequisites']->value;?>
">
                                    </div>
                                    <div>
                                    <p>УНП</p>
                                    <input type="text" name="uINT" class="uINT" value="<?php echo $_smarty_tpl->tpl_vars['uINT']->value;?>
">
                                </div>
                                </div>
                                
						<?php }?>
						<div class="ns-inputs">
							<div>
								<p>Телефон</p>
								<input type="text" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['uPhone']->value;?>
">
							</div>
							<div>
								<p>Эл.почта</p>
								<input type="text" name="email" value="<?php echo $_smarty_tpl->tpl_vars['uEmail']->value;?>
">
							</div>
						</div>
						<button class="save-user-data-btn">Сохранить изменения</button>
					</div>
				</div>
							</div>

			<div class="row mb-5 notiсe-block none-block">
				<div class="notiсe-wrapper">
					<p class="notice-text">Уведомлений нет</p>

					<a href="user.html" class="save-user-data-btn">Перейти на главную</a>

				</div>
			</div>

		</div>

	</section>
    <?php if ($_smarty_tpl->tpl_vars['uType']->value == "user") {?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/user-detail.js" type="module"><?php echo '</script'; ?>
>
    <?php } else { ?>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['THEME_URL']->value;?>
js/provider-detail.js" type="module"><?php echo '</script'; ?>
>
    <?php }?>
    <?php } else { ?>
        <h1>Вы не вошли</h1>
    <?php }
}
}
