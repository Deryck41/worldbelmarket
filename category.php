<?php

define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/asted_core/Libs/smarty4_php7plus/Smarty.class.php";
$smarty = new Smarty();

header('Content-Type: text/html');


if (isset($_GET['forsection'])) {
    $extra = "";

    if (isset($_GET['category']) && $_GET['category'] !== 'Null') {
        $extra .= " AND category = '" . $_GET['category'] . "'";
    }
    $objects = R::find('crm_site_catalog', " forsection = '" . $_GET['forsection'] . "'" . $extra);
    if (empty($objects)) {
        echo '<h1>По вашему запросу ничего не найдено!</h1>';
    } else {
        echo $smarty->fetch($_SERVER['DOCUMENT_ROOT'] . '/asted_themes/marketplace/components/catalog/' . $_GET['style'] . '.acws', array('catalogArr' => $objects));
    }
}
