<? include "templates/header.php";
$sql_leadsResult = "SELECT * FROM `crm_site` ORDER BY `id` DESC";
$result_leads = mysqli_query($link, $sql_leadsResult);
$numRowsResult = mysqli_num_rows($result_leads);
$totalsiteplus = $numRowsResult + 1;
if (!is_writable("asted_cws")) {
	echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">Asted ERP: Внимание на раздел asted_cws не установлены права 777, вы не сможите создать сайт!!!</div></div>';
}
if ($_POST['submit'] == 'websiteadd') {
	if (!is_writable("asted_cws")) {
		echo '<div class="container-fluid"><div class="alert alert-danger" role="alert">Asted ERP: Установите на папку asted_cws права 777!!!</div></div>';
	} else {
	
		$sql = "INSERT INTO `crm_site` (namesite, siteurl, websitessl, webtemplate, crmfuncional, modulemenu, modulepages, modulenews, modulecatalog, modulecustom, sitestatus, phperrorsite) VALUES ('{$_POST['websitename']}','{$_POST['urlwebsite']}','{$_POST['https']}', '{$_POST['websitetheme']}', '{$_POST['websitecrmf']}' , '{$_POST['modulemenu']}', '{$_POST['modulepages']}', '{$_POST['modulenews']}', '{$_POST['modulecatalog']}', '{$_POST['modulecustom']}', '0', '0')";
		if (mysqli_query($link, $sql)) {
			//header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'add/1/1305/" />';
		} else {
			echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
			Asted ERP: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
		}
	}
}
if ($_POST['del'] != null) {
	$sqlportfolio = "DELETE FROM crm_site WHERE id=" . $_POST['del'] . "";
	mysqli_query($link, $sqlportfolio);
	echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'add/1/1991/" />';
	echo $_POST['del'];
}
if (is_numeric($_GET['result'])) {
	if (isset($_GET['result'])) {
		if ($_GET['result'] == '1305') {
?>
			<div class="container-fluid">
				<div class="alert alert-success" role="alert">
					Asted: Сайт успешно добавлен
				</div>
			</div>
		<? }
	}
}
if (is_numeric($_GET['result'])) {
	if (isset($_GET['result'])) {
		if ($_GET['result'] == '1991') {
		?>
			<div class="container-fluid">
				<div class="alert alert-success" role="alert">
					Asted: Сайт успешно удален
				</div>
			</div>
<? }
	}
} ?>
<div class="container-fluid">
	<?php
	if ($userSessionDivisions == "1") {
		$directoryTerranWebSiteTheme    = 'website_themes';
		$scanned_directory = array_diff(scandir($directoryTerranWebSiteTheme, 1), array('..', '.'));
		$terranThemeCount = count($scanned_directory); ?>
		<!-- Page Heading -->
		<?php if ($sitecontid != null) {

		?>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Список сайтов
						<?php if ($sitecontid != null) {
							echo '<br> Создано сайтов:' . $sitecontid;
						} ?></h6>
				</div>
				<div class="card-body">
					<div class="p-3 bg-gray-100 websiteadd">ID - URL домена - Название сайта - Выбраная тема - SSL Сертификат</div><br>
					<? while ($task = mysqli_fetch_assoc($result_site)) {
						$title = "{$task['namesite']}";
						$id = "{$task['id']}";
						$crmfuncs = "{$task['crmfuncional']}";
						$sslserf = "{$task['websitessl']}";
						$urlwebsi = "{$task['siteurl']}";
						$sitetheme = "{$task['webtemplate']}";
						$modmenu = "{$task['modulemenu']}";
						$modpages = "{$task['modulepages']}";
						$modcustom = "{$task['modulecustom']}";
						$modnews = "{$task['modulenews']}";
						$modcatalog = "{$task['modulecatalog']}";
					?>
						<div class="modal fade" id="myModalClosed<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content" id="Create-Task-Form">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Удалить сайт <?= $urlwebsi ?></h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post">

											<input class="form-control theme" style="display:none;" name="del" id="del" value="<?= $id ?>" type="тема">
											<input type="submit" name="submit" style="display:none" value="deletet" name="deletet" id="delet<?= $id ?>" class="btn btn-primary btn-user btn-block" />
											<button type="submit" onclick="javascript:document.getElementById('delet<?= $id ?>').click();" style="width: 70%;" class="btn btn-primary">Удалить</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Не удалять</button>

										</form>
									</div>

								</div>
							</div>
						</div>




						<div class="p-3 bg-gray-100">#<?= $id ?> - <a href="//<?= $urlwebsi ?>"><?= $urlwebsi ?></a> - <?= $title ?>
							- <?php for ($i = 0; $i != $terranThemeCount; $i++) {
									if ($i == $sitetheme) {
										echo $scanned_directory[$i];
										$terranFileTrix = 'website_themes/' . $scanned_directory[$i] . '/description.php';
										$terranFileJoomla = 'website_themes/' . $scanned_directory[$i] . '/templateDetails.xml';
										$terranFileDle = 'website_themes/' . $scanned_directory[$i] . '/main.tpl';
										$terranFileWP = 'website_themes/' . $scanned_directory[$i] . '/functions.php';
										if (file_exists($terranFileTrix)) :
											echo " (Шаблон BITRIX)";
										elseif (file_exists($terranFileJoomla)) :
											echo " (Шаблон Joomla)";
										elseif (file_exists($terranFileDle)) :
											echo " (Шаблон DLE)";
										elseif (file_exists($terranFileWP)) :
											echo " (Шаблон WordPess)";
										else :
											echo " (Шаблон не определён)";
										endif;
									}
								} ?> -
							<?php if ($sslserf == 0) {
								echo 'Используется HTTP';
							} else { {
									echo 'Используется HTTPS';
								}
							} ?> -
							<?php if ($crmfuncs == 0) {
								echo 'CRM Используется';
							} else { {
									echo 'CRM Не используется';
								}
							} ?>
							<a href="<?= $astedADM ?>edit/<?= $id ?>/"><i class="fas fa-fw fa-edit" style="float: right;"></i></a> <i class="fas fa-fw fa-trash" style="float: right;" data-toggle="modal" data-target="#myModalClosed<?= $id ?>"></i>
							<!-- <br><strong>Подключенные модули: </strong><?php if ($modmenu == "1") echo "модуль меню, "; ?><?php if ($modpages == "1") echo "модуль страниц, "; ?><?php if ($modcustom == "1") echo "модули кастомные, "; ?><?php if ($modnews == "1") echo "модуль новостей "; ?> -->
						</div><br>



					<? }




					?>
				</div>
			</div>
			<div class="alert alert-warning" role="alert">
					Вы можите почитать документацию по разработке системы на нашем сайте<br>
					По ссылке <a href="https://asted.by/docs/">https://asted.by/docs/</a><br>
					Либо в сответсвующем разделе <a href="asted/devdoc">Документация</a>
				</div>

		<?php

		} else { ?>
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">
						Ваш сайт еще не сконфигурирован!
					</h6>
				</div>
			</div>
		<?php
		}
		?>
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary"><?php if ($sitecontid == null) {
																	echo 'Сконфигурировать сайт AstedCWS:';
																} else {
																	echo 'Добавить еще один сайт';
																} ?></h6>
			</div>
			<div class="card-body">


				<div class="form-group">
					<form action="" method="post">
						<label for="exampleInputPassword1">Название сайта</label>
						<input type="text" class="form-control" name="websitename" id="websitename" value="Имя вашего сайта">
						<label for="exampleInputPassword1">Имя домена (URL)</label>
						<input type="text" class="form-control" name="urlwebsite" id="urlwebsite" value="URL вашего сайта">
				
				<!-- <hr>
				<label for="exampleInputPassword1">SSL сертификат (<i>HTTP://Ваш сайт, HTTPS://Ваш сайт</i>).</label>
				<select class="form-control" name="https" id="https">
					<option value="0">http</option>
					<option value="1">https</option>
				</select>
				<label for="exampleInputPassword1">Макет шаблона.</label>
				<select class="form-control" name="websitetheme" id="websitetheme">
					<?php for ($i = 0; $i != $terranThemeCount; $i++) { ?>
						<option value="<?= $i ?>"><?= $scanned_directory[$i] ?></option>
					<? } ?>
				</select>
				<label for="exampleInputPassword1">CRM Функционал.</label>
				<select class="form-control" name="websitecrmf" id="websitecrmf">
					<option value="0">Использовать</option>
					<option value="1">Не использовать</option>
				</select>
				<br>-->
				<br>
				<label for="exampleInputPassword1" style="font-family: monospace;">Секции управления сайта (по умолчанию: ВСЕ ВКЛЮЧЕНЫ), секции тип: меню, страницы, новости, каталог, кастомные</label><br>
				<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> Настроить секции ¶ </button> </p>
				 <div class="collapse" id="collapseExample">
					<div class="card card-body">

						Секции сайта, это базовый функционал который будет залежен в струкуре сайта, чем секций модудей вы включите тем выше будет нагрузка сайта на базу данных и на сервер, по этому используйте данный фунционал с умом, либо обратитесь к специалисту. <br> Техническая поддержка: <a href="https://asted.by">asted.by</a> хостинг: <a href="https://hatahost.by">hatahost.by</a>
						<hr>
						<label for="exampleInputPassword1">Секции меню.</label>
						<select class="form-control" name="modulemenu" id="modulemenu">
							<option value="0">Отключен</option>
							<option value="1" selected>Включены</option>
						</select>

						<label for="exampleInputPassword1">Секции страниц.</label>
						<select class="form-control" name="modulepages" id="modulepages">
							<option value="0">Отключен</option>
							<option value="1" selected>Включены</option>
						</select>

						<label for="exampleInputPassword1">Секции новостей.</label>
						<select class="form-control" name="modulenews" id="modulenews">
							<option value="0">Отключен</option>
							<option value="1" selected>Включены</option>
						</select>
						<label for="exampleInputPassword1">Секции каталог.</label>
						<select class="form-control" name="modulecatalog" id="modulecatalog">
							<option value="0">Отключен</option>
							<option value="1" selected>Включены</option>
						</select>
						<label for="exampleInputPassword1">Секции кастомный.</label>
						<select class="form-control" name="modulecustom" id="modulecustom">
							<option value="0">Отключен</option>
							<option value="1" selected>Включены</option>
						</select>

					</div>
				</div>
				</div>
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary"><?= $lang['save'] ?></button>

			</div>
		</div>
		<script>
			var terranswapre = / /gi;
			var terranswapredog = /@/gi;
			var terranswaprevosk = /!/gi;
			var terranswapreproc = /%/gi;
			var terranswaprebaks = /$/gi;
			var terranswaprereshetka = /#/gi;
			var terranswaprepili = /&/gi;
			var input = document.getElementById('urlwebsite');
			input.oninput = function() {
				var terrandomainnewstr = input.value.replace(terranswapre, '');
				var terrandomainnewstrq = terrandomainnewstr.replace(terranswapredog, '');
				var terrandomainnewstrw = terrandomainnewstrq.replace(terranswaprevosk, '');
				var terrandomainnewstre = terrandomainnewstrw.replace(terranswapreproc, '');
				var terrandomainnewstrr = terrandomainnewstre.replace(terranswaprebaks, '');
				var terrandomainnewstrt = terrandomainnewstrr.replace(terranswaprereshetka, '');
				var terrandomainnewstry = terrandomainnewstrt.replace(terranswaprepili, '');
				document.getElementById('urlwebsite').value = terrandomainnewstry;
			};
		</script>
		<span id="result"></span>


	<? } else { ?>
		<div class="alert alert-info" role="alert">
			<?= $lang['access_to_the_page_is_closed'] ?>
		</div>
	<? } ?>
</div>

<? include "templates/footer.php"; ?>