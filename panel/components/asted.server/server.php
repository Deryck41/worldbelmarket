<? include "templates/header.php";?>
 <div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$lang['server_information']?></h1>
            </div>
		  
		    <div class="card">
    <div class="card-header">
        <?=$lang['server_information']?>
    </div>
    <div class="card-body collapse show">
<?php
$phpVersion = phpversion();
echo "<strong> Версия PHP на сервере:</strong> " . $phpVersion . "<br>"; 
echo ('<strong>'.$lang['allocated_RAM_for_the_Web']. '</strong>' . ini_get("memory_limit") . "<br>");
echo '<strong>Максимальный размер загрузки файла / Post size</strong>: '.ini_get('post_max_size').'</span> <a title="Если значение 0 значит ограничений нет."><span style="font-size:10px; color: #FF0000;">(*)</span></a><br>';
echo ('<strong>'.$lang['maximum_script_execution_time'].'</strong> '.ini_get('max_execution_time').'</span> <a title="Рекомендуем минимум 50М."><span style="font-size:10px; color: #FF0000;">(*)</span></a><br>');
echo '<strong>Register globals:</strong> '.(ini_get('register_globals') ? $lang['on'] : $lang['off']).'</span><br>';
echo '<strong>Безопасный режим / Safe mode:</strong> '.(ini_get('safe_mode') ? $lang['on'] : $lang['off']).'</span> <br>';
echo '<strong>Магические переменые / Magic quotes gpc:</strong> '.(ini_get('magic_quotes_gpc') ? $lang['on'] : $lang['off']).'</span>';
echo '<br><strong>Буферизация вывода / Output buffering:</strong> '.(ini_get('Output_buffering') ? $lang['on'] : $lang['off']).'</span>' ;
        echo '<br>' . $lang['time_on_the_server'] ;
        echo date("H:i:s") . '<br>';
        $data = shell_exec('uptime');
        $uptime = explode(' up ', $data);
        $uptime = explode(',', $uptime[1]);
        $uptime = $uptime[0] . ', ' . $uptime[1];
		if($data != null){
        echo $lang['server_running_time']; echo $uptime; echo '<br>';
		}
        echo $lang['additional_information']; echo php_uname()."<br>";
        //hdd created
        function ZahlenFormatieren($Wert) {
            if ($Wert > 1099511627776) {
                $Wert = number_format ( $Wert / 1099511627776, 2, ".", "," ) . " TB";
            } elseif ($Wert > 1073741824) {
                $Wert = number_format ( $Wert / 1073741824, 2, ".", "," ) . " GB";
            } elseif ($Wert > 1048576) {
                $Wert = number_format ( $Wert / 1048576, 2, ".", "," ) . " MB";
            } elseif ($Wert > 1024) {
                $Wert = number_format ( $Wert / 1024, 2, ".", "," ) . " kB";
            } else {
                $Wert = number_format ( $Wert, 2, ".", "," ) . " Bytes";
            }

            return $Wert;
        }
        $frei = disk_free_space ( "./" );
        $insgesamt = disk_total_space ( "./" );
        $belegt = $insgesamt - $frei;
        $prozent_belegt = 100 * $belegt / $insgesamt;
        //hdd end
        echo '<hr><strong>'. $lang['HDD_data'] .'</strong><br>';
        echo '<strong>'. $lang['used'] .  '</strong> '; echo ZahlenFormatieren ( $belegt ). '<br>';
        echo '<strong>'. $lang['freely'] .  '</strong> '; echo ZahlenFormatieren ( $frei ). '<br>';
        echo '<strong>'. $lang['disk'] .  '</strong> '; echo ZahlenFormatieren ( $insgesamt ). '<br>';
?>
    </div>
    </div>  
		  </div>
 <? include "templates/footer.php"; ?>