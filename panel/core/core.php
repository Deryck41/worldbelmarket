<?php
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();
//   error_reporting(E_ALL ^ E_NOTICE);
//   ini_set('display_errors', 'Off');
//   ini_set('error_reporting', E_ALL );
error_reporting(E_ERROR | E_PARSE);
$astedADM = '/panel';
ini_set('log_errors', 'On');
ini_set('display_errors', 'Off');
ini_set('error_reporting', E_ALL);
include('rb.php');
define('ASTEDRB','yes');
include('Function/translit.php');
include('Function/makeUrlCode.php');
include('Function/makeCode.php');
include('Function/makeImgName.php');
include('Function/generateUniqueTourl.php');
include('Function/generateUniqueTourlFromPost.php');
include 'Services/Asted.php';
//Asted Main Inform
$astedInfo = new Asted();
$buildNow = $astedInfo -> build;
$buildDate = $astedInfo-> date;
$revisionNow = $astedInfo-> version;
$RealPath = realpath($argv[1]);
$userID = $_SESSION['userid'];
if (!empty($_SESSION['id']) && empty($_SESSION['userid'])){
$userID = $_SESSION['id'];
}
$timeNowUNIXFormat = strtotime("now");
//Asted Admin URL Controler
$curURLGlobal = $_SERVER['REQUEST_URI'];
$urlsGlobal = explode('/', $curURLGlobal);
$DR = realpath($argv[1]);
//Asted Admin Exit
//Login Rev: 7+ 2may2023
if ($userID != null AND $_GET['id'] == "login" AND $_GET['result'] == "exit") {
    $_SESSION = array();
    session_destroy();
    header('Location: /panel/login/');
}

if (empty($userID)) {
        header('Location: /panel/login/');
}

