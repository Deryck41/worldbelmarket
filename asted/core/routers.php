<?php
include __dir__ . "/config.php";

use Core\Services\Router;

$sql_ServicesRouter = "SELECT * FROM `crm_routes`";
$result_ServicesRouter = mysqli_query($link, $sql_ServicesRouter);
while ($ServicesRouter = mysqli_fetch_assoc($result_ServicesRouter)) {
  $ServicesRouterid = "{$ServicesRouter['id']}";
  $ServicesRouteruri = "{$ServicesRouter['uri']}";
  $ServicesRouterdirection = "{$ServicesRouter['direction']}";
  $ServicesRouterpage_name = "{$ServicesRouter['page_name']}";
  Router::page($ServicesRouteruri, $ServicesRouterdirection, $ServicesRouterpage_name);
}
// Router::page('/modinstall/', 'asted.module', 'install');
// Router::page('/analytics/', 'asted.analytics', 'analytics');
// Router::page('/server/', 'asted.server', 'server');
// Router::page('/menu/', 'asted.amenu', 'menu');
// Router::page('/components/', 'asted.acom', 'components');
Router::enable();
