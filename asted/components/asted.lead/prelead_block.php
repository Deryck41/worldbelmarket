<? include "templates/header.php";
if ($userPreLeadType == "prelead") {
    $sqlupdatetask = "UPDATE crm_users SET prelead_type='block' WHERE id='{$userID}'";
    $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if ($userPreLeadType == null) {
    $sqlupdatetask = "UPDATE crm_users SET prelead_type='block' WHERE id='{$userID}'";
    $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
?>

<div class="container-fluid">
    <?php
    if(empty($_COOKIE['leadpage'])) {
        setcookie('leadpage', '10');
        $_COOKIE['leadpage'] = 10;
    }
    // Переменная хранит число сообщений выводимых на станице
    $num = $_COOKIE['leadpage'];
    // Извлекаем из URL текущую страницу
    $page = $_GET['page'];
    $filter_user = $_GET['user_id'];
    // Определяем общее число сообщений в базе данных
		
	//start install bugfix
	if($_COOKIE['lead_filter_manager'] == 'undefined'){
		setcookie('lead_filter_manager', 'oll');
		$_COOKIE['lead_filter_manager'] = 'oll';
	}
	//start install bugfix
    if(!empty($_COOKIE['lead_filter_manager'])){
        if($_COOKIE['lead_filter_manager']=="oll"){
            $sql = mysqli_query($link,"SELECT COUNT(*) FROM `crm_lead`");
        }else{
            $sql = mysqli_query($link,"SELECT COUNT(*) FROM `crm_lead` WHERE manager='{$_COOKIE['lead_filter_manager']}'");

        }
    }else{
        setcookie('lead_filter_manager', 'oll');
        $sql = mysqli_query($link,"SELECT COUNT(*) FROM `crm_lead`");
    }
    $posts = mysqli_fetch_row($sql);
    $posts = $posts[0];
    // Находим общее число страниц
    $total = intval(($posts - 1) / $num) + 1;
    // Определяем начало сообщений для текущей страницы
    $page = intval($page);
    // Если значение $page меньше единицы или отрицательно
    // переходим на первую страницу
    // А если слишком большое, то переходим на последнюю
    if(empty($page) or $page < 0) $page = 1;
    if($page > $total) $page = $total;
    // Вычисляем начиная к какого номера
    // следует выводить сообщения
    $start = $page * $num - $num;
    // Выбираем $num сообщений начиная с номера $start
    if(empty($_COOKIE['leadshort'])) {

        setcookie('leadshort', 'top');
        $_COOKIE['leadshort'] = 'top';
        if($_COOKIE['lead_filter_manager']!=="oll"){
            $sql_lead = "SELECT * FROM `crm_lead` WHERE manager='{$_COOKIE['lead_filter_manager']}' ORDER BY `id` DESC LIMIT $start, $num";
        }else{
            $sql_lead = "SELECT * FROM `crm_lead` ORDER BY `id` DESC LIMIT $start, $num";
        }
    }
    if($_COOKIE['leadshort'] == "top") {
        if($_COOKIE['lead_filter_manager']!=="oll"){
            $sql_lead = "SELECT * FROM `crm_lead` WHERE manager='{$_COOKIE['lead_filter_manager']}' ORDER BY `id` DESC LIMIT $start, $num";
        }else{
            $sql_lead = "SELECT * FROM `crm_lead` ORDER BY `id` DESC LIMIT  $start, $num ";
        }

    }
    if($_COOKIE['leadshort'] == "down") {
        if($_COOKIE['lead_filter_manager']!=="oll"){
            $sql_lead = "SELECT * FROM `crm_lead` WHERE manager='{$_COOKIE['lead_filter_manager']}' ORDER BY `id` DESC LIMIT $start, $num";
        }else{
            $sql_lead = "SELECT * FROM `crm_lead` LIMIT $start, $num ";
        }
    }
    if(!empty($filter_user)){
        if($filter_user !== "oll"){
            $sql_lead = "SELECT * FROM `crm_lead` WHERE manager='{$filter_user}' LIMIT $start, $num ";
        }else{
        }
    }

	
    $lead = post($link,$sql_lead);
    $lead_leadGenerate= post($link,"SELECT * FROM `crm_lead`");
    function post($link,$sqli) {
        $leads = [];
        $sql = mysqli_query($link, $sqli);
        while ($result = $sql->fetch_assoc()) {
            if (!empty($result["manager"])) {
                $sql_lead_user = "SELECT * FROM `crm_users` WHERE id ='" . $result["manager"] . "'";
                $result_lead_user = mysqli_query($link, $sql_lead_user);
                while ($lead_user = mysqli_fetch_assoc($result_lead_user)) {
                    $lead_username = "{$lead_user['name']}";
                    $lead_usersurname = "{$lead_user['surname']}";
                    if (!empty($lead_user["avatar"])) {
                        $lead_userAvatar = 'uploads/users/'.$lead_user["id"].'/avatar/'.$lead_user["avatar"].'';
                    }else{
                        $lead_userAvatar = 'templates/object/content/ava.png';
                    }
                }
                $terranmanagerava[] = $lead_userAvatar;
                $result["managerName"] = $lead_username . " " . $lead_usersurname;
                $result["managerAvatar"] = $lead_userAvatar;
                $leads[] = $result;
            } else {
                $result["managerName"] = "";
                $result["managerAvatar"] = 'templates/object/content/ava.png';
                $leads[] = $result;
            }

        }
        return $leads;
    }
                // Проверяем нужны ли стрелки назад
                if ($page != 1) $pervpage = '<li class="page-item disabled"><a href= ./prelead_block.php?page=1><span class="page-link">Start</span></a></li>
                    <li class="page-item disabled">
                              <a href= ./prelead_block.php?page='. ($page - 1) .'><span class="page-link">Previous</span></a>
                              </li> ';
                // Проверяем нужны ли стрелки вперед
                if ($page != $total) $nextpage = '<li class="page-item disabled"> <a href= ./prelead_block.php?page='. ($page + 1) .'><span class="page-link">Next</span></a></li>
                                  <li class="page-item disabled">
                                   <a href= ./prelead_block.php?page=' .$total. '><span class="page-link">End</span></a>
                                   </li>';

                // Находим две ближайшие станицы с обоих краев, если они есть
                if($page - 2 > 0) $page2left = '<li class="page-item"> <a class="page-link"  href= ./prelead_block.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> </li> ';
                if($page - 1 > 0) $page1left = '<li class="page-item"> <a class="page-link" href= ./prelead_block.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> </li>  ';
                if($page + 2 <= $total) $page2right = '  <li class="page-item"> <a class="page-link" href= ./prelead_block.php?page='. ($page + 2) .'>'. ($page + 2) .'</a> </li>';
                if($page + 1 <= $total) $page1right = '  <li class="page-item"> <a class="page-link" href= ./prelead_block.php?page='. ($page + 1) .'>'. ($page + 1) .'</a> </li>';

    $details = unique_multidim_array($lead_leadGenerate,'manager', "ds");
    foreach($lead_leadGenerate as $val) {
        foreach($details as $key => $val2) {
            if ($val["manager"] == $key && $val["leadstatus"] == "new") {
                $leadAll[] = $val2["name"];
            }
            if ($val["manager"] == $key && $val["leadstatus"] == "lead" ) {
                $leadLead[] = $val2["name"];
            }
        }
    }
    $leadAll =  array_count_values($leadAll);
    $leadLead = array_count_values($leadLead);
    function unique_multidim_array($array, $key ,$topLead) {
        $temp_array = array();
        $i = 0;
        $key_array = array();
        foreach($array as $val) {
            if (!in_array($val[$key], $key_array)) {
                $key_array[$i] = $val[$key];
                if(!empty($val["manager"])){
                   $temp_array[$val["manager"]] = array("name"=>$val["managerName"],
                       "avatar"=>$val["managerAvatar"],
                       "id"=>$val["manager"],
                      );
                }
            }
            $i++;
        }
        return $temp_array;
    }
    foreach($details as $key => $vals) {
        $details[$key]["lead"] = $leadLead[$vals["name"]];

    }
    function leadSort($a, $b)
    {

        if ($a['lead'] == $b['lead']) return 0;
        return $a['lead'] < $b['lead'] ? 1 : -1;
    }
    uasort($details, 'leadSort');
    $last = count($lead) - 1;
	
	if($leadAll == null){?>
		 <div class="container-fluid">
		 <div class="card border-left-warning shadow h-100 py-2">TerranCRM: Не одного лида ещё не было добавлено
		</div><br>
		
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" data-toggle="modal" data-target="#lead-form_add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить потенцального лида</a>
                </div>
		
	        <form class="modal fade" id="lead-form_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['create_task'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span><strong><?= $lang['firstName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_name" required type="тема">
                        <br>
                        <span><strong> <?= $lang['Project'] ?>: </strong></span>
                        <input class="form-control theme lead-form_project" required type="тема">
                        <br>
                        <span><strong> <?= $lang['ProjectName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_projectName" type="тема">
                        <br>
                        <span><strong><?= $lang['mail'] ?>: </strong></span>
                        <input type="email" class="form-control theme lead-form_email" type="tel">
                        <br>
                        <span><strong><?= $lang['phonenumber'] ?>: </strong></span>
                        <input class="form-control theme lead-form_phone" required type="tel">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>
        <form class="modal fade" id="lead-form_old" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['lead_old'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span><strong><?= $lang['lead_comment'] ?>: </strong></span>
                        <textarea class="form-control theme lead-form_comment"  type="text"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>lead_comment
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>
        <form class="modal fade" id="lead-form_edit-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['lead_comment_edit'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" class="managerId-edit">
                        <input type="hidden" value="" class="managerName-edit">
                        <span><strong><?= $lang['firstName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_name-edit" required type="тема">
                        <br>
                        <span><strong> <?= $lang['ProjectName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_projectName" type="тема">
                        <br>
                        <span><strong>Менеджер: </strong></span>

                        <select class="form-control responsible lead-user" style="width: 250px;" name="" id="">
                            <option value="0" name="default">Не указан</option>
                            <? echo implode('', $userManager); ?>
                        </select>
                        <br>
                        <span><strong> <?= $lang['Project'] ?>: </strong></span>
                        <input class="form-control theme lead-form_project-edit" required type="тема">
                        <br>
                        <span><strong> <?= $lang['mail'] ?>: </strong></span>
                        <input class="form-control theme lead-form_mail-edit" type="тема">
                        <br>
                        <span><strong><?= $lang['phonenumber'] ?>: </strong></span>
                        <input class="form-control theme lead-form_phone-edit" required type="tel">
                        <br>
                        <span><strong><?= $lang['lead_comment'] ?>: </strong></span>
                        <textarea class="form-control theme lead-form_comment-edit" required type="text"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>	
		
		
		
		
		
		
		</div>
		
	<?php
	}else{
    if ($userGroupsCanviewprelead['0'] == "true"){?>
        <div class="container-fluid">
            <div class="alert alert-success  alert-lead hidden" role="alert">
                <?= $lang["Project"] ?>:<span class="alert-project-name"></span><?= $lang["Project_event_archive"] ?>
            </div>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"><?= $lang['tasks'] ?></h1>
                <a href="prelead.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-list fa-sm text-white-50"></i> Таблица</a>
            </div>
        </div>
        <form class="modal fade" id="lead-form_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['create_task'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span><strong><?= $lang['firstName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_name" required type="тема">
                        <br>
                        <span><strong> <?= $lang['Project'] ?>: </strong></span>
                        <input class="form-control theme lead-form_project" required type="тема">
                        <br>
                        <span><strong> <?= $lang['ProjectName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_projectName" type="тема">
                        <br>
                        <span><strong><?= $lang['mail'] ?>: </strong></span>
                        <input type="email" class="form-control theme lead-form_email" type="tel">
                        <br>
                        <span><strong><?= $lang['phonenumber'] ?>: </strong></span>
                        <input class="form-control theme lead-form_phone" required type="tel">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>
        <form class="modal fade" id="lead-form_old" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['lead_old'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <span><strong><?= $lang['lead_comment'] ?>: </strong></span>
                        <textarea class="form-control theme lead-form_comment"  type="text"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>lead_comment
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>
        <form class="modal fade" id="lead-form_edit-comment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
              aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?= $lang['lead_comment_edit'] ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="" class="managerId-edit">
                        <input type="hidden" value="" class="managerName-edit">
                        <span><strong><?= $lang['firstName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_name-edit" required type="тема">
                        <br>
                        <span><strong> <?= $lang['ProjectName'] ?>: </strong></span>
                        <input class="form-control theme lead-form_projectName" type="тема">
                        <br>
                        <span><strong>Менеджер: </strong></span>

                        <select class="form-control responsible lead-user" style="width: 250px;" name="" id="">
                            <option value="0" name="default">Не указан</option>
                            <? echo implode('', $userManager); ?>
                        </select>
                        <br>
                        <span><strong> <?= $lang['Project'] ?>: </strong></span>
                        <input class="form-control theme lead-form_project-edit" required type="тема">
                        <br>
                        <span><strong> <?= $lang['mail'] ?>: </strong></span>
                        <input class="form-control theme lead-form_mail-edit" type="тема">
                        <br>
                        <span><strong><?= $lang['phonenumber'] ?>: </strong></span>
                        <input class="form-control theme lead-form_phone-edit" required type="tel">
                        <br>
                        <span><strong><?= $lang['lead_comment'] ?>: </strong></span>
                        <textarea class="form-control theme lead-form_comment-edit" required type="text"></textarea>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary lead-form_close"
                                data-dismiss="modal"><?= $lang['close'] ?></button>
                        <button type="submit" class="btn btn-primary"><?= $lang['add'] ?></button>
                    </div>
                </div>
            </div>
        </form>
        <div class="container-fluid" style="font-size: 14px;">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4 top_manager_list">
                    <div class="row w-100 ">
                        <div class="col-lg-12">Топ 5 менеджеров</div>
                    </div>

                    <?

                    foreach ($details as $key =>$value ):?>
                        <div class="row w-100 flex-column top_manager">
                            <div class="d-flex pb-1 pt-1">
                                <div class="manager-img">
		                        <a href="profile.php?id=<?=$value['id']?>"><img width="50px" height="auto" style="height: 45px;" class="img-profile rounded-circle mr-2" src="<?=$value["avatar"]?>"></a>
                                </div>
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="manager-name">
                                        <a href="profile.php?id=<?=$value['id']?>"><?=$value["name"]?></a>
                                    </div>
                                    <div class="manager-progress">
                                        <span class="manager-lead"><? echo !empty($leadLead[$value["name"]]) ? $leadLead[$value["name"]] : "0" ?> лидов</span>
                                        <span class="manager-leadGeneration"><? echo !empty($leadAll[$value["name"]]) ? $leadAll[$value["name"]] : "0" ?> лидогенерация</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endforeach;?>
                    <div class="row w-100 flex-column">
                        <button type="button" class="btn btn-primary show_manager_list">Показать еще</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="font-size: 14px;">
            <div class="row">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <a href="#" data-toggle="modal" data-target="#lead-form_add"
                       class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> <?= $lang['add_a_potential_lead'] ?></a>
                </div>
                <div class="col-lg-12 mb-2">
                    <div class="row ">
                        <div class="col-auto">
                            <div class="d-flex card  flex-row align-items-center  pl-2 pr-2">
                                <span class="text-nowrap">Фильтр менеджеров:</span>
                                <select class="form-control responsible lead-manager border-0 pl-0 no-focus text-info"
                                        name="" id="">
                                    <option value="oll">Все менеджеры</option>
                                    <? echo implode('', $userManager); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-auto ">
                            <div class="d-flex card  flex-row align-items-center pl-2 pr-2">
                                <span class="text-nowrap ">Фильтр лидов:</span>
                                <select class="form-control responsible sort-status border-0 pl-0 no-focus text-info"
                                        name="" id="" style="pointer-events: none">
                                    <option value="oll">Все статусы</option>
                                    <option value="Первый звонок">Первый звонок</option>
                                    <option value="Перезвонить">Перезвонить</option>
                                    <option value="Ждем обратного звонка">Ждем обратного звонка</option>
                                    <option value="Договор заключен">Договор заключен</option>
                                </select>
                            </div>
                        </div>
						
						    <div class="col-auto ">
                            <div class="d-flex card  flex-row align-items-center pl-2 pr-2">
                                <span class="text-nowrap ">Сортировать по:</span>
                                <select class="form-control responsible sorting border-0 pl-0 no-focus text-info"
                                        name="" id="">
                                    <option value="top">возростанию</option>
                                    <option value="down">убыванию</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11 d-flex align-items-center justify-content-center mt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?
                            echo $pervpage.$page2left.$page1left.'<li class="page-item active"><span class="page-link">'.$page.'</span></li>'.$page1right.$page2right.$nextpage;

                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-1 mt-2">
                    <select class="form-control responsible lead_items border-0 pl-0 no-focus text-info"
                            name="" id="" >
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="500">500</option>
                    </select>
                </div>
                <? foreach ($lead as $key => $value): ?>
                    <? if ($value["leadstatus"] == "new" || $value["leadstatus"] == "lead"): ?>
                        <div class="col-lg-12">
                            <div class="lead_block <? if (!empty(date("d.m.Y", strtotime($value["dateCall"]))) && date("d.m.Y") >= date("d.m.Y", strtotime($value["dateCall"]))): ?><? elseif (date("Y", strtotime($value["dateCall"])) !== "1970" && date("d") == date("d", strtotime($value["dateCall"])) - "1"): ?><? endif; ?> <? if ($value["leadstatus"] == "lead" && $value["status"] === "lead") {
                                echo "statusLead";
                            } ?> row card flex-row lead-block pt-0 pb-2 pl-1 pr-1">
                                <input name="lead_id" type="hidden" value="<? echo $value["id"] ?>">
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-user p-3 d-flex flex-column  justify-content-center">
                                        <div class="d-flex align-items-center">
                                            <img width="50px" height="auto" style="min-height: 45px;" class="img-profile rounded-circle mr-2" src="<?=$value["managerAvatar"]?>"/>
                                            <input type="hidden" class="managerID" name="managerID"
                                                   value="<?= $value["manager"] ?>">
                                            <span class="manager-name text-white line"
                                                  name="manager-name"><? echo !empty($value["managerName"]) ? $value["managerName"] : "Не указан"; ?></span>
                                        </div>
                                        <div class="d-flex align-items-center mt-3 pl-2">
                                            <i class="fa fa-calendar mr-2 text-dark   pb-1" aria-hidden="true"></i>
                                            <span class="manager-name text-white">
                                <? echo date("d.m.Y", strtotime($value["date"])); ?>
                                <? $data_lead = date("d.m.Y", strtotime($value["date"])) ?>
                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-status p-3 d-flex flex-column  justify-content-center">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-clock  text-dark mr-3"></i>
                                            <div class="d-flex flex-column">
                                                <div class="input-group-append pl-2">
                                                    <? if ($value["status"] === "newcall"): ?>
                                                        <span class="lead_block_status statmanager-name text-white line us"><? echo $lang['call_new']; ?></span>
                                                    <? elseif ($value["status"] === "recall"): ?>
                                                        <div class="d-flex flex-column">
                                                            <span class="lead_block_status"><? echo $lang['call_back']; ?></span>
                                                            <div class="lead_dateRecallValue"><?= $value["dateCall"] ?></div>
                                                        </div>
                                                    <? elseif ($value["status"] === "feedback"): ?>
                                                        <span class="lead_block_status"><? echo $lang['call_feedback']; ?></span>
                                                    <? elseif ($value["status"] === "lead"): ?>
                                                        <span class="lead_block_status text-white"><? echo "Договор заключен"; ?></span>
                                                    <? endif; ?>
                                                    <i class="fa fa-cog pointer text-dark ml-1 lead_edit"
                                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                                       aria-hidden="true"></i>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item  lead_table-callNew pointer"><?= $lang['call_new']; ?></a>
                                                        <a class="dropdown-item  lead_table-callBack pointer"><?= $lang['call_back'] ?></a>
                                                        <input type="text" name="lead_dataRecall"
                                                               value="<?= $value["dateCall"] ?>" class="ml-4"/>
                                                        <a class="dropdown-item  lead_table-feedback pointer"><?= $lang['call_feedback'] ?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-project p-3 d-flex flex-column  justify-content-center ">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-share-alt mr-3  text-dark" aria-hidden="true"></i>
                                            <span class="manager-name text-white line " name="lead_project">
                                            <?
                                            $leadValueHTTP = str_replace("http://", "", $value["project"]);
                                            $leadValueHTTPS = str_replace("https://", "", $leadValueHTTP);
                                            ?>
                                             <a class="text-white" href="http://<?echo parse_url("http://$leadValueHTTPS", PHP_URL_HOST)?>">
                                             <?
                                             echo parse_url("http://$leadValueHTTPS", PHP_URL_HOST);
                                             ?>
                                    </a>
                            </span>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-info p-3 d-flex flex-column  justify-content-center ">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-phone  mr-2  text-dark"></i>
                                            <span class="manager-tel text-white " name="lead_tel"><a class="text-white "
                                                                                                     href="tel:<?= $value["tel"] ?>"><?= $value["tel"] ?></a> </span>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <i class="fa fa-envelope mr-2 text-dark " aria-hidden="true"></i>
                                            <span class="manager-name text-white" name="lead_email">
                                <? if (!empty($value["email"])): ?>
                                    <a class="text-white "
                                       href="mailto:<?= $value["email"] ?>"><?= $value["email"] ?></a>
                                <? else: ?>
                                    Отсутствует
                                <? endif; ?>
                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-comment p-3 d-flex flex-column  justify-content-center bg-secondary">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-comments mr-3  text-dark" aria-hidden="true"></i>
                                            <span class="comment_lead text-white line mw-50">


                                    <input name="lead_comment" type="hidden" value="<?= $value["comment"] ?>">
                                     <? if (!empty($value["comment"])): ?>
                                         <?
                                         if (strlen($value["comment"]) >= 100) {
                                             echo mb_substr($value["comment"], 0, 100, 'UTF-8') . '...';
                                         } else {
                                             echo $value["comment"];
                                         };
                                         ?>
                                     <? else: ?>
                                         Отсутствует
                                     <? endif; ?>
                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-nameLead p-3 d-flex flex-column  justify-content-center bg-warning ">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-paper-plane fa-sm fa-fw mr-2  text-dark"></i>
                                            <span class="manager-name text-white line" name="lead-form_projectName">
                                <? if (!empty($value["project_name"])): ?>
                                    <?= $value["project_name"] ?>
                                <? else: ?>
                                    Отсутствует
                                <? endif; ?>
                            </span>
                                        </div>
                                        <div class="d-flex align-items-center mt-3">
                                            <i class="fa fa-users mr-2 text-dark   pb-1" aria-hidden="true"></i>
                                            <span class="manager-name text-white"
                                                  name="lead_name"><?= $value["name"] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto pl-0 pr-1 pt-1">
                                    <div class="prelead-block-item prelead-block-controls p-3 d-flex flex-column  justify-content-center bg-warning">
                                        <div class="d-flex align-items-center">
                                            <i class="fa fa-cogs fa-sm fa-fw mr-2  text-dark"></i>
                                            <span class="manager-name text-white line">Управление</span>
                                        </div>
                                        <div class="w-100 bg-dark hr mb-2 mt-2"></div>
                                        <div class="d-flex align-items-center justify-content-between ">
                                            <i class="fa fa-check pointer text-dark lead_lead" aria-hidden="true"></i>
                                            <i class="fa fa-ban lead_old pointer text-dark" data-toggle="modal"
                                               data-target="#lead-form_old " aria-hidden="true"></i>
                                            <i class="fa fa-cog lead_comment-edit pointer text-dark" data-toggle="modal"
                                               data-target="#lead-form_edit-comment" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    <? endif; ?>
                <? endforeach; ?>

                <div class="col-lg-12 d-flex align-items-center justify-content-center mt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?
                            echo $pervpage.$page2left.$page1left.'<li class="page-item active"><span class="page-link">'.$page.'</span></li>'.$page1right.$page2right.$nextpage;

                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    <?}else{ ?>
	<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
    <?}
}?>
        <script>
            $(document).ready(function () {

                $('body').on('click', '.lead_edit', function () {
                    $('input[name="lead_dataRecall"]').daterangepicker({
                        singleDatePicker: true,
                        locale: {
                            format: 'DD.MM.YYYY'
                        }
                    });
                })

                $('body').on('click', '.lead_comment-edit', function () {
                    $('input[name="lead_id"]').removeClass('activeID')
                    $('.lead_table').removeClass('active')
                    $(this).parent().parent().parent().parent().find('input[name="lead_id"]').addClass('activeID')
                    $(this).parent().parent().parent().parent().addClass('active')
                    let comment_text = $(this).parent().parent().parent().parent().find('input[name="lead_comment"]').val().trim(),
                        lead_name = $(this).parent().parent().parent().parent().find('span[name="lead_name"]').text().trim(),
                        lead_project = $(this).parent().parent().parent().parent().find('span[name="lead_project"] a').text().trim(),
                        lead_projectName = $(this).parent().parent().parent().parent().find('span[name="lead-form_projectName"]').text().trim(),
                        lead_tel = $(this).parent().parent().parent().parent().find('span[name="lead_tel"] a').text().trim(),
                        lead_email = $(this).parent().parent().parent().parent().find('span[name="lead_email"] a').text().trim(),
                        lead_managerId = $(this).parent().parent().parent().parent().find('input[name="managerID"]').val()
                    if (comment_text !== null && comment_text !== undefined
                        && lead_name !== null && lead_name !== undefined
                        && lead_project !== null && lead_project !== undefined
                        && lead_tel !== null && lead_tel !== undefined
                        && lead_managerId !== null && lead_managerId !== undefined
                        && lead_projectName !== null && lead_projectName !== undefined) {
                        $(".lead-form_name-edit").val(`${lead_name}`)
                        $(".lead-form_project-edit").val(`${lead_project}`)
                        $(".lead-form_phone-edit").val(`${lead_tel}`)
                        $(".lead-form_comment-edit").val(`${comment_text}`)
                        $(".lead-form_mail-edit").val(`${lead_email}`)
                        $(".lead-form_projectName").val(`${lead_projectName}`)
                    }
                    $(".lead-user option").each(function (index, el) {
                        if ($(this).val() === `${lead_managerId}`) {
                            $(this).prop('selected', true);
                            return
                        }
                        if (lead_managerId === "") {
                            $('option[name="default"]').prop('selected', true)
                        }

                    })
                })
                //status feedback
                $('body').on('click', '.lead_table-feedback', function () {
                    const lead_feedback = new Lead_Ajax({
                        status: "lead_feedback",
                        $element: $(this),
                        leadStatusCall: "feedback",
                        id: $(this).parent().parent().parent().parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                        lang: {
                            call_feedback: '<?=$lang['call_feedback']?>'
                        }
                    })
                    lead_feedback.ajax()
                })
                //lead add
                $("#lead-form_add").submit(function (event) {
                    event.preventDefault()
                    console.log(<?=$userID?>)
                    const add_lead = new Lead_Ajax({
                        status: "lead_add",
                        type: "lead_block",
                        manager: "<?=$userID?>",
                        leadStatusCall: "newcall",
                        projectName: $(this).find(".lead-form_projectName").val(),
                        name: $(this).find(".lead-form_name").val(),
                        project: $(this).find(".lead-form_project").val(),
                        tel: $(this).find(".lead-form_phone").val(),
                        email: $(this).find(".lead-form_email").val(),
                        id:<?if (empty($lead[$last]["id"])) {
                            echo "1";
                        } else {
                            if($_COOKIE['leadshort'] == 'down' || empty($_COOKIE['leadshort'])){
                                echo $lead[$last]["id"];
                            }else{
                                echo $lead[0]["id"] +1;
                            }

                        }?>,
                        dateLead: "<?=$data_lead?>",
                        lang: {
                            call_new: '<?echo $lang['call_new']?>',
                            call_back: '<?=$lang['call_back']?>',
                            call_feedback: '<?=$lang['call_feedback']?>'
                        }
                    })
                    add_lead.ajax()
                    $(this).find(".lead-form_close").trigger('click');
                })
                // lead edit
                $("#lead-form_edit-comment").submit(function (event) {
                    event.preventDefault()
                    const edit_lead = new Lead_Ajax({
                        status: "lead_edit",
                        type: "lead_block",
                        manager: $(this).find(".lead-user").val(),
                        projectName: $(this).find(".lead-form_projectName").val(),
                        name: $(this).find(".lead-form_name-edit").val(),
                        project: $(this).find(".lead-form_project-edit").val(),
                        email: $(this).find(".lead-form_mail-edit").val(),
                        tel: $(this).find(".lead-form_phone-edit").val(),
                        comment: $(this).find(".lead-form_comment-edit").val(),
                        id: $('.activeID').val()
                    })
                    edit_lead.ajax()
                    $(this).find(".lead-form_close").trigger('click');
                })
                // lead lead
                $('body').on('click', '.lead_lead', function () {
                    $('input[name="lead_id"]').removeClass('activeID')
                    $(this).parent().parent().parent().parent().find('input[name="lead_id"]').addClass('activeID')
                    const lead_lead = new Lead_Ajax({
                        status: "lead_lead",
                        leadStatus: 'lead',
                        leadStatusCall: "lead",
                        id: $('.activeID').val()
                    })
                    lead_lead.ajax()
                })

                // lead status newcall
                $('body').on('click', '.lead_table-callNew', function () {
                    const lead_callNew = new Lead_Ajax({
                        status: "lead_callNew",
                        $element: $(this),
                        leadStatusCall: "newcall",
                        id: $(this).parent().parent().parent().parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                        lang: {
                            call_new: '<?echo $lang['call_new']?>'
                        }
                    })
                    lead_callNew.ajax()
                })
                // lead status recall
                $('body').on('click', '.lead_table-callBack', function () {
                    const lead_callBack = new Lead_Ajax({
                        status: "lead_callBack",
                        $element: $(this),
                        leadStatusCall: "recall",
                        dateCall: $(this).parent().find('input[name="lead_dataRecall"]').val(),
                        id: $(this).parent().parent().parent().parent().parent().parent().parent().find('input[name="lead_id"]').val(),
                        lang: {
                            call_back: '<?=$lang['call_back']?>',
                        }
                    })
                    lead_callBack.ajax()
                })
                //lead  add archive
                $('body').on('click', '.lead_old', function () {
                    $('input[name="lead_id"]').removeClass('activeID')
                    $(this).parent().parent().parent().parent().find('input[name="lead_id"]').addClass('activeID')
                    let comment_text = $(this).parent().parent().parent().parent().find('span[name="lead_comment"]').text().trim()
                    if (comment_text !== null && comment_text !== undefined) {
                        $(".lead-form_comment").val(`${comment_text}`)
                    }
                })
                $("#lead-form_old").submit(function (event) { // задаем функцию при срабатывании события "submit" на элементе <form>
                    event.preventDefault()
                    const lead_old = new Lead_Ajax({
                        status: "lead_old",
                        $element: $(this),
                        leadStatus: 'old',
                        comment: $(this).find(".lead-form_comment").val(),
                        id: $('.activeID').val()
                    })
                    lead_old.ajax()
                    $(this).find(".lead-form_close").trigger('click');
                })

                if($.cookie('lead_filter_manager') !== ""){
                    lead_filter($.cookie('lead_filter_manager'))
                }else{
                    lead_filter("oll")
                }
                $(".lead-manager").change(function () {
                    lead_filter($(this).val())
                    window.location.href = `${document.location.pathname}?user_id=${$(this).val()}`
                });
                function lead_filter(value){
                    // $(".lead_block").hide()
                    $.cookie('lead_filter_manager',`${value}`)
                    $(`.lead-manager option[value=${value}]`).prop('selected', true);
                    // $(`.managerID[value="${value}"]`).parent().parent().parent().parent().show();
                    // if (value === "oll") {
                    //     $(".lead_block").show()
                    // }
                }
                if($.cookie('leadshort')){
                    $(`.sorting option[value=${$.cookie('leadshort')}]`).prop('selected', true);
                }
                $(".sorting").change(function () {
                    let change = $(this).val().split(' ').join('')
                    if($.cookie('leadshort') === "down"){
                        $.cookie('leadshort',`${change}`)
                        location.reload();
                    }else{
                        $.cookie('leadshort',`${change}`)
                        location.reload();
                    }
                })
                if($.cookie('leadpage')){
                    $(`.lead_items option[value=${$.cookie('leadpage')}]`).prop('selected', true);
                }
                $(".lead_items").change(function () {
                    let change = $(this).val().split(' ').join('')
                        $.cookie('leadpage',`${change}`)
                        location.reload();
                })


                $(".sort-status").change(function () {
                    $(".lead_block").hide()
                    $('.lead-manager').val("oll")
                    let change = $(this).val().split(' ').join('')
                    $(".lead_block_status").each(function (index, element) {
                        if ($(this).text().split(' ').join('') === change) {
                            $(this).parent().parent().parent().parent().parent().parent().show()
                            $(this).parent().parent().parent().parent().parent().parent().parent().show()
                        }
                    })
                    if ($(this).val() === "oll") {
                        $(".lead_block").show()
                    }
                });
                $(".top_manager").each(function (index,elevent) {
                    if(index > 4){
                        $(".show_manager_list").show()
                    }
                })
                $(".show_manager_list").click(function () {
                    let el = $(this).text()
                    $(this).text(el === "Показать еще" ? "Скрыть" : "Показать еще")
                    $(".top_manager").each(function (index,elevent) {
                        if(index > 4){
                            $(this).slideToggle()
                        }
                    })

                })

            })
        </script>
	<?php include "templates/footer.php"; ?>
    <script src="templates/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>
