<? include "templates/header.php";
if($userTaskType == "list"){
	        $sqlupdatetask = "UPDATE crm_users SET task_type='construct' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if($userTaskType == "table"){
	        $sqlupdatetask = "UPDATE crm_users SET task_type='construct' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if($userTaskType == null){
		    $sqlupdatetask = "UPDATE crm_users SET task_type='construct' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
?>
<style>
.card-body > p > img {
    display: block;
    width: 100% !important;
    max-width: 100% !important;
    height: auto !important;
}
</style>
    <!-- Begin Page Content -->
    <div class="container-fluid tasks">
        <!-- ASTED: новый формат управления задачами -->
<div class="row">
    <div class="col-md-8">
    <h1 class="h3 mb-0 text-gray-800"><?=$lang['tasks']?></h1>
    </div>
<div class="col-md-4">
    <div style="
    background-color: #302e2e;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 4px;
    text-align: center;
">
<div>Управление отображением</div>
<a href="/asted/tasks-list/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2" ><i class="fas fa-list fa-sm text-white-50"></i> <?=$lang['task_list']?></a>
			<a href="/asted/tasks-table/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2"><i class="fas fa-list fa-sm text-white-50"></i> <?=$lang['task_table']?></a>
            <a href="/asted/tasks-trash/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2"><i class="fas fa-list fa-sm text-white-50"></i> <?= $lang['deleted_tasks'] ?></a>
            <a href="#" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['create_task']?></a>
</div>
        </div>    
</div>
<!-- ASTED: новый формат управления задачами END -->
<?include "core/section/addtask.php";?>

        <!-- Content Row -->
        <div class="row">
            <!--<div class="col tasks-column">
                <div class="card tasks-column-title bg-primary mb-3">
                    <div class="card-body pb-2 pt-2 pl-3 text-secondary">
                        <h5 class="modal-title card-text text-white tasks-title">Не запланировано</h5>
                        <div class="input-group tasks-title-edit">
                            <input type="text" class="form-control tasks-title-value" aria-label="Text input with dropdown button" value="Нее запланировано">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item tasks-title-edit-save" >Сохранить</a>
                                    <a class="dropdown-item tasks-title-edit-cancel" >Отмена</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-md-6 tasks-column">
                <div class="card mb-3 tasks-column-title bg-success">
                    <div class="card-body pb-2 pt-2 pl-3 text-secondary">
                        <h5 class="modal-title card-text text-white tasks-title"><?=$lang['in_work']?></h5>
                        <div class="input-group tasks-title-edit">
                            <input type="text" class="form-control tasks-title-value" aria-label="Text input with dropdown button" value="Нее запланировано">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item tasks-title-edit-save" ><?=$lang['save']?></a>
                                    <a class="dropdown-item tasks-title-edit-cancel" ><?=$lang['canceling']?></a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item tasks-title-edit-delete" ><?=$lang['delete_column']?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
<?include "core/section/notask.php";?>	
				
				<?while ($task = mysqli_fetch_assoc($result_task)) {$title = "{$task['task_name']}";$idtotask = "{$task['task_togroup']}";
				$taskAutor = "{$task['task_autor']}"; $taskDataCreate = "{$task['task_datacreat']}"; $taskdataCompletion = "{$task['task_datacompletion']}";
				$taskexecutor = "{$task['task_executor']}";$taskStatus = "{$task['task_status']}";$id = "{$task['id']}";
                $textPre = "{$task['task_text']}";
                $textPreFirstImgURL = str_replace("../core/../uploads/", "/asted/uploads/", $textPre);
                $text = str_replace("../../uploads/", "/asted/uploads/", $textPreFirstImgURL);
		$sqlusers = "SELECT * FROM `crm_users` WHERE `id` = " . $taskAutor . "; ";
        $stmt = mysqli_prepare($link, $sqlusers);
        mysqli_stmt_bind_param($stmt, "i", $taskAutor);
        mysqli_stmt_execute($stmt);
        
        $autorUser = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
        
        $autorUserID = $autorUser['id'];
        $autorUserName = $autorUser['name'];
        $autorUserSurName = $autorUser['surname'];
        $autorUserEmail = $autorUser['email'];
        $autorUserAvatar = $autorUser['avatar'];
        $autorUserBirtDay = $autorUser['birtday'];
        $autorUserGender = $autorUser['gender'];
        $autorUserCity = $autorUser['city'];
        $autorUserPhoneNumber = $autorUser['phone_number'];
        $autorUserSkype = $autorUser['addres_skype'];
        $autorUserGroup = $autorUser['group'];
        $autorUserEmployee = $autorUser['employee'];
        $autorUserRegData = $autorUser['regdate'];
        $autorUserOnline = $autorUser['online'];
	if($autorUserAvatar == null){
    $getAutorUsrAvatar = '/asted/templates/object/content/ava.png';
		}else{
    $getAutorUsrAvatar = '/asted/uploads/users/'.$taskAutor.'/avatar/'.$autorUserAvatar.'';
		}
		
				    $sqluser = "SELECT * FROM `crm_users` WHERE `id` = " . $taskexecutor . "; ";
                    $stmt = mysqli_prepare($link, $sqluser);
                    mysqli_stmt_bind_param($stmt, "i", $taskexecutor);
                    mysqli_stmt_execute($stmt);
                    
                    $itsuser = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
                    
                    $itsUserID = $itsuser['id'];
                    $itsUserName = $itsuser['name'];
                    $itsUserSurName = $itsuser['surname'];
                    $itsUserEmail = $itsuser['email'];
                    $itsUserAvatar = $itsuser['avatar'];
                    $itsUserBirtDay = $itsuser['birtday'];
                    $itsUserGender = $itsuser['gender'];
                    $itsUserCity = $itsuser['city'];
                    $itsUserPhoneNumber = $itsuser['phone_number'];
                    $itsUserSkype = $itsuser['addres_skype'];
                    $itsUserGroup = $itsuser['group'];
                    $isUsersEmployee = $itsuser['employee'];
                    $isUsersRegData = $itsuser['regdate'];
                    $isUsersOnline = $itsuser['online'];
	
	$sql_tasktogroup = "SELECT * FROM `crm_group` WHERE id ='".$idtotask."'";
	$result_tasktogroup = mysqli_query($link, $sql_tasktogroup);
	$tasktogroup = mysqli_fetch_assoc($result_tasktogroup);	
	if($idtotask == $tasktogroup['id']){
		 $taskgroupname = $tasktogroup['group_title'];
	}
	
	if($itsUserAvatar == null){
    $getUsrAvatar = '/asted/templates/object/content/ava.png';
		}else{
    $getUsrAvatar = '/asted/uploads/users/'.$taskexecutor.'/avatar/'.$itsUserAvatar.'';
		}
		if($taskStatus == 0){
			$statuttask = "Открыта";
			$statustaskstule = "task_status__open";
		}
		if($taskStatus == 1){
			$statuttask = "Закрыта";
			$statustaskstule = "task_status__clouse";
		}if($taskStatus != 1){
			
			if($taskStatus != 13){	
			if($taskexecutor == $userID OR $taskAutor == $userID OR $userSessionDivisions == "1"){
				?>

                    <div class="card draggable-element border-primary mb-3">
                        <div class="card-header"><a href="/asted/task/<?=$id?>/"><b><?php if($cofigius['0']['grouptitletotask'] == "on"){echo $taskgroupname.': ';}?> <?=$title;?></b> </a>
                        <span class="ml-2 <?=$statustaskstule?> pl-2 pr-2" style="float: right;"><?=$statuttask?></span>
                        <a href="/asted/task-edit/<?=$id?>/"><i class="fas fa-fw fa-edit" style="float: right;    float: right;margin-top: 3px;margin-left: 20px;"></i></a>
                    </div>
                        <div class="card-body p-3 text-secondary"><?=$text?>
                            <hr>
                            <!--<div class="card-view  mb-2">
                                <div class="card-messanges bg-light text-secondary pl-2 pr-2 "><i class="fa fa-comment" aria-hidden="true"></i>  <span class="card-messanges-col">20</span></div>
                            </div>-->
                            <div class="d-flex align-items-center justify-content-between"><div class="card-text d-flex align-items-center">
                                <a href="/asted/profile/<?=$autorUserID?>/"><img class="card-img-profile rounded-circle" src="<?=$getAutorUsrAvatar?>"></a>
                                <i class="fa fa-angle-right ml-2 mr-2" aria-hidden="true"></i> 
                                <a href="/asted/profile/<?=$itsUserID?>/"><img class="card-img-profile rounded-circle" src="<?=$getUsrAvatar?>"></a></div>
                            <div style="font-size: 12px; font-family: monospace;">
                            <?php
                            //Дата создания
                                $restt = substr($taskDataCreate, 0, 10);
                                $datacreate = date('d.m.Y', strtotime($restt));
                                //Крайнея дата
                                $rest = substr($taskdataCompletion, 0, 10);
                                //Текущая дата + конверсия
                                $nowDateconvert = strtotime(date('d.m.Y'));
                                //Крайнея дата сконвертированая и логика
                                $taskDateconvert = strtotime($rest);
                                if($taskDateconvert < $nowDateconvert){
                                        $tastDateStatus = "color: red;";
                                }elseif($taskDateconvert > $nowDateconvert){
                                    $tastDateStatus = "color: #68686a;";
                                }elseif ($taskDateconvert == $nowDateconvert) {
                                    $tastDateStatus = "color: #2b7515;";
                                }
                                ?>
                                
                                <p class="card-text  mb-1" style="<?=$tastDateStatus?>"><span class="card-date"><span class="card-number">Дата создания: 
                                <?=$datacreate?>
                                </span> <br> 
                                <?php
                                
                                ?>
                                <span class="card-mounth">Крайнийсрок: <?=$rest?> </span></span></p>
                            </div></div>
                        </div>
                        <div class="card-footer pt-2 pb-2">
                            <div class="row">
                                <div class="col-11">
                            <b><a href="/asted/project/<?=$idtotask?>/" class="task-project_correct" style="color: #858796;"><?=$taskgroupname?></a></b>
                                </div>
                                <div class="col-1">
                                <?php
                                    $count = R::count($TerranPrefix . 'commenttask', 'totask = ?', [$id]);
                                    if($count != null){?>
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <?php echo $count; }?>
                                  </div>  
                            </div>
                        </div>
                    </div>
                <?}}}}?>
				
				
				
                <div class="card draggable-element border-success mb-3 task_ember__firstelement">
                    <div class="card-header">Header</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>


            </div>
            <div class="col-md-6 tasks-column">
                <div class="card bg-danger tasks-column-title mb-3">
                    <div class="card-body pb-2 pt-2 pl-3 text-secondary">
                        <h5 class="modal-title card-text text-white tasks-title"><?=$lang['closed']?></h5>
                        <div class="input-group tasks-title-edit">
                            <input type="text" class="form-control tasks-title-value" aria-label="Text input with dropdown button" value="Нее запланировано">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item tasks-title-edit-save" ><?=$lang['save']?></a>
                                    <a class="dropdown-item tasks-title-edit-cancel" ><?=$lang['canceling']?></a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item tasks-title-edit-delete" ><?=$lang['delete_column']?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				<?while ($tasks = mysqli_fetch_assoc($result_tasks)) {$title = "{$tasks['task_name']}";$idtotask = "{$tasks['task_togroup']}";$taskAutor = "{$tasks['task_autor']}";
				$taskDataCreate = "{$tasks['task_datacreat']}"; $taskdataCompletion = "{$tasks['task_datacompletion']}";
				$taskexecutor = "{$tasks['task_executor']}";$taskStatus = "{$tasks['task_status']}";$id = "{$tasks['id']}";
                $textPre = "{$tasks['task_text']}";
                $textPreFirstImgURL = str_replace("../core/../uploads/", "/asted/uploads/", $textPre);
                $text = str_replace("../../uploads/", "/asted/uploads/", $textPreFirstImgURL);
			$sqlusers = "SELECT * FROM `crm_users` WHERE `id` = " . $taskAutor . "; ";
            $stmt = mysqli_prepare($link, $sqlusers);
            mysqli_stmt_bind_param($stmt, "i", $taskAutor);
            mysqli_stmt_execute($stmt);
            
            $autorUser = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            
            $autorUserID = $autorUser['id'];
            $autorUserName = $autorUser['name'];
            $autorUserSurName = $autorUser['surname'];
            $autorUserEmail = $autorUser['email'];
            $autorUserAvatar = $autorUser['avatar'];
            $autorUserBirtDay = $autorUser['birtday'];
            $autorUserGender = $autorUser['gender'];
            $autorUserCity = $autorUser['city'];
            $autorUserPhoneNumber = $autorUser['phone_number'];
            $autorUserSkype = $autorUser['addres_skype'];
            $autorUserGroup = $autorUser['group'];
            $autorUserEmployee = $autorUser['employee'];
            $autorUserRegData = $autorUser['regdate'];
            $autorUserOnline = $autorUser['online'];
	if($autorUserAvatar == null){
    $getAutorUsrAvatar = '/asted/templates/object/content/ava.png';
		}else{
    $getAutorUsrAvatar = '/asted/uploads/users/'.$taskAutor.'/avatar/'.$autorUserAvatar.'';
		}
		
				    $sqluser = "SELECT * FROM `crm_users` WHERE `id` = " . $taskexecutor . "; ";
                    $stmt = mysqli_prepare($link, $sqluser);
                    mysqli_stmt_bind_param($stmt, "i", $taskexecutor);
                    mysqli_stmt_execute($stmt);
                    
                    $itsuser = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
                    
                    $itsUserID = $itsuser['id'];
                    $itsUserName = $itsuser['name'];
                    $itsUserSurName = $itsuser['surname'];
                    $itsUserEmail = $itsuser['email'];
                    $itsUserAvatar = $itsuser['avatar'];
                    $itsUserBirtDay = $itsuser['birtday'];
                    $itsUserGender = $itsuser['gender'];
                    $itsUserCity = $itsuser['city'];
                    $itsUserPhoneNumber = $itsuser['phone_number'];
                    $itsUserSkype = $itsuser['addres_skype'];
                    $itsUserGroup = $itsuser['group'];
                    $isUsersEmployee = $itsuser['employee'];
                    $isUsersRegData = $itsuser['regdate'];
                    $isUsersOnline = $itsuser['online'];
	$sql_tasktogroup = "SELECT * FROM `crm_group` WHERE id ='".$idtotask."'";
	$result_tasktogroup = mysqli_query($link, $sql_tasktogroup);
	$tasktogroup = mysqli_fetch_assoc($result_tasktogroup);	
	
	

	if($idtotask == $tasktogroup['id']){
		 $taskgroupname = $tasktogroup['group_title'];
	}
	//print_r($tasktogroup);
	if($itsUserAvatar == null){
    $getUsrAvatar = '/asted/templates/object/content/ava.png';
		}else{
    $getUsrAvatar = '/asted/uploads/users/'.$taskexecutor.'/avatar/'.$itsUserAvatar.'';
		}
		if($taskStatus == 0){
			$statuttask = "Открыта";
			$statustaskstule = "task_status__open";
		}
		if($taskStatus == 1){
			$statuttask = "Закрыта";
			$statustaskstule = "task_status__clouse";
		}if($taskStatus != 0){if($taskStatus != 13){
			if($taskexecutor == $userID OR $taskAutor == $userID OR $userSessionDivisions == "1"){
				?>

                    <div class="card draggable-element border-primary mb-3">
                        <div class="card-header"><a href="/asted/task/<?=$id?>/"><b><?php if($cofigius['0']['grouptitletotask'] == "on"){echo $taskgroupname.': ';}?> <?=$title;?></b></a> 
                        <span class="ml-2 <?=$statustaskstule?> pl-2 pr-2" style="float: right;"><?=$statuttask?></span>
                        <a href="/asted/task-edit/<?=$id?>/"><i class="fas fa-fw fa-edit" style="float: right;    float: right;margin-top: 3px;margin-left: 20px;"></i></a>
                    </div>
                        <div class="card-body p-3 text-secondary"><?=$text?>
                            <hr>
                            <!--<div class="card-view  mb-2">
                                <div class="card-messanges bg-light text-secondary pl-2 pr-2 "><i class="fa fa-comment" aria-hidden="true"></i>  <span class="card-messanges-col">20</span></div>
                            </div>-->
                            <div class="d-flex align-items-center justify-content-between"><div class="card-text d-flex align-items-center">
                            <a href="/asted/profile/<?=$autorUserID?>/"><img class="card-img-profile rounded-circle" src="<?=$getAutorUsrAvatar?>"></a>
                                <i class="fa fa-angle-right ml-2 mr-2" aria-hidden="true"></i> 
                                <a href="/asted/profile/<?=$itsUserID?>/"><img class="card-img-profile rounded-circle" src="<?=$getUsrAvatar?>"></a></div>
                                <div style="font-size: 12px; font-family: monospace;">
                                <p class="card-text  mb-1"><span class="card-date"><span class="card-number">Дата создания: 
                                <?php
                                $restt = substr($taskDataCreate, 0, 10);
                                echo date('d.m.Y', strtotime($restt));
                                ?>
                                </span> <br> 
                                <span class="card-mounth">Крайний срок: <?php
                                $rest = substr($taskdataCompletion, 0, 10);
                                echo $rest;
                                ?></span></span></p>
                            </div>
                            </div>
                        </div>
                        <div class="card-footer pt-2 pb-2">
                            <div class="row">
                                <div class="col-11">
                            <b><a href="/asted/project/<?=$idtotask?>/" style="color: #858796;"><?=$taskgroupname?></a></b>
                                </div>
                                <div class="col-1">
                                <?php
                                    $count = R::count($TerranPrefix . 'commenttask', 'totask = ?', [$id]);
                                    if($count != null){?>
                                    <i class="fa fa-comment" aria-hidden="true"></i>
                                    <?php echo $count; }?>
                                  </div>  
                            </div>
                        </div>
                    </div>
                <?}}}}?>
                <div class="card draggable-element border-success mb-3 task_ember__firstelement">
                    <div class="card-header">Header</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
          <!--  <div class="col tasks-column">
                <div class="card tasks-column-title mb-3 bg-info mb-3">
                    <div class="card-body pb-2 pt-2 pl-3 text-secondary">
                        <h5 class="modal-title card-text text-white tasks-title">Наблюдаю</h5>
                        <div class="input-group tasks-title-edit">
                            <input type="text" class="form-control tasks-title-value" aria-label="Text input with dropdown button" value="Нее запланировано">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item tasks-title-edit-save" >Сохранить</a>
                                    <a class="dropdown-item tasks-title-edit-cancel" >Отмена</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item tasks-title-edit-delete" >Удалить колонку</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
	<div class="card draggable-element border-success mb-3 task_ember__firstelement">
                    <div class="card-header">Header</div>
                    <div class="card-body text-secondary">
                        <h5 class="card-title">Secondary card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>

            </div>-->

        </div>
        <script type="text/javascript">
            $(function() {
                $('.draggable-element').arrangeable();
            });

            // Находим первый элемент с классом "task-project_correct"
var firstTaskProjectCorrect = document.querySelector('.task-project_correct');

// Проверяем, найден ли такой элемент
if (firstTaskProjectCorrect) {
    // Находим все <option> элементы внутри <select>
    var selectOptions = document.querySelectorAll('.form-control.group option');

    // Проходим по всем <option> и устанавливаем атрибут selected, если текст совпадает
    selectOptions.forEach(function (option) {
        if (option.textContent.trim() === firstTaskProjectCorrect.textContent.trim()) {
            option.setAttribute('selected', 'selected');
        } else {
            option.removeAttribute('selected');
        }
    });
} else {
    console.error('Элемент с классом "task-project_correct" не найден.');
}
        </script>
    </div>

    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>