//Asted Load Config
$config = __dir__."/config.php";
$installDir = '../install/index.php';
if (file_exists($config)) {
    include $config;
    if($urlsGlobal['1'] == $astedADM){
          $astedADM = "/".$astedADM."/";  //если вторая ссылка == тому что в конфиге
        }else{
        $astedADM = $astedADM."/"; //если к примеру == index.php
        }
    $PATHqUERY=__DIR__."/query.php";
    include $PATHqUERY;
    if($cofigius['0']['typesystem'] != "noselect"){
        $dirConfig = $cofigius['0']['typesystem'];
    }
	$indexDefPage = $cofigius[0]['mainpage'];
    if ($_POST['taskcloused'] != null) {
        $taskClouseID = $_POST['taskcloused'];
        $sqlUloadAva = "UPDATE ".$TerranPrefix."task SET task_status='1' WHERE id='{$taskClouseID}'";
        $resultUloadAva = mysqli_query($link, $sqlUloadAva);
        if ($_POST['taskcloused']) {
            echo json_encode(array('success' => 0));
        }
    }
    if ($_POST['taskopened'] != null) {
        $taskClouseID = $_POST['taskopened'];
        $sqlUloadAva = "UPDATE ".$TerranPrefix."task SET task_status='0' WHERE id='{$taskClouseID}'";
        $resultUloadAva = mysqli_query($link, $sqlUloadAva);
        if ($_POST['taskopened']) {
            echo json_encode(array('success' => 0));
        }
    }
    /*
    if ($_POST['Group-message'] != null) {
        $ArrTaskTheme = $_POST['Group-theme'];
        $ArrTaskAutor = $_POST['Group-autor'];
        $ArrTaskExecutor = $_POST['Group-responsible'];
        $ArrTaskMessage = $_POST['Group-message'];
        $ArrTaskDATA = date("Y-n-j G:i:s");
        $sql = "INSERT INTO `crm_group` (group, group_description, group_users) VALUES ('{$ArrTaskTheme}', '{$ArrTaskMessage}', '{$ArrTaskAutor}')";
        $result = mysqli_query($link, $sql);
        if ($ArrTaskTheme) {
            echo json_encode(array('success' => 1));
        }
    }*/
    if ($_POST['Wiki-group'] != null) {
        $ArrWikiId = $_POST['Wiki-group'];
        $ArrWikiText = $_POST['Wiki-message'];
        $sqlUloadAvaWiki = "UPDATE ".$TerranPrefix."group SET group_wiki='" . $ArrWikiText . "' WHERE id='{$ArrWikiId}'";
        $resultUloadAvaWiki = mysqli_query($link, $sqlUloadAvaWiki);
        echo json_encode(array('success' => 1));
    }

    if ($_POST['Task-message'] != null) {
        $ArrTaskTheme = $_POST['Task-theme'];
        $ArrTaskAutor = $_POST['Task-autor'];
        $ArrTaskEnddate = $_POST['Task-dateend'];
        $ArrTaskExecutor = $_POST['Task-responsible'];
        $ArrTaskGroup = $_POST['Task-group'];
        $ArrTaskMessage = $_POST['Task-message'];
        $ArrTaskTegs = $_POST['Task-tegs'];
        $ArrTaskWarning = $_POST['Task-warning'];
        $ArrTaskDATA = date("Y-n-j G:i:s");
        $sql = "INSERT INTO `".$TerranPrefix."task` (task_name, task_text, task_togroup, task_autor, task_executor,task_datacreat,task_datacompletion,task_status,task_tegs,task_warning) VALUES ('{$ArrTaskTheme}', '{$ArrTaskMessage}', '{$ArrTaskGroup}', '{$ArrTaskAutor}' ,
        '{$ArrTaskExecutor}'  , '{$ArrTaskDATA}',
        '".$ArrTaskEnddate."', '0',
        '".$ArrTaskTegs."',
        '".$ArrTaskWarning."')";
        $result = mysqli_query($link, $sql);

        $oTest1 = R::xdispense('crm_notice');
        $oTest1->whoid = $ArrTaskAutor;
        $oTest1->userid = $ArrTaskExecutor;
        $oTest1->title = "Вам поставлена задача: ".$ArrTaskTheme;
        $oTest1->status = "open";
        $oTest1->data = date("d.m.Y");
        $id = R::store( $oTest1 );

        if ($ArrTaskTheme) {
            echo json_encode(array('success' => 1));
        }
    } else {
        if ($_POST['Task-theme']) {
            echo json_encode(array('success' => 0));
        }
    }

    if ($_POST['status']) {
        $userIdClock = $_POST['userID'];
        $userStat = $_POST['status'];
        if ($userStat == "profile-edit") {
            $sql_user_edit = "UPDATE ".$TerranPrefix."users SET surname='".$_POST['surname']."',name='".$_POST['username']."',email='".$_POST['email']."',phone_number='".$_POST['phonenumber']."',addres_skype='".$_POST['messenger']."',organization='".$_POST['organization']."',birtday='".$_POST['birthday']."',mylang='".$_POST['mylang']."', themes='".$_POST['themes']."',city='".$_POST['city']."' WHERE id='{$userID}'";
            $result_lead = mysqli_query($link, $sql_user_edit);
            echo "1";
        }
        if ($userStat !== "statusNow") {
            $ArrClockNow = $ArrUserClock['time_now'];
            $ArrClockND = $ArrUserClock['time_nowdinner'];
            $ArrClockED = $ArrUserClock['time_exitdinner'];
            $ArrClockExit = $ArrUserClock['time_exit'];
            if ($userStat == "startday") {
                $sql = "INSERT INTO `".$TerranPrefix."timeuser` (id_user, time_now, activity) VALUES ('{$userIdClock}', '{$timeNowUNIXFormat}' ,'{$userStat}')";
                $result = mysqli_query($link, $sql);
            }
            if ($userStat == "dinner") {
                $sql = "INSERT INTO `".$TerranPrefix."timeuser` (id_user, time_now, time_nowdinner, activity) VALUES ('{$userIdClock}', '{$ArrClockNow}', '{$timeNowUNIXFormat}' ,'{$userStat}')";
                $result = mysqli_query($link, $sql);
            }
            if ($userStat == "continue-work") {
                $sql = "INSERT INTO `".$TerranPrefix."timeuser` (id_user, time_now, time_nowdinner, time_exitdinner, activity) VALUES ('{$userIdClock}', '{$ArrClockNow}', '{$ArrClockND}', '{$timeNowUNIXFormat}' ,'{$userStat}')";
                $result = mysqli_query($link, $sql);
            }
            if ($userStat == "endday") {
                $sql = "INSERT INTO `".$TerranPrefix."timeuser` (id_user, time_now, time_nowdinner, time_exitdinner, time_exit, activity) VALUES ('{$userIdClock}', '{$ArrClockNow}', '{$ArrClockND}', '{$ArrClockED}', '{$timeNowUNIXFormat}' ,'{$userStat}')";
                $result = mysqli_query($link, $sql);
            }
            if ($userStat == "lead_add" && !empty($_POST["lead_id"])) {
                $lead_lead= mysqli_query($link,"SELECT `id` FROM `".$TerranPrefix."lead` ORDER BY id DESC LIMIT 1");
                $lead_resultCount = $lead_lead->fetch_assoc();
                $lead_id = $lead_resultCount["id"]+1;
                $lead_manager = $_POST["lead_manager"];
                $lead_date = date("d.m.Y");
                $lead_name = $_POST["lead_name"];
                $lead_project = $_POST["lead_project"];
                $lead_projectName = $_POST["lead_projectName"];
                $lead_tel = $_POST["lead_tel"];
                $lead_statusCall = $_POST["lead_statusCall"];
                $lead_email = $_POST["lead_email"];
                $lead_manager = $_POST["lead_manager"];
                $lead_comment = "";
                $lead_leadStatus = "new";
                $sql_lead = "INSERT INTO `".$TerranPrefix."lead` (id, date, name, project, tel, status,comment,leadstatus,email,manager,project_name) VALUES ('{$lead_id}', '{$lead_date}', '{$lead_name}', '{$lead_project}', '{$lead_tel}' ,'{$lead_statusCall}','{$lead_comment}' ,'{$lead_leadStatus}','{$lead_email}','{$lead_manager}','{$lead_projectName}')";
                $result_lead = mysqli_query($link, $sql_lead);
                echo "lead_add";
            }
            if ($userStat == "lead_feedback"||$userStat == "lead_callNew" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $lead_statusCall = $_POST["lead_statusCall"];
                $sql_feedback = "UPDATE ".$TerranPrefix."lead SET status='".$lead_statusCall."' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_feedback);
                echo "$lead_id./.$lead_statusCall";
            }
            if ($userStat == "lead_old" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $lead_leadStatus = $_POST["lead_leadStatus"];
                $lead_comment = $_POST["lead_comment"];
                $sql_lead_leadStatus = "UPDATE ".$TerranPrefix."lead SET leadstatus='".$lead_leadStatus."',comment='".$lead_comment. "' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadStatus);
                echo "$lead_id./.$sql_lead_leadStatus";
            }
            if ($userStat == "lead_lead" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $lead_leadStatus = $_POST["lead_leadStatus"];
                $lead_statusCall = $_POST["lead_statusCall"];
                $sql_lead_leadStatus = "UPDATE ".$TerranPrefix."lead SET leadstatus='".$lead_leadStatus."',status='".$lead_statusCall."' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadStatus);
                echo "$lead_id./.$sql_lead_leadStatus";
            }
            if ($userStat == "lead_edit" && !empty($_POST["lead_id"]) && $_POST["lead_type"] == "lead_table") {
                $lead_id = $_POST["lead_id"];
                $lead_comment = $_POST["lead_comment"];
                $lead_name = $_POST["lead_name"];
                $lead_project = $_POST["lead_project"];
                $lead_tel = $_POST["lead_tel"];
                $lead_email = $_POST["lead_email"];
                $sql_lead_leadStatus = "UPDATE ".$TerranPrefix."lead SET comment='".$lead_comment."',name='".$lead_name."',project='".$lead_project."',tel='".$lead_tel."',email='".$lead_email."' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadStatus);
                echo "$lead_id./.$sql_lead_leadStatus";
            }
            if ($userStat == "lead_edit" && !empty($_POST["lead_id"]) && $_POST["lead_type"] == "lead_block") {
                $lead_id = $_POST["lead_id"];
                $lead_manager = $_POST["lead_manager"];
                $lead_comment = $_POST["lead_comment"];
                $lead_name = $_POST["lead_name"];
                $lead_project = $_POST["lead_project"];
                $lead_projectName = $_POST["lead_projectName"];
                $lead_tel = $_POST["lead_tel"];
                $lead_email = $_POST["lead_email"];
                $sql_lead_leadEdit = "UPDATE ".$TerranPrefix."lead SET comment='".$lead_comment."',name='".$lead_name."',project='".$lead_project."',tel='".$lead_tel."',email='".$lead_email."',manager='".$lead_manager."',project_name='".$lead_projectName."' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadEdit);
                echo $result_lead;
            }
            if ($userStat == "lead_return" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $lead_leadStatus = $_POST["lead_leadStatus"];
                $sql_lead_leadStatus = "UPDATE ".$TerranPrefix."lead SET leadstatus='".$lead_leadStatus."' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadStatus);
                echo $result_lead;
            }
            if ($userStat == "lead_delete" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $sql_lead_leadDelete = "DELETE FROM ".$TerranPrefix."lead WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadDelete);
                echo 'ok';
            }
            if ($userStat == "lead_callBack" && !empty($_POST["lead_id"])) {
                $lead_id = $_POST["lead_id"];
                $lead_statusCall = $_POST["lead_statusCall"];
                $lead_dateCall = $_POST["lead_dateCall"];
                $sql_lead_leadRecall = "UPDATE ".$TerranPrefix."lead SET status='".$lead_statusCall."',dateCall='".$lead_dateCall. "' WHERE id='{$lead_id}'";
                $result_lead = mysqli_query($link, $sql_lead_leadRecall);
                echo $lead_id ."/". $lead_statusCall."/". $lead_dateCall;

            }

        }
        // статус для кнопок
        if ($userStat == "statusNow") {
            echo json_encode($ArrUserClock, JSON_FORCE_OBJECT);
        }
        // статусы для заголовка будильника
        if ($userStat == "startday" || $userStat == "continue-work") {
            echo "startday";
        }
        if ($userStat == "dinner") {
            echo "dinner";
        }
        if ($userStat == "endday") {
            echo "endday";
        }
    }
	if($cofigius['0']['usrcanlang'] == "yes"){
		 if($userSessionLang == null){
			include $DR . "/language/" . $lang . ".php";
			if (file_exists($installDir)) {
				$alert = '<div class="container-fluid"><div class="alert alert-danger">
					  <strong>' . $lang['danger'] . '!</strong> ' . $lang['installdir'] . '
					  </div></div>';
			}
		 }
		 if($userSessionLang != null){
				include $DR . "/language/" . $userSessionLang . ".php";
		 }
	}
	if($cofigius['0']['usrcanlang'] == "no"){
		include $DR . "/language/" . $lang . ".php";
		if (file_exists($installDir)) {
			$alert = '<div class="container-fluid"><div class="alert alert-danger">
				  <strong>' . $lang['danger'] . '!</strong> ' . $lang['installdir'] . '
				  </div></div>';
		}
	}
