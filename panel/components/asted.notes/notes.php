<? include "templates/header.php";
if($userID == $_GET['id']){
	if ($_POST['submit'] == 'newsadd') {
	$addtitle = $_POST['titleadd'];
	$addtext = $_POST['editor'];
	$sql = "INSERT INTO `".$TerranPrefix."notes` (whocreate, title, text) VALUES ('{$userID}', '{$addtitle}','{$addtext}')";
	$result = mysqli_query($link, $sql);
	//header('Location: http://crm.terrangroup.biz/index.php?result=1305');
	echo '<meta http-equiv="refresh" content="0;URL=notes/'.$userID.'/1305/" />';
}
if($_POST['newsdel'] != null) {
	//echo $_POST['newsdel'];
$sqlportfolio = "DELETE FROM crm_notes WHERE id=".$_POST['newsdel'].""	;
mysqli_query($link, $sqlportfolio);
echo '<meta http-equiv="refresh" content="0;URL=notes/'.$userID.'/1991/" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Заметка успешно добавлена
	</div></div>
<?}}}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1991'){?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Заметка успешно удалена
	</div></div>
<?}}}?>
<script>
tinymce.init({
    selector: '#editor',
	toolbar: 'image',
	images_upload_url: '../core/postAcceptor.php',
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
	'image imagetools',
    'insertdatetime media table paste imagetools wordcount'
  ],
});


$(document).ready(function() {
		
	$( ".card-body, .navbar, .newstitle, .align-items-center" ).click(function() {
	$(".terrannewsedit").css({'display' : 'none'});
	}); 
});

</script>
<div class="container-fluid">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Личные заметки</h1>
            <a href="#" data-toggle="modal" data-target="#myModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Добавить заметку</a>
          </div>
 
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Создать заметку</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
						<form action="" method="post">
                            <span><strong><?=$lang['theme']?>: </strong></span><input placeholder="" class="form-control"  name="titleadd" id="titleadd" type="тема">
                            <br>
                            <span><strong><?=$lang['message']?></strong></span>
							

									<textarea name="editor" id="editor" rows="10" cols="80">
									<?=$lang['enter_something']?>
									</textarea>              
							<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0"
                                           class="btn btn-primary btn-user btn-block"/>
						</form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$lang['close']?></button>
                            <button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary"><?=$lang['add']?></button>
                        </div>
                    </div>
                </div>
            </div>
 
 
 


<div id="accordion">

<?php
$sql_news = "SELECT * FROM `".$TerranPrefix."notes` WHERE whocreate ='".$userID."'";
$result_news = mysqli_query($link, $sql_news);
	while ($userGroups = mysqli_fetch_assoc($result_news)) {
		$idNotis = "{$userGroups['id']}";
		$titleNotis = "{$userGroups['title']}";
		$textNotis = "{$userGroups['text']}";
		?>


  <div class="card">
    <div class="card-header" id="heading<?=$idNotis?>">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?=$idNotis?>" aria-expanded="true" aria-controls="collapse<?=$idNotis?>">
          <?=$titleNotis?> 
        </button>
		<a href="notesedit.php?id=<?=$idNotis?>">
		<form action="" method="post" style="display:none"><input type="submit" name="newsdel" style="display:none" value="<?=$idNotis?>" name="deletenews" id="deletenews<?=$idNotis?>"> 
			<input type="submit" name="submit" style="display:none" value="newsdel" name="newsdel" id="deletenews<?=$idNotis?>"
                                           class="btn terranbtnadd	 btn-user btn-block"/>
		</form>
		
		<i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka1" style="float: right;"></i></a>
		<i class="fas fa-fw fa-trash" style="float: right;" onclick="javascript:document.getElementById('deletenews<?=$idNotis?>').click();"></i>
		
      </h5>
    </div>

    <div id="collapse<?=$idNotis?>" class="collapse" aria-labelledby="heading<?=$idNotis?>" data-parent="#accordion">
      <div class="card-body">
        <?=$textNotis?>
      </div>
    </div>
  </div>
  
<?php }
		if($idNotis == null){
			echo 'Заметок нет, либо они ещё не созданы.';
		} ?>  
  
  
  
  
  
</div> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 </div>		  




		  
<?}else{?> 
<div class="container-fluid">
 Вы не можите просматривать чужие заметки
 </div>
 <?php }include "templates/footer.php";?>

