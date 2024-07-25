<? include "templates/header.php"; ?>
<div class="container-fluid">
    <style>
        .marker {
            display: flex;
            flex-direction: column;
        }
    </style>
    <?php
    $sectonconnection = R::load('crm_site_section', $_GET['id']);
    $websiteconnection = R::load('crm_site', $sectonconnection['forwebsite']);
    if ($_POST['submit'] == 'websiteadd') {
        //print_r($_POST);

        $catalogAdd = R::xdispense('crm_site_catalog');
        $clearmascategory = array_diff($_POST['category'], array(0));
        $catalogAdd['title'] = $_POST['title'];
        $catalogAdd['pageurl'] = generateUniqueTourlFromPost($_POST, 'crm_site_catalog', 0);
        $catalogAdd['keywords'] = $_POST['keywords'];
        $catalogAdd['descriptions'] = $_POST['descriptions'];
        $catalogAdd['forsection'] = $_GET['id'];
        $catalogAdd['forwebsite'] = $sectonconnection['forwebsite'];
        $catalogAdd['content'] = $_POST['content'];
        $catalogAdd['images'] = $_POST['image'];
        $catalogAdd['category'] = end($clearmascategory);
        $catalogAdd['galery'] = $_POST['galery'];
        $catalogAdd['price'] = $_POST['price'];
        $catalogAdd['filter'] = $_POST['filter'];
        $fildAllAdd = R::find('crm_site_catalog_field', 'forsection = ?', [$_GET['id']]);
        foreach ($fildAllAdd as $fildAllStarsadd) {
                    $codeadd = $fildAllStarsadd->code;
                    $catalogAdd[$codeadd] = $_POST[$codeadd];
        }
        foreach ($_POST as $key => $value) {
            // Находим позицию разделителя '@'
            $delimiterPosition = strpos($key, '@');
            // Если разделитель '@' найден и подстрока 'image' присутствует до разделителя
            if ($delimiterPosition !== false && strpos(substr($key, 0, $delimiterPosition), 'image') !== false) {
                //echo "В ключе $key есть подстрока 'image' до разделителя '@'.<br>";
                $afterDelimiter = substr($key, $delimiterPosition + 1);
                $catalogAdd['image_'.$afterDelimiter] = $_POST[$key];
            } elseif ($delimiterPosition !== false && strpos(substr($key, 0, $delimiterPosition), 'galery') !== false) {
                $afterDelimiter = substr($key, $delimiterPosition + 1);
                $catalogAdd['gallery_'.$afterDelimiter] = $_POST[$key];
            } 
        }
        if (R::store($catalogAdd)) {
           // echo '<meta http-equiv="refresh" content="0;URL=/asted/catalog/' . $_GET['id'] . '/" />';
        } else {
            echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
    </div></div>';
        }
    }
    if (isset($_POST["menu_id"])) {
        R::hunt('crm_site_catalog', 'id = ?', [$_POST["menu_id"]]);
    }
    $site_category = R::find('crm_site_catalog_category', 'forcatalog = ?', [$_GET['id']]);
    foreach ($site_category as $category) {
        if ($category['level'] == 1) {
            $category1 .= '<option data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
        }
        if ($category['level'] == 2) {
            $category2 .= '<option data-child="cat-' . $category['parent'] . '" data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
        }
        if ($category['level'] == 3) {
            $category3 .= '<option data-child="cat-' . $category['parent'] . '" data-cat="cat-' . $category['id'] . '" value="' . $category['pageurl'] . '">' . $category['name'] . '</option>';
        }
    }
    ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $sectonconnection['namesection'] ?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 download-db d-flex flex-column">
            <h6 class="mb-3 font-weight-bold text-primary">Список Товаров <?= $websiteconnection['namesite'] ?>:</h6>
            <input type="text" class="form-control input_search" name="search" id="search" placeholder="Поиск">
        </div>
        <div class="card-body">
            <div class="products">
                <?
                $totalItems = count(R::findAll('crm_site_catalog', 'forsection = ?', [$_GET['id']]));
                $itemsPerPage = 10;
                $totalPages = ceil($totalItems / $itemsPerPage);
                if (isset($_GET['result']) && is_numeric($_GET['result'])) {
                    $currentPage = $_GET['result'];
                } else {
                    $currentPage = 1;
                }
                $start = ($currentPage - 1) * $itemsPerPage;
                $end = $start + $itemsPerPage - 1;
                // Получение элементов текущей страницы
                $site_objects = R::findAll('crm_site_catalog', "forsection = ? LIMIT $start, $itemsPerPage", [$_GET['id']]);
                foreach ($site_objects as $site_object) {
                    $id = $site_object['id'];
                    $title = $site_object['title'];
                    $pageurl = $site_object['pageurl'];
                    $keywords = $site_object['keywords'];
                    $descriptions = $site_object['descriptions'];
                    $images = $site_object['image_images'];
                    $categoryLink = $site_object['category'];
                    $category = R::findOne('crm_site_catalog_category', 'pageurl=?', [$categoryLink]);
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
                                        #<?= $id ?>- <?= $category['name'] ?> - <?= $title ?>
                                        <br>Ключевые слова: <?= $keywords ?>
                                        <br>Дискрипшен: <?= $descriptions ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-1">
                                <div class="personal_divisions-icon">
                                    <i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $id ?>,'catalog')" value="<?= $id ?>" style="float: right;"></i> <a href="/panel/catalog-edit/<?= $id ?>/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                <? }
                // Генерация ссылок на другие страницы
                $visibleLinks = 5;
                $range = floor($visibleLinks / 2);
                $startRange = max(1, $currentPage - $range);
                $endRange = min($startRange + $visibleLinks - 1, $totalPages);
                echo '<div class="d-flex justify-content-center"><ul class="pagination">';
                if ($startRange > 1) {
                    echo '<li class="page-item"><a class="page-link" href="/panel/catalog/' . $_GET["id"] . '/1/">1</a></li>';
                    if ($startRange > 2) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                }
                for ($page = $startRange; $page <= $endRange; $page++) {
                    $activeClass = ($page == $currentPage) ? 'active' : '';
                    echo '<li class="page-item ' . $activeClass . '"><a class="page-link" href="/panel/catalog/' . $_GET["id"] . '/' . $page . '/">' . $page . '</a></li>';
                }
                if ($endRange < $totalPages) {
                    if ($endRange < $totalPages - 1) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                    echo '<li class="page-item"><a class="page-link" href="/panel/catalog/' . $_GET["id"] . '/' . $totalPages . '/">' . $totalPages . '</a></li>';
                }
                echo '</ul></div>'; ?>
            </div>
            <div class="products_search d-none">
            </div>
            <h3>Создать новый товар для <?= $websiteconnection['namesite'] ?>:</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="title">Имя Товара:</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Название товара">
                <!-- <hr class="hidemenugeneration">
                <input type="text" class="form-control hidemenugeneration" name="pageurl" id="pageurl" placeholder="Ссылка меню">
                <input type="checkbox" id="checkbox"> Прописать ссылку на меню вручную
                <small id="emailHelp" class="form-text text-muted">Если не установлена галочка, <strong>ссылка</strong> меню будет автоматический сгенерированна</small> -->
                <label for="content">Описание:</label><br>
                <span class="warningblocks btnEdit" id="btnEdit">Нажмите для включения/выключения редактора</span>
                <textarea name="content" id="content" class="form-control astededitor" rows="3" placeholder="текст либо html-код"></textarea>
                <label for="price">Цена</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="8 б.р"> 
                <label for="CategoryLevel1">Категории каталога:</label>
                <select class="form-control responsible mb-3" name="category[]" id="CategoryLevel1">
                    <option data-cat="default" value="0">Выберите категорию</option>
                    <?= $category1 ?>
                </select>
                <select class="form-control responsible mb-3 d-none" name="category[]" id="CategoryLevel2">
                    <option data-cat="default" value="0">Выберите категорию</option>
                    <?= $category2 ?>
                </select>
                <!--<select class="form-control responsible mb-3 d-none" name="category[]" id="CategoryLevel3">
                    <option data-cat="default" value="0">Выберите категорию</option>
                    <?= $category3 ?>
                </select> -->
                <!-- <label for="filter">Акционный товар</label>
                <select name="filter" id="filter" class="form-control">
                    <option value="0">Нет</option>
                    <option value="1">Да</option>
                </select> -->
                <?php
                $fildAll = R::find('crm_site_catalog_field', 'forsection = ?', [$_GET['id']]);
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
                        <div class="input-<?=$code?> input-area">
                           <br><button class="form-control back-call"><?=$name?> </button>
                            <div class="gallery" id="gallery">
                            </div>
                            <input type="text" class="form-control d-none sqlimage" name="image@<?=$code?>">
                            <input type="text" class="form-control d-none sqlgallery" name="galery@<?=$code?>">
                        </div>
                       <? }
                    }
                }
    ?>
                <!-- <br><button class="form-control back-call">Выбрать изображения</button>
                <div class="gallery" id="gallery">
                </div>
                <input type="text" class="form-control d-none" name="image">
                <input type="text" class="form-control d-none sqlgallery" name="galery"> -->
                <br>
                <strong class="btnseo"> Настройки SEO <i class="fas fa-fw fa-bullhorn"></i></strong><br><br>
                <label for="keywords">Ключевые слова:</label>
                <input type="text" class="form-control" name="keywords" id="keywords" placeholder="слова что повторяються на странице и которые важные через запятую">
                <label for="descriptions">Дискрипшен:</label>
                <input type="text" class="form-control" name="descriptions" id="descriptions" placeholder="ключевой текст">
                <input type="submit" name="submit"  value="websiteadd" name="websiteadd" id="id0" class="d-none btn btn-primary btn-user btn-block" />
            </form><br>
            <button type="submit" id="submit-button" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary">Добавить товар на сайт</button>

        </div>
    </div>
