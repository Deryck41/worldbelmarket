<?php
error_reporting(E_ALL ^ E_NOTICE);  

require('asted/core/config.php');
define('ASTEDRB','yes');
$out = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

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
                  
                  
  $out .= '
  <url>
    <loc>https://' . $_SERVER['SERVER_NAME'] . '/' . $astedPurl . '/</loc>
    <lastmod>' . $datepages . '</lastmod>
    <priority>0.9</priority>
  </url>';
     
        }
$out .= '</urlset>';
header('Content-Type: text/xml; charset=utf-8');
echo $out;
exit();
?>