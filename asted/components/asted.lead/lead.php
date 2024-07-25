<? include "templates/header.php";
if($userGroupsCanviewlead['0'] == "true"){
if ($_POST['submit'] == 'crelead') {
	$createTitleProject = $_POST['crenewsproject'];
	$createDescriptProject = $_POST['credesctproject'];
	$createPiceProject = $_POST['crecost'];
	$createPiceOutProject = $_POST['crecostout'];
	$createEndDateProject = $_POST['creenddate'];
	$createStageProject = $_POST['stagep'];
	$sql = "INSERT INTO `crm_leads` (nameproject, descriptionproject, price, paidout, leadendproject, projectstage) VALUES ('{$createTitleProject}','{$createDescriptProject}','{$createPiceProject}', '{$createPiceOutProject}', '{$createEndDateProject}', '{$createStageProject}')";
	if (mysqli_query($link, $sql)){
          //header('Location: http://crm.terrangroup.biz/site_add.php?result=1305');
          echo '<meta http-equiv="refresh" content="0;URL=lead.php?result=1305" />';
    }else{
        echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
        TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: '.$sql.' <br> Ошибка: '.mysqli_error($link).'
    </div></div>';
    }
}
if ($_POST['submit'] == 'newsadd') {
	$updateID = $_POST['updateid'];
	$updateTITLES = $_POST['updatetitle'];
	$updateDISCRIPT = $_POST['updatediskcr'];
	$updatePICE = $_POST['updatecost'];
	$updatePICEOUT = $_POST['updatecostout'];
	$updateDATES = $_POST['updatedate'];
	$updateSTAGE = $_POST['updatestade'];
	$sqlUloadAva = "UPDATE crm_leads SET nameproject='" . $updateTITLES . "', descriptionproject='" . $updateDISCRIPT . "', price='" . $updatePICE . "', paidout='" . $updatePICEOUT . "', leadendproject='" . $updateDATES . "', projectstage='" . $updateSTAGE . "' WHERE id='{$updateID}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=lead.php?result=13" />';
}


if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Лид успешно добавлен.
	</div></div>
<?}}}if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '13'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Лид успешно обновлён.
	</div></div>
