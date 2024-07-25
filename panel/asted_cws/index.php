<?php
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();
header('Content-Type: text/html; charset=utf-8');
require('asted_core/cws_init.php');
/*
==============================
==========ASTED CWS===========
==============================
---------Description----------
Appointment: Главный системный файл
File: index.php
----------Copyright-----------
Engine: Asted Cloud Web System
Website: https://asted.by/
Support: chief@asted.by
2022, ООО "Астед" / Asted Ink.
Данный код защищен авторскими правами /  This code is protected by copyright
Разработано в Республике Беларусь / Mada in Republic of Belarus
*/