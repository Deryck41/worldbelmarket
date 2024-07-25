// Блок добавления карточки по клику на кнопку "Быстрое добавление"
// Блок добавления карточки по клику на кнопку "Быстрое добавление"
document.querySelector(".adding__button").addEventListener("click", () => {
    document.querySelector(".adding__button").classList.toggle("display-n");
    document.querySelector(".adding__block").classList.toggle("display-n");
});
// Функция транслитерации
function translit(word) {
    let answer = "";
    let converter = {
        а: "a",
        б: "b",
        в: "v",
        г: "g",
        д: "d",
        е: "e",
        ё: "e",
        ж: "zh",
        з: "z",
        и: "i",
        й: "y",
        к: "k",
        л: "l",
        м: "m",
        н: "n",
        о: "o",
        п: "p",
        р: "r",
        с: "s",
        т: "t",
        у: "u",
        ф: "f",
        х: "h",
        ц: "c",
        ч: "ch",
        ш: "sh",
        щ: "sch",
        ь: "",
        ы: "y",
        ъ: "",
        э: "e",
        ю: "yu",
        я: "ya",

        А: "a",
        Б: "b",
        В: "v",
        Г: "g",
        Д: "d",
        Е: "e",
        Ё: "e",
        Ж: "zh",
        З: "z",
        И: "i",
        Й: "y",
        К: "k",
        Л: "l",
        М: "m",
        Н: "n",
        О: "o",
        П: "p",
        Р: "r",
        С: "s",
        Т: "t",
        У: "u",
        Ф: "f",
        Х: "h",
        Ц: "c",
        Ч: "ch",
        Ш: "sh",
        Щ: "sch",
        Ь: "",
        Ы: "y",
        Ъ: "",
        Э: "e",
        Ю: "yu",
        Я: "ya",
        " ": "-",
        "(": "-",
        ")": "-",
    };

    for (let i = 0; i < word.length; ++i) {
        if (converter[word[i]] == undefined) {
            answer += word[i];
        } else {
            answer += converter[word[i]];
        }
    }

    return answer;
}
function viewCard(cardViewId) {
    $.ajax({
        url: "/asted/components/asted.lead/lidoAjax.php",
        method: "post",
        dataType: "json",
        data: {
            cardViewId,
        },
        success: function (data) {
            document.querySelector(".drag__hidden-block").style.maxWidth =
                "100%";
            document.getElementById("card-title").textContent =
                data["cardView"]["title"];
            document.getElementById("card-name").textContent =
                data["cardView"]["name"];
            document.getElementById("card-id").textContent =
                data["cardView"]["id"];
            document.getElementById("card-phone").textContent =
                data["cardView"]["phone"];
            document.getElementById("card-mail").textContent =
                data["cardView"]["mail"];
            document.getElementById("card-price").textContent =
                data["cardView"]["price"];
            document.getElementById("card-site").textContent =
                data["cardView"]["site"];
            document
                .querySelector(
                    '.colums-button[data-column="' +
                    data["cardView"]["columntable"] +
                    '"]'
                )
                .classList.add("colums-button-actived");
            document.querySelector(".chat-block__main-messages").innerHTML =
                data["cardViewMessage"];
            document
                .querySelector(".remove-button")
                .setAttribute("data-id", cardViewId);
            let messageItems = document.querySelectorAll(".message-item-task");
            messageItems.forEach((item) => {
                let taskCheck = item.querySelector(".task-check-wrapper");
                let taskStatus;
                taskCheck.onclick = function () {
                    let taskCheckClick =
                        item.querySelector(".task-check-click");

                    taskCheckClick.classList.toggle("task-check-clicked");

                    if (
                        taskCheckClick.classList.contains("task-check-clicked")
                    ) {
                        taskStatus = true;
                        console.log(taskStatus);
                    } else {
                        taskStatus = false;
                        console.log(taskStatus);
                    }
                    if (taskStatus) {
                        let messageId = taskCheck.getAttribute("data-id");
                        console.log(messageId);
                        taskCheck.previousElementSibling.classList.remove(
                            "task-item"
                        );
                        $.ajax({
                            url: "/asted/lead/",
                            method: "post",
                            dataType: "html",
                            data: {
                                messageId,
                            },
                            success: function (date) {
                                taskCheck.remove();
                                el.setAttribute("data-task", "");
                            },
                        });
                    }
                };
            });
        },
    });
}
function updateURL(urlLido) {
    if (history.pushState) {
        var baseUrl =
            window.location.protocol +
            "//" +
            window.location.host +
            window.location.pathname;
        var newUrl = baseUrl + `#${urlLido}`;
        history.pushState(null, null, newUrl);
    }
}
// Функция вывода информации из карточки в детальное окно
function infoAdding() {
    let cardViewId;
    let list = document.querySelectorAll(".list-group-item");
    list.forEach((el) => {
        el.addEventListener("click", function (e) {
            el.classList.add("active-card");
            cardViewId = el.getAttribute("data-id");
            viewCard(cardViewId);
            updateURL(cardViewId);
        });
    });
}

