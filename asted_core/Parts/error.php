<?php
//----Asted Site Error----//
//Выводим ошибки пихипи
if($site['0']['phperrorsite'] == "0"){
    error_reporting(E_ALL ^ E_NOTICE);
}
if($site['0']['phperrorsite'] == "1" or null){

}
if($site['0']['phperrorsite'] == "2"){
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', 'Off');
    ini_set('error_reporting', E_ALL );
}
//----Asted Site Error End----//