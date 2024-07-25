<? include "templates/header.php"; 

$id = $_GET['id'];

$sql_taskcom = "SELECT * FROM `".$TerranPrefix."commenttask` WHERE totask ='".$_GET['id']."'";
$result_taskcom = mysqli_query($link, $sql_taskcom);


if ($_POST['totrashtask'] == 'totrashtask') {
    $task = R::load($TerranPrefix . 'task', $id);
    $task->task_status = 13;
    R::store($task);
}

if (is_numeric($_GET['id'])) {
    if(isset($_GET['id'])){
        $crmusrdefend = true;
    }
}

$task = R::load($TerranPrefix . 'task', $id);
if ($task->id) {
    $taskCreat = $task->task_datacreat;
    $taskCompletion = $task->task_datacompletion;
    $taskAutor  = $task->task_autor;
    $taskExecutor  = $task->task_executor;
    $taskText = $task->task_text;
    $taskName = $task->task_name;
    $taskTogroup = $task->task_togroup;
    $taskStatus = $task->task_status;
    $taskTag = $task->task_tegs;
    $taskWarning = $task->task_warning;
    $taskgroup = R::load($TerranPrefix . 'group', $taskTogroup);
    if ($taskgroup->id == $taskTogroup) {
        $taskgroupname = $taskgroup->group_title;
    }
}
$taskFiles = R::findAll('crm_task_files', 'task = ? ORDER BY id DESC LIMIT 5', [$_GET['id']]);
$taskFilesAll = R::findAll('crm_task_files', 'task = ?', [$_GET['id']]);
switch ($taskStatus) {
    case 0:
        $statuttask = "Открыта";
        $statustaskstule = "task_status__open";
        break;
    case 1:
        $statuttask = "Закрыта";
        $statustaskstule = "task_status__clouse";
        break;
    case 13:
        $statuttask = "В корзине";
        $statustaskstule = "task_status__clouse";
        break;
    default:
        $statuttask = "Неизвестный статус";
        $statustaskstule = "task_status__open";
}

		if ($_POST['submit'] == 'commentadd') {
			//echo $_POST['comment'];
	$gettaskid = $_GET['id'];
	$commenttonews = $_POST['comment'];
	$sql = "INSERT INTO `".$TerranPrefix."commenttask` (who, totask, comment, data) VALUES ('{$userID}','{$gettaskid}', '{$commenttonews}', NOW())";
	$result = mysqli_query($link, $sql);
	echo '<meta http-equiv="refresh" content="0;URL=/asted/task/'.$gettaskid.'/0513/" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '0513'){?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	Asted: <?=$lang['comment_added_successfully']?>
	</div></div>
<?}}}?>
<link href="<?= $astedADM ?>templates/css/icons.css" rel="stylesheet">
<script>
$(document).ready(function() {

$(".taskcloused").click(function () {
	
    jQuery.ajax({
        type: "POST",
        url: "/asted/core/core.php",
        data: {
            "taskcloused":`${$(".taskcloused").val()}`
        },
        success: function(response) {
			var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = '/asted/task/<?=$_GET['id']?>/';
                }
                else
                {
					location.href = '/asted/task/<?=$_GET['id']?>/';
                    //alert('TerranCRM: Что-то пошло не так!');
                }
        }
    });
});

$(".taskopened").click(function () {
	
    jQuery.ajax({
        type: "POST",
        url: "/asted/core/core.php",
        data: {
            "taskopened":`${$(".taskopened").val()}`
        },
        success: function(response) {
			var jsonData = JSON.parse(response);
                if (jsonData.success == "1")
                {
                    location.href = '/asted/task/<?=$_GET['id']?>/';
                }
                else
                {
					location.href = '/asted/task/<?=$_GET['id']?>/';
                    //alert('TerranCRM: Что-то пошло не так!');
                }
        }
    });
})


});
</script>

<?php
$taskWho = R::load('crm_users', $taskAutor);
$taskTo = R::load('crm_users', $taskExecutor);
?>
    <!-- Детальная страница -->
    <div class="container-fluid">
