<?
ini_set('log_errors', 'Off');
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);


session_name('terrancrm');
session_start();
define('ASTEDRB', 'yes');
include $_SERVER['DOCUMENT_ROOT'] . '/asted_core/Libs/redbeanphp/rb.php';

include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}
if (!empty($_SESSION["userid"])){
    $usersAdm = count(R::find("crm_users", "divisions = ?", ["1"]));
    $userToDelete = R::findOne("crm_users", "id = ?", [$_POST['menu_id']]);

    if ($usersAdm > 1 || $userToDelete['divisions'] !== '1'){
        if ($userToDelete['divisions'] === '4'){
            $products = R::find('site_products', 'user = ?', [$userToDelete['id']]);

            foreach($products as $product){
                if ($product['origin_pageurl'] !== NULL){
                    $orgign = R::findOne('crm_site_catalog', 'pageurl = ?', [$product['origin_pageurl']]);
                    if (isset($orgign)){
                        R::trash($orgign);
                    }
                }
                R::trash($product);
            }
            
        }

        R::trash($userToDelete);
    }
}


?>