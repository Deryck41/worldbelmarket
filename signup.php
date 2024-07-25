<?php
include_once "valid.php";
include_once "mail.php";

define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

function SignUpProvider($company, $unp, $email, $password){
    if(validate('company', $company, true) && validate('none', $unp, false) && validate('email', $email, true) && validate('password', $password, true)){
        $findUserWithEmail = R::findOne('crm_users', 'email = ?', [$email]);

        if (!empty($findUserWithEmail)){
            AddLink($findUserWithEmail);
            echo json_encode(array('message' => 'Пользователь с таким email уже зарегестрирован. Проверьте email.'), JSON_UNESCAPED_UNICODE);
        }
        else{
            $newUser = R::xdispense('crm_users');
            $newUser['name'] = $company;
            $newUser['unp'] = $unp;
            $newUser['email'] = $email;
            $newUser['divisions'] = "2";
            $newUser['password'] = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            $newUser['status'] = "unconfirmed";
            $newUser['regdate'] = time();
            $newUser['type'] = 'provider';

            if (R::store($newUser)){
                $user = R::findOne('crm_users', 'email = ?', [$email]);
                AddLink($user);
                echo json_encode(array('message' => 'На ваш email выслано письмо для подтверждения'), JSON_UNESCAPED_UNICODE);
            }
            else{
                echo json_encode(array('message' => 'Что-то пошло не так, попробуйте позже'), JSON_UNESCAPED_UNICODE);
            }
        }

    }
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
    $link = generateRandomString(10);
    $newLink = R::xdispense('site_confirmation_links');
    $newLink['user_id'] = $user['id'];
    $newLink['link'] = $link;
    $newLink['date_reg'] = new DateTime("now");
    R::store($newLink);
    SendMail('email-confirm', $user['email'], [$link]);
}

function SignUpUser($name, $surName, $email, $password){
    if(validate('name', $name, true) && validate('name', $surName, true) && validate('email', $email, true) && validate('password', $password, true)){
        $findUserWithEmail = R::findOne('crm_users', 'email = ?', [$email]);
        if (!empty($findUserWithEmail)){
            AddLink($findUserWithEmail);
            echo json_encode(array('message' => 'Пользователь с таким email уже зарегестрирован. Проверьте email.'), JSON_UNESCAPED_UNICODE);
        }
        else{
            $newUser = R::xdispense('crm_users');
            $newUser['name'] = $name;
            $newUser['surname'] = $surName;
            $newUser['email'] = $email;
            $newUser['divisions'] = "2";
            $newUser['password'] = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
            $newUser['status'] = "unconfirmed";
            $newUser['regdate'] = time();
            $newUser['type'] = 'user';

            if (R::store($newUser)){
                $user = R::findOne('crm_users', 'email = ?', [$email]);
                AddLink($user);
                echo json_encode(array('message' => 'На ваш email выслано письмо для подтверждения'), JSON_UNESCAPED_UNICODE);
            }
            else{
                echo json_encode(array('message' => 'Что-то пошло не так, попробуйте позже'), JSON_UNESCAPED_UNICODE);
            }
        }
        
    }
    else{
        echo json_encode(array('message' => 'Данные не прошли валидацию'), JSON_UNESCAPED_UNICODE);
    }

}


if ($_POST['type'] === "user"){
    if (isset($_POST['name']) && isset($_POST['surName']) && isset($_POST['email']) && isset($_POST['password'])){
        SignUpUser($_POST['name'], $_POST['surName'], $_POST['email'], $_POST['password']);
    }
    else{
        echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
    }
}
else if ($_POST['type'] === "provider"){
    if (isset($_POST['company']) && isset($_POST['email']) && isset($_POST['password'])){
        SignUpProvider($_POST['company'], $_POST['INT'], $_POST['email'], $_POST['password']);
    }
    else{
        echo json_encode(array('message' => 'Вы не ввели все значения'), JSON_UNESCAPED_UNICODE);
    }
}
else{
   echo json_encode(array('message' => 'Неизвестный тип пользователя'), JSON_UNESCAPED_UNICODE);
}
?>