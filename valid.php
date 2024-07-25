<?

function validate($type, $value, $isRequired){
    $result = false;
    if (!$isRequired && empty($value) && $value !== "0"){
        return true;
    }
    
    switch ($type){
        case "email":
            
            $result = filter_var($value, FILTER_VALIDATE_EMAIL) && mb_strlen($value) <= 30 ? true : false;
            break;
        case "password":
            $result = mb_strlen($value) >= 8 && mb_strlen($value) <= 30 ? true : false;
            break;
        case "name":
            $result = preg_match('/[ .:!\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value) || mb_strlen($value) > 30 || mb_strlen($value) < 1 ? false : true;
            break;
        case "phone":
            $result = preg_match('/^\\+?[1-9][0-9]{7,14}$/', $value) ? true : false;
            break;
        case "company":
            $result = preg_match('/[.:!\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value) || mb_strlen($value) > 30 || mb_strlen($value) < 1 ? false : true;
            break;
        case "product-name":
            $result = preg_match('/[\/\\\\\^?<>\¬-]/', $value) || mb_strlen($value) > 30 || mb_strlen($value) < 1 ? false : true;
            break;
        case "price":
            $result = preg_match('/^(?!0+(?:\.0+)?$)\d+(\.\d{1,2})?$/', $value) ? true : false;
            break;
        case "product-description":
            $result = preg_match('/^.{3,5000}$/', $value) ? true : false;
            break;
        default:
            $result = true;
    }
    return $result;
}
?>