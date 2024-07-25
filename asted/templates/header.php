<?php
error_reporting(E_ERROR | E_PARSE);
ini_set('log_errors', 'On');
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
$RealPath = realpath($argv[1]);
include $RealPath . "/core/core.php";
if ($userGroupsWoked['0'] == "false") { ?>
  <html lang="<?= $lang['lang'] ?>">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AstedERP: доступ закрыт</title>
    <link rel="icon" type="image/png" href="<?= $astedADM ?>templates/img/logo.png">
    <link href="<?= $astedADM ?>templates/css/sb-admin-2.min.css" rel="stylesheet">
  </head>

  <body>
    <div class="container-fluid">
      <br><br><br>
      <div class="alert alert-warning">
      AstedERP: доступ к проекту закрыт.</div>
    </div>
  </body>

  </html>
<?php die();
}
?>
<!DOCTYPE html>
<html lang="<?= $lang['lang'] ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?= $titleNameProject; ?></title>
  <link rel="icon" type="image/png" href="<?= $astedADM ?>templates/img/logo.png">
  <!-- Custom fonts for this template-->
  <link href="<?= $astedADM ?>templates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?= $astedADM ?>templates/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/reliz-clock.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/profile.css" rel="stylesheet">
  <script src="<?= $astedADM ?>templates/tinymce/tinymce.min.js"></script>
  <script src="<?= $astedADM ?>templates/CKeditor/ckeditor.js"></script>
  <link href="<?= $astedADM ?>templates/css/header.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/clock.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/jquery.tipsy.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/template.css" rel="stylesheet">
  <? 
  if($userSessionThemes == null){
  if ($cofigius['0']['constpalitretheme'] == "white") { ?>
  <style>
    :root {
    --backgrond-color: #f8faff;
    --card-border: 1px;
    --main-fonts: 'Montserrat', sans-serif;
    --main-color: #252d37d9 !important;
}
</style>

    <link href="<?= $astedADM ?>templates/castom/white.css" rel="stylesheet">
    <link href="<?= $astedADM ?>templates/castom/textwhite.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $astedADM ?>templates/css/paceadmin.css" />
  <? }
  if ($cofigius['0']['constpalitretheme'] == "dark") { ?>
    <style>
    :root {
    --backgrond-color: #f8faff;
    --card-border: 1px;
    --main-fonts: 'Montserrat', sans-serif;
    --main-color: #f0efe1d9 !important;
}
</style>
    <link href="<?= $astedADM ?>templates/castom/dark.css" rel="stylesheet">
    <link href="<?= $astedADM ?>templates/castom/textdark.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= $astedADM ?>templates/css/paceadmin_dark.css" />
  <? }}else{?>
    <link href="<?= $astedADM ?>templates/castom/<?=$userSessionThemes?>.css" rel="stylesheet">
    <link href="<?= $astedADM ?>templates/castom/text<?=$userSessionThemes?>.css" rel="stylesheet">
    <?php if($userSessionThemes == "dark"){?>
      <link rel="stylesheet" href="<?= $astedADM ?>templates/css/paceadmin_dark.css" />
      <style>
    :root {
    --backgrond-color: #f8faff;
    --card-border: 1px;
    --main-fonts: 'Montserrat', sans-serif;
    --main-color: #f0efe1d9 !important;
}
.drag__table-heading-item {
    background-color: #272725 !important;
    color: #d3d1c6 !important;
}
.bg-white {
    background-color: #d3d1c6!important;
}
.drag .adding__button {
  background-color: #d3d1c6!important;
}
.drag .drag__table-heading-item:last-child {
  border-radius: 0px !important;
}
.drag::-webkit-scrollbar {
    height: 7px;
    background-color: #d3d1c6;
    box-shadow: 5px 5px 5px -5px rgba(34, 60, 80, 0.2) inset;
}
.drag .drag__table::-webkit-scrollbar {
    height: 7px;
    background-color: #d3d1c6;
    background-image: -webkit-linear-gradient(45deg,rgba(255, 255, 255, .25) 25%,
                    transparent 25%,
                    transparent 50%,
                    rgba(255, 255, 255, .25) 50%,
                    rgba(255, 255, 255, .25) 75%,
                    transparent 75%,
                    transparent);
    box-shadow: 5px 5px 5px -5px rgba(34, 60, 80, 0.2) inset;
}
.drag .drag__table::-webkit-scrollbar-thumb {
  background-color: #f2bf93;
  background-image: -webkit-linear-gradient(45deg,rgba(255, 255, 255, .25) 25%,
                    transparent 25%,
                    transparent 50%,
                    rgba(255, 255, 255, .25) 50%,
                    rgba(255, 255, 255, .25) 75%,
                    transparent 75%,
                    transparent);
                    cursor: pointer;
}
.adding__button-wrapper {
    position: sticky;
    top: 0;
    width: 100%;
    background-color: #272725 !important;
    padding: 12px 0 15px 0;
}
.drag .list-group-item {
    background: #373535 !important;
}
.drag .list-group-item__link {
    color: #c5c4c4 !important;
}
.drag .drag__hidden-left-content {
    color: #d3d1c6 !important;
}
.drag .drag__hidden-left {
    background-color: #2d2b2b;
    border-left: 2px solid #373735;
    border-right: 0px solid #373735;
}
.asted-input {
    color: wheat;
}
.drag .drag__table-heading-item-text {
    color: #d3d1c6 !important;
}
.drag .drag__table-heading-item-price {
    color: #d3d1c6 !important;
}
</style>
    <?}else{?>
      <style>
    :root {
    --backgrond-color: #f8faff;
    --card-border: 1px;
    --main-fonts: 'Montserrat', sans-serif;
    --main-color: #252d37d9 !important;
}
</style>
      <link rel="stylesheet" href="<?= $astedADM ?>templates/css/paceadmin.css" />
    <?}}
  if ($cofigius['0']['preloader'] == "on") { ?>
    <script type="text/javascript" src="<?= $astedADM ?>templates/js/pace.min.js" type="text/javascript"></script>
  <? } ?>
  <link href="<?= $astedADM ?>templates/css/sidebar.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/task.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/tasks.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/project.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/redio-page.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/main.css" rel="stylesheet">
  <link href="<?= $astedADM ?>templates/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?= $astedADM ?>templates/css/daterangepicker.css" />
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/jquery-ui.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?= $astedADM ?>templates/css/jquery-ui.min.css" />
  <script src="<?= $astedADM ?>templates/js/gijgo.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/moment.min.js"></script>
  <!--    Если лагает удалить start-->
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/daterangepicker.min.js"></script>
  <!--    Если лагает удалить end-->
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/drag-arrange.min.js"></script>
  <!--    <script type="text/javascript" src="templates/js/radio.js"></script>-->
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/clock.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/profile.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/tasks.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/group.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/jquery.cookie.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/script.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/ajaxTask.js"></script>
  <script type="text/javascript" src="<?= $astedADM ?>templates/js/lead.js"></script>

  
  <style>
	.warningblocks {
		cursor: pointer;
		padding: 4px;
		border: 1px solid red;
		font-size: 12px;
		background: rgb(102, 47, 47);
		color: white;
		width: 30%;
		margin-top: 5px;
		margin-bottom: 20px;
	}
