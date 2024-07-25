<?php
session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

if (isset($_GET['code'])) {
    $link = R::findOne('site_confirmation_links', 'link = ?', [$_GET['code']]);
    if (empty($link)) {
        echo "<h1>Данная ссылка недоступна</h1>";
    } else {
        $dateLink = new DateTime($link['date_reg']);
        $now = new DateTime("now");

        $interval = $dateLink->diff($now);
        $hours =  $interval->y * 12 * 30 * 24 + $interval->m * 30 * 24 + $interval->d * 24 + $interval->h;
        if ($hours < 24) {
            $user = R::findOne('crm_users', 'id = ?', [$link['user_id']]);
            if (!empty($user)) {
                $user['status'] = "active";
                $_SESSION["loggedin"] = true;
                if ($user['type'] === 'user') {
                    $user['divisions'] = '3';
                    $_SESSION['type'] = 'user';
                    $_SESSION['id'] = $user['id'];
                    $user['legal'] = 1;
                    R::store($user);
                    R::trash($link);
                    header('Location: /user');
                }
                else if ($user['type'] === 'provider'){
                    $user['divisions'] = '4';
                    $_SESSION['type'] = 'provider';
                    $_SESSION['id'] = $user['id'];
                    R::store($user);
                    R::trash($link);
                    header('Location: /user');
                }

                $links = R::find('site_confirmation_links', 'user_id = ?', [$user['id']]);
                R::trashAll($links);

                echo "<h1>Регистрация прошла успешно.</h1>";
            } else {
                echo "<h1>Ошибка. Повторите регистрацию.</h1>";
            }
        } else {
            R::trash($link);
            echo "<h1>Ссылка просрочилась. Повторите регистрацию.</h1>";
        }
    }
} else {
    echo "<h1>Данная ссылка недоступна</h1>";
}
