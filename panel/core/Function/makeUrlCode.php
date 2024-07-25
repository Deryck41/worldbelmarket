<?php
function makeUrlCode($str){
    $transliterated = translit($str);
    $transliterated = preg_replace('~[^-\pL\pN]+~u', '-', $transliterated);
    $transliterated = trim($transliterated, '-');
    $transliterated = mb_strtolower($transliterated, 'UTF-8');
    return $transliterated;
}
