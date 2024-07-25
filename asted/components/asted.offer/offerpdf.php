<?php
require_once( "core/include/mpdf/autoload.php" );

//function hex2dec
//returns an associative array (keys: R,G,B) from
//a hex html code (e.g. #3FE5AA)
if($_POST['sitetype'] == "sitegost"){
    $sitelogo = 'uploads/asted-gost.png';
}
if($_POST['sitetype'] == "sitebisnes"){
    $sitelogo = 'uploads/asted-logo.png';
}

if($_POST['sitedev'] == "days12"){
    $devdeysa = 'Срок реализации проекта: 12 рабочих дней';
}
if($_POST['sitedev'] == "deys20"){
    $devdeysa = 'Срок реализации проекта: 20 рабочих дней';
}
if($_POST['sitedev'] == "deys26"){
    $devdeysa = 'Срок реализации: 26 рабочих дней';
}
if($_POST['sitedev'] == "mount"){
    $devdeysa = 'Срок реализации: один месяц';
}
if($_POST['sitedev'] == "twomout"){
    $devdeysa = 'Срок реализации: два месяца';
}
if($_POST['sitedev'] == "themout"){
    $devdeysa = 'Срок реализации: три месяца';
}

if($_POST['mycotacts'] == "yes"){  
    $contactMail = $_POST['contactMail'];
    $contactPhone = $_POST['contactPhone'];
}else{
    $contactMail = 'chief@asted.by';
    $contactPhone = '+375 (25) 64-14-796';
}

if($_POST['paytype'] == "onepay"){
    $paychekcs = 'один платеж';
    $priceval = $_POST['client_price'];
        $table = "
   <tr>
    <th>Этап разработки</th>
    <th>Стоимость</th>
    <th>Работы</th>
   </tr>
   <tr><td>Выполнения проекта</td><td> ".$priceval." рублей</td><td>Разработка макета дизайна, прототипа, наполнение контентной частью, верстка html fornt-end шаблона сайта Посадка на cms разработка back-end’a сайта, совместная работа forntend/backend специалистов для подключение лидформ и системы управления загруза сайта на хостинг. Перенос сайта на хостинг заказчика, запуск сайта</td></tr>
   <tr><td>Завершение проекта</td><td>Бесплатно</td><td>Перенос сайта на хостинг заказчика, запуск сайта</td></tr>
   <tr><td>Обучение</td><td>Бесплатно</td><td>Обучем вас и ваш отдел маркетинга (спецалиста) пользоваться системой</td>
  </tr>
    ";
}

if($_POST['paytype'] == "twopay"){
    $paychekcs = 'два платежа';
    $priceval = (int)($_POST['client_price'] / 2);
        $table = "
   <tr>
    <th>Этап разработки</th>
    <th>Стоимость</th>
    <th>Работы</th>
   </tr>
   <tr><td>Начало проекта</td><td>Предоплата ".$priceval." рублей</td><td>Разработка макета дизайна, прототипа, наполнение контентной частью, верстка html fornt-end шаблона сайта Посадка на cms разработка back-end’a сайта, совместная работа forntend/backend специалистов для подключение лидформ и системы управления загруза сайта на хостинг.</td></tr>
   <tr><td>Завершение проекта</td><td>".$priceval." рублей</td><td>Перенос сайта на хостинг заказчика, запуск сайта</td></tr>
   <tr><td>Обучение</td><td>Бесплатно</td><td>Обучем вас и ваш отдел маркетинга (спецалиста) пользоваться системой</td>
   </tr>
    ";
}
if($_POST['paytype'] == "freepay"){
    $paychekcs = 'три платежа платежа';
    $priceval = (int)($_POST['client_price'] / 3);
    $table = "
   <tr>
    <th>Этап разработки</th>
    <th>Стоимость</th>
    <th>Работы</th>
   </tr>
   <tr><td>Начало проекта</td><td>Предоплата ".$priceval." рублей</td><td>Разработка макета дизайна, прототипа, наполнение контентной частью</td></tr>
   <tr><td>Сдача дизайна</td><td>".$priceval." рублей</td><td>Верстка html fornt-end шаблона сайта Посадка на cms разработка back-end’a сайта, совместная работа forntend/backend специалистов для подключение лидформ и системы управления загруза сайта на хостинг</td></tr>
   <tr><td>Завершение проекта</td><td>".$priceval." рублей</td><td>Перенос сайта на хостинг заказчика, запуск сайта</td></tr>
   <tr><td>Обучение</td><td>Бесплатно</td><td>Обучем вас и ваш отдел маркетинга (спецалиста) пользоваться системой</td>
   </tr>
    ";
}

