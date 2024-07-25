<?php
$sql_task_cheket = "SELECT * FROM `crm_task` ORDER BY `id` DESC";
$result_task_cheket = mysqli_query($link, $sql_task_cheket);
$result_num_rows_cheket = mysqli_num_rows($result_task_cheket);
	if($result_num_rows_cheket == 0){
	?>
                <div class="card-body">
    <p><div class="alert alert-success" role="alert">
	Asted: <?=$lang['no_tasks_found']?>
	</div></p>
                </div>
<?}?>	