<style>
    .avatar-xs {
    height: 2rem;
    width: 2rem;
    margin-right: 10px;
}
.rounded {
    border-radius: 0.25rem!important;
}
.bg-light {
    --vz-bg-opacity: 1;
    background-color: rgba(243,246,249,1)!important;
}
.fs-24 {
    font-size: 24px!important;
}
.avatar-title {
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background-color: #405189;
    color: #fff;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    font-weight: 500;
    height: 100%;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    width: 100%;
}
.avatar-sm {
    height: 3rem;
    width: 3rem;
}
.me-3 {
    margin-right: 1rem!important;
}
.rounded-circle {
    border-radius: 50%!important;
}
.card {
    margin-bottom: 1.5rem;
}
.text-start {
    text-align: left!important;
}
.fw-semibold {
    font-weight: 600!important;
}
.ps-3 {
    padding-left: 1rem!important;
}
.gap-2 {
    gap: 0.5rem!important;
}
.bg-info-subtle {
    background-color: #1f3eae !important;
}
.text-info {
    color: #d3f9ff!important;
}
.btn-soft-danger {
    color: #f06548;
    background-color:  #fde8e4;
    --vz-btn-color: #f06548;
    --vz-btn-bg: #fde8e4;
    --vz-btn-border-color: transparent;
    --vz-btn-hover-bg: #f06548;
    --vz-btn-hover-border-color: transparent;
    --vz-btn-focus-shadow-rgb: 240,101,72;
    --vz-btn-active-bg: #f06548;
    --vz-btn-active-border-color: transparent;
}
.vstack {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    -ms-flex-item-align: stretch;
    align-self: stretch;
}
.asted-task-alltime{
    font-size: 12px;
}
.nav-tabs-custom .nav-item .nav-link.active {
    color: #405189;
}
.nav-tabs-custom.card-header-tabs .nav-link {
    padding: 1rem 1rem;
}
.nav-tabs-custom .nav-item .nav-link {
    border: none;
    font-weight: 500;
}
.card-header {
    padding: 1rem 1rem;
    margin-bottom: 0;
    border-bottom: 1px solid #e9ebec;
}
    </style>
    <form action="" style="display:none" method="post">
		<input type="submit" name="totrashtask" style="display:none" value="totrashtask" name="deletenews" id="totrashtask"> 
		</form>
    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <h6 class="card-title mb-3 flex-grow-1 text-start">Трекер времени</h6>
                                    <div class="mb-2">
                                        <lord-icon src="https://cdn.lordicon.com/kbtmbyzy.json" id="asted-animetimer" trigger="stop" colors="primary:#405189,secondary:#02a8b5" style="width:90px;height:90px"></lord-icon>
                                    </div>
                                    <h3 class="mb-1" id="asted-globaltimer">0 ч 0 мин 0 сек</h3>
                                    <h6 class="asted-task-alltime mb-4">Трекер времнни потраченого на задачу</h6>
                                    <div class="hstack gap-2 justify-content-center">
                                        <button class="btn btn-danger btn-sm" id="asted-stoptasktimer"><i class="ri-stop-circle-line align-bottom me-1"></i> Стоп</button>
                                        <button class="btn btn-success btn-sm" id="asted-starttasktimer"><i class="ri-play-circle-line align-bottom me-1"></i> Старт</button>
                                    </div>
                                </div>
                            </div>

                            <!--end card-->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="mb-4">
                                      

                                
                                </div>
                                    <div class="table-card">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-medium">ID Задачи</td>
                                                    <td>#<?=$id?></td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Задача</td>
                                                    <td><?=$taskName;?></td>
                                                </tr>
                                                <?php if($cofigius['0']['grouptitletotask'] == "on"){?>
                                                <tr>
                                                    <td class="fw-medium">Проект</td>
                                                    <td><?=$taskgroupname;?></td>
                                                </tr>
                                                <?}?>
                                                <tr>
                                                    <td class="fw-medium">Приоритет</td>
                                                    <?php
                                                    switch ($taskWarning) {
                                                        case 1:
                                                            echo '<td><span class="badge bg-danger-subtle text-success">Низкий</span></td>';
                                                            break;
                                                        case 2:
                                                            echo '<td><span class="badge bg-danger-subtle text-warning">Нормальный</span></td>';
                                                            break;
                                                        case 3:
                                                            echo '<td><span class="badge bg-danger-subtle text-danger">Высокий</span></td>';
                                                            break;
                                                        default:
                                                            echo '<td><span class="badge bg-danger-subtle text-warning">Не установлен</span></td>';
                                                    }
                                                    ?>

                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Статус</td>
                                                    <td>
                                                    <span class="<?=$statustaskstule?>" style="padding: 0 10px 0 10px;border-radius: 10px;"> <?=$statuttask?> </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                <td class="fw-medium">Управление</td>
                                                    <td>    
    <i class="fas fa-fw fa-trash-alt"  onclick="javascript:document.getElementById('totrashtask').click();"  style="cursor: pointer;margin-top: 3px;margin-left: 20px;"></i><a href="/asted/task-edit/<?=$_GET['id']?>/">
    <i class="fas fa-fw fa-edit" style="margin-top: 3px;margin-left: 20px;"></i></a></td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Создана</td>
                                                    <td>
                                                    <?php
                                $restt = substr($taskCreat, 0, 10);
                                echo date('d.m.Y', strtotime($restt));
                                ?></td>
                                                    
                                
                                                </tr>
                                                <tr>
                                                    <td class="fw-medium">Cрок до</td>
                                                    <td>
                                <?php
                                $rest = substr($taskCompletion, 0, 10);
                                echo $rest;
                                ?></td>
                                                    
                                
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!--end table-->
                                    </div>
                                </div>
                            </div>

                             <!--постановщики-->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <h6 class="card-title mb-0 flex-grow-1">Контролирующие</h6>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-danger btn-sm" data-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Добавить</button>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled vstack gap-3 mb-0">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/asted/templates/object/content/ava.png" alt="" class="avatar-xs rounded-circle">
                                                </div>

                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-1"><a href="/asted/profile/<?=$taskWho->id?>/"><?=$taskWho->name?></a></h6>
                                                    <p class="text-muted mb-0">Постановщик задачи</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="/asted/profile/<?=$taskWho->id?>/"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>Профиль</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                            <!--Участвуют -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <h6 class="card-title mb-0 flex-grow-1">Исполнители</h6>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-danger btn-sm" data-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Добавить</button>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled vstack gap-3 mb-0">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/asted/templates/object/content/ava.png" alt="" class="avatar-xs rounded-circle">
                                                </div>
                                                
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-1"><a href="/asted/profile/<?=$taskWho->id?>/"><?=$taskTo->name?></a></h6>
                                                    <p class="text-muted mb-0">Исполнитель</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="/asted/profile/<?=$taskTo->id?>/"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>Профиль</a></li>
                                                            <!-- <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favorite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                  <!--      <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/asted/templates/object/content/ava.png" alt="" class="avatar-xs rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-1"><a href="pages-profile.php">Админ Админ</a></h6>
                                                    <p class="text-muted mb-0">UI/UX Designer</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favorite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="/asted/templates/object/content/ava.png" alt="" class="avatar-xs rounded-circle">
                                                </div>
                                                <div class="flex-grow-1 ms-2">
                                                    <h6 class="mb-1"><a href="pages-profile.php">Админ Админ</a></h6>
                                                    <p class="text-muted mb-0">Web Designer</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill"></i>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favorite</a></li>
                                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!--Участвуют конец-->

                            <?php
      // Получение данных из базы данных
      
          
          if($taskFiles != null){
                            ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-3">Файлы</h5>
                                    <div class="vstack gap-2">



    <?php
    // Вывод данных
    foreach ($taskFiles as $taskFile) {
        //echo "File ID: {$taskFile->id}, File Name: {$taskFile->file}, Added by: {$taskFile->whoadd}, Date: {$taskFile->date}, File Size: {$taskFile->filesize}<br>";
   ?>
                                        <div class="border rounded border-dashed p-2">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                            <i class="ri-folder-zip-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-13 mb-1"><a href="javascript:void(0);" class="text-body text-truncate d-block"><?=$taskFile->file?></a></h5>
                                                    <div><?=$taskFile->filesize?></div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="d-flex gap-1">
                                                        <a href="/asted/uploads/<?=$taskFile->file?>" download><button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                        </a>


                                                        <!-- <div class="dropdown">
                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                             <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                            </ul> 
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                       <? } ?>

                                        <div class="mt-2 text-center">
                                            <button type="button" class="btn btn-success" data-toggle="tab" href="#messages-1" role="tab" aria-selected="false">Смотреть все</button>
                                        </div>
                                    </div>
                                </div>
                            </div><?}?>
                            <!--end card-->
                        </div>
                        <style>
