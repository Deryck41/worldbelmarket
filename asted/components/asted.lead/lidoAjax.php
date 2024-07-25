<?
include "../../../asted/core/rb.php";
define('ASTEDRB', 'yes');
include "../../../asted/core/config.php";
if (isset($_POST["cardViewId"])) {
    $cardView = R::load('crm_lido', $_POST["cardViewId"]);
    $messages = R::find('crm_lido_message', 'forobject=?', [$_POST["cardViewId"]]);
    foreach ($messages as $message) {
        if (!empty($message['user'])) {
            $user = R::load('crm_users', $message['user']);
        } else {
            $user['name'] = "";
            $user['surname'] = "Anonymous";
        }
        if ($message['type'] == 'task') {
            $cardViewMessage .= '<div class="message-item message-item-task">
            <div class="message-item__date">' . $message['datepush'] . ' - <strong>' . $user['name'] . ' ' . $user['surname']
                . '</strong></div>
            <div class="message-item__text-wrapper" >
                  <div class="message-item__text task-item">' . $message['content'] . '</div>
                  <div class="task-check-wrapper" data-id="' . $message['id'] . '">
                  <svg class="task-check-click " xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                    <path
                      d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                  </svg>
                </div>
            </div>
      </div>';
        } else {
            $cardViewMessage .= '<div class="message-item">
              <div class="message-item__date">' . $message['datepush'] . ' - <strong>' . $user['name'] . ' ' . $user['surname'] . '</strong></div>
              <div class="message-item__text">' . $message['content'] . '</div>
        </div>';
        }
    }
    $data['cardView'] = $cardView;
    $data['cardViewMessage'] = $cardViewMessage;
}
if (isset($_POST["taskView"])) {
    $todos = '';
    $progress = '';
    $refuse = '';
    $completed = '';
    if (!empty($_POST["taskView"])) {
        $date = date("d.m.Y");
        $tasks = [];
        $alltasks = R::find('crm_lido_message', 'type=?', ["task"]);
        foreach ($alltasks as $value) {
            if (strtotime($value['datetask']) <= strtotime($date) && !empty($value['datetask'])) {
                $shouldAdd = true;
                foreach ($tasks as $task) {
                    if ($task['forobject'] === $value['forobject']) {
                        $shouldAdd = false;
                        break;
                    }
                }
                if ($shouldAdd) {
                    $tasks[] = $value;
                }
            }
        }
        foreach ($tasks as $task) {
            $lido = R::load('crm_lido', $task['forobject']);
            $card = '<li class="list-group-item" draggable="true" data-id="' . $lido['id'] . '">
            <div class="list-group-item__heading">
                <div class="list-group-item__link">' . $lido['name'] . '</div>
                <div class="list-group-item__date">' . $lido['dateupdate'] . '</div>
            </div>
            <div class="list-group-item__content">' . $lido['title'] . '</div>
            <div class="list-group-item__phone"><a href="tel:' . $lido['phone'] . '">' . $lido['phone'] . '</a></div>
        </li>';
            switch ($lido['columntable']) {
                case 'todos-list':
                    $todos .= $card;
                    break;
                case 'in-progress-list':
                    $progress .= $card;
                    break;
                case 'refuse-list':
                    $refuse .= $card;
                    break;
                case 'completed-list':
                    $completed .= $card;
                    break;
            }
        }
    } else {
        $todosList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['todos-list']);
        $count = R::find('crm_lido', 'columntable = ?', ['todos-list']);
        $amt = ceil(count($count) / 20);
        foreach ($todosList as $object) {
            $todos .= '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
        }
        $todos .= '<div class="showmore-triger" data-page="1" data-max="' . $amt . '">
        <img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
    </div>';
        $inProgressList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['in-progress-list']);
        $count = R::find('crm_lido', 'columntable = ?', ['in-progress-list']);
        $amt = ceil(count($count) / 20);
        foreach ($inProgressList as $object) {
            $progress .= '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
        }
        $progress .= '<div class="showmore-triger" data-page="1" data-max="' . $amt . '">
        <img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
    </div>';
        $refuseList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['refuse-list']);
        $count = R::find('crm_lido', 'columntable = ?', ['refuse-list']);
        $amt = ceil(count($count) / 20);
        foreach ($refuseList as $object) {
            $refuse .= '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
        }
        $refuse .= '<div class="showmore-triger" data-page="1" data-max="' . $amt . '">
        <img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
    </div>';
        $completedList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['completed-list']);
        $count = R::find('crm_lido', 'columntable = ?', ['completed-list']);
        $amt = ceil(count($count) / 20);
        foreach ($completedList as $object) {
            $completed .= '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
        }
        $completed .= '<div class="showmore-triger" data-page="1" data-max="' . $amt . '">
        <img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
    </div>';
    }
    $data['tasksTodos'] = $todos;
    $data['tasksProgress'] = $progress;
    $data['tasksRefuse'] = $refuse;
    $data['tasksCompleted'] = $completed;
}
if (isset($_POST['searchValue'])) {

    $search = $_POST['searchValue'];
    // $search = mb_eregi_replace("[^a-zа-яё0-9 ]", '', $search);
    // $search = trim($search);
    if (!empty($search)) {
        $result = R::getAll("SELECT * FROM `crm_lido` WHERE `title` LIKE :search OR `phone` LIKE :phoneSearch ORDER BY `title` LIMIT 50", [':search' => "%$search%", ':phoneSearch' => "%$search%"]);
        $searchCards = '';
        if ($result) {
            foreach ($result as $row) {
                $searchCards .= '<div class="search-list-item" data-id="' . $row['id'] . '">' . $row['title'] . '</div>';
            }
        }
        $data['searchCards'] = $searchCards;
    }
}
if (isset($_POST['countView'])) {
    $todosList = R::find('crm_lido', 'columntable = ?', ['todos-list']);
    $todosListPrice = R::getCell('SELECT SUM(price) FROM crm_lido WHERE columntable = "todos-list"');
    $inProgressList = R::find('crm_lido', 'columntable = ?', ['in-progress-list']);
    $inProgressListPrice = R::getCell('SELECT SUM(price) FROM crm_lido WHERE columntable = "in-progress-list"');
    $refuseList = R::find('crm_lido', 'columntable = ?', ['refuse-list']);
    $refuseListPrice = R::getCell('SELECT SUM(price) FROM crm_lido WHERE columntable = "refuse-list"');
    $completedList = R::find('crm_lido', 'columntable = ?', ['completed-list']);
    $completedListPrice = R::getCell('SELECT SUM(price) FROM crm_lido WHERE columntable = "completed-list"');
    $data['countTodosList'] = count($todosList);
    $data['todosListPrice'] = $todosListPrice;
    $data['countProgressList'] = count($inProgressList);
    $data['inProgressListPrice'] = $inProgressListPrice;
    $data['countRefuseList'] = count($refuseList);
    $data['refuseListPrice'] = $refuseListPrice;
    $data['countCompletedList'] = count($completedList);
    $data['completedListPrice'] = $completedListPrice;
}
header('Content-Type: application/json');
echo json_encode($data);
