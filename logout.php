<?
session_name('terrancrm');
session_start();

$_SESSION['id'] = NULL;
$_SESSION["loggedin"] = false;
$_SESSION['type'] = NULL;
header('Location: /');
?>