<?

session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();
define('ASTEDRB', 'yes');
include $_SERVER['DOCUMENT_ROOT'] . '/asted_core/Libs/redbeanphp/rb.php';

include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

// if(empty($_POST)){ 
//     $_POST = json_decode(file_get_contents('php://input'), true);
// }
// $users = R::find('crm_users', 'name LIKE ? OR surname LIKE ?', ["%".$_POST['search']."%", "%".$_POST['search']."%"]);
// $result = "";
// foreach ($users as $user) {
    
// }
$userID = $_SESSION['userid'];
if (!empty($_SESSION['id']) && empty($_SESSION['userid'])){
$userID = $_SESSION['id'];
}
$currentUser = R::findOne('crm_users', 'id = ?', [$userID]);
$admin = $currentUser['divisions'] === "1" ? 1: 0;






// if (!$result_users){
//     echo "SELECT * FROM crm_users WHERE name LIKE '%".$_GET['search']."%' OR surname LIKE '%".$_GET['search']."%'";
//    }


$sql = "SELECT * FROM crm_users WHERE ";
if (isset($_GET['search'])){
    if ($_GET['search'] === ""){
        $sql .= "1 = 1";
    }
    else{
        $sql .= "(name LIKE '%".$_GET['search']."%' OR surname LIKE '%".$_GET['search']."%')";
    }
}
else{
    $sql .= "1 = 1";
}

if (isset($_GET['filter'])){
    $sql .= " AND ";

    switch ($_GET['filter']){
        case "user":
            $sql .= "divisions = 3";
            break;
        case "provider":
            $sql .= "divisions = 4";
            break;
        case "admin":
            $sql .= "divisions = 1";
            break;
        case "unknown":
            $sql .= "divisions = 2";
            break;
        default:
            $sql .= "1 = 1";
    }
}


