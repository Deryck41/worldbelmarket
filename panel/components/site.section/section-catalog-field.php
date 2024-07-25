<? include "templates/header.php"; ?>
<div class="container-fluid">
<?php
			$site_object = R::load('crm_site_section', $_GET['id']);
			$title = $site_object['namesection'];
			$websitemodule = $site_object['websitemodule'];

	print_r($findsection->namesection);
	if ($_POST['submit'] == 'websiteadd') {
       // print_r($_POST);
                // Создание новой записи
                $newsField = R::xdispense('crm_site_catalog_field');
                
                // Заполнение полей
                $newsField->forsection = $_GET['id'];
                $newsField->name = $_POST['castomfield-name'];
                $newsField->type = $_POST['castomfield-type'];
                $newsField->code = $_POST['castomfield-code'];
                $newsField->active =$_POST['castomfield-active'];
                $id = R::store($newsField);
                echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'section-catalog-field/'.$_GET['id'].'/1305/" />';
                    // Сохранение записи в базе данных
                
	}
	if (is_numeric($_GET['result'])) {
		if (isset($_GET['result'])) {
			if ($_GET['result'] == '1305') {
	?>
				<div class="container-fluid">
					<div class="alert alert-success" role="alert">
						Asted Cloud: Поле успещно обновлена
					</div>
				</div>
	<? }
		}
	} ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 text-primary">Произвольные поля для секции: <strong><?= $title ?></strong></h6>
		</div>
		<div class="card-body">
			<div class="personal_divisions-body">
                <?php         $fildAll = R::find('crm_site_catalog_field', 'forsection = ?', [$_GET['id']]);
        foreach ($fildAll as $fildAllStars) {
            $name = $fildAllStars->name;
            $type = $fildAllStars->type;
            $code = $fildAllStars->code;
            $active = $fildAllStars->active;
        ?>
				<div class="p-2 bg-gray-100"><strong>#Имя</strong> <?= $name ?>,  <strong>#Тип</strong> <?= $type ?>,  <strong>#Код</strong> <?= $code ?>,  <strong>#Активен</strong> <?= $active ?>
                </div><?}?>
				
				<hr>
				<h3>Добавить поле:</h3>
				<form action="" method="post">
                    <div class="row">
                        <div class="col-md-4">
					<label for="exampleInputPassword1">Имя поля:</label>
					<input type="text" class="form-control" name="castomfield-name" id="castomfield-name" value="Имя поля - Что делает поля">
                        </div>
                        <div class="col-md-3">
					<label for="exampleInputPassword1">Тип поля:</label>
                    <select class="form-control responsible mb-3" name="castomfield-type" id="castomfield-type">
					<option value="input">Строка - Input</option>
                    <option value="textarea">Текст - Textarea</option>
					<option value="file">Файл - File</option>
                    </select>
                        </div>
                        <div class="col-md-4">
					<label for="exampleInputPassword1">Код поля:</label>
					<input type="text" class="form-control" name="castomfield-code" id="castomfield-code" value="Код без пробелов на английском">
                        </div>
                        <div class="col-md-1">
					<label for="exampleInputPassword1">Активен:</label>
					<select class="form-control responsible mb-3" name="castomfield-active" id="castomfield-active">
                    <option value="true">Да</option>
                    <option value="false">Нет</option>
                                    </select>
                        </div>
                    </div>
					<input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
				</form><br>
				<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить</button>
			</div>
		</div>

	</div>

	<? include "templates/footer.php"; ?>