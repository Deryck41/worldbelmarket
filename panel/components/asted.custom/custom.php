<? include "templates/header.php"; ?>
<style>
	.custom-file-label {
		color: #555;
	}
</style>
<script>
	tinymce.init({
		selector: '.astededitor',
		language: '<?= $lang['lang'] ?>',
		toolbar: 'image',
		images_upload_url: '/asted/core/postAcceptor.php',
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'image imagetools',
			'insertdatetime media table paste imagetools wordcount'
		],
	});
</script>
<div class="container-fluid">
	<?php
	$_GET['id'];
	$sectonconnection = R::load('crm_site_section', $_GET['id']);
	$websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
	if ($_POST['submit'] == 'websiteadd') {
		$uploaddir = './uploads/';
		$uploadfile = $uploaddir . basename(makeImgName(date("Ydmhis") . $_FILES['image']['name']));
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
		$uploadfile = $uploaddir . basename(makeImgName(date("Ydmhis") . $_FILES['document']['name']));
		move_uploaded_file($_FILES['document']['tmp_name'], $uploadfile);
		$countfiles = count($_FILES['galery']['name']);
		for ($i = 0; $i < $countfiles; $i++) {
			$filename = makeImgName(date("Ydmhis") . $_FILES['galery']['name'][$i]);
			move_uploaded_file($_FILES['galery']['tmp_name'][$i], './uploads/' . $filename);
			if (!empty($_FILES['galery']['name'][$i])) {
				$filenameser[] = makeImgName(date("Ydmhis") . $_FILES['galery']['name'][$i]);
			}
		}
		if (empty($_POST['pageurl'])) {
			$addpageurl = makeUrlCode($_POST['title']);
		} else {
			$addpageurl = makeUrlCode($_POST['pageurl']);
		}
		$addgalery = serialize($filenameser);
		if (!empty($_FILES['image']['name'])) {
			$addimage = makeImgName(date("Ydmhis") . $_FILES['image']['name']);
		}
		if (!empty($_FILES['document']['name'])) {
			$adddocument = makeImgName(date("Ydmhis") . $_FILES['document']['name']);
		}
		$addcontent = str_replace('../../../core/../', '/asted/', $_POST['content']);
		$sql = "INSERT INTO `crm_site_custom` (forsection, title, pageurl, content, images, galery, keywords, description,document,main,contentmain) VALUES ('{$_GET['id']}','{$_POST['title']}','{$addpageurl}','{$addcontent}','{$addimage}','{$addgalery}','{$_POST['keywords']}','{$_POST['description']}','{$adddocument}','{$_POST['main']}','{$_POST['contentmain']}')";
		if (mysqli_query($link, $sql)) {
			echo '<meta http-equiv="refresh" content="0;URL="/asted/custom/' . $_GET['id'] . '/1305/" />';
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
						Asted Cloud: успешно добавлена
					</div>
				</div>
	<? }
		}
	} ?>
	<?php
	if (isset($_POST["menu_id"])) {
		R::hunt('crm_site_custom', 'id = ?', [$_POST["menu_id"]]);
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3 download-db">
			<h6 class="m-0 font-weight-bold text-primary"><?= $sectonconnection['namesection'] ?> <?= $websiteconnection['namesite'] ?>:</h6>
			<!-- <a href="site_catalog.php?id=<?= $_GET['id'] ?>&result=1312"><button id="btn_vigruzka" type="button" class="btn btn-primary">Выгрузить базу</button></a> -->
		</div>
		<div class="card-body">
			<?
			$site_objects = R::find('crm_site_custom', 'forsection = ?', [$_GET['id']]);
			foreach ($site_objects as $site_object) {
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
					<div class="personal_divisions-icon">
						<i class="fas fa-fw fa-trash trashclick<?= $site_object['id'] ?>" value="<?= $site_object['id'] ?>" style="float: right;"></i> <a href="/asted/custom-edit/<?= $site_object['id'] ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $site_object['id'] ?>" style="float: right;"></i></a>
					</div>
					<br>
					<script>
						$('.trashclick<?= $site_object['id'] ?>').click(function() {
							let confirmation = confirm("Вы уверены, что хотите удалить?");
							if (confirmation) {
								var menu_id = "<?= $site_object['id'] ?>";
								$.ajax({
									url: '/asted/custom/',
									method: 'post',
									dataType: 'html',
									data: {
										menu_id
									},
									success: function() {
										location.reload();
									}
								});
							}
						});
					</script>
				</div>
			<? } ?>
			<hr>
			<h3>Добавить новый объект для <?= $sectonconnection['namesection'] ?> <?= $websiteconnection['namesite'] ?>:</h3>
			<form action="" method="post" enctype="multipart/form-data">
				<!-- <label for="exampleInputPassword1">Название:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Название">
				<hr class="hidemenugeneration">
				<input type="text" class="form-control hidemenugeneration" name="pageurl" id="pageurl" placeholder="Ссылка">
				<input type="checkbox" id="checkbox"> Прописать ссылку на меню вручную
				<small id="emailHelp" class="form-text text-muted">Если не установлена галочка, <strong>ссылка</strong> меню будет автоматический сгенерированна</small>
				<label for="exampleInputPassword1">Контент:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код"></textarea> -->
				<? if ($_GET['id'] == 5) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название">
					<label for="exampleInputPassword1">Контент:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код"></textarea>';
				} ?>
				<? if ($_GET['id'] == 6 || $_GET['id'] == 7) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название">
					<label for="document">Документ</label><br>
					<input type="file" class="form-control" name="document" id="document">';
				} ?>
				<? if ($_GET['id'] == 8) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название">
					<label for="exampleInputPassword1">Контент:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код"></textarea>
				<label for="exampleInputPassword1"> Изображение</label><br>
				<input type="file" class="form-control" name="image" id="image"><br>';
				} ?>
				<? if ($_GET['id'] == 9) {
					echo '<label for="exampleInputPassword1">Название:</label>
					<input type="text" class="form-control" name="title" id="title" placeholder="Название">
				<label for="exampleInputPassword1"> Изображение</label><br>
				<input type="file" class="form-control" name="image" id="image"><br>';
				} ?>
				<!-- <label for="exampleInputPassword1"> Изображение</label><br>
				<input type="file" class="form-control" name="image" id="image"><br>
				<label for="galery">Галерея Изображений:</label><br>
				<input type="file" class="form-control" name="galery[]" id="galery" multiple><br>
				<label for="document">Документ(при добавление документа в конце описания появится кнопка скачать)</label><br>
				<input type="file" class="form-control" name="document" id="document"><br>
				<hr>
				<style>
					.btnseo {
						background: #323537;
						color: white;
						padding: 4px;
					}
				</style>
				<strong class="btnseo"> Настройки SEO <i class="fas fa-fw fa-bullhorn"></i></strong><br><br>
				<label for="exampleInputPassword1">Ключевые слова:</label>
				<input type="text" class="form-control" name="keywords" id="keywords" value="слова что повторяються на странице и которые важные через запятую">
				<label for="exampleInputPassword1">Дискрипшен:</label>
				<input type="text" class="form-control" name="description" id="description" value="ключевой текст">
				</select> -->
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить</button>

		</div>
	</div>


	<? ?>
</div>

<? include "templates/footer.php"; ?>
<script>
	$('.hidemenugeneration').hide(0);
	$('#checkbox').click(function() {
		if ($(this).is(':checked')) {
			$('.hidemenugeneration').show(100);
		} else {
			$('.hidemenugeneration').hide(100);
		}
	});
</script>