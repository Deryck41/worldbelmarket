<? include "templates/header.php";
if($userTaskType == null){?>
<meta http-equiv="refresh" content="0;URL=/asted/tasks-list/" />
<?}
if($userTaskType == "construct"){?>
<meta http-equiv="refresh" content="0;URL=/asted/tasks-construct/" />
<?}
if($userTaskType == "table"){?>
<meta http-equiv="refresh" content="0;URL=/asted/tasks-table/" />
<?}
if($userTaskType == "list"){?>
<meta http-equiv="refresh" content="0;URL=/asted/tasks-list/" />
<?}
?>
<? include "templates/footer.php"; ?>