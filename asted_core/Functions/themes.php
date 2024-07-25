<?php
function themes(){
    //----Asted Theme Patch----//
    //пути с темой астед, не менять!!!
    $asted_theme =  '/asted_themes/' . $inThemse . '/';
    $asted_themes =  'asted_themes/' . $inThemse;
    $smarty->template_dir = 'asted_themes/' . $inThemse . '/';
    $smarty->cache_dir = 'asted_cache/';
    //----Asted Site Admin END----//
}
?>