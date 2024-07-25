<?php
$DR = $_SERVER['DOCUMENT_ROOT'];
$config = $DR . "/core/config.php";
include $config;
include $DR . "/core/query.php";
$finance_fond = 0.1;//фонд
$max_finance_fond = 0.25;//максимальный фонд
$finance_dept = 0.1;//долг
$finance_rent=0.15;//аренда
$finance_lead;//ставка лида
$finance_middle;//ставка мидла
$finance_junior;//ставка джуна
$finance_manager;//ставка менеджера
$finance_founders = 0.05;//учридители
$finance_economic_costs = 0.1;//хозрасходы
$finance_developer ;//разрабочик по умолчанию
if (!empty($_POST["score"])) {
    $Score =  str_replace(",",".",$_POST["score"]);
    $Developer = $_POST["developer"];
    $Data = $_POST["data"];
    if($Developer == 3 && $_POST["event"]=="site") {
        $result = [];
        $finance_fond = 0.16;
        $finance_lead = 0.3;
        $finance_manager = 0.14;
        $finance_fond = $finance_fond * $Score;
        $finance_dept = $finance_dept * $Score;
        $finance_developer = $finance_lead * $Score;
        $finance_rent = $finance_rent * $Score;
        $finance_manager = $finance_manager * $Score;
        $finance_founders = $finance_founders * $Score;
        $finance_economic_costs = $finance_economic_costs * $Score;
    }
    if($Developer == 2 && $_POST["event"]=="site") {
        $result = [];
        $finance_fond = 0.25;
        $finance_middle = 0.2;
        $finance_manager = 0.14;
        $finance_fond = $finance_fond * $Score;
        $finance_dept = $finance_dept * $Score + 0.05;
        $finance_developer = $finance_middle * $Score;
        $finance_rent = $finance_rent * $Score;
        $finance_manager = $finance_manager * $Score;
        $finance_founders = $finance_founders * $Score + 0.05;
        $finance_economic_costs = $finance_economic_costs * $Score;
    }
    if($Developer == 1 && $_POST["event"]=="site") {
        $result = [];
        $finance_fond = 0.25;
        $finance_junior = 0.14;
        $finance_manager = 0.14;
        $finance_fond = $finance_fond * $Score;
        $finance_dept = 0.135 * $Score;
        $finance_developer = $finance_junior * $Score;
        $finance_rent = $finance_rent * $Score;
        $finance_manager = $finance_manager * $Score;
        $finance_founders = 0.085 * $Score;
        $finance_economic_costs = $finance_economic_costs * $Score;
    }
    if($_POST["event"]=="service"){
        $result = [];
        $finance_fond = 0.6;
        $finance_fond = $finance_fond * $Score;
        $finance_dept = $finance_dept * $Score;
        $finance_rent = $finance_rent * $Score;
        $finance_economic_costs = $finance_economic_costs * $Score;
        $finance_founders = $finance_founders * $Score;
    }

        $result = '<tr class="lead_table">
                                    <th scope="row">Поступление</th>
                                    <td name="lead_data">
                                        '.$Score.'
                                    </td>
                                </tr>
                            <tr class="lead_table">
                                <th scope="row">Дата совершения</th>
                                <td name="lead_data">
                                  '.$Data.'
                                </td>
                            </tr>
                                <tr class="lead_table">
                                    <th scope="row">Фонд зп</th>
                                    <td name="lead_data">
                                        '.$finance_fond.'
                                    </td>
                                </tr>
                                <tr class="lead_table">
                                    <th scope="row">Долг</th>
                                    <td name="lead_data">
                                      '.$finance_dept.'
                                    </td>
                                </tr>
                                <tr class="lead_table">
                                    <th scope="row">Аренда</th>
                                    <td name="lead_data">
                                       '.$finance_rent.'
                                    </td>
                                </tr> '.($finance_developer ? '  
                                 <tr class="lead_table">
                                    <th scope="row">Программист</th>
                                    <td name="lead_data">
                                      '.$finance_developer.'
                                    </td>
                                </tr>' : '').'                     
                                '.($finance_manager ? '
                                 <tr class="lead_table">
                                    <th scope="row">Менеджер</th>
                                    <td name="lead_data">
                                   '.$finance_manager.'
                                    </td>
                                </tr>' : '').'
                                <tr class="lead_table">
                                    <th scope="row">Учридители</th>
                                    <td name="lead_data">
                                    '.$finance_founders.'
                                    </td>
                                </tr>
                                <tr class="lead_table">
                                    <th scope="row">Хозтовары</th>
                                    <td name="lead_data">
                                       '.$finance_economic_costs.'
                                    </td>
                                </tr>';

        echo json_encode($result, JSON_FORCE_OBJECT);

}


?>
