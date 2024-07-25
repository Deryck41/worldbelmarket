<? include "templates/header.php";
if ($_POST['submit'] == 'salesadd') {
	$usrPost = $_POST['usr'];
	$titlePost = $_POST['title'];
	$sumPost = $_POST['sum'];
	$dataPost = date("Y-m-d");
	$statusPost = $_POST['statusic'];
	$sql = "INSERT INTO `crm_salaries` (data, title, worker, summ, status) VALUES ('{$dataPost}','{$titlePost}','{$usrPost}', '{$sumPost}', '{$statusPost}')";
    if (mysqli_query($link, $sql)){
        //header('Location: http://crm.terrangroup.biz/index.php?result=1305');
	    echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'salaries/result/1305/" />';
  }else{
      echo '<div class="container-fluid"><div class="alert alert-warning" role="alert">
      TerranCRM: Ошибка добавления записи!!!<br> Запрос в базу: '.$sql.' <br> Ошибка: '.mysqli_error($link).'
  </div></div>';
  }
}
if($_POST['del'] != null){
	$sqlportfolio = "DELETE FROM crm_salaries WHERE id=".$_POST['del'].""	;
	mysqli_query($link, $sqlportfolio);
	echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'salaries/result/1991/" />';
	echo $_POST['del'];
}
if($_POST['updatedata'] != null){
	$sqlUloadAva = "UPDATE crm_salaries SET data='" . date("Y-m-d", strtotime($_POST['updatedata'])) . "', title='" . $_POST['updatetitle'] . "', worker='" . $_POST['updateusr'] . "', summ='" . $_POST['updatesum'] . "', status='" . $_POST['updatestatusic'] . "' WHERE id='{$_POST['updateids']}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL='.$astedADM.'salaries/result/0513/" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Операция произведена
	</div></div>
<?}}}if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1991'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Начисление удалены
	</div></div>
<?}}}if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '0513'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Операция обновленаа
	</div></div>
<?}}}?>
<div class="container-fluid">

<div class="row">
    <div class="d-flex flex-column col-auto">
Сортировка по месяцам:
<select class="form-control responsible salaries-sorter" name="statusic" style="width: 250px;" id="statusic">
							<option value="oll">За весь период</option>
							<option value="01">Январь</option>
							<option value="02">Февраль</option>
							<option value="03">Март</option>
							<option value="04">Апрель</option>
							<option value="05">Май</option>
							<option value="06">Июнь</option>
							<option value="07">Июль</option>
							<option value="08">Август</option>
							<option value="09">Сентябрь</option>
							<option value="10">Октябрь</option>
							<option value="11">Ноябрь</option>
							<option value="12">Декабрь</option>
                        </select>
</div>
    <div class="d-flex flex-column col-auto">
    Сортировка по сотрудникам:
    <select class="form-control responsible salaries-user" style="width: 250px;" name="" id="">
        <option value="oll">Все</option>
        <?php echo implode ('', $usersoption); ?>
    </select>
    </div>
</div>