let btnDel = document.querySelector(".remove-button");
btnDel.addEventListener("click", function () {
    let cardDeleteId = btnDel.getAttribute("data-id");
    $.ajax({
        url: "/asted/lead/",
        method: "post",
        dataType: "html",
        data: {
            cardDeleteId,
        },
        success: function (date) {
            closeCard();
            document
                .querySelector(
                    '.list-group-item[data-id="' + cardDeleteId + '"]'
                )
                .remove();
            Count();
        },
    });
});
infoAdding();
let colBut = document.querySelectorAll(".colums-button");
colBut.forEach((element) => {
    element.addEventListener("click", function () {
        let firstColumn = document.querySelector(".colums-button.colums-button-actived").getAttribute("data-column");
        let userFIO = document.getElementById("userFIO").textContent;
        const masColumn = {
            'todos-list': 'Первый контакт',
            'in-progress-list': 'Не дозвонился',
            'refuse-list': 'Нет / Отказ',
            'completed-list': 'Принимают решение',
        };
        let currentDate = new Date();
        let dd = String(currentDate.getDate()).padStart(2, "0");
        let mm = String(currentDate.getMonth() + 1).padStart(2, "0");
        let yyyy = currentDate.getFullYear();
        let hours = String(currentDate.getHours()).padStart(2, "0");
        let minutes = String(currentDate.getMinutes()).padStart(2, "0");
        currentDate = dd + "." + mm + "." + yyyy + " " + hours + ":" + minutes;
        colBut.forEach((el) => {
            el.classList.remove("colums-button-actived");
        });
        element.classList.add("colums-button-actived");
        // console.log(element.getAttribute("data-column"));
        const cardId = main.querySelector("#card-id").textContent;
        const cardStatus = element.getAttribute("data-column");
        const block = document.querySelector('li[data-id="' + cardId + '"]');
        const newParent = document.querySelector(
            'ul[data-name="' + cardStatus + '"]'
        );
        if (block) {
            newParent.appendChild(block);
        }
        console.log(cardId);
        console.log(firstColumn);
        console.log(cardStatus);
        console.log(currentDate);
        $.ajax({
            url: "/asted/lead/",
            method: "post",
            dataType: "html",
            data: {
                cardId,
                firstColumn,
                cardStatus,
                currentDate,
            },
            success: function (date) {
                Count();
                const messageItem = `
                <div class="message-item">
                    <div class="message-item__date">${currentDate} - <strong>${userFIO}</strong></div>
                    <div class="message-item__text">ПЕРЕМЕСТИЛ ИЗ "${masColumn[firstColumn]}" В "${masColumn[cardStatus]}"</div>
                </div>
                `;
                const chatArea = main.querySelector(
                    ".drag__hidden-block .chat-block__main-messages"
                );

                chatArea.insertAdjacentHTML("beforeend", messageItem);
            },
        });
    });
});
// Добавление новой карточки после заполнения полей
const main = document.querySelector("main");
main.addEventListener("click", (e) => {
    if (e.target.tagName === "BUTTON") {
        const { name } = e.target.dataset;
        if (name === "add-btn") {
            // определяем поля для ввода
            const inputTitle = main.querySelector('[data-name="input-title"]');
            const inputPrice = main.querySelector('[data-name="input-price"]');
            const inputName = main.querySelector('[data-name="input-name"]');
            const inputPhone = main.querySelector('[data-name="input-phone"]');
            const inputMail = main.querySelector('[data-name="input-mail"]');
            const inputSite = main.querySelector('[data-name="input-site"]');
            // если они не являются пустыми
            if (
                inputTitle.value.trim() !== "" &&
                inputPhone.value.trim() !== ""
            ) {
                // получаем введенные данные
                const valueTitle = inputTitle.value;
                const valuePrice = inputPrice.value;
                const valueName = inputName.value;
                const valuePhone = inputPhone.value;
                const valueMail = inputMail.value;
                const valueSite = inputSite.value;
                // сегодняшняя дата
                let currentDate = new Date();
                let dd = String(currentDate.getDate()).padStart(2, "0");
                let mm = String(currentDate.getMonth() + 1).padStart(2, "0");
                let yyyy = currentDate.getFullYear();
                currentDate = dd + "." + mm + "." + yyyy;
                const valueId = Date.now();
                // шаблон карточки
                const template = `
						<li class="list-group-item" draggable="true" data-id='${valueId}'>
							<div class="list-group-item__heading">
								<div class="list-group-item__link">${valueName}</div>
								<div class="list-group-item__date">${currentDate}</div>
							</div>
							<div class="list-group-item__content">${valueTitle}</div>
							<div class="list-group-item__phone"><a href="tel:${valuePhone}">${valuePhone}</a></div>
						</li>
						`;
                // по дата-атрибуту находим первый столбец и добавляем в него карточку
                const todosList = main.querySelector(
                    '[data-name="todos-list"]'
                );
                todosList.insertAdjacentHTML("afterBegin", template);
                $.ajax({
                    url: "/asted/lead/",
                    method: "post",
                    dataType: "html",
                    data: {
                        valueId,
                        valueTitle,
                        currentDate,
                        valuePhone,
                        valuePrice,
                        valueName,
                        valueMail,
                        valueSite,
                    },
                    success: function (date) {
                        // alert(date);
                        Count();
                    },
                });

                // очищаем поля в блоке быстрого добавления
                inputTitle.value = "";
                inputPrice.value = "";
                inputName.value = "";
                inputPhone.value = "";
                inputMail.value = "";
                inputSite.value = "";

                document
                    .querySelector(".adding__button")
                    .classList.toggle("display-n");
                document
                    .querySelector(".adding__block")
                    .classList.toggle("display-n");
                infoAdding();
                //lidoValues();
            }
            // Кнопка "Отменить"
        } else if (name === "cancel-btn") {
            document
                .querySelector(".adding__button")
                .classList.toggle("display-n");
            document
                .querySelector(".adding__block")
                .classList.toggle("display-n");
        } else if (name === "add-column-btn") {
            // Добавление нового столбца в шапке
            const headingBlock = `
	<div class="drag__table-heading-item">
			<div class="drag__table-heading-item-text">
				<div class="drag__input-group">
					<input type="text">
					<button>Сохранить</button>
				</div>
			</div>
			<div class="drag__table-heading-item-price">
				<span>(0)</span> руб.
			</div>
			<div class="drag__table-heading-item-settings display-n">
				<i class="fas fa-fw fa-edit"></i>
			</div>
	</div>
	`;
            const lastHeadingColumn = document.querySelector(
                "button.drag__table-heading-item"
            );
            lastHeadingColumn.insertAdjacentHTML("beforebegin", headingBlock);

            const newInput = document.querySelector(".drag__input-group");
            const newInputValue = newInput.querySelector("input").value;
            // Заменяем название столбца на введенное значение
            document
                .querySelector(".drag__input-group button")
                .addEventListener("click", () => {
                    const newInput =
                        document.querySelector(".drag__input-group");
                    const newInputValue = newInput.querySelector("input").value;
                    const newTitle = `
			<h3>${newInputValue}</h3><span>(0)</span>
			`;
                    if (newInputValue !== "") {
                        translitValue = translit(newInputValue);
                        newInput.parentNode.parentNode.classList.add(
                            `drag__table-heading-item__${translitValue}`
                        );
                        newInput.outerHTML = newTitle;
                        // Добавляем столбец с контентом
                        const contentBlock = `
					<div class="drag__table-content-item">
						<ul class="list-group" data-name="${translitValue}"></ul>
					</div>
				`;
                        const lastContentColumn = document.querySelector(
                            ".drag__table-content-item:last-child"
                        );
                        lastContentColumn.insertAdjacentHTML(
                            "beforebegin",
                            contentBlock
                        );
                    }
                });
        } else if (name === "edit-column-btn") {
            let settingsButtons = document.querySelectorAll(
                ".drag__table-heading-item-settings i"
            );
            settingsButtons.forEach((item) => {
                // item.setAttribute("contenteditable", "true");
                item.parentNode.classList.remove("display-n");
                const currentList = item.parentNode.querySelector(
                    ".drag__table-heading-item-settings-list"
                );
                item.addEventListener("click", () => {
                    currentList.classList.add("max-height-max");
                    let dropedListCount =
                        document.querySelectorAll(".max-height-max").length;
                    if (dropedListCount === 1) {
                        document.addEventListener("mouseup", function (e) {
                            let dropedList =
                                document.querySelector(".max-height-max");
                            if (!dropedList.contains(e.target)) {
                                dropedList.classList.remove("max-height-max");
                            }
                        });
                    }
                });
            });
        }
    }
});

