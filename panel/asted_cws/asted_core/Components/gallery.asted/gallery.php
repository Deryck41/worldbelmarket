<?php
function smarty_function_gallery($params, $smarty)
{
    $code = isset($params['code']) ? $params['code'] : '';
    $style = isset($params['style']) ? $params['style'] : '';
    $astedCustom = R::findOne('crm_site_galery', ' shortcode = ?', [$code]);
    return $smarty->fetch('components/gallery/' . $style . '.acws', array('galleryArr' => $astedCustom));
}
