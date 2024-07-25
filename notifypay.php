<?


define('ASTEDRB', 'yes');

require($_SERVER['DOCUMENT_ROOT'] . '/asted_core/Services/Libs.php');
Libs::lib('redbeanphp', 'rb');

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include $_SERVER['DOCUMENT_ROOT'] . "/asted/core/config.php";

$ip = "empty";

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}


$log = R::xdispense('log');

$log['time'] = date("h:i:sa");
$log['log'] = json_encode($_GET). " POST: ". json_encode($_POST) . " Request: " . json_encode($_REQUEST). " Pintput: " . json_encode(file_get_contents("php://input"));
$log['ip'] = $ip;
R::store($log);

?>