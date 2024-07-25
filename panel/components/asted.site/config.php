<? include "templates/header.php";
// error_reporting(E_ALL);
// ini_set('display_errors', 1); 
?>
<div class="container-fluid">
	<?php
	if ($userSessionDivisions == "1") {
		$idnews = $_GET['id'];

		$sql_news = "SELECT * FROM `crm_site` WHERE id ='" . $idnews . "'";
		$result_news = mysqli_query($link, $sql_news);
		$newsforedit = mysqli_fetch_assoc($result_news); //print_r($newsforedit);

		$shopSettings = R::findOne('crm_payment_services', 'name = ?', [$newsforedit['payment_service']]);

		if (isset($_POST['submit'])) {
			$shopSettings = R::findOne('crm_payment_services', 'name = ?', [$newsforedit['payment_service']]);
			if (!empty($shopSettings)){
				$shopSettings['shop_id'] = $_POST['shop_id'];
				$shopSettings['shop_key'] = $_POST['shop_key'];
	
				R::store($shopSettings);
			}



			$updateTitle = $_POST['titleadd'];
			$updateMail = $_POST['mailsite'];
			$updateURL = $_POST['urladd'];
			$updateHTTPS = $_POST['https'];
			$updateTheme = $_POST['websitetheme'];
			$updateCRM = $_POST['urladd'];
			$updatemodulemenu = $_POST['modulemenu'];
			$updatemodulepages = $_POST['modulepages'];
			$updatemodulenews = $_POST['modulenews'];
			$updatemodulecustom = $_POST['modulecustom'];
			$updatetelegram = $_POST['telegramsite'];
			$updatetelegramid = $_POST['telegramidsite'];
			$sitestatus = $_POST['sitestatus'];
			$phperrorsite = $_POST['phperrorsite'];
			$showadminsite = $_POST['showadminsite'];
			$paymentSystem = $_POST['paymentsystem'];
			$sqlUloadAva = "UPDATE crm_site SET namesite='" . $updateTitle
			. "', siteurl='" . $updateURL 
			. "', websitessl='" . $updateHTTPS 
			. "', webtemplate='" . $updateTheme 
			. "', crmfuncional='" . $updateCRM 
			. "', modulemenu='" . $updatemodulemenu 
			. "', modulepages='" . $updatemodulepages 
			. "', modulenews='" . $updatemodulenews 
			. "', sitestatus='" . $sitestatus 
			. "', phperrorsite='" . $phperrorsite 
			. "', modulecustom='" . $updatemodulecustom 
			. "', mailsite='" . $updateMail 
			. "', telegramtoken='" . $updatetelegram 
			. "', telegramchatid='" . $updatetelegramid 
			. "', showadminsite='" . $showadminsite 
			. "', payment_service = '" . $paymentSystem 
			. "' WHERE id='{$idnews}'";
			$resultUloadAva = mysqli_query($link, $sqlUloadAva);
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'site/' . $idnews . '/1305/" />';
		}
		if (is_numeric($_GET['result'])) {
			if (isset($_GET['result'])) {
				if ($_GET['result'] == '1305') {
	?>
					<div class="container-fluid">
						<div class="alert alert-success" role="alert">редактирование сайта <?= $newsforedit['namesite'] ?> завершено.</div>
					</div>
		<? }
			}
		}

		$dirastedreal = '../asted_themes';

		if (!file_exists($dirastedreal)) {
			$directoryTerranWebSiteTheme    = 'asted_cws/asted_themes';
			$themeNotise = 'Шаблоны получены из системы';
		} else {
			$directoryTerranWebSiteTheme    = '../asted_themes';
			$themeNotise = 'Шаблоны получены из сайта';
		}
		$filenamesc = $directoryTerranWebSiteTheme . '/dleimages/';

		if (file_exists($filenamesc)) {
			$astedcheker = "Вы используете DLE шаблон";
		} else {
			$astedcheker = "Вы используете CWS шаблон";
		}
		//$directoryTerranWebSiteTheme    = 'asted_cws/asted_themes';
		$scanned_directory = array_diff(scandir($directoryTerranWebSiteTheme, 1), array('..', '.'));
		$scanned_directory = array_diff($scanned_directory, [".DS_Store"]);

		//print_r($scanned_directory);
		$terranThemeCount = count($scanned_directory);
		$supportedPaymentSystems = array('webpay');
		?>

		<!-- Begin Page Content -->
		<div class="container-fluid">
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Настройки сайта <?php if (!empty($newsforedit['namesite'])) { ?> <a href="http://<?= $_SERVER['HTTP_HOST']; ?>"><?= $newsforedit['namesite'] ?></a><? } ?></h1>
			</div>


			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Основное</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Модули</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#mail" role="tab" aria-controls="mail" aria-selected="false">Настройка почты</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="telegram-tab" data-toggle="tab" href="#telegram" role="tab" aria-controls="telegram" aria-selected="false">Настройка Телеграм Бота</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Системные</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="false">Магазин</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">

				<style>
					.fade:not(.show) {
						display: none;
					}
				</style>
				<form method="post" action="">
					<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">


						<span><strong>Название сайта: </strong></span>
						<input placeholder="<?= $newsforedit['namesite'] ?>" value="<?= $newsforedit['namesite'] ?>" class="form-control" name="titleadd" id="titleadd" type="тема">
						<span><strong>URL сайта: </strong></span>
						<input placeholder="<?= $newsforedit['siteurl'] ?>" value="<?= $newsforedit['siteurl'] ?>" class="form-control" name="urladd" id="urladd" type="тема">
						<label for="exampleInputPassword1">SSL сертификат (<i>HTTP://Ваш сайт, HTTPS://Ваш сайт</i>).</label>
						<select class="form-control" name="https" id="https">
							<?php if ($newsforedit['websitessl'] == 0) { ?>
								<option value="0">http</option>
								<option value="1">https</option>
							<? } ?>
							<?php if ($newsforedit['websitessl'] == 1) { ?>
								<option value="1">https</option>
								<option value="0">http</option>
							<? } ?>
						</select>
						<hr>
						<div class="alert alert-primary" role="alert">
							<?= $themeNotise ?>
						</div>
						<div class="alert alert-primary" role="alert">
							<?= $astedcheker ?>
						</div>
						<label for="exampleInputPassword1">Макет шаблона.</label>
						<select class="form-control" name="websitetheme" id="websitetheme">
							<?php for ($i = 0; $i != $terranThemeCount; $i++) { ?>
								<option <?php if ($scanned_directory[$i] == $newsforedit['webtemplate']) {
											echo 'selected selected="selected"';
										} ?>value="<?= $scanned_directory[$i] ?>"><?= $scanned_directory[$i] ?></option>
							<? } ?>
						</select>
						<label for="exampleInputPassword1">CRM Функционал.</label>
						<select class="form-control" name="websitecrmf" id="websitecrmf">
							<?php if ($newsforedit['crmfuncional'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
							<?php if ($newsforedit['crmfuncional'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
						</select>
						<br>

						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


						<label for="exampleInputPassword1">Модуль меню.</label>
						<select class="form-control" name="modulemenu" id="modulemenu">
							<?php if ($newsforedit['modulemenu'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
							<?php if ($newsforedit['modulemenu'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
						</select>
						<label for="exampleInputPassword1">Модуль страниц.</label>
						<select class="form-control" name="modulepages" id="modulepages">
							<?php if ($newsforedit['modulepages'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
							<?php if ($newsforedit['modulepages'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
						</select>
						<label for="exampleInputPassword1">Модуль новостей.</label>
						<select class="form-control" name="modulenews" id="modulenews">
							<?php if ($newsforedit['modulenews'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
							<?php if ($newsforedit['modulenews'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
						</select>
						<label for="exampleInputPassword1">Модуль кастом.</label>
						<select class="form-control" name="modulecustom" id="modulecustom">
							<?php if ($newsforedit['modulecustom'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
							<?php if ($newsforedit['modulecustom'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
						</select>
						<label for="exampleInputPassword1">Модуль каталог.</label>
						<select class="form-control" name="modulecustom" id="modulecustom">
							<?php if ($newsforedit['modulecustom'] == 1) { ?>
								<option value="0">Не используется</option>
								<option value="1" selected>Используется</option>
							<? } ?>
							<?php if ($newsforedit['modulecustom'] == 0) { ?>
								<option value="0" selected>Не используется</option>
								<option value="1">Используется</option>
							<? } ?>
						</select>

						<br>
						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>
					<div class="tab-pane fade" id="mail" role="tabpanel" aria-labelledby="mail-tab">


						<label for="exampleInputPassword1">Почта для приема заявок</label>
						<input placeholder="<?= $newsforedit['mailsite'] ?>" value="<?= $newsforedit['mailsite'] ?>" class="form-control" name="mailsite" id="mailadd" type="тема">
						<br>
						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>
					<div class="tab-pane fade" id="telegram" role="tabpanel" aria-labelledby="telegram-tab">


						<label for="exampleInputPassword1"><strong>Настройки Telegram бота</strong></label>
						<hr>
						<span>Token - уникальный токен получаемый у BotFather</span>
						<input placeholder="<?= $newsforedit['telegramtoken'] ?>" value="<?= $newsforedit['telegramtoken'] ?>" class="form-control" name="telegramsite" id="telegramadd" type="тема">
						<br>
						<span>ChatID - чат ID, индификатор группы или пользователя</span>
						<input placeholder="<?= $newsforedit['telegramchatid'] ?>" value="<?= $newsforedit['telegramchatid'] ?>" class="form-control" name="telegramidsite" id="telegramidadd" type="тема">
						<br>
						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>
					<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">


						<label for="exampleInputPassword1">Техническое обслуживание сайта<br>
							<span style="font-size: 8px;">Для данного режима в теме должна быть страница <strong>offline.asws</strong></span></label>
						<select class="form-control" name="sitestatus" id="sitestatus">
							<?php if ($newsforedit['sitestatus'] == 1) { ?>
								<option value="0">Выключено</option>
								<option value="1" selected>Включено</option>
							<? } ?>
							<?php if ($newsforedit['sitestatus'] == 0) { ?>
								<option value="0" selected>Выключено</option>
								<option value="1">Включено</option>
							<? } ?>
						</select>
						<br>
						<label for="exampleInputPassword1">Показывать админ панель на сайте<br>
							<span style="font-size: 8px;">Выводить верхнию панель на сайте если админ?</span></label>
						<select class="form-control" name="showadminsite" id="showadminsite">
							<?php if ($newsforedit['showadminsite'] == 1) { ?>
								<option value="0">Выключено</option>
								<option value="1" selected>Включено</option>
							<? } ?>
							<?php if ($newsforedit['showadminsite'] == 0) { ?>
								<option value="0" selected>Выключено</option>
								<option value="1">Включено</option>
							<? } ?>
						</select>
						<br>
						<label for="exampleInputPassword1">Вывод ошибок PHP на сайте<br>
							<span style="font-size: 8px;">Для версии php 7+ можно использовать <strong>выводить только Warning</strong></span></label>
						<select class="form-control" name="phperrorsite" id="phperrorsite">
							<?php if ($newsforedit['phperrorsite'] == 1) { ?>
								<option value="0">Выводить только Warning</option>
								<option value="1" selected>Выводить все</option>
								<option value="2">Ничего не выводить</option>
							<? } ?>
							<?php if ($newsforedit['phperrorsite'] == 0) { ?>
								<option value="0" selected>Выводить только Warning</option>
								<option value="1">Выводить все</option>
								<option value="2">Ничего не выводить</option>
							<? } ?>
							<?php if ($newsforedit['phperrorsite'] == 2) { ?>
								<option value="0">Выводить только Warning</option>
								<option value="1">Выводить все</option>
								<option value="2" selected>Ничего не выводить</option>
							<? } ?>
						</select>
						<br><br>
						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>

					<div class="tab-pane fade" id="shop" role="tabpanel" aria-labelledby="shop-tab">


						<label for="exampleInputPassword1">Платёжная система.</label>
						<select class="form-control" name="paymentsystem" id="paymentsystem">
							<?php if ($newsforedit['payment_service'] === NULL || $newsforedit['payment_service'] === "NULL") {
								echo '<option value="NULL">Не используется</option>';
								foreach ($supportedPaymentSystems as $paymentSystem) {
									echo "<option value=\"{$paymentSystem}\">{$paymentSystem}</option>";
								}
							} else {
								echo "<option value=\"{$newsforedit['payment_service']}\">{$newsforedit['payment_service']}</option>";
								foreach ($supportedPaymentSystems as $paymentSystem) {
									if ($paymentSystem !== $newsforedit['payment_service']) {
										echo "<option value=\"{$paymentSystem}\">{$paymentSystem}</option>";
									}
								}
								echo '<option value="NULL">Не используется</option>';
							}

							?>
						</select>
						<?php if ($newsforedit['payment_service'] === "webpay") { ?>
						<span>ID магазина</span>
						<input placeholder="ID" value="<?= $shopSettings['shop_id'] ?>" class="form-control" name="shop_id" id="shop_id" type="text">
						<span>API ключ</span>
						<div class="password-input">
							<input placeholder="Ключ" value="<?= $shopSettings['shop_key'] ?>" class="form-control" name="shop_key" id="shop_key" type="password">
							<button type="button" class="switch-password"><i class="fas fa-eye"></i></button>
						</div>
						
						<? } ?>

						<br>
						<input type="submit" name="submit" class="btn btn-dark" value="Обновить">
					</div>


				</form>


			</div>




		</div>



	<? } ?>
</div>

<? include "templates/footer.php"; ?>