<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$_GET['id'];
	?>
	<?php
	$sectonconnection = R::load('crm_site_section', $_GET['id']);
	$websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
	$dateastedpush = date("d.m.Y");
	$dateastedupdate = date("d.m.Y");
	if ($_POST['submit'] == 'websiteadd') {
		if (empty($_POST['websitepagesurl'])) {
			$tourl = makeUrlCode($_POST['websitepagestitle']);
		} else {
			$tourl = makeUrlCode($_POST['websitepagesurl']);
		}
		$tourl = generateUniqueTourl($tourl,'crm_site_pages');
		$pagesAdd = R::xdispense('crm_site_pages');
		$pagesAdd['name'] = $_POST['websitepagestitle'];
		$pagesAdd['pageurl'] = $tourl;
		$pagesAdd['keywords'] = $_POST['websitepageskeywords'];
		$pagesAdd['descriptions'] = $_POST['websitepagesdescription'];
		$pagesAdd['forsection'] = $_GET['id'];
		$pagesAdd['forwebsite'] = $sectonconnection['forwebsite'];
		$pagesAdd['content'] = $_POST['contentpages'];
		$pagesAdd['type'] = $_POST['pagetype'];
		$pagesAdd['datepush'] = $dateastedpush;
		$pagesAdd['dateupdate'] = $dateastedupdate;
		$pagesAdd['parent'] = $_POST['parent'];
		if (R::store($pagesAdd)) {
			echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'pages/' . $_GET['id'] . '/1305/" />';
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
						Страница успещно добавлена
					</div>
				</div>
	<? }
		}
	} ?>
	<?php
	if (isset($_POST["menu_id"])) {
		R::hunt('crm_site_pages', 'id = ?', [$_POST["menu_id"]]);
	}
	?>
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $sectonconnection['namesection'] ?></h1>
	</div>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Список страниц сайта <?= $websiteconnection['namesite'] ?>:</h6>
		</div>
		<div class="card-body">
			<?
			$site_objects = R::find('crm_site_pages', 'forsection = ?', [$_GET['id']]);
			foreach ($site_objects as $site_object) {
				$title = $site_object['name'];
				$urlforsite = $site_object['pageurl'];
				$id = $site_object['id'];
				$data = $site_object['keywords'];
				$cms = $site_object['descriptions'];
				$pagetype = $site_object['type'];
				$option[] = '<option value="' . $id . '">' . $title . '</option>';
			?>
				<div class="personal_divisions-body">

					<div class="p-3 bg-gray-100">#<?= $id ?>- <a href="http://<?= $websiteconnection['siteurl'] ?>/<?= $urlforsite ?>/"><?= $title ?></a>
						<div style="
    padding: 12px;
    margin: 6px;
    width: fit-content;
    font-size: 12px;
    border: 1px dotted #c8c8c8;
">
						<?php	if($data == null AND  $cms == null){
							echo '<i class="fas fa-fw fa-bullhorn"></i> SEO: Ключевые слова и дискрипшен, не заданы!';
						}else{?>
						<br>Ключевые слова <i>(Keywords)</i>: <? if($data == null){echo "не прописано";}else{echo $data;} ?>
						<br>Дискрипшен <i>(Descriptions)</i>: <? if($cms == null){echo "не прописано";}else{echo $cms;} ?> 
						<?}?>
					</div>
						<?php if ($pagetype == "code") { ?>
							<div class="alert alert-danger mb-0" style="font-size: 11px;">ВНИМАНИЕ: Данная страница имеет уникальнкую структуру дизайна и использует логический код, и редактируется только через контетные блоки либо через шаблон (обратитесь к разрабочику), при этом вы можите менять остальные значения страницы:
						<a href="/panel/content/<?=$id?>/">редактировать страницу</a>.
						</div>
						<? } ?>
					</div>
					<div class="personal_divisions-icon">
						<i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $id?>,'pages')" value="<?= $id ?>" style="float: right;"></i> <a href="<?= $astedADM ?>page-edit/<?= $id ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
					</div>
					<br>
				</div>
			<? } ?>
			<hr>
			<h3>Создать новую страницу для <?= $websiteconnection['namesite'] ?>:</h3>
			<form action="" method="post">
				<label for="exampleInputPassword1">Имя страницы:</label>
				<input type="text" class="form-control" name="websitepagestitle" id="websitepagestitle" placeholder="Название страницы">
				<hr class="hidemenugeneration">
				<input type="text" class="form-control hidemenugeneration" name="websitepagesurl" id="websitepagesurl" placeholder="Ссылка меню">
				<input type="checkbox" id="checkbox"> Прописать ссылку на меню вручную
				<small id="emailHelp" class="form-text text-muted">Если не установлена галочка, <strong>ссылка</strong> меню будет автоматический сгенерированна</small>


				<select class="form-control group" name="pagetype">
					<option id="zxc" value="pages">HTML - Станица</option>
					<option id="zxc1" value="code">Логический код</option>
				</select>
				<label for="parent">Родитель</label>
				<select class="form-control" name="parent" id="parent">
					<option value="0">Выберите(если нужно)</option>
					<?
					foreach ($option as $key) {
						echo $key;
					}
					?>
				</select><br>

				<div id="contents">
					<label for="exampleInputPassword1">Текст страницы:</label>
					<textarea name="contentpages" id="contentpages" class="form-control astededitor" rows="10" cols="80" placeholder="текст либо html-код"></textarea>
				</div>
				<hr>
				<style>
					.btnseo {
						background: #323537;
						color: white;
						padding: 4px;
					}
				</style>

				<strong class="btnseo"> Настройки SEO <i class="fas fa-fw fa-bullhorn"></i></strong><br><br>
				
				<label for="exampleInputPassword1">Ключевые слова <i>(Keywords)</i>:</label>
				<input type="text" class="form-control" name="websitepageskeywords" id="websitepageskeywords" placeholder="Слова что повторяються на странице и имеют важное значение, прописывать через запятую">
				<label for="exampleInputPassword1">Дискрипшен <i>(Descriptions)</i>:</label>
				<input type="text" class="form-control" name="websitepagesdescription" id="websitepagesdescription" placeholder="Ключевой текст, для индексации поисковиками и подключаемых снипитов">
				</select>
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить страницу на сайт</button>

		</div>
	</div>


	<? ?>
</div>
<? include "templates/footer.php"; ?>
<script>
	$('.astededitor').each(function() {
		CKEDITOR.replace(this, {
			extraPlugins: 'uploadimage',
		});
	});
</script>
<script>
	$('.hidemenugeneration').hide(0);
	$('#checkbox').click(function() {
		if ($(this).is(':checked')) {
			$('.hidemenugeneration').show(100);
		} else {
			$('.hidemenugeneration').hide(100);
		}
	});
	$('#websitepagestitles').addClass("d-none");
	window.setInterval(function() {
		if ($('select[name=pagetype]').val() == "pages") {
			$('#contents').removeClass("d-none");
		} else {
			$('#contents').addClass("d-none");
		}
		if ($('select[name=pagetype]').val() == "code") {
			$('#websitepagestitles').removeClass("d-none");
		} else {
			$('#websitepagestitles').addClass("d-none");

		}
	}, 100);
</script>