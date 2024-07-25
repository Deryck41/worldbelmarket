<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<link href="install.css?v=2" rel="stylesheet">

<head>
</head>
<div class="logo">ASTED CWS</div>
<header>
    <div class="progress">
        <div class="statusbar statusprogressbar" style="width: 50%;"></div>
        <p class="progress-title">
            Третий шаг, установка
            <br>3 / 6
        </p>
    </div>
</header>
<article>
    <div style="padding-left: 4px;">
        <?php
        include '../core/rb.php';
        include '../core/config.php';
      
        function createTable($link, $tableName, $sql) {
            if ($link->query($sql) === TRUE) {
                echo "Таблица: " . $tableName . " создана <br>";
            } else {
                echo "Error creating table: " . $link->error;
            }
        }


//-----1- crm_chat_group_messages
 $sql = "CREATE TABLE crm_chat_group_messages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `chatgroup` varchar(255) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `message` mediumtext,
  `datemsr` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_chat_group_messages", $sql);

//-----1.1- crm_routes
$sql = "CREATE TABLE crm_routes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `uri` varchar(255) DEFAULT NULL,
  `direction` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_routes", $sql);

//-----2- crm_commenttask
$sql = "CREATE TABLE crm_commenttask (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `who` int(11) NOT NULL,
  `totask` int(11) NOT NULL,
  `comment` mediumtext COLLATE utf8mb4_unicode_ci,
  `data` date DEFAULT NULL
)";

createTable($link, "crm_commenttask", $sql);

//-----2.1- crm_currency
$sql = "CREATE TABLE crm_currency (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `currency` varchar(255) NOT NULL,
  `currencycode` varchar(255) NOT NULL,
  `currencyprice` varchar(255) NOT NULL,
  `currencydefault` varchar(255) NOT NULL
)";

createTable($link, "crm_currency", $sql);

//-----3- crm_config
 $sql = "CREATE TABLE crm_configproject (
  `showuser` varchar(255) NOT NULL,
  `showwiki` varchar(255) NOT NULL
)";

createTable($link, "crm_configproject", $sql); 

 //-----3.1- crm_config

  $sql = "CREATE TABLE crm_config (
  `adminemail` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `usrcanlang` varchar(255) NOT NULL,
  `construct` varchar(255) NOT NULL,
  `constpalitretheme` varchar(255) NOT NULL,
  `preloader` varchar(255) NOT NULL,
  `jobtime` varchar(255) NOT NULL,
  `grouptitletotask` varchar(255) NOT NULL,
  `mainpage` varchar(255) NOT NULL,
  `avauploadsiza` varchar(255) NOT NULL,
  `error` varchar(255) NOT NULL,
  `installnow` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `typesystem` varchar(255) NOT NULL,
  `module_multisite` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `lickey` varchar(255) NOT NULL,
  `userreg` varchar(255) NOT NULL

)";

createTable($link, "crm_config", $sql); 

 //-----4- crm_divisions

 $sql = "CREATE TABLE crm_divisions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`title` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_divisions", $sql); 

//-----5- crm_finanse

 $sql = "CREATE TABLE crm_finanse (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
 `data` text COLLATE utf8mb4_unicode_ci
)";

createTable($link, "crm_finanse", $sql); 
//-----55- crm_lido

 $sql = "CREATE TABLE crm_lido (

  `id` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NULL,
  `site` varchar(255) DEFAULT NULL,
  `columntable` varchar(255) DEFAULT NULL,
  `userid` INT(11) DEFAULT NULL,
  `dateupdate` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_lido", $sql); 
 //-----555- crm_lido_message

 $sql = "CREATE TABLE crm_lido_message (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `forobject` varchar(255) NOT NULL,
  `datepush` varchar(255) NOT NULL,
  `content` longtext,
  `user`  varchar(255) DEFAULT NULL,
  `file` varchar(255),
  `datetask` varchar(255),
  `type` varchar(255)
)";