<?}}}?>
<link href="templates/css/lead-deal.css" rel="stylesheet">
<style>
body{overflow-x: hidden;}
.form-control{border: 0px;}
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
	  <div class="modal fade" id="myModalLeadCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Добавление нового лида</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
												<form action="" method="post">
                            <span><strong>Название проекта: </strong></span><input class="form-control"   name="crenewsproject" id="crenewsproject" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="credesctproject" id="credesctproject" type="тема"> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" name="crecost" id="crecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="crecostout" id="crecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" name="creenddate" id="creenddate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="stagep" id="stagep">
							<option value="1">На этапе договора</option>
                            <option value="2">Приостановлен/Ожижание</option>
							<option value="3">ВАЖНО</option>
							<option value="4">В работе</option>
							<option value="5">На этапе закрытия</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="crelead" name="crelead" id="id0cre"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('id0cre').click();" class="btn btn-primary">Добавить лида</button>
                        </div>
                    </div>
                </div>
            </div>
  <div class="deal__column">
    <div class="deal__column--new">
      <h5 class="column__title">На этапе договора</h5>
      <div class="column__coins"><span>0</span> руб</div>
	  <div class="column__coinstotal"><span>0</span> руб</div>
      <button class="column__button--add" data-target="#myModalLeadCreate" data-toggle="modal">+</button>
      <div class="column__project">
	  <?php $sqluser = "SELECT * FROM `".$TerranPrefix."leads`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLeadsid = "{$itsuser['id']}";
							$itsLeadsnameproject = "{$itsuser['nameproject']}";
							$itsLeaddescriptionproject = "{$itsuser['descriptionproject']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLeadprice = "{$itsuser['price']}";
							$itsLeadpriceout = "{$itsuser['paidout']}";
							$itsLogip = "{$itsuser['ip']}";
							$itsProjectStage = "{$itsuser['projectstage']}";
							$itEndproject = "{$itsuser['leadendproject']}";							
							if($itsProjectStage == "1"){							?>
							        <div class="project" data-toggle="modal" data-target="#myModalLead<?=$itsLeadsid?>">
          <img src="./templates/img/laed-deal-icon.svg" alt="icon" class="project__icon">
          <h4 class="project__title"><?=$itsLeadsnameproject?></h4>
          <div class="block__info--none">
            <input type="text" class="block__info--coin" value="<?=$itsLeadpriceout?>">
			<input type="text" class="block__info--coinstotal" value="<?=$itsLeadprice?>">
            <input type="download" class="block__info--file" value="item.doc">
            <input type="number" class="block__info--count" value="2">
            <input type="date" class="block__info--date" value="2021-03-21">
          </div>
        </div>
		
		        <div class="modal fade" id="myModalLead<?=$itsLeadsid?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$itsLeadsnameproject?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
						<input class="form-control" value="<?=$itsLeadsid?>"  name="updateid" id="updateid" type="тема" style="display:none;">
                            <span><strong>Название проекта: </strong></span><input class="form-control" value="<?=$itsLeadsnameproject?>"  name="updatetitle" id="updatetitle" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="updatediskcr" id="updatediskcr" type="тема"> <?=$itsLeaddescriptionproject?> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" value="<?=$itsLeadprice?>"  name="updatecost" id="updatecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="updatecostout" id="updatecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" value="<?=$itEndproject?>"  name="updatedate" id="updatedate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="updatestade" id="stagep">
							<option value="1">На этапе договора</option>
							<option value="2">Приостановлен/Ожижание</option>
							<option value="3">ВАЖНО</option>
							<option value="4">В работе</option>
							<option value="5">На этапе закрытия</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="idup<?=$itsLeadsid?>"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('idup<?=$itsLeadsid?>').click();" class="btn btn-primary">Обновить информацию</button>
                        </div>
                    </div>
                </div>
            </div>
							<?}}?>

      </div>
    </div>
    <div class="deal__column--documental">
      <h5 class="column__title">Приостановлен/Ожижание</h5>
      <div class="column__coins"><span>0</span> руб</div>
	  <div class="column__coinstotal"><span>0</span> руб</div>
      <button class="column__button--add" data-target="#myModalLeadCreate" data-toggle="modal" >+</button>
	  

			
			
      <div class="column__project">
        <?php $sqluser = "SELECT * FROM `".$TerranPrefix."leads`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLeadsid = "{$itsuser['id']}";
							$itsLeadsnameproject = "{$itsuser['nameproject']}";
							$itsLeaddescriptionproject = "{$itsuser['descriptionproject']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLeadprice = "{$itsuser['price']}";
							$itsLeadpriceout = "{$itsuser['paidout']}";
							$itsLogip = "{$itsuser['ip']}";
							$itsProjectStage = "{$itsuser['projectstage']}";
							$itEndproject = "{$itsuser['leadendproject']}";								
							if($itsProjectStage == "2"){							?>
							        <div class="project" data-toggle="modal" data-target="#myModalLead<?=$itsLeadsid?>">
          <img src="./templates/img/laed-deal-icon.svg" alt="icon" class="project__icon">
          <h4 class="project__title"><?=$itsLeadsnameproject?></h4>
          <div class="block__info--none">
            <input type="text" class="block__info--coin" value="<?=$itsLeadpriceout?>">
			<input type="text" class="block__info--coinstotal" value="<?=$itsLeadprice?>">
            <input type="download" class="block__info--file" value="item.doc">
            <input type="number" class="block__info--count" value="2">
            <input type="date" class="block__info--date" value="2021-03-21">
          </div>
        </div>
		
		        <div class="modal fade" id="myModalLead<?=$itsLeadsid?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$itsLeadsnameproject?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
						<input class="form-control" value="<?=$itsLeadsid?>"  name="updateid" id="updateid" type="тема" style="display:none;">
                            <span><strong>Название проекта: </strong></span><input class="form-control" value="<?=$itsLeadsnameproject?>"  name="updatetitle" id="updatetitle" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="updatediskcr" id="updatediskcr" type="тема"> <?=$itsLeaddescriptionproject?> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" value="<?=$itsLeadprice?>"  name="updatecost" id="updatecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="updatecostout" id="updatecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" value="<?=$itEndproject?>"  name="updatedate" id="updatedate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="updatestade" id="stagep">
							<option value="2">Приостановлен/Ожижание</option>
							<option value="1">На этапе договора</option>
                            <option value="3">ВАЖНО</option>
							<option value="4">В работе</option>
							<option value="5">На этапе закрытия</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="idup<?=$itsLeadsid?>"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('idup<?=$itsLeadsid?>').click();" class="btn btn-primary">Обновить информацию</button>
                        </div>
                    </div>
                </div>
            </div>
							<?}}?>
      </div>
    </div>
    <div class="deal__column--reference">
      <h5 class="column__title">ВАЖНО</h5>
      <div class="column__coins"><span>0</span> руб</div>
	  <div class="column__coinstotal"><span>0</span> руб</div>
      <button class="column__button--add" data-target="#myModalLeadCreate" data-toggle="modal">+</button>
      <div class="column__project">
