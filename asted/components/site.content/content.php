<?php
include "templates/header.php";
$idcustom = $_GET['id'];
if ($_POST['submit'] == 'menuadd') {
  if (empty($_POST['menusiteurl'])) {
    $tourl = makeCode($_POST['menusitetitle']);
  } else {
    $tourl = $_POST['menusiteurl'];
  }
  if (empty($idcustom)) {
    $addforpage = '0';
  } else {
    $addforpage = $idcustom;
  }
  $addcode = 'P' . $idcustom . '' . $tourl . '';
  if ($_POST['type'] == 'text') {
    $addcontent = $_POST['content'];
  } else {
    $addcontent = $_POST['image'];
  }
  $sql = "INSERT INTO `crm_site_block` (name,forpage, block, content,type,galery) VALUES ('{$_POST['menusitetitle']}','{$addforpage}','{$addcode}','{$addcontent}','{$_POST['type']}','{$_POST['galery']}')";
  if (mysqli_query($link, $sql)) {
    echo '<meta http-equiv="refresh" content="0;URL=/asted/content/' . $_GET['id'] . '/" />';
  } else {
    echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
  }
}
?>
<link href="<?= $astedADM ?>templates/css/site_content.css" rel="stylesheet">
<div class="container-fluid">


  <?php
  if (isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $sql_lead_leadDeletesss = "DELETE FROM crm_site_block WHERE id={$menu_id}";
    $result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
  }


  $sql_custport = "SELECT * FROM `crm_site_block`";
  $result_custport = mysqli_query($link, $sql_custport);
  $result_custportcont = mysqli_num_rows($result_custport);
  $sql_region = "SELECT * FROM `crm_site_pages` WHERE type ='code'";
  $result_region = mysqli_query($link, $sql_region);
  while ($region = mysqli_fetch_assoc($result_region)) {
    $astedRegionName = "{$region['name']}";
    $astedRegionId = "{$region['id']}";
    $CatalogRegionFilter[] = '<div id="filter_' . $astedRegionId . '" class="top-filter__input">
                    <input
                      class="top-filter__inp"
                      type="radio"
                      name="fil-district"
                      id="page' . $astedRegionId . '"
                      value=""
                    /><label for="' . $astedRegionId . '" class="top-filter__block">' . $astedRegionName . '<span></span>
                    </label>
                  </div> 
                   ';
    $CatalogRegionFilterScript2[] = '<script>$("#filter_' . $astedRegionId . '").click(function () {window.location.href = "/asted/content/' . $astedRegionId . '/";});</script>';
  }
  ?>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Контентные блоки</h1><br>
    <h6>Всего блоков: <strong><?= $result_custportcont ?></strong></h6>
  </div>
  <div class="col-12">
    <div class="top-filter">
      <div class="top-filter__row">
        <div class="top-filter__input" id="filter_0">
          <input class="top-filter__inp" type="radio" name="fil-district" id="fil-district0" value="" checked />
          <label for="fil-district0" class="top-filter__block">
            Основные <span></span>
          </label>
        </div>
        <?php
        foreach ($CatalogRegionFilter as $row) {
          echo $row;
        }
        ?>
      </div>
    </div>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Контентные блоки</h6>
    </div>
    <style type="text/css">
      .titleblock {
        display: flex;
        justify-content: space-between;
        background: black;
        color: wheat;
        padding: 4px;
      }

      .warningblocks2 {
        padding: 4px;
        border: 1px solid red;
        font-size: 12px;
        background: rgb(102, 47, 47);
        color: white;
        float: right;
        width: 30%;
        margin-top: 5px;
      }

      .warningblocks {
        cursor: pointer;
        padding: 4px;
        border: 1px solid red;
        font-size: 12px;
        background: rgb(102, 47, 47);
        color: white;
        width: 30%;
        margin-top: 5px;
        margin-bottom: 20px;
      }
    </style>
    <?
    if (empty($idcustom)) {
      $sql_blocks = "SELECT * FROM `crm_site_block` WHERE forpage='0'";
      $result_blocks = mysqli_query($link, $sql_blocks);
      while ($blocks = mysqli_fetch_assoc($result_blocks)) {
        $idmenu = "{$blocks['id']}";
        $name = "{$blocks['name']}";
        $block = "{$blocks['block']}";
        $content = "{$blocks['content']}";
        $type = "{$blocks['type']}";
        if ($type == 'image') {
          $content = '<div class="input-file-list-item">
					<img class="input-file-list-img" src="' . $content . '">
					</div>';
        }
    ?>
        <div class="card-body">
          <div class="titleblock">

            <div onClick="copyCode(this)" class="contenttitle" title="Скопировать" style="cursor: pointer;"><?= $name ?></div>

            <div><i onClick="copyCode(this)" class="contenttitle" title="Скопировать"  style="cursor: pointer; color: rgb(102, 102, 92);">{$BLOCK<?= $block ?>}</i> <a href="/asted/content-edit/<?= $idmenu ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka1"></i></a><i class="fas fa-fw fa-trash trashclick<?= $idmenu ?>" value="<?= $idmenu ?>" style="float: right;"></i>
            </div>
          </div>
          <div class="p-3 bg-gray-100"><?= $content ?></div><br>

        </div>
        <script>
          $('.trashclick<?= $idmenu ?>').click(function() {
            let confirmation = confirm("Вы уверены, что хотите удалить?");
            if (confirmation) {
              var menu_id = "<?= $idmenu ?>";
              $.ajax({
                url: '/asted/content/',
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
      <?
      }
    } else {
      $sql_blocks = "SELECT * FROM `crm_site_block` WHERE forpage={$idcustom}";
      $result_blocks = mysqli_query($link, $sql_blocks);
      while ($blocks = mysqli_fetch_assoc($result_blocks)) {
        $idmenu = "{$blocks['id']}";
        $name = "{$blocks['name']}";
        $block = "{$blocks['block']}";
        $content = "{$blocks['content']}";
        $type = "{$blocks['type']}";
        if ($type == 'image') {
          $content = '<div class="input-file-list-item">
					<img class="input-file-list-img" src="' . $content . '">
					</div>';
        }
      ?>
        <div class="card-body">
          <div class="titleblock">

            <div onClick="copyCode(this)" class="contenttitle" title="Скопировать" style="cursor: pointer;"><?= $name ?></div>

            <div><i onClick="copyCode(this)" class="contenttitle" title="Скопировать" style="cursor: pointer; color: rgb(102, 102, 92);">{$BLOCK<?= $block ?>} </i> <a href="/asted/content-edit/<?= $idmenu ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka1"></i></a><i class="fas fa-fw fa-trash trashclick<?= $idmenu ?>" value="<?= $idmenu ?>" style="float: right;"></i>
            </div>
          </div>
          <div class="p-3 bg-gray-100"><?= $content ?></div><br>

        </div>
        <script>
          $('.trashclick<?= $idmenu ?>').click(function() {
            let confirmation = confirm("Вы уверены, что хотите удалить?");
            if (confirmation) {
              var menu_id = "<?= $idmenu ?>";
              $.ajax({
                url: '/asted/content/',
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
    <?

      }
    } ?>
  </div>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Создание блока</h1>
    <h6>Код блока пример: <strong>{$BLOCK<span style="color: red">name</span>}</strong></h6>
  </div>

  <br>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-6">
        <label for="">Название</label>
        <input class="form-control" id="menusitetitle" name="menusitetitle" placeholder="Название объекта">
      </div>
      <div class="col-6">
        <label for="">Логический код</label>
        <input class="form-control hidemenugeneration" id="menusiteurl" name="menusiteurl" placeholder="Логический код">
      </div>
    </div>
    <label for="type">Тип блока</label>
    <select name="type" id="type" class="form-control">
      <option value="text">Текст</option>
      <option value="image">Изображение</option>
    </select><br>
    <span class="warningblocks" id="btnEdit">Нажмите для включения/выключения редактора</span>
    <textarea name="content" id="content_zxc" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
    <div class="d-none" id="image_zxc">
      <button class="form-control back-call">Выбрать изображения</button>
      <div class="gallery" id="gallery">
      </div>
      <input type="text" class="form-control d-none" name="image">
      <input type="text" class="form-control d-none" name="galery">
    </div>
    <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">
  </form>
  <span class="warningblocks2">ВНИМАНИЕ В ЛОГИЧЕСКОМ КОДЕ ЗАПРЕЩЕНО ИСПОЛЬЗОВАТЬ ЛЮБЫЕ СПЕЦСИМВОЛЫ: !@£$%^&*()_+</span>

  <br>
  <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить объект</button>
</div>




<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
  // Получите ссылку на элемент textarea, который вы хотите превратить в CKEditor
  let editorEnabled = false;

  document.getElementById('btnEdit').addEventListener('click', function() {
    if (!editorEnabled) {
      $('.astededitor').each(function() {
        CKEDITOR.replace(this, {
          extraPlugins: 'uploadimage',
          extraAllowedContent: '*[*]{*}(*)'
        });
      });
      CKEDITOR.dtd.$removeEmpty.span = false
      CKEDITOR.dtd.$removeEmpty.i = false
      editorEnabled = true;
    } else {
      $('.astededitor').each(function() {
        CKEDITOR.instances[this.id].destroy();
      });
      editorEnabled = false;
    }
  });

  let typeBlock = document.getElementById('type');
  let blockText = document.getElementById('content_zxc');
  let blockImage = document.getElementById('image_zxc');
  let warningblocks = document.querySelector('.warningblocks');
  typeBlock.addEventListener("change", function() {
    if (typeBlock.value == 'text') {
      blockText.classList.remove('d-none')
      warningblocks.classList.remove('d-none')
      blockImage.classList.add('d-none')
    } else {
      if (editorEnabled) {
        $('.astededitor').each(function() {
          CKEDITOR.instances[this.id].destroy();
        });
        editorEnabled = false;
      }
      blockText.classList.add('d-none')
      warningblocks.classList.add('d-none')
      blockImage.classList.remove('d-none')
    }
  });
  $("#filter_0").click(function() {
    window.location.href = "/asted/content/";
  });
</script>
<script>
  $("#page<?= $idcustom ?>").prop("checked", true);
</script>
<script>
         $(function() {
            $(".contenttitle").tooltip();
         });
      </script>
<?php
foreach ($CatalogRegionFilterScript2 as $row) {
  echo $row;
}
?>