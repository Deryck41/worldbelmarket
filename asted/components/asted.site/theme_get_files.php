<?php
$directory = realpath(__DIR__ . '/../../../asted_themes/');
if ($_POST['file'] == null) {
    $template = $_POST['template'];
    $templatesPath = $directory . '/' . $template;
    
    $files = scandir($templatesPath);
    $filteredFiles = [];

    foreach ($files as $file) {
        $filePath = $templatesPath . '/' . $file;
        if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'acws') {
            $filteredFiles[] = $file;
        }
    }

    echo json_encode($filteredFiles);
}

?>