.asted-task-text > p > img{
    display: block;
    width: 100% !important;
    height: auto !important;
}
                            </style>
                        <!---end col-->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-muted asted-task-text">
                                    <h5 class="m-0 font-weight-bold mb-3 pt-1" style="border-bottom: 2px dotted;padding-bottom: 5px;"><?php if($cofigius['0']['grouptitletotask'] == "on"){echo $taskgroupname.': ';}?><?=$taskName;?></h5> 
                                        <h6 class="mb-3 fw-semibold text-uppercase">Описание</h6>
                                        <p><?=$taskText;?></p>

                                        <!-- <h6 class="mb-3 fw-semibold text-uppercase">Таск лист</h6>
                                        <ul class="ps-3 list-unstyled vstack gap-2">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="productTask">
                                                    <label class="form-check-label" for="productTask">
                                                        Полный функционал задачи
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="dashboardTask" checked="">
                                                    <label class="form-check-label" for="dashboardTask">
                                                        Основные функции редактирования
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="calenderTask">
                                                    <label class="form-check-label" for="calenderTask">
                                                        Привести в нормальный вид
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="authenticationTask">
                                                    <label class="form-check-label" for="authenticationTask">
                                                        Зарелизить
                                                    </label>
                                                </div>
                                            </li>
                                        </ul> -->
                                        <?php if(!empty($taskTag)){?> 
                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Теги задачи</h6>
                                            <div class="hstack flex-wrap gap-2 fs-15">
                                            <?php
                                            $tags = explode(",", $taskTag);
                                            foreach ($tags as $tag) {
                                                echo '<div class="badge fw-medium bg-info-subtle text-info">' . $tag . '</div>' . PHP_EOL;
                                            }?>
                                                
                                            </div>
                                        </div><?}?>



                                        <div class="pt-3 border-top border-top-dashed mt-4">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Управление</h6>
                                            <div class="hstack flex-wrap gap-2 fs-15">
                                            <?php
		if($taskStatus == 1 or $taskStatus == 13){?>
		<button class="btn terranbtnadd addcommentnews col-lg-12 taskopened" value="<?=$_GET['id']?>" style="margin-top: 10px; background-color: burlywood; color: azure;"><?=$lang['resume_task']?></button>
		<?}else{?>
		<button class="btn terranbtnadd addcommentnews col-lg-12 taskcloused" value="<?=$_GET['id']?>" style="margin-top: 10px;"><?=$lang['close_task']?></button>
		<?}?>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card">
                                <div class="card-header">
                                    <div>
                                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab" aria-selected="true">
                                                    Комментарии (<span id="totalcomments">0</span>)
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab" aria-selected="false" tabindex="-1">
                                                    Добавленые файлы (<span id="totalfiles">0</span>)
                                                </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab" aria-selected="false" tabindex="-1">
                                                <?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Получаем значение 'id' из GET-данных
    $taskIdget = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Подключаемся к базе данных
    if (R::testConnection()) {
        // Выполняем запрос к таблице 'crm_task_timer'
        $recordsx = R::find('crm_task_timer', 'taskid = ?', [$taskIdget]);

        $totalTimerAstedTask = 0;
        // Печатаем результаты запроса
        foreach ($recordsx as $recordx) {


            ///********Новый таймер багфикс */
$astedTimerStart = $recordx['startdate'];
$astedTimerEnd = $recordx['enddate'];

// Преобразуем строки в формат с двузначными минутами
$startTimeArray = explode(' ', $astedTimerStart);
$endTimeArray = explode(' ', $astedTimerEnd);

// Добавляем нули к минутам, если они однозначные
list($startDate, $startTime) = $startTimeArray;
list($endDate, $endTime) = $endTimeArray;

list($startHour, $startMinute) = array_map('intval', explode(':', $startTime)) + [null, null];
list($endHour, $endMinute) = array_map('intval', explode(':', $endTime)) + [null, null];

$startTime = sprintf('%s %02d:%02d', $startDate, $startHour, $startMinute);
$endTime = sprintf('%s %02d:%02d', $endDate, $endHour, $endMinute);

// Создаем объекты DateTime
$startDateTime = new DateTime($startTime);
$endDateTime = new DateTime($endTime);

// Вычисляем разницу
$timeDifference = $startDateTime->diff($endDateTime);

// Получаем часы и минуты
$userTimerHoursTask = $timeDifference->h + ($timeDifference->days * 24);
$userTimerMinutsTask = $timeDifference->i;
//$userTimerMinutsTask = ltrim($timeDifference->i, '0');
$fixUserTimerMinutsTask = ($userTimerMinutsTask < 10 ? $userTimerMinutsTask : ltrim($userTimerMinutsTask, '0'));

$userTimerHoursTaskToSecond = $userTimerHoursTask * 3600;
$fixUserTimerMinutsTaskToSecond = $fixUserTimerMinutsTask * 60;
$totalUserTimerSecondPre = $userTimerHoursTaskToSecond + $fixUserTimerMinutsTaskToSecond;
//echo $totalUserTimerSecond;
// Получаем общее количество секунд
// $userTimerSecondsTask = $userTimerHoursTask * 3600 + $userTimerMinutsTask * 60 + $timeDifference->s;
//$userTimerSecondsTask = $timeDifference->s;
//$userTimerSecondsTask = $startDateTime->getTimestamp() - $endDateTime->getTimestamp();

//echo $userTimerSecondsTask;

// Выводим результат
//echo 'Часы: ' . $userTimerHoursTask . ', Минуты: ' . $userTimerMinutsTask;
$userTimerMinutsTask = sprintf('%d:%02d', $timeDifference->h + ($timeDifference->days * 24), $timeDifference->i);
///********Новый таймер багфикс End */

            $users = R::find('crm_users', 'id = ?', [$recordx['userid']]);
            $totalUserTimerSecond += $totalUserTimerSecondPre;
            $totalTimerAstedTask += $recordx['timer'];
            }

            $hoursTotal = floor($totalUserTimerSecond / 3600);
            $minutesTotal = floor(($totalUserTimerSecond % 3600) / 60);
            $remainingSecondsTotal = $totalTimerAstedTask % 60;
    } else {
        echo "ASTED: Error connecting to the database: " . R::getLastError();
    }
} else {
    echo "ASTED: Invalid request method";
}
?>
                                                    Общее время (<span id="totaltimer"><span id="totalhours"><?=$hoursTotal?></span> ч <span id="totalminuts"><?=$minutesTotal?></span> мин <span id="totalsecond"><?=$remainingSecondsTotal?></span> сек</span>)
                                                </a>
                                            </li>
                                        </ul>
                                        <!--end nav-->
                                    </div>
                                </div>
                                <script>
  // Получаем ссылки на кнопки и объект с таймером
  const startButton = document.getElementById('asted-starttasktimer');
  const stopButton = document.getElementById('asted-stoptasktimer');
  const timerObject = document.getElementById('asted-animetimer');
  const globalTimerElement = document.getElementById('asted-globaltimer');
  const totalTimerElement = document.getElementById('totaltimer');
  // Получаем ссылки на элементы DOM
  const totalHoursElement = document.getElementById('totalhours');
  const totalMinutesElement = document.getElementById('totalminuts');
  const totalSecondsElement = document.getElementById('totalsecond');
  // Получаем значения из элементов и преобразуем их в числа
  const totalOldHours = parseInt(totalHoursElement.textContent) * 3600; // Преобразуем часы в секунды
  const totalOldMinutes = parseInt(totalMinutesElement.textContent) * 60; // Преобразуем минуты в секунды
  const totalOldSeconds = parseInt(totalSecondsElement.textContent);

  let timerInterval;
  let seconds = 0;
  let activatetotaltimer = 0;
  let totalSeconds = 0;
  let isTimerRunning = false; // Флаг для отслеживания состояния таймера

  // Выполняем арифметические операции
  let allOldTotal = totalOldHours + totalOldMinutes + totalOldSeconds;