function closeCard() {
    document.querySelector(".drag__hidden-block").style.maxWidth = 0 + "%";
    document.querySelectorAll(".colums-button").forEach((el) => {
        el.classList.remove("colums-button-actived");
    });
    document.querySelector(".chat-block__main-messages").innerHTML = "";
    const baseUrl = "/asted/lead/";
    history.replaceState(null, null, baseUrl);
}
document.querySelector(".drag__hidden-exit").addEventListener("click", () => {
    closeCard();
});

function createList() {
    const dropedList = document.querySelectorAll(".max-height-max");
    console.log(dropedList);
    if (dropedList.length === 1) {
        console.log("1");
        document.addEventListener("click", (e) => {
            const withinBoundaries = e.composedPath().includes(dropedList);

            if (!withinBoundaries) {
                console.log("vne");
            }
        });
    } else {
        console.log("no element");
    }
}

// Добавление класса "drop" к колонке, над которой находится карточка
main.addEventListener("dragenter", (e) => {
    // нас интересуют только колонки
    if (e.target.classList.contains("list-group")) {
        e.target.classList.add("drop");
    }
    if (e.target.classList.contains("drag__bottom-delete")) {
        e.target.classList.add("drag__bottom-delete_active");
    }
});

main.addEventListener("dragleave", (e) => {
    if (e.target.classList.contains("drop")) {
        e.target.classList.remove("drop");
    }
    if (e.target.classList.contains("drag__bottom-delete_active")) {
        e.target.classList.remove("drag__bottom-delete_active");
    }
});
// Начало перетаскивания
main.addEventListener("dragstart", (e) => {
    document.querySelector(".drag__bottom").style.maxHeight = 100 + "%";
    // нас интересует только задача
    if (e.target.classList.contains("list-group-item")) {
        // сохраняем идентификатор задачи в объекте "dataTransfer" в виде обычного текста;
        e.dataTransfer.setData("text/plain", e.target.dataset.id);
    }
});

