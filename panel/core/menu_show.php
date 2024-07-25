<?php
	include "config.php";
    // Обновление:
    $status = $_POST['status'];
	$sqlUloadMenu = "UPDATE crm_menu SET active='" . $status . "' WHERE id='{$_POST['id']}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadMenu);

?>