<? include "templates/header.php"; ?>
<div class="container-fluid">
	<?php
	$_GET['id'];
	// $sectonconnection = R::load('crm_site_section', [1]);
	$websiteconnection = R::load('crm_site', 1); ?>
	<?php
	if (isset($_POST["menu_id"])) {
		R::hunt('crm_site_mailing', 'id = ?', [$_POST["menu_id"]]);
	}
	?>
	<div class="card shadow mb-4">
		<div class="card-header py-3 download-db">
			<h6 class="m-0 font-weight-bold text-primary">Рассылка <?= $sectonconnection['namesection'] ?> <?= $websiteconnection['namesite'] ?>:</h6>
			<!-- <a href="site_catalog.php?id=<?= $_GET['id'] ?>&result=1312"><button id="btn_vigruzka" type="button" class="btn btn-primary">Выгрузить базу</button></a> -->
		</div>
		<div class="card-body">
			<?
			$site_objects = R::find('crm_site_mailing', ' ORDER BY id DESC');
			foreach ($site_objects as $site_object) {
			?>
				<div class="personal_divisions-body">
					<div class="row">
						<div class="col-11">
							<div class="content d-flex justify-content-between align-items-center">
								<div class="p-3">
									#<?= $site_object['id'] ?> -<?= $site_object['title'] ?>
								</div>
							</div>

						</div>
						<div class="col-1">
							<div class="personal_divisions-icon">
								<i class="fas fa-fw fa-trash trashclick<?= $site_object['id'] ?>" value="<?= $site_object['id'] ?>" style="float: right;"></i>
							</div>
						</div>
					</div>
					<script>
						$('.trashclick<?= $site_object['id'] ?>').click(function() {
							let confirmation = confirm("Вы уверены, что хотите удалить?");
							if (confirmation) {
								var menu_id = "<?= $site_object['id'] ?>";
								$.ajax({
									url: '/asted/mailing/',
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
		</div>
	</div>
</div>
<? include "templates/footer.php"; ?>