// создаем переменную для хранения "низлежащего" элемента
let elemBelow = "";

main.addEventListener("dragover", (e) => {
    // отключаем стандартное поведение браузера;
    e.preventDefault();

    elemBelow = e.target;
});

// Обрабатываем событие Бросание
main.addEventListener("drop", (e) => {
    // находим перетаскиваемую задачу по идентификатору, записанному в dataTransfer

    let currentDate = new Date();
    let dd = String(currentDate.getDate()).padStart(2, "0");
    let mm = String(currentDate.getMonth() + 1).padStart(2, "0");
    let yyyy = currentDate.getFullYear();
    let hours = String(currentDate.getHours()).padStart(2, "0");
    let minutes = String(currentDate.getMinutes()).padStart(2, "0");
    currentDate = dd + "." + mm + "." + yyyy + " " + hours + ":" + minutes;

    const todo = main.querySelector(
        `[data-id="${e.dataTransfer.getData("text/plain")}"]`
    );
    let test = todo.parentElement;
    const { name } = e.target.dataset;
    let elementId = todo.getAttribute("data-id");
    document.querySelector(".drag__bottom").style.maxHeight = 0 + "%";
    // прекращаем выполнение кода, если задача и элемент - одно и то же
    if (elemBelow === todo) {
        return;
    }

    if (elemBelow.tagName === "P" || elemBelow.tagName === "BUTTON") {
        elemBelow = elemBelow.parentElement;
    }

    if (elemBelow.classList.contains("list-group-item")) {
        // нам нужно понять, куда помещать перетаскиваемый элемент:
        // до или после низлежащего;
        const center =
            elemBelow.getBoundingClientRect().y +
            elemBelow.getBoundingClientRect().height / 2;

        // если курсор находится ниже центра
        // значит, перетаскиваемый элемент должен быть помещен под низлежащим
        // иначе, перед ним
        if (e.clientY > center) {
            if (elemBelow.nextElementSibling !== null) {
                elemBelow = elemBelow.nextElementSibling;
            } else {
                return;
            }
        }

        elemBelow.parentElement.insertBefore(todo, elemBelow);
        todo.className = elemBelow.className;
    }

    // если целью является колонка
    if (e.target.classList.contains("list-group")) {
        // просто добавляем в нее перетаскиваемый элемент
        // это приведет к автоматическому удалению элемента из "родной" колонки
        e.target.append(todo);

        console.log(
            userFIO.textContent,
            currentDate,
            test.getAttribute("data-name"),
            e.target.getAttribute("data-name")
        );

        // удаляем индикатор зоны для "бросания"
        if (e.target.classList.contains("drop")) {
            e.target.classList.remove("drop");
        }

        // const { name } = e.target.dataset;
        // let elementId = todo.getAttribute("data-id");
        console.log(elementId);
        console.log(name);
    }
    // удаление элемента
    if (e.target.classList.contains("drag__bottom-delete")) {
        todo.remove();
        console.log(elementId);
        console.log(name);
        if (e.target.classList.contains("drag__bottom-delete_active")) {
            e.target.classList.remove("drag__bottom-delete_active");
        }
    }

    // lidoValues();
    // Передаем имя колонки, в которой оказался элемент и data-id элемента

    let userName = userFIO.textContent;
    let firstColumn = test.getAttribute("data-name");
    let secondColumn = e.target.getAttribute("data-name");
    console.log(elementId);
    console.log(name);
    console.log(currentDate);
    console.log(userName);
    console.log(firstColumn);
    console.log(secondColumn);
    $.ajax({
        url: "/asted/lead/",
        method: "post",
        dataType: "html",
        data: {
            elementId,
            name,
            currentDate,
            userName,
            firstColumn,
            secondColumn,
        },
        success: function (date) {
            // alert(date);
            Count();
        },
    });
});

