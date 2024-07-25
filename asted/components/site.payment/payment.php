<?php
include "templates/header.php";

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/asted/components/site.payment/style.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <h3>Платежи:</h3>
        </div>
        
    </div>
    <div class="row">
        
        <div class="col-md-2">
            <h4>Список</h4>
            <!-- <select name="moderation" class="moderation-select">
            <option value="all">Все</option>
                <option value="moderation">Авторизованные</option>
                <option value="on-market">Созданные</option>
                <option value="rejected">Оплаченные</option>
                
            </select> -->


        </div>
        <div class="products">
            <?
            $orders = R::find('site_orders');
            foreach ($orders as $order) {
                ?>
                <div class="product-item" data-id="<?= $order['id']?>">
                    <?
                    $user = R::findOne('crm_users', 'id = ?', [$order['user_id']]);
                    ?>
                    <div class="product-title product-column">Покупатель: <?= $user['name'] . ' ' . $user['surname'] . ' ' . $user['lastname'] ?></div>
                    <div class="product-title product-column">Тип: <?= $user['legal'] ? "Физ. лицо" : "Юр. лицо" ?></div>
                    <?
                    if (!$user['legal']){
                        echo '<div class="product-title product-column">Реквезиты: ' . $user['urequisites'] . '</div>';
                    }
                    ?>
                    <div class="product-column product-status">Статус: <? 
                    
                    switch ($order['status']){
                        case "created":
                            echo '<i class="fa-solid fa-plus"></i> <span style="padding-left: 10px">Создан</span>';
                            break;
                        case "Completed":
                            echo '<i class="fa-solid fa-check" style="color: green;"></i> <span style="padding-left: 10px; color: green;">Завершён</span>';
                            break;
                        case "Authorized":
                            echo '<i class="fa-solid fa-money-bill-transfer" style="color: grey;"></i> <span style="padding-left: 10px; color: grey;">Средства списаны</span>';
                            break;
                        case "":
                            echo '<i class="fa-solid fa-xmark" style="color: red;"></i> <span style="padding-left: 10px; color: red;">Ошибка</span>';
                            break;
                    }
                    ?></div>
                                        
                    <div class="products-box">
                        
                         <?
                            $productIds = json_decode($order['product_ids']);
                            $productCounts = json_decode($order['product_count']);
                            for ($i=0; $i < count($productIds); $i++){
                                ?>
                                <div class="product">
                                <?
                                $product = R::findOne('crm_site_catalog', 'id = ?', [$productIds[$i]]);
                                echo '<div class="product-name">Название товара: '.$product['title'].'</div>';
                                echo '<div class="product-count">Количество товара: '.$productCounts[$i].'</div>';
                                echo '<div class="product-price">Стоимость за все товары: '.floatval($productCounts[$i]) * floatval($product['price']).' BYN </div>';
                                echo '<div class="product-price">Цена за единицу товара: '. $product['price'] . ' BYN </div>';
                                echo '<div class="product-price">Тип оплаты: '. $order['payment_method'] . '</div>';
                                echo '<div class="product-price">Тип доставки: '. $order['delivery_method'] . '</div>';
                                echo '<div class="adress">Адрес: ' . ($order['adress'] ? $order['adress'] : "Не указан") . '</div>';

                                if (!empty($product['origin'])){
                                    $originProduct = R::findOne('site_products', 'id = ?', [$product['origin']]);
                                    $provider = R::findOne('crm_users', 'id = ?', [$originProduct['user']]);
                                    echo '<div class="product-provider">Поставщик: ' . $provider['name'] . ' ' . $provider['lastname'] . ' ' . $provider['surname'] . '</div>';
                                    echo '<div class="requisites-provider">Реквезиты: ' . $provider['requisites'] . '</div>';
                                    echo '<div class="requisites-provider">Изначальная цена товара: ' . $originProduct['price'] . ' BYN</div>';
                                    echo '<div class="requisites-provider red">К оплате: ' . floatval($originProduct['price']) * floatval($productCounts[$i]) . ' BYN</div>';
                                    echo '<div class="requisites-provider green">Ваша прибыль: ' . ((floatval($productCounts[$i]) * floatval($product['price'])) - (floatval($originProduct['price']) * floatval($productCounts[$i]))) . ' BYN</div>';
                                }
                                ?>
                                </div>
                                <?
                            }
                         ?>
                    </div>

                </div> 
                <?
            }
            ?>
            </div>
    </div>
</div>
<?php include "templates/footer.php";
