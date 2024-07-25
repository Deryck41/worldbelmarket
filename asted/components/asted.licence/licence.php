<? include "templates/header.php";
 ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Лицезия Asted</h1>
        </div>


        <!-- Content Row -->
        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Введите лицезионный ключ:</h6>
                    </div>
                    <div class="card-body">
<?php
    if($cofigius['0']['lickey'] == "null"){
// проверяем, была ли отправлена форма
if (isset($_POST['key'])) {
  // получаем введенный пользователем ключ
  $key = $_POST['key'];

 // проверяем, что ключ не пустой
  if (!empty($key)) {
  // отправляем HTTP запрос на сервер с проверкой ключа
  $url = 'http://update.asted.by/verify_key.php?key='.$key;
    $response = file_get_contents($url);

    // проверяем результат проверки ключа
    if ($response == 'VALID') {
      // разблокировать приложение
    $sql = "UPDATE `crm_config` SET lickey='" . $_POST['key'] . "'";
    $result = mysqli_query($link, $sql);
      echo 'Приложение разблокировано';
    } else {
      // оставить приложение заблокированным
      echo 'Неверный ключ<br>';
      echo 'Попробовать еще раз: <a href="./licence.php">Обновить</a>';
    }
  } else {
    // если ключ пустой, вывести сообщение об ошибке
    echo '<strong>Поле с ключом пустое, пожалуйста, введите лицензионный ключ</strong><br>';?>
  <form action="" method="post">
    <label for="key">Введите лицензионный ключ:</label><br>
    <input type="text" id="key" name="key"><br>
    <input type="submit" value="Проверить">
  </form> 
  <?php
  }
} else {
  // если форма не была отправлена, показываем форму ввода ключа
  ?>
  <form action="" method="post">
    <label for="key">Введите лицензионный ключ:</label><br>
    <input type="text" id="key" name="key"><br>
    <input type="submit" value="Проверить">
  </form> 
  <?php
}

}else{?>
Ваша лицензия успешно активирована!<br>
Ваш лицезионный ключ: <strong> <?=$cofigius['0']['lickey']?></strong><br>
Спасибо за использования программного комплекса астед!<br>
Техническая поддержка: <a href="https://asted.by">Asted.by</a>
<?}?>

                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>