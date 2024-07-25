<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$uploaddir = './uploads/';
		$uploadfile = $uploaddir . basename(makeImgName(date("Ydmhis") . $_FILES['image']['name']));
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
		$uploadfiledoc = $uploaddir . basename(makeImgName(date("Ydmhis") . $_FILES['document']['name']));
		move_uploaded_file($_FILES['document']['tmp_name'], $uploadfiledoc);
		$countfiles = count($_FILES['galery']['name']);
		for ($i = 0; $i < $countfiles; $i++) {
			$filename = makeImgName(date("Ydmhis") . $_FILES['galery']['name'][$i]);
			move_uploaded_file($_FILES['galery']['tmp_name'][$i], './uploads/' . $filename);
			if (!empty($_FILES['galery']['name'][$i])) {
				$filenameser[] = makeImgName(date("Ydmhis") . $_FILES['galery']['name'][$i]);
			}
		}
		$updateImage = makeImgName(date("Ydmhis") . $_FILES['image']['name']);
		if (empty($_FILES['image']['name'])) {
			$updateImage = $_POST['imagexx'];
		}
		$updateDocument = makeImgName(date("Ydmhis") . $_FILES['document']['name']);
		if (empty($_FILES['document']['name'])) {
			$updateDocument = $_POST['documentxx'];
		}
		$updateGalery = serialize($filenameser);
		if (strlen($updateGalery) < 20) {
			$updateGalery = $_POST['galeryxx'];
		}
		$updatetitle = $_POST['title'];
		$updatepageurl = $_POST['weblink'];
		$updatecontent = $_POST['content'];
		$updatedocument = $_POST['document'];
		$updatekeywords = $_POST['keywords'];
		$updatedescription = $_POST['description'];
		$updatemain = $_POST['main'];
		$updatecontentmain = $_POST['contentmain'];
		$tourl = makeUrlCode($_POST['websitecustmpro']);
		$sql = "UPDATE crm_site_custom SET title ='" . $updatetitle . "',pageurl ='" . $updatepageurl . "',content ='" . $updatecontent . "',images ='" . $updateImage . "',galery ='" . $updateGalery . "',document ='" . $updateDocument . "',keywords ='" . $updatekeywords . "',description ='" . $updatedescription . "',main ='" . $updatemain . "',contentmain='" . $updatecontentmain . "' WHERE id='{$idcustom}'";
		if (mysqli_query($link, $sql)) {
			//header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
			echo '<meta http-equiv="refresh" content="0;URL=/asted/custom-edit/' . $_GET['id'] . '/" />';
		} else {
			echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить</h6>
		</div>
		<div class="card-body">
			<?
			$site_object = R::load('crm_site_custom', $_GET['id']);
			?>
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100">#<?= $site_object['id'] ?> -<?= $site_object['title'] ?>
					<?
					if (!empty($site_object['keywords'])) {
						echo '<br>Ключевые слова: ' . $site_object['keywords'];
					}
					if (!empty($site_object['description'])) {
						echo '<br>Дискрипшен: ' . $site_object['description'];
					}
					?>
				</div>
			</div>
			<hr>
			<h3>Обновить <?= $site_object['title'] ?></h3>
			<form action="" method="post" enctype="multipart/form-data">
				<? if ($site_object['forsection'] == 5) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="' . $site_object['title'] . '">
					<label for="exampleInputPassword1">Контент:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код">' . $site_object['content'] . '</textarea>';
				} ?>
				<? if ($site_object['forsection'] == 6 || $site_object['forsection'] == 7) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="' . $site_object['title'] . '">
					<label for="document">Документ</label><br>
					<input type="file" class="form-control" name="document" id="document">
				<input type="text" style="display:none" name="documentxx" id="documentxx" value="' . $site_object['document'] . '">';
				} ?>
				<? if ($site_object['forsection'] == 8) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="' . $site_object['title'] . '">
					<label for="exampleInputPassword1">Контент:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код">' . $site_object['content'] . '</textarea>
				<label for="exampleInputPassword1"> Изображение</label><br>
				<input type="file" class="form-control" name="image" id="image"><br>
				<input type="text" style="display:none" name="imagexx" id="imagexx" value="'.$site_object['images'].'">';
				} ?>
				<? if ($site_object['forsection'] == 9) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="' . $site_object['title'] . '">
				<label for="exampleInputPassword1"> Изображение</label><br>
				<input type="file" class="form-control" name="image" id="image"><br>
				<input type="text" style="display:none" name="imagexx" id="imagexx" value="'.$site_object['images'].'">';
				} ?>
				<input type="submit" name="submit" style="display:none" value="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
		</div>
	</div>

</div>

<? include "templates/footer.php"; ?>
<? if ($site_object['forsection'] == 3 || $site_object['forsection'] == 7) { ?>
	<script>
		$('#main option[value=<?= $site_object['main'] ?>]').prop('selected', true);
	</script>
<? } ?>