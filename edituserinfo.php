<?
include_once "valid.php";
session_name('terrancrm');
session_start();
define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

function EditUser($name, $surName, $lastName, $phone, $email, $legal, $uRequisites, $uINT){
    if (validate('name', $name, true) && validate('name', $surName, true) && validate('name', $lastName, false) && validate('phone', $phone, false) && validate('email', $email, true)){
        $user = R::findOne('crm_users', 'id = ?', [$_SESSION['id']]);
        $user['name'] = $name;
        $user['surname'] = $surName;
        $user['lastname'] = $lastName;
        $user['phone'] = $phone;
        $user['email'] = $email;
        $user['legal'] = $legal;
        $user['urequisites'] = $uRequisites;
        $user['uint'] = $uINT;
        R::store($user);
        echo json_encode(array('message' => 'Данные успешно изменены', 'redirect' => '/user-detail'), JSON_UNESCAPED_UNICODE);
    }
    else{
        echo json_encode(array('message' => 'Данные не прошли валидацию'), JSON_UNESCAPED_UNICODE);
    }
}

function EditProvider($name, $unp, $phone, $email, $requisites){
    if (validate('company', $name, true) && validate('none', $unp, false) && validate('phone', $phone, false) && validate('email', $email, true)){
        $user = R::findOne('crm_users', 'id = ?', [$_SESSION['id']]);
        $user['name'] = $name;
        $user['unp'] = $unp;
        $user['phone'] = $phone;
        $user['email'] = $email;
        $user['requisites'] = $requisites;
        R::store($user);
        echo json_encode(array('message' => 'Данные успешно изменены', 'redirect' => '/user-detail'), JSON_UNESCAPED_UNICODE);
    }
    else{
        echo json_encode(array('message' => 'Данные не прошли валидацию'), JSON_UNESCAPED_UNICODE);
    }
}

if ($_POST['type'] === "user"){
    if (isset($_SESSION['id'])){
        if (isset($_POST['name']) && isset($_POST['surName']) &&  isset($_POST['lastName']) && isset($_POST['phone']) && isset($_POST['email'])){
            EditUser($_POST['name'], $_POST['surName'], $_POST['lastName'], $_POST['phone'], $_POST['email'], $_POST['legal'], $_POST['uRequisites'], $_POST['uINT']);
        }
        else{
            echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
        }
    }
    else{
        echo json_encode(array('message' => 'Вы не вошли, попробуйте зайти и повторить'), JSON_UNESCAPED_UNICODE);
    }
}
else if ($_POST['type'] === "provider"){
    if (isset($_SESSION['id'])){
        if (isset($_POST['name']) && isset($_POST['INT']) && isset($_POST['phone']) && isset($_POST['email'])){
            EditProvider($_POST['name'], $_POST['INT'], $_POST['phone'], $_POST['email'], $_POST['requisites']);
        }
        else{
            echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
        }
    }
    else{
        echo json_encode(array('message' => 'Вы не вошли, попробуйте зайти и повторить'), JSON_UNESCAPED_UNICODE);
    }
}
?>