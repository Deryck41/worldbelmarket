<?php
//if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['component_zip'])) {
    $zipFile = $_FILES['component_zip'];
    if ($zipFile['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = '../'.$_POST['component_name'].'/';
        $targetFilename = $targetDirectory . "update.zip";

        if (move_uploaded_file($zipFile['tmp_name'], $targetFilename)) {
            $zip = new ZipArchive();
            if ($zip->open($targetFilename) === TRUE) {
                echo __DIR__;
                $zip->extractTo($targetDirectory);
                $zip->close();
                $versionFilename = 'info.asted';
                if (file_exists($versionFilename)) {
                    $versionContent = file_get_contents($versionFilename);
                    $infoArray = [];
                    $lines = explode("\n", $versionContent);

                    foreach ($lines as $line) {
                        $parts = explode(':', $line, 2);
                        if (count($parts) === 2) {
                            $key = trim($parts[0]);
                            $value = trim($parts[1]);
                            $infoArray[$key] = $value;
                        }
                    }
                        echo "Версия обновленого компонента: ";
                        echo $infoArray['version'];
                        echo " компонент успешно обновлен!";
                    
                } else {
                    echo "Файл info.asted не найден в компоненте.";
                }
            } else {
                echo "Не удалось открыть ZIP-архив.";
            }
        } else {
            echo "Не удалось переместить ZIP-файл.";
            echo $targetFilename;
            echo $zipFile['name'];
        }
    } else {
        echo "Произошла ошибка при загрузке ZIP-файла.";
    }
//} else {
//    echo "Ошибка: Запрос не является POST-запросом или отсутствует файл компонента.";
//}
?>
