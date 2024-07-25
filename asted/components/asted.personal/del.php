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
        
        R::trash($userToDelete);
    }
}


?>