</style>


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
<!--Главный стиль Asted -->
<link href="<?= $astedADM ?>templates/css/asted/style.css" rel="stylesheet">
</head>
<? if ($cofigius['0']['installnow'] == "on") {
  $sqlUloadAvaz = "UPDATE " . $TerranPrefix . "config SET installnow='off'";
  $resultUloadAvaz = mysqli_query($link, $sqlUloadAvaz);
?>
  <!-- Вызываем при установке системы -->
  <div class="modal fade show" id="TerranInstallModalstart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Поздравляем!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Поздравляем с установкой <strong>AstedERP</strong><br><br>
          Вы можете устанавливать плагины и модули в нашем офицальном маркетплейсе<br><br>
          Вы можете ознакомится с офицальной документацией на сайте <strong>asted.by</strong><br><br>
          Вы можете заказать дополнительные услуги программистов и дизайнеров для доработке системы на сайте <a href="https://asted.by"></a><br>
          <hr>
          ООО "АСТЕДБЕЛ" © <?= date("Y") ?> год.<br>
          Спасибо что выбрали наш продукт!<br>
          С уважением комманда Asted Cloud.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Спасибо, начнём!</button>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(window).on('load', function() {
      $('#TerranInstallModalstart').modal('show');
    });
  </script>
  <!-- Вызываем при установке системы -->
<? } ?>

