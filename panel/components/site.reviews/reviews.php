<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$_GET['id'];
	// $sectonconnection = R::load('crm_site_section', [1]);
	$websiteconnection = R::load('crm_site', 1);
	if ($_POST['submit'] == 'websiteadd') {
		$reviewAdd = R::xdispense('crm_site_reviews');
		$reviewAdd['title'] = $_POST['title'];
		$reviewAdd['content'] = $_POST['content'];
		$reviewAdd['datepush'] = $_POST['datepush'];
		$reviewAdd['status'] = 'done';
		if (R::store($reviewAdd)) {
			echo '<meta http-equiv="refresh" content="0;URL=/asted/reviews/' . $_GET['id'] . '/1305/" />';
		} else {
			echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
		}
	}
	if (isset($_POST["menu_id"])) {
		R::hunt('crm_site_reviews', 'id = ?', [$_POST["menu_id"]]);
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3 download-db">
			<h6 class="m-0 font-weight-bold text-primary">Отзывы<?= $sectonconnection['namesection'] ?> <?= $websiteconnection['namesite'] ?>:</h6>
			<!-- <a href="site_catalog.php?id=<?= $_GET['id'] ?>&result=1312"><button id="btn_vigruzka" type="button" class="btn btn-primary">Выгрузить базу</button></a> -->
		</div>
		<div class="card-body">
			<?
			$site_objects = R::find('crm_site_reviews', ' ORDER BY (status = "new") DESC, id DESC');
			foreach ($site_objects as $site_object) {
			?>
				<div class="personal_divisions-body">
					<div class="row">
						<div class="col-11">
							<div class="content d-flex justify-content-between align-items-center">
								<div class="p-3">
									#<?= $site_object['id'] ?> -<?= $site_object['title'] ?>
									<p><?= $site_object['content'] ?></p>
								</div>
								<div class="marker">
									<?php if ($site_object['status'] == 'new') { ?>
										<div>Новый</div>
									<? } ?>
									<?php if ($site_object['status'] == 'draft') { ?>
										<div>Черновик</div>
									<? } ?>
									<?php if ($site_object['status'] == 'done') { ?>
										<div>Опубликован</div>
									<? } ?>
								</div>
							</div>

						</div>
						<div class="col-1">
							<div class="personal_divisions-icon">
								<i class="fas fa-fw fa-trash trashclick<?= $site_object['id'] ?>" value="<?= $site_object['id'] ?>" style="float: right;"></i> <a href="/asted/reviews-edit/<?= $site_object['id'] ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $site_object['id'] ?>" style="float: right;"></i></a>
							</div>
						</div>
					</div>
					<script>
						$('.trashclick<?= $site_object['id'] ?>').click(function() {
							let confirmation = confirm("Вы уверены, что хотите удалить?");
							if (confirmation) {
								var menu_id = "<?= $site_object['id'] ?>";
								$.ajax({
									url: '/asted/reviews/',
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
			<h3>Добавить новый отзыв для <?= $websiteconnection['namesite'] ?>:</h3>
			<form action="" method="post" enctype="multipart/form-data">
				<label for="title">Имя Товара:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Название товара">
				<label for="content">Описание:</label><br>
				<textarea name="content" id="content" class="form-control " rows="3" placeholder="текст либо html-код"></textarea>
				<label for="datepush">Дата:</label>
				<input type="text" class="form-control" name="datepush" id="datepush" placeholder="16.07.2020" value="<?= date("d.m.Y"); ?>">
				<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить отзыв на сайт</button>
		</div>
	</div>
</div>
<? include "templates/footer.php"; ?>