//Калькулятор

// function lidoValues() {
//     let contentColumns = document.querySelectorAll(".list-group");
//     contentColumns.forEach((item) => {
//         let itemsCount = item.children.length;
//         let priceSumm = 0;
//         for (let i = 0; i < itemsCount; i++) {
//             const price = parseInt(
//                 item.children[i].querySelector('[name="price"]').value
//             );

//             function sanitise(x) {
//                 if (isNaN(x)) {
//                     return 0;
//                 }
//                 return x;
//             }
//             priceSumm += sanitise(price);
//         }
//         const columnName = item.getAttribute("data-name");
//         let headingItem = document.querySelector(
//             `.drag__table-heading-item__${columnName}`
//         );
//         headingItem.querySelector(
//             ".drag__table-heading-item-text span"
//         ).innerHTML = `(${itemsCount})`;
//         headingItem.querySelector(
//             ".drag__table-heading-item-price span"
//         ).innerHTML = `(${priceSumm})`;
//         const columnItem = document.querySelectorAll(".list-group-item");
//     });
// }
// lidoValues();

// Чат
document.querySelector("#chat-textarea").addEventListener("click", () => {
    document.querySelector("#send-button").classList.remove("display-n");
});

const message = main.querySelector("#chat-textarea");
let visButton = document.querySelector("#send-button");

message.oninput = function () {
    if (message.value !== "") {
        visButton.classList.remove("display-n");
    } else if (message.value === "") {
        visButton.classList.add("display-n");
    }
};

// document.addEventListener("mouseup", function (e) {
//     let visButton = document.querySelector("#send-button");

//     // if (!visButton.contains(e.target)) {
//     //     visButton.classList.add("display-n");
//     //     // const message = main.querySelector("#chat-textarea");
//     //     // message.value = "";
//     // }
// });

