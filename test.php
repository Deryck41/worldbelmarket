<?
include_once "valid.php";

session_name('terrancrm');
session_start();
session_set_cookie_params(2 * 7 * 24 * 60 * 60);

define('ASTEDRB', 'yes');

$MAX_PHOTO_COUNT = 5;

require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";


$_POST = json_decode($_POST['another'], true);
// echo "title: ". $_POST['title'];
// echo "price: ". $_POST['price'];
// echo "description: ". $_POST['description'];
// echo "photo: ";
// print_r($_FILES['photo']);

function CheckStore($store){
    $searchStore = R::find('crm_site_section', 'websitemodule = ? AND id = ?', ["catalog", $store]);

    return !empty($searchStore);
}

function CheckPhoto($photo){
    
    if (!empty($photo)){
        
    switch ($photo['type']){
        case "image/jpeg":
        case "image/jpg":
        case "image/png":
            $info = pathinfo($photo['name']);
            $actualFile = '/asted/images/' . uniqid("", true).".". $info['extension'];
            move_uploaded_file($photo['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $actualFile);
            return $actualFile;
        default:
        
        return false;
    }
    }
}

if (isset($_SESSION['id']) && $_SESSION['type'] === "provider"){
if (validate('product-name', $_POST['title'], true) 
    && validate('price', $_POST['price'], true) 
    && validate('product-description', $_POST['description'], true) && CheckStore($_POST['store']) && isset($_POST['weight'])){
        $newProduct = R::xdispense('site_products');
        $newProduct['user'] = $_SESSION['id'];
        $newProduct['catalog'] = $_POST['store'];
        $newProduct['title'] = $_POST['title'];
        $newProduct['price'] = $_POST['price'];
        $newProduct['description'] = $_POST['description'];
        $newProduct['extra'] = 0;
        $newProduct['weight'] = $_POST['weight'];
        $newProduct['photo'] = "";

        for ($i = 0; $i < $MAX_PHOTO_COUNT; $i++){
            $photo = CheckPhoto($_FILES["photo-".$i]);
            if ($photo){
                $newProduct['photo'] .= $photo.";";
            }
        }

        if (strlen($newProduct['photo']) > 0){
            $newProduct['photo'] = substr($newProduct['photo'], 0, -1);
        }
        
        

        $newProduct['status'] = 'moderation';

        if (R::store($newProduct)){
            echo json_encode(array('message' => 'Товар размещён и проходит модерацию', 'redirect' => '/provider-products'), JSON_UNESCAPED_UNICODE);
        }
        else{
            echo json_encode(array('message' => 'Произошла ошибка, попробуйте позже'), JSON_UNESCAPED_UNICODE);
        }
            
}
else{
    echo json_encode(array('message' => 'Данные не прошли валидацию'), JSON_UNESCAPED_UNICODE);
}
}
else{
    echo json_encode(array('message' => 'Вы не вошли как поставщик'), JSON_UNESCAPED_UNICODE);
}
?>