<?
session_name('terrancrm');
session_set_cookie_params(2 * 7 * 24 * 60 * 60);
session_start();

include $_SERVER['DOCUMENT_ROOT'] ."/asted/core/core.php";

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
            $data = json_decode($_POST['data'], true);

            foreach ($data['slides'] as $key => $slide) {
                foreach ($slide as $propName => $prop){
                    if ($prop['type'] === "image"){
                        $photo = CheckPhoto($_FILES[$prop['value']]);

                        if ($photo){
                            $data['slides'][$key][$propName]['value'] = $photo;
                        }
                    }
                }
            }
            $newSlider = R::xdispense('site_sliders');
            $newSlider['name'] = $_POST['name'];
            $newSlider['data'] = json_encode($data);
            R::store($newSlider);
            echo json_encode(array("status" => "ok"));
        }
    }
}


?>