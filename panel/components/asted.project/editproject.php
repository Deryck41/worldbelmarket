<? include "templates/header.php";
$idnews = $_GET['id'];

$sql_news = "SELECT * FROM `crm_group` WHERE id ='" . $idnews . "'";
$result_news = mysqli_query($link, $sql_news);
$newsforedit = mysqli_fetch_assoc($result_news);

//print_r($newsforedit);
?>
<script src="templates/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: '#editor',
		language: '<?= $lang['lang'] ?>',
		toolbar: 'image',
		images_upload_url: 'core/postAcceptor.php',
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'image imagetools',
			'insertdatetime media table paste imagetools wordcount'
		],
	});
</script>
<?
if (isset($_POST['submit'])) {
	$updateTitle = $_POST['titleadd'];
	$updateText = $_POST['editor'];
	$group_users = $_POST['group_users'];
	$group_public = $_POST['grouppublic'];
	$group_galery = $_POST['galery'];
	$group_datefinal = $_POST['birthday'];
	$group_price = $_POST['price'];
	$group_stage = $_POST['stage'];
	$subuser = serialize($_POST['subuser']);
	$group_inform = $_POST['inform'];
	$sqlUloadAva = "UPDATE crm_group SET group_stage='" . $group_stage . "',group_price='" . $group_price . "',group_datefinal='" . $group_datefinal . "',group_galery='" . $group_galery . "',group_description='" . $updateText . "',   group_users='" . $group_users . "', group_title='" . $updateTitle . "', group_public='" . $group_public . "', group_subuser='" . $subuser . "', group_inform='" . $group_inform . "' WHERE id='{$idnews}'";
	$resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=/asted/project-edit/' . $idnews . '/1305/" />';
}
if (is_numeric($_GET['id'])) {
	if (isset($_GET['id'])) {
		if ($_GET['id'] == '1305') {
?>
			<div class="container-fluid">
				<div class="alert alert-success" role="alert">
					Asted: <?= $lang['the_group_was_successfully_updated'] ?>
				</div>
			</div>
<? }
	}
} ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h5 style="background: #39383c;color: white; border-radius: 33px;padding: 4px; font-size: 14px;">  Вернутся в проект: &#8594;<a href="/asted/project/<?= $newsforedit['id'] ?>/" style="color: rgb(88, 221, 255);"> <?= $newsforedit['group_title'] ?></a> &#8592;</h5>
		<h1 class="h3 mb-0 text-gray-800"><?= $lang['editing_a_group'] ?>:</h1>
		</div>
	<?php if($userGroupsProjectCanEditProject['0'] == "true"){ ?>
	<form method="post" action="">
		<label for="titleadd"><?= $lang['heading'] ?>:</label>
		<input placeholder="<?= $newsforedit['group_title'] ?>" value="<?= $newsforedit['group_title'] ?>" class="form-control" name="titleadd" id="titleadd" type="тема">
		<label for="editor"><?= $lang['text'] ?>:</label>
		<textarea name="editor" id="editor" rows="10" cols="80"><?= $newsforedit['group_description'] ?></textarea>
		<label for="inputBirthday">Крайний срок</label>
		<input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="" value="<?= $newsforedit['group_datefinal'] ?>">
		<?php if($userGroupsProjectVdopInform['0'] == "true"){ ?>
		<label for="inputBirthday">Дополнительная информация <strong>(для администраторов)</strong></label>
		<textarea class="form-control" id="inputBirthday" type="text" name="inform" placeholder=""><?}?><?= $newsforedit['group_inform'] ?></textarea>
		<label for="group_users"><?= $lang['responsible'] ?>:</label>
		<select class="form-control" name="group_users" id="group_users">
			<?php echo implode('', $usersoption); ?>
		</select>
		<label for="grouppublic">Тип проекта:</label>
		<select class="form-control" name="grouppublic" id="grouppublic">
			<option value="0">Публичный</option>
			<option value="1">Только для участвующих</option>
		</select>
		<?php if($userGroupsProjectCanviewPrice['0'] == "true"){ ?>
		<label for="price">Стоимость:</label>
		<input class="form-control" id="price" type="text" name="price" placeholder="" value="<?= $newsforedit['group_price'] ?>">
		<?}?>
		<label for="stage">Этап:</label>
		<select class="form-control" name="stage" id="stage">
			<option value="Поговорить">Поговорить</option>
			<option value="FRONT">FRONT</option>
			<option value="BACK">BACK</option>
		</select>
		<label for="subuser">Участвуют в проекте <br><span style="font-size:10px">(Вы можете выбрать несколько сотрудников, зажмите <b>Ctrl(или Command)+Сотрудник</b>)</span></label>
		<select class="form-control" name="subuser[]" id="subuser" multiple>
			<?php echo implode('', $usersoption); ?>
		</select><br>
		<?php if($userGroupsProjectCanviewDoc['0'] == "true"){ ?>
		<button class="form-control back-call multiple">Выбрать изображения/документы</button>
		<div class="gallery" id="gallery">
			<?
			$masgalery = explode(';', $newsforedit['group_galery']);
			foreach ($masgalery as $key) {
				if (!empty($key)) {
					$type = pathinfo($key, PATHINFO_EXTENSION);
					switch ($type) {
						case "docx":
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="/asted/uploads/plugins/docx.webp"/></div>';
							break;
						case "doc":
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="/asted/uploads/plugins/docx.webp"/></div>';
							break;
						case "mov":
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="/asted/uploads/plugins/mov.webp"/></div>';
							break;
						case "pdf":
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="/asted/uploads/plugins/pdf.webp"/></div>';
							break;
						case "xlsx":
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="/asted/uploads/plugins/xlsx.webp"/></div>';
							break;
						default:
							echo '<div class="gallery-item" data-src="' . $key . '"><img src="' . $key . '"/></div>';
							break;
					}
				}
			}
			?>
		</div>
		<input type="text" class="form-control d-none" name="image" value="<?= $images ?>">
		<input type="text" class="form-control d-none" name="galery" value="<?= $newsforedit['group_galery'] ?>">
		<?}?>
		<input type="submit" name="submit" style="display:none" value="updateProject" name="newsadd" id="id0" class="btn btn-primary btn-user btn-block" />
	</form><br>
	<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
	<?php }else{?>
		Asted: вы не можите редактировать данный проект!
		<?}?>
</div>
<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
	(function($) {
		$('input[name="birthday"]').daterangepicker({
			singleDatePicker: true,
			locale: {
				format: 'DD.MM.YYYY'
			}
		});

	})(jQuery);
	$('#grouppublic option[value=<?= $newsforedit['group_public'] ?>]').prop('selected', true);
	$('#group_users option[value=<?= $newsforedit['group_users'] ?>]').prop('selected', true);
	$('#stage option[value=<?= $newsforedit['group_stage'] ?>]').prop('selected', true);
	const phpValue = "<?= implode(';', unserialize($newsforedit['group_subuser'])) ?>";
	const valuesArray = phpValue.split(";");
	const select = document.getElementById("subuser");
	for (let i = 0; i < select.options.length; i++) {
		const option = select.options[i];
		if (valuesArray.includes(option.value)) {
			option.selected = true;
		}
	}
</script>