userNowData = new Date();
userNowHour = userNowData.getHours();
userNowMinutes = userNowData.getMinutes();
userNowSeconds = userNowData.getSeconds();

  // // Проверяем, есть ли сохраненное значение в localStorage
  let lastUpdateTime = localStorage.getItem('lastUpdateTime');
timerNowInterval = setInterval(function() {
userData = new Date();
userHour = userData.getHours();
userMinutes = userData.getMinutes();
userSeconds = userData.getSeconds();
}, 1000);

  // Проверяем, есть ли сохраненное значение в localStorage
  if (localStorage.getItem('seconds')) {
    if (lastUpdateTime) {
        let elapsedTime = Math.floor((Date.now() - lastUpdateTime) / 1000);
        let preseconds = parseInt(localStorage.getItem('seconds'));
        seconds = elapsedTime + preseconds;

        // Запускаем таймер и обновляем интерфейс
        startTimer();
    }
  }

  // Получаем значение id из $_GET
const taskId = parseInt(<?=$_GET['id']?>);

// Проверяем, сохранено ли значение id в localStorage
const storedTaskId = parseInt(localStorage.getItem('taskId'));
const startUserHour = parseInt(localStorage.getItem('startUserHour'));
const startUserMinutes = parseInt(localStorage.getItem('startUserMinutes'));
// alert(taskId);
// alert(storedTaskId);
// Проверяем, если id не совпадает, то взаимодействие с таймером запрещено
if (storedTaskId === taskId || isNaN(storedTaskId)) {
      // Обработчик события для кнопки "Start Timer"
  startButton.addEventListener('click', function() {
    if (!isTimerRunning) { // Проверяем, не запущен ли уже таймер
      startTimer();
    } else {
      // Показываем оповещение, что таймер уже запущен
      alert('Таймер уже запущен. Дождитесь его завершения или нажмите "Stop Timer".');
   }
  });

  // Обработчик события для кнопки "Stop Timer"
  stopButton.addEventListener('click', function() {
    if (isTimerRunning) {
      stopTimer();

      // Очищаем localStorage
      localStorage.removeItem('seconds');
      localStorage.removeItem('lastUpdateTime');
      localStorage.removeItem('taskId');
      localStorage.removeItem('startUserHour');
      localStorage.removeItem('startUserMinutes');
    }
  });
}else{
  // Выводим сообщение о том, что нужно остановить таймер в другой задаче
  stopButton.addEventListener('click', function() {
    alert('Сначала остановите таймер в другой задаче.');
    // alert(taskId);
    // alert(storedTaskId);
  });

  // Выводим сообщение о том, что таймер уже запущен в другой задаче
  startButton.addEventListener('click', function() {
    alert('У вас уже запущен таймер в другой задаче.');
    // alert(taskId);
    // alert(storedTaskId);
  });
}


  function startTimer() {
    // Добавляем атрибут trigger со значением "loop" к объекту
    timerObject.setAttribute('trigger', 'loop');

    //Запускаем таймер и обновляем текст элемента h3 каждую секунду
    if (activatetotaltimer === 0) {
      if (allOldTotal !== null) {
        activatetotaltimer = 1;
        if (!isNaN(parseInt(localStorage.getItem('seconds')))) {
        totalSeconds = allOldTotal + parseInt(localStorage.getItem('seconds')); // Добавляем переменную для общего времени
        }else{
            totalSeconds = allOldTotal;
        }
      }
    }
    timerInterval = setInterval(function() {
      seconds++;
      totalSeconds++;

      const hours = Math.floor(seconds / 3600);
      const minutes = Math.floor((seconds % 3600) / 60);
      const remainingSeconds = seconds % 60;

      const hourstotal = Math.floor(totalSeconds / 3600);
      const minutestotal = Math.floor((totalSeconds % 3600) / 60);
      const remainingSecondstotal = totalSeconds % 60;

      if (storedTaskId === taskId || isNaN(storedTaskId)){
      globalTimerElement.textContent = `${hours} ч ${minutes} мин ${remainingSeconds} сек`;
      totalTimerElement.innerHTML = `<span id="totalhours">${hourstotal}</span> ч <span id="totalminuts">${minutestotal}</span> мин <span id="totalsecond">${remainingSecondstotal}</span> сек`;
    }else{
        globalTimerElement.innerHTML = `Запущена другая <a href="/asted/task/${storedTaskId}/">задача</a>`;
    }
      // Сохраняем текущее значение таймера в localStorage
      localStorage.setItem('seconds', seconds);
      if (isNaN(parseInt(localStorage.getItem('taskId')))) {
      // Дата старта
      localStorage.setItem('startUserHour', userNowHour);
      localStorage.setItem('startUserMinutes', userNowMinutes);
      // Сохраняем текущее значение id в localStorage
      localStorage.setItem('taskId', taskId);
      }
        
      // Обновляем время последнего обновления
      localStorage.setItem('lastUpdateTime', Date.now().toString());
    }, 1000);

    isTimerRunning = true; // Устанавливаем флаг, что таймер запущен
  }

  function stopTimer() {
    // Добавляем атрибут trigger со значением "stop" к объекту
    timerObject.setAttribute('trigger', 'stop');
    globalTimerElement.textContent = `0 ч 0 мин 0 сек`;
    // Отправляем данные на сервер
    var xhr = new XMLHttpRequest();
    var url = '/asted/components/asted.task/tasks-timer.php'; // Отправка на адрес нашего PHP-скрипта
    var taskId = <?=$_GET['id']?>;
    var userId = <?=$userID?>;
    var params = 'seconds=' + seconds + '&taskId=' + taskId + '&userId=' + userId + '&userHour=' + userHour  + '&userMinutes=' + userMinutes  + '&startUserMinutes=' + parseInt(localStorage.getItem('startUserMinutes')) + '&startUserHour=' + parseInt(localStorage.getItem('startUserHour'));

    xhr.open('POST', url, true);

    // Отправляем заголовки HTTP для POST-запроса
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        // Добавьте код обработки ответа, если это необходимо
        console.log(xhr.responseText);
      }
    }

    // Отправляем запрос с данными
    xhr.send(params);

    seconds = 0;
    isTimerRunning = false; // Сбрасываем флаг, что таймер завершен

    // Останавливаем таймер
    clearInterval(timerInterval);
  }
