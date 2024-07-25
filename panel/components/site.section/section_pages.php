<? include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  if ($userSessionDivisions == "1") {
    $sql_sitesectionfor = "SELECT * FROM `crm_site_section` WHERE forwebsite ='" . $_GET['id'] . "' ORDER BY `id`";
    $result_sitesectionfor = mysqli_query($link, $sql_sitesectionfor);
    if ($_POST['submit'] == 'websiteadd') {
      $sql = "INSERT INTO `crm_site_section` (forwebsite, namesection, websitemodule) VALUES ('{$_GET['id']}','{$_POST['websitesectname']}', 'pages')";
      if (mysqli_query($link, $sql)) {
        echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'section/1/13059/" />';

      } else {
        echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
      }
    } ?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Секции страниц</h1>
    </div>



    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Список секций страниц</h6>
      </div>
      <div class="card-body">
        <? while ($task = mysqli_fetch_assoc($result_sitesectionfor)) {
          $forsite = "{$task['forwebsite']}";
          $websitemodule = "{$task['websitemodule']}";
          $namesection = "{$task['namesection']}";
          $id = "{$task['id']}";
        ?>
          <div class="p-3 bg-gray-100 websiteadd">ID Section - Название секции</div>
          <? if ($websitemodule == "pages") { ?><div class="p-3 bg-gray-100">#<?= $id ?> - <?= $namesection ?></div><br><? } ?>
        <? } ?>
      </div>
      <form action="" method="post">
        <label for="exampleInputPassword1">Название сайта</label>
        <input type="text" class="form-control" name="websitesectname" id="websitesectname" value="Имя секции">
        <input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
      </form>
      <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary"><?= $lang['save'] ?></button>

    </div>
  <? } else { ?>
    <div class="alert alert-info" role="alert">
      <?= $lang['access_to_the_page_is_closed'] ?>
    </div>
  <? } ?>
</div>

<? include "templates/footer.php"; ?>