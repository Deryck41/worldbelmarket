<?php
class Libs{
    public static function lib($mod_dir, $mod_name){
        include "asted_core/Libs/".$mod_dir."/".$mod_name.".php";
    }
}