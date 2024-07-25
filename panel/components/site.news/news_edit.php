<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	$site_getobject = R::find('crm_site_news', 'id = ?', [$_GET['id']]);
	foreach ($site_getobject as $site_getobjects) {
		$forsection_product = $site_getobjects->forsection;
	}
	if ($_POST['submit'] == 'websiteadd') {
		$dateastedupdate = date("d.m.Y");
		$newsUpdate = R::load('crm_site_news', $_GET['id']);
		$newsUpdate['title'] = $_POST['title'];
		$newsUpdate['pageurl'] = $_POST['pageurl'];
		$newsUpdate['content'] = $_POST['content'];
		$newsUpdate['datepush'] = $_POST['datepush'];
		$newsUpdate['images'] = $_POST['image'];
		$newsUpdate['galery'] = $_POST['galery'];
		$newsUpdate['keywords'] = $_POST['keywords'];
		$newsUpdate['descriptions'] = $_POST['descriptions'];
		$fildAllAdd = R::find('crm_site_news_field', 'forsection = ?', [$forsection_product]);
        foreach ($fildAllAdd as $fildAllStarsadd) {
            $codeadd = $fildAllStarsadd->code;
            $newsUpdate[$codeadd] = $_POST[$codeadd];
        }
		if (R::store($newsUpdate)) {
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'news-edit/' . $_GET['id'] . '/1305/" />';
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
                    Новость успещно обновлена
					</div>
				</div>
	<? }
		}
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить новость:</h6>
		</div>
		<div class="card-body">
			<? $site_object = R::load('crm_site_news', $_GET['id']); ?>
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100"><?= $site_object['title'] ?> </div>
				<br>
			</div>

			<hr>
			<h3>Обновить новость:</h3>
			<form action="" method="post" enctype="multipart/form-data">
				<label for="exampleInputPassword1">Заголовок новости:</label>
				<input type="text" class="form-control" name="title" id="title" value="<?= $site_object['title'] ?>">
				<label for="content">Описание:</label><br>
				<span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
				<textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"><?= $site_object['content'] ?></textarea>
				<label for="exampleInputPassword1">Дата создания новости:</label>
				<input type="text" class="form-control" name="datepush" id="datepush" value="<?= $site_object['datepush'] ?>">
				<?php
                $fildAll = R::find('crm_site_news_field', 'forsection = ?', [$forsection_product]);
                foreach ($fildAll as $fildAllStars) {
                    $name = $fildAllStars->name;
                    $type = $fildAllStars->type;
                    $code = $fildAllStars->code;
                    $active = $fildAllStars->active;
					$site_productget = R::find('crm_site_news', 'id = ?', [$_GET['id']]);
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
				<br><button class="form-control back-call">Выбрать изображение</button>
				<div class="gallery" id="gallery">
					<?
					$masgalery = explode(';', $site_object['galery']);
					foreach ($masgalery as $key) {
						if (!empty($key)) {
							if ($key == $site_object['images']) {
								echo '<div class="gallery-item glav" data-src="' . $key . '"><img src="' . $key . '"/></div>';
							} else {
								echo '<div class="gallery-item" data-src="' . $key . '"><img src="' . $key . '"/></div>';
							}
						}
					}
					?>
				</div>
				<input type="text" class="form-control d-none" name="image" value="<?= $site_object['images'] ?>">
				<input type="text" class="form-control d-none sqlgallery" name="galery" value="<?= $site_object['galery'] ?>">
				<label for="exampleInputPassword1">Ссылка новости:</label>
				<input type="text" class="form-control" name="pageurl" id="pageurl" value="<?= $site_object['pageurl'] ?>">
				<label for="exampleInputPassword1">{ASTEDSEO} - Ключевые слова:</label>
				<input type="text" class="form-control" name="keywords" id="keywords" value="<?= $site_object['keywords'] ?>">
				<label for="exampleInputPassword1">{ASTEDSEO} - Описание:</label>
				<input type="text" class="form-control" name="descriptions" id="descriptions" value="<?= $site_object['descriptions'] ?>">
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
</script>