createTable($link, "crm_lido_message", $sql); 

 //-----6- crm_group

 $sql = "CREATE TABLE crm_components (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `uri` varchar(255) DEFAULT NULL,
  `direction`  varchar(255) DEFAULT NULL,
  `page_name`  varchar(255) DEFAULT NULL
)";

createTable($link, "crm_components", $sql); 

//-----6- crm_group

$sql = "CREATE TABLE crm_group (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `group_title` varchar(255) DEFAULT NULL,
  `group_description` tinytext,
  `group_users` int(11) DEFAULT NULL,
  `group_views` int(255) DEFAULT NULL,
  `group_wiki` mediumtext,
  `group_subuser` varchar(255) DEFAULT NULL,
  `group_public` int(11) DEFAULT NULL,
  `group_datecreat` varchar(255) DEFAULT NULL,
  `group_datefinal` varchar(255) DEFAULT NULL,
  `group_galery` longtext DEFAULT NULL,
  `group_price` varchar(255) DEFAULT NULL,
  `group_stage` varchar(255) DEFAULT NULL,
  `group_inform` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_group", $sql); 


 //-----7- crm_menu

$sql = "CREATE TABLE crm_menu (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `position` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_menu", $sql); 

//-----7- crm_menu_category

$sql = "CREATE TABLE crm_menu_category (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `catname` varchar(255) DEFAULT NULL,
  `catposition` varchar(255) DEFAULT NULL,
  `catactive` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_menu_category", $sql); 

//-----7- crm_lead

$sql = "CREATE TABLE crm_lead (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `date` text NOT NULL,
  `name` text NOT NULL,
  `email` text,
  `project` text NOT NULL,
  `tel` text NOT NULL,
  `comment` mediumtext,
  `dateCall` text,
  `leadstatus` text NOT NULL,
  `status` text NOT NULL,
  `manager` text NOT NULL,
  `project_name` text
)";

createTable($link, "crm_lead", $sql); 

//-----8- crm_leads

$sql = "CREATE TABLE crm_leads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nameproject` varchar(255) DEFAULT NULL,
  `descriptionproject` varchar(255) DEFAULT NULL,
  `whoselead` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `paidout` varchar(255) DEFAULT NULL,
  `paidoutinfo` varchar(255) DEFAULT NULL,
  `leadlink` varchar(255) DEFAULT NULL,
  `leadname` varchar(255) DEFAULT NULL,
  `leadstatproject` varchar(255) DEFAULT NULL,
  `leadendproject` varchar(255) DEFAULT NULL,
  `leadtel` varchar(255) DEFAULT NULL,
  `leadmail` varchar(255) DEFAULT NULL,
  `projecttype` varchar(255) DEFAULT NULL,
  `whodoing` varchar(255) DEFAULT NULL,
  `projectstage` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_leads", $sql); 

//-----9- crm_logs

$sql = "CREATE TABLE crm_logs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `eventnames` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datestimes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)";

createTable($link, "crm_logs", $sql); 

//-----10- crm_news

$sql = "CREATE TABLE crm_news (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `author` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_news", $sql); 

//-----1.1- crm_notice

$sql = "CREATE TABLE crm_notice (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `whoid` varchar(255) DEFAULT NULL,
    `userid` varchar(255) DEFAULT NULL,
    `title` varchar(255) DEFAULT NULL,
    `status` varchar(255) DEFAULT NULL,
    `data` varchar(255) DEFAULT NULL,
    `uri` varchar(255) DEFAULT NULL,
  )";
  
  createTable($link, "crm_news", $sql); 

//-----11- crm_newscomment

$sql = "CREATE TABLE crm_newscomment (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `fornews` int(11) DEFAULT NULL,
  `whocomment` int(11) DEFAULT NULL,
  `commentcontent` tinytext COLLATE utf8mb4_unicode_ci,
  `datacomment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)";

createTable($link, "crm_newscomment", $sql); 

//-----12- crm_notes

$sql = "CREATE TABLE crm_notes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `whocreate` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` mediumtext
)";

