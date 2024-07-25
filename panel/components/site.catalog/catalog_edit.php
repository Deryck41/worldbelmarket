<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$site_getobject = R::find('crm_site_catalog', 'id = ?', [$_GET['id']]);
	foreach ($site_getobject as $site_getobjects) {
		$forsection_product = $site_getobjects->forsection;
	}
	$site_object = R::load('crm_site_catalog', $_GET['id']);
	if ($_POST['submit'] == 'websiteadd') {
		$catalogUpdate = R::load('crm_site_catalog', $_GET['id']);
		$clearmascategory = array_diff($_POST['category'], array(0));
		$catalogUpdate['title'] = $_POST['title'];
		$catalogUpdate['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_catalog', $_GET['id']);
		$catalogUpdate['keywords'] = $_POST['keywords'];
		$catalogUpdate['descriptions'] = $_POST['descriptions'];
		$catalogUpdate['content'] = $_POST['content'];
		$catalogUpdate['images'] = $_POST['image'];
		$catalogUpdate['category'] = end($clearmascategory);
		$catalogUpdate['galery'] = $_POST['galery'];
		$catalogUpdate['price'] = $_POST['price'];
		$catalogUpdate['filter'] = $_POST['filter'];
		$fildAllAdd = R::find('crm_site_catalog_field', 'forsection = ?', [$forsection_product]);
        foreach ($fildAllAdd as $fildAllStarsadd) {
            $codeadd = $fildAllStarsadd->code;
            $catalogUpdate[$codeadd] = $_POST[$codeadd];
        }
		if (R::store($catalogUpdate)) {
			echo '<meta http-equiv="refresh" content="0;URL=/panel/catalog-edit/' . $_GET['id'] . '/1305/" />';
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
                    Товар успещно обновлен
					</div>
				</div>
	<? }
		}
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить товар:</h6>
		</div>
		<div class="card-body">
			<?
			$site_category = R::find('crm_site_catalog_category', 'forcatalog = ?', [$site_object['forsection']]);
			foreach ($site_category as $category) {
				if ($category['level'] == 1) {
					$category1 .= '<option data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
				}
				if ($category['level'] == 2) {
					$category2 .= '<option data-child="cat-' . $category['parent'] . '" data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
				}
				if ($category['level'] == 3) {
					$category3 .= '<option data-child="cat-' . $category['parent'] . '" data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
				}
			}
			$id = $site_object['id'];
			$title = $site_object['title'];
			$pageurl = $site_object['pageurl'];
			$keywords = $site_object['keywords'];
			$descriptions = $site_object['descriptions'];
			$forsection = $site_object['forsection'];
			$forwebsite = $site_object['forwebsite'];
			$content = $site_object['content'];
			$price = $site_object['price'];
			$sort = $site_object['sort'];
			$images = $site_object['images'];
			$galery = $site_object['galery'];
			$filter = $site_object['filter'];
			$main = $site_object['main'];
			$pricenew = $site_object['pricenew'];
			$category = $site_object['category'];
			$price = $site_object['price'];
			?>
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100"><?= $title ?> </div>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<label for="title">Имя Товара:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Название товара" value="<?= $title ?>">
				<label for="content">Описание:</label><br>
				<span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
				<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"><?= $content ?></textarea>
				<!-- <label for="price">Цена</label> -->
				<!-- <input type="text" class="form-control" name="price" id="price" placeholder="8 б.р" value="<?= $price ?>"> -->
				<label for="CategoryLevel1">Категории каталога:</label>
				<select class="form-control responsible mb-3 category-select" name="category[]" id="CategoryLevel1">
					<option data-cat="default" value="0">Выберите категорию</option>
					<?= $category1 ?>
				</select>
				 <select class="form-control responsible mb-3 category-select d-none" name="category[]" id="CategoryLevel2">
					<option data-cat="default" value="0">Выберите категорию</option>
					<?= $category2 ?>
				</select>
				<!--<select class="form-control responsible mb-3 category-select d-none" name="category[]" id="CategoryLevel3">
					<option data-cat="default" value="0">Выберите категорию</option>
					<?= $category3 ?>
				</select> -->
				<!-- <label for="filter">Акционный товар</label>
				<select name="filter" id="filter" class="form-control">
					<option value="0">Нет</option>
					<option value="1">Да</option>
				</select> -->
				<?php
                $fildAll = R::find('crm_site_catalog_field', 'forsection = ?', [$forsection_product]);
                foreach ($fildAll as $fildAllStars) {
                    $name = $fildAllStars->name;
                    $type = $fildAllStars->type;
                    $code = $fildAllStars->code;
                    $active = $fildAllStars->active;
					$site_productget = R::find('crm_site_catalog', 'id = ?', [$_GET['id']]);
					foreach ($site_productget as $site_productgets) {
						$forsection_result = $site_productgets->$code;
					}
                    if($active == "true"){
                        if($type == "input"){?>
                <label for="<?=$name?>"><?=$name?>:</label>
                <input type="text" class="form-control" name="<?=$code?>" id="<?=$code?>" value="<?=$forsection_result?>">
                        <?}
                        if($type == "textarea"){?>
                 <label for="<?=$name?>"><?=$name?>:</label><br>
                 <span class="warningblocks btnEdit" id="btnEdit">Нажмите для включения/выключения редактора</span>
                <textarea name="<?=$code?>" id="<?=$code?>" class="form-control astededitor" rows="3" placeholder="<?=$forsection_result?>"><?=$forsection_result?></textarea>
                       <? }
					   if($type == "file"){?>
						<br><button class="form-control back-call"><?=$name?></button>
						 <div class="gallery" id="gallery">
						 </div>
						 <input type="text" class="form-control d-none" name="image<?=$code?>">
						 <input type="text" class="form-control d-none sqlgallery" name="galery<?=$code?>">
						<? }
                    }
                }
    ?>
				<br><button class="form-control back-call ">Выбрать изображения</button>
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
									$formImages = $key;
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
				<!-- <label for="pageurl">Ссылка Товара:</label>
				<input type="text" class="form-control" name="pageurl" id="pageurl" value="<?= $pageurl ?>">
				<label for="keywords">Ключевые слова:</label>
				<input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую" value="<?= $keywords ?>">
				<label for="descriptions">Дискрипшен:</label>
				<input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="ключевой текст" value="<?= $descriptions ?>"> -->
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
		</div>
	</div>

