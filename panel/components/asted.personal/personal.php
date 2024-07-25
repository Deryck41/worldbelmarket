<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();

include "templates/header.php";
//Asted::Добавление пользователя
if($userGroupsCanAddUser['0'] == "true"){
    if ($_POST['submit'] == 'newsadd') {
        $name = $_POST['titleadd'];
        $surname = $_POST['titleadds'];
        $email = $_POST['usremail'];
        $divisions = $_POST['statusadd'];
        $usrpass = $_POST['usrepass'];

        // $password = hash('md5', $usrpass); //TERRAN-TAIP: Первый раз преобразовываем в md5
        // $passwordss = hash('md5', $password); //TERRAN-TAIP: Второй раз преобразовываем в md5

        $passwordss = mysqli_real_escape_string($link, password_hash($usrpass, PASSWORD_BCRYPT, array('cost' => 12)));

        $sql = "INSERT INTO `" . $TerranPrefix . "users` (name, surname, email, divisions, password) VALUES ('{$name}','{$surname}','{$email}','{$divisions}','{$passwordss}')";
        $result = mysqli_query($link, $sql);
        //header('Location: http://crm.terrangroup.biz/index.php?result=1305');
        echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'personal/1305/" />';
    }
}
//Asted::Редактирование пользователя
if ($userGroupsCaneditusr['0'] == "true") {
    if ($_POST['submit'] == 'uppdate') {
        $upusrid = $_POST['updateusrid'];
        $name = $_POST['titleadd'];
        $surname = $_POST['titleadds'];
        $email = $_POST['usremail'];
        $divisions = $_POST['statusadd'];
        $usrpass = $_POST['usrepass'];

        if (empty($usrpass)){
            $sqlUloadAva = "UPDATE " . $TerranPrefix . "users SET name='" . $name . "', surname='" . $surname  . "', email='" . $email  . "', divisions='" . $divisions . "' WHERE id='{$upusrid}'";
        }
        else{
            $uppass = mysqli_real_escape_string($link, password_hash($usrpass, PASSWORD_BCRYPT, array('cost' => 12)));
            $sqlUloadAva = "UPDATE " . $TerranPrefix . "users SET name='" . $name . "', surname='" . $surname  . "', email='" . $email  . "', divisions='" . $divisions  . "', password='" . $uppass  . "' WHERE id='{$upusrid}'";
        }

        $resultUloadAva = mysqli_query($link, $sqlUloadAva);
        echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'personal/0513/" />';
    }
}


if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '1305') {
?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    <?= $lang['the_user_was_added_successfully'] ?>
                </div>
            </div>
        <? }
    }
}
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '0513') {
        ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    <?= $lang['the_user_was_successfully_updated'] ?>
                </div>
            </div>
<? }
    }
} 
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '2022') {
        ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Пользователь успешно удален
                </div>
            </div>
<? }
    }
} ?>



