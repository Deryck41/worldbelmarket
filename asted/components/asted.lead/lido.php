<? include "templates/header.php"; ?>
<link href="<?= $astedADM ?>templates/css/lido.css?v=3" rel="stylesheet">
<?php
//$link = mysqli_connect('localhost','root','root','asted');
$masColumn = [
	'todos-list' => 'Первый контакт	',
	'in-progress-list' => 'Не дозвонился',
	'refuse-list' => 'Нет / Отказ',
	'completed-list' => 'Принимают решение',
];
$sql_delete2 = "DELETE FROM crm_lido WHERE columntable='to-delete'";
mysqli_query($link, $sql_delete2);
if (isset($_POST["valueId"])) {
	$valueId = $_POST["valueId"];
	$valueTitle = $_POST["valueTitle"];
	$currentDate = $_POST["currentDate"];
	$valuePhone = $_POST["valuePhone"];
	$valuePrice = $_POST["valuePrice"];
	$valueName = $_POST["valueName"];
	$valueMail = $_POST["valueMail"];
	$valueSite = $_POST["valueSite"];
	$valueColumn = "todos-list";
	$sql_addnewlido = "INSERT INTO `crm_lido` (id,title,dateupdate,columntable,phone,price,name,email,site) VALUES ('{$valueId}','{$valueTitle}','{$currentDate}','{$valueColumn}','{$valuePhone}','{$valuePrice}','{$valueName}','{$valueMail}','{$valueSite}')";
	mysqli_query($link, $sql_addnewlido);
}
if (isset($_POST["name"])) {
	$elementId = $_POST["elementId"];
	$name = $_POST["name"];
	$sql_moving = "UPDATE crm_lido SET columntable='" . $name . "' WHERE id='{$elementId}'";
	mysqli_query($link, $sql_moving);
	$addInfoDrop = R::xdispense('crm_lido_message');
	$addInfoDrop['forobject'] = $_POST["elementId"];
	$addInfoDrop['datepush'] = $_POST["currentDate"];
	$addInfoDrop['content'] = 'ПЕРЕМЕСТИЛ ИЗ "' . $masColumn[$_POST['firstColumn']] . '" В "' . $masColumn[$_POST['secondColumn']] . '"';
	$addInfoDrop['user'] = $_SESSION['userid'];
	$addInfoDrop['type'] = 'message';
	R::store($addInfoDrop);
}
if (isset($_POST["cardId"])) {
	$cardId = $_POST["cardId"];
	$cardStatus = $_POST["cardStatus"];
	$card = R::load('crm_lido', $cardId);
	$card['columntable'] = $cardStatus;
	R::store($card);
	$addInfoDrop = R::xdispense('crm_lido_message');
	$addInfoDrop['forobject'] = $_POST["cardId"];
	$addInfoDrop['datepush'] = $_POST["currentDate"];
	$addInfoDrop['content'] = 'ПЕРЕМЕСТИЛ ИЗ "' . $masColumn[$_POST['firstColumn']] . '" В "' . $masColumn[$_POST['cardStatus']] . '"';
	$addInfoDrop['user'] = $_SESSION['userid'];
	$addInfoDrop['type'] = 'message';
	R::store($addInfoDrop);
}
if (isset($_POST["cardDeleteId"])) {
	R::hunt('crm_lido', 'id = ?', [$_POST["cardDeleteId"]]);
}
if (isset($_POST["cardMessageId"])) {
	$cardMessageId = $_POST["cardMessageId"];
	$messageText = $_POST["messageText"];
	$currentDate = $_POST["currentDate"];
	$taskDate = $_POST["taskDate"];
	$type = $_POST["type"];
	$user = $_SESSION["userid"];
	$sql_message = "INSERT INTO `crm_lido_message` (forobject,datepush,content,user,datetask,type) VALUES ('{$cardMessageId}','{$currentDate}','{$messageText}','{$user}','{$taskDate}','{$type}')";
	mysqli_query($link, $sql_message);
}
if (isset($_POST["messageId"])) {
	$message = R::load('crm_lido_message', $_POST["messageId"]);
	$message['type'] = 'message';
	R::store($message);
}
?><main class="drag">
	<div class="drag__table">
		<div class="asted-input-search">
			<input type="text" class="asted-input" placeholder="Искать...">
			<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
				<path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
			</svg>
			</input>
			<div class="search-list"></div>
		</div>
		<div class="drag__table-heading-bg">
			<div class="drag__table-heading-block">
				<div class="drag__table-heading-item drag__table-heading-item__todos-list">
					<div class="drag__table-heading-item-text">
						<h3>Первый контакт </h3><span id="countTodosList">(0)</span>
					</div>
					<div class="drag__table-heading-item-price">
						<span id="todosListPrice">0</span> руб.
					</div>
					<div class="drag__table-heading-item-settings display-n">
						<i class="fas fa-fw fa-edit"></i>
						<div class="drag__table-heading-item-settings-block">

							<ul class="drag__table-heading-item-settings-list">
								<li>Редактировать название</li>
								<li>Изменить цвет</li>
								<li>Удалить колонку</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="drag__table-heading-item drag__table-heading-item__in-progress-list">
					<div class="drag__table-heading-item-text">
						<h3>Не дозвонился</h3><span id="countProgressList">(0)</span>
					</div>
					<div class="drag__table-heading-item-price">
						<span id="inProgressListPrice">0</span> руб.
					</div>
					<div class="drag__table-heading-item-settings display-n">
						<i class="fas fa-fw fa-edit"></i>
						<div class="drag__table-heading-item-settings-block">

							<ul class="drag__table-heading-item-settings-list">
								<li>Редактировать название</li>
								<li>Изменить цвет</li>
								<li>Удалить колонку</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="drag__table-heading-item drag__table-heading-item__refuse-list">
					<div class="drag__table-heading-item-text">
						<h3>Нет / Отказ</h3><span id="countRefuseList">(0)</span>
					</div>
					<div class="drag__table-heading-item-price">
						<span id="refuseListPrice">0</span> руб.
					</div>
					<div class="drag__table-heading-item-settings display-n">
						<i class="fas fa-fw fa-edit"></i>
					</div>
				</div>
				<div class="drag__table-heading-item drag__table-heading-item__completed-list">
					<div class="drag__table-heading-item-text">
						<h3>Принимают решение</h3><span id="countCompletedList">(0)</span>
					</div>
					<div class="drag__table-heading-item-price">
						<span id="completedListPrice">0</span> руб.
					</div>
					<div class="drag__table-heading-item-settings display-n">
						<i class="fas fa-fw fa-edit"></i>
					</div>
				</div>
				<button class="drag__table-heading-item" data-name="add-column-btn">
					<i class="fas fa-fw fa-plus"></i>
				</button>
				<button class="drag__table-heading-item" data-name="edit-column-btn">
					<i class="fas fa-fw fa-cog"></i>
				</button>
			</div>
		</div>
		<div class="drag__table-content-bg">
			<div class="callback-bt">
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
					<path d="M224 0c-17.7 0-32 14.3-32 32V51.2C119 66 64 130.6 64 208v18.8c0 47-17.3 92.4-48.5 127.6l-7.4 8.3c-8.4 9.4-10.4 22.9-5.3 34.4S19.4 416 32 416H416c12.6 0 24-7.4 29.2-18.9s3.1-25-5.3-34.4l-7.4-8.3C401.3 319.2 384 273.9 384 226.8V208c0-77.4-55-142-128-156.8V32c0-17.7-14.3-32-32-32zm45.3 493.3c12-12 18.7-28.3 18.7-45.3H224 160c0 17 6.7 33.3 18.7 45.3s28.3 18.7 45.3 18.7s33.3-6.7 45.3-18.7z" />
				</svg>
			</div>

			<div class="drag__table-content-block">
				<div class="drag__table-content-item">
					<div class="adding__button-wrapper"> <button class="adding__button">БЫСТРОЕ ДОБАВЛЕНИЕ</button></div>
					<div class="drag__table-content-adding adding">

						<div class="adding__block display-n">
							<div class="adding__input-group">
								<input type="text" placeholder="Название" data-name="input-title" value="" class="new-lead" />
							</div>
							<p class="error-text">Организация имеется в базе</p>
							<div class="adding__input-group">
								<input type="number" placeholder="500" data-name="input-price" />
							</div>
							<div class="adding__input-group">
								<input type="text" placeholder="Контакт: Имя" data-name="input-name" />
								<input type="text" placeholder="Контакт: Телефон" data-name="input-phone" value="" />
								<input type="text" placeholder="Контакт: Email" data-name="input-mail" />
							</div>
							<div class="adding__input-group">
								<input type="text" placeholder="Компания: Сайт" data-name="input-site" />
							</div>
							<div class="adding__buttons-block">
								<button class="adding__buttons-item adding__buttons-item_main" data-name="add-btn">
									Добавить
								</button>
								<button class="adding__buttons-item adding__buttons-item_back" data-name="cancel-btn">
									Отменить
								</button>
								<button class="adding__buttons-item adding__buttons-item_set">
									Настройки
								</button>
							</div>
						</div>
					</div>
					<style>
						.showmore-triger {
							display: none;
							text-align: center;
							padding: 10px;
							background: #ffdfdf;
						}
					</style>
					<ul class="list-group" data-name="todos-list">
						<?
						$todosList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['todos-list']);
						$count = R::find('crm_lido', 'columntable = ?', ['todos-list']);
						$amt = ceil(count($count) / 20);
						foreach ($todosList as $object) {
							echo '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
						} ?>
						<div class="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>">
							<img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
						</div>
					</ul>
				</div>
				<div class="drag__table-content-item">
					<ul class="list-group" data-name="in-progress-list">
						<?
						$inProgressList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['in-progress-list']);
						$count = R::find('crm_lido', 'columntable = ?', ['in-progress-list']);
						$amt = ceil(count($count) / 20);
						foreach ($inProgressList as $object) {
							echo '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
						} ?>
						<div class="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>">
							<img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
						</div>
					</ul>
				</div>
				<div class="drag__table-content-item">
					<ul class="list-group" data-name="refuse-list">
						<?
						$refuseList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['refuse-list']);
						$count = R::find('crm_lido', 'columntable = ?', ['refuse-list']);
						$amt = ceil(count($count) / 20);
						foreach ($refuseList as $object) {
							echo '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
						} ?>
						<div class="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>">
							<img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
						</div>
					</ul>
				</div>
				<div class="drag__table-content-item">
					<ul class="list-group" data-name="completed-list">
						<?
						$completedList = R::find('crm_lido', 'columntable = ? ORDER BY id DESC LIMIT 20', ['completed-list']);
						$count = R::find('crm_lido', 'columntable = ?', ['completed-list']);
						$amt = ceil(count($count) / 20);
						foreach ($completedList as $object) {
							echo '<li class="list-group-item" draggable="true" data-id="' . $object['id'] . '">
							<div class="list-group-item__heading">
								<div class="list-group-item__link">' . $object['name'] . '</div>
								<div class="list-group-item__date">' . $object['dateupdate'] . '</div>
							</div>
							<div class="list-group-item__content">' . $object['title'] . '</div>
							<div class="list-group-item__phone"><a href="tel:' . $object['phone'] . '">' . $object['phone'] . '</a></div>
						</li>';
						} ?>
						<div class="showmore-triger" data-page="1" data-max="<?php echo $amt; ?>">
							<img src="https://snipp.ru/demo/693/ajax-loader.gif" alt="">
						</div>
					</ul>
				</div>
				<div class="drag__table-content-item"></div>
			</div>
		</div>
	</div>
	<div class="drag__hidden-block">
		<div class="drag__hidden-block-wrapper">
			<div class="drag__hidden-exit">X</div>
			<div class="drag__hidden-left">
				<div class="drag__hidden-left-heading">
					<div class="drag__hidden-left-heading-name">
						<div id="card-title">name</div>
						<div class="remove-button">Удалить лида</div>
					</div>
					<div class="drag__hidden-left-heading-id">
						<div id="card-id">#56767676</div>
					</div>
				</div>
				<div class="drag__hidden-left-content">
					<div class="drag__hidden-left-content-block">
						<div class="drag__hidden-left-content-title">Описание</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<div id="card-name" class="drag__hidden-left-content-value">
							фыаыфаыф
						</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<div class="drag__hidden-left-content-title">
							Рабочий телефон
						</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<a href="tel:" id="card-phone" class="drag__hidden-left-content-value">
							500
						</a>
					</div>
					<div class="drag__hidden-left-content-block">
						<div class="drag__hidden-left-content-title">Email</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<a id="card-mail" class="drag__hidden-left-content-value">
							фыаыфаыф
						</a>
					</div>
					<!-- <div class="drag__hidden-left-content-block drag__hidden-left-content-block_full">
            dgdg
          </div> -->
					<div class="drag__hidden-left-content-block">
						<div class="drag__hidden-left-content-title">Бюджет</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<div id="card-price" class="drag__hidden-left-content-value">
							500
						</div>
					</div>

					<div class="drag__hidden-left-content-block">
						<div class="drag__hidden-left-content-title">Сайт</div>
					</div>
					<div class="drag__hidden-left-content-block">
						<a id="card-site" class="drag__hidden-left-content-value" target="_blank">
							фыаыфаыф
						</a>
					</div>
				</div>
			</div>
			<div class="drag__hidden-right chat-block">
				<div class="chat-block__button-colums">
					<button data-column="todos-list" class="colums-button">Первый контакт</button>
					<button data-column="in-progress-list" class="colums-button">Не дозвонился</button>
					<button data-column="refuse-list" class="colums-button">Нет / Отказ</button>
					<button data-column="completed-list" class="colums-button">Принимают решение</button>
				</div>
				<div class="chat-block__main">
					<div class="chat-block__main-messages">

					</div>
				</div>
				<div class="chat-block__bottom">
					<textarea id="chat-textarea" class="chat-panel"></textarea>
					<div class="lead-buttons-panel">
						<button id="send-button" date-name="send-btn">
							Отправить
						</button>
						<button class="task-button">
							Задачи
						</button>
					</div>
				</div>
				<div class="lead-task-panel-wrapper">
					<div class="lead-task-panel">
						<div class="close-task-panel">
							<button class="close-task-panel-button">
								<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
									<path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
								</svg>
							</button>
						</div>
						<div class="text-lead-wrapper">
							<input type="text" class="task-lead-panel input-text-task"></input>
							<input type="time" class="task-lead-panel input-time-task"></input>
							<input type="date" class="task-lead-panel input-date-task"></input>
						</div>
						<button class="lead-button" disabled="true">Создать задачу</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="drag__bottom">
		<div class="drag__bottom-block">
			<div class="drag__bottom-delete" data-name="to-delete">Удалить карточку</div>
		</div>
	</div>
</main>
<? include "templates/footer.php"; ?>



<script src="<?= $astedADM ?>templates/js/lido.js" type="text/javascript"></script>