</div>
<? include "components/site.modalImageAll/modalImg.php"; ?>
<? include "templates/footer.php"; ?>
<script src="/panel/components/site.modalImageAll/script.js" type="module"></script>
<script>
    let inpSearch = document.getElementById('search');
    let blokProduct = document.querySelector('.products');
    let blokSearch = document.querySelector('.products_search');
    var typingTimer;
    var doneTypingInterval = 1000;

    // const dropdown = e.parentNode.parentNode.querySelector('.search-wrapper__dropdown');
    inpSearch.addEventListener('input', function() {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(search, doneTypingInterval);
    });
    // document.addEventListener('click', function(event) {
    //     if (!dropdown.contains(event.target)) {
    //         dropdown.classList.remove('search-wrapper__dropdown_open')
    //         e.value = '';
    //     }
    // });
    function search() {
        let input_value = inpSearch.value;
        if (input_value == "" || input_value == null) {
            blokProduct.classList.remove("d-none");
            blokSearch.classList.add("d-none");
        }
        jQuery.ajax({
            url: '/panel/components/site.catalog/search.php',
            type: 'POST',
            data: {
                input_value
            },
            success: function(data) {
                if (data['resultsSearch']) {
                    console.log(data['resultsSearch']);
                    blokSearch.innerHTML = data['resultsSearch'];
                    blokSearch.classList.remove("d-none");
                    blokProduct.classList.add("d-none");
                } else {
                    blokSearch.classList.add("d-none");
                    blokProduct.classList.remove("d-none");
                }
            },
        });
    }
    // var categorySelect = document.getElementById("category");
    // categorySelect.addEventListener("change", function() {
    //     var selectedCategory = this.value;
    //     document.querySelectorAll('.filter').forEach(function(e) {
    //         e.classList.add('d-none');
    //         e.querySelector('option[data-cat="default"]').selected = true;
    //     })
    //     if (selectedCategory != 0) {
    //         var filterBlock = document.querySelectorAll('.filter[data-category="' + selectedCategory + '"]');
    //         if (filterBlock) {
    //             filterBlock.forEach(function(e) {
    //                 e.classList.remove("d-none");
    //             })
    //         }
    //     }
    // });
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
    $('.hidemenugeneration').hide(0);
    $('#checkbox').click(function() {
        if ($(this).is(':checked')) {
            $('.hidemenugeneration').show(100);
        } else {
            $('.hidemenugeneration').hide(100);
        }
    });

    const sel1 = document.getElementById("CategoryLevel1");
    const sel2 = document.getElementById("CategoryLevel2");
    // const sel3 = document.getElementById("CategoryLevel3");
    let sel2Option = sel2.querySelectorAll('option')
    // let sel3Option = sel3.querySelectorAll('option')
    sel1.addEventListener("change", function() {
        let atrib = sel1.options[sel1.selectedIndex].dataset.cat;
        let count = 0;
        sel2.querySelector('[data-cat="default"]').selected = true;
        // sel3.querySelector('[data-cat="default"]').selected = true;
        // sel3.classList.add('d-none');
        sel2Option.forEach(function(e) {
            if (e.dataset.child != atrib) {
                e.classList.add('d-none');
            }
            if (e.dataset.child == atrib) {
                e.classList.remove('d-none');
                count++;
            }
            if (e.dataset.child == 'default') {
                e.classList.remove('d-none');

            }
        })
        console.log(count);
        if (count == '0') {
            sel2.classList.add('d-none');
        } else {
            sel2.classList.remove('d-none');
        }
    });
    // sel2.addEventListener("change", function() {
    //     let atrib = sel2.options[sel2.selectedIndex].dataset.cat;
    //     let count = 0;
    //     sel3.querySelector('[data-cat="default"]').selected = true;
    //     sel3Option.forEach(function(e) {
    //         if (e.dataset.child != atrib) {
    //             e.classList.add('d-none');
    //         }
    //         if (e.dataset.child == atrib) {
    //             e.classList.remove('d-none');
    //             count++;
    //         }
    //         if (e.dataset.child == 'default') {
    //             e.classList.remove('d-none');
    //         }
    //     })
    //     if (count == '0') {
    //         sel3.classList.add('d-none');

    //     } else {
    //         sel3.classList.remove('d-none');
    //     }
    // });
</script>