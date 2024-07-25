<? include "templates/header.php"; ?>
<div class="container-fluid">
    <?php
    $sectonconnection = R::load('crm_site_section', $_GET['id']);
    $websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
    if ($_POST['submit'] == 'websiteadd') {
        if (empty($_POST['pageurl'])) {
            $tourl = makeUrlCode($_POST['title']);
        } else {
            $tourl = makeUrlCode($_POST['pageurl']);
        }
        $newsAdd = R::xdispense('crm_site_news');
        $newsAdd['title'] = $_POST['title'];
        $newsAdd['forsection'] = $_GET['id'];
        $newsAdd['forwebsite'] = $sectonconnection['forwebsite'];
        $newsAdd['pageurl'] = $tourl;
        $newsAdd['content'] = $_POST['content'];
        $newsAdd['datepush'] = $_POST['datepush'];
        $newsAdd['images'] = $_POST['image'];
        $newsAdd['galery'] = $_POST['galery'];
        $newsAdd['keywords'] = $_POST['keywords'];
        $newsAdd['descriptions'] = $_POST['descriptions'];
        $fildAllAdd = R::find('crm_site_news_field', 'forsection = ?', [$_GET['id']]);
        foreach ($fildAllAdd as $fildAllStarsadd) {
            $codeadd = $fildAllStarsadd->code;
            $newsAdd[$codeadd] = $_POST[$codeadd];
        }
        if (R::store($newsAdd)) {
            echo '<meta http-equiv="refresh" content="0;URL=/panel/news/' . $_GET['id'] . '/1305/" />';
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
                        Новость успешно добавлена
                    </div>
                </div>
    <? }
        }
    } ?>
    <?php
    if (isset($_POST["menu_id"])) {
        R::hunt('crm_site_news', 'id = ?', [$_POST["menu_id"]]);
    }
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sectonconnection['namesection'] ?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 download-db">
            <h6 class="m-0 font-weight-bold text-primary">Список объектов <?= $websiteconnection['namesite'] ?>:</h6>
        </div>
        <div class="card-body">
            <?
            $site_objects = R::find('crm_site_news', 'forsection = ? ORDER BY id DESC', [$_GET['id']]);
            foreach ($site_objects as $site_object) {
                $id = $site_object['id'];
                $title = $site_object['title'];
                $pageurl = $site_object['pageurl'];
                $keywords = $site_object['keywords'];
                $descriptions = $site_object['descriptions'];
                $images = $site_object['images'];
            ?>
                <div class="personal_divisions-body">
                    <div class="row">
                        <?php if (!empty($images)) { ?>
                            <div class="col-1 bg-gray-100" style="position: relative;padding-bottom: 8.5%;">
                                <img src="<?= $images ?>" style="position: absolute;width: 100%;height: 100%;top: 0;left: 0;object-fit: contain;">
                            </div>
                        <? } ?>

                        <div class="<?php if (!empty($images)) { ?>col-10<? } else { ?>col-11<? } ?>">
                            <div class="content d-flex justify-content-between align-items-center">
                                <div class="p-3">
                                    #<?= $id ?>- <a href=" https://<?= $websiteconnection['siteurl'] ?>/news/<?= $category ?>/<?= $pageurl ?>/" target="blank"><?= $title ?></a>
                                    <? if (!empty($keywords)) {
                                        echo '<br>Ключевые слова: ' . $keywords . ' ?>';
                                    } ?>
                                    <? if (!empty($descriptions)) {
                                        echo '<br>Дискрипшен: ' . $descriptions . ' ?>';
                                    } ?>
                                </div>
                            </div>

                        </div>
                        <div class="col-1">
                            <div class="personal_divisions-icon">
                                <i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $id?>,'news')" value="<?= $id ?>" style="float: right;"></i> <a href="/panel/news-edit/<?= $id ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                            </div>
                        </div>
                    </div>
             
                </div>
                <hr>
            <? } ?>
            <h3>Создать новый объект для <?= $websiteconnection['namesite'] ?>:</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Имя:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название">
                <hr class="hidemenugeneration">
                <input type="text" class="form-control hidemenugeneration" name="pageurl" id="pageurl" placeholder="Ссылка меню">
                <input type="checkbox" id="checkbox"> Прописать ссылку на меню вручную
                <small id="emailHelp" class="form-text text-muted">Если не установлена галочка, <strong>ссылка</strong> меню будет автоматический сгенерированна</small>
                <label for="content">Описание:</label><br>
                <span class="warningblocks btnEdit" id="btnEdit">Нажмите для включения/выключения редактора</span>
                <textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
                <label for="datepush">Дата:</label>
                <input type="text" class="form-control" name="datepush" id="datepush" placeholder="16.07.2020" value="<?= date("d.m.Y"); ?>">
                <?php
                $fildAll = R::find('crm_site_news_field', 'forsection = ?', [$_GET['id']]);
                foreach ($fildAll as $fildAllStars) {
                    $name = $fildAllStars->name;
                    $type = $fildAllStars->type;
                    $code = $fildAllStars->code;
                    $active = $fildAllStars->active;

                    if($active == "true"){
                        if($type == "input"){?>
                <label for="<?=$name?>"><?=$name?>:</label>
                <input type="text" class="form-control" name="<?=$code?>" id="<?=$code?>" placeholder="<?=$name?>">
                        <?}
                        if($type == "textarea"){?>
                 <label for="<?=$name?>"><?=$name?>:</label><br>
                 <span class="warningblocks btnEdit" id="btnEdit">Нажмите для включения/выключения редактора</span>
                <textarea name="<?=$code?>" id="<?=$code?>" class="form-control astededitor" rows="3" placeholder="<?=$name?>"></textarea>
                       <? }
                       if($type == "file"){?>
                        <br><button class="form-control back-call"><?=$name?></button>
                         <div class="gallery" id="gallery">
                         </div>
                         <input type="text" class="form-control d-none" name="image<?=$code?>">
                         <input type="text" class="form-control d-none sqlgallery" name="galery<?=$code?>">
                        <? }
                    }
                }
    ?>
                <br><button class="form-control back-call ">Выбрать изображения</button>
                <div class="gallery" id="gallery">
                </div>
                <input type="text" class="form-control d-none" name="image">
                <input type="text" class="form-control d-none sqlgallery" name="galery">
                <strong class="btnseo"> Настройки SEO <i class="fas fa-fw fa-bullhorn"></i></strong><br><br>
                <label for="keywords">Ключевые слова:</label>
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую">
                <label for="descriptions">Дискрипшен:</label>
                <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="ключевой текст">
                <input type="submit" name="submit" style="display:none" value="websiteadd" name="websiteadd" id="id0" class="btn btn-primary btn-user btn-block" />
            </form><br>
            <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить на сайт</button>

        </div>
    </div>
</div>
<? include "components/site.modalImage/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script>
    let editorEnabled = false;

    document.querySelectorAll('.btnEdit').forEach(function(btn) {
    btn.addEventListener('click', function() {
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
});
</script>
<script>
    $('.hidemenugeneration').hide(0);
    $('#checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('.hidemenugeneration').show(100);
        } else {
            $('.hidemenugeneration').hide(100);
        }
    });
</script>