$usersavatar = str_replace("panel", "asted",$usersavatar);

if($usersavatar == null){
    $userAvatar = $astedADM.'templates/object/content/ava.png';
}else{
    $userAvatar = '/asted/uploads/users/'.$userID.'/avatar/'.$usersavatar.'';
	/*
if (file_exists($getUsrAvatarCheck)) {
        $fileAvaItsTrue = "true";
        $userAvatar = $astedADM.'uploads/users/'.$userID.'/avatar/'.$usersavatar.'';
	} else {
        $fileAvaItsTrue = "false";
        $userAvatar = $astedADM.'templates/object/content/avanofile.png';
	}
*/
}


    $sql_useronline = "UPDATE `".$TerranPrefix."users` SET `online`=$timeNowUNIXFormat WHERE `id`=$userID";
    $result_useronline = mysqli_query($link, $sql_useronline);
    if (empty($usersRegData)) {
        $sql_userregdate = "UPDATE `".$TerranPrefix."users` SET `regdate`=$timeNowUNIXFormat WHERE `id`=$userID";
        $result_userregdate = mysqli_query($link, $sql_userregdate);
        mkdir($DR . '/uploads/users/' . $userID, 0777, true);
        mkdir($DR . '/uploads/users/' . $userID . '/avatar/', 0777, true);
        //include $DR . "/templates/object/firstauth.php";
    }
} else {

    if($urlsGlobal['1'] != null){
        header('Location: /'.$urlsGlobal['1'].'/install/index.php');
}else{
    header('Location: /install/index.php');
    }

}

