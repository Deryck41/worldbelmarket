<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="install.css?v=2" rel="stylesheet">

<head>
	<?
	include '../core/rb.php';
	include '../core/config.php';
	error_reporting(E_ALL ^ E_NOTICE);
	ini_set('display_errors', 'Off');
	ini_set('error_reporting', E_ALL);
	if ($_POST['submit'] == 'newsadd') {
		$name = $_POST['titleadd'];
		$surname = $_POST['titleadds'];
		$email = $_POST['usremail'];
		$divisions = '1';
		$usrpass = $_POST['usrepass'];
		$password = hash('md5', $usrpass); //TERRAN-TAIP: Первый раз преобразовываем в md5
		$passwordss = hash('md5', $password); //TERRAN-TAIP: Второй раз преобразовываем в md5
		$sql = "INSERT INTO `" . $TerranPrefix . "users` (name, surname, email, divisions, password) VALUES ('{$name}','{$surname}','{$email}','{$divisions}','{$passwordss}')";
		$result = mysqli_query($link, $sql);

		$sqlc = "INSERT INTO `" . $TerranPrefix . "config` (`adminemail`, `title`, `lang`, `usrcanlang`, `construct`, `constpalitretheme`, `preloader`, `jobtime`, `grouptitletotask`, `mainpage`, `avauploadsiza`, `error`, `installnow`, `module`, `typesystem`, `module_multisite`, `website`, `lickey`, `userreg`) VALUES
('asted@asted.by', 'Asted X', 'ru', 'yes', 'off', 'white', 'off', 'off', 'on', 'index', '2000400', 'false', 'on', 'true', 'noselect', 'off', 'true', 'null', 'no')";
		$resultc = mysqli_query($link, $sqlc);
		$sqlxc = "INSERT INTO `" . $TerranPrefix . "usergroup` (`id`, `usergroup`, `superadmin`, `userwoked`, `canforusrauth`, `caneditusr`, `canviewprelead`, `candeletoldlead`, `canviewlead`, `canviewconfig`, `canviewsalaries`, `canviewsallgroup`, `cancontrolwebsite`, `personalgroup`, `canadduser`, `projectpdoc`, `projectprice`, `projectedit`, `projectdopinfo`, `devdoc`) VALUES
(1, 'Администратор', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true', 'true')";
		$resultc = mysqli_query($link, $sqlxc);
		$sqlxczz = "INSERT INTO `" . $TerranPrefix . "configproject` (`showuser`, `showwiki`) VALUES
('on', 'on')";
		$resultczz = mysqli_query($link, $sqlxczz);
		//currency
		$currencysql = "INSERT INTO `" . $TerranPrefix . "currency` (`currency`, `currencycode`, `currencyprice`, `currencydefault`) VALUES
('Доллар', 'USD', '1', 'y')";
		$resultcurrency = mysqli_query($link, $currencysql);
		$currencysqlbyn = "INSERT INTO `" . $TerranPrefix . "currency` (`currency`, `currencycode`, `currencyprice`, `currencydefault`) VALUES
('Беларуский Рубль', 'BYN', '2.530', 'n')";
		$resultcurrencybyn = mysqli_query($link, $currencysqlbyn);
		$currencysqlbyn = "INSERT INTO `" . $TerranPrefix . "currency` (`currency`, `currencycode`, `currencyprice`, `currencydefault`) VALUES
('Российский Рубль', 'RUB', '0,043', 'n')";
		$resultcurrencybyn = mysqli_query($link, $currencysqlbyn);
		//menu
		//erp
		$mebuerp_q = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_chat', 'chat', 'fa-comments', '3', 'y', 'component')";
		$resultcerps = mysqli_query($link, $mebuerp_q);

		$mebuerp_w = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_task', 'tasks', 'fa-tasks', '3', 'y', 'component')";
		$resultcerpv = mysqli_query($link, $mebuerp_w);

		$mebuerp_e = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('3', 'menu_projects', 'projects', 'fa-table', '3', 'y', 'component')";
		$resultcerpn = mysqli_query($link, $mebuerp_e);
		//erp end


		//buh
		$mebubuh_q = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_possessions', 'property.php', 'fa-home', '4', 'n', 'custom')";
		$resulterpn = mysqli_query($link, $mebubuh_q);

		$mebubuh_w = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_salaries', 'salaries', 'fa-credit-card', '4', 'y', 'component')";
		$resultcerpnm = mysqli_query($link, $mebubuh_w);

		$mebubuh_e = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('3', 'menu_finance', 'finance', 'fa-suitcase', '4', 'n', 'component')";
		$resulterpyc = mysqli_query($link, $mebubuh_e);
		//buh end

		//stru
		$mebustru_q = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_personal', 'personal', 'fa-user', '5', 'y', 'component')";
		$resstruulterpn = mysqli_query($link, $mebustru_q);

		$mebustru_w = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_usergroup', 'usergroup', 'fa-users', '5', 'y', 'component')";
		$resultstrucerpnm = mysqli_query($link, $mebustru_w);
		
		$mebustru_e = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
		('3', 'menu_filemanager', 'filemanager.php?p=', 'fa-file', '5', 'n', 'custom')";
				$resulterstrupyc = mysqli_query($link, $mebustru_e);
		
		$mebustru_ez = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_modinstaler', 'modinstall', 'fa-upload', '6', 'y', 'component')";
		$resulterstrupycz = mysqli_query($link, $mebustru_ez);

		$mebustru_ezus = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_workandlead', '#', 'fa-chart-area', '1', 'y', 'parent')";
		$resulterstrupyczus = mysqli_query($link, $mebustru_ezus);

		$mebustru_ezusp = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_deal', 'lead', 'fa-address-book', '11', 'y', 'postparent')";
		$resulterstrupyczusp = mysqli_query($link, $mebustru_ezusp);

		$mebustru_ezuspi = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'include', 'webasted.php', 'include', '2', 'y', 'include')";
		$resulterstrupyczuspi = mysqli_query($link, $mebustru_ezuspi);

		$mebscu_ez = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES ('2', 'menu_exampmod', 'module.php?mod=examples', 'fa-credit-card', '6', 'n', 'custom')";
				$resasupyczuvspi = mysqli_query($link, $mebscu_ez);

		$macu_ez = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_confsys', 'config', 'fa-microchip', '7', 'y', 'component')";
		$respyczuvspi = mysqli_query($link, $macu_ez);

		$maccu_ez = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_sys', '#', 'fa-chart-area', '7', 'y', 'parent')";
		$respasuvspi = mysqli_query($link, $maccu_ez);

		$maccu_ezq = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_update', 'update', 'fa-file', '16', 'y', 'postparent')";
		$respasuvspiq = mysqli_query($link, $maccu_ezq);

		$maccu_ezqs = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_lic', 'licence', 'fa-address-book', '16', 'y', 'postparent')";
		$respasuvscpiq = mysqli_query($link, $maccu_ezqs);

		$maccu_ezqsb = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('2', 'menu_server', 'server', 'fa-server', '8', 'y', 'component')";
		$respasuvbscpiq = mysqli_query($link, $maccu_ezqsb);

		$maccu_ezqsbv = "INSERT INTO `" . $TerranPrefix . "menu` (`position`, `name`, `link`, `icon`, `category`, `active`, `type`) VALUES
('1', 'menu_componetns', 'components', 'fa-server', '8', 'y', 'component')";
		$routesrespasuvbscpiqv = mysqli_query($link, $maccu_ezqsbv);
		
		//stru end	
		$routes = array(
		array('/modinstall/', 'asted.module', 'install'),
		array('/server/', 'asted.server', 'server'),
		array('/amenu/', 'asted.amenu', 'menu'),
		array('/components/', 'asted.acom', 'components'),
		array('/chat/', 'asted.chat', 'chat'),
		array('/licence/', 'asted.licence', 'licence'),
		array('/personal/', 'asted.personal', 'personal'),
		array('/finance/', 'asted.finance', 'finance'),
		array('/salaries/', 'asted.salaries', 'salaries'),
		array('/update/', 'asted.update', 'update'),
		array('/profile/', 'asted.profile', 'profile'),
		array('/notes/', 'asted.notes', 'notes'),
		array('/logs/', 'asted.logs', 'logs'),
		array('/lead/', 'asted.lead', 'lido'),
		array('/lenta/', 'asted.lenta', 'lenta'),
		array('/login/', 'asted.auth', 'login'),
		array('/config/', 'asted.config', 'config'),
		array('/section/', 'site.section', 'section'),
		array('/section-catalog/', 'site.section', 'section_catalog'),
		array('/section-custom/', 'site.section', 'section_custom'),
		array('/section-menu/', 'site.section', 'section_menu'),
		array('/section-news/', 'site.section', 'section_news'),
		array('/section-pages/', 'site.section', 'section_pages'),
		array('/section-edit/', 'site.section', 'section-edit'),
		array('/page-edit/', 'site.page', 'page_edit'),
		array('/pages/', 'site.page', 'pages'),
		array('/news/', 'site.news', 'news'),
		array('/news-category/', 'site.news', 'news_category'),
		array('/news-category-edit/', 'site.news', 'news_category_edit'),
		array('/news-edit/', 'site.news', 'news_edit'),
		array('/galery/', 'site.galery', 'galery'),
		array('/galery-edit/', 'site.galery', 'galery_edit'),
		array('/content/', 'site.content', 'content'),
		array('/content-edit/', 'site.content', 'content_edit'),
		array('/menu/', 'site.menu', 'menu'),
		array('/menu-edit/', 'site.menu', 'menu_edit'),
		array('/add/', 'asted.site', 'add'),
		array('/site/', 'asted.site', 'config'),
		array('/control/', 'asted.site', 'control'),
		array('/usergroup/', 'asted.usergroup', 'usergroup'),
		array('/currency/', 'asted.site', 'currency'),
		array('/seo/', 'asted.site', 'seo'),
		array('/themeseditor/', 'site.themeseditor', 'themeseditor'),
		array('/worktimer/', 'asted.site', 'worktimer'),
		array('/catalog/', 'site.catalog', 'catalog'),
		array('/catalog-edit/', 'site.catalog', 'catalog_edit'),
		array('/category/', 'site.catalog', 'category'),
		array('/category-edit/', 'site.catalog', 'category_edit'),
		array('/category-filter/', 'site.catalog', 'category_filter'),
		array('/category-filter-edit/', 'site.catalog', 'category_filter_edit'),
		array('/projects/', 'asted.project', 'projects'),
		array('/project/', 'asted.project', 'project'),
		array('/project-edit/', 'asted.project', 'editproject'),
		array('/tasks/', 'asted.task', 'tasks'),
		array('/tasks-construct/', 'asted.task', 'tasks_construct'),
		array('/tasks-table/', 'asted.task', 'tasks_table'),
		array('/tasks-list/', 'asted.task', 'tasks_list'),
		array('/tasks-trash/', 'asted.task', 'tasks_trash'),
		array('/task/', 'asted.task', 'task'),
		array('/task-edit/', 'asted.task', 'edittask'),
		array('/devdoc/', 'site.devdoc', 'devdoc'),
		array('/section-news-field/', 'site.section', 'section-news-field'),
		array('/section-catalog-field/', 'site.section', 'section-catalog-field'),
		array('/library/', 'site.library', 'library')
		);
		foreach ($routes as $route) {
			$query = "INSERT INTO `" . $TerranPrefix . "routes` (`uri`, `direction`, `page_name`) VALUES ('{$route[0]}', '{$route[1]}', '{$route[2]}')";
			mysqli_query($link, $query);
		}

		echo '<meta http-equiv="refresh" content="1;URL=menu.php" />';
	}
	?>
