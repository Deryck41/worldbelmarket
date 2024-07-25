<? include "templates/header.php"; 
$idnews = $_GET['id'];

$sql_news = "SELECT * FROM `crm_notes` WHERE id ='".$idnews."'";
$result_news = mysqli_query($link, $sql_news);
$newsforedit = mysqli_fetch_assoc($result_news);
if($userID == $newsforedit['whocreate']){
//print_r($newsforedit);
?>
<script src="templates/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#editor',
	toolbar: 'image',
	language:'<?=$lang['lang']?>',
	images_upload_url: 'core/postAcceptor.php',
plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
	'image imagetools',
    'insertdatetime media table paste imagetools wordcount'
  ],
});
</script>
<?
if(isset($_POST['submit'])){
	$updateTitle = $_POST['titleadd'];
	$updateText = $_POST['editor'];
	$updateType = $_POST['typenewss'];
	$sqlUloadAva = "UPDATE crm_notes SET text='" . $updateText . "', title='" . $updateTitle . "' WHERE id='{$idnews}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=notesedit.php?id='.$idnews.'&result=1305" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: Заметка успешно отредактированна
	</div></div>
<?}}}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактирование заметки:</h1></div>		
		<div><a href="/notes.php?id=<?=$userID?>" style="    color: antiquewhite;
    border: 1px solid;
    padding: 8px;"><i class="fas fa-backward"></i> Вернутся ко всем заметкам</a></div><br>
		<form method="post" action="">
				<span><strong><?=$lang['heading']?>: </strong></span>
		<input placeholder="<?=$newsforedit['title']?>" value="<?=$newsforedit['title']?>" class="form-control" name="titleadd" id="titleadd" type="тема">
		<span><strong><?=$lang['text']?>: </strong></span>
    <textarea name="editor" id="editor" rows="10" cols="80">
    <?=$newsforedit['text']?>
    </textarea>
	
    <input type="submit" name="submit" value="Обновить">
</form>
		
		
		
</div>
<?}else{echo 'вы пытаетесь открыть чужую заметку.';} include "templates/footer.php"; ?>