//include $RealPath . "/core/modules.php";
if($cofigius['0']['error'] == "false"){
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
}
// Проверяем установлен ли массив файлов и массив с переданными данными
if (isset($_FILES) && isset($_FILES['image'])) {

//Переданный массив сохраняем в переменной
    $image = $_FILES['image'];

// Проверяем размер файла и если он превышает заданный размер
// завершаем выполнение скрипта и выводим ошибку
    // if ($image['size'] > $cofigius['0']['avauploadsiza']) {
    //     die('error');
    // }

// Достаем формат изображения
    $imageFormat = explode('.', $image['name']);
    $imageFormat = $imageFormat[1];

// Генерируем новое имя для изображения. Можно сохранить и со старым
// но это не рекомендуется делать
    $imageFullName = '../uploads/users/' . $userID . '/avatar/' . hash('crc32', time()) . '.' . $imageFormat;
    $imageDBCrm = hash('crc32', time()) . '.' . $imageFormat;
// Сохраняем тип изображения в переменную
    $imageType = $image['type'];

// Сверяем доступные форматы изображений, если изображение соответствует,
// копируем изображение в папку images
    if ($imageType == 'image/jpeg' || $imageType == 'image/png') {
        if (move_uploaded_file($image['tmp_name'], $imageFullName)) {
            $sqlUloadAva = "UPDATE ".$TerranPrefix."users SET avatar='" . $imageDBCrm . "' WHERE id='{$userID}'";
            $resultUloadAva = mysqli_query($link, $sqlUloadAva);

            echo($_SESSION['userid']);
        } else {
            // echo 'error';
        }
    }
}
?>