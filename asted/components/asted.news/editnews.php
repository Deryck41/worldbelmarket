<? include "templates/header.php"; 
$idnews = $_GET['id'];

$sql_news = "SELECT * FROM `crm_news` WHERE id ='".$idnews."'";
$result_news = mysqli_query($link, $sql_news);
$newsforedit = mysqli_fetch_assoc($result_news);

//print_r($newsforedit);
?>
<script src="templates/tinymce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: '#editor',
    language:'<?=$lang['lang']?>',
	toolbar: 'image',
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
	$sqlUloadAva = "UPDATE crm_news SET text='" . $updateText . "', title='" . $updateTitle . "', type='" . $updateType . "' WHERE id='{$idnews}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=editnews.php?id='.$idnews.'&result=1305" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">
	TerranCRM: <?=$lang['the_news_was_successfully_updated']?>
	</div></div>
<?}}}?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['editing_news']?>:</h1></div>		
		
		<form method="post" action="">
				<span><strong><?=$lang['heading']?>: </strong></span>
		<input placeholder="<?=$newsforedit['title']?>" value="<?=$newsforedit['title']?>" class="form-control" name="titleadd" id="titleadd" type="тема">
		<span><strong><?=$lang['text']?>: </strong></span>
    <textarea name="editor" id="editor" rows="10" cols="80">
    <?=$newsforedit['text']?>
    </textarea>
		<select class="form-control group" name="typenewss" id="typenewss">
	<option value="news">Новость</option>
	<option value="alert">Оповещение</option>
                        </select>
    <input type="submit" name="submit" value="Обновить">
</form>
		
		
		
</div>
<? include "templates/footer.php"; ?>