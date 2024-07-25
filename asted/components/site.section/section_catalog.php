<? include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  if ($userSessionDivisions == "1") {
    $sql_sitesectionfor = "SELECT * FROM `crm_site_section` WHERE forwebsite ='" . $_GET['id'] . "' ORDER BY `id`";
    $result_sitesectionfor = mysqli_query($link, $sql_sitesectionfor);
    if ($_POST['submit'] == 'websiteadd') {
      //print_r($_POST['categorystatus']);
      $sql = "INSERT INTO `crm_site_section` (forwebsite, namesection, websitemodule) VALUES ('{$_GET['id']}','{$_POST['websitesectname']}', 'catalog')";
      if (mysqli_query($link, $sql)) {
        $idsectionnow = R::getCell('SELECT MAX(id) FROM crm_site_section');
        //echo $idsectionnow;
        $config = R::xdispense('crm_site_catalog_config');
        // Устанавливаем значения для полей
        $config->forsection = $idsectionnow;
        $config->category = $_POST['categorystatus'];
        // Сохраняем запись в базе данных
        $configId = R::store($config);
        echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'section/1/13059/" />';
      } 
      else {
        echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        AstedCMS: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
      }
    } ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Секции каталога</h1>
    </div>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Список секций каталог</h6>
      </div>
      <div class="card-body">
        <? while ($task = mysqli_fetch_assoc($result_sitesectionfor)) {
          $forsite = "{$task['forwebsite']}";
          $websitemodule = "{$task['websitemodule']}";
          $namesection = "{$task['namesection']}";
          $id = "{$task['id']}";
        ?>
          <div class="p-3 bg-gray-100 websiteadd">ID Section - Название секции</div>
          <? if ($websitemodule == "news") { ?><div class="p-3 bg-gray-100">#<?= $id ?> - <?= $namesection ?></div><br><? } ?>
        <? } ?>
      </div>
      <div class="container-fluid mb-4">
      <form action="" method="post">
        <label for="exampleInputPassword1">Добавление новой секции <strong>Каталог</strong></label>
        <input type="text" class="form-control" name="websitesectname" id="websitesectname" value="Имя секции">
        <br>
        <strong class="btnseo" style="
    border: 1px dotted;
    padding: 2px;
"> КАТЕГОРИИ КАТАЛОГА <i class="mdi mdi-shape-plus-outline"></i></strong><br><br>
<select class="form-control responsible mb-3" name="categorystatus" id="categorystatus">
                    <option value="false">Не показывать</option>
                    <option value="true">Показывать</option>
                                    </select>
                                    <br>
        <input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
      </form>
      <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary"><?= $lang['save'] ?></button>
        </div>
    </div>
  <? } else { ?>
    <div class="alert alert-info" role="alert">
      <?= $lang['access_to_the_page_is_closed'] ?>
    </div>
  <? } ?>
</div>
<link href="/asted/templates/css/icons.css" rel="stylesheet">
<? include "templates/footer.php"; ?>