<?php
if($userGroupsCanviewsalaries['0'] == "true"){?>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="Create-Task-Form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?=$lang['payroll']?>:</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="" method="post">
                        <span><strong><?=$lang['whom']?>: </strong></span>
						<input type="hidden" class="form-control autor" value="<?=$_SESSION['userid']?>">
                        <select class="form-control responsible" name="usr" id="usr">
							<?php echo implode ('', $usersoption); ?>
                        </select>
                        <br>
						<span><strong><?=$lang['task']?>: </strong></span>
                        <input class="form-control theme" name="title" id="title" type="тема">
						<br>
						<span><strong><?=$lang['accruals']?>: </strong></span>
                        <input class="form-control theme" name="sum" id="sum" type="тема">
                        <br>
						<select class="form-control responsible" name="statusic" id="statusic">
							<option value="true">Выплачено</option>
							<option value="false">Не выплачено</option>
                        </select>
						<br>
						<input type="submit" name="submit" style="display:none" value="salesadd" name="salesadd" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
					</form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                        <button type="submit"  onclick="javascript:document.getElementById('id0').click();"  class="btn btn-primary"><?=$lang['add']?></button>
                    </div>
                </div>
            </div>
        </div>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['salaries']?></h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i><?=$lang['payroll']?></a>
          </div>
		  
		  
		  
		  <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?=$lang['wages']?></h6>
                </div>

				
				          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$backlinks["name"]?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered salaries-table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><?=$lang['completion_date']?>:</th>
                      <th><?=$lang['task']?>:</th>
					  <th><?=$lang['employee']?>:</th>
					  <th><?=$lang['amount']?>:</th>
					  <th><?=$lang['status']?>:</th>
					  <th><?=$lang['management']?>::</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th><?=$lang['completion_date']?>:</th>
                      <th><?=$lang['task']?>:</th>
					  <th><?=$lang['employee']?>:</th>
					  <th><?=$lang['amount']?>:</th>
					  <th><?=$lang['status']?>:</th>
					  <th><?=$lang['management']?>::</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?		    
				  $totalsum = 0;
				  $totalsumbuy = 0;
				  $totalsumnobuy = 0;
				  while ($salaries = mysqli_fetch_assoc($result_salaries)) {$datacreate = "{$salaries['data']}";$title = "{$salaries['title']}";$sum = "{$salaries['summ']}";$id = "{$salaries['id']}";$taskStatus = "{$salaries['status']}";$text = "{$salaries['worker']}"; 
		
			$sql_usersalaries = "SELECT * FROM `crm_users` WHERE id ='".$text."'";
		$result_usersalaries = mysqli_query($link, $sql_usersalaries);
		$usersalaries = mysqli_fetch_array($result_usersalaries);
		if($taskStatus == 'false'){
			$statuttask = "Не оплачено";
			$statustaskstule = "task_status__open";
			$statustaskstulestyle = 'style="background: #fff;"';
		}else{
			$statuttask = "Оплачено";
			$statustaskstule = "task_status__clouse";
			$statustaskstulestyle = 'style="background: #e2e2e6;"';
		}
	
		
		if($taskStatus != 13){
$totalsum += $sum;
if($taskStatus != 'false'){
	$totalsumbuy += $sum;
}
if($taskStatus == 'false'){
	$totalsumnobuy += $sum;
}
			?>
			
					    <div class="modal fade" id="myModalClosed<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="Create-Task-Form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Удалить начисление №<?=$id?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="" method="post">
					
					<input class="form-control theme" style="display:none;"  name="del" id="del" value="<?=$id?>" type="тема">
						<input type="submit" name="submit" style="display:none" value="deletet" name="deletet" id="delet<?=$id?>"
                                           class="btn btn-primary btn-user btn-block"/>
										   <button type="submit"  onclick="javascript:document.getElementById('delet<?=$id?>').click();" style="width: 70%;" class="btn btn-primary">Удалить</button>
										   <button type="button" class="btn btn-secondary" data-dismiss="modal">Не удалять</button>
                        
					</form>
                    </div>
                   
                </div>
            </div>
        </div>
		
		
		
		    <div class="modal fade" id="myEditModalClosed<?=$id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" id="Create-Task-Form">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myEditModalClosed<?=$id?>">Редактировать выплату: №<?=$id?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
					<form action="" method="post">
                       
                        <span><strong><?=$lang['whom']?>:</strong></span>
						<input type="hidden" class="form-control autor" value="<?=$_SESSION['userid']?>">
                        <select class="form-control responsible" name="updateusr" id="updateusr">
                        <?
                        $sql_userSalar = "SELECT * FROM `crm_users`";
                        $result_userSalar = mysqli_query($link, $sql_userSalar);
                        while ($userSalar = mysqli_fetch_assoc($result_userSalar)) {
                            $iduu = "{$userSalar['id']}";
                            $iduuname = "{$userSalar['name']}";
                            $iduusur = "{$userSalar['surname']}";
                            ?><option <?php if($iduu == $usersalaries['id']){echo 'selected selected="selected"';}?> value="<?=$iduu?>"><?=$iduuname?> <?=$iduusur?></option>
                        <?}?>
                        </select>
                        <br>
						<span><strong><?=$lang['task']?>: </strong></span>
						<input class="form-control theme" name="updateids" id="updateids" style="display: none;" type="тема" value="<?=$id?>">
                        <input class="form-control theme" name="updatetitle" id="updatetitle" type="тема" value="<?=$title?>">
						<br>
						<span><strong><?=$lang['accruals']?>: </strong></span>
                        <input class="form-control theme" name="updatesum" id="updatesum" type="тема" value="<?=$sum?>">
						<br>
						<span><strong>Дата: </strong></span>
                        <input class="form-control theme" name="updatedata" id="updatedata" type="тема" value="<?= date("d.m.Y", strtotime($datacreate))?>">
                        <br>
						<select class="form-control responsible" name="updatestatusic" id="updatestatusic">
						<?if($statuttask=="Оплачено"){?>
						<option value="true">Выплачено</option>
						<option value="false">Не выплачено</option><?}else{?>
						<option value="false">Не выплачено</option>
						<option value="true">Выплачено</option><?}?>
                        </select>
						<br>
						<input type="submit" name="submit" style="display:none" value="updatesalesadd" name="updatesalesadd" id="updateid0<?=$id?>"
                                           class="btn btn-primary btn-user btn-block"/>
					</form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                        <button type="submit"  onclick="javascript:document.getElementById('updateid0<?=$id?>').click();"  class="btn btn-primary">Обновить</button>
                    </div>
                </div>
            </div>
        </div>

                    <tr id="<?=$usersalaries["id"]?>">
                      <td class="salariesData"  data="<?=date("m", strtotime($datacreate))?>" <?=$statustaskstulestyle?>><?=date("d.m.Y", strtotime($datacreate))?></td>
                      <td <?=$statustaskstulestyle?>><?=$title?> <!--<a href="task.php?id=<?=$id?>"><?=$title?></a>--></td>
					  <td <?=$statustaskstulestyle?>><a href="/profile.php?id=<?=$text?>"><?=$usersalaries['name']?> <?=$usersalaries['surname']?></a></td>
					  <td <?=$statustaskstulestyle?> class="tdsum"><span class="sumcont"><?=$sum?></span> Руб.</td>
                      <td <?=$statustaskstulestyle?>><?=$statuttask?></td>
					  <td <?=$statustaskstulestyle?>><i class="fa fa-ban" data-toggle="modal" data-target="#myModalClosed<?=$id?>" ></i> <i class="fa fa-cog lead_comment-edit pointer" data-toggle="modal" data-target="#myEditModalClosed<?=$id?>"></i></td>
					  <!--<td <?=$statustaskstulestyle?>> <a href="edittask.php?id=<?=$id?>"><i class="fas fa-fw fa-edit" style="float: right;color: cadetblue;margin-top: 3px;margin-left: 20px;"></i></td>-->
                    </tr>
				  <?}}?>
                  </tbody>
                </table>
              </div>
			  <strong><?=$lang['total_amount']?>: </strong> <?=$totalsum?> <i>Руб</i><br>
			  <strong><?=$lang['paid_out']?>: </strong> <?=$totalsumbuy?> <i>Руб</i><br>
			  <strong><?=$lang['remains']?>: </strong> <?=$totalsumnobuy?> <i>Руб</i>
			  <div id="res" style="font-weight:bold"></div>
            </div>
          </div>
				
				
				
              </div>
			  <?}else{?>
<div class="alert alert-info" role="alert">
<?=$lang['access_to_the_page_is_closed']?>
</div>
<?}?>
</div>
<script>
    $(document).ready(function () {
        $(".salaries-sorter").change(function(){
            $(".salaries-table tbody tr").hide()
            $(`[data="${$(this).val()}"]`).parent().show();
            if($(this).val()==="oll"){
                $(".salaries-table tbody tr").show()
            }
        });
        $(".salaries-user").change(function(){
            console.log($(this).val())



	var sum = 0;
	  $(`.salaries-table tbody tr[id="${$(this).val()}"]`).each(function(){
		  sum+=parseInt($('.sumcont', this).text());
	  });
	  console.log(sum);
	  $('#res').html(`Всего выплачено сотруднику: ${sum} руб`);





            $(".salaries-table tbody tr").hide()
            $(`.salaries-table tbody tr[id="${$(this).val()}"]`).show();
            if($(this).val()==="oll"){
                $(".salaries-table tbody tr").show()
            }
        });
    })
</script>
<? include "templates/footer.php"; ?>