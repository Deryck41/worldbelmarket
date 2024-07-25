<!DOCTYPE html>
<?php
error_reporting(E_ALL ^ E_NOTICE); ?>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="install.css?v=6" rel="stylesheet">
<head>
</head>
 <div class="logo">ASTED CWS</div>
<header>
    <div class="progress">
        <div class="statusbar statusprogressbar" style="width: 25%;"></div>
        <p class="progress-title">
Второй шаг, соединение c базой
            <br>2 / 6</p>
    </div>
</header>
<header>

</header>
<article>
<?php

    $curURLGlobal = $_SERVER['REQUEST_URI'];
    $urlsGlobal = explode('/', $curURLGlobal);
    //print_r($urlsGlobal);
    if($urlsGlobal['3'] != null){


$corefolder = ''.$_SERVER['DOCUMENT_ROOT'].'/'.$urlsGlobal['1'].'/core';
$drpost = 'drpost';
    } else{
$corefolder = '../core';
}
//echo $corefolder;
if (is_writable($corefolder)) {
	echo '<p style="color:green;text-align: center;"> &#9745; папка core доступна для записи</p>';
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(E_ALL);
if($_POST['server'] != null){
	$server = $_POST['server'];
	$user = $_POST['user'];
	$password = $_POST['password'];

	$dblink = mysqli_connect($server, $user, $password);

	if($dblink){
		echo '<div style="color:green;text-align: center;">Соединение установлено. <br></div>';
		$database = $_POST['database'];
		$admin = $_GET['id'];
		$dblinkfull  = mysqli_connect($server, $user, $password, $database);

		//$selected = mysqli_select_db($database, $dblink);
		//print_r($selected);
		//if($selected){
		if ($dblinkfull) {
		$installcheck = "true";
		$filename = '../core/config.php';
			if (file_exists($filename)) {
				echo "Файл $filename существует, удалите его и повторите установку.";
				?>
				
					<form action="install.php">
					<button type="submit">Обновить страницу</button>
					</form>
				<?
			} else {
				//echo "Файл $filename не существует";
					// Указываем то что нужно записать в файл
				if($admin != null){
                    $text = '<?$TerranPrefix = "crm_";
					$nameDB = \''.$database.'\';//Asted DB: название базы sql
					$userDB = \''.$user.'\';//Asted DB: логин sql
					$passwordDB = \''.$password.'\';//Asted DB: пароль sql
					if(defined(\'ASTEDRB\')){
						R::setup( \'mysql:host='.$server.';dbname=\'.$nameDB.\'\', $userDB, $passwordDB );
						R::ext(\'xdispense\', function ($type, $prefix = \'\') {
							return R::getRedBean()->dispense($prefix . $type);
						});
					}
					$astedADM = \''.$admin.'\'; 
					$link = mysqli_connect (\''.$server.'\',  $userDB, $passwordDB, $nameDB) or die("TERRAN DEBUGER Error: " . mysqli_error($link));
					$link -> set_charset("utf8");
					?>';
                    }else{
                    $text = '<?$TerranPrefix = "crm_";
					$nameDB = \''.$database.'\';//Asted DB: название базы sql
					$userDB = \''.$user.'\';//Asted DB: логин sql
					$passwordDB = \''.$password.'\';//Asted DB: пароль sql
					 if(defined(\'ASTEDRB\')){
						R::setup( \'mysql:host='.$server.';dbname=$nameDB, $userDB, $passwordDB); //Asted DB: название базы, логин, пароль
						R::ext(\'xdispense\', function ($type, $prefix = \'\') {
							return R::getRedBean()->dispense($prefix . $type);
						}); 
					}
					 $link = mysqli_connect (\''.$server.'\', $userDB, $passwordDB, $nameDB) or die("TERRAN DEBUGER Error: " . mysqli_error($link));
					 $link -> set_charset("utf8");?>';
					 }
					// Открываем файл в нужном нам режиме. Нам же, нужно его создать и что то записать.
					$fp = fopen($filename, "w");//поэтому используем режим 'w'

					// записываем данные в открытый файл
					fwrite($fp, $text);

					//не забываем закрыть файл, это ВАЖНО
					fclose($fp);

					?>
					<div class="install-container">
					<form action="installing.php" method="POST" class="forminstall">
					Подключение к базе данных прошло успешно, файл конфигурации создан, нажмите даллее для продолжения установки<br><br>
					<div class=""><input name="server" value="<?=$server?>" disabled></div><br>
					<div class=""><input name="user" value="<?=$user?>" disabled></div><br>
					<div class=""><input name="password" value="<?=$password?>" disabled></div><br>
					<div class=""><input  name="database" value="<?=$database?>" disabled></div><br>
					<?php if($admin != null){?>
						<div class=""><input  name="admin" value="<?=$admin?>" disabled></div><br>
					<?}?>

					<button type="submit">Продолжить установку</button>
					</form>
					</div>
					<?php
			}
		}
		else
		echo('<div style="color:red;text-align: center;"> База данных не найдена или отсутствует доступ.<br> </div>');
	}
	else{
		echo '<div style="color:red;text-align: center;">Ошибка подключения к серверу баз данных.<br></div>';
		}
	}
	
	if($installcheck != "true"){
?>
<?php if($_POST['astedtype'] == "admin"){?>
	<div class="install-container"><form action="install.php?id=asted" method="POST" class="forminstall">
	<?}else{?>
		<div class="install-container"><form action="install.php" method="POST" class="forminstall">
	<?}?>
Введите данные от сервера базы данных MySql<br><br>
<span style="font-size: 9px">Сервер mysql (не менять)</span>
<div class=""><input name="server" value="localhost" style="
    width: 100%;
    font-size: 18px;
    color: #494747;
    padding: 4px;
"></div><br>
<div class="row jc-b">
<span style="font-size: 9px;padding: 10px;">Логин от, <br> сервера mysql</span>
<div class=""><input name="user" value="" style="
    width: 95%;
    font-size: 18px;
    color: #494747;
    padding: 4px;
" placeholder="Логин от MySql"></div><br>
<span style="font-size: 9px;padding: 10px;">Пароль от, <br> сервера mysql</span>
<div class=""><input name="password" value="" style="
    width: 95%;
    font-size: 18px;
    color: #494747;
    padding: 4px;
" placeholder="Пароль от MySql"></div><br>
	
<span style="font-size: 9px;padding: 10px;">Имя базы данных <br> mysql</span>
<div class=""><input  name="database" value="" style="
    width: 95%;
    font-size: 18px;
    color: #494747;
    padding: 4px;
" placeholder="Имя база mysql"></div>
</div><br>
<?php if($_POST['astedtype'] == "admin"){?>
	<hr>
<span style="font-size: 9px">Расположение админ панели</span>
<div class=""><input  name="admin" value="/asted/" placeholder="База данных" disabled></div><br>
<div style="text-align: center; border: 1px solid green; margin-bottom: 8px;">Вы выбрали <br> "Вебсайт"</div>
<?}?>
<button type="submit">Проверка данных</button>
</form></div>
	<?
} }else {
    echo '<p style="color:red;"> &#9746; папка core не доступна для записи</p>';
}?>
</article>
<br>
<footer><?=date("Y")?> <a href="https://asted.by/">Asted.by</a> <span style="font-size: 12px">© ООО "АСТЕДБЕЛ" </span></footer>
</body>
</html>