createTable($link, "crm_notes", $sql); 

//-----13- crm_paylist

$sql = "CREATE TABLE crm_paylist (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `whopay` varchar(255) DEFAULT NULL,
  `paydiscription` varchar(255) DEFAULT NULL,
  `typepay` varchar(255) DEFAULT NULL,
  `sumpay` varchar(255) DEFAULT NULL,
  `currency` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_paylist", $sql); 

//-----14- crm_salaries

$sql = "CREATE TABLE crm_salaries (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `data` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `worker` int(255) NOT NULL,
  `summ` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
)";

createTable($link, "crm_salaries", $sql); 

//-----15- crm_seobacklink

$sql = "CREATE TABLE crm_seobacklink (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forproject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
)";

createTable($link, "crm_seobacklink", $sql); 

//-----16- crm_seolink

$sql = "CREATE TABLE crm_seolink (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whodoit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
)";

createTable($link, "crm_seolink", $sql); 

//-----23- crm_task

$sql = "CREATE TABLE crm_task (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `task_name` varchar(255) DEFAULT '',
  `task_text` mediumtext,
  `task_togroup` int(11) NOT NULL,
  `task_autor` varchar(255) DEFAULT '',
  `task_executor` varchar(255) DEFAULT '',
  `task_datacreat` varchar(255) DEFAULT '',
  `task_datacompletion` varchar(255) DEFAULT '',
  `task_status` int(11) NOT NULL,
  `task_tegs` varchar(255) DEFAULT '',
  `task_warning` varchar(255) DEFAULT ''
)";

createTable($link, "crm_task", $sql); 


//-----23.5- crm_task_timer

$sql = "CREATE TABLE crm_task_timer (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `userid` varchar(255) DEFAULT '',
    `taskid` varchar(255) DEFAULT '',
    `startdate` varchar(255) DEFAULT '',
    `enddate` varchar(255) DEFAULT '',
    `timer` varchar(255) DEFAULT ''
  )";
  
  createTable($link, "crm_task_timer", $sql); 

  //-----23.6- crm_task_files

$sql = "CREATE TABLE crm_task_files (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `task` varchar(255) DEFAULT '',
    `file` varchar(255) DEFAULT '',
    `whoadd` varchar(255) DEFAULT '',
    `date` varchar(255) DEFAULT '',
    `filesize` varchar(255) DEFAULT ''
  )";
  
  createTable($link, "crm_task_files", $sql); 

//-----24- crm_timeuser

$sql = "CREATE TABLE crm_timeuser (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `id_user` int(11) DEFAULT NULL,
  `time_now` varchar(255) DEFAULT NULL,
  `time_nowdinner` varchar(255) DEFAULT NULL,
  `time_exitdinner` varchar(255) DEFAULT NULL,
  `time_exit` varchar(255) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_timeuser", $sql); 

//-----25- crm_usergroup

$sql = "CREATE TABLE crm_usergroup (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `usergroup` varchar(255) DEFAULT NULL,
  `superadmin` varchar(255) DEFAULT NULL,
  `userwoked` varchar(255) DEFAULT NULL,
  `canforusrauth` varchar(255) DEFAULT NULL,
  `caneditusr` varchar(255) DEFAULT NULL,
  `canviewprelead` varchar(255) DEFAULT NULL,
  `candeletoldlead` varchar(255) DEFAULT NULL,
  `canviewlead` varchar(255) DEFAULT NULL,
  `canviewconfig` varchar(255) DEFAULT NULL,
  `canviewsalaries` varchar(255) DEFAULT NULL,
  `canviewsallgroup` varchar(255) DEFAULT NULL,
  `cancontrolwebsite` varchar(255) DEFAULT NULL,
  `personalgroup` varchar(255) DEFAULT NULL,
  `canadduser` varchar(255) DEFAULT NULL,
  `projectpdoc` varchar(255) DEFAULT NULL,
  `projectprice` varchar(255) DEFAULT NULL,
  `projectedit` varchar(255) DEFAULT NULL,
  `projectdopinfo` varchar(255) DEFAULT NULL,
  `devdoc` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_usergroup", $sql);

