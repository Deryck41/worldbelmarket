<?php
include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  if (strpos($_POST['uri'], "/") === false) {
    $postUri = "/" . $_POST['uri'] . "/";
  } else {
    $postUri = $_POST['uri'];
  }
  if ($_POST['submit'] == "menuadd") {
    if (!empty($_POST['folder'])) {
      $dir = $_POST['folder'];
      $files = scandir($dir);
      $folderName = basename($dir);
      foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
          if (strpos($file, ".php") !== false) { //проверяем есть ли пхп что-бы не создавать роуты для css, js и т.д
              $fileName = str_replace('.php', '', basename($file));
              $fileUri = "/" . str_replace('_', '-', $fileName) . "/";
              // Создаем новую запись в таблице 'files'
              $sql = "INSERT INTO `crm_routes` (uri, direction, page_name) VALUES ('{$fileUri}', '{$folderName}','{$fileName}')";
              if (mysqli_query($link, $sql)) {
                //echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'components/1305/" />';
              } else {
                echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
                  Asted: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
              </div></div>';
              }
          }
        }
      }
    } else {
      $sql = "INSERT INTO `crm_routes` (uri, direction, page_name) VALUES ('{$postUri}', '{$_POST['direction']}','{$_POST['page_name']}')";
      if (mysqli_query($link, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'components/1305/" />';
      } else {
        echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
          Asted: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
      </div></div>';
      }
    }
  }
  ?>
  <?php
  if (isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $sql_lead_leadDeletesss = "DELETE FROM crm_routes WHERE id={$menu_id}";
    $result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
  }

  ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Управление компонентами</h1><br>
  </div>
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Список роутинов</h6>
        </div>
        <div class="card-body">
          <div style="padding-top: 2px;">
            <?
            $sql_custport = "SELECT * FROM `crm_routes`";
            $result_custport = mysqli_query($link, $sql_custport);
            while ($task = mysqli_fetch_assoc($result_custport)) {
              $idmenu = "{$task['id']}";
              $uri = "{$task['uri']}";
              $direction = "{$task['direction']}";
              $link = "{$task['page_name']}";
            ?>
              
                <div class="row" style="
    border: 1px solid #a9a6a3;
    padding: 6px;
    margin-bottom: 8px;
">
                <div class="col-8">
                <strong>URI:</strong> <a href="/asted/<?= $uri ?>/"><?= $uri ?></a> <strong>Direction:</strong><?= $direction ?> <strong>Page_name:</strong><?= $link ?>
                <div>
              <?php
$filename = '../asted/components/'.$direction.'/info.asted';
if (file_exists($filename)) {
    // Чтение содержимого файла в строку
    $fileContents = file_get_contents($filename);
    
    // Разбиваем содержимое файла на строки
    $lines = explode("\n", $fileContents);
    
    // Инициализируем пустой массив для хранения данных
    $infoArray = [];
    
    // Проходимся по каждой строке
    foreach ($lines as $line) {
        // Разбиваем строку по двоеточию, чтобы получить ключ и значение
        $parts = explode(':', $line, 2);
        
        if (count($parts) === 2) {
            // Убираем лишние пробелы и добавляем в массив
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            $infoArray[$key] = $value;
        }
    }
    ?>
    <?php if($infoArray['name'] != null){
        echo '<hr><strong>Название компонента: </strong>'.$infoArray['name'].'<br>';
    }
    if($infoArray['description'] != null){
      echo '<strong>Описание: </strong>'.$infoArray['description'].'<br>';
  }
  if($infoArray['name'] != null){
    echo '<strong>Автор: </strong>'.$infoArray['author'].'<br>';
}  
  if($infoArray['version'] != null){
   echo '<strong>Версия: </strong>'.$infoArray['version'].'<br>';
}
  if($infoArray['dataupdate'] != null){
  echo '<strong>Дата обновления: </strong>'.$infoArray['dataupdate'].'<br>';
}
if($infoArray['type'] == "core"){
  echo '
<span class="warningblocks">CORE: ВНИМАНИЕ ДАННЫЙ КОМПОНЕНТ ЯВЛЯЕТСЯ ЧАСТЬЮ ЯДРА СИСТЕМЫ</span>';
}
    ?>
<?}else{
  echo '<i>Описание компонента не найдено</i>';
}


?>

</div>



<div style="
    border: 1px dotted #d2d2d2;
    margin-top: 10px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 10px;
    width: max-content;
">
   Обновление компонентов:
<form method="post" enctype="multipart/form-data" class="update-form" style="justify-content: space-around;align-items: baseline; flex-wrap: wrap; ">
    <!-- Скрытое поле с именем компонента -->
    <input type="hidden" name="component_name" value="<?= $direction ?>">

    <!-- Имя компонента -->
    <input type="text" name="component_id" value="1" style="display: none;">

    <!-- Файл компонента -->
    <div class="form-group mb-0">
        <label style="
    cursor: pointer;
"
for="component_zip<?= $idmenu ?>" id="selectedFileName<?= $idmenu ?>" class="btn btn-primary">
            <input type="file" id="component_zip" name="component_zip" accept=".zip" onchange="displaySelectedFileName<?= $idmenu ?>()">
            + Выберите ZIP-файл
        </label>
    </div>

    <!-- Кнопка для отправки формы -->
    <button type="submit" class="btn btn-info">Загрузить и обновить компонент</button>

    <div class="response mt-3"></div>
</form>
<script>
    function displaySelectedFileName<?= $idmenu ?>() {
        const fileInput = document.querySelector(`[data-form="<?= $idmenu ?>"]`);
        const selectedFileName = document.getElementById("selectedFileName<?= $idmenu ?>");

        if (fileInput.files.length > 0) {
            selectedFileName.textContent = "Выбранный файл: " + fileInput.files[0].name;
        } else {
            selectedFileName.textContent = "+ Выберите ZIP-файл";
        }
    }
</script>
</div>
              </div>

<div class="col-4">
                <i class="fas fa-fw fa-trash trashclick<?= $idmenu ?>" value="<?= $idmenu ?>" style="float: right;"></i> <a style="cursor: pointer;" href="components/<?= $idmenu ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
</div>
                
              
              
              <br>
              <script>
                $('.trashclick<?= $idmenu ?>').click(function() {
                  let confirmation = confirm("ASTED: Вы уверены, что хотите удалить роутинг компанента?");
                  if (confirmation) {
                    var menu_id = "<?= $idmenu ?>";
                    $.ajax({
                      url: '/asted/components/',
                      method: 'post',
                      dataType: 'html',
                      data: {
                        menu_id
                      },
                      success: function() {
                        location.reload();
                      }
                    });
                  }
                });
              </script>
</div>
            <? } ?>
          </div>

          <br><hr>
          <form action="" method="post">
          <h4>Ручное добавление компанента</h4>
            <div class="row">
              <div class="col-4">
                <input class="form-control" id="uri" name="uri" placeholder="Uri">
              </div>
              <div class="col-4">
                <input class="form-control hidemenugeneration" id="direction" name="direction" placeholder="direction">
              </div>
              <div class="col-4">
                <input class="form-control hidemenugeneration" id="page_name" name="page_name" placeholder="page_name">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-6">
                <h4>Автоматическое добавление компанента</h4>
                <div class="row">
                <div class="col-4">
                <label for="folder" style="margin-top: 5px; color: aliceblue; background-color: black; padding: 3px;"">Папка с компанентом:</label>
                </div>
                <div class="col-5">
                <select name="folder" id="folder" class="form-control">
                  <option value="0">Выберите папку</option>
                  <?
                  $path = "components";
                  $dirs = array_diff(scandir($path), array('..', '.'));
                  foreach ($dirs as $dir) {
                    if (is_dir($path . '/' . $dir)) { // Проверяем, что это действительно папка
                      echo '<option value="' . $path . '/' . $dir . '">' . $dir . '</option>'; // Добавляем путь и название папки в select
                    }
                  }
                  ?>
                </select></div></div>
              </div>
            </div><hr>
            <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">


          </form><br>
          <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить роутинг</button>
        </div>
      </div>

    </div>
  </div>
  <? ?>
</div>
<script>
document.querySelectorAll(".update-form").forEach(function(form) {
    form.addEventListener("submit", function (event) {
        event.preventDefault();

        var componentName = form.querySelector("[name='component_name']").value;
        var formData = new FormData(form);

        fetch("/asted/components/asted.acom/update_component.php", {
            method: "POST",
            body: formData,
        })
        .then(function(response) {
            return response.text();
        })
        .then(function(message) {
            // Показываем сообщение на странице
            var responseContainer = form.querySelector(".response");
            if (responseContainer) {
              responseContainer.innerHTML = '<div class="alert alert-primary">' + message + '</div>';

            }
        })
        .catch(function(error) {
            console.error("Ошибка:", error);
        });
    });
});

</script>


<? include "templates/footer.php"; ?>