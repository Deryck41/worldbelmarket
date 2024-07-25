<?php
  /**
  * 2023 год
  * Автор: ООО "АСТЕДБЕЛ"
  * ASTED: Загрузчик изображений в блоки редактирования црм.
  **/
  /***************************************************
   * Только эти источники могут загружать изображения *
   ***************************************************/
   // Данная настройка отключена -- $accepted_origins = array("http://asted.by", "https://asted.by/");

  /*********************************************
   * Измените эту строку, чтобы установить папку для загрузки *
   *********************************************/
  $imageFolder = "../uploads/";

  if (isset($_SERVER['HTTP_ORIGIN'])) {
    // Запросы с одинаковым происхождением не устанавливают источник. Если происхождение установлено, оно должно быть действительным.
    //if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) {
      header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
   // } else {
     // header("HTTP/1.1 403 Origin Denied");
     // return;
   // }
  }

  // Не пытайтесь обработать загрузку по запросу OPTIONS
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    return;
  }

  reset ($_FILES);
  $temp = current($_FILES);
  if (is_uploaded_file($temp['tmp_name'])){
    /*
      Если вашему скрипту необходимо получать файлы cookie, установите images_upload_credentials: true в
      конфигурации и включите следующие два заголовка.
    */
    // header('Access-Control-Allow-Credentials: true');
    // header('P3P: CP="There is no P3P policy."');

    // Очистить ввод
    if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
        header("HTTP/1.1 Неправильное имя файла.");
        return;
    }

    // Проверить расширение
    if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "webp", "png"))) {
        header("HTTP/1.1 Неправильное расширение.");
        return;
    }

    // Принять загрузку, если источник не указан или является допустимым.
    $filetowrite = $imageFolder . $temp['name'];
    move_uploaded_file($temp['tmp_name'], $filetowrite);

    // Определите базовый URL
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https://" : "http://";
    //$baseurl = $protocol . $_SERVER["HTTP_HOST"] . rtrim(dirname($_SERVER['REQUEST_URI']), "/") . "/";
    $baseurl = $_SERVER["HTTP_HOST"];

	// Отвечаем на успешную загрузку с помощью JSON.
    // Используйте ключ местоположения, чтобы указать путь к сохраненному ресурсу изображения.
    // { location : '/your/uploaded/image/file'}
    echo json_encode(array('location' =>  '/asted/uploads/'. $temp['name']));
  } else {
    // Уведомить редактора о том, что загрузка не удалась
    header("HTTP/1.1 Ошибка сервера");
  }
?>