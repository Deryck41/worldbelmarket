<?php

use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../asted/templates/PHPMailer/src/Exception.php';
require '../../asted/templates/PHPMailer/src/PHPMailer.php';
require '../../asted/templates/PHPMailer/src/SMTP.php';
include "../../asted/core/rb.php";
define('ASTEDRB', 'yes');
include "../../asted/core/config.php";

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
// 
$mail->setFrom('sendmail@asted.by', 'Обратный связь');
$mail->addAddress($site['mailsite'], $_SERVER['SERVER_NAME']);
// $mail->addReplyTo($email, $name);

$mail->isHTML(false);
$json = file_get_contents('php://input');
$data = json_decode($json, true);


if (!empty($data['name'])) {
    $name = $data['name'];
    $phone = $data['phone'];
    $mail->Subject = 'Обратный связь с сайта ' . $_SERVER['SERVER_NAME'] . '';
    $mail->Body = "Имя: $name\nТелефон: $phone";
    $mail->send();
}
