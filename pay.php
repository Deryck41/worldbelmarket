<?

include $_SERVER['DOCUMENT_ROOT'] . "/constants.php";

define('ASTEDRB', 'yes');

$SITE_NAME = "Worldbelmarket";
$TEST = 1;

require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

header('Content-Type: application/json');
if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

session_name('terrancrm');
session_start();


if (!empty($_SESSION["id"]) && $_SESSION['type'] === 'user'){
    $siteSettings = R::findOne('crm_site', 'namesite = ?', [$SITE_NAME]);

    if (!empty($siteSettings)){
        $currentPaymentService = $siteSettings['payment_service'];
        $shopData = R::findOne('crm_payment_services', 'name = ?', [$currentPaymentService]);
        
        if (!empty($shopData)){
            
            $order = R::xdispense('site_orders');
            $order['user_id'] = $_SESSION['id'];
            $order['product_ids'] = json_encode(array_keys($_POST['products']));
            $order['product_count'] = json_encode(array_values($_POST['products']));
            $order['payment_method'] = $_POST['payment-method']['method'];
            $order['delivery_method'] = $_POST['delivery-method']['method'];
            $order['adress'] = $_POST['delivery-method']['adres'];
            $order['courier_comment'] = $_POST['delivery-method']['courierComment'];
            if ($order['delivery_method'] === DeliveryMethods::courier){
                $order['delivery_status'] = 'new';
            }
            $order['status'] = 'created';
            $order['start_time'] = time();
            $order_id = uniqid();
            $order['order_stamp'] = $order_id;
            R::store($order);

            $price = array();
            $names = array();
            $counts = array();
            $total = 0;

            foreach ($_POST['products'] as $id => $count) {
                $item = R::findOne('crm_site_catalog', 'id = ?', [$id]);

                if (!empty($item)){
                    array_push($names, $item['title']);
                    array_push($counts, intval($count));
                    array_push($price, floatval($item['price']));
                    $total += intval($count) * floatval($item['price']);
                }
            }


            $seed = strval(rand(1000000000, 9999999999));

            $customer = R::findOne('crm_users', 'id = ?', [$_SESSION['id']]);
            $total = number_format($total, 2, '.', '');
            $total = strval($total);

            if ($TEST){
                $url = "https://securesandbox.webpay.by/api/v1/payment";
            }
            else{
                $url = "https://payment.webpay.by/api/v1/payment";
            }


            switch ($_POST['payment-method']['method']){
                case "Assist (карты, электронные кошельки)":
                    CardPayment($shopData, $order_id, $seed, $TEST, $names, $counts, $price, $total, $customer, $url);
                    break;
                case "«РАСЧЕТ» (ЕРИП)":
                    EripPayment($shopData, $order_id, $seed, $TEST, $names, $counts, $price, $total, $customer, $url);
                    break;
            }
            
                /*"wsb_customer_address" => "Минск ул. Шафарнянская д.11 оф.54", 
                "wsb_service_date" => "Доставка до 1 января 2022 года", 
                "wsb_tax" => 10.5, 
                "wsb_shipping_name" => "Стоимость доставки", 
                "wsb_shipping_price" => 0.98, 
                "wsb_discount_name" => "Скидка на товар", 
                "wsb_discount_price" => 0.58, 
                "wsb_order_tag" => "Договор №152/12-1 от 12.01.19", 
                "wsb_email" => "ivanov@test.by", 
                "wsb_phone" => "375291234567", 
                "wsb_order_contract" => "Договор №152/12-1 от 12.01.19", 
                "wsb_tab" => "cardPayment", 
                "wsb_startsesstime" => "1603383601", 
                "wsb_startsessdatetime" => "2020-10-22T16:20:01+03:00" */

        }
        else{
            echo json_encode(array('success' => false, 'message' => "Ошибка конфигурации сайта 0C1. Сообщите администратору"));
        }

    }
    else{
        echo json_encode(array('success' => false, 'message' => "Ошибка конфигурации сайта 0C0. Сообщите администратору"));
    }
}
else{
    echo json_encode(array('success' => false, 'message' => "Вы не авторизованы как пользователь!"));
}

function CardPayment($shopData, $order_id, $seed, $TEST, $names, $counts, $price, $total, $customer, $url){
    $data = array(
        "wsb_storeid" => $shopData['shop_id'], // +
        "wsb_order_num" => "ORDER-".$order_id, // + 
        "wsb_currency_id" => "BYN", // +
        "wsb_version" => 2, // +
        "wsb_seed" => $seed, // +
        "wsb_test" => $TEST, // + 
        "wsb_invoice_item_name" => $names, // +
        "wsb_invoice_item_quantity" => $counts, // +
        "wsb_invoice_item_price" => $price, // +
        "wsb_total" => $total, // + 
        "wsb_signature" => sha1($seed . $shopData['shop_id']. "ORDER-".$order_id . strval($TEST) . "BYN" . strval($total) . $shopData['shop_key']), 
        "wsb_3ds_payment_option" => "auto", 
        "wsb_store" => "WorldBelMarket", 
        "wsb_language_id" => "russian", 
        "wsb_redirect" => 1, 
        "wsb_return_format" => "json", 
        "wsb_notify_url" => "https://worldbelmarket.by/notifypay.php", 
        "wsb_customer_name" => $customer['name'] . ' ' . $customer['surname'] . ' ' . $customer['lastname']
        );
   
        $content = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        
        $json_response = curl_exec($curl);
        
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        
        
        curl_close($curl);
        
        $response = json_decode($json_response, true);

        echo json_encode(array('success' => true, 'redirect' => $response['data']['redirectUrl']));
}

function EripPayment($shopData, $order_id, $seed, $TEST, $names, $counts, $price, $total, $customer, $url){
    $data = array(
        "wsb_storeid" => $shopData['shop_id'], // +
        "wsb_order_num" => "ORDER-".$order_id, // + 
        "wsb_currency_id" => "BYN", // +
        "wsb_version" => 2, // +
        "wsb_seed" => $seed, // +
        "wsb_test" => $TEST, // + 
        "wsb_invoice_item_name" => $names, // +
        "wsb_invoice_item_quantity" => $counts, // +
        "wsb_invoice_item_price" => $price, // +
        "wsb_total" => $total, // + 
        "wsb_signature" => sha1($seed . $shopData['shop_id']. "ORDER-".$order_id . strval($TEST) . "BYN" . strval($total) . $shopData['shop_key']), 
        "wsb_store" => "WorldBelMarket", 
        "wsb_language_id" => "russian", 
        "wsb_redirect" => 1, 
        "wsb_return_format" => "json", 
        "wsb_notify_url" => "https://worldbelmarket.by/notifypay.php", 
        "wsb_customer_name" => $customer['name'] . ' ' . $customer['surname'] . ' ' . $customer['lastname'],
        "wsb_tab" => "erip"
        );
  
        $content = json_encode($data);

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        
        $json_response = curl_exec($curl);
        
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        
        
        curl_close($curl);
        
        $response = json_decode($json_response, true);

$log = R::xdispense('log');
$log['time'] = $json_response;
$log['log'] = json_encode($_POST);
R::store($log);

        echo json_encode(array('success' => true, 'redirect' => $response['data']['redirectUrl']));
}
?>