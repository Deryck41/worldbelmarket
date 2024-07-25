<?
session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
function smarty_function_providerlist($params, $smarty)
{
    
    $style = isset($params['style']) ? $params['style'] : '';
    $type = isset($params['type']) ? $params['type'] : '';
    $uid = isset($_SESSION['id']) ? $_SESSION['id'] : false;
    switch ($type) {
        default:
            
            $products = $uid ? R::find('site_products', 'user = ?', [$uid]) : array();
            return $smarty->fetch('components/product-list/' . $style . '.acws', array('products' => $products));
            break;
    }
}

?>