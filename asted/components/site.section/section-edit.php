<? include "templates/header.php"; ?>
<div class="container-fluid">
<?php
			$site_object = R::load('crm_site_section', $_GET['id']);
			$title = $site_object['namesection'];
			$websitemodule = $site_object['websitemodule'];

			if($websitemodule == "catalog"){
	$idcustom = $_GET['id'];
	$catalogConfigs = R::find('crm_site_catalog_config', 'forsection = ?', [$idcustom]);
	foreach ($catalogConfigs as $catalogConfig) {
		$category = $catalogConfig->category;
	}
}
	print_r($findsection->namesection);
	if ($_POST['submit'] == 'websiteadd') {
		$updatenamesection = $_POST['title'];
		$tourl = makeUrlCode($_POST['websitecustmpro']);
		$sql = "UPDATE crm_site_section SET namesection='" . $updatenamesection . "' WHERE id='{$idcustom}'";
		if (mysqli_query($link, $sql)) {
			if($_POST['categorystatus'] != null){
				// Находим первую запись, где forsection равно $id
				$catalogConfig = R::findOne('crm_site_catalog_config', 'forsection = ?', [$idcustom]);

				// Обновляем поле category, если запись найдена
				if ($catalogConfig) {
					$catalogConfig->category = $_POST['categorystatus'];
					R::store($catalogConfig);
				} else {
					echo "Запись с forsection = $id не найдена.";
				}}

			//header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
			echo '<meta http-equiv="refresh" content="0;URL=/asted/section-edit/' . $_GET['id'] . '/1305/" />';
		} else {
			echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
		}
	}
	if (is_numeric($_GET['result'])) {
		if (isset($_GET['result'])) {
			if ($_GET['result'] == '1305') {
	?>
				<div class="container-fluid">
					<div class="alert alert-success" role="alert">
						Asted Cloud: Секция успещно обновлена
					</div>
				</div>
	<? }
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить секцию:</h6>
		</div>
		<div class="card-body">
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100">#ID <?= $id ?> <br> Название Секции: <strong><?= $title ?></strong>
				</div>
				<hr>
				<h3>Обновить секцию:</h3>
				<form action="" method="post">
					<label for="exampleInputPassword1">Имя секции:</label>
					<input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
					<?php if($websitemodule == "news"){?>
					<br>
       <a href="/asted/section-news-field/<?=$_GET['id']?>/"> <strong class="btnseo" style="
    border: 1px dotted;
    padding: 2px;
"> > Настроить произвольные поля для секции новостей < </strong> </a><br><br>
					<?php } if($websitemodule == "catalog"){?>
						<br>
       <a href="/asted/section-catalog-field/<?=$_GET['id']?>/"> <strong class="btnseo" style="
    border: 1px dotted;
    padding: 2px;
"> > Настроить произвольные поля для секции каталога < </strong> </a><br><br>
					<br>
        <strong class="btnseo" style="
    border: 1px dotted;
    padding: 2px;
"> КАТЕГОРИИ КАТАЛОГА <i class="mdi mdi-shape-plus-outline"></i></strong><br><br>
<select class="form-control responsible mb-3" name="categorystatus" id="categorystatus">
                    <option value="false">Не показывать</option>
                    <option value="true" <?php if($category == "true"){echo 'selected';}?>>Показывать</option>
                                    </select>
                                    <br>
<?}?>

					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
			</div>
		</div>

	</div>

	<link href="/asted/templates/css/icons.css" rel="stylesheet">
	<? include "templates/footer.php"; ?>