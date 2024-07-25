<?
include_once "valid.php";
session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";


function LogIn($user)
{
    
    echo '<h1>Подождите. Идёт авторизация...</h1>';
    $_SESSION["loggedin"] = true;
    $_SESSION['type'] = $user['type'];
    if ($user['type'] === 'user'){
        $_SESSION['id'] = $user['id'];
        header('Location: /user');
    }
    else if ($user['type'] === 'provider'){
        $_SESSION['id'] = $user['id'];
        header('Location: /user');
    }
    
}

function SignInUser($email, $password)
{
    if (validate('email', $email, true) && validate('password', $password, true)) {
        $user = R::findOne('crm_users', 'email = ?', [$email]);

        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                switch ($user['status']) {
                    case "active":
                        LogIn($user);
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
                echo '<h1>Неверный email или пароль</h1>';
            }
        } else {
            echo '<h1>Неверный email или пароль</h1>';
        }
    }
}

// function SignInProvider($email, $password)
// {
//     if (validate('email', $email, true) && validate('password', $password, true)) {
//         $user = R::findOne('crm_users', 'email = ?', [$email]);

//         if (!empty($user)) {
//             if (password_verify($password, $user['password'])) {
//                 $_SESSION['id'] = $user['id'];
//                 print_r($_SESSION['id']);
//                 echo '<h1>Подождите. Идёт авторизация...</h1>';
//                 $_SESSION["loggedin"] = true;
//                 $_SESSION['type'] = 'provider';
//                 header('Location: /user');
//             } else {
//                 echo '<h1>Неверный email или пароль</h1>';
//             }
//         } else {
//             echo '<h1>Неверный email или пароль</h1>';
//         }
//     }
// }



if ($_POST['type'] === "user") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        SignInUser($_POST['email'], $_POST['password']);
    } else {
        echo '<h1>Вы не ввели все значения</h1>';
    }
}
