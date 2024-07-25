<?php 
 	include "templates/header.php";
if(!empty($_POST)){
	// Проверяем, был ли выбран файл для загрузки
	if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
		die('Ошибка загрузки файла');
	}
	// Получаем путь к загруженному файлу
	$uploadedFile = $_FILES['file']['tmp_name'];

	// Определяем имя папки, которую нужно распаковать
	$folderName = basename($_FILES['file']['name'], '.zip');

	// Проверяем, существует ли папка с таким именем
	if (file_exists($folderName)) {
		die('Папка уже была распакована');
	}

	// Распаковываем архив
	$zip = new ZipArchive;
	if ($zip->open($uploadedFile) === TRUE) {
	    $zip->extractTo('.');
	    $zip->close();
	    echo 'Архив успешно распакован';
	} else {
	    echo 'Ошибка распаковки архива';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Распаковка ZIP-архива</title>
</head>
<body>
	<div class="container">
	<h1>Распаковка ZIP-архива</h1>
	<form action="unpack.php" method="post" enctype="multipart/form-data">
		<label for="file">Выберите ZIP-файл:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Распаковать">
	</form>
	</div>
</body>
</html>
<?php

	include "templates/footer.php"; 
?>