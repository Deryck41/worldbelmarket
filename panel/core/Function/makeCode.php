<?php
function makeCode($str){
    return trim(preg_replace('~[^-a-z0-9_]+~u', '', strtolower(translit($str))), "-");
}