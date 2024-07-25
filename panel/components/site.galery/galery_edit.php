<? include "templates/header.php"; ?>
<div class="container-fluid">
    <?php
    $idcustom = $_GET['id'];
    if ($_POST['submit'] == 'websiteadd') {
        $updatePages = implode(';', $_POST['pages']);
        $updateGalery = R::load('crm_site_galery', $idcustom);
        $updateGalery['title'] = $_POST['title'];
        $updateGalery['pages'] = $updatePages;
        $updateGalery['galery'] = $_POST['galery'];
        if (R::store($updateGalery)) {
            echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'galery-edit/' . $_GET['id'] . '/1305/" />';
        } else {
            echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
            </div></div>';
        }
    }
    if (is_numeric($_GET['result'])) {
        if (isset($_GET['result'])) {
            if ($_GET['result'] == '1305') {
    ?>
                <div class="container-fluid">
                    <div class="alert alert-success" role="alert">
                        Asted Cloud: Галерея успещно обновлена
                    </div>
                </div>
    <? }
        }
    }
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Обновить Галерею:</h6>
            <div style="padding: 5px; border-bottom: 1px dashed rgb(131, 131, 131);"><a href="<?= $astedADM ?>galery/" class="btsbackconedit">&#8647; Вернутся к списку всех блоков</a></div>
        </div>
        <div class="card-body">
            <?
            $site_pages = R::find('crm_site_pages', 'type = ?', ['code']);
            $site_object = R::load('crm_site_galery', $_GET['id']);
            $pages = $site_object['pages'];
            $title = $site_object['title'];
            $galery = $site_object['galery'];
            $images = $site_object['images'];
            ?>
            <div class="personal_divisions-body">
                <div class="p-3 bg-gray-100"><?= $title ?>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Название" value="<?= $title ?>">
                <!-- <label for="pages">Выбрать страницы для галереии</label>
                <select class="form-control" name="pages[]" id="pages" multiple>
                    <option value="0">Выберите</option>
                    <? foreach ($site_pages as $site_page) {
                        echo '<option value="' . $site_page['pageurl'] . '">' . $site_page['pagename'] . '</option>';
                    }
                    ?>
                </select><br> -->
                <br><button class="form-control back-call multiple galery">Выбрать изображения</button>
                <div class="gallery" id="gallery">
                    <?
                    $masgalery = explode(';', $galery);
                    foreach ($masgalery as $key) {
                        if (!empty($key)) {
                            if ($key == $images) {
                                echo '<div class="gallery-item glav" data-src="' . $key . '" draggable="true"><img src="' . $key . '"/></div>';
                            } else {
                                echo '<div class="gallery-item" data-src="' . $key . '" draggable="true"><img src="' . $key . '"/></div>';
                            }
                        }
                    }
                    ?>
                </div>
                
                <input type="text" class="form-control d-none" name="image" value="<?= $images ?>">
                <input type="text" class="form-control d-none sqlgallery" name="galery" value="<?= $galery ?>">
                <input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
            </form><br>
            <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Обновить</button>
        </div>
    </div>

</div>
<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<!-- <script>
    const phpValue = "<?= $pages ?>";
    const valuesArray = phpValue.split(";");
    const select = document.getElementById("pages");
    for (let i = 0; i < select.options.length; i++) {
        const option = select.options[i];
        if (valuesArray.includes(option.value)) {
            option.selected = true;
        }
    }
</script> -->