</div>
<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
	// $(document).ready(function() {
	// 	$('#filter option[value=<?= $filter ?>]').prop('selected', true);

	// });
    let editorEnabled = false;

    document.querySelectorAll('.btnEdit').forEach(function(btn) {
    btn.addEventListener('click', function() {
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
});
	$(document).ready(function() {
		const categorySelects = document.querySelectorAll(".category-select");
		const category = "<?= end(explode(';', $category)) ?>";

		function showSelectedCategory(select, value) {
			let options = select.options;
			for (var i = 0; i < options.length; i++) {
				if (options[i].value === value) {
					select.classList.remove('d-none');
					options[i].selected = true;
					if (options[i].dataset.child) {
						let childCategory = options[i].dataset.child;
						categorySelects.forEach(function(nextSelect) {
							let nextOptions = nextSelect.options;
							for (var j = 0; j < nextOptions.length; j++) {
								if (nextOptions[j].dataset.cat === childCategory) {
									showSelectedCategory(nextSelect, nextOptions[j].value);
									break;
								}
							}
						});
					}
					break;
				}
			}
		}

		categorySelects.forEach(function(select) {
			showSelectedCategory(select, category);
		});
	});
	const sel1 = document.getElementById("CategoryLevel1");
	const sel2 = document.getElementById("CategoryLevel2");
	// const sel3 = document.getElementById("CategoryLevel3");
	let sel2Option = sel2.querySelectorAll('option')
	// let sel3Option = sel3.querySelectorAll('option')
	sel1.addEventListener("change", function() {
		let atrib = sel1.options[sel1.selectedIndex].dataset.cat;
		let count = 0;
		sel2.querySelector('[data-cat="default"]').selected = true;
		// sel3.querySelector('[data-cat="default"]').selected = true;
		// sel3.classList.add('d-none');
		sel2Option.forEach(function(e) {
			if (e.dataset.child != atrib) {
				e.classList.add('d-none');
			}
			if (e.dataset.child == atrib) {
				e.classList.remove('d-none');
				count++;
			}
			if (e.dataset.child == 'default') {
				e.classList.remove('d-none');

			}
		})
		console.log(count);
		if (count == '0') {
			sel2.classList.add('d-none');
		} else {
			sel2.classList.remove('d-none');
		}
	});
	// sel2.addEventListener("change", function() {
	// 	let atrib = sel2.options[sel2.selectedIndex].dataset.cat;
	// 	let count = 0;
	// 	sel3.querySelector('[data-cat="default"]').selected = true;
	// 	sel3Option.forEach(function(e) {
	// 		if (e.dataset.child != atrib) {
	// 			e.classList.add('d-none');
	// 		}
	// 		if (e.dataset.child == atrib) {
	// 			e.classList.remove('d-none');
	// 			count++;
	// 		}
	// 		if (e.dataset.child == 'default') {
	// 			e.classList.remove('d-none');
	// 		}
	// 	})
	// 	if (count == '0') {
	// 		sel3.classList.add('d-none');

	// 	} else {
	// 		sel3.classList.remove('d-none');
	// 	}
	// });
</script>