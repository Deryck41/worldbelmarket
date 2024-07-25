<?php
include_once "valid.php";

if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

header('Content-Type: application/json');

echo json_encode(array("status" => validate($_POST['type'], $_POST['value'], $_POST['isRequired'])));


?>