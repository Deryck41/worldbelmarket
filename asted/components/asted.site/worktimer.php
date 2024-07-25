<? include "templates/header.php";?>
 <div class="container-fluid">
   <?if($cofigius['0']['jobtime'] == "on"){?>
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Система учета рабочего времени сотрудников</h1>
            </div>
		  
		    <div class="card">
    <div class="card-header">
       Отчетность по рабочему времени сотрудников
    </div>
    <div class="card-body collapse show">
 <?php

 $sql_region = "SELECT * FROM `crm_timeuser`";
  $result_region = mysqli_query($link, $sql_region);
  while ($region = mysqli_fetch_assoc($result_region)) {
    $astedTimerIDusr = "{$region['id_user']}";
    $sqluser = "SELECT * FROM `".$TerranPrefix."users` WHERE `id` = " . $astedTimerIDusr . "; ";
    $resultuser = mysqli_query($link, $sqluser);
    while ($itsuser = mysqli_fetch_assoc($resultuser)) {
      $itsUserName = "{$itsuser['name']}";
      $itsUserSurName = "{$itsuser['surname']}";
   }
    $astedTimerNow = "{$region['time_now']}";
    $astedTimerActivity = "{$region['activity']}";
    ?>
Пользователь: <a href="<?=$astedADM?>profile/<?=$astedTimerIDusr?>/"><?=$itsUserName?> <?=$itsUserSurName?></a> <?=date("d.m.Y",$astedTimerNow);?> <?=$astedTimerActivity?><hr>
    <?
 }
 ?>
    </div>
    </div>  
    <?}else{
		 echo "Asted: функция учета рабочего времени отключена"; 
    }?>
    </div>
 <? include "templates/footer.php"; ?>