document.querySelector("#send-button").addEventListener("click", () => {
    const cardMessageId = main.querySelector("#card-id").textContent;
    const message = main.querySelector("#chat-textarea");
    const type = "message";
    const userFIO = document.getElementById("userFIO").textContent;
    function wrapLinksInAnchorTags(message) {
        // Регулярное выражение для обнаружения текста, похожего на ссылку
        var linkRegex = /(http:\/\/|https:\/\/)\S+/gi;

        // Заменяем все найденные ссылки на соответствующие теги <a>
        var wrappedMessage = message.replace(linkRegex, function (match) {
            return '<a href="' + match + '">' + match + "</a>";
        });

        return wrappedMessage;
    }
    const messageText = wrapLinksInAnchorTags(message.value);

    let currentDate = new Date();
    let dd = String(currentDate.getDate()).padStart(2, "0");
    let mm = String(currentDate.getMonth() + 1).padStart(2, "0");
    let yyyy = currentDate.getFullYear();
    let hours = String(currentDate.getHours()).padStart(2, "0");
    let minutes = String(currentDate.getMinutes()).padStart(2, "0");
    currentDate = dd + "." + mm + "." + yyyy + " " + hours + ":" + minutes;
    // Проверка, чтобы не было пустого поля
    if (messageText.trim() !== "") {
        document.querySelector("#send-button").classList.add("display-n");
        const messageItem = `
						<div class="message-item">
							<div class="message-item__date">${currentDate} - <strong>${userFIO}</strong></div>
							<div class="message-item__text">${messageText}</div>
						</div>
						`;
        const chatArea = main.querySelector(
            ".drag__hidden-block .chat-block__main-messages"
        );

        chatArea.insertAdjacentHTML("beforeend", messageItem);
        // Добавление сообщения в карточку

        // очищаем поле для ввода
        message.value = "";
        console.log(cardMessageId);
        console.log(messageText);
        console.log(currentDate);
        // Скрол внизу
        let scrollBlock = document.querySelector(
            ".drag__hidden-block .chat-block__main-messages"
        );
        scrollBlock.scrollTop = scrollBlock.scrollHeight;
        $.ajax({
            url: "/asted/lead/",
            method: "post",
            dataType: "html",
            data: {
                cardMessageId,
                messageText,
                currentDate,
                type,
            },
            success: function (date) {
                // alert(date);
            },
        });
    }
});

// Отправка сообщения по Enter

// document.querySelector("#send-button").addEventListener("click", () => {
//     sendText();
// });

document
    .querySelector("#chat-textarea")
    .addEventListener("keyup", function (e) {
        if (e.keyCode === 13 && !e.shiftKey) {
            document.querySelector("#send-button").click();
            e.preventDefault();
        }
    });

// let lidoItem = document.querySelectorAll(".list-group-item");

// lidoItem.forEach((el) => {
//     el.onclick = function (event) {
//         let urlLido = el.getAttribute("data-id");

//     };
// });

// Функция для обработки клика на карточке
function handleClick(event) {
    const liElement = event.target;
    const dataId = liElement.getAttribute("data-id");

    // Проверяем, чтобы data-id был определен
    if (dataId) {
        // Формируем новый URL с добавленным data-id
        const newURL = `/asted/lead/#${dataId}`;

        // Меняем URL страницы без перезагрузки
        history.pushState(null, null, newURL);

        // Удаляем класс .active-card у всех элементов li
        const liElements = document.querySelectorAll(".list-group-item");
        liElements.forEach((element) => {
            element.classList.remove("active-card");
        });

        // Добавляем класс .active-card текущему элементу li
        liElement.classList.add("active-card");
    }
}

// Функция для проверки data-id при загрузке страницы
function checkDataIdOnLoad() {
    const url = window.location.href;
    const hashIndex = url.indexOf("#");
    if (hashIndex !== -1) {
        const cardViewId = url.substring(hashIndex + 1);
        viewCard(cardViewId);
    }
}

// Получаем все элементы li и добавляем обработчик события на клик
// const liElements = document.querySelectorAll(".list-group-item");
// liElements.forEach((liElement) => {
//     liElement.addEventListener("click", handleClick);
// });

// Проверяем data-id при загрузке страницы
checkDataIdOnLoad();

const searchInput = document.querySelector(".asted-input");
const searchList = document.querySelector(".search-list");
var typingTimer;
var doneTypingInterval = 1000;

