<?php
include "";
require('../../asted/core/rb.php');
define('ASTEDRB', 'yes');
require('../../asted/core/config.php');
$sql_mail = "SELECT * FROM `crm_site` ";
$result_mail = mysqli_query($link, $sql_mail);
while ($tomail = mysqli_fetch_assoc($result_mail)) {
    $MainMail = "{$tomail['mailsite']}";
}
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!empty($data['почта'])) {
    $addReview = R::xdispense('crm_site_mailing');
    $addReview['title'] = $data['почта'];
    R::store($addReview);
}
