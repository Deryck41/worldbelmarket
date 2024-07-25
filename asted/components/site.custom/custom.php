<? include "templates/header.php"; ?>

<div class="container-fluid">
	<?php
	$sectonconnection = R::load('crm_site_section', $_GET['id']);
	$websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
	if ($_GET['result'] == "pod") {
		$parent_object = R::load('crm_site_custom', $_GET['id']);
	}
	if ($_POST['submit'] == 'websiteadd') {
		if (empty($_POST['sort'])) {
			$sort = 500;
		} else {
			$sort = $_POST['sort'];
		}
		$customAdd = R::xdispense('crm_site_custom');
		if (!empty($parent_object)) {
			$customAdd['parent'] = $parent_object['pageurl'];
		} else {
			$customAdd['forsection'] = $_GET['id'];
		}
		$customAdd['harka'] = $_POST['harka'];
		$customAdd['price'] = $_POST['price'];
		$customAdd['pricenew'] = $_POST['pricenew'];
		$customAdd['title'] = $_POST['title'];
		$customAdd['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_custom', 0);
		$customAdd['content'] = $_POST['content'];
		$customAdd['images'] = $_POST['image'];
		$customAdd['galery'] = $_POST['galery'];
		$customAdd['keywords'] = $_POST['keywords'];
		$customAdd['description'] = $_POST['description'];
		$customAdd['document'] = $adddocument;
		$customAdd['main'] = $_POST['main'];
		$customAdd['contentmain'] = $_POST['contentmain'];
		$customAdd['sort'] = $sort;
		// $customAdd['type'] = $_POST['type'];
		if (R::store($customAdd)) {
			if (!empty($parent_object)) {
				echo '<meta http-equiv="refresh" content="0;URL="/asted/custom/' . $_GET['id'] . '/pod/" />';
			} else {
				echo '<meta http-equiv="refresh" content="0;URL="/asted/custom/' . $_GET['id'] . '/1305/" />';
			}
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
	if (!empty($parent_object)) {
		echo ' <div class="globallasted">
		<div style="padding: 5px; border-bottom: 1px dashed rgb(131, 131, 131);"><a href="' . $astedADM . 'custom/' . $parent_object['forsection'] . '/" class="btsbackconedit">&#8647; Вернутся назад</a></div>
	  </div>';
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3 download-db">
			<h6 class="m-0 font-weight-bold text-primary"><? if (!empty($parent_object)) {
																echo "Объекты " . $parent_object['title'];
															} else {
																echo $sectonconnection['namesection'] . " " . $websiteconnection['namesite'];
															} ?>:</h6>
		</div>
		<div class="card-body">
			<?
			if (!empty($parent_object)) {
				$site_objects = R::find('crm_site_custom', 'parent = ?', [$parent_object['pageurl']]);
			} else {
				$site_objects = R::find('crm_site_custom', 'forsection = ?', [$_GET['id']]);
			}
			foreach ($site_objects as $site_object) {
			?>
				<div class="personal_divisions-body">
					<div class="row">
						<?php if (!empty($site_object['images'])) {
							$form = explode('.', $site_object['images']);
							switch (end($form)) {
								case "docx":
									$formImages = '/asted/uploads/plugins/docx.webp';
									break;
								case "doc":
									$formImages = '/asted/uploads/plugins/docx.webp';
									break;
								case "mov":
									$formImages = '/asted/uploads/plugins/mov.webp';
									break;
								case "pdf":
									$formImages = '/asted/uploads/plugins/pdf.webp';
									break;
								case "xlsx":
									$formImages = '/asted/uploads/plugins/xlsx.webp';
									break;
								default:
									$formImages = $site_object['images'];
									break;
							} ?>
							<div class="col-1 bg-gray-100" style="position: relative;padding-bottom: 8.5%;">
								<a href="<?= $site_object['images'] ?>"><img src="<?= $formImages ?>" style="position: absolute;width: 100%;height: 100%;top: 0;left: 0;object-fit: contain;"></a>
							</div>
						<? } ?>

						<div class="<?php if (!empty($site_object['images'])) { ?>col-10<? } else { ?>col-11<? } ?>">
							<div class="content d-flex justify-content-between align-items-center">
								<div class="p-3">

									#<?= $site_object['id'] ?> -<? if ($_GET['id'] == 10 && $_GET['result'] != "pod") {
																	echo '<a href="/asted/custom/' . $site_object['id'] . '/pod/" style="font-size: 14px;color: currentcolor;">' . $site_object['title'] . '</a>';
																} else {
																	echo $site_object['title'];
																} ?>
									<? if (!empty($site_object['keywords'])) {
										echo '<br>Ключевые слова: ' . $site_object["keywords"] . '';
									} ?>
									<? if (!empty($site_object['description'])) {
										echo '<br>Дискрипшен: ' . $site_object["description"] . '';
									} ?>
									<? if (!empty($site_object['sort'])) {
										echo '<br>Сортировка: ' . $site_object["sort"] . '';
									} ?>
									<? if (!empty($site_object['type'])) {
										echo '<br>Тип: ' . $site_object["type"] . '';
									} ?>
								</div>


							</div>

						</div>
						<div class="col-1">
							<div class="personal_divisions-icon">
								<i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $site_object['id'] ?>,'custom')" value="<?= $site_object['id'] ?>" style="float: right;"></i> <a href="/asted/custom-edit/<?= $site_object['id'] ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $site_object['id'] ?>" style="float: right;"></i></a>
							</div>
						</div>
					</div>
				</div>
				<hr>
			<? } ?>
			<hr>
			<h3>Добавить новый объект для <? if (!empty($parent_object)) {
												echo $parent_object['title'];
											} else {
												echo $sectonconnection['namesection'] . " " . $websiteconnection['namesite'];
											} ?></h3>
			<form action="" method="post" enctype="multipart/form-data">
				<?
				if ($_GET['result'] != "pod") {
					if ($_GET['id'] == 6 || $_GET['id'] == 3) {
						echo '<label for="exampleInputPassword1">Название:</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Название">
						<label for="content">Описание:</label><br>
						<span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
						<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
						<label for="sort">Сортировка</label>
						<input class="form-control" type="text" name="sort" id="sort" value="500">';
					}
				} else {
					echo '<label for="title">Название:</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Название">
						<hr class="hidemenugeneration">
						<input type="text" class="form-control hidemenugeneration" name="pageurl" id="pageurl" placeholder="Ссылка меню">
						<input class="mr-2" type="checkbox" id="checkbox"><label for="checkbox">Прописать ссылку вручную</label>
						<small id="emailHelp" class="form-text text-muted">Если не установлена галочка, <strong>ссылка</strong> будет автоматический сгенерированна</small><br>
						<label for="content">Контент:</label>
						<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
						<label for="content">Характеристики:</label>
						<textarea name="harka" id="harka" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
						<label for="price">Цена:</label>
						<input type="text" class="form-control" name="price" id="price">
						<label for="pricenew">Цена на скидке:</label>
						<input type="text" class="form-control" name="pricenew" id="pricenew">
					<br><button class="form-control back-call multiple">Выбрать изображения</button>
					<div class="gallery" id="gallery">
					</div>
					<input type="text" class="form-control d-none" name="image">
					<input type="text" class="form-control d-none" name="galery">
					<label for="exampleInputPassword1">Ключевые слова:</label>
					<input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую">
					<label for="exampleInputPassword1">Дискрипшен:</label>
					<input type="text" class="form-control" name="description" id="description" placeholder="ключевой текст">
					<br><label for="sort">Сортировка</label>
					<input class="form-control" type="text" name="sort" id="sort" value="500">';
				}
				?>
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
				CKEDITOR.dtd.$removeEmpty.span = false
				CKEDITOR.dtd.$removeEmpty.i = false
			});
			editorEnabled = true;
		} else {
			$('.astededitor').each(function() {
				CKEDITOR.instances[this.id].destroy();
			});
			editorEnabled = false;
		}
	});

	$('.hidemenugeneration').hide(0);
	$('#checkbox').click(function() {
		if ($(this).is(':checked')) {
			$('.hidemenugeneration').show(100);
		} else {
			$('.hidemenugeneration').hide(100);
		}
	});
</script>