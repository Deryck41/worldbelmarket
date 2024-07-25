<?

include $_SERVER['DOCUMENT_ROOT'] . '/home/worldbel/public_html/constants.php';

// For CRON: /usr/local/bin/php /home/worldbel/public_html/updatepaystatus.php

define('ASTEDRB', 'yes');

include $_SERVER['DOCUMENT_ROOT'] . '/home/worldbel/public_html/asted_core/Libs/redbeanphp/rb.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('log_errors', 'On');
ini_set('display_errors', 'On');
ini_set('error_reporting', E_ALL);
include $_SERVER['DOCUMENT_ROOT'] . "/home/worldbel/public_html/asted/core/config.php";

$store = 534241233;
$login = "worldbelm2";
$PASSWORD = "z3Qm1VFQK1";

$data = array(
    "merchantId" => $store,
    "username" => $login,
    "password" => $PASSWORD
);

$loginUrl = "https://sandbox.webpay.by/api/login";

$content = json_encode($data);

$curl = curl_init($loginUrl);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

$response = json_decode($json_response, true);

$token =  $response['data']['auth_token'];
echo $token;

if (!empty($token)){
    $orders = R::find('site_orders');

    foreach ($orders as $order) {
        echo $order['status']. "<br>  ";
        if ($order['status'] === 'created' || $order['status'] === 'Authorized' || $order['status'] === ""){
            $orderNumber = "ORDER-".$order['order_stamp'];
            echo $orderNumber."<br>";
            $url = "https://sandbox.webpay.by/api/v1/transactions/info/invoice/".$orderNumber;  

            $statusRequest = curl_init($url);
            curl_setopt($statusRequest, CURLOPT_URL, $url);
            curl_setopt($statusRequest, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($statusRequest, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token));

            $json_response = curl_exec($statusRequest);
            $status = curl_getinfo($statusRequest, CURLINFO_HTTP_CODE);
            curl_close($statusRequest);
            
            $response = json_decode($json_response, true);
            echo $json_response.'<br><br>';
            if (count($response['errors']) === 0 || !$response['errors'][0] === "Invoice not found"){
            $order['status'] = $response['data'][0]['status'];

            }
            echo "<br>".$order['status'];
            R::store($order);
            
        }
    }
}

$orders = R::find('site_orders');

$TIME_FOR_ORDERS = 60 * 60 * 24 * 30 * 3; // 90 days
$TIME_FOR_CREATED_ORDERS = 60 * 60; // 1 hour

foreach ($orders as $order){
    if ($order['status'] === "created"){
        if( time() - intval($order['start_time']) >= $TIME_FOR_CREATED_ORDERS){
            R::trash($order);
        }
    }
    else if ($order['status'] !== "Authorized"){
        if( time() - intval($order['start_time']) >= $TIME_FOR_ORDERS){
            R::trash($order);
        }

        if ($order['status'] === 'Completed' && $order['delivery_method'] === DeliveryMethods::courier){
            if ($order['delivery_status'] === "new"){
                createDPDOrder($order);
            }
        }
    }
}

function createDPDOrder($order) {
    // DPD API credentials
    $dpd_login = "272262ru";
    $dpd_password = "CA3YCV";
    $dpd_token = base64_encode("$dpd_login:$dpd_password");

    // Order details (replace these with actual data)
    $shipmentDetails = array(
        "orderNumberInternal" => "ORDER-" . $order['order_stamp'],
        "serviceCode" => "PCL",
        "senderAddress" => array(
            "name" => "Sender Name",
            "countryName" => "Belarus",
            "city" => "Minsk",
            "street" => "Sender Street",
            "postalCode" => "220000",
            "phone" => "123456789"
        ),
        "receiverAddress" => array(
            "name" => $order['customer_name'],
            "countryName" => $order['country'],
            "city" => $order['city'],
            "street" => $order['street'],
            "postalCode" => $order['postal_code'],
            "phone" => $order['phone']
        ),
        "weight" => 1.0, // weight in kg
        "serviceVariant" => "ТЕРМО"
    );

    $shipmentUrl = "http://appl.dpd.ru/epickup/order";

    $shipmentContent = json_encode($shipmentDetails);

    $shipmentRequest = curl_init($shipmentUrl);
    curl_setopt($shipmentRequest, CURLOPT_HEADER, false);
    curl_setopt($shipmentRequest, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($shipmentRequest, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json",
        "Authorization: Basic $dpd_token"
    ));
    curl_setopt($shipmentRequest, CURLOPT_POST, true);
    curl_setopt($shipmentRequest, CURLOPT_POSTFIELDS, $shipmentContent);

    $shipment_response = curl_exec($shipmentRequest);
    $shipment_status = curl_getinfo($shipmentRequest, CURLINFO_HTTP_CODE);
    curl_close($shipmentRequest);

    $shipment_response_data = json_decode($shipment_response, true);

    if ($shipment_status == 200 && isset($shipment_response_data['orderNumber'])) {
        return "Order created successfully: " . $shipment_response_data['orderNumber'];
    } else {
        return "Failed to create order: " . $shipment_response;
    }
}


?>