<?php
function smarty_function_reviews($params, $smarty)
{
    $status = isset($params['status']) ? $params['status'] : '';
    $style = isset($params['style']) ? $params['style'] : '';
    $astedreviews = R::find('crm_site_reviews', ' status=?', [$status]);
    foreach ($astedreviews as $reviews) {
        $reviewsArray[] = $reviews;
    }
    return $smarty->fetch('components/reviews/' . $style . '.acws', array('reviewsArr' => $reviewsArray));
}
