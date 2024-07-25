 <? include "templates/header.php"; 
 
 if ($_POST['submit'] == 'configedit') {
	$sql = "UPDATE `crm_configproject` SET showuser='" . $_POST['showuser'] . "'";
	$result = mysqli_query($link, $sql);
	
		$sqlv = "UPDATE `crm_configproject` SET showwiki='" . $_POST['showwiki'] . "'";
		$resultv = mysqli_query($link, $sqlv);
 ?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: <?=$lang['settings_saved_successfully']?>
	</div></div>
	<meta http-equiv="refresh" content="1;URL=projects_setting.php" />
<?}?>
 
 <!-- Begin Page Content -->
        <div class="container-fluid">
		
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Настройки проектов</h1>
            <a href="./projects.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward fa-sm text-white-50"></i> Вернутся к списку проектов</a>
          </div>
    
          <!-- Content Row -->
          <div class="row">
		  
		  
		<div class="col-12 card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['basic_settings']?> TerranCRM</h6>
                </div>
                <div class="card-body">
		  <form action="" method="post">
		  
		  
		  
		  						
						<label for="exampleInputPassword1">Показывать подключенных пользователей:</label>
                        <select class="form-control" name="showuser" id="showuser">
						<?if($cofigproject['0']['showuser'] == "on"){?>
                            <option value="on"><?=$lang['yes']?></option>
                            <option value="off"><?=$lang['no']?></option>
						<?}?>
 						<?if($cofigproject['0']['showuser'] == "off"){?>
							<option value="off"><?=$lang['no']?></option>
                            <option value="on"><?=$lang['yes']?></option>
						<?}?>  
                        </select>
		  <hr>
								<label for="exampleInputPassword1">Показывать вики:</label>
                        <select class="form-control" name="showwiki" id="showwiki">
						<?if($cofigproject['0']['showwiki'] == "on"){?>
                            <option value="on"><?=$lang['yes']?></option>
                            <option value="off"><?=$lang['no']?></option>
						<?}?>
 						<?if($cofigproject['0']['showwiki'] == "off"){?>
							<option value="off"><?=$lang['no']?></option>
                            <option value="on"><?=$lang['yes']?></option>
						<?}?>  
                        </select>  
		  
		   <input type="submit" name="submit" style="display:none" value="configedit" name="configedit" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
										   
										    </form>
											<button type="submit" onclick="javascript:document.getElementById('id0').click();" value="configedit" name="configedit" class="btn btn-primary  mt-3"><?=$lang['save']?></button>
		  
		  </div></div>
		  
		  </div>
		</div>
	 <? include "templates/footer.php"; ?>