</script>

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home-1" role="tabpanel">
                                                        <!-- начало добавление файлов -->
                                                        <h5 class="card-title mb-4">Добавление файлов</h5>
                                    <div id="file-upload-container">
        <input type="file" id="file-input" multiple>
        <div id="drop-area">
            <p>Перетащите файлы сюда или нажмите для выбора</p>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const dropArea = document.getElementById("drop-area");
    const dropAreaText = dropArea.querySelector('p');
    const fileInput = document.getElementById('file-input');
    let dropAreaActive = false;

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropArea.classList.add('drag');
    }

    function unhighlight() {
        dropArea.classList.remove('drag');
    }

    function handleFiles(files) {
        files = [...files];
        files.forEach(uploadFile);
    }

    function uploadFile(file) {
        const formData = new FormData();
        formData.append('file', file);

        const userId = <?=$userID?>;
        const taskId = <?=$_GET['id']?>;

        fetch(`/asted/components/asted.task/tasks-file.php?id=${encodeURIComponent(taskId)}&userId=${encodeURIComponent(userId)}`, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log('File uploaded:', data);
            alert("Asted System: Файл успешно загружен!");
            dropAreaText.textContent = "Перетащите файлы сюда или нажмите для выбора";
        })
        .catch(error => {
            console.error('Error uploading file:', error);
        });
    }

    dropArea.addEventListener('drop', function (e) {
        preventDefaults(e);

        const dt = e.dataTransfer;
        const files = dt.files;

        handleFiles(files);

        // Обновляем текст в drop-area при drop
        dropAreaText.textContent = files.length > 0 ? files[0].name : "Перетащите файлы сюда или нажмите для выбора";
    }, false);

    dropArea.addEventListener('click', function () {
        fileInput.click();
    });

    fileInput.addEventListener('change', function () {
        handleFiles(this.files);

        // Обновляем текст в drop-area при выборе файла
        dropAreaText.textContent = this.files.length > 0 ? this.files[0].name : "Перетащите файлы сюда или нажмите для выбора";
    });

    window.uploadFiles = function () {
        const files = fileInput.files;
        dropAreaText.textContent = "Перетащите файлы сюда или нажмите для выбора";

        handleFiles(files);
    };

    document.getElementById('upload-button').addEventListener('focus', function () {
        dropAreaActive = false;
    });

    document.getElementById('upload-button').addEventListener('blur', function () {
        dropAreaActive = true;
    });
});




    </script>


                        <!-- конец добавление файлов -->


                                        <h5 class="card-title mb-4">Комментарии</h5>
                                        <?
