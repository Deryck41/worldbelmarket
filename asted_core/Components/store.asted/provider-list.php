<?
session_name('terrancrm');
session_start();
function smarty_function_provider_list($params, $smarty)
{
    
    $style = isset($params['style']) ? $params['style'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    
    switch ($type) {
        default:
            $products = R::find('site_products', 'user = ?', [$_SESSION['id']]);
            return $smarty->fetch('components/product-list/' . $style . '.acws', array('products' => $products));
            break;
    }
}

?>