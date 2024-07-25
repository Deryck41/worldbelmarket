<?php
if($_POST['deletenews'] != null) {
	$sqldelete = "DELETE FROM crm_news WHERE id=".$_POST['deletenews'].""	;
	mysqli_query($link, $sqldelete);
	echo "Новость удалена";
}
?>