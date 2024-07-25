<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="install.css?v=2" rel="stylesheet">
<head>
<meta http-equiv="refresh" content="10; url='../'" />
</head>
 <div class="logo">ASTED CWS</div>
<header>
    <div class="progress">
        <div class="statusbar statusprogressbar" style="width: 100%;"></div>
        <p class="progress-title">
Система установлена, приятного использования!
            <br>5 / 5</p>
    </div>
</header>
<header>
</header>
<article>
<div style="padding-left: 8px;">
    Поздравляем вы установили систему <a href="../">Авторизация</a>
<br> После установки системы просим вас <span style="color: red;"> удалить папку /install/</span><br>
<p id="demo" style="font-weight: bold;">Вы будите автоматический перенаправлены в панель астед!.</p>
<script>
var secs = 10;
var timer = setInterval(tick,1000)
function tick(){ 
  document.getElementById("demo").innerHTML = "До автоматического перенаправления осталось "+(--secs)+" секунд!";
  }

</script>
Спасибо что выбрали Asted! </div>
</article>
<footer><?=date("Y")?> <a href="https://asted.by/">Asted.by</a> <span style="font-size: 12px">© ООО "АСТЕДБЕЛ" </span></footer>
</body>
</html>