<?php
//----Asted Theme Engine----//
//Шаблонизатор астеда
$directoryTerranWebSiteTheme    = 'asted_themes';
$scanned_directory = array_diff(scandir($directoryTerranWebSiteTheme, 1), array('..', '.'));
$scanned_directory = array_diff($scanned_directory, [".DS_Store"]);
$terranThemeCount = count($scanned_directory);

$inThemse = $site['0']['webtemplate'];

$smarty = new Smarty();
//----Asted Theme Engine End----//

//----Asted Theme Patch----//
//пути с темой астед, не менять!!!
$asted_theme =  '/asted_themes/' . $inThemse . '/';
$asted_themes =  'asted_themes/' . $inThemse;
$smarty->template_dir = 'asted_themes/' . $inThemse . '/';
$smarty->cache_dir = 'asted_cache/';
//----Asted Site Admin END----//
