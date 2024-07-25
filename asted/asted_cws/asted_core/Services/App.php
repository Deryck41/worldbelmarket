<?php
class Asted{
    public static function app($app_name){
        include "asted_core/App/".$app_name.".php";
    }
}