<?php
//Asted::Авторизация под другим пользователем
if ($userGroupsCanforusrauth['0'] == "true") { 
    if ($_POST['submit'] == 'autuser') {
        $autuser = $_POST['idaddtoaut'];
        $_SESSION['userid'] = $autuser; ?>
        <meta http-equiv="refresh" content="0;URL=<?=$astedADM?>personal/result/91/" />
        <?
    }
}
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '91') {
    ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    <?= $lang['You_have_successfully'] ?>
                </div>
            </div>
<? }
    }
} ?>
  <?php
  if (isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $sql_lead_leadDeletesss = "DELETE FROM crm_users WHERE id={$menu_id}";
    //$result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
  }
  ?>
  <link rel="stylesheet" href="/panel/components/asted.personal/style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Create Organization-->
        <?php if($userGroupsCanAddUser['0'] == "true"){ ?>
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 mt-4">
            <div class="card text-center h-100">
                <div class="card-body px-5 pt-5 d-flex flex-column">
                    <div>
                        <div class="h3 text-primary font-weight-300">Сотрудник</div>
                        <p class="text-muted mb-4"><?=$lang['usrpage_addnewuser']?></p>
                    </div>
                    <div class="icons-org-create align-items-center mx-auto mt-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <svg class="svg-inline--fa fa-plus fa-w-14 icon-plus" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                        </svg><!-- <i class="icon-plus fas fa-plus"></i> Font Awesome fontawesome.com -->
                    </div>
                </div>
                
                <div class="card-footer bg-transparent px-5 py-4">
                    <div class="small text-center"><a class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal" href="#">Добавить сотрудника</a></div>
                </div>
            </div>
        </div>
        <!-- Join Organization-->
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-12 mt-4">
            <div class="card text-center h-100">
                <div class="card-body px-5 pt-5 d-flex flex-column align-items-between">
                    <div>
                        <div class="h3 text-secondary font-weight-300">Внешний пользователь</div>
                        <p class="text-muted mb-4">Отправляется приглашение на почту для внешнего пользователя (клиента, будущего сотрудника, и т.д)</p>
                    </div>
                    <div class="icons-org-join align-items-center mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user icon-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <svg class="svg-inline--fa fa-long-arrow-alt-right fa-w-14 icon-arrow" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z"></path>
                        </svg><!-- <i class="icon-arrow fas fa-long-arrow-alt-right"></i> Font Awesome fontawesome.com -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users icon-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-footer bg-transparent px-5 py-4">
                    <div class="small text-center"><a class="btn btn-block btn-secondary" data-toggle="modal" data-target="#myModalka" href="#">Отправить приглашение</a></div>
                </div>
               
            </div>
        </div>
        <?}?>
    </div> <br><br>
    <!--Form-->
    <?php if($userGroupsCanAddUser['0'] == "true"){ ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><?= $lang['add_user'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <span><strong><?= $lang['firstName'] ?>: </strong></span><input class="form-control" type="тема" name="titleadd" id="titleadd">
                        <br>
                        <span><strong><?= $lang['secondName'] ?>: </strong></span><input class="form-control" type="тема" name="titleadds" id="titleadds">
                        <!--<br>
                            <span><strong><?= $lang['lastName'] ?>: </strong></span><input class="form-control" type="тема">
                            <br>
                            <span><strong><?= $lang['YearOfBirth'] ?>: </strong></span><input class="form-control" type="тема">-->
                        <br>
                        <span><strong><?= $lang['email'] ?>: </strong></span><input name="usremail" id="usremail" class="form-control" type="тема">
                        <br>
                        <span><strong><?= $lang['password'] ?>: </strong></span><input name="usrepass" id="usrepass" class="form-control" type="тема">
                        <br>

                        <span><strong><?= $lang['employee'] ?>: </strong></span>
                        <select class="form-control group" name="statusadd" id="statusadd">
                            <? while ($task = mysqli_fetch_assoc($result_divisions)) {
                                $title = "{$task['usergroup']}";
                                $id = "{$task['id']}";
                                
                            ?> <option value="<?= $id ?>"><?= $title ?></option>
                                <?php $option[] = '<option value="' . $id . '">' . $title . '</option>'; ?>
                            <? } ?>
                        </select>
                        <input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0" class="btn btn-primary btn-user btn-block" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
                    <button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary"><?= $lang['add'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <?}?>

    <div class="modal fade" id="myModalka" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Добавить внешнего пользователя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <span><strong>Почта: </strong></span><input class="form-control" type="тема" name="titleadd" id="titleadd">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-search">
        <select class="personal-filter">
        <option value="all"> Все</option>
        <option value="user">Покупатель</option>
        <option value="provider">Продавец</option>
        <option value="admin">Администрация</option>
        <option value="unknown">Остальные</option>
        </select>
        <input type="text" class="search-input-profile">
        <button class="button-search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4 personal_box">

            <!-- Approach -->
            <?
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
                    $lead_userAvatar = $astedADM.'uploads/users/' . $usersid . '/avatar/' . $usersavatas . '';
                } else {
                    $lead_userAvatar = $astedADM.'templates/object/content/ava.png';
                }
                $lead_userAvatar = str_replace("panel", "asted", $lead_userAvatar);
            ?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary"> <img src="<?= $lead_userAvatar ?>" style="width: 26px;border-radius: 28px; height: 26px;"> <a href="/panel/profile/<?= $usersid ?>/"><?= $usersname; ?> <?= $userssurname; ?></a>
                          <? //Asted: Проверка на возможность авторизации под другим пользователям (не рендерим форму)
                          if ($userGroupsCanforusrauth['0'] == "true") {?>  
                            <form action="" method="post" style="display:none;">
                                <input name="idaddtoaut" id="idaddtoaut" value="<?= $usersid ?>" style="display: none;">
                                <input type="submit" name="submit" style="display:none" value="autuser" name="autuser" id="id0<?= $usersid ?>" class="btn btn-primary btn-user btn-block" />
                            </form>
                            <?php }
                            if ($userGroupsCaneditusr['0'] == "true") { ?>
                            <div class="modal fade" id="myModalka<?= $usersid ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><?= $lang['edit'] ?>: <?= $usersname; ?> <?= $userssurname; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post">

                                                <input class="form-control" type="тема" value="<?= $userspassword ?>" name="updateusroldpass" id="updateusroldpass" style="display: none">
                                                <input class="form-control" type="тема" value="<?= $usersid ?>" name="updateusrid" id="updateusrid" style="display: none">
                                                <span><strong><?= $lang['firstName'] ?>: </strong></span><input class="form-control" type="тема" value="<?= $usersname; ?>" name="titleadd" id="titleadd">
                                                <br>
                                                <span><strong><?= $lang['secondName'] ?>: </strong></span><input class="form-control" type="тема" value="<?= $userssurname; ?>" name="titleadds" id="titleadds">
                                                <!--<br>
                            <span><strong><?= $lang['lastName'] ?>: </strong></span><input class="form-control" type="тема">
                            <br>
                            <span><strong><?= $lang['YearOfBirth'] ?>: </strong></span><input class="form-control" type="тема">-->
                                                <br>
                                                <span><strong><?= $lang['email'] ?>: </strong></span><input name="usremail" id="usremail" value="<?= $usersmail; ?>" class="form-control" type="тема">
                                                <br>
                                                
                                          
                                                <?php
                                                if ($userSessionDivisions == "1") { ?>
                                                    <span><strong><?= $lang['password'] ?>: </strong></span><input name="usrepass" id="usrepass" class="form-control" type="тема">
                                                    <br>
                                                    <span><strong><?= $lang['employee'] ?>: </strong></span>
                                                    <select class="form-control group" name="statusadd" id="statusadd">
                                                        <?php echo implode('', $option); ?>
                                                    </select><? } ?>
                                                <input type="submit" name="submit" style="display:none" value="uppdate" name="uppdate" id="id110<?= $usersid ?>" class="btn btn-primary btn-user btn-block" />
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
                                            <button type="button" onclick="javascript:document.getElementById('id110<?= $usersid ?>').click();" class="btn btn-primary"><?= $lang['update'] ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?}?>

                            <?php
                            if ($userGroupsCanforusrauth['0'] == "true") { ?>
                                <span style="float:right;padding-right: 35px;cursor: pointer;" onclick="javascript:document.getElementById('id0<?= $usersid ?>').click();"><?= $lang['log_in'] ?></span>
                                <? } ?><?php
                                        if ($userGroupsCaneditusr['0'] == "true") { ?>
                                <div class="personal_divisions-icon">
                                    <i class="fas fa-fw fa-trash trashclick<?= $usersid ?>" value="<?= $usersid ?>" style="float: right;cursor: pointer;"></i> <i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $usersid ?>" style="float: right;cursor: pointer;"></i>
                                </div>
                                <script>
                $('.trashclick<?= $usersid ?>').click(function() {
                 let confirmation = confirm("Вы уверены, что хотите удалить?");
                    if (confirmation) {
                  var menu_id = "<?= $usersid ?>";
                  $.ajax({
                    url: '<?=$astedADM?>components/asted.personal/del.php',
                    method: 'post',
                    dataType: 'html',
                    data: {
                      menu_id
                    },
                    success: function() {
                        location.assign("<?=$astedADM?>personal/2022/");
                    }
                  });
                }});
              </script>
                                <? } ?>
                        </h6>
                    </div>
                    <div class="card-body">
                        <p><?= $lang['mail'] ?>: <?= $users["email"] ?></p>
                        <p>Телефон: <?= $users['phone'] ?></p>
                        <?= $users['divisions'] === "3" ? "<p>Отчество: {$users['lastname']}</p>" : "" ?>
                        <p><?= $lang['Structure'] ?>: <?= $newsforedit['usergroup'] ?></p>
                        <p><?= $lang['registration'] ?>: <? echo $dataReg = date("d.m.Y (h:i)", $users["regdate"]); ?></p>
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
        </div>
    </div>
</div>

<script src="/panel/components/asted.personal/script.js"></script>
<!-- /.container-fluid -->
<? include "templates/footer.php"; ?>