<?php
error_reporting(E_ALL ^ E_NOTICE);  

require('asted/core/config.php');
define('ASTEDRB','yes');
$out = '<?xml version="1.0"?>';
$out .= '<rss version="2.0">';
$out .= '<channel>';
$out .= '<title>Asted - Новости в сфере IT</title>';
$out .= '<description>Новости IT, создание сайтов, калькуляторы, полезные инструменты</description>';
$out .= '<link>https://asted.by</link>';
 
$out .= '
<image>
  <url>https://asted.by/asted_themes/asted/img/asted.png</url>
  <title>Asted - Новости в сфере IT</title>
  <link>https://asted.by</link>
</image>';

 $sql_page = "SELECT * FROM `crm_site_pages` ";
        $result_page = mysqli_query($link, $sql_page);
        while ($pageen = mysqli_fetch_assoc($result_page)) {
                  $astedPurl = "{$pageen['pageurl']}";
$astedPdatepush = "{$pageen['datepush']}";
$astedPdateupdate = "{$pageen['dateupdate']}";

if($astedPdateupdate != null){
$datepages = date('Y-m-d', strtotime($astedPdateupdate)); 
}else{
    if($astedPdatepush != null){
        $datepages = date('Y-m-d', strtotime($astedPdatepush));
      }else{
        $datepages = date('Y-m-d');
      }
}
                  

        }

//Пример вызова меню
$sql_custportnnxx = "SELECT * FROM `crm_site_news` ";
$result_custportnnxx = mysqli_query($link, $sql_custportnnxx);
while ($tasknx = mysqli_fetch_assoc($result_custportnnxx)) {
  $astedMenuTitleID = "{$tasknx['id']}";
            $astedMenuTitleFirstnnxx = "{$tasknx['title']}";
          $astedMenuTitleFirstnIMAGES = "{$tasknx['images']}";
          $astedMenuURLnnxx = "{$tasknx['pageurl']}";
$astedMenuDatePush = "{$tasknx['datepush']}";
$astedMenuDescrip = "{$tasknx['descriptions']}";
$astedMenuDateUpdate = "{$tasknx['dateupdate']}";
$astedMenuForSection = "{$tasknx['forsection']}";

if($astedMenuDateUpdate != null){
$datepagesx  = date('Y-m-d', strtotime($astedMenuDateUpdate));
}else{
    if($astedMenuDatePush != null){
        $datepagesx = date('Y-m-d', strtotime($astedMenuDatePush));
      }else{
        $datepagesx = date('Y-m-d');
      }
}


if($astedMenuForSection == "5"){
  $out .= '
  <item>
    <title>' . $astedMenuTitleFirstnnxx  . '</title>
    <link>https://asted.by/news/' . $astedMenuURLnnxx . '/</link>
    <description><![CDATA[' . $astedMenuDescrip . ']]></description>
    <category>IT</category>
    <guid>' . $astedMenuTitleID . '</guid>
    <pubDate>' . $datepagesx . '</pubDate>
  </item>';
}

}
$out .= '</channel>';
$out .= '</rss>';
header('Content-Type: text/xml; charset=utf-8');
echo $out;
exit();
?>