while ($taskcoms = mysqli_fetch_assoc($result_taskcom)) {$who = "{$taskcoms['who']}";$commentss = "{$taskcoms['comment']}";$datass = "{$taskcoms['data']}"; 
	?>
	<?php
	$sqluser = "SELECT * FROM `".$TerranPrefix."users` WHERE `id` = " . $who . "; ";
    $resultuser = mysqli_query($link, $sqluser);?>
                                            

                                         

    <?php
    while ($itsuser = mysqli_fetch_assoc($resultuser)) {
		$itsUserName = "{$itsuser['name']}";
        $itsUserSurName = "{$itsuser['surname']}";
        $itsUserEmail = "{$itsuser['email']}";
        $itsUserAvatar = "{$itsuser['avatar']}";
	}
	?>
				            <div class="col-lg-12 mb-4 asted-comment">
                <div class="card shadow mb-4 pl-4 pt-4 pb-3" style="padding-top: 10px;padding-left: 10px;">
										
              <div class="d-flex flex-start align-items-center mb-2">
                <a href="/asted/profile/<?=$who?>/">
              <?php if(!empty($itsUserAvatar)){?>
                     <img class="rounded-circle shadow-1-strong me-3 mr-3" src="/asted/uploads/users/<?=$who?>/avatar/<?=$itsUserAvatar?>"" alt="<?=$itsUserName?>" width="60" height="60">
                                       <? }else{?>
                                            <img class="rounded-circle shadow-1-strong me-3" src="/asted/templates/img/person.png" alt="<?=$itsUserName?>" width="60" height="60">
                                       <?}?>
                                       </a>
                <div>
                <a href="/asted/profile/<?=$who?>/"><h6 class="fw-bold text-primary mb-1"><?=$itsUserName?> <?=$itsUserSurName?></h6> </a>
                  <p class="text-muted small mb-0">
                    Написал - <img src="/asted/templates/img/event.png" style="width: 8px;margin-top: -4px;"> <?=$datass?>
                  </p>
                </div>
              </div>
				<?=$commentss?>
				</div>
        </div>
<?}?>		
				

                                            <form class="mt-4" action="" class="showcomment" method="post">
                                                <div class="row g-3">


                                                <div class="col-12">
				<textarea class="astededitor" name="comment" id="comment" rows="10" cols="80">
										<?=$lang['enter_something']?>
									</textarea>

                                    <style>
                                        #file-upload-container {
    text-align: center;
    margin: 20px;
}