<?php $sqluser = "SELECT * FROM `".$TerranPrefix."leads`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLeadsid = "{$itsuser['id']}";
							$itsLeadsnameproject = "{$itsuser['nameproject']}";
							$itsLeaddescriptionproject = "{$itsuser['descriptionproject']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLeadprice = "{$itsuser['price']}";
							$itsLeadpriceout = "{$itsuser['paidout']}";
							$itsLogip = "{$itsuser['ip']}";	
							$itsProjectStage = "{$itsuser['projectstage']}";	
							$itEndproject = "{$itsuser['leadendproject']}";	
							if($itsProjectStage == "3"){							?>
							        <div class="project" data-toggle="modal" data-target="#myModalLead<?=$itsLeadsid?>">
          <img src="./templates/img/laed-deal-icon.svg" alt="icon" class="project__icon">
          <h4 class="project__title"><?=$itsLeadsnameproject?></h4>
          <div class="block__info--none">
            <input type="text" class="block__info--coin" value="<?=$itsLeadpriceout?>">
			<input type="text" class="block__info--coinstotal" value="<?=$itsLeadprice?>">
            <input type="download" class="block__info--file" value="item.doc">
            <input type="number" class="block__info--count" value="2">
            <input type="date" class="block__info--date" value="2021-03-21">
          </div>
        </div>
		
		        <div class="modal fade" id="myModalLead<?=$itsLeadsid?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$itsLeadsnameproject?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
						<input class="form-control" value="<?=$itsLeadsid?>"  name="updateid" id="updateid" type="тема" style="display:none;">
                            <span><strong>Название проекта: </strong></span><input class="form-control" value="<?=$itsLeadsnameproject?>"  name="updatetitle" id="updatetitle" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="updatediskcr" id="updatediskcr" type="тема"> <?=$itsLeaddescriptionproject?> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" value="<?=$itsLeadprice?>"  name="updatecost" id="updatecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="updatecostout" id="updatecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" value="<?=$itEndproject?>"  name="updatedate" id="updatedate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="updatestade" id="stagep">
							<option value="3">ВАЖНО</option>
							<option value="1">На этапе договора</option>
                            <option value="2">Приостановлен/Ожижание</option>
							<option value="4">В работе</option>
							<option value="5">На этапе закрытия</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="idup<?=$itsLeadsid?>"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('idup<?=$itsLeadsid?>').click();" class="btn btn-primary">Обновить информацию</button>
                        </div>
                    </div>
                </div>
            </div>
							<?}}?>
      </div>
    </div>
    <div class="deal__column--work">
      <h5 class="column__title">В работе</h5>
      <div class="column__coins"><span>0</span> руб</div>
	  <div class="column__coinstotal"><span>0</span> руб</div>
      <button class="column__button--add" data-target="#myModalLeadCreate" data-toggle="modal">+</button>
      <div class="column__project">
