<?php
function smarty_function_stores($params, $smarty)
{
    
    $style = isset($params['style']) ? $params['style'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    
    switch ($type) {
        default:
            $stores = R::find('crm_site_section', 'websitemodule = ?', ["catalog"]);
            return $smarty->fetch('components/stores/' . $style . '.acws', array('stores' => $stores));
            break;
    }
}
?>