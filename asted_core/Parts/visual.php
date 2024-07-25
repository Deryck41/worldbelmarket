<?php

session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
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

if (empty($_SESSION["id"])) {
    $smarty->assign('isAuthUser', false);
}
else{
    $user = R::findOne('crm_users', 'id = ?',[$_SESSION['id']]);

    if (!empty($user)){
        // echo json_encode($userOrdersInfo);
        
        $smarty->assign('uName', $user['name']);
        $smarty->assign('uSurName', $user['surname']);
        $smarty->assign('avatarString', mb_substr($user['name'], 0, 1).mb_substr($user['surname'], 0, 1));
        $smarty->assign('uEmail', $user['email']);
        $smarty->assign('isAuthUser', true);
        $smarty->assign('uPhone', $user['phone']);
        $smarty->assign('uLastname', $user['lastname']);
        $smarty->assign('uType', $user['type']);

        if ($user['type'] === 'user'){
            $smarty->assign('legalType', $user['legal']);
            $smarty->assign('uRequisites', $user['urequisites']);
            $smarty->assign('uINT', $user['uint']);


            $userOrders = R::find('site_orders', 'user_id = ?', [$user['id']]);
            $userOrdersInfo = [];

            foreach ($userOrders as $userOrder) {
                $productIds = json_decode($userOrder['product_ids'], true);
                $products = [];
                $userOrder['date'] = date('d.m.Y', $userOrder['start_time']);
                if (is_array($productIds)) {
                    $placeholders = implode(',', array_fill(0, count($productIds), '?'));

                    $products = R::getAll("SELECT * FROM crm_site_catalog WHERE id IN ($placeholders)", $productIds);
                    
                }

                $userOrdersInfo[] = [
                'order' => $userOrder,
                'products' => $products
                ];
            }


            $smarty->assign('uItemsCount', count($userOrders));
            $smarty->assign('userOrdersInfo', $userOrdersInfo);
        }
        else if ($user['type'] === 'provider'){
            $smarty->assign('uUNP', $user['unp']);
            $smarty->assign('requisites', $user['requisites']);


            $providerProducts = R::getAll('SELECT sc.*, sp.*, sc.id AS catalog_id FROM crm_site_catalog sc JOIN site_products sp ON sc.origin = sp.id WHERE sp.user = '. $user['id']);
            $smarty->assign('providerProducts', $providerProducts);
            $sales = R::find('site_orders');
            $resultSales = array();
            
            foreach ($sales as $sale){

                $ids = json_decode($sale['product_ids']);
                
                foreach($ids as $id){
                    
                    foreach($providerProducts as $providerProduct){

                        if ($providerProduct['catalog_id'] === strval($id)){
                            $sale['date'] = date('d.m.Y', $sale['start_time']);
                            $newSale = array(
                                "order" => $sale,
                                "product" => $providerProduct
                            );
                            
                            array_push($resultSales, $newSale);
                        }
                    }
                }
            }

            $smarty->assign('providerSales', $resultSales);
    
            

        }   
    }
}

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


if ($_SERVER['REQUEST_URI'] === "/"){
    array_push($filteredUrls, '/');
}
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

    $smarty->assign('TITLE', $title2);
    $smarty->assign('KEYWORDS', $rows['keywords']);
    $smarty->assign('DESCRIPTION', $rows['descriptions']);
} else {
    // Обработка случая, когда массив пуст
}


//ASTED HEAD LOGIC
    if($title2 == null){
        $ASTED_MAIN .= "<title>".$site['0']['namesite']."</title>\n";
    }else{
        $ASTED_MAIN .= "<title>".$title2."</title>\n";
    }
   $ASTED_MAIN .= "<meta name=\"description\" content=\"".$rows['descriptions']."\">\n";
   $ASTED_MAIN .= '<meta name="keywords" content="'.$rows['keywords'].'">';
   $ASTED_MAIN .= '<meta name="author" content="worldbel team">';
   $ASTED_MAIN .= '<span data-astedsectionname="Блок с текстом и двумя кнопками" data-astedsectionurl="\asted_themes\asted\s1\asted-section1.acws" data-astedsectionpic="\asted_themes\asted\s1\asted-section1.jpg" style="display: none;"></span>';
   $ASTED_MAIN .= '<span data-astedsectionname="Блок с двумя текстовыми блоками и кнопкой" data-astedsectionurl="\asted_themes\asted\s1\asted-section2.acws" data-astedsectionpic="\asted_themes\asted\s1\asted-section2.jpg" style="display: none;"></span>';
    if($site['0']['showadminsite'] == "1"){
    $ASTED_MAIN .= $ASTED_THEMES;
    }
   $smarty->assign('HEAD', $ASTED_MAIN);
//ASTED HEAD LOGIC END
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
            header('Location: /');
            //$smarty->display('404.acws');
            $smarty->display('main.acws');
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
