<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'asted/templates/PHPMailer/src/Exception.php';
require_once 'asted/templates/PHPMailer/src/PHPMailer.php';
require_once 'asted/templates/PHPMailer/src/SMTP.php';
// include_once "asted/core/rb.php";
// include_once "asted/core/config.php";

function Send($typeString, $address, $content){
    $site = R::findOne('crm_site');
    $mail = new PHPMailer(true);

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->isSMTP();
    $mail->Host = 'smtp.mail.ru';
    $mail->SMTPAuth = true;
    $mail->Username = 'sendmail@asted.by';
    $mail->Password = 'QDrveCEQW2PNNnZq26BR';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";

    $mail->setFrom('sendmail@asted.by', $typeString);
    $mail->addAddress($address, $_SERVER['SERVER_NAME']);

    $mail->isHTML(true);

    $mail->Subject = $typeString;
    $mail->Body = $content;
    $mail->send();
}

function SendMail($type, $address, $params){
    switch ($type) {
        case 'email-confirm':
            $typeString = "Подтверждение регистрации на сайте " . $_SERVER['SERVER_NAME'];
            $content = 'Подтвердите регистрацию пройдя по <a href="'.$_SERVER['SERVER_NAME'].'/confirm.php?code='.$params[0].'">этой сслыке</a>';
            Send($typeString, $address, $content);
            break;
        case 'password-restore':
            $typeString = "Сброс пароля на сайте " . $_SERVER['SERVER_NAME'];
            $content = 'Чтобы сбросить пароль, пройдите по <a href="'.$_SERVER['SERVER_NAME'].'/restore.php?code='.$params[0].'">этой сслыке</a>';
            Send($typeString, $address, $content);
        default:
            break;
    }
}

?>