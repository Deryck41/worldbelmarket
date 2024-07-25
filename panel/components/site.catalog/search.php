<?
include '../../core/rb.php';
define('ASTEDRB', 'yes');
include '../../core/config.php';
if (!empty($_POST['input_value'])) {
    $search = $_POST['input_value'];
    $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    $search = trim($search);
    $result = R::getAll("SELECT * FROM `crm_site_catalog` WHERE `title` LIKE :search ORDER BY `title` LIMIT 50", [':search' => "%$search%"]);
    $productBlock = '';
    if ($result) {
        foreach ($result as $row) {
            if (!empty($row['hit'])) {
                $hit = " <div>Выгодное предложение</div>";
            } else {
                $hit = "";
            }
            if (!empty($row['sklad'])) {
                $sklad = " <div>На складе</div>";
            } else {
                $sklad = "";
            }
            $productBlock .= '<div class="personal_divisions-body">
            <div class="row">
                <div class="col-1 bg-gray-100" style="position: relative;padding-bottom: 8.5%;">
                    <img src="' . $row["images"] . '" style="position: absolute;width: 100%;height: 100%;top: 0;left: 0;object-fit: contain;">
                </div>
        
                <div class="col-10">
                    <div class="content d-flex justify-content-between align-items-center">
                        <div class="p-3">
                            #' . $row["id"] . '- ' . $row["title"] . '
                            <br>Ключевые слова: ' . $row["keywords"] . '
                            <br>Дискрипшен: ' . $row["descriptions"] . '
                        </div>
                        <div class="marker">
                            ' . $hit . $sklad . '
                        </div>
                    </div>
        
                </div>
                <div class="col-1">
                    <div class="personal_divisions-icon">
                        <i class="fas fa-fw fa-trash trashclick" onclick="Delete(' . $row["id"] . ',"catalog")" value="' . $row["id"] . '" style="float: right;"></i> <a href="/panel/catalog-edit/' . $row["id"] . '/"><i class="fas fa-fw fa-edit" data-toggle="modal" data-target="#myModalka' . $row["id"] . '" style="float: right;"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <hr>';
        }
    }
    $data['resultsSearch'] = $productBlock;
}
header('Content-Type: application/json');
echo json_encode($data);
