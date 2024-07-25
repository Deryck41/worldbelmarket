<?php
include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  $sectonconnection = R::load('crm_site_section', $_GET['id']);
  $websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
  if ($_POST['submit'] == "menuadd") {
    if ($_POST['sortaddd'] == null) {
      $sortaddbase = "500";
    } else {
      $sortaddbase = $_POST['sortaddd'];
    }
    if ($_GET['result'] == 'podmenu') {
      if($_POST['pageurl'] == "0"){
        $addMenuSiteURL = $_POST['menusiteurl'];
    }else{
      $addMenuSiteURL = $_POST['pageurl'];
  }
      $sql = "INSERT INTO `crm_site_menu` (link, title, sort,parent) VALUES ('{$addMenuSiteURL}','{$_POST['menusitetitle']}','{$sortaddbase}','{$_GET['id']}')";
    } else {
      if($_POST['pageurl'] == "0"){
        $addMenuSiteURL = $_POST['menusiteurl'];
    }else{
      $addMenuSiteURL = $_POST['pageurl'];
  }
      $sql = "INSERT INTO `crm_site_menu` (forsection, link, title, sort, forsite) VALUES ('{$_GET['id']}', '{$addMenuSiteURL}','{$_POST['menusitetitle']}','{$sortaddbase}','{$sectonconnection['forwebsite']}')";
    }
    if (mysqli_query($link, $sql)) {
      // header('Location: /asted/menu/' . $_GET['id'] . '/');
      // echo '<meta http-equiv="refresh" content="0;URL=/asted/menu/' . $_GET['id'] . '/" />';
    } else {
      echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
    }
  }
  ?>
  <?php
  if (isset($_POST["menu_id"])) {
    R::hunt('crm_site_menu', 'id = ?', [$_POST["menu_id"]]);
  }
  ?>
  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?= $sectonconnection['namesection'] ?> <?= $websiteconnection['namesite'] ?></h6>
        </div>
        <div class="card-body">
          <div style="padding-top: 2px;">
            <?
            if ($_GET['result'] == 'podmenu') {
              $site_objects = R::find('crm_site_menu', 'parent = ? ORDER BY sort ASC', [$_GET['id']]);
            } else {
              $site_objects = R::find('crm_site_menu', 'forsection = ? AND parent IS NULL ORDER BY sort ASC', [$_GET['id']]);
            }
            foreach ($site_objects as $site_object) {
              $idmenu = $site_object['id'];
              $title = $site_object['title'];
              $sortic = $site_object['sort'];
              $link = $site_object['link'];
              $parent = $site_object['parent'];
            ?>
              <form action="" method="post">
                <div class="row">
                  <div class="col-lg-4">
                    <a <? if (empty($parent)) {
                          echo 'href="/panel/menu/' . $idmenu . '/podmenu/"';
                        } ?> style="font-size: 12px;color: currentcolor;"><?= $title ?></a>
                    <div><?php if ($link == null) {
                            echo 'Ссылка меню не прописана';
                          } else { ?><strong>Линк:</strong> <?= $link ?><? } ?></div>
                  </div>
                  <div class="col-lg-4">
                    <?php if ($sortic == null) {
                      echo 'Нет сортировки';
                    } else { ?>Сортировка: <strong><?= $sortic ?><? } ?></strong>
                  </div>
                  <div class="col-lg-4">
                    <i class="fas fa-fw fa-trash trashclick<?= $idmenu ?>" onclick="Delete(<?= $idmenu?>,'menu')" value="<?= $idmenu ?>" style="float: right;"></i> <a href="/panel/menu-edit/<?= $idmenu ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                  </div>


                </div>
              </form><br>


              <script>
                $('.trashclick<?= $idmenu ?>').click(function() {
                  let confirmation = confirm("Вы уверены, что хотите удалить?");
                  if (confirmation) {
                    var menu_id = "<?= $idmenu ?>";
                    $.ajax({
                      url: '/panel/menu/',
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

            <? } ?>
          </div>

          <br>
          <form action="" method="post">
            <input class="form-control" id="menusitetitle" name="menusitetitle" placeholder="Пункт меню (название)">
            <input class="form-control" id="sortaddd" name="sortaddd" onkeyup="this.value = this.value.replace(/[^\d]/g,'');" placeholder="Сортировка меню">
            <hr class="hidemenugeneration">
            <div style="font-weight: 600;">Ссылку написать вручную или выбрать страницу</div>
            <input class="form-control hidemenugeneration" id="menusiteurl" name="menusiteurl" placeholder="Ссылка меню">
            <div style="font-weight: 800;">ИЛИ</div>
            <select class="form-control" name="pageurl" id="pageurl">
					    <option value="0">Выберите(если нужно)</option>
           <?php
  $sitePages = R::find('crm_site_pages');
  foreach ($sitePages as $sitePage) {
    $pageTitle = $sitePage['name'];
    $pageUrl = $sitePage['pageurl'];
    echo '<option value="'.$pageUrl.'">';
    echo $pageTitle;
    echo '</option>';
  }
            ?>
            </select>
            <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">
          </form><br>
          <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить пункт меню</button>
        </div>
      </div>

    </div>
  </div>
  <? ?>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('pageurl').addEventListener('change', function() {
        var inputTitle = document.getElementById('menusitetitle');
        var selectedOption = this.options[this.selectedIndex];
        
        if (inputTitle.value.trim() === '') {
          // Если input пустой, то устанавливаем значение из выбранной опции
          inputTitle.value = selectedOption.text;
        }
      });
    });
  </script>


<? include "templates/footer.php"; ?>