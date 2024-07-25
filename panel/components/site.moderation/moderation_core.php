<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();




$WEBSITE = '1';
include $_SERVER['DOCUMENT_ROOT'] ."/asted/core/core.php";




if(empty($_POST)){ 
    $_POST = json_decode(file_get_contents('php://input'), true);
}

function TranslitName($str){
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
    'г' => 'g',   'д' => 'd',   'е' => 'e',
    'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
    'и' => 'i',   'й' => 'y',   'к' => 'k',
    'л' => 'l',   'м' => 'm',   'н' => 'n',
    'о' => 'o',   'п' => 'p',   'р' => 'r',
    'с' => 's',   'т' => 't',   'у' => 'u',
    'ф' => 'f',   'х' => 'h',   'ц' => 'c',
    'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
    'ь' => '',  'ы' => 'y',   'ъ' => '',
    'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

    'А' => 'A',   'Б' => 'B',   'В' => 'V',
    'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
    'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
    'И' => 'I',   'Й' => 'Y',   'К' => 'K',
    'Л' => 'L',   'М' => 'M',   'Н' => 'N',
    'О' => 'O',   'П' => 'P',   'Р' => 'R',
    'С' => 'S',   'Т' => 'T',   'У' => 'U',
    'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
    'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
    'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
    'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    '_' => '-', ' ' => '-'
);
return strtr($str, $converter);
}

function AddToMarketPlace($product) {
    global $WEBSITE;
    $newProduct = R::xdispense('crm_site_catalog');
    $newProduct['title'] = $product['title'];
    $pageurl = generateUniqueTourl(TranslitName($product['title']), 'crm_site_catalog');
    $newProduct['pageurl'] = $pageurl;
    $newProduct['forsection'] = $product['catalog'];
    $newProduct['forwebsite'] = $WEBSITE;
    $newProduct['content'] = $product['description'];
    $newProduct['price'] = intval($product['price']) + (intval($product['price']) * (intval($product['extra'])/100));
    $newProduct['image_images'] = $product['photo'];
    $newProduct['gallery_images'] = $product['photo'];
    $newProduct['weight'] = $product['weight'];
    $newProduct['origin'] = $product['id'];
    R::store($newProduct);
    
    return $pageurl;
}

function Delete($product){
    $productToDelete = R::findOne('crm_site_catalog', 'origin = ?', [$product['id']]);
    R::trash($productToDelete);
}

function Clear($product){
    $productToDelete = R::findOne('site_products', 'id = ?', [$product['id']]);
    R::trash($productToDelete);
}

function EditExtra($product, $extra){
    if (is_numeric($extra) && intval($extra) >= 0){
        if ($product['status'] === 'active'){
            $marketplaceProduct = R::findOne('crm_site_catalog', 'pageurl = ?', [$product['origin_pageurl']]);
            $marketplaceProduct['price'] = intval($product['price']) + (intval($product['price']) * (intval($extra)/100));
            R::store($marketplaceProduct);
        }
        return intval($extra);
    }
    return 0;
}
if (isset($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);
    if (!empty($user)){
        if ($user['divisions'] === "1"){
            if (isset($_POST['type']) && isset($_POST['id'])){
                $product = R::findOne('site_products', 'id = ?', [$_POST['id']]);
                $update = true;

                if (!empty($product)){
                    switch($_POST['type']){
                        case "accept":
                            $product['status'] = 'active';  
                            $originPURL = AddToMarketPlace($product);  
                            $product['origin_pageurl'] = $originPURL;  
                            break;
                        case "reject":
                            $product['status'] = 'rejected';
                            break;
                        case "delete":
                            Delete($product);
                            $product['status'] = 'rejected';
                            break;
                        case "clear":
                            Clear($product);
                            $update = false;
                            break;
                        case "edit_extra":
                            $product['extra'] = EditExtra($product, $_POST['value']);
                            break;
                        
                    }
                    if ($update){
                        R::store($product);
                    }
                    echo json_encode(array('redirect'=>'.'), JSON_UNESCAPED_UNICODE);
                }
                else{
                    echo json_encode(array('message' => 'Продукт не найден'), JSON_UNESCAPED_UNICODE);
                }
            }
            else{
                echo json_encode(array('message' => 'Неверный запрос'), JSON_UNESCAPED_UNICODE);
            }
        }
    }
}

?>