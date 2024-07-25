<?

session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);

include $_SERVER['DOCUMENT_ROOT'] ."/asted/core/core.php";

if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

if (!empty($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);
    if (!empty($user)){
        if ($user['divisions'] === "1"){

            $allOrders = R::getAll('SELECT so.*, cu.name, cu.surname FROM site_orders so JOIN crm_users cu ON so.user_id = cu.id WHERE 1=1');

            $result = array();
            if (isset($_GET['search'])){
                if ($_GET['search'] === ""){
                    $result = $allOrders;
                    
                }
                else{
                    foreach($allOrders as $searchOrder){
                        if (
                            mb_stristr($searchOrder['name'], $_GET['search'], false, 'UTF-8') || 
                            mb_stristr($searchOrder['order_stamp'], $_GET['search'], false, 'UTF-8') || 
                            mb_stristr($searchOrder['surname'], $_GET['search'], false, 'UTF-8') ||
                            mb_stristr($searchOrder['name'] . ' ' . $searchOrder['surname'], $_GET['search'], false, 'UTF-8')
                            )
                            {
                                array_push($result, $searchOrder);
                            }
                            else{
                                $ids = json_decode($searchOrder['product_ids']);
        
                                foreach($ids as $id){
                                    $product = R::findOne('crm_site_catalog', 'id = ?', [$id]);
        
                                    if (mb_stristr($product['price'], $_GET['search'], false, 'UTF-8')){
                                        array_push($result, $searchOrder);
                                        break;
                                    }
                                }
                            }
                       
                       }
                }
               
            }
            else{
                $result = $allOrders;
            }

            if (isset($_GET['filter'])){
                switch($_GET['filter']){
                    case "created":
                        $filter = "created";
                        break;
                    case "Completed":
                        $filter = "Completed";
                        break;
                    case "Authorized":
                        $filter = "Authorized";
                        break;
                    case "error":
                        $filter = "";
                        break;
                    default:
                        $filter = "";
                }
            }
            
            if ($filter !== ""){
                $temp = $result;
                $result = array();
                foreach ($temp as $filteredOrder){
                    if ($filteredOrder['status'] === $filter){
                        array_push($result, $filteredOrder);
                    }
                }
            }


            // $sql = "SELECT so.*, cu.name, cu.surname FROM site_orders so JOIN crm_users cu ON so.user_id = cu.id WHERE ";

            // if (isset($_GET['search'])){
            //     $sql .= "(so.order_stamp LIKE ? OR cu.name LIKE ? OR cu.surname LIKE ? OR CONCAT(CONCAT(cu.name, ' '), cu.surname) LIKE ?)";
            // }
            // $filter = "";
            // if (isset($_GET['filter'])){
            //     switch($_GET['filter']){
            //         case "created":
            //             $filter = "created";
            //             break;
            //         case "Completed":
            //             $filter = "Completed";
            //             break;
            //         case "Authorized":
            //             $filter = "Authorized";
            //             break;
            //         case "error":
            //             $filter = "";
            //             break;
            //         default:
            //             $filter = "";
            //     }
            // }

            // if ($filter !== ""){
            //     if (isset($_GET['search'])){
            //         $sql .= " AND ";
            //     }
            //     $sql .= "so.status = '".$filter."'";
            // }
            // else{
            //     if (!isset($_GET['search'])){
            //         $sql .= "1 = 1";
            //     }
            // }

            // $search = "%" . $_GET['search'] . "%";
            // $orders = R::getAll($sql, [$search, $search, $search, $search]);

            $orders = $result;
            foreach ($orders as $order) {
                ?>
                <div class="product-item" data-id="<?= $order['id']?>">
                    <?
                    $user = R::findOne('crm_users', 'id = ?', [$order['user_id']]);
                    ?>
                    <div class="product-title product-column">Номер заказа: <?= $order['order_stamp'] ?></div>
                    <div class="product-title product-column">Покупатель: <?= $user['name'] . ' ' . $user['surname'] . ' ' . $user['lastname'] ?></div>
                    <div class="product-title product-column">Тип: <?= $user['legal'] ? "Физ. лицо" : "Юр. лицо" ?></div>
                    <?
                    if (!$user['legal']){
                        echo '<div class="product-title product-column">Реквезиты: ' . $user['urequisites'] . '</div>';
                        echo '<div class="product-title product-column">УНП: ' . $user['uint'] . '</div>';
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
                                echo '<div class="adress">Коментарий курьеру: ' . ($order['courier_comment'] ? $order['courier_comment'] : "Не указан") . '</div>';

                                if (!empty($product['origin'])){
                                    $originProduct = R::findOne('site_products', 'id = ?', [$product['origin']]);
                                    $provider = R::findOne('crm_users', 'id = ?', [$originProduct['user']]);
                                    echo '<div class="product-provider">Поставщик: ' . $provider['name'] . ' ' . $provider['lastname'] . ' ' . $provider['surname'] . '</div>';
                                    echo '<div class="requisites-provider">Телефон: ' . $provider['phone'] . '</div>';
                                    echo '<div class="requisites-provider">Почта: ' . $provider['email'] . '</div>';
                                    echo '<div class="requisites-provider">УНП: ' . $provider['unp'] . '</div>';
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
            
        }
    }
}
?>