<body id="page-top">
  <? if ($_POST['submit'] == 'ccconfig') {
    $sqlxa = "UPDATE `crm_config` SET constpalitretheme='" . $_POST['constructpalitrecc'] . "'";
    $resultxa = mysqli_query($link, $sqlxa); ?><script>
      location.href = location.href;
    </script><? } ?>
  <? if ($cofigius['0']['construct'] == "on") { ?>
    <div class="construct_body">
      <img class="construct_control__b crusix" src="/templates/img/terrangroup.png">
      <h3 class="terran_const_control" style="float: right;    margin-right: 75px;">Asted Construct</h3><br><br>
      <center class="terran_const_control"><?= $lang['Color_scheme'] ?>:</center>
      <form action="" method="post">
        <div class="construct_color terran_const_control">
          <div class="constuct_color_blue"></div>
          <div class="constuct_color_red"></div>
          <div class="constuct_color_green"></div>
          <div class="constuct_color_yelllow"></div>
          <div class="constuct_color_shadow"></div>
        </div>
        <!--<select class="btn btn-success terran_const_control" style="margin: 0 auto; width: 100%;height: 10%" name="constructpalitrecc" id="constructpalitrecc">
                  <option value="white">Светлая</option>
                  <option value="dark">Темная</option>
              </select><br><br>-->
        <input type="submit" name="submit" style="display:none" value="ccconfig" name="ccconfig" id="id2" class="btn btn-primary btn-user btn-block" />

      </form>
      <button class="btn btn-success terran_const_control" onclick="javascript:document.getElementById('id2').click();" style="margin: 0 auto; width: 100%;height: 10%"><?= $lang['save'] ?></button>
    </div>
  <? } ?>
  <div class="cd-transition-layer  ">
    <div class="bg-layer"></div>
  </div>
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php
    include "sidebar.php";
    ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <div class="container-fluid container__null">
          <div class="row mb-4">
            <!--                  <audio controls class="music-player">-->
            <!--                      <source src="/templates/audio/dj_combo__sander-_my_love_my_life_radio_edit.mp3" type="audio/mpeg">-->
            <!--                  </audio>-->
            <? if ($cofigius['0']['jobtime'] == "on") { ?>
              <div class="dropdown show">
                <div class="row align-items-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= $astedADM ?>templates/castom/time-left 1.png" class="timericon">
                  <div class="col header-clock <? if ($ArrUserClock['activity'] == "endday") : ?>header-clock--animate-color-green <? endif ?> <? if ($ArrUserClock['activity'] == "dinner") : ?>header-clock--animate-color-yellow <? endif ?>" id="clockbg">
                    <ul class="template_text">
                      <li class="template_text" id="hours"> </li>
                      <li class="template_text" id="point">:</li>
                      <li class="template_text" id="min"> </li>
                      <li class="template_text" id="point">:</li>
                      <li class="template_text" id="sec"> </li>
                    </ul>


                    <?

                    if ($ArrUserClock['activity'] == null) {
                      $daystat = "Первый рабочий день";
                    }
                    if ($ArrUserClock['activity'] == "startday" || $ArrUserClock['activity'] == "continue-work") {
                      $daystat = "Работаю";
                    }
                    if ($ArrUserClock['activity'] == "endday") {
                      $daystat = "Завершен";
                    }
                    if ($ArrUserClock['activity'] == "dinner") {
                      $daystat = "Обед";
                    }
                    ?>

                  </div>
                </div>
                <div class="dropdown-menu" id="dropdown-btn" aria-labelledby="dropdownMenuLink" userID-id="<?= $userID ?>">
                  <div class="row">
                    <div class="col" data-autostart="false">
                      <span id="daystatus" style="color: aliceblue;font-family: sans-serif;font-size: 22px;"><?= $daystat; ?></span>
                      <span><?= $lang['working_day_duration'] ?></span>
                      <div class="time timer_clock">
                        <span class="hours"></span> :
                        <span class="minutes"></span> :
                        <span class="seconds"></span>
                      </div>
                      <div class="time_dinner">
                        <span class="hours"></span> :
                        <span class="minutes"></span> :
                        <span class="seconds"></span>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            <? } ?>


            <div class="col">
              <nav class="navbar navbar-expand navbar-light topbar static-top container__null">





                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                  <?= $lang['menu'] ?>
                </button>
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto template_bg headerbar_right">
                  <!-- Nav Item - Alerts -->
                  <?php if ($numRowsalertcount != null) { ?> <li class="nav-item dropdown no-arrow mx-1">
                      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell fa-fw"></i>
                        <!-- Counter - Alerts -->
                        <span class="badge badge-danger badge-counter"><?php if ($numRowsalertcount != null) {
                                                                          echo $numRowsalertcount;
                                                                        } ?>+</span>
                      </a>
                      <!-- Dropdown - Alerts -->
                      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header">
                          Оповещение
                        </h6>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                          <div class="mr-3">
                            <div class="icon-circle bg-primary">
                              <i class="fas fa-file-alt text-white"></i>
                            </div>
                          </div>
                          <?php
                          $sql_alertheader = "SELECT * FROM `crm_news` ORDER BY `id` DESC";
                          $result_alertfooter = mysqli_query($link, $sql_alertheader);
                          while ($alertfooter = mysqli_fetch_array($result_alertfooter)) {
                            $alertheaderID = $alertfooter['id'];
                            $alertheaderType = $alertfooter['type'];
                            $alertheaderTitle = $alertfooter['title'];
                            $alertheaderText = $alertfooter['text'];
                            $alertheaderData = $alertfooter['date'];
                            if ($alertheaderType == "alert") {
                          ?>
                              <div>
                                <div class="small text-gray-500"><?= date("d.m.Y", $alertheaderData); ?></div>
                                <span class="font-weight-light"><?= $alertheaderText ?></span>
                              </div>
                          <? }
                          } ?>
                        </a>
                        <a class="dropdown-item text-center small text-gray-500" href="/asted/notice/">Показать всё оповещения</a>
                      </div>
                    </li><? } ?>

                    <?php
