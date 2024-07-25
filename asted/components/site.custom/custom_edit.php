<? include "templates/header.php"; ?>
<style>
	.warningblocks {
		cursor: pointer;
		padding: 4px;
		border: 1px solid red;
		font-size: 12px;
		background: rgb(102, 47, 47);
		color: white;
		width: 30%;
		margin-top: 5px;
		margin-bottom: 20px;
	}
</style>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$customUpdate = R::load('crm_site_custom', $_GET['id']);
		$customUpdate['type'] = $_POST['type'];
		$customUpdate['sort'] = $_POST['sort'];
		$customUpdate['title'] = $_POST['title'];
		$customUpdate['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_custom', $_GET['id']);
		$customUpdate['content'] = $_POST['content'];
		$customUpdate['images'] = $_POST['image'];
		$customUpdate['galery'] = $_POST['galery'];
		$customUpdate['document'] = $updateDocument;
		$customUpdate['keywords'] = $_POST['keywords'];
		$customUpdate['description'] = $_POST['description'];
		$customUpdate['main'] = $_POST['main'];
		$customUpdate['contentmain'] = $_POST['contentmain'];
		if (R::store($customUpdate)) {
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
			$galery = $site_object['galery'];
			$images = $site_object['images'];
			$pageurl = $site_object['pageurl'];
			$keywords = $site_object['keywords'];
			$descriptions = $site_object['descriptions'];
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
				<? if ($site_object['forsection'] == 3  || $site_object['forsection'] == 6 ) { ?>
					<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="<?= htmlspecialchars($site_object['title']) ?>">
					<label for="exampleInputPassword1">Контент:</label><br>
					<span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
					<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"><?= $site_object['content'] ?></textarea>
					<br><label for="sort">Сортировка</label>
					<input class="form-control" type="text" name="sort" id="sort" value="<?= $site_object['sort'] ?>">
				<? } ?>
				<input type="submit" name="submit" style="display:none" value="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
		</div>
	</div>

</div>

<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
	let editorEnabled = false;
	document.getElementById('btnEdit').addEventListener('click', function() {
		if (!editorEnabled) {
			$('.astededitor').each(function() {
				CKEDITOR.replace(this, {
					extraPlugins: 'uploadimage',
					extraAllowedContent: '*[*]{*}(*)'
				});
			});
			editorEnabled = true;
		} else {
			$('.astededitor').each(function() {
				CKEDITOR.instances[this.id].destroy();
			});
			editorEnabled = false;
		}
	});
</script>