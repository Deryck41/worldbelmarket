<?php
include_once 'valid.php';

session_name('terrancrm');
session_start();
define('ASTEDRB', 'yes');
require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";
if (isset($_POST['code'])) {
    if (validate('password', $_POST['password'], true)){
        $link = R::findOne('site_restore_links', 'link = ?', [$_POST['code']]);
        if (empty($link)) {
            echo "<h1>Данная ссылка недоступна 0R3</h1>";
        } else {
            $dateLink = new DateTime($link['date_reg']);
            $now = new DateTime("now");

            $interval = $dateLink->diff($now);
            $hours =  $interval->y * 12 * 30 * 24 + $interval->m * 30 * 24 + $interval->d * 24 + $interval->h;
            if ($hours < 24) {
                $user = R::findOne('crm_users', 'id = ?', [$link['user_id']]);
                if (!empty($user)) {
                    
                    $user['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));

                    R::store($user);
                    $links = R::find('site_restore_links', 'user_id = ?', [$user['id']]);
                    R::trashAll($links);
                    echo '<h1>Пароль успешно сброшен. Закройте вкладку.</h1>'
                    ?>
                    <script>
                        setTimeout(() => {
                            document.location.href = '/';
                        }, 5000);
                    </script>
                    <?
                
                } else {
                    echo "<h1>Ошибка 0R1. Повторите процедуру сброса пароля.</h1>";
                }
            } else {
                R::trash($link);
                echo "<h1>Ссылка просрочилась. Повторите процедуру сброса пароля.</h1>";
            }
        }
    } 
    else {
        echo "<h1>Невалидный пароль</h1>"; 
    }
}
else{
    echo "<h1>Данная ссылка недоступна 0R2</h1>";
}