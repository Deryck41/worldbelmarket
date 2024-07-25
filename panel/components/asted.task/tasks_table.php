<? include "templates/header.php";
if($userTaskType == "construct"){
	        $sqlupdatetask = "UPDATE crm_users SET task_type='table' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if($userTaskType == "list"){
	        $sqlupdatetask = "UPDATE crm_users SET task_type='table' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}
if($userTaskType == null){
		    $sqlupdatetask = "UPDATE crm_users SET task_type='table' WHERE id='{$userID}'";
            $resultupdatetask = mysqli_query($link, $sqlupdatetask);
}

if ($_POST['submit'] == 'newsadd') {
    $addtitle = $_POST['titleadd'];
    $addtext = $_POST['textadd'];
    $sql = "INSERT INTO `crm_news` (title, text, author, date) VALUES ('{$addtitle}','{$addtext}','{$userID}', '{$timeNowUNIXFormat}')";
    $result = mysqli_query($link, $sql);
    //header('Location: http://crm.terrangroup.biz/index.php?result=1305');
    //echo '<meta http-equiv="refresh" content="0;URL=http://crm.terrangroup.biz/index.php?result=1305" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
        if($_GET['result'] == '1305'){
            ?>
            <div class="container-fluid"><div class="alert alert-success" role="alert">
                    TerranCRM: <?=$lang['the_task_was_added_successfully']?>
                </div></div>
        <?}}}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

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
<a href="/asted/tasks-construct/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2"><i class="fas fa-list fa-sm text-white-50"></i> <?=$lang['task_constructor']?></a>
			<a href="/asted/tasks-list/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2" ><i class="fas fa-list fa-sm text-white-50"></i> <?=$lang['task_list']?></a>
      <a href="/asted/tasks-trash/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2"><i class="fas fa-list fa-sm text-white-50"></i> <?= $lang['deleted_tasks'] ?></a>
            <a href="#" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> <?=$lang['create_task']?></a>
      </div>
        </div>    
</div>
<!-- ASTED: новый формат управления задачами END -->
	<?include "core/section/addtask.php";?>
	<?include "core/section/notask.php";?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?=$backlinks["name"]?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th><?=$lang['delivery_date']?>:</th>
                      <th><?=$lang['task']?>:</th>
					  <th><?=$lang['status']?>:</th>
					  <th><?=$lang['responsible']?>:</th>
					  <th><?=$lang['management']?>:</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th><?=$lang['delivery_date']?>:</th>
                      <th><?=$lang['task']?>:</th>
					  <th><?=$lang['status']?>:</th>
					  <th><?=$lang['responsible']?>:</th>
					  <th><?=$lang['management']?>:</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  <?while ($task = mysqli_fetch_assoc($result_task)) {$datacreate = "{$task['task_datacreat']}";$taskAutor = "{$task['task_autor']}";$taskexecutor = "{$task['task_executor']}";$title = "{$task['task_name']}";$id = "{$task['id']}";$taskStatus = "{$task['task_status']}";$text = "{$task['task_text']}"; 
		
		
		 $sqluser = "SELECT * FROM `crm_users` WHERE `id` = " . $taskexecutor . "; ";
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
    }
		
		if($taskStatus == 0){
			$statuttask = "Открыта";
			$statustaskstule = "task_status__open";
			$statustaskstulestyle = 'style="background: #fff;"';
		}
		if($taskStatus == 1){
			$statuttask = "Закрыта";
			$statustaskstule = "task_status__clouse";
			$statustaskstulestyle = 'style="background: #e2e2e6;"';
		}if($taskStatus != 13){
			if($taskexecutor == $userID OR $taskAutor == $userID OR $userSessionDivisions == "1"){
			?>
                    <tr>
                      <td <?=$statustaskstulestyle?>><?=$datacreate?></td>
                      <td <?=$statustaskstulestyle?>><a href="/asted/task/<?=$id?>/"><?=$title?></a></td>
                      <td <?=$statustaskstulestyle?>><?=$statuttask?></td>
					   <td <?=$statustaskstulestyle?>><?=$itsUserName?> <?=$itsUserSurName?></td>
					  <td <?=$statustaskstulestyle?>> <a href="/asted/task-edit/<?=$id?>/"><i class="fas fa-fw fa-edit" style="float: right;color: cadetblue;margin-top: 3px;margin-left: 20px;"></i></td>
                    </tr>
		<?}}}?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>
        <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>
   <script src="/asted/templates/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/asted/templates/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
  $(document).ready(function() {
  $('#dataTable').DataTable();
});
  </script>