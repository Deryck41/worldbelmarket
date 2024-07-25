<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="install.css?v=2" rel="stylesheet">
<head>
    <?php
    	include '../core/rb.php';
        include '../core/config.php';
        error_reporting(E_ALL ^ E_NOTICE);
        ini_set('display_errors', 'Off');
        ini_set('error_reporting', E_ALL);
if ($_POST['submit'] == 'newsadd') {
    		//menucategorys
		$mencatsql = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_crm', '1', '{$_POST['crm']}')";
                $resultczzffs = mysqli_query($link, $mencatsql);
        
                $mencatsqlqcgz = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_site', '2', '{$_POST['site']}')";
                $resultczzffswcgz = mysqli_query($link, $mencatsqlqcgz);
        
                $mencatsqlq = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_taskandproject', '3', '{$_POST['task']}')";
                $resultczzffsw = mysqli_query($link, $mencatsqlq);
        
                $mencatsqlww = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_buh', '4', '{$_POST['buh']}')";
                $resultczzffsww = mysqli_query($link, $mencatsqlww);
        
                $mencatsqlf = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_struc', '5', '{$_POST['user']}')";
                $resultczzffsff = mysqli_query($link, $mencatsqlf);
        
                $mencatsqlfiio = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_mod', '6', '{$_POST['mod']}')";
                $resultczzffsffiio = mysqli_query($link, $mencatsqlfiio);
        
                $mencatsqlfjkc = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_control', '7', '{$_POST['system']}')";
                $resultczzffsffjkc = mysqli_query($link, $mencatsqlfjkc);
        
                $mencatsqlfjkcva = "INSERT INTO `" . $TerranPrefix . "menu_category` (`catname`, `catposition`, `catactive`) VALUES
        ('menu_cat_astfrem', '8', '{$_POST['framework']}')";
                $resultczzffsvaffjkc = mysqli_query($link, $mencatsqlfjkcva);
                ?>
<meta http-equiv="refresh" content="0; url='final.php'" />
<?php } ?>
</head>
 <div class="logo">ASTED CWS</div>
<header>
    <div class="progress">
        <div class="statusbar statusprogressbar" style="width: 88%;"></div>
        <p class="progress-title">
Выберите необходимый фунционал, разделов меню!
            <br>5 / 6</p>
    </div>
</header>
<article>

	<form action="" method="post" style="padding-left: 8px;max-width: 250px;">
		<div class="columstyle">
			<span><strong>Раздел CRM: </strong></span><br>
            <select class="form-control" name="crm" id="crm">
						<option value="n" seleced>Выключен</option>
						<option value="y">Включен</option>
				</select> 
                <br><br>
                <span><strong>Раздел управления сайтом: </strong></span><br>
            <select class="form-control" name="site" id="site">
						<option value="y" seleced>Включен</option>
						<option value="n">Выключен</option>
				</select> 
                <br><br>
                <span><strong>Раздел задачи и проекты: </strong></span><br>
            <select class="form-control" name="task" id="task">
						<option value="n" seleced>Выключен</option>
						<option value="y">Включен</option>
				</select> 
                <br><br>
                <span><strong>Раздел бухгалтерии: </strong></span><br>
            <select class="form-control" name="buh" id="buh">
						<option value="n" seleced>Выключен</option>
						<option value="y">Включен</option>
				</select>
                <br><br>
                <span><strong>Раздел структуры пользователей: </strong></span><br>
            <select class="form-control" name="user" id="user">
						<option value="y" seleced>Включен</option>
						<option value="n">Выключен</option>
				</select>  
                <br><br>
                <span><strong>Раздел модулей: </strong></span><br>
            <select class="form-control" name="mod" id="mod">
						<option value="n" seleced>Выключен</option>
						<option value="y">Включен</option>
				</select>
                <br><br>
                <span><strong>Раздел управления системой: </strong></span><br>
            <select class="form-control" name="system" id="system">
						<option value="y" seleced>Включен</option>
						<option value="n">Выключен</option>
				</select> 
                <br><br>
                <span><strong>Раздел asted framework: </strong></span><br>
            <select class="form-control" name="framework" id="framework">
						<option value="y" seleced>Включен</option>
						<option value="n">Выключен</option>
				</select> 
                <br>
		</div>
		<input type="submit" name="submit" style="display:none" value="newsadd" name="newsadd" id="id0" class="btn btn-primary btn-user btn-block" />
		<button type="button" onclick="javascript:document.getElementById('id0').click();" class="btn btn-primary menu-savebtn">Сохранить</button>
    </form>
</article>
<footer><?=date("Y")?> <a href="https://asted.by/">Asted.by</a> <span style="font-size: 12px">© ООО "АСТЕДБЕЛ" </span></footer>
</body>
</html>