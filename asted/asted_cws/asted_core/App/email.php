<?php
//----Asted Mail----//
//Получаем стандартную почту куда слать email
$sql_mail = "SELECT * FROM `crm_site` ";
$result_mail = mysqli_query($link, $sql_mail);
while ($mail = mysqli_fetch_assoc($result_mail)) {
    $MainMail = "{$mail['mailsite']}";
}
//----Asted Mail End----//