<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$updatestmpro = $_POST['title'];
		$updateimages = $_POST['link'];
		$sortupdate = $_POST['sortupdate'];
		$updatecms = $_POST['websitecustmcms'];
		$updatedate = $_POST['websitecustmdate'];
		$updatejob = $_POST['websitecustmjob'];
		$updatestatusic = $_POST['statusic'];
		$tourl = makeUrlCode($_POST['websitecustmpro']);
		$sql = "UPDATE crm_site_menu SET title='" . $updatestmpro . "', link='" . $updateimages . "', sort='" . $sortupdate . "' WHERE id='{$idcustom}'";
		if (mysqli_query($link, $sql)) {
			//header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
			echo '<meta http-equiv="refresh" content="0;URL=/panel/menu-edit/' . $_GET['id'] . '/1305/" />';
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
						Меню успещно обновлено
					</div>
				</div>
	<? }
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить меню:</h6>
		</div>
		<div class="card-body">
			<?
			$site_object = R::load('crm_site_menu', $_GET['id']);
			$title = $site_object['title'];
			$link = $site_object['link'];
			$sortmenu = $site_object['sort'];
			$forsection = $site_object['forsection'];
			$id = $site_object['id'];

			?>
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100">#ID <?= $id ?> <br> Название меню: <strong><?= $title ?></strong> <br>Ссылка: <strong><?= $link ?>
					</strong><br>Сортировка: <strong><?= $sortmenu ?>
					</strong>
				</div>
				<hr>
				<h3>Обновить меню:</h3>
				<form action="" method="post">
					<label for="exampleInputPassword1">Имя ссылки:</label>
					<input type="text" class="form-control" name="title" id="title" value="<?= $title ?>">
					<label for="exampleInputPassword1">Ссылка:</label>
					<input type="text" class="form-control" name="link" id="link" value="<?= $link ?>">
					<label for="exampleInputPassword1">Сортировка:</label>
					<input type="text" class="form-control" name="sortupdate" id="sortupdate" value="<?= $sortmenu ?>">
					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
			</div>
		</div>

	</div>

	<? include "templates/footer.php"; ?>