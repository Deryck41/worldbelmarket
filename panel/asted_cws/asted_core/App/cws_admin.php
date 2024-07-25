<!-- Asted admin -->
  <style>
.asted_adm-main_btn {
  z-index: 99999999;
  position: fixed;
  right: 0px;
  background: rgb(0,0,0);
  background: linear-gradient(rgba(0, 0, 0, 0.94), rgba(5, 5, 38, 0.68) 35%, rgba(2, 19, 24, 0.7));
  color: white;
  padding: 30px 0px;
  border-radius: 0px 0px 0px 20px;
  cursor: pointer;
}
.asted_adm-main_btn > div{
  transform: rotate(90deg);
}
.asted_adm-main{
  z-index: 99999999;
  width: 100%;
  height: 70px;
  position: fixed;
  top: 0;
  left: 0;
  background: rgb(0,0,0);
  background: linear-gradient(rgba(0, 0, 0, 0.94), rgba(5, 5, 38, 0.68) 35%, rgba(2, 19, 24, 0.7));
  color: white;
}
.asted_adm-usr{
  float: right;
  margin: 10px;
}
.asted_adm-btn{
  background: rgb(48, 46, 54);
  padding: 6px;
  border: 1px solid rgb(120, 116, 116);
  border-radius: 4px;
  width: fit-content;
}
.asted_adm-btn-exit > a{
  margin-left: 5px;
  color: white;
}
.asted_adm-main_hidden{
  display: none;
}
.asted_adm_btn_toadmin{
  color: white;
width: fit-content;
border: 1px solid white;
margin: 4px;
text-align: center;
padding: 7px;
float: left;
}
  </style>
    <script>

//дожидаемся полной загрузки страницы
window.onload = function () {
    //получаем идентификатор элемента
    var astedadminbtn = document.getElementById('astadmbtn');
    var astedadminpanel = document.getElementById('asted_adm-main');
    //вешаем на него событие
    astedadminbtn.onclick = function() {
        //производим какие-то действия
        astedadminpanel.classList.remove("asted_adm-main_hidden");
        astedadminbtn.classList.add("asted_adm-main_hidden");
        //предотвращаем переход по ссылке href
        return false;
    }
}
  </script>
  
    <div class="asted_adm-main asted_adm-main_hidden" id="asted_adm-main">
      <a href="/asted/"><div class="asted_adm_btn_toadmin">Административная панель <br> управления АСТЕД</div></a>
       <a href="/asted/site_content.php"><div class="asted_adm_btn_toadmin">Контентные <br> Блоки</div></a>
       <a href="/asted/asted_config.php?id=1"><div class="asted_adm_btn_toadmin">Настройки <br> Сайта</div></a>
    <div class="asted_adm-usr">
      <div class="asted_adm-btn"><?=$username?></div>
      <div class="asted_adm-btn-exit"><a href="/index.php?exit">Выход</a></div>
    </div>
  </div>
  <div class="asted_adm-main_btn" id="astadmbtn">
    <div>Asted</div>
  </div>
  <!-- Asted admin -->