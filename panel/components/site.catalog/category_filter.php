<?php
include "templates/header.php"; ?>
<div class="container-fluid">
    <?php
    if ($_GET['result'] == 'filvalue') {
        $mainFilter = R::load('crm_site_catalog_filter', $_GET['id']);
        $mainCategorys = R::find('crm_site_catalog_category', 'id IN (' . $mainFilter['category'] . ')');
        foreach ($mainCategorys as $mainCategory) {
            $mainCategoryName[] = $mainCategory['name'];
        }
    }
    if ($_POST['submit'] == "menuadd") {
        $filterAdd = R::xdispense('crm_site_catalog_filter');
        $filterAdd['name'] = $_POST['name'];
        if (empty($_GET['result'])) {
            $filterAdd['category'] = implode(",", $_POST['category']);
            $filterAdd['forcatalog'] = $_GET['id'];
        } else {
            $filterAdd['parent'] = $_GET['id'];
            $filterAdd['forcatalog'] = $mainFilter['forcatalog'];
        }
        if (R::store($filterAdd)) {
            if ($_GET['result'] == 'filvalue') {
                echo '<meta http-equiv="refresh" content="0;URL=/panel/category-filter/' . $_GET['id'] . '/filvalue/" />';
            } else {
                echo '<meta http-equiv="refresh" content="0;URL=/panel/category-filter/' . $_GET['id'] . '/" />';
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
        R::hunt('crm_site_catalog_filter', 'id = ?', [$_POST["menu_id"]]);
        R::hunt('crm_site_catalog_filter', 'parent = ?', [$_POST["menu_id"]]);
    }
    if (empty($_GET['result'])) {
        $countCategory = count(R::find('crm_site_catalog_category', 'level=1 and forcatalog=?', [$_GET['id']]));
        $allCategory = R::find('crm_site_catalog_category', 'level=1 and forcatalog=?', [$_GET['id']]);
        foreach ($allCategory as $value) {
            $categoryOption .= '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
        }
    }
    ?>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Список <? if (empty($_GET["result"])) {
                                                                                echo "Фильтров";
                                                                            } else {
                                                                                echo "значения фильтра " . $mainFilter['name'] . "(" . implode(',', $mainCategoryName) . ")";
                                                                            } ?></h6>
                    <? if (!empty($_GET["result"])) {
                        echo '<div style="padding: 5px;"><a href="/panel/category-filter/' . $mainFilter['forcatalog'] . '/" class="btsbackconedit">⇇ Вернутся назад</a></div>';
                    } ?>

                </div>

                <div class="card-body">
                    <div style="padding-top: 2px;">
                        <?
                        if ($_GET['result'] == "filvalue") {
                            $site_objects = R::find('crm_site_catalog_filter', 'parent = ? AND forcatalog = ?', [$_GET['id'], $mainFilter['forcatalog']]);
                        } else {
                            $site_objects = R::find('crm_site_catalog_filter', 'forcatalog = ? AND parent IS NULL', [$_GET['id']]);
                        }
                        foreach ($site_objects as $site_object) {
                            $id = $site_object['id'];
                            $name = $site_object['name'];
                            $parent = $site_object['parent'];
                            if (empty($_GET['result'])) {
                                $category = $site_object['category'];
                                $categoryCount = count(explode(',', $category));

                                $categoryName = array();
                                $categoryMas = R::find('crm_site_catalog_category', 'id IN (' . $category . ')');
                                foreach ($categoryMas as $value) {
                                    $categoryName[] = $value['name'];
                                }
                            }
                        ?>
                            <form action="" method="post">
                                <? if (empty($_GET['result'])) { ?>
                                    <a href="/panel/category-filter/<?= $id ?>/filvalue/" style="font-size: 12px;color: currentcolor;"><?= $name ?><? if ($categoryCount != $countCategory) {
                                                                                                                                                        echo ' (' . implode(', ', $categoryName) . ')';
                                                                                                                                                    } ?></a>
                                <? } else {
                                    echo $name;
                                } ?>
                                <i class="fas fa-fw fa-trash trashclick" onclick="Delete(<?= $id ?>,'category-filter')" value="<?= $id ?>" style="float: right;"></i> <a href="/panel/category-filter-edit/<?= $id ?>/" style="    padding-right: 12px;"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $id ?>" style="float: right;"></i></a>
                            </form><br>
                        <? } ?>
                    </div>

                    <br>
                    <form action="" method="post">
                        <? if (empty($_GET['result'])) { ?>
                            <input class="form-control" id="name" name="name" placeholder="Имя фильтра"><br>
                            <label for="category">Выберите категории к которым будет относится фильтр<br>(Для мультивыбора зажмите "Ctrl"):</label>
                            <select class="form-control responsible mb-3" name="category[]" id="category" multiple>
                                <?= $categoryOption ?>
                            </select>
                        <? } else { ?>
                            <input class="form-control" id="name" name="name" placeholder="Имя свойства фильтра"><br>
                        <? } ?>
                        <input type="submit" name="submit" style="display:none" value="menuadd" id="id0" class="btn btn-primary btn-user btn-block">
                    </form><br>
                    <button type="submit" onclick="javascript:document.getElementById('id0').click();" value="menuadd" name="menuadd" class="btn btn-primary">Добавить категорию каталога</button>
                </div>
            </div>
        </div>
    </div>
</div>
<? include "templates/footer.php"; ?>
<script>
    var select = document.getElementById("category");
    select.style.height = (select.scrollHeight) + "px";
</script>