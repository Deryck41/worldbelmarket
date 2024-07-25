<? include "templates/header.php";?>
<div class="container-fluid">
 <?php
if($userSessionDivisions == "1"){
	$idnews = $_GET['id'];

$sql_news = "SELECT * FROM `crm_site` WHERE id ='".$idnews."'";
$result_news = mysqli_query($link, $sql_news);
$newsforedit = mysqli_fetch_assoc($result_news);//print_r($newsforedit);

if(isset($_POST['submit'])){
	$updateTitle = $_POST['titleadd'];
	$updateURL = $_POST['urladd'];
	$updateHTTPS = $_POST['https'];
	$updateTheme = $_POST['websitetheme'];
	$updateCRM = $_POST['urladd'];
	$updatemodulemenu = $_POST['modulemenu'];
	$updatemodulepages = $_POST['modulepages'];
	$updatemodulenews = $_POST['modulenews'];
	$updatemodulecustom = $_POST['modulecustom'];
	$sitestatus = $_POST['sitestatus'];
	$sqlUloadAva = "UPDATE crm_site SET namesite='" . $updateTitle . "', siteurl='" . $updateURL . "', websitessl='" . $updateHTTPS . "', webtemplate='" . $updateTheme . "', crmfuncional='" . $updateCRM . "', modulemenu='" . $updatemodulemenu . "', modulepages='" . $updatemodulepages . "', modulenews='" . $updatemodulenews . "', sitestatus='" . $sitestatus . "', modulecustom='" . $updatemodulecustom . "' WHERE id='{$idnews}'";
    $resultUloadAva = mysqli_query($link, $sqlUloadAva);
	echo '<meta http-equiv="refresh" content="0;URL=site_edit.php?id='.$idnews.'&result=1305" />';
}
if (is_numeric($_GET['result'])) {
    if(isset($_GET['result'])){
		if($_GET['result'] == '1305'){
	?>
	<div class="container-fluid"><div class="alert alert-success" role="alert">TerranCRM: редактирование сайта <?=$newsforedit['namesite']?> завершено.</div></div>
<?}}}
$directoryTerranWebSiteTheme    = 'website_themes';
$scanned_directory = array_diff(scandir($directoryTerranWebSiteTheme, 1), array('..', '.'));
$terranThemeCount = count($scanned_directory);?>	
        <!-- Begin Page Content -->
        <div class="container-fluid">
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Редактирование сайта <a href="<?=$newsforedit['siteurl']?>"><?=$newsforedit['siteurl']?></a>:</h1></div>		
		
		<form method="post" action="">
				<span><strong>Название сайта: </strong></span>
		<input placeholder="<?=$newsforedit['namesite']?>" value="<?=$newsforedit['namesite']?>" class="form-control" name="titleadd" id="titleadd" type="тема">
		<span><strong>URL сайта: </strong></span>
		<input placeholder="<?=$newsforedit['siteurl']?>" value="<?=$newsforedit['siteurl']?>" class="form-control" name="urladd" id="urladd" type="тема">
		 <label for="exampleInputPassword1">SSL сертификат (<i>HTTP://Ваш сайт, HTTPS://Ваш сайт</i>).</label>
                        <select class="form-control" name="https" id="https">
							<?php if ($newsforedit['websitessl'] == 0){?>
							<option value="0">http</option>
                            <option value="1">https</option>    
							<?}?>	
							<?php if ($newsforedit['websitessl'] == 1){?>
                            <option value="1">https</option>  
							<option value="0">http</option>							
							<?}?>								
                        </select>
						<label for="exampleInputPassword1">Макет шаблона.</label>
                        <select class="form-control" name="websitetheme" id="websitetheme">
							<?php for ($i = 0; $i != $terranThemeCount; $i++) {?>
								<option <?php if($i == $newsforedit['webtemplate']){echo 'selected selected="selected"';}?>value="<?=$i?>"><?=$scanned_directory[$i]?></option>
							<?}?>								
                        </select>
                        <label for="exampleInputPassword1">CRM Функционал.</label>
                        <select class="form-control" name="websitecrmf" id="websitecrmf">
							<?php if ($newsforedit['crmfuncional'] == 0){?>
							<option value="0" selected>Не используется</option>
                            <option value="1">Используется</option> 
							<?}?>	
							<?php if ($newsforedit['crmfuncional'] == 1){?>
							<option value="0">Не используется</option>
                            <option value="1" selected>Используется</option> 					
							<?}?>	                        
                        </select>
						<hr>
						<label for="exampleInputPassword1">Модуль меню.</label>
                        <select class="form-control" name="modulemenu" id="modulemenu">
							<?php if ($newsforedit['modulemenu'] == 1){?>
							<option value="0">Не используется</option>
                            <option value="1" selected>Используется</option> 
							<?}?>	
							<?php if ($newsforedit['modulemenu'] == 0){?>
							<option value="0" selected>Не используется</option>
                            <option value="1">Используется</option> 			
							<?}?>	                        
                        </select>
						<label for="exampleInputPassword1">Модуль страниц.</label>
                        <select class="form-control" name="modulepages" id="modulepages">
							<?php if ($newsforedit['modulepages'] == 1){?>
							<option value="0">Не используется</option>
                            <option value="1" selected>Используется</option> 
							<?}?>	
							<?php if ($newsforedit['modulepages'] == 0){?>
							<option value="0" selected>Не используется</option>
                            <option value="1">Используется</option> 				
							<?}?>	                        
                        </select>
						<label for="exampleInputPassword1">Модуль новостей.</label>
                        <select class="form-control" name="modulenews" id="modulenews">
							<?php if ($newsforedit['modulenews'] == 1){?>
							<option value="0">Не используется</option>
                            <option value="1" selected>Используется</option> 
							<?}?>	
							<?php if ($newsforedit['modulenews'] == 0){?>
							<option value="0" selected>Не используется</option>
                            <option value="1">Используется</option> 				
							<?}?>	                        
                        </select>
						<label for="exampleInputPassword1">Модуль кастом.</label>
                        <select class="form-control" name="modulecustom" id="modulecustom">
							<?php if ($newsforedit['modulecustom'] == 1){?>
							<option value="0">Не используется</option>
                            <option value="1" selected>Используется</option>  
							<?}?>	
							<?php if ($newsforedit['modulecustom'] == 0){?>
							<option value="0" selected>Не используется</option>
                            <option value="1">Используется</option> 			
							<?}?>	                        
                        </select>

                        <hr>
                         <label for="exampleInputPassword1">Техническое обслуживание сайта</label>
                        <select class="form-control" name="sitestatus" id="sitestatus">
                        	<?php if ($newsforedit['sitestatus'] == 1){?>
							<option value="0">Выключено</option>
                            <option value="1" selected>Включено</option>  
							<?}?>	
							<?php if ($newsforedit['sitestatus'] == 0){?>
							<option value="0" selected>Выключено</option>
                            <option value="1">Включено</option> 			
							<?}?>	                   
                        </select><br>
    <input type="submit" name="submit" value="Обновить">
</form>
		
		
		
</div>
	
	
	
<?}?>
</div>

<? include "templates/footer.php"; ?>