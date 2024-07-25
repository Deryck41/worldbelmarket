<?php 
$config = "core/config.php";
if (file_exists($config)) {
 if(empty($_GET)){
 	include "templates/header.php";
 	if($indexDefPage == "news"){
		include "components/asted.lenta/lenta.php";
	}else{
		include "components/asted.index/index.php";
	} 
	include "templates/footer.php"; 
 }else{
 	require_once "core/Services/Router.php";
 	require_once "core/routers.php";
 }
}else{
	header('Location: /asted/install/index.php');
}
?>