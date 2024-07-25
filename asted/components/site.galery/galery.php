<? include "templates/header.php"; ?>
<style>
    .warningblocks {
        padding: 4px;
        border: 1px solid red;
        font-size: 12px;
        background: rgb(102, 47, 47);
        color: white;
        float: right;
        width: 30%;
        margin-top: 5px;
    }
</style>
<div class="container-fluid">
    <?php
    $sectonconnection = R::load('crm_site_section', $_GET['id']);
    $websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
    if ($_POST['submit'] == 'galeryadd') {
        $addpages = implode(';',$_POST['pages']);
        $galleryAdd = R::xdispense('crm_site_galery');
        $galleryAdd['title'] = $_POST['title'];
        $galleryAdd['shortcode'] = makeUrlCode($_POST['title']);
        $galleryAdd['galery'] = $_POST['galery'];
        $galleryAdd['pages'] = $addpages;
        if (R::store($galleryAdd)) {
            echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'galery/' . $_GET['id'] . '/1305/" />';
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
                        Asted Cloud: Товар успещно добавлена
                    </div>
                </div>
    <? }
        }
    } ?>
    <?php
    if (isset($_POST["menu_id"])) {
        R::hunt('crm_site_galery', 'id = ?', [$_POST["menu_id"]]);
    }
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sectonconnection['namesection'] ?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Список галерей сайта <?= $websiteconnection['namesite'] ?>:</h6>
        </div>
        <div class="card-body">
            <?
            $site_pages = R::find('crm_site_pages', 'type = ?', ['code']);
            $site_objects = R::findAll('crm_site_galery');
            foreach ($site_objects as $site_object) {
                $title = $site_object['title'];
                $shortcode = $site_object['shortcode'];
                $pages = $site_object['pages'];
                $id = $site_object['id'];
            ?>
                <div class="personal_divisions-body">
                    <div class="p-3 bg-gray-100"><?= $title ?> <span style="font-size: 10px;"> (CODE: <?=$shortcode?> ) </span>
                    </div>
                    <div class="personal_divisions-icon">
                        <i class="fas fa-fw fa-trash trashclick<?= $id ?>" value="<?= $id ?>" style="float: right;"></i> <a href="<?= $astedADM ?>galery-edit/<?= $id ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                    </div>
                    <br>
                    <script>
                        $('.trashclick<?= $id ?>').click(function() {
                            let confirmation = confirm("Вы уверены, что хотите удалить?");
                            if (confirmation) {
                                var menu_id = "<?= $id ?>";
                                $.ajax({
                                    url: '/asted/galery/',
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
            <hr>
            <h3>Создать новую Галерею для <?= $websiteconnection['namesite'] ?>:</h3>
            <form method="post" enctype="multipart/form-data">
                <label for="title">Название Галереи</label><input type="text" name="title" id="title" class="form-control" placeholder="Название галереии">
                <hr class="hidemenugeneration">
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
                </div>
                <input type="text" class="form-control d-none" name="image">
                <input type="text" class="form-control d-none sqlgallery" name="galery"><br>
                <!-- <div class="input-file-row">
                    <label class="input-file">
                        <input type="file" name="galery[]" multiple accept="image/*">
                        <span>Выберите файлы</span>
                    </label>
                    <div class="input-file-list"></div>
                </div> -->
                <input type="submit" name="submit" style="display:none" value="galeryadd" name="galeryadd" id="id0" class="btn btn-primary btn-user btn-block" />
            </form>
            <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить на сайт</button>

        </div>
    </div>
    <? include "components/site.modalImage/modalImg.php"; ?>
    <? include "templates/footer.php"; ?>
    <script>
        $('.hidemenugeneration').hide(0);
        $('.warningblocks').hide(0);
        $('#checkbox').click(function() {
            if ($(this).is(':checked')) {
                $('.hidemenugeneration').show(100);
                $('.warningblocks').show(100);
            } else {
                $('.hidemenugeneration').hide(100);
                $('.warningblocks').hide(0);
            }
        });
        // var dt = new DataTransfer();

        // $('.input-file input[type=file]').on('change', function() {
        //     let $files_list = $(this).closest('.input-file').next();
        //     $files_list.empty();

        //     for (var i = 0; i < this.files.length; i++) {
        //         let file = this.files.item(i);
        //         dt.items.add(file);

        //         let reader = new FileReader();
        //         reader.readAsDataURL(file);
        //         reader.onloadend = function() {
        //             let new_file_input = '<div class="input-file-list-item">' +
        //                 '<img class="input-file-list-img" src="' + reader.result + '">' +
        //                 '<span class="input-file-list-name">' + file.name + '</span>' +
        //                 '<a href="#" onclick="removeFilesItem(this); return false;" class="input-file-list-remove">x</a>' +
        //                 '</div>';
        //             $files_list.append(new_file_input);
        //         }
        //     };
        //     this.files = dt.files;
        // });

        // function removeFilesItem(target) {
        //     let name = $(target).prev().text();
        //     let input = $(target).closest('.input-file-row').find('input[type=file]');
        //     $(target).closest('.input-file-list-item').remove();
        //     for (let i = 0; i < dt.items.length; i++) {
        //         if (name === dt.items[i].getAsFile().name) {
        //             dt.items.remove(i);
        //         }
        //     }
        //     input[0].files = dt.files;
        // }
    </script>