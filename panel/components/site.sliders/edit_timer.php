<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();

include $_SERVER['DOCUMENT_ROOT'] ."/panel/core/core.php";


if(empty($_POST)){ 
    
    $_POST = json_decode(file_get_contents('php://input'), true);
}


if (isset($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);

    if (!empty($user)){
        if ($user['divisions'] === "1"){
            
            $slider = R::findOne('site_sliders', 'id = ?', [$_POST['id']]);
            $sliderData = json_decode($slider['data'], true);
            

            $sliderData['timer'] = $_POST['value'];
            
            $slider['data'] = json_encode($sliderData);

            R::store($slider);
            echo json_encode(array("status" => "ok"));
            
        }
    }
}
?>