<?php $sqluser = "SELECT * FROM `".$TerranPrefix."leads`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLeadsid = "{$itsuser['id']}";
							$itsLeadsnameproject = "{$itsuser['nameproject']}";
							$itsLeaddescriptionproject = "{$itsuser['descriptionproject']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLeadprice = "{$itsuser['price']}";
							$itsLeadpriceout = "{$itsuser['paidout']}";
							$itsLogip = "{$itsuser['ip']}";	
							$itsProjectStage = "{$itsuser['projectstage']}";
							$itEndproject = "{$itsuser['leadendproject']}";	
							if($itsProjectStage == "4"){							?>
							        <div class="project" data-toggle="modal" data-target="#myModalLead<?=$itsLeadsid?>">
          <img src="./templates/img/laed-deal-icon.svg" alt="icon" class="project__icon">
          <h4 class="project__title"><?=$itsLeadsnameproject?></h4>
          <div class="block__info--none">
            <input type="text" class="block__info--coin" value="<?=$itsLeadpriceout?>">
			<input type="text" class="block__info--coinstotal" value="<?=$itsLeadprice?>">
            <input type="download" class="block__info--file" value="item.doc">
            <input type="number" class="block__info--count" value="2">
            <input type="date" class="block__info--date" value="2021-03-21">
          </div>
        </div>
		
		        <div class="modal fade" id="myModalLead<?=$itsLeadsid?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$itsLeadsnameproject?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
						<input class="form-control" value="<?=$itsLeadsid?>"  name="updateid" id="updateid" type="тема" style="display:none;">
                            <span><strong>Название проекта: </strong></span><input class="form-control" value="<?=$itsLeadsnameproject?>"  name="updatetitle" id="updatetitle" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="updatediskcr" id="updatediskcr" type="тема"> <?=$itsLeaddescriptionproject?> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" value="<?=$itsLeadprice?>"  name="updatecost" id="updatecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="updatecostout" id="updatecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" value="<?=$itEndproject?>"  name="updatedate" id="updatedate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="updatestade" id="stagep">
							<option value="4">В работе</option>
							<option value="1">На этапе договора</option>
                            <option value="2">Приостановлен/Ожижание</option>
							<option value="3">ВАЖНО</option>
							<option value="5">На этапе закрытия</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="idup<?=$itsLeadsid?>"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('idup<?=$itsLeadsid?>').click();" class="btn btn-primary">Обновить информацию</button>
                        </div>
                    </div>
                </div>
            </div>
							<?}}?>
      </div>
	  
    </div>
    <div class="deal__column--closed">
      <h5 class="column__title">На этапе закрытия</h5>
      <div class="column__coins"><span>0</span> руб</div>
	  <div class="column__coinstotal"><span>0</span> руб</div>
      <button class="column__button--add" data-target="#myModalLeadCreate" data-toggle="modal">+</button>
      <div class="column__project">
       <?php $sqluser = "SELECT * FROM `".$TerranPrefix."leads`";
							$resultuser = mysqli_query($link, $sqluser);
							while ($itsuser = mysqli_fetch_assoc($resultuser)) {
							$itsLeadsid = "{$itsuser['id']}";
							$itsLeadsnameproject = "{$itsuser['nameproject']}";
							$itsLeaddescriptionproject = "{$itsuser['descriptionproject']}";	
							$itsLogtype = "{$itsuser['type']}";
							$itsLeadprice = "{$itsuser['price']}";
							$itsLeadpriceout = "{$itsuser['paidout']}";
							$itsLogip = "{$itsuser['ip']}";
							$itsProjectStage = "{$itsuser['projectstage']}";
							$itEndproject = "{$itsuser['leadendproject']}";	
							if($itsProjectStage == "5"){							?>
							        <div class="project" data-toggle="modal" data-target="#myModalLead<?=$itsLeadsid?>">
          <img src="./templates/img/laed-deal-icon.svg" alt="icon" class="project__icon">
          <h4 class="project__title"><?=$itsLeadsnameproject?></h4>
          <div class="block__info--none">
            <input type="text" class="block__info--coin" value="<?=$itsLeadpriceout?>">
			<input type="text" class="block__info--coinstotal" value="<?=$itsLeadprice?>">
            <input type="download" class="block__info--file" value="item.doc">
            <input type="number" class="block__info--count" value="2">
            <input type="date" class="block__info--date" value="2021-03-21">
          </div>
        </div>
		
		        <div class="modal fade" id="myModalLead<?=$itsLeadsid?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel"><?=$itsLeadsnameproject?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
						<input class="form-control" value="<?=$itsLeadsid?>"  name="updateid" id="updateid" type="тема" style="display:none;">
                            <span><strong>Название проекта: </strong></span><input class="form-control" value="<?=$itsLeadsnameproject?>"  name="updatetitle" id="updatetitle" type="тема">
                            <span><strong>Описание проекта: </strong></span><textarea class="form-control" name="updatediskcr" id="updatediskcr" type="тема"> <?=$itsLeaddescriptionproject?> </textarea>
							<span><strong>Стоимость проекта: </strong></span><input class="form-control" type="number" value="<?=$itsLeadprice?>"  name="updatecost" id="updatecost" type="тема">
							<span><strong>Остаточная стоимость: </strong></span><input class="form-control" type="number" value="<?=$itsLeadpriceout?>" name="updatecostout" id="updatecostout" type="тема">
							<span><strong>Ориентировочная дата завершения проекта: </strong></span><input class="form-control" value="<?=$itEndproject?>"  name="updatedate" id="updatedate" type="тема">
						<span><strong>Стадия проекта: </strong></span>
						<select class="form-control" name="updatestade" id="stagep">
							<option value="5">На этапе закрытия</option>
							<option value="1">На этапе договора</option>
                            <option value="2">Приостановлен/Ожижание</option>
							<option value="3">ВАЖНО</option>
							<option value="4">В работе</option>
						</select>
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="idup<?=$itsLeadsid?>"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('idup<?=$itsLeadsid?>').click();" class="btn btn-primary">Обновить информацию</button>
                        </div>
                    </div>
                </div>
            </div>
							<?}}?>
      </div>
    </div>
  </div>