$nowdate = date("d.m.Y");
//$mpdf = new mPDF('',    // mode - default ''
 //'',    // format - A4, for example, default ''
 //0,     // font size - default 0
 //'',    // default font family
 //15,    // margin_left
 //15,    // margin right
 //16,     // margin top
 //16,    // margin bottom
// 9,     // margin header
// 9,     // margin footer
// 'L');  // L - landscape, P - portrait

$mpdf = new mPDF('utf-8', array(192, 140), 0, '', 3, 3, 15, 3);// Define a page size/format by array - page will be 190mm wide x 236mm height
$mpdf->WriteHTML('
    <div><img style="width: 220px;height: 80px;" src="'.$sitelogo.'"></div>

    <div><h1 style="text-align:center">Коммерческое предложение для <br>  <span style="color:red">'.$_POST['client_name'].'</span></h1></div>
<span>
Компания Asted Cloud выражает заинтересованость в разработки функционального, надежного и качественного веб-сайта. Наш опыт в разработке веб-сайтов более 12 лет, наша компания позволит вам быстро получить финальный продукт высокого качества. А цена на оказываемые услуги вас приятно удивит.
</span>
<br><br>
<table>
      <tr>
    <th style="border: 1px dotted black;font-size: 13px;">Разработка сайтов</th>
    <th style="border: 1px dotted black;font-size: 13px;">Интернет магазинов</th>
    <th style="border: 1px dotted black;font-size: 13px;">Квизов</th>
    <th style="border: 1px dotted black;font-size: 13px;">Калькуляторов</th>
    <th style="border: 1px dotted black;font-size: 13px;">Автоматизация бизнес процессов</th>
   </tr>
  </table>
    ');
$mpdf->AddPage();

if($_POST['paytype'] == "onepay"){
$mpdf->WriteHTML('
     <div><h2 style="text-align:center; color: #172a3f;">Стоимость разработки проекта</h2></div>
     Стоимость работ составляет '.$_POST['client_price'].' руб. <br> '.$devdeysa.'.<br>
<table border="1">
   '.$table.'
  </table>
 ');
}else{
$mpdf->WriteHTML('
     <div><h2 style="text-align:center; color: #172a3f;">Стоимость разработки проекта</h2></div>
     Стоимость работ составляет '.$_POST['client_price'].' руб. '.$devdeysa.'.<br>
     Рассрочка на '.$paychekcs.' по '.$priceval .'.<br>
<table border="1">
   '.$table.'
  </table>
 ');
}

$mpdf->AddPage();
$mpdf->WriteHTML('
 <div><h2 style="text-align:center; color: #172a3f;">Разработка проекта</h2></div>
<strong> Гарантия </strong><br>
<span style="font-size:12px">Мы даем неограниченный срок гарантии на нашу разработку. Это значит, если после запуска проекта на вашем сервере и по окончанию договорных обязательств будут обнаружены ошибки и/или недочеты, связанные с любыми аспектами проекта (система астед, интеграции, расчеты, другие функции) допущенные со стороны исполнителя, то исполнитель исправляет их бесплатно. Срок исправления оговаривается отдельно, непосредственно после определения ошибок. </span>
<br><br>
<strong>Дополнительные работы </strong><br>
<span style="font-size:12px">Так же обращаем ваше внимание на то, что во время реализации проекта со стороны заказчика могут поступать предложения о расширении оговоренных ранее или внедрении новых функций. Исполнитель относится к таким вопросам лояльно, т.к. это является нормальной практикой. При этом хотим отметить, если дополнительный объем работы является несущественным, а его влияние на срок разработки незначительное, то исполнитель производит данные работы в рамках проекта. Если объем является значительным, то заказчику будет предложено согласовать эти работы как дополнительные. </span>
<br><br>
<strong>Ход разработки</strong><br>
<span style="font-size:12px">Разработка производится поэтапно. Подготовка архитектуры и макетов, дизайн и верстка, программирование, перенос сайта на хостинг. Каждый этап согласовывается, при необходимости вносятся корректировки. Разработка производится на сервере исполнителя. Вам будет предоставлена прямая ссылка на разработку для проверки, тестирования и наблюдения за ходом работ. </span>
<br><br>
<strong>Установка</strong><br>
<span style="font-size:12px">Установка на сервер заказчика производится исполнителем после полной оплаты.</span>

    ');
if($_POST['weworkedcomp'] == "yes"){
$mpdf->AddPage();
$mpdf->WriteHTML('
    <div>
    <div style="width: 42%;float: left;">
    <div><h2 style="text-align:center; color: #172a3f;">Наши преимущества
</h2></div>
    Программный комплекс Астед Клауд (Аналог 1С Битрикс + Битрикс 24)<br><br>
    Удобная мощная панель управления структурой и контентом <br><br>
    Вместе с сайтом вы получите встроеную CRM, систему аналитики и учета<br><br>
    Бесплатное СЕО-Продвижение (Автоматический sitemap, meta, yandex turbo и прочие)<br><br>
    Открытый программный код (Свободная поддержка продукта)
    </div>
    <div style="width: 52%;float: right;">
<h3 style="color: #172a3f;">Компания Астед - это коллектив программистов, дизайнеров, маретологов, профессионалов в сфере интернет-маркетинга.
</h3>
    Наши партнеры<br>
    <table>
      <tr>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 120px; max-width: 90px;" src="uploads/friend/1mf.png"></th>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 120px; max-width: 90px;" src="uploads/friend/Fielmann-Logo.png"></th>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 120px; max-width: 90px;" src="uploads/friend/hatahost.png"></th>
   </tr>
   <tr>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 120px; max-width: 90px;" src="uploads/friend/kotipes.png"></th>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 120px; max-width: 90px;" src="uploads/friend/horizont.png"></th>
    <th style="border: 1px dotted black;font-size: 13px;height: 120px; width: 90px;"><img style="object-fit: contain;max-height: 90px; max-width: 90px;" src="uploads/friend/unistar.png"></th>
   </tr>
  </table>
  </div>
    </div>
    ');
}
if($_POST['sitegost'] == "yes"){
$mpdf->AddPage();
$mpdf->WriteHTML('<div>
    <div style="width: 42%;float: left;">
    <div><h2 style="text-align:center; color: #172a3f;">Соблюдение требований действующего законодательства Республики Беларусь
к сайтам госорганов и госорганизаций
</h2></div>
    Разработаем современный сайт с соблюдением ГОСТ 2105-2012<br><br>
    На сайте будет внедрен модуль для слабовидящих согласно Постановление Совмина от 23.10.2017 No 797<br><br>
    Закон Республики Беларусь О защите персональных данных 99-З от 07.05.2021
    </div>
    <div style="width: 52%;float: right;"><img style="" src="uploads/deputati_otziv.jpg"></div>
    </div>');
}
$mpdf->AddPage();
if($_POST['siteotzivy'] == "yes"){
$mpdf->WriteHTML('
    <h4 style="text-align:center; color: #172a3f;">О нашей работе
</h4>
    <div style="width: 49%;height: 80%;float: left;">
    <img style="height: 420px" src="uploads/chegerinka_otziv.png">
    </div>
    <div style="width: 50%;height: 80%;float: right;"><img style="height: 420px" src="uploads/vileika_otziv.png"></div>
    ');
}
$mpdf->AddPage();
$mpdf->WriteHTML('
 <div style="width: 100%; background-size: cover; color: #6d7986; background-image:url(uploads/mapclear.jpg);background-repeat: no-repeat;text-align:center;">
 <div style="padding-top: 30px;">
 <span style="background: rgba(240, 248, 255, 0.4);">
     <span style="text-transform: uppercase;"><strong>Наши контакты</strong></span><br>
     <span style="font-size:14px"> <a style="color: rgb(47, 190, 241);" href="tel:'.$contactPhone.'">'.$contactPhone.'</a> <br>
     <a style="color: rgb(47, 190, 241);" href="mailto:'.$contactMail.'">'.$contactMail.'</a></span>
     <br><br>
     <span style="text-transform: uppercase;"><strong>Наше местоположение</strong></span><br>
    <span style="font-size:14px">Република Беларусь, г.Могилев, <br> ул.Резервная 9/2, каб 1 (отдел разработки), каб 2 (отдел продаж), индекс 212002 <br>Ждем вас в любое время</span> <i style="font-size:12px"><br>(пн-пт с 10 до 17)</i>
</span>
 </div>
 <div style="text-align:right;margin-top: 80px;padding-right:40px;font-size:8px;">© '.$nowdate.'<br>
 Asted Offer System: v2 </div>
<div style="height: 160px;width: 160px;position: relative; margin-top: -40px; margin-left: 80px;">
<img style="position: absolute; left: 300px; top: 600px;" src="'.$sitelogo.'">
</div>
 </div>
    ');
if (array_key_exists('pdfviews', $_POST)){
    $mpdf->Output("");
}
if (array_key_exists('pdfdownload', $_POST)){
    $mpdf->Output("uploads/kp".date('hi').".pdf");
    include "core/config.php";
   $name=$_POST['contactname']; 
   $surname=$_POST['contactsurname']; 

$full_name=''.$name.'  '.$surname.'';
    $sql_kp = "INSERT INTO `crm_kp` (author,title,price,download) VALUES ('{$full_name}','{$_POST['client_name']}','{$_POST['client_price']}','kp".date('hi').".pdf')";
     mysqli_query($link, $sql_kp);
    ?>
    <script>
        window.location = 'uploads/kp<?=date('hi')?>.pdf';
    </script>
    <?php
}
?>