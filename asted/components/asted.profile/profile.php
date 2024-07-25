<? include "templates/header.php";
//echo $_GET['id'];


?>

    <div class="container-fluid hidden message_status">
        <div class="alert alert-success" role="alert">
            ASTED: <?=$lang['settings_saved_successfully']?>
        </div>
    </div>
<?
if (is_numeric($_GET['id'])) {
    if (isset($_GET['id'])) {
        $crmusrdefend = true;
    }
}
if ($crmusrdefend == true) {
    $_GET['id'];
    $sqluser = "SELECT * FROM `".$TerranPrefix."users` WHERE `id` = " . $_GET['id'] . "; ";
    $resultuser = mysqli_query($link, $sqluser);
    while ($itsuser = mysqli_fetch_assoc($resultuser)) {
        $itsUserName = "{$itsuser['name']}";
        $itsUserSurName = "{$itsuser['surname']}";
        $itsUserEmail = "{$itsuser['email']}";
        $itsUserAvatar = "{$itsuser['avatar']}";
        $itsUserBirtDay = "{$itsuser['birtday']}";
        $itsUserGender = "{$itsuser['gender']}";
        $itsUserCity = "{$itsuser['city']}";
        $itsUserPhoneNumber = "{$itsuser['phone_number']}";
        $itsUserSkype = "{$itsuser['addres_skype']}";
        $itsUserGroup = "{$itsuser['group']}";
        $isUsersEmployee = "{$itsuser['employee']}";
        $isUsersRegData = "{$itsuser['regdate']}";
        $isUsersOnline = "{$itsuser['online']}";
        $isUserOrganization = "{$itsuser['organization']}";
		$isUserDivisions = "{$itsuser['divisions']}";
    }

			
}
$sql_userGroupsProfile = "SELECT * FROM `".$TerranPrefix."usergroup` WHERE id ='".$isUserDivisions."'";
			$result_userGroupsProfile = mysqli_query($link, $sql_userGroupsProfile);
			while ($userGroupsProfile = mysqli_fetch_assoc($result_userGroupsProfile)) {
				$userGroupsNameProfile[] = "{$userGroupsProfile['usergroup']}";
				$userGroupsAccessProfile[] = "{$userGroupsProfile['globalaccess']}";
			}