#file-input {
    display: none;
}

#drop-area {
    border: 2px dashed #ccc;
    padding: 20px;
    cursor: pointer;
}

#drop-area p {
    margin: 0;
}

#drop-area.drag {
    border-color: #00f;
}
                                    </style>
                                           </div>
                                        
                                        <input type="text" name="commetid" style="display:none" value="<?=$_GET['id']?>" name="commetid" id="<?=$_GET['id']?>"	class="btn btn-primary btn-user btn-block"/>						
                                            <input type="submit" name="submit" style="display:none" value="commentadd" name="commentadd" id="id<?=$_GET['id']?>"
                                                           class="btn terranbtnadd	 btn-user btn-block"/>
                                                           <div class="col-12 text-center">
                                                            <button type="button" onclick="javascript:document.getElementById('id<?=$_GET['id']?>').click();" class="btn btn-ghost-secondary btn-icon waves-effect me-1"><a href="javascript:void(0);" class="btn btn-success">Опубликовать</a></button>
                                                            </div>
                        
                <!--
                                                                    <div class="col-lg-12">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Оставьте комментарий</label>
                                                                        <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3" placeholder="Текст"></textarea>
                                                                    </div>
                                                                                                     
                                                                    <div class="col-12 text-end">
                                                                        <button type="button" class="btn btn-ghost-secondary btn-icon waves-effect me-1"><i class="ri-attachment-line fs-16"></i></button>
                                                                        <a href="javascript:void(0);" class="btn btn-success">Опубликовать</a>
                                                                    </div>
                   --> 
                                                                </div>
                                                                <!--end row-->
                                                            </form>
                                                        </div>
                                        <!--end tab-pane-->
                                        <div class="tab-pane" id="messages-1" role="tabpanel">
                                            <div class="table-responsive table-card">
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-light text-muted">
                                                        <tr>
                                                            <th scope="col">Имя файла</th>
                                                            <th scope="col">Кто добавил</th>
                                                            <th scope="col">Размер</th>
                                                            <th scope="col">Дата добавления</th>
                                                            <!-- <th scope="col">Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
    // Вывод данных
    foreach ($taskFilesAll as $taskFile) {
        //echo "File ID: {$taskFile->id}, File Name: {$taskFile->file}, Added by: {$taskFile->whoadd}, Date: {$taskFile->date}, File Size: {$taskFile->filesize}<br>";
   ?>
                                                        <tr class="asted-files">
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-primary-subtle text-primary rounded fs-20">
                                                                            <i class="ri-file-zip-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="ms-3 ml-3 flex-grow-1">
                                                                        <h6 class="fs-15 mb-0"><a href="/asted/uploads/<?=$taskFile->file?>" download><?=$taskFile->file?></a></h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>UserID <?=$taskFile->whoadd?></td>
                                                            <td><?=$taskFile->filesize?></td>
                                                            <td><?=$taskFile->date?></td>
                                                            <!-- <td>
                                                                <div class="dropdown">
                                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon" id="dropdownMenuLink1" data-toggle="dropdown" aria-expanded="true">
                                                                        <i class="ri-equalizer-fill"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink1" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 23px);">
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-middle text-muted"></i>View</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-middle text-muted"></i>Download</a></li>
                                                                        <li class="dropdown-divider"></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td> -->
                                                        </tr>
                                                <?}?>   
                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </div>
                                        </div>
                                        <!--end tab-pane-->
                                        <div class="tab-pane" id="profile-1" role="tabpanel">
                                            <!-- <h6 class="card-title mb-4 pb-2">Time Entries</h6> -->
                                            <div class="table-responsive table-card">
                                                <table class="table align-middle mb-0">
                                                    <thead class="table-light text-muted">
                                                        <tr>
                                                            <th scope="col">Исполнитель</th>
                                                            <th scope="col">Время начала</th>
                                                            <th scope="col">Время окончания</th>
                                                            <th scope="col">Затраченое время</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Получаем значение 'id' из GET-данных
    $taskIdget = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Подключаемся к базе данных
    if (R::testConnection()) {
        // Выполняем запрос к таблице 'crm_task_timer'
        $records = R::find('crm_task_timer', 'taskid = ?', [$taskIdget]);

        
        // Печатаем результаты запроса
        foreach ($records as $record) {

            $users = R::find('crm_users', 'id = ?', [$record['userid']]);
            $hours = floor($record['timer'] / 3600);
            $minutes = floor(($record['timer'] % 3600) / 60);
            $remainingSeconds = $record['timer'] % 60;

$astedTimerStart = $record['startdate'];
$astedTimerEnd = $record['enddate'];

// Преобразуем строки в формат с двузначными минутами
$startTimeArray = explode(' ', $astedTimerStart);
$endTimeArray = explode(' ', $astedTimerEnd);

// Добавляем нули к минутам, если они однозначные
list($startDate, $startTime) = $startTimeArray;
list($endDate, $endTime) = $endTimeArray;

list($startHour, $startMinute) = array_map('intval', explode(':', $startTime)) + [null, null];
list($endHour, $endMinute) = array_map('intval', explode(':', $endTime)) + [null, null];

$startTime = sprintf('%s %02d:%02d', $startDate, $startHour, $startMinute);
$endTime = sprintf('%s %02d:%02d', $endDate, $endHour, $endMinute);

// Создаем объекты DateTime
$startDateTime = new DateTime($startTime);
$endDateTime = new DateTime($endTime);

// Вычисляем разницу
$timeDifference = $startDateTime->diff($endDateTime);

// Получаем часы и минуты
$userTimerHoursTask = $timeDifference->h + ($timeDifference->days * 24);
$userTimerMinutsTask = $timeDifference->i;
//$userTimerMinutsTask = ltrim($timeDifference->i, '0');
$fixUserTimerMinutsTask = ($userTimerMinutsTask < 10 ? $userTimerMinutsTask : ltrim($userTimerMinutsTask, '0'));

// Выводим результат
//echo 'Часы: ' . $userTimerHoursTask . ', Минуты: ' . $userTimerMinutsTask;
$userTimerMinutsTask = sprintf('%d:%02d', $timeDifference->h + ($timeDifference->days * 24), $timeDifference->i);


?>   
                                                                    <tr>
                                                            <th scope="row">
                                                                <div class="d-flex align-items-center">
                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xxs">
                                                                    <div class="flex-grow-1 ms-2">
                                                                    <?php             foreach ($users as $user) {
                                                                       echo' <a href="/asted/profile/'.$user['id'].'/" class="fw-medium">';
               echo $user['name'];
               echo ' ';
               echo $user['surname'];
            }
            ?></a>
                                                                    </div>
                                                                </div>
                                                            </th>
                                                            <td><?=$record['startdate']?></td>
                                                            <td><?=$record['enddate']?></td>
                                                            <td><?=$userTimerHoursTask?>ч <?=$fixUserTimerMinutsTask?>мин <?=$remainingSeconds?>сек</td>
                                                          
                                                        </tr>


     <?php
                 // Ваши действия с каждой записью
            // echo "userid: " . $record['userid'] . "<br>";
            // echo "startdate: " . $record['startdate'] . "<br>";
            // echo "timer: " . $record['timer'] . "<br>";
            // echo "Hours: " . $hours . "<br>";
            // echo "Minutes: " . $minutes . "<br>";
            // echo "Seconds: " . $remainingSeconds;
            // Добавьте другие поля по мере необходимости
            // echo "<br>";
    
    }
    } else {
        echo "ASTED: Error connecting to the database: " . R::getLastError();
    }
} else {
    echo "ASTED: Invalid request method";
}
?>

                                                    </tbody>
                                                </table>
                                                <!--end table-->
                                            </div>
                                        </div>
                                        <!--edn tab-pane-->

                                    </div>
                                    <!--end tab-content-->
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!--end col-->
                    </div>



