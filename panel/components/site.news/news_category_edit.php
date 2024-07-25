<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$updatestmpro = $_POST['title'];
		$updateimages = $_POST['link'];
		$tourl = makeUrlCode($_POST['websitecustmpro']);
		$sql = "UPDATE crm_site_news_category SET name='" . $updatestmpro . "', link='" . $updateimages . "' WHERE id='{$idcustom}'";
		if (mysqli_query($link, $sql)) {
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'news-category-edit/' . $_GET['id'] . '/1305/" />';
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
						Категория успещно обновлена
					</div>
				</div>
	<? }
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить категорию:</h6>
		</div>
		<div class="card-body">
			<?
			$sql_custport = "SELECT * FROM `crm_site_news_category` WHERE id ='" . $idcustom . "'";
			$result_custport = mysqli_query($link, $sql_custport);
			while ($task = mysqli_fetch_assoc($result_custport)) {
				$title = "{$task['name']}";
				$link = "{$task['link']}";
				$forsection = "{$task['forsection']}";

				$id = "{$task['id']}";

			?>
				<div class="personal_divisions-body">
					<div class="p-3 bg-gray-100">#ID <?= $id ?> <br> Название категории: <strong><?= $title ?></strong> <br>Ссылка: <strong><?= $link ?>
						</strong>
					</div>
				<? } ?>
				<hr>
				<h3>Обновить категорию:</h3>
				<form action="" method="post">
					<label for="exampleInputPassword1">Имя ссылки:</label>
					<input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">

					<label for="exampleInputPassword1">Ссылка:</label>
					<input type="text" class="form-control" name="link" id="link" value="<?= $link ?>">
					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
				</div>
		</div>

	</div>

	<? include "templates/footer.php"; ?>