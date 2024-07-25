<?php
include "../../../asted/core/rb.php";
define('ASTEDRB', 'yes');
include "../../../asted/core/config.php";
if (isset($_POST['page']) && isset($_POST['name'])) {
    $page = $_POST['page'];
    $name = $_POST['name'];

    // Здесь подключите ваш код для работы с базой данных
    // Выполните запрос на получение следующей порции данных с учетом пагинации
    // Например:
    $limit = 20;
    $offset = ($page - 1) * $limit;

    $todosList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT ? OFFSET ?', [$name, $limit, $offset]);

    // Генерируем HTML для новых товаров
    $html = '';
    foreach ($todosList as $object) {
        $messageTask = R::findOne('crm_lido_message', 'forobject=? and type=?', [$object['id'], 'task']);
        $html .= '<li class="list-group-item" draggable="true" data-task="' . $messageTask['datetask'] . '" data-id="' . $object['id'] . '">
            <div class="list-group-item__heading">
                <div class="list-group-item__link">' . $object['name'] . '</div>
                <div class="list-group-item__date">' . $object['dateupdate'] . '</div>
            </div>
            <div class="list-group-item__content">' . $object['title'] . '</div>
            <div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
        </li>';
    }

    // Возвращаем сгенерированный HTML
    echo $html;
}
