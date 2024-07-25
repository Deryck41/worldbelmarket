<? include "templates/header.php";
//Asted Group: Add
if ($_POST['submit'] == 'newsadd') {
	//print_r($_POST);
	$addtitle = $_POST['titleadd'];
	$addtext = $_POST['editor'];
	$subuser = serialize($_POST['subuser']);
	$grouppublic = $_POST['grouppublic'];
	$subeditoradmin = $_POST['editor2'];
	$userIDGroup =  $_POST['usergroup'];
	$groupDatecreat = date("d.m.Y");
	$finaldate = $_POST['birthday'];
	$sql = "INSERT INTO `" . $TerranPrefix . "group` (group_title, group_description, group_users, group_views, group_wiki, group_subuser, group_public, group_datecreat, group_datefinal, group_inform) VALUES 
	('{$addtitle}','{$addtext}','{$userIDGroup}','1','Wiki content not create', '{$subuser}', '{$grouppublic}', '{$groupDatecreat}', '{$finaldate}', '{$subeditoradmin}')";
	if (mysqli_query($link, $sql)) {
		echo '<meta http-equiv="refresh" content="0;URL=/asted/projects/1305/" />';
	} else {
		echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
      Asted: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
  </div></div>';
	}
}
//Asted Group: Delete
if (isset($_POST["menu_id"])) {
	$menu_id = $_POST["menu_id"];
	$sql_lead_leadDeletesss = "DELETE FROM " . $TerranPrefix . "group WHERE id={$menu_id}";
	$result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
}
if (isset($_POST["projects_id"])) {
	$projecttheupdate = $_POST["projects_id"];
	$sql_lead_leadStatus = "UPDATE " . $TerranPrefix . "group SET group_public='2' WHERE id='{$projecttheupdate}'";
	$result_lead = mysqli_query($link, $sql_lead_leadStatus);
}
if (isset($_POST["reprojects_id"])) {
	$projecttheupdate = $_POST["reprojects_id"];
	$sql_lead_leadStatus = "UPDATE " . $TerranPrefix . "group SET group_public='1' WHERE id='{$projecttheupdate}'";
	$result_lead = mysqli_query($link, $sql_lead_leadStatus);
}
if (is_numeric($_GET['id'])) {
	if (isset($_GET['id'])) {
		if ($_GET['id'] == '0513') {
?>
			<div class="container-fluid">
				<div class="alert alert-success add-task" role="alert">
					Asted: группа успешно востановлена!
				</div>
			</div>
		<? }
	}
}
if (is_numeric($_GET['id'])) {
	if (isset($_GET['id'])) {
		if ($_GET['id'] == '1997') {
		?>
			<div class="container-fluid">
				<div class="alert alert-success add-task" role="alert">
					Asted: группа успешно добавлена!
				</div>
			</div>
		<? }
	}
}
if (is_numeric($_GET['id'])) {
	if (isset($_GET['id'])) {
		if ($_GET['id'] == '1305') {
		?>
			<div class="container-fluid">
				<div class="alert alert-success add-task" role="alert">
					Asted: группа успешно добавлена!
				</div>
			</div>
		<? }
	}
}
if (is_numeric($_GET['id'])) {
	if (isset($_GET['id'])) {
		if ($_GET['id'] == '1991') { ?>
			<div class="container-fluid">
				<div class="alert alert-success" role="alert">
					Asted: группа успешно удалена!
				</div>
			</div>
<? }
	}
} ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?= $lang['projects'] ?></h1>
		<a data-toggle="modal" data-target="#myModal" href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?= $lang['add_project'] ?></a>
		<a href="./projects_setting.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-cogs fa-sm text-white-50"></i> Настройки проектов</a>
	</div>


	<? include "core/section/addproject.php"; ?>
	<!-- Content Row -->
	<div class="row">
		<!-- Content Column -->
		<div class="col-lg-12 mb-4">
			<?
			if ($groupContResult == null) { ?>
				<div class="alert alert-success" role="alert">
					Asted: Не одной группы не создано!
				</div>
			<? }
			for ($newsCont = 0; $newsCont < $groupContResult; $newsCont++) {
			?>
				<script>
					$(document).ready(function() {
						$(".opencomment<?= $newsResult[$newsCont]['id'] ?>").click(function() {
							$(".showcomment<?= $newsResult[$newsCont]['id'] ?>").css({
								'display': 'block'
							});
							$(".opencomment<?= $newsResult[$newsCont]['id'] ?>").css({
								'display': 'none'
							});
							$(".terranbtnlike<?= $newsResult[$newsCont]['id'] ?>").css({
								'display': 'none'
							});
						});
					});
				</script>
			<?php
				$groupsubAuthorX = unserialize($groupResult[$newsCont]['group_subuser']);
				//Asted Group: Include
				if ($userGroupsCanviewProject['0'] == "true") {
					include "core/view_project.php";
				} else {
					if ($groupResult[$newsCont]['group_public'] == "0" or $groupResult[$newsCont]['group_users'] == $userID) {
						include "core/view_project.php";
					}
				}
			} ?>
		</div>
	</div>
</div>
<? include "templates/footer.php"; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js" integrity="sha512-j7/1CJweOskkQiS5RD9W8zhEG9D9vpgByNGxPIqkO5KrXrwyDAroM9aQ9w8J7oRqwxGyz429hPVk/zR6IOMtSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     