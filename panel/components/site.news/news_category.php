<?php
include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  //print_r($_POST);
  //echo $_GET['id'];
  $sql_sectonconnection = "SELECT * FROM `crm_site_section` WHERE id ='" . $_GET['id'] . "'";
  $result_sectonconnection = mysqli_query($link, $sql_sectonconnection);
  $sectonconnection = mysqli_fetch_assoc($result_sectonconnection);
  $sql_websiteconnection = "SELECT * FROM `crm_site` WHERE id ='" . $sectonconnection['forwebsite'] . "'";
  $result_websiteconnection = mysqli_query($link, $sql_websiteconnection);
  $websiteconnection = mysqli_fetch_assoc($result_websiteconnection);
  //echo $sectonconnection['forwebsite'];
  if ($_POST != null) {
    if (empty($_POST['menusiteurl'])) {
      $tourl = makeUrlCode($_POST['menusitetitle']);
    } else {
      $tourl = makeUrlCode($_POST['menusiteurl']);
    }
    $sql = "INSERT INTO `crm_site_news_category` (fornews, link, name) VALUES ('{$_GET['id']}', '{$tourl}','{$_POST['menusitetitle']}')";
    if (mysqli_query($link, $sql)) {
      echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'news-category/' . $_GET['id'] . '/" />';
    } else {
      echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
    }
  }
  ?>
  <?php
  if (isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $sql_lead_leadDeletesss = "DELETE FROM crm_site_news_category WHERE id={$menu_id}";
    $result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
  }
  ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Категории новостей</h1><br>
    <h6>Для подключения в движке <strong>forsection: <?= $_GET['id'] ?></strong></h6>
  </div>
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">

      <!-- Approach -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Список категорий</h6>
        </div>
        <div class="card-body">
          <div style="padding-top: 2px;">
            <?

            $sql_custport = "SELECT * FROM `crm_site_news_category` WHERE fornews ='" . $_GET['id'] . "'";
            $result_custport = mysqli_query($link, $sql_custport);
            while ($task = mysqli_fetch_assoc($result_custport)) {
              $idmenu = "{$task['id']}";
              $title = "{$task['name']}";
              $link = "{$task['link']}";
            ?>
              <form action="" method="post">
                <a href="https://<?= $websiteconnection['siteurl'] ?>/<?= $link ?>" style="font-size: 12px;color: currentcolor;"><?= $title ?></a>
                <i class="fas fa-fw fa-trash trashclick<?= $idmenu ?>" value="<?= $idmenu ?>" style="float: right;"></i> <a href="<?=$astedADM?>news-category-edit/<?= $idmenu ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
              </form><br>


              <script>
                $('.trashclick<?= $idmenu ?>').click(function() {
                  var menu_id = "<?= $idmenu ?>";
                  $.ajax({
                    url: '/panel/news-category/',
                    method: 'post',
                    dataType: 'html',
                    data: {
                      menu_id
                    },
                    success: function() {
                      location.reload();
                    }
                  });
                });
              </script>

            <? } ?>
          </div>

          <br>
          <form action="" method="post">
            <input class="form-control" id="menusitetitle" name="menusitetitle" placeholder="Имя категории">
            <hr class="hidemenugeneration">
            <input class="form-control hidemenugeneration" id="menusiteurl" name="menusiteurl" placeholder="Ссылка категории">
            <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">
          </form><br>
          <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить категорию новостей</button>
        </div>
      </div>

    </div>
  </div>
  <? ?>
</div>





<? include "templates/footer.php"; ?>