// const dropdown = e.parentNode.parentNode.querySelector('.search-wrapper__dropdown');
searchInput.addEventListener("input", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(search, doneTypingInterval);
});
function search() {
    let searchValue = searchInput.value;
    if (searchValue == "" || searchValue == null) {
        console.log("123");
        searchList.classList.remove("search-list-open");
    }
    $.ajax({
        url: "/asted/components/asted.lead/lidoAjax.php",
        method: "post",
        dataType: "json",
        data: {
            searchValue,
        },
        success: function (data) {
            if (data["searchCards"] !== null) {
                searchList.classList.add("search-list-open");
            }
            searchList.innerHTML = data["searchCards"];
            const listItem = document.querySelectorAll(".search-list-item");

            listItem.forEach((el) => {
                el.onclick = function () {
                    let pool = el.getAttribute("data-ID");
                    document
                        .querySelector(".search-list")
                        .classList.remove("search-list-open");
                    const searchInput = document.querySelector(".asted-input");
                    searchInput.value = "";

                    function updateURL() {
                        if (history.pushState) {
                            var baseUrl =
                                window.location.protocol +
                                "//" +
                                window.location.host +
                                window.location.pathname;
                            var newUrl = baseUrl + `#${pool}`;
                            history.pushState(null, null, newUrl);
                        }
                    }
                    updateURL();
                    checkDataIdOnLoad();
                };
            });
        },
    });
}

// const liText = document.querySelectorAll(".list-group-item__content");
// const inputTitles = document.querySelector(".new-lead");

// inputTitles.oninput = function () {
//     let btn = document.querySelector(".adding__buttons-item_main");
//     inputTitles.classList.remove("error-input");
//     btn.classList.remove("blocked-btn");
//     btn.disabled = false;

//     const errorText = document.querySelector(".error-text");
//     errorText.classList.remove("error-text-open");
//     liText.forEach((title) => {
//         if (
//             inputTitles.value.toUpperCase().trim("").replace(/"/g, "") ===
//             title.textContent.toUpperCase().trim("").replace(/"/g, "")
//         ) {
//             inputTitles.classList.add("error-input");
//             btn.disabled = true;
//             btn.classList.add("blocked-btn");
//             errorText.classList.add("error-text-open");
//         }
//     });
// };

// Панель задач в лидах

const taskPanel = document.querySelector(".lead-task-panel-wrapper");
const taskButton = document.querySelector(".task-button");
const closeTaskPanel = document.querySelector(".close-task-panel-button");
const taskTextInput = document.querySelector(".input-text-task");
const taskDateInput = document.querySelector(".input-date-task");
const taskTimeInput = document.querySelector(".input-time-task");
const leadButton = document.querySelector(".lead-button");

taskButton.onclick = function () {
    taskPanel.classList.toggle("open-task-panel");
};

closeTaskPanel.onclick = function () {
    taskPanel.classList.remove("open-task-panel");
};

let taskMessage = {
    text: "",
    date: "",
    time: "",
};

taskTextInput.oninput = function () {
    if (taskTextInput.value.trim("") !== "") {
        leadButton.classList.add("unblock-btn-task");
        leadButton.disabled = false;
    } else {
        leadButton.classList.remove("unblock-btn-task");
        leadButton.disabled = true;
    }

    taskMessage.text = taskTextInput.value;
};

taskDateInput.oninput = function () {
    let currentDate = taskDateInput.value.split("-").reverse().join(".");

    taskMessage.date = currentDate;
};

taskTimeInput.onchange = function () {
    taskMessage.time = taskTimeInput.value;
};

