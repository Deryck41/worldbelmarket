<?php
define('ASTEDRB','yes');
require '../../core/rb.php';
require '../../core/config.php';

// Проверяем, был ли получен POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем значение 'seconds' из POST-данных
    $seconds = isset($_POST['seconds']) ? intval($_POST['seconds']) : 0;

    // Разбиваем секунды на часы, минуты и секунды
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $remainingSeconds = $seconds % 60;

    // Теперь можно использовать значения $hours, $minutes и $remainingSeconds в вашем коде
    if (R::testConnection()) {
        $productData = R::xdispense('crm_task_timer');
        $productData['userid'] = $_POST['userId'];
        $productData['taskid'] = $_POST['taskId'];
        $productData['startdate'] = date("d.m.Y")." ".$_POST['startUserHour'].":".$_POST['startUserMinutes'];
        $productData['enddate'] = date("d.m.Y")." ".$_POST['userHour'].":".$_POST['userMinutes'];
        $productData['timer'] = $_POST['seconds'];
        if (R::store($productData)) {
            echo "Data saved successfully!";
        } else {
            echo "Error saving data: " . R::getLastError();
        }
    } else {
        echo "Error connecting to the database: " . R::getLastError();
    }

    // $convectHourToSecond = $_POST['userHour'] * 3600;
    // $convectMinutesToSecond = $_POST['userMinutes'] * 36;
    // $totaltimer = $convectHourToSecond + $convectMinutesToSecond;
    // echo $totaltimer;

    // print_r($_POST);
    // // Здесь просто выводим разобранные значения в ответе
    // echo "Received seconds: " . $seconds . "<br>";
    //   echo "StartUserHour: " . $_POST['startUserHour'] . "<br>";
    //   echo "StartuserMinutes: " . $_POST['startUserMinutes'] . "<br>";



} else {
    // Если не POST-запрос, просто выводим ошибку
    echo "Invalid request method";
}
?>