if ($isUsersOnline <= $isUsersOnline + 100) {
    $onlineLang = $lang['online'];
    $onlineSite = "online";
} else {
    $onlineLang = $lang['offline'];
    $onlineSite = "offline";
}
if($itsUserAvatar == null){
    $getUsrAvatar = ''.$astedADM.'templates/object/content/ava.png';
}else{
	if ($fileAvaItsTrue == "true") {
		$getUsrAvatar = ''.$astedADM.'uploads/users/'.$_GET['id'].'/avatar/'.$itsUserAvatar.'';
	} else {
		$getUsrAvatar = ''.$astedADM.'templates/object/content/avanofile.png';
	}
}?>

    <!--Новая карточка-->
    <div class="container">

				<div class="row">
                            <div class="col-xl-4">
									<div class="card mb-2">
                                    <div class="card-header "><span><?= $itsUserName ?> <?= $itsUserSurName ?></span> </div>
                                    <div class="card-body text-center">
                                      Подразделение: <?=$userGroupsNameProfile['0']?><br>
									  Был в сети: <?php if($isUsersOnline == null){echo 'Никогда';} echo date("d.m.Y в h:i",$isUsersOnline);?>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header "><span><?= $lang['prof_picp'] ?></span> </div>
                                    <div class="card-body text-center">
                                        <img class=" avatarProf mt-2 mb-2" style="width:150px;height:150px;border-radius: 50%"
                                             src="<?=$getUsrAvatar?>" alt="">
                                        <div class="small font-italic text-muted mb-"><?= $lang['prof_uploadinfo'] ?></div>
                                        <form id="upload-image" class="form-image" enctype="multipart/form-data">
                                            <input type="file" name="image" id="image" style="display: none;">
                                            <div class="uploadtoimg" onclick="javascript:document.getElementById('image').click();"> загрузить аватар</div>
                                            <input type="submit" class="btn btn-primary btn-user btn-block btnuploadava" style="display: none;"/>
                                        </form>
                                    </div>
                                </div>
								<div class="card mb-2">
                                    <div class="card-header "><span>Статистика по задачам</span> </div>
                                    <div class="card-body">
									<?php
									$sql_userGroupsProfilesc = "SELECT * FROM `".$TerranPrefix."task` WHERE task_executor ='".$_GET['id']."'";
			$result_userGroupsProfilec = mysqli_query($link, $sql_userGroupsProfilesc);
			$numRowsProfilec = mysqli_num_rows($result_userGroupsProfilec);
			while ($userGroupsProfilex = mysqli_fetch_assoc($result_userGroupsProfilec)) {
				$task_executorProfilex[] = "{$userGroupsProfilex['task_executor']}";
				$task_statusProfilex[] = "{$userGroupsProfilex['task_status']}";
			}
			foreach ($task_statusProfilex as &$value) {
				if($value == "1"){
					$taskended += 1;
				}
			}
			if($numRowsProfilec != null){
			?>
			<strong>Всего задач:</strong> <?=$numRowsProfilec?><br>
			<strong>Закрытых задач:</strong> <?=$taskended?><br>
			<strong>Открытых задач:</strong> <?php echo $numRowsProfilec - $taskended; ?>
			<?}?>
			</div>
			<? if($numRowsProfilec != null){ ?>
			                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myPieChart" width="288" height="245" class="chartjs-render-monitor" style="display: block; width: 288px; height: 245px;"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Закрытые
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Откртые
                                        </span>
                                    </div>
                                </div> <?}?>
			
                                </div>
								
								
                            </div>
                            <div class="col-xl-8">
                                <div class="card mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center "><span><?= $lang['prof_accountdetails'] ?></span>
                                        <?if($_GET['id']!== $userID):?>
                                                <?else:?>
                                            <i class="fas fa-cog fa-sm text-blue-50 gj-cursor-pointer edit_profile" style="    background-color: #f2f4f5; border-radius: 24px; padding: 4px;"> Редактировать </i>
                                        <?endif;?>
                                    </div>
                                    <div class="card-body">
                                        <form action="" class="form-user-edit">
                                            <input type="hidden" name="status" value="profile-edit">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?= $lang['email'] ?></label>
                                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="<?= $itsUserEmail ?>" value="<?= $itsUserEmail ?>" name="email" readonly>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputFirstName"><?= $lang['firstName'] ?></label>
                                                    <input class="form-control" id="inputFirstName" type="text" placeholder="<?= $itsUserName ?>" value="<?= $itsUserName ?>" name="username" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputLastName"><?= $lang['secondName'] ?></label>
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="<?= $itsUserSurName ?>" value="<?= $itsUserSurName ?>" name="surname" readonly>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputOrgName"><?= $lang['organization'] ?></label>
                                                    <input class="form-control" id="inputOrgName" type="text" placeholder="<?=$isUserOrganization?>" value="<?=$isUserOrganization?>" name="organization"readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputLocation"><?= $lang['city'] ?></label>
                                                    <input class="form-control" id="inputLocation" type="text" placeholder="<?= $itsUserCity ?>" value="<?= $itsUserCity ?>" name="city" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputMessenger"><?= $lang['Messenger'] ?></label>
                                                <input class="form-control" id="inputMessenger" type="text" placeholder="<?= $itsUserSkype ?>" value="<?= $itsUserSkype ?>" name="messenger" readonly>
                                            </div>
											
											<?if($cofigius['0']['usrcanlang'] == "yes"){?>
											 <label class="small mb-1" for="inputMessenger">Выберите ваш язык / Change you lang</label>
											<div class="form-group">
																				<?if($userSessionLang == null){?>
																				<select  class="form-control" name="mylang" id="mylang">
																<option value="ru">RU - Русский</option>
																<option value="en">EN - Английский</option>
																				</select><?}?>
																	<?if($userSessionLang == "ru"){?>
																			<select  class="form-control" name="mylang" id="mylang">
															<option value="ru">RU - Русский</option>
															<option value="en">EN - Английский</option>
																			</select><?}?>
																					
																<?if($userSessionLang == "en"){?>
																		<select  class="form-control" name="mylang" id="mylang">
														<option value="en">EN - English</option>
														<option value="ru">RU - Russian</option>
																		</select><?}?>
							</div>
						<?}?>
                        <label class="small mb-1" for="inputMessenger">Выберите тему системы / Change theme system</label>
											<div class="form-group">
																				<?if($userSessionThemes == null){?>
																				<select  class="form-control" name="themes" id="themes">
																<option value="white">Светлая</option>
																<option value="dark">Темная</option>
																				</select><?}?>
																	<?if($userSessionThemes == "white"){?>
																			<select  class="form-control" name="themes" id="themes">
															<option value="white">Светлая</option>
															<option value="dark">Темная</option>
																			</select><?}?>
																					
																<?if($userSessionThemes == "dark"){?>
																		<select  class="form-control" name="themes" id="themes">
														<option value="dark">Темная</option>
														<option value="white">Светлая</option>
																		</select><?}?>
							</div>
 						
											
											
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputPhone"><?= $lang['phonenumber'] ?></label>
                                                    <input class="form-control" id="inputPhone" type="tel" placeholder="<?= $itsUserPhoneNumber ?>" value="<?= $itsUserPhoneNumber ?>" name="phonenumber" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="small mb-1" for="inputBirthday"><?= $lang['YearOfBirth'] ?></label>
                                                    <input class="form-control" id="inputBirthday" type="text" name="birthday" placeholder="<?=$itsUserBirtDay?>" value="<?=$itsUserBirtDay?>" readonly>
                                                </div>
                                            </div>
                                           <?if($_GET['id']!== $userID):?>
                                            <?else:?>
                                            <button class="btn btn-primary" type="submit"><?= $lang['prof_savechanges'] ?></button>
                                            <?endif;?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

						
						