//-----26- crm_users

$sql = "CREATE TABLE crm_users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birtday` varchar(255) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `phone_number` varchar(18) DEFAULT NULL,
  `addres_skype` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `employee` varchar(255) DEFAULT NULL,
  `online` varchar(255) DEFAULT NULL,
  `usercreat` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `regdate` varchar(255) DEFAULT NULL,
  `task_type` varchar(255) DEFAULT NULL,
  `divisions` varchar(255) DEFAULT NULL,
  `prelead_type` varchar(255) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `mylang` varchar(255) DEFAULT NULL,
  `themes` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_users", $sql);

//-------------------------------------------//
//===============ASTED_CLOUD==================
 //===========WEB CONTROL INSTALL==============
 //=============Made in Belarus================
 //==============WWW.ASTED.BY=====-============
//-------------------------------------------//

//-----WEB table №1- crm_site

$sql = "CREATE TABLE crm_site (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `namesite` varchar(255) DEFAULT NULL,
  `siteurl` varchar(255) DEFAULT NULL,
  `websitessl` varchar(11) DEFAULT NULL,
  `webtemplate` varchar(11) DEFAULT NULL,
  `crmfuncional` varchar(255) DEFAULT NULL,
  `modulemenu` varchar(255) DEFAULT NULL,
  `modulepages` varchar(255) DEFAULT NULL,
  `modulenews` varchar(255) DEFAULT NULL,
  `modulecatalog` varchar(255) DEFAULT NULL,
  `modulecustom` varchar(255) DEFAULT NULL,
  `sitestatus` varchar(255) DEFAULT NULL,
  `mailsite` varchar(255) DEFAULT NULL,
  `phperrorsite` varchar(255) DEFAULT NULL,
  `showadminsite` varchar(255) DEFAULT NULL,
  `telegramtoken` varchar(255) DEFAULT NULL,
  `telegramchatid` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site", $sql);

//-----WEB table №2-crm_site_block

$sql = "CREATE TABLE crm_site_block (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
`forpage` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `block` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `galery` varchar(255) DEFAULT NULL,
  `content` longtext
)";

createTable($link, "crm_site_block", $sql);

//-----WEB table №3-crm_site_custom

$sql = "CREATE TABLE crm_site_custom (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `forsection` varchar(255) DEFAULT NULL,
    `title` varchar(255) DEFAULT NULL,
    `pageurl` varchar(255) DEFAULT NULL,
    `content` longtext,
    `images` longtext,
    `galery` longtext,
    `document` longtext,
    `keywords` varchar(255) DEFAULT NULL,
    `description` varchar(255) DEFAULT NULL,
    `main` varchar(255) DEFAULT NULL,
    `contentmain` longtext
)";

createTable($link, "crm_site_custom", $sql);

//-----WEB table №3- crm_site_custom_portfolio

$sql = "CREATE TABLE crm_site_custom_portfolio (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nameproject` varchar(255) DEFAULT NULL,
  `urlproject` varchar(255) DEFAULT NULL,
  `images` mediumtext,
  `cms` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `jobs` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_custom_portfolio", $sql);

//-----WEB table №4- crm_site_menu

$sql = "CREATE TABLE crm_site_menu (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `forsection` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `forsite` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_menu", $sql);

//-----WEB table №5- crm_site_news

$sql = "CREATE TABLE crm_site_news (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) DEFAULT NULL,
  `pageurl` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `forsection` varchar(255) DEFAULT NULL,
  `forwebsite` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `contentPreview` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `images` longtext DEFAULT NULL,
  `galery` longtext DEFAULT NULL,
  `datepush` varchar(255) DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL,
  `dateupdate` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_news", $sql);

