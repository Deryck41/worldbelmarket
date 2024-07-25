<?
header('Content-Type: application/json; charset=utf-8');
define('ASTEDRB', 'yes');
require '../../../asted/core/rb.php';
require '../../../asted/core/config.php';
$input = json_decode(file_get_contents('php://input'), true);

    if (is_array($input)) {
        foreach ($input as $data) {
            foreach ($data as $key => $value) {
                if (!empty($key)) {
                    $block = R::findOne('crm_site_block', 'block = ?', [$key]);
                    if ($block) {
                        $block->content = $value;
                        R::store($block);
                        echo json_encode(array('message' => "ASTED: Запись успешно сохранена.", 'status' => 'ok'));
                    } else {
                        echo json_encode(array('message' =>"ASTED: Запись с ключом $key не найдена.", 'status' => 'fail'));
                    }
                } else {
                    echo json_encode(array('message' => "ASTED: Ключ не может быть пустым.", 'status' => 'fail'));
                }
            }
        }
    } else {
        echo json_encode(array('message' => "ASTED: Входные данные не являются массивом.", 'status' => 'fail'));
    }
?>