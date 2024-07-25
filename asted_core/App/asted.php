<?php
$sectionPage = R::findOne('crm_site_section', 'websitemodule = ?', ['pages']);
$sectionNews = R::findOne('crm_site_section', 'websitemodule = ?', ['news']);
$sectionMenu = R::findOne('crm_site_section', 'websitemodule = ?', ['menu']);
$sectionCustoms = R::find('crm_site_section', 'websitemodule = ?', ['custom']);

$groupedCustom = [];
foreach ($sectionCustoms as $section) {
	$parent = $section->parent;
	if (!empty($parent)) {
		if (!isset($groupedCustom[$parent])) {
			$groupedCustom[$parent] = [];
		}
		$groupedCustom[$parent][] = $section;
	}
}
foreach ($groupedCustom as $parent => $sections) {
	$customBlock[] = '<div class="asted-add-page-wrapper asted-admin-panel-item">
	<button class="asted-button asted-add-page-text">
		<svg class="asted-admin-panel-item-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">

			<path
				d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
		</svg>
		<div>
		' . $parent . '
		<svg class="asted-arrow" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">

			<path
				d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
		</svg>
		</div>
	</button>
	<div class="asted-dropdown-menu">
		<ul class="asted-ul">';

	foreach ($sections as $section) {
		$customBlock[] = '<li class="asted-clicked-admin-item asted-li-item" data-asted="/asted/custom/' . $section['id'] . '/">
		<a class="asted-a-item">' . $section['namesection'] . '</a>
	</li>';
	}

	$customBlock[] = '		</ul>
	</div>
</div>
<span class="asted-line-vertical"></span>';
}
$customBlockStr = implode('', $customBlock);
if (empty($asted_url)) {
	$page['id'] = 1;
} else {
	$page = R::findOne('crm_site_pages', 'pageurl = ?', [$asted_url]);
	if ($page['type'] == "code") {
		$contentBlock = '<div class="asted-admin-panel-sub-item">
		<div class="asted-clicked-admin-item asted-sub-item " data-asted="/asted/content/' . $page['id'] . '/">
			<svg
				class="asted-admin-panel-item--small-icon"
				xmlns="http://www.w3.org/2000/svg"
				height="1em"
				viewBox="0 0 448 512"
			>
				
				<path
					d="M128 136c0-22.1-17.9-40-40-40L40 96C17.9 96 0 113.9 0 136l0 48c0 22.1 17.9 40 40 40H88c22.1 0 40-17.9 40-40l0-48zm0 192c0-22.1-17.9-40-40-40H40c-22.1 0-40 17.9-40 40l0 48c0 22.1 17.9 40 40 40H88c22.1 0 40-17.9 40-40V328zm32-192v48c0 22.1 17.9 40 40 40h48c22.1 0 40-17.9 40-40V136c0-22.1-17.9-40-40-40l-48 0c-22.1 0-40 17.9-40 40zM288 328c0-22.1-17.9-40-40-40H200c-22.1 0-40 17.9-40 40l0 48c0 22.1 17.9 40 40 40h48c22.1 0 40-17.9 40-40V328zm32-192v48c0 22.1 17.9 40 40 40h48c22.1 0 40-17.9 40-40V136c0-22.1-17.9-40-40-40l-48 0c-22.1 0-40 17.9-40 40zM448 328c0-22.1-17.9-40-40-40H360c-22.1 0-40 17.9-40 40v48c0 22.1 17.9 40 40 40h48c22.1 0 40-17.9 40-40V328z"
				/>
			</svg>
			<p class="asted-font-p-item">Контентые Блоки</p>
		</div>
	</div>';
	}
}
if (!empty($_SESSION['userid'])) {
	$ASTED_THEMES = '
	<link rel="stylesheet" href="/asted_core/App/asted/panel.css" />
	<div class="asted-container-fluid">
	<div class="wrapper-asted">
		<div class="asted-admin-panel-wrapper">
			<div class="asted-admin-panel-header ">
				<div class="asted-logo">
					<img src="/asted_core/App/asted/asted.png" />
				</div>
				<div class="asted-header-nav-panel">
					<button class="asted-user-button">
						<svg class="asted-user-icon" xmlns="http://www.w3.org/2000/svg" height="1em"
							viewBox="0 0 512 512">

							<path
								d="M256 288A144 144 0 1 0 256 0a144 144 0 1 0 0 288zm-94.7 32C72.2 320 0 392.2 0 481.3c0 17 13.8 30.7 30.7 30.7H481.3c17 0 30.7-13.8 30.7-30.7C512 392.2 439.8 320 350.7 320H161.3z" />
						</svg>
						<a href="/asted/profile/' . $_SESSION['userid'] . '/">
							<p>Пользователь</p>
						</a>
					</button>
					<a href="/asted/profile/login/exit/"><button class="asted-admin-panel-header-button-quit">
							<p>Выйти</p>
							<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">

								<path
									d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
							</svg></a>
					</button>
					<div class="asted-header-buttons-up-down-panel">
						<button class="asted-collapse-button">
							<p>Развернуть</p>
							<svg class="asted-arrow" id="asted-arrow-menu" xmlns="http://www.w3.org/2000/svg"
								height="1em" viewBox="0 0 320 512">

								<path
									d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
							</svg>
						</button>
						<button class="asted-nail-button">
								<svg class="asted-nail-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
									<path
										d="M32 32C32 14.3 46.3 0 64 0H320c17.7 0 32 14.3 32 32s-14.3 32-32 32H290.5l11.4 148.2c36.7 19.9 65.7 53.2 79.5 94.7l1 3c3.3 9.8 1.6 20.5-4.4 28.8s-15.7 13.3-26 13.3H32c-10.3 0-19.9-4.9-26-13.3s-7.7-19.1-4.4-28.8l1-3c13.8-41.5 42.8-74.8 79.5-94.7L93.5 64H64C46.3 64 32 49.7 32 32zM160 384h64v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V384z" />
								</svg>
							</button>
					</div>
				</div>
			</div>
			<div class="asted-admin-panel asted-collapse-admin-panel">

				<div class="asted-add-page-wrapper asted-admin-panel-item">
					<button class="asted-button asted-add-page-text">
						<svg class="asted-admin-panel-item-icon" xmlns="http://www.w3.org/2000/svg" height="1em"
							viewBox="0 0 384 512">

							<path
								d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z" />
						</svg>
						<div>
							Страницы
							<svg class="asted-arrow" xmlns="http://www.w3.org/2000/svg" height="1em"
								viewBox="0 0 320 512">

								<path
									d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
							</svg>
						</div>
					</button>
					<div class="asted-dropdown-menu">
						<ul class="asted-ul">
							<li class="asted-clicked-admin-item asted-li-item"
								data-asted="/asted/pages/' . $sectionPage['id'] . '/">
								<a class="asted-a-item">Добавить Страницы</a>
							</li>
							<span class="asted-line-horizontal"></span>
							<li class="asted-clicked-admin-item asted-li-item"
								data-asted="/asted/page-edit/' . $page['id'] . '/">
								<a class="asted-a-item">Редактировать Страницу</a>
							</li>
						</ul>
					</div>
				</div>
				<span class="asted-line-vertical"></span>
				<div class="asted-add-page-wrapper asted-admin-panel-item">
					<button class="asted-button asted-add-page-text">
						<svg class="asted-admin-panel-item-icon" xmlns="http://www.w3.org/2000/svg" height="1em"
							viewBox="0 0 448 512">

							<path
								d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
						</svg>
						<div>
							Изменить каталог
							<svg class="asted-arrow" xmlns="http://www.w3.org/2000/svg" height="1em"
								viewBox="0 0 320 512">

								<path
									d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
							</svg>
						</div>
					</button>
					<div class="asted-dropdown-menu">
						<ul class="asted-ul">
							<li class="asted-clicked-admin-item asted-li-item" data-asted="/asted/catalog/10/">
								<a class="asted-a-item">Товары</a>
							</li>
							<span class="asted-line-horizontal"></span>
							<li class="asted-clicked-admin-item asted-li-item" data-asted="/asted/category/10/">
								<a class="asted-a-item">Категории</a>
							</li>
						</ul>
					</div>
				</div>
				<span class="asted-line-vertical"></span>
				'.$customBlockStr.'
				<div class="asted-add-page-wrapper asted-admin-panel-item">
					<button class="asted-button asted-add-page-text asted-clicked-admin-item"
						data-asted="/asted/news/' . $sectionNews['id'] . '/">
						<svg class="asted-admin-panel-item-icon" xmlns="http://www.w3.org/2000/svg" height="1em"
							viewBox="0 0 512 512">

							<path
								d="M96 96c0-35.3 28.7-64 64-64H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H80c-44.2 0-80-35.8-80-80V128c0-17.7 14.3-32 32-32s32 14.3 32 32V400c0 8.8 7.2 16 16 16s16-7.2 16-16V96zm64 24v80c0 13.3 10.7 24 24 24H296c13.3 0 24-10.7 24-24V120c0-13.3-10.7-24-24-24H184c-13.3 0-24 10.7-24 24zm208-8c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16h48c8.8 0 16-7.2 16-16s-7.2-16-16-16H384c-8.8 0-16 7.2-16 16zM160 304c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16zm0 96c0 8.8 7.2 16 16 16H432c8.8 0 16-7.2 16-16s-7.2-16-16-16H176c-8.8 0-16 7.2-16 16z" />
						</svg>
						Добавить новость
					</button>
				</div>
				<span class="asted-line-vertical"></span>
				<div class="asted-add-page-wrapper asted-admin-panel-item-small">
					<div class="asted-admin-panel-sub-item">
						<div class="asted-sub-item asted-clicked-admin-item "
							data-asted="/asted/menu/' . $sectionMenu['id'] . '/">
							<svg class="asted-admin-panel-item--small-icon" xmlns="http://www.w3.org/2000/svg"
								height="1em" viewBox="0 0 512 512">

								<path
									d="M32 32c17.7 0 32 14.3 32 32V400c0 8.8 7.2 16 16 16H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H80c-44.2 0-80-35.8-80-80V64C0 46.3 14.3 32 32 32zm96 96c0-17.7 14.3-32 32-32l192 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-192 0c-17.7 0-32-14.3-32-32zm32 64H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32zm0 96H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H160c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
							</svg>
							<p class="asted-font-p-item">Меню</p>
						</div>
					</div>
					' . $contentBlock . '
				</div>
				<span class="asted-line-vertical"></span>
				<div class="asted-add-page-wrapper asted-admin-panel-item-small">
					<div class="asted-small-button-open-menu asted-admin-panel-sub-item">
						<div class="asted-sub-item">
							<svg class="asted-admin-panel-item--small-icon" xmlns="http://www.w3.org/2000/svg"
								height="1em" viewBox="0 0 384 512">
								<path
									d="M162.4 6c-1.5-3.6-5-6-8.9-6h-19c-3.9 0-7.5 2.4-8.9 6L104.9 57.7c-3.2 8-14.6 8-17.8 0L66.4 6c-1.5-3.6-5-6-8.9-6H48C21.5 0 0 21.5 0 48V224v22.4V256H9.6 374.4 384v-9.6V224 48c0-26.5-21.5-48-48-48H230.5c-3.9 0-7.5 2.4-8.9 6L200.9 57.7c-3.2 8-14.6 8-17.8 0L162.4 6zM0 288v32c0 35.3 28.7 64 64 64h64v64c0 35.3 28.7 64 64 64s64-28.7 64-64V384h64c35.3 0 64-28.7 64-64V288H0zM192 432a16 16 0 1 1 0 32 16 16 0 1 1 0-32z" />
							</svg>
							<p class="asted-small-button-open-menu asted-font-p-item">
								Тема
							</p>
							<svg class="asted-arrow-icon" xmlns="http://www.w3.org/2000/svg" height="1em"
								viewBox="0 0 320 512">
								<path
									d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
							</svg>
						</div>
						
						<div class="pool asted-sub-menu">
							<ul class="asted-ul">
								<li class="asted-theme-standart asted-li-item">
									<a class="asted-a-item">Стандартная</a>
								</li>
								<span class="asted-line-horizontal"></span>
								<li class="asted-theme-black asted-li-item">
									<a class="asted-a-item">Темная</a>
								</li>
								<span class="asted-line-horizontal"></span>
								<li class="asted-theme-white asted-li-item">
									<a class="asted-a-item">Светлая</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="asted-content-edit_btn">
					<button class="asted-marker">Включить редактирование</button>
					<button class="asted-submit-btn">Обновить сайт</button>
					<!--<div class="asted-settings" ><i style="color:white" class="fa-solid fa-gear"></i></div>-->
				</div>
				<div class="asted-arrow-collapse-items">
					<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512">
						<path
							d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
					</svg>
					<div class="asted-dropdown-menu asted-collapse-menu">
						<ul class="asted-ul">
							<li class="asted-sub-item-menu asted-li-item">
								<a class="asted-a-item asted-a-item-icon">Тема
									<svg class="asted-arrow-icon-sub-menu" xmlns="http://www.w3.org/2000/svg"
										height="1em" viewBox="0 0 320 512">
										<path
											d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
									</svg></a>
								<ul class="asted-small-sub-item asted-ul close">
									<li class="asted-theme-standart asted-li-item">
										<a class="asted-a-item">Стандартная</a>
									</li>
									<li class="asted-theme-black asted-li-item">
										<a class="asted-a-item">Темная</a>
									</li>
									<li class="asted-theme-white asted-li-item">
										<a class="asted-a-item">Светлая</a>
									</li>
								</ul>
							</li>

							<li class="asted-sub-item-menu asted-li-item">
								<a class="asted-a-item asted-a-item-icon">Меню
									<svg class="asted-arrow-icon-sub-menu" xmlns="http://www.w3.org/2000/svg"
										height="1em" viewBox="0 0 320 512">
										<path
											d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
									</svg></a>
								<ul class="asted-small-sub-item asted-ul close">
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Редактировать
											"catalog-menu"</a>
									</li>
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Редактировать "Левое
											меню"</a>
									</li>
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Удалить "catalog-menu"</a>
									</li>
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Удалить "Левое меню"</a>
									</li>
								</ul>
							</li>

							<li class="asted-clicked-admin-item asted-sub-item-menu asted-li-item"
								data-asted="section/">
								<a class="asted-a-item asted-a-item-icon">Структура
									</svg></a>
							</li>
							<li class="asted-sub-item-menu asted-li-item">
								<a class="asted-a-item asted-a-item-icon">Добавить новость
									<svg class="asted-arrow-icon-sub-menu" xmlns="http://www.w3.org/2000/svg"
										height="1em" viewBox="0 0 320 512">
										<path
											d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
									</svg></a>
								<ul class="asted-small-sub-item asted-ul close">
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Добавить новость</a>
									</li>
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">В панели управления"</a>
									</li>
								</ul>
							</li>
							<li class="asted-sub-item-menu asted-li-item">
								<a class="asted-a-item asted-a-item-icon">Создать товар
									<svg class="asted-arrow-icon-sub-menu" xmlns="http://www.w3.org/2000/svg"
										height="1em" viewBox="0 0 320 512">
										<path
											d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z" />
									</svg></a>
								<ul class="asted-small-sub-item asted-ul close">
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">Создать товар</a>
									</li>
									<li class="asted-clicked-admin-item asted-li-item" data-asted="section/">
										<a class="asted-a-item">В панели управления"</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="asted-modal-wrapper">
		<div class="asted-modal-panel">
			<div class="asted-close-button-wrapper">
				<button class="asted-close-modal-button">
					<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
						<path
							d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
					</svg>
				</button>
			</div>
			<div class="asted-content-panel">
				<iframe class="asted-iframe" width="100%" height="100%"></iframe>
			</div>
		</div>
	</div>
	<style>
	.asted-bordered {
		border: 1px solid red !important;
		outline: 1px solid red !important;
		background:black !important;
		color:white !important;
	  }
	  .asted-marker,.asted-submit-btn{
		max-height: 60px !important;
		background: #181717ad !important;
		
	  }
	  @media (min-width: 1050px) {
	  .asted-content-edit_btn{
		display:flex;
		gap:15px
	  }
	}

	.asted-update-modal{
		background:rgba(0, 0, 0, 0.4) !important;
		width:100vw !important;
		height:100vh !important;
		position: fixed !important;
		z-index: 9999999999999999 !important;
		top:0 !important;
		display:none;
	  }

	  .asted-update-modal_active{
		display:block;
	  }

	  .asted-update-modal__content{
		position:absolute !important;
		top:30%;
		left:50%;
		background:white;
		width:35vw;
		height:20vw;
		transform:translate(-50%);
	  }

	  .asted-moodal__close{
		position:absolute;
		top:20px;
		right:20px;
		font-size:26px;
		font-family:sans-serif;
		cursor:pointer;
	  }

	  .asted-modal-confirm{
		position:absolute;
		bottom:20px;
		left:20px;
		padding:12px 25px;
		background:black;
		color:white;
		font-size:20px;
		border-radius:12px;
		cursor:pointer;
	  }

	  .asted-modal-confirm:hover{
		background:white;
		color:black;
		border:1px solid black;
	  }

	  .asted-modal__message{
		position:absolute;
		top:40px;
		padding:30px 20px 15px;
		font-size:20px;
	  }

	  .asted-sidebar{
		position:fixed;
		top:0;
		left:0;
		width:100vw;
		height:100vh;
		background:rgba(0, 0, 0, 0.4) !important;
		z-index:99999999999999 !important;
		display:none;
	  }

	  .asted-sidebar_active{
		display:block;
	  }

	  .asted-sidebar-item-wrapper{
		background:white;
		width:45vw;
		padding: 50px 30px 40px;
	  }

	  .asted-sidebar-content{
		position:absolute;
		top:0;
		left:0;
		overflow-x:scroll;
		height:100%;
	  }

	  .asted-sidebar-close{
		position:absolute;
		top:10px;
		right:10px;
		font-size:24px;
		cursor:pointer;
	  }

	  .asted-settings{
		font-size:40px;
		cursor:pointer;
	  }

	  .asted-slider-preview-image{
		width:100%;
		padding-bottom:20px;
		max-height:400px;
	  }

	  .asted-slider-variants{
		display:flex;
		gap:20px;
	  }

	  .asted-square-image {
		width: 100%;
		height: 0;
		padding-bottom: 200px;
		position: relative;
		overflow: hidden;
		cursor:pointer;
	}

	.asted-slider-variant{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 200px;
		object-fit: cover;
	}

	.asted-square-image_active{
		border:2px solid orange;
	}

	.asted-add-btn{
		backround:black;
		color:white;
		padding:10px 20px;
		
	}
	</style>
	<div class="asted-update-modal">
	  <div class="asted-update-modal__content" >
	  	<div class="asted-moodal__close" ><i style="color:black" class="fa-solid fa-xmark"></i></div>
	  	<div class="asted-modal__message" ></div>
		<div class="asted-modal-confirm">Перезагрузить</div>
	  </div>
	</div>
	<div class="asted-sidebar">
	  <div class="asted-sidebar-content">
	  	<div class="asted-sidebar-close"><i style="color:black" class="fa-solid fa-xmark"></i></div>
	  	<div class="asted-sidebar-item-wrapper asted-slider-preview">
	  		<img class="asted-slider-preview-image" alt="slider preview" src="https://img.freepik.com/free-photo/forest-landscape_71767-127.jpg"/>
			<div class="asted-slider-variants">
	  			<div class="asted-square-image">
				  <img alt="slider variant" class="asted-slider-variant" src="https://img2.akspic.ru/previews/2/7/7/4/7/174772/174772-skelet-18650-past-rebro-kost-500x.jpg"/>
				</div>
	  			<div class="asted-square-image">
				  <img alt="slider variant" class="asted-slider-variant" src="https://avatars.mds.yandex.net/i?id=43f1a029d98aef8cb0091dba04947086_l-5292126-images-thumbs&n=27&h=480&w=480" />
				</div>
	  			<div class="asted-square-image asted-square-image_active">
				  <img alt="slider variant" class="asted-slider-variant" src="https://img.freepik.com/free-photo/forest-landscape_71767-127.jpg"/>
				</div>	
			</div>
			<div class="asted-add-btn asted-add-btn_slider">Добавить на сайт</div>
		</div>
	  	<div class="asted-sidebar-item-wrapper">
		  
		</div>
	  	<div class="asted-sidebar-item-wrapper">
		  
		</div>
	  </div>
	</div>	
</div>
<script src="/asted_core/App/asted/panel.js"></script>
<script src="/asted_core/App/asted/editcontent.js"></script>
';
}
$smarty->assign('ASTED', $ASTED_THEMES);
