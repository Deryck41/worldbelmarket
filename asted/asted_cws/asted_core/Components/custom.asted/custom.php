<?php
function smarty_function_custom($params, $smarty)
{
    $forsection = isset($params['forsection']) ? $params['forsection'] : '';
    $order = isset($params['order']) ? $params['order'] : '';
    $style = isset($params['style']) ? $params['style'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    $category = isset($params['category']) ? $params['category'] : '';
    $parent = isset($params['parent']) ? $params['parent'] : '';
    if (empty($order)) {
        $order = 'ASC';
    }
    switch ($type) {
        case "detail":
            if (empty(!$params['product'])) {
                $product = isset($params['product']) ? $params['product'] : '';
                $astedCatalog = R::findOne('crm_site_custom', ' pageurl=?', [$product]);
                $astedCustom[] = $astedCatalog;
            }
            break;
        case "card":
            $astedCustom = R::find('crm_site_custom', ' parent=?', [$category]);
            break;
        case "main":
            $astedCatalog = R::findOne('crm_site_custom', ' forsection=? and main=?', [$forsection, 1]);
            $astedCustom[] = $astedCatalog;
            break;
        default:
            $astedCustom = R::find('crm_site_custom', ' forsection=? ORDER BY sort DESC, id ' . $order . '', [$forsection]);
            break;
    }

    foreach ($astedCustom as $custom) {
        $custom['parent'] = $parent;
        $customArray[] = $custom;
    }
    return $smarty->fetch('components/custom/' . $style . '.acws', array('customArr' => $customArray));
}
