<?php
$smarty->assign('NAMESITE', $site['0']['namesite']);
$smarty->assign('THEME_URL', $asted_theme);
$smarty->assign('THEME', $asted_themes);
$smarty->assign('URLZXC', $zxc);
//Детальная страница
//Система работы с блоками -Start
if (!empty($arrayAstedBlock)) {
    $outBlockArray = call_user_func_array('array_merge', $arrayAstedBlock); //Обрабатываем данные
}
$smarty->assign($outBlockArray); //Выводим их в шаблонизатор acws
//Система работы с блоками -End
$smarty->assign('CATALOG_DETAL_TITLE', $CatalogDetailTitle);
$smarty->assign('CATALOG_DETAL_CONTENT', $CatalogDetailContent);
$smarty->assign('CATALOG_DETAL_IMAGE', $CatalogDetailImage);
$smarty->assign('CATALOG_DETAL_PRICE', $CatalogDetailPrice);
$smarty->assign('CATALOG_DETAL_STOCK', $CatalogDetailStock);
$smarty->assign('NEWS_DETAL_TITLE', $astednewsPagename);
$smarty->assign('NEWS_DETAL_CONTENT', $astednewsContent);
$smarty->assign('NEWS_DETAL_IMG', $astednewsImages);
//Детальная страница
$smarty->assign('URL', $asted_url);
$smarty->assign('URL2', $asted_urlTwo);
$smarty->assign('URL3', $asted_urlThree);
//Для новостей
//Кастомные поля для сайта Asted
$smarty->assign('topmenuArry', $astedTopMenu);
$smarty->assign('botmenuArry', $astedBotMenu);
$smarty->assign('footermenuabout', $astedTopMenu2);
$smarty->assign('ULSHAREHOLDRS', $astedUlShareholders);
$smarty->assign('astedtype', $astedType['0']);
//Asted Page -START
if ($astedType['0'] == "pages") {
    $smarty->assign('CONTENT', $astedContent['0']);
}
$smarty->assign('TITLE', $astedPagename['0']);
$smarty->assign('TITLEPARENT', $astedParent['pagename']);
$smarty->assign('PAGEURLPARENT', $astedParent['pageurl']);
$tables = array('crm_site_pages', 'crm_site_custom', 'crm_site_catalog', 'crm_site_catalog_category', 'crm_site_news');
$curURLGlobal = $_SERVER['REQUEST_URI'];
$urlsGlobal = explode('/', $curURLGlobal);
$filteredUrls = array_filter($urlsGlobal);
if (!empty($filteredUrls)) {
    $endUrls = end($filteredUrls);
    // Поиск строки по заданным таблицам
    foreach ($tables as $table) {
        $rows = R::findOne($table, 'pageurl = ?', array($endUrls));
        if (!empty($rows)) {
            break;
        }
    }
    if (empty($rows['title'])) {
        $title2 = $rows['name'];
    } else {
        $title2 = $rows['title'];
    }

    $smarty->assign('TITLE2', $title2);
    $smarty->assign('KEYWORDS2', $rows['keywords']);
    $smarty->assign('DESCRIPTION2', $rows['descriptions']);
} else {
    // Обработка случая, когда массив пуст
}
//Asted Page -END
//Asted News -START



//** раскомментируйте следующую строку для отображения отладочной консоли
//$smarty->debugging = false;
$filenamesc = 'asted_themes/' . $inThemse . '/dleimages/';
$fileofflineDle = 'asted_themes/' . $inThemse . '/offline.acws';
$fileofflineAsted = 'asted_themes/' . $inThemse . '/offline.acws';
if (file_exists($filenamesc)) {
    $astedcheker = "Вы используете DLE шаблон";
    if ($site['0']['sitestatus'] == "1") {
        if (file_exists($fileofflineDle)) {
            $smarty->display('offline.tpl');
        } else {
            echo '<strong>Asted:</strong> Файл offline не найден';
        }

        // $parseAstedTheme = 'offline.tpl'; // считываем данные из шаблона Asted Cloud Web Systeam
    } else {
        if ($_GET['error'] == "404") {
            $smarty->display('404.tpl');
        } else {
            if ($_GET['page'] != null or $_GET['catalog'] != null or $_GET['news'] != null or $_GET['shirik'] != null or $_GET['suveniry'] != null or $_GET['clothes'] != null) {
                $smarty->display('pages.tpl');
            } else {
                $smarty->display('main.tpl');
            }
        }
        //$parseAstedTheme='main.tpl'; // считываем данные из шаблона Asted Cloud Web Systeam
    }
} else {
    $astedcheker = "Вы используете ASTED шаблон";
    if ($site['0']['sitestatus'] == "1") {
        if (file_exists($fileofflineAsted)) {
            $smarty->display('offline.acws');
        } else {
            echo '<strong>Asted:</strong> Файл offline не найден';
        }
        //$parseAstedTheme='offline.acws'; // считываем данные из шаблона Asted Cloud Web Systeam
    } else {
        if ($_GET['error'] == "404") {
            $smarty->display('404.acws');
        } else {
            if ($_GET['page'] != null or $_GET['catalog'] != null or $_GET['news'] != null or $_GET['shirik'] != null or $_GET['suveniry'] != null or $_GET['clothes'] != null) {
                $smarty->display('pages.acws');
            } else {
                $smarty->display('main.acws');
            }
        }
        // $parseAstedTheme='main.acws'; // считываем данные из шаблона Asted Cloud Web Systeam
    }
}




echo "\n<!-- Copyright © " . date("Y") . " AstedCWS. All rights reserved.  https://asted.by -->";
