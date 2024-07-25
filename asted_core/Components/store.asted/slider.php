<?php
function smarty_function_slider($params, $smarty)
{
    $style = isset($params['style']) ? $params['style'] : '';
    $id = isset($params['id']) ? $params['id'] : '';

    $slider = R::findOne('site_sliders', 'id = ?', [$id]);
    $data = json_decode($slider['data'], true);

    
    return $smarty->fetch('components/sliders/' . $style . '.tpl', array('slider' => $data));
}
