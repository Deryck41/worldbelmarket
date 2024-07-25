<?$TerranPrefix = "crm_";
					$nameDB = 'worldbel_site';//Asted DB: название базы sql
					$userDB = 'worldbel_asted';//Asted DB: логин sql
					$passwordDB = '8q6C:PV$hfib\'pD';//Asted DB: пароль sql
					if(defined('ASTEDRB')){
						R::setup( 'mysql:host=localhost;dbname='.$nameDB.'', $userDB, $passwordDB );
						R::ext('xdispense', function ($type, $prefix = '') {
							return R::getRedBean()->dispense($prefix . $type);
						});
					}
					$astedADM = 'panel'; 
					$link = mysqli_connect ('localhost',  $userDB, $passwordDB, $nameDB) or die("TERRAN DEBUGER Error: " . mysqli_error($link));
					$link -> set_charset("utf8");
					?>