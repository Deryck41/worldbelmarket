<?php
include "templates/header.php";
$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parsed_url = parse_url($current_url);
parse_str($parsed_url['query'], $query_params);
$aget = $query_params;
$zxc = explode('/', $aget['file']);

$filePath = $_SERVER['DOCUMENT_ROOT'] . '/asted_themes/' . $aget['theme'] . '/' . $aget['file'];
if (file_exists($filePath)) {
    $fileContent = file_get_contents($filePath);
} else {
    $fileContent = 'Файл не найден';
}
function getFilesAndFolders($path, $theme, $relativePath = '', $zxc)
{
    if (is_dir($path)) {
        $items = scandir($path);
        $result = '';

        $directories = array();
        $files = array();

        foreach ($items as $item) {
            if ($item != "." && $item != "..") {
                $itemPath = $path . DIRECTORY_SEPARATOR . $item;
                if (is_dir($itemPath)) {
                    $directories[] = $item;
                } else {
                    $files[] = $item;
                }
            }
        }

        foreach ($directories as $directory) {
            $directoryPath = $path . DIRECTORY_SEPARATOR . $directory;
            $result .= '<li class="list-file-item list-file-item_multi"><a>' . $directory . '</a>';
            if (in_array($directory, $zxc)) {
                $result .= '<ul class="list-file list-file_multi">';
            } else {
                $result .= '<ul class="list-file list-file_multi d-none">';
            }
            $result .= getFilesAndFolders($directoryPath, $theme, $relativePath . $directory . '/', $zxc);
            $result .= '</ul>';
            $result .= '</li>';
        }

        foreach ($files as $file) {
            $filePath = $relativePath . $file;
            if ($file == "footer.acws") {
                $filenamesss = 'Подвал';
            } elseif ($file == "header.acws") {
                $filenamesss = 'Шапка';
            } elseif ($file == "main.acws") {
                $filenamesss = 'Главная';
            } elseif ($file == "pages.acws") {
                $filenamesss = 'Подключение страницы';
            } else {
                $filenamesss = $file;
            }

            if (in_array($file, $zxc)) {
                $result .= '<li class="list-file-item active"><a href="/asted/themeseditor/?theme=' . $theme . '&file=' . urlencode($filePath) . '">' . $filenamesss . '<span>(' . $file . ')</span></a></li>';
            } else {
                $result .= '<li class="list-file-item"><a href="/asted/themeseditor/?theme=' . $theme . '&file=' . urlencode($filePath) . '">' . $filenamesss . '<span>(' . $file . ')</span></a></li>';
            }
        }

        return $result;
    } else {
        return '';
    }
}
$basePath = $_SERVER['DOCUMENT_ROOT'] . '/asted_themes/' . $aget['theme'];
$filesAndFolders = getFilesAndFolders($basePath, $aget['theme'], '', $zxc);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newcontent'])) {

    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/asted_themes/' . $aget['theme'] . '/' . $aget['file'];
    $newContent = $_POST['newcontent'];
    if (file_put_contents($filePath, $newContent) !== false) {
        echo '<div class="ml-4 mr-4"><div class="alert alert-success" role="alert">
       <strong>Asted CMS: </strong> Файл успешно обновлен
      </div></div>';
    } else {
        echo '<div class="ml-4 mr-4"><div class="alert alert-danger" role="alert"><strong>Asted CMS: </strong>  Ошибка при обновлении файла.</div></div>';
    }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.0/codemirror.css">
<link rel="stylesheet" href="/asted/components/site.themeseditor/style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.0/codemirror.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.0/mode/css/css.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.61.0/addon/edit/closebrackets.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <h3>Файл: <? echo $aget['file'] ?></h3>
        </div>
        <div class="col-2">
            <label for="theme">Выбранная тема:</label>
            <select class="form-control" name="theme" id="theme">
                <?
                $directories = array_filter(glob($_SERVER['DOCUMENT_ROOT'] . '/asted_themes' . '/*'), 'is_dir');
                foreach ($directories as $dir) {
                    $dirname = basename($dir);
                    if ($aget['theme'] == $dirname) {
                        echo "<option value='$dirname' selected>$dirname</option>";
                    } else {
                        echo "<option value='$dirname'>$dirname</option>";
                    }
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <h4>Выбранное содержимое файла:</h4>
            <form name="template" id="template" method="post">
                <div class="form-group">
                    <textarea class="form-control" cols="70" rows="50" name="newcontent" id="newcontent"> <?php
                    if(!empty($newContent)){
                        echo htmlspecialchars($newContent);
                    }else{
                        echo htmlspecialchars($fileContent);
                    }
                 ?></textarea>
                </div>
                <div class="form-group">
                    <p class="submit">
                        <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Обновить файл">
                        <span class="spinner"></span>
                    </p>
                </div>
            </form>
        </div>
        <div class="col-md-2">
            <h4>Файлы темы</h4>
            <?php echo '<ul class="list-file">' . $filesAndFolders . '</ul>'; ?>



        </div>
    </div>
</div>
<script src="/asted/components/site.themeseditor/script.js"></script>
<?php include "templates/footer.php";
