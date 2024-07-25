<?php
//----Asted Page Logic----//
//Стандартная логика работы страниц
if ($_GET['page'] == $admin_path) { ?>
    <meta http-equiv="refresh" content="0;URL=/panel/index.php" />
<? } else {
    if ($_GET['page'] != null) {
        $sql_page = "SELECT * FROM `crm_site_pages` WHERE pageurl ='" . $_GET['page'] . "'";
        $result_page = mysqli_query($link, $sql_page);
        while ($pageen = mysqli_fetch_assoc($result_page)) {
            $astedContent[] = "{$pageen['content']}";
            $astedPagename[] = "{$pageen['name']}";
            $astedType[] = "{$pageen['type']}";
            $astedCode[] = "{$pageen['code']}";
            if (!empty($pageen['parent'])) {
                $astedParent = R::load('crm_site_pages', $pageen['parent']);
            }
        }
    }
    if ($asted_url == null) {
        $sql_page = "SELECT * FROM `crm_site_pages` WHERE name ='Главная'";
        $result_page = mysqli_query($link, $sql_page);
        while ($pageen = mysqli_fetch_assoc($result_page)) {
            $astedContent[] = "{$pageen['content']}";
            $astedPagename[] = "{$pageen['name']}";
            $astedType[] = "{$pageen['type']}";
            $astedCode[] = "{$pageen['code']}";
            if (!empty($pageen['parent'])) {
                $astedParent = R::load('crm_site_pages', $pageen['parent']);
            }
        }
    }
}
//----Asted Page Logic End----//