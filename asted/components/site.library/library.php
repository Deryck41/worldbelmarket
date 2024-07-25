<? include "templates/header.php"; ?>
<link rel="stylesheet" href="/asted/components/site.library/style.css">


<div class="container add-file">
  <form name="form" action="" method="post" enctype="multipart/form-data">
    <div class="input-group">
      <div class="custom-file">
        <input type="file" name="userFile[]" multiple class="custom-file-input" id="customFileInput"
          aria-describedby="customFileInput">
        <label class="custom-file-label" for="customFileInput">Выберите файл</label>
      </div>
      <div class="input-group-append">
        <input type="submit" class="btn btn-primary" name="submit" value="Загрузить" />
        <?php
        $target_Path = "../asted/uploads/";
        // $target_Path = $target_Path . basename($_FILES['userFile']['name']);
        // move_uploaded_file($_FILES['userFile']['tmp_name'], $target_Path); 
        if (isset($_POST['submit'])) {
          $countfiles = count($_FILES['userFile']['name']);
          for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['userFile']['name'][$i];
            move_uploaded_file($_FILES['userFile']['tmp_name'][$i], $target_Path . '/' . $filename);
          }
        }
        ?>

      </div>
    </div>
  </form>
</div>



<div class="container">
  <div class="gallery" id="gallery">
    <?php
    $directory = "../asted/uploads/"; //название папки с изображениями
    $allowed_types = array(
      'jpg',
      'jpeg',
      'gif',
      'png',
      'docx',
      'mov',
      'pdf',
      'xlsx'

    ); //разрешеные типы изображений
    $file_parts = array();
    $ext = '';
    $title = '';
    $i = 0;
    $toDelete = 2;
    //пробуем открыть папку
    $dir_handle = @opendir($directory) or die("There is an error with your image directory!");
    while ($file = readdir($dir_handle)) //поиск по файлам
    {
      if ($file == '.' || $file == '..')
        continue; //пропустить ссылки на другие папки
      $file_parts = explode('.', $file); //разделить имя файла и поместить его в массив
      $ext = strtolower(array_pop($file_parts)); //последний элеменет - это расширение
      if (in_array($ext, $allowed_types)) {
        $result = mb_substr($directory, $toDelete);
        switch ($ext) {
          case "docx":
            echo '<img src="' . $result . '/plugins/docx.webp" data-src="' . $result . $file . '" alt="' . $ext . '" alt="' . $ext . '" title="' . $file . '" />';
            break;
          case "mov":
            echo '<img src="' . $result . '/plugins/mov.webp" data-src="' . $result . $file . '" alt="' . $ext . '" alt="' . $ext . '" title="' . $file . '" />';
            break;
          case "pdf":
            echo '<img src="' . $result . '/plugins/pdf.webp" data-src="' . $result . $file . '" alt="' . $ext . '" alt="' . $ext . '" title="' . $file . '" />';
            break;
          case "xlsx":
            echo '<img src="' . $result . '/plugins/xlsx.webp" data-src="' . $result . $file . '" alt="' . $ext . '" alt="' . $ext . '" title="' . $file . '" />';
            break;
          default:
            echo '<img src="' . $result . '/' . $file . '" alt="' . $ext . '" data-src="' . $result . $file . '" alt="' . $ext . '" title="' . $file . '" />';
            break;
        }

      }
    }
    closedir($dir_handle); //закрыть папку
    ?>
  </div>
  <div class="text-center p-2 displayed" style="background-color: rgba(0, 0, 0, 0.01); font-size: 20px;"> </div>
</div>

<!-- Модальное окно -->
<div id="modal" class="modal">
  <!-- Содержимое модального окна -->
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="preview-head">
        <h3 class="modal-title" style=" display: inline-block;">Информация о вложении</h3>
        <button type="button" class="close modal-close-btn" id="closeModal" style=" width: auto;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="content preview-content">
        <div class="img-preview"></div>
        <div class="img-info">
        </div>
      </div>
    </div>
  </div>






  <script src="/asted/components/site.library/app.js"></script>
  <? include "templates/footer.php"; ?>