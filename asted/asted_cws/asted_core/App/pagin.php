<?php
include "../../asted/core/rb.php";
define('ASTEDRB', 'yes');
include "../../asted/core/config.php";
if (isset($_POST['page'])) {
    $page = $_POST['page'];
    $limit = 20;
    $offset = ($page - 1) * $limit;
    if (!empty($_POST['category'])) {
    $products = R::findAll('crm_site_catalog', 'category=? ORDER BY id DESC LIMIT ? OFFSET ?', [$_POST['category'],$limit, $offset]);
    }else{
    $products = R::findAll('crm_site_catalog', 'ORDER BY id DESC LIMIT ? OFFSET ?', [$limit, $offset]);
    }
    $html = '';
    foreach ($products as $product) {
        $html .= '<div class="card-catalog-wrapper col-lg-3 col-sm-12 col-12">
        <div class="card-item-image-wrapper">
            <img class="card-item-image" src="'.$product['images'].'">
        </div>
        <div class="text-card-wrapper">
            <div class="wrapper-card-title">
                <h4 class="name-card-item">'.$product['title'].'</h4>
            </div>
        </div>
        <a href="/catalog/'.$product['category'].'/'.$product['pageurl'].'/">Подробнее</a>
    </div>';
    }
    echo $html;
}
