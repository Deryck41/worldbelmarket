<?php
/*
==============================
==========ASTED CWS===========
==============================
---------Description----------
Appointment: Инициализация данных
File: cws_init.php
----------Copyright-----------
Engine: Asted Cloud Web System
Website: https://asted.by/
Support: chief@asted.by
2022, ООО "Астед" / Asted Ink.
Данный код защищен авторскими правами /  This code is protected by copyright
Разработано в Республике Беларусь / Mada in Republic of Belarus
*/
$admin_path = 'asted';//как называется папка с админкой астед, так же меняем в скрытом файле .htaccess
require('Services/Libs.php');
require('Services/App.php');
Libs::lib('smarty3_php5plus', 'Smarty.class'); //Библиотека::Smarty-шаблнизатор
Libs::lib('redbeanphp', 'rb'); //Библиотека::RB-базыданных
define('ASTEDRB','yes');
$config = "Config/db.php";
if (file_exists($config)) {
  require('config.php');
}else{
  include('./asted/core/config.php');
}

require('Query/cws_query.php');
include('Parts/error.php');
include('Parts/theme.php');
//Asted::app('email'); //Asted::вывод ошибок
//Asted::app('theme'); //Asted::вывод ошибок
include('App/page.php');
include('App/email.php');
include('App/request_uri.php');

//Asted::Новые компоненты
//Asted::Используют стандартный функционал smarty
include('Components/menu.asted/menu.php');
include('Components/news.asted/news.php');
include('Components/store.asted/category.php');
include('Components/store.asted/catalog.php');
include('Components/custom.asted/custom.php');
include('Components/gallery.asted/gallery.php');
include('Components/reviews.asted/reviews.php');
include('Components/sql.asted/sql.php');

//Asted::Визуальная часть
include('Parts/visual.php');