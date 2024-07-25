<? include "templates/header.php";
if ($_POST['submit'] == 'newsadd') {
    $addtitle = $_POST['titleadd'];
    $addtext = $_POST['textadd'];
    $sql = "INSERT INTO `crm_news` (title, text, author, date) VALUES ('{$addtitle}','{$addtext}','{$userID}', '{$timeNowUNIXFormat}')";
    $result = mysqli_query($link, $sql);
    //header('Location: http://crm.terrangroup.biz/index.php?result=1305');
    echo '<meta http-equiv="refresh" content="0;URL=http://crm.terrangroup.biz/index.php?result=1305" />';
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
    <h1 class="h3 mb-0 text-gray-800"><?=$lang['tasks']?> <?=$lang['in_the_basket']?></h1>
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
      <a href="/asted/tasks-table/" class=" d-sm-inline-block btn btn-sm btn-secondary shadow-sm mt-2"><i class="fas fa-list fa-sm text-white-50"></i> <?=$lang['task_table']?></a>
            
    </div>
        </div>    
</div>
<!-- ASTED: новый формат управления задачами END -->
		<?include "/core/section/addtask.php";?>
    
          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">
		<?include "/core/section/notask.php";?>
              <!-- Approach -->
<?while ($task = mysqli_fetch_assoc($result_task)) {$title = "{$task['task_name']}";$idtotask = "{$task['task_togroup']}";$id = "{$task['id']}";$taskStatus = "{$task['task_status']}";$text = "{$task['task_text']}"; 


	$sql_tasktogroup = "SELECT * FROM `crm_group` WHERE id ='".$idtotask."'";
	$result_tasktogroup = mysqli_query($link, $sql_tasktogroup);
	$tasktogroup = mysqli_fetch_assoc($result_tasktogroup);	
	if($idtotask == $tasktogroup['id']){
		 $taskgroupname = $tasktogroup['group_title'];
	}
	
	
		if($taskStatus == 0){
			$statuttask = "Открыта";
			$statustaskstule = "task_status__open";
		}
		if($taskStatus == 1){
			$statuttask = "Закрыта";
			$statustaskstule = "task_status__clouse";
		}if($taskStatus == 13){
?>
 <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="/asted/task/<?=$id?>/"  <h6 class="m-0 font-weight-bold text-primary"><?php if($cofigius['0']['grouptitletotask'] == "on"){echo $taskgroupname.': ';}?><?=$title;?></h6></a> <a href="/asted/task-edit/<?=$id?>/"><i class="fas fa-fw fa-edit" style="float: right;    float: right;margin-top: 3px;margin-left: 20px;"></i></a>
                </div>
                <div class="card-body" style="background: #e9eaea;">
                  <p><?=$text?></p>
                </div>
</div><?}}?>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<? include "templates/footer.php"; ?>