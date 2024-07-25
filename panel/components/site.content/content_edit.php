<? include "templates/header.php"; ?>
<link href="templates/css/site_content.css" rel="stylesheet">
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
		$updatename = $_POST['name'];
		$updateblock = $_POST['block'];
		$updatetype = $_POST['type'];
		if ($updatetype == 'text') {
			$updatecontent = $_POST['content'];
		} else {
			$updatecontent = $_POST['image'];
		}
		$updategalery = $_POST['galery'];
		$sql = "UPDATE crm_site_block SET galery='" . $updategalery . "',type='" . $updatetype . "',name='" . $updatename . "',block='" . $updateblock . "', content='" . $updatecontent . "' WHERE id='{$idcustom}'";
		if (mysqli_query($link, $sql)) {
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'content-edit/' . $_GET['id'] . '/1305/" />';
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
						Блок успешно обновлен
					</div>
				</div>
	<? }
		}
	} ?>

	<div class="globallasted">
		<div style="padding: 5px; border-bottom: 1px dashed rgb(131, 131, 131);"><a href="<?= $astedADM ?>content/" class="btsbackconedit">&#8647; Вернутся к списку всех блоков</a></div>
		<!-- <div style="padding: 5px;"><a href="site_content.php?id=<?= $_GET['block'] ?>" class="btsbackconedit">&#8647; Вернутся к родительскому блоку</a></div> -->
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить Блок:</h6>
		</div>
		<div class="card-body">
			<?
			$sql_custport = "SELECT * FROM `crm_site_block` WHERE id ='" . $idcustom . "'";
			$result_custport = mysqli_query($link, $sql_custport);
			while ($task = mysqli_fetch_assoc($result_custport)) {
				$name = "{$task['name']}";
				$block = "{$task['block']}";
				$content = "{$task['content']}";
				$id = "{$task['id']}";
				$type = "{$task['type']}";
				$galery = $task['galery'];

			?>
				<div class="personal_divisions-body">
					<div class="p-3 bg-gray-100">#ID <?= $id ?> <br> Название блока: <strong><?= $name ?></strong> <br>Логический код: <strong>{$BLOCK<?= $block ?>}
						</strong>
					</div>
				<? } ?>
				<hr>
				<h3>Обновить Блок:</h3>
				<form action="" method="post" enctype="multipart/form-data">
					<label for="name">Имя Блока:</label>
					<input type="text" class="form-control" name="name" id="name" value="<?= $name ?>">
					<label for="block">Логический Код:</label>
					<input type="text" class="form-control" name="block" id="block" value="<?= $block ?>">
					<label for="type">Тип блока</label>
					<select name="type" id="type" class="form-control">
						<option value="text">Текст</option>
						<option value="image">Изображение</option>
					</select><br>
					<span class="warningblocks <? if ($type == 'image') {
																									echo 'd-none';
																								} ?>" id="btnEdit">Нажмите для включения/выключения редактора</span>
					<textarea name="content" id="content_zxc" class="form-control astededitor <? if ($type == 'image') {
																									echo 'd-none';
																								} ?>" rows="3" placeholder="текст либо html-код"><?= $content ?></textarea>
					<div class="<? if ($type != 'image') {
									echo 'd-none';
								} ?>" id="image_zxc">
						<button class="form-control back-call">Выбрать изображения</button>
						<div class="gallery" id="gallery">
							<?
							$masgalery = explode(';', $galery);
							foreach ($masgalery as $key) {
								if (!empty($key)) {
									if ($key == $content) {
										echo '<div class="gallery-item glav" data-src="' . $key . '"><img src="' . $key . '"/></div>';
									} else {
										echo '<div class="gallery-item" data-src="' . $key . '"><img src="' . $key . '"/></div>';
									}
								}
							}
							?>
						</div>
						<input type="text" class="form-control d-none" name="image" value="<? if ($type == "image") {
																								echo $content;
																							} ?>">
						<input type="text" class="form-control d-none" name="galery" value="<?= $galery ?>">
					</div>
					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
				</div>
		</div>

	</div>
	<? include "components/site.modalImage/modalImg.php"; ?>
	<? include "templates/footer.php"; ?>
	<script>
		$(document).ready(function() {
			$('#type option[value=<?= $type ?>]').prop('selected', true);

		});
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

		let typeBlock = document.getElementById('type');
		let blockText = document.getElementById('content_zxc');
		let blockImage = document.getElementById('image_zxc');
		let warningblocks = document.querySelector('.warningblocks');
		typeBlock.addEventListener("change", function() {
			if (typeBlock.value == 'text') {
				blockText.classList.remove('d-none')
				warningblocks.classList.remove('d-none')
				blockImage.classList.add('d-none')
			} else {
				if (editorEnabled) {
					$('.astededitor').each(function() {
						CKEDITOR.instances[this.id].destroy();
					});
					editorEnabled = false;
				}
				blockText.classList.add('d-none')
				warningblocks.classList.add('d-none')
				blockImage.classList.remove('d-none')
			}
		});


		// function checkTypeAndInitialize() {
		// 	if (typeBlock.value === 'text') {
		// 		blockText.classList.remove('d-none');
		// 		blockImage.classList.add('d-none');
		// 		initializeCKEditors();
		// 	} else {
		// 		blockText.classList.add('d-none');
		// 		blockImage.classList.remove('d-none');
		// 		destroyCKEditors();
		// 	}
		// }

		// Остальной код для инициализации и уничтожения CKEditor остается без изменений


		// function initializeCKEditors() {
		// 	$('.astededitor').each(function() {
		// 		let ckeditorInstance = CKEDITOR.instances[this.id];
		// 		if (!ckeditorInstance) {
		// 			ckeditorInstance = CKEDITOR.replace(this, {
		// 				extraPlugins: 'uploadimage',
		// 			});
		// 			ckeditorInstances.push(ckeditorInstance);
		// 		}
		// 	});
		// }

		// function destroyCKEditors() {
		// 	ckeditorInstances.forEach(function(ckeditorInstance) {
		// 		ckeditorInstance.destroy();
		// 	});
		// 	ckeditorInstances = [];
		// }
	</script>