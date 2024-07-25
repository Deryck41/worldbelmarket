<?php
$directory = __DIR__ . '/../../../asted_themes/';
if($_POST['file'] != null){
$template = $_POST['template'];
$file = $_POST['file'];

$templatePath = $directory . $template . '/' . $file;
$content = file_get_contents($templatePath); // Получение содержимого файла
echo $content;
}
?>
