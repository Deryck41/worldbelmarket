<? include "templates/header.php"; 
$idnews = $_GET['id'];

$sql_news = "SELECT * FROM `crm_task` WHERE id ='".$idnews."'";
$result_news = mysqli_query($link, $sql_news);
$newsforedit = mysqli_fetch_assoc($result_news);

//print_r($newsforedit);
?>
<!-- <script src="templates/tinymce/tinymce.min.js"></script> -->
<!-- <script>
tinymce.init({
    selector: '#editor',
    language:'<?=$lang['lang']?>',
	toolbar: 'image',
	images_upload_url: '/asted/core/postAcceptor.php',
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
	'image imagetools',
    'insertdatetime media table paste imagetools wordcount'
  ],
});
</script> -->
<?
if(isset($_POST['submit'])){
	$updateTitle = $_POST['titleadd'];
	$updateText = $_POST['editor'];
	$updateGroup = $_POST['groupadd'];
	$statusTask = $_POST['statusadd'];
	$group_users = $_POST['group_users'];
	$task_datacompletion = $_POST['birthday'];
	$updateTegs = $_POST['tegsadd'];
	$updateWarning = $_POST['warningadd'];
	$sqlUloadAva = "UPDATE crm_task SET task_text='" . $updateText . "', task_name='" . $updateTitle . "', task_executor='" . $group_users . "', 
	task_status='" . $statusTask . "', task_togroup='" . $updateGroup . "', task_datacompletion='" . $task_datacompletion . "', 
	task_tegs='" . $updateTegs . "', task_warning='" . $updateWarning . "' WHERE id='{$idnews}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=' . $astedADM . 'task-edit/'.$idnews.'/1305/" />';
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
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h5 style="background: #39383c;color: white; border-radius: 33px;padding: 4px; font-size: 14px;"> Вернутся в задачу: &#8594; <a href="/asted/task/<?=$idnews ?>/" style="color: rgb(88, 221, 255);">
		<?for($newsCont = 0; $newsCont < $groupContResult; $newsCont++){
	if($newsforedit['task_togroup'] == $groupResult[$newsCont]['id']){
	?>
	<?=$groupResult[$newsCont]['group_title']?>
<?}}?>: <?=$newsforedit['task_name']?></a> &#8592;</h5>
<h1 class="h3 mb-0 text-gray-800"><?=$lang['editing_a_task']?>:</h1></div>
		<form method="post" action="">
				<span><strong><?=$lang['task']?>: </strong></span>
		<input placeholder="<?=$newsforedit['task_name']?>" value="<?=$newsforedit['task_name']?>" class="form-control" name="titleadd" id="titleadd" type="тема">
		<span><strong><?=$lang['description']?>: </strong></span>
    <textarea class="astededitor" name="editor" id="editor" rows="10" cols="80">
    <?=$newsforedit['task_text']?>
    </textarea>

	<div class="row">
		<!--ASTED: левый блок редактирования -->
		<div class="col-md-6">

	<div><?=$lang['task_group']?>:</div>
	<select class="form-control group" name="groupadd" id="groupadd">
<?for($newsCont = 0; $newsCont < $groupContResult; $newsCont++){
	?>
	<option value="<?=$groupResult[$newsCont]['id']?>" <?php if($newsforedit['task_togroup'] == $groupResult[$newsCont]['id']) echo 'selected'; ?>><?=$groupResult[$newsCont]['group_title']?></option>
	<?}?>
                        </select>
<div><?=$lang['task_status']?>:</div>
<select class="form-control group" name="statusadd" id="statusadd">
							<option value="0" <?php if($newsforedit['task_status'] == 0)echo 'selected';?>><?=$lang['opena']?></option>
							<option value="1" <?php if($newsforedit['task_status'] == 1)echo 'selected';?>><?=$lang['closeda']?></option>
							<option value="13" <?php if($newsforedit['task_status'] == 13)echo 'selected';?>><?=$lang['the_deleted_task']?></option>
</select>

                        <span>Приоритет:</span>
                        <select class="form-control warning" name="warningadd" id="warningadd">
                            <option value="1" <?php if($newsforedit['task_warning'] == 1)echo 'selected';?>>Низкий</option>
                            <option value="2" <?php if($newsforedit['task_warning'] == 2)echo 'selected';?>>Обычный</option>
                            <option value="3" <?php if($newsforedit['task_warning'] == 3)echo 'selected';?>>Высокий</option>
                        </select>

	</div>
	<!--ASTED: правый блок редактирования -->
	<div class="col-md-6">
	<label class="small mb-1" for="inputBirthday">Крайний срок</label>
                                                    <input class="form-control enddate" id="inputBirthday" type="text" name="birthday" placeholder="" value="">
													<span>Теги: </span>
		<input placeholder="<?=$newsforedit['task_tegs']?>" value="<?=$newsforedit['task_tegs']?>" class="form-control" name="tegsadd" id="tegsadd" type="тема">			
													 	 	<script>

(function($) {

        $('input[name="birthday"]').daterangepicker({
            singleDatePicker: true,
            locale: {
                                                        format: 'DD.MM.YYYY',
                                                        applyLabel: "Ок",
                                                        cancelLabel: "Отмена",
                                                        fromLabel: "От",
                                                        toLabel: "До",
                                                        monthNames : ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
                                                        daysOfWeek : ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
                                                        firstDay: 1
                                                    }
        });

})(jQuery);
</script>	
<script>
            $('.astededitor').each(function() {
                CKEDITOR.replace(this, {
                    extraPlugins: 'uploadimage',
                    extraAllowedContent: '*[*]{*}(*)'
                });
                CKEDITOR.dtd.$removeEmpty.span = false
                CKEDITOR.dtd.$removeEmpty.i = false
            });
</script>
		<span>Делает:</span>
	                        <select class="form-control responsible" name="group_users" id="group_users">
							<?php echo implode ('', $usersoption); ?>
                        </select>	

	</div>

	</div>

                     
								
						<br>	
    <input type="submit" class="btn btn-sm btn-primary" name="submit" value="Обновить">
</form>
		
		
		<script>
				$('#group_users option[value=<?= $newsforedit['task_executor'] ?>]').prop('selected', true);
			</script>
</div>
<? include "templates/footer.php"; ?>