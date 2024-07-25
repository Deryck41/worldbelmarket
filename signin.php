<?
include_once "valid.php";

define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if (empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input'), true);
}



function SignInUser($email, $password)
{
    if (validate('email', $email, true) && validate('password', $password, true)) {
        $user = R::findOne('crm_users', 'email = ?', [$email]);

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                switch ($user['status']) {
                    case "active":
                        echo json_encode(array('redirect' => '/loginpage.php'), JSON_UNESCAPED_UNICODE);
                        break;
                    case "unconfirmed":
                        echo json_encode(array('message' => 'Подтвердите свой email'), JSON_UNESCAPED_UNICODE);
                        break;
                    case "banned":
                        echo json_encode(array('message' => 'Вам ограничен доступ к сайту'), JSON_UNESCAPED_UNICODE);
                        break;
                    default:
                        echo json_encode(array('message' => 'Неизветсная ошибка. Id пользователя: ' . $user['id']), JSON_UNESCAPED_UNICODE);
                        break;
                }
            } else {
                echo json_encode(array('message' => 'Неверный email или пароль'), JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode(array('message' => 'Неверный email или пароль'), JSON_UNESCAPED_UNICODE);
        }
    }
}


if (isset($_POST['email']) && isset($_POST['password'])) {
    if ($_POST['type'] === 'user' || $_POST['type'] === 'provider'){
        SignInUser($_POST['email'], $_POST['password']);
    }
    else{
        echo json_encode(array('message' => '...'), JSON_UNESCAPED_UNICODE);
    }

} else {
    echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
}