$countOpenNotes = R::count('crm_notice', 'userid = ? AND status = ?', [$userID, 'open']);
if($countOpenNotes != null){
?>           
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <span class="badge badge-danger badge-counter"><?=$countOpenNotes?></span>
              </a>
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  <?= $lang['alert_center'] ?>
                </h6>
                <?php 
$notices = R::findAll('crm_notice', 'userid = ? ORDER BY id DESC LIMIT 5', [$userID]);

// Вывод данных
foreach ($notices as $notice) {?>
                <a class="dropdown-item d-flex align-items-center" href="<?php if(!empty($notice->uri)){echo $notice->uri;}else{echo '#';} ?>">
                  <div class="dropdown-list-image mr-3">
                    <?php   if ($cofigius['0']['constpalitretheme'] == "dark") { ?>
                      <img class="rounded-circle" src="/asted/templates/img/logo-white.png" style="width: 30px;filter: drop-shadow(1px 1px 20px red) invert(75%);" alt="">
                      <?}else{?>
                    <img class="rounded-circle" src="/asted/templates/img/logo-white.png" alt="">
                    <?}?>
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?=$notice->title?></div>
                    <div class="small text-gray-500">ID: <?=$notice->id?> Дата: <?=$notice->data?></div>
                  </div>
                </a>
<?}?>
                <a class="dropdown-item text-center small text-gray-500" href="/asted/notice/"><?= $lang['show_all_messages'] ?></a>
              </div>
            </li>

            <?}?>
                  <?php if ($sitecontid != null) { ?><a class="nav-link" style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;" href="/">
                      <i class="fas fa-fw fa-home"></i>
                    </a>
                  <? } ?>

                  <?php if ($sitecontid != null) { ?><div class="topbar-divider d-none d-sm-block"></div><? } ?>
                  <!-- Nav Item - User Information -->
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span id="userFIO" class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $username ?> <?= $usersurname ?></span>
                      <img class="img-profile rounded-circle" src="<?= $userAvatar ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="<?= $astedADM ?>profile/<?= $userID ?>/">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        <?= $lang['profile']; ?>
                      </a>
                      <a class="dropdown-item" href="<?= $astedADM ?>notes/<?= $userID ?>/">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Личные заметки
                      </a>
                      <a class="dropdown-item" href="<?= $astedADM ?>logs/">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        <?= $lang['activitylog']; ?>
                      </a>
                      <a class="dropdown-item" href="/asted/tasks-trash/">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        <?= $lang['deleted_tasks'] ?>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?= $astedADM ?>profile/login/exit/">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        <?= $lang['logout']; ?>
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>

        <?= $alert ?>
        <!-- End of Topbar -->