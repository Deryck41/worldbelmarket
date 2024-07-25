<?
include_once "valid.php";
include_once "mail.php";

define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if (empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input'), true);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function AddLink($user){
    $link = generateRandomString(30);
    $newLink = R::xdispense('site_restore_links');
    $newLink['user_id'] = $user['id'];
    $newLink['link'] = $link;
    $newLink['date_reg'] = new DateTime("now");
    R::store($newLink);
    SendMail('password-restore', $user['email'], [$link]);
}

function RestorePassword($email){
    if (validate('email', $email, true)){
        $user = R::findOne('crm_users', 'email = ?', [$email]);

        if (!empty($user)){
            AddLink($user);
            echo json_encode(array('message' => 'Ссылка для восстановления пароля отправлена на вашу почту'), JSON_UNESCAPED_UNICODE);
        }
        else{
            echo json_encode(array('message' => 'Вы не зарегестрированы'), JSON_UNESCAPED_UNICODE);
        }
    }
    else{
        echo json_encode(array('message' => 'Неверный email'), JSON_UNESCAPED_UNICODE);
    }
}


if (isset($_POST['email'])) {
    RestorePassword($_POST['email']);

} else {
    echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
}
