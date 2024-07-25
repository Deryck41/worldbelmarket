<?php

namespace Core\Services;

	class Router{

		public static $list = [];

		public static function page($uri, $direction, $page_name)
		{
			self::$list[] = [
 				"uri" => $uri,
 				"direction" => $direction,
 				"page" => $page_name,
			];
		}

		public static function enable(){
			//print_r(self::$list);
			$query = $_GET['route'];
			//echo $query;
			foreach (self::$list as $route) {
							if($route["uri"] === '/'.$query.'/'){
								require_once "components/".$route['direction']."/".$route['page'].".php";

				}
			}
		}
	}