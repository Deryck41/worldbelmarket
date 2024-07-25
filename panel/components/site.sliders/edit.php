<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();

include $_SERVER['DOCUMENT_ROOT'] ."/panel/core/core.php";


if(empty($_POST)){ 
    
    $_POST = json_decode(file_get_contents('php://input'), true);
}


function CheckPhoto($photo){
    if (!empty($photo)){
        switch ($photo['type']){
            case "image/jpeg":
            case "image/jpg":
            case "image/png":
                $info = pathinfo($photo['name']);
                $actualFile = '/panel/images/' . uniqid("", true).".". $info['extension'];
                move_uploaded_file($photo['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $actualFile);
                return $actualFile;
            default:
                return false;
        }
    }
}

if (isset($_SESSION['userid'])){
    $user = R::findOne('crm_users', 'id = ?', [$_SESSION['userid']]);

    if (!empty($user)){
        if ($user['divisions'] === "1"){
            
            $data = $_POST['pointer'];

            if (!is_array($data)){
                $data = json_decode($data, true);
            }
            
            $slider = R::findOne('site_sliders', 'id = ?', [$data['id']]);
            $sliderData = json_decode($slider['data'], true);
            switch ($data['type']){
                case "text":
                    $sliderData['slides'][$data['slide']][$data['prop']]['value'] = $_POST['data'];
                    break;
                case "link":
                    $sliderData['slides'][$data['slide']][$data['prop']]['value'] = $_POST['data']['value'];
                    $sliderData['slides'][$data['slide']][$data['prop']]['text'] = $_POST['data']['text'];
                    break;
                case "image":
                    if (!empty($_FILES['image'])){
                        $photo = CheckPhoto($_FILES['image']);
                        if ($photo){
                            $sliderData['slides'][$data['slide']][$data['prop']]['value'] = $photo;
                        }
                    }
                    
                    break;
            }
            
            $slider['data'] = json_encode($sliderData);

            R::store($slider);
            echo json_encode(array("status" => "ok"));
            
        }
    }
}
?>