</div>

<div class="modal__deal">
  <div class="modal__add">
    <div class="modal__add--inner">
      <div class="add__info--about">
        <div class="info__title">
          <img src="./templates/img/deal-user-icon.svg" alt="user">
          <h5 class="info__title--title">Новый проект</h5>
        </div>
        <div class="info__date">
          <img src="./templates/img/deal-calendar-icon.svg" alt="calendar">
          <span class="info__date--calendar">б/д</span>
        </div>
      </div>
      <div class="add__info--closed">
        <img src="./templates/img/deal-closed-icon.svg" alt="closed">
      </div>
    </div>
    <form class="modal__add--form">
      <div class="project__block ">
        <label for="name__project">
          <h6>Название проекта:</h6>
        </label>
        <input type="text" name="nameProject" id="name__project" placeholder="Название проекта">
      </div>
      <div class="project__block">
        <label for="file__project">
          <h6>Загрузить договор в doc файле:</h6>
        </label>
        <input type="file" name="fileProject" id="file__project">
      </div>
      <div class="project__block">
        <label for="coin__project">
          <h6>Стоимость проекта:</h6>
        </label>
        <input type="text" name="coinProject" id="coin__project" placeholder="Стоимость проекта">
      </div>
      <div class="project__block">
        <label for="count__project">
          <h6>Количество частей оплаты проекта</h6>
        </label>
        <input type="number" name="countProject" min='1' max='5' id="count__project">
      </div>
      <div class="project__block">
        <label for="date__project">
          <h6>Дедлайн проекта:</h6>
        </label>
        <input type="date" name="dateProject" id="date__project">
      </div>
    </form>
    <button class="modal__add--btn btn">Добавить</button>
  </div>
</div>


<div class="modal__project">
  <div class="modal__open">
    <div class="modal__open--inner">
      <div class="open__info--about">
        <div class="info__title">
          <img src="./templates/img/deal-user-icon.svg" alt="user">
          <h5 class="info__title--title">Новый проект</h5>
        </div>
        <div class="info__date">
          <img src="./templates/img/deal-calendar-icon.svg" alt="calendar">
          <input type="date" id="date__project" value=>
        </div>
      </div>
      <div class="open__info--closed">
        <img src="./templates/img/deal-closed-icon.svg" alt="closed">
      </div>
    </div>
    <form class="modal__open--form">
      <div class="project__block">
        <label for="coin__project">
          <h6>Стоимость проекта:</h6>
        </label>
        <input type="text" name="coinProject" id="coin__project" placeholder="Стоимость проекта" value>
      </div>
      <div class="project__block">
        <label for="count__project">
          <h6>Количество частей оплаты проекта</h6>
        </label>
        <input type="number" name="countProject" min='1' max='5' id="count__project" value>
      </div>
      <div class="project__block">
        <label for="file__project">
          <h6>Скачать договор:</h6>
        </label>
        <a href="images/xxx.jpg" id="file__project" download>Скачать файл</a>
      </div>
    </form>
    <button class="modal__save--btn btn">Сохранить</button>
  </div>
</div>
<!-- /.container-fluid -->
<? }else{echo "TERRAN: Доступ запрещён";} include "templates/footer.php"; ?>
<script src="templates/js/lead-deal.js"></script>