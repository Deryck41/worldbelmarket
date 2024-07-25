<?php
function makeImgName($str){
    return trim(str_replace(' ', '-', translit($str)));
}