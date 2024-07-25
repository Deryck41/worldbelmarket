<?php
define('ASTEDRB','yes');
require '../../core/rb.php';
require '../../core/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskId = $_GET['id'];
    $userId = $_GET['userId'];

    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileSize = $file['size'];

    // Разрешенные расширения файлов
    $allowedExtensions = ['docx', 'pptx', 'xlsx', 'jpg', 'jpeg', 'sql', 'doc', 'pdf', 'zip', 'rar', '7z', 'txt', 'png', 'gif'];

    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Проверяем, что расширение файла разрешено
    if (in_array($fileExtension, $allowedExtensions)) {
        $uploadPath = '../../uploads/'; // Укажите ваш путь для сохранения файлов
        $uploadFile = $uploadPath . basename($fileName);

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            $taskFile = R::xdispense('crm_task_files');
            $taskFile->task = $taskId;
            $taskFile->file = $fileName;
            $taskFile->whoadd = $userId;
            $taskFile->date = date('Y-m-d H:i:s');
            $taskFile->filesize = $fileSize;

            $id = R::store($taskFile);

            echo json_encode(['status' => 'success', 'id' => $id]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'File upload failed.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Запрещенное расширение файла. Разрешены только: ' . implode(', ', $allowedExtensions)]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}