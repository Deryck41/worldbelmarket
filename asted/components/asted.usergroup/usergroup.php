<? include "templates/header.php";
//Asted::ADD USER GROUP
if($userGroupsCanPersonalGroup['0'] == "true"){
    if ($_POST['submit'] == 'adddugroup') {
        $addGroupName = $_POST['titleadd'];
        $addGroupRoot = $_POST['adduggladmin'];
        $addGroupBuybue = $_POST['adduggbuebue'];
        $addGroupCanauthusr = $_POST['addugcanaut'];
        $addGroupCaneditusr = $_POST['addugcanediusr'];
        $addGroupCanvprelead = $_POST['addugcanwievprelead'];
        $addGroupCandelarhlead = $_POST['addugcandelarhlead'];
        $addGroupCanviewlead = $_POST['addugcanwievlead'];
        $addGroupCaneditconf = $_POST['addugcaneditconf'];
        $addGroupCanvsalaries = $_POST['addugcanwiewsalaries'];
        $addGroupCanvproject = $_POST['addugcanwiewproject'];
        $addGroupCanwebsite = $_POST['addugcanwebsite'];
            //Update UserControl
            $addGroupCanauthusr = $_POST['addugcanaut'];
            $addGroupCaneditusr = $_POST['addugcanediusr'];
            $addGroupPersonalgroup = $_POST['editpersonalgroup'];
            $addGroupCanadduser = $_POST['editcanadduser'];
            //Update Project setting
            $addGroupCanvproject = $_POST['addugcanwiewproject'];
            $addGroupProjectpdoc = $_POST['editprojectpdoc'];
            $addGroupProjectprice = $_POST['editprojectprice'];
            $addGroupProjectedit = $_POST['editprojectedit'];
            $addGroupProjectdopinfo = $_POST['editprojectdopinfo'];
            $adddevdoc = $_POST['adddevdoc'];
            
        $sql = "INSERT INTO `crm_usergroup` (projectpdoc, projectprice, projectedit, projectdopinfo, personalgroup, canadduser, usergroup, superadmin, userwoked, canforusrauth, caneditusr, canviewprelead, candeletoldlead, canviewlead, canviewconfig, canviewsalaries, canviewsallgroup, cancontrolwebsite, devdoc) 
        VALUES ('{$addGroupProjectpdoc}','{$addGroupProjectprice}','{$addGroupProjectedit}','{$addGroupProjectdopinfo}', '{$addGroupPersonalgroup}','{$addGroupCanadduser}', '{$addGroupName}','{$addGroupRoot}','{$addGroupBuybue}','{$addGroupCanauthusr}','{$addGroupCaneditusr}', '{$addGroupCanvprelead}','{$addGroupCandelarhlead}','{$addGroupCanviewlead}','{$addGroupCaneditconf}','{$addGroupCanvsalaries}','{$addGroupCanvproject}','{$addGroupCanwebsite}','{$adddevdoc}')";
        if (mysqli_query($link, $sql)) {
            //header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
            echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'usergroup/1305/" />';
        } else {
            echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
            Asted: Ошибка добавления записи!!!<br> Запрос в базу: ' . $sql . ' <br> Ошибка: ' . mysqli_error($link) . '
        </div></div>';
        }
    }
}
//Asted::UPDATE USER GROUP
if($userGroupsCanPersonalGroup['0'] == "true"){
    if ($_POST['submit'] == 'uppdate') {
        $UpdUpdid = $_POST['updateusrid'];
        $UpdGroupName = $_POST['titleadd'];
        $UpdGroupRoot = $_POST['adduggladmin'];
        $UpdGroupBuybue = $_POST['adduggbuebue'];
        $UpdGroupCanvprelead = $_POST['addugcanwievprelead'];
        $UpdGroupCandelarhlead = $_POST['addugcandelarhlead'];
        $UpdGroupCanviewlead = $_POST['addugcanwievlead'];
        $UpdGroupCaneditconf = $_POST['addugcaneditconf'];
        $UpdGroupCanvsalaries = $_POST['addugcanwiewsalaries'];
        $UpdGroupCanwebsite = $_POST['addugcanwebsite'];
        //Update UserControl
        $UpdGroupCanauthusr = $_POST['addugcanaut'];
        $UpdGroupCaneditusr = $_POST['addugcanediusr'];
        $UpdGroupPersonalgroup = $_POST['editpersonalgroup'];
        $UpdGroupCanadduser = $_POST['editcanadduser'];
        //Update Project setting
        $UpdGroupCanvproject = $_POST['addugcanwiewproject'];
        $UpdGroupProjectpdoc = $_POST['editprojectpdoc'];
        $UpdGroupProjectprice = $_POST['editprojectprice'];
        $UpdGroupProjectedit = $_POST['editprojectedit'];
        $UpdGroupProjectdopinfo = $_POST['editprojectdopinfo'];
        $editDevDoc = $_POST['editdevdoc'];
        $sql = "UPDATE crm_usergroup SET  projectpdoc=?, projectprice=?, projectedit=?, projectdopinfo=?, personalgroup=?, canadduser=?, usergroup=?, superadmin=?, userwoked=?, canforusrauth=?, caneditusr=?, canviewprelead=?, candeletoldlead=?, canviewlead=?, canviewconfig=?, canviewsalaries=?, canviewsallgroup=?, cancontrolwebsite=?, devdoc=? WHERE id=?";
        $stmt = mysqli_prepare($link, $sql);
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssi", $UpdGroupProjectpdoc, $UpdGroupProjectprice, $UpdGroupProjectedit, $UpdGroupProjectdopinfo, $UpdGroupPersonalgroup, $UpdGroupCanadduser, $UpdGroupName, $UpdGroupRoot, $UpdGroupBuybue, $UpdGroupCanauthusr, $UpdGroupCaneditusr, $UpdGroupCanvprelead, $UpdGroupCandelarhlead, $UpdGroupCanviewlead, $UpdGroupCaneditconf, $UpdGroupCanvsalaries, $UpdGroupCanvproject, $UpdGroupCanwebsite, $editDevDoc, $UpdUpdid );
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'usergroup/0513/" />';
    }
}
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '0513') { ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                Asted: Подразделение обновлено
                </div>
            </div>
        <? }
    }
}
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '1305') { ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                Asted: Подразделение добавлено
                </div>
            </div>
<? }
    }
}if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        if ($_GET['id'] == '1991') { ?>
            <div class="container-fluid">
                <div class="alert alert-success" role="alert">
                    Asted: Подразделение удалено
                </div>
            </div>
<? }
    }
}?>
<?php
if (isset($_POST["menu_id"])) {
    $menu_id = $_POST["menu_id"];
    $sql_lead_leadDeletesss = "DELETE FROM crm_usergroup WHERE id={$menu_id}";
    $result_leadsss = mysqli_query($link, $sql_lead_leadDeletesss);
}
?>
<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $lang['staff_greetings'] ?></h1>
        <?php if($userGroupsCanPersonalGroup['0'] == "true"){ ?>
        <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> <?= $lang['create_divisions'] ?></a>
            <?}?>
    </div>
    <?php if($userGroupsCanPersonalGroup['0'] == "true"){ ?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:80%" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Создать новую группу пользователей</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                    <span><strong><?= $lang['Department_name'] ?>: </strong></span><input class="form-control" type="тема" value="Имя группы" name="titleadd" id="titleadd">
                        <br>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
            Основные настройки</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
            Управление пользователями</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
            Работа с лидами</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messagess" role="tab" aria-controls="v-pills-messagess" aria-selected="false">
            Работа с проектами</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
            Общий доступ</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            
        <span><strong>Главный администратор: </strong></span>
                        <select class="form-control group" name="adduggladmin" id="adduggladmin">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Работает в компании: </strong></span>
                        <select class="form-control group" name="adduggbuebue" id="adduggbuebue">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>

        </div>
        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <span><strong>Может авторизоватся под другими: </strong></span>
                        <select class="form-control group" name="addugcanaut" id="addugcanaut">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может редактировать пользователей: </strong></span>
                        <select class="form-control group" name="addugcanediusr" id="addugcanediusr">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>


                        <span><strong>Может создавать и редактировать подразделения: </strong></span>
                                    <select class="form-control group" name="editpersonalgroup" id="editpersonalgroup">
                                         <option value="false"><?= $lang['no'] ?></option>
                                         <option value="true"><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может добавлять пользователей: </strong></span>
                                    <select class="form-control group" name="editcanadduser" id="editcanadduser">
                                           <option value="false"><?= $lang['no'] ?></option>
                                         <option value="true"><?= $lang['yes'] ?></option>
                                    </select>
        </div>
        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
        <span><strong>Может просматривать прелидогенерацию: </strong></span>
                        <select class="form-control group" name="addugcanwievprelead" id="addugcanwievprelead">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может удалять архивных лидов: </strong></span>
                        <select class="form-control group" name="addugcandelarhlead" id="addugcandelarhlead">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может просматривать лидов: </strong></span>
                        <select class="form-control group" name="addugcanwievlead" id="addugcanwievlead">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
    
        </div>

        <div class="tab-pane fade" id="v-pills-messagess" role="tabpanel" aria-labelledby="v-pills-messagess-tab">
        <span><strong>Может просматривать проекты: </strong></span>
                        <select class="form-control group" name="addugcanwiewproject" id="addugcanwiewproject">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>

        <span><strong>Может просматривать документы проектов: </strong></span>
                                    <select class="form-control group" name="editprojectpdoc" id="editprojectpdoc">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                                    </select>
        <span><strong>Может просматривать стоимость проектов: </strong></span>
                                    <select class="form-control group" name="editprojectprice" id="editprojectprice">
                                    <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                                    </select> 
        <span><strong>Может редактировать проекты: </strong></span>
                                    <select class="form-control group" name="editprojectedit" id="editprojectedit">
                                    <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                                    </select> 
        <span><strong>Может видеть дополнительную информацию по проекту: </strong></span>
                                    <select class="form-control group" name="editprojectdopinfo" id="editprojectdopinfo">
                                    <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                                    </select>  
    
        </div>
        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <span><strong>Может влиять на конфигурацию системы: </strong></span>
                        <select class="form-control group" name="addugcaneditconf" id="addugcaneditconf">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может просматривать зарплаты: </strong></span>
                        <select class="form-control group" name="addugcanwiewsalaries" id="addugcanwiewsalaries">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может управлять сайтом: </strong></span>
                        <select class="form-control group" name="addugcanwebsite" id="addugcanwebsite">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
                        <span><strong>Может видеть документацию по разработке сайта: </strong></span>
                        <select class="form-control group" name="adddevdoc" id="adddevdoc">
                            <option value="false"><?= $lang['no'] ?></option>
                            <option value="true"><?= $lang['yes'] ?></option>
                        </select>
    
        </div>
        </div>
    </div>
</div>
                        <input type="submit" name="submit" style="display:none" value="adddugroup" name="adddugroup" id="id555" class="btn btn-primary btn-user btn-block" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
                    <button type="button" onclick="javascript:document.getElementById('id555').click();" class="btn btn-primary"><?= $lang['add'] ?></button>
                </div>
            </div>
        </div>
    </div>
    <?}?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $lang['Structure_of_personnel'] ?></h6>
        </div>
        <div class="card-body">
            <? while ($task = mysqli_fetch_assoc($result_divisions)) {
                $title = "{$task['usergroup']}";
                $superadmin = "{$task['superadmin']}";
                $userwoked = "{$task['userwoked']}";
                $canviewprelead = "{$task['canviewprelead']}";
                $candeletoldlead = "{$task['candeletoldlead']}";
                $canviewlead = "{$task['canviewlead']}";
                $canviewconfig = "{$task['canviewconfig']}";
                $canviewsalaries = "{$task['canviewsalaries']}";
                $canviewwebsite = "{$task['cancontrolwebsite']}";
                $idusrgroup = "{$task['id']}";
                //usercontrols
                $canforusrauth = "{$task['canforusrauth']}";
                $caneditusr = "{$task['caneditusr']}";
                $personalgroup = "{$task['personalgroup']}";
                $canadduser = "{$task['canadduser']}";
                //projects
                $canviewprojects = "{$task['canviewsallgroup']}";  
                $projectpdoc = "{$task['projectpdoc']}";
                $projectprice = "{$task['projectprice']}";
                $projectedit = "{$task['projectedit']}";
                $projectdopinfo = "{$task['projectdopinfo']}";
                $projectdevdoc = "{$task['devdoc']}";
                if($userGroupsCanPersonalGroup['0'] == "true"){ ?>
           

                <div class="modal fade" id="myModalka<?= $idusrgroup ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="max-width:80%" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel"><?= $lang['edit'] ?>: <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post">

                                    <span><strong><?= $lang['Department_name'] ?>: </strong></span><input class="form-control" type="тема" value="<?= $title ?>" name="titleadd" id="titleadd">
                                    <br>
<div class="row">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="x-pills-tab<?= $idusrgroup ?>" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#x-pills-home<?= $idusrgroup ?>" role="tab" aria-controls="x-pills-home<?= $idusrgroup ?>" aria-selected="true">
            Основные настройки</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#x-pills-profile<?= $idusrgroup ?>" role="tab" aria-controls="x-pills-profile<?= $idusrgroup ?>" aria-selected="false">
            Управление пользователями</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#x-pills-messages<?= $idusrgroup ?>" role="tab" aria-controls="x-pills-messages<?= $idusrgroup ?>" aria-selected="false">
            Работа с лидами</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#x-pills-messagess<?= $idusrgroup ?>" role="tab" aria-controls="x-pills-messagess<?= $idusrgroup ?>" aria-selected="false">
            Работа с проектами</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#x-pills-settings<?= $idusrgroup ?>" role="tab" aria-controls="x-pills-settings<?= $idusrgroup ?>" aria-selected="false">
            Общий доступ</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="x-pills-tabContent">
        <div class="tab-pane fade show active" id="x-pills-home<?= $idusrgroup ?>" role="tabpanel" aria-labelledby="x-pills-home-tab<?= $idusrgroup ?>">
                    <span><strong>Главный администратор: </strong></span>
                                    <select class="form-control group" name="adduggladmin" id="adduggladmin">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($superadmin == "true") {
                                                                    echo 'selected';
                                                                } ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Работает в компании: </strong></span>
                                    <select class="form-control group" name="adduggbuebue" id="adduggbuebue">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($userwoked == "true") {
                                                                    echo 'selected';
                                                                } ?>><?= $lang['yes'] ?></option>
                                    </select>
        </div>
        <div class="tab-pane fade" id="x-pills-profile<?= $idusrgroup ?>" role="tabpanel" aria-labelledby="x-pills-profile-tab<?= $idusrgroup ?>">
                            <span><strong>Может авторизоватся под другими: </strong></span>
                                    <select class="form-control group" name="addugcanaut" id="addugcanaut">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canforusrauth == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может редактировать пользователей: </strong></span>
                                    <select class="form-control group" name="addugcanediusr" id="addugcanediusr">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($caneditusr == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
 
                                    <span><strong>Может создавать и редактировать подразделения: </strong></span>
                                    <select class="form-control group" name="editpersonalgroup" id="editpersonalgroup">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($caneditusr == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может добавлять пользователей: </strong></span>
                                    <select class="form-control group" name="editcanadduser" id="editcanadduser">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canadduser == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
        </div>
        <div class="tab-pane fade" id="x-pills-messagess<?= $idusrgroup ?>" role="tabpanel" aria-labelledby="x-pills-messagess-tab<?= $idusrgroup ?>">
        <span><strong>Может просматривать проекты: </strong></span>
                                    <select class="form-control group" name="addugcanwiewproject" id="addugcanwiewproject">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewprojects == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
        <span><strong>Может просматривать документы проектов: </strong></span>
                                    <select class="form-control group" name="editprojectpdoc" id="editprojectpdoc">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($projectpdoc == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
        <span><strong>Может просматривать стоимость проектов: </strong></span>
                                    <select class="form-control group" name="editprojectprice" id="editprojectprice">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($projectprice == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select> 
        <span><strong>Может редактировать проекты: </strong></span>
                                    <select class="form-control group" name="editprojectedit" id="editprojectedit">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($projectedit == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select> 
        <span><strong>Может видеть дополнительную информацию по проекту: </strong></span>
                                    <select class="form-control group" name="editprojectdopinfo" id="editprojectdopinfo">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($projectdopinfo == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>                             
        </div>
        <div class="tab-pane fade" id="x-pills-messages<?= $idusrgroup ?>" role="tabpanel" aria-labelledby="x-pills-messages-tab<?= $idusrgroup ?>">
                            <span><strong>Может просматривать прелидогенерацию: </strong></span>
                                    <select class="form-control group" name="addugcanwievprelead" id="addugcanwievprelead">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewprelead == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может удалять архивных лидов: </strong></span>
                                    <select class="form-control group" name="addugcandelarhlead" id="addugcandelarhlead">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($candeletoldlead == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может просматривать лидов: </strong></span>
                                    <select class="form-control group" name="addugcanwievlead" id="addugcanwievlead">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewlead == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
        </div>
        <div class="tab-pane fade" id="x-pills-settings<?= $idusrgroup ?>" role="tabpanel" aria-labelledby="x-pills-settings-tab<?= $idusrgroup ?>">
                                <span><strong>Может влиять на конфигурацию системы: </strong></span>
                                    <select class="form-control group" name="addugcaneditconf" id="addugcaneditconf">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewconfig == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может просматривать зарплаты: </strong></span>
                                    <select class="form-control group" name="addugcanwiewsalaries" id="addugcanwiewsalaries">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewsalaries == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может управлять сайтом: </strong></span>
                                    <select class="form-control group" name="addugcanwebsite" id="addugcanwebsite">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($canviewwebsite == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>
                                    <span><strong>Может видеть документацию по разработке сайта: </strong></span>
                                    <select class="form-control group" name="editdevdoc" id="editdevdoc">
                                        <option value="false"><?= $lang['no'] ?></option>
                                        <option value="true" <?php if ($projectdevdoc == "true") echo 'selected'; ?>><?= $lang['yes'] ?></option>
                                    </select>

                                   
    
        </div>
        </div>
    </div>
</div>
                                    <input class="form-control" type="тема" value="<?= $idusrgroup ?>" name="updateusrid" id="updateusrid" style="display:none;">
                                    <input type="submit" name="submit" style="display:none" value="uppdate" name="uppdate" id="id110<?= $idusrgroup ?>" class="btn btn-primary btn-user btn-block" />
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
                                <button type="button" onclick="javascript:document.getElementById('id110<?= $idusrgroup ?>').click();" class="btn btn-primary"><?= $lang['update'] ?></button>
                            </div>
                        </div>
                    </div>
                </div>
<?}?>


                <div class="personal_divisions-body">
                    <div class="p-3 bg-gray-100">#<?= $idusrgroup ?> - <?= $title ?>
                        <hr>

                        <div style="font-family: monospace;">
                        <div style="border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Основные настройки</div>
                            Главный администратор: <?= $superadmin ?>, <br>
                            Работает в компании: <?= $userwoked ?>, <br>
                        </div>
                        <div style="margin-top: 20px; border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Управление пользователями</div>
                            Может авторизоватся под другими пользователями: <?= $canforusrauth ?>, <br>
                            Может редактировать пользователей: <?= $caneditusr ?>,<br>
                            Может создавать и редактировать подразделения <?= $personalgroup ?>,<br>
                            Может добавлять пользователей <?= $canadduser ?><br>
                        </div>
                        <div style="margin-top: 20px; border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Работа с проектами</div>
                         Может видеть все проекты (приватные): <?= $canviewprojects ?>,<br>
                         Может просматривать документы проектов: <?= $projectpdoc ?>,<br>
                         Может просматривать стоимость проектов: <?= $projectprice ?>,<br>
                         Может редактировать проекты: <?= $projectedit ?>,<br>
                         Может видеть дополнительную информацию по проекту: <?= $projectdopinfo ?>,<br>
                        </div>
                        <div style="margin-top: 20px; border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Работа с лидами</div>
                            Может просматривать прелидогенерацию: <?= $canviewprelead ?>,<br>
                            Может удалять архивных лидов: <?= $candeletoldlead ?>,<br>
                            Может просматривать лидов: <?= $canviewlead ?>,<br>
                            </div>
                            <div style="margin-top: 20px; border: 1px solid; padding: 4px; border-radius: 3px;">
                        <div style="margin: 0 auto; margin-top: -15px; background-color: black; display: table; color: white; padding: 4px;">Основыне настройки</div>
                            Может влиять на конфигурацию системы: <?= $canviewconfig ?>,<br>
                            Может просматривать зарплаты: <?= $canviewsalaries ?>,<br>
                            Может управлять сайтом: <?= $canviewwebsite ?>,<br>
                            Может видеть документацию по разработке сайта: <?= $projectdevdoc ?>,
                            </div>
                        </div>

                    </div>
                    <?php if($userGroupsCanPersonalGroup['0'] == "true"){ ?>
                    <div class="personal_divisions-icon">
                        <i class="fas fa-fw fa-trash trashclick<?= $idusrgroup ?>" value="<?= $idusrgroup ?>" style="float: right;"></i> <i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka<?= $idusrgroup ?>" style="float: right;"></i>
                    </div>
                    <br>
                    <script>
                        document.querySelectorAll('.trashclick' + <?= $idusrgroup ?>).forEach(function(element) {
                            element.addEventListener('click', function() {
                                let confirmation = confirm("Вы уверены, что хотите удалить?");
                                if (confirmation) {
                                    var menu_id = "<?= $idusrgroup ?>";
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('POST', '<?=$astedADM?>usergroup/');
                                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                                    xhr.onload = function() {
                                        if (xhr.status === 200) {
                                            location.href = "<?=$astedADM?>usergroup/1991/";
                                        }
                                    };
                                    xhr.send('menu_id=' + encodeURIComponent(menu_id));
                                }
                            });
                        });
                    </script>
                    <?}?>
                </div>
            <? } ?>
        </div>
    </div>
</div>
<? include "templates/footer.php"; ?>