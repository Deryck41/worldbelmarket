<?php
include "templates/header.php"; ?>
<div class="container-fluid">
  <?php
  $sectonconnection = R::load('crm_site_section', $_GET['id']);
  $websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
  if ($_GET['result'] == 'podcategory') {
    $maincategory = R::load('crm_site_catalog_category', $_GET['id']);
  }
  if ($_POST['submit'] == "menuadd") {
    $categoryAdd = R::xdispense('crm_site_catalog_category');
    if ($_GET['result'] == 'podcategory') {
      $categoryAdd['parent'] = $_GET['id'];
      $categoryAdd['forcatalog'] = $maincategory['forcatalog'];
      $categoryAdd['level'] = $maincategory['level'] + 1;
    } else {
      $categoryAdd['forcatalog'] = $_GET['id'];
      $categoryAdd['level'] = 1;
    }
    $categoryAdd['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_catalog_category', 0);
    $categoryAdd['name'] = $_POST['title'];
    $categoryAdd['images'] = $_POST['image'];
    $categoryAdd['main'] = $_POST['main'];
    $categoryAdd['galery'] = $_POST['galery'];
    $categoryAdd['content'] = $_POST['content'];
    $categoryAdd['keywords'] = $_POST['keywords'];
    $categoryAdd['descriptions'] = $_POST['descriptions'];
    if (R::store($categoryAdd)) {
      if ($_GET['result'] == 'podcategory') {
        echo '<meta http-equiv="refresh" content="0;URL=/asted/category/' . $_GET['id'] . '/podcategory/" />';
      } else {
        echo '<meta http-equiv="refresh" content="0;URL=/asted/category/' . $_GET['id'] . '/" />';
      }
    } else {
      echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
    }
  }
  ?>
  <?php
  if (isset($_POST["menu_id"])) {
    R::hunt('crm_site_catalog_category', 'id = ?', [$_POST["menu_id"]]);
  }
  ?>
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><? if ($_GET['result'] == 'podcategory') {
                                        echo 'Подкатегории ' . $maincategory['name'];
                                      } else {
                                        echo 'Категории каталога ' . $sectonconnection['namesection'] . '';
                                      } ?></h1><br>
    <h6>Для подключения в движке <strong>forsection: <?= $_GET['id'] ?></strong></h6>
  </div>
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-12 mb-4">
      <? if ($_GET['result'] == 'podcategory') {
        if ($maincategory['level'] != 1) {
      ?>
          <div class="globallasted">
            <div style="padding: 5px; border-bottom: 1px dashed rgb(131, 131, 131);"><a href="<?= $astedADM ?>category/<?= $maincategory['parent'] ?>/podcategory/" class="btsbackconedit">&#8647; Вернутся назад</a></div>
          </div>
        <? } else { ?>
          <div class="globallasted">
            <div style="padding: 5px; border-bottom: 1px dashed rgb(131, 131, 131);"><a href="<?= $astedADM ?>category/<?= $maincategory['forcatalog'] ?>/" class="btsbackconedit">&#8647; Вернутся назад</a></div>
          </div>
      <? }
      } ?>
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Список <? if ($_GET['result'] == 'podcategory') {
                                                                  echo 'подкатегорий';
                                                                } else {
                                                                  echo 'категорий ';
                                                                } ?></h6>
          <i class="fa fa-cube" aria-hidden="true"> </i>
        </div>
        <div class="card-body">
          <div style="padding-top: 2px;">
            <?
            if ($_GET['result'] == "podcategory") {
              $site_objects = R::find('crm_site_catalog_category', 'parent = ? AND forcatalog = ?', [$_GET['id'], $maincategory['forcatalog']]);
            } else {
              $site_objects = R::find('crm_site_catalog_category', 'forcatalog = ? AND parent IS NULL', [$_GET['id']]);
            }
            foreach ($site_objects as $site_object) {
              $id = $site_object['id'];
              $name = $site_object['name'];
              $link = $site_object['pageurl'];
              $forcatalog = $site_object['forcatalog'];
              $images = $site_object['images'];
            ?>
              <form action="" method="post" class="container-fluid">
                <div class="row">

                  <?php if (!empty($site_object['images'])) {
                    $form = explode('.', $site_object['images']);
                    switch (end($form)) {
                      case "docx":
                        $formImages = '/asted/uploads/plugins/docx.webp';
                        break;
                      case "doc":
                        $formImages = '/asted/uploads/plugins/docx.webp';
                        break;
                      case "mov":
                        $formImages = '/asted/uploads/plugins/mov.webp';
                        break;
                      case "pdf":
                        $formImages = '/asted/uploads/plugins/pdf.webp';
                        break;
                      case "xlsx":
                        $formImages = '/asted/uploads/plugins/xlsx.webp';
                        break;
                      default:
                        $formImages = $site_object['images'];
                        break;
                    }  ?>
                    <div class="col-1">
                      <img src="<?= $formImages ?>" style="width: 32px; height: 32px;  margin: 8px;">
                    </div>
                  <? } ?>

                  <div class="<?php if (!empty($images)) { ?>col-7<? } else { ?>col-8<? } ?>">
                    <a href="/asted/category/<?= $id ?>/podcategory/" style="font-size: 14px;color: currentcolor;"><?= $name ?></a>
                    <div style="font-size: 12px;"><?= $link ?></div>
                  </div>
                  <div class="col-4"> <i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $id ?>,'category')" value="<?= $id ?>" style="float: right;"></i> <a href="/asted/category-edit/<?= $id ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                  </div>
                </div>
              </form><br>
            <? } ?>
          </div>

          <br>
          <form action="" method="post" enctype="multipart/form-data" style="border: 1px solid rgb(228, 228, 228); padding: 6px; border-radius: 4px;">
            <label for="exampleInputPassword1">Имя категории (Обязательно):</label><br>
            <input class="form-control" id="title" name="title" placeholder="Имя категории">
        <label for="content">Описание:</label><br>
              <span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
              <textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
            <!-- <label for="exampleInputPassword1">Ссылка на категорию (не обязательно):</label><br>
            <input class="form-control hidemenugeneration" id="pageurl" name="pageurl" placeholder="Ссылка категории">
            <hr class="hidemenugeneration"> -->
            <!-- <label for="content">Описание</label>
            <textarea name="content" id="content" class="form-control astededitor" cols="30" rows="10" placeholder="текст или html-код"></textarea> -->
            <!-- <br><button class="form-control back-call">Выбрать Изображение</button>
            <div class="gallery" id="gallery">
            </div>
            <input type="text" class="form-control d-none" name="image">
            <input type="text" class="form-control d-none sqlgallery" name="galery">
            <label for="keywords">Ключевые слова:</label>
            <input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую">
            <label for="descriptions">Дискрипшен:</label>
            <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="ключевой текст"> -->
            <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">
          </form><br>
          <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить категорию каталога</button>
        </div>
      </div>

    </div>
  </div>
  <? ?>
</div>




<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
  let editorEnabled = false;

  document.getElementById('btnEdit').addEventListener('click', function() {
    if (!editorEnabled) {
      $('.astededitor').each(function() {
        CKEDITOR.replace(this, {
          extraPlugins: 'uploadimage',
          extraAllowedContent: '*[*]{*}(*)'
        });
        CKEDITOR.dtd.$removeEmpty.span = false
        CKEDITOR.dtd.$removeEmpty.i = false
      });
      editorEnabled = true;
    } else {
      $('.astededitor').each(function() {
        CKEDITOR.instances[this.id].destroy();
      });
      editorEnabled = false;
    }
  });
</script>