//-----WEB table №6- crm_site_catalog

$sql = "CREATE TABLE crm_site_catalog (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) DEFAULT NULL,
  `pageurl` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `forsection` varchar(255) DEFAULT NULL,
  `forwebsite` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `images` longtext DEFAULT NULL,
  `galery` longtext DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `filter` longtext DEFAULT NULL,
  `active` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_catalog", $sql);

//-----WEB table №7- crm_site_catalog_category

$sql = "CREATE TABLE crm_site_catalog_category (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `forcatalog` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `main` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `pageurl` varchar(255) DEFAULT NULL,
  `galery` longtext DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_catalog_category", $sql);

//-----WEB table №7.5- crm_site_catalog_category

$sql = "CREATE TABLE crm_site_catalog_config (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `forsection` varchar(255) DEFAULT NULL,
    `category` varchar(255) DEFAULT NULL
  )";
  
  createTable($link, "crm_site_catalog_category", $sql);

  //-----WEB table №7.5- crm_site_catalog_category

$sql = "CREATE TABLE crm_site_catalog_field (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `forsection` varchar(255) DEFAULT NULL,
    `name` varchar(255) DEFAULT NULL,
    `type` varchar(255) DEFAULT NULL,
    `code` varchar(255) DEFAULT NULL,
    `active` varchar(255) DEFAULT NULL
  )";
  
  createTable($link, "crm_site_catalog_field", $sql);

    //-----WEB table №7.5- crm_site_catalog_category

$sql = "CREATE TABLE crm_site_news_field (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `forsection` varchar(255) DEFAULT NULL,
    `name` varchar(255) DEFAULT NULL,
    `type` varchar(255) DEFAULT NULL,
    `code` varchar(255) DEFAULT NULL,
    `active` varchar(255) DEFAULT NULL
  )";
  
  createTable($link, "crm_site_news_field", $sql);

//-----WEB table №8- crm_site_news_category

    $sql = "CREATE TABLE crm_site_news_category (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      `name` varchar(255) DEFAULT NULL,
      `link` varchar(255) DEFAULT NULL,
      `fornews` varchar(255) DEFAULT NULL
    )";

createTable($link, "crm_site_news_category", $sql);

//-----WEB table №11- crm_site_pages

$sql = "CREATE TABLE crm_site_pages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) DEFAULT NULL,
  `pageurl` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `descriptions` varchar(255) DEFAULT NULL,
  `forsection` varchar(255) DEFAULT NULL,
  `forwebsite` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `datepush` varchar(255) DEFAULT NULL,
  `dateupdate` varchar(255) DEFAULT NULL,
  `parent` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_pages", $sql);


//-----WEB table №12- crm_site_section

$sql = "CREATE TABLE crm_site_section (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `forwebsite` varchar(255) DEFAULT NULL,
  `namesection` varchar(255) DEFAULT NULL,
  `websitemodule` varchar(255) DEFAULT NULL
)";

createTable($link, "crm_site_section", $sql);

        //-----WEB table №13- crm_kp

    $sql = "CREATE TABLE crm_kp (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      `author` varchar(255) DEFAULT NULL,
      `title` varchar(255) DEFAULT NULL,
      `price` varchar(255) DEFAULT NULL,
      `download` varchar(255) DEFAULT NULL
    )";

createTable($link, "crm_kp", $sql);
        //-----WEB table №14- crm_site_section

    $sql = "CREATE TABLE crm_site_galery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255) DEFAULT NULL,
    `shortcode` longtext DEFAULT NULL,
      `galery` longtext DEFAULT NULL
    )";

createTable($link, "crm_site_galery", $sql);
        ?>
        <form action="admin.php">
            <button type="submit">Продолжить</button>
        </form>
    </div>
</article>
<footer><?= date("Y") ?> <a href="https://asted.by/">Asted.by</a> <span style="font-size: 12px">© ООО "АСТЕДБЕЛ" </span></footer>
</body>

</html>