</head>
<div class="logo">ASTED CWS</div>
<header>
	<div class="progress">
		<div class="statusbar statusprogressbar" style="width: 69%;"></div>
		<p class="progress-title">
			Четвёртый шаг, создание профиля
			<br>4 / 6
		</p>
	</div>
</header>
<header>

</header>
<article>
	<style>
		.columstyle {
			display: flex;
			justify-content: space-between;
		}
	</style>

	<form action="" method="post" style="padding-left: 8px;max-width: 250px;">
		<div class="columstyle">
			<span><strong>Имя: </strong></span><input class="form-control" type="тема" name="titleadd" id="titleadd">
		</div>

		<div class="columstyle">
			<span><strong>Фамилия: </strong></span><input class="form-control" type="тема" name="titleadds" id="titleadds">
		</div>

		<hr style="border: rgb(222, 211, 194); height: 1px; background-color: rgb(208, 218, 218);">
		<div class="columstyle">
			<span><strong>Почта: </strong></span><input name="usremail" id="usremail" class="email form-control" type="email">
		</div>
		<div style="font-size: 9px; font-weight: 400; font-family: monospace;">Email - Является логином для входа, в админ панель</div>
		<div class="inputs">
			<div class="columstyle">
				<span><strong>Пароль: </strong></span><input name="usrepass" id="usrepass" class="form-control password" type="password">
			</div>
			<div style="font-size: 9px; font-weight: 400; font-family: monospace;">Пароль - Для входа, в админ панель</div><br>
			<label>
				<input type="checkbox" class="showPassword"> Показать пароль
			</label>
		</div>
		<br>
		<script>
			let showPassword = document.querySelectorAll('.showPassword');

			showPassword.forEach(item =>
				item.addEventListener('click', toggleType)
			);


			function toggleType() {
				let input = this.closest('.inputs').querySelector('.password');
				if (input.type === 'password') {
					input.type = 'text';
				} else {
					input.type = 'password';
				}
			}


			const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
			const input = document.querySelector('.email');

			function isEmailValid(value) {
				return EMAIL_REGEXP.test(value);
			}

			function onInput() {
				if (isEmailValid(input.value)) {
					input.style.borderColor = 'green';
				} else {
					input.style.borderColor = 'red';
				}
			}

			input.addEventListener('input', onInput);
		</script>
		<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0" class="btn btn-primary btn-user btn-block" />
		<button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary">Создать</button>
	</form>
</article>
<footer><?= date("Y") ?> <a href="https://asted.by/">Asted.by</a> <span style="font-size: 12px">© ООО "АСТЕДБЕЛ" </span></footer>
</body>

</html>