<?php
	include "config.php";
	$i = 1;
	foreach ($_POST['item'] as $value) {
    // Обновление:
	$sqlUloadMenu = "UPDATE crm_menu SET position='" . $i . "' WHERE id='{$value}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadMenu);
    $i++;
	}
?>