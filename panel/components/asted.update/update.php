<? include "templates/header.php"; 
if (isset($_POST['action']) && $_POST['action'] == 'download') {  // Загрузка новой версии движка
    // Получение ссылки на новую версию движка
    $update_url = 'http://update.asted.by/engine/asted_update-'.$astedver.'.zip';

    // Создание временной директории для хранения новой версии
    $temp_dir = sys_get_temp_dir() . '/uploads/engine_update';
    if (!file_exists($temp_dir)) {
        mkdir($temp_dir);
    }

    // Загрузка новой версии во временную директорию
    $zip_file = $temp_dir . '/latest.zip';
    file_put_contents($zip_file, file_get_contents($update_url));
    
    if (!file_exists($zip_file)) { // Проверка успешности загрузки архива
            echo ' <div class="container-fluid"><div class="alert alert-warning" role="alert">Не удалось загрузить архив с последней версией Asted</div></div>';
    }else{
        // Распаковка архива с новой версией
        $zip = new ZipArchive;
        if ($zip->open($zip_file) === TRUE) {
            $zip->extractTo($temp_dir);
            $zip->close();
            }

        // Удаление старой версии движка
        $old_dir = '/uploads/engine_update/old';
        deleteDir($old_dir);

        // Перемещениение новой версии в рабочую директорию
        $new_dir = '/uploads/engine_update/new';
        rename($temp_dir, $new_dir);

        // Функция для удаления директории со всеми ее содержимым
        function deleteDir($dir) {
        if (!file_exists($dir)) {
        return;
        }
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
        (is_dir("$dir/$file")) ? deleteDir("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
        }
    }
}
/*
Этот код использует функции PHP для создания временной директории, загрузки файла, распаковки ZIP-архива, удаления директории и перемещения файла. Он также использует класс `ZipArchive` для распаковки архива. Вам может потребоваться изменить этот код в зависимости от ваших требований, например, добавить проверку безопасности входных данных, установить таймауты или обработать ошибки более детально.
*/

?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Обновление системы</h1>
        </div>


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Ваш текущий билд: <?=$buildNow?></h6>
                    </div>
                    <div class="card-body">
                        <strong>Версия вашей системы:</strong> <?=$revisionNow?><br>
                        <strong>Дата релиза версии:</strong> <?=$buildDate?><br>
                        <strong>Версия билда:</strong> <?=$buildNow?><br>
                        <hr>
                        <?php

                        $url = 'http://update.asted.by/revision.php';
$htmlContent = file_get_contents($url);
if($htmlContent > $revisionNow){
   ?><strong>Обновите платформу, вышла новая версия:</strong> <?=$htmlContent?>
<form method="post">
    <input type="hidden" name="action" value="download">
    <input type="hidden" name="astedver" value="<?=$htmlContent?>">
    <button type="submit">Загрузить новую версию</button>
</form>
<?}else{
    echo '<strong>Обновлений не найдено, вы используете последнию версию:</strong> '.$revisionNow ;
}
?>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>