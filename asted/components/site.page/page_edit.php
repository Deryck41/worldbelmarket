<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$pagesUpdate = R::load('crm_site_pages', $_GET['id']);
		$pagesUpdate['name'] = $_POST['websitecustmpro'];
		$pagesUpdate['content'] = $_POST['websitecustmimg'];
		$pagesUpdate['pageurl'] = $_POST['weblink'];
		$pagesUpdate['keywords'] = $_POST['websitekeyword'];
		$pagesUpdate['descriptions'] = $_POST['websitedescription'];
		$pagesUpdate['dateupdate'] = date("d.m.Y");
		$pagesUpdate['parent'] = $_POST['parent'];
		if (R::store($pagesUpdate)) {
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'page-edit/' . $_GET['id'] . '/1305/" />';
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
						Asted Cloud: Страница успещно обновлена
					</div>
				</div>
	<? }
		}
	}
	if (isset($_POST["menu_id"])) {
		$menu_id = $_POST["menu_id"];
		$sql_lead_leadDeletesss = "DELETE FROM crm_site_pages WHERE id={$menu_id}";
		$result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить страницу:</h6>
		</div>
		<div class="card-body">
			<?
			$site_object = R::load('crm_site_pages', $_GET['id']);
			$title = $site_object['name'];
			$linkpage = $site_object['pageurl'];
			$forsection = $site_object['forsection'];
			$id = $site_object['id'];
			$imagess = $site_object['content'];
			$description = $site_object['descriptions'];
			$keywords = $site_object['keywords'];
			$type = $site_object['type'];
			$parent = $site_object['parent'];
			$site_pages = R::find('crm_site_pages', 'forsection = ?', [$forsection]);
			foreach ($site_pages as $site_page) {
				$option[] = '<option value="' . $site_page['id'] . '">' . $site_page['name'] . '</option>';
			}
			?>
			<div class="personal_divisions-body">
				<div class="p-3 bg-gray-100"><?= $title ?></div>
				<br>
				<script>
					$('.trashclick<?= $id ?>').click(function() {
						var menu_id = "<?= $id ?>";
						$.ajax({
							url: '/asted/pages/',
							method: 'post',
							dataType: 'html',
							data: {
								menu_id
							},
							success: function() {
								parent.history.back();
								return false;

							}
						});
					});
				</script>
			</div>
			<hr>
			<h3>Обновить страницу:</h3>
			<?php if ($type == "code") { ?>
				<div class="alert alert-danger">ВНИМАНИЕ: Данная страница имеет уникальнкую структуру дизайна и использует логический код-астед, и редактируется только через контетные блоки либо через шаблон (обратитесь к разрабочику: asted.by), при этом вы можите менять остальные значения страницы
				<a href="/asted/content/<?=$idcustom?>/">редактировать страницу</a>.
				</div>
			<? } ?>
			<form action="" method="post">
				<label for="exampleInputPassword1">Заголовок страницы:</label>
				<input type="text" class="form-control" name="websitecustmpro" id="websitecustmpro" value="<?= $title ?>">
				<label for="exampleInputPassword1">Дескрипшен:</label>
				<input type="text" class="form-control" name="websitedescription" id="websitedescription" value="<?= $description ?>">
				<label for="exampleInputPassword1">Ключевики:</label>
				<input type="text" class="form-control" name="websitekeyword" id="websitekeyword" value="<?= $keywords ?>">
				<label for="parent">Родитель</label>
				<select class="form-control" name="parent" id="parent">
					<option value="0">Выберите(если нужно)</option>
					<?
					foreach ($option as $key) {
						echo $key;
					}
					?>
				</select><br>
				<?php if ($type != "code") { ?>
					<label for="exampleInputPassword1">Контент:</label>
					<textarea rows="10" cols="45" class="form-control astededitor" name="websitecustmimg" id="websitecustmimg"><?= $imagess ?></textarea>
				<? } ?>
				<label for="exampleInputPassword1">Ссылка страницы:</label>
				<input type="text" class="form-control" name="weblink" id="weblink" value="<?= $linkpage ?>">
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
		</div>
	</div>

</div>

<? include "templates/footer.php"; ?>
<script>
	$('.astededitor').each(function() {
		CKEDITOR.replace(this, {
			extraPlugins: 'uploadimage',
		});
	});
	$('#parent option[value=<?=$parent ?>]').prop('selected', true);
</script>