<script>
    // tinymce.init({
    //     selector: '#comment'
    // });	  
    $('.astededitor').each(function() {
                CKEDITOR.replace(this, {
                    extraPlugins: 'uploadimage',
                    extraAllowedContent: '*[*]{*}(*)'
                });
                CKEDITOR.dtd.$removeEmpty.span = false
                CKEDITOR.dtd.$removeEmpty.i = false
                CKEDITOR.config.height = '300px';
            });

    // Функция для подсчета и обновления количества элементов с классом "asted-comment"
    function updateCommentCount() {
        // Находим все элементы с классом "asted-comment"
        var commentElements = document.querySelectorAll('.asted-comment');
        
        // Получаем общее количество элементов
        var totalComments = commentElements.length;

        // Обновляем значение в элементе с id "totalcomments"
        document.getElementById('totalcomments').textContent = totalComments.toString();
    }
    function updateFilesCount() {
        // Находим все элементы с классом "asted-comment"
        var commentElements = document.querySelectorAll('.asted-files');
        
        // Получаем общее количество элементов
        var totalComments = commentElements.length;

        // Обновляем значение в элементе с id "totalcomments"
        document.getElementById('totalfiles').textContent = totalComments.toString();
    }
    // Вызываем функцию при загрузке страницы
    window.onload = function() {
        updateCommentCount();
        updateFilesCount();
    };
</script>
				
			
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>
<script src="<?= $astedADM ?>templates/js/lord-icon-2.1.0.js"></script>