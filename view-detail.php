<?php
session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);

define('ASTEDRB', 'yes');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');


include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/asted_core/Libs/smarty3_php5plus/Smarty.class.php';
$smarty = new Smarty();
// Libs::lib('smarty3_php5plus', 'Smarty.class');


if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

$style = isset($_POST['style']) ? $_POST['style'] : 'view-detail.acws';
$uid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
$productId = $_POST['id'];

if (isset($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);
    if (!empty($user)){
        if ($user['divisions'] === "1"){
            $uid = "admin";
        }
    }
}

if ($uid != "admin"){
    $products = $uid ? R::findOne('site_products', 'user = ? AND id = ?', [$uid, $productId]) : array();
}
else{
    $products = R::findOne('site_products', 'id = ?', [$productId]);
}

if (empty($products)){
    echo $uid;
    echo '<h1>Товар не найден или доступ запрещён!</h1>';
}
else{
echo $smarty->fetch($_SERVER['DOCUMENT_ROOT'] .'/asted_themes/marketplace/components/catalog/' . $style . '.acws', array('catalogArr' => $products));
}

?>