<div class="col-sm-4 coll-up">
<div class="image-previews  ">
													<img id="preview" src="" alt="">
												</div>

<script>

(function($) {
    $(".form-user-edit").submit(function (event) {
        event.preventDefault()

        jQuery.ajax({
            type: "POST",
            url: "/asted/core/core.php",
            data:$(this).serialize(),
            success: function(response) {
                if(response ==="1"){
                    $(".message_status").slideDown();
                    setTimeout(()=>{
                        $(".message_status").slideUp();
                    },600)
                    setTimeout(()=>{
                        window.location.reload();
                    },900)
                   
                }else{
                    alert("ошибка")
                }

            }
        });
    })


        $('input[name="birthday"]').daterangepicker({
            singleDatePicker: true,
            locale: {
                format: 'DD.MM.YYYY'
            }
        });

    $(".edit_profile").on( "click", function() {
        $(".form-user-edit input").prop('readonly', false)

    })
    $( ".uploadtoimg" ).on( "click", function() {
	  $(this).css({ "display": "none"});
	  $(".btnuploadava").css({ "display": "block"});
	  $(".coll-up").css({ "margin-top": "-130px"});
	  $(".coll-up").css({ "padding-bottom": "30px"});
	});
	$( ".btnuploadava" ).on( "click", function() {
		alert("Аватар загружен");
		setTimeout("location.reload()", 1000);
	});
	
})(jQuery);
</script>
												<div id="result">
												</div>
</div>


            </div>

        </div>


    </div>

 <script>
$(document).ready(function(){
	 // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Закрытые задачи", "Открытые задачи"],
    datasets: [{
      data: [<?=$taskended?>, <?php echo $numRowsProfilec - $taskended; ?>],
      backgroundColor: ['#36b9cc', '#1cc88a'],
      hoverBackgroundColor: ['#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
	
});
</script>
    <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>