<?
$name_to_delete = $_POST['name_to_delete'];
$uploads_directory = $_SERVER['DOCUMENT_ROOT'] . '/asted/uploads/';
$filepath = $uploads_directory . $name_to_delete;
if (unlink($filepath)) {
    echo "Файл '$name_to_delete' успешно удален.";
} else {
    echo "Файл '$name_to_delete' не существует.";
}