leadButton.onclick = function () {
    let messageText = `${taskMessage.text} ${taskMessage.date} в ${taskMessage.time}`;
    const type = "task";
    const taskDate = taskMessage.date;
    const cardMessageId = main.querySelector("#card-id").textContent;
    const userFIO = document.getElementById("userFIO").textContent;
    let card = document.querySelector('[data-id="' + cardMessageId + '"]');
    let currentDate = new Date();
    let dd = String(currentDate.getDate()).padStart(2, "0");
    let mm = String(currentDate.getMonth() + 1).padStart(2, "0");
    let yyyy = currentDate.getFullYear();
    let hours = String(currentDate.getHours()).padStart(2, "0");
    let minutes = String(currentDate.getMinutes()).padStart(2, "0");
    currentDate = dd + "." + mm + "." + yyyy + " " + hours + ":" + minutes;

    if (taskTextInput.value.trim() !== "") {
        const messageItem = `
		<div class="message-item">
			<div class="message-item__date">${currentDate} - <strong>${userFIO}</strong></div>
			<div class="message-item__text task-item" data-task="${taskDate}">${messageText}</div>
		</div>
		`;
        const chatArea = main.querySelector(
            ".drag__hidden-block .chat-block__main-messages"
        );

        chatArea.insertAdjacentHTML("beforeend", messageItem);
        // Добавление сообщения в карточку
        console.log(taskDate);
        $.ajax({
            url: "/asted/lead/",
            method: "post",
            dataType: "html",
            data: {
                cardMessageId,
                messageText,
                currentDate,
                taskDate,
                type,
            },
            success: function (date) {
                card.setAttribute("data-task", taskDate);
            },
        });
        taskPanel.classList.remove("open-task-panel");
        taskDateInput.value = "";
        taskTextInput.value = "";
        taskTimeInput.value = "";
    }
};
let taskView = 0;
let callBackBtn = document.querySelector(".callback-bt");
callBackBtn.addEventListener("click", function () {
    if (taskView == 0) {
        taskView = 1;
    } else {
        taskView = 0;
    }
    $.ajax({
        url: "/asted/components/asted.lead/lidoAjax.php",
        method: "post",
        dataType: "json",
        data: {
            taskView,
        },
        success: function (data) {
            var tasksTodos = document.querySelector(
                'ul[data-name="todos-list"]'
            );
            var tasksProgress = document.querySelector(
                'ul[data-name="in-progress-list"]'
            );
            var tasksRefuse = document.querySelector(
                'ul[data-name="refuse-list"]'
            );
            var tasksCompleted = document.querySelector(
                'ul[data-name="completed-list"]'
            );
            tasksTodos.innerHTML = data["tasksTodos"];
            tasksProgress.innerHTML = data["tasksProgress"];
            tasksRefuse.innerHTML = data["tasksRefuse"];
            tasksCompleted.innerHTML = data["tasksCompleted"];
            if (taskView == 1) {
                preloadEnabled = false;
            } else {
                preloadEnabled = true;
            }
            infoAdding();
        },
    });
});

function Preload(nameTable) {
    var loading = false;
    var page = 2; // Начальная страница для подгрузки
    var ulElement = $("ul[data-name='" + nameTable + "']");
    var ulContainer = ulElement.parent(); // Контейнер, в котором находится ul

    let ul = document.querySelector("ul[data-name='" + nameTable + "']");
    console.log(ul);
    let showmore = ul.querySelector(".showmore-triger");
    function loadMoreItems() {
        if (loading) return;

        var maxPages = parseInt(showmore.getAttribute("data-max"));
        if (page > maxPages) return;

        loading = true;
        showmore.style.display = "block";

        $.ajax({
            url: "/asted/components/asted.lead/ajax.php", // Замените на путь к обработчику запросов на сервере
            method: "POST",
            data: {
                page: page,
                name: ulElement.data("name"),
            }, // Передача data-name
            success: function (response) {
                showmore.style.display = "none";
                if (response) {
                    ulElement.append(response);
                    page++;
                }
                loading = false;
                infoAdding();
            },
        });
    }

    ulContainer.scroll(function () {
        var contentHeight = ulElement.height();
        var scrollHeight = ulContainer.scrollTop() + ulContainer.height();

        if (scrollHeight >= contentHeight - 100 && preloadEnabled) {
            loadMoreItems();
        }
    });
}
var preloadEnabled = true;

Preload("todos-list");
Preload("in-progress-list");
Preload("refuse-list");
Preload("completed-list");

function Count() {
    let countView = 1;
    $.ajax({
        url: "/asted/components/asted.lead/lidoAjax.php",
        method: "post",
        dataType: "json",
        data: {
            countView,
        },
        success: function (data) {
            document.getElementById("countTodosList").innerHTML =
                "(" + data["countTodosList"] + ")";
            document.getElementById("todosListPrice").innerHTML =
                data["todosListPrice"];
            document.getElementById("countProgressList").innerHTML =
                "(" + data["countProgressList"] + ")";
            document.getElementById("inProgressListPrice").innerHTML =
                data["inProgressListPrice"];
            document.getElementById("countRefuseList").innerHTML =
                "(" + data["countRefuseList"] + ")";
            document.getElementById("refuseListPrice").innerHTML =
                data["refuseListPrice"];
            document.getElementById("countCompletedList").innerHTML =
                "(" + data["countCompletedList"] + ")";
            document.getElementById("completedListPrice").innerHTML =
                data["completedListPrice"];
        },
    });
}
Count();

window.addEventListener(
    "keydown",
    function (e) {
        if (e.keyCode == 27) {
            closeCard();
        }
    },
    true
);
