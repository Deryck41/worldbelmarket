<?php
//----Asted Site Admin----//
//Вызываем админ панель астед в шапке сайта
if($userGroupsCanviewWebsite['0'] == "true"){
    if (isset($_GET['exit'])) {
        $_SESSION = array();
        session_destroy();
        header('Location: /asted/');
    }
  if($site['0']['showadminsite'] == "1"){
      require('core/cws_admin.php');
  }}
//----Asted Site Admin END----//

