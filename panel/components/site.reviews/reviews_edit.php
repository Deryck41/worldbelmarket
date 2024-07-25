<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$idcustom = $_GET['id'];
	if ($_POST['submit'] == 'websiteadd') {
		$review = R::load('crm_site_reviews', $idcustom);
		$review['title'] = $_POST['title'];
		$review['content'] = $_POST['content'];
		$review['datepush'] = $_POST['datepush'];
		$review['status'] = $_POST['status'];
		if (R::store($review)) {
			echo '<meta http-equiv="refresh" content="0;URL=/asted/reviews-edit/' . $_GET['id'] . '/" />';
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Обновить</h6>
		</div>
		<div class="card-body">
			<?
			$site_object = R::load('crm_site_reviews', $_GET['id']);
			?>
			<div class="personal_divisions-body">
				<div class="row">
					<div class="col-12">
						<div class="content d-flex justify-content-between align-items-center">
							<div class="p-3">
								#<?= $site_object['id'] ?> -<?= $site_object['title'] ?><br>
								<p><?= $site_object['content'] ?></p>
							</div>
						</div>

					</div>
				</div>
			</div>
			<hr>
			<h3>Обновить <?= $site_object['title'] ?></h3>
			<form action="" method="post" enctype="multipart/form-data">
				<label for="title">Имя:</label>
				<input type="text" class="form-control" name="title" id="title" placeholder="Название" value="<?= $site_object['title'] ?>">
				<label for="content">Отзыв:</label>
				<textarea name="content" id="content" class="form-control" rows="3" placeholder="текст либо html-код"><?= $site_object['content'] ?></textarea>
				<label for="datepush">Дата:</label>
				<input type="text" class="form-control" name="datepush" id="datepush" placeholder="16.07.2020" value="<?= $site_object['datepush'] ?>">
				<label for="status">Статус</label>
				<select name="status" id="status" class="form-control">
					<option value="done">Опубликован</option>
					<option value="draft">Черновик</option>
				</select>
				<input type="submit" name="submit" style="display:none" value="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
			</form><br>
			<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
		</div>
	</div>

</div>

<? include "templates/footer.php"; ?>
<script>
	$('#status option[value=<?= $site_object['status'] ?>]').prop('selected', true);
</script>