$result_users = mysqli_query($link, $sql);
if (!$result_users){
    echo $sql;
}

            while ($users = mysqli_fetch_assoc($result_users)) {
                $usersid = "{$users['id']}";
                $usersavatas = "{$users['avatar']}";
                $userslastonline = "{$users['online']}";
                $usersname = "{$users['name']}";
                $usersmail = "{$users['email']}";
                $userssurname = "{$users['surname']}";
                $userspassword = "{$users['password']}";
                $usersdivisions = "{$users['divisions']}";
                $INT = "{$users['unp']}";
                $requisites = "{$users['requisites']}";
                $sql_news = "SELECT * FROM `" . $TerranPrefix . "usergroup` WHERE id ='" . $usersdivisions . "'";
                $result_news = mysqli_query($link, $sql_news);
                $newsforedit = mysqli_fetch_assoc($result_news);
                
                //print_r($newsforedit);
                if (!empty($usersavatas)) {
                    $lead_userAvatar = '/asted/uploads/users/' . $usersid . '/avatar/' . $usersavatas . '';
                } else {
                    $lead_userAvatar = '/panel/templates/object/content/ava.png';
                }
                $lead_userAvatar = str_replace("panel", "asted", $lead_userAvatar);
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> <img src="<?= $lead_userAvatar ?>" style="width: 26px;border-radius: 28px; height: 26px;"> <a href="/panel/profile/<?= $usersid ?>/"><?= $usersname; ?> <?= $userssurname; ?></a>
                          <? //Asted: Проверка на возможность авторизации под другим пользователям (не рендерим форму)
                          if ($admin) {?>  
                            <form action="" method="post" style="display:none;">
                                <input name="idaddtoaut" id="idaddtoaut" value="<?= $usersid ?>" style="display: none;">
                                <input type="submit" name="submit" style="display:none" value="autuser" name="autuser" id="id0<?= $usersid ?>" class="btn btn-primary btn-user btn-block" />
                            </form>
                            <?php }
                            if ($admin) { ?>
                            <div class="modal fade" id="myModalka<?= $usersid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit'] ?>Редактировать: <?= $usersname; ?> <?= $userssurname; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">

                                                <input class="form-control" type="тема" value="<?= $userspassword ?>" name="updateusroldpass" id="updateusroldpass" style="display: none">
                                                <input class="form-control" type="тема" value="<?= $usersid ?>" name="updateusrid" id="updateusrid" style="display: none">
                                                <span><strong><?= $lang['firstName'] ?>Имя: </strong></span><input class="form-control" type="тема" value="<?= $usersname; ?>" name="titleadd" id="titleadd">
                                                <br>
                                                <span><strong><?= $lang['secondName'] ?>Фимилия: </strong></span><input class="form-control" type="тема" value="<?= $userssurname; ?>" name="titleadds" id="titleadds">
                                                <!--<br>
                            <span><strong><?= $lang['lastName'] ?>Отчесво: </strong></span><input class="form-control" type="тема">
                            <br>
                            <span><strong><?= $lang['YearOfBirth'] ?>Дата рождения: </strong></span><input class="form-control" type="тема">-->
                                                <br>
                                                <span><strong><?= Почта ?>: </strong></span><input name="usremail" id="usremail" value="<?= $usersmail; ?>" class="form-control" type="тема">
                                                <br>
                                                <?php
                                                if ($userSessionDivisions == "1") { ?>
                                                    <span><strong><?= $lang['password'] ?>Пароль: </strong></span><input name="usrepass" id="usrepass" class="form-control" type="тема">
                                                    <br>
                                                    <span><strong><?= $lang['employee'] ?>: </strong></span>
                                                    <select class="form-control group" name="statusadd" id="statusadd">
                                                        <?php echo implode('', $option); ?>
                                                    </select><? } ?>
                                                <input type="submit" name="submit" style="display:none" value="uppdate" name="uppdate" id="id110<?= $usersid ?>" class="btn btn-primary btn-user btn-block" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?>Закрыть</button>
                                            <button type="button" onclick="javascript:document.getElementById('id110<?= $usersid ?>').click();" class="btn btn-primary"><?= $lang['update'] ?>Обновить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?}?>

                            <?php
                            if ($admin) { ?>
                                <span style="float:right;padding-right: 35px;cursor: pointer;" onclick="javascript:document.getElementById('id0<?= $usersid ?>').click();"><?= "Авторизироваться" ?></span>
                                <? } ?><?php
                                        if ($admin) { ?>
                                <div class="personal_divisions-icon">
                                    <i class="fas fa-fw fa-trash trashclick trashclick<?= $usersid ?>" data-trashclick="<?= $usersid ?>" value="<?= $usersid ?>" style="float: right;cursor: pointer;"></i> <i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $usersid ?>" style="float: right;cursor: pointer;"></i>
                                </div>

                                <? } ?>
                        </h6>
                    </div>
                    <div class="card-body">
                    <p><p>Почта: <?= $users["email"] ?></p>
                        <p>Телефон: <?= $users['phone'] ?></p>
                        <?= $users['divisions'] === "3" ? "<p>Отчество: {$users['lastname']}</p>" : "" ?>
                        <p>Структура: <?= $newsforedit['usergroup'] ?></p>
                        <p>Регистрация: <? echo $dataReg = date("d.m.Y (h:i)", $users["regdate"]); ?></p>
                        <?= $users['divisions'] === "4" ? "<p>УНП: {$INT}</p>": "" ?>
                        <?= $users['divisions'] === "4" ? "<p>Реквезиты: {$requisites}</p>": "" ?>
                        <?= $users['divisions'] === "3" ? "<p>Юр. статус: ". ($users['legal'] === "0" ? "Юр. лицо" : "Физ. лицо") ."</p>" : "" ?>
                        <?= $users['divisions'] === "3" && $users['legal'] === "0" ? "<p>УНП: {$users['uint']}</p>": "" ?>
                        <?= $users['divisions'] === "3" && $users['legal'] === "0" ? "<p>Реквезиты: {$users['urequisites']}</p>": "" ?>
                        <p>Последний раз был онлайн: <?php if ($userslastonline == null) {
                                                            echo "не было первичной авторизации";
                                                        }
                                                        echo date("d.m.Y (h:i)", $userslastonline);
                                                        ?></p>
                    </div>
                </div><? } ?>

