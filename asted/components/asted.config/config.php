<? include "templates/header.php"; 
if($userGroupsCanviewconfig['0'] == "true"){
//print_r($cofigius);
if ($_POST['submit'] == 'configedit') {
   $sql = "UPDATE `crm_config` SET
          adminemail=?, lang=?, usrcanlang=?, title=?, construct=?, constpalitretheme=?, preloader=?, jobtime=?, grouptitletotask=?, mainpage=?, avauploadsiza=?, error=?, module=?, typesystem=?, module_multisite=?, website=?, userreg=?";

    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, str_repeat('s', 17),
    	$_POST['emailadmin'],
        $_POST['langop'],
        $_POST['usrlangop'],
        $_POST['terrantitle'],
        $_POST['construct'],
        $_POST['constructpalitre'],
        $_POST['preloader'],
        $_POST['jobtime'],
        $_POST['grouptitletotask'],
        $_POST['mainpage'],
        $_POST['avasize'],
        $_POST['error'],
        $_POST['module'],
        $_POST['typesystem'],
        $_POST['module_multisite'],
        $_POST['website'],
        $_POST['userreg']);
    mysqli_stmt_execute($stmt);
		
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: <?=$lang['settings_saved_successfully']?>
	</div></div>
	<meta http-equiv="refresh" content="2;URL=<?=$astedADM?>config/" />
<?}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
		
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['siteconfig']?></h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> <?=$lang['download_the_report']?></a>
          </div>
    
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['basic_settings']?> <?echo $cofigius['0']['title'];?></h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                    	<style>
.astedtypes{
	    background-color: #535a5c;
    padding: 8px;
    border-radius: 2px;
    color: white;
}
.typeinf{
	    color: antiquewhite;
    font-size: 20px;
    text-decoration: underline;
}
                    	</style>
                    	 <div class="form-group astedtypes">
                            <?php 
                            if($cofigius['0']['typesystem'] == "noselect"){?>
<span class="badge badge-pill badge-success">Конфигурация системы задана при установке и не менялась</span>
                           <?php } else {?> <span class="badge badge-pill badge-success">Конфигурация системы была задана вручную и отличается от стандарта</span><?php }
                           if($dirConfig == 'admin'){?>
<br><strong>Тип конфигурации:</strong> Для уравление сайтом CWS (лежит в доп дериктории <span class="typeinf"><?=$urls[1]?></span>)
                           <? }?>
                           <?php if($dirConfig == 'main'){?>
<br><strong>Тип конфигурации:</strong>Для уравление CRM системой Asted CWS (лежит в корне) 
                           <? }
                        ?>
                        <select class="form-control" name="typesystem" id="typesystem">

                        <?if($cofigius['0']['typesystem'] == "noselect"){?>
							<option value="admin">Сайт + CRM</option>
                            <option value="main">CRM + Сайт</option>
						<?}?>
						<?if($cofigius['0']['typesystem'] == "admin"){?>
							<option value="admin">Сайт + CRM</option>
                            <option value="main">CRM + Сайт</option>
						<?}?>
 						<?if($cofigius['0']['typesystem'] == "main"){?>
                            <option value="main">CRM + Сайт</option>
							<option value="admin">Сайт + CRM</option>
						<?}?>                           
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Почта администратора системы</label>
                            <input type="email" class="form-control"  name="emailadmin" id="emailadmin" aria-describedby="emailHelp" value="<?echo $cofigius['0']['adminemail'];?>">
                            <small id="emailHelp" class="form-text text-muted"><?=$lang['this_email_will_receive_notifications_about_actions_on']?> CRM</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"><?=$lang['name_of_company']?></label>
                            <input type="text" class="form-control" name="terrantitle" id="terrantitle" value="<?echo $cofigius['0']['title'];?>">
                        </div>
						<hr>
                        <label for="exampleInputPassword1"><?=$lang['language_of_CRM']?></label>
                        <select class="form-control" name="langop" id="langop">
						<?if($cofigius['0']['lang'] == "ru"){?>
							<option value="ru">RU - Русский</option>
                            <option value="en">EN - Английский</option>
						<?}?>
 						<?if($cofigius['0']['lang'] == "en"){?>
                            <option value="en">EN - English</option>
							<option value="ru">RU - Russian</option>
						<?}?>                           
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['current_language']?>: <strong><?echo $cofigius['0']['lang'];?></strong></small>
						<hr>
                        <label for="exampleInputPassword1">Открытая регистрация пользователей в системе ASTED</label>
                        <select class="form-control" name="userreg" id="userreg">
						<?if($cofigius['0']['userreg'] == "no"){?>
							<option value="no">Регистрация закрыта</option>
                            <option value="yes">Регистрация открыта</option>
						<?}?>
 						<?if($cofigius['0']['userreg'] == "yes"){?>
                            <option value="yes">Регистрация открыта</option>
							<option value="no">Регистрация закрыта</option>
						<?}?>                           
                        </select>
						<small id="emailHelp" class="form-text text-muted">Регистрация: <strong><?echo $cofigius['0']['userreg'];?></strong></small>
						<hr>
						<label for="exampleInputPassword1">Пользователь может выбирать язык системы</label>
                        <select class="form-control" name="usrlangop" id="usrlangop">
						<?if($cofigius['0']['usrcanlang'] == "yes"){?>
							<option value="yes">Да может</option>
                            <option value="no">Нет не может</option>
						<?}?>
 						<?if($cofigius['0']['usrcanlang'] == "no"){?>
                            <option value="no">Нет не может</option>
							<option value="yes">Да может</option>
						<?}?>                           
                        </select>
						<small id="emailHelp" class="form-text text-muted">Текущее значение: <strong><?echo $cofigius['0']['usrcanlang'];?></strong></small>
						<hr>
																		<label for="exampleInputPassword1">Система сайта Asted CWS</label>
                        <select class="form-control" name="website" id="website">
						<?if($cofigius['0']['website'] == "true"){?>
							<option value="true">Включена</option>
                            <option value="off">Выключен</option>
						<?}?>
 						<?if($cofigius['0']['website'] == "off"){?>
                            <option value="off">Выключена</option>
							<option value="true">Включена</option>
						<?}?>                           
                        </select>
						<small id="emailHelp" class="form-text text-muted">Текущее значение: <strong><?echo $cofigius['0']['website'];?></strong></small>
						<hr>
												<label for="exampleInputPassword1">Включен модуль мультисайтовости</label>
                        <select class="form-control" name="module_multisite" id="module_multisite">
						<?if($cofigius['0']['module_multisite'] == "true"){?>
							<option value="true">Включен</option>
                            <option value="off">Выключен</option>
						<?}?>
 						<?if($cofigius['0']['module_multisite'] == "off"){?>
                            <option value="off">Выключен</option>
							<option value="true">Включен</option>
						<?}?>                           
                        </select>
						<small id="emailHelp" class="form-text text-muted">Текущее значение: <strong><?echo $cofigius['0']['module_multisite'];?></strong></small>
						<hr>
						<label for="exampleInputPassword1"><?=$lang['system_constructor']?></label>
                        <select class="form-control" name="construct" id="construct">
						<?if($cofigius['0']['construct'] == "on"){?>
                            <option value="on"><?=$lang['on']?></option>
                            <option value="off"><?=$lang['off']?></option>
						<?}?>
 						<?if($cofigius['0']['construct'] == "off"){?>
							<option value="off"><?=$lang['off']?></option>
                            <option value="on"><?=$lang['on']?></option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['whether_the_constructor_icon_is_displayed_in_the_system']?>? <strong> <?=$cofigius['0']['construct']?> </strong></small>
						<label for="exampleInputPassword1"><?=$lang['template_color_palette']?></label>
                        <select class="form-control" name="constructpalitre" id="constructpalitre">
						<?if($cofigius['0']['constpalitretheme'] == "white"){?>
                            <option value="white"><?=$lang['light']?></option>
                            <option value="dark"><?=$lang['dark']?></option>
						<?}?>
 						<?if($cofigius['0']['constpalitretheme'] == "dark"){?>
							<option value="dark"><?=$lang['dark']?></option>
                            <option value="white"><?=$lang['light']?></option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['the_selected_color_palette']?>: <strong> <?=$cofigius['0']['constpalitretheme']?> </strong></small>
						<label for="exampleInputPassword1"><?=$lang['page_preloader']?></label>
                        <select class="form-control" name="preloader" id="preloader">
						<?if($cofigius['0']['preloader'] == "on"){?>
                            <option value="on"><?=$lang['on']?></option>
                            <option value="off"><?=$lang['off']?></option>
						<?}?>
 						<?if($cofigius['0']['preloader'] == "off"){?>
							<option value="off"><?=$lang['off']?></option>
                            <option value="on"><?=$lang['on']?></option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['the_page_preloader_works']?>: <strong> <?=$cofigius['0']['preloader']?> </strong></small>
                        <label for="exampleInputPassword1"><?=$lang['working_day']?></label>
                        <select class="form-control" name="jobtime" id="jobtime">
						<?if($cofigius['0']['jobtime'] == "on"){?>
                            <option value="on"><?=$lang['on']?></option>
                            <option value="off"><?=$lang['off']?></option>
						<?}?>
 						<?if($cofigius['0']['jobtime'] == "off"){?>
							<option value="off"><?=$lang['off']?></option>
                            <option value="on"><?=$lang['on']?></option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['working_day_of_employees']?>: <strong> <?=$cofigius['0']['jobtime']?> </strong></small>
                                                <label for="exampleInputPassword1"><?=$lang['output_groups_in_the_task_header']?></label>
                        <select class="form-control" name="grouptitletotask" id="grouptitletotask">
						<?if($cofigius['0']['grouptitletotask'] == "on"){?>
                            <option value="on"><?=$lang['yes']?></option>
                            <option value="off"><?=$lang['no']?></option>
						<?}?>
 						<?if($cofigius['0']['grouptitletotask'] == "off"){?>
							<option value="off"><?=$lang['no']?></option>
                            <option value="on"><?=$lang['yes']?></option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted"><?=$lang['output_groups_in_the_task_header']?>: <strong> <?=$cofigius['0']['grouptitletotask']?> </strong></small>
						<label for="exampleInputPassword1">При нажатии на логотип выводить:</label>
                        <select class="form-control" name="mainpage" id="mainpage">
						<?if($cofigius['0']['mainpage'] == "news"){?>
                            <option value="news">Новости</option>
                            <option value="index">Статистика</option>
						<?}?>
 						<?if($cofigius['0']['mainpage'] == "index"){?>
							<option value="index">Статистика</option>
                            <option value="news">Новости</option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted">На главной выводится: <strong> <?=$cofigius['0']['mainpage']?> </strong></small>	

						<label for="exampleInputPassword1">Размер загружаемых фото в профиле:</label>
						<style>
						.avasize{    height: calc(1.5em + .75rem + 2px);
							padding: .375rem .75rem;
							font-size: 1rem;
							font-weight: 400;
							line-height: 1.5;
							color: #6e707e;
							background-color: #fff;
							background-clip: padding-box;
						border: 1px solid #d1d3e2;}
						</style>
						<input type="text" name="avasize" class="avasize" value="<?=$cofigius['0']['avauploadsiza']?>">
						<br><label for="exampleInputPassword1">Выводить ошибки PHP:</label>
                        <select class="form-control" name="error" id="error">
						<?if($cofigius['0']['error'] == "true"){?>
                            <option value="true">Выводить</option>
                            <option value="false">Не выводить</option>
						<?}?>
 						<?if($cofigius['0']['error'] == "false"){?>
							<option value="false">Не выводить</option>
                            <option value="true">Выводить</option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted">Выводить ошибки: <strong>
						 <?=$cofigius['0']['error']?> </strong></small>	
						 <hr>
						<label for="exampleInputPassword1">Выводить раздел с модулями:</label>
                        <select class="form-control" name="module" id="module">
						<?if($cofigius['0']['module'] == "true"){?>
                            <option value="true">Выводить</option>
                            <option value="false">Не выводить</option>
						<?}?>
 						<?if($cofigius['0']['module'] == "false"){?>
							<option value="false">Не выводить</option>
                            <option value="true">Выводить</option>
						<?}?>  
                        </select>
						<small id="emailHelp" class="form-text text-muted">Выводить модули: <strong> <?=$cofigius['0']['module']?> </strong></small>	
						
						<!--<div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> --><br />
						                                    <input type="submit" name="submit" style="display:none" value="configedit" name="configedit" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
										    </form>
											<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary"><?=$lang['save']?></button>
                   
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<? }else{echo "TERRAN: Доступ запрещён";} include "templates/footer.php"; ?>