<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$categoryUpdate = R::load('crm_site_catalog_category', $_GET['id']);
		$categoryUpdate['images'] = $_POST['image'];
		$categoryUpdate['galery'] = $_POST['galery'];
		$categoryUpdate['name'] = $_POST['title'];
		$categoryUpdate['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_catalog_category', $_GET['id']);
		$categoryUpdate['content'] = $_POST['content'];
		$categoryUpdate['keywords'] = $_POST['keywords'];
		$categoryUpdate['descriptions'] = $_POST['descriptions'];
		if (R::store($categoryUpdate)) {
			echo '<meta http-equiv="refresh" content="0;URL=/panel/category-edit/' . $_GET['id'] . '/1305/" />';
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
			$site_object = R::load('crm_site_catalog_category', $_GET['id']);
			$id = $site_object['id'];
			$name = $site_object['name'];
			$level = $site_object['level'];
			$link = $site_object['pageurl'];
			$images = $site_object['images'];
			$galery = $site_object['galery'];
			$content = $site_object['content'];
			$keywords = $site_object['keywords'];
			$descriptions = $site_object['descriptions'];
			$main = $site_object['main'];
			?>
			<div class="personal_divisions-body">
				<div class="row">
					<?php if (!empty($images)) {
						$form = explode('.', $site_object['images']);
						switch (end($form)) {
							case "docx":
								$formImages = '/panel/uploads/plugins/docx.webp';
								break;
							case "doc":
								$formImages = '/panel/uploads/plugins/docx.webp';
								break;
							case "mov":
								$formImages = '/panel/uploads/plugins/mov.webp';
								break;
							case "pdf":
								$formImages = '/panel/uploads/plugins/pdf.webp';
								break;
							case "xlsx":
								$formImages = '/panel/uploads/plugins/xlsx.webp';
								break;
							default:
								$formImages = $site_object['images'];
								break;
						} ?>
						<div class="col-1">
							<img src="<?= $formImages ?>" style="width: 32px; height: 32px;  margin: 8px;">
						</div>
					<? } ?>

					<div class="<?php if (!empty($images)) { ?>col-7<? } else { ?>col-8<? } ?>">
						<a href="https://<?= $websiteconnection['siteurl'] ?>/catalog/<?= $link ?>/" target="blank" style="font-size: 14px;color: currentcolor;"><?= $name ?></a>
						<div style="font-size: 12px;"><?= $link ?></div>
					</div>
				</div>
				<hr>
				<h3>Обновить категорию:</h3>
				<form action="" method="post" enctype="multipart/form-data">
					<label for="exampleInputPassword1">Имя :</label>
					<input type="text" class="form-control" name="title" id="title" value="<?= $name ?>">
					<label for="content">Описание:</label><br>
					<span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
					<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"><?= $content ?></textarea>
					<!-- <label for="exampleInputPassword1">Ссылка:</label>
					<input type="text" class="form-control" name="pageurl" id="pageurl" value="<?= $link ?>"> -->
					<!-- <label for="content">Описание</label>
					<textarea name="content" id="content" class="form-control astededitor" cols="30" rows="10" placeholder="текст или html-код"><?= $content ?></textarea> -->
					<!-- <br><button class="form-control back-call multiple">Выбрать Изображение</button>
						<div class="gallery" id="gallery">
							<?
							$masgalery = explode(';', $galery);
							foreach ($masgalery as $key) {
								if (!empty($key)) {
									$form = explode('.', $key);
									switch (end($form)) {
										case "docx":
											$formImages = '/panel/uploads/plugins/docx.webp';
											break;
										case "doc":
											$formImages = '/panel/uploads/plugins/docx.webp';
											break;
										case "mov":
											$formImages = '/panel/uploads/plugins/mov.webp';
											break;
										case "pdf":
											$formImages = '/panel/uploads/plugins/pdf.webp';
											break;
										case "xlsx":
											$formImages = '/panel/uploads/plugins/xlsx.webp';
											break;
										default:
											$formImages = $site_object['images'];
											break;
									}
									if ($key == $images) {
										echo '<div class="gallery-item glav" data-src="' . $key . '"><img src="' . $formImages . '"/></div>';
									} else {
										echo '<div class="gallery-item" data-src="' . $key . '"><img src="' . $formImages . '"/></div>';
									}
								}
							}
							?>
						</div>
						<input type="text" class="form-control d-none" name="image" value="<?= $images ?>">
						<input type="text" class="form-control d-none sqlgallery" name="galery" value="<?= $galery ?>">
						<label for="keywords">Ключевые слова:</label>
						<input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую" value="<?= $keywords ?>">
						<label for="descriptions">Дискрипшен:</label>
						<input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="ключевой текст" value="<?= $descriptions ?>"> -->

					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
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
	<script>
		$('#main option[value=<?= $main ?>]').prop('selected', true);
	</script>