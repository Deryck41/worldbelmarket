<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$site_object = R::load('crm_site_catalog_filter', $_GET['id']);
	if ($_POST['submit'] == 'websiteadd') {
		$filterUpdate = R::load('crm_site_catalog_filter', $_GET['id']);
		$filterUpdate['name'] = $_POST['name'];
		$filterUpdate['category'] = implode(",", $_POST['category']);
		if (R::store($filterUpdate)) {
			echo '<meta http-equiv="refresh" content="0;URL=/panel/category-filter-edit/' . $_GET['id'] . '/" />';
		} else {
			echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
		}
	}
	if (empty($site_object['parent'])) {
		$allCategory = R::find('crm_site_catalog_category', 'level=1 and forcatalog=?', [$site_object['forcatalog']]);
		foreach ($allCategory as $value) {
			$categoryOption .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
		}
		$mascategory = explode(',', $site_object['category']);
		if (!empty($site_object['category'])) {
			for ($i = 0; $i < count($mascategory); $i++) {
				$scriptcategory .= "$('#category option[value=" . $mascategory[$i] . "]').prop('selected', true);";
			}
		}
		echo '<div style="padding: 5px;"><a href="/panel/category-filter/' . $site_object['forcatalog'] . '/" class="btsbackconedit">&#8647; Вернутся</a></div>';
	} else {
		$site_objectMain = R::load('crm_site_catalog_filter', $site_object['parent']);
		echo '<div style="padding: 5px;"><a href="/panel/category-filter/' . $site_object['parent'] . '/filvalue/" class="btsbackconedit">&#8647; Вернутся</a></div>';
	}
	?>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить категорию:</h6>
		</div>
		<div class="card-body">
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100">#ID <?= $site_object['id'] ?> <br>
					<? if (empty($site_object['parent'])) {
						echo 'Название филтра: <strong>' . $site_object['name'] . '</strong>';
					} else {
						echo 'Название филтра: <strong>' . $site_objectMain['name'] . '</strong><br>фильтр: <strong>' . $site_object['name'] . '</strong>';
					} ?>
				</div>
				<hr>
				<h3>Обновить категорию:</h3>
				<form action="" method="post">
					<label for="exampleInputPassword1">фильтр:</label>
					<input type="text" class="form-control" name="name" id="name" value="<?= $site_object['name'] ?>">
					<? if (empty($site_object['parent'])) { ?>
						<label for="category">Выберите категории к которым будет относится фильтр<br>(Для мультивыбора зажмите "Ctrl"):</label>
						<select class="form-control responsible mb-3" name="category[]" id="category" multiple>
							<?= $categoryOption ?>
						</select>
					<? } ?>

					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
			</div>
		</div>

	</div>

	<? include "templates/footer.php"; ?>
	<script>
		<?= $scriptcategory ?>
		var select = document.getElementById("category");
		select.style.height = (select.scrollHeight) + "px";
	</script>